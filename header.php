<?php
/**
 * Theme Header
 *
 * @package BlueWireSEO
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary-content">
    <?php esc_html_e( 'Skip to main content', 'bluewireseo' ); ?>
</a>

<?php
// Check if Elementor Pro Theme Builder header is active
if ( class_exists( '\ElementorPro\Modules\ThemeBuilder\Module' ) ) {
    $conditions_manager = \ElementorPro\Plugin::instance()->modules_manager->get_modules( 'theme-builder' );
    if ( $conditions_manager && method_exists( $conditions_manager, 'get_documents_for_location' ) ) {
        $docs = $conditions_manager->get_documents_for_location( 'header' );
        if ( ! empty( $docs ) ) {
            $conditions_manager->do_location( 'header' );
            return;
        }
    }
}
?>

<?php get_template_part( 'template-parts/header/topbar' ); ?>
<?php get_template_part( 'template-parts/header/navigation' ); ?>
