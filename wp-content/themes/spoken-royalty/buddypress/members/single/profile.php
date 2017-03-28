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
</div><!-- .item-list-tabs -->

<?php

add_action('bp_before_profile_content', 'display_poet_diary');
/*
 * Dispaly favorite stuff ontop of open diary book.
 * If no favorites have been selected, display some type 
 * of default content 
 */

function display_poet_diary() {
	?>

	<div style="background-image:url(http://spokenroyalty.dev/wp-content/themes/spoken-royalty/images/open-book-pic-2.jpg);
		background-repeat:no-repeat;
		background-position:0% 30%;
		width: 900px;
		height: 600px;
		margin-top: 20px;">
		<div class="one-half first book-left-profile">
			<?php bp_get_template_part('members/single/profile-leftside');	?>
		</div>
		<div class="one-half book-right-profile">
			<?php bp_get_template_part('members/single/profile-rightside'); ?>
		</div>
		<div class="clear-line"></div>
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
