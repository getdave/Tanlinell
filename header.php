<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]> <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>




<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">



<?php 
	// Is this a responsive site? Uncomment if so...
	echo '<meta name="viewport" content="width=device-width" />'; 
?>

<title>
<?php
/*
 * Simplified <title> tag. Suggest utilizing http://wordpress.org/extend/plugins/wordpress-seo/ to set good 
 * SEO title tags and for general optimisation
 */
global $page, $paged;

wp_title( '|', true, 'right' );

?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<!-- Tanlinell Google+ Publisher Link -->
<?php
$google_company_page_url 	= of_get_option('google_company_page_url');
if ($google_company_page_url) :
?>
<link rel="publisher" href="<?php echo $google_company_page_url; ?>" />
<?php endif; ?>


<!-- CSS FRAMEWORK -->
<!--[if (gt IE 8) | (IEMobile)]><!-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/master.css">
<!--<![endif]-->

<!--[if (lt IE 9) & (!IEMobile)]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/master-ie.css">
<![endif]-->



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_atomic( 'before_banner' ); ?>
	<header class="banner container-extend" role="banner">
		<div class="banner-inner container">
			<?php get_template_part( 'templates/partials/site-logo' ); ?>
			<div class="vh skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'tanlinell' ); ?>"><?php _e( 'Skip to content', 'tanlinell' ); ?></a></div>
			<?php get_template_part( 'menu', 'primary' ); ?>
		</div>	
	</header><!-- #masthead .site-header -->
	<?php do_atomic( 'after_banner' ); ?>
	<div id="content" class="<?php echo apply_atomic( 'site_content_class', 'container site-content ' ); ?>">
	
		<?php if( !function_exists('is_woocommerce') || !is_woocommerce()) : ?>
		
			<?php if ( current_theme_supports( 'breadcrumb-trail' ) ) breadcrumb_trail(); ?>
			
		<?php endif; ?>
	