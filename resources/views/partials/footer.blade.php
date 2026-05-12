{{-- ═══════════════════════════════
   Partial: Footer (includes CTA banner)
   Usage: @include('partials.footer')
═══════════════════════════════ --}}

<!-- ══ CTA BANNER ══ -->
<div class="rm-cta-banner">
  <div class="container-sm">
    <h2>Ready to manage your<br><em>whole</em> portfolio?</h2>
    <p>Launching first in the US, UK, France, and India. Join the waitlist and be first in your country.</p>
    <form class="rm-waitlist-form" onsubmit="rmWaitlist(event)">
      <input type="email" class="rm-waitlist-input" placeholder="your@email.com" required id="rmEmail">
      <button type="submit" class="rm-waitlist-btn">Join waitlist →</button>
    </form>
    <p class="rm-waitlist-note" id="rmWaitlistNote">No spam. No credit card. Just early access.</p>
  </div>
</div>


<footer class="rm-footer">
  <div class="rm-footer-inner">
    <div class="rm-footer-top">
      <div class="rm-footer-brand">
        <a href="{{ url('/') }}" class="rm-footer-logo">Renters<span>maxx</span></a>
        <p>One app to manage rental properties across any country. Collect rent locally. See everything in one dashboard.</p>
        <div class="rm-footer-socials">
          <a href="#" class="rm-social" aria-label="Twitter">𝕏</a>
          <a href="#" class="rm-social" aria-label="LinkedIn">in</a>
          <a href="#" class="rm-social" aria-label="GitHub">⌥</a>
        </div>
      </div>
      <div class="rm-footer-col">
        <h5>Product</h5>
        <ul class="rm-footer-links">
          <li><a href="{{ url('/how-it-works') }}">How it works</a></li>
          <li><a href="{{ url('/features') }}">Features</a></li>
          <li><a href="{{ url('/pricing') }}">Pricing</a></li>
          <li><a href="{{ url('/countries') }}">Countries</a></li>
          <li><a href="{{ url('/waitlist') }}">Join waitlist <span class="rm-badge">Free</span></a></li>
        </ul>
      </div>
      <div class="rm-footer-col">
        <h5>Landlords</h5>
        <ul class="rm-footer-links">
          <li><a href="{{ url('/features') }}#collection">Rent collection</a></li>
          <li><a href="{{ url('/features') }}#dashboard">Dashboard</a></li>
          <li><a href="{{ url('/features') }}#documents">Documents</a></li>
          <li><a href="{{ url('/features') }}#tax">Tax export</a></li>
          <li><a href="{{ url('/features') }}#maintenance">Maintenance</a></li>
        </ul>
      </div>
      <div class="rm-footer-col">
        <h5>Tenants</h5>
        <ul class="rm-footer-links">
          <li><a href="{{ url('/features') }}#tenant">Tenant experience</a></li>
          <li><a href="{{ url('/features') }}#payments">Paying rent</a></li>
          <li><a href="{{ url('/features') }}#receipts">Receipts</a></li>
          <li><a href="{{ url('/features') }}#maintenance">Raise an issue</a></li>
        </ul>
      </div>
      <div class="rm-footer-col">
        <h5>Company</h5>
        <ul class="rm-footer-links">
          <li><a href="{{ url('/about') }}">About</a></li>
          <li><a href="{{ url('/blog') }}">Blog</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
          <li><a href="{{ url('/careers') }}">Careers <span class="rm-badge">Hiring</span></a></li>
        </ul>
      </div>
    </div>
    <div class="rm-footer-compliance">
      <span class="rm-compliance-item">🔒 GDPR compliant</span>
      <span class="rm-compliance-item">🔒 PSD2 licensed processors</span>
      <span class="rm-compliance-item">🔒 RBI-regulated (India)</span>
      <span class="rm-compliance-item">🔒 Data encrypted in transit &amp; at rest</span>
      <span class="rm-compliance-item">🔒 7-year document retention</span>
    </div>
    <div class="rm-footer-bottom">
      <p class="rm-footer-copy">© Rentersmaxx 2025 — All rights reserved.</p>
      <select class="rm-region-select" aria-label="Select region">
        <option>🇺🇸 United States</option>
        <option>🇬🇧 United Kingdom</option>
        <option>🇫🇷 France</option>
        <option>🇮🇳 India</option>
        <option>🇦🇺 Australia</option>
        <option>🇳🇬 Nigeria</option>
        <option>🇧🇷 Brazil</option>
      </select>
      <div class="rm-footer-legal">
        <a href="{{ url('/privacy') }}">Privacy</a><span class="rm-footer-legal-sep">·</span>
        <a href="{{ url('/terms') }}">Terms</a><span class="rm-footer-legal-sep">·</span>
        <a href="{{ url('/cookies') }}">Cookies</a><span class="rm-footer-legal-sep">·</span>
        <a href="{{ url('/security') }}">Security</a>
      </div>
    </div>
  </div>
</footer>