@extends('layouts.app')

@section('title', 'Terms of Service — Rentersmaxx')
@section('meta_description', 'Rentersmaxx terms of service. The rules and responsibilities that govern your use of the platform.')

@push('styles')
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
.legal-page { padding-top: 80px; }
.legal-hero { background: var(--navy); padding: 96px 32px 60px; }
.legal-hero-inner { max-width: 1000px; margin: 0 auto; }
.legal-label { font-size: 23px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--terra-light); margin-bottom: 26px; }
.legal-hero h1 { font-size: clamp(44px, 5vw, 56px); color: var(--white); letter-spacing: -0.02em; margin-bottom: 26px; }
.legal-meta { font-size: 23px; color: rgba(255,255,255,0.35); font-weight: 300; }
.legal-meta span { color: rgba(255,255,255,0.55); }
.legal-body { max-width: 1000px; margin: 0 auto; padding: 88px 32px 100px; }
.legal-toc { background: var(--cream-dark); border-radius: var(--radius); padding: 48px 40px; margin-bottom: 64px; }
.legal-toc h3 { font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--text-light); margin-bottom: 26px; }
.legal-toc ol { list-style: none; display: flex; flex-direction: column; gap: 13px; counter-reset: toc; }
.legal-toc ol li { display: flex; align-items: center; gap: 13px; }
.legal-toc ol li::before { counter-increment: toc; content: counter(toc, decimal-leading-zero); font-size: 23px; color: var(--terra); font-weight: 600; flex-shrink: 0; width: 24px; }
.legal-toc ol li a { font-size: 23px; color: var(--text-mid); text-decoration: none; transition: color 0.2s; }
.legal-toc ol li a:hover { color: var(--terra); }
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
.legal-footer-strip { background: var(--navy); padding: 52px 32px; }
.legal-footer-strip-inner { max-width: 1000px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 26px; }
.legal-footer-strip p { font-size: 19px; color: rgba(255,255,255,0.35); }
.legal-footer-links { display: flex; gap: 13px; flex-wrap: wrap; }
.legal-footer-links a { font-size: 19px; color: rgba(255,255,255,0.4); text-decoration: none; padding: 7px 14px; border-radius: 13px; transition: all 0.2s; }
.legal-footer-links a:hover { color: var(--white); background: rgba(255,255,255,0.07); }
.legal-footer-links a.active { color: var(--terra-light); }
@media (max-width: 1000px) { .rm-nav { padding: 0 20px; } .rm-nav-links, .rm-nav-cta { display: none; } .rm-hamburger { display: flex; } }
</style>
@endpush

@php
  $page = 'terms';
  $hideFooter = false;
@endphp

@section('content')
</div>

<div class="legal-page">
  <div class="legal-hero">
    <div class="legal-hero-inner">
      <p class="legal-label">Legal</p>
      <h1>Terms of Service</h1>
      <p class="legal-meta">Last updated: <span>1 May 2025</span> · Effective: <span>1 May 2025</span></p>
    </div>
  </div>

  <div class="legal-body">

    <div class="legal-highlight">
      <p>By creating an account or using the Rentersmaxx platform, you agree to these terms. Please read them carefully. If you have questions, <a href="{{ url('/contact') }}">contact us</a> before proceeding.</p>
    </div>

    <nav class="legal-toc">
      <h3>Contents</h3>
      <ol>
        <li><a href="#definitions">Definitions</a></li>
        <li><a href="#account">Account registration</a></li>
        <li><a href="#platform-use">Platform use</a></li>
        <li><a href="#landlord-obligations">Landlord obligations</a></li>
        <li><a href="#tenant-obligations">Tenant obligations</a></li>
        <li><a href="#payments">Payments and fees</a></li>
        <li><a href="#data-ownership">Data ownership</a></li>
        <li><a href="#liability">Limitation of liability</a></li>
        <li><a href="#prohibited">Prohibited conduct</a></li>
        <li><a href="#termination">Termination</a></li>
        <li><a href="#disputes">Disputes and governing law</a></li>
        <li><a href="#changes">Changes to these terms</a></li>
      </ol>
    </nav>

    <div class="legal-section" id="definitions">
      <h2>1. Definitions</h2>
      <p>In these terms:</p>
      <ul>
        <li><strong>"Platform"</strong> means the Rentersmaxx web application, mobile application, and associated services</li>
        <li><strong>"Landlord"</strong> means a user who registers to manage properties and collect rent via the Platform</li>
        <li><strong>"Tenant"</strong> means a user who is invited by a Landlord to pay rent and access tenancy-related features via the Platform</li>
        <li><strong>"We", "us", "our"</strong> means Rentersmaxx Inc.</li>
        <li><strong>"Payment Provider"</strong> means the locally licensed payment processor used in each supported country</li>
      </ul>
    </div>

    <div class="legal-section" id="account">
      <h2>2. Account registration</h2>
      <p>To use the Platform, you must create an account with accurate and complete information. You are responsible for maintaining the security of your account credentials and for all activity that occurs under your account.</p>
      <p>Landlords must complete identity verification as required by applicable Payment Providers. Failure to complete verification may result in limited access to payment features.</p>
      <p>You must be at least 18 years of age to create an account. Accounts may not be created on behalf of another person without their explicit consent.</p>
    </div>

    <div class="legal-section" id="platform-use">
      <h2>3. Platform use</h2>
      <p>Rentersmaxx grants you a limited, non-exclusive, non-transferable licence to use the Platform for its intended purpose: managing rental properties, collecting rent, and facilitating landlord-tenant communication.</p>
      <p>The Platform is a management and collection tool. We are not a party to any tenancy agreement between a Landlord and a Tenant. We are not a remittance service, financial advisor, legal advisor, or tax advisor.</p>
      <div class="legal-highlight">
        <p>Rentersmaxx collects rent locally in each country. We do not execute or facilitate cross-border transfers of funds. Moving money from an in-country balance to a foreign bank account is entirely the Landlord's responsibility.</p>
      </div>
    </div>

    <div class="legal-section" id="landlord-obligations">
      <h2>4. Landlord obligations</h2>
      <p>As a Landlord, you agree to:</p>
      <ul>
        <li>Ensure you have legal authority to rent the properties you add to the Platform</li>
        <li>Comply with all applicable landlord-tenant laws in the jurisdictions where your properties are located</li>
        <li>Ensure tenants are made aware of and consent to payment collection via the Platform</li>
        <li>Comply with all applicable tax obligations in each market, including non-resident landlord filing requirements</li>
        <li>Handle cross-border repatriation of funds in compliance with applicable regulations (including RBI/FEMA in India)</li>
        <li>Not use the Platform to collect payments for properties you do not own or have authority to rent</li>
      </ul>
    </div>

    <div class="legal-section" id="tenant-obligations">
      <h2>5. Tenant obligations</h2>
      <p>As a Tenant, you agree to:</p>
      <ul>
        <li>Maintain a valid payment mandate for the duration of your tenancy</li>
        <li>Ensure sufficient funds are available on each collection date</li>
        <li>Not attempt to cancel or reverse payments improperly</li>
        <li>Notify your Landlord and update your payment details promptly if your bank account changes</li>
      </ul>
    </div>

    <div class="legal-section" id="payments">
      <h2>6. Payments and fees</h2>
      <p><strong>Platform fees:</strong> The first month of your first property is free. After that, platform fees are charged per unit per month as set out on our <a href="{{ url('/pricing') }}">pricing page</a>. Fees are billed monthly and are non-refundable except where required by law.</p>
      <p><strong>Payment processing fees:</strong> Local payment processing fees are charged by the applicable Payment Provider and passed through to the Landlord at cost. These fees are displayed before each collection and may vary by country and payment method.</p>
      <p><strong>Failed payments:</strong> If a rent payment fails, we will retry once after 3 days. We do not guarantee collection and are not liable for failed or disputed payments between Landlords and Tenants.</p>
      <p><strong>Refunds:</strong> We do not process refunds of rent payments. Any disputes about rent amounts between Landlords and Tenants are resolved directly between those parties.</p>
    </div>

    <div class="legal-section" id="data-ownership">
      <h2>7. Data ownership</h2>
      <p>You retain ownership of all data you upload to the Platform, including lease documents, photos, and messages. By uploading data, you grant us a limited licence to store, process, and display it for the purpose of delivering the Platform's features.</p>
      <p>You may export your data at any time. Upon account deletion, we will provide a data export within 30 days. Certain data may be retained beyond this period to comply with legal obligations (see our <a href="{{ url('/privacy') }}">Privacy Policy</a>).</p>
    </div>

    <div class="legal-section" id="liability">
      <h2>8. Limitation of liability</h2>
      <p>To the maximum extent permitted by applicable law, Rentersmaxx is not liable for:</p>
      <ul>
        <li>Failed, delayed, or disputed rent payments between Landlords and Tenants</li>
        <li>Tax obligations, penalties, or filing requirements in any jurisdiction</li>
        <li>Loss arising from non-compliance with local landlord-tenant laws</li>
        <li>Currency fluctuations or FX losses</li>
        <li>Loss of data due to circumstances beyond our reasonable control</li>
        <li>Indirect, consequential, or incidental damages of any kind</li>
      </ul>
      <p>Our total liability to you in connection with the Platform shall not exceed the fees you paid to us in the 12 months preceding the claim.</p>
    </div>

    <div class="legal-section" id="prohibited">
      <h2>9. Prohibited conduct</h2>
      <p>You may not use the Platform to:</p>
      <ul>
        <li>Collect payments for properties you do not own or have authority over</li>
        <li>Engage in money laundering, fraud, or any illegal financial activity</li>
        <li>Impersonate another person or entity</li>
        <li>Attempt to reverse-engineer, scrape, or exploit the Platform's systems</li>
        <li>Transmit malicious code or interfere with other users' access</li>
        <li>Violate any applicable law or regulation in any jurisdiction</li>
      </ul>
      <p>Violation of these provisions may result in immediate account termination and may be reported to relevant authorities.</p>
    </div>

    <div class="legal-section" id="termination">
      <h2>10. Termination</h2>
      <p>You may close your account at any time from your account settings. Active lease payment mandates should be cancelled before closing your account.</p>
      <p>We may suspend or terminate your account if you breach these terms, engage in prohibited conduct, or if required by applicable law or a Payment Provider.</p>
      <p>Upon termination, you will retain access to your data for 90 days, after which it will be deleted subject to legal retention requirements.</p>
    </div>

    <div class="legal-section" id="disputes">
      <h2>11. Disputes and governing law</h2>
      <p>These terms are governed by the laws of the State of Delaware, United States, without regard to conflict of law principles.</p>
      <p>Any disputes arising from these terms or your use of the Platform shall first be attempted to be resolved through good-faith negotiation. If unresolved, disputes shall be submitted to binding arbitration in Delaware, except where prohibited by applicable law.</p>
      <p>Nothing in these terms limits your rights under applicable consumer protection laws in your country of residence.</p>
    </div>

    <div class="legal-section" id="changes">
      <h2>12. Changes to these terms</h2>
      <p>We may update these terms from time to time. We will notify registered users by email at least 14 days before material changes take effect. Continued use of the Platform after the effective date constitutes acceptance of the updated terms.</p>
      <p>If you do not agree to updated terms, you may close your account before the effective date.</p>
    </div>

  </div>
</div>

<div class="legal-footer-strip">
  <div class="legal-footer-strip-inner">
    <p>© Rentersmaxx 2025</p>
    <div class="legal-footer-links">
      <a href="{{ url('/privacy') }}">Privacy</a>
      <a href="{{ url('/terms') }}" class="active">Terms</a>
      <a href="{{ url('/cookies') }}">Cookies</a>
      <a href="{{ url('/') }}">← Back to home</a>
    </div>
  </div>
</div>

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
@endsection

@push('scripts')
<script>
const nav    = document.getElementById('rmNav');
const burger = document.getElementById('rmBurger');
const drawer = document.getElementById('rmDrawer');
burger.addEventListener('click', () => {
  const open = drawer.classList.toggle('open');
  burger.classList.toggle('open', open);
});
</script>
@endpush
