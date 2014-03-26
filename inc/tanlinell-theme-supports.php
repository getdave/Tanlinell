<?php

/**
 * Add Theme Support
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */


/**
 * Add Theme Support
 * Enables support for various theme items that require explicit enabling
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





/* ==========================================================================
   WOOCOMMERCE SUPPORT
   ========================================================================== */
// http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
add_theme_support( 'woocommerce' );

