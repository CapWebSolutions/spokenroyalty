<?php
/**
 * Menu structure customization.
 *
 *
 * @package CapWebWP\Developers
 * @since   1.0.0
 * @author  MattRy
 * @license GPL-2.0+
 * @link    https://capwebsolutions.com/
 */
// namespace CapWebWP\Developers;

/**
 * Unregister menu callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_menu_callbacks() {
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
}
// Reposition the primary navigation menu
add_action( 'genesis_header', 'genesis_do_nav', 5 );

// Reposition the secondary navigation menu
// add_action( 'genesis_header', 'genesis_do_subnav', 5 );
add_action( 'genesis_header_right', 'genesis_do_subnav', 5 );

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\setup_secondary_menu_args' );
/**
 * Reduce the secondary navigation menu to one level depth.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function setup_secondary_menu_args( array $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;
}

// ref: http://wpsites.net/web-design/adding-additional-nav-menus-in-genesis/

// Add 3rd menu just above footer widget area
// Menus are added to theme support in setup.php
// add_action( 'genesis_before_footer', 'add_tertiary_nav_genesis' ); 
function add_tertiary_nav_genesis() {
	echo '<div class="nav-tertiary">';
	wp_nav_menu( array( 'theme_location' => 'tertiary', 'container_class' => 'genesis-nav-menu' ) );
	echo '</div>';
	}

// Add attributes to markup
// re: https://amethystwebsitedesign.com/add-third-footer-navigation-menu-to-genesis-child-theme/

// add_filter( 'genesis_attr_nav-footer', 'custom_add_nav_footer_attr' );
// function custom_add_nav_footer_attr( $attributes ){

	 // add role
//     $attributes['role'] = 'navigation';
        
     // add itemscope
//     $attributes['itemscope'] = 'itemscope';
    
     // add the site navigation schema
//     $attributes['itemtype'] = 'http://schema.org/SiteNavigationElement';
    
     // return the attributes
//     return $attributes;
        
// }