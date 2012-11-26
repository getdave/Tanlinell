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
	//'aside', 
	//'link', 
	'gallery', 
	//'status', 
	//'quote', 
	//'image' 
));




/**
 * HYBRID CORE FEATURS
 *
 * Initalizes support for Hybrid Core features. These are listed at:
 * http://themehybrid.com/hybrid-core
 */

/* Add theme support for core framework features. */
add_theme_support( 'hybrid-core-menus', array( 'primary', 'subsidiary' ) );


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
add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );
add_theme_support( 'hybrid-core-drop-downs' );
add_theme_support( 'hybrid-core-template-hierarchy' );

/* Add theme support for framework extensions. */
add_theme_support( 'theme-layouts', array( '1c', '2c-l', '2c-r' ) );
//add_theme_support( 'post-stylesheets' );
//add_theme_support( 'dev-stylesheet' );
add_theme_support( 'loop-pagination' );
//add_theme_support( 'get-the-image' );
add_theme_support( 'breadcrumb-trail' );
add_theme_support( 'cleaner-gallery' );




?>