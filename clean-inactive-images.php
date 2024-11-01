<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://idx.is
 * @since             1.0.0
 * @package           Clean_Inactive_Images
 *
 * @wordpress-plugin
 * Plugin Name:       Clean Inactive Images
 * Plugin URI:        http://idx.is
 * Description:       Removes inactive (unused) images from uploads folder / media gallery.
 * Version:           1.2.4
 * Author:            Bruno Rodrigues
 * Author URI:        http://idx.is
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       clean-inactive-images
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-clean-inactive-images-activator.php
 */
function activate_clean_inactive_images() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-clean-inactive-images-activator.php';
	Clean_Inactive_Images_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-clean-inactive-images-deactivator.php
 */
function deactivate_clean_inactive_images() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-clean-inactive-images-deactivator.php';
	Clean_Inactive_Images_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_clean_inactive_images' );
register_deactivation_hook( __FILE__, 'deactivate_clean_inactive_images' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-clean-inactive-images.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_clean_inactive_images() {

	$plugin = new Clean_Inactive_Images();
	$plugin->run();

}

run_clean_inactive_images();
