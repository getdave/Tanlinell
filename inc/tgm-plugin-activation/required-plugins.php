<?php

/**
 * Required Plugins
 *
 * Utilises the TGM Plugin Activation system to require/recommend that users
 * install certain Plugins before using your Theme. 
 * http://tgmpluginactivation.com/
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
 

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'Developer',
			'slug' 		=> 'developer',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'BlackBox Debug Bar',
			'slug' 		=> 'blackbox-debug-bar',
			'required' 	=> false,
		),		

		array(
            'name'      => 'WordPress SEO by Yoast',
            'slug'      => 'wordpress-seo',
            'required'  => true,
        ),

        array(
            'name'      => 'Google Analytics for WordPress',
            'slug'      => 'google-analytics-for-wordpress',
            'required'  => true,
        ),

        array(
            'name'      => 'Google XML Sitemaps',
            'slug'      => 'google-sitemap-generator',
            'required'  => true,
        ),

        array(
            'name'      => 'Advanced Sitemap Generator',
            'slug'      => 'advanced-sitemap-generator',
            'required'  => true,
        ),

		array(
			'name' 		=> 'WP Example Content',
			'slug' 		=> 'wp-example-content',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Widget Logic',
			'slug' 		=> 'widget-logic',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Advanced Custom Fields',
			'slug' 		=> 'advanced-custom-fields',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Features by WooThemes',
			'slug' 		=> 'features-by-woothemes',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Testimonials by WooThemes',
			'slug' 		=> 'testimonials-by-woothemes',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'User Role Editor',
			'slug' 		=> 'user-role-editor',
			'required' 	=> true,
		),

		array(
			'name' 		=> 'W3 Total Cache',
			'slug' 		=> 'w3-total-cache',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Better WP Security',
			'slug' 		=> 'better-wp-security',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'WP Mail SMTP',
			'slug' 		=> 'wp-mail-smtp',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'WP Smush.it',
			'slug' 		=> 'wp-smushit',
			'required' 	=> true,
		),

		array(
			'name' 		=> 'WPThumb',
			'slug' 		=> 'wp-thumb',
			'required' 	=> true,
		),

		array(
			'name' 		=> 'Posts 2 Posts',
			'slug' 		=> 'posts-to-posts',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Add Descendants As Submenu Items',
			'slug' 		=> 'add-descendants-as-submenu-items',
			'required' 	=> false,
		),

		




		

		

		




		

		


		

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tanlinell';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> 'The following Plugins are recommended for use with Tanlinell core.',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}