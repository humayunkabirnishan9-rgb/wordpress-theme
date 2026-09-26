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
 * Check if core pages or front page are missing from the site
 */
function bluewireseo_are_core_pages_missing() {
    $front_id = get_option( 'page_on_front' );
    if ( empty( $front_id ) || 'publish' !== get_post_status( $front_id ) ) {
        return true;
    }

    $required_slugs = array( 'home', 'services', 'case-studies', 'portfolio' );
    foreach ( $required_slugs as $slug ) {
        $page = get_page_by_path( $slug );
        if ( ! $page || 'publish' !== $page->post_status ) {
            return true;
        }
    }

    $locations = get_nav_menu_locations();
    if ( empty( $locations['primary'] ) ) {
        return true;
    }

    return false;
}

/**
 * Handle 1-click Restore query parameter in WP Admin
 */
function bluewireseo_handle_restore_action() {
    if ( isset( $_GET['bws_action'] ) && 'restore' === $_GET['bws_action'] ) {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'Unauthorized access.', 'bluewireseo' ) );
        }
        check_admin_referer( 'bws_restore_action_nonce', 'bws_nonce' );

        bluewireseo_import_demo_content();

        wp_safe_redirect( admin_url( 'themes.php?page=bluewireseo-setup&restored=1' ) );
        exit;
    }
}
add_action( 'admin_init', 'bluewireseo_handle_restore_action' );

/**
 * Admin notice for 1-click setup or missing page restore
 */
function bluewireseo_setup_admin_notice() {
    $screen = get_current_screen();
    if ( $screen && 'appearance_page_bluewireseo-setup' === $screen->id ) {
        return;
    }

    $imported     = get_option( 'bws_demo_imported', false );
    $need_restore = bluewireseo_are_core_pages_missing();

    if ( ! $imported ) {
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
    } elseif ( $need_restore ) {
        $restore_url = wp_nonce_url(
            admin_url( 'themes.php?page=bluewireseo-setup&bws_action=restore' ),
            'bws_restore_action_nonce',
            'bws_nonce'
        );
        ?>
        <div class="notice notice-warning is-dismissible" style="padding:15px; border-left-color:#F59E0B;">
            <h3 style="margin-top:0; color:#B45309;"><?php esc_html_e( 'BlueWireSEO Notice: Core Pages or Menus Missing', 'bluewireseo' ); ?></h3>
            <p style="font-size:14px; line-height:1.5; color:#1E293B;">
                <?php esc_html_e( 'It looks like your pages or navigation menus were deleted (or the front page is unassigned). Click below to immediately restore the homepage, case studies, portfolio, services, and primary menu bar.', 'bluewireseo' ); ?>
            </p>
            <p>
                <a href="<?php echo esc_url( $restore_url ); ?>" class="button button-primary" style="background:#2563EB; border-color:#1D4ED8; font-weight:700;">
                    <?php esc_html_e( 'Restore All Pages & Menus in 1-Click &rarr;', 'bluewireseo' ); ?>
                </a>
                <a href="<?php echo esc_url( admin_url( 'themes.php?page=bluewireseo-setup' ) ); ?>" class="button button-secondary" style="margin-left:8px;">
                    <?php esc_html_e( 'Open Setup Dashboard', 'bluewireseo' ); ?>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'bluewireseo_setup_admin_notice' );

/**
 * Setup Page Render
 */
function bluewireseo_setup_page_callback() {
    $imported     = get_option( 'bws_demo_imported', false );
    $need_restore = bluewireseo_are_core_pages_missing();

    // Handle manual import submission
    if ( isset( $_POST['bws_run_import'] ) && check_admin_referer( 'bws_import_nonce_action', 'bws_import_nonce' ) ) {
        bluewireseo_import_demo_content();
        $imported     = true;
        $need_restore = false;
        echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__( 'BlueWireSEO site setup completed successfully! Your homepage, pages, custom post types, menus, and Elementor templates are now live.', 'bluewireseo' ) . '</strong></p></div>';
    }

    if ( isset( $_GET['restored'] ) && '1' === $_GET['restored'] ) {
        echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__( 'All BlueWireSEO core pages, menus, reading settings, and custom post types have been restored successfully!', 'bluewireseo' ) . '</strong></p></div>';
    }
    ?>
    <div class="wrap" style="max-width:900px; margin-top:20px;">
        <div style="background:#FFFFFF; border:1px solid #E2E8F0; border-radius:12px; padding:30px; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
            <div style="display:flex; align-items:center; gap:15px; margin-bottom:20px; border-bottom:1px solid #E2E8F0; padding-bottom:20px;">
                <div style="width:48px; height:48px; border-radius:10px; background:#0F1B3D; display:flex; align-items:center; justify-content:center; color:#2563EB; font-size:24px; font-weight:800;">BW</div>
                <div>
                    <h1 style="margin:0; font-size:24px; color:#0F1B3D; font-weight:700;"><?php esc_html_e( 'BlueWireSEO — Complete Site Setup & Page Recovery', 'bluewireseo' ); ?></h1>
                    <p style="margin:4px 0 0; color:#718096;"><?php esc_html_e( 'One-click automated setup and page recovery for the complete BlueWireSEO theme.', 'bluewireseo' ); ?></p>
                </div>
            </div>

            <?php if ( $need_restore ) : ?>
                <div style="padding:15px 20px; background:#FFFBEB; border:1px solid #F59E0B; border-radius:8px; margin-bottom:25px; color:#92400E;">
                    <strong><?php esc_html_e( 'Action Needed:', 'bluewireseo' ); ?></strong>
                    <?php esc_html_e( 'Some core pages or menus appear to be deleted or unassigned. Click below to restore all pages, menus, and reading settings.', 'bluewireseo' ); ?>
                </div>
            <?php elseif ( $imported ) : ?>
                <div style="padding:15px 20px; background:#ECFDF5; border:1px solid #10B981; border-radius:8px; margin-bottom:25px; color:#065F46;">
                    <strong><?php esc_html_e( 'Status: Active & Configured.', 'bluewireseo' ); ?></strong>
                    <?php esc_html_e( 'BlueWireSEO demo content and site settings are active. You can re-run the importer at any time to sync data or restore deleted pages.', 'bluewireseo' ); ?>
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
            'content'   => '<p class="bws-lead">BlueWireSEO is an agile semantic and technical SEO consultancy founded by Humayun Kabir Nishan. We engineer search architecture, entity knowledge graphs, and crawl models that connect commercial B2B companies and outdoor advertising networks to qualified enterprise buyers.</p><h2>Our Core Operating Philosophy</h2><p>Traditional SEO agencies sell hours, vanity impressions, and generic keyword counts. In contrast, BlueWireSEO operates on a commercial outcome model: every URL, schema attribute, and topical cluster must directly advance pipeline velocity, displacement of entrenched competitors, or geographic market domination.</p><div class="bws-grid-3" style="gap:1.5rem; margin:2.5rem 0;"><div class="bws-card" style="padding:1.75rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md);"><h3>100% White-Hat</h3><p>Every tactic adheres strictly to Google Search Essentials and Knowledge Graph entity guidelines. No algorithmic risks or transient PBN schemes.</p></div><div class="bws-card" style="padding:1.75rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md);"><h3>Senior Specialist Led</h3><p>No junior account handlers. Strategic roadmaps and code remediation are directly architected by senior specialists with verified GSC track records.</p></div><div class="bws-card" style="padding:1.75rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md);"><h3>Verifiable Proof</h3><p>We cite real analytics platforms (GSC, GA4, BigQuery) and exact timestamped measurement windows on every single client milestone.</p></div></div>',
        ),
        'services' => array(
            'title'     => 'Services',
            'template'  => 'page-templates/services.php',
            'content'   => '<p class="bws-lead">Every service in the BlueWireSEO framework is engineered to compound topical authority, fix code-level crawl bottlenecks, and capture high-intent commercial buyers actively seeking solutions.</p><h2>Comprehensive Architectural Capabilities</h2><p>Rather than offering generic monthly packages, our engagements are structured across distinct technical, semantic, and local execution layers tailored to your business model:</p><ul><li><strong>Semantic SEO & Knowledge Graphs:</strong> Entity-based topical clustering, custom nested JSON-LD schemas, and elimination of internal keyword cannibalization.</li><li><strong>Technical Crawl Optimization:</strong> Forensic server log audits, mobile Core Web Vitals (LCP/INP/CLS) remediation, JavaScript DOM optimization, and canonical loop resolution.</li><li><strong>Hyperlocal & Multi-Market SEO:</strong> City and county market landing page matrix with road traffic counts, DOOH spec portals, and Google Business Profile local pack capture.</li><li><strong>Intent-Driven Content Silos:</strong> Authoritative commercial decision-maker cluster guides mapped directly to high-LTV transaction queries.</li></ul><p>Ready to diagnose your current search bottlenecks? <a href="/free-seo-audit/" class="bws-btn bws-btn-primary" style="margin-left:0.5rem;">Claim Your 20-Point Audit &rarr;</a></p>',
        ),
        'industries' => array(
            'title'     => 'Industries',
            'template'  => 'page-templates/industries.php',
            'content'   => '<p class="bws-lead">We specialize in sectors where search intent is high-ticket, geographic entity signals matter, and off-the-shelf agency playbooks consistently fail.</p><h2>Specialized Practice Areas</h2><div class="bws-grid-2" style="gap:2rem; margin:2.5rem 0;"><div class="bws-card" style="padding:2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);"><h3>OOH & Billboard Advertising</h3><p>Flagship specialty. We index individual billboard inventory locations, capture city-level transit and billboard search queries, and build dedicated market hub pages connecting location signals to inventory availability.</p></div><div class="bws-card" style="padding:2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);"><h3>Multi-Site & Portfolio Brands</h3><p>We eliminate cross-location keyword cannibalization, construct unified hierarchical schemas, and establish clear canonical entity signals across dozens of regional operating markets.</p></div><div class="bws-card" style="padding:2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);"><h3>High-Ticket B2B & Commercial Contractors</h3><p>We capture enterprise procurement decision-makers who have explicit budget and purchasing intent, building conversion-optimized service silos targeting RFP search queries.</p></div><div class="bws-card" style="padding:2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg);"><h3>European Automotive & Specialized Services</h3><p>We deploy per-make topical silos (BMW, Mercedes, Porsche, Audi), inject AutoRepair schema, and optimize search snippets to displace entrenched dealership domains.</p></div></div>',
        ),
        'case-studies' => array(
            'title'     => 'Case Studies',
            'template'  => 'page-templates/case-studies.php',
            'content'   => '<p class="bws-lead">Verified search performance backed by real Google Search Console and GA4 data sources. No invented metrics — every case study includes verified timestamps and analytics proof.</p><h2>Featured Verified Turnarounds</h2><p>Review our recent client engagements showing real GSC and analytics screenshots, strategic methodologies, and commercial business outcomes:</p><ul><li><strong>GlobalAir Airport Services:</strong> 56x Clicks surge (5 &rarr; 282) and 245x Impressions jump (84 &rarr; 20,600) in 28 days with zero prior organic visibility in Dhaka.</li><li><strong>Capital Outdoor Inc.:</strong> +18% Organic Keywords and 8 AI Overview citations across NC & VA billboard markets by capturing 1,200+ zero-click impressions.</li><li><strong>Franklin Outdoor Advertising:</strong> 103,000 Impressions window, #2 Minneapolis, #6 Wisconsin, +11% monthly traffic by eliminating 12% 404 crawl waste.</li><li><strong>BMV Service:</strong> Top 3 for BMW & Mercedes repair in Gaithersburg, MD, unlocking 50-80 additional qualified leads/month displacing franchise dealers.</li></ul>',
        ),
        'portfolio' => array(
            'title'     => 'Portfolio',
            'template'  => 'page-templates/portfolio.php',
            'content'   => '<p class="bws-lead">Explore individual client campaigns, technical architecture deployments, and multi-market expansions led by Humayun Kabir Nishan.</p><h2>Selected Strategic Engagements</h2><p>Click on any portfolio project below to review the complete technical challenge, architecture methodology, code fixes, and verified Google Search Console results.</p>',
        ),
        'process' => array(
            'title'     => 'Process',
            'template'  => 'page-templates/process.php',
            'content'   => '<p class="bws-lead">Our repeatable 4-phase framework transforms search from an unpredictable gamble into a compounding, capital-efficient client acquisition pipeline.</p><h2>The BlueWireSEO 4-Phase Compounding Framework</h2><ol style="margin-left:1.5rem; line-height:1.8;"><li><strong>Phase 1: Forensic Diagnostic & 20-Point Audit (Days 1–14):</strong> Manual log file analysis, indexation bloat review, canonical mapping, and competitor entity gap identification.</li><li><strong>Phase 2: Code Remediation & Core Web Vitals (Days 15–30):</strong> Resolving crawl blockers, fixing redirect chains, streamlining DOM rendering, and optimizing LCP/INP scores.</li><li><strong>Phase 3: Semantic Entity Modeling & Silos (Days 31–60):</strong> Constructing authoritative topical clusters, deploying nested JSON-LD schema graphs, and launching intent-mapped landing pages.</li><li><strong>Phase 4: Compounding Authority & Pipeline Capture (Day 60+):</strong> Ongoing digital PR citations, query expansion mining, AI Overview optimization, and conversion rate enhancement.</li></ol>',
        ),
        'contact' => array(
            'title'     => 'Contact',
            'template'  => 'page-templates/contact.php',
            'content'   => '<p class="bws-lead">Have a question about your site’s search architecture, or want a custom strategic proposal? Connect directly with Humayun Kabir Nishan.</p><p>We do not route client inquiries to junior account executives. Every inquiry is reviewed personally by our senior SEO specialist within 2-4 business hours.</p>',
        ),
        'free-seo-audit' => array(
            'title'     => 'Free SEO Audit',
            'template'  => 'page-templates/free-seo-audit.php',
            'content'   => '<p class="bws-lead">Request a comprehensive 20-point technical & semantic audit delivered to your inbox within 48-72 business hours.</p><h2>What We Inspect in Your 20-Point Audit:</h2><ul><li>Crawl traps, redirect loops, and server log budget waste</li><li>Canonical integrity and trailing slash duplicate content</li><li>Topical entity gaps versus top-ranking commercial competitors</li><li>Core Web Vitals mobile field metrics (LCP, INP, CLS)</li><li>Structured data schema validation and Knowledge Graph alignment</li><li>Indexation bloat and non-performing URL pruning opportunities</li></ul>',
        ),
        'blog' => array(
            'title'     => 'Blog',
            'template'  => 'default',
            'content'   => '<p class="bws-lead">In-depth guides, case studies, and engineering breakdowns on Semantic SEO, entity modeling, and technical crawl optimization for modern commercial websites.</p>',
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
        $existing = get_page_by_path( $slug, OBJECT, 'page' );
        if ( ! $existing ) {
            // Check trash and draft statuses
            $other_posts = get_posts( array(
                'name'        => $slug,
                'post_type'   => 'page',
                'post_status' => array( 'trash', 'draft', 'pending', 'private' ),
                'numberposts' => 1,
            ) );
            if ( ! empty( $other_posts ) ) {
                $existing = $other_posts[0];
            }
        }

        if ( $existing ) {
            $page_ids[ $slug ] = $existing->ID;
            $update_args = array(
                'ID'          => $existing->ID,
                'post_status' => 'publish',
            );
            // If existing page content is minimal, populate with full rich demo content
            if ( strlen( trim( strip_tags( $existing->post_content ) ) ) < 80 && ! empty( $data['content'] ) ) {
                $update_args['post_content'] = $data['content'];
            }
            wp_update_post( $update_args );

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

    // 7. Populate CPT Case Studies (Humayun Kabir Nishan Real Client Data)
    $case_studies_data = array(
        array(
            'title'        => 'GlobalAir Airport Services — 56x Click Surge in 28 Days',
            'slug'         => 'globalair-airport-assistance-seo',
            'client'       => 'GlobalAir (globalair.com.bd)',
            'industry'     => 'Airport Assistance Services',
            'result'       => '56x Clicks / 245x Impressions',
            'data_source'  => 'Google Search Console (28-Day Window)',
            'time_period'  => 'May – June 2026',
            'services'     => 'Technical SEO, Canonical Fix, Metadata & Pillar Architecture',
            'excerpt'      => 'Rebuilt a brand new airport VIP assistance site with zero organic visibility in Dhaka. Fixed HTTP/HTTPS/WWW canonical splits, deployed targeted meta tags, and built 4 long-form airport guide clusters.',
            'content'      => '<p><strong>The Challenge:</strong> GlobalAir (globalair.com.bd) provides premium airport assistance and meet &amp; greet services at Hazrat Shahjalal International Airport (HSIA), Dhaka. The brand new website suffered from zero organic search presence, canonical URL splits across non-www and http variants, missing meta descriptions, and zero structured content.</p><p><strong>The Strategy:</strong> We executed a 4-step turnaround: consolidated 301 canonical redirects to a single HTTPS version, mapped commercial keywords across core service pages, and built 4 long-form cluster guides covering HSIA travel, customs, immigration, and VIP services.</p><p><strong>The Outcome:</strong> Within 28 days, organic clicks grew from 5 to 282 (a 56x surge), impressions jumped from 84 to 20,600 (a 245x increase), and average position improved to #6 with multiple queries ranking #1-4.</p>',
        ),
        array(
            'title'        => 'Capital Outdoor Inc. — Hyperlocal OOH Billboard Architecture',
            'slug'         => 'capital-outdoor-billboard-seo',
            'client'       => 'Capital Outdoor Inc. (capitaloutdoorinc.com)',
            'industry'     => 'US OOH Advertising (NC & VA)',
            'result'       => '+18% Organic Keywords / 8 AI Mentions',
            'data_source'  => 'Google Search Console Crawl & Query Data',
            'time_period'  => 'June 2026 Strategy Roadmap',
            'services'     => 'Sub-Location Architecture, Spec Sheet SEO, GSC Mining',
            'excerpt'      => 'Identified 747 high-intent zero-click impressions for Smithfield and 467 for Roanoke. Engineered localized county hub pages, fixed art spec redirect chains, and captured AI Overviews.',
            'content'      => '<p><strong>The Challenge:</strong> Capital Outdoor operated billboard inventory across Johnston County, Smithfield, NC, and Roanoke, VA. GSC data revealed 747 impressions for "smithfield billboards" and 467 for "roanoke billboards" with zero clicks due to missing dedicated location pages and redirect errors on art-spec URLs.</p><p><strong>The Strategy:</strong> We designed hyperlocal landing pages for Smithfield, Roanoke, and the I-95 corridor with road traffic counts, created an advertiser art specs portal capturing 21.75x40 dimensions, and optimized for DOOH programmatic search queries.</p><p><strong>The Outcome:</strong> Grew organic keywords by 18% to 126, achieved 8 AI search overview citations, and opened a direct pipeline for regional media buyers.',
        ),
        array(
            'title'        => 'Franklin Outdoor Advertising — Multi-State Billboard Domination',
            'slug'         => 'franklin-outdoor-advertising-seo',
            'client'       => 'Franklin Outdoor (franklinoutdoor.com)',
            'industry'     => 'Billboard Advertising (MN & WI)',
            'result'       => '#2 Minneapolis / #6 Wisconsin',
            'data_source'  => 'Google Search Console (103K Imp. Window)',
            'time_period'  => 'June 2026 Master Plan',
            'services'     => 'Core Web Vitals, Crawl Remediation, 3-Pillar Architecture',
            'excerpt'      => 'Fixed broken sitemaps, eliminated 12% 404 crawl waste, improved mobile speed from 59 to 84, and deployed a 3-pillar, 14-cluster topical roadmap dominating Minnesota and Wisconsin.',
            'content'      => '<p><strong>The Challenge:</strong> With 103,000 search impressions and 593 clicks, Franklin Outdoor suffered from a critically low 0.6% CTR and 23 average position. Googlebot was wasting crawl budget on a 12% 404 rate, a broken category sitemap, and mobile performance scored 59/100.</p><p><strong>The Strategy:</strong> We cleared 404 redirect chains, resolved trailing slash duplicate content, improved mobile Core Web Vitals to 84, and architected 3 authoritative pillars with 14 cluster posts covering billboard costs, digital formats, and landowner leasing.</p><p><strong>The Outcome:</strong> Grew organic keywords by 8.4% to 233, lifted organic traffic 11% to 703 visits/month, achieved #2 for "outdoor advertising minneapolis", #6 for "billboard advertising wisconsin", and earned 18 AI Overview citations.',
        ),
        array(
            'title'        => 'BMV Service — European Auto Repair Competitor Displacement',
            'slug'         => 'bmvservice-european-auto-repair-seo',
            'client'       => 'BMV Service (bmvservice.pro)',
            'industry'     => 'European Auto Repair (Gaithersburg, MD)',
            'result'       => 'Top 3 for BMW & Mercedes Repair',
            'data_source'  => 'Google Search Console (10K Impressions)',
            'time_period'  => 'June 2026 Audit & Deployment',
            'services'     => 'Per-Make Silos, Schema Graph, CTR Snippet Fixes',
            'excerpt'      => 'Restructured per-make service pages (BMW, Mercedes, Porsche, Audi), resolved missing H1 tags on 3 core pages, injected LocalBusiness and AutoRepair schema to outrank local dealerships.',
            'content'      => '<p><strong>The Challenge:</strong> Operating in Gaithersburg, MD, BMV Service had zero clicks for high-impression queries like "bmw repair" (588 impressions) and "bmw repair shop in gaithersburg" (285 impressions) at position 2 due to title and snippet mismatches.</p><p><strong>The Strategy:</strong> We built dedicated 700+ word per-make landing pages for BMW, Mercedes, Porsche, and Audi/VW, injected AutoRepair schema with service area markup, and optimized meta descriptions to align with transactional buyer intent.</p><p><strong>The Outcome:</strong> Unlocked 50-80 additional qualified calls/month and displaced high-DA dealership domains across Montgomery County.',
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

    // 8. Populate CPT Portfolio (Humayun Kabir Nishan Real Work)
    $portfolio_data = array(
        array(
            'title'    => 'GlobalAir Airport Services — Full SEO Turnaround',
            'slug'     => 'globalair-seo-turnaround',
            'client'   => 'GlobalAir (globalair.com.bd)',
            'industry' => 'Airport Assistance Services',
            'result'   => '56x Clicks / 245x Impressions',
            'services' => 'Technical SEO, Canonical Integrity, Content Architecture',
            'url'      => 'https://globalair.com.bd',
            'date'     => 'May – June 2026',
            'excerpt'  => 'Rebuilt a zero-visibility airport VIP assistance site in Dhaka, growing clicks from 5 to 282 and impressions from 84 to 20,600 in 28 days.',
            'content'  => '<p>Complete technical and on-page overhaul for airport VIP assistance at Hazrat Shahjalal International Airport (HSIA). Resolved canonical loops, deployed structured schema, and built 4 pillar guides that secured page 1 rankings across Dhaka airport service keywords.</p>',
        ),
        array(
            'title'    => 'Capital Outdoor Inc. — Hyperlocal OOH Billboard Architecture',
            'slug'     => 'capital-outdoor-inc-seo',
            'client'   => 'Capital Outdoor Inc. (capitaloutdoorinc.com)',
            'industry' => 'OOH Advertising',
            'result'   => '+18% Organic Keywords / 8 AI Mentions',
            'services' => 'Hyperlocal Landing Pages, Spec Sheet SEO, GSC Mining',
            'url'      => 'https://capitaloutdoorinc.com',
            'date'     => 'June 2026',
            'excerpt'  => 'Designed hyperlocal landing pages for Smithfield NC, Roanoke VA, and I-95 corridor, capturing 1,200+ high-intent search impressions with zero prior ranking.',
            'content'  => '<p>Designed hyperlocal landing page matrix capturing unserved billboard search demand across Johnston County and Western Virginia with custom artwork spec sheets and DOOH commercial silos.</p>',
        ),
        array(
            'title'    => 'Franklin Outdoor — Multi-State Billboard Directory Optimization',
            'slug'     => 'franklin-outdoor-billboards',
            'client'   => 'Franklin Outdoor (franklinoutdoor.com)',
            'industry' => 'Billboard Advertising',
            'result'   => '103K Imp. / #2 Minneapolis',
            'services' => 'Core Web Vitals, Crawl Remediation, 3-Pillar Roadmap',
            'url'      => 'https://franklinoutdoor.com',
            'date'     => 'June 2026',
            'excerpt'  => 'Audited crawl statistics, resolved 12% 404 crawl waste, optimized mobile Core Web Vitals to 84, and deployed 3-pillar 14-cluster topical authority plan.',
            'content'  => '<p>Fixed sitemap errors and 404/redirect waste, optimized mobile PageSpeed from 59 to 84, and deployed a 14-cluster topical authority model ranking #2 for outdoor advertising Minneapolis.</p>',
        ),
        array(
            'title'    => 'BMV Service — European Auto Repair Topical Silos',
            'slug'     => 'bmvservice-auto-repair-md',
            'client'   => 'BMV Service (bmvservice.pro)',
            'industry' => 'Automotive Local SEO',
            'result'   => 'Pos. 1-2 for BMW Repair',
            'services' => 'Per-Make Architecture, AutoRepair Schema, CTR Snippets',
            'url'      => 'https://bmvservice.pro',
            'date'     => 'June 2026',
            'excerpt'  => 'Constructed dedicated make-specific service pages (BMW, Mercedes, Porsche, Audi) in Gaithersburg, MD, eliminating missing H1 tags and outranking local dealers.',
            'content'  => '<p>Engineered comprehensive brand-specific landing pages for BMW, Mercedes, Porsche, and Audi with LocalBusiness schema, unlocking 50-80 additional qualified calls per month.</p>',
        ),
        array(
            'title'    => 'OpsIQ — Operations Strategy Platform & Fractional COO SEO',
            'slug'     => 'opsiq-operations-strategy-platform',
            'client'   => 'OpsIQ (opsiq.biz)',
            'industry' => 'B2B Consulting & SaaS',
            'result'   => '4,480 Impressions / Top 10',
            'services' => 'Topical Authority, Cannibalization Elimination, Sitemaps',
            'url'      => 'https://opsiq.biz',
            'date'     => 'June 2026',
            'excerpt'  => 'Targeted high-intent founder queries for fractional COO services, fixed 5 broken sitemaps, eliminated keyword cannibalization, and built conversion-focused playbooks.',
            'content'  => '<p>Deployed commercial intent landing pages for fractional COO services, fixed critical sitemap errors, and integrated a 47-point operational readiness lead magnet.</p>',
        ),
        array(
            'title'    => 'Trailhead Media — Sustained 656K Impressions Across 8 Metros',
            'slug'     => 'trailhead-media-billboard-strategy',
            'client'   => 'Trailhead Media (trailheadmedia.com)',
            'industry' => 'US Billboard Advertising',
            'result'   => '656K Imp. / 4.39K Clicks',
            'services' => 'Cannibalization Resolution, 6-Pillar Architecture',
            'url'      => 'https://trailheadmedia.com',
            'date'     => '2025 – 2026',
            'excerpt'  => 'Built unified multi-city parent-child entity schemas across South Carolina and 8 regional markets, ranking #1 for "advertising south carolina".',
            'content'  => '<p>Resolved keyword cannibalization across 8+ regional location pages and built a 6-pillar/24-cluster content model resulting in #1 ranking for advertising south carolina and 49 AI mentions.</p>',
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
