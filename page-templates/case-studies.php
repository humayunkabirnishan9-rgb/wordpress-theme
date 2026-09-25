<?php
/**
 * Template Name: BlueWireSEO — Case Studies Overview
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
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:760px; margin-top:1.25rem;">
                        <p class="bws-eyebrow" style="color:#93C5FD;"><?php esc_html_e( 'VERIFIED REAL RESULTS', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'Real Google Search Console and GA4 data from live client turnarounds. No invented metrics — every case study includes verified timestamps and analytics proof.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

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

                    <div class="bws-grid-3" style="gap:2rem;">
                        <?php
                        $cs_query = new WP_Query( array(
                            'post_type'      => 'bws_case_study',
                            'posts_per_page' => 12,
                            'post_status'    => 'publish',
                        ) );

                        if ( $cs_query->have_posts() ) :
                            while ( $cs_query->have_posts() ) :
                                $cs_query->the_post();
                                echo bluewireseo_case_study_card( get_the_ID() ); // phpcs:ignore WordPress.Security.EscapeOutput
                            endwhile;
                            wp_reset_postdata();
                        else :
                            $real_case_studies = array(
                                array(
                                    'title'    => 'GlobalAir Airport Services — 56x Click Surge in 28 Days',
                                    'client'   => 'GlobalAir (globalair.com.bd)',
                                    'ind'      => 'Airport Assistance Services',
                                    'result'   => '56x Clicks / 245x Impressions',
                                    'metric'   => '5 &rarr; 282 Clicks in 28 Days',
                                    'source'   => 'Google Search Console (28-Day Window)',
                                    'desc'     => 'Rebuilt a zero-visibility airport VIP assistance website in Dhaka. Fixed HTTP/HTTPS/WWW canonical splits, deployed targeted meta tags, and built 4 long-form airport guide clusters.',
                                    'url'      => '/case-studies/globalair-seo-turnaround/',
                                ),
                                array(
                                    'title'    => 'Capital Outdoor Inc. — Hyperlocal OOH Billboard Architecture',
                                    'client'   => 'Capital Outdoor Inc. (capitaloutdoorinc.com)',
                                    'ind'      => 'US OOH Advertising (NC & VA)',
                                    'result'   => '+18% Organic Keywords / 8 AI Mentions',
                                    'metric'   => '747 Imp. Smithfield / 467 Imp. Roanoke',
                                    'source'   => 'GSC Crawl & Query Diagnostic',
                                    'desc'     => 'Identified 747 high-intent zero-click impressions for Smithfield and 467 for Roanoke. Engineered localized county hub pages, fixed art spec redirect chains, and captured AI Overviews.',
                                    'url'      => '/case-studies/capital-outdoor-seo/',
                                ),
                                array(
                                    'title'    => 'Franklin Outdoor Advertising — Multi-State Billboard Domination',
                                    'client'   => 'Franklin Outdoor (franklinoutdoor.com)',
                                    'ind'      => 'Billboard Advertising (MN & WI)',
                                    'result'   => '#2 Minneapolis / #6 Wisconsin',
                                    'metric'   => '593 Clicks / 103K Impressions',
                                    'source'   => 'GSC + Mobile PageSpeed Audit',
                                    'desc'     => 'Fixed sitemap fetch errors, eliminated 12% 404 crawl waste, improved mobile speed from 59 to 84, and deployed a 3-pillar, 14-cluster topical roadmap dominating Minnesota and Wisconsin.',
                                    'url'      => '/case-studies/franklin-outdoor-billboards/',
                                ),
                                array(
                                    'title'    => 'BMV Service — European Auto Repair Competitor Displacement',
                                    'client'   => 'BMV Service (bmvservice.pro)',
                                    'ind'      => 'European Auto Repair (Gaithersburg, MD)',
                                    'result'   => 'Pos. 1-2 for BMW Repair',
                                    'metric'   => '280 Clicks / 10K Impressions (Pos 11.3 &rarr; Top 3)',
                                    'source'   => 'Google Search Console & Local Schema',
                                    'desc'     => 'Restructured per-make service pages (BMW, Mercedes, Porsche, Audi), resolved missing H1 tags on 3 core pages, injected LocalBusiness and AutoRepair schema to outrank local dealerships.',
                                    'url'      => '/case-studies/bmvservice-auto-repair/',
                                ),
                                array(
                                    'title'    => 'OpsIQ — Operations Strategy Platform & Fractional COO SEO',
                                    'client'   => 'OpsIQ (opsiq.biz)',
                                    'ind'      => 'Operations Strategy & B2B SaaS',
                                    'result'   => '4,480 Impressions / Page-1 Capture',
                                    'metric'   => '64 Clicks / 1.4% CTR (Top of Page 2)',
                                    'source'   => 'Semrush Snapshot + GSC Query Data',
                                    'desc'     => 'Built high-converting commercial landing pages for fractional COO services, fixed 5 broken sitemaps, eliminated keyword cannibalization, and launched a 47-point operational readiness lead magnet.',
                                    'url'      => '/case-studies/opsiq-fractional-coo-seo/',
                                ),
                                array(
                                    'title'    => 'Trailhead Media — Sustained 656K Impressions Across 8 Metros',
                                    'client'   => 'Trailhead Media (trailheadmedia.com)',
                                    'ind'      => 'US Billboard Advertising',
                                    'result'   => '656K Impressions / 4.39K Clicks',
                                    'metric'   => '#1 Advertising South Carolina',
                                    'source'   => '12-Month GSC Performance Window',
                                    'desc'     => 'Resolved keyword cannibalization across 8+ regional location pages and built a 6-pillar/24-cluster content model resulting in #1 ranking for "advertising south carolina" and 49 AI mentions.',
                                    'url'      => '/case-studies/trailhead-media-billboard-seo/',
                                ),
                            );

                            foreach ( $real_case_studies as $cs ) :
                                ?>
                                <article class="bws-case-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div class="bws-case-card-tags" style="display:flex; gap:0.5rem; margin-bottom:1rem; flex-wrap:wrap;">
                                        <span class="bws-card-tag tag-ooh" style="font-size:0.75rem;"><?php echo esc_html( $cs['ind'] ); ?></span>
                                    </div>
                                    <h3 class="bws-case-card-title" style="font-size:1.375rem; color:var(--bws-primary); font-weight:800; margin-bottom:0.25rem;">
                                        <?php echo esc_html( $cs['result'] ); ?>
                                    </h3>
                                    <p class="bws-case-card-subtitle" style="font-weight:700; color:var(--bws-heading); margin-bottom:0.75rem;">
                                        <?php echo esc_html( $cs['title'] ); ?>
                                    </p>
                                    <p class="bws-case-card-desc" style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php echo esc_html( $cs['desc'] ); ?>
                                    </p>
                                    <div class="bws-case-card-source" style="font-size:0.8rem; color:var(--bws-text-muted); display:flex; align-items:center; gap:0.4rem; margin-bottom:1.25rem;">
                                        <?php echo bluewireseo_icon( 'external-link' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                        <span><?php echo esc_html( $cs['source'] ); ?></span>
                                    </div>
                                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bws-case-card-cta" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php esc_html_e( 'Request Detailed PDF Case Study', 'bluewireseo' ); ?>
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

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>

            <?php
            echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
            the_content();
            echo '</div>';
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
