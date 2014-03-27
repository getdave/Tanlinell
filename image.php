<?php
/**
 * The template for displaying image attachments.
 *
 * @package Tanlinell
 * @since Tanlinell 3.0.0
 */
?>
<?php if ( !have_posts() && current_user_can( 'edit_posts' ) ) : ?>
	<?php get_template_part( 'no-results', 'archive' ); ?>
<?php endif; ?>

<?php if ( have_posts() ) : ?>	
	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php get_template_part('templates/page-header/pagetitle', 'post'); ?>
					
			<div class="entry-content">
	
				<div class="entry-attachment">
					<div class="attachment img-polaroid img-thumb">
						<?php
							/**
							 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
							 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
							 */
							$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
							foreach ( $attachments as $k => $attachment ) {
								if ( $attachment->ID == $post->ID )
									break;
							}
							$k++;
							// If there is more than 1 attachment in a gallery
							if ( count( $attachments ) > 1 ) {
								if ( isset( $attachments[ $k ] ) )
									// get the URL of the next image attachment
									$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
								else
									// or get the URL of the first image attachment
									$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
							} else {
								// or, if there's only 1 image, get the URL of the image
								$next_attachment_url = wp_get_attachment_url();
							}
						?>
	
						<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
							$attachment_size = apply_filters( 'tanlinell_attachment_size', array( 1200, 1200 ) ); // Filterable image size.
							echo wp_get_attachment_image( $post->ID, $attachment_size );
						?></a>
					</div><!-- .attachment -->
	
					<?php if ( ! empty( $post->post_excerpt ) ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div><!-- .entry-caption -->
					<?php endif; ?>
				</div><!-- .entry-attachment -->
	
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tanlinell' ), 'after' => '</div>' ) ); ?>
	
			</div><!-- .entry-content -->
			
		</article><!-- #post-<?php the_ID(); ?> -->
	
		<ul id="image-navigation" class="pager site-navigation">
			<li class="pager__item previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'tanlinell' ) ); ?></li>
			<li class="pager__item pager__item--next next-image"><?php next_image_link( false, __( 'Next &rarr;', 'tanlinell' ) ); ?></li>
		</ul><!-- #image-navigation -->
		
	<?php endwhile; ?>
<?php endif; ?>