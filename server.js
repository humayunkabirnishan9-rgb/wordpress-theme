const express = require('express');
const path = require('path');
const fs = require('fs');

const app = express();
const PORT = process.env.PORT || 3000;
const HOST = '0.0.0.0';

// Ensure zip exists
if (!fs.existsSync(path.join(__dirname, 'bluewireseo.zip'))) {
  try {
    require('./build.js');
  } catch (e) {
    console.error('Error running build.js:', e);
  }
}

// Serve static assets
app.use('/assets', express.static(path.join(__dirname, 'assets')));
app.use('/style.css', express.static(path.join(__dirname, 'style.css')));
app.use('/bluewireseo.zip', express.static(path.join(__dirname, 'bluewireseo.zip')));
app.use(express.static(path.join(__dirname, 'public')));

// Helper to wrap pages with the top preview bar and theme header/footer
function renderThemeLayout(title, contentHtml, activeNav = '') {
  const logoSvg = fs.existsSync(path.join(__dirname, 'assets/images/logo.svg'))
    ? fs.readFileSync(path.join(__dirname, 'assets/images/logo.svg'), 'utf8')
    : '<span style="font-weight:800; font-size:20px; color:#0F1B3D;">BlueWire<span style="color:#2563EB;">SEO</span></span>';

  const logoWhiteSvg = fs.existsSync(path.join(__dirname, 'assets/images/logo-white.svg'))
    ? fs.readFileSync(path.join(__dirname, 'assets/images/logo-white.svg'), 'utf8')
    : '<span style="font-weight:800; font-size:20px; color:#FFFFFF;">BlueWire<span style="color:#60A5FA;">SEO</span></span>';

  return `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>${title} — BlueWireSEO</title>
  <meta name="description" content="Custom production-ready WordPress theme for BlueWireSEO featuring Elementor integration, CPTs, and full site architecture.">
  <meta property="og:title" content="${title} — BlueWireSEO">
  <meta property="og:description" content="Semantic SEO and Technical SEO for US commercial businesses.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/style.css">
  <style>
    /* Theme Preview Control Bar */
    .bws-preview-bar {
      background: #0B132B;
      color: #FFFFFF;
      padding: 8px 16px;
      font-size: 13px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
      border-bottom: 2px solid #2563EB;
      position: sticky;
      top: 0;
      z-index: 10000;
    }
    .bws-preview-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(37,99,235,0.25);
      border: 1px solid #2563EB;
      padding: 3px 8px;
      border-radius: 4px;
      font-weight: 600;
      font-size: 11px;
      letter-spacing: 0.04em;
    }
    .bws-preview-controls {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .bws-preview-select {
      background: #1C2541;
      color: #FFFFFF;
      border: 1px solid #3A506B;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 12px;
      cursor: pointer;
    }
    .bws-preview-dl {
      background: #2563EB;
      color: #FFFFFF;
      text-decoration: none;
      padding: 5px 12px;
      border-radius: 4px;
      font-weight: 600;
      font-size: 12px;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: background 0.2s;
    }
    .bws-preview-dl:hover {
      background: #1D4ED8;
    }
  </style>
</head>
<body class="bws-theme-preview">

  <!-- Interactive Studio Bar -->
  <div class="bws-preview-bar">
    <div style="display:flex; align-items:center; gap:10px;">
      <span class="bws-preview-badge">WORDPRESS THEME PREVIEW</span>
      <span><strong>BlueWireSEO</strong> v1.0.0 &bull; Elementor Ready</span>
    </div>
    <div class="bws-preview-controls">
      <label for="pageNav" style="color:#A0AEC0; font-size:12px;">Browse Template:</label>
      <select id="pageNav" class="bws-preview-select" onchange="window.location.href=this.value">
        <option value="/" ${activeNav === 'home' ? 'selected' : ''}>Home Page (front-page.php)</option>
        <option value="/about" ${activeNav === 'about' ? 'selected' : ''}>About (page-templates/about.php)</option>
        <option value="/services" ${activeNav === 'services' ? 'selected' : ''}>Services Archive (archive-bws_service.php)</option>
        <option value="/services/semantic-seo" ${activeNav === 'single-service' ? 'selected' : ''}>Single Service (single-bws_service.php)</option>
        <option value="/industries" ${activeNav === 'industries' ? 'selected' : ''}>Industries Archive (archive-bws_industry.php)</option>
        <option value="/industries/ooh-billboard" ${activeNav === 'single-industry' ? 'selected' : ''}>Single Industry (single-bws_industry.php)</option>
        <option value="/case-studies" ${activeNav === 'case-studies' ? 'selected' : ''}>Case Studies Archive (archive-bws_case_study.php)</option>
        <option value="/case-studies/regional-ooh-billboard-seo" ${activeNav === 'single-case-study' ? 'selected' : ''}>Single Case Study (single-bws_case_study.php)</option>
        <option value="/portfolio" ${activeNav === 'portfolio' ? 'selected' : ''}>Portfolio Archive (archive-bws_portfolio.php)</option>
        <option value="/process" ${activeNav === 'process' ? 'selected' : ''}>Process Framework (page-templates/process.php)</option>
        <option value="/contact" ${activeNav === 'contact' ? 'selected' : ''}>Contact Page (page-templates/contact.php)</option>
        <option value="/free-seo-audit" ${activeNav === 'audit' ? 'selected' : ''}>Free SEO Audit (page-templates/free-seo-audit.php)</option>
        <option value="/404" ${activeNav === '404' ? 'selected' : ''}>404 Not Found (404.php)</option>
      </select>
      <a href="/bluewireseo.zip" download="bluewireseo.zip" class="bws-preview-dl">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
        Download Theme ZIP
      </a>
    </div>
  </div>

  <!-- WordPress Theme Topbar -->
  <div class="bws-topbar" role="banner">
    <div class="bws-container bws-topbar-inner">
      <a href="/free-seo-audit" class="bws-topbar-cta">
        Free SEO audit for OOH and billboard companies
        <svg class="bws-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
      </a>
      <div class="bws-topbar-contact">
        <a href="mailto:nishan@bluewireseo.com" style="display:flex; align-items:center; gap:6px; color:rgba(255,255,255,0.8); text-decoration:none;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          <span>nishan@bluewireseo.com</span>
        </a>
        <a href="tel:+8801927497396" style="display:flex; align-items:center; gap:6px; color:rgba(255,255,255,0.8); text-decoration:none;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.61 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <span>+8801927497396</span>
        </a>
      </div>
    </div>
  </div>

  <!-- WordPress Theme Header -->
  <header class="bws-header" id="bws-header" role="banner">
    <div class="bws-container bws-header-inner">
      <a href="/" class="bws-logo" rel="home" style="display:flex; align-items:center; text-decoration:none;">
        ${logoSvg}
      </a>

      <!-- Desktop Navigation -->
      <nav class="bws-nav" id="bws-nav" role="navigation" aria-label="Primary Navigation">
        <ul class="bws-nav-list">
          <li class="bws-nav-item ${activeNav === 'home' ? 'current-menu-item' : ''}"><a href="/">Home</a></li>
          <li class="bws-nav-item ${activeNav.includes('service') ? 'current-menu-item' : ''}">
            <a href="/services">Services</a>
            <div class="bws-dropdown">
              <a href="/services/semantic-seo">Semantic SEO</a>
              <a href="/services">Technical SEO</a>
              <a href="/services">Local SEO &amp; GBP</a>
              <a href="/services">SEO Audit</a>
              <a href="/services">Content &amp; Entity SEO</a>
              <a href="/services">Link Building</a>
            </div>
          </li>
          <li class="bws-nav-item ${activeNav.includes('industr') ? 'current-menu-item' : ''}"><a href="/industries">Industries</a></li>
          <li class="bws-nav-item ${activeNav.includes('case-stud') ? 'current-menu-item' : ''}"><a href="/case-studies">Case Studies</a></li>
          <li class="bws-nav-item ${activeNav === 'portfolio' ? 'current-menu-item' : ''}"><a href="/portfolio">Portfolio</a></li>
          <li class="bws-nav-item ${activeNav === 'process' ? 'current-menu-item' : ''}"><a href="/process">Process</a></li>
          <li class="bws-nav-item ${activeNav === 'about' ? 'current-menu-item' : ''}"><a href="/about">About</a></li>
        </ul>
      </nav>

      <!-- Header Action Buttons -->
      <div class="bws-header-actions">
        <a href="/contact" class="bws-btn bws-btn-outline bws-btn-sm">Contact</a>
        <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-sm">Get Free Audit</a>
      </div>

      <!-- Mobile Toggle -->
      <button class="bws-mobile-toggle" id="bws-mobile-toggle" aria-expanded="false" aria-label="Toggle mobile menu">
        <svg class="icon-menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        <svg class="icon-close" hidden xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </button>
    </div>
  </header>

  <!-- Mobile Drawer -->
  <nav class="bws-mobile-nav" id="bws-mobile-nav" hidden>
    <ul class="bws-mobile-nav-list">
      <li><a href="/">Home</a></li>
      <li><a href="/services">Services</a></li>
      <li><a href="/industries">Industries</a></li>
      <li><a href="/case-studies">Case Studies</a></li>
      <li><a href="/portfolio">Portfolio</a></li>
      <li><a href="/process">Process</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/contact">Contact</a></li>
    </ul>
    <div class="bws-mobile-nav-actions">
      <a href="/contact" class="bws-btn bws-btn-outline">Contact</a>
      <a href="/free-seo-audit" class="bws-btn bws-btn-primary">Get Free Audit</a>
    </div>
  </nav>

  <!-- Page Content -->
  ${contentHtml}

  <!-- WordPress Theme Footer -->
  <footer class="bws-footer" id="bws-footer" role="contentinfo">
    <div class="bws-container">
      <div class="bws-footer-grid">
        <div class="bws-footer-brand">
          <div class="bws-footer-logo" style="margin-bottom:1rem;">
            ${logoWhiteSvg}
          </div>
          <p class="bws-footer-desc">
            Semantic SEO and technical SEO agency serving US commercial businesses. Remote-first, based out of Bangladesh, delivering data-backed organic revenue.
          </p>
          <div class="bws-footer-contact">
            <a href="mailto:nishan@bluewireseo.com" style="display:flex; align-items:center; gap:8px;">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              <span>nishan@bluewireseo.com</span>
            </a>
            <a href="tel:+8801927497396" style="display:flex; align-items:center; gap:8px;">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.61 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              <span>+8801927497396</span>
            </a>
          </div>
        </div>

        <div class="bws-footer-col">
          <h4 class="bws-footer-col-title">Services</h4>
          <ul class="bws-footer-nav">
            <li><a href="/services/semantic-seo">Semantic SEO</a></li>
            <li><a href="/services">Technical SEO</a></li>
            <li><a href="/services">Local SEO &amp; GBP</a></li>
            <li><a href="/services">SEO Audit</a></li>
            <li><a href="/services">Content &amp; Entity SEO</a></li>
            <li><a href="/services">Link Building</a></li>
          </ul>
        </div>

        <div class="bws-footer-col">
          <h4 class="bws-footer-col-title">Industries</h4>
          <ul class="bws-footer-nav">
            <li><a href="/industries/ooh-billboard">OOH &amp; Billboard SEO</a></li>
            <li><a href="/industries">Multi-site &amp; Portfolio SEO</a></li>
            <li><a href="/industries">B2B Service Business SEO</a></li>
            <li><a href="/industries">All Industries</a></li>
          </ul>
        </div>

        <div class="bws-footer-col">
          <h4 class="bws-footer-col-title">Company</h4>
          <ul class="bws-footer-nav">
            <li><a href="/about">About</a></li>
            <li><a href="/process">Process</a></li>
            <li><a href="/case-studies">Case Studies</a></li>
            <li><a href="/portfolio">Portfolio</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div>
      </div>

      <div class="bws-footer-bottom">
        <p class="bws-footer-copyright">&copy; ${new Date().getFullYear()} BlueWireSEO. All rights reserved.</p>
        <div class="bws-footer-legal">
          <a href="/about">Privacy Policy</a>
          <a href="/about">Terms of Service</a>
          <a href="/bluewireseo.zip" download="bluewireseo.zip" style="color:#60A5FA; font-weight:600;">Download Theme ZIP</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- WhatsApp Floating Button -->
  <a href="https://wa.me/8801927497396?text=Hello%20BlueWireSEO" class="bws-whatsapp" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp" title="Chat on WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
  </a>

  <script src="/assets/js/main.js"></script>
</body>
</html>`;
}

// 1. Home Page Route
app.get('/', (req, res) => {
  const content = `
    <!-- Hero Section -->
    <section class="bws-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); min-height: 620px; display: flex; align-items: center; position: relative; overflow: hidden; padding: 5rem 0;">
      <div class="bws-container" style="position: relative; z-index: 2;">
        <div style="max-width: 780px;">
          <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(37, 99, 235, 0.15); border: 1px solid rgba(37, 99, 235, 0.35); padding: 0.35rem 0.85rem; border-radius: 9999px; margin-bottom: 1.25rem;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #60A5FA; display: inline-block;"></span>
            <span class="bws-eyebrow" style="color: #93C5FD; margin: 0; font-size: 0.8125rem;">SEMANTIC SEO FOR US BUSINESSES</span>
          </div>
          <h1 class="bws-hero-title" style="color: #FFFFFF; font-size: clamp(2.5rem, 5.5vw, 4rem); line-height: 1.12; margin-bottom: 1.5rem; letter-spacing: -0.03em;">
            SEO that connects your brand to the buyers already searching for you.
          </h1>
          <p class="bws-hero-subtitle" style="color: rgba(255, 255, 255, 0.8); font-size: clamp(1.0625rem, 2vw, 1.25rem); line-height: 1.65; max-width: 680px; margin-bottom: 2.25rem;">
            Guaranteed traffic, semantic, technical and local SEO updating that helps you rank in any major US city. Brands specialising in OOH billboard advertising, digital, transit and more.
          </p>
          <div class="bws-hero-actions" style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
            <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg" style="box-shadow: 0 4px 14px rgba(37,99,235,0.4);">
              Get Free Audit
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a href="/contact" class="bws-btn bws-btn-outline-white bws-btn-lg">Book a 30-min Call</a>
          </div>
          <div style="margin-top: 3.5rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.12); display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 1.5rem;">
            <div>
              <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">100% Data-Backed</div>
              <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem;">Verified GSC &amp; GA4 sources cited</div>
            </div>
            <div>
              <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">OOH &amp; Billboard</div>
              <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem;">Specialized market architecture</div>
            </div>
            <div>
              <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">Remote-First</div>
              <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem;">Serving US commercial clients</div>
            </div>
            <div>
              <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">Zero Generic Retainers</div>
              <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem;">Compounding commercial outcomes</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Problems Section -->
    <section class="bws-section" style="background: var(--bws-white);">
      <div class="bws-container">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 3.5rem;">
          <p class="bws-eyebrow">THE PROBLEM</p>
          <h2 style="margin-bottom: 1rem;">Why most SEO reports never turn into leads.</h2>
          <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">Traditional agency retainers prioritize surface metrics over buyer intent. Here is where search investments break down:</p>
        </div>
        <div class="bws-grid-3" style="gap: 2rem;">
          <div class="bws-card" style="border: 1px solid var(--bws-border); padding: 2rem; border-radius: var(--bws-radius-lg);">
            <div class="bws-service-card-icon" style="background: rgba(239, 68, 68, 0.1); color: #EF4444; margin-bottom: 1.25rem;">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="24" height="24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
            </div>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Keywords Without Intent</h3>
            <p style="font-size: 0.9375rem; color: var(--bws-text-secondary); line-height: 1.65;">Agencies celebrate rankings for high-volume keywords that your prospective commercial buyers never search. Traffic metrics climb while inbound sales calls remain flat.</p>
          </div>
          <div class="bws-card" style="border: 1px solid var(--bws-border); padding: 2rem; border-radius: var(--bws-radius-lg);">
            <div class="bws-service-card-icon" style="background: rgba(245, 158, 11, 0.1); color: #F59E0B; margin-bottom: 1.25rem;">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            </div>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Silent Technical Bottlenecks</h3>
            <p style="font-size: 0.9375rem; color: var(--bws-text-secondary); line-height: 1.65;">Crawl budget waste, broken entity hierarchy, canonical conflicts, and JavaScript rendering blockers remain invisible to standard audits while preventing your core pages from indexing.</p>
          </div>
          <div class="bws-card" style="border: 1px solid var(--bws-border); padding: 2rem; border-radius: var(--bws-radius-lg);">
            <div class="bws-service-card-icon" style="background: rgba(37, 99, 235, 0.1); color: var(--bws-primary); margin-bottom: 1.25rem;">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
            </div>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Reports Without Context</h3>
            <p style="font-size: 0.9375rem; color: var(--bws-text-secondary); line-height: 1.65;">Automated 50-page PDF reports filled with vanity graphs that never cite time periods, data sources, competitor benchmarks, or real qualified inquiries.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Overview -->
    <section class="bws-section" style="background: var(--bws-light-bg);">
      <div class="bws-container">
        <div style="text-align: center; max-width: 660px; margin: 0 auto 3.5rem;">
          <p class="bws-eyebrow">WHAT WE DO</p>
          <h2 style="margin-bottom: 1rem;">SEO services that compound over time.</h2>
          <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">Every service is engineered to build topical authority and commercial capture across your market footprint.</p>
        </div>
        <div class="bws-grid-3">
          <article class="bws-service-card">
            <div class="bws-service-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            </div>
            <p class="bws-eyebrow" style="margin-bottom: 0.5rem; font-size: 0.75rem;">CORE ARCHITECTURE</p>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.625rem;"><a href="/services/semantic-seo" style="color: inherit; text-decoration: none;">Semantic SEO</a></h3>
            <p style="font-size: 0.9rem; margin-bottom: 1.25rem; color: var(--bws-text-secondary); line-height: 1.6;">Entity-based topical clustering, schema graph design, and structured content models that teach search engines exactly what your business is authoritative in.</p>
            <a href="/services/semantic-seo" class="bws-link-arrow">Learn More &rarr;</a>
          </article>
          <article class="bws-service-card">
            <div class="bws-service-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            </div>
            <p class="bws-eyebrow" style="margin-bottom: 0.5rem; font-size: 0.75rem;">PERFORMANCE &amp; CRAWL</p>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.625rem;"><a href="/services" style="color: inherit; text-decoration: none;">Technical SEO</a></h3>
            <p style="font-size: 0.9rem; margin-bottom: 1.25rem; color: var(--bws-text-secondary); line-height: 1.6;">Deep crawl optimization, Core Web Vitals remediation, JavaScript rendering, indexation controls, and canonical integrity for enterprise directories.</p>
            <a href="/services" class="bws-link-arrow">Learn More &rarr;</a>
          </article>
          <article class="bws-service-card">
            <div class="bws-service-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
            </div>
            <p class="bws-eyebrow" style="margin-bottom: 0.5rem; font-size: 0.75rem;">GEO EXPANSION</p>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.625rem;"><a href="/services" style="color: inherit; text-decoration: none;">Local SEO &amp; GBP</a></h3>
            <p style="font-size: 0.9rem; margin-bottom: 1.25rem; color: var(--bws-text-secondary); line-height: 1.6;">Multi-market Google Business Profile management, localized landing page hierarchy, geo-signals, and local pack capture across every major US metro.</p>
            <a href="/services" class="bws-link-arrow">Learn More &rarr;</a>
          </article>
        </div>
        <div style="text-align: center; margin-top: 2.5rem;">
          <a href="/services" class="bws-btn bws-btn-outline">View All Services &rarr;</a>
        </div>
      </div>
    </section>

    <!-- Case Studies / Verified Results -->
    <section class="bws-section" style="background: var(--bws-white);">
      <div class="bws-container">
        <div style="text-align: center; max-width: 660px; margin: 0 auto 3.5rem;">
          <p class="bws-eyebrow">RESULTS</p>
          <h2 style="margin-bottom: 1rem;">Results we can show you the source for.</h2>
          <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">No invented numbers. Every metric in these case studies is cited with the data source, analytics platform, and measurement window.</p>
        </div>
        <div class="bws-grid-3">
          <article class="bws-case-card">
            <div class="bws-case-card-tags">
              <span class="bws-card-tag tag-ooh">OOH Advertising</span>
              <span class="bws-card-tag" style="background:var(--bws-light-bg); color:var(--bws-text-muted);">Semantic + Local</span>
            </div>
            <h3 class="bws-case-card-title">+214% Organic Impressions</h3>
            <p class="bws-case-card-subtitle">Regional Billboard Media Operator</p>
            <p class="bws-case-card-desc">A regional outdoor media operator needed to rank for billboard inventory across 8 US markets. We restructured entity market pages from scratch.</p>
            <div class="bws-case-card-source">
              <span>Google Search Console (6-Month Comparison)</span>
            </div>
            <a href="/case-studies/regional-ooh-billboard-seo" class="bws-case-card-cta">Read case study &rarr;</a>
          </article>
          <article class="bws-case-card">
            <div class="bws-case-card-tags">
              <span class="bws-card-tag tag-b2b">B2B Services</span>
              <span class="bws-card-tag" style="background:var(--bws-light-bg); color:var(--bws-text-muted);">Technical + Content</span>
            </div>
            <h3 class="bws-case-card-title">38 Inbound RFPs / Month</h3>
            <p class="bws-case-card-subtitle">B2B Facility Solutions Provider</p>
            <p class="bws-case-card-desc">A commercial facility firm was generating casual traffic but zero RFPs. We restructured high-intent commercial service silos and eliminated indexation blockers.</p>
            <div class="bws-case-card-source">
              <span>GA4 + GSC Verified Tracking</span>
            </div>
            <a href="/case-studies" class="bws-case-card-cta">Read case study &rarr;</a>
          </article>
          <article class="bws-case-card">
            <div class="bws-case-card-tags">
              <span class="bws-card-tag tag-multisite">Multi-Site Brand</span>
              <span class="bws-card-tag" style="background:var(--bws-light-bg); color:var(--bws-text-muted);">Cannibalization Fix</span>
            </div>
            <h3 class="bws-case-card-title">84 Ranked Location Pages</h3>
            <p class="bws-case-card-subtitle">Multi-Market Transit Media Network</p>
            <p class="bws-case-card-desc">Severe keyword cannibalization across duplicate location pages crippled city search visibility. We resolved canonical architecture and established unique local entity signals.</p>
            <div class="bws-case-card-source">
              <span>Google Search Console Performance</span>
            </div>
            <a href="/case-studies" class="bws-case-card-cta">Read case study &rarr;</a>
          </article>
        </div>
      </div>
    </section>

    <!-- Final CTA Banner -->
    <section class="bws-cta-section">
      <div class="bws-container">
        <h2 class="bws-cta-title">Ready to see where your search visibility is leaking?</h2>
        <p class="bws-cta-text">Get a free 20-point SEO audit. Delivered within 48-72 business hours with actionable findings.</p>
        <div class="bws-cta-actions">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">Get Free Audit</a>
          <a href="/contact" class="bws-btn bws-btn-outline-white bws-btn-lg">Book a 30-min Call</a>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Home', content, 'home'));
});

// 2. About Page Route
app.get('/about', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">ABOUT BLUEWIRESEO</p>
        <h1 class="bws-hero-title">About BlueWireSEO</h1>
        <p class="bws-hero-subtitle">A technical and semantic SEO consultancy dedicated to connecting commercial US brands to high-intent decision-makers.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container">
        <div class="bws-grid-2" style="gap:3.5rem; align-items:center;">
          <div>
            <p class="bws-eyebrow">OUR MISSION</p>
            <h2 style="font-size:2.25rem; margin-bottom:1.25rem;">Search visibility built on technical precision, not agency fluff.</h2>
            <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1rem;">BlueWireSEO was founded to eliminate the disconnect between traditional SEO agency reporting and real commercial revenue. Most agencies treat search engine optimization as an exercise in keyword stuffing and vanity backlink metrics.</p>
            <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.5rem;">We approach search from a systems and engineering perspective: resolving crawl bottlenecks, structuring entity graphs that search algorithms can parse with 100% confidence, and targeting high-ticket commercial intent queries.</p>
            <div style="display:flex; gap:1rem;">
              <a href="/free-seo-audit" class="bws-btn bws-btn-primary">Request Free Audit</a>
              <a href="/contact" class="bws-btn bws-btn-outline">Contact Us</a>
            </div>
          </div>
          <div style="padding:2.5rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-lg); border:1px solid var(--bws-border);">
            <h3 style="font-size:1.25rem; margin-bottom:1.25rem;">Core Principles</h3>
            <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:1.25rem;">
              <li style="font-size:0.9375rem; color:var(--bws-text-secondary);"><strong>Entity Over Volume:</strong> We optimize for topical entity relationships rather than isolated keywords that don’t drive revenue.</li>
              <li style="font-size:0.9375rem; color:var(--bws-text-secondary);"><strong>Source Verification:</strong> Every metric and claim is validated directly with Google Search Console or Google Analytics data.</li>
              <li style="font-size:0.9375rem; color:var(--bws-text-secondary);"><strong>Remote-First Agility:</strong> Working directly with senior technical architects across US time zones with zero account manager bureaucracy.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('About Us', content, 'about'));
});

// 3. Services Archive
app.get('/services', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">WHAT WE DO</p>
        <h1 class="bws-hero-title">SEO services that compound over time.</h1>
        <p class="bws-hero-subtitle">Every service is designed to build on the last. We focus on semantic, technical, and local SEO for OOH advertising companies and B2B service businesses.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container">
        <div class="bws-grid-3">
          <article class="bws-service-card">
            <h2 style="font-size:1.25rem; margin-bottom:0.75rem;"><a href="/services/semantic-seo" style="color:inherit; text-decoration:none;">Semantic SEO</a></h2>
            <p style="font-size:0.9rem; color:var(--bws-text-secondary); margin-bottom:1.25rem;">Entity-based topical clustering, schema graph design, and structured content models.</p>
            <a href="/services/semantic-seo" class="bws-link-arrow">View Service &rarr;</a>
          </article>
          <article class="bws-service-card">
            <h2 style="font-size:1.25rem; margin-bottom:0.75rem;">Technical SEO</h2>
            <p style="font-size:0.9rem; color:var(--bws-text-secondary); margin-bottom:1.25rem;">Core Web Vitals, crawl efficiency, canonical integrity, JS rendering.</p>
            <a href="/services" class="bws-link-arrow">View Service &rarr;</a>
          </article>
          <article class="bws-service-card">
            <h2 style="font-size:1.25rem; margin-bottom:0.75rem;">Local SEO &amp; GBP</h2>
            <p style="font-size:0.9rem; color:var(--bws-text-secondary); margin-bottom:1.25rem;">Multi-location Google Business Profiles and localized market landing pages.</p>
            <a href="/services" class="bws-link-arrow">View Service &rarr;</a>
          </article>
          <article class="bws-service-card">
            <h2 style="font-size:1.25rem; margin-bottom:0.75rem;">SEO Audit</h2>
            <p style="font-size:0.9rem; color:var(--bws-text-secondary); margin-bottom:1.25rem;">Comprehensive 20-point diagnostic identifying technical bottlenecks.</p>
            <a href="/free-seo-audit" class="bws-link-arrow">View Service &rarr;</a>
          </article>
          <article class="bws-service-card">
            <h2 style="font-size:1.25rem; margin-bottom:0.75rem;">Content &amp; Entity SEO</h2>
            <p style="font-size:0.9rem; color:var(--bws-text-secondary); margin-bottom:1.25rem;">Intent-mapped commercial content clusters eliminating cannibalization.</p>
            <a href="/services" class="bws-link-arrow">View Service &rarr;</a>
          </article>
          <article class="bws-service-card">
            <h2 style="font-size:1.25rem; margin-bottom:0.75rem;">Link Building</h2>
            <p style="font-size:0.9rem; color:var(--bws-text-secondary); margin-bottom:1.25rem;">Contextual editorial links and digital PR that build genuine domain trust.</p>
            <a href="/services" class="bws-link-arrow">View Service &rarr;</a>
          </article>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Services', content, 'services'));
});

// 4. Single Service Detail
app.get('/services/semantic-seo', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">CORE ARCHITECTURE</p>
        <h1 class="bws-hero-title">Semantic SEO</h1>
        <p class="bws-hero-subtitle">Entity-based topical clustering, schema graph design, and structured content models that establish verified subject matter authority.</p>
        <div style="margin-top:1.5rem;">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary">Get Free Audit</a>
          <a href="/contact" class="bws-btn bws-btn-outline" style="margin-left:10px;">Book a Call</a>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container" style="max-width:800px;">
        <h2>Moving Beyond Traditional Keyword Stuffing</h2>
        <p style="color:var(--bws-text-secondary); line-height:1.7;">Traditional SEO relies on keyword repetition. Semantic SEO designs entity relationships and topical models aligning with Google Knowledge Graph interpretations. We design complete entity schema graphs and content clusters that establish clear topical authority across your core business services.</p>
        <h3>What Is Included:</h3>
        <ul style="line-height:1.8; color:var(--bws-text-secondary); margin-bottom:2rem;">
          <li>Entity Gap Analysis &amp; Competitor Graph Mapping</li>
          <li>Custom Nested JSON-LD Schema Architecture</li>
          <li>Topical Silos &amp; Internal Equity Flow Strategy</li>
          <li>Elimination of Keyword Cannibalization</li>
        </ul>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Semantic SEO Service', content, 'single-service'));
});

// 5. Industries Archive
app.get('/industries', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">WHO WE SERVE</p>
        <h1 class="bws-hero-title">Industry-specific SEO, not generic packages.</h1>
        <p class="bws-hero-subtitle">We specialise in industries where search intent is specific, where local and location signals matter, and where generic packages fail.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container">
        <div style="display:flex; flex-direction:column; gap:2rem;">
          <div class="bws-industry-card">
            <div class="bws-industry-card-main">
              <span class="bws-card-tag tag-ooh" style="margin-bottom:1rem;">FLAGSHIP SPECIALTY</span>
              <h2 style="font-size:1.5rem; margin-bottom:0.75rem;"><a href="/industries/ooh-billboard" style="color:inherit; text-decoration:none;">OOH &amp; Billboard Advertising</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); margin-bottom:1.5rem;">Market page architecture, billboard inventory directory indexing, and geo-targeted commercial intent pages across multi-city operating regions.</p>
              <a href="/industries/ooh-billboard" class="bws-link-arrow">Explore OOH SEO &rarr;</a>
            </div>
            <div class="bws-industry-card-features">
              <p>Specialized architectures indexing individual billboard inventory without duplicate content penalties.</p>
            </div>
          </div>
          <div class="bws-industry-card">
            <div class="bws-industry-card-main">
              <span class="bws-card-tag tag-multisite" style="margin-bottom:1rem;">MULTI-LOCATION</span>
              <h2 style="font-size:1.5rem; margin-bottom:0.75rem;">Multi-site &amp; Portfolio Brands</h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); margin-bottom:1.5rem;">Eliminating cross-location keyword cannibalization, building unified parent-child entity schemas, and scaling organic revenue across dozens of markets.</p>
              <a href="/industries" class="bws-link-arrow">Explore Multi-Site SEO &rarr;</a>
            </div>
            <div class="bws-industry-card-features">
              <p>Unified hierarchical schemas establishing definitive authority for each distinct market.</p>
            </div>
          </div>
          <div class="bws-industry-card">
            <div class="bws-industry-card-main">
              <span class="bws-card-tag tag-b2b" style="margin-bottom:1rem;">COMMERCIAL PIPELINE</span>
              <h2 style="font-size:1.5rem; margin-bottom:0.75rem;">B2B Service Businesses</h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); margin-bottom:1.5rem;">Connecting high-ticket commercial contractors and B2B professional firms directly to procurement decision-makers actively searching for solutions.</p>
              <a href="/industries" class="bws-link-arrow">Explore B2B SEO &rarr;</a>
            </div>
            <div class="bws-industry-card-features">
              <p>Conversion-optimized service silos targeting RFP and commercial search queries.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Industries', content, 'industries'));
});

// 6. Single Industry Detail
app.get('/industries/ooh-billboard', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">FLAGSHIP SPECIALTY</p>
        <h1 class="bws-hero-title">OOH &amp; Billboard Advertising SEO</h1>
        <p class="bws-hero-subtitle">Market page architecture, billboard inventory directory indexing, and geo-targeted commercial intent pages across multi-city operating regions.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container" style="max-width:800px;">
        <h2>The Unique Search Challenges of Billboard Companies</h2>
        <p style="color:var(--bws-text-secondary); line-height:1.7;">Outdoor advertising companies operate in a fiercely competitive commercial space where billboard inventory needs to be discoverable by national media buyers, regional agency planners, and local business owners. We create structured market pages that rank for high-intent queries like "billboard advertising in [city]" and "digital highway billboards [market]".</p>
        <h3>How We Win OOH Markets:</h3>
        <ul style="line-height:1.8; color:var(--bws-text-secondary);">
          <li>Indexing individual billboard inventory locations without duplicate content penalties</li>
          <li>Capturing city-level transit and billboard search queries</li>
          <li>Building dedicated market hub pages connecting location signals to inventory availability</li>
        </ul>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('OOH & Billboard SEO', content, 'single-industry'));
});

// 7. Case Studies Archive
app.get('/case-studies', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">RESULTS</p>
        <h1 class="bws-hero-title">Results we can show you the source for.</h1>
        <p class="bws-hero-subtitle">No invented numbers. Every metric in these case studies is cited with the data source, analytics platform, and measurement window.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container">
        <div class="bws-grid-3">
          <article class="bws-case-card">
            <div class="bws-case-card-tags">
              <span class="bws-card-tag tag-ooh">OOH Advertising</span>
              <span class="bws-card-tag" style="background:var(--bws-light-bg); color:var(--bws-text-muted);">Semantic + Local</span>
            </div>
            <h3 class="bws-case-card-title">+214% Organic Impressions</h3>
            <p class="bws-case-card-subtitle">Regional Billboard Media Operator</p>
            <p class="bws-case-card-desc">A regional outdoor media operator needed to rank for billboard inventory across 8 US markets. We restructured entity market pages from scratch.</p>
            <div class="bws-case-card-source">
              <span>Google Search Console (6-Month Comparison)</span>
            </div>
            <a href="/case-studies/regional-ooh-billboard-seo" class="bws-case-card-cta">Read case study &rarr;</a>
          </article>
          <article class="bws-case-card">
            <div class="bws-case-card-tags">
              <span class="bws-card-tag tag-b2b">B2B Services</span>
              <span class="bws-card-tag" style="background:var(--bws-light-bg); color:var(--bws-text-muted);">Technical + Content</span>
            </div>
            <h3 class="bws-case-card-title">38 Inbound RFPs / Month</h3>
            <p class="bws-case-card-subtitle">B2B Facility Solutions Provider</p>
            <p class="bws-case-card-desc">A commercial facility firm was generating casual traffic but zero RFPs. We restructured high-intent commercial service silos and eliminated indexation blockers.</p>
            <div class="bws-case-card-source">
              <span>GA4 + GSC Verified Tracking</span>
            </div>
            <a href="/case-studies" class="bws-case-card-cta">Read case study &rarr;</a>
          </article>
          <article class="bws-case-card">
            <div class="bws-case-card-tags">
              <span class="bws-card-tag tag-multisite">Multi-Site Brand</span>
              <span class="bws-card-tag" style="background:var(--bws-light-bg); color:var(--bws-text-muted);">Cannibalization Fix</span>
            </div>
            <h3 class="bws-case-card-title">84 Ranked Location Pages</h3>
            <p class="bws-case-card-subtitle">Multi-Market Transit Media Network</p>
            <p class="bws-case-card-desc">Severe keyword cannibalization across duplicate location pages crippled city search visibility. We resolved canonical architecture and established unique local entity signals.</p>
            <div class="bws-case-card-source">
              <span>Google Search Console Performance</span>
            </div>
            <a href="/case-studies" class="bws-case-card-cta">Read case study &rarr;</a>
          </article>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Case Studies', content, 'case-studies'));
});

// 8. Single Case Study Detail
app.get('/case-studies/regional-ooh-billboard-seo', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <span class="bws-eyebrow" style="font-size:0.75rem;">OOH ADVERTISING</span>
        <h1 class="bws-hero-title" style="margin-top:0.5rem;">+214% Organic Impressions</h1>
        <p style="font-size:1.0625rem; font-weight:600; color:var(--bws-text-secondary); margin-bottom:0.875rem;">Regional Billboard Media Group — Multi-Market SEO Architecture</p>
        <p class="bws-hero-subtitle">A regional outdoor media operator needed to rank for billboard inventory across 8 US markets. Starting from near-zero visibility, we rebuilt their entity architecture from scratch.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container">
        <div class="bws-single-layout">
          <article class="bws-content">
            <h2>The Challenge</h2>
            <p>The client operated over 400 static and digital billboard faces across 8 regional markets. However, their existing website treated billboard inventory as dynamic database filters invisible to Googlebot. They ranked for zero non-branded billboard queries in their target cities.</p>
            <h2>The Strategy</h2>
            <p>We engineered a specialized market page architecture featuring permanent canonical city hub pages, indexable market category silos, and validated Schema.org Organization and Product graphs.</p>
            <h2>The Outcome</h2>
            <p>Within six months of indexation, organic impressions surged by +214% across target metros, resulting in a 3.4x increase in qualified direct advertiser inquiries.</p>
          </article>
          <aside class="bws-single-sidebar">
            <div class="bws-info-box" style="margin-bottom:1.5rem;">
              <h3 class="bws-info-box-title">Case Study Details</h3>
              <table class="bws-facts-table">
                <tr><td>Client</td><td>Regional Outdoor Media Operator</td></tr>
                <tr><td>Industry</td><td>OOH Advertising</td></tr>
                <tr><td>Services</td><td>Semantic SEO, Local SEO</td></tr>
                <tr><td>Key Result</td><td style="color:var(--bws-primary); font-weight:700;">+214% Impressions</td></tr>
                <tr><td>Data Source</td><td>Google Search Console</td></tr>
                <tr><td>Time Period</td><td>6 Months</td></tr>
              </table>
            </div>
            <div class="bws-info-box">
              <h3 style="font-size:1rem; margin-bottom:0.75rem;">Want similar results?</h3>
              <a href="/free-seo-audit" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">Get Free Audit</a>
            </div>
          </aside>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Case Study: +214% Organic Impressions', content, 'single-case-study'));
});

// 9. Portfolio Archive
app.get('/portfolio', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">FEATURED WORK</p>
        <h1 class="bws-hero-title">Client work &amp; strategic campaigns.</h1>
        <p class="bws-hero-subtitle">Explore recent client implementations across semantic search architecture, technical optimization, and multi-location rollouts.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container">
        <div class="bws-grid-3">
          <article class="bws-case-card">
            <span class="bws-card-tag tag-ooh" style="margin-bottom:0.5rem; align-self:flex-start;">OOH Advertising</span>
            <h3 class="bws-case-card-title">Regional Billboard Inventory Platform</h3>
            <p class="bws-case-card-subtitle">Client: Regional Outdoor Media</p>
            <p class="bws-case-card-desc">Engineered multi-city inventory catalog architecture indexing over 400 billboard locations across 8 distinct US metro areas.</p>
            <div style="padding:0.4rem 0.75rem; background:var(--bws-primary-light); color:var(--bws-primary-dark); font-weight:600; border-radius:4px; font-size:13px;">+214% Organic Impressions</div>
          </article>
          <article class="bws-case-card">
            <span class="bws-card-tag tag-b2b" style="margin-bottom:0.5rem; align-self:flex-start;">B2B Services</span>
            <h3 class="bws-case-card-title">B2B Equipment Authority Silos</h3>
            <p class="bws-case-card-subtitle">Client: Commercial Facility Solutions</p>
            <p class="bws-case-card-desc">Migrated unstructured blog articles into high-converting commercial service silos with validated Schema.org graphs.</p>
            <div style="padding:0.4rem 0.75rem; background:var(--bws-primary-light); color:var(--bws-primary-dark); font-weight:600; border-radius:4px; font-size:13px;">38 Inbound RFPs / Month</div>
          </article>
          <article class="bws-case-card">
            <span class="bws-card-tag tag-multisite" style="margin-bottom:0.5rem; align-self:flex-start;">Transit Media</span>
            <h3 class="bws-case-card-title">Multi-Market Transit Directory</h3>
            <p class="bws-case-card-subtitle">Client: Metro Transit Network</p>
            <p class="bws-case-card-desc">Resolved severe keyword cannibalization across duplicate location pages by establishing city-specific geo entity signals.</p>
            <div style="padding:0.4rem 0.75rem; background:var(--bws-primary-light); color:var(--bws-primary-dark); font-weight:600; border-radius:4px; font-size:13px;">84 Ranked Market Pages</div>
          </article>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Portfolio', content, 'portfolio'));
});

// 10. Process Framework
app.get('/process', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">OUR METHODOLOGY</p>
        <h1 class="bws-hero-title">Our 4-Step SEO Framework</h1>
        <p class="bws-hero-subtitle">How we systematically diagnose, repair, and scale organic search performance for commercial websites.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container" style="max-width:860px;">
        <div style="display:flex; flex-direction:column; gap:2rem;">
          <div class="bws-card" style="padding:2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);">
            <span class="bws-card-tag tag-b2b" style="margin-bottom:0.75rem;">PHASE 1: WEEKS 1-2</span>
            <h2 style="font-size:1.5rem; margin-bottom:0.5rem;">01. Diagnostic &amp; Architectural Audit</h2>
            <p style="color:var(--bws-text-secondary); line-height:1.7;">Full 20-point technical crawl, server log analysis, Core Web Vitals profiling, and entity gap analysis against top market competitors.</p>
          </div>
          <div class="bws-card" style="padding:2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);">
            <span class="bws-card-tag tag-b2b" style="margin-bottom:0.75rem;">PHASE 2: WEEKS 3-4</span>
            <h2 style="font-size:1.5rem; margin-bottom:0.5rem;">02. Technical Remediation &amp; Indexation Control</h2>
            <p style="color:var(--bws-text-secondary); line-height:1.7;">Eliminate indexation traps, fix Core Web Vitals bottlenecks, deploy validated JSON-LD schema graphs, and optimize mobile rendering.</p>
          </div>
          <div class="bws-card" style="padding:2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);">
            <span class="bws-card-tag tag-b2b" style="margin-bottom:0.75rem;">PHASE 3: MONTHS 2-3</span>
            <h2 style="font-size:1.5rem; margin-bottom:0.5rem;">03. Semantic Clustering &amp; Topical Authority</h2>
            <p style="color:var(--bws-text-secondary); line-height:1.7;">Build high-intent commercial service silos and market landing page architectures mapped directly to decision-maker purchase stages.</p>
          </div>
          <div class="bws-card" style="padding:2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);">
            <span class="bws-card-tag tag-b2b" style="margin-bottom:0.75rem;">PHASE 4: MONTHS 4+</span>
            <h2 style="font-size:1.5rem; margin-bottom:0.5rem;">04. Market Expansion &amp; Compounding Growth</h2>
            <p style="color:var(--bws-text-secondary); line-height:1.7;">Continuous expansion into secondary US metro markets, high-tier editorial backlink acquisition, and weekly crawl monitoring.</p>
          </div>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Process Framework', content, 'process'));
});

// 11. Contact Page
app.get('/contact', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
      <div class="bws-container">
        <p class="bws-eyebrow">GET IN TOUCH</p>
        <h1 class="bws-hero-title">Contact BlueWireSEO</h1>
        <p class="bws-hero-subtitle">Tell us about your business and goals. We will review your site and respond within 24 business hours.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container">
        <div class="bws-grid-2" style="gap:3rem; align-items:start;">
          <div>
            <h2 style="font-size:1.75rem; margin-bottom:1rem;">Direct Consultation</h2>
            <p style="color:var(--bws-text-secondary); line-height:1.65; margin-bottom:2rem;">We work with founders, marketing directors, and business operators across the United States. Inquiries are reviewed directly by senior technical SEO specialists.</p>
            <div style="display:flex; flex-direction:column; gap:1.25rem;">
              <div style="padding:1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); border:1px solid var(--bws-border);">
                <div style="font-size:0.8125rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;">Email Directly</div>
                <a href="mailto:nishan@bluewireseo.com" style="font-size:1.0625rem; color:var(--bws-heading); font-weight:600; text-decoration:none;">nishan@bluewireseo.com</a>
              </div>
              <div style="padding:1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); border:1px solid var(--bws-border);">
                <div style="font-size:0.8125rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;">Phone / WhatsApp</div>
                <a href="tel:+8801927497396" style="font-size:1.0625rem; color:var(--bws-heading); font-weight:600; text-decoration:none;">+8801927497396</a>
              </div>
              <div style="padding:1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); border:1px solid var(--bws-border);">
                <div style="font-size:0.8125rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;">Operational Model</div>
                <div style="font-size:1rem; color:var(--bws-heading); font-weight:600;">Remote-First, Serving US Businesses Nationwide</div>
              </div>
            </div>
          </div>
          <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);">
            <h3 style="font-size:1.375rem; margin-bottom:0.5rem;">Send a Message</h3>
            <p style="font-size:0.875rem; color:var(--bws-text-muted); margin-bottom:1.5rem;">Or reach out directly via email at nishan@bluewireseo.com.</p>
            <form onsubmit="event.preventDefault(); this.innerHTML='<div style=\'padding:1.5rem; background:#EFF6FF; border:1px solid #93C5FD; border-radius:8px; color:#1E40AF; text-align:center; font-weight:600;\'>✓ Consultation request submitted successfully! We will respond within 24 business hours.</div>';" style="display:flex; flex-direction:column; gap:1.25rem;">
              <div>
                <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Full Name *</label>
                <input type="text" required placeholder="John Smith" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit;">
              </div>
              <div>
                <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Work Email *</label>
                <input type="email" required placeholder="john@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit;">
              </div>
              <div>
                <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Website URL</label>
                <input type="url" placeholder="https://company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit;">
              </div>
              <div>
                <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Project Details</label>
                <textarea rows="4" placeholder="Tell us about your search goals and challenges..." style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit;"></textarea>
              </div>
              <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center;">Send Consultation Request</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Contact', content, 'contact'));
});

// 12. Free SEO Audit Page
app.get('/free-seo-audit', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container" style="text-align:center; max-width:720px;">
        <p class="bws-eyebrow" style="color:#93C5FD;">FREE 20-POINT DIAGNOSTIC</p>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 5vw, 3.5rem); margin-bottom:1.25rem;">Uncover the silent leaks costing you organic revenue.</h1>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">A manual, forensic review of your website’s technical foundation, crawl efficiency, schema graphs, and topical entity authority. Delivered within 48-72 business hours.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white);">
      <div class="bws-container">
        <div class="bws-grid-2" style="gap:3.5rem; align-items:start;">
          <div>
            <h2 style="font-size:1.75rem; margin-bottom:1rem;">What You Will Receive</h2>
            <p style="color:var(--bws-text-secondary); line-height:1.65; margin-bottom:2rem;">We do not run an automated software scan that spits out generic errors. Every audit is conducted by senior technical SEOs inspecting how Google renders and indexes your commercial assets.</p>
            <div style="display:flex; flex-direction:column; gap:1.25rem;">
              <div style="display:flex; gap:1rem;">
                <div style="color:var(--bws-primary); font-weight:700;">&bull;</div>
                <div>
                  <strong>1. Technical &amp; Crawl Efficiency:</strong> Indexation bloat, crawl budget waste, redirect chains, canonical tags, and Core Web Vitals.
                </div>
              </div>
              <div style="display:flex; gap:1rem;">
                <div style="color:var(--bws-primary); font-weight:700;">&bull;</div>
                <div>
                  <strong>2. Semantic &amp; Entity Hierarchy:</strong> Topical clustering depth, schema graph validation (JSON-LD), internal link equity flow.
                </div>
              </div>
              <div style="display:flex; gap:1rem;">
                <div style="color:var(--bws-primary); font-weight:700;">&bull;</div>
                <div>
                  <strong>3. High-Intent Commercial Capture:</strong> Identification of high-ticket buyer searches your competitors are winning.
                </div>
              </div>
            </div>
          </div>
          <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);">
            <h3 style="font-size:1.375rem; margin-bottom:0.5rem;">Claim Your Free Audit</h3>
            <p style="font-size:0.875rem; color:var(--bws-text-muted); margin-bottom:1.5rem;">Delivered directly to your inbox within 48-72 business hours.</p>
            <form onsubmit="event.preventDefault(); this.innerHTML='<div style=\'padding:1.5rem; background:#EFF6FF; border:1px solid #93C5FD; border-radius:8px; color:#1E40AF; text-align:center; font-weight:600;\'>✓ Audit request submitted! We will analyze your domain and deliver the diagnostic report within 48-72 business hours.</div>';" style="display:flex; flex-direction:column; gap:1.25rem;">
              <div>
                <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Website URL to Audit *</label>
                <input type="url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit;">
              </div>
              <div>
                <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Your Name *</label>
                <input type="text" required placeholder="Jane Doe" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit;">
              </div>
              <div>
                <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Work Email *</label>
                <input type="email" required placeholder="jane@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit;">
              </div>
              <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center;">Request Free Audit &rarr;</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Free SEO Audit', content, 'audit'));
});

// 13. 404 Route
app.get('/404', (req, res) => {
  const content = `
    <div class="bws-404" style="padding:6rem 0; text-align:center;">
      <div class="bws-container">
        <div class="bws-404-code" style="font-size:6rem; font-weight:900; color:var(--bws-primary); line-height:1; margin-bottom:1rem;">404</div>
        <h1 style="font-size:clamp(1.75rem,4vw,2.75rem); margin-bottom:1rem;">Page not found</h1>
        <p style="color:var(--bws-text-muted); font-size:1.0625rem; max-width:480px; margin:0 auto 2rem;">The page you are looking for does not exist or has been moved. Let us help you find what you need.</p>
        <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
          <a href="/" class="bws-btn bws-btn-primary bws-btn-lg">Go to Homepage</a>
          <a href="/free-seo-audit" class="bws-btn bws-btn-outline bws-btn-lg">Get Free SEO Audit</a>
        </div>
      </div>
    </div>
  `;
  res.send(renderThemeLayout('Page Not Found', content, '404'));
});

app.listen(PORT, HOST, () => {
  console.log(`BlueWireSEO app running at http://${HOST}:${PORT}`);
});
