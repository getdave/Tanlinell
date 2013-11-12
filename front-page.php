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

	
<?php echo apply_filters( 'tanlinell_content_wrapper_html_open', '<div class="column-container">' );?>
	<?php echo apply_filters( 'tanlinell_main_wrapper_html_open', '<div class="main">' );?>
	
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content', 'page' ); ?>
	
		<?php endwhile; ?>

	<?php echo apply_filters( 'tanlinell_main_wrapper_html_close', '</div>' );?>
<?php echo apply_filters( 'tanlinell_content_wrapper_html_close', '</div>' );?>


<?php get_footer(); ?>