<?php
/**
 * Default Menu Setup
 * 
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

function tanlinell_default_menu_setup() {
	
	$default_menus = array(
		array(
			'name'=>'Primary Navigation',
			'location'=>'primary',
		),
		array(
			'name'=>'Footer Navigation',
			'location'=>'subsidiary',
		),
	);
	
	//reusable 'pages/menu-items' for both $default_menus	
	$home_obj = get_page_by_path('home');
	$home_args = array(
		'menu-item-object-id' => $home_obj->ID,
		'menu-item-object' => $home_obj->post_type,
		'menu-item-type' => 'post_type',
		'menu-item-status' => 'publish',
	);
	
	$news_obj = get_page_by_path('news');
	$news_args = array(
		'menu-item-object-id' => $news_obj->ID,
		'menu-item-object' => $news_obj->post_type,
		'menu-item-type' => 'post_type',
		'menu-item-status' => 'publish',
	);

	foreach ( $default_menus AS $default_menu ) {
		
	    if( false != wp_get_nav_menu_object( $default_menu['name'] ) ) {
	    
	        $menu_id = wp_create_nav_menu( $default_menu['name'] );
	
	        wp_update_nav_menu_item( $menu_id, 0, $home_args );
			        
	        wp_update_nav_menu_item( $menu_id, 0, $news_args );
	
			//grab all the locations
	        $locations = get_theme_mod('nav_menu_locations');
	        //update the location to the new id
	        $locations[$default_menu['location']] = $menu_id;
	        //and insert
	        set_theme_mod( 'nav_menu_locations', $locations );
	    }
		
	}

}
add_action( 'after_switch_theme', 'tanlinell_default_menu_setup' );
?>