<?php
/**
 * WP Automatic Updates
 * Ensure we recieve the updates we want 
 */

// ==========================================================================
// CONFIGURE AUTOMATIC UPDATES
// ==========================================================================
//ensure minor
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
function always_return_false_for_vcs( $checkout, $context ) {
   return false;
}
add_filter( 'automatic_updates_is_vcs_checkout', 'always_return_false_for_vcs', 10, 2 );

?>