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
				
				<?php
					//setup the custom meta object
					global $custom_metabox;
					
					// get the meta data for the current post
					$custom_metabox->the_meta();
					
					//link meta data
					$custom_metabox->the_field('text');
					$link_text = $custom_metabox->get_the_value();
										
					$custom_metabox->the_field('page');
					$link = get_permalink($custom_metabox->get_the_value());
					
					if(!$link)
					{
						$custom_metabox->the_field('url');
						$link = $custom_metabox->get_the_value();
					}
				?>
				
				<li class="slide">				
					<div class="slide-content">
						<div class="slide-content-inner">
							
							<a href="<?php echo $link ?>"><?php echo $link_text ?></a>
							
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