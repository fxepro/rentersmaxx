@extends('dashboard.layout')
@section('page-title', 'Properties')
@section('topbar-actions')
  <a href="{{ route('properties.create') }}" class="db-btn db-btn-primary">+ Add property</a>
@endsection
@section('content')
@if($properties->isEmpty())
  <div class="db-empty" style="min-height:60vh">
    <div class="db-empty-icon">🏠</div>
    <h3>No properties yet.</h3>
    <p>Add your first property to start collecting rent.</p>
    <a href="{{ route('properties.create') }}" class="db-btn db-btn-primary">+ Add property</a>
  </div>
@else
  <div class="db-grid-3">
    @foreach($properties as $p)
    @php $lease = $p->leases->where('status','active')->first(); @endphp
    <a href="{{ route('properties.show',$p) }}" class="prop-card">
      <div class="prop-card-top">
        <span class="prop-card-flag">{{ config('countries.'.$p->country_code.'.flag','🏠') }}</span>
        <span class="badge {{ $lease?'badge-green':'badge-grey' }}">{{ $lease?'Tenanted':'Vacant' }}</span>
      </div>
      <div class="prop-card-name">{{ $p->name }}</div>
      <div class="prop-card-addr">{{ $p->city }}, {{ $p->country_code }}</div>
      @if($lease)
        <div class="prop-card-rent">{{ number_format($lease->rent_minor_units/100,0) }} {{ $lease->currency_code }}</div>
        <div class="prop-card-meta">
          <span>Due {{ $lease->due_day }}th</span>
          <span>{{ $lease->tenant->first_name ?? '—' }}</span>
        </div>
      @else
        <div class="prop-card-rent" style="color:var(--text-light);font-size:16px">No active lease</div>
      @endif
    </a>
    @endforeach
  </div>
@endif
@endsection
