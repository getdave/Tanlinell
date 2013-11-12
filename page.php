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

<?php echo apply_filters( 'tanlinell_content_wrapper_html_open', '<div class="column-container">' );?>
	
	<?php echo apply_filters( 'tanlinell_main_wrapper_html_open', '<div class="main">' );?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'page' ); ?>
	<?php endwhile; // end of the loop. ?>	echo 	
	<?php echo apply_filters( 'tanlinell_main_wrapper_html_close', '</div>' );?>

	<?php echo apply_filters( 'tanlinell_sub_wrapper_html_open', '<div class="sub">' );?>
		<?php get_sidebar(); ?>
	<?php echo apply_filters( 'tanlinell_sub_wrapper_html_close', '</div>' );?>

<?php echo apply_filters( 'tanlinell_content_wrapper_html_close', '</div>' );?>

<?php get_footer(); ?>