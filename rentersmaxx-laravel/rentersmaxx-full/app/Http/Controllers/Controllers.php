<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessWebhookJob;
use App\Jobs\CollectRentJob;
use App\Models\{Lease, Payment, Property, WaitlistEmail, MaintenanceRequest, Message};
use App\Payment\ProcessorFactory;
use App\Services\{PaymentService, LedgerService};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

// ─────────────────────────────────────────────────────────────
// WAITLIST CONTROLLER
// ─────────────────────────────────────────────────────────────
class WaitlistController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email'              => 'required|email|max:255',
            'first_name'         => 'nullable|string|max:100',
            'last_name'          => 'nullable|string|max:100',
            'home_country'       => 'nullable|string|max:100',
            'portfolio_size'     => 'nullable|string|max:100',
            'property_countries' => 'nullable|string|max:255',
            'pain_point'         => 'nullable|string|max:255',
        ]);

        WaitlistEmail::firstOrCreate(
            ['email' => $validated['email']],
            array_merge($validated, ['ref' => 'RMX-' . strtoupper(Str::random(6))])
        );

        // TODO: Mail::to($validated['email'])->send(new WaitlistConfirmation(...));

        return back()->with('waitlist_success', true);
    }
}

// ─────────────────────────────────────────────────────────────
// PROPERTY CONTROLLER
// ─────────────────────────────────────────────────────────────
class PropertyController extends Controller
{
    public function index()
    {
        $properties = Auth::user()
            ->properties()
            ->withCount(['leases' => fn($q) => $q->where('status', 'active')])
            ->latest()
            ->get();

        return view('dashboard.properties.index', compact('properties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'address_line1'  => 'required|string|max:255',
            'address_line2'  => 'nullable|string|max:255',
            'city'           => 'required|string|max:100',
            'state_province' => 'nullable|string|max:100',
            'postal_code'    => 'nullable|string|max:20',
            'country_code'   => ['required', 'string', 'size:2',
                                  fn($a, $v, $f) => ProcessorFactory::supports($v) ?: $f('Country not supported')],
            'type'           => 'required|in:apartment,house,commercial,other',
            'bedrooms'       => 'nullable|integer|min:0|max:99',
        ]);

        $countryConfig = config("countries.{$validated['country_code']}");

        $property = Auth::user()->properties()->create(array_merge($validated, [
            'currency_code'  => $countryConfig['currency'],
            'processor_slug' => $countryConfig['processor'],
        ]));

        return redirect()->route('properties.show', $property)
            ->with('success', 'Property added.');
    }

    public function show(Property $property)
    {
        $this->authorize('view', $property);
        $property->load(['leases.tenant', 'leases.payments' => fn($q) => $q->latest()->limit(5)]);
        return view('dashboard.properties.show', compact('property'));
    }
}

// ─────────────────────────────────────────────────────────────
// LEASE CONTROLLER
// ─────────────────────────────────────────────────────────────
class LeaseController extends Controller
{
    public function store(Request $request, Property $property)
    {
        $this->authorize('update', $property);

        $validated = $request->validate([
            'tenant_email'         => 'required|email',
            'rent_minor_units'     => 'required|integer|min:1',
            'due_day'              => 'required|integer|min:1|max:28',
            'grace_period_days'    => 'nullable|integer|min:0|max:30',
            'frequency'            => 'required|in:monthly,fortnightly,weekly',
            'deposit_minor_units'  => 'nullable|integer|min:0',
            'start_date'           => 'required|date|after_or_equal:today',
            'end_date'             => 'nullable|date|after:start_date',
        ]);

        // Find or create tenant user
        $tenant = \App\Models\User::firstOrCreate(
            ['email' => $validated['tenant_email']],
            ['role' => 'tenant', 'first_name' => 'Tenant', 'last_name' => '', 'password' => bcrypt(Str::random(32))]
        );

        $lease = $property->leases()->create(array_merge(
            $validated,
            ['tenant_id' => $tenant->id, 'currency_code' => $property->currency_code]
        ));

        // TODO: send tenant invite email

        return redirect()->route('leases.show', $lease)->with('success', 'Lease created. Tenant invite sent.');
    }

    public function show(Lease $lease)
    {
        $this->authorize('view', $lease);
        $lease->load(['property', 'tenant', 'payments' => fn($q) => $q->latest()->limit(12), 'maintenanceRequests']);
        return view('dashboard.leases.show', compact('lease'));
    }
}

// ─────────────────────────────────────────────────────────────
// WEBHOOK CONTROLLER
// One endpoint per processor — immediately queued, never processed inline.
// ─────────────────────────────────────────────────────────────
class WebhookController extends Controller
{
    public function handle(Request $request, string $processor): \Illuminate\Http\Response
    {
        // Verify signature synchronously before queuing
        try {
            $proc = ProcessorFactory::for(
                collect(config('countries'))
                    ->where('processor', $processor)
                    ->keys()
                    ->first() ?? 'US'
            );

            if (! $proc->verifyWebhookSignature($request)) {
                return response('Unauthorized', 401);
            }
        } catch (\Exception $e) {
            return response('Bad Request', 400);
        }

        // Dispatch immediately — never process webhooks inline
        ProcessWebhookJob::dispatch(
            $processor,
            $request->all(),
            $request->headers->all(),
        );

        return response('OK', 200);
    }
}

// ─────────────────────────────────────────────────────────────
// DASHBOARD CONTROLLER
// ─────────────────────────────────────────────────────────────
class DashboardController extends Controller
{
    public function __construct(private readonly LedgerService $ledger) {}

    public function index()
    {
        $user       = Auth::user();
        $properties = $user->properties()->with(['leases' => fn($q) => $q->where('status', 'active')])->get();
        $summary    = $this->ledger->monthlySummary($user->id, now()->year, now()->month);

        return view('dashboard.index', compact('user', 'properties', 'summary'));
    }
}

// ─────────────────────────────────────────────────────────────
// MAINTENANCE CONTROLLER
// ─────────────────────────────────────────────────────────────
class MaintenanceController extends Controller
{
    public function store(Request $request, Lease $lease)
    {
        $validated = $request->validate([
            'category'    => 'required|in:plumbing,electrical,heating,structural,appliance,other',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:2000',
        ]);

        $mr = $lease->maintenanceRequests()->create(array_merge($validated, [
            'raised_by' => Auth::id(),
        ]));

        // TODO: notify landlord

        return back()->with('success', 'Maintenance request submitted.');
    }

    public function update(Request $request, MaintenanceRequest $maintenanceRequest)
    {
        $this->authorize('update', $maintenanceRequest);

        $validated = $request->validate([
            'status'           => 'required|in:acknowledged,in_progress,resolved',
            'resolution_notes' => 'nullable|string|max:2000',
        ]);

        $maintenanceRequest->update(array_merge($validated, [
            'acknowledged_at' => $maintenanceRequest->acknowledged_at ?? now(),
            'resolved_at'     => $validated['status'] === 'resolved' ? now() : null,
        ]));

        return back()->with('success', 'Maintenance request updated.');
    }
}

// ─────────────────────────────────────────────────────────────
// MESSAGE CONTROLLER
// ─────────────────────────────────────────────────────────────
class MessageController extends Controller
{
    public function store(Request $request, Lease $lease)
    {
        $this->authorize('message', $lease);

        $validated = $request->validate(['body' => 'required|string|max:5000']);

        $lease->messages()->create([
            'sender_id' => Auth::id(),
            'body'      => $validated['body'],
        ]);

        return back();
    }
}

// ─────────────────────────────────────────────────────────────
// REPATRIATION CONTROLLER
// Landlord manually logs cross-border transfers
// ─────────────────────────────────────────────────────────────
class RepatriationController extends Controller
{
    public function store(Request $request, Property $property)
    {
        $this->authorize('update', $property);

        $validated = $request->validate([
            'amount_minor_units'  => 'required|integer|min:1',
            'currency_code'       => 'required|string|size:3',
            'home_currency_code'  => 'required|string|size:3',
            'home_amount_minor_units' => 'required|integer|min:1',
            'repatriated_on'      => 'required|date',
            'notes'               => 'nullable|string|max:1000',
        ]);

        $fxRate = (int)round(
            ($validated['home_amount_minor_units'] / $validated['amount_minor_units']) * 1_000_000
        );

        \App\Models\RepatriationLog::create(array_merge($validated, [
            'landlord_id'       => Auth::id(),
            'property_id'       => $property->id,
            'fx_rate_snapshot'  => $fxRate,
        ]));

        return back()->with('success', 'Repatriation logged.');
    }
}
