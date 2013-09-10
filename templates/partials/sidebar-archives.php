<?php 
/**
 * Archives List Navigation
 */
$args = array (
	'echo'		=>0,
	'title_li'	=>false,		
);
$archives_list= wp_get_archives( $args );

$section_title = 'Archives';
?>
	
<?php if( $archives_list ) : ?>
<aside class="menu-sub sidebar">
	<div class="menu-secondary">
		<h4 class="menu-sub__heading"><?php echo ucwords(esc_html($section_title)); ?></h4>
		<ul class="nav-sub">
		<?php echo $archives_list; ?>
		</ul>
	</div>
</aside>
<?php endif; ?>	