<?php
/**
 * Top Bar Template Part
 *
 * @package BlueWireSEO
 */

$topbar_cta_text = get_theme_mod( 'bws_topbar_cta_text', 'Free SEO audit for OOH and billboard companies' );
$topbar_cta_url  = get_theme_mod( 'bws_topbar_cta_url', '#free-audit' );
$email           = bluewireseo_get_email();
$phone           = bluewireseo_get_phone();
?>
<div class="bws-topbar" role="banner">
    <div class="bws-container bws-topbar-inner">
        <a href="<?php echo esc_url( $topbar_cta_url ); ?>" class="bws-topbar-cta">
            <?php echo esc_html( $topbar_cta_text ); ?>
            <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
        </a>

        <div class="bws-topbar-contact">
            <?php if ( $email && strpos( $email, '[PLACEHOLDER' ) === false ) : ?>
                <a href="mailto:<?php echo esc_attr( $email ); ?>">
                    <?php echo bluewireseo_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <span><?php echo esc_html( $email ); ?></span>
                </a>
            <?php else : ?>
                <span style="color:rgba(255,255,255,0.6);font-size:0.8rem;">
                    <?php echo bluewireseo_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <span><?php echo esc_html( $email ); ?></span>
                </span>
            <?php endif; ?>

            <?php if ( $phone && strpos( $phone, '[PLACEHOLDER' ) === false ) : ?>
                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>">
                    <?php echo bluewireseo_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <span><?php echo esc_html( $phone ); ?></span>
                </a>
            <?php else : ?>
                <span style="color:rgba(255,255,255,0.6);font-size:0.8rem;">
                    <?php echo bluewireseo_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <span><?php echo esc_html( $phone ); ?></span>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>
