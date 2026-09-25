<?php
/**
 * Single Portfolio Template
 * BlueWireSEO — Portfolio Item Template with Full Elementor Support
 *
 * @package BlueWireSEO
 */

get_header();
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
            $client       = get_post_meta( get_the_ID(), '_bws_client', true );
            $industry     = get_post_meta( get_the_ID(), '_bws_industry', true );
            $services     = get_post_meta( get_the_ID(), '_bws_services_used', true );
            $external_url = get_post_meta( get_the_ID(), '_bws_external_url', true );
            $result       = get_post_meta( get_the_ID(), '_bws_result_metric', true );
            $project_date = get_post_meta( get_the_ID(), '_bws_project_date', true );
            $categories   = get_the_terms( get_the_ID(), 'bws_portfolio_category' );
            $cat_name     = ( $categories && ! is_wp_error( $categories ) ) ? $categories[0]->name : '';
            ?>

            <!-- Portfolio Hero -->
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="display:flex; gap:0.75rem; align-items:center; margin-top:1.25rem; flex-wrap:wrap;">
                        <?php if ( $cat_name ) : ?>
                            <span class="bws-card-tag" style="background:rgba(37,99,235,0.25); color:#93C5FD; border:1px solid rgba(147,197,253,0.3); font-size:0.75rem;">
                                <?php echo esc_html( strtoupper( $cat_name ) ); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ( $industry ) : ?>
                            <span style="font-size:0.85rem; color:rgba(255,255,255,0.7);"><?php echo esc_html( $industry ); ?></span>
                        <?php endif; ?>
                    </div>
                    <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.25rem); margin:0.75rem 0 1rem;">
                        <?php the_title(); ?>
                    </h1>
                    <?php if ( $result ) : ?>
                        <div style="display:inline-block; padding:0.45rem 1rem; background:rgba(37,99,235,0.3); border:1px solid rgba(96,165,250,0.4); border-radius:var(--bws-radius-sm); color:#60A5FA; font-weight:700; font-size:1.125rem; margin-bottom:1rem;">
                            <?php echo esc_html( $result ); ?>
                        </div>
                    <?php endif; ?>
                    <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:720px;">
                        <?php echo esc_html( get_the_excerpt() ); ?>
                    </p>
                </div>
            </div>

            <!-- Portfolio Layout -->
            <section class="bws-section-sm" style="background:var(--bws-white); padding:3.5rem 0;">
                <div class="bws-container">
                    <div class="bws-single-layout" style="display:grid; grid-template-columns: 2.2fr 1fr; gap:3rem;">
                        <!-- Main Content -->
                        <article class="bws-content" style="font-size:1.0625rem; line-height:1.75;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div style="margin-bottom:2.5rem; border-radius:var(--bws-radius-lg); overflow:hidden; box-shadow:var(--bws-shadow-md);">
                                    <?php the_post_thumbnail( 'bws-hero', array( 'style' => 'width:100%; height:auto; display:block;' ) ); ?>
                                </div>
                            <?php endif; ?>

                            <?php
                            $raw_content = get_the_content();
                            if ( ! empty( $raw_content ) && strlen( trim( strip_tags( $raw_content ) ) ) > 20 ) {
                                the_content();
                            } else {
                                ?>
                                <div style="margin-bottom:2.5rem;">
                                    <h2><?php esc_html_e( 'Project Overview & Objectives', 'bluewireseo' ); ?></h2>
                                    <p>
                                        <?php esc_html_e( 'This strategic SEO engagement focused on restructuring search architecture, resolving critical crawl bottlenecks, and designing targeted topical entity silos that capture high-intent commercial buyers.', 'bluewireseo' ); ?>
                                    </p>

                                    <h3><?php esc_html_e( '1. Technical & Architecture Audit', 'bluewireseo' ); ?></h3>
                                    <p>
                                        <?php esc_html_e( 'Initial diagnostic revealed crawl budget waste across redirect chains, canonical discrepancies, missing schema markup, and lack of dedicated localized landing pages for key commercial markets.', 'bluewireseo' ); ?>
                                    </p>
                                    <ul>
                                        <li><strong><?php esc_html_e( 'URL Canonicalization:', 'bluewireseo' ); ?></strong> <?php esc_html_e( 'Consolidated all protocols (http/https/www) to eliminate duplicate content signals.', 'bluewireseo' ); ?></li>
                                        <li><strong><?php esc_html_e( 'Core Web Vitals:', 'bluewireseo' ); ?></strong> <?php esc_html_e( 'Optimized asset delivery, deferred render-blocking scripts, and brought server response times under Google thresholds.', 'bluewireseo' ); ?></li>
                                        <li><strong><?php esc_html_e( 'Indexation Control:', 'bluewireseo' ); ?></strong> <?php esc_html_e( 'Cleaned up robots.txt and XML sitemaps to ensure 100% of priority commercial pages were indexed.', 'bluewireseo' ); ?></li>
                                    </ul>

                                    <h3><?php esc_html_e( '2. Semantic & Entity Strategy', 'bluewireseo' ); ?></h3>
                                    <p>
                                        <?php esc_html_e( 'Rather than generic keyword stuffing, we constructed a comprehensive topic cluster with pillar and sub-cluster articles linking back to high-converting service and market hub pages.', 'bluewireseo' ); ?>
                                    </p>

                                    <h3><?php esc_html_e( '3. Verified Commercial Results', 'bluewireseo' ); ?></h3>
                                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap:1.25rem; margin:2rem 0; padding:1.75rem; background:var(--bws-light-bg); border-radius:var(--bws-radius-lg); border:1px solid var(--bws-border);">
                                        <div>
                                            <div style="font-size:1.75rem; font-weight:800; color:var(--bws-primary);"><?php echo esc_html( $result ? $result : 'Verified Growth' ); ?></div>
                                            <div style="font-size:0.85rem; color:var(--bws-text-muted);"><?php esc_html_e( 'Key Performance Outcome', 'bluewireseo' ); ?></div>
                                        </div>
                                        <div>
                                            <div style="font-size:1.75rem; font-weight:800; color:var(--bws-primary);">100% White-Hat</div>
                                            <div style="font-size:0.85rem; color:var(--bws-text-muted);"><?php esc_html_e( 'Google Guidelines Compliant', 'bluewireseo' ); ?></div>
                                        </div>
                                        <div>
                                            <div style="font-size:1.75rem; font-weight:800; color:var(--bws-primary);"><?php echo esc_html( $project_date ? $project_date : 'Proven ROI' ); ?></div>
                                            <div style="font-size:0.85rem; color:var(--bws-text-muted);"><?php esc_html_e( 'Verified Engagement Timeline', 'bluewireseo' ); ?></div>
                                        </div>
                                    </div>

                                    <p>
                                        <?php esc_html_e( 'The compounding authority gains resulted in sustained commercial search visibility, top 1-5 positions for high-intent keywords, and increased inbound RFP conversions.', 'bluewireseo' ); ?>
                                    </p>
                                </div>
                                <?php
                                // Always execute the_content() so Elementor hook is present!
                                echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
                                the_content();
                                echo '</div>';
                            }
                            ?>
                        </article>

                        <!-- Sidebar -->
                        <aside class="bws-single-sidebar">
                            <div class="bws-card" style="margin-bottom:1.5rem; padding:1.75rem; border:1px solid var(--bws-border);">
                                <h3 style="font-size:1.125rem; margin-bottom:1rem;"><?php esc_html_e( 'Project Facts', 'bluewireseo' ); ?></h3>
                                <table class="bws-facts-table" style="width:100%; border-collapse:collapse; font-size:0.9rem;">
                                    <?php if ( $client ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Client', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; font-weight:600; text-align:right;"><?php echo esc_html( $client ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $industry ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Industry', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; font-weight:600; text-align:right;"><?php echo esc_html( $industry ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $services ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Services', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; font-weight:600; text-align:right;"><?php echo esc_html( $services ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $result ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Result', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; font-weight:700; color:var(--bws-primary); text-align:right;"><?php echo esc_html( $result ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $project_date ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Date', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; font-weight:600; text-align:right;"><?php echo esc_html( $project_date ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $external_url ) : ?>
                                        <tr>
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Live Site', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; text-align:right;">
                                                <a href="<?php echo esc_url( $external_url ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--bws-primary); font-weight:600; text-decoration:none;">
                                                    <?php esc_html_e( 'Visit &rarr;', 'bluewireseo' ); ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>

                            <div class="bws-card" style="padding:1.75rem; background:linear-gradient(135deg,#0F1B3D,#16244C); color:#FFFFFF; border:none;">
                                <h3 style="font-size:1.125rem; color:#FFFFFF; margin-bottom:0.75rem;"><?php esc_html_e( 'Want results like this?', 'bluewireseo' ); ?></h3>
                                <p style="font-size:0.875rem; color:rgba(255,255,255,0.75); margin-bottom:1.25rem; line-height:1.5;">
                                    <?php esc_html_e( 'Claim your free 20-point technical & semantic SEO audit delivered in 48 hours.', 'bluewireseo' ); ?>
                                </p>
                                <a href="<?php echo esc_url( bluewireseo_get_audit_url() ); ?>" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">
                                    <?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?>
                                </a>
                            </div>
                        </aside>
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
