<?php
/**
 * Case Studies Archive Template
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
                <p class="bws-eyebrow"><?php esc_html_e( 'RESULTS', 'bluewireseo' ); ?></p>
                <h1 class="bws-hero-title" style="font-size:clamp(2rem,4.5vw,3rem);margin-top:0.5rem;"><?php esc_html_e( 'Results we can show you the source for.', 'bluewireseo' ); ?></h1>
                <p class="bws-hero-subtitle"><?php esc_html_e( 'No invented numbers. Every metric in these case studies is cited with the data source and time period. Placeholders are clearly marked — they will be replaced with verified data as engagements are completed.', 'bluewireseo' ); ?></p>
            </div>
        </div>
    </div>

    <section class="bws-section-sm">
        <div class="bws-container">
            <?php if ( have_posts() ) : ?>
                <!-- Filter Bar -->
                <div class="bws-filter-bar">
                    <button class="bws-filter-btn active" data-filter="all"><?php esc_html_e( 'All', 'bluewireseo' ); ?></button>
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
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php echo bluewireseo_case_study_card( get_the_ID() ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div style="padding:4rem;text-align:center;border:2px dashed var(--bws-border);border-radius:var(--bws-radius-lg);">
                    <h3 style="color:var(--bws-text-muted);margin-bottom:0.5rem;"><?php esc_html_e( 'No case studies yet', 'bluewireseo' ); ?></h3>
                    <p style="color:var(--bws-text-light);font-size:0.9rem;"><?php esc_html_e( 'Add your first case study from the WordPress admin. Case Studies > Add New.', 'bluewireseo' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta-section' ); ?>
</main>

<?php get_footer(); ?>
