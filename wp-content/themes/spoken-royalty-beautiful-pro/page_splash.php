<?php
/**
 * This file adds the Splash Page template to the Spoken Royalty Beautiful Pro Theme.
 *
 * @author Cap Web Solutions
 * @package Spoken Royalty Beautiful Pro
 * @subpackage Customizations
*/

/*
Template Name: Splash
*/

//* Add splash body class to the head
add_filter( 'body_class', 'spoken_add_body_class' );
function spoken_add_body_class( $classes ) {

	$classes[] = 'spoken-splash';
	return $classes;

}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove before header widget area above header
remove_action( 'genesis_before_header', 'beautiful_before_header' );

//* Remove site header elements
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

//* Remove navigation
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav', 15 );

//* Remove site header banner
remove_action( 'genesis_after_header', 'beautiful_site_header_banner' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove site description / tagline 
remove_action( 'genesis_after_header', 'genesis_seo_site_description' );

//* Remove the primary navigation menu
remove_action( 'genesis_before_header', 'beautiful_before_header_left_right' );
//* Remove the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav', 15 );

//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

//* Remove site footer elements
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

//* Dump out content.
?>
<center><button style="margin-top:20px;"><a style="color:#fff;" href="http://spokenroyalty.dev/home-not-logged-in/">Enter Site</a></button></center>
<div class="poet-pic"><img class="size-medium wp-image-329" src="http://spokenroyalty.dev/wp-content/uploads/william-shakespeare-portrait-269x300.jpg" alt="" width="269" height="300" />William Shakespeare</div>
<div class="poet-pic"><img class="size-full wp-image-328" src="http://spokenroyalty.dev/wp-content/uploads/William-Wordsworth.jpg" alt="" width="286" height="289" />William Wordsworth</div>
<div class="poet-pic"><img class="size-full wp-image-327" src="http://spokenroyalty.dev/wp-content/uploads/Sylvia_Plath.jpg" alt="" width="288" height="386"  />Sylvia Plath</div>
<div class="poet-pic"><img class="size-medium wp-image-326" src="http://spokenroyalty.dev/wp-content/uploads/maya-angelou1-229x300.jpg" alt="" width="229" height="300" />Maya Angelou</div>
<div class="poet-pic"><img class="size-full wp-image-325" src="http://spokenroyalty.dev/wp-content/uploads/Langston-Huges-.jpg" alt="" width="400" height="400" />Langston Huges</div>
<div class="poet-pic"><img class="size-full wp-image-324" src="http://spokenroyalty.dev/wp-content/uploads/Emily_Dickinson_.jpg" alt="" width="582" height="685" />Emily Dickinson</div>
<?php

//* Run the Genesis loop
genesis();