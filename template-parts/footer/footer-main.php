<?php
/**
 * Footer Main Template Part
 *
 * @package BlueWireSEO
 */

$email    = bluewireseo_get_email();
$phone    = bluewireseo_get_phone();
$footer_desc = bluewireseo_get_footer_desc();
$audit_url   = bluewireseo_get_audit_url();
$contact_url = bluewireseo_get_contact_url();
?>
<footer class="bws-footer" id="bws-footer" role="contentinfo">
    <div class="bws-container">
        <div class="bws-footer-grid">

            <!-- Brand Column -->
            <div class="bws-footer-brand">
                <div class="bws-footer-logo">
                    <?php echo bluewireseo_footer_logo(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </div>
                <p class="bws-footer-desc"><?php echo esc_html( $footer_desc ); ?></p>

                <div class="bws-footer-contact">
                    <?php if ( $email ) : ?>
                        <a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
                            <?php echo bluewireseo_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                            <span><?php echo esc_html( $email ); ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if ( $phone ) : ?>
                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>">
                            <?php echo bluewireseo_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                            <span><?php echo esc_html( $phone ); ?></span>
                        </a>
                    <?php endif; ?>
                </div>

                <?php bluewireseo_social_icons(); ?>
            </div>

            <!-- Services Column -->
            <div class="bws-footer-col">
                <h4 class="bws-footer-col-title"><?php esc_html_e( 'Services', 'bluewireseo' ); ?></h4>
                <?php
                $use_fallback_services = true;
                if ( has_nav_menu( 'footer-1' ) ) {
                    $locations = get_nav_menu_locations();
                    $f1_menu_id = isset( $locations['footer-1'] ) ? $locations['footer-1'] : 0;
                    $f1_items   = $f1_menu_id ? wp_get_nav_menu_items( $f1_menu_id ) : array();

                    // Check if menu is mistakenly the main/pages menu containing 'Home'
                    $is_accidentally_all_pages = false;
                    if ( ! empty( $f1_items ) ) {
                        foreach ( $f1_items as $item ) {
                            $item_title = strtolower( trim( $item->title ?? '' ) );
                            if ( in_array( $item_title, array( 'home', 'privacy policy', 'terms of service', 'about' ), true ) ) {
                                $is_accidentally_all_pages = true;
                                break;
                            }
                        }
                    }

                    if ( ! $is_accidentally_all_pages && ! empty( $f1_items ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'footer-1',
                            'container'      => false,
                            'menu_class'     => 'bws-footer-nav',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ) );
                        $use_fallback_services = false;
                    }
                }

                if ( $use_fallback_services ) {
                    ?>
                    <ul class="bws-footer-nav">
                        <li><a href="<?php echo esc_url( home_url( '/services/semantic-seo/' ) ); ?>"><?php esc_html_e( 'Semantic SEO', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/technical-seo/' ) ); ?>"><?php esc_html_e( 'Technical SEO', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/local-seo/' ) ); ?>"><?php esc_html_e( 'Local SEO &amp; GBP', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/seo-audit/' ) ); ?>"><?php esc_html_e( 'SEO Audit', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/content-entity-seo/' ) ); ?>"><?php esc_html_e( 'Content &amp; Entity SEO', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/link-building/' ) ); ?>"><?php esc_html_e( 'Link Building', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/ecommerce-seo/' ) ); ?>"><?php esc_html_e( 'E-commerce SEO', 'bluewireseo' ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <!-- Industries Column -->
            <div class="bws-footer-col">
                <h4 class="bws-footer-col-title"><?php esc_html_e( 'Industries', 'bluewireseo' ); ?></h4>
                <?php
                $use_fallback_ind = true;
                if ( has_nav_menu( 'footer-2' ) ) {
                    $locations  = get_nav_menu_locations();
                    $f2_menu_id = isset( $locations['footer-2'] ) ? $locations['footer-2'] : 0;
                    $f2_items   = $f2_menu_id ? wp_get_nav_menu_items( $f2_menu_id ) : array();

                    $is_accidentally_all_pages = false;
                    if ( ! empty( $f2_items ) ) {
                        foreach ( $f2_items as $item ) {
                            $item_title = strtolower( trim( $item->title ?? '' ) );
                            if ( in_array( $item_title, array( 'home', 'privacy policy', 'terms of service', 'about' ), true ) ) {
                                $is_accidentally_all_pages = true;
                                break;
                            }
                        }
                    }

                    if ( ! $is_accidentally_all_pages && ! empty( $f2_items ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'footer-2',
                            'container'      => false,
                            'menu_class'     => 'bws-footer-nav',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ) );
                        $use_fallback_ind = false;
                    }
                }

                if ( $use_fallback_ind ) {
                    ?>
                    <ul class="bws-footer-nav">
                        <li><a href="<?php echo esc_url( home_url( '/industries/ooh-billboard/' ) ); ?>"><?php esc_html_e( 'OOH &amp; Billboard SEO', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/industries/multi-site-portfolio/' ) ); ?>"><?php esc_html_e( 'Multi-site &amp; Portfolio SEO', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/industries/b2b-service-business/' ) ); ?>"><?php esc_html_e( 'B2B Service Business SEO', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php esc_html_e( 'All Industries', 'bluewireseo' ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <!-- Company Column -->
            <div class="bws-footer-col">
                <h4 class="bws-footer-col-title"><?php esc_html_e( 'Company', 'bluewireseo' ); ?></h4>
                <?php
                $use_fallback_company = true;
                if ( has_nav_menu( 'footer-3' ) ) {
                    $locations  = get_nav_menu_locations();
                    $f3_menu_id = isset( $locations['footer-3'] ) ? $locations['footer-3'] : 0;
                    $f3_items   = $f3_menu_id ? wp_get_nav_menu_items( $f3_menu_id ) : array();

                    if ( ! empty( $f3_items ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'footer-3',
                            'container'      => false,
                            'menu_class'     => 'bws-footer-nav',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ) );
                        $use_fallback_company = false;
                    }
                }

                if ( $use_fallback_company ) {
                    ?>
                    <ul class="bws-footer-nav">
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/process/' ) ); ?>"><?php esc_html_e( 'Process Framework', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>"><?php esc_html_e( 'Case Studies', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>"><?php esc_html_e( 'Portfolio', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact', 'bluewireseo' ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <!-- Resources Column -->
            <div class="bws-footer-col">
                <h4 class="bws-footer-col-title"><?php esc_html_e( 'Resources', 'bluewireseo' ); ?></h4>
                <?php
                $use_fallback_res = true;
                if ( has_nav_menu( 'footer-4' ) ) {
                    $locations  = get_nav_menu_locations();
                    $f4_menu_id = isset( $locations['footer-4'] ) ? $locations['footer-4'] : 0;
                    $f4_items   = $f4_menu_id ? wp_get_nav_menu_items( $f4_menu_id ) : array();

                    if ( ! empty( $f4_items ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'footer-4',
                            'container'      => false,
                            'menu_class'     => 'bws-footer-nav',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ) );
                        $use_fallback_res = false;
                    }
                }

                if ( $use_fallback_res ) {
                    ?>
                    <ul class="bws-footer-nav">
                        <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog &amp; Insights', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( $audit_url ); ?>"><?php esc_html_e( 'Free 20-Point Audit', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'bluewireseo' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/bluewireseo.zip' ) ); ?>" download="bluewireseo.zip" style="color:#60A5FA; font-weight:600;"><?php esc_html_e( 'Download Theme ZIP', 'bluewireseo' ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

        </div><!-- .bws-footer-grid -->

        <!-- Footer Bottom -->
        <div class="bws-footer-bottom">
            <p class="bws-footer-copyright">
                <?php echo bluewireseo_get_copyright(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </p>
            <div class="bws-footer-legal">
                <?php
                if ( has_nav_menu( 'legal' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'legal',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ) );
                } else {
                    ?>
                    <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'bluewireseo' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'bluewireseo' ); ?></a>
                    <?php
                }
                ?>
            </div>
        </div>

    </div><!-- .bws-container -->
</footer>
