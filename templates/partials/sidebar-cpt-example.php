<?php
/**
 * CPT-Example List Navigation
 */
/*
$pt_obj = get_post_type_object( 'CPT-Example' );

//requires cpt to be defined as 'hierarchical' => true
$args = array(
	'post_type'=>$pt_obj->name,
	'title_li'=> false,
	'echo'=>0
);
$list_pages      = wp_list_pages( $args ); 

$section_title = $pt_obj->name;
*/
?>

<?php /*
if( $list_pages ) : ?>
    <aside class="menu-sub">
        <h4 class="menu-sub__heading"><?php echo ucwords(esc_html($section_title)); ?></h4>
        <ul class="nav-sub">
        <?php echo $list_pages; ?>
        </ul>
    </aside>
<?php endif;
*/ ?>