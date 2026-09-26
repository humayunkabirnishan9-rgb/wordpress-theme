<?php
/**
 * Custom Post Types: Services, Case Studies, Industries
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Custom Post Types
 */
function bluewireseo_register_post_types() {

    // ============================
    // SERVICES CPT
    // ============================
    $service_labels = array(
        'name'                  => _x( 'Services', 'Post Type General Name', 'bluewireseo' ),
        'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'bluewireseo' ),
        'menu_name'             => __( 'Services', 'bluewireseo' ),
        'name_admin_bar'        => __( 'Service', 'bluewireseo' ),
        'archives'              => __( 'Service Archives', 'bluewireseo' ),
        'attributes'            => __( 'Service Attributes', 'bluewireseo' ),
        'all_items'             => __( 'All Services', 'bluewireseo' ),
        'add_new_item'          => __( 'Add New Service', 'bluewireseo' ),
        'add_new'               => __( 'Add New', 'bluewireseo' ),
        'new_item'              => __( 'New Service', 'bluewireseo' ),
        'edit_item'             => __( 'Edit Service', 'bluewireseo' ),
        'update_item'           => __( 'Update Service', 'bluewireseo' ),
        'view_item'             => __( 'View Service', 'bluewireseo' ),
        'view_items'            => __( 'View Services', 'bluewireseo' ),
        'search_items'          => __( 'Search Services', 'bluewireseo' ),
        'not_found'             => __( 'No services found.', 'bluewireseo' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'bluewireseo' ),
        'featured_image'        => __( 'Service Feature Image', 'bluewireseo' ),
        'set_featured_image'    => __( 'Set feature image', 'bluewireseo' ),
        'remove_featured_image' => __( 'Remove feature image', 'bluewireseo' ),
        'use_featured_image'    => __( 'Use as feature image', 'bluewireseo' ),
        'insert_into_item'      => __( 'Insert into service', 'bluewireseo' ),
        'uploaded_to_this_item' => __( 'Uploaded to this service', 'bluewireseo' ),
    );

    $service_args = array(
        'label'               => __( 'Service', 'bluewireseo' ),
        'description'         => __( 'BlueWireSEO Services', 'bluewireseo' ),
        'labels'              => $service_labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
        'taxonomies'          => array( 'bws_service_category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-chart-line',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => 'services',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => array( 'slug' => 'services', 'with_front' => false ),
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type( 'bws_service', $service_args );

    // ============================
    // CASE STUDIES CPT
    // ============================
    $case_study_labels = array(
        'name'                  => _x( 'Case Studies', 'Post Type General Name', 'bluewireseo' ),
        'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'bluewireseo' ),
        'menu_name'             => __( 'Case Studies', 'bluewireseo' ),
        'name_admin_bar'        => __( 'Case Study', 'bluewireseo' ),
        'archives'              => __( 'Case Study Archives', 'bluewireseo' ),
        'all_items'             => __( 'All Case Studies', 'bluewireseo' ),
        'add_new_item'          => __( 'Add New Case Study', 'bluewireseo' ),
        'add_new'               => __( 'Add New', 'bluewireseo' ),
        'new_item'              => __( 'New Case Study', 'bluewireseo' ),
        'edit_item'             => __( 'Edit Case Study', 'bluewireseo' ),
        'update_item'           => __( 'Update Case Study', 'bluewireseo' ),
        'view_item'             => __( 'View Case Study', 'bluewireseo' ),
        'view_items'            => __( 'View Case Studies', 'bluewireseo' ),
        'search_items'          => __( 'Search Case Studies', 'bluewireseo' ),
        'not_found'             => __( 'No case studies found.', 'bluewireseo' ),
        'not_found_in_trash'    => __( 'No case studies found in Trash.', 'bluewireseo' ),
        'featured_image'        => __( 'Case Study Feature Image', 'bluewireseo' ),
        'set_featured_image'    => __( 'Set feature image', 'bluewireseo' ),
        'remove_featured_image' => __( 'Remove feature image', 'bluewireseo' ),
        'use_featured_image'    => __( 'Use as feature image', 'bluewireseo' ),
    );

    $case_study_args = array(
        'label'               => __( 'Case Study', 'bluewireseo' ),
        'description'         => __( 'BlueWireSEO Case Studies', 'bluewireseo' ),
        'labels'              => $case_study_labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
        'taxonomies'          => array( 'bws_case_category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-media-document',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => 'case-studies',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => array( 'slug' => 'case-studies', 'with_front' => false ),
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type( 'bws_case_study', $case_study_args );

    // ============================
    // INDUSTRIES CPT
    // ============================
    $industry_labels = array(
        'name'                  => _x( 'Industries', 'Post Type General Name', 'bluewireseo' ),
        'singular_name'         => _x( 'Industry', 'Post Type Singular Name', 'bluewireseo' ),
        'menu_name'             => __( 'Industries', 'bluewireseo' ),
        'name_admin_bar'        => __( 'Industry', 'bluewireseo' ),
        'archives'              => __( 'Industry Archives', 'bluewireseo' ),
        'all_items'             => __( 'All Industries', 'bluewireseo' ),
        'add_new_item'          => __( 'Add New Industry', 'bluewireseo' ),
        'add_new'               => __( 'Add New', 'bluewireseo' ),
        'new_item'              => __( 'New Industry', 'bluewireseo' ),
        'edit_item'             => __( 'Edit Industry', 'bluewireseo' ),
        'update_item'           => __( 'Update Industry', 'bluewireseo' ),
        'view_item'             => __( 'View Industry', 'bluewireseo' ),
        'view_items'            => __( 'View Industries', 'bluewireseo' ),
        'search_items'          => __( 'Search Industries', 'bluewireseo' ),
        'not_found'             => __( 'No industries found.', 'bluewireseo' ),
        'not_found_in_trash'    => __( 'No industries found in Trash.', 'bluewireseo' ),
        'featured_image'        => __( 'Industry Feature Image', 'bluewireseo' ),
    );

    $industry_args = array(
        'label'               => __( 'Industry', 'bluewireseo' ),
        'description'         => __( 'BlueWireSEO Industries', 'bluewireseo' ),
        'labels'              => $industry_labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
        'taxonomies'          => array( 'bws_industry_category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-building',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => 'industries',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => array( 'slug' => 'industries', 'with_front' => false ),
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type( 'bws_industry', $industry_args );

    // ============================
    // PORTFOLIO CPT
    // ============================
    $portfolio_labels = array(
        'name'                  => _x( 'Portfolio', 'Post Type General Name', 'bluewireseo' ),
        'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'bluewireseo' ),
        'menu_name'             => __( 'Portfolio', 'bluewireseo' ),
        'name_admin_bar'        => __( 'Portfolio Item', 'bluewireseo' ),
        'archives'              => __( 'Portfolio Archives', 'bluewireseo' ),
        'all_items'             => __( 'All Portfolio Items', 'bluewireseo' ),
        'add_new_item'          => __( 'Add New Project', 'bluewireseo' ),
        'add_new'               => __( 'Add New', 'bluewireseo' ),
        'new_item'              => __( 'New Portfolio Item', 'bluewireseo' ),
        'edit_item'             => __( 'Edit Portfolio Item', 'bluewireseo' ),
        'update_item'           => __( 'Update Portfolio Item', 'bluewireseo' ),
        'view_item'             => __( 'View Project', 'bluewireseo' ),
        'view_items'            => __( 'View Projects', 'bluewireseo' ),
        'search_items'          => __( 'Search Portfolio', 'bluewireseo' ),
        'not_found'             => __( 'No portfolio items found.', 'bluewireseo' ),
        'not_found_in_trash'    => __( 'No portfolio items found in Trash.', 'bluewireseo' ),
        'featured_image'        => __( 'Project Feature Image', 'bluewireseo' ),
        'set_featured_image'    => __( 'Set feature image', 'bluewireseo' ),
        'remove_featured_image' => __( 'Remove feature image', 'bluewireseo' ),
        'use_featured_image'    => __( 'Use as feature image', 'bluewireseo' ),
    );

    $portfolio_args = array(
        'label'               => __( 'Portfolio', 'bluewireseo' ),
        'description'         => __( 'BlueWireSEO Portfolio Projects', 'bluewireseo' ),
        'labels'              => $portfolio_labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
        'taxonomies'          => array( 'bws_portfolio_category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 8,
        'menu_icon'           => 'dashicons-portfolio',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => 'portfolio',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => array( 'slug' => 'portfolio', 'with_front' => false ),
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type( 'bws_portfolio', $portfolio_args );
}
add_action( 'init', 'bluewireseo_register_post_types' );

/**
 * Register Custom Taxonomies
 */
function bluewireseo_register_taxonomies() {

    // Service Category
    register_taxonomy( 'bws_service_category', array( 'bws_service' ), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Service Categories', 'taxonomy general name', 'bluewireseo' ),
            'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'bluewireseo' ),
            'search_items'      => __( 'Search Service Categories', 'bluewireseo' ),
            'all_items'         => __( 'All Service Categories', 'bluewireseo' ),
            'parent_item'       => __( 'Parent Service Category', 'bluewireseo' ),
            'parent_item_colon' => __( 'Parent Service Category:', 'bluewireseo' ),
            'edit_item'         => __( 'Edit Service Category', 'bluewireseo' ),
            'update_item'       => __( 'Update Service Category', 'bluewireseo' ),
            'add_new_item'      => __( 'Add New Service Category', 'bluewireseo' ),
            'new_item_name'     => __( 'New Service Category Name', 'bluewireseo' ),
            'menu_name'         => __( 'Service Categories', 'bluewireseo' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'service-category' ),
        'show_in_rest'      => true,
    ) );

    // Case Study Category
    register_taxonomy( 'bws_case_category', array( 'bws_case_study' ), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Case Study Categories', 'taxonomy general name', 'bluewireseo' ),
            'singular_name'     => _x( 'Case Study Category', 'taxonomy singular name', 'bluewireseo' ),
            'search_items'      => __( 'Search Categories', 'bluewireseo' ),
            'all_items'         => __( 'All Categories', 'bluewireseo' ),
            'edit_item'         => __( 'Edit Category', 'bluewireseo' ),
            'update_item'       => __( 'Update Category', 'bluewireseo' ),
            'add_new_item'      => __( 'Add New Category', 'bluewireseo' ),
            'new_item_name'     => __( 'New Category Name', 'bluewireseo' ),
            'menu_name'         => __( 'Categories', 'bluewireseo' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'case-category' ),
        'show_in_rest'      => true,
    ) );

    // Industry Category
    register_taxonomy( 'bws_industry_category', array( 'bws_industry' ), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Industry Categories', 'taxonomy general name', 'bluewireseo' ),
            'singular_name'     => _x( 'Industry Category', 'taxonomy singular name', 'bluewireseo' ),
            'search_items'      => __( 'Search Industry Categories', 'bluewireseo' ),
            'all_items'         => __( 'All Industry Categories', 'bluewireseo' ),
            'edit_item'         => __( 'Edit Industry Category', 'bluewireseo' ),
            'update_item'       => __( 'Update Industry Category', 'bluewireseo' ),
            'add_new_item'      => __( 'Add New Industry Category', 'bluewireseo' ),
            'new_item_name'     => __( 'New Industry Category Name', 'bluewireseo' ),
            'menu_name'         => __( 'Categories', 'bluewireseo' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'industry-category' ),
        'show_in_rest'      => true,
    ) );

    // Portfolio Category
    register_taxonomy( 'bws_portfolio_category', array( 'bws_portfolio' ), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'bluewireseo' ),
            'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'bluewireseo' ),
            'search_items'      => __( 'Search Portfolio Categories', 'bluewireseo' ),
            'all_items'         => __( 'All Portfolio Categories', 'bluewireseo' ),
            'edit_item'         => __( 'Edit Portfolio Category', 'bluewireseo' ),
            'update_item'       => __( 'Update Portfolio Category', 'bluewireseo' ),
            'add_new_item'      => __( 'Add New Portfolio Category', 'bluewireseo' ),
            'new_item_name'     => __( 'New Portfolio Category Name', 'bluewireseo' ),
            'menu_name'         => __( 'Categories', 'bluewireseo' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portfolio-category' ),
        'show_in_rest'      => true,
    ) );
}
add_action( 'init', 'bluewireseo_register_taxonomies' );

/**
 * Register Custom Meta Boxes for CPTs and Pages
 */
function bluewireseo_register_meta_boxes() {
    // Case Study meta
    add_meta_box(
        'bws_case_study_details',
        __( 'Case Study & Proof Details', 'bluewireseo' ),
        'bluewireseo_case_study_meta_box',
        'bws_case_study',
        'normal',
        'high'
    );

    // Portfolio meta
    add_meta_box(
        'bws_portfolio_details',
        __( 'Portfolio Project & Proof Details', 'bluewireseo' ),
        'bluewireseo_portfolio_meta_box',
        'bws_portfolio',
        'normal',
        'high'
    );

    // Service meta
    add_meta_box(
        'bws_service_details',
        __( 'Service Details', 'bluewireseo' ),
        'bluewireseo_service_meta_box',
        'bws_service',
        'normal',
        'high'
    );

    // Industry meta
    add_meta_box(
        'bws_industry_details',
        __( 'Industry Details', 'bluewireseo' ),
        'bluewireseo_industry_meta_box',
        'bws_industry',
        'normal',
        'high'
    );

    // Header & Hero settings for Pages, Services, Industries, Case Studies, and Portfolio
    $hero_post_types = array( 'page', 'bws_service', 'bws_industry', 'bws_case_study', 'bws_portfolio' );
    foreach ( $hero_post_types as $pt ) {
        add_meta_box(
            'bws_page_hero_details',
            __( 'Header & Hero Section Settings', 'bluewireseo' ),
            'bluewireseo_page_hero_meta_box',
            $pt,
            'normal',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'bluewireseo_register_meta_boxes' );

/**
 * Page Hero Meta Box Callback
 */
function bluewireseo_page_hero_meta_box( $post ) {
    wp_nonce_field( 'bws_page_hero_meta', 'bws_page_hero_nonce' );
    $custom_title = get_post_meta( $post->ID, '_bws_custom_hero_title', true );
    $subtitle     = get_post_meta( $post->ID, '_bws_hero_subtitle', true );
    $eyebrow      = get_post_meta( $post->ID, '_bws_hero_eyebrow', true );
    $pdf_url      = get_post_meta( $post->ID, '_bws_pdf_url', true );
    $gsc_image    = get_post_meta( $post->ID, '_bws_gsc_image', true );
    $hide_hero    = get_post_meta( $post->ID, '_bws_hide_hero', true );
    ?>
    <table class="form-table bws-meta-table">
        <tr>
            <th style="width:220px;"><label for="bws_custom_hero_title"><?php esc_html_e( 'Custom Header Title', 'bluewireseo' ); ?></label></th>
            <td>
                <input type="text" id="bws_custom_hero_title" name="bws_custom_hero_title" value="<?php echo esc_attr( $custom_title ); ?>" class="widefat" placeholder="Leave empty to use main page/post title" />
                <p class="description"><?php esc_html_e( 'Change this if you want the large banner header title to differ from the WordPress title.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="bws_hero_eyebrow"><?php esc_html_e( 'Header Eyebrow Badge', 'bluewireseo' ); ?></label></th>
            <td>
                <input type="text" id="bws_hero_eyebrow" name="bws_hero_eyebrow" value="<?php echo esc_attr( $eyebrow ); ?>" class="widefat" placeholder="e.g. CORE ARCHITECTURAL SERVICES / VERIFIED REAL RESULTS" />
                <p class="description"><?php esc_html_e( 'Small uppercase badge displayed directly above the header title.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="bws_hero_subtitle"><?php esc_html_e( 'Header Subtitle / Tagline', 'bluewireseo' ); ?></label></th>
            <td>
                <textarea id="bws_hero_subtitle" name="bws_hero_subtitle" rows="3" class="widefat" placeholder="Descriptive tagline displayed below the main header title"><?php echo esc_textarea( $subtitle ); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="bws_page_gsc_image"><?php esc_html_e( 'Search Console / Proof Image', 'bluewireseo' ); ?></label></th>
            <td>
                <div style="display:flex; gap:8px; align-items:center;">
                    <input type="url" id="bws_page_gsc_image" name="bws_gsc_image" value="<?php echo esc_attr( $gsc_image ); ?>" class="regular-text" style="flex:1;" placeholder="https://" />
                    <button type="button" class="button bws-upload-media-btn" data-target="bws_page_gsc_image" data-media-type="image" data-preview="bws_page_gsc_preview" data-title="Select Search Console Proof Screenshot" data-btn-text="Use This Image"><?php esc_html_e( 'Select / Upload Image', 'bluewireseo' ); ?></button>
                    <button type="button" class="button bws-clear-media-btn" data-target="bws_page_gsc_image" data-preview="bws_page_gsc_preview"><?php esc_html_e( 'Clear', 'bluewireseo' ); ?></button>
                </div>
                <div id="bws_page_gsc_preview" style="margin-top:6px; <?php echo empty( $gsc_image ) ? 'display:none;' : ''; ?>">
                    <?php if ( ! empty( $gsc_image ) ) : ?>
                        <div class="bws-media-preview-box"><img src="<?php echo esc_url( $gsc_image ); ?>" style="max-width:280px;height:auto;border-radius:6px;display:block;" /></div>
                    <?php endif; ?>
                </div>
                <p class="description"><?php esc_html_e( 'Upload or select a Google Search Console performance screenshot to display on this page.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="bws_page_pdf_url"><?php esc_html_e( 'Proof PDF Document URL', 'bluewireseo' ); ?></label></th>
            <td>
                <div style="display:flex; gap:8px; align-items:center;">
                    <input type="url" id="bws_page_pdf_url" name="bws_pdf_url" value="<?php echo esc_attr( $pdf_url ); ?>" class="regular-text" style="flex:1;" placeholder="https://" />
                    <button type="button" class="button bws-upload-media-btn" data-target="bws_page_pdf_url" data-media-type="application/pdf" data-preview="bws_page_pdf_preview" data-title="Select Verified Proof PDF Document" data-btn-text="Use This PDF"><?php esc_html_e( 'Select / Upload PDF', 'bluewireseo' ); ?></button>
                    <button type="button" class="button bws-clear-media-btn" data-target="bws_page_pdf_url" data-preview="bws_page_pdf_preview"><?php esc_html_e( 'Clear', 'bluewireseo' ); ?></button>
                </div>
                <div id="bws_page_pdf_preview" style="margin-top:6px; <?php echo empty( $pdf_url ) ? 'display:none;' : ''; ?>">
                    <?php if ( ! empty( $pdf_url ) ) : ?>
                        <div style="padding:6px 12px;background:#F0F9FF;border:1px solid #BAE6FD;border-radius:6px;display:inline-flex;align-items:center;gap:6px;font-size:12px;color:#0369A1;">
                            <strong>PDF Selected:</strong> <?php echo esc_html( basename( parse_url( $pdf_url, PHP_URL_PATH ) ) ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <p class="description"><?php esc_html_e( 'Upload your proof PDF report in Media Library to display a verified download badge.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="bws_hide_hero"><?php esc_html_e( 'Hide Default Template Hero', 'bluewireseo' ); ?></label></th>
            <td>
                <label>
                    <input type="checkbox" id="bws_hide_hero" name="bws_hide_hero" value="1" <?php checked( $hide_hero, '1' ); ?> />
                    <?php esc_html_e( 'Check this box if you prefer to build a 100% custom hero banner using the WordPress block editor or Elementor.', 'bluewireseo' ); ?>
                </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Case Study Meta Box Callback
 */
function bluewireseo_case_study_meta_box( $post ) {
    wp_nonce_field( 'bws_case_study_meta', 'bws_case_study_nonce' );
    $client       = get_post_meta( $post->ID, '_bws_client', true );
    $industry     = get_post_meta( $post->ID, '_bws_industry', true );
    $result       = get_post_meta( $post->ID, '_bws_result_metric', true );
    $data_source  = get_post_meta( $post->ID, '_bws_data_source', true );
    $time_period  = get_post_meta( $post->ID, '_bws_time_period', true );
    $services_used = get_post_meta( $post->ID, '_bws_services_used', true );
    $custom_title = get_post_meta( $post->ID, '_bws_custom_hero_title', true );
    $subtitle     = get_post_meta( $post->ID, '_bws_hero_subtitle', true );
    $eyebrow      = get_post_meta( $post->ID, '_bws_hero_eyebrow', true );
    $pdf_url      = get_post_meta( $post->ID, '_bws_pdf_url', true );
    $gsc_image    = get_post_meta( $post->ID, '_bws_gsc_image', true );
    ?>
    <table class="form-table bws-meta-table">
        <tr>
            <th style="width:200px;"><label for="bws_custom_hero_title"><?php esc_html_e( 'Custom Header Title', 'bluewireseo' ); ?></label></th>
            <td>
                <input type="text" id="bws_custom_hero_title" name="bws_custom_hero_title" value="<?php echo esc_attr( $custom_title ); ?>" class="widefat" placeholder="Leave empty to use the post title" />
                <p class="description"><?php esc_html_e( 'Change this if you want the large header title to differ from the post title.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="bws_hero_subtitle"><?php esc_html_e( 'Header Subtitle', 'bluewireseo' ); ?></label></th>
            <td><textarea id="bws_hero_subtitle" name="bws_hero_subtitle" rows="2" class="widefat" placeholder="Leave empty to use post excerpt"><?php echo esc_textarea( $subtitle ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="bws_hero_eyebrow"><?php esc_html_e( 'Header Eyebrow Badge', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_hero_eyebrow" name="bws_hero_eyebrow" value="<?php echo esc_attr( $eyebrow ); ?>" class="widefat" placeholder="e.g. VERIFIED REAL RESULTS" /></td>
        </tr>
        <tr>
            <th><label for="bws_client"><?php esc_html_e( 'Client / Brand', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_client" name="bws_client" value="<?php echo esc_attr( $client ); ?>" class="widefat" placeholder="e.g. GlobalAir (globalair.com.bd)" /></td>
        </tr>
        <tr>
            <th><label for="bws_industry_field"><?php esc_html_e( 'Industry', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_industry_field" name="bws_industry_field" value="<?php echo esc_attr( $industry ); ?>" class="widefat" placeholder="e.g. Airport Assistance Services" /></td>
        </tr>
        <tr>
            <th><label for="bws_result_metric"><?php esc_html_e( 'Key Result / Impact Metric', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_result_metric" name="bws_result_metric" value="<?php echo esc_attr( $result ); ?>" class="widefat" placeholder="e.g. 56x Clicks / 245x Impressions" /></td>
        </tr>
        <tr>
            <th><label for="bws_data_source"><?php esc_html_e( 'Data Source', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_data_source" name="bws_data_source" value="<?php echo esc_attr( $data_source ); ?>" class="widefat" placeholder="e.g. Google Search Console (28-Day Window)" /></td>
        </tr>
        <tr>
            <th><label for="bws_time_period"><?php esc_html_e( 'Measurement Window', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_time_period" name="bws_time_period" value="<?php echo esc_attr( $time_period ); ?>" class="widefat" placeholder="e.g. May – June 2026" /></td>
        </tr>
        <tr>
            <th><label for="bws_services_used"><?php esc_html_e( 'Services Provided', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_services_used" name="bws_services_used" value="<?php echo esc_attr( $services_used ); ?>" class="widefat" placeholder="e.g. Technical SEO, Canonical Fix, Metadata & Pillar Architecture" /></td>
        </tr>
        <tr>
            <th><label for="bws_gsc_image"><?php esc_html_e( 'GSC Proof Image URL', 'bluewireseo' ); ?></label></th>
            <td>
                <div style="display:flex; gap:8px; align-items:center;">
                    <input type="url" id="bws_gsc_image" name="bws_gsc_image" value="<?php echo esc_attr( $gsc_image ); ?>" class="regular-text" style="flex:1;" placeholder="https://" />
                    <button type="button" class="button bws-upload-media-btn" data-target="bws_gsc_image" data-media-type="image" data-preview="bws_cs_gsc_preview" data-title="Select Search Console Proof Screenshot" data-btn-text="Use This Screenshot"><?php esc_html_e( 'Select / Upload Image', 'bluewireseo' ); ?></button>
                    <button type="button" class="button bws-clear-media-btn" data-target="bws_gsc_image" data-preview="bws_cs_gsc_preview"><?php esc_html_e( 'Clear', 'bluewireseo' ); ?></button>
                </div>
                <div id="bws_cs_gsc_preview" style="margin-top:6px; <?php echo empty( $gsc_image ) ? 'display:none;' : ''; ?>">
                    <?php if ( ! empty( $gsc_image ) ) : ?>
                        <div class="bws-media-preview-box"><img src="<?php echo esc_url( $gsc_image ); ?>" style="max-width:280px;height:auto;border-radius:6px;display:block;" /></div>
                    <?php endif; ?>
                </div>
                <p class="description"><?php esc_html_e( 'Upload Search Console screenshot in Media Library or set as Featured Image.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="bws_pdf_url_cs"><?php esc_html_e( 'Proof PDF Document URL', 'bluewireseo' ); ?></label></th>
            <td>
                <div style="display:flex; gap:8px; align-items:center;">
                    <input type="url" id="bws_pdf_url_cs" name="bws_pdf_url" value="<?php echo esc_attr( $pdf_url ); ?>" class="regular-text" style="flex:1;" placeholder="https://" />
                    <button type="button" class="button bws-upload-media-btn" data-target="bws_pdf_url_cs" data-media-type="application/pdf" data-preview="bws_cs_pdf_preview" data-title="Select Case Study Master Plan PDF" data-btn-text="Use This PDF"><?php esc_html_e( 'Select / Upload PDF', 'bluewireseo' ); ?></button>
                    <button type="button" class="button bws-clear-media-btn" data-target="bws_pdf_url_cs" data-preview="bws_cs_pdf_preview"><?php esc_html_e( 'Clear', 'bluewireseo' ); ?></button>
                </div>
                <div id="bws_cs_pdf_preview" style="margin-top:6px; <?php echo empty( $pdf_url ) ? 'display:none;' : ''; ?>">
                    <?php if ( ! empty( $pdf_url ) ) : ?>
                        <div style="padding:6px 12px;background:#F0F9FF;border:1px solid #BAE6FD;border-radius:6px;display:inline-flex;align-items:center;gap:6px;font-size:12px;color:#0369A1;">
                            <strong>PDF Selected:</strong> <?php echo esc_html( basename( parse_url( $pdf_url, PHP_URL_PATH ) ) ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <p class="description"><?php esc_html_e( 'Upload case study master plan PDF in Media Library and click Select / Upload PDF.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Service Meta Box Callback
 */
function bluewireseo_service_meta_box( $post ) {
    wp_nonce_field( 'bws_service_meta', 'bws_service_nonce' );
    $category    = get_post_meta( $post->ID, '_bws_service_category_label', true );
    $cta_url     = get_post_meta( $post->ID, '_bws_service_cta_url', true );
    $cta_text    = get_post_meta( $post->ID, '_bws_service_cta_text', true );
    $icon        = get_post_meta( $post->ID, '_bws_service_icon', true );
    ?>
    <table class="form-table bws-meta-table">
        <tr>
            <th><label for="bws_service_category_label"><?php esc_html_e( 'Category Label', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_service_category_label" name="bws_service_category_label" value="<?php echo esc_attr( $category ); ?>" class="widefat" placeholder="e.g. SEO Service" /></td>
        </tr>
        <tr>
            <th><label for="bws_service_cta_text"><?php esc_html_e( 'CTA Button Text', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_service_cta_text" name="bws_service_cta_text" value="<?php echo esc_attr( $cta_text ); ?>" class="widefat" placeholder="Get Free Audit" /></td>
        </tr>
        <tr>
            <th><label for="bws_service_cta_url"><?php esc_html_e( 'CTA Button URL', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_service_cta_url" name="bws_service_cta_url" value="<?php echo esc_attr( $cta_url ); ?>" class="widefat" placeholder="https://" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Industry Meta Box Callback
 */
function bluewireseo_industry_meta_box( $post ) {
    wp_nonce_field( 'bws_industry_meta', 'bws_industry_nonce' );
    $badge    = get_post_meta( $post->ID, '_bws_industry_badge', true );
    $cta_url  = get_post_meta( $post->ID, '_bws_industry_cta_url', true );
    $cta_text = get_post_meta( $post->ID, '_bws_industry_cta_text', true );
    ?>
    <table class="form-table bws-meta-table">
        <tr>
            <th><label for="bws_industry_badge"><?php esc_html_e( 'Badge Label', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_industry_badge" name="bws_industry_badge" value="<?php echo esc_attr( $badge ); ?>" class="widefat" placeholder="e.g. Flagship" /></td>
        </tr>
        <tr>
            <th><label for="bws_industry_cta_text"><?php esc_html_e( 'CTA Button Text', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_industry_cta_text" name="bws_industry_cta_text" value="<?php echo esc_attr( $cta_text ); ?>" class="widefat" placeholder="See Industry SEO" /></td>
        </tr>
        <tr>
            <th><label for="bws_industry_cta_url"><?php esc_html_e( 'CTA URL', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_industry_cta_url" name="bws_industry_cta_url" value="<?php echo esc_attr( $cta_url ); ?>" class="widefat" placeholder="https://" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Portfolio Meta Box Callback
 */
function bluewireseo_portfolio_meta_box( $post ) {
    wp_nonce_field( 'bws_portfolio_meta', 'bws_portfolio_nonce' );
    $client       = get_post_meta( $post->ID, '_bws_client', true );
    $industry     = get_post_meta( $post->ID, '_bws_industry', true );
    $services     = get_post_meta( $post->ID, '_bws_services_used', true );
    $external_url = get_post_meta( $post->ID, '_bws_external_url', true );
    $result       = get_post_meta( $post->ID, '_bws_result_metric', true );
    $project_date = get_post_meta( $post->ID, '_bws_project_date', true );
    $custom_title = get_post_meta( $post->ID, '_bws_custom_hero_title', true );
    $subtitle     = get_post_meta( $post->ID, '_bws_hero_subtitle', true );
    $eyebrow      = get_post_meta( $post->ID, '_bws_hero_eyebrow', true );
    $pdf_url      = get_post_meta( $post->ID, '_bws_pdf_url', true );
    $gsc_image    = get_post_meta( $post->ID, '_bws_gsc_image', true );
    ?>
    <table class="form-table bws-meta-table">
        <tr>
            <th style="width:200px;"><label for="bws_port_custom_hero_title"><?php esc_html_e( 'Custom Header Title', 'bluewireseo' ); ?></label></th>
            <td>
                <input type="text" id="bws_port_custom_hero_title" name="bws_custom_hero_title" value="<?php echo esc_attr( $custom_title ); ?>" class="widefat" placeholder="Leave empty to use main post title" />
                <p class="description"><?php esc_html_e( 'Change this if you want the large header title to differ from the post title.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="bws_port_hero_subtitle"><?php esc_html_e( 'Header Subtitle', 'bluewireseo' ); ?></label></th>
            <td><textarea id="bws_port_hero_subtitle" name="bws_hero_subtitle" rows="2" class="widefat" placeholder="Leave empty to use post excerpt"><?php echo esc_textarea( $subtitle ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="bws_port_hero_eyebrow"><?php esc_html_e( 'Header Eyebrow Badge', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_port_hero_eyebrow" name="bws_hero_eyebrow" value="<?php echo esc_attr( $eyebrow ); ?>" class="widefat" placeholder="e.g. FEATURED CLIENT ENGAGEMENT" /></td>
        </tr>
        <tr>
            <th><label for="bws_port_client"><?php esc_html_e( 'Client / Brand', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_port_client" name="bws_port_client" value="<?php echo esc_attr( $client ); ?>" class="widefat" placeholder="e.g. GlobalAir (globalair.com.bd)" /></td>
        </tr>
        <tr>
            <th><label for="bws_port_industry"><?php esc_html_e( 'Industry', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_port_industry" name="bws_port_industry" value="<?php echo esc_attr( $industry ); ?>" class="widefat" placeholder="e.g. Airport Assistance Services" /></td>
        </tr>
        <tr>
            <th><label for="bws_port_services"><?php esc_html_e( 'Services Provided', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_port_services" name="bws_port_services" value="<?php echo esc_attr( $services ); ?>" class="widefat" placeholder="e.g. Technical SEO, Canonical Integrity, Content Architecture" /></td>
        </tr>
        <tr>
            <th><label for="bws_port_url"><?php esc_html_e( 'Live Website URL', 'bluewireseo' ); ?></label></th>
            <td><input type="url" id="bws_port_url" name="bws_port_url" value="<?php echo esc_attr( $external_url ); ?>" class="widefat" placeholder="https://" /></td>
        </tr>
        <tr>
            <th><label for="bws_port_result"><?php esc_html_e( 'Key Result / Impact', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_port_result" name="bws_port_result" value="<?php echo esc_attr( $result ); ?>" class="widefat" placeholder="e.g. 56x Clicks / 245x Impressions" /></td>
        </tr>
        <tr>
            <th><label for="bws_port_date"><?php esc_html_e( 'Timeline / Date', 'bluewireseo' ); ?></label></th>
            <td><input type="text" id="bws_port_date" name="bws_port_date" value="<?php echo esc_attr( $project_date ); ?>" class="widefat" placeholder="e.g. May – June 2026" /></td>
        </tr>
        <tr>
            <th><label for="bws_port_gsc_image"><?php esc_html_e( 'Proof Image / GSC Screenshot URL', 'bluewireseo' ); ?></label></th>
            <td>
                <div style="display:flex; gap:8px; align-items:center;">
                    <input type="url" id="bws_port_gsc_image" name="bws_gsc_image" value="<?php echo esc_attr( $gsc_image ); ?>" class="regular-text" style="flex:1;" placeholder="https://" />
                    <button type="button" class="button bws-upload-media-btn" data-target="bws_port_gsc_image" data-media-type="image" data-preview="bws_port_gsc_preview" data-title="Select Search Console Proof Screenshot" data-btn-text="Use This Screenshot"><?php esc_html_e( 'Select / Upload Image', 'bluewireseo' ); ?></button>
                    <button type="button" class="button bws-clear-media-btn" data-target="bws_port_gsc_image" data-preview="bws_port_gsc_preview"><?php esc_html_e( 'Clear', 'bluewireseo' ); ?></button>
                </div>
                <div id="bws_port_gsc_preview" style="margin-top:6px; <?php echo empty( $gsc_image ) ? 'display:none;' : ''; ?>">
                    <?php if ( ! empty( $gsc_image ) ) : ?>
                        <div class="bws-media-preview-box"><img src="<?php echo esc_url( $gsc_image ); ?>" style="max-width:280px;height:auto;border-radius:6px;display:block;" /></div>
                    <?php endif; ?>
                </div>
                <p class="description"><?php esc_html_e( 'Upload Search Console screenshot in Media Library or set as Featured Image.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="bws_port_pdf_url"><?php esc_html_e( 'Proof PDF Document URL', 'bluewireseo' ); ?></label></th>
            <td>
                <div style="display:flex; gap:8px; align-items:center;">
                    <input type="url" id="bws_port_pdf_url" name="bws_pdf_url" value="<?php echo esc_attr( $pdf_url ); ?>" class="regular-text" style="flex:1;" placeholder="https://" />
                    <button type="button" class="button bws-upload-media-btn" data-target="bws_port_pdf_url" data-media-type="application/pdf" data-preview="bws_port_pdf_preview" data-title="Select Portfolio Proof PDF Report" data-btn-text="Use This PDF"><?php esc_html_e( 'Select / Upload PDF', 'bluewireseo' ); ?></button>
                    <button type="button" class="button bws-clear-media-btn" data-target="bws_port_pdf_url" data-preview="bws_port_pdf_preview"><?php esc_html_e( 'Clear', 'bluewireseo' ); ?></button>
                </div>
                <div id="bws_port_pdf_preview" style="margin-top:6px; <?php echo empty( $pdf_url ) ? 'display:none;' : ''; ?>">
                    <?php if ( ! empty( $pdf_url ) ) : ?>
                        <div style="padding:6px 12px;background:#F0F9FF;border:1px solid #BAE6FD;border-radius:6px;display:inline-flex;align-items:center;gap:6px;font-size:12px;color:#0369A1;">
                            <strong>PDF Selected:</strong> <?php echo esc_html( basename( parse_url( $pdf_url, PHP_URL_PATH ) ) ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <p class="description"><?php esc_html_e( 'Upload proof PDF report in Media Library and click Select / Upload PDF.', 'bluewireseo' ); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function bluewireseo_save_meta_boxes( $post_id ) {
    // Verify nonces and permissions
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Page Hero
    if ( isset( $_POST['bws_page_hero_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bws_page_hero_nonce'] ) ), 'bws_page_hero_meta' ) ) {
        if ( isset( $_POST['bws_custom_hero_title'] ) ) {
            update_post_meta( $post_id, '_bws_custom_hero_title', sanitize_text_field( wp_unslash( $_POST['bws_custom_hero_title'] ) ) );
        }
        if ( isset( $_POST['bws_hero_subtitle'] ) ) {
            update_post_meta( $post_id, '_bws_hero_subtitle', sanitize_textarea_field( wp_unslash( $_POST['bws_hero_subtitle'] ) ) );
        }
        if ( isset( $_POST['bws_hero_eyebrow'] ) ) {
            update_post_meta( $post_id, '_bws_hero_eyebrow', sanitize_text_field( wp_unslash( $_POST['bws_hero_eyebrow'] ) ) );
        }
        if ( isset( $_POST['bws_pdf_url'] ) ) {
            update_post_meta( $post_id, '_bws_pdf_url', esc_url_raw( wp_unslash( $_POST['bws_pdf_url'] ) ) );
        }
        if ( isset( $_POST['bws_gsc_image'] ) ) {
            update_post_meta( $post_id, '_bws_gsc_image', esc_url_raw( wp_unslash( $_POST['bws_gsc_image'] ) ) );
        }
        $hide_hero = isset( $_POST['bws_hide_hero'] ) ? '1' : '0';
        update_post_meta( $post_id, '_bws_hide_hero', $hide_hero );
    }

    // Case Study
    if ( isset( $_POST['bws_case_study_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bws_case_study_nonce'] ) ), 'bws_case_study_meta' ) ) {
        $fields = array(
            'bws_client'            => '_bws_client',
            'bws_industry_field'    => '_bws_industry',
            'bws_result_metric'     => '_bws_result_metric',
            'bws_data_source'       => '_bws_data_source',
            'bws_time_period'       => '_bws_time_period',
            'bws_services_used'     => '_bws_services_used',
            'bws_custom_hero_title' => '_bws_custom_hero_title',
            'bws_hero_eyebrow'      => '_bws_hero_eyebrow',
        );
        foreach ( $fields as $field => $meta_key ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
            }
        }
        if ( isset( $_POST['bws_hero_subtitle'] ) ) {
            update_post_meta( $post_id, '_bws_hero_subtitle', sanitize_textarea_field( wp_unslash( $_POST['bws_hero_subtitle'] ) ) );
        }
        if ( isset( $_POST['bws_pdf_url'] ) ) {
            update_post_meta( $post_id, '_bws_pdf_url', esc_url_raw( wp_unslash( $_POST['bws_pdf_url'] ) ) );
        }
        if ( isset( $_POST['bws_gsc_image'] ) ) {
            update_post_meta( $post_id, '_bws_gsc_image', esc_url_raw( wp_unslash( $_POST['bws_gsc_image'] ) ) );
        }
    }

    // Service
    if ( isset( $_POST['bws_service_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bws_service_nonce'] ) ), 'bws_service_meta' ) ) {
        $fields = array(
            'bws_service_category_label' => '_bws_service_category_label',
            'bws_service_cta_text'       => '_bws_service_cta_text',
            'bws_service_cta_url'        => '_bws_service_cta_url',
        );
        foreach ( $fields as $field => $meta_key ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
            }
        }
    }

    // Industry
    if ( isset( $_POST['bws_industry_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bws_industry_nonce'] ) ), 'bws_industry_meta' ) ) {
        $fields = array(
            'bws_industry_badge'    => '_bws_industry_badge',
            'bws_industry_cta_text' => '_bws_industry_cta_text',
            'bws_industry_cta_url'  => '_bws_industry_cta_url',
        );
        foreach ( $fields as $field => $meta_key ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
            }
        }
    }

    // Portfolio
    if ( isset( $_POST['bws_portfolio_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bws_portfolio_nonce'] ) ), 'bws_portfolio_meta' ) ) {
        $fields = array(
            'bws_port_client'       => '_bws_client',
            'bws_port_industry'     => '_bws_industry',
            'bws_port_services'     => '_bws_services_used',
            'bws_port_result'       => '_bws_result_metric',
            'bws_port_date'         => '_bws_project_date',
            'bws_custom_hero_title' => '_bws_custom_hero_title',
            'bws_hero_eyebrow'      => '_bws_hero_eyebrow',
        );
        foreach ( $fields as $field => $meta_key ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
            }
        }
        if ( isset( $_POST['bws_port_url'] ) ) {
            update_post_meta( $post_id, '_bws_external_url', esc_url_raw( wp_unslash( $_POST['bws_port_url'] ) ) );
        }
        if ( isset( $_POST['bws_hero_subtitle'] ) ) {
            update_post_meta( $post_id, '_bws_hero_subtitle', sanitize_textarea_field( wp_unslash( $_POST['bws_hero_subtitle'] ) ) );
        }
        if ( isset( $_POST['bws_pdf_url'] ) ) {
            update_post_meta( $post_id, '_bws_pdf_url', esc_url_raw( wp_unslash( $_POST['bws_pdf_url'] ) ) );
        }
        if ( isset( $_POST['bws_gsc_image'] ) ) {
            update_post_meta( $post_id, '_bws_gsc_image', esc_url_raw( wp_unslash( $_POST['bws_gsc_image'] ) ) );
        }
    }
}
add_action( 'save_post', 'bluewireseo_save_meta_boxes' );

/**
 * Flush rewrite rules on theme activation
 */
function bluewireseo_flush_rewrite_rules() {
    bluewireseo_register_post_types();
    bluewireseo_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bluewireseo_flush_rewrite_rules' );
