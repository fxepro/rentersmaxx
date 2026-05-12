@extends('dashboard.layout')
@section('page-title', 'Dashboard')
@section('topbar-actions')
  <a href="{{ route('properties.create') }}" class="db-btn db-btn-primary">+ Add property</a>
@endsection
@section('content')
@php
  $user         = auth()->user();
  $properties   = $user->properties()->with(['leases'=>fn($q)=>$q->where('status','active')])->get();
  $totalProps   = $properties->count();
  $activeLeases = $properties->flatMap->leases->count();
  $thisMonth    = \App\Models\Payment::whereHas('lease.property',fn($q)=>$q->where('landlord_id',$user->id))->where('status','success')->whereMonth('collected_at',now()->month)->whereYear('collected_at',now()->year)->sum('home_amount_minor_units');
  $arrears      = \App\Models\Payment::whereHas('lease.property',fn($q)=>$q->where('landlord_id',$user->id))->where('status','pending')->where('due_date','<',now()->subDays(1))->count();
  $recentPay    = \App\Models\Payment::whereHas('lease.property',fn($q)=>$q->where('landlord_id',$user->id))->with(['lease.property','lease.tenant'])->orderByDesc('collected_at')->limit(8)->get();
@endphp
@if($totalProps===0)
<div class="db-empty" style="min-height:70vh">
  <div class="db-empty-icon">🏠</div>
  <h3>Welcome to Rentersmaxx.</h3>
  <p>Add your first property to get started.</p>
  <a href="{{ route('properties.create') }}" class="db-btn db-btn-primary" style="font-size:14px;padding:10px 22px;">+ Add your first property</a>
</div>
@else
<div class="db-stats">
  <div class="db-stat green"><div class="db-stat-label">Collected this month</div><div class="db-stat-value">${{ number_format($thisMonth/100,0) }}</div><div class="db-stat-sub">{{ now()->format('F Y') }}</div></div>
  <div class="db-stat"><div class="db-stat-label">Properties</div><div class="db-stat-value">{{ $totalProps }}</div><div class="db-stat-sub">{{ $properties->pluck('country_code')->unique()->count() }} countries</div></div>
  <div class="db-stat"><div class="db-stat-label">Active leases</div><div class="db-stat-value">{{ $activeLeases }}</div><div class="db-stat-sub">{{ $totalProps-$activeLeases }} vacant</div></div>
  <div class="db-stat {{ $arrears>0?'terra':'' }}"><div class="db-stat-label">Arrears</div><div class="db-stat-value">{{ $arrears }}</div><div class="db-stat-sub">{{ $arrears>0?'Overdue':'All current' }}</div></div>
</div>
<div class="db-grid-2">
  <div class="db-card">
    <div class="db-card-header"><span class="db-card-title">Properties</span><a href="{{ route('properties.index') }}" class="db-btn db-btn-ghost" style="font-size:12px;padding:5px 10px">View all</a></div>
    <div style="padding:0">
      @foreach($properties->take(6) as $p)
      <a href="{{ route('properties.show',$p) }}" style="display:flex;align-items:center;gap:12px;padding:13px 20px;border-bottom:1px solid var(--cream-dark);text-decoration:none">
        <span style="font-size:20px">{{ config('countries.'.$p->country_code.'.flag','🏠') }}</span>
        <div style="flex:1;min-width:0"><div style="font-size:13px;font-weight:600;color:var(--text-dark);overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $p->name }}</div><div style="font-size:12px;color:var(--text-light)">{{ $p->city }}</div></div>
        <div style="text-align:right;flex-shrink:0"><div style="font-size:12px;font-weight:600;color:var(--text-dark)">{{ $p->currency_code }}</div><span class="badge {{ $p->leases->isNotEmpty()?'badge-green':'badge-grey' }}" style="font-size:10px">{{ $p->leases->isNotEmpty()?'Tenanted':'Vacant' }}</span></div>
      </a>
      @endforeach
    </div>
  </div>
  <div class="db-card">
    <div class="db-card-header"><span class="db-card-title">Recent payments</span><a href="{{ route('payments.index') }}" class="db-btn db-btn-ghost" style="font-size:12px;padding:5px 10px">View all</a></div>
    @if($recentPay->isEmpty())<div class="db-empty" style="padding:32px"><p>No payments yet.</p></div>
    @else
    <div style="padding:0">
      @foreach($recentPay as $pay)
      <div style="display:flex;align-items:center;gap:12px;padding:12px 20px;border-bottom:1px solid var(--cream-dark)">
        <div style="flex:1;min-width:0"><div style="font-size:13px;font-weight:500;color:var(--text-dark)">{{ $pay->lease->property->name??'—' }}</div><div style="font-size:11px;color:var(--text-light)">{{ $pay->lease->tenant->first_name??'' }} · {{ $pay->due_date?->format('d M') }}</div></div>
        <div style="text-align:right;flex-shrink:0"><div style="font-size:13px;font-weight:600;color:var(--text-dark)">{{ number_format($pay->amount_minor_units/100,0) }} {{ $pay->currency_code }}</div><span class="badge badge-{{ $pay->status==='success'?'green':($pay->status==='failed'?'red':'gold') }}" style="font-size:10px">{{ ucfirst($pay->status) }}</span></div>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</div>
@endif
@endsection
