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

$posts_url = ( get_option( 'show_on_front' ) == 'page' ) ? get_permalink( get_option( 'page_for_posts' ) ) : bloginfo('url');
?>

<?php if( $categories_list ) : ?>
<aside class="menu-sub sidebar">
	<div class="menu-secondary">
		<h4 class="menu-sub__heading"><?php echo ucwords(esc_html($section_title)); ?></h4>
		<ul class="nav-sub">
			<li>
				<a href="<?php echo $posts_url ?>">
					All <?php echo ucwords(esc_html($section_title)); ?>
				</a>
			</li>
		<?php echo $categories_list; ?>
		</ul>
	</div>
</aside>
<?php endif; ?>