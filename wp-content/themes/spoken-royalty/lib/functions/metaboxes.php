<?php
add_action( 'cmb2_init', 'cws_register_theme_settings_page_metabox' );
/**
 * Single Post Meta
 */
function cws_register_theme_settings_page_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_spokenroyalty_';


	$potm_selection_metabox = new_cmb2_box( array(
		'id'           => $prefix  . 'metabox',
		'title'        => __( 'POTM Selection Settings', 'spokenroyalty' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );
		$potm_selection_metabox->add_field( array(
			'name'	=> __( 'POTM Video URL', 'spokenroyalty' ),
			'desc'	=> __( 'Recommended video length < 2 minutes.', 'spokenroyalty' ),
			'id'	=> $prefix . 'image_url',
			'type'	=> 'file',
			) );
		$potm_selection_metabox->add_field( array(
			'name'	=> __( 'Poet Name', 'spokenroyalty' ),
			'id'	=> $prefix . 'potm_name',
			'type'	=> 'text',
			) );
		$potm_selection_metabox->add_field( array(
			'name'	=> __( 'Poet Location', 'spokenroyalty' ),
			'id'	=> $prefix . 'potm_location',
			'type'	=> 'text',
			) );
}
