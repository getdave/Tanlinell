<?php do_atomic( 'before_banner' ); ?>
<header class="banner container-extend" role="banner">
	<div class="banner-inner container">
		<?php get_template_part( 'templates/partials/site-logo' ); ?>
		<div class="vh skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'tanlinell' ); ?>"><?php _e( 'Skip to content', 'tanlinell' ); ?></a></div>
		<?php get_template_part( 'templates/navigation/menu', 'primary' ); ?>
	</div>	
</header><!-- #masthead .site-header -->
<?php do_atomic( 'after_banner' ); ?>

	