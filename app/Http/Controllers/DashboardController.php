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
