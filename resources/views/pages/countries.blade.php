@extends('layouts.app')

@section('title', 'Supported Countries — Rentersmaxx')
@section('meta_description', 'Rentersmaxx supports rent collection in 60+ countries across 7 regions. Local payment methods — SEPA, UPI, BACS, ACH and more.')

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
section { padding: 120px 32px; }
.container { max-width: 1320px; margin: 0 auto; }
.container-sm { max-width: 920px; margin: 0 auto; }
.section-label { font-size: 23px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; color: var(--terra); margin-bottom: 26px; }
.section-title { font-size: clamp(44px, 4vw, 52px); letter-spacing: -0.02em; line-height: 1.1; color: var(--text-dark); margin-bottom: 26px; }
.section-sub { font-size: 21px; color: var(--text-mid); font-weight: 300; line-height: 1.65; max-width: 680px; }
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: none; }

/* ── PAGE HERO ── */
.page-hero { background: var(--navy); padding: 160px 32px 80px; text-align: center; position: relative; overflow: hidden; }
.page-hero-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px); background-size: 60px 60px; pointer-events: none; }
.page-hero-glow { position: absolute; width: 700px; height: 700px; border-radius: 50%; background: radial-gradient(circle, rgba(196,98,45,0.11) 0%, transparent 70%); top: 50%; left: 50%; transform: translate(-50%, -60%); pointer-events: none; }
.page-hero-label { display: inline-flex; align-items: center; gap: 13px; background: rgba(196,98,45,0.12); border: 1px solid rgba(196,98,45,0.3); color: var(--terra-light); padding: 8px 18px; border-radius: 100px; font-size: 21px; font-weight: 500; margin-bottom: 36px; letter-spacing: 0.03em; }
.page-hero h1 { font-size: clamp(44px, 6vw, 76px); color: var(--white); letter-spacing: -0.03em; max-width: 920px; margin: 0 auto 22px; }
.page-hero h1 em { font-style: italic; color: var(--terra-light); }
.page-hero p { font-size: clamp(24px, 1.8vw, 20px); color: rgba(255,255,255,0.5); font-weight: 300; line-height: 1.65; max-width: 640px; margin: 0 auto 40px; }

/* ── STAT STRIP ── */
.stat-strip { background: var(--white); padding: 0; border-bottom: 1px solid var(--cream-dark); }
.stat-strip-inner { max-width: 1320px; margin: 0 auto; display: grid; grid-template-columns: repeat(4, 1fr); }
.stat-item { padding: 48px 40px; border-right: 1px solid var(--cream-dark); text-align: center; }
.stat-item:last-child { border-right: none; }
.stat-value { font-family: 'Fraunces', serif; font-size: 48px; font-weight: 400; color: var(--text-dark); letter-spacing: -0.03em; line-height: 1; margin-bottom: 11px; }
.stat-value span { color: var(--terra); }
.stat-label { font-size: 19px; color: var(--text-light); font-weight: 300; }

/* ── REGION FILTER ── */
.region-filter { background: var(--cream); padding: 42px 24px; border-bottom: 1px solid var(--cream-dark); position: sticky; top: 80px; z-index: 100; }
.region-filter-inner { max-width: 1320px; margin: 0 auto; display: flex; align-items: center; gap: 26px; flex-wrap: wrap; }
.region-filter-label { font-size: 19px; color: var(--text-light); font-weight: 500; margin-right: 4px; flex-shrink: 0; }
.region-btn { display: inline-flex; align-items: center; gap: 7px; padding: 8px 16px; border-radius: 100px; border: 1px solid var(--cream-dark); background: var(--white); font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 500; color: var(--text-mid); cursor: pointer; transition: all 0.2s; white-space: nowrap; }
.region-btn:hover { border-color: var(--terra); color: var(--terra); }
.region-btn.active { background: var(--navy); border-color: var(--navy); color: var(--white); }
.region-btn .r-flag { font-size: 23px; }
.search-wrap { margin-left: auto; flex-shrink: 0; }
.country-search { padding: 8px 16px 8px 36px; border-radius: 100px; border: 1px solid var(--cream-dark); background: var(--white); font-family: 'Outfit', sans-serif; font-size: 19px; color: var(--text-dark); outline: none; width: 240px; transition: all 0.2s; background-image: url("data:image/svg+xml,%3Csvg width='14' height='14' viewBox='0 0 14 14' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='6' cy='6' r='4.5' stroke='%238A99AA' stroke-width='1.3'/%3E%3Cpath d='M9.5 9.5L12 12' stroke='%238A99AA' stroke-width='1.3' stroke-linecap='round'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: 14px center; }
.country-search:focus { border-color: var(--terra); width: 240px; }
.country-search::placeholder { color: var(--text-light); }

/* ── COUNTRIES GRID ── */
.countries-section { background: var(--cream); padding: 72px 32px 100px; }

.region-block { margin-bottom: 64px; }
.region-block:last-child { margin-bottom: 0; }
.region-heading { display: flex; align-items: center; gap: 26px; margin-bottom: 30px; padding-bottom: 16px; border-bottom: 2px solid var(--cream-dark); }
.region-heading h2 { font-size: 25px; color: var(--text-dark); }
.region-heading .region-processor { font-size: 21px; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; padding: 4px 12px; border-radius: 100px; }
.region-count { font-size: 13px; color: var(--text-light); margin-left: auto; }

.country-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 3px; border-radius: var(--radius-lg); overflow: hidden; background: var(--cream-dark); }
.country-card { background: var(--white); padding: 26px; transition: background 0.15s; cursor: default; }
.country-card:hover { background: var(--terra-pale); }
.country-card.coming { background: var(--cream); opacity: 0.6; }
.country-card-top { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
.cc-flag { font-size: 20px; flex-shrink: 0; }
.cc-name { font-size: 14px; font-weight: 600; color: var(--text-dark); }
.cc-currency { font-size: 12px; color: var(--text-light); margin-top: 1px; }
.cc-methods { display: flex; flex-wrap: wrap; gap: 5px; }
.cc-method { font-size: 11px; padding: 3px 9px; border-radius: 100px; background: var(--cream-dark); color: var(--text-mid); font-weight: 500; }











/* ── REQUEST COUNTRY ── */
.request-section { background: var(--cream-dark); padding: 120px 32px; }
.request-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
.request-content h2 { font-size: clamp(44px, 3.5vw, 44px); color: var(--text-dark); margin-bottom: 22px; letter-spacing: -0.02em; }
.request-content p { font-size: 19px; color: var(--text-mid); line-height: 1.7; font-weight: 300; margin-bottom: 30px; }
.request-form-card { background: var(--white); border-radius: var(--radius-lg); padding: 40px; border: 1px solid var(--cream-dark); }
.request-form-card h3 { font-size: 23px; color: var(--text-dark); margin-bottom: 11px; }
.request-form-card p { font-size: 23px; color: var(--text-mid); margin-bottom: 30px; font-weight: 300; }
.form-group { margin-bottom: 26px; }
.form-group label { display: block; font-size: 19px; font-weight: 500; color: var(--text-dark); margin-bottom: 11px; }
.form-input { width: 100%; padding: 11px 14px; border-radius: 13px; border: 1px solid var(--cream-dark); font-family: 'Outfit', sans-serif; font-size: 23px; color: var(--text-dark); outline: none; background: var(--cream); transition: border-color 0.2s; }
.form-input:focus { border-color: var(--terra); background: var(--white); }
.form-input::placeholder { color: var(--text-light); }
.form-select { width: 100%; padding: 11px 14px; border-radius: 13px; border: 1px solid var(--cream-dark); font-family: 'Outfit', sans-serif; font-size: 23px; color: var(--text-dark); outline: none; background: var(--cream); transition: border-color 0.2s; appearance: none; cursor: pointer; }
.form-select:focus { border-color: var(--terra); background: var(--white); }
.form-submit { width: 100%; padding: 13px; border-radius: 16px; background: var(--navy); color: var(--white); font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; margin-top: 8px; }
.form-submit:hover { background: var(--navy-mid); transform: translateY(-1px); }
.form-note { font-size: 21px; color: var(--text-light); text-align: center; margin-top: 12px; }

/* ── CTA BANNER ── */
.rm-cta-banner { background: var(--terra); padding: 88px 24px; text-align: center; }
.rm-cta-banner h2 { font-family: 'Fraunces', serif; font-size: clamp(38px, 5vw, 60px); font-weight: 500; color: var(--white); letter-spacing: -0.02em; margin-bottom: 22px; }
.rm-cta-banner h2 em { font-style: italic; opacity: 0.82; }
.rm-cta-banner p { font-size: 23px; color: rgba(255,255,255,0.65); font-weight: 300; margin-bottom: 40px; max-width: 540px; margin-left: auto; margin-right: auto; line-height: 1.6; }
.rm-waitlist-form { display: flex; gap: 13px; justify-content: center; flex-wrap: wrap; max-width: 540px; margin: 0 auto 14px; }
.rm-waitlist-input { flex: 1; min-width: 260px; padding: 17px 22px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.25); font-family: 'Outfit', sans-serif; font-size: 21px; outline: none; background: rgba(255,255,255,0.12); color: var(--white); transition: all 0.2s; }
.rm-waitlist-input::placeholder { color: rgba(255,255,255,0.45); }
.rm-waitlist-input:focus { background: rgba(255,255,255,0.18); border-color: rgba(255,255,255,0.5); }
.rm-waitlist-btn { padding: 17px 30px; border-radius: 16px; background: var(--white); color: var(--terra); font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; white-space: nowrap; }
.rm-waitlist-btn:hover { background: var(--cream); transform: translateY(-1px); }
.rm-waitlist-note { font-size: 19px; color: rgba(255,255,255,0.42); }

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
  section { padding: 64px 20px; }
  .stat-strip-inner { grid-template-columns: 1fr 1fr; }
  .stat-item { border-right: none; border-bottom: 1px solid var(--cream-dark); }
  .region-filter-inner { gap: 13px; }
  .request-inner { grid-template-columns: 1fr; gap: 50px; }
  .rm-footer-top { grid-template-columns: 1fr 1fr; }
  .rm-footer-brand { grid-column: 1 / -1; }
  .country-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 560px) {
  .country-grid { grid-template-columns: 1fr; }
  .stat-strip-inner { grid-template-columns: 1fr; }
}
</style>
@endpush

@php
  $page = 'countries';
  $hideFooter = false;
@endphp

@section('content')
</div>

<!-- ══ PAGE HERO ══ -->
<div class="page-hero">
  <div class="page-hero-grid"></div>
  <div class="page-hero-glow"></div>
  <div class="page-hero-label">Supported markets</div>
  <h1>60+ countries.<br><em>One integration.</em></h1>
  <p>Each country uses the right local payment method — automatically connected when you add a property. No manual configuration needed.</p>
</div>

<!-- ══ STAT STRIP ══ -->
<div class="stat-strip">
  <div class="stat-strip-inner">
    <div class="stat-item">
      <div class="stat-value">60<span>+</span></div>
      <div class="stat-label">Countries supported</div>
    </div>
    <div class="stat-item">
      <div class="stat-value">7</div>
      <div class="stat-label">Global regions covered</div>
    </div>
    <div class="stat-item">
      <div class="stat-value">5</div>
      <div class="stat-label">Local payment methods</div>
    </div>
    <div class="stat-item">
      <div class="stat-value">40<span>+</span></div>
      <div class="stat-label">Local payment methods</div>
    </div>
  </div>
</div>

<!-- ══ REGION FILTER ══ -->
<div class="region-filter" id="regionFilter">
  <div class="region-filter-inner">
    <span class="region-filter-label">Filter:</span>
    <button class="region-btn active" onclick="filterRegion('all')">🌍 All regions</button>
    <button class="region-btn" onclick="filterRegion('north-america')"><span class="r-flag">🌎</span>North America</button>
    <button class="region-btn" onclick="filterRegion('europe')"><span class="r-flag">🇪🇺</span>Europe</button>
    <button class="region-btn" onclick="filterRegion('india')"><span class="r-flag">🇮🇳</span>India</button>
    <button class="region-btn" onclick="filterRegion('africa')"><span class="r-flag">🌍</span>Africa</button>
    <button class="region-btn" onclick="filterRegion('southeast-asia')"><span class="r-flag">🌏</span>SE Asia</button>
    <button class="region-btn" onclick="filterRegion('latam')"><span class="r-flag">🌎</span>LatAm</button>
    <button class="region-btn" onclick="filterRegion('pacific')"><span class="r-flag">🌏</span>Pacific</button>
    <div class="search-wrap">
      <input type="text" class="country-search" placeholder="Search country…" id="countrySearch" oninput="searchCountries(this.value)">
    </div>
  </div>
</div>

<!-- ══ COUNTRIES ══ -->
<section class="countries-section">
  <div class="container">

    <!-- North America -->
    <div class="region-block" data-region="north-america" id="block-north-america">
      <div class="region-heading">
        <h2>🌎 North America</h2>
        <span class="region-count">2 countries</span>
      </div>
      <div class="country-grid">
        <div class="country-card" data-name="united states usa us">
          <div class="country-card-top"><span class="cc-flag">🇺🇸</span><div><div class="cc-name">United States</div><div class="cc-currency">USD · US Dollar</div></div></div>
          <div class="cc-methods"><span class="cc-method">ACH</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="canada">
          <div class="country-card-top"><span class="cc-flag">🇨🇦</span><div><div class="cc-name">Canada</div><div class="cc-currency">CAD · Canadian Dollar</div></div></div>
          <div class="cc-methods"><span class="cc-method">EFT</span><span class="cc-method">Cards</span></div>
        </div>
      </div>
    </div>

    <!-- Europe -->
    <div class="region-block" data-region="europe" id="block-europe">
      <div class="region-heading">
        <h2>🇪🇺 Europe</h2>
        <span class="region-count">25+ countries</span>
      </div>
      <div class="country-grid">
        <div class="country-card" data-name="united kingdom uk england britain">
          <div class="country-card-top"><span class="cc-flag">🇬🇧</span><div><div class="cc-name">United Kingdom</div><div class="cc-currency">GBP · British Pound</div></div></div>
          <div class="cc-methods"><span class="cc-method">BACS</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="france french">
          <div class="country-card-top"><span class="cc-flag">🇫🇷</span><div><div class="cc-name">France</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="germany german deutschland">
          <div class="country-card-top"><span class="cc-flag">🇩🇪</span><div><div class="cc-name">Germany</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="spain spanish espana">
          <div class="country-card-top"><span class="cc-flag">🇪🇸</span><div><div class="cc-name">Spain</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="italy italian italia">
          <div class="country-card-top"><span class="cc-flag">🇮🇹</span><div><div class="cc-name">Italy</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="netherlands holland dutch">
          <div class="country-card-top"><span class="cc-flag">🇳🇱</span><div><div class="cc-name">Netherlands</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">iDEAL</span></div>
        </div>
        <div class="country-card" data-name="portugal portuguese">
          <div class="country-card-top"><span class="cc-flag">🇵🇹</span><div><div class="cc-name">Portugal</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">MB Way</span></div>
        </div>
        <div class="country-card" data-name="belgium belgian">
          <div class="country-card-top"><span class="cc-flag">🇧🇪</span><div><div class="cc-name">Belgium</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Bancontact</span></div>
        </div>
        <div class="country-card" data-name="ireland irish">
          <div class="country-card-top"><span class="cc-flag">🇮🇪</span><div><div class="cc-name">Ireland</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="austria austrian">
          <div class="country-card-top"><span class="cc-flag">🇦🇹</span><div><div class="cc-name">Austria</div><div class="cc-currency">EUR · Euro</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">EPS</span></div>
        </div>
        <div class="country-card" data-name="switzerland swiss">
          <div class="country-card-top"><span class="cc-flag">🇨🇭</span><div><div class="cc-name">Switzerland</div><div class="cc-currency">CHF · Swiss Franc</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="sweden swedish">
          <div class="country-card-top"><span class="cc-flag">🇸🇪</span><div><div class="cc-name">Sweden</div><div class="cc-currency">SEK · Swedish Krona</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="norway norwegian">
          <div class="country-card-top"><span class="cc-flag">🇳🇴</span><div><div class="cc-name">Norway</div><div class="cc-currency">NOK · Norwegian Krone</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="denmark danish">
          <div class="country-card-top"><span class="cc-flag">🇩🇰</span><div><div class="cc-name">Denmark</div><div class="cc-currency">DKK · Danish Krone</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="poland polish">
          <div class="country-card-top"><span class="cc-flag">🇵🇱</span><div><div class="cc-name">Poland</div><div class="cc-currency">PLN · Polish Złoty</div></div></div>
          <div class="cc-methods"><span class="cc-method">SEPA</span><span class="cc-method">P24</span></div>
        </div>
        <div class="country-card" data-name="turkey turkish">
          <div class="country-card-top"><span class="cc-flag">🇹🇷</span><div><div class="cc-name">Turkey</div><div class="cc-currency">TRY · Turkish Lira</div></div></div>
          <div class="cc-methods"><span class="cc-method">Iyzico</span><span class="cc-method">Cards</span></div>
        </div>
      </div>
    </div>

    <!-- India -->
    <div class="region-block" data-region="india" id="block-india">
      <div class="region-heading">
        <h2>🇮🇳 India</h2>
        <span class="region-count">Full market coverage</span>
      </div>
      <div class="country-grid">
        <div class="country-card" data-name="india indian">
          <div class="country-card-top"><span class="cc-flag">🇮🇳</span><div><div class="cc-name">India</div><div class="cc-currency">INR · Indian Rupee</div></div></div>
          <div class="cc-methods"><span class="cc-method">UPI</span><span class="cc-method">NEFT</span><span class="cc-method">NACH</span><span class="cc-method">IMPS</span></div>
        </div>
      </div>
      <div style="margin-top:16px; padding:16px 20px; background:var(--terra-pale); border-radius:var(--radius); border:1px solid rgba(196,98,45,0.2);">
        <p style="font-size:23px; color:var(--terra); font-weight:500; margin-bottom:4px;">India requires special handling</p>
        <p style="font-size:19px; color:var(--text-mid); font-weight:300; line-height:1.6;">Rent must flow through an NRO account. Repatriation to your home country requires Form 15CA/15CB filed by a CA. Rentersmaxx collects rent locally in INR — repatriation to your home country is your responsibility. <a href="{{ url('/how-it-works') }}" style="color:var(--terra); font-weight:500;">Learn more →</a></p>
      </div>
    </div>

    <!-- Africa -->
    <div class="region-block" data-region="africa" id="block-africa">
      <div class="region-heading">
        <h2>🌍 Africa</h2>
        <span class="region-count">30+ countries</span>
      </div>
      <div class="country-grid">
        <div class="country-card" data-name="nigeria nigerian">
          <div class="country-card-top"><span class="cc-flag">🇳🇬</span><div><div class="cc-name">Nigeria</div><div class="cc-currency">NGN · Naira</div></div></div>
          <div class="cc-methods"><span class="cc-method">Bank transfer</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="kenya kenyan">
          <div class="country-card-top"><span class="cc-flag">🇰🇪</span><div><div class="cc-name">Kenya</div><div class="cc-currency">KES · Kenyan Shilling</div></div></div>
          <div class="cc-methods"><span class="cc-method">M-Pesa</span><span class="cc-method">Bank</span></div>
        </div>
        <div class="country-card" data-name="ghana ghanaian">
          <div class="country-card-top"><span class="cc-flag">🇬🇭</span><div><div class="cc-name">Ghana</div><div class="cc-currency">GHS · Ghanaian Cedi</div></div></div>
          <div class="cc-methods"><span class="cc-method">Mobile money</span><span class="cc-method">Bank</span></div>
        </div>
        <div class="country-card" data-name="south africa south african">
          <div class="country-card-top"><span class="cc-flag">🇿🇦</span><div><div class="cc-name">South Africa</div><div class="cc-currency">ZAR · Rand</div></div></div>
          <div class="cc-methods"><span class="cc-method">EFT</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="egypt egyptian">
          <div class="country-card-top"><span class="cc-flag">🇪🇬</span><div><div class="cc-name">Egypt</div><div class="cc-currency">EGP · Egyptian Pound</div></div></div>
          <div class="cc-methods"><span class="cc-method">Bank transfer</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="tanzania tanzanian">
          <div class="country-card-top"><span class="cc-flag">🇹🇿</span><div><div class="cc-name">Tanzania</div><div class="cc-currency">TZS · Tanzanian Shilling</div></div></div>
          <div class="cc-methods"><span class="cc-method">M-Pesa</span><span class="cc-method">Tigo</span></div>
        </div>
        <div class="country-card" data-name="senegal senegalese">
          <div class="country-card-top"><span class="cc-flag">🇸🇳</span><div><div class="cc-name">Senegal</div><div class="cc-currency">XOF · CFA Franc</div></div></div>
          <div class="cc-methods"><span class="cc-method">Wave</span><span class="cc-method">Orange Money</span></div>
        </div>
        <div class="country-card" data-name="ethiopia">
          <div class="country-card-top"><span class="cc-flag">🇪🇹</span><div><div class="cc-name">Ethiopia</div><div class="cc-currency">ETB · Birr</div></div></div>
          <div class="cc-methods"><span class="cc-method">Bank transfer</span></div>
        </div>
      </div>
    </div>

    <!-- Southeast Asia -->
    <div class="region-block" data-region="southeast-asia" id="block-southeast-asia">
      <div class="region-heading">
        <h2>🌏 Southeast Asia</h2>
        <span class="region-count">5 countries</span>
      </div>
      <div class="country-grid">
        <div class="country-card" data-name="indonesia indonesian">
          <div class="country-card-top"><span class="cc-flag">🇮🇩</span><div><div class="cc-name">Indonesia</div><div class="cc-currency">IDR · Rupiah</div></div></div>
          <div class="cc-methods"><span class="cc-method">Virtual accounts</span><span class="cc-method">GoPay</span><span class="cc-method">OVO</span></div>
        </div>
        <div class="country-card" data-name="philippines philippine filipino">
          <div class="country-card-top"><span class="cc-flag">🇵🇭</span><div><div class="cc-name">Philippines</div><div class="cc-currency">PHP · Peso</div></div></div>
          <div class="cc-methods"><span class="cc-method">GCash</span><span class="cc-method">Bank</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="malaysia malaysian">
          <div class="country-card-top"><span class="cc-flag">🇲🇾</span><div><div class="cc-name">Malaysia</div><div class="cc-currency">MYR · Ringgit</div></div></div>
          <div class="cc-methods"><span class="cc-method">FPX</span><span class="cc-method">TNG</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="vietnam vietnamese">
          <div class="country-card-top"><span class="cc-flag">🇻🇳</span><div><div class="cc-name">Vietnam</div><div class="cc-currency">VND · Dong</div></div></div>
          <div class="cc-methods"><span class="cc-method">Bank transfer</span><span class="cc-method">Momo</span></div>
        </div>
        <div class="country-card" data-name="thailand thai">
          <div class="country-card-top"><span class="cc-flag">🇹🇭</span><div><div class="cc-name">Thailand</div><div class="cc-currency">THB · Baht</div></div></div>
          <div class="cc-methods"><span class="cc-method">PromptPay</span><span class="cc-method">Cards</span></div>
        </div>
      </div>
    </div>

    <!-- Latin America -->
    <div class="region-block" data-region="latam" id="block-latam">
      <div class="region-heading">
        <h2>🌎 Latin America</h2>
        <span class="region-count">6 countries</span>
      </div>
      <div class="country-grid">
        <div class="country-card" data-name="brazil brazil brazilian">
          <div class="country-card-top"><span class="cc-flag">🇧🇷</span><div><div class="cc-name">Brazil</div><div class="cc-currency">BRL · Real</div></div></div>
          <div class="cc-methods"><span class="cc-method">Pix</span><span class="cc-method">Boleto</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="mexico mexican">
          <div class="country-card-top"><span class="cc-flag">🇲🇽</span><div><div class="cc-name">Mexico</div><div class="cc-currency">MXN · Peso</div></div></div>
          <div class="cc-methods"><span class="cc-method">SPEI</span><span class="cc-method">OXXO</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="argentina argentinian">
          <div class="country-card-top"><span class="cc-flag">🇦🇷</span><div><div class="cc-name">Argentina</div><div class="cc-currency">ARS · Peso</div></div></div>
          <div class="cc-methods"><span class="cc-method">Bank transfer</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="colombia colombian">
          <div class="country-card-top"><span class="cc-flag">🇨🇴</span><div><div class="cc-name">Colombia</div><div class="cc-currency">COP · Peso</div></div></div>
          <div class="cc-methods"><span class="cc-method">PSE</span><span class="cc-method">Nequi</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="chile chilean">
          <div class="country-card-top"><span class="cc-flag">🇨🇱</span><div><div class="cc-name">Chile</div><div class="cc-currency">CLP · Peso</div></div></div>
          <div class="cc-methods"><span class="cc-method">WebPay</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="peru peruvian">
          <div class="country-card-top"><span class="cc-flag">🇵🇪</span><div><div class="cc-name">Peru</div><div class="cc-currency">PEN · Sol</div></div></div>
          <div class="cc-methods"><span class="cc-method">Yape</span><span class="cc-method">Bank</span><span class="cc-method">Cards</span></div>
        </div>
      </div>
    </div>

    <!-- Pacific & Asia Pacific -->
    <div class="region-block" data-region="pacific" id="block-pacific">
      <div class="region-heading">
        <h2>🌏 Pacific &amp; Asia Pacific</h2>
        <span class="region-count">6 countries</span>
      </div>
      <div class="country-grid">
        <div class="country-card" data-name="australia australian">
          <div class="country-card-top"><span class="cc-flag">🇦🇺</span><div><div class="cc-name">Australia</div><div class="cc-currency">AUD · Australian Dollar</div></div></div>
          <div class="cc-methods"><span class="cc-method">BECS</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="new zealand kiwi">
          <div class="country-card-top"><span class="cc-flag">🇳🇿</span><div><div class="cc-name">New Zealand</div><div class="cc-currency">NZD · NZ Dollar</div></div></div>
          <div class="cc-methods"><span class="cc-method">Bank debit</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="singapore singaporean">
          <div class="country-card-top"><span class="cc-flag">🇸🇬</span><div><div class="cc-name">Singapore</div><div class="cc-currency">SGD · Singapore Dollar</div></div></div>
          <div class="cc-methods"><span class="cc-method">PayNow</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="hong kong">
          <div class="country-card-top"><span class="cc-flag">🇭🇰</span><div><div class="cc-name">Hong Kong</div><div class="cc-currency">HKD · HK Dollar</div></div></div>
          <div class="cc-methods"><span class="cc-method">FPS</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="japan japanese">
          <div class="country-card-top"><span class="cc-flag">🇯🇵</span><div><div class="cc-name">Japan</div><div class="cc-currency">JPY · Yen</div></div></div>
          <div class="cc-methods"><span class="cc-method">Konbini</span><span class="cc-method">Bank</span><span class="cc-method">Cards</span></div>
        </div>
        <div class="country-card" data-name="united arab emirates uae dubai">
          <div class="country-card-top"><span class="cc-flag">🇦🇪</span><div><div class="cc-name">UAE</div><div class="cc-currency">AED · Dirham</div></div></div>
          <div class="cc-methods"><span class="cc-method">Telr</span><span class="cc-method">Cards</span></div>
        </div>
      </div>
    </div>

    <!-- No results message -->
    <div id="noResults" style="display:none; text-align:center; padding:60px 0;">
      <p style="font-size:21px; color:var(--text-mid); margin-bottom:12px;">No countries found for "<span id="searchTerm"></span>"</p>
      <p style="font-size:23px; color:var(--text-light);">Don't see your country? <a href="#request" style="color:var(--terra); font-weight:500;">Request it below →</a></p>
    </div>

  </div>
</section>



<!-- ══ REQUEST COUNTRY ══ -->
<section class="request-section" id="request">
  <div class="container">
    <div class="request-inner reveal">
      <div class="request-content">
        <p class="section-label">Don't see your country?</p>
        <h2>We're adding markets<br>every quarter.</h2>
        <p>New countries are a configuration change — not a code change. Tell us where your property is and we'll prioritise accordingly. Middle East, Eastern Europe, and Central Asia are next on the roadmap.</p>
        <div style="display:flex; flex-direction:column; gap:14px; margin-top:28px;">
          <div style="display:flex; align-items:flex-start; gap:14px;">
            <span style="font-size:23px; flex-shrink:0; margin-top:2px;">🗺️</span>
            <div>
              <h4 style="font-family:'Outfit',sans-serif; font-size:21px; font-weight:600; color:var(--text-dark); margin-bottom:3px;">Middle East (UAE, Saudi Arabia, Qatar)</h4>
              <p style="font-size:19px; color:var(--text-mid); font-weight:300;">Targeted Q3 2025</p>
            </div>
          </div>
          <div style="display:flex; align-items:flex-start; gap:14px;">
            <span style="font-size:23px; flex-shrink:0; margin-top:2px;">🗺️</span>
            <div>
              <h4 style="font-family:'Outfit',sans-serif; font-size:21px; font-weight:600; color:var(--text-dark); margin-bottom:3px;">Eastern Europe (Romania, Hungary, Czech Republic)</h4>
              <p style="font-size:19px; color:var(--text-mid); font-weight:300;">Targeted Q4 2025</p>
            </div>
          </div>
          <div style="display:flex; align-items:flex-start; gap:14px;">
            <span style="font-size:23px; flex-shrink:0; margin-top:2px;">🗺️</span>
            <div>
              <h4 style="font-family:'Outfit',sans-serif; font-size:21px; font-weight:600; color:var(--text-dark); margin-bottom:3px;">Central &amp; South Asia (Pakistan, Bangladesh, Sri Lanka)</h4>
              <p style="font-size:19px; color:var(--text-mid); font-weight:300;">Under evaluation — regulatory review in progress</p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="request-form-card">
          <h3>Request a country</h3>
          <p>Tell us where your property is. Requests go directly to our product team.</p>
          <form onsubmit="submitRequest(event)">
            <div class="form-group">
              <label>Country name</label>
              <input type="text" class="form-input" placeholder="e.g. Pakistan, Romania, Saudi Arabia" required>
            </div>
            <div class="form-group">
              <label>Your email</label>
              <input type="email" class="form-input" placeholder="your@email.com" required>
            </div>
            <div class="form-group">
              <label>How many properties?</label>
              <select class="form-select">
                <option>1 property</option>
                <option>2–5 properties</option>
                <option>6–10 properties</option>
                <option>10+ properties</option>
              </select>
            </div>
            <button type="submit" class="form-submit" id="requestBtn">Send request →</button>
            <p class="form-note" id="requestNote">We read every request and respond within 48 hours.</p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

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

// ── REGION FILTER ──
function filterRegion(region) {
  document.querySelectorAll('.region-btn').forEach(b => b.classList.remove('active'));
  event.currentTarget.classList.add('active');
  document.getElementById('countrySearch').value = '';

  const blocks = document.querySelectorAll('.region-block');
  blocks.forEach(block => {
    if (region === 'all' || block.dataset.region === region) {
      block.style.display = 'block';
    } else {
      block.style.display = 'none';
    }
  });
  document.getElementById('noResults').style.display = 'none';
}

// ── COUNTRY SEARCH ──
function searchCountries(query) {
  const q = query.toLowerCase().trim();

  // Reset region filter buttons
  document.querySelectorAll('.region-btn').forEach(b => b.classList.remove('active'));
  document.querySelector('.region-btn').classList.add('active');

  if (!q) {
    document.querySelectorAll('.region-block').forEach(b => b.style.display = 'block');
    document.querySelectorAll('.country-card').forEach(c => c.style.display = 'block');
    document.getElementById('noResults').style.display = 'none';
    return;
  }

  let anyVisible = false;
  document.querySelectorAll('.region-block').forEach(block => {
    let blockHasMatch = false;
    block.querySelectorAll('.country-card').forEach(card => {
      const name = card.dataset.name || '';
      const match = name.includes(q);
      card.style.display = match ? 'block' : 'none';
      if (match) { blockHasMatch = true; anyVisible = true; }
    });
    block.style.display = blockHasMatch ? 'block' : 'none';
  });

  const noRes = document.getElementById('noResults');
  const term  = document.getElementById('searchTerm');
  noRes.style.display = anyVisible ? 'none' : 'block';
  if (term) term.textContent = query;
}

// ── REQUEST FORM ──
function submitRequest(e) {
  e.preventDefault();
  const btn  = document.getElementById('requestBtn');
  const note = document.getElementById('requestNote');
  btn.textContent  = '✓ Request received';
  btn.style.background = 'var(--green)';
  btn.disabled = true;
  note.textContent = 'We\'ll review your request and be in touch within 48 hours.';
  note.style.color = 'var(--green)';
}

// ── SCROLL REVEAL ──
const observer = new IntersectionObserver(
  entries => entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } }),
  { threshold: 0.08, rootMargin: '0px 0px -40px 0px' }
);
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// ── WAITLIST ──
function rmWaitlist(e) {
  e.preventDefault();
  const email = document.getElementById('rmEmail').value;
  const note  = document.getElementById('rmWaitlistNote');
  note.textContent = `✓ You're on the list — we'll reach out to ${email} soon.`;
  note.style.color = 'rgba(255,255,255,0.88)';
  document.getElementById('rmEmail').value = '';
}
</script>
@endsection

@push('scripts')
<script>
// ── REGION FILTER ──
function filterRegion(region) {
  document.querySelectorAll('.region-btn').forEach(b => b.classList.remove('active'));
  event.currentTarget.classList.add('active');
  document.getElementById('countrySearch').value = '';

  const blocks = document.querySelectorAll('.region-block');
  blocks.forEach(block => {
    if (region === 'all' || block.dataset.region === region) {
      block.style.display = 'block';
    } else {
      block.style.display = 'none';
    }
  });
  document.getElementById('noResults').style.display = 'none';
}

// ── COUNTRY SEARCH ──
function searchCountries(query) {
  const q = query.toLowerCase().trim();

  // Reset region filter buttons
  document.querySelectorAll('.region-btn').forEach(b => b.classList.remove('active'));
  document.querySelector('.region-btn').classList.add('active');

  if (!q) {
    document.querySelectorAll('.region-block').forEach(b => b.style.display = 'block');
    document.querySelectorAll('.country-card').forEach(c => c.style.display = 'block');
    document.getElementById('noResults').style.display = 'none';
    return;
  }

  let anyVisible = false;
  document.querySelectorAll('.region-block').forEach(block => {
    let blockHasMatch = false;
    block.querySelectorAll('.country-card').forEach(card => {
      const name = card.dataset.name || '';
      const match = name.includes(q);
      card.style.display = match ? 'block' : 'none';
      if (match) { blockHasMatch = true; anyVisible = true; }
    });
    block.style.display = blockHasMatch ? 'block' : 'none';
  });

  const noRes = document.getElementById('noResults');
  const term  = document.getElementById('searchTerm');
  noRes.style.display = anyVisible ? 'none' : 'block';
  if (term) term.textContent = query;
}

// ── REQUEST FORM ──
function submitRequest(e) {
  e.preventDefault();
  const btn  = document.getElementById('requestBtn');
  const note = document.getElementById('requestNote');
  btn.textContent  = '✓ Request received';
  btn.style.background = 'var(--green)';
  btn.disabled = true;
  note.textContent = 'We\'ll review your request and be in touch within 48 hours.';
  note.style.color = 'var(--green)';
}

// ── SCROLL REVEAL ──
const observer = new IntersectionObserver(
  entries => entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } }),
  { threshold: 0.08, rootMargin: '0px 0px -40px 0px' }
);
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// ── WAITLIST ──
function rmWaitlist(e) {
  e.preventDefault();
  const email = document.getElementById('rmEmail').value;
  const note  = document.getElementById('rmWaitlistNote');
  note.textContent = `✓ You're on the list — we'll reach out to ${email} soon.`;
  note.style.color = 'rgba(255,255,255,0.88)';
  document.getElementById('rmEmail').value = '';
}
</script>
@endpush
