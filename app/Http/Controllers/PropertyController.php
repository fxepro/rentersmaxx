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
