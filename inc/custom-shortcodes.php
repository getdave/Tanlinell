<?php

/**
 * Custom Shortcodes
 *
 * Use this file to write and create your own custom shortcode functions
 * http://codex.wordpress.org/Shortcode_API
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */



// EXAMPLE
function tanlinell_example_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts ) );

	return "foo = {$foo}";
}
add_shortcode( 'exampletag', 'tanlinell_example_shortcode' );

?>