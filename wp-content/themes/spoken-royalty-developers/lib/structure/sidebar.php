<?php
/**
 * Sidebar (widetized) HTML markup structure
 *
 * @package CapWebWP\Developers
 * @since   1.0.0
 * @author  MattRy
 * @license GPL-2.0+
 * @link    https://capwebsolutions.com/
 */
namespace CapWebWP\Developers;


/** Widget areas for a left/right featured area that will hold video and reg form
 *  replace full width slider area. */
genesis_register_sidebar( array(
	'id'			=> 'featured-left',
	'name'			=> __( 'Featured Left', CHILD_TEXT_DOMAIN ),
	'description'	=> __( 'This is the featured left section.', CHILD_TEXT_DOMAIN ),
) );
genesis_register_sidebar( array(
	'id'			=> 'featured-right',
	'name'			=> __( 'Featured Right', CHILD_TEXT_DOMAIN ),
	'description'	=> __( 'This is the featured right section.', CHILD_TEXT_DOMAIN ),
) );
