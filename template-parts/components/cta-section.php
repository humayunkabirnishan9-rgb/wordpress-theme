<?php
/**
 * CTA Section Component
 *
 * @package BlueWireSEO
 */

$audit_url = bluewireseo_get_audit_url();
$call_url  = bluewireseo_get_call_url();
?>
<section class="bws-cta-section">
    <div class="bws-container">
        <h2 class="bws-cta-title"><?php esc_html_e( 'Ready to see where your search visibility is leaking?', 'bluewireseo' ); ?></h2>
        <p class="bws-cta-text">
            <?php esc_html_e( 'Get a free 20-point SEO audit. Delivered within [PLACEHOLDER: 48-72 business hours].', 'bluewireseo' ); ?>
        </p>
        <div class="bws-cta-actions">
            <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary bws-btn-lg">
                <?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?>
            </a>
            <a href="<?php echo esc_url( $call_url ); ?>" class="bws-btn bws-btn-outline-white bws-btn-lg">
                <?php esc_html_e( 'Book a 30-min Call', 'bluewireseo' ); ?>
            </a>
        </div>
    </div>
</section>
