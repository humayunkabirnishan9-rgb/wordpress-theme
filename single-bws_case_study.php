<?php
/**
 * Single Case Study Template
 * BlueWireSEO — Case Study Template with Full Elementor Support
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
            $result       = get_post_meta( get_the_ID(), '_bws_result_metric', true );
            $data_source  = get_post_meta( get_the_ID(), '_bws_data_source', true );
            $time_period  = get_post_meta( get_the_ID(), '_bws_time_period', true );
            $services     = get_post_meta( get_the_ID(), '_bws_services_used', true );
            ?>

            <!-- Hero -->
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="display:flex; gap:0.75rem; align-items:center; margin-top:1.25rem; flex-wrap:wrap;">
                        <span class="bws-card-tag" style="background:rgba(37,99,235,0.25); color:#93C5FD; border:1px solid rgba(147,197,253,0.3); font-size:0.75rem;">
                            <?php echo esc_html( strtoupper( $industry ? $industry : 'CASE STUDY' ) ); ?>
                        </span>
                        <?php if ( $time_period ) : ?>
                            <span style="font-size:0.85rem; color:rgba(255,255,255,0.7);"><?php echo esc_html( $time_period ); ?></span>
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

            <!-- Content Section -->
            <section class="bws-section-sm" style="background:var(--bws-white); padding:3.5rem 0;">
                <div class="bws-container">
                    <div class="bws-single-layout" style="display:grid; grid-template-columns: 2.2fr 1fr; gap:3rem;">
                        <article class="bws-content" style="font-size:1.0625rem; line-height:1.75;">
                            <?php
                            $raw_content = get_the_content();
                            if ( ! empty( $raw_content ) && strlen( trim( strip_tags( $raw_content ) ) ) > 20 ) {
                                the_content();
                            } else {
                                ?>
                                <div style="margin-bottom:2.5rem;">
                                    <h2><?php esc_html_e( 'Challenge & Diagnostic Baseline', 'bluewireseo' ); ?></h2>
                                    <p>
                                        <?php esc_html_e( 'Before our intervention, the client faced significant organic search stagnation due to technical crawl inefficiencies, unoptimized canonical tag structures, and a complete lack of semantic entity connections.', 'bluewireseo' ); ?>
                                    </p>

                                    <h2><?php esc_html_e( 'Our Strategic Intervention', 'bluewireseo' ); ?></h2>
                                    <p>
                                        <?php esc_html_e( 'We implemented our repeatable 4-step framework: forensic crawl budget analysis, URL canonicalization, topical silo architecture, and high-tier editorial authority building.', 'bluewireseo' ); ?>
                                    </p>

                                    <h2><?php esc_html_e( 'Measurable Business Impact', 'bluewireseo' ); ?></h2>
                                    <p>
                                        <?php esc_html_e( 'All metrics are verified from Google Search Console and Google Analytics 4 performance reports.', 'bluewireseo' ); ?>
                                    </p>
                                </div>
                                <?php
                                echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
                                the_content();
                                echo '</div>';
                            }
                            ?>
                        </article>

                        <aside class="bws-single-sidebar">
                            <div class="bws-card" style="margin-bottom:1.5rem; padding:1.75rem; border:1px solid var(--bws-border);">
                                <h3 style="font-size:1.125rem; margin-bottom:1rem;"><?php esc_html_e( 'Case Study Facts', 'bluewireseo' ); ?></h3>
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
                                    <?php if ( $result ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Key Metric', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; font-weight:700; color:var(--bws-primary); text-align:right;"><?php echo esc_html( $result ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $data_source ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Data Source', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; font-weight:600; text-align:right;"><?php echo esc_html( $data_source ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $services ) : ?>
                                        <tr>
                                            <td style="padding:0.6rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Scope', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.6rem 0; font-weight:600; text-align:right;"><?php echo esc_html( $services ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>

                            <div class="bws-card" style="padding:1.75rem; background:linear-gradient(135deg,#0F1B3D,#16244C); color:#FFFFFF; border:none;">
                                <h3 style="font-size:1.125rem; color:#FFFFFF; margin-bottom:0.75rem;"><?php esc_html_e( 'Get Your Audit', 'bluewireseo' ); ?></h3>
                                <p style="font-size:0.875rem; color:rgba(255,255,255,0.75); margin-bottom:1.25rem; line-height:1.5;">
                                    <?php esc_html_e( 'Find out what is holding your search performance back with our free 20-point diagnostic.', 'bluewireseo' ); ?>
                                </p>
                                <a href="<?php echo esc_url( bluewireseo_get_audit_url() ); ?>" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">
                                    <?php esc_html_e( 'Claim Free Audit', 'bluewireseo' ); ?>
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
