<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Tanlinell
 * @since Tanlinell 3.0.0
 */
?>

<article id="post-0" class="post error404 not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( '404 Not Found.', 'tanlinell' ); ?></h1>
	</header><!-- .entry-header -->
	
	<div class="alert alert-warning">
	  <?php _e('Sorry, but the page you were trying to view does not exist.', 'roots'); ?>
	</div>
	
	<div class="entry-content">
		<p><?php _e( 'Perhaps you could try the <a href="/sitemap/" title="View the website sitemap">sitemap</a> or use the search form <a title="Search the site" href="#site-search">below</a>.', 'tanlinell' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 .post .error404 .not-found -->
