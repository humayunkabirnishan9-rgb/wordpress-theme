<?php
/**
 * Template Name: BlueWireSEO — Portfolio Overview
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
                        <p class="bws-eyebrow"><?php esc_html_e( 'FEATURED WORK', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="font-size:clamp(2.25rem,4.5vw,3.25rem); margin-bottom:1rem;"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle" style="font-size:1.125rem; color:var(--bws-text-secondary); line-height:1.65;">
                            <?php esc_html_e( 'Explore recent client implementations across semantic search architecture, technical optimization, and multi-location rollouts.', 'bluewireseo' ); ?>
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
                        <button class="bws-filter-btn active" data-filter="all"><?php esc_html_e( 'All Projects', 'bluewireseo' ); ?></button>
                        <?php
                        $terms = get_terms( array( 'taxonomy' => 'bws_portfolio_category', 'hide_empty' => true ) );
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

                    <div class="bws-grid-3" id="bws-portfolio-grid">
                        <?php
                        $port_query = new WP_Query( array(
                            'post_type'      => 'bws_portfolio',
                            'posts_per_page' => 12,
                            'post_status'    => 'publish',
                        ) );

                        if ( $port_query->have_posts() ) :
                            while ( $port_query->have_posts() ) :
                                $port_query->the_post();
                                echo bluewireseo_portfolio_card( get_the_ID() ); // phpcs:ignore WordPress.Security.EscapeOutput
                            endwhile;
                            wp_reset_postdata();
                        else :
                            // Sample portfolio project cards matching real work
                            $port_samples = array(
                                array(
                                    'title'    => 'Regional Billboard Inventory Search Engine',
                                    'client'   => 'Regional Outdoor Advertising Media',
                                    'industry' => 'OOH Advertising',
                                    'result'   => '+214% Organic Impressions',
                                    'desc'     => 'Designed and deployed multi-city inventory catalog architecture indexing over 400 billboard locations across 8 distinct US metro areas.',
                                ),
                                array(
                                    'title'    => 'B2B Equipment Service Authority Architecture',
                                    'client'   => 'Commercial Facility Solutions',
                                    'industry' => 'B2B Services',
                                    'result'   => '38 Inbound RFPs / Month',
                                    'desc'     => 'Migrated unstructured blog articles into high-converting commercial service silos with validated Schema.org Service graphs.',
                                ),
                                array(
                                    'title'    => 'Multi-Market Transit Fleet Directory',
                                    'client'   => 'Metro Transit Media Network',
                                    'industry' => 'Transit Advertising',
                                    'result'   => '84 Ranked Market Landing Pages',
                                    'desc'     => 'Resolved severe keyword cannibalization across duplicate location pages by establishing city-specific geo entity signals.',
                                ),
                            );

                            foreach ( $port_samples as $item ) :
                            ?>
                            <article class="bws-case-card bws-portfolio-card">
                                <div class="bws-case-card-tags">
                                    <span class="bws-card-tag tag-b2b"><?php echo esc_html( $item['industry'] ); ?></span>
                                </div>
                                <h3 class="bws-case-card-title"><?php echo esc_html( $item['title'] ); ?></h3>
                                <p class="bws-case-card-subtitle"><?php echo esc_html( sprintf( __( 'Client: %s', 'bluewireseo' ), $item['client'] ) ); ?></p>
                                <p class="bws-case-card-desc"><?php echo esc_html( $item['desc'] ); ?></p>
                                <div style="margin-bottom:1rem; padding:0.5rem 0.75rem; background:var(--bws-primary-light); border-radius:var(--bws-radius-sm); font-size:0.875rem; color:var(--bws-primary-dark); font-weight:600;">
                                    <?php echo esc_html( $item['result'] ); ?>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bws-link-arrow">
                                    <?php esc_html_e( 'Discuss Similar Project', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </a>
                            </article>
                            <?php
                            endforeach;
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
