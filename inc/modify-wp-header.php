<?php

/**
 * Modify wp_head
 *
 * Consider Hybrid Core when making changes
 *
 */


/**
 * Remove wp version number from the header
 *
 * <meta name="generator" content="WordPress **.**.**" />
 * Note: given priority 1 to match/overide Hybrid Core
 */
remove_action( 'wp_head', 'wp_generator', 1 );



?>