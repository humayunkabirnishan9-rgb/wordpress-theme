<?php
/**
 * BlueWireSEO Theme Functions
 *
 * @package BlueWireSEO
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Theme version constant
define( 'BLUEWIRESEO_VERSION', '1.0.0' );
define( 'BLUEWIRESEO_DIR', get_template_directory() );
define( 'BLUEWIRESEO_URI', get_template_directory_uri() );

// Load modular includes
require_once BLUEWIRESEO_DIR . '/inc/nav-walker.php';
require_once BLUEWIRESEO_DIR . '/inc/theme-setup.php';
require_once BLUEWIRESEO_DIR . '/inc/enqueue.php';
require_once BLUEWIRESEO_DIR . '/inc/custom-post-types.php';
require_once BLUEWIRESEO_DIR . '/inc/customizer.php';
require_once BLUEWIRESEO_DIR . '/inc/elementor.php';
require_once BLUEWIRESEO_DIR . '/inc/helpers.php';
require_once BLUEWIRESEO_DIR . '/inc/whatsapp.php';
require_once BLUEWIRESEO_DIR . '/inc/social-links.php';
