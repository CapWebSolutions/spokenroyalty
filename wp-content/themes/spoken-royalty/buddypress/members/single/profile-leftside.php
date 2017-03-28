<?php
/**
 * BuddyPress - Users Profile Diary - Left Side
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */



// create_poet_profile_left_side();

// function create_poet_profile_left_side() {

// Setup the Query arguments
		$args = array( 
			'post_status'	=> 'publish',
			'orderby'		=> 'date',
			'order'			=> 'DESC',
			'author'		=> bp_displayed_user_id (),
			);
   
// the query
$the_gallery_query = new MPP_Gallery_Query( $args ); 
// var_dump($the_gallery_query); 
var_dump($the_gallery_query->have_galleries());

if ( $the_gallery_query->have_galleries() ) {
		echo '<strong>Media pieces.</strong><br/>';
    while( $the_gallery_query->have_galleries() ) : $the_gallery_query->the_gallery(); 
        var_dump( $the_gallery_query->the_gallery() );
        echo '<h2>' . mpp_get_gallery_title() . '</h2>';
    endwhile; // end of loop

    mpp_reset_gallery_data();
} else { 
		$my_dir = wp_upload_dir()['baseurl'];
		echo '<br /><br />';
		printf('<img class="alignnone size-full wp-image-905" src="%s/rtMedia/users/1/07_fuzsions_Logo_RGB-800x800.png" alt="" width="300" height="300" />',$my_dir);
}

    // $favorite_media_piece_exists = mt_rand(0, 1);
	// if ( $favorite_media_piece_exists ) {

	// 	<iframe src="https://www.youtube.com/embed/XQu8TTBmGhA?rel=0&amp;controls=0&amp;showinfo=0" width="640" height="360" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
	// } else { 
	// 	$my_dir = wp_upload_dir()['baseurl'];
	// 	echo '<br /><br />';
	// 	printf('<img class="alignnone size-full wp-image-905" src="%s/rtMedia/users/1/07_fuzsions_Logo_RGB-800x800.png" alt="" width="300" height="300" />',$my_dir);
	// }
    // return;
// }