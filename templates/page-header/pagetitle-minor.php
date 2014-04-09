<?php
$page_title = esc_html( get_post_meta( $post->ID, 'page_title', true ) );
$page_subtitle = esc_html( get_post_meta( $post->ID, 'page_subtitle', true )  );
?>
<header class="page-header entry-header">
	
	<h4 class="<?php echo ( $page_subtitle ) ? 'entry-title--has-meta ' : ''; ?> page-title entry-title" itemprop="name headline">		
		<?php if ( $page_title ) : ?>
			<?php echo $page_title; ?>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
	</h4>
	
	<?php if ( $page_subtitle ) : ?>
	<p class="page-subtitle entry-subtitle"><?php echo $page_subtitle ?></p>
	<?php endif; ?>	
</header>