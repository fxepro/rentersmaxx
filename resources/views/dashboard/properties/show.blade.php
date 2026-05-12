@extends('dashboard.layout')
@section('page-title', $property->name)
@section('breadcrumb', '← Properties')
@section('topbar-actions')
  <a href="{{ route('leases.create', $property) }}" class="db-btn db-btn-primary">+ Add lease</a>
@endsection
@section('content')
<div class="db-grid-2" style="margin-bottom:16px">
  <div class="db-card">
    <div class="db-card-header"><span class="db-card-title">Property info</span></div>
    <div class="db-card-body">
      <table style="width:100%;font-size:13px;border-collapse:collapse">
        @foreach([
          ['Country', $property->country_code],
          ['Currency', $property->currency_code],
          ['Payment method', config('countries.'.$property->country_code.'.method','—')],
          ['Address', $property->address_line1.', '.$property->city],
          ['Type', ucfirst($property->type)],
          ['Bedrooms', $property->bedrooms ?? '—'],
        ] as [$label,$val])
        <tr style="border-bottom:1px solid var(--cream-dark)">
          <td style="padding:10px 0;color:var(--text-light);width:40%">{{ $label }}</td>
          <td style="padding:10px 0;font-weight:500;color:var(--text-dark)">{{ $val }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div class="db-card">
    <div class="db-card-header"><span class="db-card-title">Active lease</span></div>
    @php $lease = $property->leases->where('status','active')->first(); @endphp
    @if($lease)
    <div class="db-card-body">
      <table style="width:100%;font-size:13px;border-collapse:collapse">
        @foreach([
          ['Tenant', $lease->tenant->first_name.' '.$lease->tenant->last_name],
          ['Rent', number_format($lease->rent_minor_units/100,0).' '.$lease->currency_code],
          ['Due day', $lease->due_day.'th of month'],
          ['Start', $lease->start_date->format('d M Y')],
          ['End', $lease->end_date?->format('d M Y') ?? 'Rolling'],
          ['Status', ucfirst($lease->status)],
        ] as [$label,$val])
        <tr style="border-bottom:1px solid var(--cream-dark)">
          <td style="padding:10px 0;color:var(--text-light);width:40%">{{ $label }}</td>
          <td style="padding:10px 0;font-weight:500;color:var(--text-dark)">{{ $val }}</td>
        </tr>
        @endforeach
      </table>
      <a href="{{ route('leases.show',$lease) }}" class="db-btn db-btn-ghost" style="margin-top:14px;font-size:12px">View lease →</a>
    </div>
    @else
    <div class="db-empty" style="padding:28px">
      <p>No active lease.</p>
      <a href="{{ route('leases.create',$property) }}" class="db-btn db-btn-primary" style="font-size:13px">+ Create lease</a>
    </div>
    @endif
  </div>
</div>

<!-- Payment history -->
<div class="db-card">
  <div class="db-card-header"><span class="db-card-title">Payment history</span></div>
  @php $payments = $property->leases->flatMap->payments->sortByDesc('due_date')->take(12); @endphp
  @if($payments->isEmpty())
    <div class="db-empty" style="padding:28px"><p>No payments yet.</p></div>
  @else
  <div class="db-table-wrap">
    <table class="db-table">
      <thead><tr><th>Date</th><th>Tenant</th><th>Amount</th><th>Home equiv.</th><th>Status</th></tr></thead>
      <tbody>
        @foreach($payments as $pay)
        <tr>
          <td>{{ $pay->due_date?->format('d M Y') }}</td>
          <td>{{ $pay->lease->tenant->first_name ?? '—' }}</td>
          <td><strong>{{ number_format($pay->amount_minor_units/100,2) }} {{ $pay->currency_code }}</strong></td>
          <td>{{ number_format($pay->home_amount_minor_units/100,2) }} {{ $pay->home_currency_code }}</td>
          <td><span class="badge badge-{{ $pay->status==='success'?'green':($pay->status==='failed'?'red':'gold') }}">{{ ucfirst($pay->status) }}</span></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>
@endsection
