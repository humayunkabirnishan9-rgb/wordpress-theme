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
    $is_elementor_editor = false;
    if ( did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) ) {
        if ( isset( \Elementor\Plugin::$instance->editor ) && \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
            $is_elementor_editor = true;
        }
    }
    if ( isset( $_GET['elementor-preview'] ) ) {
        $is_elementor_editor = true;
    }

    if ( $is_elementor_editor ) {
        // Active visual editor mode in Elementor
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                echo '<div class="bws-elementor-container">';
                the_content();
                echo '</div>';
            }
        }
    } else {
        // On live site and Customizer preview: ALWAYS render the full, complete production homepage
        get_template_part( 'template-parts/page-sections/home-content' );

        // If the front page post contains custom content added by the admin, output it gracefully below
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                $extra_content = get_the_content();
                if ( ! empty( $extra_content ) && strlen( trim( strip_tags( $extra_content ) ) ) > 60 ) {
                    echo '<section class="bws-section bws-custom-page-content" style="background:var(--bws-white); border-top:1px solid var(--bws-border);"><div class="bws-container">';
                    the_content();
                    echo '</div></section>';
                }
            }
        }
    }
    ?>
</main>

<?php get_footer(); ?>
