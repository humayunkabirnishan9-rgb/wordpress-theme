<?php
/**
 * Theme Customizer Settings
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register customizer settings
 */
function bluewireseo_customizer_register( $wp_customize ) {

    // ============================
    // PANEL: BlueWireSEO Settings
    // ============================
    $wp_customize->add_panel( 'bws_theme_settings', array(
        'title'       => __( 'BlueWireSEO Settings', 'bluewireseo' ),
        'description' => __( 'Theme-wide settings for BlueWireSEO', 'bluewireseo' ),
        'priority'    => 30,
    ) );

    // ============================
    // SECTION: Contact Info
    // ============================
    $wp_customize->add_section( 'bws_contact', array(
        'title'    => __( 'Contact Information', 'bluewireseo' ),
        'panel'    => 'bws_theme_settings',
        'priority' => 10,
    ) );

    // Email
    $wp_customize->add_setting( 'bws_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_email', array(
        'label'       => __( 'Email Address', 'bluewireseo' ),
        'description' => __( 'e.g. hello@bluewireseo.com', 'bluewireseo' ),
        'section'     => 'bws_contact',
        'type'        => 'email',
    ) );

    // Phone
    $wp_customize->add_setting( 'bws_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_phone', array(
        'label'       => __( 'Phone Number', 'bluewireseo' ),
        'description' => __( 'e.g. +1 (xxx) xxx-xxxx', 'bluewireseo' ),
        'section'     => 'bws_contact',
        'type'        => 'text',
    ) );

    // Top Bar CTA Text
    $wp_customize->add_setting( 'bws_topbar_cta_text', array(
        'default'           => 'Free SEO audit for OOH and billboard companies',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_topbar_cta_text', array(
        'label'   => __( 'Top Bar CTA Text', 'bluewireseo' ),
        'section' => 'bws_contact',
        'type'    => 'text',
    ) );

    // Top Bar CTA URL
    $wp_customize->add_setting( 'bws_topbar_cta_url', array(
        'default'           => '#free-audit',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_topbar_cta_url', array(
        'label'   => __( 'Top Bar CTA URL', 'bluewireseo' ),
        'section' => 'bws_contact',
        'type'    => 'url',
    ) );

    // ============================
    // SECTION: WhatsApp
    // ============================
    $wp_customize->add_section( 'bws_whatsapp', array(
        'title'    => __( 'WhatsApp Button', 'bluewireseo' ),
        'panel'    => 'bws_theme_settings',
        'priority' => 20,
    ) );

    // WhatsApp Number
    $wp_customize->add_setting( 'bws_whatsapp_number', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_whatsapp_number', array(
        'label'       => __( 'WhatsApp Number', 'bluewireseo' ),
        'description' => __( 'Include country code. e.g. +1xxxxxxxxxx — numbers only, no spaces or dashes.', 'bluewireseo' ),
        'section'     => 'bws_whatsapp',
        'type'        => 'text',
    ) );

    // WhatsApp Greeting Message
    $wp_customize->add_setting( 'bws_whatsapp_message', array(
        'default'           => 'Hello, I would like to learn more about BlueWireSEO.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_whatsapp_message', array(
        'label'       => __( 'WhatsApp Greeting Message', 'bluewireseo' ),
        'description' => __( 'Pre-filled message when user opens WhatsApp', 'bluewireseo' ),
        'section'     => 'bws_whatsapp',
        'type'        => 'textarea',
    ) );

    // Show/Hide WhatsApp Button
    $wp_customize->add_setting( 'bws_whatsapp_show', array(
        'default'           => true,
        'sanitize_callback' => 'bluewireseo_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_whatsapp_show', array(
        'label'   => __( 'Show WhatsApp Button', 'bluewireseo' ),
        'section' => 'bws_whatsapp',
        'type'    => 'checkbox',
    ) );

    // ============================
    // SECTION: Social Links
    // ============================
    $wp_customize->add_section( 'bws_social', array(
        'title'    => __( 'Social Media Links', 'bluewireseo' ),
        'panel'    => 'bws_theme_settings',
        'priority' => 30,
    ) );

    $social_platforms = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter / X',
        'instagram' => 'Instagram',
        'linkedin'  => 'LinkedIn',
    );

    foreach ( $social_platforms as $platform => $label ) {
        $wp_customize->add_setting( 'bws_social_' . $platform, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( 'bws_social_' . $platform, array(
            'label'       => __( $label . ' URL', 'bluewireseo' ),
            'description' => __( 'Leave empty to hide this icon.', 'bluewireseo' ),
            'section'     => 'bws_social',
            'type'        => 'url',
        ) );
    }

    // ============================
    // SECTION: CTA Settings
    // ============================
    $wp_customize->add_section( 'bws_cta', array(
        'title'    => __( 'Global CTA Settings', 'bluewireseo' ),
        'panel'    => 'bws_theme_settings',
        'priority' => 40,
    ) );

    // Free Audit URL
    $wp_customize->add_setting( 'bws_audit_url', array(
        'default'           => '/free-seo-audit/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_audit_url', array(
        'label'       => __( 'Free SEO Audit Page URL', 'bluewireseo' ),
        'description' => __( 'URL for the "Get Free Audit" CTA buttons.', 'bluewireseo' ),
        'section'     => 'bws_cta',
        'type'        => 'url',
    ) );

    // Book a Call URL
    $wp_customize->add_setting( 'bws_call_url', array(
        'default'           => '/contact/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_call_url', array(
        'label'       => __( 'Book a Call URL', 'bluewireseo' ),
        'description' => __( 'URL for the "Book a 30-min Call" CTA buttons.', 'bluewireseo' ),
        'section'     => 'bws_cta',
        'type'        => 'url',
    ) );

    // Contact Page URL
    $wp_customize->add_setting( 'bws_contact_url', array(
        'default'           => '/contact/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_contact_url', array(
        'label'   => __( 'Contact Page URL', 'bluewireseo' ),
        'section' => 'bws_cta',
        'type'    => 'url',
    ) );

    // ============================
    // SECTION: Footer Settings
    // ============================
    $wp_customize->add_section( 'bws_footer', array(
        'title'    => __( 'Footer Settings', 'bluewireseo' ),
        'panel'    => 'bws_theme_settings',
        'priority' => 50,
    ) );

    // Footer Description
    $wp_customize->add_setting( 'bws_footer_desc', array(
        'default'           => 'Semantic SEO and technical SEO agency serving US businesses. Bangladesh (remote-first, serving US businesses).',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_footer_desc', array(
        'label'   => __( 'Footer Company Description', 'bluewireseo' ),
        'section' => 'bws_footer',
        'type'    => 'textarea',
    ) );

    // Copyright Text
    $wp_customize->add_setting( 'bws_copyright', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_copyright', array(
        'label'       => __( 'Copyright Text', 'bluewireseo' ),
        'description' => __( 'Leave blank for default: © {year} bluewireseo. All rights reserved.', 'bluewireseo' ),
        'section'     => 'bws_footer',
        'type'        => 'text',
    ) );

    // ============================
    // SECTION: Colors
    // ============================
    $wp_customize->add_section( 'bws_colors', array(
        'title'    => __( 'Brand Colors', 'bluewireseo' ),
        'panel'    => 'bws_theme_settings',
        'priority' => 60,
    ) );

    // Primary Color
    $wp_customize->add_setting( 'bws_primary_color', array(
        'default'           => '#2563EB',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bws_primary_color', array(
        'label'   => __( 'Primary Color (Blue)', 'bluewireseo' ),
        'section' => 'bws_colors',
    ) ) );

    // Navy Color
    $wp_customize->add_setting( 'bws_navy_color', array(
        'default'           => '#0F1B3D',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bws_navy_color', array(
        'label'   => __( 'Navy Color (Dark)', 'bluewireseo' ),
        'section' => 'bws_colors',
    ) ) );
}
add_action( 'customize_register', 'bluewireseo_customizer_register' );

/**
 * Sanitize checkbox
 */
function bluewireseo_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Output dynamic CSS from customizer
 */
function bluewireseo_customizer_css() {
    $primary = get_theme_mod( 'bws_primary_color', '#2563EB' );
    $navy    = get_theme_mod( 'bws_navy_color', '#0F1B3D' );

    if ( '#2563EB' !== $primary || '#0F1B3D' !== $navy ) {
        echo '<style id="bws-customizer-css">';
        echo ':root {';
        if ( '#2563EB' !== $primary ) {
            echo '--bws-primary: ' . sanitize_hex_color( $primary ) . ';';
        }
        if ( '#0F1B3D' !== $navy ) {
            echo '--bws-navy: ' . sanitize_hex_color( $navy ) . ';';
        }
        echo '}';
        echo '</style>';
    }
}
add_action( 'wp_head', 'bluewireseo_customizer_css' );
