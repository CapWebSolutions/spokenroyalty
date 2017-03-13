<?php
/**
 * BuddyPress - Users Profile
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

// echo 'in my \buddypress\members\single\profile.php';


?>
<div class="item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation">
	<ul>
		<?php bp_get_options_nav(); ?>
	</ul>
</div><!-- .item-list-tabs -->

<?php

add_action('bp_before_profile_content', 'display_poet_diary');
/*
 * Dispaly favorite stuff ontop of open diary book.
 * If no favorites have been selected, display some type 
 * of default content 
 */

function display_poet_diary(){
	?>

	<div style="background-image:url(http://spokenroyalty.dev/wp-content/themes/spoken-royalty-beautiful-pro/images/open-book-pic-2.jpg);
	background-repeat:no-repeat;
	background-position:0% 30%;
	width: 900px;
	height: 600px;
	margin-top: 20px;">
	<div class="one-half book-left-profile">
	<?php
	$favorite_media_piece_exists = mt_rand(0, 1);
	$favorite_written_piece_exists = mt_rand(0, 1);
	if ( $favorite_media_piece_exists ) {
		?><strong>Favorite media piece.</strong><br>
		<iframe src="https://www.youtube.com/embed/XQu8TTBmGhA?rel=0&amp;controls=0&amp;showinfo=0" width="640" height="360" frameborder="0" allowfullscreen="allowfullscreen"></iframe><?php
	} else { 
		?><strong>No favorite media identified.</strong><br>Displaying placeholder.<br><?php
		$my_dir = wp_upload_dir()[baseurl];
		printf('<img class="alignnone size-full wp-image-905" src="%s/rtMedia/users/1/07_fuzsions_Logo_RGB-800x800.png" alt="" width="300" height="300" />',$my_dir);
	}
	?>
	</div><div class="one-half book-right-profile">
	<?php
	if ( $favorite_written_piece_exists ) {
		?>
		<strong>Favorite written piece.</strong><br>
		Pellentesque fermentum dolor.<br>
		Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc. Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna.
		<?php
	} else {
		?>
		<strong>No favorite written piece identified.</strong><br>Display basic member profile info on right page.
		<?php //*bp_get_template_part( 'members/single/profile/profile-loop' );
	}
?>
</div>
<div class="clear-line"></div>
<?php

?>
	</div>
	<?php
}
//* Now go on to display rest of the story. 


/**
 * Fires before the display of member profile content.
 *
 * @since 1.1.0
 */
do_action( 'bp_before_profile_content' ); ?>

<!-- This is the start of the profile table -->
<div class="profile">

<?php switch ( bp_current_action() ) :

	// Edit
	case 'edit'   :
		bp_get_template_part( 'members/single/profile/edit' );
		break;

	// Change Avatar
	case 'change-avatar' :
		bp_get_template_part( 'members/single/profile/change-avatar' );
		break;

	// Change Cover Image
	case 'change-cover-image' :
		bp_get_template_part( 'members/single/profile/change-cover-image' );
		break;

	// Compose
	case 'public' :

		// Display XProfile
		if ( bp_is_active( 'xprofile' ) )
			bp_get_template_part( 'members/single/profile/profile-loop' );

		// Display WordPress profile (fallback)
		else
			bp_get_template_part( 'members/single/profile/profile-wp' );

		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch; ?>
</div><!-- .profile -->

<?php

/**
 * Fires after the display of member profile content.
 *
 * @since 1.1.0
 */
do_action( 'bp_after_profile_content' ); ?>
