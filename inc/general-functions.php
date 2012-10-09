<?php
/**
 * Custom Shortcodes
 *
 * General functions used in the theme
 * 
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
 



/**
 * 	Function to get post thumbnail src
 * 
 * @param	$post_id	( int )		# post id of the post
 * @return	$post_thumb	( obj )		# Thumbnail src object
 */

function tanlinell_get_post_thumb( $post_id ){
	
	$post_thumbnail_id = get_post_thumbnail_id( $post_id );
	if( $post_thumbnail_id ){
		$post_thumb = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	} else {
		$post_thumb = "";
	}
		
	return $post_thumb;
}


/**
 * 	Function to get the root parent of a page
 * 
 * 	@param	$page_id	(int)	# page id
 * 	@return	$parent 	(int)	# root parent page
 * 
 */

  function tanlinell_get_root_parent( $page_id ) {
		global $wpdb;
		$parent = $wpdb->get_var( "SELECT post_parent FROM $wpdb->posts WHERE post_type='page' AND ID = '$page_id'" );
		if ($parent == 0) 
			return $page_id;
		else 
			return get_root_parent( $parent );
  }


/**
 * 	Function to strip the posts content. Called within the loop
 * 
 * 	@param1		$amount			(int)		# no. of characters that have to be shown 
 * 	@param2		$quote_after	(Boolean)	# If TRUE include 'read more' link; Default: FALSE
 * 
 * 	@return		$truncate		(String)	# striped content of a post
 * 
 **/

function tanlinell_truncate_posts( $amount, $quote_after=false ) {

	$truncate = get_the_content();
	$truncate = apply_filters( 'the_content', $truncate );
	$truncate = preg_replace( '@<script[^>]*?>.*?</script>@si', '', $truncate );
	$truncate = preg_replace( '@<style[^>]*?>.*?</style>@si', '', $truncate );
	$truncate = strip_tags( $truncate );
	$truncate = substr( $truncate, 0, $amount );
	echo $truncate;
	echo ".";
	if ($quote_after) echo('<a href="'.get_permalink().'">Read more...</a>');
}


/**
 * 	Function to get the Top most category
 * 
 * 	@param 	$cat_ID		(int)	# Category id whose parent(root) to be get
 *  @return $cat_ID		(int) 	# returns the root category id
 * 
 */

function tanlinell_get_top_parent_category( $cat_ID ){
	$cat = get_category( $cat_ID );
	$new_cat_id = $cat->category_parent;
	
	if($new_cat_id != "0") {
		return ( tanlinell_get_top_parent_category( $new_cat_id ) );
	}
	return $cat_ID;
}