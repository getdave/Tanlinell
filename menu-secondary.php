<?php if ( has_nav_menu( 'secondary' ) ) : 

	$args = array( 
		'theme_location' => 'secondary', 
		'container' => 'nav', 
		'container_class' => 'menu menu-secondary', 
		'menu_class' => 'nav-secondary', 
		'menu_id' => 'nav-secondary', 
		'fallback_cb' => ''
	);

	wp_nav_menu( apply_filters( 'tanlinell_menu_secondary_args', $args ) ); 

endif; ?>