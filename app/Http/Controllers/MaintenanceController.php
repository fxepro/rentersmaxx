<?php
namespace App\Http\Controllers;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function index()
    {
        $requests = MaintenanceRequest::whereHas('lease.property', fn($q) => $q->where('landlord_id', Auth::id()))
            ->with(['lease.property','raisedBy'])
            ->orderByDesc('created_at')->get();
        return view('dashboard.maintenance.index', compact('requests'));
    }

    public function update(Request $request, MaintenanceRequest $maintenanceRequest)
    {
        $this->authorize('update', $maintenanceRequest);
        $request->validate(['status' => 'required|in:submitted,acknowledged,in_progress,resolved']);
        $maintenanceRequest->update([
            'status'          => $request->status,
            'acknowledged_at' => $maintenanceRequest->acknowledged_at ?? now(),
            'resolved_at'     => $request->status === 'resolved' ? now() : null,
        ]);
        return back()->with('success', 'Status updated.');
    }
}
