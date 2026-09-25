<?php
/**
 * Template Name: BlueWireSEO — Free SEO Audit Template
 * Template Post Type: page
 *
 * @package BlueWireSEO
 */

get_header();

$email = bluewireseo_get_email();
$phone = bluewireseo_get_phone();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();

        $elementor_data = get_post_meta( get_the_ID(), '_elementor_data', true );
        $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode && strlen( $elementor_data ) > 10 ) {
            the_content();
        } else {
            ?>
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <div style="max-width: 720px; text-align: center; margin: 0 auto;">
                        <p class="bws-eyebrow" style="color: #93C5FD;"><?php esc_html_e( 'FREE 20-POINT DIAGNOSTIC', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color: #FFFFFF; font-size: clamp(2.25rem, 5vw, 3.5rem); margin-bottom: 1.25rem;">
                            <?php esc_html_e( 'Uncover the silent leaks costing you organic revenue.', 'bluewireseo' ); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color: rgba(255,255,255,0.85); font-size: 1.125rem; line-height: 1.65; max-width: 600px; margin: 0 auto;">
                            <?php esc_html_e( 'A manual, forensic review of your website’s technical foundation, crawl efficiency, schema graphs, and topical entity authority. Delivered within 48-72 business hours.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section-sm" style="background: var(--bws-white);">
                <div class="bws-container">
                    <div class="bws-grid-2" style="gap: 3.5rem; align-items: start;">
                        <!-- What We Audit -->
                        <div>
                            <h2 style="font-size: 1.75rem; margin-bottom: 1rem;"><?php esc_html_e( 'What You Will Receive', 'bluewireseo' ); ?></h2>
                            <p style="color: var(--bws-text-secondary); font-size: 1rem; line-height: 1.65; margin-bottom: 2rem;">
                                <?php esc_html_e( 'We do not run an automated software scan that spits out generic errors. Every audit is conducted by senior technical SEOs inspecting how Google renders and indexes your commercial assets.', 'bluewireseo' ); ?>
                            </p>

                            <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-bottom: 2.5rem;">
                                <div style="display: flex; gap: 1rem;">
                                    <div style="color: var(--bws-primary); flex-shrink: 0; margin-top: 2px;">
                                        <?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <h4 style="font-size: 1.0625rem; margin-bottom: 0.25rem;"><?php esc_html_e( '1. Technical & Crawl Efficiency', 'bluewireseo' ); ?></h4>
                                        <p style="font-size: 0.875rem; color: var(--bws-text-secondary); line-height: 1.5; margin: 0;">
                                            <?php esc_html_e( 'Indexation bloat, crawl budget waste, redirect chains, canonical integrity, and Core Web Vitals diagnostics.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="display: flex; gap: 1rem;">
                                    <div style="color: var(--bws-primary); flex-shrink: 0; margin-top: 2px;">
                                        <?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <h4 style="font-size: 1.0625rem; margin-bottom: 0.25rem;"><?php esc_html_e( '2. Semantic & Entity Hierarchy', 'bluewireseo' ); ?></h4>
                                        <p style="font-size: 0.875rem; color: var(--bws-text-secondary); line-height: 1.5; margin: 0;">
                                            <?php esc_html_e( 'Topical clustering depth, schema graph validation (JSON-LD), internal link equity flow, and keyword cannibalization traps.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="display: flex; gap: 1rem;">
                                    <div style="color: var(--bws-primary); flex-shrink: 0; margin-top: 2px;">
                                        <?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <h4 style="font-size: 1.0625rem; margin-bottom: 0.25rem;"><?php esc_html_e( '3. High-Intent Commercial Capture', 'bluewireseo' ); ?></h4>
                                        <p style="font-size: 0.875rem; color: var(--bws-text-secondary); line-height: 1.5; margin: 0;">
                                            <?php esc_html_e( 'Identification of high-ticket buyer searches your competitors are winning while your domain remains invisible.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="display: flex; gap: 1rem;">
                                    <div style="color: var(--bws-primary); flex-shrink: 0; margin-top: 2px;">
                                        <?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <h4 style="font-size: 1.0625rem; margin-bottom: 0.25rem;"><?php esc_html_e( '4. Prioritized Executive Action Plan', 'bluewireseo' ); ?></h4>
                                        <p style="font-size: 0.875rem; color: var(--bws-text-secondary); line-height: 1.5; margin: 0;">
                                            <?php esc_html_e( 'A prioritized list of quick wins and high-impact structural fixes you or our team can implement immediately.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div style="padding: 1.25rem 1.5rem; background: var(--bws-light-bg); border-radius: var(--bws-radius-md); border-left: 4px solid var(--bws-primary);">
                                <div style="font-weight: 700; font-size: 0.9375rem; color: var(--bws-heading); margin-bottom: 0.25rem;"><?php esc_html_e( 'Strict Zero-Spam Commitment', 'bluewireseo' ); ?></div>
                                <p style="font-size: 0.875rem; color: var(--bws-text-secondary); margin: 0;">
                                    <?php esc_html_e( 'We do not employ aggressive sales reps. Your audit is delivered via private video & PDF summary without pressure.', 'bluewireseo' ); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Audit Request Form -->
                        <div class="bws-card" style="padding: 2.5rem; border: 1px solid var(--bws-border); border-radius: var(--bws-radius-lg); box-shadow: var(--bws-shadow-sm);">
                            <h3 style="font-size: 1.375rem; margin-bottom: 0.5rem;"><?php esc_html_e( 'Claim Your Free Audit', 'bluewireseo' ); ?></h3>
                            <p style="font-size: 0.875rem; color: var(--bws-text-muted); margin-bottom: 1.75rem;">
                                <?php esc_html_e( 'Delivered within 48-72 business hours to your inbox.', 'bluewireseo' ); ?>
                            </p>

                            <form action="" method="post" class="bws-audit-form" style="display: flex; flex-direction: column; gap: 1.25rem;">
                                <div>
                                    <label for="bws_audit_url_input" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Website URL to Audit *', 'bluewireseo' ); ?></label>
                                    <input type="url" id="bws_audit_url_input" name="audit_url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                    <div>
                                        <label for="bws_audit_name" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Your Name *', 'bluewireseo' ); ?></label>
                                        <input type="text" id="bws_audit_name" name="name" required placeholder="Jane Doe" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                    </div>
                                    <div>
                                        <label for="bws_audit_email" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                        <input type="email" id="bws_audit_email" name="email" required placeholder="jane@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                    </div>
                                </div>

                                <div>
                                    <label for="bws_audit_market" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Primary Market / Target US Cities', 'bluewireseo' ); ?></label>
                                    <input type="text" id="bws_audit_market" name="market" placeholder="e.g. Dallas, Atlanta, Nationwide" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div>
                                    <label for="bws_audit_competitor" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Main Competitor URL (Optional)', 'bluewireseo' ); ?></label>
                                    <input type="url" id="bws_audit_competitor" name="competitor" placeholder="https://competitor.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center;">
                                    <?php esc_html_e( 'Request Free Audit', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </button>

                                <p style="font-size:0.75rem; color:var(--bws-text-muted); text-align:center; margin:0;">
                                    <?php esc_html_e( 'Zero commitment. 100% confidential. No credit card required.', 'bluewireseo' ); ?>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
