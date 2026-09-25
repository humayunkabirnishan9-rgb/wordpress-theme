<?php
/**
 * Theme Helper Functions
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Check if Elementor visual editor or preview mode is currently active
 */
function bluewireseo_is_elementor_active( $post_id = 0 ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    if ( did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) ) {
        if ( isset( \Elementor\Plugin::$instance->editor ) && \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
            return true;
        }
        if ( isset( \Elementor\Plugin::$instance->preview ) && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
            return true;
        }
    }

    if ( isset( $_GET['elementor-preview'] ) || ( isset( $_GET['action'] ) && 'elementor' === $_GET['action'] ) ) {
        return true;
    }

    if ( $post_id ) {
        $edit_mode = get_post_meta( $post_id, '_elementor_edit_mode', true );
        $elem_data = get_post_meta( $post_id, '_elementor_data', true );
        if ( 'builder' === $edit_mode && ! empty( $elem_data ) && strlen( $elem_data ) > 10 ) {
            return true;
        }
    }

    return false;
}

/**
 * Get the BlueWireSEO logo
 */
function bluewireseo_logo( $class = 'bws-logo', $height = '36' ) {
    $custom_logo_id = get_theme_mod( 'custom_logo' );

    if ( $custom_logo_id ) {
        $logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
        $logo_alt = get_bloginfo( 'name' );
        return sprintf(
            '<a href="%s" class="%s" rel="home" aria-label="%s"><img src="%s" alt="%s" height="%s" loading="eager" decoding="async" /></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( $class ),
            esc_attr( $logo_alt ),
            esc_url( $logo_url ),
            esc_attr( $logo_alt ),
            esc_attr( $height )
        );
    }

    // Try theme asset logo (SVG first, then PNG)
    $logo_svg_path = BLUEWIRESEO_DIR . '/assets/images/logo.svg';
    $logo_svg_uri  = BLUEWIRESEO_URI . '/assets/images/logo.svg';
    $logo_path     = BLUEWIRESEO_DIR . '/assets/images/logo.png';
    $logo_uri      = BLUEWIRESEO_URI . '/assets/images/logo.png';

    if ( file_exists( $logo_svg_path ) ) {
        return sprintf(
            '<a href="%s" class="%s" rel="home" aria-label="%s"><img src="%s" alt="%s" height="%s" loading="eager" decoding="async" /></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( $class ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_svg_uri ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_attr( $height )
        );
    }

    if ( file_exists( $logo_path ) ) {
        return sprintf(
            '<a href="%s" class="%s" rel="home" aria-label="%s"><img src="%s" alt="%s" height="%s" loading="eager" decoding="async" /></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( $class ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_uri ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_attr( $height )
        );
    }

    // Text fallback — NO CSS-drawn logo
    return sprintf(
        '<a href="%s" class="%s" rel="home"><span class="bws-logo-text">%s</span></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( $class ),
        esc_html( get_bloginfo( 'name' ) )
    );
}

/**
 * Get the BlueWireSEO footer logo
 */
function bluewireseo_footer_logo() {
    // Check if user uploaded a dedicated footer logo
    $footer_logo_id = get_theme_mod( 'bws_footer_logo' );
    if ( $footer_logo_id ) {
        $logo_url = wp_get_attachment_image_url( $footer_logo_id, 'full' );
        if ( $logo_url ) {
            return sprintf(
                '<a href="%s" rel="home" class="bws-footer-logo-link"><img src="%s" alt="%s" height="38" style="max-height:42px;width:auto;display:block;" loading="lazy" decoding="async" /></a>',
                esc_url( home_url( '/' ) ),
                esc_url( $logo_url ),
                esc_attr( get_bloginfo( 'name' ) )
            );
        }
    }

    // Check Site Identity custom logo
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
        $logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
        $logo_alt = get_bloginfo( 'name' );
        return sprintf(
            '<a href="%s" rel="home" class="bws-footer-logo-link bws-custom-logo-wrap" style="display:inline-flex; align-items:center; background:#FFFFFF; padding:6px 14px; border-radius:8px; max-width:240px; box-shadow:0 2px 10px rgba(0,0,0,0.18);"><img src="%s" alt="%s" height="34" class="bws-custom-logo-img" style="max-height:34px;width:auto;display:block;" loading="lazy" decoding="async" /></a>',
            esc_url( home_url( '/' ) ),
            esc_url( $logo_url ),
            esc_attr( $logo_alt )
        );
    }

    $logo_white_svg = BLUEWIRESEO_DIR . '/assets/images/logo-white.svg';
    $logo_white_uri = BLUEWIRESEO_URI . '/assets/images/logo-white.svg';
    $logo_path      = BLUEWIRESEO_DIR . '/assets/images/logo.png';
    $logo_uri       = BLUEWIRESEO_URI . '/assets/images/logo.png';

    if ( file_exists( $logo_white_svg ) ) {
        return sprintf(
            '<a href="%s" rel="home" class="bws-footer-logo-link"><img src="%s" alt="%s" height="34" class="bws-default-white" style="max-height:36px;width:auto;display:block;" loading="lazy" decoding="async" /></a>',
            esc_url( home_url( '/' ) ),
            esc_url( $logo_white_uri ),
            esc_attr( get_bloginfo( 'name' ) )
        );
    }

    if ( file_exists( $logo_path ) ) {
        return sprintf(
            '<a href="%s" rel="home" class="bws-footer-logo-link"><img src="%s" alt="%s" height="34" class="bws-default-white" style="max-height:36px;width:auto;display:block;" loading="lazy" decoding="async" /></a>',
            esc_url( home_url( '/' ) ),
            esc_url( $logo_uri ),
            esc_attr( get_bloginfo( 'name' ) )
        );
    }

    // Text fallback
    return sprintf(
        '<a href="%s" rel="home" class="bws-footer-logo-link bws-footer-logo-text">%s</a>',
        esc_url( home_url( '/' ) ),
        esc_html( get_bloginfo( 'name' ) )
    );
}

/**
 * Get contact email
 */
function bluewireseo_get_email() {
    $email = get_theme_mod( 'bws_email', '' );
    return $email ? $email : 'nishan@bluewireseo.com';
}

/**
 * Get contact phone
 */
function bluewireseo_get_phone() {
    $phone = get_theme_mod( 'bws_phone', '' );
    return $phone ? $phone : '+8801927497396';
}

/**
 * Get CTA URL (audit)
 */
function bluewireseo_get_audit_url() {
    return esc_url( get_theme_mod( 'bws_audit_url', '/free-seo-audit/' ) );
}

/**
 * Get CTA URL (call)
 */
function bluewireseo_get_call_url() {
    return esc_url( get_theme_mod( 'bws_call_url', '/contact/' ) );
}

/**
 * Get contact URL
 */
function bluewireseo_get_contact_url() {
    return esc_url( get_theme_mod( 'bws_contact_url', '/contact/' ) );
}

/**
 * Breadcrumb function
 */
function bluewireseo_breadcrumb() {
    $home_text = __( 'Home', 'bluewireseo' );
    $separator = '<span class="separator" aria-hidden="true">&rsaquo;</span>';

    $breadcrumb = '<nav class="bws-breadcrumb" aria-label="' . esc_attr__( 'Breadcrumb', 'bluewireseo' ) . '">';
    $breadcrumb .= '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( $home_text ) . '</a>';

    if ( is_singular() ) {
        $post_type = get_post_type();

        if ( 'bws_service' === $post_type ) {
            $breadcrumb .= $separator;
            $breadcrumb .= '<a href="' . esc_url( home_url( '/services/' ) ) . '">' . __( 'Services', 'bluewireseo' ) . '</a>';
        } elseif ( 'bws_case_study' === $post_type ) {
            $breadcrumb .= $separator;
            $breadcrumb .= '<a href="' . esc_url( home_url( '/case-studies/' ) ) . '">' . __( 'Case Studies', 'bluewireseo' ) . '</a>';
        } elseif ( 'bws_industry' === $post_type ) {
            $breadcrumb .= $separator;
            $breadcrumb .= '<a href="' . esc_url( home_url( '/industries/' ) ) . '">' . __( 'Industries', 'bluewireseo' ) . '</a>';
        } elseif ( 'bws_portfolio' === $post_type ) {
            $breadcrumb .= $separator;
            $breadcrumb .= '<a href="' . esc_url( home_url( '/portfolio/' ) ) . '">' . __( 'Portfolio', 'bluewireseo' ) . '</a>';
        } elseif ( 'post' === $post_type ) {
            $breadcrumb .= $separator;
            $breadcrumb .= '<a href="' . esc_url( home_url( '/blog/' ) ) . '">' . __( 'Blog', 'bluewireseo' ) . '</a>';
        }

        $breadcrumb .= $separator;
        $breadcrumb .= '<span class="current">' . esc_html( get_the_title() ) . '</span>';

    } elseif ( is_post_type_archive( 'bws_service' ) ) {
        $breadcrumb .= $separator . '<span class="current">' . __( 'Services', 'bluewireseo' ) . '</span>';
    } elseif ( is_post_type_archive( 'bws_case_study' ) ) {
        $breadcrumb .= $separator . '<span class="current">' . __( 'Case Studies', 'bluewireseo' ) . '</span>';
    } elseif ( is_post_type_archive( 'bws_industry' ) ) {
        $breadcrumb .= $separator . '<span class="current">' . __( 'Industries', 'bluewireseo' ) . '</span>';
    } elseif ( is_post_type_archive( 'bws_portfolio' ) ) {
        $breadcrumb .= $separator . '<span class="current">' . __( 'Portfolio', 'bluewireseo' ) . '</span>';
    } elseif ( is_home() || is_archive() ) {
        $breadcrumb .= $separator . '<span class="current">' . __( 'Blog', 'bluewireseo' ) . '</span>';
    } elseif ( is_page() ) {
        $post    = get_post();
        $parents = get_ancestors( $post->ID, 'page' );
        if ( $parents ) {
            foreach ( array_reverse( $parents ) as $parent_id ) {
                $breadcrumb .= $separator;
                $breadcrumb .= '<a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . esc_html( get_the_title( $parent_id ) ) . '</a>';
            }
        }
        $breadcrumb .= $separator . '<span class="current">' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_search() ) {
        $breadcrumb .= $separator . '<span class="current">' . __( 'Search Results', 'bluewireseo' ) . '</span>';
    } elseif ( is_404() ) {
        $breadcrumb .= $separator . '<span class="current">' . __( 'Page Not Found', 'bluewireseo' ) . '</span>';
    }

    $breadcrumb .= '</nav>';
    return $breadcrumb;
}

/**
 * SVG Icons helper
 */
function bluewireseo_icon( $icon, $class = '', $size = 20 ) {
    $icons = array(
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="max-width:22px;max-height:22px;display:inline-block;vertical-align:middle;flex-shrink:0;"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'x'     => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:22px;max-height:22px;display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        'arrow-up-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>',
        'chevron-down' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:18px;max-height:18px;display:inline-block;vertical-align:middle;flex-shrink:0;"><polyline points="6 9 12 15 18 9"></polyline></svg>',
        'plus' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:22px;max-height:22px;display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>',
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.61 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'menu' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:24px;max-height:24px;display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>',
        'close' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:24px;max-height:24px;display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
        'search' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        'star' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="max-width:18px;max-height:18px;display:inline-block;vertical-align:middle;flex-shrink:0;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>',
        'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
        'globe' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
        'whatsapp' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" style="max-width:24px;max-height:24px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>',
        'external-link' => '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:16px;max-height:16px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>',
        'bar-chart' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:24px;max-height:24px;display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>',
        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:24px;max-height:24px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
        'target' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:24px;max-height:24px;display:inline-block;vertical-align:middle;flex-shrink:0;"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
        'trending-up' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:24px;max-height:24px;display:inline-block;vertical-align:middle;flex-shrink:0;"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>',
        'users' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:22px;max-height:22px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
        'layers' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:22px;max-height:22px;display:inline-block;vertical-align:middle;flex-shrink:0;"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>',
        'settings' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:24px;max-height:24px;display:inline-block;vertical-align:middle;flex-shrink:0;"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
        'file-text' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="max-width:20px;max-height:20px;display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
    );

    $svg = isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';

    if ( $class ) {
        $svg = str_replace( '<svg', '<svg class="' . esc_attr( $class ) . '"', $svg );
    }

    return $svg;
}

/**
 * Get copyright text
 */
function bluewireseo_get_copyright() {
    $custom = get_theme_mod( 'bws_copyright', '' );
    if ( $custom ) {
        return esc_html( $custom );
    }
    return '&copy; ' . date( 'Y' ) . ' bluewireseo. All rights reserved.';
}

/**
 * Get footer description
 */
function bluewireseo_get_footer_desc() {
    return get_theme_mod( 'bws_footer_desc', 'Semantic SEO and technical SEO agency serving US businesses. Bangladesh (remote-first, serving US businesses).' );
}

/**
 * Case study card output
 */
function bluewireseo_case_study_card( $post_id ) {
    $title        = get_the_title( $post_id );
    $permalink    = get_permalink( $post_id );
    $excerpt      = get_the_excerpt( $post_id );
    $result       = get_post_meta( $post_id, '_bws_result_metric', true );
    $data_source  = get_post_meta( $post_id, '_bws_data_source', true );
    $services     = get_post_meta( $post_id, '_bws_services_used', true );
    $industry_val = get_post_meta( $post_id, '_bws_industry', true );

    $categories  = get_the_terms( $post_id, 'bws_case_category' );
    $cat_name    = ( $categories && ! is_wp_error( $categories ) ) ? $categories[0]->name : ( $industry_val ?: '' );

    $tag_class = '';
    if ( stripos( $cat_name, 'OOH' ) !== false ) {
        $tag_class = 'tag-ooh';
    } elseif ( stripos( $cat_name, 'B2B' ) !== false ) {
        $tag_class = 'tag-b2b';
    } elseif ( stripos( $cat_name, 'Multi' ) !== false ) {
        $tag_class = 'tag-multisite';
    }

    ob_start();
    ?>
    <article class="bws-case-card">
        <div class="bws-case-card-tags">
            <?php if ( $cat_name ) : ?>
                <span class="bws-card-tag <?php echo esc_attr( $tag_class ); ?>"><?php echo esc_html( $cat_name ); ?></span>
            <?php endif; ?>
            <?php if ( $services ) : ?>
                <span class="bws-card-tag" style="background:var(--bws-light-bg);color:var(--bws-text-muted);"><?php echo esc_html( $services ); ?></span>
            <?php endif; ?>
        </div>

        <?php if ( $result ) : ?>
            <h3 class="bws-case-card-title"><?php echo esc_html( $result ); ?></h3>
        <?php else : ?>
            <h3 class="bws-case-card-title"><?php echo esc_html( $title ); ?></h3>
        <?php endif; ?>

        <p class="bws-case-card-subtitle"><?php echo esc_html( $title ); ?></p>

        <?php if ( $excerpt ) : ?>
            <p class="bws-case-card-desc"><?php echo esc_html( $excerpt ); ?></p>
        <?php endif; ?>

        <?php if ( $data_source ) : ?>
            <div class="bws-case-card-source">
                <?php echo bluewireseo_icon( 'external-link' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                <span><?php echo esc_html( $data_source ); ?></span>
            </div>
        <?php endif; ?>

        <a href="<?php echo esc_url( $permalink ); ?>" class="bws-case-card-cta">
            <?php esc_html_e( 'Read case study', 'bluewireseo' ); ?>
            <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
        </a>
    </article>
    <?php
    return ob_get_clean();
}

/**
 * Portfolio card output
 */
function bluewireseo_portfolio_card( $post_id ) {
    $title        = get_the_title( $post_id );
    $permalink    = get_permalink( $post_id );
    $excerpt      = get_the_excerpt( $post_id );
    $client       = get_post_meta( $post_id, '_bws_client', true );
    $industry     = get_post_meta( $post_id, '_bws_industry', true );
    $services     = get_post_meta( $post_id, '_bws_services_used', true );
    $result       = get_post_meta( $post_id, '_bws_result_metric', true );
    $external_url = get_post_meta( $post_id, '_bws_external_url', true );
    $categories   = get_the_terms( $post_id, 'bws_portfolio_category' );
    $cat_name     = ( $categories && ! is_wp_error( $categories ) ) ? $categories[0]->name : $industry;

    ob_start();
    ?>
    <article class="bws-case-card bws-portfolio-card">
        <?php if ( has_post_thumbnail( $post_id ) ) : ?>
            <div style="margin:-1.75rem -1.75rem 1.25rem;border-radius:var(--bws-radius-lg) var(--bws-radius-lg) 0 0;overflow:hidden;height:180px;">
                <a href="<?php echo esc_url( $permalink ); ?>">
                    <?php echo get_the_post_thumbnail( $post_id, 'bws-card', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="bws-case-card-tags">
            <?php if ( $cat_name ) : ?>
                <span class="bws-card-tag tag-b2b"><?php echo esc_html( $cat_name ); ?></span>
            <?php endif; ?>
            <?php if ( $services ) : ?>
                <span class="bws-card-tag" style="background:var(--bws-light-bg);color:var(--bws-text-muted);"><?php echo esc_html( $services ); ?></span>
            <?php endif; ?>
        </div>

        <h3 class="bws-case-card-title">
            <a href="<?php echo esc_url( $permalink ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( $title ); ?></a>
        </h3>

        <?php if ( $client ) : ?>
            <p class="bws-case-card-subtitle"><?php echo esc_html( sprintf( __( 'Client: %s', 'bluewireseo' ), $client ) ); ?></p>
        <?php endif; ?>

        <?php if ( $excerpt ) : ?>
            <p class="bws-case-card-desc"><?php echo esc_html( $excerpt ); ?></p>
        <?php endif; ?>

        <?php if ( $result ) : ?>
            <div style="margin-bottom:1rem;padding:0.5rem 0.75rem;background:var(--bws-primary-light);border-radius:var(--bws-radius-sm);font-size:0.875rem;color:var(--bws-primary-dark);font-weight:600;">
                <?php echo esc_html( $result ); ?>
            </div>
        <?php endif; ?>

        <div style="display:flex;gap:0.75rem;align-items:center;flex-wrap:wrap;margin-top:auto;">
            <a href="<?php echo esc_url( $permalink ); ?>" class="bws-link-arrow" style="font-weight:600;">
                <?php esc_html_e( 'View Details', 'bluewireseo' ); ?>
                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </a>
            <?php if ( $external_url ) : ?>
                <a href="<?php echo esc_url( $external_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-link-arrow" style="font-size:0.85rem;color:var(--bws-text-muted);">
                    <?php esc_html_e( 'Visit Site', 'bluewireseo' ); ?>
                    <?php echo bluewireseo_icon( 'external-link' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </a>
            <?php endif; ?>
        </div>
    </article>
    <?php
    return ob_get_clean();
}

