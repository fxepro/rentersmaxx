<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Privacy Policy — Rentersmaxx</title>
<meta name="description" content="Rentersmaxx privacy policy. How we collect, use, and protect your personal data across all markets.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --navy: #0D1F35; --navy-mid: #162d4a; --navy-border: rgba(255,255,255,0.08);
  --cream: #FAF8F3; --cream-dark: #F0EDE4;
  --terra: #C4622D; --terra-light: #d97448;
  --text-dark: #0D1F35; --text-mid: #4A5A6A; --text-light: #8A99AA;
  --white: #ffffff; --radius: 16px;
}
html { scroll-behavior: smooth; }
body { font-family: 'Outfit', sans-serif; color: var(--text-dark); background: var(--cream); overflow-x: hidden; }
h1,h2,h3 { font-family: 'Fraunces', serif; font-weight: 500; }

/* ── NAV ── */
.rm-nav { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; display: flex; align-items: center; justify-content: space-between; padding: 0 72px; height: 80px; background: rgba(13,31,53,0.94); backdrop-filter: blur(20px); border-bottom: 1px solid var(--navy-border); }
.rm-nav-logo { font-family: 'Fraunces', serif; font-size: 22px; font-weight: 700; color: var(--white); text-decoration: none; letter-spacing: -0.5px; }
.rm-nav-logo span { color: var(--terra-light); }
.rm-nav-links { display: flex; align-items: center; gap: 4px; list-style: none; margin: 0 auto; padding: 0 32px; }
.rm-nav-links a { padding: 7px 14px; border-radius: 16px; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 14px; transition: color 0.2s, background 0.2s; }
.rm-nav-links a:hover { color: var(--white); background: rgba(255,255,255,0.06); }
.rm-btn { display: inline-flex; align-items: center; padding: 9px 20px; border-radius: 8px; font-family: 'Outfit', sans-serif; font-size: 14px; font-weight: 500; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; }
.rm-btn-ghost { background: transparent; color: rgba(255,255,255,0.65); border: 1px solid rgba(255,255,255,0.16); }
.rm-btn-ghost:hover { color: var(--white); background: rgba(255,255,255,0.06); }
.rm-btn-primary { background: var(--terra); color: var(--white); }
.rm-btn-primary:hover { background: var(--terra-light); }
.rm-nav-cta { display: flex; gap: 10px; }
.rm-hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 4px; background: none; border: none; }
.rm-hamburger span { display: block; width: 22px; height: 2px; background: rgba(255,255,255,0.7); border-radius: 2px; transition: all 0.3s; }
.rm-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.rm-hamburger.open span:nth-child(2) { opacity: 0; }
.rm-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
.rm-drawer { position: fixed; top: 80px; left: 0; right: 0; background: var(--navy); border-bottom: 1px solid var(--navy-border); padding: 22px 20px 24px; z-index: 999; transform: translateY(-110%); transition: transform 0.3s ease; }
.rm-drawer.open { transform: translateY(0); }
.rm-drawer a { display: block; padding: 12px 16px; border-radius: 13px; color: rgba(255,255,255,0.65); text-decoration: none; font-size: 15px; margin-bottom: 2px; }
.rm-drawer a:hover { background: rgba(255,255,255,0.07); color: var(--white); }
.rm-drawer-cta { display: flex; gap: 10px; margin-top: 18px; padding-top: 14px; border-top: 1px solid var(--navy-border); }
.rm-drawer-cta .rm-btn { flex: 1; justify-content: center; }

/* ── LEGAL LAYOUT ── */
.legal-page { padding-top: 80px; }

.legal-hero { background: var(--navy); padding: 96px 32px 60px; }
.legal-hero-inner { max-width: 1000px; margin: 0 auto; }
.legal-label { font-size: 23px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--terra-light); margin-bottom: 26px; }
.legal-hero h1 { font-size: clamp(44px, 5vw, 56px); color: var(--white); letter-spacing: -0.02em; margin-bottom: 26px; }
.legal-meta { font-size: 23px; color: rgba(255,255,255,0.35); font-weight: 300; }
.legal-meta span { color: rgba(255,255,255,0.55); }

.legal-body { max-width: 1000px; margin: 0 auto; padding: 88px 32px 100px; }

/* TOC */
.legal-toc { background: var(--cream-dark); border-radius: var(--radius); padding: 48px 40px; margin-bottom: 64px; }
.legal-toc h3 { font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--text-light); margin-bottom: 26px; }
.legal-toc ol { list-style: none; display: flex; flex-direction: column; gap: 13px; counter-reset: toc; }
.legal-toc ol li { display: flex; align-items: center; gap: 13px; }
.legal-toc ol li::before { counter-increment: toc; content: counter(toc, decimal-leading-zero); font-size: 23px; color: var(--terra); font-weight: 600; flex-shrink: 0; width: 24px; }
.legal-toc ol li a { font-size: 23px; color: var(--text-mid); text-decoration: none; transition: color 0.2s; }
.legal-toc ol li a:hover { color: var(--terra); }

/* Sections */
.legal-section { margin-bottom: 56px; padding-bottom: 56px; border-bottom: 1px solid var(--cream-dark); }
.legal-section:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
.legal-section h2 { font-size: 27px; color: var(--text-dark); margin-bottom: 26px; letter-spacing: -0.01em; }
.legal-section p { font-size: 21px; color: var(--text-mid); line-height: 1.8; font-weight: 300; margin-bottom: 26px; }
.legal-section p:last-child { margin-bottom: 0; }
.legal-section ul, .legal-section ol { margin: 16px 0 16px 24px; display: flex; flex-direction: column; gap: 13px; }
.legal-section li { font-size: 21px; color: var(--text-mid); line-height: 1.7; font-weight: 300; }
.legal-section strong { color: var(--text-dark); font-weight: 600; }
.legal-section a { color: var(--terra); text-decoration: none; }
.legal-section a:hover { text-decoration: underline; }
.legal-highlight { background: var(--cream-dark); border-radius: var(--radius); padding: 26px 24px; margin: 20px 0; border-left: 3px solid var(--terra); }
.legal-highlight p { font-size: 23px; color: var(--text-dark); font-weight: 400; margin: 0; }

/* Footer */
.legal-footer-strip { background: var(--navy); padding: 52px 32px; }
.legal-footer-strip-inner { max-width: 1000px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 26px; }
.legal-footer-strip p { font-size: 19px; color: rgba(255,255,255,0.35); }
.legal-footer-links { display: flex; gap: 13px; flex-wrap: wrap; }
.legal-footer-links a { font-size: 19px; color: rgba(255,255,255,0.4); text-decoration: none; padding: 7px 14px; border-radius: 13px; transition: all 0.2s; }
.legal-footer-links a:hover { color: var(--white); background: rgba(255,255,255,0.07); }
.legal-footer-links a.active { color: var(--terra-light); }

@media (max-width: 1000px) { .rm-nav { padding: 0 20px; } .rm-nav-links, .rm-nav-cta { display: none; } .rm-hamburger { display: flex; } }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@include('partials.nav', ['page' => 'privacy'])

<div class="legal-page">
  <div class="legal-hero">
    <div class="legal-hero-inner">
      <p class="legal-label">Legal</p>
      <h1>Privacy Policy</h1>
      <p class="legal-meta">Last updated: <span>1 May 2025</span> · Effective: <span>1 May 2025</span></p>
    </div>
  </div>

  <div class="legal-body">

    <div class="legal-highlight">
      <p>This policy explains how Rentersmaxx collects, uses, stores, and protects personal data. It applies to landlords, tenants, and visitors to our platform across all supported markets. We are committed to plain-language privacy — if something is unclear, <a href="{{ url('/contact') }}">contact us</a>.</p>
    </div>

    <nav class="legal-toc">
      <h3>Contents</h3>
      <ol>
        <li><a href="#who-we-are">Who we are</a></li>
        <li><a href="#data-we-collect">Data we collect</a></li>
        <li><a href="#how-we-use">How we use your data</a></li>
        <li><a href="#data-sharing">Data sharing</a></li>
        <li><a href="#data-storage">Data storage and retention</a></li>
        <li><a href="#your-rights">Your rights</a></li>
        <li><a href="#cookies">Cookies</a></li>
        <li><a href="#international">International transfers</a></li>
        <li><a href="#children">Children</a></li>
        <li><a href="#changes">Changes to this policy</a></li>
        <li><a href="#contact">Contact us</a></li>
      </ol>
    </nav>

    <div class="legal-section" id="who-we-are">
      <h2>1. Who we are</h2>
      <p>Rentersmaxx is a property management platform that enables landlords to collect rent from tenants in local currencies across multiple countries. The data controller for personal data processed through the Rentersmaxx platform is Rentersmaxx Inc., a company incorporated in the United States.</p>
      <p>Where we process data of individuals in the European Economic Area or United Kingdom, we comply with the General Data Protection Regulation (GDPR) and UK GDPR respectively. Where we process data of individuals in India, we comply with the Digital Personal Data Protection Act 2023 (DPDP Act).</p>
    </div>

    <div class="legal-section" id="data-we-collect">
      <h2>2. Data we collect</h2>
      <p><strong>From landlords:</strong></p>
      <ul>
        <li>Name, email address, phone number, and home country</li>
        <li>Identity verification documents (for payment provider KYC requirements)</li>
        <li>Bank account details (connected via your payment provider — we do not store full account numbers)</li>
        <li>Property details: address, country, rent amount, lease terms</li>
        <li>Documents you upload: lease agreements, inspection reports, insurance certificates</li>
        <li>Transaction records: payment dates, amounts, FX rates at time of collection</li>
        <li>Communication records: messages sent via our in-app messaging system</li>
      </ul>
      <p><strong>From tenants:</strong></p>
      <ul>
        <li>Name, email address, and phone number (as provided by the landlord or entered during onboarding)</li>
        <li>Payment mandate details (bank account or UPI ID — held by your local payment provider, not us)</li>
        <li>Maintenance request details: descriptions, photos, and status updates</li>
        <li>Communication records: messages sent via our in-app messaging system</li>
      </ul>
      <p><strong>From all users automatically:</strong></p>
      <ul>
        <li>Device and browser information, IP address, and locale</li>
        <li>Usage data: pages visited, features used, time spent</li>
        <li>Cookies and similar tracking technologies (see Section 7)</li>
      </ul>
    </div>

    <div class="legal-section" id="how-we-use">
      <h2>3. How we use your data</h2>
      <p>We use personal data to:</p>
      <ul>
        <li>Provide, operate, and improve the Rentersmaxx platform</li>
        <li>Process rent payments and maintain transaction records</li>
        <li>Send transactional notifications (payment confirmations, arrears alerts, maintenance updates)</li>
        <li>Generate tax-ready income reports for landlords</li>
        <li>Comply with applicable laws and regulations in each market we operate</li>
        <li>Respond to support requests and enquiries</li>
        <li>Detect and prevent fraud and unauthorised access</li>
      </ul>
      <p>We do not use your personal data for advertising, sell it to third parties, or share it for marketing purposes.</p>
    </div>

    <div class="legal-section" id="data-sharing">
      <h2>4. Data sharing</h2>
      <p>We share personal data only where necessary to deliver the service:</p>
      <ul>
        <li><strong>Payment providers:</strong> We share payment-relevant data with locally licensed payment providers in each market to process rent collections. These providers are bound by their own privacy policies and regulatory obligations.</li>
        <li><strong>Cloud infrastructure:</strong> We use cloud providers to host the platform. Data is stored in the appropriate region for each user (see Section 5).</li>
        <li><strong>Legal requirements:</strong> We may disclose data where required by law, court order, or regulatory authority in applicable jurisdictions.</li>
        <li><strong>Business transfers:</strong> In the event of a merger, acquisition, or sale of the company, personal data may be transferred as part of that transaction. We will notify users in advance.</li>
      </ul>
      <p>We do not sell, rent, or trade personal data to any third party for commercial purposes.</p>
    </div>

    <div class="legal-section" id="data-storage">
      <h2>5. Data storage and retention</h2>
      <p><strong>Where we store data:</strong></p>
      <ul>
        <li>Data relating to EU and EEA users is stored in EU-based data centres</li>
        <li>Data relating to Indian users is stored in India-based data centres, in compliance with the DPDP Act</li>
        <li>Data relating to all other users is stored in US-based data centres</li>
      </ul>
      <p><strong>How long we keep data:</strong></p>
      <ul>
        <li>Lease documents, payment records, and communications are retained for a minimum of 7 years from the end of the relevant tenancy — consistent with standard tax record requirements across our markets</li>
        <li>Account data is retained for as long as your account is active, plus 90 days after deletion to allow for recovery</li>
        <li>After the retention period, data is securely deleted or anonymised</li>
      </ul>
      <div class="legal-highlight">
        <p>FX rates at the time of each payment are stored permanently and are never recalculated retroactively. This is intentional — it ensures your tax records remain accurate to the original transaction date.</p>
      </div>
    </div>

    <div class="legal-section" id="your-rights">
      <h2>6. Your rights</h2>
      <p>Depending on your country of residence, you may have the following rights regarding your personal data:</p>
      <ul>
        <li><strong>Access:</strong> Request a copy of the personal data we hold about you</li>
        <li><strong>Correction:</strong> Request correction of inaccurate or incomplete data</li>
        <li><strong>Deletion:</strong> Request deletion of your personal data (subject to legal retention obligations)</li>
        <li><strong>Portability:</strong> Request your data in a structured, machine-readable format</li>
        <li><strong>Objection:</strong> Object to certain processing of your data</li>
        <li><strong>Restriction:</strong> Request that we restrict processing while a dispute is resolved</li>
        <li><strong>Withdrawal of consent:</strong> Where processing is based on consent, you may withdraw it at any time</li>
      </ul>
      <p>To exercise any of these rights, contact us at <a href="mailto:privacy@rentersmaxx.com">privacy@rentersmaxx.com</a>. We will respond within 30 days. If you are in the EU or UK and are unsatisfied with our response, you may lodge a complaint with your local data protection authority.</p>
    </div>

    <div class="legal-section" id="cookies">
      <h2>7. Cookies</h2>
      <p>We use cookies and similar technologies for the following purposes:</p>
      <ul>
        <li><strong>Essential cookies:</strong> Required for the platform to function — session management, authentication, security</li>
        <li><strong>Analytics cookies:</strong> Help us understand how users interact with the platform so we can improve it. We use privacy-respecting analytics tools.</li>
        <li><strong>Preference cookies:</strong> Remember your settings such as language and region</li>
      </ul>
      <p>We do not use advertising or tracking cookies. You can manage your cookie preferences at any time via our <a href="{{ url('/cookies') }}">Cookie Policy</a> page.</p>
    </div>

    <div class="legal-section" id="international">
      <h2>8. International data transfers</h2>
      <p>Where personal data is transferred outside your country of residence, we ensure appropriate safeguards are in place:</p>
      <ul>
        <li>For EU/EEA data transferred outside the EEA: Standard Contractual Clauses (SCCs) approved by the European Commission</li>
        <li>For UK data transferred outside the UK: International Data Transfer Agreements (IDTAs)</li>
        <li>For Indian data: compliance with the DPDP Act's cross-border transfer provisions</li>
      </ul>
    </div>

    <div class="legal-section" id="children">
      <h2>9. Children</h2>
      <p>Rentersmaxx is not intended for use by individuals under the age of 18. We do not knowingly collect personal data from children. If you believe we have collected data from a child, please contact us immediately at <a href="mailto:privacy@rentersmaxx.com">privacy@rentersmaxx.com</a>.</p>
    </div>

    <div class="legal-section" id="changes">
      <h2>10. Changes to this policy</h2>
      <p>We may update this policy from time to time. When we make material changes, we will notify registered users by email at least 14 days before the changes take effect. The updated policy will be published on this page with a revised effective date.</p>
      <p>Continued use of the platform after the effective date constitutes acceptance of the updated policy.</p>
    </div>

    <div class="legal-section" id="contact">
      <h2>11. Contact us</h2>
      <p>For privacy-related questions, requests, or complaints:</p>
      <ul>
        <li>Email: <a href="mailto:privacy@rentersmaxx.com">privacy@rentersmaxx.com</a></li>
        <li>General contact: <a href="{{ url('/contact') }}">rentersmaxx.com/contact</a></li>
      </ul>
      <p>We aim to respond to all privacy enquiries within 5 business days.</p>
    </div>

  </div>
</div>

@include('partials.footer')
<script src="{{ asset('js/app.js') }}"></script>
<script>
const nav    = document.getElementById('rmNav');
const burger = document.getElementById('rmBurger');
const drawer = document.getElementById('rmDrawer');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 20), {passive:true});
burger.addEventListener('click', () => {
  const open = drawer.classList.toggle('open');
  burger.classList.toggle('open', open);
});
</script>
</body>
</html>
