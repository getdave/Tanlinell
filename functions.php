<?php
/**
 * Tanlinell functions and definitions
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */



/* Load the Hybrid Core framework class file. */
require_once( trailingslashit( get_template_directory() ) . 'hybrid-core/hybrid.php' );

/* Call the Hybrid Core class - provides access to new power */
new Hybrid();

// Load the TGM Plugin Class - requires or recommends Plugins to install
require_once( trailingslashit( get_template_directory() ) . 'inc/tgm-plugin-activation/class-tgm-plugin-activation.php' );



/**
 * Theme Setup
 * 
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Tanlinell 1.0
 */

if ( ! function_exists( 'tanlinell_setup' ) ):

function tanlinell_setup() {


	/**
	 * TGM Required Plugins Script
	 */
	require( get_template_directory() . '/inc/tgm-plugin-activation/required-plugins.php' );



	/* Set the content width based on the theme's design and stylesheet. */
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );


	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/' );
		require_once get_template_directory() . '/inc/options-framework/options-framework.php';
	}


	/**
	 * Translation
	 * 
	 * Make theme availa`ble for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Tanlinell, use a find and replace
	 * to change 'tanlinell' to the name of your theme in all the template files
	 */
	//load_theme_textdomain( 'tanlinell', get_template_directory() . '/languages' );


	

	/**
	 * Admin Customisations
	 * functions and tweaks to customise the WP Admin
	 */	
	require( get_template_directory() . '/inc/admin-customisations.php' );


	/**
	 * Custom Shortcodes
	 * add your own custom shortcodes into this file
	 */	
	require( get_template_directory() . '/inc/custom-shortcodes.php' );
	


	/**
	 * Add Theme Support
	 * Enables support for various theme items that require explicit enabling
	 */	
	require( get_template_directory() . '/inc/add-theme-support.php' );



	/**
	 * Register Nav Menus
	 * This theme uses wp_nav_menu() in one location.
	 */	
	require( get_template_directory() . '/inc/register-nav-menus.php' );


	/**
	 * Custom Widgets
	 * add your own custom Widgets into this file
	 */	
	//require( get_template_directory() . '/inc/custom-widgets.php' );
	

	/**
	 * Register Widgetized Areas
	 * sets up and registers required Widgetized areas
	 */	
	require( get_template_directory() . '/inc/register-widget-areas.php' );


	/**
	 * WPAlchemy
	 * call initial setup and make class available
	 * NOTE: before register-custom-posts
	 */	
	require( get_template_directory() . '/libs/wpalchemy/setup.php');
	
	
	/**
	 * 	Register 'Custom Posts Types' for the theme
	 */
	require( get_template_directory() . '/inc/register-custom-posts.php' );

	
	/**
	 * Enqueue Scripts & CSS Styles
	 * adds javascripts and stylesheets the right way via WP enqueue
	 */
	require( get_template_directory() . '/inc/enqueue-scripts-styles.php' );
	
	
	/**
	 * Helper functions 
	 */
	require( get_template_directory() . '/inc/helper-functions.php' );


	/**
	 * Burfield Customisations
	 * custom tweaks for sites designed and created by Burfield
	 * you might want to comment this out...
	 */
	require( get_template_directory() . '/inc/burfield-customisations.php' );
	
	
}
endif; // tanlinell_setup
add_action( 'after_setup_theme', 'tanlinell_setup' );





