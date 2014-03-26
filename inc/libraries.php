<?php 
/**
 * Libraries
 *
 * loads the libraries we require for the theme
 * 
 * @package Tanlinell
 * @since Tanlinell 3.0.0
 */


/**
 * Hybrid-Core 
 *
 * @link https://github.com/justintadlock/hybrid-core/
 */
require_once locate_template( 'hybrid-core/hybrid.php' );
new Hybrid();


/**
 * Custom-Metaboxes-and-Fields-for-WordPress
 *
 * @link https://github.com/humanmade/Custom-Meta-Boxes
 */	
function tanlinell_initialize_cmb_meta_boxes() {
	if ( !function_exists( 'cmb_init' ) ) {
		require( get_template_directory() . '/libs/Custom-Meta-Boxes/custom-meta-boxes.php');
	}
}
add_action( 'init', 'tanlinell_initialize_cmb_meta_boxes', 1 );


/**
 * Custom Theme Options
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/libs/options-framework/' );
	require_once get_template_directory() . '/libs/options-framework/options-framework.php';
}

