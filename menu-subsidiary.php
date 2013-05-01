<?php if ( has_nav_menu( 'subsidiary' ) ) : ?>

	<?php wp_nav_menu( array( 'theme_location' => 'subsidiary', 'container' => 'div', 'container_class' => 'menu menu-subsidiary', 'menu_class' => 'nav nav-subsidiary', 'menu_id' => 'nav-subsidiary', 'fallback_cb' => '', 'depth' => 1 ) ); ?>

<?php endif; ?>