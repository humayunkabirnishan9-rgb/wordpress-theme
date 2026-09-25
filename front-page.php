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
    // Check if user is currently inside Elementor visual editor
    $is_elementor_editor = false;
    if ( did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) ) {
        if ( isset( \Elementor\Plugin::$instance->editor ) && \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
            $is_elementor_editor = true;
        }
    }

    // Check if user explicitly set a theme option or custom page override
    $use_custom_page = get_theme_mod( 'bws_use_custom_frontpage', false );

    if ( $is_elementor_editor || $use_custom_page ) {
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        endif;
    } else {
        // ALWAYS display the complete, production-ready 10/10 BlueWireSEO homepage
        get_template_part( 'template-parts/page-sections/home-content' );
    }
    ?>
</main>

<?php get_footer(); ?>
