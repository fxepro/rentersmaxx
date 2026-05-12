@extends('layouts.app')

@section('title', 'Sign in — Rentersmaxx')
@section('meta_description', 'Sign in to your Rentersmaxx account to manage your properties, collect rent, and view your dashboard.')

@push('styles')
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --navy: #0D1F35; --navy-mid: #162d4a; --navy-light: #1e3a5f;
  --navy-border: rgba(255,255,255,0.08);
  --cream: #FAF8F3; --cream-dark: #F0EDE4;
  --terra: #C4622D; --terra-light: #d97448; --terra-pale: #FAF0EB;
  --green: #2A6B4A; --green-pale: #E4F0EA;
  --text-dark: #0D1F35; --text-mid: #4A5A6A; --text-light: #8A99AA;
  --white: #ffffff; --radius: 16px; --radius-lg: 26px;
}
html { height: 100%; }
body { font-family: 'Outfit', sans-serif; font-weight: 400; color: var(--text-dark); background: var(--cream); min-height: 100vh; display: grid; grid-template-columns: 1fr 1fr; }
h1,h2,h3 { font-family: 'Fraunces', serif; font-weight: 500; line-height: 1.1; }

/* ── LEFT PANEL ── */
.login-left {
  background: var(--navy);
  display: flex; flex-direction: column;
  padding: 60px 64px;
  position: relative; overflow: hidden;
  min-height: 100vh;
}

.login-left-grid {
  position: absolute; inset: 0;
  background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
  background-size: 60px 60px; pointer-events: none;
}
.login-left-glow {
  position: absolute; width: 500px; height: 500px; border-radius: 50%;
  background: radial-gradient(circle, rgba(196,98,45,0.1) 0%, transparent 70%);
  bottom: -10%; left: -10%; pointer-events: none;
}

/* Logo */
.login-logo {
  font-family: 'Fraunces', serif; font-size: 25px; font-weight: 700;
  color: var(--white); text-decoration: none; letter-spacing: -0.5px;
  position: relative; z-index: 1;
}
.login-logo span { color: var(--terra-light); }

/* Middle content */
.login-left-content {
  flex: 1; display: flex; flex-direction: column;
  justify-content: center; position: relative; z-index: 1;
  padding: 60px 0;
}

.login-left-content h2 {
  font-size: clamp(44px, 3vw, 42px); color: var(--white);
  letter-spacing: -0.02em; margin-bottom: 26px;
}
.login-left-content h2 em { font-style: italic; color: var(--terra-light); }

.login-left-content p {
  font-size: 19px; color: rgba(255,255,255,0.45);
  font-weight: 300; line-height: 1.7; max-width: 460px; margin-bottom: 48px;
}

/* Mini dashboard preview */
.login-preview {
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.07);
  border-radius: var(--radius-lg); padding: 42px;
  max-width: 480px;
}
.lp-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 22px; }
.lp-title { font-size: 13px; font-weight: 500; color: rgba(255,255,255,0.6); }
.lp-period { font-size: 12px; color: rgba(255,255,255,0.25); padding: 6px 14px; background: rgba(255,255,255,0.05); border-radius: 13px; }
.lp-total { font-family: 'Fraunces', serif; font-size: 32px; color: var(--white); margin-bottom: 4px; }
.lp-sub { font-size: 12px; color: rgba(255,255,255,0.3); margin-bottom: 26px; }
.lp-row { display: flex; align-items: center; justify-content: space-between; padding: 11px 14px; border-radius: 16px; background: rgba(255,255,255,0.04); margin-bottom: 11px; border: 1px solid rgba(255,255,255,0.05); }
.lp-row:last-child { margin-bottom: 0; }
.lp-row-left { display: flex; align-items: center; gap: 13px; }
.lp-flag { font-size: 21px; }
.lp-name { font-size: 13px; font-weight: 500; color: rgba(255,255,255,0.75); }
.lp-method { font-size: 12px; color: rgba(255,255,255,0.28); margin-top: 1px; }
.lp-amount { font-family: 'Fraunces', serif; font-size: 21px; color: var(--white); }
.lp-status { font-size: 11px; font-weight: 600; padding: 4px 11px; border-radius: 100px; margin-top: 3px; display: block; text-align: right; }
.s-paid { background: rgba(42,107,74,0.2); color: #5CC98A; }
.s-due  { background: rgba(196,98,45,0.2); color: var(--terra-light); }

/* Bottom of left panel */
.login-left-footer {
  position: relative; z-index: 1;
  font-size: 13px; color: rgba(255,255,255,0.25);
}
.login-left-footer a { color: rgba(255,255,255,0.4); text-decoration: none; }
.login-left-footer a:hover { color: rgba(255,255,255,0.7); }

/* ── RIGHT PANEL ── */
.login-right {
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  padding: 60px 64px;
  min-height: 100vh;
}

.login-card {
  width: 100%; max-width: 480px;
}

.login-card-header { margin-bottom: 36px; }
.login-card-header h1 { font-size: 32px; color: var(--text-dark); margin-bottom: 11px; letter-spacing: -0.02em; }
.login-card-header p { font-size: 21px; color: var(--text-mid); font-weight: 300; }
.login-card-header p a { color: var(--terra); text-decoration: none; font-weight: 500; }
.login-card-header p a:hover { text-decoration: underline; }

/* SSO buttons */
.sso-buttons { display: flex; flex-direction: column; gap: 13px; margin-bottom: 30px; }
.sso-btn {
  display: flex; align-items: center; justify-content: center; gap: 26px;
  width: 100%; padding: 16px 20px; border-radius: 16px;
  border: 1px solid var(--cream-dark); background: var(--white);
  font-family: 'Outfit', sans-serif; font-size: 15px; font-weight: 500;
  color: var(--text-dark); cursor: pointer; transition: all 0.2s; text-decoration: none;
}
.sso-btn:hover { border-color: var(--text-light); background: var(--cream); }
.sso-icon { font-size: 21px; }

/* Divider */
.divider {
  display: flex; align-items: center; gap: 18px; margin-bottom: 30px;
}
.divider-line { flex: 1; height: 1px; background: var(--cream-dark); }
.divider-text { font-size: 12px; color: var(--text-light); font-weight: 400; white-space: nowrap; }

/* Form */
.login-form { display: flex; flex-direction: column; gap: 26px; }

.form-group { display: flex; flex-direction: column; gap: 13px; }
.form-group label {
  font-size: 19px; font-weight: 500; color: var(--text-dark);
  display: flex; justify-content: space-between; align-items: center;
}
.form-group label a { font-size: 21px; color: var(--terra); text-decoration: none; font-weight: 400; }
.form-group label a:hover { text-decoration: underline; }

.form-input {
  padding: 16px 20px; border-radius: 16px;
  border: 1px solid var(--cream-dark); background: var(--cream);
  font-family: 'Outfit', sans-serif; font-size: 21px; color: var(--text-dark);
  outline: none; transition: border-color 0.2s, background 0.2s; width: 100%;
}
.form-input:focus { border-color: var(--terra); background: var(--white); box-shadow: 0 0 0 3px rgba(196,98,45,0.08); }
.form-input::placeholder { color: var(--text-light); }

/* Password wrapper */
.password-wrap { position: relative; }
.password-wrap .form-input { padding-right: 44px; }
.password-toggle {
  position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
  background: none; border: none; cursor: pointer; font-size: 19px;
  color: var(--text-light); padding: 4px;
}
.password-toggle:hover { color: var(--text-mid); }

/* Error state */
.form-error { display: none; font-size: 19px; color: #C0392B; margin-top: -4px; }
.form-input.error { border-color: #C0392B; }

.form-submit {
  padding: 18px; border-radius: 13px; background: var(--terra); color: var(--white);
  font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 600;
  border: none; cursor: pointer; transition: all 0.2s; width: 100%; margin-top: 4px;
}
.form-submit:hover { background: var(--terra-light); transform: translateY(-1px); }
.form-submit:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

/* Bottom links */
.login-bottom { margin-top: 36px; text-align: center; }
.login-bottom p { font-size: 13px; color: var(--text-light); margin-bottom: 26px; }
.login-bottom p a { color: var(--terra); text-decoration: none; font-weight: 500; }
.login-bottom p a:hover { text-decoration: underline; }
.login-legal { display: flex; gap: 26px; justify-content: center; flex-wrap: wrap; }
.login-legal a { font-size: 12px; color: var(--text-light); text-decoration: none; }
.login-legal a:hover { color: var(--text-mid); }

/* ── FORGOT PASSWORD VIEW ── */
#forgotView { display: none; }
.back-btn {
  display: inline-flex; align-items: center; gap: 13px;
  font-size: 14px; color: var(--text-mid); background: none; border: none;
  cursor: pointer; padding: 0; margin-bottom: 30px; font-family: 'Outfit', sans-serif;
  transition: color 0.2s;
}
.back-btn:hover { color: var(--text-dark); }

/* ── MOBILE ── */
@media (max-width: 768px) {
  body { grid-template-columns: 1fr; }
  .login-left { display: none; }
  .login-right { padding: 60px 32px; }
}
</style>
@endpush

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
