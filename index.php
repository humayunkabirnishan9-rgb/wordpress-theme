<?php
/**
 * Main template file
 * Acts as fallback for all templates
 *
 * @package BlueWireSEO
 */

get_header();
?>

<main id="primary-content" class="bws-main" role="main">
    <div class="bws-container" style="padding: 3rem 1.5rem;">

        <?php if ( have_posts() ) : ?>

            <?php if ( is_home() && ! is_front_page() ) : ?>
                <header class="bws-inner-hero">
                    <h1 class="bws-hero-title"><?php esc_html_e( 'Blog', 'bluewireseo' ); ?></h1>
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
                <h2><?php esc_html_e( 'No content found.', 'bluewireseo' ); ?></h2>
                <p><?php esc_html_e( 'Try searching or visiting the homepage.', 'bluewireseo' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bws-btn bws-btn-primary" style="margin-top:1.5rem;">
                    <?php esc_html_e( 'Go to Homepage', 'bluewireseo' ); ?>
                </a>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>
