@extends('layouts.app')

@section('title', 'How it works — Rentersmaxx')
@section('meta_description', 'Three steps. Any country. See exactly how Rentersmaxx collects rent locally and consolidates it into your dashboard.')

@php
  $page = 'how-it-works';
  $hideFooter = false;
@endphp

@section('content')
<button class="rm-hamburger" id="rmBurger" aria-label="Menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</nav>
<div class="rm-drawer" id="rmDrawer">
  <a href="{{ url('/how-it-works') }}">How it works</a>
  <a href="{{ url('/features') }}">Features</a>
  <a href="{{ url('/pricing') }}">Pricing</a>
  <a href="{{ url('/countries') }}">Countries</a>
  <div class="rm-drawer-cta">
    <a href="{{ url('/login') }}" class="rm-btn rm-btn-ghost">Sign in</a>
    <a href="{{ url('/waitlist') }}" class="rm-btn rm-btn-primary">Join waitlist →</a>
  </div>
</div>

<!-- ══ PAGE HERO ══ -->
<div class="page-hero">
  <div class="page-hero-grid"></div>
  <div class="page-hero-glow"></div>
  <div class="page-hero-label">How it works</div>
  <h1>Three steps.<br><em>Any country.</em></h1>
  <p>Complex payment rails, local regulations, and multi-currency accounting — all handled invisibly. You just add a property and collect rent.</p>
  <div class="page-hero-ctas">
    <a href="{{ url('/waitlist') }}" class="rm-btn rm-btn-primary btn-lg">Join the waitlist</a>
    <a href="{{ url('/features') }}" class="btn-outline-light">See all features</a>
  </div>
</div>

<!-- ══ OVERVIEW STRIP ══ -->
<div class="overview">
  <div class="container">
    <div class="overview-grid">
      <a href="#step-1" class="overview-card active">
        <div class="overview-num">01</div>
        <div class="overview-text">
          <h3>Add your property</h3>
          <p>Select country. Local payment set up automatically.</p>
        </div>
      </a>
      <a href="#step-2" class="overview-card">
        <div class="overview-num">02</div>
        <div class="overview-text">
          <h3>Your tenant pays locally</h3>
          <p>They set up a mandate in their own currency.</p>
        </div>
      </a>
      <a href="#step-3" class="overview-card">
        <div class="overview-num">03</div>
        <div class="overview-text">
          <h3>You see it all in one place</h3>
          <p>Unified dashboard. Every currency. One view.</p>
        </div>
      </a>
    </div>
  </div>
</div>

<!-- ══ DEEP DIVE ══ -->
<section class="deep-dive" id="step-1">
  <div class="container">

    <!-- STEP 1 -->
    <div class="step-block reveal">
      <div class="step-content">
        <div class="step-eyebrow">
          <div class="step-badge">1</div>
          <span class="step-tag">Getting started</span>
        </div>
        <h2>Add your property.<br>We handle the rest.</h2>
        <p class="lead">Select the country your property is in and Rentersmaxx automatically connects the right local payment method. Address fields adapt to that country — PIN codes in India, postcodes in France, ZIP codes in the US.</p>
        <div class="substeps">
          <div class="substep">
            <span class="substep-icon">🌍</span>
            <div class="substep-content">
              <h4>Select country from 60+ supported markets</h4>
              <p>From France to Nigeria to Vietnam — each country uses the right local payment method automatically. No manual setup required.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">📍</span>
            <div class="substep-content">
              <h4>Localised address fields</h4>
              <p>Address forms adapt automatically. Indian properties show PIN code fields. French properties show commune and département. No generic forms.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">💱</span>
            <div class="substep-content">
              <h4>Currency locked to country</h4>
              <p>Rent amount is set in the local currency — EUR for France, INR for India, GBP for the UK. Your dashboard shows the USD equivalent alongside.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">🆓</span>
            <div class="substep-content">
              <h4>First property free for one month</h4>
              <p>No payment required to add your first property. Pay per unit from the second onwards.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="visual-panel">
        <div class="v-country">
          <div class="v-header">
            <div class="v-dots"><div class="vd vd-r"></div><div class="vd vd-y"></div><div class="vd vd-g"></div></div>
            <span class="v-title">Add a property — select country</span>
          </div>
          <div class="country-option">
            <div class="country-option-left">
              <span class="c-flag">🇫🇷</span>
              <div>
                <div class="c-name">France</div>
                <div class="c-processor">SEPA Direct Debit</div>
              </div>
            </div>
            <div class="c-radio"></div>
          </div>
          <div class="country-option selected">
            <div class="country-option-left">
              <span class="c-flag">🇮🇳</span>
              <div>
                <div class="c-name">India</div>
                <div class="c-processor">UPI · NEFT · NACH</div>
              </div>
            </div>
            <div class="c-check">✓</div>
          </div>
          <div class="country-option">
            <div class="country-option-left">
              <span class="c-flag">🇬🇧</span>
              <div>
                <div class="c-name">United Kingdom</div>
                <div class="c-processor">BACS Direct Debit</div>
              </div>
            </div>
            <div class="c-radio"></div>
          </div>
          <div class="country-option">
            <div class="country-option-left">
              <span class="c-flag">🇳🇬</span>
              <div>
                <div class="c-name">Nigeria</div>
                <div class="c-processor">Bank Transfer</div>
              </div>
            </div>
            <div class="c-radio"></div>
          </div>
          <div class="v-assigned">
            <span class="v-assigned-icon">⚡</span>
            <div class="v-assigned-text"><strong>Local payment assigned automatically</strong> — UPI, NEFT, NACH and cards all supported. Rent will be collected in INR.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- STEP 2 -->
    <div class="step-block flip reveal" id="step-2">
      <div class="step-content">
        <div class="step-eyebrow">
          <div class="step-badge terra">2</div>
          <span class="step-tag">Tenant onboarding</span>
        </div>
        <h2>Your tenant pays<br>the way they know.</h2>
        <p class="lead">Once you create the lease and set the rent amount, your tenant receives an email invite in their language. They connect their local bank account or UPI ID and authorise a recurring payment mandate. They never deal with international transfers.</p>
        <div class="substeps">
          <div class="substep">
            <span class="substep-icon">📧</span>
            <div class="substep-content">
              <h4>Localised invite email</h4>
              <p>Tenant receives the invite in their language — French for France, Hindi or English for India. The payment setup page is fully localised too.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">🔗</span>
            <div class="substep-content">
              <h4>One-time mandate setup</h4>
              <p>Tenant connects their bank account or UPI ID once. The mandate authorises recurring collections — they don't need to take action each month.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">📅</span>
            <div class="substep-content">
              <h4>Automatic collection on due date</h4>
              <p>Rent is pulled on the day you set — 1st of the month, 15th, or any day. No manual reminders, no chasing. Tenant gets a notification on each collection.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">🔔</span>
            <div class="substep-content">
              <h4>You're notified immediately</h4>
              <p>Push notification and email on every payment event — success, failure, or retry. Nothing happens silently.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="visual-panel">
        <div class="v-mandate">
          <p style="font-size:19px;font-weight:600;color:var(--text-dark);margin-bottom:20px;">Tenant onboarding — Bandra West, Mumbai</p>
          <div class="mandate-flow">
            <div class="mandate-step-card done">
              <div class="ms-num">1</div>
              <div class="ms-text"><h5>Account created</h5><p>Priya S. registered via email invite</p></div>
              <span class="ms-badge ms-done">Done</span>
            </div>
            <div class="connector"></div>
            <div class="mandate-step-card done">
              <div class="ms-num">2</div>
              <div class="ms-text"><h5>Lease reviewed</h5><p>₹ 75,000 / month · due 1st</p></div>
              <span class="ms-badge ms-done">Done</span>
            </div>
            <div class="connector"></div>
            <div class="mandate-step-card active-card">
              <div class="ms-num">3</div>
              <div class="ms-text"><h5>UPI mandate setup</h5><p>Authorising recurring payment via UPI AutoPay</p></div>
              <span class="ms-badge ms-now">In progress</span>
            </div>
            <div class="connector"></div>
            <div class="mandate-step-card">
              <div class="ms-num">4</div>
              <div class="ms-text"><h5>First collection</h5><p>Scheduled for 1 Jun 2025</p></div>
              <span class="ms-badge ms-next">Upcoming</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- STEP 3 -->
    <div class="step-block reveal" id="step-3">
      <div class="step-content">
        <div class="step-eyebrow">
          <div class="step-badge green">3</div>
          <span class="step-tag">Your dashboard</span>
        </div>
        <h2>Every property.<br>One dashboard.</h2>
        <p class="lead">All your properties — regardless of country or currency — appear in a single unified dashboard showing balances in your home currency. FX rates are snapshotted at each payment and never recalculated retroactively, keeping your tax records clean.</p>
        <div class="substeps">
          <div class="substep">
            <span class="substep-icon">💹</span>
            <div class="substep-content">
              <h4>FX rate logged at every payment</h4>
              <p>The exchange rate at the exact moment of each transaction is stored permanently. Your CPA has an airtight record for Schedule E and FBAR filings.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">🏦</span>
            <div class="substep-content">
              <h4>In-country balance tracking</h4>
              <p>See your EUR balance in France and INR balance in India separately. Repatriation — moving money to your US account — is your own process, logged manually in the app.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">📤</span>
            <div class="substep-content">
              <h4>Annual tax export</h4>
              <p>One click generates a CSV and PDF income report per property — in local currency and USD equivalent — ready for your accountant at year end.</p>
            </div>
          </div>
          <div class="substep">
            <span class="substep-icon">📈</span>
            <div class="substep-content">
              <h4>Portfolio view across all properties</h4>
              <p>Occupancy rate, income trends, arrears summary — across every country, every currency, in one place.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="visual-panel">
        <div class="v-dashboard">
          <div class="v-header">
            <div class="v-dots"><div class="vd vd-r"></div><div class="vd vd-y"></div><div class="vd vd-g"></div></div>
          </div>
          <div class="dash-header">
            <span class="dash-title">Portfolio overview</span>
            <span class="dash-period">May 2025</span>
          </div>
          <div class="dash-stats">
            <div class="dash-stat highlight">
              <div class="dash-stat-label">Total collected (USD)</div>
              <div class="dash-stat-value">$2,520</div>
              <div class="dash-stat-sub">This month · 3 properties</div>
            </div>
            <div class="dash-stat">
              <div class="dash-stat-label">Occupancy rate</div>
              <div class="dash-stat-value">100%</div>
              <div class="dash-stat-sub">All units tenanted</div>
            </div>
          </div>
          <div class="dash-props">
            <div class="dash-prop">
              <div class="dp-left">
                <span class="dp-flag">🇫🇷</span>
                <div>
                  <div class="dp-name">Rue de Rivoli, Paris</div>
                  <div class="dp-method">SEPA Direct Debit</div>
                </div>
              </div>
              <div class="dp-right">
                <div class="dp-local">€ 1,500</div>
                <div class="dp-usd">$1,620</div>
                <div class="dp-fx">@1.08 · 1 May</div>
              </div>
            </div>
            <div class="dash-prop">
              <div class="dp-left">
                <span class="dp-flag">🇮🇳</span>
                <div>
                  <div class="dp-name">Bandra West, Mumbai</div>
                  <div class="dp-method">UPI AutoPay</div>
                </div>
              </div>
              <div class="dp-right">
                <div class="dp-local">₹ 75,000</div>
                <div class="dp-usd">$900</div>
                <div class="dp-fx">@0.012 · 1 May</div>
              </div>
            </div>
            <div class="dash-prop">
              <div class="dp-left">
                <span class="dp-flag">🇬🇧</span>
                <div>
                  <div class="dp-name">Shoreditch, London</div>
                  <div class="dp-method">BACS Direct Debit</div>
                </div>
              </div>
              <div class="dp-right">
                <div class="dp-local">£ 0</div>
                <div class="dp-usd" style="color:var(--terra-light)">Due 3 Jun</div>
                <div class="dp-fx">Next collection</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>



<!-- ══ REPATRIATION NOTE ══ -->
<section class="repatriation">
  <div class="container">
    <div class="repa-grid reveal">
      <div class="repa-content">
        <p class="section-label">One thing to know</p>
        <h2 class="section-title">Your money never<br>crosses a border<br>without you.</h2>
        <p class="section-sub" style="font-size:19px;">Rentersmaxx is a local collection tool — not a remittance service. Here's what that means in practice.</p>
        <div class="repa-items">
          <div class="repa-item">
            <span class="repa-icon">🏦</span>
            <div class="repa-item-text">
              <h4>We collect locally</h4>
              <p>Rent lands in your in-country account — your NRO account in India, a EUR account in France. The app tracks the balance.</p>
            </div>
          </div>
          <div class="repa-item">
            <span class="repa-icon">✈️</span>
            <div class="repa-item-text">
              <h4>You repatriate yourself</h4>
              <p>Moving money to your US bank is your own process — via Wise, your bank's international wire, or in India via your CA with Form 15CA/15CB.</p>
            </div>
          </div>
          <div class="repa-item">
            <span class="repa-icon">📋</span>
            <div class="repa-item-text">
              <h4>We log it when you tell us</h4>
              <p>Record the repatriation date, amount, and exchange rate in the app. This builds your FBAR and Schedule E record automatically.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="repa-callout reveal">
        <p><strong>Why not automate the full transfer?</strong></p>
        <p>Cross-border money movement requires a remittance licence in every jurisdiction — a multi-year, multi-million dollar regulatory undertaking that would have delayed Rentersmaxx by years and added no direct value to most landlords.</p>
        <p>Instead we focus on what actually saves you time: automated local collection, clean records, and tax-ready exports. The repatriation step — once or twice a year via your existing bank — takes 20 minutes.</p>
        <p>This also keeps your money inside your own accounts at all times. <strong>We never hold your funds.</strong></p>
      </div>
    </div>
  </div>
</section>

<!-- ══ FOOTER ══ -->
@endsection

@push('scripts')
<script>
burger.addEventListener('click', () => {
  const open = drawer.classList.toggle('open');
  burger.classList.toggle('open', open);
  burger.setAttribute('aria-expanded', open);
});
const page = location.pathname.split('/').pop() || 'index.html';
document.querySelectorAll('.rm-nav-links a, .rm-drawer a').forEach(a => {
  if (a.getAttribute('href') === page) a.classList.add('active');
});

// ── OVERVIEW ACTIVE STATE ON SCROLL ──
const sections = ['step-1','step-2','step-3'];
const cards    = document.querySelectorAll('.overview-card');
window.addEventListener('scroll', () => {
  let current = 0;
  sections.forEach((id, i) => {
    const el = document.getElementById(id);
    if (el && window.scrollY >= el.offsetTop - 200) current = i;
  });
  cards.forEach((c, i) => c.classList.toggle('active', i === current));
}, {passive:true});

// ── SCROLL REVEAL ──
const observer = new IntersectionObserver(
  entries => entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } }),
  { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
);
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>
@endpush
