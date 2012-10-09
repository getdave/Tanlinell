<?php 
/**
 * Customize the Access permission for the client
 *
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

/**
 * 	Adding a user role: tanlinell_admin
 */

add_role( 'tanlinell_admin', 'tanlinell admin' );

/**
 * 	Removing action buttons for the User Role : tanlinell_admin 
 * 
 * 	Disabling action buttons for the admin
 * 
 */
	
if( current_user_can( 'tanlinell_admin' ) ) {
	
	$prefix = $screen->is_network ? 'network_admin_' : '';
	
	// Plugin page action buttons
	add_filter( $prefix .'plugin_action_links', 'disable_plugin_deactivation', 10, 4 ); 
	add_filter('bulk_actions-plugins','plugin_page_bulk_actions');
	
}

function disable_plugin_deactivation( $actions, $plugin_file, $plugin_data, $context ) {
		// Remove edit link
		if ( array_key_exists( 'edit', $actions ) )
			unset( $actions['edit'] );
		// Remove deactivate link 
		if ( array_key_exists( 'deactivate', $actions ) )
			unset( $actions['deactivate'] );
		// Remove activate link
		if ( array_key_exists( 'activate', $actions ) )
			unset( $actions['activate'] );
		
		return $actions;
}

function plugin_page_bulk_actions($actions){
	
	unset( $actions['activate-selected'] );
	unset( $actions['deactivate-selected'] );
	
	return $actions;
}