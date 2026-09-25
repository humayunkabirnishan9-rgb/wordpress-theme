<?php
/**
 * Industries Archive Template
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">

    <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);">
        <div class="bws-container">
            <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            <div style="max-width:700px;margin-top:1.25rem;">
                <p class="bws-eyebrow"><?php esc_html_e( 'WHO WE SERVE', 'bluewireseo' ); ?></p>
                <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3rem);margin-top:0.5rem;"><?php esc_html_e( 'Industry-specific SEO, not generic packages.', 'bluewireseo' ); ?></h1>
                <p class="bws-hero-subtitle"><?php esc_html_e( 'We specialise in industries where search intent is specific, where local and location signals matter, and where most SEO agencies treat clients as interchangeable accounts. Our flagship niche is OOH and billboard advertising — a category the SEO industry has largely ignored.', 'bluewireseo' ); ?></p>
            </div>
        </div>
    </div>

    <section class="bws-section-sm">
        <div class="bws-container">
            <?php if ( have_posts() ) : ?>
                <div style="display:flex;flex-direction:column;gap:1.5rem;">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php
                        $badge    = get_post_meta( get_the_ID(), '_bws_industry_badge', true );
                        $cta_text = get_post_meta( get_the_ID(), '_bws_industry_cta_text', true );
                        $cta_url  = get_post_meta( get_the_ID(), '_bws_industry_cta_url', true );
                        if ( ! $cta_url ) $cta_url = get_permalink();
                        if ( ! $cta_text ) $cta_text = sprintf( __( 'See %s', 'bluewireseo' ), get_the_title() );
                        ?>
                        <div class="bws-industry-card">
                            <div class="bws-industry-card-main">
                                <?php if ( $badge ) : ?>
                                    <span class="bws-card-tag" style="margin-bottom:1rem;"><?php echo esc_html( $badge ); ?></span>
                                <?php endif; ?>
                                <h2 style="font-size:1.375rem;margin-bottom:0.75rem;">
                                    <a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a>
                                </h2>
                                <p style="font-size:0.9375rem;color:var(--bws-text-secondary);margin-bottom:1.25rem;line-height:1.65;"><?php the_excerpt(); ?></p>
                                <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-link-arrow">
                                    <?php echo esc_html( $cta_text ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </a>
                            </div>
                            <div class="bws-industry-card-features">
                                <?php if ( get_the_content() ) : ?>
                                    <div style="font-size:0.875rem;color:var(--bws-text-secondary);">
                                        <?php the_content(); ?>
                                    </div>
                                <?php else : ?>
                                    <p style="font-size:0.875rem;color:var(--bws-text-light);font-style:italic;"><?php esc_html_e( '[PLACEHOLDER: Add industry features in Elementor or the editor]', 'bluewireseo' ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div style="padding:4rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                    <h3 style="color:var(--bws-text-muted);margin-bottom:0.5rem;"><?php esc_html_e( 'No industries yet', 'bluewireseo' ); ?></h3>
                    <p style="color:var(--bws-text-light);font-size:0.9rem;"><?php esc_html_e( 'Add your first industry from the WordPress admin. Industries > Add New.', 'bluewireseo' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta-section' ); ?>
</main>

<?php get_footer(); ?>
