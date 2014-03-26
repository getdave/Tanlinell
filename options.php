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
		'name' => __('Company Accounts', 'options_framework_theme'),
		'type' => 'heading');

	// GA Account	
	$options[] = array(
		'name' => __('Google Analytics ID', 'options_framework_theme'),
		'desc' => __('Enter the Google Analytics ID', 'options_framework_theme'),
		'id' => 'google_analytics_id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
				
	// Twitter Page
	$options[] = array(
		'name' => __('Twitter Profile', 'options_framework_theme'),
		'desc' => __('Enter your Twitter profile url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'twitter_profile_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	// Facebook Page
	$options[] = array(
		'name' => __('Facebook Page', 'options_framework_theme'),
		'desc' => __('Enter your Facebook page url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'facebook_page_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	// YouTube Page
	$options[] = array(
		'name' => __('YouTube Page', 'options_framework_theme'),
		'desc' => __('Enter your YouTube page url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'youtube_page_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	// Vimeo Page
	$options[] = array(
		'name' => __('Vimeo Page', 'options_framework_theme'),
		'desc' => __('Enter your Vimeo page url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'vimeo_page_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	// Instagram Page
	$options[] = array(
		'name' => __('Instagram Page', 'options_framework_theme'),
		'desc' => __('Enter your Instagram page url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'instagram_page_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	// LinkedIn Page
	$options[] = array(
		'name' => __('LinkedIn Page', 'options_framework_theme'),
		'desc' => __('Enter your LinkedIn page url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'linkedin_page_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	// Google+ Company Page
	$options[] = array(
		'name' => __('Google+ Company Page', 'options_framework_theme'),
		'desc' => __('Enter your Google+ Company Page url. Used throughout the website.', 'options_framework_theme'),
		'id' => 'google_company_page_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');




	/**
	 * Contact Details Options
	 */
	
	$options[] = array(
		'name' => __('vCard Settings', 'options_framework_theme'),
		'type' => 'heading');	
	
	// Contact Telephone
	$options[] = array(
		'name' => __('Contact Telephone', 'options_framework_theme'),
		'desc' => __('Enter contact telephone. Used throughout the website.', 'options_framework_theme'),
		'id' => 'contact_telephone',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	// Contact Fax
	$options[] = array(
		'name' => __('Contact Fax', 'options_framework_theme'),
		'desc' => __('Enter contact fax. Used throughout the website.', 'options_framework_theme'),
		'id' => 'contact_fax',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	// Allow Contact Numbers to display in vcard
	$options[] = array(
		'name' => __('Display Contact Numbers', 'options_framework_theme'),
		'desc' => __('Display the contact numbers in the vcard? This includes \'Contact Telephone\' &amp; \'Contact Fax\'', 'options_framework_theme'),
		'id' => 'display_numbers',
		'std' => '',
		'type' => 'checkbox');
		
	
	// Contact Email
	$options[] = array(
		'name' => __('Contact Email', 'options_framework_theme'),
		'desc' => __('Enter contact email address. Used throughout the website.', 'options_framework_theme'),
		'id' => 'contact_email',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Street Address 1', 'options_framework_theme'),
		'desc' => __('1st line of address', 'options_framework_theme'),
		'id' => 'contact_address_street_address_1',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Street Address 2', 'options_framework_theme'),
		'desc' => __('2nd line of address', 'options_framework_theme'),
		'id' => 'contact_address_street_address_2',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Town/City', 'options_framework_theme'),
		'desc' => __('Town or City', 'options_framework_theme'),
		'id' => 'contact_address_locality',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('County', 'options_framework_theme'),
		'desc' => __('The county or region', 'options_framework_theme'),
		'id' => 'contact_address_region',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Postcode', 'options_framework_theme'),
		'desc' => __('Enter your postcode', 'options_framework_theme'),
		'id' => 'contact_address_post_code',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Country', 'options_framework_theme'),
		'desc' => __('Enter your Country (eg: England)', 'options_framework_theme'),
		'id' => 'contact_address_country',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Address Latitude', 'options_framework_theme'),
		'desc' => __('Enter the Latitude', 'options_framework_theme'),
		'id' => 'contact_address_latitude',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Address Longitude', 'options_framework_theme'),
		'desc' => __('Enter the Longitude', 'options_framework_theme'),
		'id' => 'contact_address_longitude',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');



	// Return our Options to be created
	return $options;
}
