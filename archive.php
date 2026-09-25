<?php
/**
 * Archive Template
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">

    <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);">
        <div class="bws-container">
            <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            <div style="max-width:700px;margin-top:1rem;">
                <?php the_archive_description( '<p class="bws-eyebrow" style="margin-bottom:0.75rem;text-transform:uppercase;font-size:0.75rem;letter-spacing:0.1em;color:var(--bws-primary);">', '</p>' ); ?>
                <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3rem);"><?php the_archive_title(); ?></h1>
            </div>
        </div>
    </div>

    <section class="bws-section-sm">
        <div class="bws-container">
            <?php if ( have_posts() ) : ?>
                <div class="bws-grid-3">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article class="bws-blog-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="bws-blog-card-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'bws-card' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="bws-blog-card-body">
                                <div class="bws-blog-card-meta">
                                    <span class="bws-blog-card-cat"><?php the_category( ', ' ); ?></span>
                                    <span class="bws-blog-card-date"><?php echo get_the_date(); ?></span>
                                </div>
                                <h2 class="bws-blog-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p class="bws-blog-card-excerpt"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="bws-link-arrow">
                                    <?php esc_html_e( 'Read More', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <div style="margin-top:3rem;"><?php the_posts_navigation(); ?></div>
            <?php else : ?>
                <p><?php esc_html_e( 'No posts found.', 'bluewireseo' ); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta-section' ); ?>
</main>

<?php get_footer(); ?>
