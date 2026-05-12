@extends('layouts.app')

@section('title', 'Join the Waitlist — Rentersmaxx')
@section('meta_description', 'Be first when Rentersmaxx launches in your country. Join the waitlist for the international landlord platform.')

@php
  $page = 'waitlist';
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

<!-- ══ MAIN ══ -->
<div class="waitlist-page">

  <!-- LEFT -->
  <div class="wl-left">
    <div class="wl-grid"></div>
    <div class="wl-glow"></div>

    <div class="wl-badge"><span class="wl-badge-dot"></span>Early access open</div>

    <h1>Be first when we<br>launch in <em>your country.</em></h1>
    <p class="lead">Rentersmaxx is rolling out country by country. Join the waitlist and we'll reach out as soon as we open in your market — with your first month free.</p>

    <div class="launch-countries">
      <p class="launch-label">Launch markets</p>
      <div class="launch-flags">
        <div class="launch-flag-row">
          <span class="lf-flag">🇺🇸</span>
          <div class="lf-info"><div class="lf-country">United States</div><div class="lf-detail">ACH · USD · Full feature set</div></div>
          <span class="lf-status lf-live">Launching first</span>
        </div>
        <div class="launch-flag-row">
          <span class="lf-flag">🇬🇧</span>
          <div class="lf-info"><div class="lf-country">United Kingdom</div><div class="lf-detail">BACS · GBP · Full feature set</div></div>
          <span class="lf-status lf-live">Launching first</span>
        </div>
        <div class="launch-flag-row">
          <span class="lf-flag">🇫🇷</span>
          <div class="lf-info"><div class="lf-country">France</div><div class="lf-detail">SEPA · EUR · Full feature set</div></div>
          <span class="lf-status lf-live">Launching first</span>
        </div>
        <div class="launch-flag-row">
          <span class="lf-flag">🇮🇳</span>
          <div class="lf-info"><div class="lf-country">India</div><div class="lf-detail">UPI · NEFT · INR · Full feature set</div></div>
          <span class="lf-status lf-live">Launching first</span>
        </div>
        <div class="launch-flag-row">
          <span class="lf-flag">🌍</span>
          <div class="lf-info"><div class="lf-country">60+ more countries</div><div class="lf-detail">Rolling out throughout 2025–2026</div></div>
          <span class="lf-status lf-soon">Coming soon</span>
        </div>
      </div>
    </div>

    <div class="wl-perks">
      <div class="wl-perk"><span class="wl-perk-icon">🎁</span><div class="wl-perk-text"><strong>First month free</strong> — no credit card required to get started.</div></div>
      <div class="wl-perk"><span class="wl-perk-icon">🔔</span><div class="wl-perk-text"><strong>Launch notification</strong> — we'll email you the moment your country goes live.</div></div>
      <div class="wl-perk"><span class="wl-perk-icon">💬</span><div class="wl-perk-text"><strong>Shape the product</strong> — early members get direct access to the founding team.</div></div>
      <div class="wl-perk"><span class="wl-perk-icon">🔒</span><div class="wl-perk-text"><strong>No obligation</strong> — joining the list doesn't commit you to anything.</div></div>
    </div>
  </div>

  <!-- RIGHT -->
  <div class="wl-right">

    <!-- Form -->
    <div id="wlFormWrap">
      <div class="wl-form-header">
        <h2>Join the waitlist</h2>
        <p>Tell us about your portfolio and we'll prioritise your market accordingly.</p>
      </div>

      <form class="wl-form" id="wlForm" onsubmit="submitWaitlist(event)">

        <div class="form-row">
          <div class="form-group">
            <label>First name <span class="req">*</span></label>
            <input type="text" class="form-input" placeholder="Alex" required>
          </div>
          <div class="form-group">
            <label>Last name <span class="req">*</span></label>
            <input type="text" class="form-input" placeholder="Johnson" required>
          </div>
        </div>

        <div class="form-group">
          <label>Email address <span class="req">*</span></label>
          <input type="email" class="form-input" placeholder="alex@example.com" required id="wlEmail">
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Where do you live? <span class="req">*</span></label>
            <select class="form-select" required>
              <option value="" disabled selected>Select country</option>
              <option>United States</option>
              <option>United Kingdom</option>
              <option>Canada</option>
              <option>Australia</option>
              <option>Singapore</option>
              <option>UAE</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group">
            <label>How many properties?</label>
            <select class="form-select">
              <option value="" disabled selected>Select range</option>
              <option>1 property</option>
              <option>2–5 properties</option>
              <option>6–10 properties</option>
              <option>10+ properties</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label>Where are your properties? <span class="req">*</span></label>
          <input type="text" class="form-input" placeholder="e.g. France, India, Nigeria" required>
        </div>

        <div class="form-divider"></div>

        <div class="form-group">
          <label>What's your biggest pain point right now?</label>
          <select class="form-select">
            <option value="" disabled selected>Select one (optional)</option>
            <option>Chasing rent across time zones</option>
            <option>No single view of all my properties</option>
            <option>Currency conversion and FX tracking</option>
            <option>Tax reporting across multiple countries</option>
            <option>Tenant communication is scattered</option>
            <option>Existing apps don't support my countries</option>
            <option>Other</option>
          </select>
        </div>

        <div class="form-group">
          <label style="margin-bottom:10px;">I'm interested in:</label>
          <div class="form-checkbox-group">
            <label class="form-checkbox"><input type="checkbox" checked><span><strong>Automated rent collection</strong> — local payment in tenant's currency</span></label>
            <label class="form-checkbox"><input type="checkbox" checked><span><strong>Unified dashboard</strong> — all properties, all currencies</span></label>
            <label class="form-checkbox"><input type="checkbox"><span><strong>Tax-ready exports</strong> — annual report per property for my CPA</span></label>
            <label class="form-checkbox"><input type="checkbox"><span><strong>Maintenance management</strong> — tenant requests and history</span></label>
          </div>
        </div>

        <button type="submit" class="form-submit" id="wlSubmit">Join the waitlist →</button>

        <p class="form-legal">By joining you agree to our <a href="{{ url('/privacy') }}">Privacy Policy</a> and <a href="{{ url('/terms') }}">Terms of Service</a>. We will never share your information or send you spam.</p>

      </form>
    </div>

    <!-- Success state -->
    <div class="wl-success" id="wlSuccess">
      <div class="success-icon">🎉</div>
      <h2>You're on the list.</h2>
      <p>We'll reach out as soon as Rentersmaxx launches in your market — with your first month free and early access to the founding team.</p>
      <div class="ref-num" id="wlRef">REF-000000</div>
      <div class="success-links">
        <a href="{{ url('/') }}" class="success-link">← Back to home</a>
        <a href="{{ url('/how-it-works') }}" class="success-link primary">See how it works →</a>
      </div>
    </div>

  </div>
</div>

<!-- ══ SOCIAL PROOF ══ -->
<div class="social-proof">
  <div class="social-proof-inner">
    <div class="sp-stat">
      <div class="sp-num">60<span>+</span></div>
      <div class="sp-label">Countries in the platform</div>
    </div>
    <div>
      <p class="sp-quote">"Finally — an app that understands I own a flat in Mumbai and an apartment in Lyon. Not just something built for US landlords."<cite>— Early access member, Denver CO</cite></p>
    </div>
    <div class="sp-stat">
      <div class="sp-num">$9</div>
      <div class="sp-label">Per unit per month after first month</div>
    </div>
  </div>
</div>

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

// ── WAITLIST FORM ──
function submitWaitlist(e) {
  e.preventDefault();
  const btn   = document.getElementById('wlSubmit');
  btn.textContent = 'Submitting…';
  btn.disabled = true;

  // Simulate API call
  setTimeout(() => {
    const email  = document.getElementById('wlEmail').value;
    const ref    = 'RMX-' + Math.random().toString(36).substr(2,6).toUpperCase();
    document.getElementById('wlRef').textContent = ref;
    document.getElementById('wlFormWrap').style.display = 'none';
    const success = document.getElementById('wlSuccess');
    success.style.display = 'flex';
    // Scroll to top of right panel
    success.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }, 800);
}

// ── SCROLL REVEAL ──
const observer = new IntersectionObserver(
  entries => entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } }),
  { threshold: 0.08 }
);
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>
@endpush
