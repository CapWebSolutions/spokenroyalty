<?php
/**
 * Description
 *
 *
 * @package CapWebWP\Developers
 * @since   1.0.0
 * @author  MattRy
 * @license GPL-2.0+
 * @link    https://capwebsolutions.com/
 */
namespace CapWebWP\Developers;

/**
 * Initialize the theme's constants
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {

  // This is the OLD way to do it.
  // define( 'CHILD_THEME_NAME', 'Genesis Sample' );
  // define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
  // define( 'CHILD_THEME_VERSION', '2.2.4' );

// The new modular way to do it.
// Pull the constant values directly from the style sheet
//  using the wp_get_theme function.

  $child_theme = wp_get_theme();

  define( 'CHILD_THEME_NAME', $child_theme->get( 'Name') );
  define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI') );
  define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version') );
  define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain') );

  define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
  define( 'CHILD_CONFIG_DIR', CHILD_THEME_DIR . '/config/' );
}

init_constants();
