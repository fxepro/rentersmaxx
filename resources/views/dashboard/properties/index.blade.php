@extends('dashboard.layout')
@section('page-title', 'Properties')

@section('topbar-actions')
<div style="display:flex;align-items:center;gap:8px">
  <div style="display:flex;background:var(--cream-dark);border-radius:8px;padding:3px;gap:2px">
    <button onclick="setView('card')" id="btnCard" class="view-btn active" title="Card view">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="9" y="1" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="1" y="9" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="9" y="9" width="6" height="6" rx="1.5" fill="currentColor"/></svg>
    </button>
    <button onclick="setView('table')" id="btnTable" class="view-btn" title="Table view">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="2" width="14" height="2.5" rx="1" fill="currentColor"/><rect x="1" y="6.5" width="14" height="2.5" rx="1" fill="currentColor" opacity=".5"/><rect x="1" y="11" width="14" height="2.5" rx="1" fill="currentColor" opacity=".5"/></svg>
    </button>
  </div>
  <button onclick="openPanel('new')" class="db-btn db-btn-primary">+ Add property</button>
</div>
@endsection

@push('styles')
<style>
/* ── VIEW TOGGLE ── */
.view-btn { display:flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:6px;border:none;background:transparent;color:var(--text-light);cursor:pointer;transition:all 0.15s; }
.view-btn.active { background:var(--white);color:var(--text-dark);box-shadow:0 1px 3px rgba(0,0,0,0.1); }
.view-btn:hover:not(.active) { color:var(--text-mid); }

/* ── CARD VIEW ── */
#cardView { display:grid;grid-template-columns:repeat(3,1fr);gap:16px; }
#tableView { display:none; }
@media (max-width:1200px) { #cardView { grid-template-columns:repeat(2,1fr); } }
@media (max-width:800px)  { #cardView { grid-template-columns:1fr; } }

/* ── PROPERTY CARD ── */
.prop-card { background:var(--white);border:1px solid var(--cream-dark);border-radius:var(--radius);padding:22px;transition:all 0.15s;cursor:pointer;position:relative;overflow:hidden;text-align:left; width:100%; font-family:'Outfit',sans-serif; }
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
.prop-card-footer { display:flex;align-items:center;justify-content:space-between;margin-top:14px;padding-top:14px;border-top:1px solid var(--cream-dark);font-size:12px;color:var(--text-light); }

/* ── SLIDE PANEL ── */
#panelOverlay { position:fixed;inset:0;background:rgba(13,31,53,0.35);z-index:300;opacity:0;pointer-events:none;transition:opacity 0.25s; }
#panelOverlay.open { opacity:1;pointer-events:all; }

#slidePanel { position:fixed;top:0;right:0;bottom:0;width:62%;background:var(--white);z-index:301;transform:translateX(100%);transition:transform 0.28s cubic-bezier(.4,0,.2,1);display:flex;flex-direction:column;box-shadow:-8px 0 40px rgba(0,0,0,0.12); }
#slidePanel.open { transform:translateX(0); }

.panel-header { display:flex;align-items:center;justify-content:space-between;padding:20px 28px;border-bottom:1px solid var(--cream-dark);flex-shrink:0; }
.panel-title { font-family:'Fraunces',serif;font-size:20px;font-weight:500;color:var(--text-dark); }
.panel-close { width:34px;height:34px;border-radius:8px;border:1px solid var(--cream-dark);background:transparent;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:18px;color:var(--text-light);transition:all 0.15s; }
.panel-close:hover { background:var(--cream-dark);color:var(--text-dark); }

.panel-tabs { display:flex;border-bottom:1px solid var(--cream-dark);padding:0 28px;flex-shrink:0; }
.panel-tab { padding:12px 0;margin-right:24px;font-size:14px;font-weight:500;color:var(--text-light);cursor:pointer;border-bottom:2px solid transparent;transition:all 0.15s; }
.panel-tab.active { color:var(--terra);border-bottom-color:var(--terra); }
.panel-tab-badge { display:inline-block;background:var(--terra);color:#fff;font-size:10px;font-weight:700;padding:1px 5px;border-radius:100px;margin-left:4px;vertical-align:middle; }

.panel-body { flex:1;overflow-y:auto;padding:28px; }
.panel-section { margin-bottom:28px; }
.panel-section-title { font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:var(--text-light);margin-bottom:14px; }

.panel-footer { padding:16px 28px;border-top:1px solid var(--cream-dark);display:flex;align-items:center;justify-content:space-between;flex-shrink:0;background:var(--cream); }

/* Detail rows */
.detail-row { display:flex;align-items:baseline;justify-content:space-between;padding:10px 0;border-bottom:1px solid var(--cream-dark); }
.detail-row:last-child { border-bottom:none; }
.detail-label { font-size:13px;color:var(--text-light);flex-shrink:0;width:140px; }
.detail-value { font-size:14px;font-weight:500;color:var(--text-dark);text-align:right; }

/* Edit form */
.panel-form { display:flex;flex-direction:column;gap:16px; }
.panel-form-row { display:grid;grid-template-columns:1fr 1fr;gap:14px; }
</style>
@endpush

@section('content')

@php
$flags = ["FR"=>"🇫🇷","GB"=>"🇬🇧","US"=>"🇺🇸","IN"=>"🇮🇳","DE"=>"🇩🇪","AU"=>"🇦🇺","CA"=>"🇨🇦","NG"=>"🇳🇬","ID"=>"🇮🇩","PH"=>"🇵🇭","BR"=>"🇧🇷","MX"=>"🇲🇽","ZA"=>"🇿🇦","KE"=>"🇰🇪","SG"=>"🇸🇬","JP"=>"🇯🇵","ES"=>"🇪🇸","IT"=>"🇮🇹","NL"=>"🇳🇱","PT"=>"🇵🇹","BE"=>"🇧🇪","SE"=>"🇸🇪","NO"=>"🇳🇴","DK"=>"🇩🇰","PL"=>"🇵🇱","CH"=>"🇨🇭","MY"=>"🇲🇾","TH"=>"🇹🇭","VN"=>"🇻🇳","SG"=>"🇸🇬","HK"=>"🇭🇰","NZ"=>"🇳🇿"];
@endphp

@if($properties->isEmpty())
  <div class="db-empty" style="min-height:60vh">
    <div class="db-empty-icon">🏠</div>
    <h3>No properties yet.</h3>
    <p>Add your first property to start collecting rent.</p>
    <button onclick="openPanel('new')" class="db-btn db-btn-primary">+ Add property</button>
  </div>
@else

{{-- ── CARD VIEW ── --}}
<div id="cardView">
  @foreach($properties as $p)
  @php
    $lease   = $p->leases->where('status','active')->first();
    $flag    = $flags[$p->country_code] ?? "🏠";
    $country = config("countries.".$p->country_code, []);
  @endphp
  <button class="prop-card" onclick="openPanel('{{ $p->id }}')">
    <div class="prop-card-top">
      <span class="prop-card-flag">{{ $flag }}</span>
      <span class="badge {{ $lease ? 'badge-green' : 'badge-grey' }}">{{ $lease ? 'Tenanted' : 'Vacant' }}</span>
    </div>
    <div class="prop-card-name">{{ $p->name }}</div>
    <div class="prop-card-addr">{{ $p->city }}, {{ $p->country_code }}</div>
    <div class="prop-card-divider"></div>
    @if($lease)
      <div class="prop-card-rent">{{ number_format($lease->rent_minor_units/100,0) }} <span style="font-size:15px;color:var(--text-light)">{{ $lease->currency_code }}</span></div>
      @php $d=$lease->due_day;$sfx=$d===1?'st':($d===2?'nd':($d===3?'rd':'th')); @endphp
      <div class="prop-card-meta">
        <span>Due {{ $d }}{{ $sfx }}</span> · <span>{{ $lease->tenant->first_name ?? '—' }} {{ $lease->tenant->last_name ?? '' }}</span>
      </div>
    @else
      <div class="prop-card-rent" style="font-size:15px;color:var(--text-light)">No active lease</div>
      <div class="prop-card-meta" style="color:var(--terra)">Create lease →</div>
    @endif
    <div class="prop-card-footer">
      @php $method = $country['method'] ?? '—'; @endphp
      <span>{{ $method }}</span>
      <span>{{ ucfirst($p->type) }}@if($p->bedrooms) · {{ $p->bedrooms }}bd@endif</span>
    </div>
  </button>
  @endforeach
</div>

{{-- ── TABLE VIEW ── --}}
<div id="tableView">
  <div class="db-card">
    <div class="db-table-wrap">
      <table class="db-table">
        <thead>
          <tr><th>Property</th><th>Country</th><th>Tenant</th><th>Rent / mo</th><th>Method</th><th>Due</th><th>Status</th></tr>
        </thead>
        <tbody>
          @foreach($properties as $p)
          @php
            $lease   = $p->leases->where('status','active')->first();
            $flag    = $flags[$p->country_code] ?? "🏠";
            $country = config("countries.".$p->country_code, []);
          @endphp
          <tr onclick="openPanel('{{ $p->id }}')" style="cursor:pointer">
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
            <td>@if($lease)<strong>{{ $lease->tenant->first_name }} {{ $lease->tenant->last_name }}</strong>@else <span style="color:var(--text-light)">—</span>@endif</td>
            <td>@if($lease)<strong>{{ number_format($lease->rent_minor_units/100,0) }} {{ $lease->currency_code }}</strong>@else —@endif</td>
            @php $tmethod = $country['method'] ?? '—'; @endphp
            <td>{{ $tmethod }}</td>
            <td>@if($lease){{ $lease->due_day }}th@else —@endif</td>
            <td><span class="badge {{ $lease ? 'badge-green' : 'badge-grey' }}">{{ $lease ? 'Tenanted' : 'Vacant' }}</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endif

{{-- ── SLIDE PANEL ── --}}
<div id="panelOverlay" onclick="closePanel()"></div>
<div id="slidePanel">
  <div class="panel-header">
    <span class="panel-title" id="panelTitle">Property</span>
    <button class="panel-close" onclick="closePanel()">✕</button>
  </div>
  <div class="panel-tabs" id="panelTabs">
    <div class="panel-tab active" onclick="showTab('details')">Details</div>
    <div class="panel-tab" onclick="showTab('applications')">Applications <span class="panel-tab-badge" id="appBadge"></span></div>
    <div class="panel-tab" onclick="showTab('background')">Background</div>
    <div class="panel-tab" onclick="showTab('lease')">Lease</div>
    <div class="panel-tab" onclick="showTab('payments')">Payments</div>
    <div class="panel-tab" onclick="showTab('edit')">Edit</div>
  </div>
  <div class="panel-body" id="panelBody">
    <div style="display:flex;align-items:center;justify-content:center;height:200px;color:var(--text-light)">Loading…</div>
  </div>
  <div class="panel-footer" id="panelFooter"></div>
</div>

{{-- Property data for JS --}}
<script>
const PROPS = {
  @foreach($properties as $p)
  @php
    $lease = $p->leases->where('status','active')->first();
    $flag  = $flags[$p->country_code] ?? "🏠";
    $c     = config("countries.".$p->country_code, []);
  @endphp
  "{{ $p->id }}": {
    id:       "{{ $p->id }}",
    name:     @json($p->name),
    flag:     "{{ $flag }}",
    country:  "{{ $p->country_code }}",
    currency: "{{ $p->currency_code }}",
    city:     @json($p->city),
    address:  @json($p->address_line1),
    postal:   @json($p->postal_code ?? ''),
    type:     "{{ $p->type }}",
    bedrooms: "{{ $p->bedrooms ?? '—' }}",
    method:   @json($c['method'] ?? '—'),
    status:   "{{ $lease ? 'tenanted' : 'vacant' }}",
    lease: @if($lease) {
      rent:     "{{ number_format($lease->rent_minor_units/100,0) }}",
      currency: "{{ $lease->currency_code }}",
      due:      "{{ $lease->due_day }}",
      start:    "{{ $lease->start_date->format('d M Y') }}",
      end:      "{{ $lease->end_date?->format('d M Y') ?? 'Rolling' }}",
      tenant:   @json(($lease->tenant->first_name ?? '').' '.($lease->tenant->last_name ?? '')),
      email:    @json($lease->tenant->email ?? ''),
      status:   "{{ $lease->status }}",
    } @else null @endif,
    editUrl:   "{{ route('properties.update', $p) }}",
    deleteUrl: "{{ route('properties.destroy', $p) }}",
  },
  @endforeach
};

const COUNTRIES = @json(array_map(fn($k,$v)=>['code'=>$k,'label'=>$k.' — '.$v['currency']], array_keys(config('countries')), config('countries')));

const APPS = {
  @foreach($properties as $p)
  "{{ $p->id }}": [
    @foreach($p->applications->sortByDesc('created_at') as $app)
    {
      id:      "{{ $app->id }}",
      name:    @json($app->first_name.' '.$app->last_name),
      email:   @json($app->email),
      phone:   @json($app->phone ?? ''),
      moveIn:  "{{ $app->move_in_date?->format('d M Y') ?? '—' }}",
      income:  "{{ $app->monthly_income_minor_units ? number_format($app->monthly_income_minor_units/100,0).' '.($app->income_currency??'') : '—' }}",
      message: @json($app->message ?? ''),
      status:  "{{ $app->status }}",
      notes:   @json($app->landlord_notes ?? ''),
      checks:  [
        @foreach($app->backgroundChecks as $chk)
        { id:"{{ $chk->id }}", type:"{{ $chk->type }}", method:"{{ $chk->method }}", status:"{{ $chk->status }}", notes:@json($chk->notes??''), completed:"{{ $chk->completed_at?->format('d M Y')??'—' }}" },
        @endforeach
      ],
      statusUrl: "{{ route('applications.status', $app) }}",
      checkUrl:  "{{ route('background-checks.store', $app) }}",
    },
    @endforeach
  ],
  @endforeach
};

let activeTab = 'details';
let activeId  = null;

function openPanel(id) {
  activeId = id;
  const overlay = document.getElementById('panelOverlay');
  const panel   = document.getElementById('slidePanel');
  const tabs    = document.getElementById('panelTabs');
  overlay.classList.add('open');
  panel.classList.add('open');
  if (id === 'new') {
    document.getElementById('panelTitle').textContent = 'Add property';
    tabs.style.display = 'none';
    showNewForm();
  } else {
    const p = PROPS[id];
    document.getElementById('panelTitle').innerHTML = p.flag + ' ' + p.name;
    tabs.style.display = 'flex';
    const appCount = (APPS[id] || []).length;
    const badge = document.getElementById('appBadge');
    badge.textContent = appCount > 0 ? appCount : '';
    badge.style.display = appCount > 0 ? 'inline-block' : 'none';
    showTab('details');
  }
  document.addEventListener('keydown', escHandler);
}

function closePanel() {
  document.getElementById('panelOverlay').classList.remove('open');
  document.getElementById('slidePanel').classList.remove('open');
  document.removeEventListener('keydown', escHandler);
  activeId = null;
}

function escHandler(e) { if (e.key === 'Escape') closePanel(); }

function showTab(tab) {
  activeTab = tab;
  document.querySelectorAll('.panel-tab').forEach(t => t.classList.remove('active'));
  document.querySelectorAll('.panel-tab')[['details','applications','background','lease','payments','edit'].indexOf(tab)]?.classList.add('active');
  const p = PROPS[activeId];
  if (!p) return;

  if (tab === 'details')      renderDetails(p);
  if (tab === 'applications') renderApplications(p);
  if (tab === 'background')   renderBackground(p);
  if (tab === 'lease')        renderLease(p);
  if (tab === 'payments')     renderPayments(p);
  if (tab === 'edit')         renderEdit(p);
}

function renderDetails(p) {
  const rows = [
    ['Country',   p.country],
    ['Currency',  p.currency],
    ['Method',    p.method],
    ['Address',   p.address + (p.postal ? ', '+p.postal : '')],
    ['City',      p.city],
    ['Type',      p.type.charAt(0).toUpperCase()+p.type.slice(1)],
    ['Bedrooms',  p.bedrooms],
    ['Status',    p.status === 'tenanted' ? '🟢 Tenanted' : '⚪ Vacant'],
  ];
  document.getElementById('panelBody').innerHTML = `
    <div class="panel-section">
      <div class="panel-section-title">Property info</div>
      ${rows.map(([l,v])=>`<div class="detail-row"><span class="detail-label">${l}</span><span class="detail-value">${v}</span></div>`).join('')}
    </div>`;
  document.getElementById('panelFooter').innerHTML = `
    <button onclick="showTab('edit')" class="db-btn db-btn-ghost">Edit property</button>
    <button onclick="showTab('lease')" class="db-btn db-btn-primary">View lease →</button>`;
}

function renderApplications(p) {
  const apps = APPS[p.id] || [];
  const statusColors = { pending:'gold', reviewing:'navy', approved:'green', rejected:'red' };
  const statusLabels = { pending:'Pending', reviewing:'Reviewing', approved:'Approved', rejected:'Rejected' };

  let html = `<div class="panel-section">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px">
      <div class="panel-section-title" style="margin:0">Tenant applications</div>
      <button onclick="showAddAppForm('${p.id}')" class="db-btn db-btn-primary" style="font-size:12px;padding:6px 12px">+ Add applicant</button>
    </div>`;

  if (apps.length === 0) {
    html += `<div style="text-align:center;padding:40px 0;color:var(--text-light)">
      <div style="font-size:32px;margin-bottom:10px">📋</div>
      <div style="font-size:14px">No applications yet. Add one manually or share a link.</div>
    </div>`;
  } else {
    apps.forEach(app => {
      html += `<div style="border:1px solid var(--cream-dark);border-radius:10px;padding:16px;margin-bottom:12px">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px">
          <div>
            <div style="font-size:15px;font-weight:600;color:var(--text-dark)">${escHtml(app.name)}</div>
            <div style="font-size:12px;color:var(--text-light)">${escHtml(app.email)}${app.phone?' · '+escHtml(app.phone):''}</div>
          </div>
          <span class="badge badge-${statusColors[app.status]}">${statusLabels[app.status]}</span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:6px;font-size:13px;margin-bottom:12px">
          <div><span style="color:var(--text-light)">Move-in: </span>${app.moveIn}</div>
          <div><span style="color:var(--text-light)">Income: </span>${app.income}</div>
        </div>
        ${app.message ? `<div style="font-size:13px;color:var(--text-mid);background:var(--cream);border-radius:8px;padding:10px;margin-bottom:12px">"${escHtml(app.message)}"</div>` : ''}
        <div style="display:flex;gap:8px;flex-wrap:wrap">
          ${['reviewing','approved','rejected'].map(s =>
            s !== app.status ? `<button onclick="updateAppStatus('${app.statusUrl}','${s}',this)" class="db-btn db-btn-ghost" style="font-size:12px;padding:5px 10px">${{reviewing:'Mark reviewing',approved:'Approve',rejected:'Reject'}[s]}</button>` : ''
          ).join('')}
          <button onclick="showTab('background');activeAppId='${app.id}'" class="db-btn db-btn-ghost" style="font-size:12px;padding:5px 10px">Background check →</button>
        </div>
      </div>`;
    });
  }

  html += `</div>
  <div id="addAppForm" style="display:none;border-top:1px solid var(--cream-dark);padding-top:20px;margin-top:8px">
    <div class="panel-section-title">New applicant</div>
    <div class="panel-form" id="appFormInner">
      <div class="panel-form-row">
        <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">First name</label><input type="text" id="appFirst" class="db-input" placeholder="First name"></div>
        <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Last name</label><input type="text" id="appLast" class="db-input" placeholder="Last name"></div>
      </div>
      <div class="panel-form-row">
        <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Email</label><input type="email" id="appEmail" class="db-input" placeholder="email@example.com"></div>
        <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Phone</label><input type="text" id="appPhone" class="db-input" placeholder="Optional"></div>
      </div>
      <div class="panel-form-row">
        <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Move-in date</label><input type="date" id="appMoveIn" class="db-input"></div>
        <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Monthly income (${p.currency})</label><input type="number" id="appIncome" class="db-input" placeholder="e.g. 5000"></div>
      </div>
      <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Message / notes</label><textarea id="appMessage" class="db-textarea" placeholder="Any notes about this applicant…"></textarea></div>
      <div style="display:flex;gap:8px">
        <button onclick="document.getElementById('addAppForm').style.display='none'" class="db-btn db-btn-ghost">Cancel</button>
        <button onclick="submitApp('${p.id}')" class="db-btn db-btn-primary">Save applicant</button>
      </div>
    </div>
  </div>`;

  document.getElementById('panelBody').innerHTML = html;
  document.getElementById('panelFooter').innerHTML = '';
}

function showAddAppForm(pid) {
  const f = document.getElementById('addAppForm');
  f.style.display = f.style.display === 'none' ? 'block' : 'none';
}

async function submitApp(pid) {
  const data = new FormData();
  data.append('_token', document.querySelector('meta[name=csrf-token]').content);
  data.append('first_name', document.getElementById('appFirst').value);
  data.append('last_name',  document.getElementById('appLast').value);
  data.append('email',      document.getElementById('appEmail').value);
  data.append('phone',      document.getElementById('appPhone').value);
  data.append('move_in_date', document.getElementById('appMoveIn').value);
  const income = document.getElementById('appIncome').value;
  if (income) { data.append('monthly_income_minor_units', parseInt(income)*100); data.append('income_currency', PROPS[pid].currency); }
  data.append('message', document.getElementById('appMessage').value);
  const res = await fetch(`/properties/${pid}/applications`, { method:'POST', body:data });
  if (res.ok) location.reload();
}

async function updateAppStatus(url, status, btn) {
  const data = new FormData();
  data.append('_token', document.querySelector('meta[name=csrf-token]').content);
  data.append('_method', 'PATCH');
  data.append('status', status);
  const res = await fetch(url, { method:'POST', body:data });
  if (res.ok) location.reload();
}

let activeAppId = null;

function renderBackground(p) {
  const apps = APPS[p.id] || [];
  const allChecks = apps.flatMap(app => app.checks.map(c => ({...c, appName: app.name, appId: app.id, checkUrl: app.checkUrl})));
  const statusColors = { requested:'grey', pending:'gold', passed:'green', failed:'red', manual_review:'navy' };
  const typeLabels = { credit:'Credit', criminal:'Criminal', eviction:'Eviction history', right_to_rent:'Right to Rent', employment:'Employment', references:'References', document_upload:'Document upload' };

  let html = `<div class="panel-section">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px">
      <div class="panel-section-title" style="margin:0">Background checks</div>
    </div>`;

  if (allChecks.length === 0) {
    html += `<div style="text-align:center;padding:32px 0;color:var(--text-light)">
      <div style="font-size:32px;margin-bottom:10px">🔍</div>
      <div style="font-size:14px;margin-bottom:6px">No background checks yet.</div>
      <div style="font-size:12px">Request a check from an applicant on the Applications tab.</div>
    </div>`;
  } else {
    allChecks.forEach(chk => {
      html += `<div style="border:1px solid var(--cream-dark);border-radius:10px;padding:14px;margin-bottom:10px;display:flex;align-items:center;gap:14px">
        <div style="flex:1">
          <div style="font-size:14px;font-weight:600;color:var(--text-dark)">${typeLabels[chk.type] || chk.type}</div>
          <div style="font-size:12px;color:var(--text-light)">${escHtml(chk.appName)} · ${chk.method}</div>
          ${chk.notes ? `<div style="font-size:12px;color:var(--text-mid);margin-top:4px">${escHtml(chk.notes)}</div>` : ''}
        </div>
        <div style="text-align:right;flex-shrink:0">
          <span class="badge badge-${statusColors[chk.status]}">${chk.status.replace('_',' ')}</span>
          <div style="font-size:11px;color:var(--text-light);margin-top:4px">${chk.completed}</div>
        </div>
      </div>`;
    });
  }

  // Request new check — show if there are applicants
  if (apps.length > 0) {
    const country = p.country;
    const westernCountries = ['US','CA','GB','AU','NZ','IE','DE','FR','NL','SE','NO','DK','BE','AT','CH'];
    const isWestern = westernCountries.includes(country);
    const methods = isWestern
      ? [{v:'checkr',l:'Checkr (US)'},{v:'experian',l:'Experian'},{v:'transunion',l:'TransUnion'},{v:'document_upload',l:'Document upload'}]
      : [{v:'document_upload',l:'Document upload'}];
    const types = isWestern
      ? ['credit','criminal','eviction','right_to_rent','employment','references']
      : ['employment','references','document_upload'];

    html += `<div style="border-top:1px solid var(--cream-dark);padding-top:20px;margin-top:8px">
      <div class="panel-section-title">Request new check</div>
      <div class="panel-form" style="gap:12px">
        <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Applicant</label>
          <select id="chkApp" class="db-select">${apps.map(a=>`<option value="${a.id}" data-url="${a.checkUrl}">${escHtml(a.name)}</option>`).join('')}</select></div>
        <div class="panel-form-row">
          <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Check type</label>
            <select id="chkType" class="db-select">${types.map(t=>`<option value="${t}">${typeLabels[t]||t}</option>`).join('')}</select></div>
          <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Method</label>
            <select id="chkMethod" class="db-select">${methods.map(m=>`<option value="${m.v}">${m.l}</option>`).join('')}</select></div>
        </div>
        <div><label style="font-size:12px;font-weight:600;display:block;margin-bottom:5px">Notes</label><input type="text" id="chkNotes" class="db-input" placeholder="Optional"></div>
        <div><button onclick="submitCheck()" class="db-btn db-btn-primary">Request check</button></div>
      </div>
    </div>`;
  }

  html += '</div>';
  document.getElementById('panelBody').innerHTML = html;
  document.getElementById('panelFooter').innerHTML = '';
}

async function submitCheck() {
  const sel = document.getElementById('chkApp');
  const url = sel.options[sel.selectedIndex].dataset.url;
  const data = new FormData();
  data.append('_token', document.querySelector('meta[name=csrf-token]').content);
  data.append('type',   document.getElementById('chkType').value);
  data.append('method', document.getElementById('chkMethod').value);
  data.append('notes',  document.getElementById('chkNotes').value);
  const res = await fetch(url, { method:'POST', body:data });
  if (res.ok) location.reload();
}

function renderLease(p) {
  if (!p.lease) {
    document.getElementById('panelBody').innerHTML = `
      <div style="text-align:center;padding:48px 0;color:var(--text-light)">
        <div style="font-size:36px;margin-bottom:12px">📋</div>
        <div style="font-size:15px;margin-bottom:20px">No active lease on this property.</div>
        <a href="/properties/${p.id}/leases/create" class="db-btn db-btn-primary">+ Create lease</a>
      </div>`;
    document.getElementById('panelFooter').innerHTML = '';
    return;
  }
  const l = p.lease;
  const rows = [
    ['Tenant',    l.tenant],
    ['Email',     l.email],
    ['Rent',      l.rent+' '+l.currency+'/mo'],
    ['Due day',   l.due+'th of month'],
    ['Start',     l.start],
    ['End',       l.end],
    ['Status',    l.status.charAt(0).toUpperCase()+l.status.slice(1)],
  ];
  document.getElementById('panelBody').innerHTML = `
    <div class="panel-section">
      <div class="panel-section-title">Active lease</div>
      ${rows.map(([lbl,v])=>`<div class="detail-row"><span class="detail-label">${lbl}</span><span class="detail-value">${v}</span></div>`).join('')}
    </div>`;
  document.getElementById('panelFooter').innerHTML = `
    <span style="font-size:13px;color:var(--text-light)">Mandate active</span>
    <button class="db-btn db-btn-ghost">View full lease</button>`;
}

function renderPayments(p) {
  document.getElementById('panelBody').innerHTML = `
    <div style="text-align:center;padding:48px 0;color:var(--text-light)">
      <div style="font-size:36px;margin-bottom:12px">💳</div>
      <div style="font-size:14px">Payment history visible on the <a href="/payments" style="color:var(--terra)">Payments page</a>.</div>
    </div>`;
  document.getElementById('panelFooter').innerHTML = '';
}

function renderEdit(p) {
  const countryOpts = COUNTRIES.map(c=>`<option value="${c.code}" ${c.code===p.country?'selected':''}>${c.label}</option>`).join('');
  document.getElementById('panelBody').innerHTML = `
    <form id="editForm" class="panel-form">
      <div class="panel-form-row">
        <div class="db-form-group">
          <label class="db-form-group label" style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Property name</label>
          <input type="text" name="name" class="db-input" value="${escHtml(p.name)}" required>
        </div>
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Country</label>
          <select name="country_code" class="db-select">${countryOpts}</select>
        </div>
      </div>
      <div class="db-form-group">
        <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Address</label>
        <input type="text" name="address_line1" class="db-input" value="${escHtml(p.address)}" required>
      </div>
      <div class="panel-form-row">
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">City</label>
          <input type="text" name="city" class="db-input" value="${escHtml(p.city)}" required>
        </div>
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Postal code</label>
          <input type="text" name="postal_code" class="db-input" value="${escHtml(p.postal)}">
        </div>
      </div>
      <div class="panel-form-row">
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Type</label>
          <select name="type" class="db-select">
            ${['apartment','house','commercial','other'].map(t=>`<option value="${t}" ${t===p.type?'selected':''}>${t.charAt(0).toUpperCase()+t.slice(1)}</option>`).join('')}
          </select>
        </div>
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Bedrooms</label>
          <input type="number" name="bedrooms" class="db-input" value="${p.bedrooms==='—'?'':p.bedrooms}" min="0" max="99">
        </div>
      </div>
      <div id="editMsg" style="font-size:13px;display:none;padding:10px 14px;border-radius:8px;margin-top:4px"></div>
    </form>`;

  document.getElementById('panelFooter').innerHTML = `
    <button onclick="deleteProperty('${p.id}')" class="db-btn db-btn-danger">Delete property</button>
    <div style="display:flex;gap:8px">
      <button onclick="closePanel()" class="db-btn db-btn-ghost">Cancel</button>
      <button onclick="saveProperty('${p.id}')" class="db-btn db-btn-primary">Save changes</button>
    </div>`;
}

function showNewForm() {
  const countryOpts = COUNTRIES.map(c=>`<option value="${c.code}">${c.label}</option>`).join('');
  document.getElementById('panelBody').innerHTML = `
    <form id="newForm" class="panel-form" method="POST" action="{{ route('properties.store') }}">
      @csrf
      <div class="panel-form-row">
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Property name <span style="color:var(--terra)">*</span></label>
          <input type="text" name="name" class="db-input" placeholder="e.g. Bandra West Flat" required>
        </div>
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Country <span style="color:var(--terra)">*</span></label>
          <select name="country_code" class="db-select"><option value="">Select country…</option>${countryOpts}</select>
        </div>
      </div>
      <div class="db-form-group">
        <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Address <span style="color:var(--terra)">*</span></label>
        <input type="text" name="address_line1" class="db-input" placeholder="Street address" required>
      </div>
      <div class="panel-form-row">
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">City <span style="color:var(--terra)">*</span></label>
          <input type="text" name="city" class="db-input" placeholder="City" required>
        </div>
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Postal code</label>
          <input type="text" name="postal_code" class="db-input" placeholder="Optional">
        </div>
      </div>
      <div class="panel-form-row">
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Type</label>
          <select name="type" class="db-select">
            <option value="apartment">Apartment</option><option value="house">House</option><option value="commercial">Commercial</option><option value="other">Other</option>
          </select>
        </div>
        <div class="db-form-group">
          <label style="font-size:12px;font-weight:600;color:var(--text-dark);margin-bottom:5px;display:block">Bedrooms</label>
          <input type="number" name="bedrooms" class="db-input" placeholder="e.g. 2" min="0" max="99">
        </div>
      </div>
    </form>`;
  document.getElementById('panelFooter').innerHTML = `
    <button onclick="closePanel()" class="db-btn db-btn-ghost">Cancel</button>
    <button onclick="document.getElementById('newForm').submit()" class="db-btn db-btn-primary">Save property →</button>`;
}

async function saveProperty(id) {
  const form = document.getElementById('editForm');
  const data = new FormData(form);
  data.append('_method', 'PUT');
  data.append('_token', document.querySelector('meta[name=csrf-token]').content);
  const msg = document.getElementById('editMsg');
  try {
    const res = await fetch(PROPS[id].editUrl, { method:'POST', body: data });
    if (res.ok || res.redirected) {
      msg.style.display = 'block';
      msg.style.background = 'var(--green-pale)';
      msg.style.color = 'var(--green)';
      msg.textContent = '✓ Property updated.';
      setTimeout(() => location.reload(), 800);
    } else {
      const json = await res.json();
      msg.style.display = 'block';
      msg.style.background = 'var(--red-pale)';
      msg.style.color = 'var(--red)';
      msg.textContent = Object.values(json.errors || {}).flat().join(' ') || 'Something went wrong.';
    }
  } catch(e) {
    location.reload();
  }
}

function deleteProperty(id) {
  if (!confirm('Delete this property? This cannot be undone.')) return;
  const form = document.createElement('form');
  form.method = 'POST';
  form.action = PROPS[id].deleteUrl;
  form.innerHTML = `<input name="_token" value="${document.querySelector('meta[name=csrf-token]').content}"><input name="_method" value="DELETE">`;
  document.body.appendChild(form);
  form.submit();
}

function setView(v) {
  document.getElementById('cardView').style.display  = v==='card'  ? 'grid'  : 'none';
  document.getElementById('tableView').style.display = v==='table' ? 'block' : 'none';
  document.getElementById('btnCard').classList.toggle('active',  v==='card');
  document.getElementById('btnTable').classList.toggle('active', v==='table');
  localStorage.setItem('propView', v);
}

function escHtml(str) {
  return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

const saved = localStorage.getItem('propView');
if (saved) setView(saved);
</script>
@endsection
