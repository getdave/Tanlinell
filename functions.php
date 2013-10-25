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
// Removed in favour of Composer based Plugin dependency management
//require_once( trailingslashit( get_template_directory() ) . 'inc/tgm-plugin-activation/class-tgm-plugin-activation.php' );



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
	 * FAVICON
	 */
	function favicon_link() {
	    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
	}
	add_action( 'wp_head', 'favicon_link' );
	

	/**
	 * TGM Required Plugins Script
	 */
	// Removed in favour of Composer based Plugin dependency management
	//require( get_template_directory() . '/inc/tgm-plugin-activation/required-plugins.php' );
	
	
	/**
	 * Tanlinell Plugin Overides
	 */
	require( get_template_directory() . '/inc/plugin-overrides.php' );


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
	 * Custom Widgets
	 * add your own custom Widgets into this file
	 */	
	//require( get_template_directory() . '/inc/custom-widgets.php' );
	
		
	
	/**
	 * Custom-Metaboxes-and-Fields-for-WordPress
	 */	
	function tanlinell_initialize_cmb_meta_boxes() {
		if ( !function_exists( 'cmb_init' ) ) {
			require( get_template_directory() . '/libs/Custom-Meta-Boxes/custom-meta-boxes.php');
		}
	}
	add_action( 'init', 'tanlinell_initialize_cmb_meta_boxes', 1 );
	
	
	
	/**
	 * Page Title/Page Subtitle
	 */
	require( get_template_directory() . '/inc/global-custom-meta.php' );
	
	
	
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
	
	
	add_image_size( 'featured_image_xlarge', 2000, 1400, false );
	add_image_size( 'featured_image_large', 991, 743, false );
	add_image_size( 'featured_image_medium', 800, 600, false );
	add_image_size( 'featured_image_small', 420, 390, false );
	
	
	/**
	 * Default Page Setup
	 * creates pages and sets config to allow /blog/ and /home/ to load our templates
	 */
	require( get_template_directory() . '/inc/default-page-setup.php' );
	
	
	/**
	 * Default Menus Setup
	 * creates menu items and assigns to menu locations that have been created previously
	 */
	require( get_template_directory() . '/inc/default-menu-setup.php' );	

	/**
	 * WooCommerce Customisations
	 * custom hooks and filter functinos for integration with WooCommerce
	 */
	require( get_template_directory() . '/inc/woocommerce-customisations.php' );	
	
	
}
endif; // tanlinell_setup

/**
 * Hook theme setup with priority of 10
 * this allows us to hook up child theme setup with higher priority therefore
 * ensuring that child theme setup runs after the parent theme
 * http://justintadlock.com/archives/2010/12/30/wordpress-theme-function-files
 */
add_action( 'after_setup_theme', 'tanlinell_setup', 10 ); // 10 is the default but we're being explicit





