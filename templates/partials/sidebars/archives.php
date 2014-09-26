<?php 
/**
 * Archives List Navigation
 */

$archives_list = ( false != get_transient("archives_sidebar_list") ) ? get_transient("archives_sidebar_list") : bc_get_archives_sidebar_list() ;

$section_title = 'Archives';
?>
	
<?php if( $archives_list ) : ?>
<aside class="sidebar sidebar--nav-<?php echo sanitize_title($section_title); ?>">
		
    <h5 class="h4"><?php echo ucwords(esc_html($section_title)); ?></h5>
		
    <ul class="block-list block-list--dashed">
        <?php echo $archives_list; ?>
    </ul>
    	    
</aside>
<?php endif; ?>	