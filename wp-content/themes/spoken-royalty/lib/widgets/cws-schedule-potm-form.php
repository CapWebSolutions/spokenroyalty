<?php
/**
 * SpokenRoyalty Repeating Form Scheduler for POTM submission.
 *
 * This file outputs the selected form at the specified time on the front page widget.
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
        <div class="potm-submission">
<?php
        
$submit_start_day = genesis_get_option( 'sr_submit_start_day_of_month', 'spokenroyalty-settings' );
$submit_start_time = genesis_get_option( 'sr_submit_start_time_of_day', 'spokenroyalty-settings' );
$submit_duration = genesis_get_option( 'sr_submit_duration', 'spokenroyalty-settings' );

$today_date = date('d');  // day of month
$today_hour = date('H');  // hour of day
$today_month = date('m');  // current month
$today_year = date('Y');

$date_now = new DateTime("now");

// Build correct submission start/end
$form_open_date = date_create($today_year . "-" . $today_month . "-" . $submit_start_day . " " . $submit_start_time . ":00");
$form_close_date = date_create($today_year . "-" . $today_month . "-" . $submit_start_day . " " . $submit_start_time . ":" . $submit_duration );

// Get AM/PM indicator from 24 hour number. 
$submit_start_time_12 = $submit_start_time;
$a_p = "am";
if ( $submit_start_time > 12 ) {
    $submit_start_time_12 = $submit_start_time - 12;
    $a_p = "pm";
}

if ( $date_now >= $form_open_date && $date_now <= $form_close_date ) {
    // on the right day - display form
    echo 'P.O.T.M. Submissions will continue to be accepted until ' . $submit_start_time_12 . ':' . $submit_duration . ' ' . $a_p . ' today.<br>';
    gravity_form( 3, true, false, false, '', true, 99, true );
} else {
    // Not time yet
    echo '<center>P.O.T.M. Submissions will be accepted on ' . $today_month . '/' . $submit_start_day . ' starting at ' . $submit_start_time_12 . ':00 ' . $a_p . ' for ' . $submit_duration . ' minutes.</center><br>';
    echo '<center>Thanks for your interest.</center>';
}

?>

        </div> <!-- End .potm-submission -->
    </div> <!-- End .widget-area -->
</div> <!-- End .wrap -->