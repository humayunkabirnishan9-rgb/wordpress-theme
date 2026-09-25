<?php
/**
 * Template Name: BlueWireSEO — Free SEO Audit Template
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
            <div class="bws-page-hero" style="background:var(--bws-navy);padding:4rem 0 3rem;">
                <div class="bws-container">
                    <div style="max-width:680px;text-align:center;margin:0 auto;">
                        <p class="bws-eyebrow" style="color:rgba(255,255,255,0.7);"><?php esc_html_e( 'FREE SEO AUDIT', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#fff;font-size:clamp(2rem,4.5vw,3.25rem);"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.75);margin:0 auto 2rem;"><?php esc_html_e( 'Get a free 20-point SEO audit of your site. No commitment. Delivered within [PLACEHOLDER: 48-72 business hours].', 'bluewireseo' ); ?></p>
                    </div>
                </div>
            </div>

            <section class="bws-section-sm">
                <div class="bws-container">
                    <?php
                    $content = get_the_content();
                    if ( ! empty( $content ) ) {
                        echo '<div class="bws-content" style="max-width:800px;margin:0 auto;">';
                        the_content();
                        echo '</div>';
                    } else {
                        ?>
                        <div style="max-width:600px;margin:0 auto;padding:3rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                            <h2 style="font-size:1.125rem;color:var(--bws-text-muted);font-weight:500;margin-bottom:0.5rem;">
                                <?php esc_html_e( 'BlueWireSEO — Free SEO Audit Template', 'bluewireseo' ); ?>
                            </h2>
                            <p style="color:var(--bws-text-light);font-size:0.9rem;">
                                <?php esc_html_e( 'Click "Edit with Elementor" to add your audit request form and content.', 'bluewireseo' ); ?>
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
