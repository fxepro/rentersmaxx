@extends('dashboard.layout')
@section('page-title', 'New Lease')
@section('breadcrumb', '← '.$property->name)
@section('content')
<div style="max-width:640px">
  <div class="db-card">
    <div class="db-card-header">
      <span class="db-card-title">Create lease — {{ $property->name }}</span>
    </div>
    <div class="db-card-body">
      <form method="POST" action="{{ route('leases.store',$property) }}" class="db-form">
        @csrf
        @if($errors->any())<div class="db-alert db-alert-error">{{ $errors->first() }}</div>@endif
        <div class="db-form-group">
          <label>Tenant email <span class="req">*</span></label>
          <input type="email" name="tenant_email" class="db-input" placeholder="tenant@example.com" value="{{ old('tenant_email') }}" required>
          <span class="db-form-hint">We'll send them an invite to set up their payment mandate.</span>
        </div>
        <div class="db-form-row">
          <div class="db-form-group">
            <label>Monthly rent ({{ $property->currency_code }}) <span class="req">*</span></label>
            <input type="number" name="rent_amount" class="db-input" placeholder="e.g. 1500" min="1" value="{{ old('rent_amount') }}" required>
            <span class="db-form-hint">Enter full amount e.g. 1500 (not 150000)</span>
          </div>
          <div class="db-form-group">
            <label>Due day of month <span class="req">*</span></label>
            <select name="due_day" class="db-select" required>
              @for($i=1;$i<=28;$i++)
                <option value="{{ $i }}" {{ old('due_day',1)==$i?'selected':'' }}>{{ $i }}{{ match(true){$i===1=>'st',$i===2=>'nd',$i===3=>'rd',default=>'th'} }}</option>
              @endfor
            </select>
          </div>
        </div>
        <div class="db-form-row">
          <div class="db-form-group">
            <label>Start date <span class="req">*</span></label>
            <input type="date" name="start_date" class="db-input" value="{{ old('start_date', now()->format('Y-m-d')) }}" required>
          </div>
          <div class="db-form-group">
            <label>End date</label>
            <input type="date" name="end_date" class="db-input" value="{{ old('end_date') }}">
            <span class="db-form-hint">Leave blank for rolling tenancy</span>
          </div>
        </div>
        <div class="db-form-row">
          <div class="db-form-group">
            <label>Deposit ({{ $property->currency_code }})</label>
            <input type="number" name="deposit_amount" class="db-input" placeholder="Optional" min="0" value="{{ old('deposit_amount') }}">
          </div>
          <div class="db-form-group">
            <label>Grace period (days)</label>
            <input type="number" name="grace_period_days" class="db-input" value="{{ old('grace_period_days',5) }}" min="0" max="30">
          </div>
        </div>
        <button type="submit" class="db-form-submit">Create lease & invite tenant →</button>
      </form>
    </div>
  </div>
</div>
@endsection
