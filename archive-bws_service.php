<?php
/**
 * Services Archive Template
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
                <p class="bws-eyebrow"><?php esc_html_e( 'WHAT WE DO', 'bluewireseo' ); ?></p>
                <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3rem);margin-top:0.5rem;"><?php esc_html_e( 'SEO services that compound over time.', 'bluewireseo' ); ?></h1>
                <p class="bws-hero-subtitle"><?php esc_html_e( 'Every service is designed to build on the last. We focus on semantic, technical, and local SEO for OOH advertising companies and B2B service businesses.', 'bluewireseo' ); ?></p>
            </div>
        </div>
    </div>

    <section class="bws-section-sm">
        <div class="bws-container">
            <?php if ( have_posts() ) : ?>
                <div class="bws-grid-3">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php
                        $cat_label = get_post_meta( get_the_ID(), '_bws_service_category_label', true );
                        $cta_text  = get_post_meta( get_the_ID(), '_bws_service_cta_text', true );
                        $cta_url   = get_post_meta( get_the_ID(), '_bws_service_cta_url', true );
                        if ( ! $cta_url ) $cta_url = get_permalink();
                        if ( ! $cta_text ) $cta_text = __( 'View Service', 'bluewireseo' );
                        ?>
                        <article class="bws-service-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div style="margin:-1.75rem -1.75rem 1.5rem;border-radius:var(--bws-radius-lg) var(--bws-radius-lg) 0 0;overflow:hidden;height:200px;">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'bws-card', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="bws-service-card-icon">
                                    <?php echo bluewireseo_icon( 'layers' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( $cat_label ) : ?>
                                <p class="bws-eyebrow" style="margin-bottom:0.5rem;"><?php echo esc_html( $cat_label ); ?></p>
                            <?php endif; ?>
                            <h2 style="font-size:1.25rem;margin-bottom:0.625rem;"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h2>
                            <p style="font-size:0.9rem;margin-bottom:1.25rem;"><?php the_excerpt(); ?></p>
                            <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-link-arrow">
                                <?php echo esc_html( $cta_text ); ?>
                                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p style="color:var(--bws-text-muted);"><?php esc_html_e( 'No services found. Add your first service from the WordPress admin.', 'bluewireseo' ); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta-section' ); ?>
</main>

<?php get_footer(); ?>
