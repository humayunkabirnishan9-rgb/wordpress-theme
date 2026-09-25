<?php
/**
 * Single Post Template
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();

        $elementor_data = get_post_meta( get_the_ID(), '_elementor_data', true );
        $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode ) {
            the_content();
        } else {
            ?>
            <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:760px;margin-top:1rem;">
                        <div style="display:flex;gap:0.75rem;align-items:center;margin-bottom:1rem;flex-wrap:wrap;">
                            <?php
                            $categories = get_the_category();
                            if ( $categories ) {
                                echo '<span class="bws-eyebrow" style="font-size:0.75rem;">' . esc_html( $categories[0]->name ) . '</span>';
                            }
                            ?>
                            <span style="color:var(--bws-text-light);font-size:0.85rem;"><?php echo get_the_date(); ?></span>
                        </div>
                        <h1 class="bws-hero-title" style="font-size:clamp(1.875rem,4vw,2.75rem);"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <section class="bws-section-sm">
                <div class="bws-container">
                    <div class="bws-single-layout">
                        <article class="bws-content">
                            <?php
                            if ( has_post_thumbnail() ) {
                                echo '<div style="margin-bottom:2rem;border-radius:var(--bws-radius-lg);overflow:hidden;">';
                                the_post_thumbnail( 'bws-hero' );
                                echo '</div>';
                            }
                            the_content();
                            ?>
                            <hr class="bws-divider">
                            <div style="display:flex;align-items:center;gap:1rem;flex-wrap:wrap;font-size:0.875rem;color:var(--bws-text-muted);">
                                <span><?php esc_html_e( 'Filed under:', 'bluewireseo' ); ?> <?php the_category( ', ' ); ?></span>
                                <span><?php esc_html_e( 'Published:', 'bluewireseo' ); ?> <?php echo get_the_date(); ?></span>
                            </div>
                        </article>

                        <aside class="bws-single-sidebar">
                            <?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
                                <?php dynamic_sidebar( 'sidebar-blog' ); ?>
                            <?php else : ?>
                                <div class="bws-info-box">
                                    <h3 style="font-size:1.125rem;margin-bottom:1rem;"><?php esc_html_e( 'Get Free SEO Audit', 'bluewireseo' ); ?></h3>
                                    <p style="font-size:0.875rem;color:var(--bws-text-muted);margin-bottom:1.25rem;"><?php esc_html_e( 'A free 20-point audit of your site. Delivered within 48-72 business hours.', 'bluewireseo' ); ?></p>
                                    <a href="<?php echo esc_url( bluewireseo_get_audit_url() ); ?>" class="bws-btn bws-btn-primary" style="width:100%;justify-content:center;">
                                        <?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
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
