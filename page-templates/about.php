<?php
/**
 * Template Name: BlueWireSEO — About Page Template
 * Template Post Type: page, post, bws_portfolio, bws_case_study, bws_service, bws_industry
 *
 * @package BlueWireSEO
 */

get_header();

$audit_url   = bluewireseo_get_audit_url();
$call_url    = bluewireseo_get_call_url();
$email       = bluewireseo_get_email();
$phone       = bluewireseo_get_phone();
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
            <!-- Hero -->
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width: 760px; margin-top: 1.25rem;">
                        <p class="bws-eyebrow" style="color: #93C5FD;"><?php esc_html_e( 'ABOUT BLUEWIRESEO', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php esc_html_e( 'Engineering organic search into a predictable commercial pipeline.', 'bluewireseo' ); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'BlueWireSEO was founded by Humayun Kabir Nishan to provide technical precision, semantic topical dominance, and zero-bullshit data citations for commercial US businesses.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Meet The Strategist Section -->
            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <div style="display:grid; grid-template-columns: 1fr 1.25fr; gap:3.5rem; align-items:center;">
                        <div>
                            <div style="background:linear-gradient(135deg, #0F1B3D 0%, #1E2D5A 100%); border-radius:var(--bws-radius-lg); padding:3rem 2.5rem; color:#FFFFFF; text-align:center; box-shadow:var(--bws-shadow-lg);">
                                <div style="width:110px; height:110px; border-radius:50%; background:rgba(37,99,235,0.25); border:3px solid #60A5FA; display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem; font-size:2.5rem; font-weight:800; color:#60A5FA;">
                                    HKN
                                </div>
                                <h2 style="color:#FFFFFF; font-size:1.75rem; margin-bottom:0.35rem;">Humayun Kabir Nishan</h2>
                                <p style="color:#93C5FD; font-size:1rem; font-weight:600; margin-bottom:1.25rem;"><?php esc_html_e( 'Lead SEO Strategist & Technical Architect', 'bluewireseo' ); ?></p>
                                <p style="color:rgba(255,255,255,0.8); font-size:0.9rem; line-height:1.6; margin-bottom:1.75rem;">
                                    <?php esc_html_e( 'Specializing in Technical, Semantic, and Local SEO for US-based OOH, airport assistance, automotive, and B2B clients.', 'bluewireseo' ); ?>
                                </p>
                                <div style="display:flex; justify-content:center; gap:0.75rem; flex-wrap:wrap;">
                                    <a href="mailto:<?php echo esc_attr( $email ); ?>" class="bws-btn bws-btn-primary bws-btn-sm">
                                        <?php esc_html_e( 'Email Nishan', 'bluewireseo' ); ?>
                                    </a>
                                    <a href="<?php echo esc_url( 'https://linkedin.com/in/humayun-kabir-nishan' ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-outline" style="border-color:rgba(255,255,255,0.4); color:#FFFFFF;">
                                        <?php esc_html_e( 'LinkedIn Profile', 'bluewireseo' ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="bws-eyebrow"><?php esc_html_e( 'TRACK RECORD & PHILOSOPHY', 'bluewireseo' ); ?></p>
                            <h2 style="font-size:clamp(1.75rem,3.5vw,2.5rem); margin-bottom:1.25rem;">
                                <?php esc_html_e( 'Why US businesses partner with BlueWireSEO.', 'bluewireseo' ); ?>
                            </h2>
                            <p style="font-size:1.0625rem; color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.5rem;">
                                <?php esc_html_e( 'Most digital agencies lock clients into opaque 12-month retainers, delivering vanity graphs of unranking keywords. At BlueWireSEO, we focus on technical integrity and commercial search intent that directly drives inbound RFPs, booked services, and phone inquiries.', 'bluewireseo' ); ?>
                            </p>

                            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:1.5rem; margin:2rem 0;">
                                <div style="padding:1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); border-left:4px solid var(--bws-primary);">
                                    <div style="font-size:1.75rem; font-weight:800; color:var(--bws-primary); margin-bottom:0.25rem;">56x</div>
                                    <div style="font-size:0.875rem; color:var(--bws-text-muted);"><?php esc_html_e( 'Click Growth in 28 Days (GlobalAir)', 'bluewireseo' ); ?></div>
                                </div>
                                <div style="padding:1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); border-left:4px solid var(--bws-primary);">
                                    <div style="font-size:1.75rem; font-weight:800; color:var(--bws-primary); margin-bottom:0.25rem;">656K+</div>
                                    <div style="font-size:0.875rem; color:var(--bws-text-muted);"><?php esc_html_e( 'Sustained Impressions (Trailhead Media)', 'bluewireseo' ); ?></div>
                                </div>
                                <div style="padding:1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); border-left:4px solid var(--bws-primary);">
                                    <div style="font-size:1.75rem; font-weight:800; color:var(--bws-primary); margin-bottom:0.25rem;">76+</div>
                                    <div style="font-size:0.875rem; color:var(--bws-text-muted);"><?php esc_html_e( 'Citations across ChatGPT & AI Overviews', 'bluewireseo' ); ?></div>
                                </div>
                                <div style="padding:1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); border-left:4px solid var(--bws-primary);">
                                    <div style="font-size:1.75rem; font-weight:800; color:var(--bws-primary); margin-bottom:0.25rem;">100%</div>
                                    <div style="font-size:0.875rem; color:var(--bws-text-muted);"><?php esc_html_e( 'White-Hat Google Compliant', 'bluewireseo' ); ?></div>
                                </div>
                            </div>

                            <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap; margin-top:2rem;">
                                <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary">
                                    <?php esc_html_e( 'Claim Free Audit', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </a>
                                <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="bws-btn bws-btn-outline">
                                    <?php esc_html_e( 'View Real Case Studies', 'bluewireseo' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>

            <?php
            echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
            the_content();
            echo '</div>';
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
