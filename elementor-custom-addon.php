<?php
/**
 * Plugin name: Elementor Addon for building custom Elementor Widgets
 * Description: Container for building project based custom Elementor Widgets
 * Plugin URI: 	https://kuckmal-gmbh.ch
 * Version: 	1.0.0
 * Author: 		Michael Kuck
 * Author URL: 	https://kuckmal-gmbh.ch
 * Text Domain: elementor-custom-addon
 * 
 * Elementor tested up to: 3.10.0
 * Elementor Pro tested up to: 3.10.0
 */

if ( ! defined('ABSPATH') ) {
	exit; // Exit if accessed directly
}

function elementor_custom_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Elementor_Custom_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'elementor_custom_addon' );