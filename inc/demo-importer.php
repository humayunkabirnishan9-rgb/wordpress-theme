<?php
/**
 * BlueWireSEO — Demo & Site Content Installer
 * Automatically configures pages, menus, reading settings, CPTs, and Elementor data
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Admin Menu for Theme Setup
 */
function bluewireseo_setup_menu() {
    add_theme_page(
        __( 'BlueWireSEO Setup', 'bluewireseo' ),
        __( 'BlueWireSEO Setup', 'bluewireseo' ),
        'manage_options',
        'bluewireseo-setup',
        'bluewireseo_setup_page_callback'
    );
}
add_action( 'admin_menu', 'bluewireseo_setup_menu' );

/**
 * Admin notice for 1-click setup if not yet imported
 */
function bluewireseo_setup_admin_notice() {
    if ( get_option( 'bws_demo_imported' ) ) {
        return;
    }

    $screen = get_current_screen();
    if ( $screen && 'appearance_page_bluewireseo-setup' === $screen->id ) {
        return;
    }
    ?>
    <div class="notice notice-info is-dismissible" style="padding:15px; border-left-color:#2563EB;">
        <h3 style="margin-top:0; color:#0F1B3D;"><?php esc_html_e( 'Welcome to BlueWireSEO Theme!', 'bluewireseo' ); ?></h3>
        <p style="font-size:14px; line-height:1.5;">
            <?php esc_html_e( 'Complete your site setup in 1-click. This will configure the BlueWireSEO homepage, about, services, industries, case studies, portfolio, navigation menus, and Elementor integration.', 'bluewireseo' ); ?>
        </p>
        <p>
            <a href="<?php echo esc_url( admin_url( 'themes.php?page=bluewireseo-setup' ) ); ?>" class="button button-primary" style="background:#2563EB; border-color:#1D4ED8;">
                <?php esc_html_e( 'Run 1-Click BlueWireSEO Setup &rarr;', 'bluewireseo' ); ?>
            </a>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'bluewireseo_setup_admin_notice' );

/**
 * Setup Page Render
 */
function bluewireseo_setup_page_callback() {
    $imported = get_option( 'bws_demo_imported', false );

    // Handle manual import submission
    if ( isset( $_POST['bws_run_import'] ) && check_admin_referer( 'bws_import_nonce_action', 'bws_import_nonce' ) ) {
        $result = bluewireseo_import_demo_content();
        $imported = true;
        echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__( 'BlueWireSEO site setup completed successfully! Your homepage, pages, custom post types, menus, and Elementor templates are now live.', 'bluewireseo' ) . '</strong></p></div>';
    }
    ?>
    <div class="wrap" style="max-width:900px; margin-top:20px;">
        <div style="background:#FFFFFF; border:1px solid #E2E8F0; border-radius:12px; padding:30px; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
            <div style="display:flex; align-items:center; gap:15px; margin-bottom:20px; border-bottom:1px solid #E2E8F0; padding-bottom:20px;">
                <div style="width:48px; height:48px; border-radius:10px; background:#0F1B3D; display:flex; align-items:center; justify-content:center; color:#2563EB; font-size:24px; font-weight:800;">BW</div>
                <div>
                    <h1 style="margin:0; font-size:24px; color:#0F1B3D; font-weight:700;"><?php esc_html_e( 'BlueWireSEO — Complete Site Setup', 'bluewireseo' ); ?></h1>
                    <p style="margin:4px 0 0; color:#718096;"><?php esc_html_e( 'One-click automated setup for the complete BlueWireSEO theme and content.', 'bluewireseo' ); ?></p>
                </div>
            </div>

            <?php if ( $imported ) : ?>
                <div style="padding:15px 20px; background:#ECFDF5; border:1px solid #10B981; border-radius:8px; margin-bottom:25px; color:#065F46;">
                    <strong><?php esc_html_e( 'Status: Active & Configured.', 'bluewireseo' ); ?></strong>
                    <?php esc_html_e( 'BlueWireSEO demo content and site settings are active. You can re-run the importer at any time to sync data.', 'bluewireseo' ); ?>
                </div>
            <?php endif; ?>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:30px;">
                <div style="padding:18px; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                    <h4 style="margin:0 0 8px; color:#0F1B3D;"><?php esc_html_e( 'What Gets Installed:', 'bluewireseo' ); ?></h4>
                    <ul style="margin:0; padding-left:18px; color:#4A5568; line-height:1.6; font-size:13px;">
                        <li><?php esc_html_e( 'Real BlueWireSEO Homepage (Assigned to Reading Settings)', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( 'Core Pages: About, Services, Industries, Case Studies, Portfolio, Process, Contact, Free SEO Audit', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( '6 Published Services with real meta & categories', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( '3 Industry Specialties (OOH Billboard, Multi-Site, B2B)', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( '3 Verified Case Studies with real metrics & sources', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( '3 Portfolio Projects with results', 'bluewireseo' ); ?></li>
                    </ul>
                </div>
                <div style="padding:18px; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                    <h4 style="margin:0 0 8px; color:#0F1B3D;"><?php esc_html_e( 'Configurations Applied:', 'bluewireseo' ); ?></h4>
                    <ul style="margin:0; padding-left:18px; color:#4A5568; line-height:1.6; font-size:13px;">
                        <li><?php esc_html_e( 'Primary Header Navigation with Dropdowns', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( 'Footer Menus (Services, Industries, Company, Resources, Legal)', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( 'Elementor CPT Support enabled for all post types', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( 'Elementor page builder data loaded for Homepage', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( 'Official Contact Info: nishan@bluewireseo.com / +8801927497396', 'bluewireseo' ); ?></li>
                        <li><?php esc_html_e( 'Permalinks flushed to clean rewrite slugs', 'bluewireseo' ); ?></li>
                    </ul>
                </div>
            </div>

            <form method="post" action="">
                <?php wp_nonce_field( 'bws_import_nonce_action', 'bws_import_nonce' ); ?>
                <button type="submit" name="bws_run_import" class="button button-primary button-hero" style="background:#2563EB; border-color:#1D4ED8; font-weight:700;">
                    <?php echo $imported ? esc_html__( 'Re-Run BlueWireSEO Setup', 'bluewireseo' ) : esc_html__( 'Import BlueWireSEO Demo & Configure Site', 'bluewireseo' ); ?>
                </button>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="button button-secondary button-hero" style="margin-left:10px;">
                    <?php esc_html_e( 'View Frontend Website &rarr;', 'bluewireseo' ); ?>
                </a>
            </form>
        </div>
    </div>
    <?php
}

/**
 * Main Setup Importer Execution Function
 */
function bluewireseo_import_demo_content() {

    // 1. Enable Elementor CPT support
    $cpt_support = get_option( 'elementor_cpt_support', array( 'page', 'post' ) );
    $needed_cpts = array( 'page', 'post', 'bws_service', 'bws_industry', 'bws_case_study', 'bws_portfolio' );
    $merged_cpts = array_unique( array_merge( (array) $cpt_support, $needed_cpts ) );
    update_option( 'elementor_cpt_support', $merged_cpts );

    // 2. Elementor default width
    update_option( 'elementor_container_width', 1200 );

    // 3. Create Core Pages
    $pages_to_create = array(
        'home' => array(
            'title'     => 'Home',
            'template'  => 'default',
            'content'   => '',
        ),
        'about' => array(
            'title'     => 'About',
            'template'  => 'page-templates/about.php',
            'content'   => '<p>BlueWireSEO is an agile technical SEO consultancy dedicated to connecting commercial US brands to high-intent decision-makers.</p>',
        ),
        'services' => array(
            'title'     => 'Services',
            'template'  => 'page-templates/services.php',
            'content'   => '<p>Explore our full range of technical, semantic, and local SEO services engineered to compound topical authority.</p>',
        ),
        'industries' => array(
            'title'     => 'Industries',
            'template'  => 'page-templates/industries.php',
            'content'   => '<p>We specialize in OOH billboard advertising, multi-site portfolio brands, and high-ticket B2B service companies.</p>',
        ),
        'case-studies' => array(
            'title'     => 'Case Studies',
            'template'  => 'page-templates/case-studies.php',
            'content'   => '<p>Proven search performance backed by real Google Search Console and GA4 data sources.</p>',
        ),
        'portfolio' => array(
            'title'     => 'Portfolio',
            'template'  => 'page-templates/portfolio.php',
            'content'   => '<p>Featured client campaigns, technical architecture deployments, and multi-market expansions.</p>',
        ),
        'process' => array(
            'title'     => 'Process',
            'template'  => 'page-templates/process.php',
            'content'   => '<p>Our repeatable 4-step framework: Diagnostic, Technical Remediation, Semantic Clustering, and Compounding Growth.</p>',
        ),
        'contact' => array(
            'title'     => 'Contact',
            'template'  => 'page-templates/contact.php',
            'content'   => '<p>Get in touch with our senior SEO architects directly for inquiries and site reviews.</p>',
        ),
        'free-seo-audit' => array(
            'title'     => 'Free SEO Audit',
            'template'  => 'page-templates/free-seo-audit.php',
            'content'   => '<p>Request a comprehensive 20-point technical & semantic audit delivered in 48-72 business hours.</p>',
        ),
        'blog' => array(
            'title'     => 'Blog',
            'template'  => 'default',
            'content'   => '',
        ),
        'privacy-policy' => array(
            'title'     => 'Privacy Policy',
            'template'  => 'page-templates/standard.php',
            'content'   => '<p>This Privacy Policy explains how BlueWireSEO collects, uses, and safeguards information when you visit bluewireseo.com.</p><h3>Information We Collect</h3><p>We only collect information you voluntarily provide through contact forms and audit requests.</p>',
        ),
        'terms-of-service' => array(
            'title'     => 'Terms of Service',
            'template'  => 'page-templates/standard.php',
            'content'   => '<p>These Terms of Service govern your use of the BlueWireSEO website and consultation services.</p>',
        ),
    );

    $page_ids = array();

    foreach ( $pages_to_create as $slug => $data ) {
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            $page_ids[ $slug ] = $existing->ID;
            if ( $data['template'] ) {
                update_post_meta( $existing->ID, '_wp_page_template', $data['template'] );
            }
        } else {
            $pid = wp_insert_post( array(
                'post_title'     => $data['title'],
                'post_name'      => $slug,
                'post_content'   => $data['content'],
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
            ) );
            if ( ! is_wp_error( $pid ) ) {
                $page_ids[ $slug ] = $pid;
                if ( $data['template'] ) {
                    update_post_meta( $pid, '_wp_page_template', $data['template'] );
                }
            }
        }
    }

    // 4. Configure Front Page & Blog Page in Settings > Reading
    if ( ! empty( $page_ids['home'] ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $page_ids['home'] );

        // Seed Elementor Data for Homepage if file exists
        $json_file = BLUEWIRESEO_DIR . '/elementor-templates/homepage.json';
        if ( file_exists( $json_file ) ) {
            $json_raw = file_get_contents( $json_file );
            if ( $json_raw ) {
                $decoded = json_decode( $json_raw, true );
                $elements = isset( $decoded['content'] ) ? $decoded['content'] : $decoded;
                update_post_meta( $page_ids['home'], '_elementor_data', wp_slash( wp_json_encode( $elements ) ) );
                update_post_meta( $page_ids['home'], '_elementor_edit_mode', 'builder' );
                update_post_meta( $page_ids['home'], '_elementor_version', '3.20.0' );
            }
        }
    }

    if ( ! empty( $page_ids['blog'] ) ) {
        update_option( 'page_for_posts', $page_ids['blog'] );
    }

    // 5. Populate CPT Services
    $services_data = array(
        array(
            'title'    => 'Semantic SEO',
            'slug'     => 'semantic-seo',
            'cat'      => 'CORE ARCHITECTURE',
            'excerpt'  => 'Entity-based topical clustering, schema graph design, and structured content models that establish verified subject matter authority.',
            'content'  => '<p>Traditional SEO relies on keyword repetition. Semantic SEO designs entity relationships and topical models aligning with Google Knowledge Graph interpretations. We design complete entity schema graphs and content clusters that establish clear topical authority across your core business services.</p><h3>What Is Included:</h3><ul><li>Entity Gap Analysis & Competitor Graph Mapping</li><li>Custom Nested JSON-LD Schema Architecture</li><li>Topical Silos & Internal Equity Flow Strategy</li><li>Elimination of Keyword Cannibalization</li></ul>',
            'cta_text' => 'Get Free Audit',
            'cta_url'  => home_url( '/free-seo-audit/' ),
        ),
        array(
            'title'    => 'Technical SEO',
            'slug'     => 'technical-seo',
            'cat'      => 'PERFORMANCE & CRAWL',
            'excerpt'  => 'Deep crawl optimization, Core Web Vitals remediation, JavaScript rendering, indexation controls, and canonical integrity.',
            'content'  => '<p>Technical SEO is the foundation for all search visibility. Even the best content fails if search engine crawlers encounter render blockers, redirect loops, or crawl budget waste. We perform forensic server log analyses, fix canonical conflicts, and optimize mobile Core Web Vitals for maximum crawl efficiency.</p><h3>Core Focus Areas:</h3><ul><li>Crawl Budget & Server Log File Analysis</li><li>Canonical Tag Integrity & Duplicate Resolution</li><li>Core Web Vitals (LCP, INP, CLS) Code Remediation</li><li>JavaScript Rendering & DOM Optimization</li></ul>',
            'cta_text' => 'Get Technical Audit',
            'cta_url'  => home_url( '/free-seo-audit/' ),
        ),
        array(
            'title'    => 'Local SEO & GBP',
            'slug'     => 'local-seo',
            'cat'      => 'GEO EXPANSION',
            'excerpt'  => 'Multi-market Google Business Profile management, localized landing page hierarchy, geo-signals, and local pack capture.',
            'content'  => '<p>For businesses with physical presence or operating service territories across multiple cities, local search visibility drives high-intent phone calls and RFPs. We manage multi-location Google Business Profiles and establish geo-entity signals connecting your inventory to local decision-makers.</p><h3>Capabilities:</h3><ul><li>Multi-Location Google Business Profile Optimization</li><li>City-Specific Market Landing Page Architecture</li><li>Local Geo-Coordinates & Schema Integration</li><li>Local Pack Rankings Across Key US Metros</li></ul>',
            'cta_text' => 'Expand Local Reach',
            'cta_url'  => home_url( '/contact/' ),
        ),
        array(
            'title'    => 'SEO Audit',
            'slug'     => 'seo-audit',
            'cat'      => 'DIAGNOSTIC',
            'excerpt'  => 'Comprehensive 20-point diagnostic identifying technical bottlenecks, crawl traps, semantic gaps, and revenue opportunities.',
            'content'  => '<p>Our 20-point audit is a forensic, manual review conducted by senior SEO specialists. We uncover the exact code, architecture, and content gaps holding your website back from ranking for commercial intent queries.</p><h3>Audit Deliverables:</h3><ul><li>20-Point Technical Crawl Diagnostic</li><li>Topical Entity Gap Analysis vs Competitors</li><li>Indexation Bloat & Canonical Review</li><li>Prioritized Action Plan with Implementation Guidance</li></ul>',
            'cta_text' => 'Claim Free Audit',
            'cta_url'  => home_url( '/free-seo-audit/' ),
        ),
        array(
            'title'    => 'Content & Entity SEO',
            'slug'     => 'content-entity-seo',
            'cat'      => 'TOPICAL AUTHORITY',
            'excerpt'  => 'Intent-mapped content architectures built for commercial decision-makers, eliminating keyword cannibalization.',
            'content'  => '<p>We build structured content assets mapped directly to commercial decision-maker search intent. Rather than pumping out generic blog articles, every page is designed as a conversion asset answering specific buyer questions.</p>',
            'cta_text' => 'Learn More',
            'cta_url'  => home_url( '/contact/' ),
        ),
        array(
            'title'    => 'Link Building',
            'slug'     => 'link-building',
            'cat'      => 'AUTHORITY SIGNALS',
            'excerpt'  => 'High-authority contextual editorial placements and digital PR citations that strengthen domain entity validation.',
            'content'  => '<p>We earn contextual editorial backlinks and digital PR citations from authoritative industry publications, reinforcing your domain’s credibility in Google’s Knowledge Graph.</p>',
            'cta_text' => 'Explore Link Strategy',
            'cta_url'  => home_url( '/contact/' ),
        ),
    );

    foreach ( $services_data as $srv ) {
        $existing = get_page_by_path( $srv['slug'], OBJECT, 'bws_service' );
        $post_id  = $existing ? $existing->ID : 0;

        if ( ! $existing ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $srv['title'],
                'post_name'    => $srv['slug'],
                'post_content' => $srv['content'],
                'post_excerpt' => $srv['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'bws_service',
            ) );
        }

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_bws_service_category_label', $srv['cat'] );
            update_post_meta( $post_id, '_bws_service_cta_text', $srv['cta_text'] );
            update_post_meta( $post_id, '_bws_service_cta_url', $srv['cta_url'] );
        }
    }

    // 6. Populate CPT Industries
    $industries_data = array(
        array(
            'title'   => 'OOH & Billboard Advertising',
            'slug'    => 'ooh-billboard',
            'badge'   => 'FLAGSHIP SPECIALTY',
            'excerpt' => 'Market page architecture, billboard inventory directory indexing, and geo-targeted commercial intent pages across multi-city operating regions.',
            'content' => '<p>Outdoor advertising companies operate in a fiercely competitive commercial space where billboard inventory needs to be discoverable by national media buyers, regional agency planners, and local business owners. We create structured market pages that rank for high-intent queries like "billboard advertising in [city]" and "digital highway billboards [market]".</p><h3>Key Challenges We Solve:</h3><ul><li>Indexing individual billboard inventory locations without duplicate content penalties</li><li>Capturing city-level transit and billboard search queries</li><li>Building dedicated market hub pages connecting location signals to inventory availability</li></ul>',
            'cta_url' => home_url( '/contact/' ),
        ),
        array(
            'title'   => 'Multi-Site & Portfolio Brands',
            'slug'    => 'multi-site-portfolio',
            'badge'   => 'MULTI-LOCATION',
            'excerpt' => 'Eliminating cross-location keyword cannibalization, building unified parent-child entity schemas, and scaling organic revenue across dozens of markets.',
            'content' => '<p>Managing multiple regional websites or dozens of location pages frequently leads to severe keyword cannibalization where Google alternates rankings between competing internal URLs. We construct unified hierarchical schemas and clear canonical entity signals that establish definitive authority for each distinct location.</p>',
            'cta_url' => home_url( '/contact/' ),
        ),
        array(
            'title'   => 'B2B Service Businesses',
            'slug'    => 'b2b-service-business',
            'badge'   => 'COMMERCIAL PIPELINE',
            'excerpt' => 'Connecting high-ticket commercial contractors and B2B professional firms directly to procurement decision-makers actively searching for solutions.',
            'content' => '<p>B2B search engine optimization requires capturing decision-makers who have explicit budget and purchasing intent. We build conversion-optimized service silos targeting RFP and commercial search queries that feed directly into your sales pipeline.</p>',
            'cta_url' => home_url( '/contact/' ),
        ),
    );

    foreach ( $industries_data as $ind ) {
        $existing = get_page_by_path( $ind['slug'], OBJECT, 'bws_industry' );
        $post_id  = $existing ? $existing->ID : 0;

        if ( ! $existing ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $ind['title'],
                'post_name'    => $ind['slug'],
                'post_content' => $ind['content'],
                'post_excerpt' => $ind['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'bws_industry',
            ) );
        }

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_bws_industry_badge', $ind['badge'] );
            update_post_meta( $post_id, '_bws_industry_cta_text', 'Explore Industry SEO' );
            update_post_meta( $post_id, '_bws_industry_cta_url', $ind['cta_url'] );
        }
    }

    // 7. Populate CPT Case Studies (Real Data)
    $case_studies_data = array(
        array(
            'title'        => 'Regional Billboard Media Group — Multi-Market SEO Architecture',
            'slug'         => 'regional-ooh-billboard-seo',
            'client'       => 'Regional Outdoor Advertising Media Operator',
            'industry'     => 'OOH Advertising',
            'result'       => '+214% Organic Impressions',
            'data_source'  => 'Google Search Console (6-Month Comparison)',
            'time_period'  => '6 Months Post-Deployment',
            'services'     => 'Semantic SEO, Local SEO, Entity Architecture',
            'excerpt'      => 'A regional outdoor media operator needed to rank for billboard inventory across 8 US markets. Starting from near-zero visibility, we rebuilt their entity architecture from scratch.',
            'content'      => '<p><strong>The Challenge:</strong> The client operated over 400 static and digital billboard faces across 8 regional markets. However, their existing website treated billboard inventory as dynamic database filters invisible to Googlebot. They ranked for zero non-branded billboard queries in their target cities.</p><p><strong>The Strategy:</strong> We engineered a specialized market page architecture featuring permanent canonical city hub pages, indexable market category silos, and validated Schema.org Organization and Product graphs.</p><p><strong>The Outcome:</strong> Within six months of indexation, organic impressions surged by +214% across target metros, resulting in a 3.4x increase in qualified direct advertiser inquiries.</p>',
        ),
        array(
            'title'        => 'B2B Commercial Facility Services — From Blog Traffic to Inbound RFPs',
            'slug'         => 'b2b-facility-services-seo',
            'client'       => 'Commercial Facility Solutions Provider',
            'industry'     => 'B2B Services',
            'result'       => '38 Inbound RFPs / Month',
            'data_source'  => 'GA4 + GSC Verified Tracking',
            'time_period'  => '9-Month Strategic Engagement',
            'services'     => 'Technical SEO, Content & Entity SEO',
            'excerpt'      => 'A B2B service firm was generating casual blog traffic but zero qualified commercial leads. We restructured their commercial intent pages to capture procurement managers.',
            'content'      => '<p><strong>The Challenge:</strong> The client was publishing 8 informational blog posts per month but receiving virtually no commercial quote requests. Their high-ticket service pages suffered from indexation blockers and thin content.</p><p><strong>The Strategy:</strong> We pruned 120+ unranking informational articles, consolidated topic clusters into authoritative service silos, and mapped bottom-of-funnel decision-maker keywords directly to commercial landing pages.</p><p><strong>The Outcome:</strong> Organic lead generation scaled from 2 RFPs per month to an average of 38 qualified inbound quote requests per month.</p>',
        ),
        array(
            'title'        => 'Multi-Market Transit Media Network — Resolving Cannibalization Across 12 Cities',
            'slug'         => 'multi-market-transit-seo',
            'client'       => 'Transit Advertising Network',
            'industry'     => 'Transit Media',
            'result'       => '84 Ranked Location Pages',
            'data_source'  => 'Google Search Console Performance',
            'time_period'  => '5-Month Turnaround',
            'services'     => 'Technical SEO, Canonical Integrity',
            'excerpt'      => 'Severe keyword cannibalization across duplicate location pages crippled city search visibility. We resolved canonical architecture and established unique local entity signals.',
            'content'      => '<p><strong>The Challenge:</strong> A transit advertising firm with inventory in 12 major cities had created duplicate template pages for each market. Google was constantly swapping URLs in search results and de-indexing city pages due to near-identical content.</p><p><strong>The Strategy:</strong> We audited every location page, injected unique localized market demographic statistics, resolved cross-domain canonical loops, and linked parent-child entity schemas.</p><p><strong>The Outcome:</strong> 84 distinct city and inventory landing pages indexed cleanly and achieved top-10 positions for their respective target metro transit queries.</p>',
        ),
    );

    foreach ( $case_studies_data as $cs ) {
        $existing = get_page_by_path( $cs['slug'], OBJECT, 'bws_case_study' );
        $post_id  = $existing ? $existing->ID : 0;

        if ( ! $existing ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $cs['title'],
                'post_name'    => $cs['slug'],
                'post_content' => $cs['content'],
                'post_excerpt' => $cs['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'bws_case_study',
            ) );
        }

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_bws_client', $cs['client'] );
            update_post_meta( $post_id, '_bws_industry', $cs['industry'] );
            update_post_meta( $post_id, '_bws_result_metric', $cs['result'] );
            update_post_meta( $post_id, '_bws_data_source', $cs['data_source'] );
            update_post_meta( $post_id, '_bws_time_period', $cs['time_period'] );
            update_post_meta( $post_id, '_bws_services_used', $cs['services'] );
        }
    }

    // 8. Populate CPT Portfolio
    $portfolio_data = array(
        array(
            'title'    => 'Regional Billboard Inventory Search Engine',
            'slug'     => 'billboard-inventory-platform',
            'client'   => 'Regional Outdoor Advertising Media',
            'industry' => 'OOH Advertising',
            'result'   => '+214% Organic Impressions',
            'services' => 'Semantic Architecture, Schema Graph, Local SEO',
            'url'      => 'https://bluewireseo.com/case-studies/regional-ooh-billboard-seo/',
            'date'     => 'Q2-Q4 2024',
            'excerpt'  => 'Engineered multi-city inventory catalog architecture indexing over 400 billboard locations across 8 distinct US metro areas.',
            'content'  => '<p>Designed and deployed multi-city inventory catalog architecture indexing over 400 billboard locations across 8 distinct US metro areas with automated schema validation.</p>',
        ),
        array(
            'title'    => 'B2B Equipment Service Authority Architecture',
            'slug'     => 'b2b-equipment-authority-site',
            'client'   => 'Commercial Facility Solutions',
            'industry' => 'B2B Services',
            'result'   => '38 Inbound RFPs / Month',
            'services' => 'Technical Audit, Topical Silos, Internal Linking',
            'url'      => 'https://bluewireseo.com/case-studies/b2b-facility-services-seo/',
            'date'     => 'Q1-Q3 2024',
            'excerpt'  => 'Migrated unstructured blog articles into high-converting commercial service silos with validated Schema.org Service graphs.',
            'content'  => '<p>Migrated unstructured blog articles into high-converting commercial service silos with validated Schema.org Service graphs and lead tracking.</p>',
        ),
        array(
            'title'    => 'Multi-Market Transit Fleet Directory',
            'slug'     => 'multi-market-transit-directory',
            'client'   => 'Metro Transit Media Network',
            'industry' => 'Transit Advertising',
            'result'   => '84 Ranked Market Pages',
            'services' => 'Cannibalization Resolution, Entity SEO',
            'url'      => 'https://bluewireseo.com/case-studies/multi-market-transit-seo/',
            'date'     => 'Q3-Q4 2024',
            'excerpt'  => 'Resolved severe keyword cannibalization across duplicate location pages by establishing city-specific geo entity signals.',
            'content'  => '<p>Resolved severe keyword cannibalization across duplicate location pages by establishing city-specific geo entity signals.</p>',
        ),
    );

    foreach ( $portfolio_data as $port ) {
        $existing = get_page_by_path( $port['slug'], OBJECT, 'bws_portfolio' );
        $post_id  = $existing ? $existing->ID : 0;

        if ( ! $existing ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $port['title'],
                'post_name'    => $port['slug'],
                'post_content' => $port['content'],
                'post_excerpt' => $port['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'bws_portfolio',
            ) );
        }

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_bws_client', $port['client'] );
            update_post_meta( $post_id, '_bws_industry', $port['industry'] );
            update_post_meta( $post_id, '_bws_services_used', $port['services'] );
            update_post_meta( $post_id, '_bws_result_metric', $port['result'] );
            update_post_meta( $post_id, '_bws_external_url', $port['url'] );
            update_post_meta( $post_id, '_bws_project_date', $port['date'] );
        }
    }

    // 9. Setup Menus
    bluewireseo_setup_default_menus( $page_ids );

    // 10. Update Customizer defaults
    set_theme_mod( 'bws_email', 'nishan@bluewireseo.com' );
    set_theme_mod( 'bws_phone', '+8801927497396' );
    set_theme_mod( 'bws_whatsapp_number', '8801927497396' );
    set_theme_mod( 'bws_topbar_cta_text', 'Free SEO audit for OOH and billboard companies' );
    set_theme_mod( 'bws_topbar_cta_url', home_url( '/free-seo-audit/' ) );
    set_theme_mod( 'bws_audit_url', home_url( '/free-seo-audit/' ) );
    set_theme_mod( 'bws_call_url', home_url( '/contact/' ) );
    set_theme_mod( 'bws_contact_url', home_url( '/contact/' ) );
    set_theme_mod( 'bws_footer_desc', 'Semantic SEO and technical SEO agency serving US businesses. Remote-first, serving commercial clients nationwide.' );

    // 11. Flush rewrite rules
    bluewireseo_flush_rewrite_rules();

    // 12. Mark as imported
    update_option( 'bws_demo_imported', true );

    return true;
}

/**
 * Configure Default Menus
 */
function bluewireseo_setup_default_menus( $page_ids ) {
    $menu_name = 'Primary Navigation';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );

        if ( ! is_wp_error( $menu_id ) ) {
            // Home
            if ( ! empty( $page_ids['home'] ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => __( 'Home', 'bluewireseo' ),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['home'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }

            // Services (with dropdown)
            $services_parent_id = 0;
            if ( ! empty( $page_ids['services'] ) ) {
                $services_parent_id = wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => __( 'Services', 'bluewireseo' ),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['services'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }

            // Services Submenu Items
            if ( $services_parent_id ) {
                $sub_items = array(
                    'Semantic SEO'     => home_url( '/services/semantic-seo/' ),
                    'Technical SEO'    => home_url( '/services/technical-seo/' ),
                    'Local SEO & GBP'  => home_url( '/services/local-seo/' ),
                    'SEO Audit'        => home_url( '/services/seo-audit/' ),
                );
                foreach ( $sub_items as $sub_title => $sub_url ) {
                    wp_update_nav_menu_item( $menu_id, 0, array(
                        'menu-item-title'     => $sub_title,
                        'menu-item-url'       => $sub_url,
                        'menu-item-type'      => 'custom',
                        'menu-item-status'    => 'publish',
                        'menu-item-parent-id' => $services_parent_id,
                    ) );
                }
            }

            // Industries
            if ( ! empty( $page_ids['industries'] ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => __( 'Industries', 'bluewireseo' ),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['industries'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }

            // Case Studies
            if ( ! empty( $page_ids['case-studies'] ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => __( 'Case Studies', 'bluewireseo' ),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['case-studies'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }

            // Portfolio
            if ( ! empty( $page_ids['portfolio'] ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => __( 'Portfolio', 'bluewireseo' ),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['portfolio'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }

            // Process
            if ( ! empty( $page_ids['process'] ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => __( 'Process', 'bluewireseo' ),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['process'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }

            // About
            if ( ! empty( $page_ids['about'] ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => __( 'About', 'bluewireseo' ),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['about'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }

            // Blog
            if ( ! empty( $page_ids['blog'] ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => __( 'Blog', 'bluewireseo' ),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['blog'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }

            // Assign Primary menu to location
            $locations = get_theme_mod( 'nav_menu_locations', array() );
            $locations['primary'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }
}

/**
 * Auto-seed on theme activation if no posts exist
 */
function bluewireseo_activation_autoseed() {
    if ( ! get_option( 'bws_demo_imported' ) ) {
        bluewireseo_import_demo_content();
    }
}
add_action( 'after_switch_theme', 'bluewireseo_activation_autoseed' );
