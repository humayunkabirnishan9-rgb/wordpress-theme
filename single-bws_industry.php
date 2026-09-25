<?php
/**
 * Single Industry Template
 * BlueWireSEO — Industry Template with Full Elementor Support
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
            $badge    = get_post_meta( get_the_ID(), '_bws_industry_badge', true );
            $cta_text = get_post_meta( get_the_ID(), '_bws_industry_cta_text', true );
            $cta_url  = get_post_meta( get_the_ID(), '_bws_industry_cta_url', true );
            if ( ! $cta_text ) $cta_text = __( 'Explore Industry Solutions', 'bluewireseo' );
            if ( ! $cta_url ) $cta_url = bluewireseo_get_audit_url();
            ?>

            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="margin-top:1.25rem;">
                        <?php if ( $badge ) : ?>
                            <span class="bws-card-tag tag-ooh" style="background:rgba(37,99,235,0.25); color:#93C5FD; border:1px solid rgba(147,197,253,0.3); font-size:0.75rem;">
                                <?php echo esc_html( strtoupper( $badge ) ); ?>
                            </span>
                        <?php endif; ?>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.25rem); margin:0.75rem 0 1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:720px;">
                            <?php echo esc_html( get_the_excerpt() ); ?>
                        </p>
                    </div>
                </div>
            </div>

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
                                    <h2><?php esc_html_e( 'Sector-Specific SEO Architecture', 'bluewireseo' ); ?></h2>
                                    <p>
                                        <?php esc_html_e( 'Generic agency strategies fail in specialized industries. We engineer custom market directories, geo-signal hierarchies, and commercial landing pages designed for this specific sector.', 'bluewireseo' ); ?>
                                    </p>
                                    <h3><?php esc_html_e( 'Key Industry Pain Points We Solve:', 'bluewireseo' ); ?></h3>
                                    <ul>
                                        <li><?php esc_html_e( 'Indexation bloat and thin location page penalties', 'bluewireseo' ); ?></li>
                                        <li><?php esc_html_e( 'Internal keyword cannibalization between regional markets', 'bluewireseo' ); ?></li>
                                        <li><?php esc_html_e( 'Missing structured data and entity recognition in search', 'bluewireseo' ); ?></li>
                                    </ul>
                                </div>
                                <?php
                                echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
                                the_content();
                                echo '</div>';
                            }
                            ?>
                        </article>

                        <aside class="bws-single-sidebar">
                            <div class="bws-card" style="padding:1.75rem; background:linear-gradient(135deg,#0F1B3D,#16244C); color:#FFFFFF; border:none;">
                                <h3 style="font-size:1.125rem; color:#FFFFFF; margin-bottom:0.75rem;"><?php esc_html_e( 'Get Free Sector Audit', 'bluewireseo' ); ?></h3>
                                <p style="font-size:0.875rem; color:rgba(255,255,255,0.75); margin-bottom:1.25rem; line-height:1.5;">
                                    <?php esc_html_e( 'Discover how to outrank your competitors in this specific industry niche.', 'bluewireseo' ); ?>
                                </p>
                                <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">
                                    <?php echo esc_html( $cta_text ); ?>
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
