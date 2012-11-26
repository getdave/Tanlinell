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



	
	// HOMEPAGE WIDGETS (x3)
	/* register_sidebar( array(
		'name' => __( 'Homepage Area One', 'tanlinell' ),
		'id' => 'homepage-area-one',
		'description' => __( 'An optional widget area for your site homepage', 'tanlinell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Area Two', 'tanlinell' ),
		'id' => 'homepage-area-two',
		'description' => __( 'An optional widget area for your site homepage', 'tanlinell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) ); */
	
}

add_action( 'widgets_init', 'tanlinell_widgets_init' );


?>