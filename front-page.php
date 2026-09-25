<?php
/**
 * Front Page Template
 * Uses Elementor if available, otherwise shows structured placeholder
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    // If this page has Elementor content, output it
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();

            // Check if Elementor built this page
            $elementor_data = get_post_meta( get_the_ID(), '_elementor_data', true );
            $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

            if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode ) {
                the_content();
            } else {
                // Show the WordPress page content
                $content = get_the_content();
                if ( ! empty( $content ) ) {
                    echo '<div class="bws-container bws-content" style="padding:3rem 1.5rem;">';
                    the_content();
                    echo '</div>';
                } else {
                    // Default front page placeholder — edit with Elementor
                    get_template_part( 'template-parts/page-sections/home-placeholder' );
                }
            }

        endwhile;
    else :
        get_template_part( 'template-parts/page-sections/home-placeholder' );
    endif;
    ?>
</main>

<?php get_footer(); ?>
