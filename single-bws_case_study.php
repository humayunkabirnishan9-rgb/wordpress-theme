<?php
/**
 * Single Case Study Template
 * BlueWireSEO — Case Study Template
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

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode ) {
            the_content();
        } else {
            $client      = get_post_meta( get_the_ID(), '_bws_client', true );
            $industry    = get_post_meta( get_the_ID(), '_bws_industry', true );
            $result      = get_post_meta( get_the_ID(), '_bws_result_metric', true );
            $data_source = get_post_meta( get_the_ID(), '_bws_data_source', true );
            $time_period = get_post_meta( get_the_ID(), '_bws_time_period', true );
            $services    = get_post_meta( get_the_ID(), '_bws_services_used', true );
            $categories  = get_the_terms( get_the_ID(), 'bws_case_category' );
            $cat_name    = ( $categories && ! is_wp_error( $categories ) ) ? $categories[0]->name : '';
            ?>

            <!-- Case Study Hero -->
            <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);padding:3rem 0 2.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="display:flex;gap:0.75rem;align-items:center;margin-top:1rem;flex-wrap:wrap;">
                        <?php if ( $cat_name ) : ?>
                            <span class="bws-eyebrow" style="font-size:0.75rem;"><?php echo esc_html( strtoupper( $cat_name ) ); ?></span>
                        <?php endif; ?>
                    </div>
                    <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3rem);margin:0.75rem 0 1rem;">
                        <?php echo $result ? esc_html( $result ) : esc_html( get_the_title() ); ?>
                    </h1>
                    <?php if ( $result && get_the_title() !== $result ) : ?>
                        <p style="font-size:1.0625rem;font-weight:600;color:var(--bws-text-secondary);margin-bottom:0.875rem;"><?php the_title(); ?></p>
                    <?php endif; ?>
                    <p class="bws-hero-subtitle"><?php the_excerpt(); ?></p>
                </div>
            </div>

            <!-- Case Study Layout -->
            <section class="bws-section-sm">
                <div class="bws-container">
                    <div class="bws-single-layout">
                        <!-- Main Content -->
                        <article class="bws-content">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div style="margin-bottom:2rem;border-radius:var(--bws-radius-lg);overflow:hidden;">
                                    <?php the_post_thumbnail( 'bws-hero' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php
                            if ( get_the_content() ) {
                                the_content();
                            } else {
                                ?>
                                <div style="padding:3rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                                    <h2 style="font-size:1.125rem;color:var(--bws-text-muted);font-weight:500;margin-bottom:0.5rem;">
                                        <?php esc_html_e( 'BlueWireSEO — Case Study Template', 'bluewireseo' ); ?>
                                    </h2>
                                    <p style="color:var(--bws-text-light);font-size:0.9rem;">
                                        <?php esc_html_e( 'Click "Edit with Elementor" to build this case study. Add your challenge, strategy, implementation, and results sections.', 'bluewireseo' ); ?>
                                    </p>
                                </div>
                                <?php
                            }
                            ?>
                        </article>

                        <!-- Sidebar -->
                        <aside class="bws-single-sidebar">
                            <?php if ( $client || $industry || $result || $data_source || $time_period || $services ) : ?>
                                <div class="bws-info-box" style="margin-bottom:1.5rem;">
                                    <h3 class="bws-info-box-title"><?php esc_html_e( 'Case Study Details', 'bluewireseo' ); ?></h3>
                                    <table class="bws-facts-table">
                                        <?php if ( $client ) : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Client', 'bluewireseo' ); ?></td>
                                                <td><?php echo esc_html( $client ); ?></td>
                                            </tr>
                                        <?php else : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Client', 'bluewireseo' ); ?></td>
                                                <td style="color:var(--bws-text-light);"><?php esc_html_e( '[PLACEHOLDER]', 'bluewireseo' ); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ( $industry ) : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Industry', 'bluewireseo' ); ?></td>
                                                <td><?php echo esc_html( $industry ); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ( $services ) : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Services', 'bluewireseo' ); ?></td>
                                                <td><?php echo esc_html( $services ); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ( $result ) : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Key Result', 'bluewireseo' ); ?></td>
                                                <td style="color:var(--bws-primary);font-weight:700;"><?php echo esc_html( $result ); ?></td>
                                            </tr>
                                        <?php else : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Key Result', 'bluewireseo' ); ?></td>
                                                <td style="color:var(--bws-text-light);"><?php esc_html_e( '[PLACEHOLDER]', 'bluewireseo' ); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ( $data_source ) : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Data Source', 'bluewireseo' ); ?></td>
                                                <td><?php echo esc_html( $data_source ); ?></td>
                                            </tr>
                                        <?php else : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Data Source', 'bluewireseo' ); ?></td>
                                                <td style="color:var(--bws-text-light);"><?php esc_html_e( '[PLACEHOLDER]', 'bluewireseo' ); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ( $time_period ) : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Time Period', 'bluewireseo' ); ?></td>
                                                <td><?php echo esc_html( $time_period ); ?></td>
                                            </tr>
                                        <?php else : ?>
                                            <tr>
                                                <td><?php esc_html_e( 'Time Period', 'bluewireseo' ); ?></td>
                                                <td style="color:var(--bws-text-light);"><?php esc_html_e( '[PLACEHOLDER]', 'bluewireseo' ); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            <?php endif; ?>

                            <div class="bws-info-box">
                                <h3 style="font-size:1rem;margin-bottom:0.875rem;"><?php esc_html_e( 'Ready to see similar results?', 'bluewireseo' ); ?></h3>
                                <p style="font-size:0.85rem;color:var(--bws-text-muted);margin-bottom:1rem;"><?php esc_html_e( 'Get a free 20-point SEO audit of your site.', 'bluewireseo' ); ?></p>
                                <a href="<?php echo esc_url( bluewireseo_get_audit_url() ); ?>" class="bws-btn bws-btn-primary" style="width:100%;justify-content:center;">
                                    <?php esc_html_e( 'Get Free Audit', 'bluewireseo' ); ?>
                                </a>
                            </div>
                        </aside>
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
