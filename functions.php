<?php
/**
 * Tanlinell functions and definitions
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Tanlinell 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'tanlinell_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Tanlinell 1.0
 */
function tanlinell_setup() {

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
	 * Custom Shortcodes
	 * add your own custom shortcodes into this file
	 */	
	//require( get_template_directory() . '/inc/custom-shortcodes.php' );
	


	/**
	 * Custom Widgets
	 * add your own custom Widgets into this file
	 */	
	//require( get_template_directory() . '/inc/custom-widgets.php' );



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
	 * Register Widgets
	 * sets up and registers required Widgets
	 */	
	require( get_template_directory() . '/inc/register-widget-areas.php' );


	
	/**
	 * Enqueue Scripts & CSS Styles
	 * adds javascripts and stylesheets the right way via WP enqueue
	 */
	require( get_template_directory() . '/inc/enqueue-scripts-styles.php' );
	
	
	/**
	 * 	Register 'Custom Posts Types' for the theme
	 */
	require( get_template_directory() . '/inc/register-custom-posts.php' );
	
	
	/**
	 * General functions of the theme
	 */
	require( get_template_directory() . '/inc/general-functions.php' );
	
	
	/**
	 * 	Customize the User roles
	 */
	require( get_template_directory() . '/inc/client-access-permissions.php' );
	
	/**
	 * 	Add shortcodes to editor
	 */
	require( get_template_directory() . '/shortcodes/shortcode.php' );
	
}
endif; // tanlinell_setup
add_action( 'after_setup_theme', 'tanlinell_setup' );



