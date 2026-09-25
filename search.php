<?php
/**
 * Search Results Template
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);">
        <div class="bws-container">
            <h1 class="bws-hero-title" style="font-size:clamp(1.75rem,3.5vw,2.5rem);">
                <?php
                printf(
                    esc_html__( 'Search results for: %s', 'bluewireseo' ),
                    '<span style="color:var(--bws-primary);">' . esc_html( get_search_query() ) . '</span>'
                );
                ?>
            </h1>
        </div>
    </div>

    <section class="bws-section-sm">
        <div class="bws-container">
            <?php get_search_form(); ?>

            <?php if ( have_posts() ) : ?>
                <div class="bws-grid-3" style="margin-top:2rem;">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article class="bws-blog-card">
                            <div class="bws-blog-card-body">
                                <h2 class="bws-blog-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p class="bws-blog-card-excerpt"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="bws-link-arrow">
                                    <?php esc_html_e( 'View', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php the_posts_navigation(); ?>
            <?php else : ?>
                <p style="margin-top:2rem;color:var(--bws-text-muted);">
                    <?php esc_html_e( 'No results found. Try a different search term.', 'bluewireseo' ); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
