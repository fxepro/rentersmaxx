@extends('dashboard.layout')
@section('page-title', 'Add Property')
@section('breadcrumb', '← Properties')
@section('content')
<div style="max-width:640px">
  <div class="db-card">
    <div class="db-card-header"><span class="db-card-title">Property details</span></div>
    <div class="db-card-body">
      <form method="POST" action="{{ route('properties.store') }}" class="db-form">
        @csrf
        @if($errors->any())
          <div class="db-alert db-alert-error">{{ $errors->first() }}</div>
        @endif
        <div class="db-form-row">
          <div class="db-form-group">
            <label>Property name <span class="req">*</span></label>
            <input type="text" name="name" class="db-input" placeholder="e.g. Bandra West Flat" value="{{ old('name') }}" required>
          </div>
          <div class="db-form-group">
            <label>Country <span class="req">*</span></label>
            <select name="country_code" class="db-select" required>
              <option value="">Select country</option>
              @foreach(config('countries') as $code => $c)
                <option value="{{ $code }}" {{ old('country_code')==$code?'selected':'' }}>
                  {{ $code }} — {{ $c['currency'] }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="db-form-group">
          <label>Address <span class="req">*</span></label>
          <input type="text" name="address_line1" class="db-input" placeholder="Street address" value="{{ old('address_line1') }}" required>
        </div>
        <div class="db-form-row">
          <div class="db-form-group">
            <label>City <span class="req">*</span></label>
            <input type="text" name="city" class="db-input" placeholder="City" value="{{ old('city') }}" required>
          </div>
          <div class="db-form-group">
            <label>Type</label>
            <select name="type" class="db-select">
              <option value="apartment" {{ old('type')=='apartment'?'selected':'' }}>Apartment</option>
              <option value="house" {{ old('type')=='house'?'selected':'' }}>House</option>
              <option value="commercial" {{ old('type')=='commercial'?'selected':'' }}>Commercial</option>
              <option value="other" {{ old('type')=='other'?'selected':'' }}>Other</option>
            </select>
          </div>
        </div>
        <div class="db-form-row">
          <div class="db-form-group">
            <label>Bedrooms</label>
            <input type="number" name="bedrooms" class="db-input" placeholder="e.g. 2" min="0" max="99" value="{{ old('bedrooms') }}">
          </div>
          <div class="db-form-group">
            <label>Postal code</label>
            <input type="text" name="postal_code" class="db-input" placeholder="Optional" value="{{ old('postal_code') }}">
          </div>
        </div>
        <button type="submit" class="db-form-submit">Save property →</button>
      </form>
    </div>
  </div>
</div>
@endsection
