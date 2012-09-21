<?php

/**
 * Custom Widgets
 *
 * Use this file to write and create your own custom Widgets
 * http://codex.wordpress.org/Widgets_API
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */



/**
 * EXAMPLE WIDGET
 */
class My_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
	}

 	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
	}

}
register_widget( 'My_Widget' );

?>