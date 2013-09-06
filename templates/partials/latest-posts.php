
<?php 	
$args = array(
	'post_type' 			=> 'post',
	'posts_per_page'		=> 3,
	'ignore_sticky_posts' 	=> 1
);

$latest_blog_posts = new WP_Query( apply_filters( 'tanlinell_latest_post_query', $args ) );

if($latest_blog_posts->have_posts()) : ?>
<ul class="latest-posts__list">
<?php while($latest_blog_posts->have_posts()): $latest_blog_posts->the_post(); ?>
	<li class="latest-posts__item">
		<article>
			<?php the_title( '<h6 class="">', '</h6>' ); ?>
			<p><?php tanlinell_truncate_posts( 20, '[read more]' ); ?></p>
		</article>
	</li>
<?php endwhile;
wp_reset_postdata(); ?>
</ul>
<?php endif; ?>
