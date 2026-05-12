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
