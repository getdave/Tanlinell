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


<div id="content" class="<?php echo apply_atomic( 'site_content_class', 'site-content' ); ?>">
	
	<div class="column-container">
		<div class="main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content', 'page' ); ?>
	
		<?php endwhile; ?>
	
		</div><!-- .main -->
	</div>

</div>

<?php get_footer(); ?>