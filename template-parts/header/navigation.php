<?php
/**
 * Main Navigation Template Part
 *
 * @package BlueWireSEO
 */

$audit_url   = bluewireseo_get_audit_url();
$contact_url = bluewireseo_get_contact_url();
?>
<header class="bws-header" id="bws-header" role="banner">
    <div class="bws-container bws-header-inner">

        <!-- Logo -->
        <?php echo bluewireseo_logo( 'bws-logo', '36' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>

        <!-- Desktop Navigation -->
        <nav class="bws-nav" id="bws-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'bluewireseo' ); ?>">
            <?php
            $use_default = true;
            if ( has_nav_menu( 'primary' ) ) {
                $locations = get_nav_menu_locations();
                $menu_id   = isset( $locations['primary'] ) ? (int) $locations['primary'] : 0;
                $menu_items = $menu_id ? wp_get_nav_menu_items( $menu_id ) : array();

                // Count top-level items to prevent an accidental 1-item or partial menu from rendering
                $top_level_count = 0;
                if ( ! empty( $menu_items ) && is_array( $menu_items ) ) {
                    foreach ( $menu_items as $item ) {
                        if ( empty( $item->menu_item_parent ) || '0' === (string) $item->menu_item_parent ) {
                            $top_level_count++;
                        }
                    }
                }

                // If user has a valid menu with at least 3 top-level items, render it
                if ( $top_level_count >= 3 ) {
                    $menu_rendered = wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'bws-nav-list',
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul class="bws-nav-list" id="%1$s">%3$s</ul>',
                        'walker'         => new BlueWireSEO_Nav_Walker(),
                        'echo'           => false,
                    ) );
                    if ( ! empty( $menu_rendered ) && trim( strip_tags( $menu_rendered ) ) !== '' ) {
                        echo $menu_rendered; // phpcs:ignore WordPress.Security.EscapeOutput
                        $use_default = false;
                    }
                }
            }

            if ( $use_default ) {
                bluewireseo_default_navigation();
            }
            ?>
        </nav>

        <!-- Header Action Buttons -->
        <div class="bws-header-actions">
            <a href="<?php echo esc_url( $contact_url ); ?>" class="bws-btn bws-btn-outline bws-btn-sm">
                <?php esc_html_e( 'Contact', 'bluewireseo' ); ?>
            </a>
            <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary bws-btn-sm">
                <?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?>
            </a>
        </div>

        <!-- Mobile Toggle -->
        <button class="bws-mobile-toggle" id="bws-mobile-toggle" aria-expanded="false" aria-controls="bws-mobile-nav" aria-label="<?php esc_attr_e( 'Toggle mobile menu', 'bluewireseo' ); ?>">
            <span class="icon-menu"><?php echo bluewireseo_icon( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
            <span class="icon-close" hidden><?php echo bluewireseo_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
        </button>

    </div>
</header>

<!-- Mobile Navigation -->
<nav class="bws-mobile-nav" id="bws-mobile-nav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'bluewireseo' ); ?>" hidden>
    <ul class="bws-mobile-nav-list">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'bluewireseo' ); ?></a>
            <ul class="bws-mobile-sub">
                <li><a href="<?php echo esc_url( home_url( '/services/semantic-seo/' ) ); ?>"><?php esc_html_e( 'Semantic SEO', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/technical-seo/' ) ); ?>"><?php esc_html_e( 'Technical SEO', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/local-seo/' ) ); ?>"><?php esc_html_e( 'Local SEO & GBP', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/seo-audit/' ) ); ?>"><?php esc_html_e( 'SEO Audit', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/content-entity-seo/' ) ); ?>"><?php esc_html_e( 'Content & Entity SEO', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/link-building/' ) ); ?>"><?php esc_html_e( 'Link Building', 'bluewireseo' ); ?></a></li>
            </ul>
        </li>
        <li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php esc_html_e( 'Industries', 'bluewireseo' ); ?></a>
            <ul class="bws-mobile-sub">
                <li><a href="<?php echo esc_url( home_url( '/industries/ooh-billboard/' ) ); ?>"><?php esc_html_e( 'OOH & Billboard SEO', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/industries/multi-site-portfolio/' ) ); ?>"><?php esc_html_e( 'Multi-Site & Portfolio', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/industries/b2b-service-business/' ) ); ?>"><?php esc_html_e( 'B2B Service Businesses', 'bluewireseo' ); ?></a></li>
            </ul>
        </li>
        <li><a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>"><?php esc_html_e( 'Case Studies', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>"><?php esc_html_e( 'Portfolio', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/process/' ) ); ?>"><?php esc_html_e( 'Process', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'bluewireseo' ); ?></a></li>
    </ul>
    <div class="bws-mobile-nav-actions">
        <a href="<?php echo esc_url( $contact_url ); ?>" class="bws-btn bws-btn-outline"><?php esc_html_e( 'Contact', 'bluewireseo' ); ?></a>
        <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary"><?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?></a>
    </div>
</nav>
