<?php
/**
 * Template Name: BlueWireSEO — Services Overview
 * Template Post Type: page
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();

        $elementor_data = get_post_meta( get_the_ID(), '_elementor_data', true );
        $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode && strlen( $elementor_data ) > 10 ) {
            the_content();
        } else {
            ?>
            <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:720px; margin-top:1.25rem;">
                        <p class="bws-eyebrow"><?php esc_html_e( 'WHAT WE DO', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="font-size:clamp(2.25rem,4.5vw,3.25rem); margin-bottom:1rem;"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle" style="font-size:1.125rem; color:var(--bws-text-secondary); line-height:1.65;">
                            <?php esc_html_e( 'Every service is engineered to compound topical authority and commercial capture across your market footprint.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section-sm">
                <div class="bws-container">
                    <?php
                    $content = get_the_content();
                    if ( ! empty( $content ) && stripos( $content, 'This is the' ) === false ) :
                        echo '<div class="bws-content" style="max-width:800px; margin-bottom:3rem;">';
                        the_content();
                        echo '</div>';
                    endif;
                    ?>

                    <div class="bws-grid-3">
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
                                $cta_url   = get_post_meta( get_the_ID(), '_bws_service_cta_url', true );
                                if ( ! $cta_url ) $cta_url = get_permalink();
                                if ( ! $cta_text ) $cta_text = __( 'View Service', 'bluewireseo' );
                                ?>
                                <article class="bws-service-card">
                                    <div class="bws-service-card-icon">
                                        <?php echo bluewireseo_icon( 'layers' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <?php if ( $cat_label ) : ?>
                                        <p class="bws-eyebrow" style="margin-bottom:0.5rem; font-size:0.75rem;"><?php echo esc_html( $cat_label ); ?></p>
                                    <?php endif; ?>
                                    <h2 style="font-size:1.25rem; margin-bottom:0.625rem;">
                                        <a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a>
                                    </h2>
                                    <p style="font-size:0.9rem; margin-bottom:1.25rem; color:var(--bws-text-secondary); line-height:1.6;"><?php the_excerpt(); ?></p>
                                    <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-link-arrow">
                                        <?php echo esc_html( $cta_text ); ?>
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </a>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </section>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>
            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
