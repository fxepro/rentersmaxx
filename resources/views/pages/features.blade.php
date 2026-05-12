@extends('layouts.app')

@section('title', 'Features — Rentersmaxx')
@section('meta_description', 'Every capability for international landlords and their tenants. 12 landlord processes, 9 tenant features — built for properties in any country.')

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
.btn-lg { padding: 18px 32px; font-size: 19px; border-radius: 13px; }
.btn-outline-dark { background: transparent; color: var(--text-dark); border: 1px solid var(--cream-dark); display: inline-flex; align-items: center; gap: 13px; padding: 18px 32px; border-radius: 13px; font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 500; text-decoration: none; cursor: pointer; transition: all 0.2s; }
.btn-outline-dark:hover { background: var(--cream-dark); }

/* ── PAGE HERO ── */
.page-hero { background: var(--navy); padding: 160px 32px 80px; text-align: center; position: relative; overflow: hidden; }
.page-hero-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px); background-size: 60px 60px; pointer-events: none; }
.page-hero-glow { position: absolute; width: 600px; height: 600px; border-radius: 50%; background: radial-gradient(circle, rgba(196,98,45,0.12) 0%, transparent 70%); top: 50%; left: 50%; transform: translate(-50%, -60%); pointer-events: none; }
.page-hero-label { display: inline-flex; align-items: center; gap: 13px; background: rgba(196,98,45,0.12); border: 1px solid rgba(196,98,45,0.3); color: var(--terra-light); padding: 8px 18px; border-radius: 100px; font-size: 21px; font-weight: 500; margin-bottom: 36px; letter-spacing: 0.03em; }
.page-hero h1 { font-size: clamp(44px, 6vw, 76px); color: var(--white); letter-spacing: -0.03em; max-width: 800px; margin: 0 auto 22px; }
.page-hero h1 em { font-style: italic; color: var(--terra-light); }
.page-hero p { font-size: clamp(24px, 1.8vw, 20px); color: rgba(255,255,255,0.5); font-weight: 300; line-height: 1.65; max-width: 660px; margin: 0 auto 40px; }
.page-hero-ctas { display: flex; gap: 26px; justify-content: center; flex-wrap: wrap; }
.btn-outline-light { background: transparent; color: var(--white); border: 1px solid rgba(255,255,255,0.3); display: inline-flex; align-items: center; gap: 13px; padding: 18px 32px; border-radius: 13px; font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 500; text-decoration: none; cursor: pointer; transition: all 0.2s; }
.btn-outline-light:hover { background: rgba(255,255,255,0.08); }

/* ── FEATURE TOGGLE ── */
.feature-toggle { background: var(--white); padding: 42px 24px; border-bottom: 1px solid var(--cream-dark); position: sticky; top: 80px; z-index: 100; }
.toggle-inner { max-width: 1320px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 26px; }
.toggle-label { font-size: 21px; font-weight: 500; color: var(--text-dark); }
.toggle-tabs { display: flex; background: var(--cream-dark); border-radius: 13px; padding: 4px; gap: 13px; }
.toggle-tab { padding: 16px 24px; border-radius: 13px; font-family: 'Outfit', sans-serif; font-size: 23px; font-weight: 500; cursor: pointer; border: none; background: transparent; color: var(--text-mid); transition: all 0.2s; }
.toggle-tab.active { background: var(--white); color: var(--text-dark); box-shadow: 0 1px 4px rgba(0,0,0,0.08); }
.toggle-count { font-size: 19px; color: var(--text-light); }
.toggle-count span { font-weight: 600; color: var(--terra); }

/* ── LANDLORD SECTION ── */
.landlord-section { background: var(--cream); }

/* Full-width feature rows alternating */
.feat-row {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 0; margin-bottom: 2px; border-radius: 0; overflow: hidden;
  background: var(--cream-dark);
}
.feat-row:first-child { border-radius: var(--radius-lg) var(--radius-lg) 0 0; }
.feat-row:last-child { border-radius: 0 0 var(--radius-lg) var(--radius-lg); margin-bottom: 0; }
.feat-row.flip { direction: rtl; }
.feat-row.flip > * { direction: ltr; }

.feat-content { background: var(--white); padding: 52px 48px; display: flex; flex-direction: column; justify-content: center; }
.feat-visual-pane { background: var(--cream); padding: 40px; display: flex; align-items: center; justify-content: center; min-height: 340px; }
.feat-visual-pane.dark { background: var(--navy); }
.feat-visual-pane.gold { background: var(--gold-pale); }
.feat-visual-pane.green { background: var(--green-pale); }

.feat-eyebrow { display: flex; align-items: center; gap: 26px; margin-bottom: 26px; }
.feat-num { font-family: 'Fraunces', serif; font-size: 19px; font-weight: 500; color: var(--text-light); letter-spacing: 0.05em; }
.feat-tag { font-size: 23px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; padding: 6px 14px; border-radius: 100px; background: var(--terra-pale); color: var(--terra); }
.feat-tag.green { background: var(--green-pale); color: var(--green); }
.feat-tag.gold { background: var(--gold-pale); color: var(--gold); }
.feat-tag.navy { background: rgba(13,31,53,0.08); color: var(--navy); }

.feat-content h3 { font-size: clamp(30px, 2.5vw, 32px); color: var(--text-dark); margin-bottom: 22px; letter-spacing: -0.02em; }
.feat-content .lead { font-size: 19px; color: var(--text-mid); line-height: 1.7; font-weight: 300; margin-bottom: 30px; }
.feat-bullets { list-style: none; display: flex; flex-direction: column; gap: 13px; }
.feat-bullets li { display: flex; align-items: flex-start; gap: 13px; font-size: 23px; color: var(--text-mid); line-height: 1.5; }
.feat-bullets li::before { content: '→'; color: var(--terra); font-weight: 600; flex-shrink: 0; margin-top: 1px; }

/* ── MINI UI COMPONENTS ── */

/* Lease card */
.lease-card { background: var(--white); border-radius: var(--radius); padding: 42px; width: 100%; max-width: 340px; border: 1px solid var(--cream-dark); }
.lease-prop { display: flex; align-items: center; gap: 26px; margin-bottom: 22px; padding-bottom: 14px; border-bottom: 1px solid var(--cream-dark); }
.lease-flag { font-size: 27px; }
.lease-name { font-size: 23px; font-weight: 600; color: var(--text-dark); }
.lease-addr { font-size: 21px; color: var(--text-light); }
.lease-rows { display: flex; flex-direction: column; gap: 13px; }
.lease-row { display: flex; justify-content: space-between; align-items: center; }
.lease-row-label { font-size: 21px; color: var(--text-light); }
.lease-row-val { font-size: 23px; font-weight: 500; color: var(--text-dark); }
.lease-row-val.rent { font-family: 'Fraunces', serif; font-size: 21px; color: var(--terra); }
.lease-status { margin-top: 26px; padding: 8px 14px; border-radius: 13px; background: var(--green-pale); display: flex; align-items: center; gap: 13px; }
.lease-status-dot { width: 13px; height: 13px; border-radius: 50%; background: var(--green); }
.lease-status-text { font-size: 19px; font-weight: 500; color: var(--green); }

/* Arrears widget */
.arrears-widget { background: var(--navy); border-radius: var(--radius); padding: 42px; width: 100%; max-width: 340px; }
.arrears-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 26px; }
.arrears-title { font-size: 19px; font-weight: 500; color: rgba(255,255,255,0.7); }
.arrears-badge { font-size: 23px; padding: 6px 13px; border-radius: 100px; background: rgba(196,98,45,0.2); color: var(--terra-light); font-weight: 600; }
.arrears-item { display: flex; align-items: center; justify-content: space-between; padding: 16px 14px; border-radius: 13px; background: rgba(255,255,255,0.04); margin-bottom: 11px; border: 1px solid rgba(255,255,255,0.05); }
.arr-left { display: flex; align-items: center; gap: 13px; }
.arr-flag { font-size: 21px; }
.arr-name { font-size: 19px; font-weight: 500; color: rgba(255,255,255,0.8); }
.arr-days { font-size: 23px; color: var(--terra-light); margin-top: 2px; }
.arr-amount { font-family: 'Fraunces', serif; font-size: 19px; color: var(--white); }
.reminder-sent { margin-top: 12px; padding: 10px 12px; border-radius: 13px; background: rgba(196,98,45,0.12); border: 1px solid rgba(196,98,45,0.2); font-size: 21px; color: rgba(255,255,255,0.6); display: flex; align-items: center; gap: 13px; }

/* Maintenance widget */
.maint-widget { background: var(--white); border-radius: var(--radius); padding: 42px; width: 100%; max-width: 340px; border: 1px solid var(--cream-dark); }
.maint-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 26px; }
.maint-title { font-size: 19px; font-weight: 600; color: var(--text-dark); }
.maint-new { font-size: 23px; padding: 6px 13px; border-radius: 100px; background: var(--terra-pale); color: var(--terra); font-weight: 600; }
.maint-item { padding: 18px; border-radius: 13px; background: var(--cream); margin-bottom: 11px; border: 1px solid var(--cream-dark); }
.maint-item.open { border-color: rgba(196,98,45,0.3); background: var(--terra-pale); }
.maint-item-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 11px; }
.maint-item-title { font-size: 23px; font-weight: 600; color: var(--text-dark); }
.maint-item-cat { font-size: 23px; padding: 4px 11px; border-radius: 100px; background: var(--cream-dark); color: var(--text-mid); font-weight: 500; }
.maint-item.open .maint-item-cat { background: rgba(196,98,45,0.15); color: var(--terra); }
.maint-item-prop { font-size: 21px; color: var(--text-light); margin-bottom: 11px; }
.maint-item-status { font-size: 21px; font-weight: 500; }
.s-open { color: var(--terra); } .s-prog { color: var(--gold); } .s-done { color: var(--green); }

/* Dashboard widget */
.dash-widget { background: var(--navy); border-radius: var(--radius); padding: 42px; width: 100%; max-width: 360px; }
.dash-widget-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 26px; }
.dw-title { font-size: 19px; font-weight: 500; color: rgba(255,255,255,0.6); }
.dw-total { font-family: 'Fraunces', serif; font-size: 31px; color: var(--white); }
.dw-sub { font-size: 21px; color: rgba(255,255,255,0.3); margin-top: 2px; }
.dw-bars { margin: 16px 0; }
.dw-bar-row { display: flex; align-items: center; gap: 13px; margin-bottom: 13px; }
.dw-bar-flag { font-size: 19px; flex-shrink: 0; }
.dw-bar-track { flex: 1; height: 6px; background: rgba(255,255,255,0.08); border-radius: 3px; overflow: hidden; }
.dw-bar-fill { height: 100%; border-radius: 3px; }
.dw-bar-fill.fr { background: var(--terra); width: 64%; }
.dw-bar-fill.in { background: var(--gold); width: 36%; }
.dw-bar-fill.gb { background: rgba(255,255,255,0.3); width: 87%; }
.dw-bar-val { font-size: 21px; color: rgba(255,255,255,0.5); white-space: nowrap; }
.dw-export { margin-top: 26px; padding: 10px 14px; border-radius: 13px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: space-between; cursor: pointer; }
.dw-export-label { font-size: 19px; color: rgba(255,255,255,0.6); }
.dw-export-btn { font-size: 21px; color: var(--terra-light); font-weight: 500; }

/* Doc widget */
.doc-widget { background: var(--white); border-radius: var(--radius); padding: 42px; width: 100%; max-width: 340px; border: 1px solid var(--cream-dark); }
.doc-header { font-size: 19px; font-weight: 600; color: var(--text-dark); margin-bottom: 26px; }
.doc-item { display: flex; align-items: center; gap: 26px; padding: 16px; border-radius: 13px; background: var(--cream); margin-bottom: 11px; border: 1px solid var(--cream-dark); }
.doc-icon { font-size: 23px; flex-shrink: 0; }
.doc-name { font-size: 19px; font-weight: 500; color: var(--text-dark); }
.doc-meta { font-size: 23px; color: var(--text-light); margin-top: 2px; }
.doc-link { margin-left: auto; font-size: 21px; color: var(--terra); font-weight: 500; white-space: nowrap; text-decoration: none; }
.doc-secure { margin-top: 12px; padding: 8px 12px; border-radius: 13px; background: var(--green-pale); font-size: 21px; color: var(--green); display: flex; align-items: center; gap: 13px; }

/* Message widget */
.msg-widget { background: var(--navy); border-radius: var(--radius); padding: 42px; width: 100%; max-width: 340px; }
.msg-thread-title { font-size: 19px; font-weight: 500; color: rgba(255,255,255,0.5); margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(255,255,255,0.07); }
.msg-bubble { margin-bottom: 13px; }
.msg-bubble.from { display: flex; justify-content: flex-start; }
.msg-bubble.to { display: flex; justify-content: flex-end; }
.msg-text { max-width: 75%; padding: 10px 14px; border-radius: 16px; font-size: 19px; line-height: 1.5; }
.msg-bubble.from .msg-text { background: rgba(255,255,255,0.07); color: rgba(255,255,255,0.8); border-radius: 4px 12px 12px 12px; }
.msg-bubble.to .msg-text { background: var(--terra); color: var(--white); border-radius: 16px 4px 12px 12px; }
.msg-time { font-size: 19px; color: rgba(255,255,255,0.25); margin-top: 4px; padding: 0 4px; }
.msg-input-row { display: flex; gap: 13px; margin-top: 18px; padding-top: 12px; border-top: 1px solid rgba(255,255,255,0.07); }
.msg-input { flex: 1; background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.1); border-radius: 13px; padding: 8px 12px; font-size: 19px; color: rgba(255,255,255,0.5); font-family: 'Outfit', sans-serif; }
.msg-send { width: 42px; height: 42px; border-radius: 13px; background: var(--terra); border: none; color: white; font-size: 23px; cursor: pointer; display: flex; align-items: center; justify-content: center; }

/* ── TENANT SECTION ── */
.tenant-section { background: var(--navy); padding: 120px 32px; }
.tenant-section .section-label { color: var(--terra-light); }
.tenant-section .section-title { color: var(--white); }
.tenant-section .section-sub { color: rgba(255,255,255,0.45); }

.tenant-grid-full { display: grid; grid-template-columns: repeat(3, 1fr); gap: 3px; margin-top: 56px; border-radius: var(--radius-lg); overflow: hidden; background: rgba(255,255,255,0.05); }
.tenant-feat-card { background: var(--navy-mid); padding: 48px 30px; transition: background 0.2s; }
.tenant-feat-card:hover { background: var(--navy-light); }
.tenant-feat-icon { font-size: 31px; margin-bottom: 22px; }
.tenant-feat-card h3 { font-size: 19px; color: var(--white); margin-bottom: 26px; }
.tenant-feat-card p { font-size: 23px; color: rgba(255,255,255,0.45); line-height: 1.65; font-weight: 300; }
.tenant-feat-card .feat-detail { margin-top: 26px; display: flex; flex-direction: column; gap: 13px; }
.tenant-feat-card .feat-detail-item { display: flex; align-items: flex-start; gap: 13px; font-size: 19px; color: rgba(255,255,255,0.35); }
.tenant-feat-card .feat-detail-item::before { content: '–'; color: var(--terra-light); flex-shrink: 0; }

/* ── VERSION GRID ── */
.versions { background: var(--cream-dark); padding: 96px 32px; }
.version-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 40px; }
.version-card { background: var(--white); border: 1px solid var(--cream-dark); border-radius: var(--radius-lg); padding: 42px; }
.version-card h3 { font-size: 23px; color: var(--text-dark); margin-bottom: 11px; display: flex; align-items: center; gap: 26px; }
.version-pill { font-size: 23px; padding: 6px 14px; border-radius: 100px; font-weight: 600; letter-spacing: 0.04em; }
.pill-v1 { background: var(--green-pale); color: var(--green); }
.pill-v2 { background: var(--gold-pale); color: var(--gold); }
.version-card p { font-size: 23px; color: var(--text-mid); margin-bottom: 26px; font-weight: 300; line-height: 1.6; }
.version-list { list-style: none; display: flex; flex-direction: column; gap: 9px; }
.version-list li { display: flex; align-items: center; gap: 13px; font-size: 23px; color: var(--text-mid); }
.version-list li .vl-dot { width: 13px; height: 13px; border-radius: 50%; flex-shrink: 0; }
.v1-dot { background: var(--green); }
.v2-dot { background: var(--gold); }

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
  .feat-row, .feat-row.flip { grid-template-columns: 1fr; direction: ltr; }
  .feat-row.flip { display: flex; flex-direction: column-reverse; }
  .feat-visual-pane { min-height: 260px; }
  .tenant-grid-full { grid-template-columns: 1fr; }
  .version-grid { grid-template-columns: 1fr; }
  .rm-footer-top { grid-template-columns: 1fr 1fr; }
  .rm-footer-brand { grid-column: 1 / -1; }
  .toggle-inner { flex-direction: column; align-items: flex-start; }
}
</style>
@endpush

@php
  $page = 'features';
  $hideFooter = false;
@endphp

@section('content')
</div>

<!-- ══ PAGE HERO ══ -->
<div class="page-hero">
  <div class="page-hero-grid"></div>
  <div class="page-hero-glow"></div>
  <div class="page-hero-label">Platform features</div>
  <h1>Built for the landlord<br><em>nobody else serves.</em></h1>
  <p>12 landlord capabilities and 9 tenant features — all designed for properties in any country, collected in any currency, managed in one place.</p>
  <div class="page-hero-ctas">
    <a href="{{ url('/waitlist') }}" class="rm-btn rm-btn-primary btn-lg">Join the waitlist</a>
    <a href="{{ url('/pricing') }}" class="btn-outline-light">See pricing</a>
  </div>
</div>

<!-- ══ STICKY TOGGLE ══ -->
<div class="feature-toggle" id="featureToggle">
  <div class="toggle-inner">
    <span class="toggle-label">Viewing features for:</span>
    <div class="toggle-tabs">
      <button class="toggle-tab active" id="tabLandlord" onclick="switchView('landlord')">🏠 Landlord</button>
      <button class="toggle-tab" id="tabTenant" onclick="switchView('tenant')">👤 Tenant</button>
    </div>
    <span class="toggle-count"><span id="featCount">12</span> features in this view</span>
  </div>
</div>

<!-- ══ LANDLORD FEATURES ══ -->
<section class="landlord-section" id="landlordSection" id="collection">
  <div class="container">

    <div class="reveal" style="margin-bottom: 48px;">
      <p class="section-label">Landlord features</p>
      <h2 class="section-title">Everything from lease<br>to tax export.</h2>
      <p class="section-sub">The full lifecycle of an international tenancy — in one platform that knows which country each property is in.</p>
    </div>

    <!-- feat 1: Add property + lease -->
    <div class="feat-row reveal" id="collection">
      <div class="feat-content">
        <div class="feat-eyebrow"><span class="feat-num">01 — 02</span><span class="feat-tag">Setup</span></div>
        <h3>Add a property &amp; create a lease</h3>
        <p class="lead">Select the country, set rent in local currency, upload the signed lease, and send your tenant an invite — all from one flow. The right local payment method is connected automatically.</p>
        <ul class="feat-bullets">
          <li>Supported in 60+ countries — local payment connected automatically</li>
          <li>Address fields adapt to each country (PIN, postcode, ZIP etc.)</li>
          <li>Rent set in local currency — USD equivalent shown alongside</li>
          <li>Tenant invite email sent automatically on lease activation</li>
          <li>Security deposit amount logged — app never holds deposit funds</li>
        </ul>
      </div>
      <div class="feat-visual-pane">
        <div class="lease-card">
          <div class="lease-prop">
            <span class="lease-flag">🇮🇳</span>
            <div>
              <div class="lease-name">Bandra West, Mumbai</div>
              <div class="lease-addr">400050 · Maharashtra · India</div>
            </div>
          </div>
          <div class="lease-rows">
            <div class="lease-row"><span class="lease-row-label">Monthly rent</span><span class="lease-row-val rent">₹ 75,000</span></div>
            <div class="lease-row"><span class="lease-row-label">USD equivalent</span><span class="lease-row-val">~ $900</span></div>
            <div class="lease-row"><span class="lease-row-label">Payment rail</span><span class="lease-row-val">UPI / NACH</span></div>
            <div class="lease-row"><span class="lease-row-label">Due date</span><span class="lease-row-val">1st of month</span></div>
            <div class="lease-row"><span class="lease-row-label">Lease term</span><span class="lease-row-val">Jun 2025 – May 2026</span></div>
          </div>
          <div class="lease-status">
            <div class="lease-status-dot"></div>
            <span class="lease-status-text">Active — tenant mandate confirmed</span>
          </div>
        </div>
      </div>
    </div>

    <!-- feat 2: Rent collection -->
    <div class="feat-row flip reveal">
      <div class="feat-content">
        <div class="feat-eyebrow"><span class="feat-num">03</span><span class="feat-tag">Payments</span></div>
        <h3>Automated rent collection</h3>
        <p class="lead">Rent is pulled on the due date via the local payment rail. You're notified on success or failure. Every payment is logged with the FX rate at the exact moment of collection — permanently, for your tax records.</p>
        <ul class="feat-bullets">
          <li>UPI for India · SEPA for EU · BACS for UK · ACH for US</li>
          <li>Push notification and email on every payment event</li>
          <li>Automatic 3-day retry on failure · arrears flagged after second miss</li>
          <li>FX rate snapshot stored at each payment — never recalculated</li>
          <li>In-country balance visible per property at any time</li>
        </ul>
      </div>
      <div class="feat-visual-pane dark">
        <div class="dash-widget">
          <div class="dash-widget-header">
            <div><div class="dw-title">Monthly collections</div><div class="dw-sub">May 2025 · 3 properties</div></div>
            <div style="text-align:right"><div class="dw-total">$2,520</div><div class="dw-sub">USD equivalent</div></div>
          </div>
          <div class="dw-bars">
            <div class="dw-bar-row"><span class="dw-bar-flag">🇫🇷</span><div class="dw-bar-track"><div class="dw-bar-fill fr"></div></div><span class="dw-bar-val">€1,500 · $1,620</span></div>
            <div class="dw-bar-row"><span class="dw-bar-flag">🇮🇳</span><div class="dw-bar-track"><div class="dw-bar-fill in"></div></div><span class="dw-bar-val">₹75,000 · $900</span></div>
            <div class="dw-bar-row"><span class="dw-bar-flag">🇬🇧</span><div class="dw-bar-track"><div class="dw-bar-fill gb" style="width:0%;background:rgba(255,255,255,0.15)"></div></div><span class="dw-bar-val" style="color:var(--terra-light)">Due Jun 1</span></div>
          </div>
          <div class="dw-export">
            <span class="dw-export-label">📤 Export May report</span>
            <span class="dw-export-btn">CSV + PDF →</span>
          </div>
        </div>
      </div>
    </div>

    <!-- feat 3: Arrears -->
    <div class="feat-row reveal" id="dashboard">
      <div class="feat-content">
        <div class="feat-eyebrow"><span class="feat-num">04</span><span class="feat-tag navy">Arrears</span></div>
        <h3>Arrears management</h3>
        <p class="lead">When rent isn't paid, the app handles escalation automatically. Reminders go to the tenant on day 1, 5, and 10 — tone escalates from polite to formal. You log manual payments or mark disputes from your dashboard.</p>
        <ul class="feat-bullets">
          <li>Localised reminder emails in the tenant's own language</li>
          <li>Escalating cadence: polite reminder → firm notice → formal demand</li>
          <li>Log cash or external bank transfer payments manually</li>
          <li>Mark arrears as waived or disputed with a note</li>
          <li>Outstanding arrears shown prominently with days overdue</li>
        </ul>
      </div>
      <div class="feat-visual-pane dark">
        <div class="arrears-widget">
          <div class="arrears-header">
            <span class="arrears-title">Arrears tracker</span>
            <span class="arrears-badge">2 overdue</span>
          </div>
          <div class="arrears-item">
            <div class="arr-left"><span class="arr-flag">🇳🇬</span><div><div class="arr-name">Lagos, Nigeria</div><div class="arr-days">12 days overdue</div></div></div>
            <span class="arr-amount">₦ 850,000</span>
          </div>
          <div class="arrears-item">
            <div class="arr-left"><span class="arr-flag">🇧🇷</span><div><div class="arr-name">São Paulo, Brazil</div><div class="arr-days">4 days overdue</div></div></div>
            <span class="arr-amount">R$ 4,500</span>
          </div>
          <div class="reminder-sent">⚡ Formal reminder sent to Lagos tenant · Day 10 escalation</div>
        </div>
      </div>
    </div>

    <!-- feat 4: Maintenance -->
    <div class="feat-row flip reveal" id="maintenance">
      <div class="feat-content">
        <div class="feat-eyebrow"><span class="feat-num">05</span><span class="feat-tag green">Maintenance</span></div>
        <h3>Maintenance requests</h3>
        <p class="lead">Tenants raise issues with a description and photos from their phone. You receive a notification, respond, and close the request. Full maintenance history stored per property — invaluable for deposit disputes.</p>
        <ul class="feat-bullets">
          <li>Tenant selects category: plumbing, electrical, structural, appliance, other</li>
          <li>Photos attached from camera or gallery</li>
          <li>Status: submitted → acknowledged → in progress → resolved</li>
          <li>Landlord adds resolution notes and closes with optional invoice attachment</li>
          <li>All history retained — timestamped and searchable</li>
        </ul>
      </div>
      <div class="feat-visual-pane gold">
        <div class="maint-widget">
          <div class="maint-header">
            <span class="maint-title">Maintenance requests</span>
            <span class="maint-new">1 new</span>
          </div>
          <div class="maint-item open">
            <div class="maint-item-top"><span class="maint-item-title">Boiler not heating</span><span class="maint-item-cat">Heating</span></div>
            <div class="maint-item-prop">🇫🇷 Rue de Rivoli, Paris · Raised 2h ago</div>
            <div class="maint-item-status s-open">● New — awaiting acknowledgement</div>
          </div>
          <div class="maint-item">
            <div class="maint-item-top"><span class="maint-item-title">Kitchen tap dripping</span><span class="maint-item-cat">Plumbing</span></div>
            <div class="maint-item-prop">🇮🇳 Bandra West, Mumbai · 3 days ago</div>
            <div class="maint-item-status s-prog">● In progress</div>
          </div>
          <div class="maint-item">
            <div class="maint-item-top"><span class="maint-item-title">Light fitting replaced</span><span class="maint-item-cat">Electrical</span></div>
            <div class="maint-item-prop">🇬🇧 Shoreditch, London · 2 weeks ago</div>
            <div class="maint-item-status s-done">● Resolved</div>
          </div>
        </div>
      </div>
    </div>

    <!-- feat 5: Documents -->
    <div class="feat-row reveal" id="documents">
      <div class="feat-content">
        <div class="feat-eyebrow"><span class="feat-num">07</span><span class="feat-tag">Documents</span></div>
        <h3>Document management</h3>
        <p class="lead">Store leases, inspection reports, insurance certificates, and compliance documents per property. Share individual docs with tenants via secure time-limited links. Everything retained for 7 years.</p>
        <ul class="feat-bullets">
          <li>Documents organised by property and document type</li>
          <li>Secure signed download links — 15-minute expiry, no permanent public URLs</li>
          <li>Tenants can upload documents on request (ID, employer letters, references)</li>
          <li>7-year minimum retention — GDPR compliant · EU data stays in EU</li>
          <li>India data stored in India-region to comply with DPDP Act</li>
        </ul>
      </div>
      <div class="feat-visual-pane">
        <div class="doc-widget">
          <div class="doc-header">📁 Paris — Rue de Rivoli</div>
          <div class="doc-item"><span class="doc-icon">📄</span><div><div class="doc-name">Signed lease agreement</div><div class="doc-meta">PDF · 2.4 MB · Jun 2025</div></div><a href="#" class="doc-link">Share →</a></div>
          <div class="doc-item"><span class="doc-icon">🏠</span><div><div class="doc-name">Move-in inspection report</div><div class="doc-meta">PDF · 8.1 MB · Jun 2025</div></div><a href="#" class="doc-link">Share →</a></div>
          <div class="doc-item"><span class="doc-icon">🛡️</span><div><div class="doc-name">Building insurance certificate</div><div class="doc-meta">PDF · 1.2 MB · Jan 2025</div></div><a href="#" class="doc-link">Share →</a></div>
          <div class="doc-secure">🔒 Shared links expire after 15 minutes</div>
        </div>
      </div>
    </div>

    <!-- feat 6: Tax export -->
    <div class="feat-row flip reveal" id="tax">
      <div class="feat-content">
        <div class="feat-eyebrow"><span class="feat-num">08 — 09</span><span class="feat-tag gold">Tax &amp; reporting</span></div>
        <h3>Financial dashboard<br>&amp; tax-ready export</h3>
        <p class="lead">Unified view of all properties in all currencies, consolidated to USD. Every FX rate stored at payment time — permanently. At year end, export a clean income report per property for your CPA. Schedule E, FBAR, and foreign filings just got simpler.</p>
        <ul class="feat-bullets">
          <li>Annual income report per property — CSV and PDF</li>
          <li>FX rate logged at every individual transaction, never recalculated</li>
          <li>Repatriation log for FBAR and Schedule E tracking</li>
          <li>Income trend chart across all properties and currencies</li>
          <li>Structured for US CPA use — not a tax filing service</li>
        </ul>
      </div>
      <div class="feat-visual-pane dark">
        <div class="msg-widget" style="background:var(--navy-mid)">
          <div style="font-size:19px;font-weight:500;color:rgba(255,255,255,0.6);margin-bottom:14px;padding-bottom:12px;border-bottom:1px solid rgba(255,255,255,0.07);">📤 Tax export — FY 2025</div>
          <div style="display:flex;flex-direction:column;gap:10px;">
            <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 14px;border-radius:10px;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);">
              <div><div style="font-size:19px;font-weight:500;color:rgba(255,255,255,0.8);">🇫🇷 Paris — Rue de Rivoli</div><div style="font-size:23px;color:rgba(255,255,255,0.3);margin-top:2px;">12 payments · €18,000 total · $19,440 USD</div></div>
              <span style="font-size:21px;color:var(--terra-light);font-weight:500;">CSV + PDF</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 14px;border-radius:10px;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);">
              <div><div style="font-size:19px;font-weight:500;color:rgba(255,255,255,0.8);">🇮🇳 Mumbai — Bandra West</div><div style="font-size:23px;color:rgba(255,255,255,0.3);margin-top:2px;">12 payments · ₹9,00,000 · $10,800 USD</div></div>
              <span style="font-size:21px;color:var(--terra-light);font-weight:500;">CSV + PDF</span>
            </div>
            <div style="padding:10px 14px;border-radius:10px;background:rgba(42,107,74,0.15);border:1px solid rgba(42,107,74,0.25);font-size:21px;color:rgba(255,255,255,0.6);">✓ FX rate logged at every transaction · FBAR-ready repatriation log included</div>
          </div>
        </div>
      </div>
    </div>

    <!-- feat 7: Messaging -->
    <div class="feat-row reveal">
      <div class="feat-content">
        <div class="feat-eyebrow"><span class="feat-num">10 — 11</span><span class="feat-tag">Communication</span></div>
        <h3>Messaging &amp;<br>lease renewal</h3>
        <p class="lead">All landlord-tenant communication happens on-platform — timestamped, stored, and available for dispute resolution. No more WhatsApp threads. Lease renewal alerts at 90, 60, and 30 days before expiry.</p>
        <ul class="feat-bullets">
          <li>In-app message thread per property with full conversation history</li>
          <li>All messages timestamped and admissible as correspondence record</li>
          <li>Broadcast message to all tenants in a property for building notices</li>
          <li>Lease expiry alerts at 90, 60, and 30 days</li>
          <li>Renew with updated rent or close — tenant notified automatically</li>
        </ul>
      </div>
      <div class="feat-visual-pane dark">
        <div class="msg-widget">
          <div class="msg-thread-title">💬 Bandra West, Mumbai · Priya S.</div>
          <div class="msg-bubble from"><div><div class="msg-text">Hi, the water pressure in the bathroom seems low since yesterday. Is there something I can do?</div><div class="msg-time">Priya · 10:14am</div></div></div>
          <div class="msg-bubble to"><div><div class="msg-text">Thanks for flagging — I'll ask the building manager to check the pump. Should be sorted by end of day.</div><div class="msg-time">You · 10:31am</div></div></div>
          <div class="msg-bubble from"><div><div class="msg-text">Great, thank you! 🙏</div><div class="msg-time">Priya · 10:33am</div></div></div>
          <div class="msg-input-row"><input class="msg-input" placeholder="Type a message..." readonly><button class="msg-send">↑</button></div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ══ TENANT FEATURES ══ -->
<section class="tenant-section" id="tenantSection" style="display:block" id="tenant">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Tenant features</p>
      <h2 class="section-title" style="color:var(--white)">Simple, local,<br>and transparent.</h2>
      <p class="section-sub">Tenants get a fully localised experience — their language, their payment method, their currency. They only ever see their own lease.</p>
    </div>
    <div class="tenant-grid-full reveal" id="payments">
      <div class="tenant-feat-card">
        <div class="tenant-feat-icon">📧</div>
        <h3>Receive invite &amp; set up account</h3>
        <p>Invite email in their language. Account creation takes under 2 minutes. No ID verification required for tenants.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">Email invite from landlord with personalised link</div>
          <div class="feat-detail-item">Localised to tenant's country — language, currency, date format</div>
          <div class="feat-detail-item">Google or Apple sign-in supported</div>
        </div>
      </div>
      <div class="tenant-feat-card">
        <div class="tenant-feat-icon">📋</div>
        <h3>Review lease &amp; confirm</h3>
        <p>Tenant sees lease summary and downloads the full PDF. Can message landlord with questions before confirming.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">Rent amount, due date, and lease dates shown clearly</div>
          <div class="feat-detail-item">Download signed lease PDF at any time</div>
          <div class="feat-detail-item">Must confirm before payment setup unlocks</div>
        </div>
      </div>
      <div class="tenant-feat-card">
        <div class="tenant-feat-icon">💳</div>
        <h3>Set up local payment mandate</h3>
        <p>Connect their bank account or UPI ID once. Mandate authorises recurring monthly collection — no action needed each month.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">UPI in India · SEPA in EU · BACS in UK · ACH in US</div>
          <div class="feat-detail-item">Pre-collection notification 3 days before each payment</div>
          <div class="feat-detail-item">Mandate cancellation notifies landlord immediately</div>
        </div>
      </div>
      <div class="tenant-feat-card" id="receipts">
        <div class="tenant-feat-icon">🧾</div>
        <h3>Payment history &amp; receipts</h3>
        <p>Full record of every payment with downloadable PDF receipts. Useful for expense claims and rental references.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">Date, amount, status, and payment method per transaction</div>
          <div class="feat-detail-item">PDF receipt downloadable for each payment</div>
          <div class="feat-detail-item">12-month read-only access after lease ends</div>
        </div>
      </div>
      <div class="tenant-feat-card">
        <div class="tenant-feat-icon">🔧</div>
        <h3>Raise maintenance requests</h3>
        <p>Report issues with photos and description. Track status from submitted to resolved — all in one thread.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">Category selection: plumbing, electrical, structural, appliance</div>
          <div class="feat-detail-item">Photo attachments from camera or gallery</div>
          <div class="feat-detail-item">Status updates and notifications at each stage</div>
        </div>
      </div>
      <div class="tenant-feat-card">
        <div class="tenant-feat-icon">💬</div>
        <h3>Message landlord in-app</h3>
        <p>All communication on-platform — no WhatsApp, no personal email needed. Every message timestamped and stored.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">Full message history per property</div>
          <div class="feat-detail-item">Attach photos or documents to messages</div>
          <div class="feat-detail-item">Landlord read receipts — know when message was seen</div>
        </div>
      </div>
      <div class="tenant-feat-card">
        <div class="tenant-feat-icon">📁</div>
        <h3>Access documents anytime</h3>
        <p>Lease, receipts, building notices, and landlord-shared documents — always available in one place.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">Lease PDF downloadable at any time</div>
          <div class="feat-detail-item">Landlord-shared docs: inspection reports, building rules</div>
          <div class="feat-detail-item">Upload requested documents (renewal ID, employer letter)</div>
        </div>
      </div>
      <div class="tenant-feat-card">
        <div class="tenant-feat-icon">⚙️</div>
        <h3>Manage payment method</h3>
        <p>Update bank account or UPI ID, pause autopay, or manage mandate — with landlord notified of any changes.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">Update bank account before next due date</div>
          <div class="feat-detail-item">Pause autopay with 7-day notice to landlord</div>
          <div class="feat-detail-item">One-off manual payment to clear arrears</div>
        </div>
      </div>
      <div class="tenant-feat-card">
        <div class="tenant-feat-icon">🏁</div>
        <h3>End of tenancy</h3>
        <p>Confirm renewal or flag intention to vacate. Final payment reconciliation shown. Read-only access to history for 12 months after lease ends.</p>
        <div class="feat-detail">
          <div class="feat-detail-item">Notifications at 60 and 30 days before lease end</div>
          <div class="feat-detail-item">Accept renewal terms or confirm vacating intention</div>
          <div class="feat-detail-item">Download full payment history as rental reference PDF</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ V1 / V2 GRID ══ -->
<section class="versions">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Roadmap</p>
      <h2 class="section-title">What's in V1.<br>What's coming next.</h2>
    </div>
    <div class="version-grid reveal">
      <div class="version-card">
        <h3>Launching at launch <span class="version-pill pill-v1">V1</span></h3>
        <p>Everything needed to onboard your first tenant, collect rent, manage maintenance, and export for tax.</p>
        <ul class="version-list">
          <li><span class="vl-dot v1-dot"></span>Add properties in 60+ countries</li>
          <li><span class="vl-dot v1-dot"></span>Full lease lifecycle — create, activate, renew, close</li>
          <li><span class="vl-dot v1-dot"></span>Automated rent collection via local rails</li>
          <li><span class="vl-dot v1-dot"></span>Arrears management with escalating reminders</li>
          <li><span class="vl-dot v1-dot"></span>Maintenance requests with photo evidence</li>
          <li><span class="vl-dot v1-dot"></span>Document storage with 7-year retention</li>
          <li><span class="vl-dot v1-dot"></span>Unified multi-currency financial dashboard</li>
          <li><span class="vl-dot v1-dot"></span>Annual tax export (CSV + PDF) per property</li>
          <li><span class="vl-dot v1-dot"></span>In-app landlord-tenant messaging</li>
          <li><span class="vl-dot v1-dot"></span>All 9 tenant features</li>
        </ul>
      </div>
      <div class="version-card">
        <h3>Coming post-launch <span class="version-pill pill-v2">V2</span></h3>
        <p>Features planned within 6 months of launch, informed by early user feedback.</p>
        <ul class="version-list">
          <li><span class="vl-dot v2-dot"></span>Portfolio analytics — occupancy, income trends</li>
          <li><span class="vl-dot v2-dot"></span>Contractor management and invoice tracking</li>
          <li><span class="vl-dot v2-dot"></span>Inspection report templates with photo evidence</li>
          <li><span class="vl-dot v2-dot"></span>Deposit tracking and end-of-tenancy decisions</li>
          <li><span class="vl-dot v2-dot"></span>Agency sub-accounts — manage on behalf of owners</li>
          <li><span class="vl-dot v2-dot"></span>Rent split for flatmates / co-tenants</li>
          <li><span class="vl-dot v2-dot"></span>Utility bill tracking separate from rent</li>
          <li><span class="vl-dot v2-dot"></span>Portable renter profile — rental reference for next landlord</li>
          <li><span class="vl-dot v2-dot"></span>Middle East and Eastern Europe payment rail support</li>
          <li><span class="vl-dot v2-dot"></span>Mobile apps (iOS and Android)</li>
        </ul>
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

// ── LANDLORD / TENANT TOGGLE ──
function switchView(view) {
  const landlord = document.getElementById('landlordSection');
  const tenant   = document.getElementById('tenantSection');
  const tabL     = document.getElementById('tabLandlord');
  const tabT     = document.getElementById('tabTenant');
  const count    = document.getElementById('featCount');

  if (view === 'landlord') {
    landlord.style.display = 'block';
    tenant.style.display   = 'block';
    tabL.classList.add('active');
    tabT.classList.remove('active');
    count.textContent = '12';
    landlord.scrollIntoView({ behavior: 'smooth', block: 'start' });
  } else {
    landlord.style.display = 'none';
    tenant.style.display   = 'block';
    tabL.classList.remove('active');
    tabT.classList.add('active');
    count.textContent = '9';
    tenant.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
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
// ── LANDLORD / TENANT TOGGLE ──
function switchView(view) {
  const landlord = document.getElementById('landlordSection');
  const tenant   = document.getElementById('tenantSection');
  const tabL     = document.getElementById('tabLandlord');
  const tabT     = document.getElementById('tabTenant');
  const count    = document.getElementById('featCount');

  if (view === 'landlord') {
    landlord.style.display = 'block';
    tenant.style.display   = 'block';
    tabL.classList.add('active');
    tabT.classList.remove('active');
    count.textContent = '12';
    landlord.scrollIntoView({ behavior: 'smooth', block: 'start' });
  } else {
    landlord.style.display = 'none';
    tenant.style.display   = 'block';
    tabL.classList.remove('active');
    tabT.classList.add('active');
    count.textContent = '9';
    tenant.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
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
