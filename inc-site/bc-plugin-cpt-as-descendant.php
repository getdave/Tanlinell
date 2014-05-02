<?php
/**
 * The example below allows a plugin to be a descendant of page
 * NOTE: The page will need to be moved to be a descendant of the desired parent
 * 
 * @see tanlinell-protected-name.php
 * @package Tanlinell
 * @since Tanlinell 3.0.9
 */
 

/**
 * Filter the plugin cpt config and change to dynamic protected name->page slug 
 * Addresses the archive
 */
/*
function bc_s_r_register_cpt_config_update( $config ) {
	
	$the_parent = tanlinell_get_protected_name_slug( 'About' );
	
	$config['has_archive'] =  ( false != $the_parent ) ? $the_parent . BC_S_R_CPT_PLURAL_SLUG : BC_S_R_CPT_PLURAL_SLUG;
	
	return $config;
}
add_action( 'bc_s_r_register_cpt_config', 'bc_s_r_register_cpt_config_update' );
*/


/**
 * Filter the plugin rewrite rule and change to dynamic protected name->page slug 
 * Addresses the singles
 */
/*
function bc_s_r_register_cpt_rewrite_update( $rewrite ) {
	
	$the_parent = tanlinell_get_protected_name_slug( 'About' );
	
	$rewrite['slug'] = ( false != $the_parent ) ? $the_parent . BC_S_R_CPT_SLUG : BC_S_R_CPT_SLUG;
	
	return $rewrite;
}
add_action( 'bc_s_r_register_cpt_rewrite', 'bc_s_r_register_cpt_rewrite_update' );
*/


/**
 * Stop the plugin from creating the listing page
 */
/*
function bc_s_r_create_listing_pages_array_update() {
	
	$pages = array();
	return $pages;
}
add_action( 'bc_s_r_create_listing_pages_array', 'bc_s_r_create_listing_pages_array_update' );
*/