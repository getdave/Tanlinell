<?php

/**
 * Add Theme Support
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
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

?>