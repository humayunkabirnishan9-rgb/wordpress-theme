<?php
/**
 * Standard Page Template
 * Inherits full BlueWireSEO design system
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();

        // Check if Elementor built this page
        $elementor_data = get_post_meta( get_the_ID(), '_elementor_data', true );
        $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode ) {
            // Elementor content
            the_content();
        } else {
            // Standard WordPress page content
            ?>
            <div class="bws-page-hero">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <h1 class="bws-hero-title" style="font-size:clamp(2rem,4vw,3rem);margin-top:1rem;"><?php the_title(); ?></h1>
                </div>
            </div>

            <section class="bws-section-sm">
                <div class="bws-container">
                    <div class="bws-content" style="max-width:800px;">
                        <?php
                        $content = get_the_content();
                        if ( ! empty( $content ) ) {
                            the_content();
                        } else {
                            echo '<div style="padding:3rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">';
                            echo '<p style="color:var(--bws-text-muted);font-size:1rem;">';
                            esc_html_e( 'This page is empty. Click "Edit with Elementor" to add content.', 'bluewireseo' );
                            echo '</p>';
                            echo '</div>';
                        }
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
