<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'genesis_404' );
/**
 * This function outputs a 404 "Not Found" error message.
 *
 * @since 1.6
 */
function genesis_404() {

	genesis_markup( array(
		'open' => '<article class="entry">',
		'context' => 'entry-404',
	) );

		printf( '<h1 class="entry-title">%s</h1>', apply_filters( 'genesis_404_entry_title', __( "Oops. Can't find that. We have the dreaded error 404.", 'genesis' ) ) );
		echo '<div class="entry-content">';
			if ( genesis_html5() ) :
				echo apply_filters( 'genesis_404_entry_content', '<p>' . sprintf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.<br><br>We\'ve included a list of our pages and posts below. That may help you find what you are looking for.' , 'genesis' ), trailingslashit(home_url() . "/home") ) . '</p>' );
				get_search_form();
			else :
	?>

			<p><?php printf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it with the information below.', 'genesis' ), trailingslashit(home_url() . "/home") ); ?></p>
	<?php
			endif;
			if ( genesis_a11y( '404-page' ) ) {
				echo '<h2>' . __( 'Sitemap', 'genesis' ) . '</h2>';
				genesis_sitemap( 'h3' );
			} else {
                echo "<br>";
				genesis_sitemap( 'h4' );
			}
		echo '</div>';
	genesis_markup( array(
		'close' => '</article>',
		'context' => 'entry-404',
	) );
}
genesis();