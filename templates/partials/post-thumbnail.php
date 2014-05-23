<?php $image = get_post_thumbnail_id( $post->ID ); ?>
<?php if ( false != wp_get_attachment_image_src( $image ) ) : ?>
<figure class="img-thumb">
	<?php
    $args = array(				
    	'image' => $image,
    	'settings' => array(
            
                array(
					'name' => 'Lowest',
					'width' => 333,
					'height' => 187,
					'crop' => true,
					'resize' => true,
				),

				array(
					'name' => 'Lower',
					'breakpoint' => 401,
					'width' => 503,
					'height' => 283,
					'crop' => true,
					'resize' => true,
				),

				array(
					'name' => 'Low',
					'breakpoint' => 590,
					'width' => 737,
					'height' => 415,
					'crop' => true,
					'resize' => true,
				),

				array(
					'name' => 'Medium',
					'breakpoint' => 850,
					'width' => 949,
					'height' => 534,
					'crop' => true,
					'resize' => true,
				),

				array(
					'name' => 'High',
					'breakpoint' => 1070,
					'width' => 910,
					'height' => 512,
					'crop' => true,
					'resize' => true,
				),

				array(
					'name' => 'Main',
					'breakpoint' => 1060,
					'width' => 828,
					'height' => 466,
					'crop' => true,
					'resize' => true,
				),

			),
			'ie_fallback' => 'High',
    );
    $ri = BC_Responsive_Images::get_instance(); 
    $ri->load_responsive_markup( $args );
    ?>
</figure>
<?php endif; ?>