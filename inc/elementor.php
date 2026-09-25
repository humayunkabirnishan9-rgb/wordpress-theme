<?php
/**
 * Elementor Integration
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Elementor locations
 * Required for Elementor Pro Theme Builder
 */
function bluewireseo_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_location( 'header' );
    $elementor_theme_manager->register_location( 'footer' );
    $elementor_theme_manager->register_location( 'single' );
    $elementor_theme_manager->register_location( 'archive' );
}
add_action( 'elementor/theme/register_locations', 'bluewireseo_register_elementor_locations' );

/**
 * Elementor compatibility
 */
function bluewireseo_elementor_compatibility() {
    // Elementor container width
    update_option( 'elementor_container_width', 1200 );
}

/**
 * Add Elementor page templates
 */
function bluewireseo_elementor_templates( $templates ) {
    return $templates;
}

/**
 * Override Elementor Pro header/footer
 * If Elementor Pro is active, skip PHP header/footer
 */
function bluewireseo_has_elementor_pro_header() {
    if ( ! class_exists( '\ElementorPro\Modules\ThemeBuilder\Module' ) ) {
        return false;
    }
    $conditions_manager = \ElementorPro\Plugin::instance()->modules_manager->get_modules( 'theme-builder' );
    if ( ! $conditions_manager ) {
        return false;
    }
    return true;
}

/**
 * Register custom Elementor categories
 */
function bluewireseo_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'bluewireseo',
        array(
            'title' => __( 'BlueWireSEO', 'bluewireseo' ),
            'icon'  => 'fa fa-plug',
        )
    );
}
add_action( 'elementor/elements/categories_registered', 'bluewireseo_elementor_widget_categories' );

/**
 * Elementor editor notices
 */
function bluewireseo_elementor_editor_enqueue() {
    wp_enqueue_style(
        'bws-elementor-editor',
        BLUEWIRESEO_URI . '/assets/css/elementor-editor.css',
        array(),
        BLUEWIRESEO_VERSION
    );
}
add_action( 'elementor/editor/after_enqueue_styles', 'bluewireseo_elementor_editor_enqueue' );

/**
 * Elementor kit defaults
 * Sets default Elementor Global Kit settings
 */
function bluewireseo_set_elementor_kit_defaults() {
    if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
        return;
    }

    $kit_id = get_option( 'elementor_active_kit' );
    if ( ! $kit_id ) {
        return;
    }

    $kit_meta = get_post_meta( $kit_id, '_elementor_page_settings', true );
    if ( ! empty( $kit_meta ) ) {
        return; // Kit already configured
    }

    // Set default kit settings
    $default_settings = array(
        'system_colors' => array(
            array(
                '_id'   => 'primary',
                'title' => 'Primary',
                'color' => '#2563EB',
            ),
            array(
                '_id'   => 'secondary',
                'title' => 'Secondary',
                'color' => '#0F1B3D',
            ),
            array(
                '_id'   => 'text',
                'title' => 'Text',
                'color' => '#1A1A2E',
            ),
            array(
                '_id'   => 'accent',
                'title' => 'Accent',
                'color' => '#2563EB',
            ),
        ),
        'system_typography' => array(
            array(
                '_id'           => 'primary',
                'title'         => 'Primary',
                'typography_typography' => 'custom',
                'typography_font_family' => 'Inter',
                'typography_font_weight' => '600',
            ),
            array(
                '_id'           => 'secondary',
                'title'         => 'Secondary',
                'typography_typography' => 'custom',
                'typography_font_family' => 'Inter',
                'typography_font_weight' => '400',
            ),
            array(
                '_id'           => 'text',
                'title'         => 'Text',
                'typography_typography' => 'custom',
                'typography_font_family' => 'Inter',
                'typography_font_weight' => '400',
            ),
            array(
                '_id'           => 'accent',
                'title'         => 'Accent',
                'typography_typography' => 'custom',
                'typography_font_family' => 'Inter',
                'typography_font_weight' => '700',
            ),
        ),
    );

    update_post_meta( $kit_id, '_elementor_page_settings', $default_settings );
}
add_action( 'after_switch_theme', 'bluewireseo_set_elementor_kit_defaults' );
