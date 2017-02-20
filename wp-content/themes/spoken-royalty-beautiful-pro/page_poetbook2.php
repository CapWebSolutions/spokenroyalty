<?php
/**
 * This file adds the Poet Bbook Page template to the Spoken Royalty Beautiful Pro Theme.
 *
 * @author Cap Web Solutions
 * @package Spoken Royalty Beautiful Pro
 * @subpackage Customizations
*/

/*
Template Name: PoetBook2
*/

//* Enqueue styles needed for this page only. 
wp_enqueue_style( 'spoken-splash-style', get_stylesheet_directory_uri() . '/style-poetbook.css', array(), CHILD_THEME_VERSION );


//* Add splash body class to the head
add_filter( 'body_class', 'spoken_add_body_class' );
function spoken_add_body_class( $classes ) {

	$classes[] = 'spoken-poetbook';
	return $classes;

}
?>


//* Run the Genesis loop
genesis();