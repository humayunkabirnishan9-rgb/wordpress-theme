<?php
/**
 * WhatsApp Floating Button
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Output WhatsApp floating button
 */
function bluewireseo_whatsapp_button() {
    $show = get_theme_mod( 'bws_whatsapp_show', true );
    if ( ! $show ) {
        return;
    }

    $number  = get_theme_mod( 'bws_whatsapp_number', '' );
    $message = get_theme_mod( 'bws_whatsapp_message', 'Hello, I would like to learn more about BlueWireSEO.' );

    if ( empty( $number ) ) {
        return;
    }

    $clean_number = preg_replace( '/[^0-9]/', '', $number );

    if ( empty( $clean_number ) ) {
        return;
    }

    $url = 'https://wa.me/' . $clean_number . '?text=' . rawurlencode( $message );

    ?>
    <a
        href="<?php echo esc_url( $url ); ?>"
        class="bws-whatsapp"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="<?php esc_attr_e( 'Chat on WhatsApp', 'bluewireseo' ); ?>"
        title="<?php esc_attr_e( 'Chat on WhatsApp', 'bluewireseo' ); ?>"
    >
        <?php echo bluewireseo_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
    </a>
    <?php
}
add_action( 'wp_footer', 'bluewireseo_whatsapp_button', 100 );
