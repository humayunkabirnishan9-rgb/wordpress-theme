<?php
/**
 * Main template file
 * Acts as fallback for all templates
 *
 * @package BlueWireSEO
 */

get_header();

// If on site front page or if pages were deleted and no posts exist on home, render full BlueWireSEO homepage
if ( is_front_page() || ( is_home() && ! have_posts() ) ) :
    ?>
    <main id="primary-content" class="bws-main" role="main">
        <?php get_template_part( 'template-parts/page-sections/home-content' ); ?>
    </main>
    <?php
    get_footer();
    return;
endif;
?>

<main id="primary-content" class="bws-main" role="main">
    <div class="bws-container" style="padding: 3rem 1.5rem;">

        <?php if ( have_posts() ) : ?>

            <?php if ( is_home() && ! is_front_page() ) : ?>
                <header class="bws-inner-hero">
                    <h1 class="bws-hero-title"><?php esc_html_e( 'Blog & SEO Insights', 'bluewireseo' ); ?></h1>
                    <p class="bws-hero-subtitle"><?php esc_html_e( 'Strategic playbooks on semantic SEO, topical entity graphs, and technical search architecture.', 'bluewireseo' ); ?></p>
                </header>
            <?php endif; ?>

            <div class="bws-grid-3" style="margin-top:2rem;">
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

            <div style="margin-top:3rem;">
                <?php the_posts_navigation(); ?>
            </div>

        <?php else : ?>

            <div style="padding: 4rem 0; text-align:center;">
                <h2><?php esc_html_e( 'No posts found.', 'bluewireseo' ); ?></h2>
                <p><?php esc_html_e( 'Explore our core services or request a free technical SEO audit.', 'bluewireseo' ); ?></p>
                <div style="display:flex; gap:1rem; justify-content:center; margin-top:1.5rem; flex-wrap:wrap;">
                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="bws-btn bws-btn-outline">
                        <?php esc_html_e( 'Explore Services', 'bluewireseo' ); ?>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/free-seo-audit/' ) ); ?>" class="bws-btn bws-btn-primary">
                        <?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?>
                    </a>
                </div>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>
