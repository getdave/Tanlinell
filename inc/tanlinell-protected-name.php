<?php
/**
 * Protected Name Custom Meta Box
 */
function protected_name_cmb_meta_boxes( $meta_boxes ) {
	
	$get_post_types	= get_post_types( array('public'   => true), 'names' );//all post types			
	
	$meta_boxes[] = array(
		'id' => '_protected_name', //used just for storage
		'title' => 'Developer Conf.',
		'pages' => array_values( $get_post_types ),
		'context' => 'side',
		'priority' => 'core',
		'show_names' => true, // show field names on the left
		'fields' => array(
			
			array(
				'name' => 'Protected Name',
				'id' => 'protected_name',
				'type' => 'text'
			),
						
		),
	);	
	
	return $meta_boxes;
}
if ( current_user_can('activate_plugins') ) :
/**
 * Only For ADMIN 
 */
add_filter( 'cmb_meta_boxes', 'protected_name_cmb_meta_boxes' );
endif;


/**
 * Tanlinell return the protected name
 *
 * @package Tanlinell
 * @since Tanlinell 3.0.0 
 *
 * @param (str) $protected_page the value given in the post edit screen
 * @return (str) the slug of the page with trailing slash
 */
function tanlinell_get_protected_name_slug( $protected_page ) {
	
	$args = array(
    	'post_type' => 'page',
    	'meta_query' => array(
    		array(
    			'key' => 'protected_name',
    			'value' => $protected_page,
    		),
    	),
    	'fields' => 'ids',
    );
    $protect_name_query = new WP_Query( $args );
	if( $protect_name_query->post_count >= 1 ) :
		
		$the_parent = trailingslashit(basename(get_permalink($protect_name_query->posts[0])));
		
	endif;
	
	return $the_parent;
}