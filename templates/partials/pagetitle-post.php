<?php
	//setup the custom meta object
	global $global_metabox;
	
	// get the meta data for the current post
	$global_metabox->the_meta();
	
	//link meta data
	$global_metabox->the_field('page_title');
	$page_title = $global_metabox->get_the_value();
	
	$global_metabox->the_field('page_subtitle');
	$page_subtitle = $global_metabox->get_the_value();
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
	
	<div class="title-block__meta entry-meta">
		<?php tanlinell_posted_on(); ?>
	</div><!-- .entry-meta -->	
</header>