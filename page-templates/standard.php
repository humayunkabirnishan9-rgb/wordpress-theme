<?php
/**
 * Template Name: BlueWireSEO — Standard Page Template
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
                    <div style="max-width:700px;margin-top:1.25rem;">
                        <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3rem);"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <section class="bws-section-sm">
                <div class="bws-container">
                    <?php
                    $content = get_the_content();
                    if ( ! empty( $content ) ) {
                        echo '<div class="bws-content" style="max-width:800px;">';
                        the_content();
                        echo '</div>';
                    } else {
                        ?>
                        <div style="padding:3rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                            <h2 style="font-size:1.125rem;color:var(--bws-text-muted);font-weight:500;margin-bottom:0.5rem;">
                                <?php esc_html_e( 'BlueWireSEO — Standard Page Template', 'bluewireseo' ); ?>
                            </h2>
                            <p style="color:var(--bws-text-light);font-size:0.9rem;">
                                <?php esc_html_e( 'Click "Edit with Elementor" to start building this page.', 'bluewireseo' ); ?>
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>
            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
