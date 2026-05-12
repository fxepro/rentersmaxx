@extends('layouts.app')

@section('title', 'Rentersmaxx — Collect rent anywhere. Get paid everywhere.')
@section('meta_description', 'One app to manage rental properties across any country. Collect rent locally in EUR, INR, GBP and more. See everything in your currency.')

@push('styles')
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --navy: #0D1F35;
  --navy-mid: #162d4a;
  --navy-light: #1e3a5f;
  --navy-border: rgba(255,255,255,0.08);
  --cream: #FAF8F3;
  --cream-dark: #F0EDE4;
  --terra: #C4622D;
  --terra-light: #d97448;
  --terra-pale: #FAF0EB;
  --gold: #C9963A;
  --gold-pale: #FBF3E4;
  --green: #2A6B4A;
  --green-pale: #E4F0EA;
  --text-dark: #0D1F35;
  --text-mid: #4A5A6A;
  --text-light: #8A99AA;
  --white: #ffffff;
  --radius: 16px;
  --radius-lg: 26px;
}

html { scroll-behavior: smooth; }
body { font-family: 'Outfit', sans-serif; font-weight: 400; color: var(--text-dark); background: var(--cream); overflow-x: hidden; }
h1, h2, h3 { font-family: 'Fraunces', serif; font-weight: 500; line-height: 1.1; }

/* ── NAV ── */
.rm-nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 72px; height: 80px;
  background: rgba(13,31,53,0.94);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--navy-border);
  transition: background 0.3s;
}
.rm-nav.scrolled { background: rgba(13,31,53,0.99); }

.rm-nav-logo {
  font-family: 'Fraunces', serif; font-size: 22px; font-weight: 700;
  color: var(--white); text-decoration: none; letter-spacing: -0.5px; flex-shrink: 0;
}
.rm-nav-logo span { color: var(--terra-light); }

.rm-nav-links {
  display: flex; align-items: center; gap: 4px;
  list-style: none; margin: 0 auto; padding: 0 32px;
}
.rm-nav-links a {
  display: flex; align-items: center;
  padding: 7px 14px; border-radius: 16px;
  color: rgba(255,255,255,0.6); text-decoration: none;
  font-size: 14px; font-weight: 400;
  transition: color 0.2s, background 0.2s; white-space: nowrap;
}
.rm-nav-links a:hover { color: var(--white); background: rgba(255,255,255,0.06); }
.rm-nav-links a.active { color: var(--white); background: rgba(255,255,255,0.1); }

.rm-nav-cta { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }

.rm-btn {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 9px 20px; border-radius: 8px;
  font-family: 'Outfit', sans-serif; font-size: 14px; font-weight: 500;
  text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; white-space: nowrap;
}
.rm-btn-ghost {
  background: transparent; color: rgba(255,255,255,0.65);
  border: 1px solid rgba(255,255,255,0.16);
}
.rm-btn-ghost:hover { color: var(--white); background: rgba(255,255,255,0.06); border-color: rgba(255,255,255,0.28); }
.rm-btn-primary { background: var(--terra); color: var(--white); border: 1px solid transparent; }
.rm-btn-primary:hover { background: var(--terra-light); transform: translateY(-1px); }

.rm-hamburger {
  display: none; flex-direction: column; gap: 5px;
  cursor: pointer; padding: 4px; background: none; border: none;
}
.rm-hamburger span {
  display: block; width: 22px; height: 2px;
  background: rgba(255,255,255,0.7); border-radius: 2px; transition: all 0.3s;
}
.rm-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.rm-hamburger.open span:nth-child(2) { opacity: 0; }
.rm-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

.rm-drawer {
  position: fixed; top: 80px; left: 0; right: 0;
  background: var(--navy); border-bottom: 1px solid var(--navy-border);
  padding: 22px 20px 24px; z-index: 999;
  transform: translateY(-110%); transition: transform 0.3s ease;
}
.rm-drawer.open { transform: translateY(0); }
.rm-drawer a {
  display: block; padding: 12px 16px; border-radius: 13px;
  color: rgba(255,255,255,0.65); text-decoration: none; font-size: 15px;
  transition: background 0.2s, color 0.2s; margin-bottom: 2px;
}
.rm-drawer a:hover, .rm-drawer a.active { background: rgba(255,255,255,0.07); color: var(--white); }
.rm-drawer-cta {
  display: flex; gap: 10px; margin-top: 18px;
  padding-top: 14px; border-top: 1px solid var(--navy-border);
}
.rm-drawer-cta .rm-btn { flex: 1; justify-content: center; }

/* ── SHARED SECTION STYLES ── */
section { padding: 120px 32px; }
.container { max-width: 1320px; margin: 0 auto; }
.container-sm { max-width: 920px; margin: 0 auto; }
.section-label {
  font-size: 23px; font-weight: 600; letter-spacing: 0.14em;
  text-transform: uppercase; color: var(--terra); margin-bottom: 26px;
}
.section-title {
  font-size: clamp(44px, 4vw, 52px); letter-spacing: -0.02em;
  line-height: 1.1; color: var(--text-dark); margin-bottom: 26px;
}
.section-sub {
  font-size: 21px; color: var(--text-mid); font-weight: 300;
  line-height: 1.65; max-width: 680px;
}
.btn-lg { padding: 18px 32px; font-size: 19px; border-radius: 13px; }
.btn-outline-light {
  background: transparent; color: var(--white);
  border: 1px solid rgba(255,255,255,0.3);
  display: inline-flex; align-items: center; gap: 13px;
  padding: 18px 32px; border-radius: 13px; font-family: 'Outfit', sans-serif;
  font-size: 19px; font-weight: 500; text-decoration: none; cursor: pointer;
  transition: all 0.2s;
}
.btn-outline-light:hover { background: rgba(255,255,255,0.08); }

/* ── HERO ── */
.hero {
  min-height: 100vh; background: var(--navy);
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  text-align: center; padding: 140px 32px 80px; position: relative; overflow: hidden;
}
.hero-grid {
  position: absolute; inset: 0;
  background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
  background-size: 60px 60px; pointer-events: none;
}
.hero-glow {
  position: absolute; width: 800px; height: 800px; border-radius: 50%;
  background: radial-gradient(circle, rgba(196,98,45,0.13) 0%, transparent 70%);
  top: 50%; left: 50%; transform: translate(-50%, -55%); pointer-events: none;
}
.hero-badge {
  display: inline-flex; align-items: center; gap: 13px;
  background: rgba(196,98,45,0.15); border: 1px solid rgba(196,98,45,0.35);
  color: var(--terra-light); padding: 9px 20px; border-radius: 100px;
  font-size: 19px; font-weight: 500; margin-bottom: 40px; letter-spacing: 0.02em;
  animation: fadeUp 0.6s ease both;
}
.hero-badge-dot {
  width: 13px; height: 13px; border-radius: 50%; background: var(--terra-light);
  animation: blink 2s ease infinite;
}
@keyframes blink { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.4;transform:scale(0.8)} }
.hero h1 {
  font-size: clamp(52px, 7vw, 90px); color: var(--white); max-width: 920px;
  letter-spacing: -0.03em; line-height: 1.0; margin-bottom: 30px;
  animation: fadeUp 0.6s 0.1s ease both;
}
.hero h1 em { font-style: italic; color: var(--terra-light); }
.hero-sub {
  font-size: clamp(24px, 2vw, 20px); color: rgba(255,255,255,0.52); max-width: 660px;
  line-height: 1.65; margin-bottom: 44px; font-weight: 300; animation: fadeUp 0.6s 0.2s ease both;
}
.hero-ctas { display: flex; gap: 18px; flex-wrap: wrap; justify-content: center; margin-bottom: 72px; animation: fadeUp 0.6s 0.3s ease both; }

/* ── TICKER ── */
.ticker-wrap { width: 100%; overflow: hidden; animation: fadeUp 0.6s 0.4s ease both; }
.ticker-label { font-size: 23px; color: rgba(255,255,255,0.28); letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 26px; }
.ticker { display: flex; width: max-content; animation: tickerScroll 32s linear infinite; }
.ticker-item {
  display: flex; align-items: center; gap: 13px;
  padding: 10px 28px; border-right: 1px solid rgba(255,255,255,0.07);
  color: rgba(255,255,255,0.45); font-size: 23px; white-space: nowrap;
}
.ticker-item .flag { font-size: 21px; }
.ticker-item .amount { color: rgba(255,255,255,0.7); font-weight: 500; font-family: 'Fraunces', serif; font-size: 19px; }
.ticker-item .method { color: rgba(255,255,255,0.22); font-size: 21px; }
@keyframes tickerScroll { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
@keyframes fadeUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }

/* ── PROBLEM ── */
.problem { background: var(--white); }
.problem-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 96px; align-items: center; }
.problem-quote {
  font-family: 'Fraunces', serif; font-size: clamp(24px, 2.5vw, 32px);
  font-weight: 300; font-style: italic; color: var(--text-dark);
  line-height: 1.5; border-left: 3px solid var(--terra); padding-left: 28px;
}
.problem-list { list-style: none; display: flex; flex-direction: column; gap: 18px; margin-top: 26px; }
.problem-list li {
  display: flex; align-items: flex-start; gap: 18px;
  font-size: 21px; color: var(--text-mid); line-height: 1.5; padding: 16px 20px;
  border-radius: 13px; background: var(--cream);
}
.problem-list li.resolved { background: var(--green-pale); color: var(--text-dark); }
.prob-icon { font-size: 19px; flex-shrink: 0; margin-top: 1px; }

/* ── HOW IT WORKS ── */
.how { background: var(--navy); }
.how .section-label { color: var(--terra-light); }
.how .section-title { color: var(--white); }
.how .section-sub { color: rgba(255,255,255,0.45); }
.steps { display: grid; grid-template-columns: repeat(3,1fr); gap: 3px; margin-top: 64px; border-radius: var(--radius-lg); overflow: hidden; background: rgba(255,255,255,0.05); }
.step { background: var(--navy-mid); padding: 56px 44px; position: relative; }
.step-num {
  font-family: 'Fraunces', serif; font-size: 80px; font-weight: 300;
  color: rgba(255,255,255,0.05); position: absolute; top: 16px; right: 20px; line-height: 1; user-select: none;
}
.step-icon { width: 60px; height: 60px; border-radius: 16px; background: rgba(196,98,45,0.15); display: flex; align-items: center; justify-content: center; font-size: 25px; margin-bottom: 30px; }
.step h3 { font-size: 25px; color: var(--white); margin-bottom: 26px; }
.step p { font-size: 21px; color: rgba(255,255,255,0.45); line-height: 1.65; font-weight: 300; }

/* ── FEATURES ── */
.features { background: var(--cream); }
.features-layout { display: grid; grid-template-columns: 240px 1fr; gap: 80px; margin-top: 64px; align-items: start; }
.feature-tabs { display: flex; flex-direction: column; gap: 3px; position: sticky; top: 88px; }
.feature-tab {
  display: flex; align-items: center; gap: 26px; padding: 13px 16px;
  border-radius: 13px; cursor: pointer; transition: all 0.2s; text-align: left;
  border: 1px solid transparent; background: transparent;
}
.feature-tab:hover { background: var(--cream-dark); }
.feature-tab.active { background: var(--white); border-color: var(--cream-dark); box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
.feature-tab-icon { width: 52px; height: 52px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 23px; background: var(--cream-dark); flex-shrink: 0; }
.feature-tab.active .feature-tab-icon { background: var(--terra-pale); }
.feature-tab-label { font-size: 23px; font-weight: 500; color: var(--text-mid); }
.feature-tab.active .feature-tab-label { color: var(--text-dark); }
.feature-panel { display: none; }
.feature-panel.active { display: block; animation: panelIn 0.3s ease; }
@keyframes panelIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }
.feature-card {
  background: var(--white); border: 1px solid var(--cream-dark);
  border-radius: var(--radius-lg); padding: 60px; position: relative; overflow: hidden;
}
.feature-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, var(--terra), var(--gold));
}
.feature-card-num {
  font-family: 'Fraunces', serif; font-size: 130px; font-weight: 300;
  color: rgba(0,0,0,0.04); position: absolute; bottom: -24px; right: 16px; line-height: 1; user-select: none;
}
.feature-card h3 { font-size: 31px; color: var(--text-dark); margin-bottom: 26px; letter-spacing: -0.01em; }
.feature-card .lead { font-size: 23px; color: var(--text-mid); line-height: 1.65; margin-bottom: 40px; font-weight: 300; max-width: 620px; }
.feature-bullets { list-style: none; display: flex; flex-direction: column; gap: 26px; }
.feature-bullets li { display: flex; align-items: flex-start; gap: 26px; font-size: 21px; color: var(--text-mid); line-height: 1.5; }
.feature-bullets li::before { content: '→'; color: var(--terra); font-weight: 500; flex-shrink: 0; margin-top: 1px; }

/* ── TENANT ── */
.tenant { background: var(--gold-pale); }
.tenant-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
.tenant-steps { display: flex; flex-direction: column; gap: 0; }
.tenant-step { display: flex; gap: 26px; padding: 18px 0; border-bottom: 1px solid rgba(0,0,0,0.06); }
.tenant-step:last-child { border-bottom: none; }
.tenant-step-num { width: 52px; height: 52px; border-radius: 50%; background: var(--navy); color: var(--white); font-size: 19px; font-weight: 600; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 2px; }
.tenant-step-content h4 { font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--text-dark); margin-bottom: 4px; }
.tenant-step-content p { font-size: 23px; color: var(--text-mid); line-height: 1.55; font-weight: 300; }
.mock-app { background: var(--navy); border-radius: var(--radius-lg); padding: 48px; }
.mock-header { display: flex; align-items: center; gap: 13px; margin-bottom: 26px; padding-bottom: 14px; border-bottom: 1px solid rgba(255,255,255,0.07); }
.mock-dots { display: flex; gap: 5px; }
.dot { width: 13px; height: 13px; border-radius: 50%; }
.dot-r{background:#FF5F57} .dot-y{background:#FFBD2E} .dot-g{background:#28C840}
.mock-title { font-size: 19px; color: rgba(255,255,255,0.35); margin-left: 4px; }
.pay-row {
  display: flex; align-items: center; justify-content: space-between;
  padding: 13px 14px; border-radius: 13px;
  background: rgba(255,255,255,0.04); margin-bottom: 11px;
  border: 1px solid rgba(255,255,255,0.05);
}
.pay-left { display: flex; align-items: center; gap: 26px; }
.pay-flag { font-size: 23px; }
.pay-info h5 { font-size: 23px; font-weight: 500; color: rgba(255,255,255,0.88); margin-bottom: 2px; }
.pay-info p { font-size: 21px; color: rgba(255,255,255,0.3); }
.pay-right { text-align: right; }
.pay-amount { font-family: 'Fraunces', serif; font-size: 23px; color: var(--white); }
.pay-status { font-size: 23px; padding: 6px 13px; border-radius: 100px; font-weight: 500; display: inline-block; margin-top: 3px; }
.s-paid { background: rgba(42,107,74,0.25); color: #5CC98A; }
.s-due  { background: rgba(196,98,45,0.2); color: var(--terra-light); }
.s-auto { background: rgba(201,150,58,0.2); color: var(--gold); }
.mock-footer { margin-top: 26px; padding-top: 14px; border-top: 1px solid rgba(255,255,255,0.07); display: flex; justify-content: space-between; align-items: center; }
.mock-footer span { font-size: 21px; color: rgba(255,255,255,0.3); }

/* ── COUNTRIES ── */
.countries { background: var(--cream); }
.country-grid { display: grid; grid-template-columns: repeat(auto-fit,minmax(200px,1fr)); gap: 3px; margin-top: 56px; border-radius: var(--radius-lg); overflow: hidden; background: var(--cream-dark); }
.country-card { background: var(--white); padding: 48px 30px; transition: background 0.2s; }
.country-card:hover { background: var(--cream); }
.country-region { font-size: 19px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--terra); margin-bottom: 13px; }
.country-flags { font-size: 25px; margin-bottom: 13px; letter-spacing: 2px; }
.country-card h4 { font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--text-dark); margin-bottom: 5px; }
.country-card p { font-size: 19px; color: var(--text-light); margin-bottom: 26px; }
.country-method { display: inline-flex; align-items: center; padding: 7px 14px; background: var(--cream-dark); border-radius: 100px; font-size: 23px; font-weight: 500; color: var(--text-mid); }

/* ── PRICING ── */
.pricing { background: var(--navy); }
.pricing .section-label { color: var(--terra-light); }
.pricing .section-title { color: var(--white); }
.pricing .section-sub { color: rgba(255,255,255,0.45); }
.pricing-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 3px; margin-top: 56px; border-radius: var(--radius-lg); overflow: hidden; background: rgba(255,255,255,0.05); }
.price-card { background: var(--navy-mid); padding: 52px 40px; }
.price-card.featured { background: var(--terra); }
.price-tag { font-size: 23px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: rgba(255,255,255,0.45); margin-bottom: 26px; }
.price-card.featured .price-tag { color: rgba(255,255,255,0.7); }
.price-amount { display: flex; align-items: baseline; gap: 13px; margin-bottom: 11px; }
.price-currency { font-size: 25px; color: rgba(255,255,255,0.5); }
.price-number { font-family: 'Fraunces', serif; font-size: 56px; font-weight: 500; color: var(--white); line-height: 1; }
.price-period { font-size: 23px; color: rgba(255,255,255,0.35); }
.price-desc { font-size: 23px; color: rgba(255,255,255,0.4); margin-bottom: 36px; line-height: 1.55; }
.price-card.featured .price-desc { color: rgba(255,255,255,0.75); }
.price-feats { list-style: none; display: flex; flex-direction: column; gap: 11px; margin-bottom: 40px; }
.price-feats li { display: flex; align-items: center; gap: 13px; font-size: 23px; color: rgba(255,255,255,0.6); }
.price-feats li::before { content: '✓'; color: var(--terra-light); font-weight: 600; font-size: 19px; flex-shrink: 0; }
.price-card.featured .price-feats li { color: rgba(255,255,255,0.88); }
.price-card.featured .price-feats li::before { color: rgba(255,255,255,0.95); }
.price-btn {
  width: 100%; padding: 13px; border-radius: 13px; font-family: 'Outfit', sans-serif;
  font-size: 21px; font-weight: 500; cursor: pointer; transition: all 0.2s;
  border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.08);
  color: var(--white); text-decoration: none; display: block; text-align: center;
}
.price-btn:hover { background: rgba(255,255,255,0.15); }
.price-card.featured .price-btn { background: var(--white); color: var(--terra); border-color: var(--white); }
.price-card.featured .price-btn:hover { background: var(--cream); }

/* ── TRUST ── */
.trust { background: var(--white); }
.trust-grid { display: flex; flex-direction: column; gap: 26px; margin-top: 56px; }
.trust-row { display: grid; grid-template-columns: repeat(3,1fr); gap: 26px; }
.trust-card { background: var(--cream); border-radius: var(--radius); padding: 40px; }
.trust-icon { font-size: 29px; margin-bottom: 22px; }
.trust-card h4 { font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 600; color: var(--text-dark); margin-bottom: 9px; }
.trust-card p { font-size: 23px; color: var(--text-mid); line-height: 1.65; font-weight: 300; }

/* ── FAQ ── */
.faq { background: var(--cream-dark); }
.faq-list { display: flex; flex-direction: column; gap: 3px; margin-top: 56px; border-radius: var(--radius-lg); overflow: hidden; }
.faq-item { background: var(--white); }
.faq-q {
  width: 100%; display: flex; align-items: center; justify-content: space-between;
  padding: 22px 28px; background: none; border: none; cursor: pointer;
  text-align: left; font-family: 'Outfit', sans-serif; font-size: 19px;
  font-weight: 500; color: var(--text-dark); gap: 26px; transition: background 0.2s;
}
.faq-q:hover { background: var(--cream); }
.faq-arrow { flex-shrink: 0; color: var(--terra); font-size: 23px; transition: transform 0.3s; line-height: 1; }
.faq-item.open .faq-arrow { transform: rotate(45deg); }
.faq-a { max-height: 0; overflow: hidden; transition: max-height 0.35s ease, padding 0.35s ease; font-size: 21px; color: var(--text-mid); line-height: 1.7; font-weight: 300; padding: 0 28px; }
.faq-item.open .faq-a { max-height: 300px; padding: 0 28px 22px; }

/* ── CTA BANNER ── */
.rm-cta-banner { background: var(--terra); padding: 88px 24px; text-align: center; }
.rm-cta-banner h2 { font-size: clamp(38px, 5vw, 60px); color: var(--white); letter-spacing: -0.02em; margin-bottom: 22px; }
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
.rm-compliance-item { font-size: 12px; color: rgba(255,255,255,0.24); display: flex; align-items: center; gap: 5px; }
.rm-footer-bottom { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 18px; }
.rm-footer-copy { font-size: 13px; color: rgba(255,255,255,0.22); }
.rm-footer-legal { display: flex; align-items: center; gap: 13px; }
.rm-footer-legal a { font-size: 13px; color: rgba(255,255,255,0.26); text-decoration: none; padding: 7px 12px; transition: color 0.2s; }
.rm-footer-legal a:hover { color: rgba(255,255,255,0.6); }
.rm-footer-legal-sep { color: rgba(255,255,255,0.1); font-size: 21px; }
.rm-region-select {
  padding: 10px 40px 10px 16px; border-radius: 13px; border: 1px solid rgba(255,255,255,0.1);
  background: transparent; color: rgba(255,255,255,0.42); font-family: 'Outfit', sans-serif;
  font-size: 13px; cursor: pointer; appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='rgba(255,255,255,0.28)' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
  background-repeat: no-repeat; background-position: right 10px center; transition: all 0.2s;
}
.rm-region-select:hover { border-color: rgba(255,255,255,0.2); color: rgba(255,255,255,0.7); }
.rm-region-select option { background: var(--navy-mid); color: var(--white); }

/* ── SCROLL REVEAL ── */
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: none; }

/* ── MOBILE ── */
@media (max-width: 1000px) {
  .rm-nav { padding: 0 20px; }
  .rm-nav-links, .rm-nav-cta { display: none; }
  .rm-hamburger { display: flex; }
}
@media (max-width: 768px) {
  section { padding: 72px 20px; }
  .problem-inner, .steps, .features-layout, .tenant-grid, .pricing-grid { grid-template-columns: 1fr; }
  .trust-row { grid-template-columns: 1fr; }
  .rm-footer-top { grid-template-columns: 1fr 1fr; }
  .rm-footer-brand { grid-column: 1 / -1; }
  .feature-tabs { flex-direction: row; flex-wrap: wrap; position: static; }
}
</style>
@endpush

@php
  $page = 'home';
  $hideFooter = false;
@endphp

@section('content')
<section class="hero">
  <div class="hero-grid"></div>
  <div class="hero-glow"></div>
  <div class="hero-badge"><span class="hero-badge-dot"></span>Now accepting early access applications</div>
  <h1>Collect rent <em>anywhere.</em><br>Get paid everywhere.</h1>
  <p class="hero-sub">One app to manage properties across any country. Your tenants pay locally — in their currency, with their bank. You see everything in yours.</p>
  <div class="hero-ctas">
    <a href="{{ url('/waitlist') }}" class="rm-btn rm-btn-primary btn-lg">Join the waitlist</a>
    <a href="{{ url('/how-it-works') }}" class="btn-outline-light">See how it works</a>
  </div>
  <div class="ticker-wrap">
    <p class="ticker-label">Collecting rent across</p>
    <div class="ticker">
      <div class="ticker-item"><span class="flag">🇫🇷</span><span class="amount">€ 1,500</span><span class="method">EUR · SEPA</span></div>
      <div class="ticker-item"><span class="flag">🇮🇳</span><span class="amount">₹ 75,000</span><span class="method">INR · UPI</span></div>
      <div class="ticker-item"><span class="flag">🇬🇧</span><span class="amount">£ 2,200</span><span class="method">GBP · BACS</span></div>
      <div class="ticker-item"><span class="flag">🇳🇬</span><span class="amount">₦ 850,000</span><span class="method">NGN · Bank Transfer</span></div>
      <div class="ticker-item"><span class="flag">🇩🇪</span><span class="amount">€ 1,800</span><span class="method">EUR · SEPA</span></div>
      <div class="ticker-item"><span class="flag">🇦🇺</span><span class="amount">A$ 2,400</span><span class="method">AUD · BECS</span></div>
      <div class="ticker-item"><span class="flag">🇧🇷</span><span class="amount">R$ 4,500</span><span class="method">BRL · Pix</span></div>
      <div class="ticker-item"><span class="flag">🇸🇬</span><span class="amount">S$ 3,200</span><span class="method">SGD · PayNow</span></div>
      <div class="ticker-item"><span class="flag">🇰🇪</span><span class="amount">KSh 45,000</span><span class="method">KES · M-Pesa</span></div>
      <div class="ticker-item"><span class="flag">🇲🇽</span><span class="amount">$ 12,000</span><span class="method">MXN · SPEI</span></div>
      <!-- duplicate for seamless loop -->
      <div class="ticker-item"><span class="flag">🇫🇷</span><span class="amount">€ 1,500</span><span class="method">EUR · SEPA</span></div>
      <div class="ticker-item"><span class="flag">🇮🇳</span><span class="amount">₹ 75,000</span><span class="method">INR · UPI</span></div>
      <div class="ticker-item"><span class="flag">🇬🇧</span><span class="amount">£ 2,200</span><span class="method">GBP · BACS</span></div>
      <div class="ticker-item"><span class="flag">🇳🇬</span><span class="amount">₦ 850,000</span><span class="method">NGN · Bank Transfer</span></div>
      <div class="ticker-item"><span class="flag">🇩🇪</span><span class="amount">€ 1,800</span><span class="method">EUR · SEPA</span></div>
      <div class="ticker-item"><span class="flag">🇦🇺</span><span class="amount">A$ 2,400</span><span class="method">AUD · BECS</span></div>
      <div class="ticker-item"><span class="flag">🇧🇷</span><span class="amount">R$ 4,500</span><span class="method">BRL · Pix</span></div>
      <div class="ticker-item"><span class="flag">🇸🇬</span><span class="amount">S$ 3,200</span><span class="method">SGD · PayNow</span></div>
      <div class="ticker-item"><span class="flag">🇰🇪</span><span class="amount">KSh 45,000</span><span class="method">KES · M-Pesa</span></div>
      <div class="ticker-item"><span class="flag">🇲🇽</span><span class="amount">$ 12,000</span><span class="method">MXN · SPEI</span></div>
    </div>
  </div>
</section>

<!-- ══ PROBLEM ══ -->
<section class="problem">
  <div class="container">
    <div class="problem-inner reveal">
      <div>
        <p class="section-label">Sound familiar?</p>
        <blockquote class="problem-quote">"You own properties in 3 countries. You're managing 3 bank apps, 2 WhatsApp groups, a spreadsheet, and a very patient accountant."</blockquote>
      </div>
      <div>
        <p style="font-size:21px;color:var(--text-mid);margin-bottom:20px;font-weight:300;">The international landlord has always been underserved. Until now.</p>
        <ul class="problem-list">
          <li><span class="prob-icon">😤</span>Chasing rent across time zones via WhatsApp</li>
          <li><span class="prob-icon">📊</span>Converting currencies manually into a spreadsheet</li>
          <li><span class="prob-icon">🗂️</span>No single record of what you've collected or are owed</li>
          <li><span class="prob-icon">🚫</span>Using apps built only for US or UK landlords</li>
          <li class="resolved"><span class="prob-icon">✅</span>One app, every property, every country</li>
          <li class="resolved"><span class="prob-icon">✅</span>Local payment rails — your tenant pays their way</li>
          <li class="resolved"><span class="prob-icon">✅</span>Unified dashboard in your home currency</li>
          <li class="resolved"><span class="prob-icon">✅</span>Tax-ready export for your CPA, every year</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ HOW IT WORKS ══ -->
<section class="how">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Simple by design</p>
      <h2 class="section-title" style="color:var(--white)">Three steps. That's it.</h2>
      <p class="section-sub">Complex regulations and payment rails handled invisibly. <a href="{{ url('/how-it-works') }}" style="color:var(--terra-light);text-decoration:none;font-weight:500;">See the full walkthrough →</a></p>
    </div>
    <div class="steps reveal">
      <div class="step">
        <div class="step-num">01</div>
        <div class="step-icon">🏠</div>
        <h3>Add your property</h3>
        <p>Select the country. We connect the right local payment method automatically. Add tenant details and rent in their currency.</p>
      </div>
      <div class="step">
        <div class="step-num">02</div>
        <div class="step-icon">💳</div>
        <h3>Your tenant pays locally</h3>
        <p>They set up a local mandate — UPI in India, SEPA in Europe, BACS in the UK. Rent is collected automatically every month.</p>
      </div>
      <div class="step">
        <div class="step-num">03</div>
        <div class="step-icon">📊</div>
        <h3>You see it all in one place</h3>
        <p>Every property, every currency, one dashboard. FX rates logged at every payment. Annual report ready for your accountant.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══ LANDLORD FEATURES ══ -->
<section class="features">
  <div class="container">
    <div class="reveal">
      <p class="section-label">For landlords</p>
      <h2 class="section-title">Everything you need.<br>Nothing you don't.</h2>
      <p class="section-sub">12 core processes — from lease creation to tax export. <a href="{{ url('/features') }}" style="color:var(--terra);text-decoration:none;font-weight:500;">See all features →</a></p>
    </div>
    <div class="features-layout reveal">
      <div class="feature-tabs" id="featureTabs">
        <button class="feature-tab active" data-panel="0"><span class="feature-tab-icon">🏠</span><span class="feature-tab-label">Add a property</span></button>
        <button class="feature-tab" data-panel="1"><span class="feature-tab-icon">📋</span><span class="feature-tab-label">Create a lease</span></button>
        <button class="feature-tab" data-panel="2"><span class="feature-tab-icon">💳</span><span class="feature-tab-label">Rent collection</span></button>
        <button class="feature-tab" data-panel="3"><span class="feature-tab-icon">⚠️</span><span class="feature-tab-label">Arrears</span></button>
        <button class="feature-tab" data-panel="4"><span class="feature-tab-icon">🔧</span><span class="feature-tab-label">Maintenance</span></button>
        <button class="feature-tab" data-panel="5"><span class="feature-tab-icon">📊</span><span class="feature-tab-label">Dashboard</span></button>
        <button class="feature-tab" data-panel="6"><span class="feature-tab-icon">📁</span><span class="feature-tab-label">Documents</span></button>
        <button class="feature-tab" data-panel="7"><span class="feature-tab-icon">📤</span><span class="feature-tab-label">Tax export</span></button>
      </div>
      <div id="featurePanels">
        <div class="feature-panel active"><div class="feature-card"><div class="feature-card-num">01</div><h3>Add a property</h3><p class="lead">Select the country and we handle the rest. The right local payment method is connected automatically. Address fields adapt to the country.</p><ul class="feature-bullets"><li>Supported in 60+ countries across 7 regions</li><li>Local currency locked to country automatically</li><li>Local payment method connected automatically</li><li>First property free for one month</li></ul></div></div>
        <div class="feature-panel"><div class="feature-card"><div class="feature-card-num">02</div><h3>Create a lease</h3><p class="lead">Set rent, due date, grace period, and lease duration. Upload your signed lease PDF. Tenant receives an invite with their payment setup link.</p><ul class="feature-bullets"><li>Rent in local currency + USD equivalent shown alongside</li><li>FX rate snapshot stored at lease creation</li><li>Security deposit amount logged — app does not hold funds</li><li>Tenant invite sent automatically on activation</li></ul></div></div>
        <div class="feature-panel"><div class="feature-card"><div class="feature-card-num">03</div><h3>Automated rent collection</h3><p class="lead">Rent is pulled on the due date via the local payment rail. Notified on success or failure. Every payment logged with FX rate at time of collection.</p><ul class="feature-bullets"><li>UPI for India, SEPA for Europe, BACS for UK, ACH for US</li><li>Push notification and email on every payment event</li><li>Automatic retry on failure, arrears flag after second miss</li><li>Balance visible per property and per country</li></ul></div></div>
        <div class="feature-panel"><div class="feature-card"><div class="feature-card-num">04</div><h3>Arrears management</h3><p class="lead">When rent isn't paid, the app handles escalation automatically. Reminders on day 1, 5, and 10 — tone escalates. Log manual payments or disputes from your dashboard.</p><ul class="feature-bullets"><li>Localised reminder emails in tenant's language</li><li>Escalating cadence: polite → firm → formal</li><li>Log cash or external bank transfer payments manually</li><li>Mark arrears as waived or disputed with notes</li></ul></div></div>
        <div class="feature-panel"><div class="feature-card"><div class="feature-card-num">05</div><h3>Maintenance requests</h3><p class="lead">Tenants raise issues with description and photos. Receive notification, respond, and close. Full history per property — invaluable for deposit disputes.</p><ul class="feature-bullets"><li>Tenant categorises: plumbing, electrical, structural, appliance</li><li>Photo attachments from camera or gallery</li><li>Status tracking: submitted → acknowledged → resolved</li><li>Contractor invoice attachment on closure</li></ul></div></div>
        <div class="feature-panel"><div class="feature-card"><div class="feature-card-num">06</div><h3>Financial dashboard</h3><p class="lead">All properties, all currencies, one view. EUR from Paris, INR from Mumbai — both shown in USD alongside. FX rates logged historically at each payment.</p><ul class="feature-bullets"><li>Unified multi-currency dashboard in your home currency</li><li>Filter by country, property, status, date range</li><li>Repatriation log — record cross-border transfers</li><li>Income trend chart across all properties</li></ul></div></div>
        <div class="feature-panel"><div class="feature-card"><div class="feature-card-num">07</div><h3>Document management</h3><p class="lead">Store leases, inspection reports, insurance certificates, and compliance documents. Share with tenants via secure time-limited links. 7-year retention.</p><ul class="feature-bullets"><li>Documents organised by property and type</li><li>Secure signed download links — 15 minute expiry</li><li>Tenant-uploaded documents (renewal ID, employer letters)</li><li>7-year minimum retention per data law requirements</li></ul></div></div>
        <div class="feature-panel"><div class="feature-card"><div class="feature-card-num">08</div><h3>Tax-ready export</h3><p class="lead">Annual income report per property in local currency and USD equivalent. FX rate logged at every transaction. Hand it to your CPA.</p><ul class="feature-bullets"><li>Annual report per property as CSV and PDF</li><li>FX rate logged per transaction — permanently</li><li>Repatriation history log for FBAR and Schedule E</li><li>Structured for US CPA use — not a tax filing service</li></ul></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ TENANT ══ -->
<section class="tenant">
  <div class="container">
    <div class="tenant-grid reveal">
      <div>
        <p class="section-label">For tenants</p>
        <h2 class="section-title" style="max-width:360px;">Simple for your tenants. Wherever they are.</h2>
        <p class="section-sub" style="font-size:19px;margin-bottom:32px;">Tenants get a fully localised experience — their language, their payment method, their currency.</p>
        <div class="tenant-steps">
          <div class="tenant-step"><div class="tenant-step-num">1</div><div class="tenant-step-content"><h4>Receive invite &amp; set up payment</h4><p>Email in their language. UPI in India, SEPA in Europe, BACS in UK.</p></div></div>
          <div class="tenant-step"><div class="tenant-step-num">2</div><div class="tenant-step-content"><h4>Rent collected automatically</h4><p>Notified on every payment. Full history with PDF receipts.</p></div></div>
          <div class="tenant-step"><div class="tenant-step-num">3</div><div class="tenant-step-content"><h4>Raise maintenance &amp; message landlord</h4><p>Photos, status tracking — all in one thread, on-platform.</p></div></div>
          <div class="tenant-step"><div class="tenant-step-num">4</div><div class="tenant-step-content"><h4>Access documents anytime</h4><p>Lease, receipts, rental references — always available.</p></div></div>
        </div>
        <a href="{{ url('/features') }}#tenant" style="display:inline-flex;align-items:center;gap:6px;margin-top:28px;color:var(--terra);text-decoration:none;font-size:21px;font-weight:500;">Full tenant experience →</a>
      </div>
      <div>
        <div class="mock-app">
          <div class="mock-header"><div class="mock-dots"><div class="dot dot-r"></div><div class="dot dot-y"></div><div class="dot dot-g"></div></div><span class="mock-title">My payments — March 2025</span></div>
          <div class="pay-row"><div class="pay-left"><span class="pay-flag">🇫🇷</span><div class="pay-info"><h5>Rue de Rivoli, Paris</h5><p>1 Mar 2025 · SEPA Direct</p></div></div><div class="pay-right"><div class="pay-amount">€ 1,500</div><span class="pay-status s-paid">Paid</span></div></div>
          <div class="pay-row"><div class="pay-left"><span class="pay-flag">🇮🇳</span><div class="pay-info"><h5>Bandra West, Mumbai</h5><p>1 Mar 2025 · UPI</p></div></div><div class="pay-right"><div class="pay-amount">₹ 75,000</div><span class="pay-status s-paid">Paid</span></div></div>
          <div class="pay-row"><div class="pay-left"><span class="pay-flag">🇬🇧</span><div class="pay-info"><h5>Shoreditch, London</h5><p>1 Apr 2025 · BACS</p></div></div><div class="pay-right"><div class="pay-amount">£ 2,200</div><span class="pay-status s-due">Due in 3 days</span></div></div>
          <div class="mock-footer"><span>Next auto-collection</span><span class="pay-status s-auto">1 Apr 2025</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ COUNTRIES ══ -->
<section class="countries">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Supported markets</p>
      <h2 class="section-title">60+ countries.<br>One integration.</h2>
      <p class="section-sub">Each country uses the right local payment rail automatically. <a href="{{ url('/countries') }}" style="color:var(--terra);text-decoration:none;font-weight:500;">See all supported markets →</a></p>
    </div>
    <div class="country-grid reveal">
      <div class="country-card"><p class="country-region">North America</p><div class="country-flags">🇺🇸 🇨🇦</div><h4>US &amp; Canada</h4><p>United States, Canada</p><span class="country-method">ACH · EFT</span></div>
      <div class="country-card"><p class="country-region">Western Europe</p><div class="country-flags">🇫🇷 🇩🇪 🇮🇹 🇪🇸</div><h4>EU + UK</h4><p>France, Germany, Italy, Spain + 15 more</p><span class="country-method">SEPA · BACS</span></div>
      <div class="country-card"><p class="country-region">South Asia</p><div class="country-flags">🇮🇳</div><h4>India</h4><p>Full UPI, NEFT, NACH, IMPS coverage</p><span class="country-method">UPI · NEFT</span></div>
      <div class="country-card"><p class="country-region">Southeast Asia</p><div class="country-flags">🇮🇩 🇵🇭 🇲🇾 🇻🇳</div><h4>SE Asia</h4><p>Indonesia, Philippines, Malaysia, Vietnam, Thailand</p><span class="country-method">Local e-wallets · Bank</span></div>
      <div class="country-card"><p class="country-region">Africa</p><div class="country-flags">🇳🇬 🇰🇪 🇬🇭 🇿🇦</div><h4>Africa</h4><p>Nigeria, Kenya, Ghana, South Africa + 30 more</p><span class="country-method">Mobile money · Bank</span></div>
      <div class="country-card"><p class="country-region">Latin America</p><div class="country-flags">🇧🇷 🇲🇽 🇦🇷 🇨🇴</div><h4>LatAm</h4><p>Brazil, Mexico, Argentina, Colombia, Chile</p><span class="country-method">Pix · SPEI · PSE</span></div>
      <div class="country-card"><p class="country-region">Pacific</p><div class="country-flags">🇦🇺 🇳🇿 🇸🇬</div><h4>Pacific &amp; Singapore</h4><p>Australia, New Zealand, Singapore, Hong Kong</p><span class="country-method">BECS · PayNow</span></div>
      <div class="country-card" style="background:var(--cream);border:2px dashed var(--cream-dark);"><p class="country-region">Coming soon</p><div class="country-flags">🌍</div><h4>More markets</h4><p>Middle East, Eastern Europe on the roadmap</p><span class="country-method"><a href="{{ url('/countries') }}" style="color:var(--terra);text-decoration:none;">Request your country →</a></span></div>
    </div>
  </div>
</section>

<!-- ══ PRICING ══ -->
<section class="pricing">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Transparent pricing</p>
      <h2 class="section-title" style="color:var(--white)">Start free. Scale simply.</h2>
      <p class="section-sub">First property free for one month. Pay per unit from the second. <a href="{{ url('/pricing') }}" style="color:var(--terra-light);text-decoration:none;font-weight:500;">See full pricing →</a></p>
    </div>
    <div class="pricing-grid reveal">
      <div class="price-card"><p class="price-tag">Starter</p><div class="price-amount"><span class="price-currency">$</span><span class="price-number">0</span><span class="price-period">/ month</span></div><p class="price-desc">For landlords with a single property. Full features, no payment required.</p><ul class="price-feats"><li>1 property</li><li>Automated rent collection</li><li>Tenant messaging</li><li>Maintenance requests</li><li>Document storage</li><li>Annual tax export</li></ul><a href="{{ url('/waitlist') }}" class="price-btn">Join waitlist</a></div>
      <div class="price-card featured"><p class="price-tag">Per unit</p><div class="price-amount"><span class="price-currency">$</span><span class="price-number">9</span><span class="price-period">/ unit / mo</span></div><p class="price-desc">For landlords with multiple properties across any number of countries.</p><ul class="price-feats"><li>Unlimited properties</li><li>All 60+ countries</li><li>Full financial dashboard</li><li>Multi-currency ledger</li><li>Portfolio analytics</li><li>Priority support</li></ul><a href="{{ url('/waitlist') }}" class="price-btn">Start free trial</a></div>
      <div class="price-card"><p class="price-tag">Agency</p><div class="price-amount" style="align-items:center;padding-top:6px;"><span class="price-number" style="font-size:38px;line-height:1.15;">Talk<br>to us</span></div><p class="price-desc">For property managers handling portfolios on behalf of multiple owners.</p><ul class="price-feats"><li>Sub-accounts per owner</li><li>Bulk lease management</li><li>White-label option</li><li>Dedicated account manager</li><li>Custom onboarding</li><li>SLA guarantee</li></ul><a href="{{ url('/contact') }}" class="price-btn">Contact sales</a></div>
    </div>
    <p style="text-align:center;margin-top:22px;font-size:19px;color:rgba(255,255,255,0.28);">Processor fees passed through at cost and shown before every collection. No markup.</p>
  </div>
</section>

<!-- ══ TRUST ══ -->
<section class="trust">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label" style="text-align:center;">Why landlords trust us</p>
      <h2 class="section-title" style="text-align:center;">Your money never moves<br>without you.</h2>
    </div>
    <div class="trust-grid reveal">
      <div class="trust-row">
        <div class="trust-card"><div class="trust-icon">🏦</div><h4>Local collection only</h4><p>We collect rent locally in the tenant's country. Cross-border repatriation is always your responsibility — through your own bank. We are not a remittance service.</p></div>
        <div class="trust-card"><div class="trust-icon">📋</div><h4>Every payment logged</h4><p>FX rate captured at the moment of every transaction — permanently, never recalculated. Your records are airtight for Schedule E, FBAR, and foreign returns.</p></div>
        <div class="trust-card"><div class="trust-icon">🔒</div><h4>7-year document retention</h4><p>All leases, receipts, and communications stored for 7 years minimum. GDPR compliant. EU data stays in EU. India data stays in India.</p></div>
      </div>
      <div class="trust-row">
        <div class="trust-card"><div class="trust-icon">💬</div><h4>On-platform communication</h4><p>All messages timestamped and stored. No more scrambling through WhatsApp for evidence in a deposit dispute.</p></div>
        <div class="trust-card"><div class="trust-icon">🌐</div><h4>Licensed local payment providers</h4><p>Every market uses a locally licensed, regulated payment provider — RBI compliant in India, PSD2 compliant in Europe, FCA compliant in the UK.</p></div>
        <div class="trust-card"><div class="trust-icon">📤</div><h4>Tax-ready exports</h4><p>Annual income report per property in CSV and PDF. Structured for your CPA. We make your accountant's job significantly easier.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ FAQ ══ -->
<section class="faq">
  <div class="container-sm">
    <div class="reveal" style="text-align:center;">
      <p class="section-label" style="text-align:center;">Got questions?</p>
      <h2 class="section-title" style="text-align:center;">Frequently asked</h2>
    </div>
    <div class="faq-list reveal">
      <div class="faq-item"><button class="faq-q">Does Rentersmaxx move money across borders?<span class="faq-arrow">+</span></button><div class="faq-a">No. Rentersmaxx collects rent locally using local payment rails. The money sits in your in-country balance. Cross-border repatriation is always your responsibility — through your own bank and CA. We log it when you tell us it happened.</div></div>
      <div class="faq-item"><button class="faq-q">How does rent collection work in India?<span class="faq-arrow">+</span></button><div class="faq-a">Indian tenants set up a UPI autopay or NACH mandate. Rent is collected in INR on the due date via a locally licensed payment provider. Funds settle to your NRO account. Repatriation — including Form 15CA/15CB — is handled by you outside the app.</div></div>
      <div class="faq-item"><button class="faq-q">What happens if a tenant misses a payment?<span class="faq-arrow">+</span></button><div class="faq-a">The app retries automatically after 3 days. If the second attempt also fails, you receive an arrears notification and automated reminders go to the tenant on days 1, 5, and 10 — with escalating tone. You can log a manual payment or mark it as disputed.</div></div>
      <div class="faq-item"><button class="faq-q">Do I need to do anything at tax time?<span class="faq-arrow">+</span></button><div class="faq-a">Rentersmaxx generates an annual income report per property — in local currency and USD equivalent — that you hand to your CPA. We are not a tax advisor. Your obligations (Schedule E, FBAR, French non-resident filing, Indian ITR) remain yours.</div></div>
      <div class="faq-item"><button class="faq-q">Is there a limit on how many properties I can add?<span class="faq-arrow">+</span></button><div class="faq-a">No limit. Your first property is free for the first month. From the second property onwards — or after the first month — you pay $9 per unit per month. Add properties in any supported country.</div></div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
// ── FEATURE TABS ──
document.querySelectorAll('.feature-tab').forEach((tab, i) => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.feature-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.feature-panel').forEach(p => p.classList.remove('active'));
    tab.classList.add('active');
    document.querySelectorAll('.feature-panel')[i].classList.add('active');
  });
});

// ── FAQ ──
document.querySelectorAll('.faq-q').forEach(btn => {
  btn.addEventListener('click', () => {
    const item   = btn.closest('.faq-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
  });
});

// ── SCROLL REVEAL ──
const observer = new IntersectionObserver(
  entries => entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } }),
  { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
);
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// ── WAITLIST ──
soon.`;
  note.style.color = 'rgba(255,255,255,0.88)';
  document.getElementById('rmEmail').value = '';
}
</script>
@endpush
