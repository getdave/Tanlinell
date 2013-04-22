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
function email_encode_function( $atts, $content ){
	return '<a href="mailto:'.antispambot($content).'">'.antispambot($content).'</a>';
}

add_shortcode( 'email', 'email_encode_function' );





/**
 * Developer Credit Shortcode
 * 
 * Create and output Web Designer/Developer Credit
 */

function tanlinell_developer_credit($atts){

	// Our defaults
	$defaults = array(
		'the_credit'	=> 'Designed & Developed',
		'designer_name'	=> 'Burfield',
		'designer_url'	=> 'http://burfieldcreative.co.uk',
		'title'			=> 'Digital Agency Bristol',
		'hidden_text'	=> 'a Digital Agency in Bristol',
	);

	// Merge defaults with atts passed by user and extract to vars
	extract(shortcode_atts($defaults, $atts));

	// Clean some stuff...
	$clean_designer_url 	= esc_url($designer_url);
	$clean_title 			= esc_attr($title);
	$clean_the_credit		= esc_html($the_credit);

	return "{$clean_the_credit} by <a class='site-credit' target='_blank' href='{$clean_designer_url}' title='{$clean_title}'>{$designer_name} <span class='vh'>- {$hidden_text}</span></a>";
}

add_shortcode( 'developer_credit', 'tanlinell_developer_credit' );



