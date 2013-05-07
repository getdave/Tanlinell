<?php


/**
 * Global Custom Meta Box
 * 'types' => array('post','page') -> default
 * Create ability to assign links to the slide
 */

global $custom_metabox;
$custom_metabox = $simple_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_page_titles',
	'title' => 'Page Titles',
	'template' => get_stylesheet_directory() . '/modules/global-metaboxes/page-titles/page-titles-layout.php',
	'mode' => WPALCHEMY_MODE_EXTRACT
));


?>