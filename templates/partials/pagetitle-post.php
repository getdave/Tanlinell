<header class="title-block entry-header">
	<h1 class="title-block__heading entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'tanlinell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

	<div class="title-block__meta entry-meta">
		<?php tanlinell_posted_on(); ?>
	</div><!-- .entry-meta -->

</header><!-- .entry-header -->