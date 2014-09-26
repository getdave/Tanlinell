<?php
/**
 * CPT Sub Navigation
 */

$pt_obj = get_post_type_object( get_post_type() );

//requires cpt to be defined as 'hierarchical' => true
$args = array(
    'post_type'     => $pt_obj->name,
    'sort_column'   => 'menu_order, post_title',
    'sort_order'    => 'ASC',
    'title_li'      => false,
    'echo'          => 0
);
$list_pages      = wp_list_pages( $args ); 

$section_title = $pt_obj->labels->name;

?>

<?php if( $list_pages ) : ?>
<aside class="sidebar sidebar--nav-<?php echo $pt_obj->name; ?>">
    
	<h5 class="h4"><?php echo ucwords(esc_html($section_title)); ?></h5>

    <ul class="block-list block-list--dashed">
        <?php echo $list_pages; ?>
    </ul>	
    
</aside>
<?php endif; ?>