<?php
/**
 * Theme Setup
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme setup
 */
function bluewireseo_setup() {
    // Text domain
    load_theme_textdomain( 'bluewireseo', BLUEWIRESEO_DIR . '/languages' );

    // Content width
    if ( ! isset( $content_width ) ) {
        $content_width = 1200;
    }

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'bws-hero', 1600, 700, true );
    add_image_size( 'bws-card', 800, 500, true );
    add_image_size( 'bws-thumb', 400, 280, true );
    add_image_size( 'bws-team', 200, 200, true );

    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height'               => 72,
        'width'                => 240,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => false,
    ) );

    // Title tag
    add_theme_support( 'title-tag' );

    // HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ) );

    // Custom background
    add_theme_support( 'custom-background' );

    // Wide/full alignment for Gutenberg
    add_theme_support( 'align-wide' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );

    // Elementor compatibility
    add_theme_support( 'elementor' );
    add_theme_support( 'header-footer-elementor' );

    // Editor styles
    add_editor_style( 'assets/css/editor-style.css' );

    // Navigation menus
    register_nav_menus( array(
        'primary'   => __( 'Primary Navigation', 'bluewireseo' ),
        'footer-1'  => __( 'Footer: Services', 'bluewireseo' ),
        'footer-2'  => __( 'Footer: Industries', 'bluewireseo' ),
        'footer-3'  => __( 'Footer: Company', 'bluewireseo' ),
        'footer-4'  => __( 'Footer: Resources', 'bluewireseo' ),
        'legal'     => __( 'Footer Legal Links', 'bluewireseo' ),
    ) );

    // Feed links
    add_theme_support( 'automatic-feed-links' );

    // Post formats
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video' ) );
}
add_action( 'after_setup_theme', 'bluewireseo_setup' );

/**
 * Set content width
 */
function bluewireseo_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'bluewireseo_content_width', 1200 );
}
add_action( 'after_setup_theme', 'bluewireseo_content_width', 0 );

/**
 * Register widget areas
 */
function bluewireseo_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'bluewireseo' ),
        'id'            => 'sidebar-blog',
        'description'   => __( 'Add widgets here for the blog sidebar.', 'bluewireseo' ),
        'before_widget' => '<div id="%1$s" class="widget bws-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'bluewireseo' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Add widgets here for the footer.', 'bluewireseo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'bluewireseo_widgets_init' );

/**
 * Body classes
 */
function bluewireseo_body_classes( $classes ) {
    // Check if Elementor is active
    if ( defined( 'ELEMENTOR_VERSION' ) ) {
        $classes[] = 'elementor-active';
    }

    // Check if Elementor Pro is active
    if ( defined( 'ELEMENTOR_PRO_VERSION' ) ) {
        $classes[] = 'elementor-pro-active';
    }

    // Add front page class
    if ( is_front_page() ) {
        $classes[] = 'bws-front-page';
    }

    // Add post type classes
    if ( is_singular( 'bws_service' ) ) {
        $classes[] = 'bws-service-single';
    }
    if ( is_singular( 'bws_case_study' ) ) {
        $classes[] = 'bws-case-study-single';
    }
    if ( is_singular( 'bws_industry' ) ) {
        $classes[] = 'bws-industry-single';
    }
    if ( is_singular( 'bws_portfolio' ) ) {
        $classes[] = 'bws-portfolio-single';
    }

    return $classes;
}
add_filter( 'body_class', 'bluewireseo_body_classes' );

/**
 * Custom excerpt length
 */
function bluewireseo_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'bluewireseo_excerpt_length' );

/**
 * Custom excerpt more
 */
function bluewireseo_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'bluewireseo_excerpt_more' );

/**
 * Default navigation (used when no menu is assigned)
 */
function bluewireseo_default_navigation() {
    $pages = array(
        'Home'         => home_url( '/' ),
        'Services'     => home_url( '/services/' ),
        'Industries'   => home_url( '/industries/' ),
        'Case Studies' => home_url( '/case-studies/' ),
        'Portfolio'    => home_url( '/portfolio/' ),
        'Process'      => home_url( '/process/' ),
        'About'        => home_url( '/about/' ),
        'Blog'         => home_url( '/blog/' ),
    );

    echo '<ul class="bws-nav-list">';
    foreach ( $pages as $label => $url ) {
        $current = ( rtrim( $_SERVER['REQUEST_URI'] ?? '', '/' ) === rtrim( parse_url( $url, PHP_URL_PATH ), '/' ) ) ? 'current-menu-item' : '';
        if ( 'Services' === $label ) {
            echo '<li class="bws-nav-item menu-item-has-children ' . esc_attr( $current ) . '">';
            echo '<a href="' . esc_url( $url ) . '">' . esc_html( $label );
            echo '<svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:12px;height:12px;max-width:12px;max-height:12px;margin-left:4px;flex-shrink:0;"><polyline points="6 9 12 15 18 9"></polyline></svg>';
            echo '</a>';
            echo '<ul class="sub-menu bws-dropdown">';
            echo '<li><a href="' . esc_url( home_url( '/services/semantic-seo/' ) ) . '">' . esc_html__( 'Semantic SEO', 'bluewireseo' ) . '</a></li>';
            echo '<li><a href="' . esc_url( home_url( '/services/technical-seo/' ) ) . '">' . esc_html__( 'Technical SEO', 'bluewireseo' ) . '</a></li>';
            echo '<li><a href="' . esc_url( home_url( '/services/local-seo/' ) ) . '">' . esc_html__( 'Local SEO & GBP', 'bluewireseo' ) . '</a></li>';
            echo '<li><a href="' . esc_url( home_url( '/services/seo-audit/' ) ) . '">' . esc_html__( 'SEO Audit', 'bluewireseo' ) . '</a></li>';
            echo '<li><a href="' . esc_url( home_url( '/services/content-entity-seo/' ) ) . '">' . esc_html__( 'Content & Entity SEO', 'bluewireseo' ) . '</a></li>';
            echo '<li><a href="' . esc_url( home_url( '/services/link-building/' ) ) . '">' . esc_html__( 'Link Building', 'bluewireseo' ) . '</a></li>';
            echo '</ul>';
            echo '</li>';
        } elseif ( 'Industries' === $label ) {
            echo '<li class="bws-nav-item menu-item-has-children ' . esc_attr( $current ) . '">';
            echo '<a href="' . esc_url( $url ) . '">' . esc_html( $label );
            echo '<svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:12px;height:12px;max-width:12px;max-height:12px;margin-left:4px;flex-shrink:0;"><polyline points="6 9 12 15 18 9"></polyline></svg>';
            echo '</a>';
            echo '<ul class="sub-menu bws-dropdown">';
            echo '<li><a href="' . esc_url( home_url( '/industries/ooh-billboard/' ) ) . '">' . esc_html__( 'OOH & Billboard SEO', 'bluewireseo' ) . '</a></li>';
            echo '<li><a href="' . esc_url( home_url( '/industries/multi-site-portfolio/' ) ) . '">' . esc_html__( 'Multi-Site & Portfolio', 'bluewireseo' ) . '</a></li>';
            echo '<li><a href="' . esc_url( home_url( '/industries/b2b-service-business/' ) ) . '">' . esc_html__( 'B2B Service Businesses', 'bluewireseo' ) . '</a></li>';
            echo '<li><a href="' . esc_url( home_url( '/industries/' ) ) . '">' . esc_html__( 'All Industries', 'bluewireseo' ) . '</a></li>';
            echo '</ul>';
            echo '</li>';
        } else {
            echo '<li class="bws-nav-item ' . esc_attr( $current ) . '">';
            echo '<a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
            echo '</li>';
        }
    }
    echo '</ul>';
}
