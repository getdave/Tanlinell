<?php
	//setup the custom meta object
	global $global_metabox;
	
	// get the meta data for the current post
	$global_metabox->the_meta();
	
	//link meta data
	$global_metabox->the_field('page_title');
	$page_title = esc_html( $global_metabox->get_the_value() );
	
	$global_metabox->the_field('page_subtitle');
	$page_subtitle = esc_html( $global_metabox->get_the_value() );
	
	//if $page_match == true/1 -> we dont need to link this
	$page_match = ( trailingslashit(home_url( $wp->request ))==get_permalink() ) ? true : false;
?>
<header class="title-block entry-header">

	<?php if(true == $page_match) : ?>
	<h1 class="title-block__heading entry-title" itemprop="headline">		
		
		<?php if ( $page_title ) : ?>
			<?php echo $page_title; ?>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
		
	</h1>
	<?php else: ?>
	<h2 class="title-block__heading entry-title" itemprop="headline">		
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'tanlinell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
		
		<?php if ( $page_title ) : ?>
			<?php echo $page_title; ?>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>

		</a>
	</h2>
	<?php endif; ?>
	
	
	<?php if ( $page_subtitle ) : ?>
	<p class="page-subtitle"><?php echo $page_subtitle ?></p>
	<?php endif; ?>	
	
	<div class="title-block__meta entry-meta" itemprop="dateCreated">
		<?php tanlinell_posted_on(); ?>
	</div><!-- .entry-meta -->	
</header>