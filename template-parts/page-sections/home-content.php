<?php
/**
 * BlueWireSEO — Complete Homepage Content
 * Production-ready homepage section layout
 *
 * @package BlueWireSEO
 */

$audit_url   = bluewireseo_get_audit_url();
$call_url    = bluewireseo_get_call_url();
$contact_url = bluewireseo_get_contact_url();
?>

<!-- 1. HERO SECTION -->
<section class="bws-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); min-height: 620px; display: flex; align-items: center; position: relative; overflow: hidden; padding: 5rem 0;">
    <!-- Subtle Background Graphic Elements -->
    <div style="position: absolute; top: -100px; right: -100px; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, rgba(37,99,235,0.18) 0%, rgba(15,27,61,0) 70%); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -80px; left: 10%; width: 360px; height: 360px; border-radius: 50%; background: radial-gradient(circle, rgba(37,99,235,0.12) 0%, rgba(15,27,61,0) 70%); pointer-events: none;"></div>

    <div class="bws-container" style="position: relative; z-index: 2;">
        <div style="max-width: 780px;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(37, 99, 235, 0.15); border: 1px solid rgba(37, 99, 235, 0.35); padding: 0.35rem 0.85rem; border-radius: 9999px; margin-bottom: 1.25rem;">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: #60A5FA; display: inline-block;"></span>
                <span class="bws-eyebrow" style="color: #93C5FD; margin: 0; font-size: 0.8125rem;"><?php esc_html_e( 'SEMANTIC SEO FOR US BUSINESSES', 'bluewireseo' ); ?></span>
            </div>

            <h1 class="bws-hero-title" style="color: #FFFFFF; font-size: clamp(2.5rem, 5.5vw, 4rem); line-height: 1.12; margin-bottom: 1.5rem; letter-spacing: -0.03em;">
                <?php esc_html_e( 'SEO that connects your brand to the buyers already searching for you.', 'bluewireseo' ); ?>
            </h1>

            <p class="bws-hero-subtitle" style="color: rgba(255, 255, 255, 0.8); font-size: clamp(1.0625rem, 2vw, 1.25rem); line-height: 1.65; max-width: 680px; margin-bottom: 2.25rem;">
                <?php esc_html_e( 'Guaranteed traffic, semantic, technical and local SEO updating that helps you rank in any major US city. Brands specialising in OOH billboard advertising, digital, transit and more.', 'bluewireseo' ); ?>
            </p>

            <div class="bws-hero-actions" style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary bws-btn-lg" style="box-shadow: 0 4px 14px rgba(37,99,235,0.4);">
                    <?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?>
                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </a>
                <a href="<?php echo esc_url( $call_url ); ?>" class="bws-btn bws-btn-outline-white bws-btn-lg">
                    <?php esc_html_e( 'Book a 30-min Call', 'bluewireseo' ); ?>
                </a>
            </div>

            <!-- Trust Bar / Key Highlights -->
            <div style="margin-top: 3.5rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.12); display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 1.5rem;">
                <div>
                    <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">100% Data-Backed</div>
                    <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem; line-height: 1.4;"><?php esc_html_e( 'Verified GSC & GA4 sources cited', 'bluewireseo' ); ?></div>
                </div>
                <div>
                    <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">OOH &amp; Billboard</div>
                    <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem; line-height: 1.4;"><?php esc_html_e( 'Specialized market architecture', 'bluewireseo' ); ?></div>
                </div>
                <div>
                    <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">US Enterprise Focus</div>
                    <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem; line-height: 1.4;"><?php esc_html_e( 'Commercial B2B & multi-market brands', 'bluewireseo' ); ?></div>
                </div>
                <div>
                    <div style="color: #60A5FA; font-weight: 700; font-size: 1.25rem; margin-bottom: 0.25rem;">Zero Generic Retainers</div>
                    <div style="color: rgba(255,255,255,0.65); font-size: 0.8125rem; line-height: 1.4;"><?php esc_html_e( 'Compounding commercial outcomes', 'bluewireseo' ); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. THE PROBLEMS SECTION -->
<section class="bws-section" style="background: var(--bws-white);">
    <div class="bws-container">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 3.5rem;">
            <p class="bws-eyebrow"><?php esc_html_e( 'THE PROBLEM', 'bluewireseo' ); ?></p>
            <h2 style="margin-bottom: 1rem;"><?php esc_html_e( 'Why most SEO reports never turn into leads.', 'bluewireseo' ); ?></h2>
            <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">
                <?php esc_html_e( 'Traditional agency retainers prioritize surface metrics over buyer intent. Here is where search investments break down:', 'bluewireseo' ); ?>
            </p>
        </div>

        <div class="bws-grid-3" style="gap: 2rem;">
            <div class="bws-card" style="border: 1px solid var(--bws-border); padding: 2rem; border-radius: var(--bws-radius-lg); transition: transform 0.2s, box-shadow 0.2s;">
                <div class="bws-service-card-icon" style="background: rgba(239, 68, 68, 0.1); color: #EF4444; margin-bottom: 1.25rem;">
                    <?php echo bluewireseo_icon( 'trending-up' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;"><?php esc_html_e( 'Keywords Without Intent', 'bluewireseo' ); ?></h3>
                <p style="font-size: 0.9375rem; color: var(--bws-text-secondary); line-height: 1.65;">
                    <?php esc_html_e( 'Agencies celebrate rankings for high-volume keywords that your prospective commercial buyers never search. Traffic metrics spike while inbound sales pipeline remains flat.', 'bluewireseo' ); ?>
                </p>
            </div>

            <div class="bws-card" style="border: 1px solid var(--bws-border); padding: 2rem; border-radius: var(--bws-radius-lg); transition: transform 0.2s, box-shadow 0.2s;">
                <div class="bws-service-card-icon" style="background: rgba(245, 158, 11, 0.1); color: #F59E0B; margin-bottom: 1.25rem;">
                    <?php echo bluewireseo_icon( 'settings' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;"><?php esc_html_e( 'Silent Technical Bottlenecks', 'bluewireseo' ); ?></h3>
                <p style="font-size: 0.9375rem; color: var(--bws-text-secondary); line-height: 1.65;">
                    <?php esc_html_e( 'Crawl budget waste, broken entity hierarchy, canonical conflicts, and JavaScript rendering blockers remain invisible to standard audits while preventing your core pages from indexing.', 'bluewireseo' ); ?>
                </p>
            </div>

            <div class="bws-card" style="border: 1px solid var(--bws-border); padding: 2rem; border-radius: var(--bws-radius-lg); transition: transform 0.2s, box-shadow 0.2s;">
                <div class="bws-service-card-icon" style="background: rgba(37, 99, 235, 0.1); color: var(--bws-primary); margin-bottom: 1.25rem;">
                    <?php echo bluewireseo_icon( 'bar-chart' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;"><?php esc_html_e( 'Reports Without Context', 'bluewireseo' ); ?></h3>
                <p style="font-size: 0.9375rem; color: var(--bws-text-secondary); line-height: 1.65;">
                    <?php esc_html_e( 'Automated 50-page PDF reports filled with vanity graphs that never cite time periods, data sources, competitor benchmarks, or real qualified inquiries.', 'bluewireseo' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 3. SERVICES SECTION -->
<section class="bws-section" style="background: var(--bws-light-bg);">
    <div class="bws-container">
        <div style="text-align: center; max-width: 660px; margin: 0 auto 3.5rem;">
            <p class="bws-eyebrow"><?php esc_html_e( 'WHAT WE DO', 'bluewireseo' ); ?></p>
            <h2 style="margin-bottom: 1rem;"><?php esc_html_e( 'SEO services that compound over time.', 'bluewireseo' ); ?></h2>
            <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">
                <?php esc_html_e( 'Every service is engineered to build topical authority and commercial capture across your market footprint.', 'bluewireseo' ); ?>
            </p>
        </div>

        <div class="bws-grid-3">
            <?php
            $services_query = new WP_Query( array(
                'post_type'      => 'bws_service',
                'posts_per_page' => 6,
                'post_status'    => 'publish',
            ) );

            if ( $services_query->have_posts() ) :
                while ( $services_query->have_posts() ) :
                    $services_query->the_post();
                    $cat_label = get_post_meta( get_the_ID(), '_bws_service_category_label', true );
                    $cta_text  = get_post_meta( get_the_ID(), '_bws_service_cta_text', true );
                    $cta_url   = get_post_meta( get_the_ID(), '_bws_service_cta_url', true );
                    if ( ! $cta_url ) $cta_url = get_permalink();
                    if ( ! $cta_text ) $cta_text = __( 'Learn More', 'bluewireseo' );
                    ?>
                    <article class="bws-service-card">
                        <div class="bws-service-card-icon">
                            <?php echo bluewireseo_icon( 'layers' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </div>
                        <?php if ( $cat_label ) : ?>
                            <p class="bws-eyebrow" style="margin-bottom: 0.5rem; font-size: 0.75rem;"><?php echo esc_html( $cat_label ); ?></p>
                        <?php endif; ?>
                        <h3 style="font-size: 1.25rem; margin-bottom: 0.625rem;">
                            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a>
                        </h3>
                        <div class="bws-service-card-desc" style="font-size: 0.9rem; margin-bottom: 1.25rem; color: var(--bws-text-secondary); line-height: 1.6;"><?php the_excerpt(); ?></div>
                        <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-link-arrow">
                            <?php echo esc_html( $cta_text ); ?>
                            <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Comprehensive, realistic BlueWireSEO services
                $default_services = array(
                    array(
                        'name'     => 'Semantic SEO',
                        'cat'      => 'CORE ARCHITECTURE',
                        'desc'     => 'Entity-based topical clustering, schema graph design, and structured content models that teach search engines exactly what your business is authoritative in.',
                        'icon'     => 'layers',
                        'slug'     => '/services/semantic-seo/',
                    ),
                    array(
                        'name'     => 'Technical SEO',
                        'cat'      => 'PERFORMANCE & CRAWL',
                        'desc'     => 'Deep crawl optimization, Core Web Vitals remediation, JavaScript rendering, indexation controls, and canonical integrity for enterprise directories.',
                        'icon'     => 'settings',
                        'slug'     => '/services/technical-seo/',
                    ),
                    array(
                        'name'     => 'Local SEO & GBP',
                        'cat'      => 'GEO EXPANSION',
                        'desc'     => 'Multi-market Google Business Profile management, localized landing page hierarchy, geo-signals, and local pack capture across every major US metro.',
                        'icon'     => 'target',
                        'slug'     => '/services/local-seo/',
                    ),
                    array(
                        'name'     => 'SEO Audit',
                        'cat'      => 'DIAGNOSTIC',
                        'desc'     => 'Comprehensive 20-point diagnostic identifying technical bottlenecks, crawl traps, semantic gaps, and high-impact revenue opportunities on your domain.',
                        'icon'     => 'file-text',
                        'slug'     => '/services/seo-audit/',
                    ),
                    array(
                        'name'     => 'Content & Entity SEO',
                        'cat'      => 'TOPICAL AUTHORITY',
                        'desc'     => 'Intent-mapped content architectures built for commercial decision-makers, eliminating keyword cannibalization while building compounding domain trust.',
                        'icon'     => 'bar-chart',
                        'slug'     => '/services/content-entity-seo/',
                    ),
                    array(
                        'name'     => 'Link Building',
                        'cat'      => 'AUTHORITY SIGNALS',
                        'desc'     => 'High-authority contextual editorial placements and digital PR citations that strengthen domain entity validation in competitive industry niches.',
                        'icon'     => 'external-link',
                        'slug'     => '/services/link-building/',
                    ),
                );

                foreach ( $default_services as $srv ) :
                ?>
                <article class="bws-service-card">
                    <div class="bws-service-card-icon">
                        <?php echo bluewireseo_icon( $srv['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </div>
                    <p class="bws-eyebrow" style="margin-bottom: 0.5rem; font-size: 0.75rem;"><?php echo esc_html( $srv['cat'] ); ?></p>
                    <h3 style="font-size: 1.25rem; margin-bottom: 0.625rem;">
                        <a href="<?php echo esc_url( home_url( $srv['slug'] ) ); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html( $srv['name'] ); ?></a>
                    </h3>
                    <p style="font-size: 0.9rem; margin-bottom: 1.25rem; color: var(--bws-text-secondary); line-height: 1.6;"><?php echo esc_html( $srv['desc'] ); ?></p>
                    <a href="<?php echo esc_url( home_url( $srv['slug'] ) ); ?>" class="bws-link-arrow">
                        <?php esc_html_e( 'Learn More', 'bluewireseo' ); ?>
                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </a>
                </article>
                <?php
                endforeach;
            endif;
            ?>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="bws-btn bws-btn-outline">
                <?php esc_html_e( 'View All Services', 'bluewireseo' ); ?>
                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </a>
        </div>
    </div>
</section>

<!-- 4. INDUSTRIES SECTION -->
<section class="bws-section" style="background: var(--bws-white);">
    <div class="bws-container">
        <div style="text-align: center; max-width: 660px; margin: 0 auto 3.5rem;">
            <p class="bws-eyebrow"><?php esc_html_e( 'WHO WE SERVE', 'bluewireseo' ); ?></p>
            <h2 style="margin-bottom: 1rem;"><?php esc_html_e( 'Industry-specific SEO, not generic packages.', 'bluewireseo' ); ?></h2>
            <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">
                <?php esc_html_e( 'We specialise in sectors where search intent is high-ticket, local entity signals matter, and off-the-shelf agency playbooks fail.', 'bluewireseo' ); ?>
            </p>
        </div>

        <div class="bws-grid-3">
            <?php
            $ind_query = new WP_Query( array(
                'post_type'      => 'bws_industry',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ) );

            if ( $ind_query->have_posts() ) :
                while ( $ind_query->have_posts() ) :
                    $ind_query->the_post();
                    $badge    = get_post_meta( get_the_ID(), '_bws_industry_badge', true );
                    $cta_text = get_post_meta( get_the_ID(), '_bws_industry_cta_text', true );
                    $cta_url  = get_post_meta( get_the_ID(), '_bws_industry_cta_url', true );
                    if ( ! $cta_url ) $cta_url = get_permalink();
                    if ( ! $cta_text ) $cta_text = __( 'Explore Industry SEO', 'bluewireseo' );
                    ?>
                    <article class="bws-card" style="border: 1px solid var(--bws-border); padding: 2.25rem 2rem; border-radius: var(--bws-radius-lg); display: flex; flex-direction: column;">
                        <?php if ( $badge ) : ?>
                            <span class="bws-card-tag tag-ooh" style="margin-bottom: 1.25rem; align-self: flex-start;"><?php echo esc_html( $badge ); ?></span>
                        <?php endif; ?>
                        <h3 style="font-size: 1.375rem; margin-bottom: 0.875rem;">
                            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a>
                        </h3>
                        <p style="font-size: 0.9375rem; color: var(--bws-text-secondary); margin-bottom: 1.5rem; line-height: 1.65; flex-grow: 1;">
                            <?php the_excerpt(); ?>
                        </p>
                        <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-link-arrow">
                            <?php echo esc_html( $cta_text ); ?>
                            <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                $default_industries = array(
                    array(
                        'title' => 'OOH & Billboard Advertising',
                        'badge' => 'FLAGSHIP SPECIALTY',
                        'desc'  => 'Market page architecture, billboard inventory directory indexing, and geo-targeted commercial intent pages across multi-city operating regions.',
                        'url'   => '/industries/ooh-billboard/',
                    ),
                    array(
                        'title' => 'Multi-site & Portfolio Brands',
                        'badge' => 'MULTI-LOCATION',
                        'desc'  => 'Eliminating cross-location keyword cannibalization, building unified parent-child entity schemas, and scaling organic revenue across dozens of markets.',
                        'url'   => '/industries/multi-site-portfolio/',
                    ),
                    array(
                        'title' => 'B2B Service Businesses',
                        'badge' => 'COMMERCIAL PIPELINE',
                        'desc'  => 'Connecting high-ticket commercial contractors and B2B professional firms directly to procurement decision-makers actively searching for solutions.',
                        'url'   => '/industries/b2b-service-business/',
                    ),
                );

                foreach ( $default_industries as $ind ) :
                ?>
                <article class="bws-card" style="border: 1px solid var(--bws-border); padding: 2.25rem 2rem; border-radius: var(--bws-radius-lg); display: flex; flex-direction: column;">
                    <span class="bws-card-tag tag-ooh" style="margin-bottom: 1.25rem; align-self: flex-start;"><?php echo esc_html( $ind['badge'] ); ?></span>
                    <h3 style="font-size: 1.375rem; margin-bottom: 0.875rem;">
                        <a href="<?php echo esc_url( home_url( $ind['url'] ) ); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html( $ind['title'] ); ?></a>
                    </h3>
                    <p style="font-size: 0.9375rem; color: var(--bws-text-secondary); margin-bottom: 1.5rem; line-height: 1.65; flex-grow: 1;">
                        <?php echo esc_html( $ind['desc'] ); ?>
                    </p>
                    <a href="<?php echo esc_url( home_url( $ind['url'] ) ); ?>" class="bws-link-arrow">
                        <?php esc_html_e( 'Explore Industry SEO', 'bluewireseo' ); ?>
                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </a>
                </article>
                <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- 5. CASE STUDIES / RESULTS SECTION -->
<section class="bws-section" style="background: var(--bws-light-bg);">
    <div class="bws-container">
        <div style="text-align: center; max-width: 660px; margin: 0 auto 3.5rem;">
            <p class="bws-eyebrow"><?php esc_html_e( 'RESULTS', 'bluewireseo' ); ?></p>
            <h2 style="margin-bottom: 1rem;"><?php esc_html_e( 'Results we can show you the source for.', 'bluewireseo' ); ?></h2>
            <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">
                <?php esc_html_e( 'No invented numbers. Every metric in these case studies is cited with the data source, analytics platform, and measurement window.', 'bluewireseo' ); ?>
            </p>
        </div>

        <div class="bws-grid-3">
            <?php
            $cs_query = new WP_Query( array(
                'post_type'      => 'bws_case_study',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ) );

            if ( $cs_query->have_posts() ) :
                while ( $cs_query->have_posts() ) :
                    $cs_query->the_post();
                    echo bluewireseo_case_study_card( get_the_ID() ); // phpcs:ignore WordPress.Security.EscapeOutput
                endwhile;
                wp_reset_postdata();
            else :
                $cs_defaults = array(
                    array(
                        'tag'       => 'Airport Services',
                        'tag2'      => 'Technical SEO + Canonical Fix',
                        'tag_class' => 'tag-b2b',
                        'result'    => '56x Clicks / 245x Impressions',
                        'subtitle'  => 'GlobalAir — VIP Airport Meet & Greet',
                        'desc'      => 'Rebuilt a zero-visibility airport VIP assistance site at Dhaka HSIA in 28 days. Fixed non-www and http canonical splits, deployed meta schemas, and built 4 core airport guides.',
                        'source'    => 'Google Search Console (28-Day Verified Data)',
                    ),
                    array(
                        'tag'       => 'OOH Billboard Advertising',
                        'tag2'      => 'Sub-Location Architecture',
                        'tag_class' => 'tag-ooh',
                        'result'    => '+18% Keywords / 8 AI Mentions',
                        'subtitle'  => 'Capital Outdoor Inc. (NC & VA)',
                        'desc'      => 'Engineered hyperlocal market landing pages for Smithfield, NC, and Roanoke, VA. Fixed art-spec redirect chains and captured 1,200+ high-intent search queries with DOOH silos.',
                        'source'    => 'Google Search Console Query & Crawl Data',
                    ),
                    array(
                        'tag'       => 'Billboard Media Network',
                        'tag2'      => 'Crawl Remediation + Core Web Vitals',
                        'tag_class' => 'tag-multisite',
                        'result'    => '#2 Minneapolis / #6 Wisconsin',
                        'subtitle'  => 'Franklin Outdoor Advertising (MN & WI)',
                        'desc'      => 'Eliminated 12% 404 crawl waste, lifted mobile Core Web Vitals to 84, and deployed a 14-cluster topical roadmap dominating Minnesota and Wisconsin billboard searches.',
                        'source'    => 'Google Search Console (103K Impression Window)',
                    ),
                );

                foreach ( $cs_defaults as $cs ) :
                ?>
                <article class="bws-case-card">
                    <div class="bws-case-card-tags">
                        <span class="bws-card-tag <?php echo esc_attr( $cs['tag_class'] ); ?>"><?php echo esc_html( $cs['tag'] ); ?></span>
                        <span class="bws-card-tag" style="background:var(--bws-white); color:var(--bws-text-muted);"><?php echo esc_html( $cs['tag2'] ); ?></span>
                    </div>
                    <h3 class="bws-case-card-title"><?php echo esc_html( $cs['result'] ); ?></h3>
                    <p class="bws-case-card-subtitle"><?php echo esc_html( $cs['subtitle'] ); ?></p>
                    <p class="bws-case-card-desc"><?php echo esc_html( $cs['desc'] ); ?></p>
                    <div class="bws-case-card-source">
                        <?php echo bluewireseo_icon( 'external-link' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        <span><?php echo esc_html( $cs['source'] ); ?></span>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="bws-case-card-cta">
                        <?php esc_html_e( 'Read case study', 'bluewireseo' ); ?>
                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </a>
                </article>
                <?php
                endforeach;
            endif;
            ?>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="bws-btn bws-btn-outline">
                <?php esc_html_e( 'View All Case Studies', 'bluewireseo' ); ?>
                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </a>
        </div>
    </div>
</section>

<!-- 6. OUR 4-STEP FRAMEWORK (PROCESS) -->
<section class="bws-section" style="background: var(--bws-white);">
    <div class="bws-container">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 3.5rem;">
            <p class="bws-eyebrow"><?php esc_html_e( 'OUR FRAMEWORK', 'bluewireseo' ); ?></p>
            <h2 style="margin-bottom: 1rem;"><?php esc_html_e( 'A systematic, repeatable path to organic pipeline.', 'bluewireseo' ); ?></h2>
            <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">
                <?php esc_html_e( 'We execute a battle-tested roadmap designed to diagnose leaks, fix technical blockers, and build compounding topical dominance.', 'bluewireseo' ); ?>
            </p>
        </div>

        <div class="bws-grid-4" style="gap: 1.75rem;">
            <div style="padding: 2rem 1.5rem; background: var(--bws-light-bg); border-radius: var(--bws-radius-lg); position: relative;">
                <div style="font-size: 2.25rem; font-weight: 800; color: rgba(37,99,235,0.25); margin-bottom: 0.75rem;">01</div>
                <h3 style="font-size: 1.125rem; margin-bottom: 0.5rem;"><?php esc_html_e( 'Diagnostic & Audit', 'bluewireseo' ); ?></h3>
                <p style="font-size: 0.875rem; color: var(--bws-text-secondary); line-height: 1.6;">
                    <?php esc_html_e( 'Full 20-point technical & semantic crawl, log file audit, and entity gap analysis against top market competitors.', 'bluewireseo' ); ?>
                </p>
            </div>

            <div style="padding: 2rem 1.5rem; background: var(--bws-light-bg); border-radius: var(--bws-radius-lg); position: relative;">
                <div style="font-size: 2.25rem; font-weight: 800; color: rgba(37,99,235,0.25); margin-bottom: 0.75rem;">02</div>
                <h3 style="font-size: 1.125rem; margin-bottom: 0.5rem;"><?php esc_html_e( 'Technical Remediation', 'bluewireseo' ); ?></h3>
                <p style="font-size: 0.875rem; color: var(--bws-text-secondary); line-height: 1.6;">
                    <?php esc_html_e( 'Resolve indexation traps, Core Web Vitals bottlenecks, schema graph connectivity, and crawl budget inefficiencies.', 'bluewireseo' ); ?>
                </p>
            </div>

            <div style="padding: 2rem 1.5rem; background: var(--bws-light-bg); border-radius: var(--bws-radius-lg); position: relative;">
                <div style="font-size: 2.25rem; font-weight: 800; color: rgba(37,99,235,0.25); margin-bottom: 0.75rem;">03</div>
                <h3 style="font-size: 1.125rem; margin-bottom: 0.5rem;"><?php esc_html_e( 'Semantic Clustering', 'bluewireseo' ); ?></h3>
                <p style="font-size: 0.875rem; color: var(--bws-text-secondary); line-height: 1.6;">
                    <?php esc_html_e( 'Build topical authority silos and high-intent commercial landing pages mapped directly to decision-maker purchase stages.', 'bluewireseo' ); ?>
                </p>
            </div>

            <div style="padding: 2rem 1.5rem; background: var(--bws-light-bg); border-radius: var(--bws-radius-lg); position: relative;">
                <div style="font-size: 2.25rem; font-weight: 800; color: rgba(37,99,235,0.25); margin-bottom: 0.75rem;">04</div>
                <h3 style="font-size: 1.125rem; margin-bottom: 0.5rem;"><?php esc_html_e( 'Compounding Growth', 'bluewireseo' ); ?></h3>
                <p style="font-size: 0.875rem; color: var(--bws-text-secondary); line-height: 1.6;">
                    <?php esc_html_e( 'Local market expansion, high-tier editorial authority links, and weekly indexation monitoring to protect search gains.', 'bluewireseo' ); ?>
                </p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 2.5rem;">
            <a href="<?php echo esc_url( home_url( '/process/' ) ); ?>" class="bws-link-arrow" style="font-weight: 600;">
                <?php esc_html_e( 'Read our in-depth process breakdown', 'bluewireseo' ); ?>
                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </a>
        </div>
    </div>
</section>

<!-- 7. WHY BLUEWIRESEO / POSITIONING -->
<section class="bws-section" style="background: var(--bws-navy); color: #FFFFFF;">
    <div class="bws-container">
        <div style="max-width: 720px; margin-bottom: 3.5rem;">
            <p class="bws-eyebrow" style="color: rgba(255,255,255,0.7);"><?php esc_html_e( 'WHY BLUEWIRESEO', 'bluewireseo' ); ?></p>
            <h2 style="color: #FFFFFF; font-size: clamp(2rem, 4vw, 2.75rem); margin-bottom: 1rem;">
                <?php esc_html_e( 'Built for technical precision and commercial outcomes.', 'bluewireseo' ); ?>
            </h2>
            <p style="color: rgba(255,255,255,0.8); font-size: 1.0625rem; line-height: 1.7;">
                <?php esc_html_e( 'BlueWireSEO is an agile technical SEO agency serving commercial US businesses nationwide. You work directly with senior technical specialists who understand how search crawlers actually operate.', 'bluewireseo' ); ?>
            </p>
        </div>

        <div class="bws-grid-2" style="gap: 2.5rem;">
            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: var(--bws-radius-lg);">
                <div style="color: #60A5FA; margin-bottom: 1rem;"><?php echo bluewireseo_icon( 'shield' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
                <h3 style="color: #FFFFFF; font-size: 1.25rem; margin-bottom: 0.75rem;"><?php esc_html_e( 'Zero Long-Term Lock-in', 'bluewireseo' ); ?></h3>
                <p style="color: rgba(255,255,255,0.7); font-size: 0.9375rem; line-height: 1.65;">
                    <?php esc_html_e( 'We believe our retention should be earned through measurable commercial results and pipeline attribution, not 12-month lock-in contracts.', 'bluewireseo' ); ?>
                </p>
            </div>

            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: var(--bws-radius-lg);">
                <div style="color: #60A5FA; margin-bottom: 1rem;"><?php echo bluewireseo_icon( 'bar-chart' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
                <h3 style="color: #FFFFFF; font-size: 1.25rem; margin-bottom: 0.75rem;"><?php esc_html_e( 'Transparent Data Citations', 'bluewireseo' ); ?></h3>
                <p style="color: rgba(255,255,255,0.7); font-size: 0.9375rem; line-height: 1.65;">
                    <?php esc_html_e( 'Every metric reported is accompanied by direct Google Search Console or Google Analytics timestamps, clean filters, and verifiable data sources.', 'bluewireseo' ); ?>
                </p>
            </div>

            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: var(--bws-radius-lg);">
                <div style="color: #60A5FA; margin-bottom: 1rem;"><?php echo bluewireseo_icon( 'target' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
                <h3 style="color: #FFFFFF; font-size: 1.25rem; margin-bottom: 0.75rem;"><?php esc_html_e( 'Deep Industry Specialization', 'bluewireseo' ); ?></h3>
                <p style="color: rgba(255,255,255,0.7); font-size: 0.9375rem; line-height: 1.65;">
                    <?php esc_html_e( 'Rather than acting as generalists for every local florist and plumber, we focus deeply on OOH billboard operators, multi-site brands, and B2B services.', 'bluewireseo' ); ?>
                </p>
            </div>

            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: var(--bws-radius-lg);">
                <div style="color: #60A5FA; margin-bottom: 1rem;"><?php echo bluewireseo_icon( 'settings' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
                <h3 style="color: #FFFFFF; font-size: 1.25rem; margin-bottom: 0.75rem;"><?php esc_html_e( 'Code-Level Technical Fluency', 'bluewireseo' ); ?></h3>
                <p style="color: rgba(255,255,255,0.7); font-size: 0.9375rem; line-height: 1.65;">
                    <?php esc_html_e( 'We do not just hand you a spreadsheet of issues. We work with WordPress, Elementor, and modern tech stacks to implement fixes directly.', 'bluewireseo' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 8. FAQ SECTION -->
<section class="bws-section" style="background: var(--bws-white);">
    <div class="bws-container">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 3.5rem;">
            <p class="bws-eyebrow"><?php esc_html_e( 'FREQUENTLY ASKED QUESTIONS', 'bluewireseo' ); ?></p>
            <h2 style="margin-bottom: 1rem;"><?php esc_html_e( 'Clear answers before we start.', 'bluewireseo' ); ?></h2>
            <p style="color: var(--bws-text-muted); font-size: 1.0625rem;">
                <?php esc_html_e( 'Have questions about how we work or our audit deliverables? Here is what prospective clients commonly ask:', 'bluewireseo' ); ?>
            </p>
        </div>

        <div class="bws-faq-list" style="max-width: 760px; margin: 0 auto;">
            <div class="bws-faq-item">
                <div class="bws-faq-question" role="button" tabindex="0" aria-expanded="false">
                    <span><?php esc_html_e( 'What is semantic SEO and how is it different from traditional SEO?', 'bluewireseo' ); ?></span>
                    <span class="bws-faq-icon"><?php echo bluewireseo_icon( 'chevron-down' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                </div>
                <div class="bws-faq-answer">
                    <p><?php esc_html_e( 'Traditional SEO focuses strictly on keyword repetition and surface backlink metrics. Semantic SEO builds entity relationships and topical models matching how Google’s Knowledge Graph interprets search intent. By designing entity-connected content clusters and schema graphs, we help search engines recognize your site as the definitive subject matter authority.', 'bluewireseo' ); ?></p>
                </div>
            </div>

            <div class="bws-faq-item">
                <div class="bws-faq-question" role="button" tabindex="0" aria-expanded="false">
                    <span><?php esc_html_e( 'Why do you specialize in OOH billboard advertising and multi-site brands?', 'bluewireseo' ); ?></span>
                    <span class="bws-faq-icon"><?php echo bluewireseo_icon( 'chevron-down' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                </div>
                <div class="bws-faq-answer">
                    <p><?php esc_html_e( 'OOH billboard companies have unique architectural challenges: dozens of location markets, individual inventory items, and high-ticket media buyer intent. Most SEO agencies treat them like standard e-commerce stores, resulting in severe keyword cannibalization and low indexation. We developed specialized market page architectures specifically tailored to outdoor media operators.', 'bluewireseo' ); ?></p>
                </div>
            </div>

            <div class="bws-faq-item">
                <div class="bws-faq-question" role="button" tabindex="0" aria-expanded="false">
                    <span><?php esc_html_e( 'What does the Free 20-Point SEO Audit include?', 'bluewireseo' ); ?></span>
                    <span class="bws-faq-icon"><?php echo bluewireseo_icon( 'chevron-down' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                </div>
                <div class="bws-faq-answer">
                    <p><?php esc_html_e( 'Our audit is a manual, diagnostic review conducted by senior SEO specialists. We examine crawl efficiency, Core Web Vitals, canonical conflicts, schema graphs, entity relationships, and your top commercial competitors. We deliver an actionable executive summary within 48-72 business hours with no commitment required.', 'bluewireseo' ); ?></p>
                </div>
            </div>

            <div class="bws-faq-item">
                <div class="bws-faq-question" role="button" tabindex="0" aria-expanded="false">
                    <span><?php esc_html_e( 'How long does it take to see tangible search results?', 'bluewireseo' ); ?></span>
                    <span class="bws-faq-icon"><?php echo bluewireseo_icon( 'chevron-down' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                </div>
                <div class="bws-faq-answer">
                    <p><?php esc_html_e( 'Critical technical and crawl fixes frequently produce visible indexation and ranking changes within 3 to 6 weeks. Broad semantic topical clustering and multi-city expansion compound over 3 to 6 months. We track lead inquiries and commercial keyword growth from month one.', 'bluewireseo' ); ?></p>
                </div>
            </div>

            <div class="bws-faq-item">
                <div class="bws-faq-question" role="button" tabindex="0" aria-expanded="false">
                    <span><?php esc_html_e( 'Do you work directly on our website or provide recommendations?', 'bluewireseo' ); ?></span>
                    <span class="bws-faq-icon"><?php echo bluewireseo_icon( 'chevron-down' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                </div>
                <div class="bws-faq-answer">
                    <p><?php esc_html_e( 'We can do both. For WordPress and Elementor clients, we can handle direct implementation of technical fixes, schema injection, and page architectures. If you have an in-house engineering team, we provide detailed technical specifications, code snippets, and QA verification.', 'bluewireseo' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 9. FINAL CTA SECTION -->
<?php get_template_part( 'template-parts/components/cta-section' ); ?>
