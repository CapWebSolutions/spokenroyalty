<?php
/**
 * This file adds the Splash Page template to the Spoken Royalty Child Theme.
 *
 * @author Cap Web Solutions
 * @package Spoken Royalty
 * @subpackage Customizations
 *
 * Template Name: Splash
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
remove_action( 'genesis_before_header', 'spokenroyalty_before_header' );

//* Remove site header elements
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

//* Remove navigation
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav', 15 );

//* Remove site header banner
remove_action( 'genesis_after_header', 'spokenroyalty_site_header_banner' );

//* Remove Welcome Message banner
remove_action( 'genesis_before_loop', 'spokenroyalty_welcome_message' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove site description / tagline 
remove_action( 'genesis_after_header', 'genesis_seo_site_description' );
 
//* Remove the primary navigation menu
remove_action( 'genesis_before_header', 'spokenroyalty_before_header_left_right' );
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

	$poet_pics_dir = wp_upload_dir()['baseurl'];
	echo '<div class="move-wrap-button">';
	printf('<center><button style="margin-top:20px;z-index: 9999 !important"><a style="color:#fff;" href="%s/home">Enter Site</a></button></center><br />',get_bloginfo( 'url' ));
	echo '</div><div class="move-wrap">';
	printf('<div class="horizontally-lr"><figure class="figs"><img src="%s/poet-lady.jpg" alt="" width="850" height="600" class="alignnone size-full wp-image-1027" srcset="%s/poet-lady.jpg 850w, %s/poet-lady-300x212.jpg 300w, %s/poet-lady-768x542.jpg 768w" sizes="(max-width: 850px) 100vw, 850px"><figcaption>Emily Dickinson</figcaption></div>',$poet_pics_dir, $poet_pics_dir, $poet_pics_dir, $poet_pics_dir);
	printf('<div class="vertically"><figure class="figs"><img src="%s/poet-mayaangelou.jpg" alt="" width="800" height="600" class="alignnone size-full wp-image-1032" srcset="%s/poet-mayaangelou.jpg 800w, %s/poet-mayaangelou-300x225.jpg 300w, %s/poet-mayaangelou-768x576.jpg 768w" sizes="(max-width: 800px) 100vw, 800px"><figcaption>Maya Angelou</figcaption></div>',$poet_pics_dir, $poet_pics_dir, $poet_pics_dir, $poet_pics_dir); 
	printf('<div class="diagonally2"><figure class="figs"><img src="%s/poet-giovanni.jpg" alt="" width="800" height="600" class="alignnone size-full wp-image-1031" srcset="%s/poet-giovanni.jpg 800w, %s/poet-giovanni-300x225.jpg 300w, %s/poet-giovanni-768x576.jpg 768w" sizes="(max-width: 800px) 100vw, 800px"><figcaption>Nikki Giovanni</figcaption></div>',$poet_pics_dir, $poet_pics_dir, $poet_pics_dir, $poet_pics_dir); 
	printf('<div class="horizontally-rl"><figure class="figs"><img src="%s/poet-williamwordsworth.jpg" alt="" width="600" height="731" srcset="%s/poet-williamwordsworth.jpg 600w, %s/poet-williamwordsworth-246x300.jpg 246w" sizes="(max-width: 600px) 100vw, 600px"><figcaption>William Wordsworth</figcaption></div>',$poet_pics_dir, $poet_pics_dir, $poet_pics_dir, $poet_pics_dir); 
	printf('<div class="diagonally1"><figure class="figs"><img src="%s/poet-lh.jpg" alt="" width="948" height="600" class="alignnone size-full wp-image-1029" srcset="%s/poet-lh.jpg 948w, %s/poet-lh-300x225.jpg 300w, %s/poet-lh-768x576.jpg 768w" sizes="(max-width: 948px) 100vw, 948px"><figcaption>Langston Hughes</figcaption></div>',$poet_pics_dir, $poet_pics_dir, $poet_pics_dir, $poet_pics_dir);
	printf('<div class="vertically2"><figure class="figs"><img src="%s/poet-williamshakespeare.jpg" alt="" width="718" height="800" class="alignnone size-full wp-image-1028" srcset="%s/poet-williamshakespeare.jpg 718w, %s/poet-williamshakespeare-269x300.jpg 269w" sizes="(max-width: 718px) 100vw, 718px"><figcaption>William Shakespeare</figcaption></div>',$poet_pics_dir, $poet_pics_dir, $poet_pics_dir, $poet_pics_dir);

	echo '</div>';

//* Run the Genesis loop
genesis();


