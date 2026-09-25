<?php
/**
 * Template Name: BlueWireSEO — Case Studies Overview
 * Template Post Type: page
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

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode && strlen( $elementor_data ) > 10 ) {
            the_content();
        } else {
            ?>
            <div class="bws-page-hero" style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:3.5rem 0 3rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:720px; margin-top:1.25rem;">
                        <p class="bws-eyebrow"><?php esc_html_e( 'RESULTS', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="font-size:clamp(2.25rem,4.5vw,3.25rem); margin-bottom:1rem;"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle" style="font-size:1.125rem; color:var(--bws-text-secondary); line-height:1.65;">
                            <?php esc_html_e( 'No invented numbers. Every metric in these case studies is cited with the data source, analytics platform, and measurement window.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section-sm">
                <div class="bws-container">
                    <?php
                    $content = get_the_content();
                    if ( ! empty( $content ) && stripos( $content, 'This is the' ) === false ) :
                        echo '<div class="bws-content" style="max-width:800px; margin-bottom:3rem;">';
                        the_content();
                        echo '</div>';
                    endif;
                    ?>

                    <!-- Filter Bar -->
                    <div class="bws-filter-bar">
                        <button class="bws-filter-btn active" data-filter="all"><?php esc_html_e( 'All Case Studies', 'bluewireseo' ); ?></button>
                        <?php
                        $terms = get_terms( array( 'taxonomy' => 'bws_case_category', 'hide_empty' => true ) );
                        if ( $terms && ! is_wp_error( $terms ) ) {
                            foreach ( $terms as $term ) {
                                printf(
                                    '<button class="bws-filter-btn" data-filter="%s">%s</button>',
                                    esc_attr( $term->slug ),
                                    esc_html( $term->name )
                                );
                            }
                        }
                        ?>
                    </div>

                    <div class="bws-grid-3" id="bws-case-grid">
                        <?php
                        $cs_query = new WP_Query( array(
                            'post_type'      => 'bws_case_study',
                            'posts_per_page' => 12,
                            'post_status'    => 'publish',
                        ) );

                        if ( $cs_query->have_posts() ) :
                            while ( $cs_query->have_posts() ) :
                                $cs_query->the_post();
                                echo bluewireseo_case_study_card( get_the_ID() ); // phpcs:ignore WordPress.Security.EscapeOutput
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
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
