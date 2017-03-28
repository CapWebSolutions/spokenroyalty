<?php
/**
 * BuddyPress - Users Profile Diary - Right Side
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

create_poet_profile_right_side();

function create_poet_profile_right_side(){
	/* 
	On the poet profile page display the most recent post having 
	category "my favorite words".

	Set up the query to get the posts that have been published belonging to the user 
	whose profile we are looking at now. 

	*/

	// Setup the Query arguments
		$args = array( 
			'post_status'	=> 'publish',
			'category_name'	=> 'my-favorite-words',
			'orderby'		=> 'date',
			'order'			=> 'DESC',
			'author'		=> bp_displayed_user_id (),
			);

		$have_posted = buddyblog_user_has_posted();

	// Do the query
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) {
			$my_id = $my_query->post->ID;

	// Only need to print out Buddy Blog posts. Ignore others. 
			$this_is_a_buddyblog_post = buddyblog_is_buddyblog_post( $my_id );
			if ( $this_is_a_buddyblog_post ) {
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
	// Print the title as a link to the full post, followed by the content. 
					echo '<strong><a href="'. get_permalink( $my_query->post->ID ) . '">' . get_the_title() . '</a></strong><br />';
					echo $my_query->post->post_content;
					echo '<br /><center> --- END --- </center><br />';
					break;
				}
			}
			/* Restore original Post Data */
			wp_reset_postdata();

		} else {
			// no posts found
			?>
			<strong>No favorite written piece identified.</strong><br>Display basic member profile info on right page.
			<?php //*bp_get_template_part( 'members/single/profile/profile-loop' );
		}

    return;
}