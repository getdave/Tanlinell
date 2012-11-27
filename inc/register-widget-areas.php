<?php

/**
 * Register Widgets
 * 
 * registers widgets for sidebars, footers and widgetized homepages
 * add new widget areas as required and be sure to update Widget IDs
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */


function tanlinell_widgets_init() {

	// HOMEPAGE WIDGETS (x3)
	register_sidebar( array(
		'name' => __( 'Homepage Feature One', 'tanlinell' ),
		'id' => 'homepage-feature-one',
		'description' => __( '1st feature block used on the website homepage.', 'tanlinell' ),
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Feature Two', 'tanlinell' ),
		'id' => 'homepage-feature-two',
		'description' => __( '2nd feature block used on the website homepage.', 'tanlinell' ),
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Feature Three', 'tanlinell' ),
		'id' => 'homepage-feature-three',
		'description' => __( '3rd feature block used on the website homepage.', 'tanlinell' ),
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );



	// FOOTER WIDGETS (x3)
	register_sidebar( array(
		'name' => __( 'Footer Area One', 'tanlinell' ),
		'id' => 'sidebar-area-one',
		'description' => __( 'Used in the footer of the website. The first of 3 widget areas.', 'tanlinell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'tanlinell' ),
		'id' => 'footer-area-two',
		'description' => __( 'Used in the footer of the website. The second of 3 widget areas.', 'tanlinell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'tanlinell' ),
		'id' => 'footer-area-three',
		'description' => __( 'Used in the footer of the website. The third of 3 widget areas.', 'tanlinell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
}

add_action( 'widgets_init', 'tanlinell_widgets_init',11); // we set 11 as the priority because we want this to execute after the Hybrid core widgets


?>