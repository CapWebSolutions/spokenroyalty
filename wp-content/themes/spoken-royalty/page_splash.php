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
	echo '<div class="move-wrap">';
	printf('<center><button style="margin-top:20px;z-index: 9999 !important"><a style="color:#fff;" href="%s/home">Enter Site</a></button></center><br />',get_bloginfo( 'url' ));
	// printf('<div class="diagonally1"><img src="%s/maya-angelou1.jpg" alt=""/><br>Maya Angelou</div>',$poet_pics_dir);
	// printf('<div class="diagonally2"><img src="%s/Emily_Dickinson_.jpg" alt="" /><br>Emily Dickinson</div>',$poet_pics_dir);
	// printf('<div class="diagonally1"><img src="%s/Langston-Huges-.jpg" alt=""  /><br>Langston Huges</div>',$poet_pics_dir);
	// printf('<div class="diagonally2"><img src="%s/Sylvia_Plath.jpg" alt="" /><br>Sylvia Plath</div>',$poet_pics_dir);
	// printf('<div class="diagonally1"><img src="%s/william-shakespeare-portrait.jpg" alt=""/><br>William Shakespeare</div>',$poet_pics_dir);
	// printf('<div class="diagonally2"><img src="%s/William-Wordsworth.jpg" alt=""/><br>William Wordsworth</div>',$poet_pics_dir);
	printf('<div class="horizontally-lr"><img src="%s/poet-lady.jpg" alt="" /></div>',$poet_pics_dir);
	printf('<div class="vertically"><img src="%s/poet-mayaangelou.jpg" alt="" /></div>',$poet_pics_dir); 
	printf('<div class="diagonally2"><img src="%s/poet-giovanni.jpg" alt="" /></div>',$poet_pics_dir); 
	printf('<div class="horizontally-rl"><img src="%s/poet-williamwordsworth.png" alt="" /></div>',$poet_pics_dir); 
	printf('<div class="diagonally1"><img src="%s/poet-lh.png" alt="" /></div>',$poet_pics_dir);
	printf('<div class="vertically2"><img src="%s/poet-williamshakespeare.jpg" alt=""/></div>',$poet_pics_dir);

	echo '</div>';

//* Run the Genesis loop
genesis();