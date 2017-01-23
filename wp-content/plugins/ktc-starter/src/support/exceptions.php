<?php
/**
 * Exception handler
 *
 * @package     KnowTheCode
 * @author      Matt Ryan
 * @copyright   2016 Cap Web Solutions
 * @license     GPL-2.0+
 * @link https://mattrayn.co
 * @since 1.0.0 [<description>]
 *
 */

namespace KnowTheCode;

use \Whoops\Handler\PrettyPageHandler;
use \Whoops\Run;

add_action( 'init', __NAMESPACE__ . '\load_whoops' );
function load_whoops() {
	$whoops = new Run();
	$error_page = new PrettyPageHandler();
	$error_page->setEditor( 'sublime' );
	$whoops->pushHandler( $error_page );
	$whoops->register();
}
