<?php 
/**
 * Descendant Pages List Navigation
 */

global $post;

if ($post) { // if there is no post (ie 404 page) then bail out
	$curr_pageid 	= $post->ID;
	$root_parent_id = tanlinell_get_root_parent( $curr_pageid, 'page');

	$args = array(
		'title_li' 	=> false,
		'echo' 		=> 0,
		'child_of' 	=> $root_parent_id,
	);
	$descendants_list = wp_list_pages( $args );

	$section_title = (get_the_title($root_parent_id)) ? get_the_title($root_parent_id) : 'In this section';
	?>
		
	<?php if( $descendants_list ) : ?>
	<aside class="menu-sub sidebar sidebar-descendantss">
		<h4 class="menu-sub__heading">
			<a href="<?php echo get_permalink($root_parent_id); ?>">
				<?php echo ucwords(esc_html($section_title)); ?>
			</a>
		</h4>
		<ul class="nav-sub">
		<?php echo $descendants_list; ?>
		</ul>
	</aside>
	<?php endif; ?>

<?php } ?>