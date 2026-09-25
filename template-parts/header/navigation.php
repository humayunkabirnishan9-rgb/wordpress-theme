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
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'bws-nav-list',
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul class="bws-nav-list" id="%1$s">%3$s</ul>',
                    'walker'         => new BlueWireSEO_Nav_Walker(),
                ) );
            } else {
                // Default nav if no menu is assigned
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
        <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'bluewireseo' ); ?></a>
            <ul class="bws-mobile-sub">
                <li><a href="<?php echo esc_url( home_url( '/services/seo/' ) ); ?>"><?php esc_html_e( 'SEO Service', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/seo-audit/' ) ); ?>"><?php esc_html_e( 'SEO Audit', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/semantic-seo/' ) ); ?>"><?php esc_html_e( 'Semantic SEO', 'bluewireseo' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/ooh-seo/' ) ); ?>"><?php esc_html_e( 'OOH SEO', 'bluewireseo' ); ?></a></li>
            </ul>
        </li>
        <li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php esc_html_e( 'Industries', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>"><?php esc_html_e( 'Case Studies', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/process/' ) ); ?>"><?php esc_html_e( 'Process', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'bluewireseo' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'bluewireseo' ); ?></a></li>
    </ul>
    <div class="bws-mobile-nav-actions">
        <a href="<?php echo esc_url( $contact_url ); ?>" class="bws-btn bws-btn-outline"><?php esc_html_e( 'Contact', 'bluewireseo' ); ?></a>
        <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary"><?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?></a>
    </div>
</nav>
