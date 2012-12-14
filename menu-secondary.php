<?php if ( has_nav_menu( 'secondary' ) ) : ?>

	<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => 'nav', 'container_class' => 'menu menu-secondary', 'menu_class' => 'nav nav-secondary text-right', 'menu_id' => 'nav-secondary', 'fallback_cb' => '' ) ); ?>

<?php endif; ?>