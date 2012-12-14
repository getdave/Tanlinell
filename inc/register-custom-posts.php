<?php 
/**
 * Register custom posts type for the theme
 *
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

/**
 * Homepage slider - post_type: "slider"
 *
 * Custom post for feature slider commonly implemented on the Homepage of the website.
 */

add_action( 'init', 'tanlinell_register_cpt_homepage_slider' );

function tanlinell_register_cpt_homepage_slider() {

	$labels = array(
			'name' => _x( 'Slides', 'slide' ),
			'singular_name' => _x( 'Slide', 'slide' ),
			'add_new' => _x( 'Add New', 'slide' ),
			'add_new_item' => _x( 'Add New Slide', 'slide' ),
			'edit_item' => _x( 'Edit Slide', 'slide' ),
			'new_item' => _x( 'New Slide', 'slide' ),
			'view_item' => _x( 'View Slide', 'slide' ),
			'search_items' => _x( 'Search Slides', 'slide' ),
			'not_found' => _x( 'No slides found', 'slide' ),
			'not_found_in_trash' => _x( 'No slides found in Trash', 'slide' ),
			'parent_item_colon' => _x( 'Parent Slide:', 'slide' ),
			'menu_name' => _x( 'Homepage Slider', 'slide' ),
	);

	$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'menu_icon' => get_template_directory_uri() . '/images/cpt-icons/application-image.png',  // Icon Path
	);

	register_post_type( 'slide', $args );
	flush_rewrite_rules();
}





