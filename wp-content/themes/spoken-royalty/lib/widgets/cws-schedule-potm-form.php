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

// Get all options settings from admin screen
$potm_video_url = genesis_get_option( '_potm_video_url', 'spokenroyalty-settings' );
$potm_video_poster = genesis_get_option( '_potm_video_poster', 'spokenroyalty-settings' );
$potm_name = genesis_get_option( '_potm_name', 'spokenroyalty-settings' );
$potm_location = genesis_get_option( '_potm_location', 'spokenroyalty-settings' );

// Build out the top of the /home page
echo '<h2 class="potm_title">Poet of the Month</h2>';
echo do_shortcode( '[video width="1920" height="1080" mp4="' . $potm_video_url . '" preload="auto" poster="' . $potm_video_poster . '"][/video]');
$potm_details .= sprintf('<div class="potm_name_label">Name: <span class="potm_name">%s</span><br>Location: <span class="potm_location">%s</span><hr></div>', $potm_name, $potm_location);
echo $potm_details;

// Now go do the form stuff
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
// Are we in the submit window?
if ( $date_now >= $form_open_date && $date_now <= $form_close_date ) {
    // on the right day - display form
    echo 'P.O.T.M. Submissions will continue to be accepted until ' . $submit_start_time_12 . ':' . $submit_duration . ' ' . $a_p . ' today.<br>';
    gravity_form( 3, true, false, false, '', true, 99, true );
} else {
    // Not time yet. If we passed submit window this month, increment month number to next month.
    if ( $date_now > $form_close_date) $today_month = date('m') + 1;
    echo '<center>P.O.T.M. Submissions will be accepted again on <strong>' . $today_month . '/' . $submit_start_day . '</strong> starting at ' . $submit_start_time_12 . ':00 ' . $a_p . ' for ' . $submit_duration . ' minutes.</center><br>';
    echo '<center>Thanks for your interest.</center>';
}

?>

        </div> <!-- End .potm-submission -->
    </div> <!-- End .widget-area -->
</div> <!-- End .wrap -->