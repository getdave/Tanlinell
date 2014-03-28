<?php
/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 * @link https://github.com/roots/roots
 */
function tanlinell_display_sidebar() {
  $sidebar_config = new Tanlinell_Sidebar(
    /**
     * Conditional tag checks (http://codex.wordpress.org/Conditional_Tags)
     * Any of these conditional tags that return true won't show the sidebar
     *
     * To use a function that accepts arguments, use the following format:
     *
     * array('function_name', array('arg1', 'arg2'))
     *
     * The second element must be an array even if there's only 1 argument.
     */
    array(
      'is_404',
      'is_front_page',
      'is_search'
    ),
    /**
     * Page template checks (via is_page_template())
     * Any of these page templates that return true won't show the sidebar
     */
    array(
      'template-custom.php'
    )
  );

  return apply_filters('tanlinell_display_sidebar', $sidebar_config->display);
}