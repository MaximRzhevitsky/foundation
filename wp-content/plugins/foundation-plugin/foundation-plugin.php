<?php
/**
 * Plugin Name: foundation-plugin
 * Description: plugin for elementor.
 * Plugin URI:  https://max-plugin-elementor.com/
 * Version:     1.0.0
 * Author:      Max Developer
 * Author URI:  https://max-developer.com/
 * Text Domain: foundation-plugin
 *
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function foundation_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	Foundation_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'foundation_addon' );




// Register new category of widgets.
function add_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'foundation',
		[
			'title' => esc_html__( 'foundation', 'foundation-plugin' ),
			'icon' => 'fa fa-plug',
		]
	);
}
	add_action( 'elementor/elements/categories_registered', 'add_widget_categories' );

