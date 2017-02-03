<?php
/**
 * Front Page
 *
 *
 * @package CapWebWP\Developers
 * @since   1.0.0
 * @author  MattRy
 * @license GPL-2.0+
 * @link    https://capwebsolutions.com/
 */
 

/*
 * Force full width content 
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' ); 

//* Remove the entry meta in the entry footer (requires HTML5 theme support)
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
// add_action( 'genesis_meta', 'spoken_royalty_home_genesis_meta' );
function spoken_royalty_home_genesis_meta() {
		add_action( 'genesis_loop', 'spoken_royalty_home_sections' );

}

function spoken_royalty_home_sections() {
	genesis_widget_area( 'featured-left', array(
		'before' => '<div class="featured-left-slider widget-area">',
		'after'  => '</div>',
	) );

	genesis_widget_area( 'featured-right', array(
		'before' => '<div class="featured-right widget-area">',
		'after'  => '</div>',
	) );
	
	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area">',
		'after'  => '</div>',
	) );
}

genesis();
