<?php 
/**
 * Register custom posts type for the theme
 *
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */




/**
 * Homepage Slides 
 *
 * Custom post for feature slider commonly implemented on the Homepage of the website.
 */
require( get_template_directory() . '/modules/homepage-slider/register-cpt.php' );


/**
 * Our Team
 *
 * Custom post for our team, navigation item.
 */
require( get_template_directory() . '/modules/our-team/register-cpt.php' );


/**
 * Services 
 *
 * Custom post for Services Pages
 */
require( get_template_directory() . '/modules/services/register-cpt.php' );