<div class="vcard" itemscope itemtype="http://schema.org/Organization">
	<div itemprop="name"><?php echo bloginfo( 'name' ); ?></div>
	<div class="vh" itemprop="description"><?php echo bloginfo( 'description' ); ?></div>
	<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" data-lat="<?php echo of_get_option( 'contact_address_latitude' );?>" data-lng="<?php echo of_get_option( 'contact_address_longitude' );?>">
		<span class="address__row" itemprop="streetAddress">
			<span class="address__subrow">
				<?php echo of_get_option( 'contact_address_street_address_1' ); ?>
			</span>
			<span class="address__subrow">
				<?php echo of_get_option( 'contact_address_street_address_2' ); ?>
			</span>
		</span>
		<span itemprop="addressLocality"><?php echo of_get_option( 'contact_address_locality' ); ?></span>
		<span itemprop="addressRegion"><?php echo of_get_option( 'contact_address_region' ); ?></span>
		<span itemprop="postalCode"><?php echo of_get_option( 'contact_address_post_code' ); ?></span>
		<span itemprop="addressCountry"><?php echo of_get_option( 'contact_address_country' ); ?></span>
	</div>
	
	<div class="vcard__email">
		<a itemprop="email" href="mailto: <?php echo antispambot( of_get_option( 'contact_email' ), true ); ?>">
			<?php echo antispambot( of_get_option( 'contact_email' ) ); ?>
		</a>
	</div>
	
	<div class="vcard__tel">
		Tel:
		<span itemprop="telephone"><?php echo of_get_option( 'contact_telephone' ) ?></span>
	</div>
	
	<div class="vcard__fax">
		Fax:
		<span itemprop="faxNumber"><?php echo of_get_option( 'contact_fax' ) ?></span>
	</div>
</div>





