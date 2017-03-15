<?php
/**
 * BuddyPress Tweaks
 *
 * This file includes any custom WooCommerce tweaks
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


function spoken_royalty_xprofile_cover_image( $settings = array() ) {
	$settings['width']  = 900;
	$settings['height'] = 1000;

	return $settings;
}
add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'spoken_royalty_xprofile_cover_image', 10, 1 );
