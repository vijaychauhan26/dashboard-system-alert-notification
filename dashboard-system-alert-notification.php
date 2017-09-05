<?php
/*
 * Plugin Name: Dashboard System Alert Notification
 * Plugin URI: https://wordpress.org/plugins/dashboard-system-alert-notification/
 * Description: A Wordpress plugin that would provide a new feature, new alerts on the admin dashboard. it would help to user to understand what was missed or what is suggested by notification.
 * Author: Vijay Chauhan
 * Version: 1.1
 * Author URI: https://github.com/vpschauhan
 * @package dashboard-system-alert-notification
 * @version 1.1
*/

function dashboard_system_alert_notification_get_quote() {

	$quotes = array(
		"Lorem ipsum dummy, new notification by admin.",
		"Lorem ipsum dummy, 1.",
		"Lorem ipsum dummy, 2.",
		"Lorem ipsum dummy 3.",
		"Lorem ipsum dummy 4.",
		"Lorem ipsum dummy 5.",
		);

	$quotes = apply_filters( 'dashboard-system-alert-notification-quotes', $quotes );

	// And then randomly choose a quote
	return trim( wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] ) );
}

/* This just echoes the chosen quote, we'll position it later */
function dashboard_system_alert_notification() {
	$quote = apply_filters( 'dashboard-system-alert-notification-quote', dashboard_system_alert_notification_get_quote() );
	?>
		<p id="dashboard-system-alert-notification-quote"><?php echo esc_html( $quote ); ?></p>
	<?php
}

/* We need some CSS to position the paragraph */
function dashboard_system_alert_notification_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'right' : 'left';

	?>
	<style type="text/css">
		#dashboard-system-alert-notification-quote {
			float: <?php echo $x; ?>;
			padding-<?php echo $x; ?>: 15px;
			padding-top: 5px;		
			margin: 0;
			font-size: 14px;
			color: blue;
		}
	</style>
	<?php
}

/* Output the quote */
add_action( 'admin_notices', 'dashboard_system_alert_notification' );

/* Output the CSS */
add_action( 'admin_head', 'dashboard_system_alert_notification_css' );
