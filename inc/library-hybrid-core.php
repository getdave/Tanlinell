<?php 

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
 * Hybrid Enhance Breadcrumb Args
 *
 * Default sitewide settings for the breadcrumb trails
 * http://themehybrid.com/docs/tutorials/breadcrumb-trail
 */

function my_breadcrumb_trail_args( $args ) {

	$args = array(
		'separator' => '/',
		'before' => __( '', 'breadcrumb-trail' ),
		'after' => false,
		'front_page' => false,
		'show_on_front' => false,
		'show_home' => __( 'Home', 'breadcrumb-trail' ),
		'echo' => true,
		'container' => 'div',
		'show_title' => true,
		'show_browse' => false,
		'labels' => '',
	);

	return $args;
}
add_filter( 'breadcrumb_trail_args', 'my_breadcrumb_trail_args' );


/* Set the content width based on the theme's design and stylesheet. */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

