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
	
	global $wp_query;
	
	$pre = 'tanlinell--';
	
	if( is_archive() ) {
	
		if ( is_category() || is_tax() )
			$classes[] = $pre.'archive-'.sanitize_title(single_cat_title( '', false ));		
		elseif ( isset( $wp_query->query['post_type'] ) )
			$classes[] = $pre.'archive-'.$wp_query->query['post_type'];
		else
			$classes[] = $pre.'archive-posts';
		
	}
	elseif( is_singular() )
	{
		$classes[] = $pre.$wp_query->queried_object->post_type.'-single';
				
		// Adds a class of group-blog to blogs with more than 1 published author
		if ( is_multi_author() ) {
			$classes[] = $pre.'group-blog';
		}
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
 * Filter Quote Post Types
 * 
 * Ensure "Quote" post types are always wrapped in blockquotes whether or
 * not the user has included in the admin
 *
 * @return the_content() wrapped in a <blockquote>
 * @author Justin Tadlock
 **/

function tanlinell_quote_post_type_blockquote( $content ) {

	/* Check if we're displaying a 'quote' post. */
	if ( has_post_format( 'quote' ) ) {

		/* Match any <blockquote> elements. */
		preg_match( '/<blockquote.*?>/', $content, $matches );

		/* If no <blockquote> elements were found, wrap the entire content in one. */
		if ( empty( $matches ) )
			$content = "<blockquote>{$content}</blockquote>";
	}

	return $content;
}
add_filter( 'the_content', 'tanlinell_quote_post_type_blockquote' );


/**
 * FAVICON
 */
function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
}
add_action( 'wp_head', 'favicon_link' );


/**
 * Remove wp version number from the header
 *
 * <meta name="generator" content="WordPress **.**.**" />
 * Note: given priority 1 to match/overide Hybrid Core
 */
remove_action( 'wp_head', 'wp_generator', 1 );


/**
 * Tell WordPress to use searchform.php from the templates/ directory
 *
 * @link https://github.com/roots/roots
 */
function tanlinell_get_search_form($form) {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'tanlinell_get_search_form');

