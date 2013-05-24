<?php
/**
 * Homepage Slides 
 *
 * Custom post for feature slider commonly implemented on the Homepage of the website.
 */

add_action( 'init', 'tanlinell_register_cpt_homepage_slider' );

function tanlinell_register_cpt_homepage_slider() {

	$labels = array(
			'name' => _x( 'Homepage Slides', 'homepage_slides' ),
			'singular_name' => _x( 'Homepage Slide', 'homepage_slides' ),
			'add_new' => _x( 'Add New', 'homepage_slides' ),
			'add_new_item' => _x( 'Add New Slide', 'homepage_slides' ),
			'edit_item' => _x( 'Edit Slide', 'homepage_slides' ),
			'new_item' => _x( 'New Slide', 'homepage_slides' ),
			'view_item' => _x( 'View Slide', 'homepage_slides' ),
			'search_items' => _x( 'Search Homepage Slides', 'homepage_slides' ),
			'not_found' => _x( 'No Homepage Slides found', 'homepage_slides' ),
			'not_found_in_trash' => _x( 'No Homepage Slides found in Trash', 'homepage_slides' ),
			'parent_item_colon' => _x( 'Parent Slide:', 'homepage_slides' ),
			'menu_name' => _x( 'Homepage Slides', 'homepage_slides' ),
	);

	$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'has_archive' => false,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'menu_icon' => get_template_directory_uri() . '/assets/images/cpt-icons/application-image.png',  // Icon Path
	);

	register_post_type( 'homepage_slides', $args );
	
}


/**
 * Homepage Slide Featured Image Customisation
 *
 * Customises the wording and positioning of the Featured Image box for the module
 */

function tanlinell_homepage_slides_photo_box() {
	// Get rid of standard "Featured Image"
	remove_meta_box( 'postimagediv', 'homepage_slides', 'side' );

	// Because we register it with the same ID (param 1) it retains all standard "Featured Image" functionality - winning!
	add_meta_box('postimagediv', 'Slide Image', 'post_thumbnail_meta_box', 'homepage_slides', 'normal', 'high');		
}
add_action('do_meta_boxes', 'tanlinell_homepage_slides_photo_box');



/**
 * Homepage Slide Custom Meta Box
 *
 * Create ability to assign links to the slide
 */

global $custom_metabox;
$custom_metabox = $simple_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_slide_link',
	'title' => 'Slide Link',
	'template' => get_stylesheet_directory() . '/modules/homepage-slider/slide-link-layout.php',
	'types' => array('homepage_slides'),
	'mode' => WPALCHEMY_MODE_EXTRACT
));
?>