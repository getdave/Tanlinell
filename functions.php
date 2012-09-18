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
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Tanlinell, use a find and replace
	 * to change 'tanlinell' to the name of your theme in all the template files
	 */
	//load_theme_textdomain( 'tanlinell', get_template_directory() . '/languages' );



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
	require( get_template_directory() . '/inc/register-widgets.php' );


	
	

}
endif; // tanlinell_setup
add_action( 'after_setup_theme', 'tanlinell_setup' );



/**
 * Enqueue scripts and styles
 */
function tanlinell_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'tanlinell_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
