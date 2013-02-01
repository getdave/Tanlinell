<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
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