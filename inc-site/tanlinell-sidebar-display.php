<?php 
/**
 * Tanlinell Theme -> Sidebar Display Hook
 *
 * @package SITE
 */


add_filter('tanlinell_display_sidebar', 'tanlinell_sidebar_on_special_page');

function tanlinell_sidebar_on_special_page($sidebar) {
  
  if (	is_page( array( 'sitemap' ) ) ||
        ( is_page() && (false == tanlinell_has_children() && false == $post->post_parent )) ||
  		!have_posts() ) {
    return false;
  }
  
  return $sidebar;
}