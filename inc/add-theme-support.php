<?php

/**
 * Add Theme Support
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */





/**
 * WORDPRESS CORE FEATURES
 *
 * Initalizes support for features available within WordPress core
 */

/**
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );


/**
 * Post Thumbnails
 * enable support for Post Thumbnails
 */
add_theme_support( 'post-thumbnails' );



/**
 * Post Formats
 * add theme support for post formats
 */

add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video'
	) );





/**
 * HYBRID CORE FEATURES
 *
 * Initalizes support for Hybrid Core features. These are listed at:
 * http://themehybrid.com/hybrid-core
 */


/* Register menus. */
add_theme_support(
	'hybrid-core-menus',
	array( 'primary', 'secondary', 'subsidiary' )
);


/**
 * Add Core Sidebars
 *
 * other widget areas are available - http://themehybrid.com/docs/tutorials/hybrid-core-sidebars
 * additional widget areas are defined in register-widget-areas.php
 */
add_theme_support( 'hybrid-core-sidebars',
	array(
		'primary',
		'secondary',
	)
);



add_theme_support( 'hybrid-core-widgets' );
add_theme_support( 'hybrid-core-shortcodes' );
add_theme_support( 'hybrid-core-drop-downs' );
add_theme_support( 'hybrid-core-template-hierarchy' );

/* Add theme support for framework extensions. */
add_theme_support(
	'theme-layouts',
	array( '1c', '2c-l', '2c-r' ),
	array( 'default' => '2c-l', 'customizer' => true )
);


/* Support pagination instead of prev/next links. */
add_theme_support( 'loop-pagination' );

/* Use breadcrumbs. */
add_theme_support( 'breadcrumb-trail' );

/* Nicer [gallery] shortcode implementation. */
add_theme_support( 'cleaner-gallery' );

/* Better captions for themes to style. */
add_theme_support( 'cleaner-caption' );


/**
 * Hybrid Core Breadcrumb Trail Init
 *
 * @package hybrid-core 1.6.2
 * @since Tanlinell 2.11.0
 */
function tanlinell_init_breadcrumb_trail_args( $args ) {
				
	$args['container'] = 'div'; 
	$args['show_title'] = true;
	$args['show_browse'] = false;
	$args['labels'] = '';
	return $args;
}
add_filter("breadcrumb_trail_args", "tanlinell_init_breadcrumb_trail_args");

/* ==========================================================================
   WOOCOMMERCE SUPPORT
   ========================================================================== */
// http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
add_theme_support( 'woocommerce' );



?>
