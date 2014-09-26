<?php 
/**
 * Descendant Pages List Navigation
 */

global $post;
?>

<?php if( $post ) : ?>

    <?php
	$curr_pageid = $post->ID;
	$root_parent_id = tanlinell_get_root_parent( $curr_pageid, 'page');

	$args = array(
        'sort_column'   => 'menu_order, post_title',
        'sort_order'    => 'ASC',
        'title_li'      => false,        
		'child_of'      => $root_parent_id,
		'echo'          => 0
	);
	$list_pages = wp_list_pages( $args ); 

	$section_title = get_the_title( $root_parent_id );
	if( false == $section_title ) {
        $section_title = 'In this section';
    }
	?>
		
	<?php if( $list_pages ) : ?>
	<aside class="sidebar sidebar--nav-descendants">
		
		<h5 class="h4"><?php echo ucwords(esc_html($section_title)); ?></h5>
        
        <ul class="block-list block-list--dashed">
            <?php echo $list_pages; ?>
        </ul>
        
	</aside>
	<?php endif; ?>

<?php endif; ?>