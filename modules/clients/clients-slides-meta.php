<?php
global $clients_slides_metabox;
$clients_slides_metabox = new WPAlchemy_MediaAccess(); 
?>
<div class="my_meta_control">

	
    
	<h4>Slides</h4>
	 
	<a style="float:right; margin:0 10px;" href="#" class="dodelete-slides button">Remove All</a>
	 
	<p>Add slides for display on this clients page</p>
	 
	<?php while($mb->have_fields_and_multi('slides')): ?>
	
	<?php $mb->the_group_open(); ?>
	 	
	 	
	 	<a href="#" class="dodelete button">Remove Slide</a>
 		
 
        <?php $mb->the_field('title'); ?>
        <label for="<?php $mb->the_name(); ?>">Title</label>
        <p><input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
        
        <?php $mb->the_field('imgurl'); ?>
        <?php $clients_slides_metabox->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Insert'); ?>
 		 		
        <p>
            <?php echo $clients_slides_metabox->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
            <?php echo $clients_slides_metabox->getButton(); ?>
        </p>
	 	
	 	
	 	<hr />
	 
	<?php $mb->the_group_close(); ?>
	
	<?php endwhile; ?>
	 
	<p style="margin-bottom:15px; padding-top:5px; text-align:right"><a href="#" class="docopy-slides button">Add Slide</a></p>
</div>