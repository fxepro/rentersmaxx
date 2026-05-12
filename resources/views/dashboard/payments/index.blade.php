@extends('dashboard.layout')
@section('page-title', 'Payments')
@section('content')
<div class="db-stats" style="margin-bottom:20px">
  <div class="db-stat green">
    <div class="db-stat-label">This month</div>
    <div class="db-stat-value">${{ number_format($thisMonth/100,0) }}</div>
    <div class="db-stat-sub">{{ now()->format('M Y') }}</div>
  </div>
  <div class="db-stat">
    <div class="db-stat-label">This year</div>
    <div class="db-stat-value">${{ number_format($thisYear/100,0) }}</div>
    <div class="db-stat-sub">{{ now()->year }}</div>
  </div>
  <div class="db-stat terra">
    <div class="db-stat-label">Pending</div>
    <div class="db-stat-value">{{ $pending }}</div>
    <div class="db-stat-sub">Awaiting collection</div>
  </div>
  <div class="db-stat">
    <div class="db-stat-label">Failed</div>
    <div class="db-stat-value">{{ $failed }}</div>
    <div class="db-stat-sub">Require attention</div>
  </div>
</div>

<div class="db-card">
  <div class="db-table-wrap">
    <table class="db-table">
      <thead><tr><th>Property</th><th>Tenant</th><th>Due</th><th>Amount</th><th>Home equiv.</th><th>Collected</th><th>Status</th></tr></thead>
      <tbody>
        @forelse($payments as $pay)
        <tr>
          <td>
            <div class="db-flag-name">
              <span class="db-flag">{{ config('countries.'.$pay->lease->property->country_code.'.flag','🏠') }}</span>
              <div><div class="db-name">{{ $pay->lease->property->name }}</div><div class="db-sub">{{ $pay->lease->property->city }}</div></div>
            </div>
          </td>
          <td>{{ $pay->lease->tenant->first_name ?? '—' }}</td>
          <td>{{ $pay->due_date?->format('d M Y') }}</td>
          <td><strong>{{ number_format($pay->amount_minor_units/100,2) }} {{ $pay->currency_code }}</strong></td>
          <td>{{ number_format($pay->home_amount_minor_units/100,2) }} {{ $pay->home_currency_code }}</td>
          <td>{{ $pay->collected_at?->format('d M Y') ?? '—' }}</td>
          <td><span class="badge badge-{{ $pay->status==='success'?'green':($pay->status==='failed'?'red':'gold') }}">{{ ucfirst($pay->status) }}</span></td>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center;padding:32px;color:var(--text-light)">No payments yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div style="padding:16px 20px;border-top:1px solid var(--cream-dark)">
    {{ $payments->links() }}
  </div>
</div>
@endsection
