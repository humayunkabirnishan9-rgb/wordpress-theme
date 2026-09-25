<?php
/**
 * Template Name: BlueWireSEO — Blog Template
 * Template Post Type: page
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
                <p class="bws-eyebrow"><?php esc_html_e( 'SEO INSIGHTS', 'bluewireseo' ); ?></p>
                <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3rem);"><?php esc_html_e( 'SEO Insights for OOH and B2B.', 'bluewireseo' ); ?></h1>
                <p class="bws-hero-subtitle"><?php esc_html_e( 'Practical SEO content for outdoor advertising companies and B2B service businesses.', 'bluewireseo' ); ?></p>
            </div>
        </div>
    </div>

    <section class="bws-section-sm">
        <div class="bws-container">
            <?php
            $blog_query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 12,
                'post_status'    => 'publish',
                'paged'          => max( 1, get_query_var( 'paged' ) ),
            ) );

            if ( $blog_query->have_posts() ) :
                echo '<div class="bws-grid-3">';
                while ( $blog_query->have_posts() ) :
                    $blog_query->the_post();
                    ?>
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
                    <?php
                endwhile;
                echo '</div>';
                wp_reset_postdata();
            else :
                ?>
                <div style="padding:4rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                    <h3 style="color:var(--bws-text-muted);margin-bottom:0.5rem;"><?php esc_html_e( 'No blog posts yet', 'bluewireseo' ); ?></h3>
                    <p style="color:var(--bws-text-light);font-size:0.9rem;"><?php esc_html_e( 'Create your first post from Posts > Add New in the WordPress admin.', 'bluewireseo' ); ?></p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta-section' ); ?>
</main>

<?php get_footer(); ?>
