<?php
/**
 * BuddyPress - Users Profile
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<div class="item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation">
	<ul>
		<?php bp_get_options_nav(); ?>
	</ul>
</div>
<!-- .item-list-tabs -->

<?php



add_action('bp_before_profile_content', 'display_poet_diary');

/*
 * Display favorite stuff on top of open diary book.
 * If no favorites have been selected, display some type 
 * of default content 
 */

function display_poet_diary() {

	// set the default image name
	$my_default_poet_book  = get_stylesheet_directory_uri() . '/images/default-poet-open-diary.jpg';

	// get any image name set in theme settings.
	$my_new_poet_book =''; 
	$my_new_poet_book = genesis_get_option( 'sr_poet_diary_bg_image', 'spokenroyalty-settings' );

	// if provided image file is not the default, use provided one instead
	if ( strlen($my_new_poet_book) == 0 ) 
		$poet_book_bg = $my_default_poet_book;
	else
		$poet_book_bg = $my_new_poet_book;

	// Display content over each side of poet diary
	echo '<div style="background-image:url(' . $poet_book_bg . ');">';
	
	echo '<div class="poet-book-background">';
	echo '<div class="one-half first book-left-profile">';
	// echo bp_get_template_part('members/single/profile-leftside');
	create_poet_profile_left_side();
	echo '</div>';

	echo '<div class="one-half book-right-profile">';
	create_poet_profile_right_side();
	// echo bp_get_template_part('members/single/profile-rightside');
	echo '</div><div class="clear-line"></div></div></div>';
}

/**
 * Fires before the display of member profile content.
 *
 * @since 1.1.0
 */
do_action( 'bp_before_profile_content' ); ?>

<!-- This is the start of the profile table -->
<div class="profile">
<br />
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
