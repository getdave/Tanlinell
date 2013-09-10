<?php if ( has_nav_menu( 'primary' ) ) : 

	$args = array( 
		'theme_location' => 'primary', 
		'container' => 'nav', 
		'container_class' => 'menu menu-primary', 
		'menu_class' => 'nav-primary', 
		'menu_id' => 'nav-primary', 
		'fallback_cb' => ''
	);

	wp_nav_menu( apply_filters( 'tanlinell_menu_primary_args', $args ) ); 

endif; ?>