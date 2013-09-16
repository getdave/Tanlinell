<?php
/**
 * CPT-Example List Navigation
 */

$pt_obj = get_post_type_object( get_post_type() );

//requires cpt to be defined as 'hierarchical' => true
$args = array(
	'post_type'=>$pt_obj->name,
	'title_li'=> false,
	'echo'=>0
);
$list_pages      = wp_list_pages( $args ); 

$section_title = $pt_obj->labels->name;

?>

<?php if( $list_pages ) : ?>
    <aside class="menu-<?php echo $pt_obj->name; ?> sidebar">
        <h4 class="menu-<?php echo $pt_obj->name; ?>__heading"><?php echo ucwords(esc_html($section_title)); ?></h4>
        <ul class="nav-<?php echo $pt_obj->name; ?>">
        <?php echo $list_pages; ?>
        </ul>
    </aside>
<?php endif; ?>