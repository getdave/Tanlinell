<?php
/**
 * Tanlinell functions and definitions
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */


/**
 * Include libraries 
 */
require_once locate_template( 'inc/libraries.php' );
 

/**
 * Overrides and Configuration: Library -> Hybrid-Core
 */	
require_once locate_template( '/inc/library-hybrid-core.php' );


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
	 * Site -> Include scripts specific for this project
	 */	
	require_once locate_template( '/inc-site/site.inc.php' );
		
	
	/**
	 * Overrides and Configuration: Wordpress Core
	 */
	require_once locate_template( '/inc/wp-core-admin.php' );
	require_once locate_template( '/inc/wp-core-public.php' );
	
	
	/**
	 * Overrides and Configuration: Plugin -> Minor
	 *
	 * Script to house minor plugin alterations for any plugin when 
	 * a full file is not warranted
	 */
	require_once locate_template( '/inc/plugin-minor.php' );
	
	
	/**
	 * Overrides and Configuration: Plugin -> Gravity Forms
	 */	
	require_once locate_template( '/inc/plugin-gravity-forms.php' );
	
	
	/**
	 * Overrides and Configuration: Plugin -> WooCommerce
	 */
	require_once locate_template( '/inc/plugin-woocommerce.php' );
	
	
	
	/**
	 * Tanlinell Theme -> Utilities
	 */
	require_once locate_template( '/inc/tanlinell-utilities.php' );
	
		
	/**
	 * Tanlinell Theme -> Wrapper Templating Class
	 */
	require_once locate_template('/inc/tanlinell-wrapper.php');
	
	
	/**
	 * Tanlinell Theme -> Sidebar Class
	 */
	require_once locate_template('/inc/tanlinell-sidebar.php');
	
	
	/**
	 *  Tanlinell Theme -> Wrapper Markup Filters/Hooks
	 */
	require_once locate_template( '/inc/tanlinell-wrapper-markup.php' );
	
		
	/**
	 *  Tanlinell Theme -> Sidebar Display Filters/Hooks
	 */
	require_once locate_template( '/inc/tanlinell-sidebar-display.php' );
		
	
	/**
	 *  Tanlinell Theme -> Byline Function
	 */
	require_once locate_template( '/inc/tanlinell-byline.php' );
	
	
	/**
	 *  Tanlinell Theme -> Comment Function
	 */
	require_once locate_template( '/inc/tanlinell-comment.php' );
	
	
	/**
	 *  Tanlinell Theme -> Content Navigation Function
	 */
	require_once locate_template( '/inc/tanlinell-content-nav.php' );
	
	
	/**
	 * Tanlinell Theme -> Shortcodes
	 */	
	require_once locate_template( '/inc/tanlinell-shortcodes.php' );
	
	
	/**
	 * Tanlinell Theme -> Default Page Setup
	 */
	require_once locate_template( '/inc/tanlinell-default-pages.php' );
	
	
	/**
	 * Tanlinell Theme -> Current Menu Classes
	 */
	require_once locate_template( '/inc/tanlinell-menu-classes.php' );
	
	
	/**
	 * Tanlinell Theme -> Additional Page Titles
	 */
	require_once locate_template( '/inc/tanlinell-page-titles.php' );
	
	
	/**
	 * Tanlinell Theme -> Protected Name
	 */
	require_once locate_template( '/inc/tanlinell-protected-name.php' );
	
	
	/**
	 * Tanlinell Theme -> Enqueue Scripts & CSS Styles
	 */
	require_once locate_template( '/inc/tanlinell-scripts.php' );
	
	
	/**
	 * Tanlinell Theme -> Supports
	 */	
	require_once locate_template( '/inc/tanlinell-theme-supports.php' );
	
	
}
endif; // tanlinell_setup

/**
 * Hook theme setup with priority of 10
 * this allows us to hook up child theme setup with higher priority therefore
 * ensuring that child theme setup runs after the parent theme
 * http://justintadlock.com/archives/2010/12/30/wordpress-theme-function-files
 */
add_action( 'after_setup_theme', 'tanlinell_setup', 10 ); // 10 is the default but we're being explicit

