<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessWebhookJob;
use App\Models\{Lease, Payment, Property, WaitlistEmail, MaintenanceRequest, Message};
use App\Payment\ProcessorFactory;
use App\Services\{PaymentService, LedgerService};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
