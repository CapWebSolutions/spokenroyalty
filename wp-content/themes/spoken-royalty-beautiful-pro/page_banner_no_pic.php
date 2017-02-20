<?php
/**
 * This file adds a custom banner page to The Pointe / Atmosphere Pro Theme.
 *
 * @author Cap Web solutions
 * @package Atmosphere Pro Theme
 * @subpackage Customizations
 */

/*
Template Name: Banner No Pic
*/

//* Add banner_no_pic class to the head
add_filter( 'banner_no_pic_class', 'atmosphere_add_banner_no_pic_class' );
function atmosphere_add_banner_no_pic_class( $classes ) {
	$classes[] = 'atmosphere-banner-no-pic';
	return $classes;
}

/*
 *	Add Special Banner to page. 
 */
add_action( 'genesis_before', 'cws_add_header_banner_no_pic' );
function cws_add_header_banner_no_pic() {

global $post;
/*
 * Don't do it on front page. 
 */
if ( is_front_page() ) return;

	printf( '<div %s>', genesis_attr( 'banner-image' ) );

	// genesis_structural_wrap( 'banner-image' );
	$banner_image = sprintf( '<a href="%s" title="%s"><img src="'. get_stylesheet_directory_uri() .'/images/thepointe-logo.png" title="%s" alt="%s"/></a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), esc_attr( get_bloginfo( 'name' ) ), esc_attr( get_bloginfo( 'name' ) ) );
	echo $banner_image;
	// echo '<span class="banner-image-title">' . get_the_title() . '</span>';
	/*
	* If page has custom field 'banner_title' defined, 
	*   output it in place of standard title.
	 */
	if ( genesis_get_custom_field( 'banner_title' ) ) {
		$title = genesis_get_custom_field( 'banner_title' );
	} else {
		$title = get_the_title();
	}
	echo '<span class="banner-image-title-no-pic">' . $title . '</span>';
	// genesis_structural_wrap( 'banner-image', 'close' );
}
//* Run the Genesis loop
genesis();
