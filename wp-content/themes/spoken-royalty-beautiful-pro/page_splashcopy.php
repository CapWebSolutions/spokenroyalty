<?php
/**
 * This file adds the Splash Page template to the Spoken Royalty Beautiful Pro Theme.
 *
 * @author Cap Web Solutions
 * @package Spoken Royalty Beautiful Pro
 * @subpackage Customizations
*/

/*
Template Name: SplashCopy
*/

//* Add splash body class to the head
add_filter( 'body_class', 'spoken_add_body_class' );
function spoken_add_body_class( $classes ) {

	$classes[] = 'spoken-splash';
	return $classes;

}
//* Enqueue our special splash page styles 
add_action( 'wp_enqueue_scripts', 'enqueue_spoken_splash_styles', 11 );
function enqueue_spoken_splash_styles() {
	wp_enqueue_style( 'spoken-splash-style', get_stylesheet_directory_uri() . '/style-splash.css', array(), CHILD_THEME_VERSION );
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

//* Remove Welcome Message banner
remove_action( 'genesis_before_loop', 'beautiful_welcome_message' );

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



//* Dump out poet pics content. Pulling everything from media library.
//* Future: go through an array of custom fields specifying images. Enables client to modify from dashboard. 

	$poet_pics_dir = wp_upload_dir()[baseurl];
	// echo '<div class="splash-wrap">';
	// printf('<center><button style="margin-top:20px;"><a style="color:#fff;" href="%s/home">Enter Site</a></button></center>',get_bloginfo( 'url' ));
	// printf('<div style="margin-left: 100px;"><img class="size-medium wp-image-326" src="%s/maya-angelou1-229x300.jpg" alt="" width="229" height="300" /><br>Maya Angelou</div>',$poet_pics_dir);
	// printf('<div class="poet-pic"><img class="size-medium wp-image-326" src="%s/maya-angelou1-229x300.jpg" alt="" width="229" height="300" />Maya Angelou</div>',$poet_pics_dir);
	// printf('<div style="margin-left: 800px;margin-top:-500px;"><img class="size-full wp-image-324" src="%s/Emily_Dickinson_.jpg" alt="" width="582" height="685" /><br>Emily Dickinson</div>',$poet_pics_dir);
	// printf('<div class="poet-pic"><img class="size-full wp-image-324" src="%s/Emily_Dickinson_.jpg" alt="" width="582" height="685" />Emily Dickinson</div>',$poet_pics_dir);
	// printf('<div style="margin-left: 390px;margin-top:-829px;"><img class="size-full wp-image-325" src="%s/Langston-Huges-.jpg" alt="" width="400" height="400" /><br>Langston Huges</div>',$poet_pics_dir);
	// printf('<div class="poet-pic"><img class="size-full wp-image-325" src="%s/Langston-Huges-.jpg" alt="" width="400" height="400" />Langston Huges</div>',$poet_pics_dir);
	// printf('<div style="margin-left: 33px;margin-top:-314px;"><img class="size-full wp-image-327" src="%s/Sylvia_Plath.jpg" alt="" width="288" height="386"  /><br>Sylvia Plath</div>',$poet_pics_dir);
	// printf('<div class="poet-pic"><img class="size-full wp-image-327" src="%s/Sylvia_Plath.jpg" alt="" width="288" height="386"  />Sylvia Plath</div>',$poet_pics_dir);
	// printf('<div style="margin-left: 519px;margin-top:-636px;"><img class="size-medium wp-image-329" src="%s/william-shakespeare-portrait-269x300.jpg" alt="" width="269" height="300" /><br>William Shakespeare</div>',$poet_pics_dir);
	// printf('<div class="poet-pic"><img class="size-medium wp-image-329" src="%s/william-shakespeare-portrait-269x300.jpg" alt="" width="269" height="300" />William Shakespeare</div>',$poet_pics_dir);
	// printf('<div style="margin-left: 1029px;margin-top:-389px;"><img class="size-full wp-image-328" src="%s/William-Wordsworth.jpg" alt="" width="286" height="289" /><br>William Wordsworth</div>',$poet_pics_dir);
	// printf('<div class="poet-pic"><img class="size-full wp-image-328" src="%s/William-Wordsworth.jpg" alt="" width="286" height="289" />William Wordsworth</div>',$poet_pics_dir);
	// echo '</div>';

//* Run the Genesis loop
genesis();