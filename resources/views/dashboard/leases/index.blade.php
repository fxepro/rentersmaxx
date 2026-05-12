{{-- resources/views/dashboard/leases/index.blade.php --}}
@extends('dashboard.layout')
@section('page-title', 'Leases')
@section('content')
@if($leases->isEmpty())
  <div class="db-empty" style="min-height:60vh">
    <div class="db-empty-icon">📋</div>
    <h3>No leases yet.</h3>
    <p>Add a property first, then create a lease to invite your tenant.</p>
    <a href="{{ route('properties.index') }}" class="db-btn db-btn-primary">Go to properties</a>
  </div>
@else
<div class="db-card">
  <div class="db-table-wrap">
    <table class="db-table">
      <thead><tr><th>Property</th><th>Tenant</th><th>Rent</th><th>Due</th><th>Start</th><th>Status</th><th></th></tr></thead>
      <tbody>
        @foreach($leases as $l)
        <tr>
          <td>
            <div class="db-flag-name">
              <span class="db-flag">{{ config('countries.'.$l->property->country_code.'.flag','🏠') }}</span>
              <div><div class="db-name">{{ $l->property->name }}</div><div class="db-sub">{{ $l->property->city }}</div></div>
            </div>
          </td>
          <td><strong>{{ $l->tenant->first_name }} {{ $l->tenant->last_name }}</strong></td>
          <td><strong>{{ number_format($l->rent_minor_units/100,0) }} {{ $l->currency_code }}</strong></td>
          <td>{{ $l->due_day }}th</td>
          <td>{{ $l->start_date->format('d M Y') }}</td>
          <td><span class="badge badge-{{ $l->status==='active'?'green':($l->status==='expired'?'grey':'gold') }}">{{ ucfirst($l->status) }}</span></td>
          <td><a href="{{ route('leases.show',$l) }}" class="db-btn db-btn-ghost" style="font-size:12px;padding:5px 10px">View</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif
@endsection
