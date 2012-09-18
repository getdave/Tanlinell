<?php

/**
 * Register Nav Menus
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

// Register commonly used menus
// http://codex.wordpress.org/Function_Reference/register_nav_menus

register_nav_menus( array(
	'primary' 	=> __( 'Primary Menu', 'tanlinell' ),
	'footer' 	=> __( 'Footer Menu', 'tanlinell' ),
	//'utility' 	=> __( 'Utility Menu', 'tanlinell' ),
) );

?>