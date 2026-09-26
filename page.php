<?php
/**
 * Standard Page Template
 * BlueWireSEO — High-Converting Production Page Layout with Dynamic Hero & Proof Integration
 *
 * @package BlueWireSEO
 */

get_header();

$audit_url   = bluewireseo_get_audit_url();
$contact_url = bluewireseo_get_contact_url();
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
            $custom_title = get_post_meta( get_the_ID(), '_bws_custom_hero_title', true );
            $title        = ! empty( $custom_title ) ? $custom_title : get_the_title();
            $subtitle     = get_post_meta( get_the_ID(), '_bws_hero_subtitle', true );
            $eyebrow      = get_post_meta( get_the_ID(), '_bws_hero_eyebrow', true );
            $gsc_image    = get_post_meta( get_the_ID(), '_bws_gsc_image', true );
            $pdf_url      = get_post_meta( get_the_ID(), '_bws_pdf_url', true );
            $hide_hero    = get_post_meta( get_the_ID(), '_bws_hide_hero', true );

            // Check if page slug / title matches core sections for intent-based eyebrow defaults
            $slug = get_post_field( 'post_name', get_the_ID() );
            if ( empty( $eyebrow ) ) {
                if ( stripos( $slug, 'service' ) !== false || stripos( $title, 'service' ) !== false ) {
                    $eyebrow = __( 'CORE ARCHITECTURAL SERVICES', 'bluewireseo' );
                } elseif ( stripos( $slug, 'case' ) !== false || stripos( $title, 'case' ) !== false ) {
                    $eyebrow = __( 'VERIFIED CLIENT OUTCOMES', 'bluewireseo' );
                } elseif ( stripos( $slug, 'port' ) !== false || stripos( $title, 'port' ) !== false ) {
                    $eyebrow = __( 'PORTFOLIO & TECHNICAL DELIVERABLES', 'bluewireseo' );
                } elseif ( stripos( $slug, 'audit' ) !== false || stripos( $title, 'audit' ) !== false ) {
                    $eyebrow = __( 'CONFIDENTIAL DIAGNOSTIC', 'bluewireseo' );
                } else {
                    $eyebrow = __( 'BLUEWIRESEO SPECIALIST CONSULTING', 'bluewireseo' );
                }
            }

            // Render Hero Banner unless user explicitly checked "Hide Default Template Hero"
            if ( '1' !== $hide_hero ) :
                ?>
                <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem; position:relative; overflow:hidden;">
                    <div style="position:absolute; top:-80px; right:-80px; width:450px; height:450px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.2) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>
                    <div class="bws-container" style="position:relative; z-index:2;">
                        <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        <div style="max-width:820px; margin-top:1.25rem;">
                            <?php if ( ! empty( $eyebrow ) ) : ?>
                                <p class="bws-eyebrow" style="color:#93C5FD; margin-bottom:0.75rem;"><?php echo esc_html( $eyebrow ); ?></p>
                            <?php endif; ?>
                            <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin-bottom:1rem;">
                                <?php echo esc_html( $title ); ?>
                            </h1>
                            <?php if ( ! empty( $subtitle ) ) : ?>
                                <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.88); font-size:1.125rem; line-height:1.65; margin:0;">
                                    <?php echo esc_html( $subtitle ); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            ?>

            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <div style="max-width:920px; margin:0 auto;">

                        <!-- Search Console Proof Showcase (If Uploaded) -->
                        <?php if ( ! empty( $gsc_image ) ) : ?>
                            <div class="bws-gsc-proof-showcase" style="margin-bottom:3rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); overflow:hidden; background:var(--bws-white); box-shadow:var(--bws-shadow-md);">
                                <div style="background:#0F1B3D; color:#FFFFFF; padding:0.85rem 1.5rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                                    <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; font-weight:700;">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:#60A5FA; width:18px; height:18px; flex-shrink:0;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                                        <span><?php esc_html_e( 'Official Google Search Console Proof & Analytics Data', 'bluewireseo' ); ?></span>
                                    </div>
                                    <span style="font-size:0.75rem; background:rgba(37,99,235,0.4); padding:0.25rem 0.6rem; border-radius:4px; color:#93C5FD; font-weight:600;">
                                        <?php esc_html_e( 'VERIFIED AUDIT DATA', 'bluewireseo' ); ?>
                                    </span>
                                </div>
                                <div style="padding:1.5rem; background:#F8FAFC; text-align:center;">
                                    <img src="<?php echo esc_url( $gsc_image ); ?>" alt="<?php echo esc_attr( $title ); ?> Search Console Proof" style="width:100%; height:auto; border-radius:8px; border:1px solid #CBD5E1; box-shadow:0 4px 12px rgba(0,0,0,0.06); display:block;" />
                                    <p style="font-size:0.8125rem; color:var(--bws-text-muted); margin-top:0.75rem; text-align:center;">
                                        <?php esc_html_e( 'Verified Google Search Console performance data snapshot.', 'bluewireseo' ); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- PDF Proof Download Card (If Uploaded) -->
                        <?php if ( ! empty( $pdf_url ) ) : ?>
                            <div class="bws-pdf-download-card" style="margin-bottom:3rem; padding:1.75rem 2rem; background:#F0F9FF; border:1px solid #BAE6FD; border-radius:var(--bws-radius-lg); display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1.25rem;">
                                <div style="display:flex; align-items:center; gap:1.25rem;">
                                    <div style="width:52px; height:52px; border-radius:10px; background:#0284C7; color:#FFFFFF; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:26px; height:26px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    </div>
                                    <div>
                                        <h4 style="margin:0 0 0.25rem; font-size:1.125rem; color:#0369A1;"><?php esc_html_e( 'Official SEO Master Plan & Audit Proof (PDF)', 'bluewireseo' ); ?></h4>
                                        <p style="margin:0; font-size:0.875rem; color:#0C4A6E;"><?php esc_html_e( 'Download the unabridged PDF report including full technical logs, canonical mapping, and keyword clusters.', 'bluewireseo' ); ?></p>
                                    </div>
                                </div>
                                <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-primary" style="background:#0284C7; border-color:#0284C7;">
                                    <?php esc_html_e( 'Download PDF Report', 'bluewireseo' ); ?> &darr;
                                </a>
                            </div>
                        <?php endif; ?>

                        <!-- Main Content Body -->
                        <div class="bws-content bws-entry-content" style="font-size:1.0625rem; line-height:1.75;">
                            <?php
                            $raw_content = get_the_content();
                            if ( ! empty( $raw_content ) && strlen( trim( strip_tags( $raw_content ) ) ) > 15 ) {
                                the_content();
                            } else {
                                // Smart fallbacks if page was newly created with empty content
                                if ( stripos( $slug, 'case' ) !== false || stripos( $title, 'case' ) !== false ) {
                                    ?>
                                    <p style="font-size:1.125rem; color:var(--bws-text-secondary); margin-bottom:2rem;">
                                        Explore verified SEO transformations and search engine growth metrics from executed client campaigns. Every case study below is documented with real timestamps, Google Search Console logs, and commercial revenue impact.
                                    </p>
                                    <?php
                                } elseif ( stripos( $slug, 'port' ) !== false || stripos( $title, 'port' ) !== false ) {
                                    ?>
                                    <p style="font-size:1.125rem; color:var(--bws-text-secondary); margin-bottom:2rem;">
                                        Explore live deliverables, technical remediations, and topical authority frameworks engineered for enterprise clients across OOH advertising, B2B services, and multi-location platforms.
                                    </p>
                                    <?php
                                } elseif ( stripos( $slug, 'service' ) !== false || stripos( $title, 'service' ) !== false ) {
                                    ?>
                                    <p style="font-size:1.125rem; color:var(--bws-text-secondary); margin-bottom:2rem;">
                                        BlueWireSEO provides forensic search engine optimization engineered for sustainable commercial discoverability. Every service is custom-architected around entity connections and high-intent buyer acquisition.
                                    </p>
                                    <?php
                                } else {
                                    the_content();
                                }
                            }
                            ?>
                        </div>

                        <!-- Intent-Driven Interactive Conversion Block (Free SEO Audit Form) -->
                        <div class="bws-page-audit-box" style="margin-top:4rem; background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:3rem 2.5rem; border-radius:var(--bws-radius-lg); box-shadow:0 12px 30px rgba(15,27,61,0.25);">
                            <div style="text-align:center; max-width:680px; margin:0 auto 2rem;">
                                <span style="display:inline-block; font-size:0.75rem; font-weight:800; letter-spacing:0.08em; text-transform:uppercase; color:#93C5FD; background:rgba(37,99,235,0.25); padding:0.35rem 0.85rem; border-radius:9999px; margin-bottom:1rem;">
                                    <?php esc_html_e( 'CONFIDENTIAL 20-POINT SEARCH AUDIT', 'bluewireseo' ); ?>
                                </span>
                                <h3 style="color:#FFFFFF; font-size:clamp(1.625rem, 3.2vw, 2.125rem); line-height:1.2; margin-bottom:0.75rem;">
                                    <?php esc_html_e( 'Discover Why Your Competitors Outrank You', 'bluewireseo' ); ?>
                                </h3>
                                <p style="color:rgba(255,255,255,0.85); font-size:1rem; line-height:1.6; margin:0;">
                                    <?php esc_html_e( 'Request a free, forensic audit conducted personally by Humayun Kabir Nishan. Includes crawl bottleneck analysis, canonical mapping, and GSC indexation diagnostics.', 'bluewireseo' ); ?>
                                </p>
                            </div>

                            <form action="<?php echo esc_url( home_url( '/free-seo-audit/' ) ); ?>" method="get" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; text-align:left; background:rgba(255,255,255,0.06); padding:1.75rem; border-radius:12px; border:1px solid rgba(255,255,255,0.15);">
                                <div style="grid-column:1 / -1;">
                                    <label for="page_audit_url" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Website URL *', 'bluewireseo' ); ?></label>
                                    <input type="url" id="page_audit_url" name="site_url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                </div>
                                <div>
                                    <label for="page_audit_name" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Name *', 'bluewireseo' ); ?></label>
                                    <input type="text" id="page_audit_name" name="name" required placeholder="John Doe" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                </div>
                                <div>
                                    <label for="page_audit_email" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                    <input type="email" id="page_audit_email" name="email" required placeholder="john@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                </div>
                                <div style="grid-column:1 / -1; margin-top:0.5rem;">
                                    <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem; font-weight:700;">
                                        <?php esc_html_e( 'Get Free Forensic SEO Audit &rarr;', 'bluewireseo' ); ?>
                                    </button>
                                    <p style="font-size:0.75rem; color:rgba(255,255,255,0.65); text-align:center; margin-top:0.75rem; margin-bottom:0;">
                                        <?php esc_html_e( 'Delivered in 48-72h • 100% Manual Expert Analysis • No automated bot spam', 'bluewireseo' ); ?>
                                    </p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>
            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
