<?php
/**
 * Admin Customisation
 * 
 * functions and tweaks to customise the WP Admin area *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */




/**
 * Remove Default WP Menu Items
 */

function remove_menu_items() {
	global $menu;

	// List those items you'd like to remove here
	$restricted = array(
		__('Links'), 
		//__('Comments')
	);
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
			unset($menu[key($menu)]);
		}
	}
}
add_action('admin_menu', 'remove_menu_items');



/**
 * Remove Default WP Dashboard Items
 */

function example_remove_dashboard_widgets() {
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
 	global $wp_meta_boxes;

	// Remove the "incomming links"
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);	

	// Remove "right now"
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);

	// Remove "Plugins"
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	
	// Remove "Primary Area"
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

	// Remove "Secondary Area"
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

// Hoook into the 'wp_dashboard_setup' action to register our function
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );





/**
 * De-regsiter WP Core Widgets
 *
 * Removes unwanted/unused WP Core Widgets
 */

// 
function tanlinell_unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	//unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	//unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	//unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
}

add_action('widgets_init', 'tanlinell_unregister_default_wp_widgets', 1);