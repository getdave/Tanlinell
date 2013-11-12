<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>

<?php do_action( 'tanlinell_content_wrapper_start');?>
	
	<?php do_action( 'tanlinell_content_main_start');?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'page' ); ?>
	<?php endwhile; // end of the loop. ?>
	<?php do_action( 'tanlinell_content_main_end');?>

	<?php do_action( 'tanlinell_content_sub_start');?>		
		<?php get_sidebar(); ?>
	<?php do_action( 'tanlinell_content_sub_end');?>

<?php do_action( 'tanlinell_content_wrapper_end');?>

<?php get_footer(); ?>