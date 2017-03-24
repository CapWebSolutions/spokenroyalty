<?php
/**
 * SpokenRoyalty Child Init File
 *
 * This file calls the Child and Genesis init.php files.
 *
 * @category     SpokenRoyalty
 * @package      Admin
 * @author       Cap Web Solutions
 * @copyright    Copyright (c) 2017, Cap Web Solutions
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 */

/**
 * This function defines the Genesis Child theme constants
 * and calls necessary theme files
 *
 */

function spokenroyalty_init() {
	// Child theme
	define( 'CHILD_THEME_URL', 'https://github.com/CapWebSolutions/spokenroyalty/' );
	// define( 'CHILD_THEME_VERSION', '1.0.1' );	 
	define( 'CHILD_THEME_NAME', __( 'Spoken Royalty', 'spoken-royalty' ) );
	define( 'CHILD_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
	define( 'SPOKENROYALTY_SETTINGS_FIELD', 'spokenroyalty' );

	// Developer Information
	define( 'CHILD_DEVELOPER', 'Cap Web Solutions' );
	define( 'CHILD_DEVELOPER_URL', 'https://capwebsolutions.com/'  );

	/** Define Directory Location Constants */
	if ( ! defined( 'CHILD_DIR' ) )
		define( 'CHILD_DIR', get_stylesheet_directory() );

	/** Define URL Location Constants */
	if ( ! defined( 'CHILD_URL' ) )
		define( 'CHILD_URL', get_stylesheet_directory_uri() );
	define( 'SPOKENROYALTY_LIB', CHILD_URL . '/lib' );
	define( 'SPOKENROYALTY_IMAGES', CHILD_URL . '/images' );
	define( 'SPOKENROYALTY_ADMIN', SPOKENROYALTY_LIB . '/admin' );
	define( 'SPOKENROYALTY_ADMIN_IMAGES', SPOKENROYALTY_LIB . '/images' );
	define( 'SPOKENROYALTY_JS' , CHILD_URL .'/lib/js' );
	define( 'SPOKENROYALTY_CSS' , CHILD_URL .'/css' );

	// Load admin files when necessary
	if ( is_admin() ) {
		// Plugins
		// include_once( CHILD_DIR . '/lib/plugins/plugins.php' );

		// Theme Settings
		require_once( CHILD_DIR . '/lib/admin/theme-settings.php' );

	}
	
	// Add HTML5 markup structure
	add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
		) );

	// Add Mobile Responsive Viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	// Add structural wraps
	add_theme_support( 'genesis-structural-wraps', array(
		'menu-secondary',
		'footer',
		'site-inner',
	) );

	//Structure
	// include_once( CHILD_DIR . '/lib/structure/header.php');
	// include_once( CHILD_DIR . '/lib/structure/post.php');
	// include_once( CHILD_DIR . '/lib/structure/sidebar.php');
	// include_once( CHILD_DIR . '/lib/structure/comment-form.php');
	// include_once( CHILD_DIR . '/lib/structure/footer.php');
	// include_once( CHILD_DIR . '/lib/structure/top-image.php');
	
	// Shortcodes
	// include_once( CHILD_DIR . '/lib/functions/shortcodes.php');

	// Setup Widgets
	// include_once( CHILD_DIR . '/lib/widgets/call-to-action.php');
	//include_once( CHILD_DIR . '/lib/widgets/widget-social.php');

	//include extras
	//include_once( CHILD_DIR . '/lib/functions/post-types.php');
	// include_once( CHILD_DIR . '/lib/functions/metaboxes.php');

	// Enable Gravity Forms setting to hide form labels
	// add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

	// Remove Edit link
	add_filter( 'edit_post_link', '__return_false' );

	// Enqueue Genericons font
	// add_action( 'wp_print_styles', 'spokenroyalty_load_fonts' );
	
	// Mobile menu
	// include_once( CHILD_DIR . '/lib/functions/mobilemenu.php');

	// Enable Customizer Support for site title, description, and widgets
	// add_action( 'customize_register', 'spokenroyalty_customize_register' );
	// add_theme_support( 'customize-selective-refresh-widgets' );
	
	//* Search Toogle
	// include_once( CHILD_DIR . '/lib/functions/hide-toggle.php');

}

// function spokenroyalty_load_fonts() {
// 	wp_register_style( 'genericons', CHILD_URL . '/lib/genericons/genericons.css', array(), CHILD_THEME_VERSION, 'all' );
// 	wp_enqueue_style( 'genericons' );
// 	wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null );
// }

function spokenroyalty_customize_register( WP_Customize_Manager $wp_customize ) {
	global $wp_version;
	if ( $wp_version < 4.5 ) {
		return;
	}
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
        'render_callback' => function() {
            bloginfo( 'name' );
        },
    ) );
}


