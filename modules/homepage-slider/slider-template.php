<?php
	$args = array(
		'post_type'=> 'homepage_slides',
		'orderby' => 'menu_order',
		'order'	=> 'ASC',
		'posts_per_page' => '5'
	);
	
	$slides = new WP_Query($args);
?>
	
<?php if ( $slides->have_posts() ): ?>

	<section class="home-featured-slider container-extend">
		<div class="flexslider">
			<ul class="slides">
			<?php while ($slides->have_posts() ) : $slides->the_post(); ?>
								
				<li class="slide">				
					<div class="slide-content">
						<div class="slide-content-inner">
							
							<a href="<?php echo esc_url( get_post_meta( $post->ID, '_slide_link', true ) ); ?>"><?php echo esc_url( get_post_meta( $post->ID, '_slide_link', true ) ); ?></a>
							
							<?php the_title('<h3>', '</h3>'); ?>
							<?php the_content();?>
															
						</div>
					</div>
					<?php brimg(get_post_thumbnail_id( $post->ID )); ?>
				</li>
				
	        <?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
	</section>

<?php endif; ?>