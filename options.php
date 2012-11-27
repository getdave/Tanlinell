<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Define our directory path
	$imagepath =  get_template_directory_uri() . '/images/';


	// Setup the final options array
	$options = array();

	// ...begin Options definition


	/**
	 * Social Options
	 */
	$options[] = array(
		'name' => __('Social Settings', 'options_framework_theme'),
		'type' => 'heading');

	// Twitter Username
	$options[] = array(
		'name' => __('Twitter Profile', 'options_framework_theme'),
		'desc' => __('Enter your Twitter profile url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'twitter_profile_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	// Facebook Username
	$options[] = array(
		'name' => __('Facebook Page', 'options_framework_theme'),
		'desc' => __('Enter your Facebook page url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'facebook_page_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');




	/**
	 * Contact Details Options
	 */
	
	$options[] = array(
		'name' => __('Contact Settings', 'options_framework_theme'),
		'type' => 'heading');

	// Contact Telephone
	$options[] = array(
		'name' => __('Contact Telephone', 'options_framework_theme'),
		'desc' => __('Enter contact telephone. Used throughout the website.', 'options_framework_theme'),
		'id' => 'contact_telephone_number',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	// Contact Fax
	$options[] = array(
		'name' => __('Contact Fax', 'options_framework_theme'),
		'desc' => __('Enter contact fax. Used throughout the website.', 'options_framework_theme'),
		'id' => 'contact_fax_number',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	// Contact Email
	$options[] = array(
		'name' => __('Contact Email', 'options_framework_theme'),
		'desc' => __('Enter contact email address. Used throughout the website.', 'options_framework_theme'),
		'id' => 'contact_email_address',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Contact Address', 'options_framework_theme'),
		'desc' => __('Enter your full postal address. One line per address field.', 'options_framework_theme'),
		'id' => 'contact_address',
		'std' => '',
		'type' => 'textarea');



	// Return our Options to be created
	return $options;
}
