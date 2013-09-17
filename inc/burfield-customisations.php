<?php
/**
 * Burfield Customisation
 * 
 * custom tweaks for sites designed and created by Burfield
 * you might want to comment this out...
 * @package Tanlinell
 * @since Tanlinell 1.0
 */




/**
 * Add "current" Page Class to Menus
 * read more at:
 * http://wordpress.stackexchange.com/questions/6333/adding-class-current-page-item-for-custom-post-type-menu
 * 
 */
function tanlinell_page_css_class( $css_class, $page ) {
    global $post;
    if ( $post->ID == $page->ID ) {
        $css_class[] = 'current_page_item';
    }
    return $css_class;
}
add_filter( 'page_css_class', 'tanlinell_page_css_class', 10, 2 );