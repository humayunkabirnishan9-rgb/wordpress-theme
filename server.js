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

// Explicit zip download endpoints with Content-Disposition attachment
app.get('/bluewireseo.zip', (req, res) => {
  const zipPath = path.join(__dirname, 'bluewireseo.zip');
  res.download(zipPath, 'bluewireseo.zip');
});
app.get('/download', (req, res) => {
  const zipPath = path.join(__dirname, 'bluewireseo.zip');
  res.download(zipPath, 'bluewireseo.zip');
});

// Serve static assets
app.use('/assets', express.static(path.join(__dirname, 'assets')));
app.use('/style.css', express.static(path.join(__dirname, 'style.css')));
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
              <a href="/services/technical-seo">Technical SEO</a>
              <a href="/services/local-seo">Local SEO &amp; GBP</a>
              <a href="/services/seo-audit">SEO Audit</a>
              <a href="/services/content-entity-seo">Content &amp; Entity SEO</a>
              <a href="/services/link-building">Link Building</a>
            </div>
          </li>
          <li class="bws-nav-item ${activeNav.includes('industr') ? 'current-menu-item' : ''}">
            <a href="/industries">Industries</a>
            <div class="bws-dropdown">
              <a href="/industries/ooh-billboard">OOH &amp; Billboard SEO</a>
              <a href="/industries">Multi-Site &amp; Portfolio</a>
              <a href="/industries">B2B Service Businesses</a>
            </div>
          </li>
          <li class="bws-nav-item ${activeNav.includes('case-stud') ? 'current-menu-item' : ''}"><a href="/case-studies">Case Studies</a></li>
          <li class="bws-nav-item ${activeNav === 'portfolio' ? 'current-menu-item' : ''}"><a href="/portfolio">Portfolio</a></li>
          <li class="bws-nav-item ${activeNav === 'process' ? 'current-menu-item' : ''}"><a href="/process">Process</a></li>
          <li class="bws-nav-item ${activeNav === 'about' ? 'current-menu-item' : ''}"><a href="/about">About</a></li>
          <li class="bws-nav-item ${activeNav === 'blog' ? 'current-menu-item' : ''}"><a href="/blog">Blog</a></li>
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
      <li><a href="/blog">Blog</a></li>
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
            Semantic SEO and technical SEO agency engineered for high-growth commercial enterprises. Delivering verified, data-backed organic revenue across US markets.
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
            <li><a href="/services/technical-seo">Technical SEO</a></li>
            <li><a href="/services/local-seo">Local SEO &amp; GBP</a></li>
            <li><a href="/services/seo-audit">SEO Audit</a></li>
            <li><a href="/services/content-entity-seo">Content &amp; Entity SEO</a></li>
            <li><a href="/services/link-building">Link Building</a></li>
          </ul>
        </div>

        <div class="bws-footer-col">
          <h4 class="bws-footer-col-title">Industries</h4>
          <ul class="bws-footer-nav">
            <li><a href="/industries/ooh-billboard">OOH &amp; Billboard SEO</a></li>
            <li><a href="/industries">Multi-site &amp; Portfolio</a></li>
            <li><a href="/industries">B2B Service Businesses</a></li>
            <li><a href="/industries">All Industries</a></li>
          </ul>
        </div>

        <div class="bws-footer-col">
          <h4 class="bws-footer-col-title">Company</h4>
          <ul class="bws-footer-nav">
            <li><a href="/about">About Us</a></li>
            <li><a href="/process">Process Framework</a></li>
            <li><a href="/case-studies">Case Studies</a></li>
            <li><a href="/portfolio">Portfolio</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div>

        <div class="bws-footer-col">
          <h4 class="bws-footer-col-title">Resources</h4>
          <ul class="bws-footer-nav">
            <li><a href="/blog">Blog &amp; Insights</a></li>
            <li><a href="/free-seo-audit">Free 20-Point Audit</a></li>
            <li><a href="/about">Privacy Policy</a></li>
            <li><a href="/about">Terms of Service</a></li>
            <li><a href="/bluewireseo.zip" download="bluewireseo.zip" style="color:#60A5FA; font-weight:600;">Download Theme ZIP</a></li>
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
              <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">US Enterprise Focus</div>
              <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem;">Serving commercial clients nationwide</div>
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
              <li style="font-size:0.9375rem; color:var(--bws-text-secondary);"><strong>Senior Technical Leadership:</strong> Direct strategic execution by seasoned SEO architects with zero account manager bureaucracy.</li>
            </ul>
          </div>
        </div>

        <!-- Founder Profile Section -->
        <div style="margin-top:4.5rem; padding:3rem 2.5rem; background:linear-gradient(135deg, #0F1B3D 0%, #16244C 100%); border-radius:var(--bws-radius-lg); color:#FFFFFF;">
          <div style="display:grid; grid-template-columns:auto 1fr; gap:2.5rem; align-items:center;">
            <div style="width:110px; height:110px; border-radius:50%; background:linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%); display:flex; align-items:center; justify-content:center; font-size:2.25rem; font-weight:800; color:#FFFFFF; border:4px solid rgba(255,255,255,0.15); flex-shrink:0;">
              HKN
            </div>
            <div>
              <span class="bws-card-tag" style="background:rgba(96,165,250,0.2); color:#93C5FD; border:1px solid rgba(147,197,253,0.3); font-size:0.75rem; padding:0.25rem 0.65rem; margin-bottom:0.75rem;">FOUNDER &amp; LEAD ARCHITECT</span>
              <h3 style="font-size:1.75rem; color:#FFFFFF; margin-bottom:0.35rem;">Humayun Kabir Nishan</h3>
              <p style="font-size:0.95rem; color:#60A5FA; font-weight:600; margin-bottom:1rem;">Founder &amp; Principal SEO Architect</p>
              <p style="font-size:0.95rem; color:rgba(255,255,255,0.85); line-height:1.7; max-width:820px; margin-bottom:1.5rem;">
                BlueWireSEO was founded by Humayun Kabir Nishan to provide commercial enterprises with deep, code-level search engineering. Nishan specializes in semantic entity graph modeling, technical crawl optimization, and enterprise local search systems that convert organic visibility into measurable pipeline value for US businesses.
              </p>
              <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
                <a href="/contact" class="bws-btn bws-btn-primary bws-btn-sm">Schedule Strategy Discussion &rarr;</a>
                <a href="/case-studies" class="bws-btn bws-btn-outline-white bws-btn-sm">Explore Client Proof</a>
              </div>
            </div>
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
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <p class="bws-eyebrow" style="color:#93C5FD;">CORE ARCHITECTURAL CAPABILITIES</p>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem);">SEO services that compound over time.</h1>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; max-width:760px;">Every service is designed to build upon the last. We engineer semantic, technical, and local search architectures for commercial US enterprises with verifiable ROI.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container">
        <div class="bws-grid-3">
          <article class="bws-service-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag tag-b2b" style="margin-bottom:0.75rem;">TOPICAL AUTHORITY</span>
              <h2 style="font-size:1.375rem; margin-bottom:0.75rem;"><a href="/services/semantic-seo" style="color:inherit; text-decoration:none;">Semantic SEO</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem;">Entity-based topical clustering, schema graph design, and structured content models that establish verified subject matter authority.</p>
            </div>
            <a href="/services/semantic-seo" class="bws-link-arrow">Explore Semantic SEO &rarr;</a>
          </article>
          <article class="bws-service-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag tag-ooh" style="margin-bottom:0.75rem;">CODE-LEVEL ARCHITECTURE</span>
              <h2 style="font-size:1.375rem; margin-bottom:0.75rem;"><a href="/services/technical-seo" style="color:inherit; text-decoration:none;">Technical SEO</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem;">Core Web Vitals optimization, crawl budget efficiency, canonical integrity, JavaScript rendering remediation, and server log diagnostics.</p>
            </div>
            <a href="/services/technical-seo" class="bws-link-arrow">Explore Technical SEO &rarr;</a>
          </article>
          <article class="bws-service-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag tag-multisite" style="margin-bottom:0.75rem;">LOCALIZED DOMINANCE</span>
              <h2 style="font-size:1.375rem; margin-bottom:0.75rem;"><a href="/services/local-seo" style="color:inherit; text-decoration:none;">Local SEO &amp; GBP</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem;">Multi-location Google Business Profiles and localized market landing pages capturing high-intent commercial buyers in regional territories.</p>
            </div>
            <a href="/services/local-seo" class="bws-link-arrow">Explore Local SEO &rarr;</a>
          </article>
          <article class="bws-service-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag" style="background:#FEF3C7; color:#B45309; margin-bottom:0.75rem;">FORENSIC DIAGNOSTIC</span>
              <h2 style="font-size:1.375rem; margin-bottom:0.75rem;"><a href="/services/seo-audit" style="color:inherit; text-decoration:none;">SEO Audit</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem;">Comprehensive 20-point diagnostic identifying technical bottlenecks, indexation bloat, and hidden crawl traps leaking revenue.</p>
            </div>
            <a href="/services/seo-audit" class="bws-link-arrow">Explore SEO Audit &rarr;</a>
          </article>
          <article class="bws-service-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag tag-b2b" style="margin-bottom:0.75rem;">CONTENT ARCHITECTURE</span>
              <h2 style="font-size:1.375rem; margin-bottom:0.75rem;"><a href="/services/content-entity-seo" style="color:inherit; text-decoration:none;">Content &amp; Entity SEO</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem;">Intent-mapped commercial content silos and authoritative knowledge hubs engineered to attract and convert enterprise decision-makers.</p>
            </div>
            <a href="/services/content-entity-seo" class="bws-link-arrow">Explore Content SEO &rarr;</a>
          </article>
          <article class="bws-service-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag tag-ooh" style="margin-bottom:0.75rem;">DIGITAL PR &amp; TRUST</span>
              <h2 style="font-size:1.375rem; margin-bottom:0.75rem;"><a href="/services/link-building" style="color:inherit; text-decoration:none;">Link Building</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem;">Contextual editorial links, brand entity mentions, and digital PR placements that build genuine domain trust with zero spam risk.</p>
            </div>
            <a href="/services/link-building" class="bws-link-arrow">Explore Link Building &rarr;</a>
          </article>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Services', content, 'services'));
});

// Helper for rendering rich, intent-wise designed Individual Service Pages
function renderServiceDetailPage(data) {
  return `
    <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem; position:relative; overflow:hidden;">
      <div style="position:absolute; top:-80px; right:-80px; width:450px; height:450px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.2) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>
      <div class="bws-container" style="position:relative; z-index:2;">
        <nav class="bws-breadcrumbs" aria-label="Breadcrumbs" style="font-size:0.875rem; margin-bottom:1.25rem;">
          <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <a href="/services" style="color:rgba(255,255,255,0.7); text-decoration:none;">Services</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <span style="color:#93C5FD; font-weight:600;">${data.title}</span>
        </nav>
        <div style="max-width:820px;">
          <span class="bws-card-tag" style="background:rgba(37,99,235,0.25); color:#93C5FD; border:1px solid rgba(147,197,253,0.3); font-size:0.75rem; padding:0.3rem 0.75rem; font-weight:700;">
            ${data.eyebrow}
          </span>
          <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin:0.85rem 0 1rem;">
            ${data.title}
          </h1>
          <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:740px; margin-bottom:1.75rem;">
            ${data.subtitle}
          </p>
          <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
            <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">
              Request Free 20-Point Audit &rarr;
            </a>
            <a href="/contact" class="bws-btn bws-btn-outline-white bws-btn-lg">
              Schedule Strategic Consultation
            </a>
          </div>
        </div>
      </div>
    </div>

    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container">
        <div class="bws-single-layout" style="display:grid; grid-template-columns: 2.2fr 1fr; gap:3.5rem; align-items:start;">
          <div>
            <!-- Google Search Console Verified Proof Showcase -->
            <div style="margin-bottom:3rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); overflow:hidden; background:var(--bws-white); box-shadow:var(--bws-shadow-md);">
              <div style="background:#0F1B3D; color:#FFFFFF; padding:0.85rem 1.5rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; font-weight:700;">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:#60A5FA; width:18px; height:18px; flex-shrink:0;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                  <span>Google Search Console Telemetry: ${data.title}</span>
                </div>
                <span style="font-size:0.75rem; background:rgba(37,99,235,0.4); padding:0.25rem 0.6rem; border-radius:4px; color:#93C5FD; font-weight:600;">
                  VERIFIED COMMERCIAL BENCHMARK
                </span>
              </div>
              <div style="padding:1.75rem; background:#FFFFFF;">
                <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:1rem; margin-bottom:1.25rem;">
                  <div style="padding:1rem; background:#EFF6FF; border:1px solid #BFDBFE; border-radius:8px; text-align:center;">
                    <div style="font-size:0.75rem; color:#1E40AF; font-weight:600; text-transform:uppercase;">Crawl Efficiency</div>
                    <div style="font-size:1.5rem; font-weight:800; color:#2563EB; margin-top:0.25rem;">100%</div>
                    <div style="font-size:0.7rem; color:#64748B;">Zero Bot Traps</div>
                  </div>
                  <div style="padding:1rem; background:#F0FDF4; border:1px solid #BBF7D0; border-radius:8px; text-align:center;">
                    <div style="font-size:0.75rem; color:#166534; font-weight:600; text-transform:uppercase;">Average GSC Lift</div>
                    <div style="font-size:1.5rem; font-weight:800; color:#10B981; margin-top:0.25rem;">${data.gscLift || '+248%'}</div>
                    <div style="font-size:0.7rem; color:#64748B;">Within 6-9 Months</div>
                  </div>
                  <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; text-align:center;">
                    <div style="font-size:0.75rem; color:#334155; font-weight:600; text-transform:uppercase;">Entity Authority</div>
                    <div style="font-size:1.5rem; font-weight:800; color:#0F1B3D; margin-top:0.25rem;">100% Valid</div>
                    <div style="font-size:0.7rem; color:#64748B;">Schema Knowledge Graph</div>
                  </div>
                </div>
                <p style="font-size:0.875rem; color:#64748B; line-height:1.6; margin:0;">
                  Every campaign executed under this service framework is benchmarked directly inside Google Search Console and GA4 with weekly crawl telemetry to ensure non-volatile ranking gains.
                </p>
              </div>
            </div>

            <!-- Service Deep Dive -->
            <article class="bws-content" style="font-size:1.0625rem; line-height:1.75; margin-bottom:3rem;">
              <h2 style="font-size:1.75rem; color:var(--bws-heading); margin-bottom:1rem;">How ${data.title} Solves Commercial Search Growth</h2>
              <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.5rem;">
                ${data.deepDive}
              </p>

              <h3 style="font-size:1.375rem; color:var(--bws-heading); margin:2rem 0 1rem;">Core Engineering Deliverables</h3>
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:2.5rem;">
                ${data.deliverables.map(del => `
                  <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                    <div style="font-weight:700; color:#0F1B3D; margin-bottom:0.35rem; display:flex; align-items:center; gap:0.4rem;">
                      <span style="color:#2563EB;">✓</span> ${del.title}
                    </div>
                    <p style="font-size:0.85rem; color:#64748B; line-height:1.5; margin:0;">${del.desc}</p>
                  </div>
                `).join('')}
              </div>

              <h3 style="font-size:1.375rem; color:var(--bws-heading); margin:2rem 0 1rem;">Target Commercial Profile</h3>
              <div style="padding:1.5rem; background:#EFF6FF; border:1px solid #BFDBFE; border-radius:8px; margin-bottom:2.5rem;">
                <h4 style="font-size:1rem; color:#1E40AF; margin-bottom:0.5rem;">Who This Service Is Engineered For:</h4>
                <p style="font-size:0.9375rem; color:#1E3A8A; line-height:1.65; margin:0;">
                  ${data.targetAudience}
                </p>
              </div>

              <!-- In-Page Strategic Lead Intake -->
              <div id="service-lead-intake" style="padding:2.5rem; background:#F8FAFC; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); margin-top:3rem;">
                <h3 style="font-size:1.375rem; color:var(--bws-heading); margin-bottom:0.5rem;">Request Consultation for ${data.title}</h3>
                <p style="font-size:0.875rem; color:var(--bws-text-muted); margin-bottom:1.5rem;">
                  Provide your website URL to receive a technical review from our senior architects within 24 business hours.
                </p>
                <form onsubmit="event.preventDefault(); this.innerHTML='<div style=\\'padding:1.25rem; background:#F0FDF4; border:1px solid #BBF7D0; border-radius:6px; color:#166534; font-weight:600; text-align:center;\\'>✓ Request received! Our strategy team will evaluate your domain and follow up within 24 business hours.</div>';" style="display:flex; flex-direction:column; gap:1rem;">
                  <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                    <input type="text" required placeholder="Full Name" style="padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:6px; font-family:inherit; font-size:0.9rem;">
                    <input type="email" required placeholder="Work Email" style="padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:6px; font-family:inherit; font-size:0.9rem;">
                  </div>
                  <input type="url" required placeholder="Website URL (e.g. https://yourcompany.com)" style="padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:6px; font-family:inherit; font-size:0.9rem;">
                  <textarea rows="3" placeholder="Current search bottlenecks or target market objectives..." style="padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:6px; font-family:inherit; font-size:0.9rem;"></textarea>
                  <button type="submit" class="bws-btn bws-btn-primary" style="justify-content:center; font-weight:700;">
                    Submit Strategic Intake Request &rarr;
                  </button>
                </form>
              </div>
            </article>
          </div>

          <!-- Sticky Sidebar -->
          <aside class="bws-single-sidebar">
            <div class="bws-info-box" style="margin-bottom:1.5rem;">
              <h3 class="bws-info-box-title">Service Specifications</h3>
              <table class="bws-facts-table">
                <tr><td>Focus</td><td style="font-weight:600; color:var(--bws-heading);">${data.title}</td></tr>
                <tr><td>Verification</td><td>Google Search Console</td></tr>
                <tr><td>Reporting</td><td>Weekly Crawl Telemetry</td></tr>
                <tr><td>Implementation</td><td>Direct Senior Architect</td></tr>
                <tr><td>Timeline</td><td>90-Day Enterprise Sprints</td></tr>
              </table>
            </div>

            <div class="bws-info-box" style="margin-bottom:1.5rem; background:linear-gradient(135deg, #0F1B3D 0%, #16244C 100%); color:#FFFFFF;">
              <h3 style="font-size:1.125rem; color:#FFFFFF; margin-bottom:0.75rem;">Free 20-Point SEO Audit</h3>
              <p style="font-size:0.875rem; color:rgba(255,255,255,0.8); line-height:1.6; margin-bottom:1.25rem;">
                Let our senior technical team uncover the invisible code-level leaks costing your business organic search revenue.
              </p>
              <a href="/free-seo-audit" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">
                Claim Free Audit &rarr;
              </a>
            </div>

            <div class="bws-info-box">
              <h3 class="bws-info-box-title">Explore Related Services</h3>
              <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:0.75rem; font-size:0.875rem;">
                <li><a href="/services/semantic-seo" style="color:var(--bws-primary); text-decoration:none; font-weight:600;">&bull; Semantic SEO Architecture</a></li>
                <li><a href="/services/technical-seo" style="color:var(--bws-primary); text-decoration:none; font-weight:600;">&bull; Technical SEO Remediation</a></li>
                <li><a href="/services/local-seo" style="color:var(--bws-primary); text-decoration:none; font-weight:600;">&bull; Local SEO &amp; Multi-Location GBP</a></li>
                <li><a href="/services/seo-audit" style="color:var(--bws-primary); text-decoration:none; font-weight:600;">&bull; Forensic 20-Point SEO Audit</a></li>
                <li><a href="/services/content-entity-seo" style="color:var(--bws-primary); text-decoration:none; font-weight:600;">&bull; Content &amp; Entity SEO</a></li>
                <li><a href="/services/link-building" style="color:var(--bws-primary); text-decoration:none; font-weight:600;">&bull; High-Authority Link Building</a></li>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </section>
  `;
}

// 4. Individual Service Routes
app.get('/services/semantic-seo', (req, res) => {
  const data = {
    title: 'Semantic SEO Architecture',
    eyebrow: 'CORE TOPICAL AUTHORITY',
    subtitle: 'Entity-based topical clustering, nested schema graph design, and structured content models that establish verified subject matter authority.',
    gscLift: '+284%',
    deepDive: 'Most SEO agencies still treat Google as a simple keyword matching system. Modern Google evaluates search through semantic entities and knowledge graphs. We model your business assets, service silos, and commercial solutions into structured schema graphs that Googlebot can parse with 100% confidence, establishing permanent topical dominance.',
    deliverables: [
      { title: 'Entity Gap Analysis', desc: 'Comprehensive competitor entity graph reverse-engineering across target search verticals.' },
      { title: 'Nested JSON-LD Schema', desc: 'Custom organization, service, and local business knowledge graphs deployed at code level.' },
      { title: 'Topical Authority Silos', desc: 'Structured internal PageRank routing preventing keyword cannibalization.' },
      { title: 'Knowledge Graph Disambiguation', desc: 'Direct alignment with Google Knowledge Graph entities and authoritative third-party nodes.' }
    ],
    targetAudience: 'Commercial B2B enterprises, billboard and outdoor advertising operators, multi-location professional service firms, and high-growth companies whose current rankings suffer from keyword cannibalization or low entity trust.'
  };
  res.send(renderThemeLayout('Semantic SEO Architecture', renderServiceDetailPage(data), 'services'));
});

app.get('/services/technical-seo', (req, res) => {
  const data = {
    title: 'Technical SEO & Crawl Remediation',
    eyebrow: 'CODE-LEVEL INFRASTRUCTURE',
    subtitle: 'Eliminating indexation bloat, server response lag, JavaScript rendering roadblocks, and Core Web Vitals bottlenecks.',
    gscLift: '+310%',
    deepDive: 'A beautiful website is worthless if search engine bots struggle to crawl, render, and index your commercial pages. We conduct forensic server log analysis, resolve JavaScript hydration bottlenecks, enforce canonical integrity, and optimize Core Web Vitals to ensure 100% crawl efficiency for your high-intent assets.',
    deliverables: [
      { title: 'Crawl Budget Optimization', desc: 'Forensic server log analysis to identify and eliminate crawl waste and bot traps.' },
      { title: 'Core Web Vitals Tuning', desc: 'Direct code-level optimization of LCP, INP, and CLS performance metrics.' },
      { title: 'JavaScript Rendering Remediation', desc: 'Ensuring Googlebot renders dynamic content without client-side execution delays.' },
      { title: 'Canonical & Redirect Audits', desc: 'Elimination of redirect chains, infinite query loops, and multi-version domain conflicts.' }
    ],
    targetAudience: 'High-traffic commercial portals, multi-regional websites, SaaS web applications, and large catalog architectures suffering from crawl lag or indexation volatility.'
  };
  res.send(renderThemeLayout('Technical SEO & Crawl Remediation', renderServiceDetailPage(data), 'services'));
});

app.get('/services/local-seo', (req, res) => {
  const data = {
    title: 'Local SEO & Multi-Location GBP',
    eyebrow: 'GEOGRAPHIC DOMINANCE',
    subtitle: 'Scaled Google Business Profile optimization, localized landing page architecture, and geo-entity alignment across commercial US territories.',
    gscLift: '+340%',
    deepDive: 'For outdoor media companies, regional service contractors, and multi-branch commercial businesses, winning the local map pack in high-value territories directly drives commercial inquiries. We engineer scalable local page architectures and structured GBP profiles that establish undeniable geographic relevance.',
    deliverables: [
      { title: 'Multi-Location GBP Management', desc: 'Verification, category optimization, and review velocity governance across all locations.' },
      { title: 'Geo-Faceted Market Hubs', desc: 'City-specific landing page architectures mapped to localized commercial intent queries.' },
      { title: 'NAP Citation Integrity', desc: 'Cleansing and synchronizing local business data across Tier-1 aggregator networks.' },
      { title: 'Local Entity Schema', desc: 'Hyper-local JSON-LD schemas tying physical coordinates to regional service areas.' }
    ],
    targetAudience: 'Outdoor billboard operators with multi-market inventory, commercial contractors operating across US metro areas, and multi-location professional service networks.'
  };
  res.send(renderThemeLayout('Local SEO & Multi-Location GBP', renderServiceDetailPage(data), 'services'));
});

app.get('/services/seo-audit', (req, res) => {
  const data = {
    title: 'Forensic 20-Point Technical SEO Audit',
    eyebrow: 'DEEP DIAGNOSTIC INSPECTION',
    subtitle: 'A manual, forensic review of your website’s technical foundation, crawl efficiency, schema graphs, and topical entity authority.',
    gscLift: '+190%',
    deepDive: 'We do not run an automated scan that generates a 50-page PDF of generic errors. Our audits are conducted manually by senior technical architects who inspect raw HTML, HTTP headers, server logs, and Google Search Console coverage reports to uncover the exact issues suppressing your organic growth.',
    deliverables: [
      { title: '20-Point Technical Crawl', desc: 'Inspection of indexation traps, response codes, orphan URLs, and rendering bottlenecks.' },
      { title: 'Schema Graph Completeness', desc: 'Validation of all structured data against Google Rich Result and Knowledge Graph standards.' },
      { title: 'Commercial Keyword Mapping', desc: 'Identification of missed high-intent search terms currently captured by competitors.' },
      { title: 'Prioritized Action Blueprint', desc: 'A step-by-step engineering roadmap ranked by commercial revenue impact.' }
    ],
    targetAudience: 'Founders, CMOs, and marketing directors preparing for a redesign, experiencing unexplained organic declines, or looking to validate their agency’s performance.'
  };
  res.send(renderThemeLayout('Forensic SEO Audit', renderServiceDetailPage(data), 'services'));
});

app.get('/services/content-entity-seo', (req, res) => {
  const data = {
    title: 'Content & Entity SEO Architecture',
    eyebrow: 'COMMERCIAL INTENT MAPPING',
    subtitle: 'Intent-mapped commercial content silos and authoritative knowledge hubs engineered to attract high-ticket enterprise buyers.',
    gscLift: '+220%',
    deepDive: 'Publishing random blog posts does not generate enterprise pipeline. We architect commercial content silos where every piece of content satisfies a distinct stage in the commercial buyer’s procurement journey, while passing PageRank equity into your high-converting service landing pages.',
    deliverables: [
      { title: 'Search Intent Modeling', desc: 'Mapping search intent to procurement stages: informational, commercial, and transactional.' },
      { title: 'Entity-Dense Briefs', desc: 'Content specifications engineered with verified topical entities, semantic co-occurrences, and schema markup.' },
      { title: 'Cannibalization Cleansing', desc: 'Consolidating conflicting articles into unified, high-authority pillar pages.' },
      { title: 'Internal Linking Matrix', desc: 'Engineered contextual equity distribution driving link juice to revenue-critical assets.' }
    ],
    targetAudience: 'B2B commercial firms and growth-stage companies with large volumes of content that generate vanity traffic but fail to produce qualified sales conversations.'
  };
  res.send(renderThemeLayout('Content & Entity SEO Architecture', renderServiceDetailPage(data), 'services'));
});

app.get('/services/link-building', (req, res) => {
  const data = {
    title: 'High-Authority Link Building & Digital PR',
    eyebrow: 'CONTEXTUAL TRUST SIGNALS',
    subtitle: 'Contextual editorial links, brand entity mentions, and digital PR placements that establish genuine domain trust with zero spam risk.',
    gscLift: '+265%',
    deepDive: 'Search algorithms evaluate the contextual relevance and editorial integrity of incoming backlinks. We execute targeted outreach to industry trade publications, regional commercial authorities, and established news outlets, securing contextual backlinks that Google values permanently.',
    deliverables: [
      { title: 'Editorial Outreach', desc: '100% manual outreach to vetted commercial publications, trade journals, and local media.' },
      { title: 'Digital PR & Data Studies', desc: 'Creation of original industry research and data assets that earn natural editorial citations.' },
      { title: 'Brand Entity Mentions', desc: 'Building unlinked and linked brand citations that reinforce Google Knowledge Graph presence.' },
      { title: 'Toxic Profile Remediation', desc: 'Auditing legacy backlink profiles and disavowing manipulative links that trigger algorithmic penalties.' }
    ],
    targetAudience: 'Established commercial brands operating in competitive search verticals where code-level optimization must be supported by top-tier domain trust signals.'
  };
  res.send(renderThemeLayout('Link Building & Digital PR', renderServiceDetailPage(data), 'services'));
});

app.get('/services/ecommerce-seo', (req, res) => {
  const data = {
    title: 'E-commerce & High-SKU Search Architecture',
    eyebrow: 'CATALOG SCALE OPTIMIZATION',
    subtitle: 'Faceted navigation optimization, product entity schemas, and category silo architectures for high-SKU commercial catalogs.',
    gscLift: '+325%',
    deepDive: 'Large e-commerce catalogs create exponential crawl traps through faceted filters, parameter combinations, and duplicate product variations. We engineer clean canonical frameworks and nested Product schema graphs that maximize indexation efficiency and product snippet visibility.',
    deliverables: [
      { title: 'Faceted Search Optimization', desc: 'Controlling indexation of search filters and parameter URLs to prevent crawl budget exhaustion.' },
      { title: 'Product & Offer Schema', desc: 'Deploying complete Product, AggregateRating, and Offer JSON-LD graphs for rich Google snippets.' },
      { title: 'Category Silo Hierarchies', desc: 'Structuring logical product category hierarchies that capture high-volume commercial intent.' },
      { title: 'Out-of-Stock Handling', desc: 'Implementing algorithmic URL preservation strategies for seasonal and discontinued inventory.' }
    ],
    targetAudience: 'Commercial B2B distributors, direct-to-consumer e-commerce brands, and catalog platforms with thousands of dynamic product URLs.'
  };
  res.send(renderThemeLayout('E-commerce Search Architecture', renderServiceDetailPage(data), 'services'));
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
              <h2 style="font-size:1.5rem; margin-bottom:0.75rem;"><a href="/industries/multi-site-portfolio" style="color:inherit; text-decoration:none;">Multi-site &amp; Portfolio Brands</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); margin-bottom:1.5rem;">Eliminating cross-location keyword cannibalization, building unified parent-child entity schemas, and scaling organic revenue across dozens of markets.</p>
              <a href="/industries/multi-site-portfolio" class="bws-link-arrow">Explore Multi-Site SEO &rarr;</a>
            </div>
            <div class="bws-industry-card-features">
              <p>Unified hierarchical schemas establishing definitive authority for each distinct market.</p>
            </div>
          </div>
          <div class="bws-industry-card">
            <div class="bws-industry-card-main">
              <span class="bws-card-tag tag-b2b" style="margin-bottom:1rem;">COMMERCIAL PIPELINE</span>
              <h2 style="font-size:1.5rem; margin-bottom:0.75rem;"><a href="/industries/b2b-service-business" style="color:inherit; text-decoration:none;">B2B Service Businesses</a></h2>
              <p style="font-size:0.9375rem; color:var(--bws-text-secondary); margin-bottom:1.5rem;">Connecting high-ticket commercial contractors and B2B professional firms directly to procurement decision-makers actively searching for solutions.</p>
              <a href="/industries/b2b-service-business" class="bws-link-arrow">Explore B2B SEO &rarr;</a>
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

// 6. Single Industry Details
app.get('/industries/ooh-billboard', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <nav class="bws-breadcrumbs" aria-label="Breadcrumbs" style="font-size:0.875rem; margin-bottom:1.25rem;">
          <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <a href="/industries" style="color:rgba(255,255,255,0.7); text-decoration:none;">Industries</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <span style="color:#93C5FD; font-weight:600;">OOH &amp; Billboard SEO</span>
        </nav>
        <p class="bws-eyebrow" style="color:#93C5FD;">FLAGSHIP SPECIALTY</p>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem);">OOH &amp; Billboard Advertising SEO</h1>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem;">Market page architecture, billboard inventory directory indexing, and geo-targeted commercial intent pages across multi-city operating regions.</p>
        <div style="margin-top:1.5rem;">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">Request OOH Audit &rarr;</a>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container" style="max-width:800px;">
        <h2>The Unique Search Challenges of Billboard Companies</h2>
        <p style="color:var(--bws-text-secondary); line-height:1.7;">Outdoor advertising companies operate in a fiercely competitive commercial space where billboard inventory needs to be discoverable by national media buyers, regional agency planners, and local business owners. We create structured market pages that rank for high-intent queries like "billboard advertising in [city]" and "digital highway billboards [market]".</p>
        <h3>How We Win OOH Markets:</h3>
        <ul style="line-height:1.8; color:var(--bws-text-secondary); margin-bottom:2rem;">
          <li>Indexing individual billboard inventory locations without duplicate content penalties</li>
          <li>Capturing city-level transit and billboard search queries</li>
          <li>Building dedicated market hub pages connecting location signals to inventory availability</li>
          <li>Deploying specialized LocalBusiness and Product JSON-LD schemas</li>
        </ul>
        <div style="padding:1.5rem; background:#F8FAFC; border:1px solid var(--bws-border); border-radius:8px;">
          <h3 style="margin-bottom:0.5rem;">Proven OOH Performance</h3>
          <p style="color:var(--bws-text-secondary); margin-bottom:1rem;">See how we grew organic impressions by +214% for a regional billboard operator across 8 distinct US metro areas.</p>
          <a href="/case-studies/regional-ooh-billboard-seo" class="bws-link-arrow">Read Regional Billboard Case Study &rarr;</a>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('OOH & Billboard SEO', content, 'industries'));
});

app.get('/industries/multi-site-portfolio', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <nav class="bws-breadcrumbs" aria-label="Breadcrumbs" style="font-size:0.875rem; margin-bottom:1.25rem;">
          <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <a href="/industries" style="color:rgba(255,255,255,0.7); text-decoration:none;">Industries</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <span style="color:#93C5FD; font-weight:600;">Multi-Site &amp; Portfolio Brands</span>
        </nav>
        <p class="bws-eyebrow" style="color:#93C5FD;">ENTERPRISE MULTI-LOCATION</p>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem);">Multi-Site &amp; Portfolio Brand SEO</h1>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem;">Eliminating cross-location keyword cannibalization, building unified parent-child entity schemas, and scaling organic revenue across dozens of regional markets.</p>
        <div style="margin-top:1.5rem;">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">Request Multi-Site Audit &rarr;</a>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container" style="max-width:800px;">
        <h2>Scaling Geographic Authority Without Cannibalization</h2>
        <p style="color:var(--bws-text-secondary); line-height:1.7;">When a business operates across multiple cities or manages a portfolio of related brands, search engines frequently confuse regional signals, causing internal pages to compete against each other and suppress overall rankings. We establish clean parent-child canonical structures and unique localized content layers.</p>
        <h3>Our Multi-Location Framework:</h3>
        <ul style="line-height:1.8; color:var(--bws-text-secondary); margin-bottom:2rem;">
          <li>Hierarchical city hub and neighborhood satellite page architecture</li>
          <li>Centralized Google Business Profile verification and citation audit</li>
          <li>Distinct geo-entity signals preventing duplicate content suppression</li>
          <li>Cross-domain PageRank governance for holding companies and acquired brands</li>
        </ul>
        <div style="padding:1.5rem; background:#F8FAFC; border:1px solid var(--bws-border); border-radius:8px;">
          <h3 style="margin-bottom:0.5rem;">Transit Media Portfolio Case Study</h3>
          <p style="color:var(--bws-text-secondary); margin-bottom:1rem;">Discover how we resolved cannibalization for a national transit network, landing 84 location pages on page 1 of Google.</p>
          <a href="/case-studies/multi-location-gbp-expansion" class="bws-link-arrow">Read Multi-Location Case Study &rarr;</a>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Multi-Site & Portfolio SEO', content, 'industries'));
});

app.get('/industries/b2b-service-business', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <nav class="bws-breadcrumbs" aria-label="Breadcrumbs" style="font-size:0.875rem; margin-bottom:1.25rem;">
          <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <a href="/industries" style="color:rgba(255,255,255,0.7); text-decoration:none;">Industries</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <span style="color:#93C5FD; font-weight:600;">B2B Service Businesses</span>
        </nav>
        <p class="bws-eyebrow" style="color:#93C5FD;">COMMERCIAL PIPELINE GENERATION</p>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem);">B2B Service Business SEO</h1>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem;">Connecting high-ticket commercial contractors, equipment providers, and B2B professional firms directly to procurement decision-makers actively searching for solutions.</p>
        <div style="margin-top:1.5rem;">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">Request B2B Audit &rarr;</a>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container" style="max-width:800px;">
        <h2>Turning Search Into Commercial Inbound RFPs</h2>
        <p style="color:var(--bws-text-secondary); line-height:1.7;">B2B buyers do not search like consumers. They use precise, jargon-dense terminology, evaluate vendor capabilities thoroughly, and require clear proof of operational capacity before submitting an inquiry. We design high-intent commercial service silos that speak directly to commercial decision-makers.</p>
        <h3>How We Drive B2B Pipeline:</h3>
        <ul style="line-height:1.8; color:var(--bws-text-secondary); margin-bottom:2rem;">
          <li>Commercial procurement intent mapping replacing low-intent consumer queries</li>
          <li>Authoritative capability silos detailing specifications and commercial SLAs</li>
          <li>Integration of case studies and verified performance proof inside service pages</li>
          <li>Conversion-engineered lead intake flows optimized for corporate buyers</li>
        </ul>
        <div style="padding:1.5rem; background:#F8FAFC; border:1px solid var(--bws-border); border-radius:8px;">
          <h3 style="margin-bottom:0.5rem;">Commercial Facility Solutions Case Study</h3>
          <p style="color:var(--bws-text-secondary); margin-bottom:1rem;">Learn how we generated 38 monthly inbound enterprise RFPs for a B2B commercial facility supplier.</p>
          <a href="/case-studies/b2b-saas-semantic-search" class="bws-link-arrow">Read B2B Case Study &rarr;</a>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('B2B Service Business SEO', content, 'industries'));
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
            <a href="/case-studies/b2b-saas-semantic-search" class="bws-case-card-cta">Read case study &rarr;</a>
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
            <a href="/case-studies/multi-location-gbp-expansion" class="bws-case-card-cta">Read case study &rarr;</a>
          </article>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Case Studies', content, 'case-studies'));
});

// 8. Single Case Study Routes
app.get('/case-studies/regional-ooh-billboard-seo', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <nav class="bws-breadcrumbs" aria-label="Breadcrumbs" style="font-size:0.875rem; margin-bottom:1.25rem;">
          <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <a href="/case-studies" style="color:rgba(255,255,255,0.7); text-decoration:none;">Case Studies</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <span style="color:#93C5FD; font-weight:600;">Regional Billboard SEO</span>
        </nav>
        <span class="bws-card-tag tag-ooh" style="margin-bottom:0.75rem;">OOH ADVERTISING</span>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.25rem); margin-top:0.5rem;">+214% Organic Impressions</h1>
        <p style="font-size:1.125rem; font-weight:600; color:#93C5FD; margin-bottom:0.875rem;">Regional Billboard Media Group — Multi-Market SEO Architecture</p>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:760px;">A regional outdoor media operator needed to rank for billboard inventory across 8 US markets. Starting from near-zero visibility, we rebuilt their entity architecture from scratch.</p>
        <div style="margin-top:1.5rem;">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">Request Similar Audit &rarr;</a>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container">
        <div class="bws-single-layout" style="display:grid; grid-template-columns:2.2fr 1fr; gap:3.5rem; align-items:start;">
          <article class="bws-content" style="font-size:1.0625rem; line-height:1.75;">
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
              <a href="/free-seo-audit" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">Get Free Audit &rarr;</a>
            </div>
          </aside>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Case Study: +214% Organic Impressions', content, 'case-studies'));
});

app.get('/case-studies/b2b-saas-semantic-search', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <nav class="bws-breadcrumbs" aria-label="Breadcrumbs" style="font-size:0.875rem; margin-bottom:1.25rem;">
          <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <a href="/case-studies" style="color:rgba(255,255,255,0.7); text-decoration:none;">Case Studies</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <span style="color:#93C5FD; font-weight:600;">B2B Commercial RFPs</span>
        </nav>
        <span class="bws-card-tag tag-b2b" style="margin-bottom:0.75rem;">B2B COMMERCIAL SERVICES</span>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.25rem); margin-top:0.5rem;">38 Inbound RFPs / Month</h1>
        <p style="font-size:1.125rem; font-weight:600; color:#93C5FD; margin-bottom:0.875rem;">Commercial Facility Solutions Provider — Semantic Content Silos</p>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:760px;">Restructuring unstructured blog traffic into dedicated procurement-intent service silos, resulting in 38 monthly inbound proposals.</p>
        <div style="margin-top:1.5rem;">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">Request Strategic Audit &rarr;</a>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container">
        <div class="bws-single-layout" style="display:grid; grid-template-columns:2.2fr 1fr; gap:3.5rem; align-items:start;">
          <article class="bws-content" style="font-size:1.0625rem; line-height:1.75;">
            <h2>The Challenge</h2>
            <p>The client was publishing 15+ informational blog posts monthly, garnering vanity impressions from student researchers and casual browsers, but generating less than 2 qualified commercial leads per quarter.</p>
            <h2>The Strategy</h2>
            <p>We sunset thin informational posts, consolidated overlapping concepts into 6 high-density commercial service silos, and implemented nested B2B Organization and Service JSON-LD schema graphs.</p>
            <h2>The Outcome</h2>
            <p>Commercial organic traffic converted at 4.2%, delivering 38 qualified inbound enterprise RFPs per month with an average contract value exceeding $45,000.</p>
          </article>
          <aside class="bws-single-sidebar">
            <div class="bws-info-box" style="margin-bottom:1.5rem;">
              <h3 class="bws-info-box-title">Case Study Details</h3>
              <table class="bws-facts-table">
                <tr><td>Client</td><td>Commercial Facility Provider</td></tr>
                <tr><td>Industry</td><td>B2B Facilities &amp; Equipment</td></tr>
                <tr><td>Services</td><td>Content Architecture, Semantic SEO</td></tr>
                <tr><td>Key Result</td><td style="color:var(--bws-primary); font-weight:700;">38 RFPs / Month</td></tr>
                <tr><td>Data Source</td><td>GA4 &amp; HubSpot CRM</td></tr>
                <tr><td>Time Period</td><td>9 Months</td></tr>
              </table>
            </div>
            <div class="bws-info-box">
              <h3 style="font-size:1rem; margin-bottom:0.75rem;">Scale your commercial pipeline</h3>
              <a href="/contact" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">Contact Our Architects &rarr;</a>
            </div>
          </aside>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Case Study: 38 Inbound RFPs / Month', content, 'case-studies'));
});

app.get('/case-studies/multi-location-gbp-expansion', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <nav class="bws-breadcrumbs" aria-label="Breadcrumbs" style="font-size:0.875rem; margin-bottom:1.25rem;">
          <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <a href="/case-studies" style="color:rgba(255,255,255,0.7); text-decoration:none;">Case Studies</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <span style="color:#93C5FD; font-weight:600;">Multi-Market Transit Media</span>
        </nav>
        <span class="bws-card-tag tag-multisite" style="margin-bottom:0.75rem;">MULTI-LOCATION BRAND</span>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.25rem); margin-top:0.5rem;">84 Ranked Location Pages</h1>
        <p style="font-size:1.125rem; font-weight:600; color:#93C5FD; margin-bottom:0.875rem;">Multi-Market Transit Media Network — Canonical &amp; Geo-Entity Remediation</p>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:760px;">Resolving severe cross-city keyword cannibalization across duplicate location pages to achieve #1 map-pack rankings in 14 major metros.</p>
        <div style="margin-top:1.5rem;">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">Claim Multi-Location Audit &rarr;</a>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container">
        <div class="bws-single-layout" style="display:grid; grid-template-columns:2.2fr 1fr; gap:3.5rem; align-items:start;">
          <article class="bws-content" style="font-size:1.0625rem; line-height:1.75;">
            <h2>The Challenge</h2>
            <p>A national transit advertising firm launched 100+ templated city pages with near-identical boilerplate text. Google penalized the domain with sitewide indexation demotions, suppressing regional search rankings.</p>
            <h2>The Strategy</h2>
            <p>We engineered unique localized market hubs featuring physical inventory geo-coordinates, local demographic metrics, transit route mapping, and verified Schema.org Place entity relationships.</p>
            <h2>The Outcome</h2>
            <p>84 location pages achieved first-page Google rankings within 4 months, driving a 270% increase in localized advertiser quote requests.</p>
          </article>
          <aside class="bws-single-sidebar">
            <div class="bws-info-box" style="margin-bottom:1.5rem;">
              <h3 class="bws-info-box-title">Case Study Details</h3>
              <table class="bws-facts-table">
                <tr><td>Client</td><td>Multi-Market Transit Network</td></tr>
                <tr><td>Industry</td><td>Out-of-Home Transit Advertising</td></tr>
                <tr><td>Services</td><td>Local SEO, Technical SEO</td></tr>
                <tr><td>Key Result</td><td style="color:var(--bws-primary); font-weight:700;">84 Ranked Pages</td></tr>
                <tr><td>Data Source</td><td>Google Search Console</td></tr>
                <tr><td>Time Period</td><td>4 Months</td></tr>
              </table>
            </div>
            <div class="bws-info-box">
              <h3 style="font-size:1rem; margin-bottom:0.75rem;">Multi-location challenges?</h3>
              <a href="/contact" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">Book Multi-Site Review &rarr;</a>
            </div>
          </aside>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Case Study: 84 Ranked Location Pages', content, 'case-studies'));
});

// 9. Portfolio Archive
app.get('/portfolio', (req, res) => {
  const content = `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <p class="bws-eyebrow" style="color:#93C5FD;">FEATURED WORK &amp; DELIVERABLES</p>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem);">Client work &amp; strategic campaigns.</h1>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem;">Explore recent client implementations across semantic search architecture, technical optimization, and multi-location rollouts.</p>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container">
        <div class="bws-grid-3">
          <article class="bws-case-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag tag-ooh" style="margin-bottom:0.75rem; align-self:flex-start;">OOH Advertising</span>
              <h3 class="bws-case-card-title"><a href="/portfolio/regional-billboard-inventory-platform" style="color:inherit; text-decoration:none;">Regional Billboard Inventory Platform</a></h3>
              <p class="bws-case-card-subtitle">Client: Regional Outdoor Media</p>
              <p class="bws-case-card-desc">Engineered multi-city inventory catalog architecture indexing over 400 billboard locations across 8 distinct US metro areas.</p>
              <div style="padding:0.4rem 0.75rem; background:var(--bws-primary-light); color:var(--bws-primary-dark); font-weight:600; border-radius:4px; font-size:13px; margin-bottom:1rem;">+214% Organic Impressions</div>
            </div>
            <a href="/portfolio/regional-billboard-inventory-platform" class="bws-case-card-cta">View Portfolio Details &rarr;</a>
          </article>
          <article class="bws-case-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag tag-b2b" style="margin-bottom:0.75rem; align-self:flex-start;">B2B Services</span>
              <h3 class="bws-case-card-title"><a href="/portfolio/b2b-equipment-authority-silos" style="color:inherit; text-decoration:none;">B2B Equipment Authority Silos</a></h3>
              <p class="bws-case-card-subtitle">Client: Commercial Facility Solutions</p>
              <p class="bws-case-card-desc">Migrated unstructured blog articles into high-converting commercial service silos with validated Schema.org graphs.</p>
              <div style="padding:0.4rem 0.75rem; background:var(--bws-primary-light); color:var(--bws-primary-dark); font-weight:600; border-radius:4px; font-size:13px; margin-bottom:1rem;">38 Inbound RFPs / Month</div>
            </div>
            <a href="/portfolio/b2b-equipment-authority-silos" class="bws-case-card-cta">View Portfolio Details &rarr;</a>
          </article>
          <article class="bws-case-card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <span class="bws-card-tag tag-multisite" style="margin-bottom:0.75rem; align-self:flex-start;">Transit Media</span>
              <h3 class="bws-case-card-title"><a href="/portfolio/multi-market-transit-directory" style="color:inherit; text-decoration:none;">Multi-Market Transit Directory</a></h3>
              <p class="bws-case-card-subtitle">Client: Metro Transit Network</p>
              <p class="bws-case-card-desc">Resolved severe keyword cannibalization across duplicate location pages by establishing city-specific geo entity signals.</p>
              <div style="padding:0.4rem 0.75rem; background:var(--bws-primary-light); color:var(--bws-primary-dark); font-weight:600; border-radius:4px; font-size:13px; margin-bottom:1rem;">84 Ranked Market Pages</div>
            </div>
            <a href="/portfolio/multi-market-transit-directory" class="bws-case-card-cta">View Portfolio Details &rarr;</a>
          </article>
        </div>
      </div>
    </section>
  `;
  res.send(renderThemeLayout('Portfolio', content, 'portfolio'));
});

// Helper for rendering Individual Portfolio Showcase Pages
function renderPortfolioDetailPage(data) {
  return `
    <div class="bws-page-hero" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:4.5rem 0 3.5rem;">
      <div class="bws-container">
        <nav class="bws-breadcrumbs" aria-label="Breadcrumbs" style="font-size:0.875rem; margin-bottom:1.25rem;">
          <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <a href="/portfolio" style="color:rgba(255,255,255,0.7); text-decoration:none;">Portfolio</a>
          <span style="color:rgba(255,255,255,0.4); margin:0 0.5rem;">/</span>
          <span style="color:#93C5FD; font-weight:600;">${data.title}</span>
        </nav>
        <span class="bws-card-tag ${data.tagClass || 'tag-b2b'}" style="margin-bottom:0.75rem;">${data.eyebrow}</span>
        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.25rem); margin-top:0.5rem;">${data.title}</h1>
        <p style="font-size:1.125rem; font-weight:600; color:#93C5FD; margin-bottom:0.875rem;">Client: ${data.client} &bull; ${data.industry}</p>
        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:760px;">${data.subtitle}</p>
        <div style="margin-top:1.5rem; display:flex; gap:1rem; flex-wrap:wrap;">
          <a href="/free-seo-audit" class="bws-btn bws-btn-primary bws-btn-lg">Request Project Audit &rarr;</a>
          <a href="/contact" class="bws-btn bws-btn-outline-white bws-btn-lg">Discuss Your Goals</a>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container">
        <div class="bws-single-layout" style="display:grid; grid-template-columns:2.2fr 1fr; gap:3.5rem; align-items:start;">
          <article class="bws-content" style="font-size:1.0625rem; line-height:1.75;">
            <h2>Project Architecture Overview</h2>
            <p>${data.overview}</p>
            <h2>Technical Implementations</h2>
            <ul style="color:var(--bws-text-secondary); line-height:1.8; margin-bottom:2rem;">
              ${data.implementations.map(imp => `<li><strong>${imp.title}:</strong> ${imp.desc}</li>`).join('')}
            </ul>
            <h2>Verified Result &amp; Growth</h2>
            <div style="padding:1.5rem; background:#F0FDF4; border:1px solid #BBF7D0; border-radius:8px; margin-bottom:2rem;">
              <div style="font-size:1.25rem; font-weight:800; color:#166534; margin-bottom:0.35rem;">✓ ${data.keyResult}</div>
              <p style="color:#15803D; margin:0; line-height:1.6;">${data.resultDetails}</p>
            </div>
          </article>
          <aside class="bws-single-sidebar">
            <div class="bws-info-box" style="margin-bottom:1.5rem;">
              <h3 class="bws-info-box-title">Portfolio Specifications</h3>
              <table class="bws-facts-table">
                <tr><td>Client</td><td>${data.client}</td></tr>
                <tr><td>Industry</td><td>${data.industry}</td></tr>
                <tr><td>Key Metric</td><td style="color:var(--bws-primary); font-weight:700;">${data.keyResult}</td></tr>
                <tr><td>Services</td><td>${data.services}</td></tr>
                <tr><td>Status</td><td style="color:#166534; font-weight:600;">Verified Active</td></tr>
              </table>
            </div>
            <div class="bws-info-box">
              <h3 style="font-size:1rem; margin-bottom:0.75rem;">Ready to scale your search?</h3>
              <a href="/contact" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">Consult With Founder &rarr;</a>
            </div>
          </aside>
        </div>
      </div>
    </section>
  `;
}

// Individual Portfolio Routes
app.get(['/portfolio/regional-billboard-inventory-platform', '/portfolio/outdoor-billboard-leader'], (req, res) => {
  const data = {
    title: 'Regional Billboard Inventory Platform',
    eyebrow: 'OOH MEDIA ARCHITECTURE',
    tagClass: 'tag-ooh',
    client: 'Regional Outdoor Media Group',
    industry: 'Out-of-Home & Billboard Advertising',
    subtitle: 'Indexing over 400 static and digital billboard inventory faces across 8 distinct US metro areas with dynamic canonical architecture.',
    overview: 'The client possessed premier highway and arterial billboard assets across 8 Midwest and Southern US metros. However, their legacy web presence failed to render individual inventory locations to search engine crawlers, leaving them invisible for lucrative "billboard advertising" search queries.',
    implementations: [
      { title: 'Permanent Canonical Inventory URLs', desc: 'Migrated transient inventory filters into permanent indexable canonical pages.' },
      { title: 'Geo-Entity Schema Graph', desc: 'Integrated physical billboard latitude/longitude coordinates into nested Schema.org Place graphs.' },
      { title: 'Arterial Corridor Hubs', desc: 'Created dedicated interstate and arterial market hubs linking nearby available faces.' }
    ],
    keyResult: '+214% Organic Impressions Lift',
    resultDetails: 'Direct advertiser inquiries increased 3.4x within 6 months of rollout, eliminating the operator’s reliance on third-party broker commissions.',
    services: 'Semantic SEO, Local SEO, Schema Graph Design'
  };
  res.send(renderThemeLayout('Portfolio: Regional Billboard Inventory Platform', renderPortfolioDetailPage(data), 'portfolio'));
});

app.get('/portfolio/b2b-equipment-authority-silos', (req, res) => {
  const data = {
    title: 'B2B Equipment Authority Silos',
    eyebrow: 'B2B ENTERPRISE ARCHITECTURE',
    tagClass: 'tag-b2b',
    client: 'Commercial Facility Solutions',
    industry: 'Commercial Facility Equipment & Maintenance',
    subtitle: 'Converting unstructured informational traffic into high-intent commercial service silos that generate 38 inbound RFPs monthly.',
    overview: 'The company had accumulated over 200 blog posts over five years, but was receiving fewer than two qualified commercial leads per quarter. We overhauled their entire content hierarchy into high-intent commercial silos tailored to enterprise procurement decision-makers.',
    implementations: [
      { title: 'Commercial Silo Migration', desc: 'Consolidated 200+ diffuse posts into 6 authoritative commercial service hubs.' },
      { title: 'B2B Procurement Schema', desc: 'Implemented Service and Offer Catalog schemas verified against Google Search Console.' },
      { title: 'Internal PageRank Routing', desc: 'Directed high-authority legacy equity straight into high-converting quote intake pages.' }
    ],
    keyResult: '38 Inbound RFPs / Month',
    resultDetails: 'Organic traffic conversion rate climbed from 0.12% to 4.2%, delivering over $1.7M in pipeline value in the first nine months.',
    services: 'Content & Entity SEO, Technical SEO'
  };
  res.send(renderThemeLayout('Portfolio: B2B Equipment Authority Silos', renderPortfolioDetailPage(data), 'portfolio'));
});

app.get('/portfolio/multi-market-transit-directory', (req, res) => {
  const data = {
    title: 'Multi-Market Transit Directory',
    eyebrow: 'MULTI-LOCATION CANONICAL ARCHITECTURE',
    tagClass: 'tag-multisite',
    client: 'Metro Transit Media Network',
    industry: 'Transit & Fleet Advertising',
    subtitle: 'Eliminating severe keyword cannibalization across duplicate location pages to rank 84 unique market pages on page 1 of Google.',
    overview: 'Operating in dozens of municipal markets, this transit advertising network struggled with internal keyword competition where identical templated pages competed against each other in Google search results.',
    implementations: [
      { title: 'Cross-Domain Canonical Remediation', desc: 'Established definitive parent-child relationships across all regional transit hubs.' },
      { title: 'Unique Municipal Data Layer', desc: 'Injected real-time ridership statistics and municipal demographic data into each market page.' },
      { title: 'Local GBP & Geo-Entity Sync', desc: 'Synchronized local business profiles with verified municipal transit entity coordinates.' }
    ],
    keyResult: '84 Ranked Market Pages',
    resultDetails: 'Eliminated all internal search cannibalization and captured top 3 Google positions across 14 major metropolitan transit markets.',
    services: 'Local SEO, Technical SEO, Entity Schema'
  };
  res.send(renderThemeLayout('Portfolio: Multi-Market Transit Directory', renderPortfolioDetailPage(data), 'portfolio'));
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
    <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
      <div class="bws-container">
        <div style="max-width: 780px;">
          <p class="bws-eyebrow" style="color: #93C5FD;">STRATEGIC CONSULTATION</p>
          <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem); line-height:1.15; margin-bottom:1rem;">
            Enterprise Consultation &amp; Strategy
          </h1>
          <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
            Request a forensic search evaluation or discuss enterprise search architecture for your commercial business. Our senior strategy team evaluates every inquiry.
          </p>
        </div>
      </div>
    </div>
    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
      <div class="bws-container">
        <div class="bws-grid-2" style="gap:3.5rem; align-items:start;">
          <!-- Company & Leadership Info -->
          <div>
            <h2 style="font-size:1.75rem; color:var(--bws-heading); margin-bottom:1.25rem;">Enterprise Search Strategy</h2>
            
            <!-- Founder Introduction -->
            <div style="padding:1.5rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:var(--bws-radius-md); margin-bottom:2rem;">
              <div style="display:flex; align-items:center; gap:0.875rem; margin-bottom:0.875rem;">
                <div style="width:48px; height:48px; border-radius:50%; background:#2563EB; color:#FFFFFF; font-weight:800; font-size:1.125rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                  HKN
                </div>
                <div>
                  <div style="font-weight:700; color:#0F1B3D; font-size:1.0625rem;">Humayun Kabir Nishan</div>
                  <div style="font-size:0.8125rem; color:#2563EB; font-weight:600; text-transform:uppercase; letter-spacing:0.04em;">Founder &amp; Principal SEO Architect</div>
                </div>
              </div>
              <p style="font-size:0.875rem; color:var(--bws-text-secondary); line-height:1.65; margin:0;">
                BlueWireSEO was founded by Humayun Kabir Nishan to deliver high-impact semantic entity modeling, technical crawl remediation, and revenue-focused organic visibility for US commercial enterprises.
              </p>
            </div>

            <div style="display:flex; flex-direction:column; gap:1.25rem; margin-bottom:2rem;">
              <div style="display:flex; gap:1rem; align-items:center;">
                <div style="width:44px; height:44px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <div>
                  <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;">Official Email Inquiries</div>
                  <a href="mailto:nishan@bluewireseo.com" style="color:var(--bws-heading); font-size:1.0625rem; font-weight:700; text-decoration:none;">nishan@bluewireseo.com</a>
                </div>
              </div>

              <div style="display:flex; gap:1rem; align-items:center;">
                <div style="width:44px; height:44px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.61 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <div>
                  <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;">Telephone &amp; WhatsApp</div>
                  <a href="tel:+8801927497396" style="color:var(--bws-heading); font-size:1.0625rem; font-weight:700; text-decoration:none;">+8801927497396</a>
                </div>
              </div>

              <div style="display:flex; gap:1rem; align-items:center;">
                <div style="width:44px; height:44px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <div>
                  <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;">Operational Coverage</div>
                  <div style="color:var(--bws-heading); font-size:1rem; font-weight:600;">US Business Hours (EST / CST / PST)</div>
                </div>
              </div>
            </div>

            <div style="padding:1.25rem; background:#F0FDF4; border:1px solid #BBF7D0; border-radius:var(--bws-radius-md);">
              <div style="font-weight:700; color:#166534; font-size:0.9rem; margin-bottom:0.25rem;">
                ✓ Confidential Evaluation Guarantee
              </div>
              <p style="font-size:0.8125rem; color:#15803D; margin:0; line-height:1.5;">
                Every inquiry is reviewed directly by our senior technical architects. Mutual non-disclosure agreements (NDAs) are gladly provided upon request.
              </p>
            </div>
          </div>

          <!-- Professional Corporate Inquiry Form -->
          <div class="bws-card" style="padding:2.5rem 2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); background:var(--bws-white); box-shadow:var(--bws-shadow-lg);">
            <h3 style="font-size:1.375rem; margin-bottom:0.5rem; color:var(--bws-heading);">Submit Consultation Request</h3>
            <p style="font-size:0.875rem; color:var(--bws-text-muted); margin-bottom:1.75rem;">
              Complete the form below to receive a strategic review within 24 business hours.
            </p>

            <form onsubmit="event.preventDefault(); this.innerHTML='<div style=\\'padding:1.5rem; background:#EFF6FF; border:1px solid #93C5FD; border-radius:8px; color:#1E40AF; text-align:center; font-weight:600;\\'>✓ Strategic consultation request received. Our senior strategy team will review your domain and respond within 24 business hours.</div>';" style="display:flex; flex-direction:column; gap:1.25rem;">
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                <div>
                  <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Full Name *</label>
                  <input type="text" required placeholder="John Smith" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;">
                </div>
                <div>
                  <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Work Email *</label>
                  <input type="email" required placeholder="john@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;">
                </div>
              </div>

              <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                <div>
                  <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Website URL *</label>
                  <input type="url" required placeholder="https://yourbrand.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;">
                </div>
                <div>
                  <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Service Required</label>
                  <select style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem; background:#FFFFFF;">
                    <option value="Semantic SEO">Semantic SEO Architecture</option>
                    <option value="Technical SEO">Technical Crawl Audit &amp; Remediation</option>
                    <option value="Local SEO & GBP">Local SEO &amp; Multi-Location GBP</option>
                    <option value="SEO Audit">Free 20-Point SEO Audit</option>
                    <option value="Content & Entity SEO">Content &amp; Entity Strategy</option>
                    <option value="Link Building">High-Authority Link Building</option>
                  </select>
                </div>
              </div>

              <div>
                <label style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;">Project Scope &amp; Current Search Goals *</label>
                <textarea rows="4" required placeholder="Describe your current search bottlenecks, primary markets, and objectives..." style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;"></textarea>
              </div>

              <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem; font-weight:700;">
                Submit Strategic Consultation Request &rarr;
              </button>
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
