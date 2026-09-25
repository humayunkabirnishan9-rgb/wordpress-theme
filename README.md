# BlueWireSEO — Production WordPress Theme & Site Architecture

> **Official Website:** [https://bluewireseo.com](https://bluewireseo.com)  
> **Contact:** `nishan@bluewireseo.com` | `+8801927497396`  
> **Brand:** BlueWireSEO — Semantic SEO & Technical SEO Agency for US Commercial Businesses  
> **Version:** 1.0.0  
> **Requires WordPress:** 6.0+ | **Requires PHP:** 8.0+ | **Elementor Tested:** 3.20+

---

## 1. Overview & Architecture

BlueWireSEO is a custom, production-grade WordPress theme designed specifically for technical and semantic SEO agencies serving US commercial clients, with specialized focus on **OOH Billboard Advertising**, **Multi-site & Portfolio Brands**, and **B2B Commercial Services**.

The theme strictly separates concerns between:
1. **PHP Core Architecture:** Theme hierarchy, CPT registrations, taxonomies, meta fields, security sanitization, semantic Schema markup, and fallback templates.
2. **Elementor Visual & Content Layer:** Reusable page sections, dynamic fields, global color/font tokens, and Elementor Pro Theme Builder compatibility.
3. **Automated Site Setup:** Built-in 1-Click Demo Importer (`Appearance > BlueWireSEO Setup`) that configures all pages, reading settings, navigation menus, CPT entries, and Elementor template data.

---

## 2. Key Features & Deliverables

### Custom Post Types (CPTs)
- `bws_service` (Services): Archive at `/services/`, single templates, custom meta for category labels, CTA text, CTA URLs, and related case studies.
- `bws_industry` (Industries): Archive at `/industries/`, single templates, badge meta, and industry feature lists.
- `bws_case_study` (Case Studies): Archive at `/case-studies/`, single templates, structured meta for Client, Industry, Key Result (+214% Impressions, etc.), Data Source, Time Period, and Services Used.
- `bws_portfolio` (Portfolio): Archive at `/portfolio/`, single templates, live project URLs, impact metrics, and client tags.

### Page Templates Included
- `front-page.php` / `template-parts/page-sections/home-content.php`: Complete 13-section BlueWireSEO homepage with real data, zero lorem ipsum, and zero default WordPress placeholder text.
- `page-templates/about.php`: BlueWireSEO About & Leadership template.
- `page-templates/process.php`: Our 4-step framework (Diagnostic, Technical Remediation, Semantic Clustering, Compounding Growth).
- `page-templates/services.php`: Services directory overview template.
- `page-templates/industries.php`: Industries directory overview template.
- `page-templates/case-studies.php`: Filterable case studies overview template.
- `page-templates/portfolio.php`: Filterable portfolio projects template.
- `page-templates/contact.php`: Contact consultation page with direct email, phone, WhatsApp, and form areas.
- `page-templates/free-seo-audit.php`: Dedicated 20-point technical & semantic audit request page.
- `page-templates/standard.php`: Clean typography container for legal pages (Privacy Policy, Terms of Service).
- `404.php`: Custom branded 404 error template with quick recovery links.
- `search.php`: Search results template with clean layout.

### Centralized Design System & Customizer
Accessible under **Appearance > Customize > BlueWireSEO Settings**:
- **Brand Colors:**
  - Primary Brand Color (`--bws-primary`, default: `#2563EB`)
  - Navy Hero/Dark Color (`--bws-navy`, default: `#0F1B3D`)
  - Secondary Navy (`--bws-navy-medium`, default: `#1E2D5A`)
  - Accent Color (`--bws-accent`, default: `#2563EB`)
  - Body Text Color (`--bws-text`, default: `#1A1A2E`)
  - Muted Text Color (`--bws-text-muted`, default: `#718096`)
  - Background & Surface Colors (`--bws-white`, `--bws-light-bg`)
  - Border Color (`--bws-border`, default: `#E2E8F0`)
  - Button Color & Hover Color (`--bws-primary-dark`, default: `#1D4ED8`)
- **Global Typography:**
  - Heading font selection (Inter, Plus Jakarta Sans, Outfit, Poppins, Montserrat)
  - Body font selection (Inter, Plus Jakarta Sans, Open Sans, Roboto)
- **Contact Info & Topbar:**
  - Email: `nishan@bluewireseo.com`
  - Phone: `+8801927497396`
  - WhatsApp: `8801927497396`
  - Topbar Announcement text and target URL
  - Footer description & copyright

---

## 3. Fresh WordPress Installation Guide

### Step 1: Install the Theme
1. Download the `bluewireseo.zip` file.
2. In your WordPress admin, go to **Appearance > Themes > Add New > Upload Theme**.
3. Select `bluewireseo.zip` and click **Install Now**.
4. Click **Activate**.

### Step 2: Run 1-Click Site Setup (Important)
1. After activation, you will see a notice inviting you to run the setup, or go to **Appearance > BlueWireSEO Setup**.
2. Click **Import BlueWireSEO Demo & Configure Site**.
3. This automated routine will:
   - Create and publish the Home page and assign it in **Settings > Reading** as the static front page.
   - Create About, Services, Industries, Case Studies, Portfolio, Process, Contact, Free SEO Audit, and legal pages.
   - Populate verified sample data for Services, Industries, Case Studies, and Portfolio projects.
   - Set up and assign the Primary Header Menu and Footer Menus.
   - Enable Elementor editing support across all custom post types.
   - Inject Elementor builder data so clicking **Edit with Elementor** on the Home page immediately reveals the full BlueWireSEO layout.

### Step 3: Install & Activate Elementor (Optional but Recommended)
1. Go to **Plugins > Add New** and search for **Elementor**.
2. Install and activate **Elementor**.
3. You can now edit any page, service, industry, or case study visually via **Edit with Elementor**.

---

## 4. Elementor Pro Integration & Theme Builder

The theme is 100% functional with free Elementor and native PHP fallbacks. If **Elementor Pro** is active:
- Theme Builder locations (`header`, `footer`, `single`, `archive`) are officially registered via `bluewireseo_register_elementor_locations()`.
- When an Elementor Pro header or footer template condition is active, the theme automatically suppresses the PHP header/footer to prevent duplicate rendering.
- Reusable single templates can be imported from the included `/elementor-templates/` directory:
  - `elementor-templates/homepage.json`
  - `elementor-templates/single-service.json`
  - `elementor-templates/single-case-study.json`
  - `elementor-templates/single-industry.json`
  - `elementor-templates/single-portfolio.json`

---

## 5. File Structure

```
bluewireseo/
├── style.css                  # Theme stylesheet and complete design tokens
├── functions.php              # Modular bootstrap loader
├── header.php                 # Header markup with Elementor Pro detection
├── footer.php                 # Footer markup with Elementor Pro detection
├── front-page.php             # Front page template (guarantees real content)
├── index.php                  # Fallback blog archive template
├── page.php                   # Default page template
├── single.php                 # Standard single post template
├── archive.php                # Standard archive template
├── search.php                 # Custom search results template
├── 404.php                    # Custom branded 404 error template
├── sidebar.php                # Sidebar widget area
├── comments.php               # Comments template
├── single-bws_service.php     # Reusable Single Service template
├── archive-bws_service.php    # Services archive grid template
├── single-bws_case_study.php  # Reusable Single Case Study template
├── archive-bws_case_study.php # Case Studies filterable archive
├── single-bws_industry.php    # Reusable Single Industry template
├── archive-bws_industry.php   # Industries archive layout
├── single-bws_portfolio.php   # Reusable Single Portfolio template
├── archive-bws_portfolio.php  # Portfolio filterable archive
├── assets/
│   ├── css/
│   │   ├── admin.css          # Admin meta box styling
│   │   ├── editor-style.css   # Gutenberg editor styles
│   │   └── elementor-editor.css # Elementor editor preview parity
│   ├── images/
│   │   ├── logo.svg           # High-resolution vector logo
│   │   ├── logo.png           # Raster logo fallback
│   │   ├── logo-white.svg     # Dark background logo
│   │   ├── logo-white.png     # Dark background raster logo
│   │   ├── logo-icon.svg      # Blue wire emblem
│   │   ├── logo-icon.png      # Blue wire emblem PNG
│   │   └── favicon.ico        # Site favicon
│   └── js/
│       └── main.js            # Vanilla JS (mobile nav, sticky header, FAQ, filter)
├── elementor-templates/       # Bundled Elementor JSON templates
├── inc/
│   ├── custom-post-types.php  # Registration of Services, Case Studies, Industries, Portfolio & Meta Boxes
│   ├── customizer.php         # Centralized brand colors, typography, and contact settings
│   ├── demo-importer.php      # 1-Click site content & configuration installer
│   ├── elementor.php          # Elementor compatibility & Theme Builder locations
│   ├── enqueue.php            # Asset loading and cache busting
│   ├── helpers.php            # SVG icons, logos, breadcrumbs, card generators
│   ├── nav-walker.php         # Accessible navigation walker
│   ├── social-links.php       # Social profile helpers
│   ├── theme-setup.php        # Theme supports, menus, image sizes, widget areas
│   └── whatsapp.php           # Floating WhatsApp consultation button
├── page-templates/
│   ├── about.php              # About BlueWireSEO template
│   ├── blog.php               # Blog template
│   ├── case-studies.php       # Case Studies overview template
│   ├── contact.php            # Contact consultation template
│   ├── elementor-canvas.php   # Blank Elementor canvas template
│   ├── free-seo-audit.php     # 20-Point Free SEO Audit template
│   ├── industries.php         # Industries overview template
│   ├── portfolio.php          # Portfolio projects template
│   ├── process.php            # 4-Step methodology template
│   ├── services.php           # Services directory template
│   └── standard.php           # Standard legal/content template
└── template-parts/
    ├── components/
    │   └── cta-section.php    # Global final CTA banner
    ├── footer/
    │   └── footer-main.php    # 4-column footer layout
    ├── header/
    │   ├── navigation.php     # Main header and mobile navigation drawer
    │   └── topbar.php         # Top announcement bar
    └── page-sections/
        ├── home-content.php   # Complete 13-section homepage implementation
        └── home-placeholder.php # Forwarder to home-content
```

---

## 6. License & Author

- **Author:** Nishan / BlueWireSEO
- **Author URI:** [https://bluewireseo.com](https://bluewireseo.com)
- **Support:** `nishan@bluewireseo.com`
