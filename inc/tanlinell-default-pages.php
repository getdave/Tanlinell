<?php
/**
 * Default Page Setup
 * 
 * creates pages and sets config to allow /blog/ and /home/ to load our templates
 */

function tanlinell_default_page_setup() {
	
	$defaults = array(
		0 => array(
			'slug' => 'news',
			'name' => 'News',
		),
		1 => array(
			'slug' => 'home',
			'name' => 'Home',
		),
		2 => array(
			'slug' => 'sitemap',
			'name' => 'Sitemap',
		),
	);
	foreach($defaults AS $p) {
	
		// Initialize the page ID to -1. This indicates no action has been taken.
		$post_id = -1;
	
		// Setup the author, slug, and title for the post
		$author_id = 1;
	
		// If the page doesn't already exist, then create it
		if( null == get_page_by_title( $p['name'] ) ) :
	
			// Set the post ID so that we know the post was created successfully
			$post_id = wp_insert_post(
				array(
					'comment_status'=>	'closed',
					'ping_status'	=>	'closed',
					'post_author'	=>	$author_id,
					'post_name'		=>	$p['slug'],
					'post_title'	=>	$p['name'],
					'post_status'	=>	'publish',
					'post_type'		=>	'page'
				)
			);
		
		else:
			// Arbitrarily use -2 to indicate that the page with the title already exists
			$post_id = -2;
		endif;
		
	}
	
	
	// Use a static front_page.php
	$front_page = get_page_by_title( 'Home' );
	update_option( 'page_on_front', $front_page->ID );
	update_option( 'show_on_front', 'page' );
	
	// Set the blog page or home.php
	$home   = get_page_by_title( 'News' );
	update_option( 'page_for_posts', $home->ID );
	
}
add_action( 'after_switch_theme', 'tanlinell_default_page_setup' );

