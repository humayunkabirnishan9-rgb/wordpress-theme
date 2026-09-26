<?php
/**
 * Template Name: BlueWireSEO — Services Overview
 * Template Post Type: page, post, bws_portfolio, bws_case_study, bws_service, bws_industry
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();

        if ( bluewireseo_is_elementor_active( get_the_ID() ) ) {
            echo '<div class="bws-elementor-container">';
            the_content();
            echo '</div>';
        } else {
            ?>
            $custom_title = get_post_meta( get_the_ID(), '_bws_custom_hero_title', true );
            $title        = ! empty( $custom_title ) ? $custom_title : get_the_title();
            $subtitle     = get_post_meta( get_the_ID(), '_bws_hero_subtitle', true );
            $eyebrow      = get_post_meta( get_the_ID(), '_bws_hero_eyebrow', true );
            $gsc_image    = get_post_meta( get_the_ID(), '_bws_gsc_image', true );
            $pdf_url      = get_post_meta( get_the_ID(), '_bws_pdf_url', true );
            $hide_hero    = get_post_meta( get_the_ID(), '_bws_hide_hero', true );

            if ( empty( $eyebrow ) ) {
                $eyebrow = __( 'CORE ARCHITECTURAL SERVICES', 'bluewireseo' );
            }
            if ( empty( $subtitle ) ) {
                $subtitle = __( 'Every service is engineered to compound topical authority, fix code-level crawl bottlenecks, and capture high-intent commercial buyers.', 'bluewireseo' );
            }

            if ( '1' !== $hide_hero ) :
                ?>
                <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem; position:relative; overflow:hidden;">
                    <div style="position:absolute; top:-80px; right:-80px; width:450px; height:450px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.2) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>
                    <div class="bws-container" style="position:relative; z-index:2;">
                        <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        <div style="max-width:800px; margin-top:1.25rem;">
                            <p class="bws-eyebrow" style="color:#93C5FD; margin-bottom:0.75rem;"><?php echo esc_html( $eyebrow ); ?></p>
                            <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin-bottom:1rem;">
                                <?php echo esc_html( $title ); ?>
                            </h1>
                            <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.88); font-size:1.125rem; line-height:1.65; margin-bottom:1.5rem;">
                                <?php echo esc_html( $subtitle ); ?>
                            </p>
                            <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
                                <a href="#services-audit-intake" class="bws-btn bws-btn-primary bws-btn-lg">
                                    <?php esc_html_e( 'Request Free SEO Audit', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </a>
                                <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="bws-btn bws-btn-outline-white bws-btn-lg">
                                    <?php esc_html_e( 'View Verified Proof & Case Studies', 'bluewireseo' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            ?>

            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <?php
                    $raw_content = get_the_content();
                    if ( ! empty( $raw_content ) && stripos( $raw_content, 'This is the' ) === false && strlen( trim( strip_tags( $raw_content ) ) ) > 15 ) :
                        echo '<div class="bws-content" style="max-width:860px; margin-bottom:3rem; font-size:1.0625rem; line-height:1.75;">';
                        the_content();
                        echo '</div>';
                    endif;
                    ?>

                    <!-- Search Console Proof Visual Card on Services Page -->
                    <div class="bws-gsc-proof-showcase" style="margin-bottom:3.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); overflow:hidden; background:var(--bws-white); box-shadow:var(--bws-shadow-md);">
                        <div style="background:#0F1B3D; color:#FFFFFF; padding:0.85rem 1.5rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                            <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; font-weight:700;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:#60A5FA; width:18px; height:18px; flex-shrink:0;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                                <span><?php esc_html_e( 'Google Search Console Verified Growth Baseline Across Client Campaigns', 'bluewireseo' ); ?></span>
                            </div>
                            <span style="font-size:0.75rem; background:rgba(37,99,235,0.4); padding:0.25rem 0.6rem; border-radius:4px; color:#93C5FD; font-weight:600;">
                                <?php esc_html_e( 'VERIFIED SEARCH CONSOLE PROOF', 'bluewireseo' ); ?>
                            </span>
                        </div>

                        <?php if ( ! empty( $gsc_image ) ) : ?>
                            <div style="padding:1.5rem; background:#F8FAFC; text-align:center;">
                                <img src="<?php echo esc_url( $gsc_image ); ?>" alt="<?php echo esc_attr( $title ); ?> Search Console Proof" style="width:100%; height:auto; border-radius:8px; border:1px solid #CBD5E1; box-shadow:0 4px 12px rgba(0,0,0,0.06); display:block;" />
                            </div>
                        <?php else : ?>
                            <div style="padding:1.75rem 2rem; background:#FFFFFF;">
                                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:1.25rem; margin-bottom:1.5rem;">
                                    <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Total Clicks Scaled', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.75rem; font-weight:800; color:#2563EB; line-height:1.2; margin-top:0.25rem;">+5,540%</div>
                                        <div style="font-size:0.75rem; color:#10B981; font-weight:600; margin-top:0.25rem;"><?php esc_html_e( 'GlobalAir & OOH Metros', 'bluewireseo' ); ?></div>
                                    </div>
                                    <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Organic Impressions', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.75rem; font-weight:800; color:#0F1B3D; line-height:1.2; margin-top:0.25rem;">656,000+</div>
                                        <div style="font-size:0.75rem; color:#10B981; font-weight:600; margin-top:0.25rem;"><?php esc_html_e( 'Across 8 US Metros', 'bluewireseo' ); ?></div>
                                    </div>
                                    <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Rankings Secured', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.75rem; font-weight:800; color:#10B981; line-height:1.2; margin-top:0.25rem;">Top 1–3</div>
                                        <div style="font-size:0.75rem; color:#2563EB; font-weight:600; margin-top:0.25rem;"><?php esc_html_e( 'High-Intent Media Buyer Terms', 'bluewireseo' ); ?></div>
                                    </div>
                                    <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Crawl Bottlenecks', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.75rem; font-weight:800; color:#0F1B3D; line-height:1.2; margin-top:0.25rem;">0 Blocker</div>
                                        <div style="font-size:0.75rem; color:#64748B; margin-top:0.25rem;"><?php esc_html_e( '100% Valid XML & Canonical', 'bluewireseo' ); ?></div>
                                    </div>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem; padding-top:1rem; border-top:1px solid #F1F5F9; font-size:0.8125rem; color:#64748B;">
                                    <span><?php esc_html_e( 'Live Search Console data verified for Nishan’s portfolio clients.', 'bluewireseo' ); ?></span>
                                    <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" style="color:#2563EB; font-weight:600; text-decoration:none;">
                                        <?php esc_html_e( 'Inspect Full Case Studies & PDF Reports &rarr;', 'bluewireseo' ); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="bws-grid-3" style="gap:2rem;">
                        <?php
                        $srv_query = new WP_Query( array(
                            'post_type'      => 'bws_service',
                            'posts_per_page' => 12,
                            'post_status'    => 'publish',
                        ) );

                        if ( $srv_query->have_posts() ) :
                            while ( $srv_query->have_posts() ) :
                                $srv_query->the_post();
                                $cat_label = get_post_meta( get_the_ID(), '_bws_service_category_label', true );
                                $cta_text  = get_post_meta( get_the_ID(), '_bws_service_cta_text', true );
                                if ( ! $cta_text ) $cta_text = __( 'Learn More', 'bluewireseo' );
                                ?>
                                <article class="bws-service-card" style="border:1px solid var(--bws-border); padding:2.25rem 2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div class="bws-service-card-icon" style="width:52px; height:52px; background:rgba(37,99,235,0.1); color:var(--bws-primary); border-radius:var(--bws-radius-md); display:flex; align-items:center; justify-content:center; margin-bottom:1.25rem;">
                                        <?php echo bluewireseo_icon( 'shield' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <?php if ( $cat_label ) : ?>
                                        <p class="bws-eyebrow" style="font-size:0.75rem; margin-bottom:0.5rem;"><?php echo esc_html( $cat_label ); ?></p>
                                    <?php endif; ?>
                                    <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">
                                        <a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a>
                                    </h3>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php the_excerpt(); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php echo esc_html( $cta_text ); ?>
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </a>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            $default_services = array(
                                array(
                                    'title' => 'Semantic SEO & Entity Graph Architecture',
                                    'cat'   => 'CORE TOPICAL AUTHORITY',
                                    'desc'  => 'Entity-based topical clustering, schema graph design, and structured content models that establish verified subject matter authority in Google Knowledge Graph.',
                                    'icon'  => 'shield',
                                    'url'   => '/services/semantic-seo/',
                                ),
                                array(
                                    'title' => 'Technical SEO & Core Web Vitals',
                                    'cat'   => 'PERFORMANCE & CRAWL',
                                    'desc'  => 'Deep crawl optimization, 404/301 redirect cleanup, mobile PageSpeed remediation, canonical conflict resolution, and JavaScript DOM rendering.',
                                    'icon'  => 'settings',
                                    'url'   => '/services/technical-seo/',
                                ),
                                array(
                                    'title' => 'Local SEO & Multi-Location GBP',
                                    'cat'   => 'GEO EXPANSION',
                                    'desc'  => 'Multi-market Google Business Profile management, localized landing page hierarchy, geo-signals, and local pack capture across competitive US metros.',
                                    'icon'  => 'target',
                                    'url'   => '/services/local-seo/',
                                ),
                                array(
                                    'title' => '20-Point Forensic Diagnostic SEO Audit',
                                    'cat'   => 'DIAGNOSTIC & ROADMAP',
                                    'desc'  => 'Manual, expert diagnostic identifying silent crawl traps, indexation blockers, keyword cannibalization, and low-hanging revenue opportunities.',
                                    'icon'  => 'bar-chart',
                                    'url'   => '/services/seo-audit/',
                                ),
                                array(
                                    'title' => 'Commercial Intent & Entity SEO Content',
                                    'cat'   => 'REVENUE CONVERSION',
                                    'desc'  => 'Decision-maker content architectures mapped directly to buyer search stages, eliminating cannibalization and generating qualified inbound leads.',
                                    'icon'  => 'file-text',
                                    'url'   => '/services/content-entity-seo/',
                                ),
                                array(
                                    'title' => 'Digital PR & Entity Citations',
                                    'cat'   => 'AUTHORITY SIGNALS',
                                    'desc'  => 'Contextual editorial placements, industry association citations, and white-hat PR that solidify brand entity authority in LLM search models.',
                                    'icon'  => 'external-link',
                                    'url'   => '/services/link-building/',
                                ),
                            );

                            foreach ( $default_services as $srv ) :
                                ?>
                                <article class="bws-service-card" style="border:1px solid var(--bws-border); padding:2.25rem 2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div class="bws-service-card-icon" style="width:52px; height:52px; background:rgba(37,99,235,0.1); color:var(--bws-primary); border-radius:var(--bws-radius-md); display:flex; align-items:center; justify-content:center; margin-bottom:1.25rem;">
                                        <?php echo bluewireseo_icon( $srv['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <p class="bws-eyebrow" style="font-size:0.75rem; margin-bottom:0.5rem;"><?php echo esc_html( $srv['cat'] ); ?></p>
                                    <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">
                                        <a href="<?php echo esc_url( home_url( $srv['url'] ) ); ?>" style="color:inherit; text-decoration:none;"><?php echo esc_html( $srv['title'] ); ?></a>
                                    </h3>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php echo esc_html( $srv['desc'] ); ?>
                                    </p>
                                    <a href="<?php echo esc_url( home_url( $srv['url'] ) ); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php esc_html_e( 'Explore Service', 'bluewireseo' ); ?>
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </a>
                                </article>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>

                    <!-- 4-Step Engineering Methodology Section -->
                    <div style="margin-top:5rem; padding-top:4rem; border-top:1px solid #E2E8F0;">
                        <div style="text-align:center; max-width:720px; margin:0 auto 3rem;">
                            <p class="bws-eyebrow" style="color:var(--bws-primary); font-size:0.8125rem; font-weight:700; letter-spacing:0.08em;"><?php esc_html_e( 'THE BLUEWIRESEO FORMULA', 'bluewireseo' ); ?></p>
                            <h2 style="font-size:clamp(1.75rem,3.5vw,2.25rem); color:var(--bws-heading); margin-top:0.5rem;"><?php esc_html_e( 'How Every Engagement Compounds Over Time', 'bluewireseo' ); ?></h2>
                            <p style="font-size:1.0625rem; color:var(--bws-text-secondary); line-height:1.65;"><?php esc_html_e( 'No superficial keyword stuffing or transient hacks. We deploy permanent architectural foundations that outlast Google algorithmic updates.', 'bluewireseo' ); ?></p>
                        </div>

                        <div class="bws-grid-4" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:1.75rem;">
                            <div style="padding:2rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; position:relative;">
                                <div style="font-size:2rem; font-weight:900; color:#93C5FD; line-height:1; margin-bottom:1rem;">01</div>
                                <h4 style="font-size:1.125rem; color:#0F1B3D; margin-bottom:0.5rem;"><?php esc_html_e( 'Forensic Crawl Audit', 'bluewireseo' ); ?></h4>
                                <p style="font-size:0.9rem; color:#64748B; line-height:1.6; margin:0;"><?php esc_html_e( 'Uncover hidden canonical splits, index bloat, 404 crawl waste, and DOM rendering issues holding back rankings.', 'bluewireseo' ); ?></p>
                            </div>

                            <div style="padding:2rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; position:relative;">
                                <div style="font-size:2rem; font-weight:900; color:#93C5FD; line-height:1; margin-bottom:1rem;">02</div>
                                <h4 style="font-size:1.125rem; color:#0F1B3D; margin-bottom:0.5rem;"><?php esc_html_e( 'Entity Graph Design', 'bluewireseo' ); ?></h4>
                                <p style="font-size:0.9rem; color:#64748B; line-height:1.6; margin:0;"><?php esc_html_e( 'Connect your brand directly to Google Knowledge Graph entities and authoritative commercial schemas.', 'bluewireseo' ); ?></p>
                            </div>

                            <div style="padding:2rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; position:relative;">
                                <div style="font-size:2rem; font-weight:900; color:#93C5FD; line-height:1; margin-bottom:1rem;">03</div>
                                <h4 style="font-size:1.125rem; color:#0F1B3D; margin-bottom:0.5rem;"><?php esc_html_e( 'Topical Silo Rollout', 'bluewireseo' ); ?></h4>
                                <p style="font-size:0.9rem; color:#64748B; line-height:1.6; margin:0;"><?php esc_html_e( 'Deploy multi-pillar content clusters mapped to high-intent buyer stages to capture zero-click impressions.', 'bluewireseo' ); ?></p>
                            </div>

                            <div style="padding:2rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; position:relative;">
                                <div style="font-size:2rem; font-weight:900; color:#93C5FD; line-height:1; margin-bottom:1rem;">04</div>
                                <h4 style="font-size:1.125rem; color:#0F1B3D; margin-bottom:0.5rem;"><?php esc_html_e( 'Compounding Dominance', 'bluewireseo' ); ?></h4>
                                <p style="font-size:0.9rem; color:#64748B; line-height:1.6; margin:0;"><?php esc_html_e( 'Expand into adjacent regional markets, capture LLM AI Overview citations, and scale revenue traffic.', 'bluewireseo' ); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Interactive On-Page Lead Generation Intake -->
                    <div id="services-audit-intake" class="bws-services-audit-box" style="margin-top:5rem; background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:3.5rem 2.5rem; border-radius:var(--bws-radius-lg); box-shadow:0 12px 30px rgba(15,27,61,0.25);">
                        <div style="text-align:center; max-width:700px; margin:0 auto 2rem;">
                            <span style="display:inline-block; font-size:0.75rem; font-weight:800; letter-spacing:0.08em; text-transform:uppercase; color:#93C5FD; background:rgba(37,99,235,0.25); padding:0.35rem 0.85rem; border-radius:9999px; margin-bottom:1rem;">
                                <?php esc_html_e( 'FREE 20-POINT ARCHITECTURAL AUDIT', 'bluewireseo' ); ?>
                            </span>
                            <h3 style="color:#FFFFFF; font-size:clamp(1.75rem, 3.5vw, 2.375rem); line-height:1.2; margin-bottom:0.75rem;">
                                <?php esc_html_e( 'Request Your Custom Architectural Proposal', 'bluewireseo' ); ?>
                            </h3>
                            <p style="color:rgba(255,255,255,0.85); font-size:1.0625rem; line-height:1.65; margin:0;">
                                <?php esc_html_e( 'Get an expert breakdown of which services your website requires to unlock organic growth. Personally analyzed by Humayun Kabir Nishan.', 'bluewireseo' ); ?>
                            </p>
                        </div>

                        <form action="<?php echo esc_url( home_url( '/free-seo-audit/' ) ); ?>" method="get" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; text-align:left; background:rgba(255,255,255,0.06); padding:2rem; border-radius:12px; border:1px solid rgba(255,255,255,0.15); max-width:820px; margin:0 auto;">
                            <div style="grid-column:1 / -1;">
                                <label for="srv_audit_url" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Website URL *', 'bluewireseo' ); ?></label>
                                <input type="url" id="srv_audit_url" name="site_url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                            </div>
                            <div>
                                <label for="srv_audit_name" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Name *', 'bluewireseo' ); ?></label>
                                <input type="text" id="srv_audit_name" name="name" required placeholder="John Doe" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                            </div>
                            <div>
                                <label for="srv_audit_email" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                <input type="email" id="srv_audit_email" name="email" required placeholder="john@company.com" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                            </div>
                            <div style="grid-column:1 / -1; margin-top:0.5rem;">
                                <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem; font-weight:700;">
                                    <?php esc_html_e( 'Get Free Architectural SEO Audit &rarr;', 'bluewireseo' ); ?>
                                </button>
                                <p style="font-size:0.75rem; color:rgba(255,255,255,0.65); text-align:center; margin-top:0.75rem; margin-bottom:0;">
                                    <?php esc_html_e( '100% Free & Confidential • Response within 48-72 Business Hours', 'bluewireseo' ); ?>
                                </p>
                            </div>
                        </form>
                    </div>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>

            <?php
            // Guarantee Elementor hook exists unconditionally
            echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
            the_content();
            echo '</div>';
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
