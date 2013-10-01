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

	// Localize WordPress vars in JS
	$theID = '';
    if(!empty($post->ID))
    	$theID = $post->ID;

    $site_details = array(
							'templateDirectoryUri'		=> get_template_directory_uri(),
							'siteUrl'					=> get_site_url(),
							'thePermalink'				=> get_permalink()
						);
    wp_enqueue_script('modernizr');
	wp_localize_script('modernizr', 'tanlinellSiteDetails', $site_details );


	// jQuery - load jQuery in the footer instead of header
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', false, false, true);
	}

	// Site.js - compiled and minified Site JS
	wp_register_script('site', get_template_directory_uri() . '/assets/js/site.min.js', array('jquery'), '1.0' , true );
	wp_enqueue_script('site');

	/**
	 * MISC CONDITIONAL STYLES
	 */
	if ( tanlinell_is_blog_page() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'tanlinell_scripts' );

?>