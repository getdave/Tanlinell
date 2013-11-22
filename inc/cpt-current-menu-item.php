<?php
/**
 * Current Menu Item for CPT's
 * Adds the 'current-menu-item' class to menu items when viewing cpt's 
 */
function current_type_nav_class($classes, $item) {
    
    global $post;
    
    if(tanlinell_is_custom_post_type($post)) {
    
	    $post_type = get_post_type();
	    $post_type_obj = get_post_type_object($post_type);
	    
	    if ($item->title == $post_type_obj->label) {
	    	    	
	        array_push($classes, 'current-menu-item');
	        
	    };
	}
	
    return $classes;
}
add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2 );
?>