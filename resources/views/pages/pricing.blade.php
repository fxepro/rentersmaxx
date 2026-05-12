@extends('layouts.app')

@section('title', 'Pricing — Rentersmaxx')
@section('meta_description', 'Simple transparent pricing. First month free. $9 per unit per month after that. No setup fees, no contracts.')

@php
  $page = 'pricing';
  $hideFooter = false;
@endphp

@section('content')

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

<!-- ══ FOOTER ══ -->
@endsection

@push('scripts')
<script>

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
</script>
@endpush
