<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>


<?php
/**
 * Sidebar partials
 */
?>

<?php if ( tanlinell_is_custom_post_type() ) : ?>
	<?php get_template_part( 'templates/partials/sidebar', 'cpt-example' ); ?>
<?php endif; ?>

<?php if (tanlinell_is_blog_page()) : ?>

	<?php get_template_part( 'templates/partials/sidebar', 'categories' ); ?>
	
	<?php get_template_part( 'templates/partials/sidebar', 'archives' ); ?>

<?php else : ?>
	
	<?php get_template_part( 'templates/partials/sidebar', 'descendants' ); ?>
	
<?php endif; ?>


<?php
/**
 * Dynamic widgets
 */
?>
<?php if ( is_active_sidebar( 'primary' ) ) : ?>

	<div id="sidebar-primary" class="sidebar">

		<?php dynamic_sidebar( 'primary' ); ?>

	</div><!-- #primary -->

<?php endif; ?>


<?php if ( is_active_sidebar( 'secondary' ) ) : ?>

	<div id="sidebar-secondary" class="sidebar">

		<?php dynamic_sidebar( 'secondary' ); ?>

	</div><!-- #primary -->

<?php endif; ?>