<?php

//* spokenroyalty Theme Setting Defaults
add_filter( 'genesis_theme_settings_defaults', 'spokenroyalty_theme_defaults' );
function spokenroyalty_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 4;
	$defaults['content_archive']           = 'full';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['image_alignment']           = 'alignleft';
	$defaults['posts_nav']                 = 'prev-next';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}

//* Spoken Royalty Theme Setup
add_action( 'after_switch_theme', 'spokenroyalty_theme_setting_defaults' );
function spokenroyalty_theme_setting_defaults() {

	if( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 4,	
			'content_archive'           => 'full',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'image_alignment'           => 'alignleft',
			'posts_nav'                 => 'prev-next',
			'site_layout'               => 'content-sidebar',
		) );
		
	} else {
		
		_genesis_update_settings( array(
			'blog_cat_num'              => 4,	
			'content_archive'           => 'full',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'image_alignment'           => 'alignleft',
			'posts_nav'                 => 'prev-next',
			'site_layout'               => 'content-sidebar',
		) );
		
	}

	update_option( 'posts_per_page', 4 );

}

//* Simple Social Icon Defaults
add_filter( 'simple_social_default_styles', 'spokenroyalty_social_default_styles' );
function spokenroyalty_social_default_styles( $defaults ) {

	$args = array(
		'alignment'              => 'aligncenter',
		'background_color'       => '#eeeeee',
		'background_color_hover' => '#e5554e',
		'border_radius'          => 3,
		'icon_color'             => '#333333',
		'icon_color_hover'       => '#ffffff',
		'size'                   => 36,
	);
		
	$args = wp_parse_args( $args, $defaults );
	
	return $args;
	
}

add_filter( 'http_request_args', 'spokenroyalty_dont_update_theme', 5, 2 );
/**
 * Don't Update Theme
 * If there is a theme in the repo with the same name,
 * this prevents WP from prompting an update.
 *
 * @author Mark Jaquith
 * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 *
 * @param array $r Request arguments
 * @param string $url Request url
 * @return array $r Request arguments
 */
function spokenroyalty_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}