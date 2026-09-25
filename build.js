const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

console.log('=== Building BlueWireSEO WordPress Theme Package ===');

const requiredFiles = [
  'style.css',
  'functions.php',
  'header.php',
  'footer.php',
  'front-page.php',
  'index.php',
  'page.php',
  'single.php',
  'archive.php',
  'search.php',
  '404.php',
  'single-bws_service.php',
  'archive-bws_service.php',
  'single-bws_industry.php',
  'archive-bws_industry.php',
  'single-bws_case_study.php',
  'archive-bws_case_study.php',
  'single-bws_portfolio.php',
  'archive-bws_portfolio.php',
  'inc/custom-post-types.php',
  'inc/demo-importer.php',
  'inc/helpers.php',
  'inc/customizer.php',
  'inc/theme-setup.php',
  'inc/elementor.php',
  'inc/enqueue.php',
  'page-templates/about.php',
  'page-templates/process.php',
  'page-templates/services.php',
  'page-templates/industries.php',
  'page-templates/case-studies.php',
  'page-templates/portfolio.php',
  'page-templates/contact.php',
  'page-templates/free-seo-audit.php',
  'template-parts/page-sections/home-content.php',
  'assets/images/logo.svg',
  'assets/images/logo.png',
  'assets/js/main.js',
  'README.md'
];

let allExist = true;
for (const file of requiredFiles) {
  if (!fs.existsSync(path.join(__dirname, file))) {
    console.error(`[MISSING] ${file}`);
    allExist = false;
  }
}

if (!allExist) {
  console.error('Build failed due to missing files.');
  process.exit(1);
}

console.log('[OK] All required WordPress theme files verified.');

// Build installable zip using python3 zipfile
fs.mkdirSync(path.join(__dirname, 'public'), { recursive: true });

try {
  execSync('python3 package_zip.py', { stdio: 'inherit' });
  console.log('[SUCCESS] Theme ZIP package created successfully.');
} catch (err) {
  console.error('[ERROR] Failed to package zip:', err);
  process.exit(1);
}
