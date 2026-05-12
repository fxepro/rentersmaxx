<?php
namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $uid = Auth::id();
        $payments = Payment::whereHas('lease.property', fn($q) => $q->where('landlord_id',$uid))
            ->with(['lease.property','lease.tenant'])
            ->orderByDesc('due_date')
            ->paginate(20);

        $thisMonth = Payment::whereHas('lease.property',fn($q)=>$q->where('landlord_id',$uid))
            ->where('status','success')->whereMonth('collected_at',now()->month)->whereYear('collected_at',now()->year)
            ->sum('home_amount_minor_units');
        $thisYear  = Payment::whereHas('lease.property',fn($q)=>$q->where('landlord_id',$uid))
            ->where('status','success')->whereYear('collected_at',now()->year)
            ->sum('home_amount_minor_units');
        $pending   = Payment::whereHas('lease.property',fn($q)=>$q->where('landlord_id',$uid))->where('status','pending')->count();
        $failed    = Payment::whereHas('lease.property',fn($q)=>$q->where('landlord_id',$uid))->where('status','failed')->count();

        return view('dashboard.payments.index', compact('payments','thisMonth','thisYear','pending','failed'));
    }
}
