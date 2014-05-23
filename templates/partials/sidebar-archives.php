<?php 
/**
 * Archives List Navigation
 */

$archives_list = ( false != get_transient("archives_sidebar_list") ) ? get_transient("archives_sidebar_list") : bc_get_archives_sidebar_list() ;

$section_title = 'Archives';
?>
	
<?php if( $archives_list ) : ?>
<aside class="sidebar">
	
	<div class="panel">
		<h3 class="panel__heading"><?php echo ucwords(esc_html($section_title)); ?></h3>
		
	    <div class="panel__content">
			<ul class="panel__list">
				
				<?php echo $archives_list; ?>
				
			</ul>
	    </div>
	</div>
	
</aside>
<?php endif; ?>	