<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Dashboard — Rentersmaxx</title>
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
  --text-dark: #0D1F35; --text-mid: #4A5A6A; --text-light: #8A99AA;
  --white: #ffffff; --radius: 12px; --radius-lg: 20px;
  --sidebar-width: 260px;
  --topbar-height: 64px;
}

html, body { height: 100%; }
body { font-family: 'Outfit', sans-serif; background: var(--cream); color: var(--text-dark); display: flex; overflow: hidden; }

/* ── SIDEBAR ── */
.db-sidebar {
  width: var(--sidebar-width); height: 100vh;
  background: var(--navy); display: flex; flex-direction: column;
  flex-shrink: 0; position: fixed; left: 0; top: 0; bottom: 0;
  z-index: 100; overflow-y: auto;
}

.db-logo {
  padding: 24px 24px 20px;
  border-bottom: 1px solid var(--navy-border);
  flex-shrink: 0;
}
.db-logo a {
  font-family: 'Fraunces', serif; font-size: 20px; font-weight: 700;
  color: var(--white); text-decoration: none; letter-spacing: -0.5px;
}
.db-logo a span { color: var(--terra-light); }

.db-nav { flex: 1; padding: 16px 12px; }
.db-nav-section { margin-bottom: 28px; }
.db-nav-label {
  font-size: 10px; font-weight: 600; letter-spacing: 0.12em;
  text-transform: uppercase; color: rgba(255,255,255,0.25);
  padding: 0 12px; margin-bottom: 6px;
}
.db-nav-item {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 12px; border-radius: 9px; cursor: pointer;
  color: rgba(255,255,255,0.55); text-decoration: none;
  font-size: 14px; font-weight: 400; transition: all 0.15s;
  margin-bottom: 2px;
}
.db-nav-item:hover { background: rgba(255,255,255,0.07); color: var(--white); }
.db-nav-item.active { background: rgba(255,255,255,0.1); color: var(--white); }
.db-nav-item .nav-icon { font-size: 16px; width: 20px; text-align: center; flex-shrink: 0; }
.db-nav-item .nav-badge {
  margin-left: auto; font-size: 10px; font-weight: 600;
  background: var(--terra); color: var(--white);
  padding: 2px 7px; border-radius: 100px;
}

.db-sidebar-footer {
  padding: 16px 12px; border-top: 1px solid var(--navy-border); flex-shrink: 0;
}
.db-user {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 12px; border-radius: 9px;
}
.db-avatar {
  width: 32px; height: 32px; border-radius: 50%;
  background: var(--terra); display: flex; align-items: center;
  justify-content: center; font-size: 13px; font-weight: 600;
  color: var(--white); flex-shrink: 0;
}
.db-user-info { flex: 1; min-width: 0; }
.db-user-name { font-size: 13px; font-weight: 500; color: var(--white); truncate: ellipsis; white-space: nowrap; overflow: hidden; }
.db-user-role { font-size: 11px; color: rgba(255,255,255,0.35); }
.db-logout {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 12px; border-radius: 9px;
  color: rgba(255,255,255,0.4); text-decoration: none;
  font-size: 13px; transition: all 0.15s; margin-top: 4px;
  cursor: pointer; background: none; border: none; width: 100%; font-family: 'Outfit', sans-serif;
}
.db-logout:hover { background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.8); }

/* ── MAIN AREA ── */
.db-main {
  margin-left: var(--sidebar-width);
  flex: 1; display: flex; flex-direction: column;
  height: 100vh; overflow: hidden;
}

/* ── TOPBAR ── */
.db-topbar {
  height: var(--topbar-height); background: var(--white);
  border-bottom: 1px solid var(--cream-dark);
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 32px; flex-shrink: 0;
}
.db-topbar-left { display: flex; align-items: center; gap: 16px; }
.db-page-title { font-family: 'Fraunces', serif; font-size: 20px; font-weight: 500; color: var(--text-dark); letter-spacing: -0.01em; }
.db-topbar-right { display: flex; align-items: center; gap: 12px; }
.db-topbar-btn {
  display: flex; align-items: center; gap: 7px;
  padding: 8px 16px; border-radius: 9px; font-family: 'Outfit', sans-serif;
  font-size: 13px; font-weight: 500; cursor: pointer; transition: all 0.15s;
  text-decoration: none;
}
.db-btn-ghost { background: transparent; color: var(--text-mid); border: 1px solid var(--cream-dark); }
.db-btn-ghost:hover { border-color: var(--text-light); background: var(--cream); }
.db-btn-primary { background: var(--terra); color: var(--white); border: 1px solid transparent; }
.db-btn-primary:hover { background: var(--terra-light); }

/* ── CONTENT ── */
.db-content {
  flex: 1; overflow-y: auto; padding: 32px;
  background: var(--cream);
}

/* ── EMPTY STATE ── */
.db-empty {
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  min-height: 60vh; text-align: center; max-width: 480px; margin: 0 auto;
}
.db-empty-icon { font-size: 56px; margin-bottom: 24px; opacity: 0.5; }
.db-empty h2 { font-size: 26px; color: var(--text-dark); margin-bottom: 12px; letter-spacing: -0.01em; }
.db-empty p { font-size: 15px; color: var(--text-mid); font-weight: 300; line-height: 1.7; margin-bottom: 32px; }
.db-empty-actions { display: flex; gap: 12px; }

/* ── STAT CARDS ── */
.db-stats { display: grid; grid-template-columns: repeat(4,1fr); gap: 16px; margin-bottom: 28px; }
.db-stat-card {
  background: var(--white); border-radius: var(--radius); padding: 22px 24px;
  border: 1px solid var(--cream-dark);
}
.db-stat-label { font-size: 12px; color: var(--text-light); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.06em; font-weight: 500; }
.db-stat-value { font-family: 'Fraunces', serif; font-size: 32px; color: var(--text-dark); letter-spacing: -0.02em; margin-bottom: 4px; }
.db-stat-sub { font-size: 12px; color: var(--text-light); }
.db-stat-card.highlight .db-stat-value { color: var(--green); }

/* ── QUICK ACTIONS ── */
.db-actions-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; margin-bottom: 28px; }
.db-action-card {
  background: var(--white); border: 1px solid var(--cream-dark);
  border-radius: var(--radius); padding: 24px; cursor: pointer;
  transition: all 0.15s; text-decoration: none; display: block;
}
.db-action-card:hover { border-color: var(--terra); transform: translateY(-2px); box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
.db-action-icon { font-size: 28px; margin-bottom: 12px; }
.db-action-title { font-size: 15px; font-weight: 600; color: var(--text-dark); margin-bottom: 5px; }
.db-action-desc { font-size: 13px; color: var(--text-light); font-weight: 300; line-height: 1.5; }

/* ── MOBILE ── */
@media (max-width: 768px) {
  .db-sidebar { transform: translateX(-100%); transition: transform 0.3s; }
  .db-sidebar.open { transform: translateX(0); }
  .db-main { margin-left: 0; }
  .db-stats { grid-template-columns: 1fr 1fr; }
  .db-actions-grid { grid-template-columns: 1fr; }
}
</style>
</head>
<body>

<!-- ── SIDEBAR ── -->
<aside class="db-sidebar" id="dbSidebar">
  <div class="db-logo">
    <a href="{{ url('/') }}">Renters<span>maxx</span></a>
  </div>

  <nav class="db-nav">
    <div class="db-nav-section">
      <p class="db-nav-label">Overview</p>
      <a href="{{ route('dashboard') }}" class="db-nav-item active">
        <span class="nav-icon">📊</span> Dashboard
      </a>
    </div>

    <div class="db-nav-section">
      <p class="db-nav-label">Portfolio</p>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">🏠</span> Properties
      </a>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">📋</span> Leases
      </a>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">👥</span> Tenants
      </a>
    </div>

    <div class="db-nav-section">
      <p class="db-nav-label">Finance</p>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">💳</span> Payments
      </a>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">💱</span> FX Ledger
      </a>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">📤</span> Tax Export
      </a>
    </div>

    <div class="db-nav-section">
      <p class="db-nav-label">Operations</p>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">🔧</span> Maintenance
      </a>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">💬</span> Messages
      </a>
      <a href="#" class="db-nav-item">
        <span class="nav-icon">📁</span> Documents
      </a>
    </div>
  </nav>

  <div class="db-sidebar-footer">
    <div class="db-user">
      <div class="db-avatar">{{ strtoupper(substr(auth()->user()->first_name ?? 'U', 0, 1)) }}</div>
      <div class="db-user-info">
        <div class="db-user-name">{{ auth()->user()->first_name ?? 'Landlord' }} {{ auth()->user()->last_name ?? '' }}</div>
        <div class="db-user-role">{{ auth()->user()->home_country ?? 'International landlord' }}</div>
      </div>
    </div>
    <form method="POST" action="{{ route('auth.logout') }}">
      @csrf
      @method('POST')
      <button type="submit" class="db-logout">
        <span>↩</span> Sign out
      </button>
    </form>
  </div>
</aside>

<!-- ── MAIN ── -->
<div class="db-main">

  <!-- Topbar -->
  <div class="db-topbar">
    <div class="db-topbar-left">
      <span class="db-page-title">Dashboard</span>
    </div>
    <div class="db-topbar-right">
      <a href="#" class="db-topbar-btn db-btn-ghost">+ Add property</a>
      <a href="{{ url('/') }}" class="db-topbar-btn db-btn-ghost" target="_blank">← Back to site</a>
    </div>
  </div>

  <!-- Content -->
  <div class="db-content">

    @if(auth()->user()->properties()->count() === 0)

      <!-- Empty state — no properties yet -->
      <div class="db-empty">
        <div class="db-empty-icon">🏠</div>
        <h2>Welcome to Rentersmaxx.</h2>
        <p>You're all set. Add your first property and invite your tenant — rent collection will handle itself from there.</p>
        <div class="db-empty-actions">
          <a href="#" class="db-topbar-btn db-btn-primary" style="padding:12px 24px;font-size:15px;">+ Add your first property</a>
        </div>
      </div>

    @else

      <!-- Stats row -->
      <div class="db-stats">
        <div class="db-stat-card highlight">
          <div class="db-stat-label">Collected this month</div>
          <div class="db-stat-value">$0</div>
          <div class="db-stat-sub">Across 0 properties</div>
        </div>
        <div class="db-stat-card">
          <div class="db-stat-label">Active leases</div>
          <div class="db-stat-value">0</div>
          <div class="db-stat-sub">0 countries</div>
        </div>
        <div class="db-stat-card">
          <div class="db-stat-label">Arrears</div>
          <div class="db-stat-value">0</div>
          <div class="db-stat-sub">All payments current</div>
        </div>
        <div class="db-stat-card">
          <div class="db-stat-label">Maintenance open</div>
          <div class="db-stat-value">0</div>
          <div class="db-stat-sub">No open requests</div>
        </div>
      </div>

      <!-- Quick actions -->
      <div class="db-actions-grid">
        <a href="#" class="db-action-card">
          <div class="db-action-icon">🏠</div>
          <div class="db-action-title">Add a property</div>
          <div class="db-action-desc">Select country. Local payment connected automatically.</div>
        </a>
        <a href="#" class="db-action-card">
          <div class="db-action-icon">📋</div>
          <div class="db-action-title">Create a lease</div>
          <div class="db-action-desc">Set rent, due date, and send your tenant an invite.</div>
        </a>
        <a href="#" class="db-action-card">
          <div class="db-action-icon">📤</div>
          <div class="db-action-title">Export tax report</div>
          <div class="db-action-desc">Annual income report per property for your CPA.</div>
        </a>
      </div>

    @endif

  </div>
</div>

<script>
// Mobile sidebar toggle
const sidebar = document.getElementById('dbSidebar');
</script>
</body>
</html>
