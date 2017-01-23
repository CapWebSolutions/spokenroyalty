<?php
/**
 * Starter WordPress Plugin
 *
 * @package     KnowTheCode
 * @author      Matt Ryan
 * @copyright   2016 Cap Web Solutions
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Starter WordPress Plugin
 * Plugin URI:  https://mattryan.co
 * Description: KTC Starter Sandbox WP Plugin. Use this PI for all code demo labs and Docx.
 * Version:     1.0.0
 * Author:      Matt Ryan
 * Author URI:  https://mattryan.co
 * Text Domain: knowthecode
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace KnowTheCode;

if ( ! defined( 'ABSPATH') ) {
	exit ( 'Cheatin&#8217; uh?');
}

use \Whoops\Run;
use \Whoops\Handler\PrettyPageHandler;

require_once( __DIR__ . '/assets/vendor/autoload.php' );

$whoops = new Run();
$error_page = new PrettyPageHandler();
$error_page->setEditor( 'sublime' );
$whoops->pushHandler( $error_page );
$whoops->register();

// func_num_args();
// d('in here');
