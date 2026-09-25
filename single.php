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

        if ( bluewireseo_is_elementor_active( get_the_ID() ) ) {
            echo '<div class="bws-elementor-container">';
            the_content();
            echo '</div>';
        } else {
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'bws-single-post' ); ?>>
                <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                    <div class="bws-container">
                        <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        <div style="max-width: 820px; margin-top: 1.25rem;">
                            <div style="display:flex; gap:0.75rem; align-items:center; margin-bottom:1rem; flex-wrap:wrap;">
                                <span class="bws-card-tag tag-ooh" style="background:rgba(37,99,235,0.2); color:#93C5FD; border:1px solid rgba(147,197,253,0.3); font-size:0.75rem;">
                                    <?php echo esc_html( get_the_category_list( ', ' ) ); ?>
                                </span>
                                <span style="font-size:0.85rem; color:rgba(255,255,255,0.65);">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </span>
                            </div>
                            <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.25rem); line-height:1.2; margin-bottom:1.25rem;">
                                <?php the_title(); ?>
                            </h1>
                            <div style="display:flex; align-items:center; gap:0.75rem; color:rgba(255,255,255,0.75); font-size:0.9rem;">
                                <span><?php esc_html_e( 'By', 'bluewireseo' ); ?> <?php the_author(); ?></span>
                                <span>&bull;</span>
                                <span><?php echo esc_html( max( 1, round( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ) ) ); ?> <?php esc_html_e( 'min read', 'bluewireseo' ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="bws-section-sm" style="background:var(--bws-white); padding:3.5rem 0;">
                    <div class="bws-container">
                        <div class="bws-single-layout" style="display:grid; grid-template-columns: 2.2fr 1fr; gap:3rem;">
                            <div class="bws-content" style="font-size:1.0625rem; line-height:1.75;">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div style="margin-bottom:2.5rem; border-radius:var(--bws-radius-lg); overflow:hidden; box-shadow:var(--bws-shadow-md);">
                                        <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; height:auto; display:block;' ) ); ?>
                                    </div>
                                <?php endif; ?>

                                <?php the_content(); ?>
                            </div>

                            <aside class="bws-single-sidebar">
                                <div class="bws-card" style="margin-bottom:2rem; padding:1.75rem; border:1px solid var(--bws-border);">
                                    <h3 style="font-size:1.125rem; margin-bottom:0.75rem;"><?php esc_html_e( 'Get Free SEO Audit', 'bluewireseo' ); ?></h3>
                                    <p style="font-size:0.875rem; color:var(--bws-text-muted); margin-bottom:1.25rem; line-height:1.5;">
                                        <?php esc_html_e( 'Uncover the technical and semantic gaps limiting your organic traffic.', 'bluewireseo' ); ?>
                                    </p>
                                    <a href="<?php echo esc_url( bluewireseo_get_audit_url() ); ?>" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center;">
                                        <?php esc_html_e( 'Claim 48h Audit', 'bluewireseo' ); ?>
                                    </a>
                                </div>
                            </aside>
                        </div>
                    </div>
                </section>
            </article>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>
            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
