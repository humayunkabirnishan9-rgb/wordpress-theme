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
            $elementor_data      = get_post_meta( get_the_ID(), '_elementor_data', true );
            $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

            // If built with Elementor and has actual element data
            if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode && strlen( $elementor_data ) > 10 ) {
                the_content();
            } else {
                $raw_content = get_the_content();
                // Check if page content is default WordPress placeholder text
                $is_wp_default = false;
                if ( ! empty( $raw_content ) ) {
                    if ( stripos( $raw_content, 'This is the home page' ) !== false ||
                         stripos( $raw_content, 'Settings > Reading' ) !== false ||
                         stripos( $raw_content, 'Welcome to WordPress' ) !== false ) {
                        $is_wp_default = true;
                    }
                }

                // If user wrote real custom content (not default WP text), output it above
                if ( ! empty( $raw_content ) && ! $is_wp_default ) {
                    echo '<div class="bws-container bws-content" style="padding:2.5rem 1.5rem 0;">';
                    the_content();
                    echo '</div>';
                }

                // Always display the complete, production BlueWireSEO homepage
                get_template_part( 'template-parts/page-sections/home-content' );
            }

        endwhile;
    else :
        // Fallback when no front page post is assigned
        get_template_part( 'template-parts/page-sections/home-content' );
    endif;
    ?>
</main>

<?php get_footer(); ?>
