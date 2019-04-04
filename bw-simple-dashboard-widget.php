<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bowo.io
 * @since             1.0.0
 * @package           Bw_Simple_Dashboard_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Dashboard Widget
 * Plugin URI:        https://github.com/qriouslad/bw-simple-dashboard-widget
 * GitHub Plugin URI: https://github.com/qriouslad/bw-simple-dashboard-widget
 * Description:       Display a simple dashboard widget showing static HTML content.
 * Version:           2.2
 * Author:            Bowo
 * Author URI:        https://bowo.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bw-simple-dashboard-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BW_SIMPLE_DASHBOARD_WIDGET_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bw-simple-dashboard-widget-activator.php
 */
function activate_bw_simple_dashboard_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bw-simple-dashboard-widget-activator.php';
	Bw_Simple_Dashboard_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bw-simple-dashboard-widget-deactivator.php
 */
function deactivate_bw_simple_dashboard_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bw-simple-dashboard-widget-deactivator.php';
	Bw_Simple_Dashboard_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bw_simple_dashboard_widget' );
register_deactivation_hook( __FILE__, 'deactivate_bw_simple_dashboard_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bw-simple-dashboard-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bw_simple_dashboard_widget() {

	$plugin = new Bw_Simple_Dashboard_Widget();
	$plugin->run();

}
run_bw_simple_dashboard_widget();
