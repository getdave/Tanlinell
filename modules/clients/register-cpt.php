<?php
/**
 *
 * Register CPT: Clients
 *
 */

add_action( 'init', 'tanlinell_register_cpt_clients' );

function tanlinell_register_cpt_clients() {
	
	$name 		= 'Clients';
	$singular 	= 'Client';
	$slug 		= 'clients';
	
	$labels = array(
			'name' => _x( $name, $slug ),
			'singular_name' => _x( $name, $slug),
			'add_new' => _x( 'Add New', $slug),
			'add_new_item' => _x( 'Add New '.$singular, $slug),
			'edit_item' => _x( 'Edit '.$singular, $slug),
			'new_item' => _x( 'New '.$singular, $slug),
			'view_item' => _x( 'View '.$name, $slug),
			'search_items' => _x( 'Search '.$name, $slug),
			'not_found' => _x( 'No '.$name.' found', $slug),
			'not_found_in_trash' => _x( 'No '.$name.' found in Trash', $slug),
			'parent_item_colon' => _x( 'Parent '.$singular.':', $slug),
			'menu_name' => _x( $name, $slug),
	);

	$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => false,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => array('slug'=>$slug,'with_front'=>false),
			'capability_type' => 'post',	
			'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/cpt-icons/folder-network.png',  // Icon Path
	);

	register_post_type( $slug, $args );
	flush_rewrite_rules();
}

/**
 * Assign Taxonomy
 */
add_action( 'init', 'assign_clients_taxonomies' );
function assign_clients_taxonomies() {  
	register_taxonomy_for_object_type( 'service_types', 'clients' );
}



/**
 * Featured Image Customisation
 *
 * Customises the wording and positioning of the Featured Image box for the module
 */

function tanlinell_clients_photo_box() {
	// Get rid of standard "Featured Image"
	remove_meta_box( 'postimagediv', 'clients', 'side' );

	// Because we register it with the same ID (param 1) it retains all standard "Featured Image" functionality - winning!
	add_meta_box('postimagediv', 'Client Logo', 'post_thumbnail_meta_box', 'clients', 'side');		
}
add_action('do_meta_boxes', 'tanlinell_clients_photo_box');


/**
 * Meta Box
 *
 * Create meta box to take in details
 */

global $clients_metabox;
$clients_metabox = $simple_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_clients_details',
	'title' => 'Client Details',
	'template' => get_stylesheet_directory() . '/modules/clients/clients-meta.php',
	'types' => array('clients'),
	'priority' => 'low',
	'context' => 'side',
	'mode' => WPALCHEMY_MODE_EXTRACT
));
/**
 * Meta Box SLIDES
 *
 * Create meta box to take in SLIDES
 */

global $clients_slides_metabox;
$clients_slides_metabox = $simple_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_clients_slides',
	'title' => 'Client Slides',
	'template' => get_stylesheet_directory() . '/modules/clients/clients-slides-meta.php',
	'types' => array('clients'),
	'priority' => 'low',
	'context' => 'normal',
	'mode' => WPALCHEMY_MODE_EXTRACT
));


/**
 * Remove defaults
 *
 */

function tanlinell_clients_remove_defaults() {
	
	remove_meta_box( 'hybrid-core-post-template', 'clients', 'side' );
	remove_meta_box( 'theme-layouts-post-meta-box', 'clients', 'side' );
}
add_action('do_meta_boxes', 'tanlinell_clients_remove_defaults');



/**
 * Custom Page
 *
 * This allows us to have page ready -> effectively archive of the cpt
 */
function tanlinell_clients_create_page() {

	// Initialize the page ID to -1. This indicates no action has been taken.
	$post_id = -1;

	// Setup the author, slug, and title for the post
	$author_id = 1;
	$slug = 'clients-list';
	$title = 'Clients';

	// If the page doesn't already exist, then create it
	if( null == get_page_by_title( $title ) ) {

		// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'comment_status'=>	'closed',
				'ping_status'	=>	'closed',
				'post_author'	=>	$author_id,
				'post_name'		=>	$slug,
				'post_title'	=>	$title,
				'post_status'	=>	'publish',
				'post_type'		=>	'page'
			)
		);

	// Otherwise, we'll stop
	} else {

    		// Arbitrarily use -2 to indicate that the page with the title already exists
    		$post_id = -2;

	} // end if

} // end programmatically_create_post
add_filter( 'init', 'tanlinell_clients_create_page' );


/**
 * CPT Page - Templating
 *
 * Assign templates for our cpt
 */
function tanlinell_clients_set_template( $template ) {
	
	global $post;
	
	if( is_singular('clients') ) {
		$template = get_stylesheet_directory() . '/modules/clients/clients_single.php';
	} elseif ( is_page('clients-list') ) {
		$template = get_stylesheet_directory() . '/modules/clients/clients_list.php';
	}

	return $template;		
}
add_filter('template_include', 'tanlinell_clients_set_template' );
?>