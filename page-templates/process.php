<?php
/**
 * Template Name: BlueWireSEO — Process Page Template
 * Template Post Type: page
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

        $elementor_data = get_post_meta( get_the_ID(), '_elementor_data', true );
        $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode && strlen( $elementor_data ) > 10 ) {
            the_content();
        } else {
            ?>
            <!-- Hero -->
            <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:720px; margin-top:1.25rem;">
                        <p class="bws-eyebrow"><?php esc_html_e( 'OUR METHODOLOGY', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="font-size:clamp(2.25rem,4.5vw,3.25rem); margin-bottom:1rem;"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle" style="font-size:1.125rem; color:var(--bws-text-secondary); line-height:1.65;">
                            <?php esc_html_e( 'How we systematically diagnose, repair, and scale organic search performance for commercial websites.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Process Steps Breakdown -->
            <section class="bws-section-sm" style="background:var(--bws-white);">
                <div class="bws-container">
                    <?php
                    $content = get_the_content();
                    if ( ! empty( $content ) && stripos( $content, 'This is the' ) === false ) :
                        echo '<div class="bws-content" style="max-width:800px; margin-bottom:3rem;">';
                        the_content();
                        echo '</div>';
                    endif;
                    ?>

                    <div style="display:flex; flex-direction:column; gap:2.5rem; max-width:860px; margin:0 auto;">
                        <!-- Step 1 -->
                        <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); position:relative; overflow:hidden;">
                            <div style="position:absolute; top:1.5rem; right:2rem; font-size:3.5rem; font-weight:900; color:rgba(37,99,235,0.08); line-height:1;">01</div>
                            <span class="bws-card-tag tag-b2b" style="margin-bottom:1rem;"><?php esc_html_e( 'PHASE 1: WEEKS 1-2', 'bluewireseo' ); ?></span>
                            <h2 style="font-size:1.5rem; margin-bottom:0.75rem;"><?php esc_html_e( 'Diagnostic & Architectural Audit', 'bluewireseo' ); ?></h2>
                            <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.25rem;">
                                <?php esc_html_e( 'We begin with a forensic examination of your domain’s health. We crawl every URL, analyze server log files to evaluate Googlebot behavior, assess Core Web Vitals performance, and uncover hidden canonical conflicts or redirect chains.', 'bluewireseo' ); ?>
                            </p>
                            <div style="padding:1rem 1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); font-size:0.875rem; color:var(--bws-text-secondary);">
                                <strong><?php esc_html_e( 'Key Deliverables:', 'bluewireseo' ); ?></strong> <?php esc_html_e( 'Full Crawl Report, Canonical Audit, Entity Architecture Blueprint, Competitor Gap Matrix.', 'bluewireseo' ); ?>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); position:relative; overflow:hidden;">
                            <div style="position:absolute; top:1.5rem; right:2rem; font-size:3.5rem; font-weight:900; color:rgba(37,99,235,0.08); line-height:1;">02</div>
                            <span class="bws-card-tag tag-b2b" style="margin-bottom:1rem;"><?php esc_html_e( 'PHASE 2: WEEKS 3-4', 'bluewireseo' ); ?></span>
                            <h2 style="font-size:1.5rem; margin-bottom:0.75rem;"><?php esc_html_e( 'Technical Remediation & Indexation Control', 'bluewireseo' ); ?></h2>
                            <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.25rem;">
                                <?php esc_html_e( 'We fix the critical technical flaws discovered in Phase 1. We eliminate crawl traps, streamline XML sitemaps, implement advanced JSON-LD schema graphs, optimize mobile rendering, and resolve indexation bloat.', 'bluewireseo' ); ?>
                            </p>
                            <div style="padding:1rem 1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); font-size:0.875rem; color:var(--bws-text-secondary);">
                                <strong><?php esc_html_e( 'Key Deliverables:', 'bluewireseo' ); ?></strong> <?php esc_html_e( 'Clean GSC Index Coverage, Validated Schema Graph, Optimized CWV Scores, Streamlined Robots.txt & XML.', 'bluewireseo' ); ?>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); position:relative; overflow:hidden;">
                            <div style="position:absolute; top:1.5rem; right:2rem; font-size:3.5rem; font-weight:900; color:rgba(37,99,235,0.08); line-height:1;">03</div>
                            <span class="bws-card-tag tag-b2b" style="margin-bottom:1rem;"><?php esc_html_e( 'PHASE 3: MONTHS 2-3', 'bluewireseo' ); ?></span>
                            <h2 style="font-size:1.5rem; margin-bottom:0.75rem;"><?php esc_html_e( 'Semantic Clustering & Topical Authority', 'bluewireseo' ); ?></h2>
                            <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.25rem;">
                                <?php esc_html_e( 'With technical foundations solidified, we build the content architecture. We establish pillar and cluster relationships, eliminating keyword cannibalization and targeting bottom-of-funnel decision-maker queries.', 'bluewireseo' ); ?>
                            </p>
                            <div style="padding:1rem 1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); font-size:0.875rem; color:var(--bws-text-secondary);">
                                <strong><?php esc_html_e( 'Key Deliverables:', 'bluewireseo' ); ?></strong> <?php esc_html_e( 'Topical Cluster Content, High-Intent Service Silos, Market Landing Page Architecture.', 'bluewireseo' ); ?>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="bws-card" style="padding:2.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); position:relative; overflow:hidden;">
                            <div style="position:absolute; top:1.5rem; right:2rem; font-size:3.5rem; font-weight:900; color:rgba(37,99,235,0.08); line-height:1;">04</div>
                            <span class="bws-card-tag tag-b2b" style="margin-bottom:1rem;"><?php esc_html_e( 'PHASE 4: MONTHS 4+', 'bluewireseo' ); ?></span>
                            <h2 style="font-size:1.5rem; margin-bottom:0.75rem;"><?php esc_html_e( 'Market Expansion & Compounding Growth', 'bluewireseo' ); ?></h2>
                            <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.25rem;">
                                <?php esc_html_e( 'Continuous expansion into secondary US metro markets, acquiring high-authority contextual editorial backlinks, and ongoing monitoring to safeguard rankings against core algorithm shifts.', 'bluewireseo' ); ?>
                            </p>
                            <div style="padding:1rem 1.25rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-md); font-size:0.875rem; color:var(--bws-text-secondary);">
                                <strong><?php esc_html_e( 'Key Deliverables:', 'bluewireseo' ); ?></strong> <?php esc_html_e( 'Multi-City Indexing, Tier-1 Backlink Profiles, Lead Attribution Dashboards, Monthly Strategic Reviews.', 'bluewireseo' ); ?>
                            </div>
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
