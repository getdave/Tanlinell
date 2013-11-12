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

	
<?php do_action( 'tanlinell_content_wrapper_start');?>
	<?php do_action( 'tanlinell_content_main_start');?>
	
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content', 'page' ); ?>
	
		<?php endwhile; ?>

	<?php do_action( 'tanlinell_content_main_end');?>
<?php do_action( 'tanlinell_content_wrapper_end');?>


<?php get_footer(); ?>