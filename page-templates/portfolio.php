<?php
/**
 * Template Name: BlueWireSEO — Portfolio Overview
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
                        <p class="bws-eyebrow" style="color:#93C5FD;"><?php esc_html_e( 'PROVEN CLIENT CAMPAIGNS', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'Explore executed SEO roadmaps, technical remediations, and topical authority transformations engineered for high-growth commercial brands.', 'bluewireseo' ); ?>
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
                        $port_query = new WP_Query( array(
                            'post_type'      => 'bws_portfolio',
                            'posts_per_page' => 12,
                            'post_status'    => 'publish',
                        ) );

                        if ( $port_query->have_posts() ) :
                            while ( $port_query->have_posts() ) :
                                $port_query->the_post();
                                $client   = get_post_meta( get_the_ID(), '_bws_client', true );
                                $result   = get_post_meta( get_the_ID(), '_bws_result_metric', true );
                                $industry = get_post_meta( get_the_ID(), '_bws_industry', true );
                                ?>
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                                        <span class="bws-card-tag tag-ooh" style="font-size:0.75rem; margin:0;"><?php echo esc_html( $industry ? $industry : 'SEO Portfolio' ); ?></span>
                                        <?php if ( $result ) : ?>
                                            <span style="font-size:0.85rem; font-weight:700; color:var(--bws-primary);"><?php echo esc_html( $result ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">
                                        <a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a>
                                    </h3>
                                    <?php if ( $client ) : ?>
                                        <p style="font-size:0.85rem; color:var(--bws-text-muted); margin-bottom:0.75rem;">
                                            <strong><?php esc_html_e( 'Client:', 'bluewireseo' ); ?></strong> <?php echo esc_html( $client ); ?>
                                        </p>
                                    <?php endif; ?>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php the_excerpt(); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php esc_html_e( 'View Project Details', 'bluewireseo' ); ?>
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </a>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            $real_portfolio = array(
                                array(
                                    'title'    => 'GlobalAir Airport Services — Full Turnaround',
                                    'client'   => 'GlobalAir (globalair.com.bd)',
                                    'industry' => 'Airport Services',
                                    'result'   => '56x Clicks / Pos #6',
                                    'desc'     => 'Eliminated canonical split issues, built 4 comprehensive guide pillars for Hazrat Shahjalal International Airport, and scaled impressions from 84 to 20,600 in 28 days.',
                                ),
                                array(
                                    'title'    => 'Capital Outdoor Inc. — Hyperlocal OOH Billboard Architecture',
                                    'client'   => 'Capital Outdoor Inc. (capitaloutdoorinc.com)',
                                    'industry' => 'OOH Advertising',
                                    'result'   => '+18% Organic Keywords',
                                    'desc'     => 'Designed Smithfield NC, Roanoke VA, and I-95 corridor sub-location hub pages to capture 1,200+ high-intent search impressions with zero prior ranking.',
                                ),
                                array(
                                    'title'    => 'Franklin Outdoor — Minnesota & Wisconsin Billboard Strategy',
                                    'client'   => 'Franklin Outdoor (franklinoutdoor.com)',
                                    'industry' => 'Billboard Advertising',
                                    'result'   => '103K Imp. / #2 Minneapolis',
                                    'desc'     => 'Audited crawl statistics, resolved 12% 404 crawl waste, optimized mobile Core Web Vitals to 84, and deployed 3-pillar 14-cluster topical authority plan.',
                                ),
                                array(
                                    'title'    => 'BMV Service — European Auto Repair Competitor Displacement',
                                    'client'   => 'BMV Service (bmvservice.pro)',
                                    'industry' => 'Automotive / Local SEO',
                                    'result'   => 'Pos. 1-2 for BMW Repair',
                                    'desc'     => 'Constructed dedicated make-specific service pages (BMW, Mercedes, Porsche, Audi) in Gaithersburg, MD, eliminating missing H1 tags and outranking local dealers.',
                                ),
                                array(
                                    'title'    => 'OpsIQ — Operations Strategy Platform & Fractional COO SEO',
                                    'client'   => 'OpsIQ (opsiq.biz)',
                                    'industry' => 'B2B Consulting & SaaS',
                                    'result'   => '4,480 Impressions / Top 10',
                                    'desc'     => 'Targeted high-intent founder queries for fractional COO services, fixed 5 broken sitemaps, eliminated keyword cannibalization, and built conversion-focused playbooks.',
                                ),
                                array(
                                    'title'    => 'Trailhead Media — Sustained 656K Impressions Across 8 Metros',
                                    'client'   => 'Trailhead Media (trailheadmedia.com)',
                                    'industry' => 'US Billboard Advertising',
                                    'result'   => '656K Imp. / 4.39K Clicks',
                                    'desc'     => 'Built unified multi-city parent-child entity schemas across South Carolina and 8 regional markets, ranking #1 for "advertising south carolina".',
                                ),
                            );

                            foreach ( $real_portfolio as $item ) :
                                ?>
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                                        <span class="bws-card-tag tag-ooh" style="font-size:0.75rem; margin:0;"><?php echo esc_html( $item['industry'] ); ?></span>
                                        <span style="font-size:0.85rem; font-weight:700; color:var(--bws-primary);"><?php echo esc_html( $item['result'] ); ?></span>
                                    </div>
                                    <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">
                                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="color:inherit; text-decoration:none;"><?php echo esc_html( $item['title'] ); ?></a>
                                    </h3>
                                    <p style="font-size:0.85rem; color:var(--bws-text-muted); margin-bottom:0.75rem;">
                                        <strong><?php esc_html_e( 'Client:', 'bluewireseo' ); ?></strong> <?php echo esc_html( $item['client'] ); ?>
                                    </p>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php echo esc_html( $item['desc'] ); ?>
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php esc_html_e( 'Request Case Study', 'bluewireseo' ); ?>
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
