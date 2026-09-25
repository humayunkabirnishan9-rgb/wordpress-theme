<?php
/**
 * Template Name: BlueWireSEO — About Page Template
 * Template Post Type: page
 *
 * @package BlueWireSEO
 */

get_header();

$audit_url   = bluewireseo_get_audit_url();
$call_url    = bluewireseo_get_call_url();
$contact_url = bluewireseo_get_contact_url();
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
                        <p class="bws-eyebrow"><?php esc_html_e( 'ABOUT BLUEWIRESEO', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="font-size:clamp(2.25rem,4.5vw,3.25rem); margin-bottom:1rem;"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle" style="font-size:1.125rem; color:var(--bws-text-secondary); line-height:1.65;">
                            <?php esc_html_e( 'A technical and semantic SEO consultancy dedicated to connecting commercial US brands to high-intent decision-makers.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Main About Content -->
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

                    <div class="bws-grid-2" style="gap:3.5rem; align-items:center; margin-bottom:4rem;">
                        <div>
                            <p class="bws-eyebrow"><?php esc_html_e( 'OUR MISSION', 'bluewireseo' ); ?></p>
                            <h2 style="font-size:clamp(1.75rem,3.5vw,2.25rem); margin-bottom:1.25rem;"><?php esc_html_e( 'Search visibility built on technical precision, not agency fluff.', 'bluewireseo' ); ?></h2>
                            <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.25rem;">
                                <?php esc_html_e( 'BlueWireSEO was founded to eliminate the disconnect between traditional SEO agency reporting and real commercial revenue. Most agencies treat search engine optimization as an exercise in keyword stuffing and vanity backlink metrics.', 'bluewireseo' ); ?>
                            </p>
                            <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.5rem;">
                                <?php esc_html_e( 'We approach search from a systems and engineering perspective: resolving crawl bottlenecks, structuring entity graphs that search algorithms can parse with 100% confidence, and targeting high-ticket commercial intent queries that generate qualified inbound inquiries.', 'bluewireseo' ); ?>
                            </p>
                            <div style="display:flex; gap:1rem; flex-wrap:wrap;">
                                <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary">
                                    <?php esc_html_e( 'Request Free Audit', 'bluewireseo' ); ?>
                                </a>
                                <a href="<?php echo esc_url( $contact_url ); ?>" class="bws-btn bws-btn-outline">
                                    <?php esc_html_e( 'Contact Our Team', 'bluewireseo' ); ?>
                                </a>
                            </div>
                        </div>

                        <div style="padding:2.5rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-lg); border:1px solid var(--bws-border);">
                            <h3 style="font-size:1.25rem; margin-bottom:1.25rem; color:var(--bws-heading);"><?php esc_html_e( 'Core Principles', 'bluewireseo' ); ?></h3>
                            <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:1.25rem;">
                                <li style="display:flex; gap:0.75rem;">
                                    <span style="color:var(--bws-primary); flex-shrink:0;"><?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                                    <span style="font-size:0.9375rem; color:var(--bws-text-secondary);"><strong>Entity Over Volume:</strong> We optimize for topical entity relationships rather than isolated keywords that don’t drive revenue.</span>
                                </li>
                                <li style="display:flex; gap:0.75rem;">
                                    <span style="color:var(--bws-primary); flex-shrink:0;"><?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                                    <span style="font-size:0.9375rem; color:var(--bws-text-secondary);"><strong>Source Verification:</strong> Every metric and claim is validated directly with Google Search Console or Google Analytics data.</span>
                                </li>
                                <li style="display:flex; gap:0.75rem;">
                                    <span style="color:var(--bws-primary); flex-shrink:0;"><?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                                    <span style="font-size:0.9375rem; color:var(--bws-text-secondary);"><strong>Remote-First Agility:</strong> Working directly with senior technical architects across US time zones with zero account manager bureaucracy.</span>
                                </li>
                                <li style="display:flex; gap:0.75rem;">
                                    <span style="color:var(--bws-primary); flex-shrink:0;"><?php echo bluewireseo_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                                    <span style="font-size:0.9375rem; color:var(--bws-text-secondary);"><strong>Niche Mastery:</strong> Dedicated domain expertise in OOH billboard advertising, multi-market directories, and commercial B2B services.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Founder / Leadership Section -->
                    <div style="padding:3rem 2.5rem; background:var(--bws-navy); color:#FFFFFF; border-radius:var(--bws-radius-lg); margin-top:2rem;">
                        <div style="max-width:700px;">
                            <p class="bws-eyebrow" style="color:#93C5FD;"><?php esc_html_e( 'LEADERSHIP & EXECUTION', 'bluewireseo' ); ?></p>
                            <h3 style="color:#FFFFFF; font-size:1.75rem; margin-bottom:1rem;"><?php esc_html_e( 'Direct Specialist Execution', 'bluewireseo' ); ?></h3>
                            <p style="color:rgba(255,255,255,0.8); line-height:1.7; margin-bottom:1.25rem;">
                                <?php esc_html_e( 'At BlueWireSEO, your campaign is designed and executed by senior technical SEO professionals. When you have questions about canonical signals, crawl budgets, schema markup, or indexation anomalies, you speak directly with the engineers implementing the solution.', 'bluewireseo' ); ?>
                            </p>
                            <p style="color:rgba(255,255,255,0.8); line-height:1.7; margin-bottom:1.75rem;">
                                <?php esc_html_e( 'Based out of Bangladesh operating on a remote-first model, we serve US companies nationwide with round-the-clock technical responsiveness and focused execution.', 'bluewireseo' ); ?>
                            </p>
                            <a href="<?php echo esc_url( $call_url ); ?>" class="bws-btn bws-btn-primary">
                                <?php esc_html_e( 'Schedule a Discussion', 'bluewireseo' ); ?>
                                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                            </a>
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
