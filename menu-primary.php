<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'nav', 'container_class' => 'menu menu-primary', 'menu_class' => 'nav-primary', 'menu_id' => 'nav-primary', 'fallback_cb' => '' ) ); ?>

<?php endif; ?>