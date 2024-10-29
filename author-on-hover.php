<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://pluginic.com/
 * @since             1.0.0
 * @package           AOH_Author_On_Hover
 *
 * @wordpress-plugin
 * Plugin Name:       Author on Hover
 * Plugin URI:        https://pluginic.com/plugins/author-on-hover
 * Description:       The plugin will show author profile picture, author name, social links and custom bio on hover.
 * Version:           5.0.1
 * Author:            PLUGINIC
 * Author URI:        https://pluginic.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       author-on-hover
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
define( 'AOH_AUTHOR_ON_HOVER_VERSION', '5.0.1' );
define( 'AOH_DIR_URL_FILE', plugin_dir_url( __FILE__ ) );
define( 'AOH_DIR_PATH_FILE', plugin_dir_path( __FILE__ ) );
define( 'AOH_BASE_FILE', plugin_basename( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-author-on-hover-activator.php
 */
function activate_aoh_author_on_hover() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-author-on-hover-activator.php';
	AOH_Author_On_Hover_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-author-on-hover-deactivator.php
 */
function deactivate_aoh_author_on_hover() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-author-on-hover-deactivator.php';
	AOH_Author_On_Hover_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_aoh_author_on_hover' );
register_deactivation_hook( __FILE__, 'deactivate_aoh_author_on_hover' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-author-on-hover.php';

// AOH Framework.
require_once plugin_dir_path( __FILE__ ) . 'admin/aoh-framework/classes/setup.class.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/aoh-framework/options/aoh-admin-options.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/aoh-framework/options/aoh-profile-options.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/aoh-framework/options/aoh-metabox-options.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/aoh-framework/options/aoh-metabox-profile-card.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_aoh_author_on_hover() {

	$plugin = new AOH_Author_On_Hover();
	$plugin->run();

}
run_aoh_author_on_hover();
