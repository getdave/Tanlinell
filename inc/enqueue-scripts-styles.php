<?php

/**
 * Enqueue scripts and styles
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */


function tanlinell_scripts() {
	
	/**
	 * ENQUEUE STYLESHEETS (CSS)
	 */
	wp_enqueue_style( 'style', get_stylesheet_uri() );



	/**
	 * ENQUEUE (JAVA)SCRIPTS
	 */	
	
	// Modernizr - custom build with only "essential" features. You should update this to your own requirements
	wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.custom.js', '', '1.0' , false );
	wp_enqueue_script('modernizr');
	
	// Plugins - all calls to init common plugins
	wp_register_script('plugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array('jquery-core'), '1.0' , true );
	wp_enqueue_script('plugins');

	// Main.js - custom javascript for the site
	wp_register_script('main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery-core'), '1.0' , true );
	wp_enqueue_script('main'); 

	// jQuery - load jQuery in the footer instead of header
    if (!is_admin()) {
        wp_deregister_script('jquery-core');
        wp_register_script('jquery-core', '/wp-includes/js/jquery/jquery.js', false, false, true);
				
		$theID = '';
        if(!empty($post->ID))
        	$theID = $post->ID;
		
        $site_details = array(
								'templateDirectoryUri'		=> get_template_directory_uri(),
								'siteUrl'					=> get_site_url(),
								'thePermalink'				=> get_permalink()
							);
		wp_localize_script('jquery-core', 'tanlinellSiteDetails', $site_details );
        wp_enqueue_script('jquery-core');
    }


	/**
	 * MISC CONDITIONAL STYLES
	 */
	if ( tanlinell_is_blog_page() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'tanlinell_scripts' );

?>