<?php
/**
 * SpokenRoyalty Welcome Scripture Message Widget.
 *
 * This file outputs the selected Welcome scripture message on the front page widget.
 *
 * @category     SpokenRoyalty
 * @package      Admin
 * @author       Cap Web Solutions
 * @copyright    Copyright (c) 2017, Cap Web Solutions
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 */

?>

<div class="wrap">
	<div class="widget-area">
        <div class="scripture">
            <h3><?php echo genesis_get_option( 'sr_scripture_text', 'spokenroyalty-settings' ); ?></h3>
        </div> <!-- End .scripture -->
    </div> <!-- End .widget-area -->
</div> <!-- End .wrap -->
