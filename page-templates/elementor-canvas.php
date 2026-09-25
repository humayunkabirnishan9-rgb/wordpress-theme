<?php
/**
 * Template Name: BlueWireSEO — Full Width (No Header/Footer)
 * Template Post Type: page, bws_service, bws_case_study, bws_industry
 *
 * Used by Elementor Pro when canvas template is selected
 *
 * @package BlueWireSEO
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main id="primary-content">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
