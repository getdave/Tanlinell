<?php
/**
 * Current Menu Item for CPT's
 * Adds the 'current-menu-item' class to menu items when viewing cpt's 
 * allows for cpt to be a descendant of a top level menu item
 */
function tanlinell_current_type_nav_class($classes, $item) {
    
    global $post;
    
	$post_type = get_post_type();
    $post_type_obj = get_post_type_object($post_type);
	
	$all_custom_post_types 	= get_post_types( array ( '_builtin' => FALSE ) );
	$custom_types      		= array_keys( $all_custom_post_types );
	
	if ( is_post_type_archive( get_post_type() ) || is_singular( $post_type ) ) {
		
		$archive_post = get_page_by_path( $post_type_obj->has_archive );	
		
		$ancestors = get_post_ancestors( $archive_post );
		
		if( in_array( $item->object_id, $ancestors ) ) {
		
	        array_push($classes, 'current-menu-ancestor');
	        array_push($classes, 'current_page_ancestor');
	        
	    }
		if( false != $archive_post ) {
			if ( $item->title == $archive_post->post_title ) {
				
		        array_push($classes, 'current-menu-item');
		        array_push($classes, 'current_page_item');
		        
		    }
		}
	}
	
    return $classes;
}
add_filter( 'nav_menu_css_class', 'tanlinell_current_type_nav_class', 10, 2 );

