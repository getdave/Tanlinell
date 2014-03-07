<?php
	$description 	= get_bloginfo( 'description' );

	$latitude 		= of_get_option( 'contact_address_latitude' );
	$longitude 		= of_get_option( 'contact_address_longitude' );
?>

<div class="vcard" itemscope itemtype="http://schema.org/Organization">
		
	<div itemprop="name"><?php echo bloginfo( 'name' ); ?></div>
	<div class="vh" itemprop="description"><?php echo ($description !== "Just another WordPress site") ? $description : ''?></div>
	
	<?php 
	if(of_get_option( 'contact_address_latitude' ))
		$lat = 'data-lat="'.of_get_option( 'contact_address_latitude' ).'"';
	else
		$lat = false;
	
	if(of_get_option( 'contact_address_longitude' ))
		$lng = 'data-lng="'.of_get_option( 'contact_address_longitude' ).'"';
	else
		$lng = false;
	?> 
	
	<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" <?php echo $lat; ?> <?php echo $lng; ?>>
	
		<?php if(of_get_option( 'contact_address_street_address_1' ) || of_get_option( 'contact_address_street_address_2' )) : ?>
		<span class="address__line" itemprop="streetAddress">
			
			<?php if(of_get_option( 'contact_address_street_address_1' )) : ?>
			<span class="address__subrow">
				<?php echo of_get_option( 'contact_address_street_address_1' ); ?>
			</span>
			<?php endif; ?>
			
			<?php if(of_get_option( 'contact_address_street_address_2' )) : ?>
			<span class="address__subrow">
				<?php echo of_get_option( 'contact_address_street_address_2' ); ?>
			</span>
			<?php endif; ?>
			
		</span>
		<?php endif; ?>
		
		<?php if(of_get_option( 'contact_address_locality' )) : ?>
		<span itemprop="addressLocality"><?php echo of_get_option( 'contact_address_locality' ); ?></span>
		<?php endif; ?>
		
		<?php if(of_get_option( 'contact_address_region' )) : ?>
		<span itemprop="addressRegion"><?php echo of_get_option( 'contact_address_region' ); ?></span>
		<?php endif; ?>
		
		<?php if(of_get_option( 'contact_address_post_code' )) : ?>
		<span itemprop="postalCode"><?php echo of_get_option( 'contact_address_post_code' ); ?></span>
		<?php endif; ?>
		
		<?php if(of_get_option( 'contact_address_country' )) : ?>
		<span itemprop="addressCountry"><?php echo of_get_option( 'contact_address_country' ); ?></span>
		<?php endif; ?>
		
	</div>
	
	<?php if(of_get_option( 'contact_email' )) : ?>
	<div class="vcard__email">
		<a itemprop="email" href="mailto: <?php echo antispambot( of_get_option( 'contact_email' ), true ); ?>">
			<?php echo antispambot( of_get_option( 'contact_email' ) ); ?>
		</a>
	</div>	
	<?php endif; ?>
	
	<?php if(of_get_option( 'display_numbers' )) : ?>
	
		<?php if(of_get_option( 'contact_telephone' )) : ?>
		<div class="vcard__tel">
			Tel:
			<span itemprop="telephone"><?php echo of_get_option( 'contact_telephone' ) ?></span>
		</div>
		<?php endif; ?>
		
		<?php if(of_get_option( 'contact_fax' )) : ?>
		<div class="vcard__fax">
			Fax:
			<span itemprop="faxNumber"><?php echo of_get_option( 'contact_fax' ) ?></span>
		</div>
		<?php endif; ?>
			
	<?php endif; ?>
</div>

<?php if ($latitude && $longitude) { ?>
<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
	<meta itemprop="latitude" content="<?php echo esc_attr( $latitude ); ?>" />
	<meta itemprop="longitude" content="<?php echo esc_attr( $longitude ); ?>" />
</div>
<?php } ?>





