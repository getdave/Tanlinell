<?php
/**
 * Base Wrapper template, all template route through here
 *
 * @package Tanlinell
 * @since Tanlinell 3.0.0
 */
?>

<?php get_template_part( 'templates/head' ); ?>
<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">

		<?php
		do_action( 'get_header' );
		get_template_part( 'templates/header' );
		?>

		<div id="content" class="<?php echo apply_filters( 'site_content_class', 'container site-content' ); ?>">
	
			<?php if( !function_exists('is_woocommerce') || !is_woocommerce()) : ?>
				<?php if ( current_theme_supports( 'breadcrumb-trail' ) ) breadcrumb_trail(); ?>
			<?php endif; ?>
			
			<?php do_action( 'tanlinell_content_wrapper_start');?>
				
				<?php do_action( 'tanlinell_content_main_start');?>
					<?php include tanlinell_template_path(); ?>
				<?php do_action( 'tanlinell_content_main_end');?>
				
				
				<?php if ( tanlinell_display_sidebar() ) : ?>
				<?php do_action( 'tanlinell_content_sub_start');?>
					<?php include tanlinell_sidebar_path(); ?>
				<?php do_action( 'tanlinell_content_sub_end');?>
				<?php endif; ?>
				
			<?php do_action( 'tanlinell_content_wrapper_end');?>
				
		</div><!-- #content .site-content -->
		
		
		<?php
		do_action( 'get_footer' );
		get_template_part( 'templates/footer' );
		?>

	</div><!-- #page .hfeed .site -->

<?php do_atomic( 'before_close_body'); ?>
</body>
</html>