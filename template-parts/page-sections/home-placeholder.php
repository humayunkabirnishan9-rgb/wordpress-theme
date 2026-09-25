<?php
/**
 * Home Page Placeholder
 * Shown when front page has no Elementor content
 *
 * @package BlueWireSEO
 */

$audit_url = bluewireseo_get_audit_url();
$call_url  = bluewireseo_get_call_url();
?>

<!-- Hero Section -->
<section class="bws-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #1E2D5A 100%); min-height: 580px; display:flex; align-items:center;">
    <div class="bws-container">
        <div style="max-width:680px;">
            <p class="bws-eyebrow" style="color: rgba(255,255,255,0.7);"><?php esc_html_e( 'SEMANTIC SEO FOR US BUSINESSES', 'bluewireseo' ); ?></p>
            <h1 class="bws-hero-title" style="color:#fff; font-size: clamp(2.5rem, 5.5vw, 4rem);">
                <?php esc_html_e( 'SEO that connects your brand to the buyers already searching for you.', 'bluewireseo' ); ?>
            </h1>
            <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.75);">
                <?php esc_html_e( 'Guaranteed traffic, semantic, technical and local SEO updating that helps you rank in "any major US city". Brands specialising in OOH billboard advertising, digital, transit and more.', 'bluewireseo' ); ?>
            </p>
            <div class="bws-hero-actions">
                <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary bws-btn-lg">
                    <?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?>
                </a>
                <a href="<?php echo esc_url( $call_url ); ?>" class="bws-btn bws-btn-outline-white bws-btn-lg">
                    <?php esc_html_e( 'Book a 30-min Call', 'bluewireseo' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Problems Section -->
<section class="bws-section" style="background:var(--bws-white);">
    <div class="bws-container">
        <p class="bws-eyebrow" style="text-align:center;"><?php esc_html_e( 'THE PROBLEM', 'bluewireseo' ); ?></p>
        <h2 style="text-align:center; margin-bottom:0.75rem;"><?php esc_html_e( 'Why most SEO reports never turn into leads.', 'bluewireseo' ); ?></h2>
        <p style="text-align:center;max-width:560px;margin:0 auto 3rem;color:var(--bws-text-muted);"><?php esc_html_e( 'A big agency does SEO. Strategy? Nothing. No results. Nothing like that.', 'bluewireseo' ); ?></p>

        <div class="bws-grid-3" style="gap:1.5rem;">
            <div class="bws-card">
                <div class="bws-service-card-icon">
                    <?php echo bluewireseo_icon( 'trending-up' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </div>
                <h3 style="font-size:1.125rem;margin-bottom:0.5rem;"><?php esc_html_e( 'Keyword not Ranking', 'bluewireseo' ); ?></h3>
                <p style="font-size:0.9rem;"><?php esc_html_e( '[PLACEHOLDER: A description of this problem area — do not invent.]', 'bluewireseo' ); ?></p>
            </div>
            <div class="bws-card">
                <div class="bws-service-card-icon">
                    <?php echo bluewireseo_icon( 'settings' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </div>
                <h3 style="font-size:1.125rem;margin-bottom:0.5rem;"><?php esc_html_e( 'Technical SEO silent issues', 'bluewireseo' ); ?></h3>
                <p style="font-size:0.9rem;"><?php esc_html_e( '[PLACEHOLDER: A description of this problem area — do not invent.]', 'bluewireseo' ); ?></p>
            </div>
            <div class="bws-card">
                <div class="bws-service-card-icon">
                    <?php echo bluewireseo_icon( 'bar-chart' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </div>
                <h3 style="font-size:1.125rem;margin-bottom:0.5rem;"><?php esc_html_e( 'Reports without comparison', 'bluewireseo' ); ?></h3>
                <p style="font-size:0.9rem;"><?php esc_html_e( '[PLACEHOLDER: A description of this problem area — do not invent.]', 'bluewireseo' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="bws-section" style="background:var(--bws-light-bg);">
    <div class="bws-container">
        <p class="bws-eyebrow" style="text-align:center;"><?php esc_html_e( 'WHAT WE DO', 'bluewireseo' ); ?></p>
        <h2 style="text-align:center;margin-bottom:0.75rem;"><?php esc_html_e( 'SEO services that compound over time.', 'bluewireseo' ); ?></h2>
        <p style="text-align:center;max-width:560px;margin:0 auto 3rem;color:var(--bws-text-muted);"><?php esc_html_e( 'Every service is designed to build on the last, and the last will only and the last.', 'bluewireseo' ); ?></p>

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
                    <div class="bws-service-card">
                        <div class="bws-service-card-icon">
                            <?php echo bluewireseo_icon( 'layers' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </div>
                        <?php if ( $cat_label ) : ?>
                            <p class="bws-eyebrow" style="margin-bottom:0.5rem;"><?php echo esc_html( $cat_label ); ?></p>
                        <?php endif; ?>
                        <h3 style="font-size:1.125rem;margin-bottom:0.625rem;"><?php the_title(); ?></h3>
                        <p style="font-size:0.9rem;margin-bottom:1.25rem;"><?php the_excerpt(); ?></p>
                        <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-link-arrow">
                            <?php echo esc_html( $cta_text ); ?>
                            <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </a>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default service placeholders
                $default_services = array(
                    array( 'name' => 'Semantic SEO', 'desc' => '[PLACEHOLDER: Semantic SEO description — do not invent content]', 'icon' => 'layers' ),
                    array( 'name' => 'Technical SEO', 'desc' => '[PLACEHOLDER: Technical SEO description — do not invent content]', 'icon' => 'settings' ),
                    array( 'name' => 'Local SEO & GBP', 'desc' => '[PLACEHOLDER: Local SEO & GBP description — do not invent content]', 'icon' => 'target' ),
                    array( 'name' => 'SEO Audit', 'desc' => '[PLACEHOLDER: SEO Audit description — do not invent content]', 'icon' => 'file-text' ),
                );
                foreach ( $default_services as $service ) :
                ?>
                <div class="bws-service-card">
                    <div class="bws-service-card-icon">
                        <?php echo bluewireseo_icon( $service['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </div>
                    <h3 style="font-size:1.125rem;margin-bottom:0.625rem;"><?php echo esc_html( $service['name'] ); ?></h3>
                    <p style="font-size:0.9rem;margin-bottom:1.25rem;"><?php echo esc_html( $service['desc'] ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="bws-link-arrow">
                        <?php esc_html_e( 'Learn More', 'bluewireseo' ); ?>
                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </a>
                </div>
                <?php
                endforeach;
            endif;
            ?>
        </div>

        <div style="text-align:center;margin-top:2.5rem;">
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="bws-btn bws-btn-outline">
                <?php esc_html_e( 'View All Services', 'bluewireseo' ); ?>
                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </a>
        </div>
    </div>
</section>

<!-- Case Studies Preview -->
<section class="bws-section" style="background:var(--bws-white);">
    <div class="bws-container">
        <p class="bws-eyebrow" style="text-align:center;"><?php esc_html_e( 'RESULTS', 'bluewireseo' ); ?></p>
        <h2 style="text-align:center;margin-bottom:0.75rem;"><?php esc_html_e( 'Results we can show you the source for.', 'bluewireseo' ); ?></h2>
        <p style="text-align:center;max-width:560px;margin:0 auto 3rem;color:var(--bws-text-muted);">
            <?php esc_html_e( 'No invented numbers. Every metric in these case studies is cited with the data source and time period.', 'bluewireseo' ); ?>
        </p>

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
                // Placeholder case study cards
                $cs_placeholders = array(
                    array(
                        'tag' => 'OOH Advertising',
                        'tag2' => 'Semantic SEO + Local SEO',
                        'tag_class' => 'tag-ooh',
                        'result' => '[PLACEHOLDER: +X% organic impressions]',
                        'subtitle' => 'Regional OOH company — market page architecture and GBP',
                        'desc' => 'A regional outdoor media company needed to rank for billboard inventory across 8 markets. Starting from near-zero organic visibility, we built their entity architecture and market page structure from scratch.',
                        'source' => '[PLACEHOLDER: Google Search Console, date range]',
                    ),
                    array(
                        'tag' => 'B2B Services',
                        'tag2' => 'Technical SEO + Semantic SEO',
                        'tag_class' => 'tag-b2b',
                        'result' => '[PLACEHOLDER: X qualified leads / month from organic]',
                        'subtitle' => 'B2B service firm — from traffic to leads',
                        'desc' => 'A B2B service firm was generating traffic but not qualified leads. We restructured their content to match buying-stage intent and fixed significant technical gaps.',
                        'source' => '[PLACEHOLDER: GA4 + GSC, date range]',
                    ),
                    array(
                        'tag' => 'Multi-site Brand',
                        'tag2' => 'Multi-site SEO',
                        'tag_class' => 'tag-multisite',
                        'result' => '[PLACEHOLDER: X new ranking pages across Y markets]',
                        'subtitle' => 'Multi-location brand — cannibalisation fix and location pages',
                        'desc' => 'A multi-location business with 12 markets had duplicate content across all location pages. We rebuilt the architecture with unique entity signals for each market.',
                        'source' => '[PLACEHOLDER: Google Search Console, date range]',
                    ),
                );
                foreach ( $cs_placeholders as $cs ) :
                ?>
                <article class="bws-case-card">
                    <div class="bws-case-card-tags">
                        <span class="bws-card-tag <?php echo esc_attr( $cs['tag_class'] ); ?>"><?php echo esc_html( $cs['tag'] ); ?></span>
                        <span class="bws-card-tag" style="background:var(--bws-light-bg);color:var(--bws-text-muted);"><?php echo esc_html( $cs['tag2'] ); ?></span>
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

        <div style="text-align:center;margin-top:2.5rem;">
            <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="bws-btn bws-btn-outline">
                <?php esc_html_e( 'View All Case Studies', 'bluewireseo' ); ?>
                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<?php get_template_part( 'template-parts/components/cta-section' ); ?>
