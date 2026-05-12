<?php $__env->startSection('title', 'Rentersmaxx — Collect rent anywhere. Get paid everywhere.'); ?>
<?php $__env->startSection('meta_description', 'One app to manage rental properties across any country. Collect rent locally in EUR, INR, GBP and more.'); ?>

<?php
  $page = 'home';
  $hideFooter = false;
?>

<?php $__env->startSection('content'); ?>
<!-- ══ HERO ══ -->
<section class="hero">
  <div class="hero-grid"></div>
  <div class="hero-glow"></div>
  <div class="hero-badge"><span class="hero-badge-dot"></span>Now accepting early access applications</div>
  <h1>Collect rent <em>anywhere.</em><br>Get paid everywhere.</h1>
  <p class="hero-sub">One app to manage properties across any country. Your tenants pay locally — in their currency, with their bank. You see everything in yours.</p>
  <div class="hero-ctas">
    <a href="<?php echo e(url('/waitlist')); ?>" class="rm-btn rm-btn-primary btn-lg">Join the waitlist</a>
    <a href="<?php echo e(url('/how-it-works')); ?>" class="btn-outline-light">See how it works</a>
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
      <p class="section-sub">Complex regulations and payment rails handled invisibly. <a href="<?php echo e(url('/how-it-works')); ?>" style="color:var(--terra-light);text-decoration:none;font-weight:500;">See the full walkthrough →</a></p>
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
      <p class="section-sub">12 core processes — from lease creation to tax export. <a href="<?php echo e(url('/features')); ?>" style="color:var(--terra);text-decoration:none;font-weight:500;">See all features →</a></p>
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
        <a href="<?php echo e(url('/features')); ?>#tenant" style="display:inline-flex;align-items:center;gap:6px;margin-top:28px;color:var(--terra);text-decoration:none;font-size:21px;font-weight:500;">Full tenant experience →</a>
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
      <p class="section-sub">Each country uses the right local payment rail automatically. <a href="<?php echo e(url('/countries')); ?>" style="color:var(--terra);text-decoration:none;font-weight:500;">See all supported markets →</a></p>
    </div>
    <div class="country-grid reveal">
      <div class="country-card"><p class="country-region">North America</p><div class="country-flags">🇺🇸 🇨🇦</div><h4>US &amp; Canada</h4><p>United States, Canada</p><span class="country-method">ACH · EFT</span></div>
      <div class="country-card"><p class="country-region">Western Europe</p><div class="country-flags">🇫🇷 🇩🇪 🇮🇹 🇪🇸</div><h4>EU + UK</h4><p>France, Germany, Italy, Spain + 15 more</p><span class="country-method">SEPA · BACS</span></div>
      <div class="country-card"><p class="country-region">South Asia</p><div class="country-flags">🇮🇳</div><h4>India</h4><p>Full UPI, NEFT, NACH, IMPS coverage</p><span class="country-method">UPI · NEFT</span></div>
      <div class="country-card"><p class="country-region">Southeast Asia</p><div class="country-flags">🇮🇩 🇵🇭 🇲🇾 🇻🇳</div><h4>SE Asia</h4><p>Indonesia, Philippines, Malaysia, Vietnam, Thailand</p><span class="country-method">Local e-wallets · Bank</span></div>
      <div class="country-card"><p class="country-region">Africa</p><div class="country-flags">🇳🇬 🇰🇪 🇬🇭 🇿🇦</div><h4>Africa</h4><p>Nigeria, Kenya, Ghana, South Africa + 30 more</p><span class="country-method">Mobile money · Bank</span></div>
      <div class="country-card"><p class="country-region">Latin America</p><div class="country-flags">🇧🇷 🇲🇽 🇦🇷 🇨🇴</div><h4>LatAm</h4><p>Brazil, Mexico, Argentina, Colombia, Chile</p><span class="country-method">Pix · SPEI · PSE</span></div>
      <div class="country-card"><p class="country-region">Pacific</p><div class="country-flags">🇦🇺 🇳🇿 🇸🇬</div><h4>Pacific &amp; Singapore</h4><p>Australia, New Zealand, Singapore, Hong Kong</p><span class="country-method">BECS · PayNow</span></div>
      <div class="country-card" style="background:var(--cream);border:2px dashed var(--cream-dark);"><p class="country-region">Coming soon</p><div class="country-flags">🌍</div><h4>More markets</h4><p>Middle East, Eastern Europe on the roadmap</p><span class="country-method"><a href="<?php echo e(url('/countries')); ?>" style="color:var(--terra);text-decoration:none;">Request your country →</a></span></div>
    </div>
  </div>
</section>

<!-- ══ PRICING ══ -->
<section class="pricing">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Transparent pricing</p>
      <h2 class="section-title" style="color:var(--white)">Start free. Scale simply.</h2>
      <p class="section-sub">First property free for one month. Pay per unit from the second. <a href="<?php echo e(url('/pricing')); ?>" style="color:var(--terra-light);text-decoration:none;font-weight:500;">See full pricing →</a></p>
    </div>
    <div class="pricing-grid reveal">
      <div class="price-card"><p class="price-tag">Starter</p><div class="price-amount"><span class="price-currency">$</span><span class="price-number">0</span><span class="price-period">/ month</span></div><p class="price-desc">For landlords with a single property. Full features, no payment required.</p><ul class="price-feats"><li>1 property</li><li>Automated rent collection</li><li>Tenant messaging</li><li>Maintenance requests</li><li>Document storage</li><li>Annual tax export</li></ul><a href="<?php echo e(url('/waitlist')); ?>" class="price-btn">Join waitlist</a></div>
      <div class="price-card featured"><p class="price-tag">Per unit</p><div class="price-amount"><span class="price-currency">$</span><span class="price-number">9</span><span class="price-period">/ unit / mo</span></div><p class="price-desc">For landlords with multiple properties across any number of countries.</p><ul class="price-feats"><li>Unlimited properties</li><li>All 60+ countries</li><li>Full financial dashboard</li><li>Multi-currency ledger</li><li>Portfolio analytics</li><li>Priority support</li></ul><a href="<?php echo e(url('/waitlist')); ?>" class="price-btn">Start free trial</a></div>
      <div class="price-card"><p class="price-tag">Agency</p><div class="price-amount" style="align-items:center;padding-top:6px;"><span class="price-number" style="font-size:38px;line-height:1.15;">Talk<br>to us</span></div><p class="price-desc">For property managers handling portfolios on behalf of multiple owners.</p><ul class="price-feats"><li>Sub-accounts per owner</li><li>Bulk lease management</li><li>White-label option</li><li>Dedicated account manager</li><li>Custom onboarding</li><li>SLA guarantee</li></ul><a href="<?php echo e(url('/contact')); ?>" class="price-btn">Contact sales</a></div>
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

<!-- ══ FOOTER ══ -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\fxepro\AIProjects\RentersMaxx\resources\views/pages/index.blade.php ENDPATH**/ ?>