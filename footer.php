<?php
/**
 * Theme Footer
 *
 * @package BlueWireSEO
 */
?>

<?php
// Check if Elementor Pro Theme Builder footer is active
if ( class_exists( '\ElementorPro\Modules\ThemeBuilder\Module' ) ) {
    $conditions_manager = \ElementorPro\Plugin::instance()->modules_manager->get_modules( 'theme-builder' );
    if ( $conditions_manager && method_exists( $conditions_manager, 'get_documents_for_location' ) ) {
        $docs = $conditions_manager->get_documents_for_location( 'footer' );
        if ( ! empty( $docs ) ) {
            $conditions_manager->do_location( 'footer' );
            wp_footer();
            echo '</body></html>';
            return;
        }
    }
}
?>

<?php get_template_part( 'template-parts/footer/footer-main' ); ?>

<?php wp_footer(); ?>
</body>
</html>
