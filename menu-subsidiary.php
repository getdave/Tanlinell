<?php if ( has_nav_menu( 'subsidiary' ) ) : 

	$args = array( 
		'theme_location' => 'subsidiary', 
		'container' => 'nav', 
		'container_class' => 'menu menu-subsidiary', 
		'menu_class' => 'nav-subsidiary', 
		'menu_id' => 'nav-subsidiary', 
		'fallback_cb' => '',
		'depth' => 1
	);

	wp_nav_menu( apply_filters( 'tanlinell_menu_subsidiary_args', $args ) ); 

endif; ?>