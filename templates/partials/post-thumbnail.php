<?php if ( has_post_thumbnail() ) { 
	
	// Get image alt attribute
	$img_alt = trim(strip_tags( get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ));
	
	// If not alt then fallback to a generic description
	if(empty($img_alt)) {
		if ( get_the_title() ) {
			$img_alt = 'Image for '.get_the_title(); //defaults if none found
		}
	}
?>

<figure class="entry-thumbnail img-thumb img-polaroid">
	<?php the_post_thumbnail(
		array( 
			'width' 		=> 960, 
			'height' 		=> 360, 
			'crop' 			=> true,
			'jpeg_quality' 	=> 80,	 // reduce image download size
			'resize'		=> true
		),
		array(
			'alt'	=> $img_alt
		)
	);?>
</figure>
<?php } ?>