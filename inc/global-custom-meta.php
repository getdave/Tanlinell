<?php


/**
 * Global Custom Meta Box
 * 'types' => array('post','page') -> default
 */

function page_titles_cmb_meta_boxes( $meta_boxes ) {
	
	$meta_boxes[] = array(
		'id' => '_page_titles', //used just for storage
		'title' => 'Page Titles',
		'pages' => array( 'post', 'page' ),
		'context' => 'normal',
		'priority' => 'default',
		'show_names' => true, // show field names on the left
		'fields' => array(
			
			array(
				'name' => 'Page Title',
				'id' => 'page_title',
				'type' => 'text'
			),
			
			array(
				'name' => 'Page Subtitle',
				'id' => 'page_subtitle',
				'type' => 'text'
			),
			
		),
	);	
	
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'page_titles_cmb_meta_boxes' );
?>