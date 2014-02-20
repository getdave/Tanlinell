<?php
/**
 * Helper Functions
 *
 * General utilizy functions used throughout the theme
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

function tanlinell_get_post_thumb( $post_id, $size='full' ){
	
	$post_thumbnail_id = get_post_thumbnail_id( $post_id );
	if( $post_thumbnail_id ){
		$post_thumb = wp_get_attachment_image_src( $post_thumbnail_id, $size );
	} else {
		$post_thumb = "";
	}
		
	return $post_thumb;
}




/**
 * 	Function to get attachement id from src
 * 
 * @param	$url			( str )		# url to the attachement src 
 * @return	$attachment[0]	( int )		# ID of the attachement
 */
 
function tanlinell_get_attachment_id_from_src($url) {
  global $wpdb;
  $prefix = $wpdb->prefix;
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", $url ));
    return $attachment[0];
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
			return tanlinell_get_root_parent( $parent );
  }


/**
 * 	Function to strip the posts content. Called within the loop
 * 
 * 	@param1		$amount			(int)		# no. of WORDS that have to be shown 
 * 	@param2		$read_more_link	(String)	# If provided becomes click text for 'read more' link; Default: `read more`
 * 
 * 	@return		no return		(String)	# echo'd to screen
 * 
 **/

function tanlinell_truncate_posts( $amount, $read_more_link='read more' ) {
	
	echo balanceTags(wp_trim_words( do_shortcode((false != get_the_excerpt()) ? get_the_excerpt() : get_the_content()), $amount, '…<a href="'.get_permalink().'">'.$read_more_link.'</a>' ), true);
	
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

/**
 * Function to get page children
 *
 * @param $page_id ( int ) # page id of the page
 * @return $childrens ( HTML ) # unordered list of childrens
 */

function tanlinell_get_page_children( $page_id ){

	$children = "";

	$args = array(
			'child_of' => $page_id,
			'title_li' => '',
			'echo' => 0,
	);

	$children_list = wp_list_pages( $args );
	$children .= $children_list;

	return $children;

}


/*
 * Enables SVG uploading in the WP upload option
 */
function tanlinell_mime_types( $mimes = array() ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'tanlinell_mime_types' );


/*
 * Fixes display of svg images when selected as featured image
 */
function tanlinell_fix_svg() {
    echo '<style type="text/css">
          .attachment-post-thumbnail, .thumbnail img { 
               width: 100% !important; 
               height: auto !important; 
          }
          </style>';
 }
 add_action('admin_head', 'tanlinell_fix_svg');




/**
 * Check for existence of child pages
 * @param  int $post_id ID of the post in question
 * @return bool          return true/false
 */
function tanlinell_has_children( $post_id ) {
    $children = get_pages('child_of=' . $post_id);
    if( count( $children ) != 0 ) { 
        return true;
    } else { 
        return false;
    }
}



/**
 * WordPress' missing is_blog_page() function.  Determines if the currently viewed page is
 * one of the blog pages, including the blog home page, archive, category/tag, author, or single
 * post pages.
 *
 * @return bool
 */
function tanlinell_is_blog_page() {

    global $post;

    //Post type must be 'post'.
    $post_type = get_post_type($post);

    //Check all blog-related conditional tags, as well as the current post type, 
    //to determine if we're viewing a blog page.
    return (
        ( is_home() || is_archive() || is_single() )
        && ($post_type == 'post')
    ) ? true : false ;

}


/**
 * 	Function to get the categories for the post
 * 
 * 	@param 	$post_ID		(int)	# Post ID
 *  @return $category_list	(array)	# returns the category id's
 * 
 */

function tanlinell_get_the_categories( $post_ID ){
	
	$category_list = get_the_category_list( ' ', '', $post_ID );
	
	return $category_list;
}


/**
 * Check if a post is a custom post type.
 * @param  mixed $post Post object or ID
 * @return boolean
 */
function tanlinell_is_custom_post_type( $post = NULL )
{
    $all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );

    // there are no custom post types
    if ( empty ( $all_custom_post_types ) )
        return FALSE;

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    // could not detect current type
    if ( ! $current_post_type )
        return FALSE;

    return in_array( $current_post_type, $custom_types );
}



/**
 * 	Function to get the paging display calculations
 * 
 * 	@global $wp_query	(obj)	# WP_Query Object
 *  @return $stat		(array)	# returns the stat values (XX) for display i.e.Displaying XX-XX of XX results
 * 
 */

function tanlinell_paging_stat(  ){
	
	global $wp_query;
	
	$post_count = min( ( int ) $wp_query->get( 'posts_per_page' ), $wp_query->found_posts );
    $page = max( ( int ) $wp_query->get( 'paged' ), 1 );
    $count = ( $page - 1 ) * $post_count;

    $stat['floor'] = $count + 1;
    $stat['ceiling'] = $count + $wp_query->post_count;
    $stat['total'] = $wp_query->found_posts;
	
	return $stat;
}