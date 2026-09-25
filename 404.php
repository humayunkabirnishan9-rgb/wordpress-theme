<?php
/**
 * 404 Page Template
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <div class="bws-404">
        <div class="bws-container" style="text-align:center;">
            <div class="bws-404-code">404</div>
            <h1 style="font-size:clamp(1.75rem,4vw,2.75rem);margin-bottom:1rem;"><?php esc_html_e( 'Page not found', 'bluewireseo' ); ?></h1>
            <p style="color:var(--bws-text-muted);font-size:1.0625rem;max-width:480px;margin:0 auto 2rem;">
                <?php esc_html_e( 'The page you are looking for does not exist or has been moved. Let us help you find what you need.', 'bluewireseo' ); ?>
            </p>
            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bws-btn bws-btn-primary bws-btn-lg">
                    <?php esc_html_e( 'Go to Homepage', 'bluewireseo' ); ?>
                </a>
                <a href="<?php echo esc_url( bluewireseo_get_audit_url() ); ?>" class="bws-btn bws-btn-outline bws-btn-lg">
                    <?php esc_html_e( 'Get Free SEO Audit', 'bluewireseo' ); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
