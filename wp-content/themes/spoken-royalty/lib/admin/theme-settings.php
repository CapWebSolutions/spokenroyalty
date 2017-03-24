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
			'sr_copyright' => 'My Name, All Rights Reserved',
			'sr_credit' => 'Website by Cap Web Solutions',
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
			) );
	}
	
	/**
	 * Register metaboxes on Child Theme Settings page
	 * @since 1.0.0
	 */
	function metaboxes() {
		add_meta_box('spokenroyalty_scripture_text_metabox', 'Scripture Text', array( $this, 'spokenroyalty_scripture_text_metabox' ), $this->pagehook, 'main', 'high');
	}
	
	
	/**
	 * Scripture Text Metabox
	 * @since 1.0.0
	 */
	function spokenroyalty_scripture_text_metabox() {
	
	echo '<p><strong>Scripture Text:</strong></p>';
	echo '<p><input type="text" name="' . $this->get_field_name( 'sr_scripture_text' ) . '" id="' . $this->get_field_id( 'sr_scripture_text' ) . '" value="' . esc_attr( $this->get_field_value( 'sr_scripture_text' ) ) . '" size="150" /></p>';

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
