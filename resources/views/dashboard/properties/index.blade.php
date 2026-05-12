@extends('dashboard.layout')
@section('page-title', 'Properties')
@section('topbar-actions')
  <div style="display:flex;align-items:center;gap:8px">
    <div style="display:flex;background:var(--cream-dark);border-radius:8px;padding:3px;gap:2px" id="viewToggle">
      <button onclick="setView('card')" id="btnCard" class="view-btn active" title="Card view">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="9" y="1" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="1" y="9" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="9" y="9" width="6" height="6" rx="1.5" fill="currentColor"/></svg>
      </button>
      <button onclick="setView('table')" id="btnTable" class="view-btn" title="Table view">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="2" width="14" height="2.5" rx="1" fill="currentColor"/><rect x="1" y="6.5" width="14" height="2.5" rx="1" fill="currentColor" opacity=".5"/><rect x="1" y="11" width="14" height="2.5" rx="1" fill="currentColor" opacity=".5"/></svg>
      </button>
    </div>
    <a href="{{ route('properties.create') }}" class="db-btn db-btn-primary">+ Add property</a>
  </div>
@endsection

@push('styles')
<style>
.view-btn { display:flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:6px;border:none;background:transparent;color:var(--text-light);cursor:pointer;transition:all 0.15s; }
.view-btn.active { background:var(--white);color:var(--text-dark);box-shadow:0 1px 3px rgba(0,0,0,0.1); }
.view-btn:hover:not(.active) { color:var(--text-mid); }

/* ── CARD VIEW ── */
#cardView { display:grid;grid-template-columns:repeat(3,1fr);gap:16px; }
#tableView { display:none; }

/* ── PROPERTY CARD ── */
.prop-card { background:var(--white);border:1px solid var(--cream-dark);border-radius:var(--radius);padding:22px;transition:all 0.15s;text-decoration:none;display:block;position:relative;overflow:hidden; }
.prop-card::before { content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--terra);opacity:0;transition:opacity 0.2s; }
.prop-card:hover { border-color:rgba(196,98,45,0.3);box-shadow:0 4px 16px rgba(0,0,0,0.06);transform:translateY(-1px); }
.prop-card:hover::before { opacity:1; }
.prop-card-top { display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:14px; }
.prop-card-flag { font-size:28px;line-height:1; }
.prop-card-name { font-size:16px;font-weight:600;color:var(--text-dark);margin-bottom:3px;line-height:1.3; }
.prop-card-addr { font-size:13px;color:var(--text-light); }
.prop-card-divider { height:1px;background:var(--cream-dark);margin:14px 0; }
.prop-card-rent { font-family:'Fraunces',serif;font-size:22px;color:var(--text-dark);letter-spacing:-0.02em;margin-bottom:3px; }
.prop-card-meta { font-size:12px;color:var(--text-light);display:flex;gap:12px;flex-wrap:wrap;align-items:center; }
.prop-card-footer { display:flex;align-items:center;justify-content:space-between;margin-top:14px;padding-top:14px;border-top:1px solid var(--cream-dark); }
.prop-card-method { display:flex;align-items:center;gap:6px;font-size:12px;color:var(--text-light); }

@media (max-width:1200px) { #cardView { grid-template-columns:repeat(2,1fr); } }
@media (max-width:800px) { #cardView { grid-template-columns:1fr; } }
</style>
@endpush

@section('content')

@if($properties->isEmpty())
  <div class="db-empty" style="min-height:60vh">
    <div class="db-empty-icon">🏠</div>
    <h3>No properties yet.</h3>
    <p>Add your first property to start collecting rent.</p>
    <a href="{{ route('properties.create') }}" class="db-btn db-btn-primary">+ Add property</a>
  </div>
@else

  {{-- ── CARD VIEW ── --}}
  <div id="cardView">
    @foreach($properties as $p)
    @php
      $lease   = $p->leases->where('status','active')->first();
      $country = config('countries.'.$p->country_code, []);
      $flags   = ['FR'=>'🇫🇷','GB'=>'🇬🇧','US'=>'🇺🇸','IN'=>'🇮🇳','DE'=>'🇩🇪','AU'=>'🇦🇺','CA'=>'🇨🇦','NG'=>'🇳🇬','ID'=>'🇮🇩','PH'=>'🇵🇭','BR'=>'🇧🇷','MX'=>'🇲🇽','ZA'=>'🇿🇦','KE'=>'🇰🇪','SG'=>'🇸🇬','JP'=>'🇯🇵','ES'=>'🇪🇸','IT'=>'🇮🇹','NL'=>'🇳🇱','PT'=>'🇵🇹','BE'=>'🇧🇪','SE'=>'🇸🇪','NO'=>'🇳🇴','DK'=>'🇩🇰','PL'=>'🇵🇱','CH'=>'🇨🇭','MY'=>'🇲🇾','TH'=>'🇹🇭','VN'=>'🇻🇳'];
      $flag    = $flags[$p->country_code] ?? "🏠";
    @endphp
    <a href="{{ route('properties.show',$p) }}" class="prop-card">
      <div class="prop-card-top">
        <span class="prop-card-flag">{{ $flag }}</span>
        <span class="badge {{ $lease ? 'badge-green' : 'badge-grey' }}">{{ $lease ? 'Tenanted' : 'Vacant' }}</span>
      </div>
      <div class="prop-card-name">{{ $p->name }}</div>
      <div class="prop-card-addr">{{ $p->city }}, {{ $p->country_code }}</div>
      <div class="prop-card-divider"></div>
      @if($lease)
        <div class="prop-card-rent">{{ number_format($lease->rent_minor_units/100,0) }} <span style="font-size:15px;color:var(--text-light)">{{ $lease->currency_code }}</span></div>
        <div class="prop-card-meta">
          @php $day=$lease->due_day; $sfx=$day===1?'st':($day===2?'nd':($day===3?'rd':'th')); @endphp
          <span>Due {{ $day }}{{ $sfx }}</span>
          <span>·</span>
          <span>{{ $lease->tenant->first_name ?? '—' }} {{ $lease->tenant->last_name ?? '' }}</span>
        </div>
      @else
        <div class="prop-card-rent" style="font-size:16px;color:var(--text-light)">No active lease</div>
        <div class="prop-card-meta">Add a tenant →</div>
      @endif
      <div class="prop-card-footer">
        <div class="prop-card-method">
          <span>{{ $country['method'] ?? '—' }}</span>
        </div>
        <span style="font-size:12px;color:var(--text-light)">{{ ucfirst($p->type) }}@if($p->bedrooms) · {{ $p->bedrooms }}bd@endif</span>
      </div>
    </a>
    @endforeach
  </div>

  {{-- ── TABLE VIEW ── --}}
  <div id="tableView">
    <div class="db-card">
      <div class="db-table-wrap">
        <table class="db-table">
          <thead>
            <tr>
              <th>Property</th>
              <th>Country</th>
              <th>Tenant</th>
              <th>Rent / mo</th>
              <th>Method</th>
              <th>Due</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($properties as $p)
            @php
              $lease   = $p->leases->where('status','active')->first();
              $flags = ["FR"=>"🇫🇷","GB"=>"🇬🇧","US"=>"🇺🇸","IN"=>"🇮🇳","DE"=>"🇩🇪","AU"=>"🇦🇺","CA"=>"🇨🇦","NG"=>"🇳🇬","ID"=>"🇮🇩","PH"=>"🇵🇭","BR"=>"🇧🇷","MX"=>"🇲🇽","ZA"=>"🇿🇦","KE"=>"🇰🇪","SG"=>"🇸🇬","JP"=>"🇯🇵","ES"=>"🇪🇸","IT"=>"🇮🇹","NL"=>"🇳🇱","PT"=>"🇵🇹","BE"=>"🇧🇪","SE"=>"🇸🇪","NO"=>"🇳🇴","DK"=>"🇩🇰","PL"=>"🇵🇱","CH"=>"🇨🇭","MY"=>"🇲🇾","TH"=>"🇹🇭","VN"=>"🇻🇳"];
              $flag    = $flags[$p->country_code] ?? "🏠";
              $country = config("countries.".$p->country_code,[]);
            @endphp
            <tr>
              <td>
                <div style="display:flex;align-items:center;gap:10px">
                  <span style="font-size:20px">{{ $flag }}</span>
                  <div>
                    <div style="font-weight:600;color:var(--text-dark)">{{ $p->name }}</div>
                    <div style="font-size:12px;color:var(--text-light)">{{ $p->city }}</div>
                  </div>
                </div>
              </td>
              <td>{{ $p->country_code }}</td>
              <td>
                @if($lease)
                  <strong>{{ $lease->tenant->first_name }} {{ $lease->tenant->last_name }}</strong>
                @else
                  <span style="color:var(--text-light)">—</span>
                @endif
              </td>
              <td>
                @if($lease)
                  <strong>{{ number_format($lease->rent_minor_units/100,0) }} {{ $lease->currency_code }}</strong>
                @else —@endif
              </td>
              <td>{{ $country['method'] ?? '—' }}</td>
              <td>@if($lease){{ $lease->due_day }}th@else —@endif</td>
              <td><span class="badge {{ $lease ? 'badge-green' : 'badge-grey' }}">{{ $lease ? 'Tenanted' : 'Vacant' }}</span></td>
              <td><a href="{{ route('properties.show',$p) }}" class="db-btn db-btn-ghost" style="font-size:13px;padding:6px 12px">View →</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endif
@endsection

@push('scripts')
<script>
function setView(v) {
  document.getElementById('cardView').style.display  = v==='card'  ? 'grid' : 'none';
  document.getElementById('tableView').style.display = v==='table' ? 'block': 'none';
  document.getElementById('btnCard').classList.toggle('active',  v==='card');
  document.getElementById('btnTable').classList.toggle('active', v==='table');
  localStorage.setItem('propView', v);
}
// Restore last used view
const saved = localStorage.getItem('propView');
if (saved) setView(saved);
</script>
@endpush
