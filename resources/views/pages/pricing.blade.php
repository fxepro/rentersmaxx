<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pricing — Rentersmaxx</title>
<meta name="description" content="Simple, transparent pricing for international landlords. First month free. $9 per unit per month after that. No setup fees, no contracts.">
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
.section-sub { font-size: 21px; color: var(--text-mid); font-weight: 300; line-height: 1.65; max-width: 680px; }
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: none; }

/* ── PAGE HERO ── */
.page-hero { background: var(--navy); padding: 160px 32px 80px; text-align: center; position: relative; overflow: hidden; }
.page-hero-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px); background-size: 60px 60px; pointer-events: none; }
.page-hero-glow { position: absolute; width: 600px; height: 600px; border-radius: 50%; background: radial-gradient(circle, rgba(196,98,45,0.12) 0%, transparent 70%); top: 50%; left: 50%; transform: translate(-50%, -60%); pointer-events: none; }
.page-hero-label { display: inline-flex; align-items: center; gap: 13px; background: rgba(196,98,45,0.12); border: 1px solid rgba(196,98,45,0.3); color: var(--terra-light); padding: 8px 18px; border-radius: 100px; font-size: 21px; font-weight: 500; margin-bottom: 36px; letter-spacing: 0.03em; }
.page-hero h1 { font-size: clamp(44px, 6vw, 76px); color: var(--white); letter-spacing: -0.03em; max-width: 720px; margin: 0 auto 22px; }
.page-hero h1 em { font-style: italic; color: var(--terra-light); }
.page-hero p { font-size: clamp(24px, 1.8vw, 20px); color: rgba(255,255,255,0.5); font-weight: 300; line-height: 1.65; max-width: 620px; margin: 0 auto; }

/* ── PRICING CARDS ── */
.pricing-section { background: var(--cream); padding: 96px 32px; }

.pricing-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 26px;
  margin-top: 56px;
}

.price-card {
  background: var(--white);
  border: 1px solid var(--cream-dark);
  border-radius: var(--radius-lg);
  padding: 52px 44px;
  display: flex;
  flex-direction: column;
  position: relative;
  overflow: hidden;
  transition: transform 0.2s, box-shadow 0.2s;
}
.price-card:hover { transform: translateY(-3px); box-shadow: 0 12px 40px rgba(0,0,0,0.08); }

.price-card.featured {
  background: var(--navy);
  border-color: var(--navy);
  transform: translateY(-8px);
  box-shadow: 0 20px 60px rgba(13,31,53,0.25);
}
.price-card.featured:hover { transform: translateY(-11px); }

.price-popular {
  position: absolute; top: 0; left: 0; right: 0;
  background: var(--terra); text-align: center;
  font-size: 23px; font-weight: 600; letter-spacing: 0.1em;
  text-transform: uppercase; color: var(--white); padding: 7px;
}

.price-tier {
  font-size: 23px; font-weight: 600; letter-spacing: 0.12em;
  text-transform: uppercase; color: var(--text-light); margin-bottom: 30px;
}
.price-card.featured .price-tier { color: rgba(255,255,255,0.45); margin-top: 30px; }

.price-amount { margin-bottom: 11px; }
.price-amount .currency { font-size: 27px; color: var(--text-mid); vertical-align: top; margin-top: 10px; display: inline-block; }
.price-amount .number { font-family: 'Fraunces', serif; font-size: 72px; font-weight: 500; color: var(--text-dark); line-height: 1; letter-spacing: -0.03em; }
.price-card.featured .price-amount .number { color: var(--white); }
.price-card.featured .price-amount .currency { color: rgba(255,255,255,0.5); }
.price-amount .period { font-size: 21px; color: var(--text-light); margin-left: 4px; }
.price-card.featured .price-amount .period { color: rgba(255,255,255,0.35); }

.price-desc { font-size: 21px; color: var(--text-mid); line-height: 1.6; font-weight: 300; margin-bottom: 40px; padding-bottom: 32px; border-bottom: 1px solid var(--cream-dark); }
.price-card.featured .price-desc { color: rgba(255,255,255,0.5); border-color: rgba(255,255,255,0.08); }

.price-features { list-style: none; display: flex; flex-direction: column; gap: 13px; flex: 1; margin-bottom: 36px; }
.price-features li { display: flex; align-items: flex-start; gap: 13px; font-size: 23px; color: var(--text-mid); line-height: 1.45; }
.price-card.featured .price-features li { color: rgba(255,255,255,0.65); }
.pf-check { flex-shrink: 0; width: 23px; height: 23px; border-radius: 50%; background: var(--green-pale); display: flex; align-items: center; justify-content: center; font-size: 19px; color: var(--green); margin-top: 1px; }
.price-card.featured .pf-check { background: rgba(196,98,45,0.2); color: var(--terra-light); }
.pf-dash { flex-shrink: 0; width: 23px; height: 23px; border-radius: 50%; background: var(--cream-dark); display: flex; align-items: center; justify-content: center; font-size: 21px; color: var(--text-light); margin-top: 1px; }

.price-cta {
  display: block; width: 100%; padding: 18px; border-radius: 13px;
  text-align: center; font-family: 'Outfit', sans-serif; font-size: 21px;
  font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none;
}
.price-cta-outline { background: transparent; color: var(--text-dark); border: 1px solid var(--cream-dark); }
.price-cta-outline:hover { background: var(--cream); }
.price-cta-primary { background: var(--terra); color: var(--white); }
.price-cta-primary:hover { background: var(--terra-light); }
.price-cta-ghost { background: rgba(255,255,255,0.08); color: var(--white); border: 1px solid rgba(255,255,255,0.15); }
.price-cta-ghost:hover { background: rgba(255,255,255,0.14); }

/* ── CALCULATOR ── */
.calculator { background: var(--navy); padding: 120px 32px; }
.calculator .section-label { color: var(--terra-light); }
.calculator .section-title { color: var(--white); }
.calculator .section-sub { color: rgba(255,255,255,0.45); }

.calc-inner {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 80px; margin-top: 56px; align-items: start;
}

.calc-controls { display: flex; flex-direction: column; gap: 50px; }

.calc-group {}
.calc-group label {
  display: flex; justify-content: space-between; align-items: center;
  font-size: 23px; color: rgba(255,255,255,0.6); margin-bottom: 22px;
}
.calc-group label span { font-family: 'Fraunces', serif; font-size: 25px; color: var(--white); font-weight: 400; }

input[type=range] {
  width: 100%; height: 5px; border-radius: 2px;
  background: rgba(255,255,255,0.12); outline: none;
  -webkit-appearance: none; cursor: pointer;
}
input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none; width: 20px; height: 20px; border-radius: 50%;
  background: var(--terra); cursor: pointer; border: 3px solid var(--navy-mid);
  box-shadow: 0 0 0 2px var(--terra);
}
input[type=range]::-moz-range-thumb {
  width: 20px; height: 20px; border-radius: 50%;
  background: var(--terra); cursor: pointer; border: 3px solid var(--navy-mid);
}

.calc-slider-labels { display: flex; justify-content: space-between; margin-top: 8px; font-size: 23px; color: rgba(255,255,255,0.25); }

.calc-result {
  background: var(--navy-mid); border-radius: var(--radius-lg);
  padding: 40px; border: 1px solid rgba(255,255,255,0.06);
  position: sticky; top: 100px;
}

.calc-result-label { font-size: 21px; color: rgba(255,255,255,0.35); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 11px; }
.calc-result-value { font-family: 'Fraunces', serif; font-size: 56px; font-weight: 400; color: var(--white); letter-spacing: -0.02em; line-height: 1; margin-bottom: 4px; }
.calc-result-period { font-size: 21px; color: rgba(255,255,255,0.35); margin-bottom: 40px; }

.calc-breakdown { display: flex; flex-direction: column; gap: 18px; margin-bottom: 40px; padding-bottom: 28px; border-bottom: 1px solid rgba(255,255,255,0.07); }
.calc-row { display: flex; justify-content: space-between; align-items: center; }
.calc-row-label { font-size: 23px; color: rgba(255,255,255,0.45); }
.calc-row-val { font-size: 23px; font-weight: 500; color: rgba(255,255,255,0.7); }
.calc-row-val.free { color: var(--green); }
.calc-row-val.highlight { color: var(--terra-light); font-family: 'Fraunces', serif; font-size: 23px; }

.calc-note { font-size: 19px; color: rgba(255,255,255,0.3); line-height: 1.6; margin-bottom: 30px; }

.calc-cta { display: block; width: 100%; padding: 18px; border-radius: 13px; background: var(--terra); color: var(--white); font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; text-decoration: none; text-align: center; cursor: pointer; border: none; transition: all 0.2s; }
.calc-cta:hover { background: var(--terra-light); transform: translateY(-1px); }

/* ── FEES TABLE ── */
.fees { background: var(--cream); padding: 120px 32px; }

.fees-intro { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; margin-bottom: 56px; }

.fees-table-wrap { border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--cream-dark); }
.fees-table { width: 100%; border-collapse: collapse; font-size: 23px; }
.fees-table th { background: var(--navy); color: rgba(255,255,255,0.7); font-size: 23px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; padding: 18px 20px; text-align: left; }
.fees-table td { padding: 18px 20px; border-bottom: 1px solid var(--cream-dark); color: var(--text-mid); vertical-align: middle; }
.fees-table tr:last-child td { border-bottom: none; }
.fees-table tr:nth-child(even) td { background: var(--cream); }
.fees-table td:last-child { text-align: right; font-weight: 500; color: var(--text-dark); }
.fees-flag { font-size: 21px; margin-right: 8px; }
.fees-note { font-size: 19px; color: var(--text-light); margin-top: 12px; line-height: 1.6; }

.fee-highlight { background: var(--green-pale) !important; }
.fee-highlight td { color: var(--green) !important; }
.fee-highlight td:last-child { color: var(--green) !important; }

/* ── COMPARISON TABLE ── */
.comparison { background: var(--cream-dark); padding: 120px 32px; }

.comp-table-wrap { border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--cream-dark); margin-top: 56px; }
.comp-table { width: 100%; border-collapse: collapse; font-size: 23px; }
.comp-table th { padding: 26px; text-align: center; font-size: 23px; font-weight: 600; border-bottom: 2px solid var(--cream-dark); background: var(--white); }
.comp-table th:first-child { text-align: left; color: var(--text-light); font-size: 21px; letter-spacing: 0.06em; text-transform: uppercase; }
.comp-table th.ours { background: var(--navy); color: var(--white); }
.comp-table td { padding: 18px 20px; border-bottom: 1px solid var(--cream-dark); background: var(--white); text-align: center; color: var(--text-mid); }
.comp-table td:first-child { text-align: left; font-weight: 500; color: var(--text-dark); background: var(--cream); }
.comp-table td.ours { background: rgba(13,31,53,0.04); }
.comp-table tr:last-child td { border-bottom: none; }
.comp-check { color: var(--green); font-size: 19px; }
.comp-cross { color: var(--text-light); font-size: 19px; }
.comp-partial { font-size: 21px; color: var(--gold); font-weight: 500; }

/* ── FAQ ── */
.faq { background: var(--white); padding: 120px 32px; }
.faq-list { display: flex; flex-direction: column; gap: 3px; margin-top: 56px; border-radius: var(--radius-lg); overflow: hidden; }
.faq-item { background: var(--cream); }
.faq-q { width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 22px 28px; background: none; border: none; cursor: pointer; text-align: left; font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 500; color: var(--text-dark); gap: 26px; transition: background 0.2s; }
.faq-q:hover { background: var(--cream-dark); }
.faq-arrow { flex-shrink: 0; color: var(--terra); font-size: 23px; transition: transform 0.3s; line-height: 1; }
.faq-item.open .faq-arrow { transform: rotate(45deg); }
.faq-a { max-height: 0; overflow: hidden; transition: max-height 0.35s ease, padding 0.35s ease; font-size: 21px; color: var(--text-mid); line-height: 1.7; font-weight: 300; padding: 0 28px; }
.faq-item.open .faq-a { max-height: 400px; padding: 0 28px 22px; }

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
  .pricing-grid { grid-template-columns: 1fr; }
  .price-card.featured { transform: none; }
  .calc-inner { grid-template-columns: 1fr; }
  .fees-intro { grid-template-columns: 1fr; gap: 50px; }
  .comp-table { font-size: 21px; }
  .comp-table th, .comp-table td { padding: 10px 12px; }
  .rm-footer-top { grid-template-columns: 1fr 1fr; }
  .rm-footer-brand { grid-column: 1 / -1; }
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- ══ NAV ══ -->
@include('partials.nav', ['page' => 'pricing'])

<!-- ══ PAGE HERO ══ -->
<div class="page-hero">
  <div class="page-hero-grid"></div>
  <div class="page-hero-glow"></div>
  <div class="page-hero-label">Pricing</div>
  <h1>Start free.<br><em>Scale simply.</em></h1>
  <p>First property free for one month. Pay per unit from the second. No setup fees, no contracts, no surprises.</p>
</div>

<!-- ══ PRICING CARDS ══ -->
<section class="pricing-section">
  <div class="container">
    <div class="pricing-grid reveal">

      <!-- Starter -->
      <div class="price-card">
        <p class="price-tier">Starter</p>
        <div class="price-amount">
          <span class="currency">$</span><span class="number">0</span>
          <span class="period">/ month</span>
        </div>
        <p class="price-desc">For landlords starting out. Every feature included. First month free, no card required.</p>
        <ul class="price-features">
          <li><span class="pf-check">✓</span>1 property in any supported country</li>
          <li><span class="pf-check">✓</span>Automated rent collection</li>
          <li><span class="pf-check">✓</span>Tenant invite &amp; mandate setup</li>
          <li><span class="pf-check">✓</span>Maintenance requests</li>
          <li><span class="pf-check">✓</span>Document storage</li>
          <li><span class="pf-check">✓</span>In-app messaging</li>
          <li><span class="pf-check">✓</span>Annual tax export</li>
          <li><span class="pf-dash">–</span>Multi-property dashboard</li>
          <li><span class="pf-dash">–</span>Portfolio analytics</li>
          <li><span class="pf-dash">–</span>Priority support</li>
        </ul>
        <a href="{{ url('/waitlist') }}" class="price-cta price-cta-outline">Start free — first month on us</a>
      </div>

      <!-- Per unit — featured -->
      <div class="price-card featured">
        <div class="price-popular">Most popular</div>
        <p class="price-tier">Per unit</p>
        <div class="price-amount">
          <span class="currency">$</span><span class="number">9</span>
          <span class="period">/ unit / mo</span>
        </div>
        <p class="price-desc">For landlords with properties across multiple countries. First month free, then $9 per unit per month across your whole portfolio.</p>
        <ul class="price-features">
          <li><span class="pf-check">✓</span>Unlimited properties</li>
          <li><span class="pf-check">✓</span>All 60+ supported countries</li>
          <li><span class="pf-check">✓</span>Automated rent collection</li>
          <li><span class="pf-check">✓</span>Multi-currency financial dashboard</li>
          <li><span class="pf-check">✓</span>FX rate history &amp; repatriation log</li>
          <li><span class="pf-check">✓</span>Portfolio analytics</li>
          <li><span class="pf-check">✓</span>Full document management</li>
          <li><span class="pf-check">✓</span>Annual tax export per property</li>
          <li><span class="pf-check">✓</span>Priority email support</li>
          <li><span class="pf-check">✓</span>First month free — no card needed</li>
        </ul>
        <a href="{{ url('/waitlist') }}" class="price-cta price-cta-primary">Start free trial</a>
      </div>

      <!-- Agency -->
      <div class="price-card">
        <p class="price-tier">Agency</p>
        <div class="price-amount" style="padding: 16px 0 6px;">
          <span class="number" style="font-size:48px; line-height:1.15;">Talk<br>to us</span>
        </div>
        <p class="price-desc">For property managers and agencies handling portfolios on behalf of multiple owners.</p>
        <ul class="price-features">
          <li><span class="pf-check">✓</span>Everything in Per unit</li>
          <li><span class="pf-check">✓</span>Sub-accounts per owner</li>
          <li><span class="pf-check">✓</span>Bulk lease import &amp; management</li>
          <li><span class="pf-check">✓</span>White-label option</li>
          <li><span class="pf-check">✓</span>Dedicated account manager</li>
          <li><span class="pf-check">✓</span>Custom onboarding &amp; training</li>
          <li><span class="pf-check">✓</span>SLA uptime guarantee</li>
          <li><span class="pf-check">✓</span>Volume pricing</li>
          <li><span class="pf-check">✓</span>API access</li>
          <li><span class="pf-check">✓</span>Custom contract</li>
        </ul>
        <a href="{{ url('/contact') }}" class="price-cta price-cta-outline">Contact sales</a>
      </div>

    </div>

    <p style="text-align:center; margin-top:24px; font-size:19px; color:var(--text-light);">
      Local payment fees are passed through at cost and shown before every collection. We add no markup.
    </p>
  </div>
</section>

<!-- ══ CALCULATOR ══ -->
<section class="calculator">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Estimate your cost</p>
      <h2 class="section-title" style="color:var(--white)">What will you pay?</h2>
      <p class="section-sub">Drag the sliders to calculate your monthly cost based on your portfolio size.</p>
    </div>
    <div class="calc-inner reveal">
      <div class="calc-controls">

        <div class="calc-group">
          <label>Number of properties <span id="propCount">3</span></label>
          <input type="range" min="1" max="20" step="1" value="3" id="propSlider">
          <div class="calc-slider-labels"><span>1 property</span><span>20 properties</span></div>
        </div>

        <div class="calc-group">
          <label>Average rent per property (USD) <span id="rentVal">$1,200</span></label>
          <input type="range" min="200" max="5000" step="100" value="1200" id="rentSlider">
          <div class="calc-slider-labels"><span>$200</span><span>$5,000</span></div>
        </div>

        <div style="padding: 42px; background: rgba(255,255,255,0.04); border-radius: var(--radius); border: 1px solid rgba(255,255,255,0.07);">
          <p style="font-size:19px; color:rgba(255,255,255,0.45); line-height:1.7; margin-bottom:16px;">
            <strong style="color:rgba(255,255,255,0.7);">How billing works:</strong><br>
            Your first property is free for one month. After that, all properties are billed at $9 per unit per month. No setup fees, no minimum terms, no contracts. Cancel anytime.
          </p>
          <div style="display:flex; flex-direction:column; gap:10px;">
            <div style="display:flex; align-items:center; gap:10px; font-size:19px; color:rgba(255,255,255,0.45);">
              <span style="width:6px;height:6px;border-radius:50%;background:var(--green);flex-shrink:0;"></span>First property — free for 1 month
            </div>
            <div style="display:flex; align-items:center; gap:10px; font-size:19px; color:rgba(255,255,255,0.45);">
              <span style="width:6px;height:6px;border-radius:50%;background:var(--terra-light);flex-shrink:0;"></span>Properties 2+ — $9 per unit per month
            </div>
            <div style="display:flex; align-items:center; gap:10px; font-size:19px; color:rgba(255,255,255,0.45);">
              <span style="width:6px;height:6px;border-radius:50%;background:rgba(255,255,255,0.3);flex-shrink:0;"></span>Local payment fees — passed through at cost, no markup
            </div>
          </div>
        </div>

      </div>

      <div class="calc-result">
        <div class="calc-result-label">Your estimated monthly platform cost</div>
        <div class="calc-result-value" id="calcMonthly">$18</div>
        <div class="calc-result-period" id="calcPeriodLabel">per month · 3 properties</div>

        <div class="calc-breakdown">
          <div class="calc-row">
            <span class="calc-row-label">Property 1 (free)</span>
            <span class="calc-row-val free">$0</span>
          </div>
          <div class="calc-row">
            <span class="calc-row-label" id="calcPaidLabel">Properties 2–3 (2 units)</span>
            <span class="calc-row-val" id="calcPaidVal">$18 / mo</span>
          </div>
          <div class="calc-row">
            <span class="calc-row-label">Annual platform cost</span>
            <span class="calc-row-val highlight" id="calcAnnual">$216 / yr</span>
          </div>
        </div>

        <div class="calc-breakdown" style="border-top: 1px solid rgba(255,255,255,0.07); padding-top:20px; border-bottom:none; padding-bottom:0; margin-bottom:16px;">
          <div class="calc-row">
            <span class="calc-row-label">Gross rent collected</span>
            <span class="calc-row-val" id="calcRent">$3,600 / mo</span>
          </div>
          <div class="calc-row">
            <span class="calc-row-label">Platform cost as % of rent</span>
            <span class="calc-row-val" id="calcPct">0.5%</span>
          </div>
        </div>

        <p class="calc-note">Local payment fees (typically 0.36–2.5% per transaction) are separate and depend on your country and payment method. These are always shown before each collection.</p>

        <a href="{{ url('/waitlist') }}" class="calc-cta">Get started free →</a>
      </div>
    </div>
  </div>
</section>

<!-- ══ PROCESSOR FEES ══ -->
<section class="fees">
  <div class="container">
    <div class="fees-intro reveal">
      <div>
        <p class="section-label">Payment fees</p>
        <h2 class="section-title">No markup.<br>Ever.</h2>
        <p class="section-sub">Local payment fees vary by country and payment method — we pass them through at exact cost. You always see the fee before a collection happens.</p>
      </div>
      <div>
        <div style="background: var(--green-pale); border-radius: var(--radius); padding: 48px; border: 1px solid rgba(42,107,74,0.2);">
          <p style="font-size:21px; color:var(--green); font-weight:600; margin-bottom:10px;">✓ Full transparency, every time</p>
          <p style="font-size:23px; color:var(--text-mid); line-height:1.7; font-weight:300;">Before every rent collection, Rentersmaxx shows you the exact processor fee that will be deducted. No surprises on your statement. No rounding up. No "service fee" on top.</p>
        </div>
      </div>
    </div>

    <div class="fees-table-wrap reveal">
      <table class="fees-table">
        <thead>
          <tr>
            <th>Region &amp; payment method</th>
            <th>Payment method</th>
            <th>Typical fee</th>
            <th>On $1,000 rent</th>
          </tr>
        </thead>
        <tbody>
          <tr class="fee-highlight">
            <td><span class="fees-flag">🇺🇸🇨🇦</span>North America</td>
            <td>ACH / EFT direct debit</td>
            <td>0.8% (cap $5)</td>
            <td>$5.00</td>
          </tr>
          <tr>
            <td><span class="fees-flag">🇫🇷🇩🇪🇮🇹</span>Western Europe</td>
            <td>SEPA direct debit</td>
            <td>0.36% (cap €2)</td>
            <td>~$2.20</td>
          </tr>
          <tr>
            <td><span class="fees-flag">🇬🇧</span>United Kingdom</td>
            <td>BACS direct debit</td>
            <td>1.0% (cap £4)</td>
            <td>~$5.00</td>
          </tr>
          <tr>
            <td><span class="fees-flag">🇦🇺</span>Australia</td>
            <td>BECS direct debit</td>
            <td>1.0% (cap A$3.50)</td>
            <td>~$2.50</td>
          </tr>
          <tr>
            <td><span class="fees-flag">🇮🇳</span>India</td>
            <td>UPI / NACH / NEFT</td>
            <td>2.0% (UPI capped ₹0 govt deals)</td>
            <td>~$18.00</td>
          </tr>
          <tr>
            <td><span class="fees-flag">🇳🇬🇰🇪🇬🇭</span>Africa</td>
            <td>Bank transfer / M-Pesa</td>
            <td>1.4% + ₦100</td>
            <td>~$15.00</td>
          </tr>
          <tr>
            <td><span class="fees-flag">🇧🇷🇲🇽</span>Latin America</td>
            <td>Pix / SPEI</td>
            <td>2.49–3.49%</td>
            <td>~$25–35</td>
          </tr>
          <tr>
            <td><span class="fees-flag">🇮🇩🇵🇭</span>Southeast Asia</td>
            <td>Virtual accounts / e-wallets</td>
            <td>1.5–2.0%</td>
            <td>~$15–20</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="fees-note">Fees are indicative and may vary by volume, account type, and local provider agreements. Rentersmaxx displays the exact fee before every collection. All figures are approximate and based on standard published rates as of 2025.</p>
  </div>
</section>

<!-- ══ COMPARISON ══ -->
<section class="comparison">
  <div class="container">
    <div class="reveal">
      <p class="section-label">How we compare</p>
      <h2 class="section-title">Built for landlords<br>nobody else serves.</h2>
      <p class="section-sub">Every competitor either stops at the US border or charges enterprise rates. Rentersmaxx is purpose-built for the individual international landlord.</p>
    </div>
    <div class="comp-table-wrap reveal">
      <table class="comp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th class="ours">Rentersmaxx</th>
            <th>AppFolio</th>
            <th>Buildium</th>
            <th>Re-Leased</th>
            <th>Landlord Studio</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>International properties</td>
            <td class="ours"><span class="comp-check">✓</span> 60+ countries</td>
            <td><span class="comp-cross">✗</span> US only</td>
            <td><span class="comp-cross">✗</span> US only</td>
            <td><span class="comp-partial">Partial (6 countries)</span></td>
            <td><span class="comp-partial">UK/AU only</span></td>
          </tr>
          <tr>
            <td>Local payment rails (UPI, SEPA etc.)</td>
            <td class="ours"><span class="comp-check">✓</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-partial">Limited</span></td>
            <td><span class="comp-cross">✗</span></td>
          </tr>
          <tr>
            <td>Multi-currency dashboard</td>
            <td class="ours"><span class="comp-check">✓</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-check">✓</span></td>
            <td><span class="comp-partial">Display only</span></td>
          </tr>
          <tr>
            <td>India (UPI / NEFT)</td>
            <td class="ours"><span class="comp-check">✓</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
          </tr>
          <tr>
            <td>Africa (mobile money / bank)</td>
            <td class="ours"><span class="comp-check">✓</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
          </tr>
          <tr>
            <td>Free first month</td>
            <td class="ours"><span class="comp-check">✓</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-cross">✗</span></td>
            <td><span class="comp-check">✓</span></td>
          </tr>
          <tr>
            <td>Starting price</td>
            <td class="ours">$0 → $9 / unit</td>
            <td>$300+ / mo</td>
            <td>$58+ / mo</td>
            <td>$75–500 / mo</td>
            <td>$12+ / mo</td>
          </tr>
          <tr>
            <td>Tax export (FX rate per transaction)</td>
            <td class="ours"><span class="comp-check">✓</span></td>
            <td><span class="comp-partial">US only</span></td>
            <td><span class="comp-partial">US only</span></td>
            <td><span class="comp-check">✓</span></td>
            <td><span class="comp-partial">Basic</span></td>
          </tr>
          <tr>
            <td>Self-serve sign-up</td>
            <td class="ours"><span class="comp-check">✓</span></td>
            <td><span class="comp-cross">✗</span> Demo required</td>
            <td><span class="comp-check">✓</span></td>
            <td><span class="comp-cross">✗</span> Sales only</td>
            <td><span class="comp-check">✓</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ══ FAQ ══ -->
<section class="faq">
  <div class="container-sm">
    <div class="reveal" style="text-align:center;">
      <p class="section-label" style="text-align:center;">Pricing questions</p>
      <h2 class="section-title" style="text-align:center;">Everything you need to know</h2>
    </div>
    <div class="faq-list reveal">
      <div class="faq-item">
        <button class="faq-q">How does the free first month work?<span class="faq-arrow">+</span></button>
        <div class="faq-a">Your first property is free for the first month — no credit card required to start. After that it's $9 per unit per month, whether you have one property or twenty. It's a trial period, not a permanent free tier.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q">What counts as a "unit"?<span class="faq-arrow">+</span></button>
        <div class="faq-a">One unit = one property with an active or recently active lease. A single building with multiple flats counts as multiple units. A property between tenancies (vacant) still counts as one unit if it has been active in the last 90 days. Properties you archive are not billed.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q">Are processor fees included in the $9?<span class="faq-arrow">+</span></button>
        <div class="faq-a">No — local payment fees vary by country and are separate from the platform subscription. We add no markup. The $9 per unit is purely the Rentersmaxx platform fee. The payment fee for each rent collection is shown to you before it runs — typically 0.36% to 2.5% depending on country and payment method.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q">Can I change plans or cancel anytime?<span class="faq-arrow">+</span></button>
        <div class="faq-a">Yes — monthly billing, no contracts, cancel anytime. If you cancel, your data is retained for 90 days and you can export everything at any time. We don't hold your records hostage.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q">Is there a discount for paying annually?<span class="faq-arrow">+</span></button>
        <div class="faq-a">Annual billing will be available at launch with a 2-month discount (equivalent to 10 months for the price of 12). Monthly billing is available from day one with no commitment required.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q">Do you offer discounts for landlords with large portfolios?<span class="faq-arrow">+</span></button>
        <div class="faq-a">Yes — volume pricing is available for landlords with 10+ properties and for agencies managing portfolios on behalf of multiple owners. Contact us to discuss custom pricing.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q">What happens during the free trial?<span class="faq-arrow">+</span></button>
        <div class="faq-a">The free first month gives you full access to all features for your first property. No credit card required to start. After the first month, all properties are billed at $9 per unit per month. Add more properties at any time — each one is $9 per unit from day one.</div>
      </div>
    </div>
  </div>
</section>

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

// ── CALCULATOR ──
const propSlider = document.getElementById('propSlider');
const rentSlider = document.getElementById('rentSlider');
const propCount  = document.getElementById('propCount');
const rentVal    = document.getElementById('rentVal');
const calcMonthly    = document.getElementById('calcMonthly');
const calcPeriodLabel = document.getElementById('calcPeriodLabel');
const calcPaidLabel  = document.getElementById('calcPaidLabel');
const calcPaidVal    = document.getElementById('calcPaidVal');
const calcAnnual     = document.getElementById('calcAnnual');
const calcRent       = document.getElementById('calcRent');
const calcPct        = document.getElementById('calcPct');

function fmt(n) { return '$' + n.toLocaleString(); }

function updateCalc() {
  const props = parseInt(propSlider.value);
  const rent  = parseInt(rentSlider.value);
  propCount.textContent = props;
  rentVal.textContent   = fmt(rent);

  const paidUnits   = Math.max(0, props - 1);
  const monthly     = paidUnits * 9;
  const annual      = monthly * 12;
  const totalRent   = props * rent;
  const pct         = totalRent > 0 ? ((monthly / totalRent) * 100).toFixed(1) : '0.0';

  calcMonthly.textContent     = fmt(monthly);
  calcPeriodLabel.textContent = `per month · ${props} propert${props === 1 ? 'y' : 'ies'}`;
  calcAnnual.textContent      = fmt(annual) + ' / yr';
  calcRent.textContent        = fmt(totalRent) + ' / mo';
  calcPct.textContent         = pct + '%';

  if (paidUnits === 0) {
    calcPaidLabel.textContent = 'Additional properties';
    calcPaidVal.textContent   = '$0 / mo';
  } else if (paidUnits === 1) {
    calcPaidLabel.textContent = 'Property 2 (1 unit)';
    calcPaidVal.textContent   = '$9 / mo';
  } else {
    calcPaidLabel.textContent = `Properties 2–${props} (${paidUnits} units)`;
    calcPaidVal.textContent   = fmt(monthly) + ' / mo';
  }
}

propSlider.addEventListener('input', updateCalc);
rentSlider.addEventListener('input', updateCalc);
updateCalc();

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
