{{-- ═══════════════════════════════
   Partial: Navigation
   Usage: @include('partials.nav', ['page' => 'home'])
   Pages: home | how-it-works | features | pricing | countries | waitlist | login | about | contact | privacy | terms | cookies
═══════════════════════════════ --}}

<nav class="rm-nav" id="rmNav" data-page="{{ $page ?? '' }}">
  <a href="{{ url('/') }}" class="rm-nav-logo">Renters<span>maxx</span></a>
  <ul class="rm-nav-links">
    <li><a href="{{ url('/how-it-works') }}" @class(['active' => ($page ?? '') === 'how-it-works'])>How it works</a></li>
    <li><a href="{{ url('/features') }}" @class(['active' => ($page ?? '') === 'features'])>Features</a></li>
    <li><a href="{{ url('/pricing') }}" @class(['active' => ($page ?? '') === 'pricing'])>Pricing</a></li>
    <li><a href="{{ url('/countries') }}" @class(['active' => ($page ?? '') === 'countries'])>Countries</a></li>
  </ul>
  <div class="rm-nav-cta">
    <a href="{{ url('/login') }}" class="rm-btn rm-btn-ghost">Sign in</a>
    <a href="{{ url('/waitlist') }}" class="rm-btn rm-btn-primary">Join waitlist →</a>
  </div>
  <button class="rm-hamburger" id="rmBurger" aria-label="Menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</nav>

<div class="rm-drawer" id="rmDrawer">
  <a href="{{ url('/how-it-works') }}" @class(['active' => ($page ?? '') === 'how-it-works'])>How it works</a>
  <a href="{{ url('/features') }}" @class(['active' => ($page ?? '') === 'features'])>Features</a>
  <a href="{{ url('/pricing') }}" @class(['active' => ($page ?? '') === 'pricing'])>Pricing</a>
  <a href="{{ url('/countries') }}" @class(['active' => ($page ?? '') === 'countries'])>Countries</a>
  <div class="rm-drawer-cta">
    <a href="{{ url('/login') }}" class="rm-btn rm-btn-ghost">Sign in</a>
    <a href="{{ url('/waitlist') }}" class="rm-btn rm-btn-primary">Join waitlist →</a>
  </div>
</div>
