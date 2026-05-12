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
