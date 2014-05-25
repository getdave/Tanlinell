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
	<aside class="sidebar menu-<?php echo $pt_obj->name; ?>">
	
		<div class="panel">
		    <h5 class="h3 panel__heading"><?php echo ucwords(esc_html($section_title)); ?></h5>
			
		    <div class="panel__content">
				<ul class="list-spaced nav-<?php echo $pt_obj->name; ?>">
		        <?php echo $list_pages; ?>
		        </ul>
		    </div>
		</div>
	
	</aside>
<?php endif; ?>