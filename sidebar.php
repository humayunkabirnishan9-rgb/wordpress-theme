<?php
/**
 * Sidebar Template
 *
 * @package BlueWireSEO
 */

if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
    return;
}
?>

<aside id="secondary" class="bws-sidebar" role="complementary">
    <?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside>
