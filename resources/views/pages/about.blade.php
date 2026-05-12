<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About — Rentersmaxx</title>
<meta name="description" content="We built Rentersmaxx because we lived the problem. International landlords deserve a platform built for them — not an afterthought of a US-only app.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,700;1,9..144,300;1,9..144,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
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
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: none; }

/* ── HERO ── */
.page-hero {
  background: var(--navy);
  padding: 180px 32px 100px;
  position: relative; overflow: hidden;
}
.page-hero-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px); background-size: 60px 60px; pointer-events: none; }
.page-hero-glow { position: absolute; width: 600px; height: 600px; border-radius: 50%; background: radial-gradient(circle, rgba(196,98,45,0.1) 0%, transparent 70%); top: 30%; right: -10%; pointer-events: none; }

.hero-inner { max-width: 1320px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 96px; align-items: center; }

.hero-left {}
.hero-label { display: inline-flex; align-items: center; gap: 13px; background: rgba(196,98,45,0.12); border: 1px solid rgba(196,98,45,0.3); color: var(--terra-light); padding: 8px 18px; border-radius: 100px; font-size: 21px; font-weight: 500; margin-bottom: 36px; letter-spacing: 0.03em; }
.hero-left h1 { font-size: clamp(44px, 5vw, 66px); color: var(--white); letter-spacing: -0.03em; margin-bottom: 30px; }
.hero-left h1 em { font-style: italic; color: var(--terra-light); }
.hero-left p { font-size: 21px; color: rgba(255,255,255,0.5); font-weight: 300; line-height: 1.7; max-width: 520px; }

.hero-right {}
.origin-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: var(--radius-lg); padding: 48px; }
.origin-card-label { font-size: 23px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.3); margin-bottom: 26px; }
.origin-quote { font-family: 'Fraunces', serif; font-size: 23px; font-style: italic; color: var(--white); font-weight: 300; line-height: 1.6; margin-bottom: 30px; border-left: 3px solid var(--terra); padding-left: 20px; }
.origin-meta { display: flex; align-items: center; gap: 18px; }
.origin-avatar { width: 56px; height: 56px; border-radius: 50%; background: var(--terra); display: flex; align-items: center; justify-content: center; font-size: 21px; flex-shrink: 0; }
.origin-name { font-size: 23px; font-weight: 600; color: rgba(255,255,255,0.85); }
.origin-role { font-size: 19px; color: rgba(255,255,255,0.35); margin-top: 2px; }



/* ── STORY ── */
.story-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 96px; align-items: start; }
.story-content h2 { font-size: clamp(44px, 3.5vw, 44px); color: var(--text-dark); margin-bottom: 40px; letter-spacing: -0.02em; }
.story-content p { font-size: 19px; color: var(--text-mid); line-height: 1.85; font-weight: 300; margin-bottom: 30px; }
.story-content p:last-child { margin-bottom: 0; }
.story-content strong { color: var(--text-dark); font-weight: 600; }
.story-cards { display: flex; flex-direction: column; gap: 26px; }
.story-card { background: var(--cream-dark); border-radius: var(--radius); padding: 48px 28px 24px; border-left: 3px solid var(--terra); }
.story-card-label { font-size: 23px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: var(--terra); margin-bottom: 13px; }
.story-card h4 { font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--text-dark); margin-bottom: 11px; }
.story-card p { font-size: 23px; color: var(--text-mid); font-weight: 300; line-height: 1.6; margin: 0; }

/* ── MISSION ── */
.mission { background: var(--navy); padding: 120px 32px; }
.mission-inner { max-width: 1000px; margin: 0 auto; text-align: center; }
.mission-label { font-size: 23px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; color: var(--terra-light); margin-bottom: 26px; }
.mission-statement { font-family: 'Fraunces', serif; font-size: clamp(44px, 4vw, 52px); font-weight: 300; color: var(--white); line-height: 1.3; letter-spacing: -0.02em; margin-bottom: 40px; }
.mission-statement em { font-style: italic; color: var(--terra-light); }
.mission-sub { font-size: 23px; color: rgba(255,255,255,0.45); font-weight: 300; line-height: 1.7; max-width: 680px; margin: 0 auto; }

/* ── VALUES ── */
.values { background: var(--cream); }
.values-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 3px; margin-top: 56px; border-radius: var(--radius-lg); overflow: hidden; background: var(--cream-dark); }
.value-card { background: var(--white); padding: 48px 40px; }
.value-num { font-family: 'Fraunces', serif; font-size: 48px; font-weight: 300; color: var(--cream-dark); line-height: 1; margin-bottom: 26px; }
.value-card h3 { font-size: 23px; color: var(--text-dark); margin-bottom: 26px; }
.value-card p { font-size: 23px; color: var(--text-mid); line-height: 1.7; font-weight: 300; }



/* ── PRINCIPLES ── */
.principles { background: var(--white); }
.principles-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; margin-top: 56px; }
.principle { display: flex; gap: 26px; }
.principle-icon { font-size: 31px; flex-shrink: 0; margin-top: 2px; }
.principle-content h4 { font-size: 23px; color: var(--text-dark); margin-bottom: 11px; }
.principle-content p { font-size: 23px; color: var(--text-mid); line-height: 1.7; font-weight: 300; }



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
  section { padding: 72px 20px; }
  .hero-inner { grid-template-columns: 1fr; gap: 80px; }
  .story-inner { grid-template-columns: 1fr; gap: 80px; }  .values-grid { grid-template-columns: 1fr; }
  .principles-grid { grid-template-columns: 1fr; gap: 54px; }
  .rm-footer-top { grid-template-columns: 1fr 1fr; }
  .rm-footer-brand { grid-column: 1 / -1; }
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- ══ NAV ══ -->
@include('partials.nav', ['page' => 'about'])

<!-- ══ HERO ══ -->
<div class="page-hero">
  <div class="page-hero-grid"></div>
  <div class="page-hero-glow"></div>
  <div class="hero-inner">
    <div class="hero-left">
      <div class="hero-label">About Rentersmaxx</div>
      <h1>One landlord.<br><em>Any country.</em><br>One platform.</h1>
      <p>We built Rentersmaxx for the landlord who owns property across borders — collecting rent in multiple currencies, managing tenants in multiple time zones, and trying to make sense of it all in a single dashboard.</p>
    </div>
    <div class="hero-right">
      <div class="origin-card">
        <p class="origin-card-label">The idea in one sentence</p>
        <blockquote class="origin-quote">"Cross-country. Multi-currency. Multi-property. One platform that understands all three — and makes each country feel completely local."</blockquote>
        <div class="origin-meta">
          <div class="origin-avatar">🌍</div>
          <div>
            <div class="origin-name">The Rentersmaxx premise</div>
            <div class="origin-role">Built for landlords who own property beyond their home country</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ══ STORY ══ -->
<section class="story" style="padding: 180px 32px;">
  <div class="container">
    <div class="story-inner reveal">
      <div class="story-content">
        <p class="section-label">The problem we solve</p>
        <h2>Property is global.<br>The tools to manage it weren't.</h2>
        <p>Owning property in another country means navigating a different legal system, a different currency, a different banking infrastructure, and a different set of tenant expectations — all from thousands of miles away.</p>
        <p>The landlord who lives in Denver and owns a flat in Mumbai and an apartment in Lyon isn't unusual anymore. The world has become more mobile, investment has become more international, and property ownership has followed. But the software hasn't.</p>
        <p>Rentersmaxx is built specifically for this landlord. Not as a feature bolt-on. Not as an international mode. As the core product — designed from the ground up for <strong>cross-country, multi-currency, multi-property</strong> ownership.</p>
        <p>Each tenant sees a fully local experience in their own language, paying through their own local payment method. The landlord sees everything unified in their home currency, in one dashboard, with a single annual export for their accountant.</p>
      </div>
      <div>
        <div class="story-cards">
          <div class="story-card">
            <div class="story-card-label">Cross-country</div>
            <h4>One platform. Any country.</h4>
            <p>Add a property in any supported country and the platform adapts — address formats, payment methods, local language. No configuration needed.</p>
          </div>
          <div class="story-card">
            <div class="story-card-label">Multi-currency</div>
            <h4>EUR, INR, GBP, NGN — all in one view.</h4>
            <p>Tenants pay in their local currency. The landlord sees every property consolidated in their home currency, with FX rates logged at every transaction.</p>
          </div>
          <div class="story-card">
            <div class="story-card-label">Multi-property</div>
            <h4>Every property. One dashboard.</h4>
            <p>Leases, rent collection, maintenance, documents, and communication — managed across an entire international portfolio from a single account.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ MISSION ══ -->
<section class="mission">
  <div class="mission-inner reveal">
    <p class="mission-label">Our mission</p>
    <h2 class="mission-statement">One landlord. Any country. <em>One platform.</em></h2>
    <p class="mission-sub">Cross-country. Multi-currency. Multi-property. These three things describe the modern international landlord — and they describe what Rentersmaxx is built to handle. Every feature, every design decision, every supported market exists to serve this single type of owner.</p>
  </div>
</section>

<!-- ══ VALUES ══ -->
<section class="values">
  <div class="container">
    <div class="reveal">
      <p class="section-label">What we believe</p>
      <h2 class="section-title">Six things we don't<br>compromise on.</h2>
    </div>
    <div class="values-grid reveal">
      <div class="value-card">
        <div class="value-num">01</div>
        <h3>Transparency over cleverness</h3>
        <p>Every fee is shown before it happens. Every FX rate is logged at the moment of every transaction. Every policy is written in plain language. We don't hide things in footnotes.</p>
      </div>
      <div class="value-card">
        <div class="value-num">02</div>
        <h3>Local first, global second</h3>
        <p>Our platform looks and feels like a local app in every market — the tenant in Mumbai sees UPI, the tenant in Paris sees SEPA. We don't ask users to think internationally. We handle that invisibly.</p>
      </div>
      <div class="value-card">
        <div class="value-num">03</div>
        <h3>Your money, your control</h3>
        <p>We collect rent locally. We never hold your funds. We never move money across borders on your behalf. Cross-border transfer is always your decision, made through your own bank.</p>
      </div>
      <div class="value-card">
        <div class="value-num">04</div>
        <h3>Honest about what we don't do</h3>
        <p>We are not a tax advisor. We are not a remittance service. We are not a legal platform. We tell you this clearly at onboarding and we don't pretend otherwise to win a sale.</p>
      </div>
      <div class="value-card">
        <div class="value-num">05</div>
        <h3>Records that last</h3>
        <p>Seven years of document retention. FX rates logged at every transaction, permanently. Communication threads stored as correspondence records. When you need evidence, we have it.</p>
      </div>
      <div class="value-card">
        <div class="value-num">06</div>
        <h3>Small team, real access</h3>
        <p>We're not a corporation. Every contact form is read by a person. Early members get direct access to the founding team. Feedback actually changes what we build next.</p>
      </div>
    </div>
  </div>
</section>



<!-- ══ PRINCIPLES ══ -->
<section class="principles">
  <div class="container">
    <div class="reveal">
      <p class="section-label">How we build</p>
      <h2 class="section-title">The decisions we make<br>every day.</h2>
    </div>
    <div class="principles-grid reveal">
      <div class="principle">
        <span class="principle-icon">🔧</span>
        <div class="principle-content">
          <h4>Configuration over code</h4>
          <p>Adding a new country to the platform is a database entry — not a sprint. Our payment abstraction layer means new markets don't require new engineering work.</p>
        </div>
      </div>
      <div class="principle">
        <span class="principle-icon">🔒</span>
        <div class="principle-content">
          <h4>Data stays where it belongs</h4>
          <p>EU tenant data lives in EU data centres. India tenant data lives in India. We don't route personal data through the cheapest region — we route it through the right one.</p>
        </div>
      </div>
      <div class="principle">
        <span class="principle-icon">📋</span>
        <div class="principle-content">
          <h4>Never recalculate history</h4>
          <p>FX rates are snapshotted at the moment of every payment and stored permanently. We never retroactively recalculate. Your tax records are always accurate to the day.</p>
        </div>
      </div>
      <div class="principle">
        <span class="principle-icon">💬</span>
        <div class="principle-content">
          <h4>On-platform by default</h4>
          <p>We push landlord-tenant communication onto the platform deliberately. Off-platform conversations aren't our problem — but when disputes happen, we want the evidence to exist.</p>
        </div>
      </div>
      <div class="principle">
        <span class="principle-icon">🚫</span>
        <div class="principle-content">
          <h4>We don't hold your money</h4>
          <p>Rentersmaxx is not a wallet, not a bank, and not a remittance service. Funds move from tenant bank to your in-country account. We never sit in the middle of that flow.</p>
        </div>
      </div>
      <div class="principle">
        <span class="principle-icon">📣</span>
        <div class="principle-content">
          <h4>Ship with early members, not after</h4>
          <p>Our first features were built with and for 12 beta landlords who stayed on for six months. Every major decision since has come from real users in real markets.</p>
        </div>
      </div>
    </div>
  </div>
</section>
  </div>
</div>

@include('partials.footer')
<script src="{{ asset('js/app.js') }}"></script>
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
</body>
</html>
