<?php if ( has_nav_menu( 'primary' ) ) : 

	$args = array( 
		'theme_location' => 'primary', 
		'container' => 'nav', 
		'container_class' => 'menu menu-primary', 
		'menu_class' => 'nav-primary', 
		'menu_id' => 'nav-primary', 
		'fallback_cb' => '',
		'walker' => new tanlinell_add_cpt_descendants_primary_menu_walker,
	);

	wp_nav_menu( apply_filters( 'tanlinell_menu_primary_args', $args ) ); 

endif; ?>

<?php
class tanlinell_add_cpt_descendants_primary_menu_walker extends Walker_Nav_Menu {
	
	/**
	 * Apend a manual sub list of descendants of a cpt archive menu link 
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		
		global $wp_query, $post;
		
		$current_post = $post; 
		
		$all_custom_post_types 	= get_post_types( array ( '_builtin' => FALSE ) );
		$custom_types      		= array_keys( $all_custom_post_types );
		
		foreach ( $custom_types AS $post_type ) {
			
			$post_type_obj = get_post_type_object( $post_type );
			$archive_post = get_page_by_path( $post_type_obj->has_archive );	
			
			if ( false != $archive_post && $archive_post->ID == $item->object_id ) {
			
				$args = array(
					'post_type' => $post_type_obj->name,
					'orderby' => 'menu_order',
					'order' => 'ASC'
				);		
				$custom_posts_obj = new WP_Query($args);
				if( $custom_posts_obj->have_posts() ) :
					
					$output .= '<ul class="sub-menu">';
						
						foreach ( $custom_posts_obj->posts AS $cpt_item ) :
				
							/**
							 * Build the el 
							 */
							$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
							$class_names = $value = '';
					
							$classes = array(
            							    'menu-item', 
            							    'menu-item-type-post_type', 
            							    'menu-item-object-service'
							);
							
							
							if( isset($current_post->ID) && isset($cpt_item->ID) ) {
    						    if ( $current_post->ID == $cpt_item->ID ) {
    								array_push($classes, 'current-menu-item');
    								array_push($classes, 'current_page_item');
    							}	
							}
							
							
							$classes[] = 'menu-item-' . $cpt_item->ID;
					
							/**
							 * Filter the CSS class(es) applied to a menu item's <li>.
							 *
							 * @since 3.0.0
							 *
							 * @param array  $classes The CSS classes that are applied to the menu item's <li>.
							 * @param object $item    The current menu item.
							 * @param array  $args    An array of arguments. @see wp_nav_menu()
							 */
							$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $cpt_item, $args ) );
							$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
					
							/**
							 * Filter the ID applied to a menu item's <li>.
							 *
							 * @since 3.0.1
							 *
							 * @param string The ID that is applied to the menu item's <li>.
							 * @param object $item The current menu item.
							 * @param array $args An array of arguments. @see wp_nav_menu()
							 */
							$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $cpt_item->ID, $cpt_item, $args );
							$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
					
							$output .= $indent . '<li' . $id . $value . $class_names .'>';
					
							$atts = array();
							$atts['title']  = ! empty( $cpt_item->post_title ) ? $cpt_item->post_title : '';
							$atts['href']   = (false != get_permalink( $cpt_item->ID ) )? get_permalink( $cpt_item->ID )   : '';
							
											
							/**
							 * Filter the HTML attributes applied to a menu item's <a>.
							 *
							 * @since 3.6.0
							 *
							 * @param array $atts {
							 *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
							 *
							 *     @type string $title  The title attribute.
							 *     @type string $target The target attribute.
							 *     @type string $rel    The rel attribute.
							 *     @type string $href   The href attribute.
							 * }
							 * @param object $item The current menu item.
							 * @param array  $args An array of arguments. @see wp_nav_menu()
							 */
							$atts = apply_filters( 'nav_menu_link_attributes', $atts, $cpt_item, $args );
					
							$attributes = '';
							foreach ( $atts as $attr => $value ) {
								if ( ! empty( $value ) ) {
									$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
									$attributes .= ' ' . $attr . '="' . $value . '"';
								}
							}
							
							$item_output = '<a'. $attributes .'>';
							/** This filter is documented in wp-includes/post-template.php */
							$item_output .= apply_filters( 'the_title', $cpt_item->post_title, $cpt_item->ID );
							$item_output .= '</a>';
					
							/**
							 * Filter a menu item's starting output.
							 *
							 * The menu item's starting output only includes $args->before, the opening <a>,
							 * the menu item's title, the closing </a>, and $args->after. Currently, there is
							 * no filter for modifying the opening and closing <li> for a menu item.
							 *
							 * @since 3.0.0
							 *
							 * @param string $item_output The menu item's starting HTML output.
							 * @param object $item        Menu item data object.
							 * @param int    $depth       Depth of menu item. Used for padding.
							 * @param array  $args        An array of arguments. @see wp_nav_menu()
							 */
							$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $cpt_item, $depth, $args );
									
						endforeach; 
						
					$output .= '</ul>';
			
				endif;//if( $custom_posts_obj->have_posts() ): 
					
			}//if ( $archive_post->ID == $item->object_id )
			
		}//foreach ( $custom_types AS $post_type ) {
		
		//close the item
	    $output .= "</li>\n";
	}
	
}
?>