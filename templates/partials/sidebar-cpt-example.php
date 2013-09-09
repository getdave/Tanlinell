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
    <aside class="menu-%%cpt_name%% sidebar">
        <h4 class="menu-%%cpt_name%%__heading"><?php echo ucwords(esc_html($section_title)); ?></h4>
        <ul class="nav-%%cpt_name%%">
        <?php echo $list_pages; ?>
        </ul>
    </aside>
<?php endif;
*/ ?>