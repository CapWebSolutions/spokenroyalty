<?php
/**
 * Spoken Royalty Settings
 *
 * This file registers all of Spoken Royalty's specific Theme Settings, accessible from
 * Genesis --> Spoken Royalty Settings.
 */ 
 
/**
 * Registers a new admin page, providing content and corresponding menu item
 * for the Child Theme Settings page.
 *
 * @since 1.0.0
 *
 * @package spokenroyalty
 * @subpackage Spokenroyalty_Settings
 */
class spokenroyalty_Settings extends Genesis_Admin_Boxes {
	
	/**
	 * Create an admin menu item and settings page.
	 * @since 1.0.0
	 */
	function __construct() {
		
		// Specify a unique page ID. 
		$page_id = 'spokenroyaltyadmin';
		
		// Set it as a child to genesis, and define the menu and page titles
		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => __( 'Spoken Royalty Settings', 'spokenroyalty' ),
				'menu_title'  => __( 'Spoken Royalty Settings', 'spokenroyalty' ),
				'capability' => 'manage_options',
			)
		);
		
		// Set up page options. These are optional, so only uncomment if you want to change the defaults
		$page_ops = array(
		//	'screen_icon'       => 'options-general',
		//	'save_button_text'  => 'Save Settings',
		//	'reset_button_text' => 'Reset Settings',
		//	'save_notice_text'  => 'Settings saved.',
		//	'reset_notice_text' => 'Settings reset.',
		);		
		
		// Give it a unique settings field. 
		// You'll access them from genesis_get_option( 'option_name', 'spokenroyalty-settings' );
		$settings_field = 'spokenroyalty-settings';
		
		// Set the default values
		$default_settings = array(
			'sr_scripture_text' => 'Matt 1:2 Default Scripture Passage',
			'sr_poet_diary_bg_image' => '/wp-content/themes/spokenroyalty/images/open-poet-diary.jpg',
			'sr_copyright' => 'My Name, All Rights Reserved',
			'sr_credit' => 'Website by Cap Web Solutions',
			'sr_my_works_title_len'			=> 10,
			'sr_my_works_content_len'		=> 200,
			'sr_submit_start_day_of_month'	=> 23,
			'sr_submit_end_day_of_month'	=> 23,
			'sr_submit_start_time_of_day'	=> 12,
			'sr_submit_duration'			=> 30,
			);
		
		// Create the Admin Page
		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		// Initialize the Sanitization Filter
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );
	}

	/**
	 * Upload the Javascripts for the media uploader
	 */
	public function upload_scripts() {
	}
	
	/** 
	 * Set up Sanitization Filters
	 * @since 1.0.0
	 *
	 * See /lib/classes/sanitization.php for all available filters.
	 */	
	function sanitization_filters() {
					
		genesis_add_option_filter( 'safe_html', $this->settings_field,
			array(
				'sr_scripture_text',
				'sr_poet_diary_bg_image',
				'sr_copyright',
				'sr_credit',
			) );
	}
	
	/**
	 * Register metaboxes on Child Theme Settings page
	 * @since 1.0.0
	 */
	function metaboxes() {
		add_meta_box('sr_scripture_text_metabox', 'Scripture Text', array($this, 'sr_scripture_text_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('sr_poet_diary_bg_image_metabox', 'Poet Diary Background Image', array( $this, 'sr_poet_diary_bg_image_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('sr_my_works_len_metabox', '"My Works" Minimum Lengths', array( $this, 'sr_my_works_len_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('sr_submit_details', 'POTM Submission Defaults', array( $this, 'sr_submit_details_metabox' ), $this->pagehook, 'main', 'high');
	}
	
	/**
	 * Scripture Text Metabox
	 * @since 1.0.0
	 */
	function sr_scripture_text_metabox() {
	
		echo '<p><input type="text" name="' . $this->get_field_name( 'sr_scripture_text' ) . '" id="' . $this->get_field_id( 'sr_scripture_text' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_scripture_text' ) ) . '" size="150" /></p>';
	}
	/**
	 * Poet Diary Background Image Metabox
	 * @since 1.0.0
	 */
	function sr_poet_diary_bg_image_metabox() {

		echo '<p><strong>Image URL:</strong> <em>size: 900 x 600px</em></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'sr_poet_diary_bg_image' ) . '" id="' . $this->get_field_id( 'sr_poet_diary_bg_image' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_poet_diary_bg_image' ) ) . '" size="70" /></p>';
	}
	/**
	 * My Works Minimum Length Settings Metabox
	 * @since 1.0.0
	 */
	function sr_my_works_len_metabox() {
		echo '<p><strong>Title Length</strong> (Default is 10)</p>';
		echo '<p><input type="number" value="10" min="3" name="' . $this->get_field_name( 'sr_my_works_title_len' ) . '" id="' . $this->get_field_id( 'sr_my_works_title_len' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_my_works_title_len' ) ) . '" size="2" /></p>';
		echo '<p><strong>Work Content Length</strong> (Default is 200)</p>';
		echo '<p><input type="number" value="200" min="50" name="' . $this->get_field_name( 'sr_my_works_content_len' ) . '" id="' . $this->get_field_id( 'sr_my_works_content_len' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_my_works_content_len' ) ) . '" size="2" /></p>';
	}
	/*
	 * Submit Details Metabox
	 * @since 1.0.0
	 */
	function sr_submit_details_metabox() {
		echo '<p><strong>Start Day of Month ( 1 - 27 )</p>';
		echo '<p><input type="number" value="23" min="1" max="27" name="' . $this->get_field_name( 'sr_submit_start_day_of_month' ) . '" id="' . $this->get_field_id( 'sr_submit_start_day_of_month' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_submit_start_day_of_month' ) ) . '" size="2" /></p>';
		// echo '<p><strong>End Day of Month ( 1 - 27 )</p>';
		// echo '<p><input type="number" value="" min="1" max="27" name="' . $this->get_field_name( 'sr_submit_end_day_of_month' ) . '" id="' . $this->get_field_id( 'sr_submit_end_day_of_month' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_submit_end_day_of_month' ) ) . '" size="2" /></p>';
		echo '<p><strong>Start Hour ( 0 - 23 )</p>';
		echo '<p><input type="number" value="0" min="0" max="23" name="'  . $this->get_field_name( 'sr_submit_start_time_of_day' ) . '" id="' . $this->get_field_id( 'sr_submit_start_time_of_day' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_submit_start_time_of_day' ) ) . '" size="2" /></p>';
		echo '<p><strong>Duration in minutes ( 1-59 )</p>';
		echo '<p><input type="number" value="30" min="1" max="59" name="' . $this->get_field_name( 'sr_submit_duration' ) . '" id="' . $this->get_field_id( 'sr_submit_duration' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_submit_duration' ) ) . '" size="2" /></p>';
	}	
	
}

/**
 * Add the Theme Settings Page
 * @since 1.0.0
 */
function spokenroyalty_add_settings() {
	global $_child_theme_settings;
	$_child_theme_settings = new spokenroyalty_Settings;	 	
}
add_action( 'genesis_admin_menu', 'spokenroyalty_add_settings' );
