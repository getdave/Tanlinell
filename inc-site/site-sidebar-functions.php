<?php
/**
 * SITE -> Sidebar Cache Functions
 *
 * @package SITE
 */
 
/*
 * Set Tranisent Cache for the archive sidebar list
 *
 * @since    1.0.0
 */
function bc_get_archives_sidebar_list(  ) {
    
    $args = array (
    	'echo'		=> 0,
    	'title_li'	=> false,
    	'limit'     => 12,
    	'order'     => 'DESC',
    );
    
    $archives_list = wp_get_archives( $args );
    
    set_transient("archives_sidebar_list", $archives_list, 60 * 60 * 24 * 1); // Stored for one day
    
	return $archives_list;
	
}

/**
 * Set Tranisent Cache for the categories sidebar list
 *
 * @since    1.0.0
 */
function bc_get_categories_sidebar_list(  ) {
    
	$args = array (
		'depth' 	=> 1,
		'parent'    => 0,
        'orderby'   => 'name',
        'order'     => 'ASC',
	);
	$categories_list = get_categories( $args );
	
    set_transient("categories_sidebar_list", $categories_list, 60 * 60 * 24 * 1); // Stored for one day
    
	return $categories_list;
	
}


/**
 * Query to return the top tags for use around the site
 *
 * @since    1.0.0
 */
function bc_get_tags_list_obj(  ) {
        
    $args = array(
		'number'        => 10,
		'hide_empty'    => false, 
		'orderby'       => 'count',
		'order'         => 'DESC',
	);
	
	$tags_list = get_terms( 'post_tag', $args );	
    
    set_transient("tags_list_obj", $tags_list, 60 * 60 * 1); // Stored for one hour
	    
	//return the post if we have one
	return $tags_list;
	
}
