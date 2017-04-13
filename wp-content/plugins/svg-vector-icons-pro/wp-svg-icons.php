<?php
/**
 * @link              http://www.evan-herman.com/wp-svg-icons-pro/
 * @since             3.0.0
 * @package           WP_SVG_Icons
 *
 * @wordpress-plugin
 * Plugin Name:       WP SVG Icons Pro
 * Plugin URI:        http://www.evan-herman.com/wp-svg-icons-pro/
 * Description:    WP SVG Icons Pro will enable 490+ SVG icons available for use on the front end and/or dashboard of your site. This is the pro version, which contains an icon custimzer and an easy to use menu to easily add icons to any of your menus without writing code.
 * Version:           1.2.7
 * Author:            EH Dev Shop, Evan Herman
 * Author URI:        https://evan-herman.com
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       wp-svg-icons
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-svg-icons-activator.php
 */
function activate_wp_svg_icons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-svg-icons-activator.php';
	WP_SVG_Icons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-svg-icons-deactivator.php
 */
function deactivate_wp_svg_icons() { 
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-svg-icons-deactivator.php';
	WP_SVG_Icons_Deactivator::deactivate(); 
}  
 
/** 
 * The code that runs during plugin uninstall.
 * This action is documented in includes/class-wp-svg-icons-uninstall.php
 */
function uninstall_wp_svg_icons() { 
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-svg-icons-uninstall.php';
	WP_SVG_Icons_Uninstall::uninstall();
}
	
register_activation_hook( __FILE__, 'activate_wp_svg_icons' );
register_deactivation_hook( __FILE__, 'deactivate_wp_svg_icons' );
register_uninstall_hook( __FILE__ ,	'uninstall_wp_svg_icons' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-svg-icons.php';
		
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    3.0.0
 */
function run_wp_svg_icons() {
	$plugin = new WP_SVG_Icons();
	$plugin->run();
}
run_wp_svg_icons();

/*
* If the user hasn't entered their license key
* Redirect them to the support page and remind them...
* @since v1.1.3 pro
*/
function activate_wp_svg_pro_check_for_license( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
		$license 	= get_option( 'wp_svg_icons_license_key' , '' );
		if( empty( $license ) ) {
			// redirect the user to the license page
			exit( wp_redirect( admin_url( 'admin.php?page=wp-svg-icons-support' ) , '301' ) );
		}
    }
}
add_action( 'activated_plugin', 'activate_wp_svg_pro_check_for_license' );


/**
 * Add a link to our additional plugins in /wp-admin/plugins.php
 * 
 * @param  array $plugin_meta
 * @param  string $plugin_file
 * @return array
*/
function extra_plugin_data( $plugin_meta, $plugin_file ) {
	if ( plugin_basename( __FILE__ ) == $plugin_file )
		$plugin_meta[] = sprintf(
			'&hearts; <a href="%s" target="_blank">%s</a>',
			'http://www.evan-herman.com/wordpress/plugins/',
			__( 'Other Plugins', 'wp-svg-icons' )
	);
	return $plugin_meta;
}
// Some Plugin love
add_filter( 'plugin_row_meta', 'extra_plugin_data', 10, 2 );


/**
 * Cross check if a new version exists
 *
 * @since    3.0.0
 */
function wp_svg_icons_plugin_updater() {
	// include our EDD uploader class
	if( ! class_exists( 'EDD_SL_Plugin_Updater' ) ) {
		// load our custom updater
		include( dirname( __FILE__ ) . '/admin/EDD_SL_Plugin_Updater.php' );
	}
	// retrieve our license key from the DB
	$license_key = trim( get_option( 'wp_svg_icons_license_key' ) );
		// setup the updater
	$edd_updater = new EDD_SL_Plugin_Updater( 'https://www.evan-herman.com', __FILE__ , array( 
			'version' 	=> '1.2.7', 				// current version number
			'license' 	=> $license_key, 		// license key (used get_option above to retrieve from DB)
			'item_name' => 'WP SVG Icons', 	// name of this plugin
			'author' 	=> 'Evan Herman'  // author of this plugin
		)
	);
}
// add our updater class
add_action( 'admin_init' , 'wp_svg_icons_plugin_updater', 0 );