<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Dashboard') — Rentersmaxx</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --navy: #0D1F35; --navy-mid: #162d4a; --navy-light: #1e3a5f;
  --navy-border: rgba(255,255,255,0.08);
  --cream: #FAF8F3; --cream-dark: #F0EDE4;
  --terra: #C4622D; --terra-light: #d97448; --terra-pale: #FAF0EB;
  --gold: #C9963A; --gold-pale: #FBF3E4;
  --green: #2A6B4A; --green-pale: #E4F0EA;
  --red: #C0392B; --red-pale: #FDEDEC;
  --text-dark: #0D1F35; --text-mid: #4A5A6A; --text-light: #8A99AA;
  --white: #ffffff; --radius: 10px; --radius-lg: 16px;
  --sidebar: 260px; --topbar: 68px;
}
html, body { height: 100%; }
body { font-family: 'Outfit', sans-serif; background: var(--cream); color: var(--text-dark); display: flex; overflow: hidden; font-size: 22px; }

/* ── SIDEBAR ── */
.db-sidebar { width: var(--sidebar); height: 100vh; background: var(--navy); display: flex; flex-direction: column; flex-shrink: 0; position: fixed; left: 0; top: 0; z-index: 200; overflow-y: auto; }
.db-logo { padding: 24px 20px 16px; border-bottom: 1px solid var(--navy-border); flex-shrink: 0; }
.db-logo a { font-family: 'Fraunces', serif; font-size: 22px; font-weight: 700; color: var(--white); text-decoration: none; }
.db-logo a span { color: var(--terra-light); }
.db-nav { flex: 1; padding: 12px 10px; overflow-y: auto; }
.db-nav-section { margin-bottom: 20px; }
.db-nav-label { font-size: 22px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: rgba(255,255,255,0.25); padding: 0 10px; margin-bottom: 4px; display: block; }
.db-nav-item { display: flex; align-items: center; gap: 11px; padding: 10px 12px; border-radius: 8px; color: rgba(255,255,255,0.55); text-decoration: none; font-size: 15px; font-weight: 400; transition: all 0.15s; margin-bottom: 1px; }
.db-nav-item:hover { background: rgba(255,255,255,0.07); color: var(--white); }
.db-nav-item.active { background: rgba(255,255,255,0.1); color: var(--white); }
.db-nav-item .ni { font-size: 22px; width: 18px; text-align: center; flex-shrink: 0; }
.db-nav-badge { margin-left: auto; font-size: 22px; font-weight: 600; background: var(--terra); color: var(--white); padding: 1px 6px; border-radius: 100px; }
.db-nav-badge.green { background: var(--green); }
.db-sidebar-footer { padding: 12px 10px; border-top: 1px solid var(--navy-border); flex-shrink: 0; }
.db-user { display: flex; align-items: center; gap: 11px; padding: 10px 12px; border-radius: 8px; margin-bottom: 2px; }
.db-avatar { width: 34px; height: 34px; border-radius: 50%; background: var(--terra); display: flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 700; color: var(--white); flex-shrink: 0; }
.db-user-name { font-size: 15px; font-weight: 500; color: var(--white); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.db-user-role { font-size: 15px; color: rgba(255,255,255,0.3); }
.db-logout { display: flex; align-items: center; gap: 11px; padding: 10px 12px; border-radius: 8px; color: rgba(255,255,255,0.35); font-size: 15px; transition: all 0.15s; cursor: pointer; background: none; border: none; width: 100%; font-family: 'Outfit', sans-serif; }
.db-logout:hover { background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.7); }

/* ── MAIN ── */
.db-main { margin-left: var(--sidebar); flex: 1; display: flex; flex-direction: column; height: 100vh; overflow: hidden; min-width: 0; }

/* ── TOPBAR ── */
.db-topbar { height: var(--topbar); background: var(--white); border-bottom: 1px solid var(--cream-dark); display: flex; align-items: center; justify-content: space-between; padding: 0 32px; flex-shrink: 0; gap: 18px; }
.db-topbar-left { display: flex; align-items: center; gap: 12px; min-width: 0; }
.db-page-title { font-family: 'Fraunces', serif; font-size: 22px; font-weight: 500; color: var(--text-dark); white-space: nowrap; }
.db-breadcrumb { font-size: 15px; color: var(--text-light); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.db-topbar-right { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
.db-btn { display: inline-flex; align-items: center; gap: 8px; padding: 9px 16px; border-radius: 8px; font-family: 'Outfit', sans-serif; font-size: 15px; font-weight: 500; cursor: pointer; transition: all 0.15s; text-decoration: none; border: none; white-space: nowrap; }
.db-btn-ghost { background: transparent; color: var(--text-mid); border: 1px solid var(--cream-dark); }
.db-btn-ghost:hover { border-color: var(--text-light); background: var(--cream); }
.db-btn-primary { background: var(--terra); color: var(--white); }
.db-btn-primary:hover { background: var(--terra-light); }
.db-btn-danger { background: var(--red-pale); color: var(--red); border: 1px solid rgba(192,57,43,0.2); }
.db-btn-danger:hover { background: rgba(192,57,43,0.12); }

/* ── CONTENT ── */
.db-content { flex: 1; overflow-y: auto; padding: 32px; background: var(--cream); }

/* ── CARDS ── */
.db-card { background: var(--white); border-radius: var(--radius); border: 1px solid var(--cream-dark); }
.db-card-header { display: flex; align-items: center; justify-content: space-between; padding: 24px 24px; border-bottom: 1px solid var(--cream-dark); gap: 12px; }
.db-card-title { font-size: 22px; font-weight: 600; color: var(--text-dark); }
.db-card-body { padding: 24px; }

/* ── STATS ── */
.db-stats { display: grid; grid-template-columns: repeat(4,1fr); gap: 18px; margin-bottom: 20px; }
.db-stat { background: var(--white); border-radius: var(--radius); padding: 22px 24px; border: 1px solid var(--cream-dark); }
.db-stat-label { font-size: 15px; color: var(--text-light); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.06em; font-weight: 600; }
.db-stat-value { font-family: 'Fraunces', serif; font-size: 30px; color: var(--text-dark); letter-spacing: -0.02em; margin-bottom: 3px; line-height: 1; }
.db-stat-sub { font-size: 22px; color: var(--text-light); }
.db-stat.green .db-stat-value { color: var(--green); }
.db-stat.terra .db-stat-value { color: var(--terra); }

/* ── TABLE ── */
.db-table-wrap { overflow-x: auto; }
.db-table { width: 100%; border-collapse: collapse; font-size: 15px; }
.db-table th { text-align: left; padding: 13px 18px; font-size: 15px; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: var(--text-light); border-bottom: 1px solid var(--cream-dark); white-space: nowrap; background: var(--cream); }
.db-table td { padding: 15px 18px; border-bottom: 1px solid var(--cream-dark); color: var(--text-mid); vertical-align: middle; }
.db-table tr:last-child td { border-bottom: none; }
.db-table tr:hover td { background: var(--cream); }
.db-table td strong { color: var(--text-dark); font-weight: 500; }
.db-table-link { color: var(--text-dark); text-decoration: none; font-weight: 500; }
.db-table-link:hover { color: var(--terra); }

/* ── BADGES ── */
.badge { display: inline-flex; align-items: center; padding: 4px 11px; border-radius: 100px; font-size: 15px; font-weight: 600; white-space: nowrap; }
.badge-green  { background: var(--green-pale);  color: var(--green); }
.badge-terra  { background: var(--terra-pale);  color: var(--terra); }
.badge-gold   { background: var(--gold-pale);   color: var(--gold); }
.badge-navy   { background: rgba(13,31,53,0.08); color: var(--navy); }
.badge-red    { background: var(--red-pale);    color: var(--red); }
.badge-grey   { background: var(--cream-dark);  color: var(--text-light); }

/* ── FLAG + NAME ── */
.db-flag-name { display: flex; align-items: center; gap: 10px; }
.db-flag { font-size: 22px; flex-shrink: 0; }
.db-name { font-weight: 500; color: var(--text-dark); }
.db-sub { font-size: 22px; color: var(--text-light); margin-top: 1px; }

/* ── EMPTY ── */
.db-empty { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; text-align: center; }
.db-empty-icon { font-size: 40px; margin-bottom: 16px; opacity: 0.4; }
.db-empty h3 { font-size: 22px; color: var(--text-dark); margin-bottom: 6px; }
.db-empty p { font-size: 15px; color: var(--text-light); margin-bottom: 20px; font-weight: 300; }

/* ── GRID ── */
.db-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
.db-grid-3 { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; }

/* ── PROPERTY CARD ── */
.prop-card { background: var(--white); border: 1px solid var(--cream-dark); border-radius: var(--radius); padding: 24px; transition: all 0.15s; text-decoration: none; display: block; }
.prop-card:hover { border-color: var(--terra); box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
.prop-card-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 12px; }
.prop-card-flag { font-size: 30px; }
.prop-card-name { font-size: 22px; font-weight: 600; color: var(--text-dark); margin-bottom: 2px; }
.prop-card-addr { font-size: 22px; color: var(--text-light); }
.prop-card-rent { font-family: 'Fraunces', serif; font-size: 22px; color: var(--text-dark); margin: 10px 0 4px; }
.prop-card-meta { font-size: 22px; color: var(--text-light); display: flex; gap: 12px; flex-wrap: wrap; }

/* ── FORM ── */
.db-form { display: flex; flex-direction: column; gap: 18px; max-width: 600px; }
.db-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
.db-form-group { display: flex; flex-direction: column; gap: 5px; }
.db-form-group label { font-size: 22px; font-weight: 600; color: var(--text-dark); }
.db-form-group label .req { color: var(--terra); }
.db-input, .db-select, .db-textarea { padding: 9px 12px; border-radius: 8px; border: 1px solid var(--cream-dark); background: var(--cream); font-family: 'Outfit', sans-serif; font-size: 15px; color: var(--text-dark); outline: none; transition: border-color 0.15s; width: 100%; }
.db-input:focus, .db-select:focus, .db-textarea:focus { border-color: var(--terra); background: var(--white); }
.db-input::placeholder, .db-textarea::placeholder { color: var(--text-light); }
.db-select { appearance: none; cursor: pointer; background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='%238A99AA' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 32px; }
.db-textarea { resize: vertical; min-height: 90px; line-height: 1.5; }
.db-form-submit { padding: 10px 24px; border-radius: 9px; background: var(--terra); color: var(--white); font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 600; border: none; cursor: pointer; transition: all 0.15s; align-self: flex-start; }
.db-form-submit:hover { background: var(--terra-light); }
.db-form-hint { font-size: 22px; color: var(--text-light); font-weight: 300; }
.db-form-error { font-size: 22px; color: var(--red); margin-top: 2px; }

/* ── ALERT ── */
.db-alert { padding: 12px 16px; border-radius: 9px; font-size: 15px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; }
.db-alert-success { background: var(--green-pale); color: var(--green); border: 1px solid rgba(42,107,74,0.2); }
.db-alert-error { background: var(--red-pale); color: var(--red); border: 1px solid rgba(192,57,43,0.15); }

/* ── MOBILE ── */
@media (max-width: 900px) {
  .db-sidebar { transform: translateX(-100%); transition: transform 0.25s; }
  .db-sidebar.open { transform: translateX(0); }
  .db-main { margin-left: 0; }
  .db-stats { grid-template-columns: 1fr 1fr; }
  .db-grid-2, .db-grid-3 { grid-template-columns: 1fr; }
  .db-form-row { grid-template-columns: 1fr; }
}
</style>
@stack('styles')
</head>
<body>

<!-- Sidebar -->
<aside class="db-sidebar" id="dbSidebar">
  <div class="db-logo">
    <a href="{{ url('/') }}">Renters<span>maxx</span></a>
  </div>
  <nav class="db-nav">
    <div class="db-nav-section">
      <span class="db-nav-label">Overview</span>
      <a href="{{ route('dashboard') }}" class="db-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <span class="ni">📊</span> Dashboard
      </a>
    </div>
    <div class="db-nav-section">
      <span class="db-nav-label">Portfolio</span>
      <a href="{{ route('properties.index') }}" class="db-nav-item {{ request()->routeIs('properties.*') ? 'active' : '' }}">
        <span class="ni">🏠</span> Properties
      </a>
      <a href="{{ route('leases.index') }}" class="db-nav-item {{ request()->routeIs('leases.*') ? 'active' : '' }}">
        <span class="ni">📋</span> Leases
      </a>
      <a href="{{ route('tenants.index') }}" class="db-nav-item {{ request()->routeIs('tenants.*') ? 'active' : '' }}">
        <span class="ni">👥</span> Tenants
      </a>
    </div>
    <div class="db-nav-section">
      <span class="db-nav-label">Finance</span>
      <a href="{{ route('payments.index') }}" class="db-nav-item {{ request()->routeIs('payments.*') ? 'active' : '' }}">
        <span class="ni">💳</span> Payments
      </a>
      <a href="#" class="db-nav-item">
        <span class="ni">💱</span> FX Ledger
      </a>
      <a href="#" class="db-nav-item">
        <span class="ni">📤</span> Tax Export
      </a>
    </div>
    <div class="db-nav-section">
      <span class="db-nav-label">Operations</span>
      <a href="{{ route('maintenance.index') }}" class="db-nav-item {{ request()->routeIs('maintenance.*') ? 'active' : '' }}">
        <span class="ni">🔧</span> Maintenance
        @php $openMaintenance = auth()->user()->properties()->with('leases.maintenanceRequests')->get()->flatMap(fn($p) => $p->leases)->flatMap(fn($l) => $l->maintenanceRequests)->where('status','submitted')->count(); @endphp
        @if($openMaintenance > 0)<span class="db-nav-badge">{{ $openMaintenance }}</span>@endif
      </a>
      <a href="#" class="db-nav-item">
        <span class="ni">💬</span> Messages
      </a>
      <a href="#" class="db-nav-item">
        <span class="ni">📁</span> Documents
      </a>
    </div>
  </nav>
  <div class="db-sidebar-footer">
    <div class="db-user">
      <div class="db-avatar">{{ strtoupper(substr(auth()->user()->first_name ?? 'U', 0, 1)) }}</div>
      <div>
        <div class="db-user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
        <div class="db-user-role">Landlord</div>
      </div>
    </div>
    <form method="POST" action="{{ route('auth.logout') }}">
      @csrf
      <button type="submit" class="db-logout"><span>↩</span> Sign out</button>
    </form>
  </div>
</aside>

<!-- Main -->
<div class="db-main">
  <div class="db-topbar">
    <div class="db-topbar-left">
      <span class="db-page-title">@yield('page-title', 'Dashboard')</span>
      @hasSection('breadcrumb')<span class="db-breadcrumb">@yield('breadcrumb')</span>@endif
    </div>
    <div class="db-topbar-right">
      @yield('topbar-actions')
    </div>
  </div>
  <div class="db-content">
    @if(session('success'))
      <div class="db-alert db-alert-success">✓ {{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="db-alert db-alert-error">✗ {{ session('error') }}</div>
    @endif
    @yield('content')
  </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
