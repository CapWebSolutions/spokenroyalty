<?php
/**
 * BuddyPress - Users Profile Diary - Left Side
 */

// Setup the Query arguments
$my_user_id = bp_displayed_user_id ();
		$args = array( 
			'post_status'	=> 'publish',
			'orderby'		=> 'date',
			'order'			=> 'DESC',
			'user_id'		=> $my_user_id,
			);

 		$media_args = array( 
			'post_status'	=> 'publish',
			'orderby'		=> 'date',
			'order'			=> 'DESC',
			'user_id'		=> $my_user_id,
			);  

// The Gallery Query
$the_gallery_query = new MPP_Gallery_Query( $args );

// The Media Query
$the_media_query = new MPP_Media_Query( $media_args );

// The Loop
if ( $the_gallery_query->have_galleries() ) {
	echo '<h5>My Most Recent Media</h5>';
	$the_gallery_query->the_gallery();
	echo mpp_get_gallery_title(). '<br />';
	$the_media_query->the_media();
	mpp_load_media_view();
	/* Restore original media data */
	mpp_reset_media_data();
} else {
	echo '<h3>No Media Uploads Yet.</h3>';
}
/* Restore original gallery/post data */
mpp_reset_gallery_data();