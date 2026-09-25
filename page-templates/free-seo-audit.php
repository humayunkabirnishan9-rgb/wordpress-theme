<?php
/**
 * Template Name: BlueWireSEO — Free SEO Audit Template
 * Template Post Type: page, post, bws_portfolio, bws_case_study, bws_service, bws_industry
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

        if ( bluewireseo_is_elementor_active( get_the_ID() ) ) {
            echo '<div class="bws-elementor-container">';
            the_content();
            echo '</div>';
        } else {
            ?>
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <div style="max-width: 760px; text-align: center; margin: 0 auto;">
                        <p class="bws-eyebrow" style="color: #93C5FD;"><?php esc_html_e( 'FREE 20-POINT DIAGNOSTIC AUDIT', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color: #FFFFFF; font-size: clamp(2.25rem, 5vw, 3.5rem); margin-bottom: 1.25rem;">
                            <?php esc_html_e( 'Uncover the silent leaks costing you organic revenue.', 'bluewireseo' ); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color: rgba(255,255,255,0.85); font-size: 1.125rem; line-height: 1.65; max-width: 640px; margin: 0 auto;">
                            <?php esc_html_e( 'A manual, forensic review of your website’s technical foundation, crawl efficiency, schema graphs, and topical entity authority. Delivered within 48-72 business hours.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <div style="display:grid; grid-template-columns: 1fr 1.1fr; gap:3.5rem; align-items:flex-start;">
                        <!-- What You Get -->
                        <div>
                            <h2 style="font-size:1.75rem; margin-bottom:1.5rem;"><?php esc_html_e( 'What You Will Receive in 48h:', 'bluewireseo' ); ?></h2>

                            <div style="display:flex; flex-direction:column; gap:1.25rem;">
                                <div style="display:flex; gap:1rem; align-items:flex-start;">
                                    <div style="width:36px; height:36px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <h3 style="font-size:1.0625rem; margin-bottom:0.25rem;"><?php esc_html_e( 'Forensic Crawl & Indexation Diagnostic', 'bluewireseo' ); ?></h3>
                                        <p style="font-size:0.9rem; color:var(--bws-text-muted); line-height:1.5; margin:0;">
                                            <?php esc_html_e( 'Identification of redirect chains, 404 crawl waste, canonical conflicts, and robots.txt barriers preventing key pages from ranking.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="display:flex; gap:1rem; align-items:flex-start;">
                                    <div style="width:36px; height:36px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <h3 style="font-size:1.0625rem; margin-bottom:0.25rem;"><?php esc_html_e( 'Semantic & Entity Gap Analysis', 'bluewireseo' ); ?></h3>
                                        <p style="font-size:0.9rem; color:var(--bws-text-muted); line-height:1.5; margin:0;">
                                            <?php esc_html_e( 'How Google’s Knowledge Graph interprets your site versus your top 3 commercial competitors in your target cities.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="display:flex; gap:1rem; align-items:flex-start;">
                                    <div style="width:36px; height:36px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <h3 style="font-size:1.0625rem; margin-bottom:0.25rem;"><?php esc_html_e( 'Zero-Click High-Impression Query Targets', 'bluewireseo' ); ?></h3>
                                        <p style="font-size:0.9rem; color:var(--bws-text-muted); line-height:1.5; margin:0;">
                                            <?php esc_html_e( 'Low-hanging fruit keywords where your site already has search visibility but is failing to generate clicks.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="display:flex; gap:1rem; align-items:flex-start;">
                                    <div style="width:36px; height:36px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <h3 style="font-size:1.0625rem; margin-bottom:0.25rem;"><?php esc_html_e( 'Executive Action Plan', 'bluewireseo' ); ?></h3>
                                        <p style="font-size:0.9rem; color:var(--bws-text-muted); line-height:1.5; margin:0;">
                                            <?php esc_html_e( 'Clear, prioritized roadmap of what to fix first, with estimated ranking and pipeline impact.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Audit Form -->
                        <div class="bws-card" style="padding:2.5rem 2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); background:var(--bws-white); box-shadow:var(--bws-shadow-lg);">
                            <h3 style="font-size:1.375rem; margin-bottom:0.5rem;"><?php esc_html_e( 'Request Your Free SEO Audit', 'bluewireseo' ); ?></h3>
                            <p style="font-size:0.875rem; color:var(--bws-text-muted); margin-bottom:1.75rem;">
                                <?php esc_html_e( 'Delivered to your inbox by Humayun Kabir Nishan within 48-72 business hours.', 'bluewireseo' ); ?>
                            </p>

                            <form action="<?php echo esc_url( home_url( '/contact/' ) ); ?>" method="get" style="display:flex; flex-direction:column; gap:1.25rem;">
                                <div>
                                    <label for="bws_audit_url" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Website URL *', 'bluewireseo' ); ?></label>
                                    <input type="url" id="bws_audit_url" name="site_url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div>
                                    <label for="bws_audit_name" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Your Name *', 'bluewireseo' ); ?></label>
                                    <input type="text" id="bws_audit_name" name="name" required placeholder="Jane Smith" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div>
                                    <label for="bws_audit_email" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                    <input type="email" id="bws_audit_email" name="email" required placeholder="jane@yourcompany.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div>
                                    <label for="bws_audit_market" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Target Geographic Markets or Cities', 'bluewireseo' ); ?></label>
                                    <input type="text" id="bws_audit_market" name="market" placeholder="e.g. Dallas, Atlanta, Nationwide" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div>
                                    <label for="bws_audit_competitor" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Main Competitor URL (Optional)', 'bluewireseo' ); ?></label>
                                    <input type="url" id="bws_audit_competitor" name="competitor" placeholder="https://competitor.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem;">
                                    <span><?php esc_html_e( 'Request Free Audit', 'bluewireseo' ); ?></span>
                                    <span style="display:inline-flex; width:18px; height:18px; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </span>
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
            echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
            the_content();
            echo '</div>';
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
