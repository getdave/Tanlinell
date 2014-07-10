<?php
$site_address = ( WP_ENV == 'production' ) ? 'http://burfieldcreative.co.uk' : '#';
?>

<?php echo esc_html(apply_filters( 'tanlinell_dc_the_credit', 'Designed &amp; Developed' )); ?> by <a rel="nofollow" class='<?php echo esc_attr(apply_filters( 'tanlinell_dc_logo_style', 'site-credit site-credit--dark' )); ?>' target='_blank' href='<?php echo esc_url(apply_filters( 'tanlinell_dc_designer_url', $site_address )); ?>' title='<?php echo esc_attr(apply_filters( 'tanlinell_dc_title', 'Digital Agency Bristol' )); ?>'><?php echo esc_html(apply_filters( 'tanlinell_dc_designer_name', 'Burfield' )); ?><span class='vh'> - <?php echo esc_html(apply_filters( 'tanlinell_dc_hidden_text', 'a Digital Agency in Bristol' )); ?></span></a>		