<?php
/**
 * This file adds the About template to the Beautiful Pro Theme.
 *
 * @author StudioPress
 * @package Beautiful Pro
 * @subpackage Customizations
*/

/*
Template Name: About
*/

add_action ( 'genesis_after_loop', 'add_shortcode_to_content_if_logged_in');
function add_shortcode_to_content_if_logged_in() {
    if( is_user_logged_in() ) {
        echo do_shortcode( '[activity-stream pagination=0 max=5]', false );
    } else {
        return;
    }
}

//* Run the Genesis loop
genesis();
