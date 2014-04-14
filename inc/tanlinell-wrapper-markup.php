<?php
/**
 * Main wrapping markup classes found in header.php 
 */
if( ! function_exists( 'tanlinell_site_content_class' ) ) :

	function tanlinell_site_content_class( $classes ) {
		
		if ( tanlinell_display_sidebar() ) {
			// Classes on pages with the sidebar
			$classes .= ' layout-2c-l';
		} else {
			// Classes on full width pages
			$classes .= ' layout-1c';
		}
		
		return $classes;
	}
	add_action( 'site_content_class', 'tanlinell_site_content_class' );
	
endif;

/**
 * CONTENT WRAPPER MARKUP
 * defines the wrapper for the #content area
 */
function tanlinell_do_content_wrapper_start() {
	echo apply_filters( 'tanlinell_content_wrapper_html_open', '<div class="column-container">' );
}
add_action( 'tanlinell_content_wrapper_start', 'tanlinell_do_content_wrapper_start' );
add_action( 'bc_p_content_wrapper_start', 'tanlinell_do_content_wrapper_start' );

function tanlinell_do_content_wrapper_end() {
	echo apply_filters( 'tanlinell_content_wrapper_html_close', '</div>' );
}
add_action( 'tanlinell_content_wrapper_end', 'tanlinell_do_content_wrapper_end' );
add_action( 'bc_p_content_wrapper_end', 'tanlinell_do_content_wrapper_end' );


/**
 * MAIN CONTENT WRAPPER MARKUP
 * defines the wrapper for the <main> area
 */
function tanlinell_do_content_main_start() {
	echo apply_filters( 'tanlinell_content_main_html_open', '<main class="main">' );
}
add_action( 'tanlinell_content_main_start', 'tanlinell_do_content_main_start' );
add_action( 'bc_p_content_main_start', 'tanlinell_do_content_main_start' );

function tanlinell_do_content_main_end() {
	echo apply_filters( 'tanlinell_content_main_html_close', '</main>' );
}
add_action( 'tanlinell_content_main_end', 'tanlinell_do_content_main_end' );
add_action( 'bc_p_content_main_end', 'tanlinell_do_content_main_end' );


/**
 * SUB CONTENT WRAPPER MARKUP
 * defines the wrapper for the sub content (sidebar) area
 */
function tanlinell_do_content_sub_start() {
	echo apply_filters( 'tanlinell_content_sub_html_open', '<div class="sub">' );
}
add_action( 'tanlinell_content_sub_start', 'tanlinell_do_content_sub_start' );
add_action( 'bc_p_content_sub_start', 'tanlinell_do_content_sub_start' );

function tanlinell_do_content_sub_end() {
	echo apply_filters( 'tanlinell_content_sub_html_close', '</div>' );
}
add_action( 'tanlinell_content_sub_end', 'tanlinell_do_content_sub_end' );
add_action( 'bc_p_content_sub_start', 'tanlinell_do_content_sub_end' );

