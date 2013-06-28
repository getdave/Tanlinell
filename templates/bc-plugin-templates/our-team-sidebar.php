<?php
//get connect posts for this team member

$our_team = get_posts( array(
  'connected_type' => 'our-team_users',
  'connected_items' => $post->post_author,
  'suppress_filters' => false,
  'nopaging' => true
) );
?>
<?php foreach($our_team AS $member): ?>
	
	<?php
		
		$job_title 	= get_post_meta( $member->ID, '_our-team_job_title', true );
		$email 		= get_post_meta( $member->ID, '_our-team_email', true );
		$twitter 	= get_post_meta( $member->ID, '_our-team_twitter', true );
		$linkedin 	= get_post_meta( $member->ID, '_our-team_linkedin', true );
		$google 	= get_post_meta( $member->ID, '_our-team_google', true );
		 
		
		$featured_image       =  tanlinell_get_post_thumb( $member->ID );
		$thumb_args = array( 
						'width' => 240, 
						'height' => 240, 
						'crop' => true, 
						'resize' => true, 
						'crop_from_position' => 'top, left'
						);
		$post_thumbnail_sized	=  tanlinell_get_post_thumb( $member->ID , $thumb_args);
							
		$departments_roles = wp_get_post_terms($member->ID, 'departments_roles', array("fields" => "names"));
	
	?>

	<img src="<?php echo $post_thumbnail_sized[0]; ?>" alt="" style="">
					
	<h3><?php echo ucwords($member->post_title); ?></h3>
	<h4><?php echo $job_title; ?></h4>
	<h5>
	<?php
	foreach($departments_roles AS $slug) :
	$term = get_term_by('slug', $slug, 'departments_roles')
	?>
	<a href="<?php echo get_term_link($term->slug,'departments_roles');?>"><?php echo $term->name; ?></a>								
	<?php endforeach; ?>
	</h5>
	
	<h5><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h5>
	<h5><a href="<?php echo $twitter; ?>" target="_blank">Twitter Profile</a></h5>
	<h5><a href="<?php echo $linkedin; ?>" target="_blank">Linkedin Profile</a></h5>
	<h5><a href="https://plus.google.com/<?php echo $google; ?>?rel=author" target="_blank">Google Profile</a></h5>
	
	
	
	
	<?php
	//get connect posts for this team member
	$users = get_users( array(
	  'connected_type' => 'our-team_users',
	  'connected_items' => $member
	) );
	foreach($users AS $user):
		
		$authors_posts = get_posts( array( 'author' => $user->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );
		
		$output = '<ul>';
		foreach ( $authors_posts as $authors_post ) :
			$output .= '<li><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';
		endforeach;
		$output .= '</ul>';
		
		echo $output;
						
	endforeach;
	?>
	  
<?php endforeach; // end of the loop. ?>