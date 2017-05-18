<?php
//* Start the Genesis engine
include_once( get_template_directory() . '/lib/init.php' );

//* Start the Child Theme engine
require_once( 'lib/init.php' );

//* Initialize the Child Theme
spokenroyalty_init();

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Build Theme Settings Admin Page
if ( is_admin() ) {
	include_once( get_stylesheet_directory() . '/lib/admin/theme-settings.php' );
}

//* Set Localization (do not remove)
load_child_theme_textdomain( 'spokenroyalty', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'spokenroyalty' ) );



//* Enqueue our theme scripts and styles 
add_action( 'wp_enqueue_scripts', 'spokenroyalty_enqueue_scripts_styles' );
function spokenroyalty_enqueue_scripts_styles() {
	wp_enqueue_script( 'spokenroyalty-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700|Raleway:400,500', array(), CHILD_THEME_VERSION );
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
function spokenroyalty_background_callback() { 

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
add_filter( 'body_class', 'spokenroyalty_custom_body_class' );
function spokenroyalty_custom_body_class( $classes ) {
	$classes[] = 'spokenroyalty';
	return $classes;
}

//* Hook before header widget area above header
add_action( 'genesis_before_header', 'spokenroyalty_before_header' );
function spokenroyalty_before_header() {
	genesis_widget_area( 'before-header', array(
		'before' => '<div class="before-header" class="widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

// ref: https://sridharkatakam.com/responsive-header-banner-image-spokenroyalty-pro/ */
// Hook site header banner after header
// this displays the gold banner. 
add_action( 'genesis_after_header', 'spokenroyalty_site_header_banner' );
function spokenroyalty_site_header_banner() {

	$my_image_dir = get_stylesheet_directory_uri();
	$my_logo_full = $my_image_dir . "/images/spoken-logo-300.png" ;
	$my_logo_medium = $my_image_dir . "/images/spoken-logo-200.jpg" ;
	$my_logo_small = $my_image_dir . "/images/spoken-logo-100.jpg" ;
	$my_logo_xsmall = $my_image_dir . "/images/spoken-logo-50.jpg" ;


	// echo '<div class="site-header-banner">';
	// echo '<a href="' . home_url("/home/") . '"><img src="' . $my_image_dir . '/images/header-banner-words.png" />';
	// echo '<div class="site-header-banner-logo"><img src="' . $my_logo_full . '" srcset="' . $my_logo_xsmall . ' 300w, ' . 
	// $my_logo_small . ' 700w, ' . $my_logo_medium . ' 1400w"/></div></a>';
	// echo '</div>';

	// echo '<div class="site-banner">';
	// echo '<div class="site-banner-logo">LOGO<br>HERE</div>';
	// echo '<div class="site-banner-words">The Site Where Poets Live</div>';
	// echo '</div>';
	// echo '<a href="' . home_url("/home/") . '"><img src="' . $my_image_dir . '/images/header-banner-words.png" />';
	// echo '<div class="site-header-banner-logo"><img src="' . $my_logo_full . '" srcset="' . $my_logo_xsmall . ' 300w, ' . 
	// $my_logo_small . ' 700w, ' . $my_logo_medium . ' 1400w"/></div></a>';

	echo '<div class="site-banner-wrap">';
	echo '<div class="site-banner-b1 logo-width">';
	// echo 'LOGO<br>HERE'; ?>
	<table class="site-banner-wrap">
  <tr>
    <td>
	<?php 
	echo '<img src="' . $my_logo_full . '" srcset="' . $my_logo_xsmall . ' 300w, ' . 
	$my_logo_small . ' 700w, ' . $my_logo_medium . ' 1400w"/>'; 
	?>
	</td>
	</tr>
	<td> 
	<?php
	echo '</div>';
		echo '<div class="site-banner-b2 words-width">';
	// echo 'LOGO<br>HERE'; ?>
	<table class="site-banner-wrap">
  <tr>
    <td>
	<?php 
		echo 'The Site Where Poets Live'; 
	?>
	</td>
	</tr>
	</table> 
	<?php
	echo '</div>';
	echo '</div>';

	genesis_widget_area( 'home-featured', array(
		'before'	=> '<div class="wrap">',
		'after'		=> '</div>',
	));


}
/* Widget area to overlay on banner */
genesis_register_sidebar( array(
	'id'          => 'home-featured',
	'name'        => __( 'Home Featured', 'spokenroyalty' ),
	'description' => __( 'This is the featured widget area on homepage.', 'spokenroyalty' ),
) );

// Remove site description 
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

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
		include_once( CHILD_DIR . '/lib/widgets/cws-welcome.php');
	}
}

//* Modify the WordPress read more link
add_filter( 'the_content_more_link', 'spokenroyalty_read_more' );
function spokenroyalty_read_more() {
	return '<a class="more-link" href="' . get_permalink() . '">' . __( 'Continue Reading', 'spokenroyalty' ) . '</a>';
}

//* Modify the content limit read more link
add_action( 'genesis_before_loop', 'spokenroyalty_more' );
function spokenroyalty_more() {
	add_filter( 'get_the_content_more_link', 'spokenroyalty_read_more' );
}

add_action( 'genesis_after_loop', 'spokenroyalty_remove_more' );
function spokenroyalty_remove_more() {
	remove_filter( 'get_the_content_more_link', 'spokenroyalty_read_more' );
}

//* Remove entry meta in entry footer
add_action( 'genesis_before_entry', 'spokenroyalty_remove_entry_meta' );
function spokenroyalty_remove_entry_meta() {
	
	//* Remove if not single post
	if ( ! is_single() ) {
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
	}
}

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'spokenroyalty_author_box_gravatar' );
function spokenroyalty_author_box_gravatar( $size ) {
	return 180;
}

//* Modify the size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'spokenroyalty_comments_gravatar' );
function spokenroyalty_comments_gravatar( $args ) {
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
add_filter( 'comment_form_defaults', 'spokenroyalty_remove_comment_form_allowed_tags' );
function spokenroyalty_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	return $defaults;

}

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'before-header',
	'name'        => __( 'Before Header', 'spokenroyalty' ),
	'description' => __( 'This is the before header widget area.', 'spokenroyalty' ),
) );

genesis_register_sidebar( array(
	'id'          => 'scripture-message',
	'name'        => __( 'Welcome Scripture Message', 'spokenroyalty' ),
	'description' => __( 'This is the welcome scripture message widget area.', 'spokenroyalty' ),
) );

genesis_register_sidebar( array(
	'id'          => 'logged-in-sidebar',
	'name'        => __( 'Logged-in sidebar', 'spokenroyalty' ),
	'description' => __( 'This is the right sidebar displayed for logged in users.', 'spokenroyalty' ),
) );
genesis_register_sidebar( array(
	'id'          => 'logged-out-sidebar',
	'name'        => __( 'Logged-out Sidebar', 'spokenroyalty' ),
	'description' => __( 'This is the right sidebar displayed for logged out users.', 'spokenroyalty' ),
) );

// remove default sorting dropdown
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Removes showing results
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );


// if ( ! isset( $content_width ) ) {
// 	$content_width = 1200;
// }

/**
* filter function to force wordpress to add our custom srcset values
* @param array  $sources {
*     One or more arrays of source data to include in the 'srcset'.
*
*     @type type array $width {
*          @type type string $url        The URL of an image source.
*          @type type string $descriptor The descriptor type used in the image candidate string,
*                                        either 'w' or 'x'.
*          @type type int    $value      The source width, if paired with a 'w' descriptor or a
*                                        pixel density value if paired with an 'x' descriptor.
*     }
* }
* @param array  $size_array    Array of width and height values in pixels (in that order).
* @param string $image_src     The 'src' of the image.
* @param array  $image_meta    The image meta data as returned by 'wp_get_attachment_metadata()'.
* @param int    $attachment_id Image attachment ID.

* @author: Aakash Dodiya
* @website: http://www.developersq.com
*/
add_filter( 'wp_calculate_image_srcset', 'dq_add_custom_image_srcset', 10, 5 );
function dq_add_custom_image_srcset( $sources, $size_array, $image_src, $image_meta, $attachment_id ){
			
	// image base name		
	$image_basename = wp_basename( $image_meta['file'] );
	// upload directory info array
	$upload_dir_info_arr = wp_get_upload_dir();
	// base url of upload directory
	$baseurl = $upload_dir_info_arr['baseurl'];
	$image_baseurl = '';	
	// Uploads are (or have been) in year/month sub-directories.
	if ( $image_basename !== $image_meta['file'] ) {
		$dirname = dirname( $image_meta['file'] );
		
		if ( $dirname !== '.' ) {
			$image_baseurl = trailingslashit( $baseurl ) . $dirname; 
		}
	}

	$image_baseurl = trailingslashit( $image_baseurl );
	// check whether our custom image size exists in image meta	
	// if( array_key_exists('iphone6-landscape', $image_meta['sizes'] ) ){

		// add source value to create srcset
	// 	$sources[ $image_meta['sizes']['iphone6-landscape']['width'] ] = array(
	// 			 'url'        => $image_baseurl .  $image_meta['sizes']['iphone6-landscape']['file'],
	// 			 'descriptor' => 'w',
	// 			 'value'      => $image_meta['sizes']['iphone6-landscape']['width'],
	// 	);
	// }
	
	//return sources with new srcset value
	return $sources;
}
