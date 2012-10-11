<?php

/**
 * Enqueue scripts and styles
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */


function tanlinell_scripts() {
	
	/**
	 * ENQUEUE STYLESHEETS (CSS)
	 */
	wp_enqueue_style( 'style', get_stylesheet_uri() );



	/**
	 * ENQUEUE (JAVA)SCRIPTS
	 */	
	
	// Modernizr - custom build with only "essential" features. You should update this to your own requirements
	wp_register_script('modernizr-custom', get_template_directory_uri() . '/js/vendor/modernizr.custom.43984.js', array(''), '1.0' , false );	// added to <head> not footer
	wp_enqueue_script('modernizr-custom');
	
	// Accessible Tabbed Content
	wp_enqueue_script( 'tabs', get_template_directory_uri() . '/shortcodes/js/jQuery.tabs.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('tabs');
	
	// Plugins - all calls to init common plugins
	wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0' , true );
	wp_enqueue_script('plugins');

	// Main.js - custom javascript for the site
	//wp_register_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0' , true );
	//wp_enqueue_script('main'); 




	/**
	 * MISC CONDITIONAL STYLES
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}

add_action( 'wp_enqueue_scripts', 'tanlinell_scripts' );

?>