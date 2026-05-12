@extends('dashboard.layout')
@section('page-title', 'Maintenance')
@section('content')
@if($requests->isEmpty())
  <div class="db-empty" style="min-height:60vh">
    <div class="db-empty-icon">🔧</div>
    <h3>No maintenance requests.</h3>
    <p>Requests submitted by tenants will appear here.</p>
  </div>
@else
<div class="db-card">
  <div class="db-table-wrap">
    <table class="db-table">
      <thead><tr><th>Property</th><th>Tenant</th><th>Title</th><th>Category</th><th>Submitted</th><th>Status</th><th></th></tr></thead>
      <tbody>
        @foreach($requests as $mr)
        <tr>
          <td>
            <div class="db-flag-name">
              <span class="db-flag">{{ config('countries.'.$mr->lease->property->country_code.'.flag','🏠') }}</span>
              <div class="db-name">{{ $mr->lease->property->name }}</div>
            </div>
          </td>
          <td>{{ $mr->raisedBy->first_name ?? '—' }}</td>
          <td><strong>{{ $mr->title }}</strong></td>
          <td><span class="badge badge-navy">{{ ucfirst($mr->category) }}</span></td>
          <td>{{ $mr->created_at->format('d M Y') }}</td>
          <td>
            <span class="badge badge-{{ match($mr->status){'submitted'=>'terra','acknowledged'=>'gold','in_progress'=>'navy','resolved'=>'green',default=>'grey'} }}">
              {{ ucfirst(str_replace('_',' ',$mr->status)) }}
            </span>
          </td>
          <td>
            <form method="POST" action="{{ route('maintenance.update',$mr) }}" style="display:inline">
              @csrf @method('PATCH')
              <select name="status" class="db-select" style="font-size:12px;padding:4px 28px 4px 8px;width:auto" onchange="this.form.submit()">
                @foreach(['submitted','acknowledged','in_progress','resolved'] as $s)
                  <option value="{{ $s }}" {{ $mr->status===$s?'selected':'' }}>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
                @endforeach
              </select>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif
@endsection
