<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/aryanbokde
 * @since      1.0.0
 *
 * @package    Ast_Weather
 * @subpackage Ast_Weather/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ast_Weather
 * @subpackage Ast_Weather/admin
 * @author     Rakesh <aryanbokde@gmail.com>
 */
class Ast_Weather_Admin {

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
		 * defined in Ast_Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ast_Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ast-weather-admin.css', array(), $this->version, 'all' );

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
		 * defined in Ast_Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ast_Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ast-weather-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function ast_weather_admin_menu() {

		add_submenu_page(
	        'tools.php',
	        __('Ast-Weather', 'textdomain'),
	        __('Ast Weather', 'textdomain'),
	        'manage_options',
	        'ast-weather',
	        array($this, "get_ast_weather_api_config"),
	    );

	}

	public function get_ast_weather_api_config()
	{

	    ob_start();
	    include_once(AST_WEATHER_PLUGIN_PATH . 'admin/partials/api-config-setting.php');
	    $template = ob_get_contents();
	    ob_clean();
	    echo $template;
	}

}
