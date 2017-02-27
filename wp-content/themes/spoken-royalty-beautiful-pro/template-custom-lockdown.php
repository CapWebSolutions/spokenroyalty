<?php
/**
 * This file adds the Custom Lockdown Page template to the Spoken Royalty Beautiful Pro Theme.
 *
 * @author Cap Web Solutions
 * @package Spoken Royalty Beautiful Pro
 * @subpackage Customizations
*/

/*
Template Name: Custom Lockdown
*/

//* Add lockdown body class to the head
add_filter( 'body_class', 'spoken_add_body_class' );
function spoken_add_body_class( $classes ) {

	$classes[] = 'spoken-lockdown';
	return $classes;

}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Run the Genesis loop
genesis();