<?php
/**
 * Template Name: BlueWireSEO — Contact Page Template
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

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode ) {
            the_content();
        } else {
            ?>
            <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:600px;margin-top:1.25rem;">
                        <p class="bws-eyebrow"><?php esc_html_e( 'GET IN TOUCH', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="font-size:clamp(2rem,4vw,3rem);"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle"><?php esc_html_e( 'Tell us about your business and goals. We will review your site and respond within 24 business hours.', 'bluewireseo' ); ?></p>
                    </div>
                </div>
            </div>

            <section class="bws-section-sm">
                <div class="bws-container">
                    <?php
                    $content = get_the_content();
                    if ( ! empty( $content ) ) {
                        the_content();
                    } else {
                        ?>
                        <div style="padding:3rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                            <h2 style="font-size:1.125rem;color:var(--bws-text-muted);font-weight:500;margin-bottom:0.5rem;">
                                <?php esc_html_e( 'BlueWireSEO — Contact Page Template', 'bluewireseo' ); ?>
                            </h2>
                            <p style="color:var(--bws-text-light);font-size:0.9rem;">
                                <?php esc_html_e( 'Click "Edit with Elementor" to add your contact form, map, and contact details.', 'bluewireseo' ); ?>
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section>
            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
