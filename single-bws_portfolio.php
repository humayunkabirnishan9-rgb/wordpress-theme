<?php
/**
 * Single Portfolio Template
 * BlueWireSEO — Portfolio Item Template
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
            $client       = get_post_meta( get_the_ID(), '_bws_client', true );
            $industry     = get_post_meta( get_the_ID(), '_bws_industry', true );
            $services     = get_post_meta( get_the_ID(), '_bws_services_used', true );
            $external_url = get_post_meta( get_the_ID(), '_bws_external_url', true );
            $result       = get_post_meta( get_the_ID(), '_bws_result_metric', true );
            $project_date = get_post_meta( get_the_ID(), '_bws_project_date', true );
            $categories   = get_the_terms( get_the_ID(), 'bws_portfolio_category' );
            $cat_name     = ( $categories && ! is_wp_error( $categories ) ) ? $categories[0]->name : '';
            ?>

            <!-- Portfolio Hero -->
            <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);padding:3rem 0 2.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="display:flex;gap:0.75rem;align-items:center;margin-top:1rem;flex-wrap:wrap;">
                        <?php if ( $cat_name ) : ?>
                            <span class="bws-eyebrow" style="font-size:0.75rem;"><?php echo esc_html( strtoupper( $cat_name ) ); ?></span>
                        <?php endif; ?>
                    </div>
                    <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3rem);margin:0.75rem 0 1rem;">
                        <?php the_title(); ?>
                    </h1>
                    <?php if ( $result ) : ?>
                        <div style="display:inline-block;padding:0.4rem 0.85rem;background:var(--bws-primary-light);border-radius:var(--bws-radius-sm);color:var(--bws-primary-dark);font-weight:700;font-size:1.0625rem;margin-bottom:1rem;">
                            <?php echo esc_html( $result ); ?>
                        </div>
                    <?php endif; ?>
                    <p class="bws-hero-subtitle"><?php the_excerpt(); ?></p>
                </div>
            </div>

            <!-- Portfolio Layout -->
            <section class="bws-section-sm">
                <div class="bws-container">
                    <div class="bws-single-layout">
                        <!-- Main Content -->
                        <article class="bws-content">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div style="margin-bottom:2rem;border-radius:var(--bws-radius-lg);overflow:hidden;box-shadow:var(--bws-shadow-md);">
                                    <?php the_post_thumbnail( 'bws-hero', array( 'style' => 'width:100%;height:auto;display:block;' ) ); ?>
                                </div>
                            <?php endif; ?>

                            <?php
                            if ( get_the_content() ) {
                                the_content();
                            } else {
                                ?>
                                <div style="padding:3rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                                    <h2 style="font-size:1.125rem;color:var(--bws-text-muted);font-weight:500;margin-bottom:0.5rem;">
                                        <?php esc_html_e( 'BlueWireSEO — Portfolio Project Template', 'bluewireseo' ); ?>
                                    </h2>
                                    <p style="color:var(--bws-text-light);font-size:0.9rem;">
                                        <?php esc_html_e( 'Click "Edit with Elementor" to build this portfolio project page. Add project background, technical execution, gallery, and client results.', 'bluewireseo' ); ?>
                                    </p>
                                </div>
                                <?php
                            }
                            ?>
                        </article>

                        <!-- Sidebar -->
                        <aside class="bws-single-sidebar">
                            <div class="bws-info-box" style="margin-bottom:1.5rem;">
                                <h3 class="bws-info-box-title"><?php esc_html_e( 'Project Overview', 'bluewireseo' ); ?></h3>
                                <table class="bws-facts-table">
                                    <?php if ( $client ) : ?>
                                        <tr>
                                            <td><?php esc_html_e( 'Client', 'bluewireseo' ); ?></td>
                                            <td><?php echo esc_html( $client ); ?></td>
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
                                            <td><?php esc_html_e( 'Result', 'bluewireseo' ); ?></td>
                                            <td style="color:var(--bws-primary);font-weight:700;"><?php echo esc_html( $result ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $project_date ) : ?>
                                        <tr>
                                            <td><?php esc_html_e( 'Date', 'bluewireseo' ); ?></td>
                                            <td><?php echo esc_html( $project_date ); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ( $external_url ) : ?>
                                        <tr>
                                            <td><?php esc_html_e( 'Website', 'bluewireseo' ); ?></td>
                                            <td><a href="<?php echo esc_url( $external_url ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--bws-primary);"><?php esc_html_e( 'Visit Site &rarr;', 'bluewireseo' ); ?></a></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>

                            <div class="bws-info-box">
                                <h3 style="font-size:1rem;margin-bottom:0.875rem;"><?php esc_html_e( 'Want results like this?', 'bluewireseo' ); ?></h3>
                                <p style="font-size:0.85rem;color:var(--bws-text-muted);margin-bottom:1rem;"><?php esc_html_e( 'Get a free 20-point technical & semantic SEO audit of your website.', 'bluewireseo' ); ?></p>
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
