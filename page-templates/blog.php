<?php
/**
 * Template Name: BlueWireSEO — Blog Template
 * Template Post Type: page, post, bws_portfolio, bws_case_study, bws_service, bws_industry
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
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width: 760px; margin-top: 1.25rem;">
                        <p class="bws-eyebrow" style="color: #93C5FD;"><?php esc_html_e( 'TACTICAL SEARCH INSIGHTS', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'Deep-dive architectural breakdowns, semantic entity models, and technical SEO playbooks for high-growth commercial enterprises.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <?php
                    $raw_content = get_the_content();
                    if ( ! empty( $raw_content ) && stripos( $raw_content, 'This is the' ) === false && strlen( trim( strip_tags( $raw_content ) ) ) > 15 ) :
                        echo '<div class="bws-content" style="max-width:860px; margin-bottom:3rem; font-size:1.0625rem; line-height:1.75;">';
                        the_content();
                        echo '</div>';
                    endif;
                    ?>

                    <div class="bws-grid-3" style="gap:2rem;">
                        <?php
                        $blog_query = new WP_Query( array(
                            'post_type'      => 'post',
                            'posts_per_page' => 9,
                            'post_status'    => 'publish',
                        ) );

                        if ( $blog_query->have_posts() ) :
                            while ( $blog_query->have_posts() ) :
                                $blog_query->the_post();
                                ?>
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div style="font-size:0.8rem; color:var(--bws-text-muted); margin-bottom:0.75rem;">
                                        <?php echo esc_html( get_the_date() ); ?>
                                    </div>
                                    <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">
                                        <a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a>
                                    </h3>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php the_excerpt(); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php esc_html_e( 'Read Article', 'bluewireseo' ); ?>
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </a>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            $default_posts = array(
                                array(
                                    'title' => 'Why Most SEO Agencies Fail in OOH & Billboard Advertising',
                                    'desc'  => 'Standard e-commerce and local SEO checklists fail when managing multi-city billboard face inventories. Here is the architectural model that works.',
                                ),
                                array(
                                    'title' => 'Eliminating Internal Keyword Cannibalization Across Location Pages',
                                    'desc'  => 'How Google alternates rankings between competing internal city pages, and the canonical and semantic hierarchy to permanently resolve it.',
                                ),
                                array(
                                    'title' => 'The Semantic SEO Playbook: Entity Graph Optimization for Google Knowledge Graph',
                                    'desc'  => 'Move beyond legacy keyword density. How structured entity relationships and JSON-LD schema graphs establish undeniable subject matter authority.',
                                ),
                            );

                            foreach ( $default_posts as $post_item ) :
                                ?>
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div style="font-size:0.8rem; color:var(--bws-text-muted); margin-bottom:0.75rem;">
                                        <?php echo esc_html( date( 'M d, Y' ) ); ?>
                                    </div>
                                    <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">
                                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="color:inherit; text-decoration:none;"><?php echo esc_html( $post_item['title'] ); ?></a>
                                    </h3>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php echo esc_html( $post_item['desc'] ); ?>
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php esc_html_e( 'Read Article', 'bluewireseo' ); ?>
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
            echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
            the_content();
            echo '</div>';
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
