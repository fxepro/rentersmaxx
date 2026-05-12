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
