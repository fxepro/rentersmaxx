@extends('layouts.app')

@section('title', 'Sign in — Rentersmaxx')
@section('meta_description', 'Sign in to your Rentersmaxx account.')

@php
  $page = 'login';
  $hideFooter = true;
@endphp

@section('content')
<!-- ── LEFT ── -->
<div class="login-left">
  <div class="login-left-grid"></div>
  <div class="login-left-glow"></div>

  <a href="{{ url('/') }}" class="login-logo">Renters<span>maxx</span></a>

  <div class="login-left-content">
    <h2>Your portfolio.<br><em>All of it.</em></h2>
    <p>Every property, every currency, every tenant — in one dashboard. Welcome back.</p>

    <div class="login-preview">
      <div class="lp-header">
        <span class="lp-title">Portfolio overview</span>
        <span class="lp-period">May 2025</span>
      </div>
      <div class="lp-total">$2,520</div>
      <div class="lp-sub">Collected this month · 3 properties</div>
      <div class="lp-row">
        <div class="lp-row-left">
          <span class="lp-flag">🇫🇷</span>
          <div><div class="lp-name">Rue de Rivoli, Paris</div><div class="lp-method">SEPA Direct Debit</div></div>
        </div>
        <div style="text-align:right">
          <div class="lp-amount">€ 1,500</div>
          <span class="lp-status s-paid">Paid</span>
        </div>
      </div>
      <div class="lp-row">
        <div class="lp-row-left">
          <span class="lp-flag">🇮🇳</span>
          <div><div class="lp-name">Bandra West, Mumbai</div><div class="lp-method">UPI AutoPay</div></div>
        </div>
        <div style="text-align:right">
          <div class="lp-amount">₹ 75,000</div>
          <span class="lp-status s-paid">Paid</span>
        </div>
      </div>
      <div class="lp-row">
        <div class="lp-row-left">
          <span class="lp-flag">🇬🇧</span>
          <div><div class="lp-name">Shoreditch, London</div><div class="lp-method">BACS Direct Debit</div></div>
        </div>
        <div style="text-align:right">
          <div class="lp-amount">£ 2,200</div>
          <span class="lp-status s-due">Due 1 Jun</span>
        </div>
      </div>
    </div>
  </div>

  <div class="login-left-footer">
    <a href="{{ url('/privacy') }}">Privacy</a> · <a href="{{ url('/terms') }}">Terms</a> · <a href="{{ url('/cookies') }}">Cookies</a>
  </div>
</div>

<!-- ── RIGHT ── -->
<div class="login-right">
  <div class="login-card">

    <!-- Sign in view -->
    <div id="signinView">
      <div class="login-card-header">
        <h1>Welcome back.</h1>
        <p>Don't have an account? <a href="{{ url('/waitlist') }}">Join the waitlist →</a></p>
      </div>

      <div class="sso-buttons">
        <button class="sso-btn" onclick="ssoLogin('Google')">
          <span class="sso-icon">🔵</span> Continue with Google
        </button>
        <button class="sso-btn" onclick="ssoLogin('Apple')">
          <span class="sso-icon">🍎</span> Continue with Apple
        </button>
      </div>

      <div class="divider">
        <div class="divider-line"></div>
        <span class="divider-text">or sign in with email</span>
        <div class="divider-line"></div>
      </div>

      <form class="login-form" id="loginForm" onsubmit="handleLogin(event)" novalidate>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-input" id="email" placeholder="you@example.com" autocomplete="email" required>
          <span class="form-error" id="emailError">Please enter a valid email address.</span>
        </div>

        <div class="form-group">
          <label for="password">
            Password
            <a href="#" onclick="showForgot(event)">Forgot password?</a>
          </label>
          <div class="password-wrap">
            <input type="password" class="form-input" id="password" placeholder="Your password" autocomplete="current-password" required>
            <button type="button" class="password-toggle" onclick="togglePassword()" aria-label="Show password" id="pwToggle">👁</button>
          </div>
          <span class="form-error" id="passwordError">Please enter your password.</span>
        </div>

        <span class="form-error" id="loginError" style="display:none; text-align:center; margin-top:-8px;"></span>

        <button type="submit" class="form-submit" id="loginBtn">Sign in →</button>
      </form>

      <div class="login-bottom">
        <p>Not a landlord? <a href="{{ url('/waitlist') }}">Join the waitlist</a> to get started.</p>
        <div class="login-legal">
          <a href="{{ url('/privacy') }}">Privacy policy</a>
          <a href="{{ url('/terms') }}">Terms of service</a>
          <a href="{{ url('/cookies') }}">Cookies</a>
        </div>
      </div>
    </div>

    <!-- Forgot password view -->
    <div id="forgotView">
      <button class="back-btn" onclick="showSignin()">← Back to sign in</button>
      <div class="login-card-header">
        <h1>Reset password.</h1>
        <p>Enter your email and we'll send a reset link within a few minutes.</p>
      </div>
      <form class="login-form" onsubmit="handleReset(event)" novalidate>
        <div class="form-group">
          <label for="resetEmail">Email address</label>
          <input type="email" class="form-input" id="resetEmail" placeholder="you@example.com" required>
        </div>
        <button type="submit" class="form-submit" id="resetBtn">Send reset link →</button>
      </form>
      <div class="login-bottom">
        <div class="login-legal">
          <a href="{{ url('/privacy') }}">Privacy policy</a>
          <a href="{{ url('/terms') }}">Terms of service</a>
        </div>
      </div>
    </div>

    <!-- Reset sent confirmation -->
    <div id="resetSentView" style="display:none; text-align:center; padding:20px 0;">
      <div style="font-size:48px; margin-bottom:20px;">✉️</div>
      <h2 style="font-size:29px; color:var(--text-dark); margin-bottom:12px;">Check your inbox.</h2>
      <p style="font-size:21px; color:var(--text-mid); font-weight:300; line-height:1.6; margin-bottom:28px;">We've sent a password reset link to <strong id="resetEmailSent"></strong>. It expires in 30 minutes.</p>
      <button class="back-btn" style="margin:0 auto; display:flex;" onclick="showSignin()">← Back to sign in</button>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script>
// ── PASSWORD TOGGLE ──
function togglePassword() {
  const input  = document.getElementById('password');
  const toggle = document.getElementById('pwToggle');
  if (input.type === 'password') {
    input.type  = 'text';
    toggle.textContent = '🙈';
  } else {
    input.type  = 'password';
    toggle.textContent = '👁';
  }
}

// ── LOGIN FORM ──
function handleLogin(e) {
  e.preventDefault();
  const email    = document.getElementById('email');
  const password = document.getElementById('password');
  const emailErr = document.getElementById('emailError');
  const pwErr    = document.getElementById('passwordError');
  const loginErr = document.getElementById('loginError');
  const btn      = document.getElementById('loginBtn');

  // Reset errors
  [email, password].forEach(el => el.classList.remove('error'));
  [emailErr, pwErr, loginErr].forEach(el => el.style.display = 'none');

  let valid = true;
  if (!email.value || !/\S+@\S+\.\S+/.test(email.value)) {
    email.classList.add('error');
    emailErr.style.display = 'block';
    valid = false;
  }
  if (!password.value) {
    password.classList.add('error');
    pwErr.style.display = 'block';
    valid = false;
  }
  if (!valid) return;

  btn.textContent = 'Signing in…';
  btn.disabled = true;

  // Simulate auth — replace with real API call
  setTimeout(() => {
    // Demo: show error for any credentials (replace with real auth)
    loginErr.textContent = 'We couldn\'t find an account with those details. Check your email or join the waitlist.';
    loginErr.style.display = 'block';
    btn.textContent = 'Sign in →';
    btn.disabled = false;
  }, 1000);
}

// ── SSO ──
function ssoLogin(provider) {
  // Replace with real OAuth flow
  alert(`${provider} sign-in coming soon. Join the waitlist to be notified at launch.`);
}

// ── FORGOT PASSWORD ──
function showForgot(e) {
  e.preventDefault();
  document.getElementById('signinView').style.display = 'none';
  document.getElementById('forgotView').style.display = 'block';
  document.getElementById('resetSentView').style.display = 'none';
}

function showSignin() {
  document.getElementById('signinView').style.display = 'block';
  document.getElementById('forgotView').style.display = 'none';
  document.getElementById('resetSentView').style.display = 'none';
}

function handleReset(e) {
  e.preventDefault();
  const email = document.getElementById('resetEmail').value;
  const btn   = document.getElementById('resetBtn');
  if (!email) return;
  btn.textContent = 'Sending…';
  btn.disabled = true;
  setTimeout(() => {
    document.getElementById('resetEmailSent').textContent = email;
    document.getElementById('forgotView').style.display   = 'none';
    document.getElementById('resetSentView').style.display = 'block';
  }, 800);
}
</script>
@endpush
