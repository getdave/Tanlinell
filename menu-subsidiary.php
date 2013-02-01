<?php if ( has_nav_menu( 'subsidiary' ) ) : ?>

	<?php wp_nav_menu( array( 'theme_location' => 'subsidiary', 'container' => 'div', 'container_class' => 'menu menu-subsidiary firstcol size1of2', 'menu_class' => 'nav nav-subsidiary', 'menu_id' => 'nav-subsidiary', 'fallback_cb' => '' ) ); ?>

<?php endif; ?>