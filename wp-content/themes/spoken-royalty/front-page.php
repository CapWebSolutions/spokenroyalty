<?php
/*
 * Front Page Template
 *
 * Child Theme Name: CWS-Genesis-Child for Genesis v2.1.2
 * Author: Cap Web Solutions
 * Url: http://capwebsolutions.com/
 */

// Execute custom home page. If no widgets active, then loop
add_action( 'genesis_meta', 'cws_custom_home_loop' );

function cws_custom_home_loop() {
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove default page content
	// remove_action( 'genesis_loop', 'genesis_do_loop' );

}


genesis();