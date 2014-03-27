<?php
$page_title = esc_html( get_post_meta( $post->ID, 'page_title', true ) );
$page_subtitle = esc_html( get_post_meta( $post->ID, 'page_subtitle', true )  );

//if $page_match == true/1 -> we dont need to link this
$page_match = ( trailingslashit(home_url( $wp->request ))==get_permalink() ) ? true : false;
?>
<header class="entry-header entry-header--has-meta">

	<?php if(true == $page_match) : ?>

	<h1 class="entry-title" itemprop="headline">
		<?php if ( $page_title ) : ?>
			<?php echo $page_title; ?>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
	</h1>

	<?php else: ?>

	<h2 class="entry-title" itemprop="headline">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'tanlinell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">

		<?php if ( $page_title ) : ?>
			<?php echo $page_title; ?>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>

		</a>
	</h2>

	<?php endif; ?>
</header>


<footer class="entry-meta">
	<span class="entry-meta__created" itemprop="dateCreated"><?php tanlinell_posted_on(); ?></span>
	<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'tanlinell' ) );
			if ( $categories_list && tanlinell_categorized_blog() ) :
		?>
		<span class="entry-meta__cat-links">
			<?php printf( __( 'in %1$s', 'tanlinell' ), $categories_list ); ?>.
		</span>
		<?php endif; // End if categories ?>

		<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'tanlinell' ) );
			if ( $tags_list ) :
		?>
		<span class="entry-meta__tag-links">
			<?php printf( __( 'Tagged %1$s', 'tanlinell' ), $tags_list ); ?>
		</span>
		<?php endif; // End if $tags_list ?>
	<?php endif; // End if 'post' == get_post_type() ?>

	<?php if ( ! post_password_required() && ( comments_open() ) ) : ?>
	<span class="sep"> | </span>
	<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'tanlinell' ), __( '1 Comment', 'tanlinell' ), __( '% Comments', 'tanlinell' ) ); ?></span>
	<?php endif; ?>
</footer><!-- .entry-meta -->



