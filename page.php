<?php
/**
 * Standard Page Template
 * Inherits full BlueWireSEO design system with complete Elementor support
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
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4rem 0 3rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.25rem); margin-top:1rem;">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </div>

            <section class="bws-section-sm" style="background:var(--bws-white); padding:3.5rem 0;">
                <div class="bws-container">
                    <div class="bws-content" style="max-width:860px; margin:0 auto; font-size:1.0625rem; line-height:1.75;">
                        <?php the_content(); ?>
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
