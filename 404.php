<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>

<div class="column-container">
	<div class="main" role="main">
		<article id="post-0" class="post error404 not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Sorry, but that page can&rsquo;t be found.', 'tanlinell' ); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p><?php _e( 'It looks like nothing was found at this location. Perhaps you could try the <a href="/sitemap/" title="View the website sitemap">sitemap</a>.', 'tanlinell' ); ?></p>

			</div><!-- .entry-content -->
		</article><!-- #post-0 .post .error404 .not-found -->
	</div><!-- .main -->
	<div class="sub">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>