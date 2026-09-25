<?php
/**
 * Social Links Helper
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get social links configuration
 */
function bluewireseo_get_social_links() {
    return array(
        'facebook'  => array(
            'url'   => get_theme_mod( 'bws_social_facebook', '' ),
            'icon'  => 'facebook',
            'label' => __( 'Facebook', 'bluewireseo' ),
        ),
        'twitter'   => array(
            'url'   => get_theme_mod( 'bws_social_twitter', '' ),
            'icon'  => 'twitter',
            'label' => __( 'Twitter / X', 'bluewireseo' ),
        ),
        'instagram' => array(
            'url'   => get_theme_mod( 'bws_social_instagram', '' ),
            'icon'  => 'instagram',
            'label' => __( 'Instagram', 'bluewireseo' ),
        ),
        'linkedin'  => array(
            'url'   => get_theme_mod( 'bws_social_linkedin', '' ),
            'icon'  => 'linkedin',
            'label' => __( 'LinkedIn', 'bluewireseo' ),
        ),
    );
}

/**
 * Output social icons HTML
 */
function bluewireseo_social_icons( $wrapper_class = 'bws-footer-social' ) {
    $socials = bluewireseo_get_social_links();
    $has_any = false;

    foreach ( $socials as $social ) {
        if ( ! empty( $social['url'] ) ) {
            $has_any = true;
            break;
        }
    }

    if ( ! $has_any ) {
        return;
    }

    echo '<div class="' . esc_attr( $wrapper_class ) . '">';
    foreach ( $socials as $social ) {
        if ( empty( $social['url'] ) ) {
            continue;
        }
        printf(
            '<a href="%s" target="_blank" rel="noopener noreferrer" aria-label="%s" title="%s">%s</a>',
            esc_url( $social['url'] ),
            esc_attr( $social['label'] ),
            esc_attr( $social['label'] ),
            bluewireseo_icon( $social['icon'] ) // phpcs:ignore WordPress.Security.EscapeOutput
        );
    }
    echo '</div>';
}
