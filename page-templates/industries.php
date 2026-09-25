<?php
/**
 * Template Name: BlueWireSEO — Industries Overview
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
                        <p class="bws-eyebrow" style="color:#93C5FD;"><?php esc_html_e( 'SPECIALIZED VERTICALS', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'We do not run generic SEO checklists. We build custom directory hierarchies, geo-signal models, and commercial landing pages designed for high-ticket industries.', 'bluewireseo' ); ?>
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
                        $ind_query = new WP_Query( array(
                            'post_type'      => 'bws_industry',
                            'posts_per_page' => 12,
                            'post_status'    => 'publish',
                        ) );

                        if ( $ind_query->have_posts() ) :
                            while ( $ind_query->have_posts() ) :
                                $ind_query->the_post();
                                $badge    = get_post_meta( get_the_ID(), '_bws_industry_badge', true );
                                $cta_text = get_post_meta( get_the_ID(), '_bws_industry_cta_text', true );
                                if ( ! $cta_text ) $cta_text = __( 'Explore Industry SEO', 'bluewireseo' );
                                ?>
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2.25rem 2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <?php if ( $badge ) : ?>
                                        <span class="bws-card-tag tag-ooh" style="margin-bottom:1.25rem; align-self:flex-start; font-size:0.75rem;"><?php echo esc_html( $badge ); ?></span>
                                    <?php endif; ?>
                                    <h3 style="font-size:1.375rem; margin-bottom:0.875rem;">
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
                            $default_industries = array(
                                array(
                                    'title' => 'OOH & Billboard Advertising',
                                    'badge' => 'FLAGSHIP SPECIALTY',
                                    'desc'  => 'Market page architecture, billboard inventory directory indexing, and geo-targeted commercial intent pages across multi-city operating regions.',
                                    'url'   => '/industries/ooh-billboard/',
                                ),
                                array(
                                    'title' => 'Multi-Site & Portfolio Brands',
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
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2.25rem 2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <span class="bws-card-tag tag-ooh" style="margin-bottom:1.25rem; align-self:flex-start; font-size:0.75rem;"><?php echo esc_html( $ind['badge'] ); ?></span>
                                    <h3 style="font-size:1.375rem; margin-bottom:0.875rem;">
                                        <a href="<?php echo esc_url( home_url( $ind['url'] ) ); ?>" style="color:inherit; text-decoration:none;"><?php echo esc_html( $ind['title'] ); ?></a>
                                    </h3>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php echo esc_html( $ind['desc'] ); ?>
                                    </p>
                                    <a href="<?php echo esc_url( home_url( $ind['url'] ) ); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
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
