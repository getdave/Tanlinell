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


/**
 * Email Encode/Obfuscate Shortcode
 *
 * accepts a given email address and obfuscates via antispambot function
 * usage:  [email]your@email.com[/email]
 */
function tanlinell_encoded_email( $atts, $content ) {
	return '<a href="mailto:'.antispambot( $content ).'">'.antispambot( $content ).'</a>';
}

add_shortcode( 'email', 'tanlinell_encoded_email' );
