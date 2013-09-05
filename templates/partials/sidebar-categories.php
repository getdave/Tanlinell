<?php
/**
 * Category List Navigation
 */
$args = array (
	'echo'		=>0,
	'title_li'	=>false,
);
$categories_list= wp_list_categories( $args );

$section_title = 'Categories';
?>

<?php if( $categories_list ) : ?>
<aside class="menu-sub">
	<div class="menu-secondary">
		<h4 class="menu-sub__heading"><?php echo ucwords(esc_html($section_title)); ?></h4>
		<ul class="nav-sub">
		<?php echo $categories_list; ?>
		</ul>
	</div>
</aside>
<?php endif; ?>