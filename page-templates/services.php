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
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:760px; margin-top:1.25rem;">
                        <p class="bws-eyebrow" style="color:#93C5FD;"><?php esc_html_e( 'CORE ARCHITECTURAL SERVICES', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'Every service is engineered to compound topical authority, fix code-level crawl bottlenecks, and capture high-intent commercial buyers.', 'bluewireseo' ); ?>
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
                </div>
            </section>

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
