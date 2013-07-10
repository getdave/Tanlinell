<?php
/**
 * Admin Customisation
 * 
 * functions and tweaks to customise the WP Admin area *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */




/**
 * Remove The Ability to Edit Plugins via Edit screen
 */
define( 'DISALLOW_FILE_EDIT', true );




/**
 * Remove The Theme Editor
 */ 
function remove_editor() {
  $page = remove_submenu_page( 'themes.php', 'theme-editor.php' );
}
add_action( 'admin_init', 'remove_editor' );




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


/**
 * Unhide Kitchen Sink
 * 
 * Shows the "kitchen" sink view of the editor by default
 */

function tanlinell_unhide_kitchensink( $args ) {
	$args['wordpress_adv_hidden'] = false;
	return $args;
}
add_filter( 'tiny_mce_before_init', 'tanlinell_unhide_kitchensink' );



/**
 * Custom Post Type Icons CSS
 * 
 * Fixes broken CSS overflow on CPT menu icons
 *
 * @return void
 **/

function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
        #adminmenu .wp-menu-image {
        	overflow: hidden;
        }
    </style>
<?php } 
add_action( 'admin_head', 'cpt_icons' );



/**
 * Customize Contact Methods
 * @since 1.0.0
 *
 * @author Bill Erickson
 * @link http://sillybean.net/2010/01/creating-a-user-directory-part-1-changing-user-contact-fields/
 *
 * @param array $contactmethods
 * @return array
 */

function tanlinell_remove_contactmethods( $contactmethods ) {
    unset( $contactmethods['aim'] );
    unset( $contactmethods['yim'] );
    unset( $contactmethods['jabber'] );

    return $contactmethods;
}

add_filter( 'user_contactmethods' , 'tanlinell_remove_contactmethods');



/**
* Remove Upgrade Notice
*
* Stops WP Admin from displaying prompt to update WordPress core, so this can be handled by us via status dashboard.
*/

function wphidenag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action('admin_menu','wphidenag');





