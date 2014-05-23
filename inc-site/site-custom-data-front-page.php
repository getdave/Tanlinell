<?php
/**
 * SITE -> Custom Meta for Home Page
 */	
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_front_metaboxes( array $meta_boxes ) {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_home_';
	
	$front_page_id = get_page_by_title( 'Home' )->ID;
    
    
		
	return $meta_boxes;
}
//add_filter( 'cmb_meta_boxes', 'cmb_front_metaboxes' );