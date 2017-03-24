<?php
/**
 * Plugin Name: Spoken Royalty Core Functionality
 * Plugin URI: https://github.com/CapWebSolutions/spokenroyalty
 * Description: This contains all this site's core functionality so that it is theme independent. Customized for spokenroyalty.com
 * Version: 1.0.0
 * Author: Cap Web Solutions
 * Author URI: https://capwebsolutions.com
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

// Plugin Directory.
define( 'CWS_DIR', dirname( __FILE__ ) );

// General.
include_once( CWS_DIR . '/lib/functions/general.php' );
// Post Types.
// include_once( CWS_DIR . '/lib/functions/post-types.php' );
// Custom Taxonomies.
// include_once( CWS_DIR . '/lib/functions/taxonomies.php' );
// Custom Meta boxes.
// include_once( CWS_DIR . '/lib/functions/metaboxes.php' );
// Footer Setup.
include_once( CWS_DIR . '/lib/functions/core-footer.php' );
// Woo tweaks.
include_once( CWS_DIR . '/lib/functions/wootweaks.php' );
