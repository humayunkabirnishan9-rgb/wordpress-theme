<?php
/**
 * Template Name: BlueWireSEO — Process Page Template
 * Template Post Type: page, post, bws_portfolio, bws_case_study, bws_service, bws_industry
 *
 * @package BlueWireSEO
 */

get_header();

$audit_url = bluewireseo_get_audit_url();
$call_url  = bluewireseo_get_call_url();
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
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width: 760px; margin-top: 1.25rem;">
                        <p class="bws-eyebrow" style="color: #93C5FD;"><?php esc_html_e( 'OUR METHODOLOGY', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'Our repeatable 4-step framework: Forensic Diagnostic, Technical Remediation, Semantic Clustering, and Compounding Authority Growth.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <?php
                    $raw_content = get_the_content();
                    if ( ! empty( $raw_content ) && stripos( $raw_content, 'This is the' ) === false && strlen( trim( strip_tags( $raw_content ) ) ) > 15 ) :
                        echo '<div class="bws-content" style="max-width:860px; margin-bottom:3rem; font-size:1.0625rem; line-height:1.75;">';
                        the_content();
                        echo '</div>';
                    endif;
                    ?>

                    <div style="display:flex; flex-direction:column; gap:3rem; max-width:860px; margin:0 auto;">
                        <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); position:relative;">
                            <div style="font-size:2rem; font-weight:800; color:var(--bws-primary); margin-bottom:0.75rem;">Phase 01: Forensic Crawl & Semantic Diagnostic</div>
                            <p style="font-size:1rem; color:var(--bws-text-secondary); line-height:1.7;">
                                We conduct an exhaustive 20-point diagnostic analyzing server crawl logs, Google Search Console query distributions, Core Web Vitals performance, canonical loop integrity, and competitor entity gaps.
                            </p>
                        </div>

                        <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); position:relative;">
                            <div style="font-size:2rem; font-weight:800; color:var(--bws-primary); margin-bottom:0.75rem;">Phase 02: Code-Level Technical Remediation</div>
                            <p style="font-size:1rem; color:var(--bws-text-secondary); line-height:1.7;">
                                We resolve 404/301 redirect chains, eliminate render-blocking assets, inject custom nested JSON-LD schema markup, and fix URL canonicalization to ensure 100% of priority commercial pages are crawled and indexed.
                            </p>
                        </div>

                        <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); position:relative;">
                            <div style="font-size:2rem; font-weight:800; color:var(--bws-primary); margin-bottom:0.75rem;">Phase 03: Semantic Topic Clusters & City Hubs</div>
                            <p style="font-size:1rem; color:var(--bws-text-secondary); line-height:1.7;">
                                We architect intent-mapped content silos consisting of comprehensive pillar pages and supporting cluster articles that target decision-makers at every purchase stage.
                            </p>
                        </div>

                        <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); position:relative;">
                            <div style="font-size:2rem; font-weight:800; color:var(--bws-primary); margin-bottom:0.75rem;">Phase 04: Compounding Authority & AI Overview Capture</div>
                            <p style="font-size:1rem; color:var(--bws-text-secondary); line-height:1.7;">
                                We secure contextual editorial backlinks, build high-tier PR citations, and continuously optimize for AI search engines (ChatGPT, Google AI Overviews, Gemini) to establish permanent market dominance.
                            </p>
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
