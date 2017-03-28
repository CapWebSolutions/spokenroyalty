<?php
/**
 * BuddyPress - Users Profile Diary - Left Side
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

// Setup the Query arguments
		$args = array( 
			'post_status'	=> 'publish',
			'orderby'		=> 'date',
			'order'			=> 'DESC',
			'author'		=> bp_displayed_user_id (),
			);

 		$media_args = array( 
			'post_status'	=> 'publish',
			'orderby'		=> 'date',
			'order'			=> 'DESC',
			'author'		=> bp_displayed_user_id (),
			);  

// The Gallery Query
$the_gallery_query = new MPP_Gallery_Query( $args );

// The Media Query
$the_media_query = new MPP_Media_Query( $media_args );

// The Loop
if ( $the_gallery_query->have_galleries() ) {
	echo '<h3>My Favorite Media</h3>';
	// while ( $the_gallery_query->have_galleries() ) {
		$the_gallery_query->the_gallery();
		echo 'Gallery: <strong>' . mpp_get_gallery_title() . "</strong><br />";
	// while ( $the_media_query->have_media() ) {
		$the_media_query->the_media();
		echo 'Title: <strong>' . mpp_get_media_title() . "</strong><br />";
		$my_type = mpp_get_media_type();
		mpp_load_media_view();
		// switch( $my_type ) {
		// 	case 'video':
		// 	mpp_load_media_view();
		// 	break;
		// 	case 'audio':
		// 	mpp_load_media_view();
		// 	break;
		// 	case 'photo':
		// 	mpp_load_media_view();
		// 	break;
		// }
	// }
	echo '</ul>';
	/* Restore original media data */
mpp_reset_media_data();

	// }
	echo '</ul>';
} else {
	// no posts found
}
/* Restore original gallery/post data */
mpp_reset_gallery_data();
