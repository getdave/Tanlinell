<?php
/**
 * Category List Navigation
 */
$categories_list =  ( false != get_transient("categories_sidebar_list") ) ? get_transient("categories_sidebar_list") : bc_get_categories_sidebar_list() ;

$section_title = 'Categories';

$posts_url = ( get_option( 'show_on_front' ) == 'page' ) ? get_permalink( get_option( 'page_for_posts' ) ) : bloginfo('url');

$current_queried_term = get_queried_object();
?>

<?php if( false != $categories_list ) : ?>
<aside class="sidebar">
	
	<div class="panel">
	    <h3 class="panel__heading"><?php echo ucwords(esc_html($section_title)); ?></h3>
		
	    <div class="panel__content">
			<ul class="panel__list">
				
				<?php foreach( $categories_list AS $category_obj ) : ?>
				<li class="<?php echo ( $category_obj->term_id == $current_queried_term->term_id ) ? 'current-cat' : false ?>">
	        		<a href="<?php echo esc_url( get_category_link( $category_obj->term_id ) ); ?>">
	                	<?php echo $category_obj->name; ?>
	                </a>
	        	</li>
				<?php endforeach; ?>
				
			</ul>
	    </div>
	</div>

</aside>
<?php endif; ?>