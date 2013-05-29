<?php
/**
 * Homepage Slides 
 *
 * Custom post for feature slider commonly implemented on the Homepage of the website.
 */

add_action( 'init', 'tanlinell_register_cpt_our_team' );

function tanlinell_register_cpt_our_team() {
	
	
	
	$labels = array(
			'name' => _x( 'Our Team', 'our-team' ),
			'singular_name' => _x( 'Our Team', 'our-team' ),
			'add_new' => _x( 'Add New', 'our-team' ),
			'add_new_item' => _x( 'Add New Member', 'our-team' ),
			'edit_item' => _x( 'Edit Member', 'our-team' ),
			'new_item' => _x( 'New Member', 'our-team' ),
			'view_item' => _x( 'View Members', 'our-team' ),
			'search_items' => _x( 'Search Members', 'our-team' ),
			'not_found' => _x( 'No Members found', 'our-team' ),
			'not_found_in_trash' => _x( 'No Members found in Trash', 'our-team' ),
			'parent_item_colon' => _x( 'Parent Member:', 'our-team' ),
			'menu_name' => _x( 'Our Team', 'our-team' ),
	);

	$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'thumbnail'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => false,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => array('slug'=>'meet-the-team','with_front'=>false),
			'capability_type' => 'post',
			'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/cpt-icons/members.png',  // Icon Path
	);

	register_post_type( 'our-team', $args );
	
	flush_rewrite_rules();
}




/**
 * OUR TEAM Featured Image Customisation
 *
 * Customises the wording and positioning of the Featured Image box for the module
 */

function tanlinell_our_team_photo_box() {
	// Get rid of standard "Featured Image"
	remove_meta_box( 'postimagediv', 'our-team', 'side' );

	// Because we register it with the same ID (param 1) it retains all standard "Featured Image" functionality - winning!
	add_meta_box('postimagediv', 'Team Image', 'post_thumbnail_meta_box', 'our-team', 'normal', 'high');		
}
add_action('do_meta_boxes', 'tanlinell_our_team_photo_box');


/**
 * Team Member Details Meta Box
 *
 * Create meta box to take in details
 */

global $our_team_metabox;
$our_team_metabox = $simple_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_team_details',
	'title' => 'Team Member Details',
	'template' => get_stylesheet_directory() . '/modules/our-team/team-details-layout.php',
	'types' => array('our-team'),
	'priority' => 'low',
	'context' => 'side',
	'mode' => WPALCHEMY_MODE_EXTRACT
));



/**
 * Team Member Remove defaults
 *
 */

function tanlinell_our_team_remove_defaults() {
	
	remove_meta_box( 'hybrid-core-post-template', 'our-team', 'side' );
	remove_meta_box( 'theme-layouts-post-meta-box', 'our-team', 'side' );
}
add_action('do_meta_boxes', 'tanlinell_our_team_remove_defaults');



/**
 * Team Member Custom Taxonomies
 *
 * Create a taxonomoy for e.g. departments/role
 */
function build_taxonomies() {  
	register_taxonomy(  
		'departments_roles',  
		'our-team',  
		array(  
		    'hierarchical' => true,  
		    'label' => 'Departments/Roles',  
		    'query_var' => true,  
		    'rewrite' => array('slug'=>'departments','with_front'=>true),
		    'show_in_nav_menus' => false,
		)  
	);
}
add_action( 'init', 'build_taxonomies', 0 );


/**
 * Team Members Custom Page
 *
 * This allows us to have page ready -> effectively archive of our-team
 */
function tanlinell_our_team_create_page() {

	// Initialize the page ID to -1. This indicates no action has been taken.
	$post_id = -1;

	// Setup the author, slug, and title for the post
	$author_id = 1;
	$slug = 'meet-the-team';
	$title = 'Meet the Team';

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
add_filter( 'init', 'tanlinell_our_team_create_page' );


/**
 * Team Members Custom Page - Templating
 *
 * Assign templates for our cpt
 */
function tanlinell_our_team_set_template( $template ) {
	
	global $post;
	
	if( is_singular('our-team') ) {
		$template = get_stylesheet_directory() . '/modules/our-team/ot_single.php';
	} elseif ( has_term('','departments_roles') ) {
		$template = get_stylesheet_directory() . '/modules/our-team/ot_category.php';
	} elseif ( is_page('meet-the-team') ) {
		$template = get_stylesheet_directory() . '/modules/our-team/ot_list.php';
	}

	return $template;		
}
add_filter('template_include', 'tanlinell_our_team_set_template' );
?>