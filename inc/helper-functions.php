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
			return tanlinell_get_root_parent( $parent );
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


/**
 * Helper function to produce a picturefill.js compatible responsive image
 * leverages timthumb.php script to produce images sizes on the fly
 * 
 * @param  string  $image   path to the image in quesrtion
 * @param  array   $sizes   array of image sizes to be generated
 * @param  string  $alt     alt attribute for the image
 * @param  integer $quality quality of the final image
 * @return html    $html    a picturefill compatible HTML structure
 */
function tanlinell_responsive_image($image, $sizes = false, $alt = "", $quality = 80, $ie_size = false ) {

    // Clean the alt attribute
    $alt = esc_attr( $alt );

    // Defaults if required
    if ( false === $sizes || !is_array( $sizes ) ) {
        $sizes = array(
            array(
                'dimensions' => array(
                    'width'     => 320,
                ),
            )
        );
    }

    // Setup image base with timthumb
    $imagebase = trailingslashit( get_stylesheet_directory_uri() ) . 'timthumb.php?src=' . $image . '&amp;q=' . $quality;

    $html = "";

    $html .= "<div data-picture data-alt='$alt'>";

        // Default
        $default_image  = $sizes[0];
        $width          = ( isset( $default_image['dimensions']['width'] ) ? (int)$default_image['dimensions']['width'] : '');
        $height         = ( isset( $default_image['dimensions']['height'] ) ? (int)$default_image['dimensions']['height'] : '');
        $zc             = ( isset( $default_image['zc'] ) ? (int)$default_image['zc'] : '1');
        $cc             = ( isset( $default_image['cc'] ) ? $default_image['cc'] : '');

        $html .= '<div data-src="' . $imagebase . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;zc=' . $zc . '&amp;cc=' . $cc . '"></div>';

        // Create the noscript default item
        $html .= '<noscript><img src="' . $imagebase . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;zc=' . $zc . '&amp;cc=' . $cc . '" alt="' . $alt . '"></noscript>';


        // Shift the "default" item out of the array
        array_shift($sizes);

        // Loop each size and create required HTML
        foreach ($sizes as $size) {     
            $width  = ( isset( $size['dimensions']['width'] ) ? (int)$size['dimensions']['width'] : '');
            $height = ( isset( $size['dimensions']['height'] ) ? (int)$size['dimensions']['height'] : '');
            $zc     = ( isset( $size['zc'] ) ? (int)$size['zc'] : 1);
            $cc     = ( isset( $size['cc'] ) ? $size['cc'] : '');

            $html .= '<div data-src="' . $imagebase . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;zc=' . $zc . '&amp;cc=' . $cc . '" data-media="(min-width: ' . $size['media'] . 'px)"></div>';
        }

        // Create IE size if required
        if ( true === $ie_size || is_array( $ie_size ) ) {

            $ie_width   = ( isset( $ie_size['dimensions']['width'] ) ? (int)$ie_size['dimensions']['width'] : '');
            $ie_height  = ( isset( $ie_size['dimensions']['height'] ) ? (int)$ie_size['dimensions']['height'] : '');
            $ie_zc      = ( isset( $ie_size['zc'] ) ? (int)$ie_size['zc'] : 1);
            $ie_cc      = ( isset( $ie_size['cc'] ) ? $ie_size['cc'] : '');


            $html .= '<!--[if (lt IE 9) & (!IEMobile)]>';

            $html .= '<div data-src="' . $imagebase . '&amp;w=' . $ie_width . '&amp;h=' . $ie_height . '&amp;zc=' . $ie_zc . '&amp;cc=' . $ie_cc . '"></div>';

            $html .= ' <![endif]-->';
        }



    $html .= "</div>";

    echo $html;

}









