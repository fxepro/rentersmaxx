@extends('layouts.app')

@section('title', 'Join the Waitlist — Rentersmaxx')
@section('meta_description', 'Be first when Rentersmaxx launches in your country. Join the waitlist for the international landlord platform that collects rent locally in any currency.')

@push('styles')
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
  --white: #ffffff; --radius: 16px; --radius-lg: 26px;
}
html { scroll-behavior: smooth; }
body { font-family: 'Outfit', sans-serif; font-weight: 400; color: var(--text-dark); background: var(--cream); overflow-x: hidden; }
h1,h2,h3,h4 { font-family: 'Fraunces', serif; font-weight: 500; line-height: 1.1; }

/* ── NAV ── */
.rm-nav { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; display: flex; align-items: center; justify-content: space-between; padding: 0 72px; height: 80px; background: rgba(13,31,53,0.94); backdrop-filter: blur(20px); border-bottom: 1px solid var(--navy-border); transition: background 0.3s; }
.rm-nav.scrolled { background: rgba(13,31,53,0.99); }
.rm-nav-logo { font-family: 'Fraunces', serif; font-size: 22px; font-weight: 700; color: var(--white); text-decoration: none; letter-spacing: -0.5px; flex-shrink: 0; }
.rm-nav-logo span { color: var(--terra-light); }
.rm-nav-links { display: flex; align-items: center; gap: 4px; list-style: none; margin: 0 auto; padding: 0 32px; }
.rm-nav-links a { display: flex; align-items: center; padding: 7px 14px; border-radius: 16px; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 14px; transition: color 0.2s, background 0.2s; white-space: nowrap; }
.rm-nav-links a:hover { color: var(--white); background: rgba(255,255,255,0.06); }
.rm-nav-links a.active { color: var(--white); background: rgba(255,255,255,0.1); }
.rm-nav-cta { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
.rm-btn { display: inline-flex; align-items: center; gap: 6px; padding: 9px 20px; border-radius: 8px; font-family: 'Outfit', sans-serif; font-size: 14px; font-weight: 500; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; white-space: nowrap; }
.rm-btn-ghost { background: transparent; color: rgba(255,255,255,0.65); border: 1px solid rgba(255,255,255,0.16); }
.rm-btn-ghost:hover { color: var(--white); background: rgba(255,255,255,0.06); border-color: rgba(255,255,255,0.28); }
.rm-btn-primary { background: var(--terra); color: var(--white); border: 1px solid transparent; }
.rm-btn-primary:hover { background: var(--terra-light); transform: translateY(-1px); }
.rm-hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 4px; background: none; border: none; }
.rm-hamburger span { display: block; width: 22px; height: 2px; background: rgba(255,255,255,0.7); border-radius: 2px; transition: all 0.3s; }
.rm-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.rm-hamburger.open span:nth-child(2) { opacity: 0; }
.rm-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
.rm-drawer { position: fixed; top: 80px; left: 0; right: 0; background: var(--navy); border-bottom: 1px solid var(--navy-border); padding: 22px 20px 24px; z-index: 999; transform: translateY(-110%); transition: transform 0.3s ease; }
.rm-drawer.open { transform: translateY(0); }
.rm-drawer a { display: block; padding: 12px 16px; border-radius: 13px; color: rgba(255,255,255,0.65); text-decoration: none; font-size: 15px; transition: background 0.2s, color 0.2s; margin-bottom: 2px; }
.rm-drawer a:hover, .rm-drawer a.active { background: rgba(255,255,255,0.07); color: var(--white); }
.rm-drawer-cta { display: flex; gap: 10px; margin-top: 18px; padding-top: 14px; border-top: 1px solid var(--navy-border); }
.rm-drawer-cta .rm-btn { flex: 1; justify-content: center; }

/* ── SHARED ── */
.container { max-width: 1320px; margin: 0 auto; }
.container-sm { max-width: 920px; margin: 0 auto; }
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: none; }

/* ── MAIN LAYOUT ── */
.waitlist-page {
  min-height: 100vh;
  display: grid;
  grid-template-columns: 1fr 1fr;
  padding-top: 80px;
}

/* ── LEFT PANEL ── */
.wl-left {
  background: var(--navy);
  padding: 80px 64px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: relative;
  overflow: hidden;
  min-height: calc(100vh - 68px);
}

.wl-grid {
  position: absolute; inset: 0;
  background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
  background-size: 60px 60px; pointer-events: none;
}
.wl-glow {
  position: absolute; width: 500px; height: 500px; border-radius: 50%;
  background: radial-gradient(circle, rgba(196,98,45,0.12) 0%, transparent 70%);
  top: 30%; left: 20%; transform: translate(-50%, -50%); pointer-events: none;
}

.wl-badge {
  display: inline-flex; align-items: center; gap: 13px;
  background: rgba(196,98,45,0.15); border: 1px solid rgba(196,98,45,0.3);
  color: var(--terra-light); padding: 8px 18px; border-radius: 100px;
  font-size: 21px; font-weight: 500; margin-bottom: 40px; letter-spacing: 0.03em;
  width: fit-content;
}
.wl-badge-dot { width: 13px; height: 13px; border-radius: 50%; background: var(--terra-light); animation: blink 2s ease infinite; }
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

.wl-left h1 {
  font-size: clamp(44px, 4vw, 56px); color: var(--white);
  letter-spacing: -0.03em; margin-bottom: 26px;
}
.wl-left h1 em { font-style: italic; color: var(--terra-light); }

.wl-left .lead {
  font-size: 23px; color: rgba(255,255,255,0.5); font-weight: 300;
  line-height: 1.7; margin-bottom: 48px; max-width: 500px;
}

/* Launch countries */
.launch-countries { margin-bottom: 48px; }
.launch-label { font-size: 23px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: rgba(255,255,255,0.3); margin-bottom: 26px; }
.launch-flags { display: flex; flex-direction: column; gap: 13px; }
.launch-flag-row {
  display: flex; align-items: center; gap: 18px;
  padding: 16px 20px; border-radius: 13px;
  background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06);
}
.lf-flag { font-size: 23px; flex-shrink: 0; }
.lf-info { flex: 1; }
.lf-country { font-size: 23px; font-weight: 500; color: rgba(255,255,255,0.85); }
.lf-detail { font-size: 21px; color: rgba(255,255,255,0.3); margin-top: 1px; }
.lf-status { font-size: 23px; font-weight: 600; padding: 6px 14px; border-radius: 100px; }
.lf-live { background: rgba(42,107,74,0.2); color: #5CC98A; }
.lf-soon { background: rgba(201,150,58,0.15); color: var(--gold); }

/* What you get */
.wl-perks { display: flex; flex-direction: column; gap: 18px; }
.wl-perk { display: flex; align-items: flex-start; gap: 26px; }
.wl-perk-icon { font-size: 21px; flex-shrink: 0; margin-top: 1px; }
.wl-perk-text { font-size: 23px; color: rgba(255,255,255,0.5); line-height: 1.5; font-weight: 300; }
.wl-perk-text strong { color: rgba(255,255,255,0.85); font-weight: 500; }

/* ── RIGHT PANEL ── */
.wl-right {
  background: var(--white);
  padding: 80px 64px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.wl-form-header { margin-bottom: 40px; }
.wl-form-header h2 { font-size: clamp(30px, 3vw, 36px); color: var(--text-dark); margin-bottom: 13px; letter-spacing: -0.02em; }
.wl-form-header p { font-size: 21px; color: var(--text-mid); font-weight: 300; line-height: 1.6; }

.wl-form { display: flex; flex-direction: column; gap: 26px; }

.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 26px; }

.form-group { display: flex; flex-direction: column; gap: 13px; }
.form-group label { font-size: 19px; font-weight: 500; color: var(--text-dark); }
.form-group label .req { color: var(--terra); margin-left: 2px; }

.form-input, .form-select {
  padding: 16px 20px; border-radius: 16px;
  border: 1px solid var(--cream-dark); background: var(--cream);
  font-family: 'Outfit', sans-serif; font-size: 23px; color: var(--text-dark);
  outline: none; transition: border-color 0.2s, background 0.2s;
  width: 100%;
}
.form-input:focus, .form-select:focus { border-color: var(--terra); background: var(--white); }
.form-input::placeholder { color: var(--text-light); }
.form-select { appearance: none; cursor: pointer; background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='%238A99AA' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 14px center; padding-right: 36px; }

.form-checkbox-group { display: flex; flex-direction: column; gap: 13px; }
.form-checkbox { display: flex; align-items: flex-start; gap: 13px; cursor: pointer; }
.form-checkbox input[type="checkbox"] { width: 20px; height: 20px; border-radius: 4px; border: 1px solid var(--cream-dark); flex-shrink: 0; margin-top: 2px; accent-color: var(--terra); cursor: pointer; }
.form-checkbox span { font-size: 19px; color: var(--text-mid); line-height: 1.5; font-weight: 300; }
.form-checkbox span strong { color: var(--text-dark); font-weight: 500; }

.form-divider { height: 1px; background: var(--cream-dark); }

.form-submit {
  padding: 19px; border-radius: 13px; background: var(--terra); color: var(--white);
  font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 600;
  border: none; cursor: pointer; transition: all 0.2s; width: 100%;
}
.form-submit:hover { background: var(--terra-light); transform: translateY(-1px); }
.form-submit:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

.form-legal { font-size: 21px; color: var(--text-light); line-height: 1.6; text-align: center; }
.form-legal a { color: var(--text-mid); text-decoration: underline; }

/* ── SUCCESS STATE ── */
.wl-success {
  display: none;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 40px 0;
}
.success-icon { font-size: 56px; margin-bottom: 30px; }
.wl-success h2 { font-size: 32px; color: var(--text-dark); margin-bottom: 22px; letter-spacing: -0.02em; }
.wl-success p { font-size: 19px; color: var(--text-mid); font-weight: 300; line-height: 1.7; max-width: 460px; margin-bottom: 40px; }
.wl-success .ref-num { display: inline-block; padding: 8px 20px; border-radius: 100px; background: var(--cream-dark); font-size: 19px; font-weight: 600; color: var(--text-dark); letter-spacing: 0.08em; margin-bottom: 40px; }
.success-links { display: flex; gap: 26px; flex-wrap: wrap; justify-content: center; }
.success-link { display: inline-flex; align-items: center; gap: 13px; padding: 10px 20px; border-radius: 13px; font-size: 23px; font-weight: 500; text-decoration: none; transition: all 0.2s; border: 1px solid var(--cream-dark); color: var(--text-dark); }
.success-link:hover { background: var(--cream-dark); }
.success-link.primary { background: var(--terra); color: var(--white); border-color: var(--terra); }
.success-link.primary:hover { background: var(--terra-light); }

/* ── SOCIAL PROOF STRIP ── */
.social-proof { background: var(--cream-dark); padding: 60px 32px; }
.social-proof-inner { max-width: 1320px; margin: 0 auto; display: grid; grid-template-columns: repeat(3,1fr); gap: 50px; align-items: center; text-align: center; }
.sp-stat .sp-num { font-family: 'Fraunces', serif; font-size: 40px; color: var(--text-dark); letter-spacing: -0.02em; }
.sp-stat .sp-num span { color: var(--terra); }
.sp-stat .sp-label { font-size: 23px; color: var(--text-mid); font-weight: 300; margin-top: 4px; }
.sp-quote { font-family: 'Fraunces', serif; font-size: 21px; font-style: italic; color: var(--text-dark); font-weight: 300; line-height: 1.5; }
.sp-quote cite { display: block; font-family: 'Outfit', sans-serif; font-size: 19px; color: var(--text-light); font-style: normal; margin-top: 10px; font-weight: 400; }

/* ── FOOTER ── */
.rm-footer { background: var(--navy); padding: 88px 32px 40px; }
.rm-footer-inner { max-width: 1320px; margin: 0 auto; }
.rm-footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 1fr; gap: 80px; padding-bottom: 52px; border-bottom: 1px solid var(--navy-border); margin-bottom: 40px; }
.rm-footer-logo { font-family: 'Fraunces', serif; font-size: 22px; font-weight: 700; color: var(--white); text-decoration: none; display: inline-block; margin-bottom: 22px; }
.rm-footer-logo span { color: var(--terra-light); }
.rm-footer-brand p { font-size: 14px; color: rgba(255,255,255,0.34); line-height: 1.7; font-weight: 300; max-width: 320px; margin-bottom: 22px; }
.rm-footer-socials { display: flex; gap: 13px; }
.rm-social { width: 56px; height: 56px; border-radius: 13px; border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 19px; color: rgba(255,255,255,0.4); transition: all 0.2s; }
.rm-social:hover { border-color: rgba(255,255,255,0.25); color: var(--white); background: rgba(255,255,255,0.06); }
.rm-footer-col h5 { font-size: 11px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: rgba(255,255,255,0.26); margin-bottom: 22px; }
.rm-footer-links { list-style: none; display: flex; flex-direction: column; gap: 11px; }
.rm-footer-links a { font-size: 14px; color: rgba(255,255,255,0.44); text-decoration: none; transition: color 0.2s; }
.rm-footer-links a:hover { color: var(--white); }
.rm-badge { display: inline-block; padding: 4px 10px; background: rgba(196,98,45,0.2); border-radius: 4px; font-size: 11px; color: var(--terra-light); font-weight: 600; letter-spacing: 0.04em; margin-left: 6px; }
.rm-footer-compliance { display: flex; align-items: center; gap: 26px; flex-wrap: wrap; margin-bottom: 36px; }
.rm-compliance-item { font-size: 12px; color: rgba(255,255,255,0.24); }
.rm-footer-bottom { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 18px; }
.rm-footer-copy { font-size: 13px; color: rgba(255,255,255,0.22); }
.rm-footer-legal { display: flex; align-items: center; gap: 13px; }
.rm-footer-legal a { font-size: 13px; color: rgba(255,255,255,0.26); text-decoration: none; padding: 7px 12px; transition: color 0.2s; }
.rm-footer-legal a:hover { color: rgba(255,255,255,0.6); }
.rm-footer-legal-sep { color: rgba(255,255,255,0.1); font-size: 21px; }
.rm-region-select { padding: 7px 32px 7px 12px; border-radius: 13px; border: 1px solid rgba(255,255,255,0.1); background: transparent; color: rgba(255,255,255,0.42); font-family: 'Outfit', sans-serif; font-size: 13px; cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='rgba(255,255,255,0.28)' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 10px center; }
.rm-region-select option { background: var(--navy-mid); color: var(--white); }

/* ── MOBILE ── */
@media (max-width: 1000px) { .rm-nav { padding: 0 20px; } .rm-nav-links, .rm-nav-cta { display: none; } .rm-hamburger { display: flex; } }
@media (max-width: 768px) {
  .waitlist-page { grid-template-columns: 1fr; }
  .wl-left { min-height: auto; padding: 60px 28px; }
  .wl-right { padding: 60px 28px; }
  .form-row { grid-template-columns: 1fr; }
  .social-proof-inner { grid-template-columns: 1fr; gap: 30px; }
  .rm-footer-top { grid-template-columns: 1fr 1fr; }
  .rm-footer-brand { grid-column: 1 / -1; }
}
</style>
@endpush

@php
  $page = 'waitlist';
  $hideFooter = false;
@endphp

@section('content')
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


<script>
// ── NAV ──
const nav    = document.getElementById('rmNav');
const burger = document.getElementById('rmBurger');
const drawer = document.getElementById('rmDrawer');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 20), {passive:true});
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
@endsection

@push('scripts')
<script>
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
