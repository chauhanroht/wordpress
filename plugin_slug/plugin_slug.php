<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              author_uri
 * @since             1.0.0
 * @package           Plugin_slug
 *
 * @wordpress-plugin
 * Plugin Name:       plugin_slug
 * Plugin URI:        google.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            author_name
 * Author URI:        author_uri
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin_slug
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin_slug-activator.php
 */
function activate_plugin_slug() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin_slug-activator.php';
	Plugin_slug_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin_slug-deactivator.php
 */
function deactivate_plugin_slug() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin_slug-deactivator.php';
	Plugin_slug_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_slug' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_slug' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin_slug.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_slug() {

	$plugin = new Plugin_slug();
	$plugin->run();

}
// add_action('admin_menu', 'plugin_slug_setup_menu');
 
// function plugin_slug_setup_menu(){
        
//         #add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
//         add_options_page( 'plugin_slug', 'Plugin Slug', 'manage_options', 'plugin-slug', 'plugin_slug_init');
        
// }
 
// function plugin_slug_init(){

//         echo "<div class='wrap'><h2>Plugin slug!</h2></div>";
// }

/*Render the options page for plugin
 *
 * @since  1.0.0
 */
// function plugin_slug_init() {

// 	include_once 'admin/partials/plugin_slug-admin-display.php';

// }

// add_action('admin_menu', 'at_alphansotech_menu');
 
// function at_alphansotech_menu() {
    
//     add_options_page('employee_list', //page title
//             'Employee Listing', //menu title
//             'manage_options', //capabilities
//             'Employee Listing', //menu slug
//             employee_list //function
//     );

// }
/*
function employee_list() {
    ?>
    <style>
        table {
            border-collapse: collapse;
 
 
        }
 
        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>status</th>
                </tr>
            </thead>
            <?php
                global $wpdb;
                $table_name = $wpdb->prefix . 'users';
                $employees = $wpdb->get_results("SELECT * from $table_name");
                foreach ($employees as $employee) {
                    ?>
                    <tr>
                        <td><?= $employee->ID; ?></td>
                        <td><?= $employee->user_nicename; ?></td>
                        <td><?= $employee->user_email; ?></td>
                        <td><?= $employee->user_status; ?></td>
                    </tr>
                <?php } ?>
        </table>
    </div>
    <?php
 
}

add_shortcode('short_employee_list', 'employee_list');
*/
run_plugin_slug();
