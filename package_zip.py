import os
import zipfile

zip_destinations = ['bluewireseo.zip', 'public/bluewireseo.zip']

include_dirs = ['assets', 'inc', 'page-templates', 'template-parts', 'elementor-templates']
include_files = [
    'style.css', 'functions.php', 'header.php', 'footer.php', 'front-page.php',
    'index.php', 'page.php', 'single.php', 'archive.php', 'search.php', '404.php',
    'sidebar.php', 'comments.php',
    'single-bws_service.php', 'archive-bws_service.php',
    'single-bws_industry.php', 'archive-bws_industry.php',
    'single-bws_case_study.php', 'archive-bws_case_study.php',
    'single-bws_portfolio.php', 'archive-bws_portfolio.php',
    'README.md'
]

os.makedirs('public', exist_ok=True)

for dest in zip_destinations:
    with zipfile.ZipFile(dest, 'w', zipfile.ZIP_DEFLATED) as zipf:
        for f in include_files:
            if os.path.exists(f):
                zipf.write(f, os.path.join('bluewireseo', f))
        for d in include_dirs:
            if os.path.exists(d):
                for root, _, files in os.walk(d):
                    for file in files:
                        p = os.path.join(root, file)
                        zipf.write(p, os.path.join('bluewireseo', p))
    print(f"Created {dest} ({os.path.getsize(dest)} bytes)")
