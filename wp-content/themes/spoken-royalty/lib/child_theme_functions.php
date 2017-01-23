<?php
/*
 * CHILD THEME FUNCTIONS
 *
 * Child Theme Name: CWS-Genesis-Child for Genesis v2.1.2
 * Author: Cap Web Solutions
 * Url: http://capwebsolutions.com/
 *
 * Add any functions here that you wish to use sitewide.
 */


// Change favicon location
function cws_custom_favicon_location( $favicon_url ) {
	return get_stylesheet_directory_uri() . '/images/favicon.ico';
}


// Change the footer credits
function cws_footer_cred( $cws_ft ) {

	// Footer Menu
    $cws_footer_menu = wp_nav_menu( array(
    	'theme_location' 	=> 'secondary',
    	'echo' 				=> false,
    	'container' 		=> '',
    	'fallback_cb' 		=> false,
    	'menu_class'		=> 'secondary-navigation',
    	));


    // Copyright Info
    $cws_copy = '<span class="copyright">&copy; ' . date("Y") .' CWS-Genesis-Child</span>';

	$footer = $cws_footer_menu;
	$footer .= '<div class="copy">' . $cws_copy . '</div>';

    return $footer;

}

