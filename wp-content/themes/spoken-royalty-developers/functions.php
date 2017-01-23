<?php
/**
 * Description
 *
 * @package CapWebWP\Developers
 * @since   1.0.0
 * @author  MattRy
 * @license GPL-2.0+
 * @link    https://capwebsolutions.com/
 */
namespace CapWebWP\Developers;

//* Start our initialization file
include_once( '/lib/init.php' );

//* Start file loaders
include_once( '/lib/functions/autoload.php' );

//* Start the Genesis Framework last after all others
include_once( get_template_directory() . '/lib/init.php' );
