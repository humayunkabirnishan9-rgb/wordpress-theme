<?php
/**
 * Enqueue Scripts & Styles
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue frontend assets
 */
function bluewireseo_enqueue_assets() {
    // Google Fonts - Plus Jakarta Sans & Inter
    wp_enqueue_style(
        'bws-google-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Main theme stylesheet
    wp_enqueue_style(
        'bluewireseo-style',
        get_stylesheet_uri(),
        array( 'bws-google-fonts' ),
        BLUEWIRESEO_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'bluewireseo-main',
        BLUEWIRESEO_URI . '/assets/js/main.js',
        array(),
        BLUEWIRESEO_VERSION,
        true
    );

    // Pass data to JS
    $whatsapp_number = get_theme_mod( 'bws_whatsapp_number', '' );
    $whatsapp_number = preg_replace( '/[^0-9]/', '', $whatsapp_number );

    wp_localize_script(
        'bluewireseo-main',
        'bwsData',
        array(
            'whatsappNumber' => esc_attr( $whatsapp_number ),
            'homeUrl'        => esc_url( home_url( '/' ) ),
            'themeUri'       => esc_url( BLUEWIRESEO_URI ),
            'ajaxUrl'        => esc_url( admin_url( 'admin-ajax.php' ) ),
            'nonce'          => wp_create_nonce( 'bws_nonce' ),
        )
    );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bluewireseo_enqueue_assets' );

/**
 * Enqueue admin assets
 */
function bluewireseo_admin_assets( $hook ) {
    wp_enqueue_style(
        'bws-admin-style',
        BLUEWIRESEO_URI . '/assets/css/admin.css',
        array(),
        BLUEWIRESEO_VERSION
    );
}
add_action( 'admin_enqueue_scripts', 'bluewireseo_admin_assets' );

/**
 * Preload critical assets
 */
function bluewireseo_preload_assets() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'bluewireseo_preload_assets', 1 );
