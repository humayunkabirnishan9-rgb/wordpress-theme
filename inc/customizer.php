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
        'default'           => 'nishan@bluewireseo.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_email', array(
        'label'       => __( 'Email Address', 'bluewireseo' ),
        'description' => __( 'Official contact email, e.g. nishan@bluewireseo.com', 'bluewireseo' ),
        'section'     => 'bws_contact',
        'type'        => 'email',
    ) );

    // Phone
    $wp_customize->add_setting( 'bws_phone', array(
        'default'           => '+8801927497396',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_phone', array(
        'label'       => __( 'Phone Number', 'bluewireseo' ),
        'description' => __( 'Direct contact phone number, e.g. +8801927497396', 'bluewireseo' ),
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
        'default'           => '8801927497396',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_whatsapp_number', array(
        'label'       => __( 'WhatsApp Number', 'bluewireseo' ),
        'description' => __( 'Include country code without plus or spaces (e.g. 8801927497396).', 'bluewireseo' ),
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
        'default'           => 'Semantic SEO and technical SEO agency engineered for high-growth commercial enterprises. Delivering verified, data-backed organic revenue across US markets.',
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
        'title'    => __( 'Brand Colors & Design Tokens', 'bluewireseo' ),
        'panel'    => 'bws_theme_settings',
        'priority' => 60,
    ) );

    // Color definitions
    $color_settings = array(
        'bws_primary_color'       => array( 'label' => __( 'Primary Brand Color', 'bluewireseo' ), 'default' => '#2563EB' ),
        'bws_navy_color'          => array( 'label' => __( 'Navy / Hero Color', 'bluewireseo' ), 'default' => '#0F1B3D' ),
        'bws_secondary_color'     => array( 'label' => __( 'Secondary Medium Navy', 'bluewireseo' ), 'default' => '#1E2D5A' ),
        'bws_accent_color'        => array( 'label' => __( 'Accent Color', 'bluewireseo' ), 'default' => '#2563EB' ),
        'bws_text_color'          => array( 'label' => __( 'Body Text Color', 'bluewireseo' ), 'default' => '#1A1A2E' ),
        'bws_text_muted_color'    => array( 'label' => __( 'Muted Text Color', 'bluewireseo' ), 'default' => '#718096' ),
        'bws_bg_color'            => array( 'label' => __( 'Site Background Color', 'bluewireseo' ), 'default' => '#FFFFFF' ),
        'bws_surface_color'       => array( 'label' => __( 'Surface / Light BG Color', 'bluewireseo' ), 'default' => '#F4F6F9' ),
        'bws_border_color'        => array( 'label' => __( 'Border Color', 'bluewireseo' ), 'default' => '#E2E8F0' ),
        'bws_btn_color'           => array( 'label' => __( 'Primary Button Color', 'bluewireseo' ), 'default' => '#2563EB' ),
        'bws_btn_hover_color'     => array( 'label' => __( 'Button Hover Color', 'bluewireseo' ), 'default' => '#1D4ED8' ),
    );

    foreach ( $color_settings as $key => $conf ) {
        $wp_customize->add_setting( $key, array(
            'default'           => $conf['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
            'label'   => $conf['label'],
            'section' => 'bws_colors',
        ) ) );
    }

    // ============================
    // SECTION: Typography
    // ============================
    $wp_customize->add_section( 'bws_typography', array(
        'title'    => __( 'Global Typography', 'bluewireseo' ),
        'panel'    => 'bws_theme_settings',
        'priority' => 70,
    ) );

    // Heading Font
    $wp_customize->add_setting( 'bws_font_heading', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_font_heading', array(
        'label'       => __( 'Heading Font Family', 'bluewireseo' ),
        'description' => __( 'Choose heading font family.', 'bluewireseo' ),
        'section'     => 'bws_typography',
        'type'        => 'select',
        'choices'     => array(
            'Inter'             => 'Inter (Default)',
            'Plus Jakarta Sans' => 'Plus Jakarta Sans',
            'Outfit'            => 'Outfit',
            'Poppins'           => 'Poppins',
            'Montserrat'        => 'Montserrat',
        ),
    ) );

    // Body Font
    $wp_customize->add_setting( 'bws_font_body', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'bws_font_body', array(
        'label'       => __( 'Body Font Family', 'bluewireseo' ),
        'description' => __( 'Choose body text font family.', 'bluewireseo' ),
        'section'     => 'bws_typography',
        'type'        => 'select',
        'choices'     => array(
            'Inter'             => 'Inter (Default)',
            'Plus Jakarta Sans' => 'Plus Jakarta Sans',
            'Open Sans'         => 'Open Sans',
            'Roboto'            => 'Roboto',
        ),
    ) );
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
    $primary     = get_theme_mod( 'bws_primary_color', '#2563EB' );
    $navy        = get_theme_mod( 'bws_navy_color', '#0F1B3D' );
    $secondary   = get_theme_mod( 'bws_secondary_color', '#1E2D5A' );
    $accent      = get_theme_mod( 'bws_accent_color', '#2563EB' );
    $text        = get_theme_mod( 'bws_text_color', '#1A1A2E' );
    $text_muted  = get_theme_mod( 'bws_text_muted_color', '#718096' );
    $bg          = get_theme_mod( 'bws_bg_color', '#FFFFFF' );
    $surface     = get_theme_mod( 'bws_surface_color', '#F4F6F9' );
    $border      = get_theme_mod( 'bws_border_color', '#E2E8F0' );
    $btn         = get_theme_mod( 'bws_btn_color', '#2563EB' );
    $btn_hover   = get_theme_mod( 'bws_btn_hover_color', '#1D4ED8' );
    $font_head   = get_theme_mod( 'bws_font_heading', 'Inter' );
    $font_body   = get_theme_mod( 'bws_font_body', 'Inter' );

    echo '<style id="bws-customizer-css">';
    echo ':root {';
    echo '--bws-primary: ' . sanitize_hex_color( $primary ) . ';';
    echo '--bws-navy: ' . sanitize_hex_color( $navy ) . ';';
    echo '--bws-navy-medium: ' . sanitize_hex_color( $secondary ) . ';';
    echo '--bws-accent: ' . sanitize_hex_color( $accent ) . ';';
    echo '--bws-text: ' . sanitize_hex_color( $text ) . ';';
    echo '--bws-text-muted: ' . sanitize_hex_color( $text_muted ) . ';';
    echo '--bws-white: ' . sanitize_hex_color( $bg ) . ';';
    echo '--bws-light-bg: ' . sanitize_hex_color( $surface ) . ';';
    echo '--bws-border: ' . sanitize_hex_color( $border ) . ';';
    echo '--bws-primary-dark: ' . sanitize_hex_color( $btn_hover ) . ';';
    if ( 'Inter' !== $font_head ) {
        echo '--bws-font-heading: "' . esc_attr( $font_head ) . '", sans-serif;';
    }
    if ( 'Inter' !== $font_body ) {
        echo '--bws-font-primary: "' . esc_attr( $font_body ) . '", sans-serif;';
    }
    echo '}';
    echo '</style>';
}
add_action( 'wp_head', 'bluewireseo_customizer_css' );
