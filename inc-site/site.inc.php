<?php 
/**
 * Tanlinell project specific includes
 *
 * @package Tanlinell
 * @since Tanlinell 3.0.0
 */
/**
 * Includes before Default Inc directory allowing ovveride of built in functionality 
 */


/**
 * BC Plugin -> Global Configuration
 */	
require_once locate_template( '/inc-site/bc-plugin-globals.php' );

/**
 * BC Plugin -> CPT as Descendant of Page 
 */
require_once locate_template( '/inc-site/bc-plugin-cpt-as-descendant.php' );