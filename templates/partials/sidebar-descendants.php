<?php 
/**
 * Descendant Pages List Navigation
 */
$curr_pageid 	= get_the_ID(); 
$root_parent_id = tanlinell_get_root_parent( $curr_pageid, 'page');

$args = array(
	'title_li' => false,
	'echo' => 0,
	'child_of' => $root_parent_id,
);
$descendants_list = wp_list_pages( $args );

$section_title = (get_the_title($root_parent_id)) ? get_the_title($root_parent_id) : 'In this section';
?>
	
<?php if( $descendants_list ) : ?>
<aside class="menu-sub">
	<h4 class="menu-sub__heading"><?php echo ucwords(esc_html($section_title)); ?></h4>
	<ul class="nav-sub">
	<?php echo $descendants_list; ?>
	</ul>
</aside>
<?php endif; ?>