<?php
/**
 * FRONT PAGE TEMPLATE
 *
 * This template will default to be the home page for your website.
 * Edit this template to change the layout and content of the page
 * that is marked as "homepage" on your website.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<h1>HOMEPAGE!!!!</h1>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>