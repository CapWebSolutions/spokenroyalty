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

add_filter( 'genesis_attr_taxonomy-archive-description', __NAMESPACE__ . '\add_fullpage_title_to_attributes', 20 );
add_filter( 'genesis_attr_entry-title', __NAMESPACE__ . '\add_fullpage_title_to_attributes', 20 );
/**
 * Add the `fullpage-title` class attribute
 *
 * @since 1.0.0
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function add_fullpage_title_to_attributes( array $attributes ) {
	if ( doing_filter( 'genesis_attr_entry-title' ) && ! is_singular() ) {
		return $attributes;
	}

	$attributes['class'] .= ' fullpage-title';

	return $attributes;

}
