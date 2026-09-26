<?php
/**
 * Front Page Template
 * BlueWireSEO Production Homepage
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();

            if ( bluewireseo_is_elementor_active( get_the_ID() ) ) {
                // Render Elementor visual editor / saved content directly
                echo '<div class="bws-elementor-container">';
                the_content();
                echo '</div>';
            } else {
                // Render full high-converting production BlueWireSEO homepage layout
                get_template_part( 'template-parts/page-sections/home-content' );

                // Unconditionally execute the_content() inside a hidden hook
                echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
                the_content();
                echo '</div>';
            }
        }
    } else {
        // Fallback: If pages were deleted or not yet assigned in Settings > Reading
        // ALWAYS render the full high-converting BlueWireSEO homepage layout!
        get_template_part( 'template-parts/page-sections/home-content' );
    }
    ?>
</main>

<?php get_footer(); ?>
