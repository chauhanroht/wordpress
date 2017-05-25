<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Eleven_Rc
 * @subpackage Eleven_Rc/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Eleven_Rc
 * @subpackage Eleven_Rc/admin
 * @author     Rohit <rohit.vinove.com>
 */
class Eleven_Rc_Admin {

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'eleven_rc';

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
		 * defined in Eleven_Rc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eleven_Rc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/eleven-rc-admin.css', array(), $this->version, 'all' );

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
		 * defined in Eleven_Rc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eleven_Rc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eleven-rc-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Eleven Settings', 'eleven-rc' ),
			__( 'Eleven', 'eleven-rc' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

	 /*Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
	
		include_once 'partials/eleven-rc-admin-display.php';
	
	}


	public function register_setting(){

		// Add a General section
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'eleven-rc' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);

		add_settings_field(
			$this->option_name . '_position',
			__( 'Text position', 'eleven-rc' ),
			array( $this, $this->option_name . '_position_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_position' )
		);

		add_settings_field(
			$this->option_name . '_day',
			__( 'Post is outdated after', 'eleven-rc' ),
			array( $this, $this->option_name . '_day_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_day' )
		);

		register_setting( $this->plugin_name, $this->option_name . '_position', array( $this, $this->option_name . '_sanitize_position' ) );

		register_setting( $this->plugin_name, $this->option_name . '_day', 'intval' );

	}

	
	
	/**
	 * Sanitize the text position value before being saved to database
	 *
	 * @param  string $position $_POST value
	 * @since  1.0.0
	 * @return string           Sanitized value
	 */
	public function eleven_rc_sanitize_position( $position ) {

		if ( in_array( $position, array( 'before', 'after' ), true ) ) {
	        return $position;
	    }
	}


	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function eleven_rc_general_cb() {

		//var_dump(get_option( $this->option_name . '_position' ));
		//var_dump(get_option( $this->option_name . '_day' ));

		echo '<p>' . __( 'Please change the settings accordingly.', 'eleven-rc' ) . '</p>';
	}

	/*
	 * Render the radio input field for position option
	 *
	 * @since  1.0.0
	 */
	public function eleven_rc_position_cb() {
		
		$position = get_option( $this->option_name . '_position' );
		
		?>
			<fieldset>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_position' ?>" id="<?php echo $this->option_name . '_position' ?>" value="before" <?php checked( $position, 'before' ); ?>>
					<?php _e( 'Before the content', 'eleven_rc' ); ?>
				</label>
				<br>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_position' ?>" value="after" <?php checked( $position, 'after' ); ?>>
					<?php _e( 'After the content', 'eleven_rc' ); ?>
				</label>
			</fieldset>
		<?php
	}
	/**
	 * Render the treshold day input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function eleven_rc_day_cb() {

		$day = get_option( $this->option_name . '_day' );

		echo '<input type="text" name="' . $this->option_name . '_day' . '" id="' . $this->option_name . '_day' . '" value="' . $day . '"> ' . __( 'days', 'eleven_rc' );
	}


}
