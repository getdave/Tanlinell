<?php do_atomic('before_site_logo'); ?>		
<a class="site-logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
	<img src="<?php echo get_template_directory_uri() ?>/assets/images/site-logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
</a>	
<?php do_atomic('after_site_logo'); ?>	