@extends('layouts.app')

@section('title', 'How it works — Rentersmaxx')
@section('meta_description', 'See exactly how Rentersmaxx collects rent locally in any country and consolidates it into your dashboard. Three steps, zero border complexity.')

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
h1, h2, h3, h4 { font-family: 'Fraunces', serif; font-weight: 500; line-height: 1.1; }

/* ── NAV ── */
.rm-nav { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; display: flex; align-items: center; justify-content: space-between; padding: 0 72px; height: 80px; background: rgba(13,31,53,0.94); backdrop-filter: blur(20px); border-bottom: 1px solid var(--navy-border); transition: background 0.3s; }
.rm-nav.scrolled { background: rgba(13,31,53,0.99); }
.rm-nav-logo { font-family: 'Fraunces', serif; font-size: 22px; font-weight: 700; color: var(--white); text-decoration: none; letter-spacing: -0.5px; flex-shrink: 0; }
.rm-nav-logo span { color: var(--terra-light); }
.rm-nav-links { display: flex; align-items: center; gap: 4px; list-style: none; margin: 0 auto; padding: 0 32px; }
.rm-nav-links a { display: flex; align-items: center; padding: 7px 14px; border-radius: 16px; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.2s, background 0.2s; white-space: nowrap; }
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

/* ── PAGE HERO (inner page style) ── */
.page-hero {
  background: var(--navy);
  padding: 160px 32px 80px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.page-hero-grid {
  position: absolute; inset: 0;
  background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
  background-size: 60px 60px; pointer-events: none;
}
.page-hero-glow {
  position: absolute; width: 600px; height: 600px; border-radius: 50%;
  background: radial-gradient(circle, rgba(196,98,45,0.12) 0%, transparent 70%);
  top: 50%; left: 50%; transform: translate(-50%, -60%); pointer-events: none;
}
.page-hero-label {
  display: inline-flex; align-items: center; gap: 13px;
  background: rgba(196,98,45,0.12); border: 1px solid rgba(196,98,45,0.3);
  color: var(--terra-light); padding: 8px 18px; border-radius: 100px;
  font-size: 21px; font-weight: 500; margin-bottom: 36px; letter-spacing: 0.03em;
}
.page-hero h1 {
  font-size: clamp(44px, 6vw, 76px); color: var(--white);
  letter-spacing: -0.03em; max-width: 800px; margin: 0 auto 22px;
}
.page-hero h1 em { font-style: italic; color: var(--terra-light); }
.page-hero p {
  font-size: clamp(24px, 1.8vw, 20px); color: rgba(255,255,255,0.5);
  font-weight: 300; line-height: 1.65; max-width: 660px; margin: 0 auto 40px;
}
.page-hero-ctas { display: flex; gap: 26px; justify-content: center; flex-wrap: wrap; }
.btn-lg { padding: 18px 32px; font-size: 19px; border-radius: 13px; }
.btn-outline-light { background: transparent; color: var(--white); border: 1px solid rgba(255,255,255,0.3); display: inline-flex; align-items: center; gap: 13px; padding: 18px 32px; border-radius: 13px; font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 500; text-decoration: none; cursor: pointer; transition: all 0.2s; }
.btn-outline-light:hover { background: rgba(255,255,255,0.08); }

/* ── OVERVIEW STRIP ── */
.overview { background: var(--white); padding: 56px 24px; border-bottom: 1px solid var(--cream-dark); }
.overview-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 3px; border-radius: var(--radius-lg); overflow: hidden; background: var(--cream-dark); }
.overview-card {
  background: var(--white); padding: 42px 28px;
  display: flex; align-items: flex-start; gap: 26px;
  cursor: pointer; transition: background 0.2s; text-decoration: none;
}
.overview-card:hover { background: var(--cream); }
.overview-card.active { background: var(--terra-pale); }
.overview-num {
  font-family: 'Fraunces', serif; font-size: 40px; font-weight: 300;
  color: var(--cream-dark); line-height: 1; flex-shrink: 0; transition: color 0.2s;
}
.overview-card.active .overview-num, .overview-card:hover .overview-num { color: var(--terra); }
.overview-text h3 { font-size: 23px; color: var(--text-dark); margin-bottom: 11px; }
.overview-text p { font-size: 23px; color: var(--text-mid); font-weight: 300; line-height: 1.5; }

/* ── DEEP DIVE STEPS ── */
.deep-dive { background: var(--cream); }

.step-block {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 96px; align-items: center; margin-bottom: 120px;
}
.step-block:last-child { margin-bottom: 0; }
.step-block.flip { direction: rtl; }
.step-block.flip > * { direction: ltr; }

.step-content {}
.step-eyebrow {
  display: flex; align-items: center; gap: 18px; margin-bottom: 30px;
}
.step-badge {
  display: inline-flex; align-items: center; justify-content: center;
  width: 52px; height: 52px; border-radius: 50%;
  background: var(--navy); color: var(--white);
  font-family: 'Fraunces', serif; font-size: 21px; font-weight: 500;
  flex-shrink: 0;
}
.step-badge.terra { background: var(--terra); }
.step-badge.green { background: var(--green); }
.step-tag { font-size: 23px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-light); }

.step-content h2 { font-size: clamp(44px, 3vw, 42px); color: var(--text-dark); margin-bottom: 22px; letter-spacing: -0.02em; }
.step-content .lead { font-size: 23px; color: var(--text-mid); line-height: 1.7; font-weight: 300; margin-bottom: 40px; }

.substeps { display: flex; flex-direction: column; gap: 0; }
.substep {
  display: flex; gap: 26px; padding: 22px 0;
  border-bottom: 1px solid var(--cream-dark);
}
.substep:last-child { border-bottom: none; }
.substep-icon { font-size: 21px; flex-shrink: 0; margin-top: 1px; }
.substep-content h4 { font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--text-dark); margin-bottom: 3px; }
.substep-content p { font-size: 23px; color: var(--text-mid); line-height: 1.55; font-weight: 300; }

/* ── VISUAL PANELS ── */
.visual-panel {
  border-radius: var(--radius-lg); overflow: hidden;
  position: relative;
}

/* Step 1 visual — country selector */
.v-country { background: var(--navy); padding: 42px; }
.v-header { display: flex; align-items: center; gap: 13px; margin-bottom: 30px; padding-bottom: 16px; border-bottom: 1px solid rgba(255,255,255,0.07); }
.v-dots { display: flex; gap: 5px; }
.vd { width: 13px; height: 13px; border-radius: 50%; }
.vd-r{background:#FF5F57}.vd-y{background:#FFBD2E}.vd-g{background:#28C840}
.v-title { font-size: 19px; color: rgba(255,255,255,0.3); margin-left: 4px; }

.country-option {
  display: flex; align-items: center; justify-content: space-between;
  padding: 13px 16px; border-radius: 13px; margin-bottom: 11px;
  background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.05);
  cursor: pointer; transition: all 0.2s;
}
.country-option.selected {
  background: rgba(196,98,45,0.15); border-color: rgba(196,98,45,0.35);
}
.country-option-left { display: flex; align-items: center; gap: 26px; }
.c-flag { font-size: 23px; }
.c-name { font-size: 23px; font-weight: 500; color: rgba(255,255,255,0.85); }
.c-processor { font-size: 21px; color: rgba(255,255,255,0.3); margin-top: 2px; }
.c-check { width: 23px; height: 23px; border-radius: 50%; background: var(--terra); display: flex; align-items: center; justify-content: center; font-size: 19px; color: white; }
.c-radio { width: 23px; height: 23px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.15); }

.v-assigned {
  margin-top: 26px; padding: 18px 16px; border-radius: 13px;
  background: rgba(42,107,74,0.15); border: 1px solid rgba(42,107,74,0.3);
  display: flex; align-items: center; gap: 13px;
}
.v-assigned-icon { font-size: 21px; }
.v-assigned-text { font-size: 19px; color: rgba(255,255,255,0.75); line-height: 1.4; }
.v-assigned-text strong { color: #5CC98A; font-weight: 600; }

/* Step 2 visual — payment mandate flow */
.v-mandate { background: var(--gold-pale); padding: 42px; }
.mandate-flow { display: flex; flex-direction: column; gap: 26px; }
.mandate-step-card {
  background: var(--white); border: 1px solid var(--cream-dark);
  border-radius: var(--radius); padding: 24px 28px;
  display: flex; align-items: center; gap: 26px;
  position: relative;
}
.mandate-step-card.done { border-color: rgba(42,107,74,0.3); background: var(--green-pale); }
.mandate-step-card.active-card { border-color: rgba(196,98,45,0.4); box-shadow: 0 0 0 3px rgba(196,98,45,0.08); }
.ms-num { width: 52px; height: 52px; border-radius: 50%; background: var(--cream-dark); display: flex; align-items: center; justify-content: center; font-size: 19px; font-weight: 600; color: var(--text-mid); flex-shrink: 0; }
.mandate-step-card.done .ms-num { background: rgba(42,107,74,0.2); color: var(--green); }
.mandate-step-card.active-card .ms-num { background: var(--terra); color: var(--white); }
.ms-text h5 { font-family: 'Outfit', sans-serif; font-size: 23px; font-weight: 600; color: var(--text-dark); margin-bottom: 2px; }
.ms-text p { font-size: 19px; color: var(--text-mid); font-weight: 300; }
.ms-badge { margin-left: auto; font-size: 23px; padding: 6px 13px; border-radius: 100px; font-weight: 500; flex-shrink: 0; }
.ms-done { background: rgba(42,107,74,0.15); color: var(--green); }
.ms-now  { background: rgba(196,98,45,0.15); color: var(--terra); }
.ms-next { background: var(--cream-dark); color: var(--text-light); }

.connector { width: 1px; height: 12px; background: var(--cream-dark); margin-left: 34px; }

/* Step 3 visual — dashboard */
.v-dashboard { background: var(--navy); padding: 48px; }
.dash-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 26px; }
.dash-title { font-size: 23px; font-weight: 500; color: rgba(255,255,255,0.7); }
.dash-period { font-size: 21px; color: rgba(255,255,255,0.3); padding: 7px 14px; border-radius: 13px; background: rgba(255,255,255,0.05); }
.dash-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 13px; margin-bottom: 26px; }
.dash-stat { background: rgba(255,255,255,0.04); border-radius: 13px; padding: 18px 16px; border: 1px solid rgba(255,255,255,0.05); }
.dash-stat-label { font-size: 23px; color: rgba(255,255,255,0.3); margin-bottom: 11px; text-transform: uppercase; letter-spacing: 0.08em; }
.dash-stat-value { font-family: 'Fraunces', serif; font-size: 27px; color: var(--white); font-weight: 400; }
.dash-stat-sub { font-size: 23px; color: rgba(255,255,255,0.3); margin-top: 3px; }
.dash-stat.highlight .dash-stat-value { color: #5CC98A; }
.dash-props { display: flex; flex-direction: column; gap: 13px; }
.dash-prop {
  display: flex; align-items: center; justify-content: space-between;
  padding: 16px 14px; border-radius: 13px;
  background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.05);
}
.dp-left { display: flex; align-items: center; gap: 13px; }
.dp-flag { font-size: 21px; }
.dp-name { font-size: 19px; font-weight: 500; color: rgba(255,255,255,0.8); }
.dp-method { font-size: 23px; color: rgba(255,255,255,0.3); }
.dp-right { text-align: right; }
.dp-local { font-size: 19px; color: rgba(255,255,255,0.5); }
.dp-usd { font-size: 21px; font-weight: 500; color: var(--white); font-family: 'Fraunces', serif; }
.dp-fx { font-size: 23px; color: rgba(255,255,255,0.25); margin-top: 2px; }



/* ── REPATRIATION NOTE ── */
.repatriation { background: var(--cream-dark); }
.repa-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
.repa-content .section-label { color: var(--terra); }
.repa-callout {
  background: var(--white); border: 1px solid var(--cream-dark);
  border-radius: var(--radius-lg); padding: 48px;
  border-left: 4px solid var(--terra);
}
.repa-callout p { font-size: 21px; color: var(--text-mid); line-height: 1.7; font-weight: 300; margin-bottom: 26px; }
.repa-callout p:last-child { margin-bottom: 0; }
.repa-callout strong { color: var(--text-dark); font-weight: 600; }
.repa-items { display: flex; flex-direction: column; gap: 18px; margin-top: 36px; }
.repa-item { display: flex; gap: 18px; align-items: flex-start; }
.repa-icon { font-size: 23px; flex-shrink: 0; margin-top: 1px; }
.repa-item-text h4 { font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--text-dark); margin-bottom: 3px; }
.repa-item-text p { font-size: 23px; color: var(--text-mid); font-weight: 300; line-height: 1.5; }

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
.rm-compliance-item { font-size: 12px; color: rgba(255,255,255,0.24); display: flex; align-items: center; gap: 5px; }
.rm-footer-bottom { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 18px; }
.rm-footer-copy { font-size: 13px; color: rgba(255,255,255,0.22); }
.rm-footer-legal { display: flex; align-items: center; gap: 13px; }
.rm-footer-legal a { font-size: 13px; color: rgba(255,255,255,0.26); text-decoration: none; padding: 7px 12px; transition: color 0.2s; }
.rm-footer-legal a:hover { color: rgba(255,255,255,0.6); }
.rm-footer-legal-sep { color: rgba(255,255,255,0.1); font-size: 21px; }
.rm-region-select { padding: 7px 32px 7px 12px; border-radius: 13px; border: 1px solid rgba(255,255,255,0.1); background: transparent; color: rgba(255,255,255,0.42); font-family: 'Outfit', sans-serif; font-size: 13px; cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='rgba(255,255,255,0.28)' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 10px center; transition: all 0.2s; }
.rm-region-select:hover { border-color: rgba(255,255,255,0.2); color: rgba(255,255,255,0.7); }
.rm-region-select option { background: var(--navy-mid); color: var(--white); }

/* ── MOBILE ── */
@media (max-width: 1000px) { .rm-nav { padding: 0 20px; } .rm-nav-links, .rm-nav-cta { display: none; } .rm-hamburger { display: flex; } }
@media (max-width: 768px) {
  section { padding: 72px 20px; }
  .overview-grid { grid-template-columns: 1fr; }
  .step-block, .step-block.flip, .repa-grid { grid-template-columns: 1fr; direction: ltr; gap: 50px; }
  .step-block.flip { display: flex; flex-direction: column; }
  .rails-grid { grid-template-columns: 1fr 1fr; }
  .rm-footer-top { grid-template-columns: 1fr 1fr; }
  .rm-footer-brand { grid-column: 1 / -1; }
}
</style>
@endpush

@php
  $page = 'how-it-works';
  $hideFooter = false;
@endphp

@section('content')
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
// ── OVERVIEW ACTIVE STATE ON SCROLL ──
const sections = ['step-1','step-2','step-3'];
const cards    = document.querySelectorAll('.overview-card');
// ── SCROLL REVEAL ──
const observer = new IntersectionObserver(
  entries => entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } }),
  { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
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
