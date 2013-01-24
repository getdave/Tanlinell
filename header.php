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
	/**
	 * Hide the site from Search Engines unless
	 * we're on the Production server
	 */
	if ( constant('WP_ENV') !== "production" ) { ?>
	<meta name="robots" content="noindex, follow">
<?php } ?>

<?php 
	// Is this a responsive site? Uncomment if so...
	//echo '<meta name="viewport" content="width=device-width" />'; 
?>

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'tanlinell' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<!-- CSS FRAMEWORK -->
<!-- Normalize - included separately -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css">
<!--[if (gt IE 8) | (IEMobile)]><!-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/master.css">
<!--<![endif]-->

<!--[if (lt IE 9) & (!IEMobile)]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/master-ie.css">
<![endif]-->



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header class="banner container" role="banner">
		<div class="banner-inner">
			<a class="site-logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>

			
			<p class="vh"><?php _e( 'Menu', 'tanlinell' ); ?></p>
			<div class="vh skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'tanlinell' ); ?>"><?php _e( 'Skip to content', 'tanlinell' ); ?></a></div>

			<?php get_template_part( 'menu', 'primary' ); ?>
		</div>	
	</header><!-- #masthead .site-header -->

	<div id="content" class="container site-content">
		<?php if ( current_theme_supports( 'breadcrumb-trail' ) ) breadcrumb_trail(); ?>
	