<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'beautiful', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'beautiful' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'Spoken Royalty Beautiful', 'spoken-royalty' ) );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/beautiful/' );
define( 'CHILD_THEME_VERSION', '2.2' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom structural wrap
add_theme_support( 'genesis-structural-wraps', array( 'banner-image', 'banner-bar') );

// Enqueu bootstrap at lowest priority so theme style take precedence. 
// add_action( 'wp_enqueue_scripts', 'bootstrap_enqueue_scripts_styles', 1 );
function bootstrap_enqueue_scripts_styles() {

// Bootstrap Genesis styles
    $version = '3.3.7';
	// $version = wp_get_theme()->Version;
    wp_enqueue_style( 'bsg_combined_css', get_bloginfo( 'stylesheet_directory' ) . '/bootstrap-3.3.7/css/bootstrap.css', array(), NULL );
    wp_enqueue_script( 'bsg_combined_js', get_bloginfo( 'stylesheet_directory' ) . '/bootstrap-3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true  );
}

//* Enqueue our theme scripts and styles 
add_action( 'wp_enqueue_scripts', 'beautiful_enqueue_scripts_styles' );
function beautiful_enqueue_scripts_styles() {
	wp_enqueue_script( 'beautiful-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700|Raleway:400,500', array(), CHILD_THEME_VERSION );
	// wp_enqueue_style( 'spoken-banner-style', get_stylesheet_directory_uri() . '/style-banner.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'spoken-scripture-style', get_stylesheet_directory_uri() . '/style-scripture.css', array(), CHILD_THEME_VERSION );

}

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'default-text-color'     => '000000',
	'header-selector'        => '.site-title a',
	'header-text'            => false,
	'height'                 => 150,
	'width'                  => 150,
) );

//* Add custom background callback 
function beautiful_background_callback() { 

	$background = get_background_image();  
	$color = get_background_color();

	if ( ! $background && ! $color )  
		return; 

	echo trim( sprintf( 
		"<style type='text/css'>.custom-background .site-header-banner { background: %s %s %s %s %s; } </style>",
		$background ? 'url('. $background .')' : '',
		$color ? '#'. $color : 'transparent', 
		get_theme_mod( 'background_repeat', 'repeat' ), 
		get_theme_mod( 'background_position_x', 'left' ), 
		get_theme_mod( 'background_attachment', 'scroll' ) 
	) );
} 

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Unregister secondary sidebar 
add_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );

//* Add custom body class to the head
add_filter( 'body_class', 'beautiful_custom_body_class' );
function beautiful_custom_body_class( $classes ) {

	$classes[] = 'beautiful';
	return $classes;

}

//* Hook before header widget area above header
add_action( 'genesis_before_header', 'beautiful_before_header' );
function beautiful_before_header() {

	genesis_widget_area( 'before-header', array(
		'before' => '<div class="before-header" class="widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

// add_action( 'genesis_before_header', 'beautiful_before_header_left_right' );
// function beautiful_before_header_left_right() {

// 	genesis_widget_area( 'before-header-left', array(
// 		'before' => '<div class="before-header-container"><div class="before-header-left" class="widget-area"><div class="wrap">',
// 		'after'  => '</div></div>',
// 	) );

// 	genesis_widget_area( 'before-header-right', array(
// 		'before' => '<div class="before-header-right" class="widget-area"><div class="wrap">',
// 		'after'  => '</div></div></div>',
// 	) );
// }

/* NEW *************************************************** */
/* re: https://sridharkatakam.com/responsive-header-banner-image-beautiful-pro/ */

// Hook site header banner after header
// this displays the gold banner with the words on it. 
add_action( 'genesis_after_header', 'beautiful_site_header_banner' );
function beautiful_site_header_banner() {

	// echo '<div class="site-header-banner"><img src="' . get_stylesheet_directory_uri() . '/images/header-banner.png" />';
	echo '<div class="site-header-banner"><img src="' . get_stylesheet_directory_uri() . '/images/header-banner-words-logo-v3.png" />';
		genesis_widget_area( 'home-featured', array(
			'before'	=> '<div class="wrap">',
			'after'		=> '</div>',
		));
	echo '</div>';

}
/* New widget area to overlay on banner */
genesis_register_sidebar( array(
	'id'          => 'home-featured',
	'name'        => __( 'Home Featured', 'beautiful' ),
	'description' => __( 'This is the featured widget area on homepage.', 'beautiful' ),
) );

// Move site description / tagline down to overlay banner
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
// add_action( 'genesis_after_header', 'genesis_seo_site_description' );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_after_header', 'genesis_do_subnav', 11 );

// Assign primary navigation menu conditionally based on logged in/out status
add_filter( 'wp_nav_menu_args', 'replace_menu_in_primary' );
function replace_menu_in_primary( $args ) {
	if ( $args['theme_location'] != 'primary' ) {
		return $args;
	}

	if( is_user_logged_in() ) { // Shop Page or any of its sub pages
		$args['menu'] = 'Logged-In Menu';
	} else {					// not logged in
		$args['menu'] = 'Logged-Out Menu';
	}
	return $args;
}
// Ref: https://sridharkatakam.com/useful-functions-checking-pages-sub-pages-wordpress/
// To check a Page by ID for that Page or its direct descendants (sub/child pages)
function cap_web_is_tree( $pid ) { // $pid = The ID of the page we're looking for pages underneath

	global $post; // load details about this page

	if( is_page() && ( $post->post_parent == $pid || is_page( $pid ) ) )
		return true; // we're at the page or at a sub page
	else
		return false; // we're elsewhere

}

// Remove Site Title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );

//* Hook welcome scripture message widget area before content on Home page
add_action( 'genesis_before_content_sidebar_wrap', 'spoken_royalty_welcome_message' );
function spoken_royalty_welcome_message() {

	if ( is_page( 'Home' ) ) {

		genesis_widget_area( 'scripture-message', array(
			'before' => '<div class="scripture-message" class="widget-area">',
			'after'  => '</div>',
		) );
	}
}

//* Modify the WordPress read more link
add_filter( 'the_content_more_link', 'beautiful_read_more' );
function beautiful_read_more() {

	return '<a class="more-link" href="' . get_permalink() . '">' . __( 'Continue Reading', 'beautiful' ) . '</a>';

}

//* Modify the content limit read more link
add_action( 'genesis_before_loop', 'beautiful_more' );
function beautiful_more() {

	add_filter( 'get_the_content_more_link', 'beautiful_read_more' );

}

add_action( 'genesis_after_loop', 'beautiful_remove_more' );
function beautiful_remove_more() {

	remove_filter( 'get_the_content_more_link', 'beautiful_read_more' );

}

//* Remove entry meta in entry footer
add_action( 'genesis_before_entry', 'beautiful_remove_entry_meta' );
function beautiful_remove_entry_meta() {
	
	//* Remove if not single post
	if ( ! is_single() ) {
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
	}

}

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'beautiful_author_box_gravatar' );
function beautiful_author_box_gravatar( $size ) {
	return 180;
}

//* Modify the size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'beautiful_comments_gravatar' );
function beautiful_comments_gravatar( $args ) {

	$args['avatar_size'] = 100;
	return $args;

}

//* Hook split sidebar areas below primary sidebar
add_action( 'genesis_after_sidebar_widget_area', 'spoken_extra_sidebars' );
function spoken_extra_sidebars() {

	if ( is_active_sidebar( 'logged-out-sidebar' ) || is_active_sidebar( 'logged-in-sidebar' ) ) {

		echo '<div class="split-sidebars">';

		if ( !is_user_logged_in() ) {
				genesis_widget_area( 'logged-out-sidebar', array(
					'before' => '<div class="logged-out-sidebar" class="widget-area">',
					'after'  => '</div>',
			) );
		}

		if ( is_user_logged_in() ) {
			if ( bp_is_user() ) {
				// no logged-in-sidebar. need lots of space
			} else {
				genesis_widget_area( 'logged-in-sidebar', array(
					'before' => '<div class="logged-in-sidebar" class="widget-area">',
					'after'  => '</div>',
				) );
			}
		}
		echo '</div>';
	}

}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'beautiful_remove_comment_form_allowed_tags' );
function beautiful_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	return $defaults;

}

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'before-header',
	'name'        => __( 'Before Header', 'beautiful' ),
	'description' => __( 'This is the before header widget area.', 'beautiful' ),
) );

genesis_register_sidebar( array(
	'id'          => 'scripture-message',
	'name'        => __( 'Welcome Scripture Message', 'beautiful' ),
	'description' => __( 'This is the welcome scripture message widget area.', 'beautiful' ),
) );

genesis_register_sidebar( array(
	'id'          => 'logged-in-sidebar',
	'name'        => __( 'Logged-in sidebar', 'beautiful' ),
	'description' => __( 'This is the right sidebar displayed for logged in users.', 'beautiful' ),
) );
genesis_register_sidebar( array(
	'id'          => 'logged-out-sidebar',
	'name'        => __( 'Logged-out Sidebar', 'beautiful' ),
	'description' => __( 'This is the right sidebar displayed for logged out users.', 'beautiful' ),
) );

// remove default sorting dropdown
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Removes showing results
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );


if ( ! isset( $content_width ) ) {
	$content_width = 800;
}