<?php
/**
  * BC Plugin Hooks:- BC_Simple_Bath_Plug
  *
  * This EXAMPLE file intended for the extension of BC-Simple-**** plugins 
  * via the use of apply_filter definitions in the plugin
  *
  * Include this file via functions.php - comment appropriately
  * require( get_template_directory() . '/inc/bc-plugins-hooks.php' );
  */


/**
 * Available hooks in BC-Simple-Bath-Plug
 * 
 * In Plugin Class:-
 * bc_s_b_p_register_cpt_labels
 * bc_s_b_p_register_cpt_rewrite
 * bc_s_b_p_register_cpt_supports
 * bc_s_b_p_register_cpt_config
 * bc_s_b_p_cmb_meta_boxes_options
 * bc_s_b_p_create_listing_pages_array
 * 
 * In Template:-
 * bc_s_b_p_archive_image_args - featured-image-template.php
 *
 *
 */


/**
 * Define the image dimensions for archive of cpt and single of cptvv 
 */	
function bc_s_b_p_archive_image_args_override( $thumb_args ) {
		
	global $wp_query;
	
	if( is_page() )	{
		//runs if we are viewing a listing page
		$thumb_args['width'] = 420;
		$thumb_args['height'] = 420;
	}
	else {
		//we assume its a single runs when we are viewing a cpt
		$thumb_args['width'] = 1170;
		$thumb_args['height'] = 420;
	}
	
	return $thumb_args;
}
add_action( 'bc_s_b_p_archive_image_args', 'bc_s_b_p_archive_image_args_override' );


/**
 * Custom Meta Extension 
 */
/*
function bc_s_b_p_cmb_meta_boxes_updated( $meta_boxes ) {
	
	//EXAMPLE
	$prefix = '_'.BC_S_B_P_CPT_SLUG.'_';	

	$meta_boxes[] = array(
		'id' => BC_S_B_P_CPT_SLUG.'_meta_update_2',
		'title' => 'Details for the '.BC_S_B_P_CPT_SINGULAR.' Updated_2',
		'pages' => array( BC_S_B_P_CPT_SLUG ), // apply these custom fields to..
		'context' => 'normal',
		'priority' => 'default',
		'show_names' => true, // show field names on the left
		'fields' => array(
			
			array(
				'name' => 'Custom Data Field Updated_2',
				'desc' => 'Change as required',
				'id' => $prefix . 'custom_data_update_2',
				'type' => 'wysiwyg',
				'options' => array(
				    'media_buttons' => false, // show insert/upload button(s)	
				    'teeny' => true
				),
			)
		),
	);
	
	return $meta_boxes;
}
add_action( 'bc_s_b_p_cmb_meta_boxes_options', 'bc_s_b_p_cmb_meta_boxes_updated' );
*/


/**
 * Any additinal pages that are required for the plugin 
 */
/*
function bc_s_b_p_default_page_list( $pages ) {
		
	//EXAMPLE
	$pages[]= array(
		'name'	=> 'New Page Test',
		'slug'	=> 'new-page-test',
	);
	
	return $pages;
}
add_action( 'bc_s_b_p_create_listing_pages_array', 'bc_s_b_p_default_page_list' );
*/
?>