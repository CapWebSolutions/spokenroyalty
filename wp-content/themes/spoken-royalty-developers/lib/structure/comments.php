<?php
/**
 * Comments structure customization.
 *
 *
 * @package CapWebWP\Developers
 * @since   1.0.0
 * @author  MattRy
 * @license GPL-2.0+
 * @link    https://capwebsolutions.com/
 */
namespace CapWebWP\Developers;opers;

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\customize_comments_form_defaults' );
function customize_comments_form_defaults( $parameters ) {
	$parameters['title_reply'] = __( 'What do you think?', 'hello' );



	return $parameters;
}
