<?php
	//setup the custom meta object
	global $custom_metabox;
	
	// get the meta data for the current post
	$custom_metabox->the_meta();
	
	//link meta data
	$custom_metabox->the_field('page_title');
	$page_title = $custom_metabox->get_the_value();
	
	$custom_metabox->the_field('page_subtitle');
	$page_subtitle = $custom_metabox->get_the_value();
?>
<header class="title-block entry-header">
	<h1 class="title-block__heading entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'tanlinell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
		<?php if ( $page_title ) : ?>
			<?php echo $page_title; ?>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
		</a>
	</h1>
	<?php if ( $page_subtitle ) : ?>
	<p class="page-subtitle"><?php echo $page_subtitle ?></p>
	<?php endif; ?>	
</header>