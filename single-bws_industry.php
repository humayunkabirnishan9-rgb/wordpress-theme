<?php
/**
 * Single Industry Template
 * BlueWireSEO — Industry Template
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
            $badge    = get_post_meta( get_the_ID(), '_bws_industry_badge', true );
            $cta_text = get_post_meta( get_the_ID(), '_bws_industry_cta_text', true );
            $cta_url  = get_post_meta( get_the_ID(), '_bws_industry_cta_url', true );
            if ( ! $cta_url ) $cta_url = bluewireseo_get_audit_url();
            if ( ! $cta_text ) $cta_text = __( 'Get Free Audit', 'bluewireseo' );
            ?>

            <!-- Industry Hero -->
            <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);padding:3rem 0 2.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:700px;margin-top:1.25rem;">
                        <?php if ( $badge ) : ?>
                            <p class="bws-eyebrow" style="margin-bottom:0.75rem;"><?php echo esc_html( $badge ); ?></p>
                        <?php else : ?>
                            <p class="bws-eyebrow" style="margin-bottom:0.75rem;"><?php esc_html_e( 'WHO WE SERVE', 'bluewireseo' ); ?></p>
                        <?php endif; ?>
                        <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3.25rem);margin-bottom:1rem;"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle"><?php the_excerpt(); ?></p>
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

            <!-- Industry Content -->
            <section class="bws-section-sm">
                <div class="bws-container">
                    <?php if ( get_the_content() ) : ?>
                        <div class="bws-content" style="max-width:800px;">
                            <?php the_content(); ?>
                        </div>
                    <?php else : ?>
                        <div style="padding:3rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                            <h2 style="font-size:1.125rem;color:var(--bws-text-muted);font-weight:500;margin-bottom:0.5rem;">
                                <?php esc_html_e( 'BlueWireSEO — Industry Template', 'bluewireseo' ); ?>
                            </h2>
                            <p style="color:var(--bws-text-light);font-size:0.9rem;">
                                <?php esc_html_e( 'Click "Edit with Elementor" to build this industry page. Add industry-specific challenges, SEO strategy, services, and case studies.', 'bluewireseo' ); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>

            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
