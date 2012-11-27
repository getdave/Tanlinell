<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Tanlinell 1.0
 */
function tanlinell_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'tanlinell_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Tanlinell 1.0
 */
function tanlinell_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'tanlinell_body_classes' );



/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since Tanlinell 1.0
 */
function tanlinell_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'tanlinell_enhanced_image_navigation', 10, 2 );



/**
 * De-regsiter WP Core Widgets
 *
 * Removes unwanted/unused WP Core Widgets
 */

// 
function tanlinell_unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	//unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	//unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	//unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
}

add_action('widgets_init', 'tanlinell_unregister_default_wp_widgets', 1);