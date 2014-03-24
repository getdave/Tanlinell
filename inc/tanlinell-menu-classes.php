<?php
/**
 * Current Menu Item
 *
 * Adds the 'current***' class to menu items
 */
function tanlinell_current_type_nav_class($classes, $item) {
    
    global $post;
    
	$post_type = get_post_type();
    $post_type_obj = get_post_type_object($post_type);
	
	$all_custom_post_types 	= get_post_types( array ( '_builtin' => FALSE ) );
	$custom_types      		= array_keys( $all_custom_post_types );
	
	if ( in_array( $post_type, $custom_types ) ) {
		
		
		//if current item is this posts -> post type archive
		$archive_post = get_page_by_path( $post_type_obj->has_archive );	
			
		if ( $archive_post->ID == $item->object_id ) {
			
	        array_push($classes, 'current-menu-ancestor');
	        array_push($classes, 'current_page_ancestor');
	        
	    }
		
		
		//if current item is the post		
		if ( $item->object_id == $post->ID ) {
				
	        array_push($classes, 'current-menu-item');
	        array_push($classes, 'current_page_item');
	        
		}
		
	}
	
    return $classes;
}
add_filter( 'nav_menu_css_class', 'tanlinell_current_type_nav_class', 10, 2 );

