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
            <section class="bws-section" style="background:var(--bws-white); padding:4.5rem 0;">
                <div class="bws-container">
                    <div style="display:grid; grid-template-columns: 1.1fr 1.25fr; gap:4rem; align-items:center;">
                        <!-- Generous Founder Portrait & Credentials Card -->
                        <div>
                            <div style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); border-radius:var(--bws-radius-xl); padding:3.25rem 2.5rem; color:#FFFFFF; text-align:center; box-shadow:0 14px 35px rgba(15,27,61,0.22); border:1px solid rgba(255,255,255,0.1); position:relative; overflow:hidden;">
                                <div style="position:absolute; top:-60px; right:-60px; width:220px; height:220px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.3) 0%, transparent 70%); pointer-events:none;"></div>
                                
                                <?php
                                $founder_photo = get_theme_mod( 'bws_founder_photo', BLUEWIRESEO_URI . '/assets/images/humayun-kabir-nishan.svg' );
                                ?>
                                <div style="position:relative; width:190px; height:190px; margin:0 auto 1.75rem;">
                                    <div style="position:absolute; inset:-6px; border-radius:50%; background:linear-gradient(135deg, #60A5FA, #2563EB, #1D4ED8); opacity:0.85; filter:blur(4px);"></div>
                                    <img src="<?php echo esc_url( $founder_photo ); ?>" alt="<?php esc_attr_e( 'Humayun Kabir Nishan — Founder & Principal SEO Architect', 'bluewireseo' ); ?>" style="position:relative; width:100%; height:100%; object-fit:cover; border-radius:50%; border:4px solid #FFFFFF; background:#0F1B3D; display:block; box-shadow:0 8px 20px rgba(0,0,0,0.3);" />
                                    <span style="position:absolute; bottom:6px; right:6px; background:#10B981; width:22px; height:22px; border-radius:50%; border:3px solid #0F1B3D; display:inline-block;" title="<?php esc_attr_e( 'Active & Available for US Commercial Consultations', 'bluewireseo' ); ?>"></span>
                                </div>

                                <span style="background:rgba(37,99,235,0.3); color:#93C5FD; border:1px solid rgba(147,197,253,0.35); font-size:0.75rem; font-weight:800; letter-spacing:0.06em; text-transform:uppercase; padding:0.35rem 0.85rem; border-radius:9999px; display:inline-block; margin-bottom:0.85rem;">
                                    <?php esc_html_e( 'FOUNDER & PRINCIPAL ARCHITECT', 'bluewireseo' ); ?>
                                </span>

                                <h2 style="color:#FFFFFF; font-size:2rem; margin-bottom:0.35rem; font-weight:800; letter-spacing:-0.02em;">
                                    Humayun Kabir Nishan
                                </h2>
                                <p style="color:#60A5FA; font-size:1.0625rem; font-weight:700; margin-bottom:1.25rem;">
                                    <?php esc_html_e( 'Founder & Principal SEO Architect', 'bluewireseo' ); ?>
                                </p>

                                <p style="color:rgba(255,255,255,0.85); font-size:0.95rem; line-height:1.65; margin-bottom:1.75rem; max-width:420px; margin-left:auto; margin-right:auto;">
                                    <?php esc_html_e( 'Deep code-level search engineer specializing in semantic entity modeling, technical crawl remediation, and multi-market local search architectures for commercial US enterprises.', 'bluewireseo' ); ?>
                                </p>

                                <div style="display:flex; justify-content:center; gap:0.85rem; flex-wrap:wrap;">
                                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bws-btn bws-btn-primary bws-btn-sm" style="font-weight:700;">
                                        <?php esc_html_e( 'Consult With Nishan &rarr;', 'bluewireseo' ); ?>
                                    </a>
                                    <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="bws-btn bws-btn-outline-white bws-btn-sm">
                                        <?php esc_html_e( 'Inspect Client Proof', 'bluewireseo' ); ?>
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
