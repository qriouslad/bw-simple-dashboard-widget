<?php
/**
 * Plugin Name:       Simple Dashboard Widget
 * Plugin URI:        https://github.com/qriouslad/bw-simple-dashboard-widget
 * Description:       Display a simple dashboard widget
 * Version:           1.3
 * Author:            Bowo
 * Author URI:        https://bowo.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bw-simple-dashboard-widget
 * Domain Path:       /languages
 */

namespace bw\dashmsg;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class My_Dashboard
{

	public function __construct() {

		// Add the dashboard widget function to a hook 
		add_action( 'wp_dashboard_setup', array( $this, 'bw_dashboard_widgets' ) );

	}

	/**
	 * Output the welcome message
	 */

	function bw_dashboard_message() {
		echo '<p>Welcome to your plugin!</p>';
	}

	/**
	 * Add a dashboard widget that calls the function displaying te welcome message
	 */

	public function bw_dashboard_widgets() {
	wp_add_dashboard_widget( 'personal_welcome_widget', 'Personal Welcome', array( $this, 'bw_dashboard_message' ) );
	}

}

$start = new My_Dashboard();