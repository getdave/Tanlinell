<?php
$page_title = esc_html( get_post_meta( $post->ID, 'page_title', true ) );
$page_subtitle = esc_html( get_post_meta( $post->ID, 'page_subtitle', true )  );

//if $page_match == true/1 -> we dont need to link this
$page_match = ( trailingslashit(home_url( $wp->request ))==get_permalink() ) ? true : false;
?>
<header class="page-header entry-header">
	
	<?php if(true == $page_match) : ?>
	
	<h1 class="<?php echo ( $page_subtitle ) ? 'entry-title--has-meta ' : ''; ?> page-title entry-title" itemprop="name headline">		
		<?php if ( $page_title ) : ?>
			<?php echo $page_title; ?>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
	</h1>
	
	<?php else: ?>
	
	<h2 class="<?php echo ( $page_subtitle ) ? 'entry-header--has-meta ' : ''; ?> page-title entry-title" itemprop="name headline">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'tanlinell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" itemprop="url">
		<?php if ( $page_title ) : ?>
			<?php echo $page_title; ?>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
		</a>
	</h2>
	
	<?php endif; ?>
	
	<?php if ( $page_subtitle ) : ?>
	<p class="page-subtitle entry-subtitle"><?php echo $page_subtitle ?></p>
	<?php endif; ?>	
</header>