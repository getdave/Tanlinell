<?php

/**
 * Enqueue scripts and styles
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */


function tanlinell_scripts() {


	// Waiting on https://core.trac.wordpress.org/ticket/16118
	// to be able to enqueue conditional styles via WP
	
	//global $wp_styles;

	//wp_enqueue_style( 'tanlinell', get_stylesheet_directory_uri() . '/07e10f7f.style.css' );

	//wp_enqueue_style( 'master', get_stylesheet_directory_uri() . '/assets/css/master.css', false );
    //$wp_styles->add_data( 'master', 'conditional', '(gt IE 8) | (IEMobile)' );

    //wp_enqueue_style( 'master-ie', get_stylesheet_directory_uri() . '/assets/css/master-ie.css', false );
    //$wp_styles->add_data( 'master-ie', 'conditional', '(lt IE 9) & (!IEMobile)' );


	/**
	 * ENQUEUE (JAVA)SCRIPTS
	 */

	// Modernizr - custom build with only "essential" features. You should update this to your own requirements
	wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/5383d4da.modernizr.custom.js', '', null , false );
	wp_enqueue_script('modernizr');


	// Localize WordPress vars in JS
	$theID = '';
    if(!empty($post->ID))
    	$theID = $post->ID;

    $site_details = array(
							'templateDirectoryUri'		=> get_template_directory_uri(),
							'siteUrl'					=> get_site_url(),
							'thePermalink'				=> get_permalink(),
							'theTitle'					=> get_the_title(),
							'theID'						=> get_the_ID()
						);
	wp_localize_script('modernizr', 'tanlinellSiteDetails', $site_details );


	// jQuery - load jQuery in the footer instead of header
    if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), null, true);
		add_filter('script_loader_src', 'tanlinell_jquery_local_fallback', 10, 2);
	}

	// Site.js - compiled and minified Site JS
	wp_register_script('site', get_template_directory_uri() . '/assets/js/031a90c4.site.min.js', array('jquery'), null , true );
	wp_enqueue_script('site');

	/**
	 * MISC CONDITIONAL STYLES
	 */
	if ( tanlinell_is_blog_page() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}

add_action( 'wp_enqueue_scripts', 'tanlinell_scripts', 0 );







/**
 * Deregister dashicons/thickbox
 *
 * easy-instagram adds these unconditionally
 * see:
 * plugins/easy-instagram/includes/class-easy-instagram.php
 * static function init() {
 *  add_thickbox();
 * }
 * 
 */
function tanlinell_deregister_script(  ) {

	if (!is_admin()) {
        wp_deregister_style('dashicons');
        wp_deregister_script('dashicons');
        
        wp_deregister_style('thickbox');
        wp_deregister_script('thickbox');
    }
}
add_action( 'wp_enqueue_scripts', 'tanlinell_deregister_script', 100 );


function tanlinell_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  $url = includes_url();

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . $url . 'js/jquery/jquery.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'tanlinell_jquery_local_fallback');


/**
 * Add GA in an awesome manor
 * @link https://github.com/roots/roots/blob/master/lib/scripts.php 
 */

if( !current_user_can('manage_options') ) {
	add_action('wp_head', 'tanlinell_google_analytics', 20);
}

function tanlinell_google_analytics() {
	
	if( WP_ENV == 'production' ) :
	
		if( !defined( 'GOOGLE_ANALYTICS_ID' ) )
		{
			$google_analytics_id = ( false != of_get_option( 'google_analytics_id' ) ) ? of_get_option( 'google_analytics_id' ) : false;
			define('GOOGLE_ANALYTICS_ID', $google_analytics_id);
		}
		if( false != $google_analytics_id ) :
?>
			<script type="text/javascript">
				var _gaq=_gaq||[];_gaq.push(['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>']);
				
				_gaq.push(['_trackPageview']);
				(function(){
					var ga=document.createElement('script');
					ga.type='text/javascript';
					ga.async=true;
					
					ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
					
					var s=document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(ga,s);
				})();
			</script>
<?php 
		endif;//if( false != $google_analytics_id ) :
	
	endif;//if( WP_ENV == 'production' ) :
}
