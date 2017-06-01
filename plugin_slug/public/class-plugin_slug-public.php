<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       author_uri
 * @since      1.0.0
 *
 * @package    Plugin_slug
 * @subpackage Plugin_slug/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_slug
 * @subpackage Plugin_slug/public
 * @author     author_name <author_email@gmail.com>
 */
class Plugin_slug_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_slug_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_slug_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin_slug-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_slug_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_slug_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin_slug-public.js', array( 'jquery' ), $this->version, false );

	}


	public function plugin_slug_test(){

		//include_once 'partials/plugin_slug-public-display2.php';
    			
	}

	public function shortcode_test($atts, $content = ""){
        
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
        $employees = $wpdb->get_results("SELECT * from $table_name");

        include_once 'partials/plugin_slug-public-display.php'; //return 'blabla';
    
    }

}
