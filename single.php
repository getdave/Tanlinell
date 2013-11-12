<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>

<?php echo apply_filters( 'tanlinell_content_wrapper_html_open', '<div class="column-container">' );?>

	<?php echo apply_filters( 'tanlinell_main_wrapper_html_open', '<div class="main">' );?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php tanlinell_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template( '', true );
			?>

		<?php endwhile; // end of the loop. ?>

	<?php echo apply_filters( 'tanlinell_main_wrapper_html_close', '</div>' );?>

	<?php echo apply_filters( 'tanlinell_sub_wrapper_html_open', '<div class="sub">' );?>
		<?php get_sidebar(); ?>
	<?php echo apply_filters( 'tanlinell_sub_wrapper_html_close', '</div>' );?>

<?php echo apply_filters( 'tanlinell_content_wrapper_html_close', '</div>' );?>

<?php get_footer(); ?>