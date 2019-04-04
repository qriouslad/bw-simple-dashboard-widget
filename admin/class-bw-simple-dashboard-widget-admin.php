<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Bw_Simple_Dashboard_Widget
 * @subpackage Bw_Simple_Dashboard_Widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bw_Simple_Dashboard_Widget
 * @subpackage Bw_Simple_Dashboard_Widget/admin
 * @author     Bowo <hello@bowo.io>
 */
class Bw_Simple_Dashboard_Widget_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bw_Simple_Dashboard_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bw_Simple_Dashboard_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bw-simple-dashboard-widget-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bw_Simple_Dashboard_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bw_Simple_Dashboard_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bw-simple-dashboard-widget-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add settings as sub-menu of Settings menu
	 */

	public function bw_custom_dash_widget_page() {

		add_options_page( 
			'Custom Dashboard Widget Settings', 
			'Dashboard Widget', 
			'manage_options', 
			'cdw_settings', 
			array( $this, 'bw_cdw_settings_html' )
		);

	}

	/**
	 * Register settings section, options, fields
	 */

	public function bw_custom_dash_widget_settings() {

		register_setting( 'bw_cdw', 'bw_cdw_title' );
		register_setting( 'bw_cdw', 'bw_cdw_content' );

		// Add settings section
		add_settings_section( 
			'bw_cdw_settings_section', 
			'Custom Dashboard Widget', 
			array( $this, 'bw_cdw_settings_section_cb'), 
			'bw_cdw' 
		);

		// Add settings field for widget title
		add_settings_field(
			'cdw_field_title',
			'Widget Title',
			array( $this, 'bw_cdw_field_title_cb'),
			'bw_cdw',
			'bw_cdw_settings_section'
		);

		// Add settings field for widget content
		add_settings_field(
			'cdw_field_content',
			'Widget Content',
			array( $this, 'bw_cdw_field_content_cb'),
			'bw_cdw',
			'bw_cdw_settings_section'
		);

	}

	public function bw_cdw_settings_section_cb() {

		echo '<p>Input the title and content for the widget below.</p>';

	}

	public function bw_cdw_field_title_cb() {

		$title = get_option('bw_cdw_title');

		echo '<input type="text" name="bw_cdw_title" value="'.esc_attr( $title ).'">';
		
	}

	public function bw_cdw_field_content_cb() {
		
		$content = get_option('bw_cdw_content');

		$args = array(
			'wpautop' => false,
		    'textarea_rows' => 20,
		    // 'teeny' => true,
		    // 'quicktags' => false,
		);

		wp_editor( $content, 'bw_cdw_content', $args );

	}

	/**
	* Display options form for the settings section
	*/
	public function bw_cdw_settings_html() {

		// Check user capabilities
		if ( ! current_user_can( 'manage_options' ) ) {
		return;
		}

		include 'partials/bw-simple-dashboard-widget-admin-settings.php';

	}

	/**
	 * Add a dashboard widget that calls the function displaying te welcome message
	 */

	public function bw_custom_dash_widget() {

		$title = get_option('bw_cdw_title');
		
		wp_add_dashboard_widget( 'custom_dash_widget', $title, array( $this, 'bw_custom_dash_widget_content' ) );
	
	}


	/**
	 * Output the HTML message for the dashboard widget
	 */

	public function bw_custom_dash_widget_content() {
		
		include 'partials/bw-simple-dashboard-widget-admin-display.php';
	
	}

}
