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
				/**
				 * Meta Link Values 
				 */
				//link destination
				$_slide_link_url 	= get_post_meta( $post->ID, '_slide_link_url', true );				
				$_slide_link_page 	= get_post_meta( $post->ID, '_slide_link_page', true );
				
				$link_destination = ( ( true == $_slide_link_url ) ? $_slide_link_url : ( ( true == $_slide_link_page ) ? get_permalink($_slide_link_page) : false ) );
				
				//link text
				$_slide_link_text	= get_post_meta( $post->ID, '_slide_link_text', true );
				?>
					
				<li class="slide">				
					<div class="slide-content">
						<div class="slide-content-inner">
							
							<a href="<?php echo esc_url( $link_destination ); ?>">
								<?php echo esc_html( $_slide_link_text ? $_slide_link_text : 'Click Here' ); ?>
							</a>
							
							<?php the_title('<h3>', '</h3>'); ?>
							<?php the_content();?>
															
						</div>
					</div>
					
					<a href="<?php echo esc_url( $link_destination ); ?>">
						<?php brimg(get_post_thumbnail_id( $post->ID )); ?>
					</a>
				</li>
				
	        <?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
	</section>

<?php endif; ?>