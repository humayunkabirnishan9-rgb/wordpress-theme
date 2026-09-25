<?php
/**
 * Single Service Template
 * BlueWireSEO — Service Template
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

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode ) {
            the_content();
        } else {
            $cat_label = get_post_meta( get_the_ID(), '_bws_service_category_label', true );
            $cta_text  = get_post_meta( get_the_ID(), '_bws_service_cta_text', true );
            $cta_url   = get_post_meta( get_the_ID(), '_bws_service_cta_url', true );
            if ( ! $cta_url ) $cta_url = bluewireseo_get_audit_url();
            if ( ! $cta_text ) $cta_text = __( 'Get Free Audit', 'bluewireseo' );
            ?>

            <!-- Service Hero -->
            <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);padding:3rem 0 2.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:700px;margin-top:1.25rem;">
                        <?php if ( $cat_label ) : ?>
                            <p class="bws-eyebrow" style="margin-bottom:0.75rem;"><?php echo esc_html( $cat_label ); ?></p>
                        <?php endif; ?>
                        <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3.25rem);margin-bottom:1rem;"><?php the_title(); ?></h1>
                        <div class="bws-hero-subtitle">
                            <?php echo wp_kses_post( get_the_excerpt() ); ?>
                        </div>
                        <div class="bws-hero-actions" style="margin-top:1.75rem;">
                            <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-btn bws-btn-primary bws-btn-lg">
                                <?php echo esc_html( $cta_text ); ?>
                            </a>
                            <a href="<?php echo esc_url( bluewireseo_get_call_url() ); ?>" class="bws-btn bws-btn-outline bws-btn-lg">
                                <?php esc_html_e( 'Book a 30-min Call', 'bluewireseo' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Content -->
            <section class="bws-section-sm">
                <div class="bws-container">
                    <?php if ( get_the_content() ) : ?>
                        <div class="bws-content" style="max-width:800px;">
                            <?php the_content(); ?>
                        </div>
                    <?php else : ?>
                        <!-- Editable placeholder structure -->
                        <div style="padding:3rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                            <h2 style="font-size:1.125rem;color:var(--bws-text-muted);font-weight:500;margin-bottom:0.5rem;">
                                <?php esc_html_e( 'BlueWireSEO — Service Template', 'bluewireseo' ); ?>
                            </h2>
                            <p style="color:var(--bws-text-light);font-size:0.9rem;">
                                <?php esc_html_e( 'Click "Edit with Elementor" to build this service page. Add your service content, benefits, pricing, and FAQs.', 'bluewireseo' ); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Related Case Studies -->
            <?php
            $related = new WP_Query( array(
                'post_type'      => 'bws_case_study',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ) );

            if ( $related->have_posts() ) :
                ?>
                <section class="bws-section-sm" style="background:var(--bws-light-bg);">
                    <div class="bws-container">
                        <h2 style="margin-bottom:2rem;font-size:1.875rem;"><?php esc_html_e( 'Related Case Studies', 'bluewireseo' ); ?></h2>
                        <div class="bws-grid-3">
                            <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                                <?php echo bluewireseo_case_study_card( get_the_ID() ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </section>
                <?php
                wp_reset_postdata();
            endif;
            ?>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>

            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
