<?php
/**
 * SITE -> Layout Overrides 
 */
/**
 * SITE: Override Hybrid-Core body_class extension  
 */
function site_body_class_override_layout( $classes ) {

	global $post, $wp_query;
	
	foreach( $classes AS $k=>$item )
		if( 'layout-2c-l' == $item )
			unset($classes[$k]);
		
	return $classes;
}
add_filter( 'body_class', 'site_body_class_override_layout', 100 );


/**
 * Main wrapping markup classes found in header.php 
 */
function tanlinell_site_content_class( $classes ) {
	
	if ( tanlinell_display_sidebar() ) {
		
		/*
		if(  ):
			// Condition
			$classes .= ' layout-2c-l';
		else :
			// Classes on pages with the sidebar
			$classes .= ' layout-2c-r';
		endif;
		*/
		
		$classes .= ' layout-2c-l';
		
	} else {
		// Classes on full width pages
		$classes .= ' layout-1c';
	}
	
	return $classes;
}
add_action( 'site_content_class', 'tanlinell_site_content_class' );