<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact — Rentersmaxx</title>
<meta name="description" content="Get in touch with the Rentersmaxx team. General enquiries, sales, press, and support — we respond to every message.">
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
.container { max-width: 1320px; margin: 0 auto; }
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: none; }

/* ── PAGE HERO ── */
.page-hero { background: var(--navy); padding: 160px 32px 80px; text-align: center; position: relative; overflow: hidden; }
.page-hero-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px); background-size: 60px 60px; pointer-events: none; }
.page-hero-glow { position: absolute; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, rgba(196,98,45,0.11) 0%, transparent 70%); top: 50%; left: 50%; transform: translate(-50%, -60%); pointer-events: none; }
.page-hero-label { display: inline-flex; align-items: center; gap: 13px; background: rgba(196,98,45,0.12); border: 1px solid rgba(196,98,45,0.3); color: var(--terra-light); padding: 8px 18px; border-radius: 100px; font-size: 21px; font-weight: 500; margin-bottom: 36px; letter-spacing: 0.03em; }
.page-hero h1 { font-size: clamp(44px, 6vw, 68px); color: var(--white); letter-spacing: -0.03em; max-width: 760px; margin: 0 auto 20px; }
.page-hero h1 em { font-style: italic; color: var(--terra-light); }
.page-hero p { font-size: 21px; color: rgba(255,255,255,0.5); font-weight: 300; line-height: 1.65; max-width: 560px; margin: 0 auto; }

/* ── CONTACT TYPES ── */
.contact-types { background: var(--white); padding: 0 24px; border-bottom: 1px solid var(--cream-dark); }
.contact-types-inner { max-width: 1320px; margin: 0 auto; display: grid; grid-template-columns: repeat(4,1fr); gap: 3px; }
.ct-tab {
  padding: 48px 40px; text-align: center; cursor: pointer;
  border-bottom: 3px solid transparent; transition: all 0.2s;
  background: none; border-top: none; border-left: none; border-right: none;
  font-family: 'Outfit', sans-serif; width: 100%;
}
.ct-tab:hover { background: var(--cream); }
.ct-tab.active { border-bottom-color: var(--terra); background: var(--cream); }
.ct-icon { font-size: 27px; margin-bottom: 11px; }
.ct-label { font-size: 23px; font-weight: 600; color: var(--text-dark); margin-bottom: 3px; }
.ct-desc { font-size: 21px; color: var(--text-light); }
.ct-tab.active .ct-label { color: var(--terra); }

/* ── CONTACT BODY ── */
.contact-body { padding: 96px 32px 100px; background: var(--cream); }
.contact-grid { max-width: 1320px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1.4fr; gap: 96px; align-items: start; }

/* Left info col */
.contact-info {}
.contact-info h2 { font-size: clamp(30px, 3vw, 36px); color: var(--text-dark); margin-bottom: 26px; letter-spacing: -0.02em; }
.contact-info .lead { font-size: 19px; color: var(--text-mid); font-weight: 300; line-height: 1.7; margin-bottom: 36px; }

.response-badge { display: inline-flex; align-items: center; gap: 13px; background: var(--green-pale); border: 1px solid rgba(42,107,74,0.2); color: var(--green); padding: 8px 16px; border-radius: 100px; font-size: 19px; font-weight: 500; margin-bottom: 40px; }
.response-dot { width: 9px; height: 9px; border-radius: 50%; background: var(--green); animation: pulse 2s ease infinite; }
@keyframes pulse { 0%,100%{transform:scale(1);opacity:1} 50%{transform:scale(1.3);opacity:0.6} }

.contact-channels { display: flex; flex-direction: column; gap: 18px; margin-bottom: 40px; }
.channel-card { display: flex; align-items: center; gap: 26px; padding: 24px 28px; background: var(--white); border: 1px solid var(--cream-dark); border-radius: var(--radius); text-decoration: none; transition: all 0.2s; }
.channel-card:hover { border-color: var(--terra); transform: translateX(4px); }
.channel-icon { font-size: 25px; flex-shrink: 0; }
.channel-info h4 { font-family: 'Outfit', sans-serif; font-size: 23px; font-weight: 600; color: var(--text-dark); margin-bottom: 2px; }
.channel-info p { font-size: 19px; color: var(--text-light); font-weight: 300; }
.channel-arrow { margin-left: auto; color: var(--text-light); font-size: 19px; transition: color 0.2s; }
.channel-card:hover .channel-arrow { color: var(--terra); }

.office-note { padding: 26px; background: var(--navy); border-radius: var(--radius); }
.office-note p { font-size: 19px; color: rgba(255,255,255,0.45); line-height: 1.7; font-weight: 300; }
.office-note p strong { color: rgba(255,255,255,0.75); font-weight: 500; }

/* Right form col */
.contact-form-card { background: var(--white); border: 1px solid var(--cream-dark); border-radius: var(--radius-lg); padding: 60px; }

.form-tabs { display: flex; gap: 13px; background: var(--cream-dark); border-radius: 13px; padding: 4px; margin-bottom: 40px; }
.form-tab { flex: 1; padding: 16px; border-radius: 13px; font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 500; cursor: pointer; border: none; background: transparent; color: var(--text-mid); transition: all 0.2s; text-align: center; }
.form-tab.active { background: var(--white); color: var(--text-dark); box-shadow: 0 1px 4px rgba(0,0,0,0.08); }

.contact-form { display: flex; flex-direction: column; gap: 18px; }

.form-group { display: flex; flex-direction: column; gap: 13px; }
.form-group label { font-size: 19px; font-weight: 500; color: var(--text-dark); }
.form-group label .req { color: var(--terra); margin-left: 2px; }
.form-input, .form-select, .form-textarea {
  padding: 16px 20px; border-radius: 16px;
  border: 1px solid var(--cream-dark); background: var(--cream);
  font-family: 'Outfit', sans-serif; font-size: 23px; color: var(--text-dark);
  outline: none; transition: border-color 0.2s, background 0.2s; width: 100%;
}
.form-input:focus, .form-select:focus, .form-textarea:focus { border-color: var(--terra); background: var(--white); }
.form-input::placeholder, .form-textarea::placeholder { color: var(--text-light); }
.form-textarea { resize: vertical; min-height: 120px; line-height: 1.6; }
.form-select { appearance: none; cursor: pointer; background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='%238A99AA' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 14px center; padding-right: 36px; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 26px; }

.form-submit { padding: 18px; border-radius: 13px; background: var(--terra); color: var(--white); font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; width: 100%; }
.form-submit:hover { background: var(--terra-light); transform: translateY(-1px); }
.form-submit:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

.form-legal { font-size: 21px; color: var(--text-light); line-height: 1.6; text-align: center; }
.form-legal a { color: var(--text-mid); }

/* Success */
.form-success { display: none; text-align: center; padding: 40px 20px; }
.form-success .fs-icon { font-size: 48px; margin-bottom: 26px; }
.form-success h3 { font-size: 27px; color: var(--text-dark); margin-bottom: 13px; }
.form-success p { font-size: 21px; color: var(--text-mid); font-weight: 300; line-height: 1.6; }

/* ── FAQ STRIP ── */
.contact-faq { background: var(--cream-dark); padding: 96px 32px; }
.faq-grid { max-width: 1320px; margin: 56px auto 0; display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
.faq-card { background: var(--white); border-radius: var(--radius); padding: 48px; }
.faq-card h4 { font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--text-dark); margin-bottom: 13px; }
.faq-card p { font-size: 23px; color: var(--text-mid); line-height: 1.65; font-weight: 300; }
.faq-card a { color: var(--terra); text-decoration: none; font-weight: 500; }

/* ── CTA BANNER ── */
.rm-cta-banner { background: var(--terra); padding: 96px 32px; text-align: center; }
.rm-cta-banner h2 { font-family: 'Fraunces', serif; font-size: clamp(44px, 4vw, 52px); font-weight: 500; color: var(--white); letter-spacing: -0.02em; margin-bottom: 26px; }
.rm-cta-banner h2 em { font-style: italic; opacity: 0.82; }
.rm-cta-banner p { font-size: 19px; color: rgba(255,255,255,0.65); font-weight: 300; margin-bottom: 40px; max-width: 520px; margin-left: auto; margin-right: auto; }
.rm-cta-btn { display: inline-flex; align-items: center; gap: 13px; padding: 18px 32px; border-radius: 13px; background: var(--white); color: var(--terra); font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 600; text-decoration: none; transition: all 0.2s; }
.rm-cta-btn:hover { background: var(--cream); transform: translateY(-1px); }

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
  .contact-types-inner { grid-template-columns: 1fr 1fr; }
  .contact-grid { grid-template-columns: 1fr; gap: 50px; }
  .form-row { grid-template-columns: 1fr; }
  .faq-grid { grid-template-columns: 1fr; }
  .rm-footer-top { grid-template-columns: 1fr 1fr; }
  .rm-footer-brand { grid-column: 1 / -1; }
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- ══ NAV ══ -->
@include('partials.nav', ['page' => 'contact'])

<!-- ══ PAGE HERO ══ -->
<div class="page-hero">
  <div class="page-hero-grid"></div>
  <div class="page-hero-glow"></div>
  <div class="page-hero-label">Contact</div>
  <h1>We read <em>every</em><br>message.</h1>
  <p>We're a small team building something new. Your questions, feedback, and ideas go directly to the people building the product.</p>
</div>

<!-- ══ CONTACT TYPE TABS ══ -->
<div class="contact-types">
  <div class="contact-types-inner">
    <button class="ct-tab active" onclick="switchType('general', this)">
      <div class="ct-icon">💬</div>
      <div class="ct-label">General</div>
      <div class="ct-desc">Questions &amp; feedback</div>
    </button>
    <button class="ct-tab" onclick="switchType('sales', this)">
      <div class="ct-icon">🤝</div>
      <div class="ct-label">Sales</div>
      <div class="ct-desc">Agency &amp; enterprise</div>
    </button>
    <button class="ct-tab" onclick="switchType('press', this)">
      <div class="ct-icon">📰</div>
      <div class="ct-label">Press</div>
      <div class="ct-desc">Media &amp; interviews</div>
    </button>
    <button class="ct-tab" onclick="switchType('support', this)">
      <div class="ct-icon">🛟</div>
      <div class="ct-label">Support</div>
      <div class="ct-desc">Account &amp; technical</div>
    </button>
  </div>
</div>

<!-- ══ CONTACT BODY ══ -->
<section class="contact-body">
  <div class="contact-grid reveal">

    <!-- Info left -->
    <div class="contact-info">
      <h2 id="contactHeading">Got a question?<br>Let's talk.</h2>
      <p class="lead" id="contactLead">Whether you're a landlord with properties in three countries, a property manager exploring agency pricing, or a journalist covering proptech — we want to hear from you.</p>

      <div class="response-badge">
        <span class="response-dot"></span>
        We respond within 24 hours
      </div>

      <div class="contact-channels">
        <a href="mailto:hello@rentersmaxx.com" class="channel-card">
          <span class="channel-icon">✉️</span>
          <div class="channel-info">
            <h4>Email us directly</h4>
            <p>hello@rentersmaxx.com</p>
          </div>
          <span class="channel-arrow">→</span>
        </a>
        <a href="{{ url('/waitlist') }}" class="channel-card">
          <span class="channel-icon">🚀</span>
          <div class="channel-info">
            <h4>Join the waitlist</h4>
            <p>Reserve your spot and get first access</p>
          </div>
          <span class="channel-arrow">→</span>
        </a>
        <a href="{{ url('/countries') }}#request" class="channel-card">
          <span class="channel-icon">🌍</span>
          <div class="channel-info">
            <h4>Request a country</h4>
            <p>Don't see your market? Tell us.</p>
          </div>
          <span class="channel-arrow">→</span>
        </a>
      </div>

      <div class="office-note">
        <p><strong>Based remotely.</strong> Our team works across the US, UK, and India — which means we genuinely understand the time zone problem our customers face. Responses during business hours in at least one of those markets every day.</p>
      </div>
    </div>

    <!-- Form right -->
    <div class="contact-form-card">

      <div class="form-tabs">
        <button class="form-tab active" id="tab-general" onclick="switchFormTab('general')">General</button>
        <button class="form-tab" id="tab-sales" onclick="switchFormTab('sales')">Sales</button>
        <button class="form-tab" id="tab-press" onclick="switchFormTab('press')">Press</button>
        <button class="form-tab" id="tab-support" onclick="switchFormTab('support')">Support</button>
      </div>

      <!-- General form -->
      <div id="form-general">
        <form class="contact-form" onsubmit="submitContact(event, 'general')">
          <div class="form-row">
            <div class="form-group"><label>Name <span class="req">*</span></label><input type="text" class="form-input" placeholder="Your name" required></div>
            <div class="form-group"><label>Email <span class="req">*</span></label><input type="email" class="form-input" placeholder="you@example.com" required></div>
          </div>
          <div class="form-group"><label>Subject <span class="req">*</span></label>
            <select class="form-select" required>
              <option value="" disabled selected>What's this about?</option>
              <option>Product question</option>
              <option>Country availability</option>
              <option>Pricing question</option>
              <option>Partnership enquiry</option>
              <option>Feedback or suggestion</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group"><label>Message <span class="req">*</span></label><textarea class="form-textarea" placeholder="Tell us what's on your mind…" required></textarea></div>
          <button type="submit" class="form-submit">Send message →</button>
          <p class="form-legal">We'll respond within 24 hours. By submitting you agree to our <a href="{{ url('/privacy') }}">Privacy Policy</a>.</p>
        </form>
        <div class="form-success" id="success-general"><div class="fs-icon">✉️</div><h3>Message sent.</h3><p>We'll be in touch within 24 hours — usually sooner.</p></div>
      </div>

      <!-- Sales form -->
      <div id="form-sales" style="display:none">
        <form class="contact-form" onsubmit="submitContact(event, 'sales')">
          <div class="form-row">
            <div class="form-group"><label>Name <span class="req">*</span></label><input type="text" class="form-input" placeholder="Your name" required></div>
            <div class="form-group"><label>Company</label><input type="text" class="form-input" placeholder="Company name (if applicable)"></div>
          </div>
          <div class="form-group"><label>Email <span class="req">*</span></label><input type="email" class="form-input" placeholder="you@company.com" required></div>
          <div class="form-row">
            <div class="form-group"><label>Portfolio size</label>
              <select class="form-select">
                <option value="" disabled selected>Select range</option>
                <option>2–10 properties</option>
                <option>11–50 properties</option>
                <option>51–200 properties</option>
                <option>200+ properties</option>
              </select>
            </div>
            <div class="form-group"><label>Markets</label><input type="text" class="form-input" placeholder="e.g. UK, India, Nigeria"></div>
          </div>
          <div class="form-group"><label>Tell us about your setup <span class="req">*</span></label><textarea class="form-textarea" placeholder="How you currently manage rent collection, what's not working, what you need…" required></textarea></div>
          <button type="submit" class="form-submit">Request sales call →</button>
          <p class="form-legal">We'll reach out to schedule a call within one business day.</p>
        </form>
        <div class="form-success" id="success-sales"><div class="fs-icon">🤝</div><h3>Request received.</h3><p>Our sales team will reach out within one business day to schedule a call.</p></div>
      </div>

      <!-- Press form -->
      <div id="form-press" style="display:none">
        <form class="contact-form" onsubmit="submitContact(event, 'press')">
          <div class="form-row">
            <div class="form-group"><label>Name <span class="req">*</span></label><input type="text" class="form-input" placeholder="Your name" required></div>
            <div class="form-group"><label>Publication <span class="req">*</span></label><input type="text" class="form-input" placeholder="e.g. TechCrunch, FT" required></div>
          </div>
          <div class="form-group"><label>Email <span class="req">*</span></label><input type="email" class="form-input" placeholder="you@publication.com" required></div>
          <div class="form-group"><label>Enquiry type</label>
            <select class="form-select">
              <option value="" disabled selected>Select type</option>
              <option>Interview request</option>
              <option>Product demo</option>
              <option>Data / statistics request</option>
              <option>Comment or quote</option>
              <option>Embargo briefing</option>
            </select>
          </div>
          <div class="form-group"><label>Tell us about your piece <span class="req">*</span></label><textarea class="form-textarea" placeholder="What are you working on? Deadline?" required></textarea></div>
          <button type="submit" class="form-submit">Send press enquiry →</button>
          <p class="form-legal">Press enquiries are responded to within 4 hours during business hours.</p>
        </form>
        <div class="form-success" id="success-press"><div class="fs-icon">📰</div><h3>Enquiry received.</h3><p>Our press contact will respond within 4 business hours.</p></div>
      </div>

      <!-- Support form -->
      <div id="form-support" style="display:none">
        <form class="contact-form" onsubmit="submitContact(event, 'support')">
          <div class="form-row">
            <div class="form-group"><label>Name <span class="req">*</span></label><input type="text" class="form-input" placeholder="Your name" required></div>
            <div class="form-group"><label>Email <span class="req">*</span></label><input type="email" class="form-input" placeholder="Account email" required></div>
          </div>
          <div class="form-group"><label>Issue type</label>
            <select class="form-select">
              <option value="" disabled selected>Select type</option>
              <option>Payment not collected</option>
              <option>Tenant invite not received</option>
              <option>Account access issue</option>
              <option>Document not uploading</option>
              <option>Dashboard showing wrong data</option>
              <option>Other technical issue</option>
            </select>
          </div>
          <div class="form-group"><label>Property country</label><input type="text" class="form-input" placeholder="e.g. India, France"></div>
          <div class="form-group"><label>Describe the issue <span class="req">*</span></label><textarea class="form-textarea" placeholder="What happened? What were you trying to do? Any error messages?" required></textarea></div>
          <button type="submit" class="form-submit">Submit support ticket →</button>
          <p class="form-legal">Support tickets are prioritised by severity. Payment issues are treated as urgent.</p>
        </form>
        <div class="form-success" id="success-support"><div class="fs-icon">🛟</div><h3>Ticket raised.</h3><p>Our support team will respond within 4 hours. Payment issues are treated as urgent.</p></div>
      </div>

    </div>
  </div>
</section>

<!-- ══ FAQ STRIP ══ -->
<section class="contact-faq">
  <div class="container">
    <div style="text-align:center; reveal">
      <p style="font-size:23px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase;color:var(--terra);margin-bottom:14px;">Before you write</p>
      <h2 style="font-family:'Fraunces',serif;font-size:clamp(44px,3.5vw,42px);letter-spacing:-0.02em;color:var(--text-dark);margin-bottom:0;">Common questions answered.</h2>
    </div>
    <div class="faq-grid">
      <div class="faq-card">
        <h4>When is Rentersmaxx launching?</h4>
        <p>We're targeting a launch in the US, UK, France, and India in 2025. <a href="{{ url('/waitlist') }}">Join the waitlist</a> to be notified the moment your market opens.</p>
      </div>
      <div class="faq-card">
        <h4>Do you support my country?</h4>
        <p>We support 60+ countries at launch. Check the <a href="{{ url('/countries') }}">supported countries page</a> — and if yours isn't there, you can request it directly.</p>
      </div>
      <div class="faq-card">
        <h4>I'm a property manager — is there an agency plan?</h4>
        <p>Yes. Agency pricing covers sub-accounts, bulk lease management, white-label options, and a dedicated account manager. Use the Sales form above to talk to us.</p>
      </div>
      <div class="faq-card">
        <h4>I want to integrate with Rentersmaxx — do you have an API?</h4>
        <p>API access is part of the Agency plan. If you're building an integration or exploring a partnership, use the Sales form and describe your use case.</p>
      </div>
      <div class="faq-card">
        <h4>How is my data protected?</h4>
        <p>All data is encrypted in transit and at rest. EU tenant data stays in EU data centres. India tenant data stays in India. Full GDPR compliance. <a href="{{ url('/privacy') }}">Read our privacy policy.</a></p>
      </div>
      <div class="faq-card">
        <h4>I have a property in a country not on your list.</h4>
        <p>Use the <a href="{{ url('/countries') }}#request">country request form</a> on our supported countries page. We review every request and prioritise by demand.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══ CTA ══ -->
<div class="rm-cta-banner">
  <div style="max-width:1120px;margin:0 auto;text-align:center;">
    <h2>Ready to get started?</h2>
    <p>Join the waitlist and be first when we launch in your country.</p>
    <a href="{{ url('/waitlist') }}" class="rm-cta-btn">Join the waitlist →</a>
  </div>
</div>

<!-- ══ FOOTER ══ -->
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

// ── CONTACT TYPE TABS (top) ──
const headings = {
  general: { h: 'Got a question?<br>Let\'s talk.', p: 'Whether you\'re a landlord with properties in three countries, a property manager exploring agency pricing, or a journalist covering proptech — we want to hear from you.' },
  sales:   { h: 'Let\'s talk<br><em>agency pricing.</em>', p: 'Managing properties on behalf of multiple owners? We have a plan built for you. Tell us about your portfolio and we\'ll get back within one business day.' },
  press:   { h: 'Working on<br><em>a story?</em>', p: 'We\'re building something that hasn\'t existed before. Happy to brief journalists, provide data, and make the founding team available for interviews.' },
  support: { h: 'Something<br><em>not working?</em>', p: 'We prioritise support tickets by severity — payment issues are treated as urgent. Tell us exactly what happened and we\'ll resolve it fast.' },
};

function switchType(type, btn) {
  document.querySelectorAll('.ct-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('contactHeading').innerHTML = headings[type].h;
  document.getElementById('contactLead').textContent = headings[type].p;
  switchFormTab(type);
}

// ── FORM TABS ──
function switchFormTab(type) {
  ['general','sales','press','support'].forEach(t => {
    document.getElementById('form-' + t).style.display = t === type ? 'block' : 'none';
    document.getElementById('tab-' + t).classList.toggle('active', t === type);
  });
}

// ── FORM SUBMIT ──
function submitContact(e, type) {
  e.preventDefault();
  const btn = e.target.querySelector('.form-submit');
  btn.textContent = 'Sending…';
  btn.disabled = true;
  setTimeout(() => {
    e.target.style.display = 'none';
    document.getElementById('success-' + type).style.display = 'block';
  }, 700);
}

// ── SCROLL REVEAL ──
const observer = new IntersectionObserver(
  entries => entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } }),
  { threshold: 0.08 }
);
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>
</body>
</html>
