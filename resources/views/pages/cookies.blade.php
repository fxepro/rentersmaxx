<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cookie Policy — Rentersmaxx</title>
<meta name="description" content="Rentersmaxx cookie policy. What cookies we use, why, and how to manage your preferences.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --navy: #0D1F35; --navy-mid: #162d4a; --navy-border: rgba(255,255,255,0.08);
  --cream: #FAF8F3; --cream-dark: #F0EDE4;
  --terra: #C4622D; --terra-light: #d97448;
  --green: #2A6B4A; --green-pale: #E4F0EA;
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
.legal-section { margin-bottom: 56px; padding-bottom: 56px; border-bottom: 1px solid var(--cream-dark); }
.legal-section:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
.legal-section h2 { font-size: 27px; color: var(--text-dark); margin-bottom: 26px; letter-spacing: -0.01em; }
.legal-section p { font-size: 21px; color: var(--text-mid); line-height: 1.8; font-weight: 300; margin-bottom: 26px; }
.legal-section p:last-child { margin-bottom: 0; }
.legal-section ul { margin: 16px 0 16px 24px; display: flex; flex-direction: column; gap: 13px; }
.legal-section li { font-size: 21px; color: var(--text-mid); line-height: 1.7; font-weight: 300; }
.legal-section strong { color: var(--text-dark); font-weight: 600; }
.legal-section a { color: var(--terra); text-decoration: none; }
.legal-section a:hover { text-decoration: underline; }
.legal-highlight { background: var(--cream-dark); border-radius: var(--radius); padding: 26px 24px; margin: 20px 0; border-left: 3px solid var(--terra); }
.legal-highlight p { font-size: 23px; color: var(--text-dark); font-weight: 400; margin: 0; }

/* Cookie table */
.cookie-table-wrap { border-radius: var(--radius); overflow: hidden; border: 1px solid var(--cream-dark); margin: 24px 0; }
.cookie-table { width: 100%; border-collapse: collapse; font-size: 23px; }
.cookie-table th { background: var(--navy); color: rgba(255,255,255,0.7); font-size: 23px; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; padding: 16px 20px; text-align: left; }
.cookie-table td { padding: 18px 16px; border-bottom: 1px solid var(--cream-dark); color: var(--text-mid); font-weight: 300; vertical-align: top; line-height: 1.5; }
.cookie-table tr:last-child td { border-bottom: none; }
.cookie-table tr:nth-child(even) td { background: var(--cream); }
.cookie-table td:first-child { font-weight: 500; color: var(--text-dark); white-space: nowrap; }

/* Toggle controls */
.cookie-controls { display: flex; flex-direction: column; gap: 26px; margin: 24px 0; }
.cookie-toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 24px 28px; background: var(--cream-dark); border-radius: var(--radius); gap: 26px; }
.cookie-toggle-info h4 { font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--text-dark); margin-bottom: 4px; }
.cookie-toggle-info p { font-size: 19px; color: var(--text-mid); font-weight: 300; line-height: 1.5; }
.cookie-toggle { position: relative; flex-shrink: 0; }
.cookie-toggle input { opacity: 0; width: 0; height: 0; position: absolute; }
.toggle-slider { display: block; width: 44px; height: 24px; background: var(--cream-dark); border: 1px solid #ccc; border-radius: 100px; cursor: pointer; transition: all 0.2s; position: relative; }
.toggle-slider::after { content: ''; position: absolute; width: 23px; height: 23px; border-radius: 50%; background: var(--white); top: 2px; left: 2px; transition: transform 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
input:checked + .toggle-slider { background: var(--green); border-color: var(--green); }
input:checked + .toggle-slider::after { transform: translateX(20px); }
input:disabled + .toggle-slider { opacity: 0.5; cursor: not-allowed; }
.cookie-save-btn { display: inline-flex; align-items: center; padding: 16px 28px; border-radius: 16px; background: var(--terra); color: var(--white); font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; margin-top: 8px; }
.cookie-save-btn:hover { background: var(--terra-light); transform: translateY(-1px); }
.cookie-saved { display: none; font-size: 23px; color: var(--green); font-weight: 500; margin-top: 8px; }

.legal-footer-strip { background: var(--navy); padding: 52px 32px; }
.legal-footer-strip-inner { max-width: 1000px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 26px; }
.legal-footer-strip p { font-size: 19px; color: rgba(255,255,255,0.35); }
.legal-footer-links { display: flex; gap: 13px; flex-wrap: wrap; }
.legal-footer-links a { font-size: 19px; color: rgba(255,255,255,0.4); text-decoration: none; padding: 7px 14px; border-radius: 13px; transition: all 0.2s; }
.legal-footer-links a:hover { color: var(--white); background: rgba(255,255,255,0.07); }
.legal-footer-links a.active { color: var(--terra-light); }
@media (max-width: 1000px) { .rm-nav { padding: 0 20px; } .rm-nav-links, .rm-nav-cta { display: none; } .rm-hamburger { display: flex; } }
@media (max-width: 600px) { .cookie-table { font-size: 21px; } .cookie-table th, .cookie-table td { padding: 10px 12px; } }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@include('partials.nav', ['page' => 'cookies'])

<div class="legal-page">
  <div class="legal-hero">
    <div class="legal-hero-inner">
      <p class="legal-label">Legal</p>
      <h1>Cookie Policy</h1>
      <p class="legal-meta">Last updated: <span>1 May 2025</span></p>
    </div>
  </div>

  <div class="legal-body">

    <div class="legal-highlight">
      <p>We keep cookies simple. We use only what we need to run the platform securely and understand how it's being used. We do not use advertising cookies or sell data to advertisers.</p>
    </div>

    <div class="legal-section">
      <h2>What are cookies?</h2>
      <p>Cookies are small text files stored on your device when you visit a website or use a web application. They help the platform remember your session, preferences, and usage patterns. Some cookies are essential — without them the platform cannot function. Others are optional and can be declined.</p>
    </div>

    <div class="legal-section">
      <h2>Cookies we use</h2>
      <div class="cookie-table-wrap">
        <table class="cookie-table">
          <thead>
            <tr>
              <th>Cookie name</th>
              <th>Type</th>
              <th>Purpose</th>
              <th>Duration</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>rmx_session</td>
              <td>Essential</td>
              <td>Maintains your login session. Required for the platform to work.</td>
              <td>Session</td>
            </tr>
            <tr>
              <td>rmx_csrf</td>
              <td>Essential</td>
              <td>Prevents cross-site request forgery attacks. Required for security.</td>
              <td>Session</td>
            </tr>
            <tr>
              <td>rmx_locale</td>
              <td>Preference</td>
              <td>Remembers your preferred language and region settings.</td>
              <td>1 year</td>
            </tr>
            <tr>
              <td>rmx_consent</td>
              <td>Preference</td>
              <td>Stores your cookie consent preferences so we don't ask every time.</td>
              <td>1 year</td>
            </tr>
            <tr>
              <td>rmx_analytics</td>
              <td>Analytics</td>
              <td>Helps us understand which features are used and where users encounter issues. No personal data is shared with third parties.</td>
              <td>90 days</td>
            </tr>
          </tbody>
        </table>
      </div>
      <p>We do not use advertising cookies, tracking pixels, social media cookies, or any cookies that share your data with advertisers or data brokers.</p>
    </div>

    <div class="legal-section">
      <h2>Your preferences</h2>
      <p>Essential and preference cookies cannot be disabled as they are required for the platform to function. Analytics cookies are optional.</p>

      <div class="cookie-controls">
        <div class="cookie-toggle-row">
          <div class="cookie-toggle-info">
            <h4>Essential cookies</h4>
            <p>Session management and security. Required — cannot be disabled.</p>
          </div>
          <div class="cookie-toggle">
            <label><input type="checkbox" checked disabled><span class="toggle-slider"></span></label>
          </div>
        </div>
        <div class="cookie-toggle-row">
          <div class="cookie-toggle-info">
            <h4>Preference cookies</h4>
            <p>Remember your language and region settings. Disabling these means re-selecting your preferences on each visit.</p>
          </div>
          <div class="cookie-toggle">
            <label><input type="checkbox" checked id="prefCookie"><span class="toggle-slider"></span></label>
          </div>
        </div>
        <div class="cookie-toggle-row">
          <div class="cookie-toggle-info">
            <h4>Analytics cookies</h4>
            <p>Help us improve the platform by understanding feature usage. No personal data shared externally.</p>
          </div>
          <div class="cookie-toggle">
            <label><input type="checkbox" checked id="analyticsCookie"><span class="toggle-slider"></span></label>
          </div>
        </div>
      </div>

      <button class="cookie-save-btn" onclick="savePrefs()">Save preferences</button>
      <p class="cookie-saved" id="savedMsg">✓ Preferences saved</p>
    </div>

    <div class="legal-section">
      <h2>Managing cookies in your browser</h2>
      <p>You can also manage or delete cookies directly through your browser settings. Note that disabling cookies through your browser may affect the functionality of the Rentersmaxx platform.</p>
      <ul>
        <li><strong>Chrome:</strong> Settings → Privacy and Security → Cookies and other site data</li>
        <li><strong>Firefox:</strong> Settings → Privacy &amp; Security → Cookies and Site Data</li>
        <li><strong>Safari:</strong> Preferences → Privacy → Manage Website Data</li>
        <li><strong>Edge:</strong> Settings → Cookies and site permissions</li>
      </ul>
    </div>

    <div class="legal-section">
      <h2>Changes to this policy</h2>
      <p>We may update this cookie policy when we change the cookies we use. The date at the top of this page reflects the last update. For material changes, we will notify users via the platform or email.</p>
      <p>Questions about our use of cookies? <a href="{{ url('/contact') }}">Contact us</a> or email <a href="mailto:privacy@rentersmaxx.com">privacy@rentersmaxx.com</a>.</p>
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

function savePrefs() {
  const saved = document.getElementById('savedMsg');
  saved.style.display = 'block';
  setTimeout(() => { saved.style.display = 'none'; }, 3000);
}
</script>
</body>
</html>
