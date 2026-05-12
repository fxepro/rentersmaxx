<?php
namespace App\Http\Controllers;
use App\Models\{Lease, Property, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LeaseController extends Controller
{
    public function index()
    {
        $leases = Lease::whereHas('property', fn($q) => $q->where('landlord_id', Auth::id()))
            ->with(['property','tenant','mandates'])
            ->latest()->get();
        return view('dashboard.leases.index', compact('leases'));
    }

    public function create(Property $property)
    {
        $this->authorize('view', $property);
        return view('dashboard.leases.create', compact('property'));
    }

    public function store(Request $request, Property $property)
    {
        $this->authorize('view', $property);
        $validated = $request->validate([
            'tenant_email'     => 'required|email',
            'rent_amount'      => 'required|numeric|min:1',
            'due_day'          => 'required|integer|min:1|max:28',
            'start_date'       => 'required|date',
            'end_date'         => 'nullable|date|after:start_date',
            'deposit_amount'   => 'nullable|numeric|min:0',
            'grace_period_days'=> 'nullable|integer|min:0|max:30',
        ]);

        $tenant = User::firstOrCreate(
            ['email' => $validated['tenant_email']],
            ['first_name' => 'Tenant', 'last_name' => '', 'role' => 'tenant', 'password' => bcrypt(Str::random(32))]
        );

        $property->leases()->create([
            'tenant_id'          => $tenant->id,
            'rent_minor_units'   => (int)($validated['rent_amount'] * 100),
            'currency_code'      => $property->currency_code,
            'due_day'            => $validated['due_day'],
            'grace_period_days'  => $validated['grace_period_days'] ?? 5,
            'start_date'         => $validated['start_date'],
            'end_date'           => $validated['end_date'] ?? null,
            'deposit_minor_units'=> isset($validated['deposit_amount']) ? (int)($validated['deposit_amount'] * 100) : null,
            'status'             => 'active',
        ]);

        return redirect()->route('leases.index')->with('success', 'Lease created.');
    }

    public function show(Lease $lease)
    {
        $this->authorize('view', $lease);
        $lease->load(['property','tenant','payments','mandates']);
        return view('dashboard.leases.show', compact('lease'));
    }
}
