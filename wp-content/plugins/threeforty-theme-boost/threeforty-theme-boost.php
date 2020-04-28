<?php

/**
Plugin Name: 340 Media: Theme Boost Pack
Plugin URI:  http://www.3forty.media
Description: A collection of essential plugins and widgets for your theme
Version:     1.1.0
Author:      3FortyMedia
Author URI:  http://www.3forty.media
Text Domain: threeforty-theme-boost
Domain Path: /languages/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function threeforty_theme_boost_init() {
	// load language files.
	load_plugin_textdomain( 'threeforty-theme-boost', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'threeforty_theme_boost_init' );

define( 'THREEFORTY_THEME_BOOST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include core functions
include( THREEFORTY_THEME_BOOST_PLUGIN_DIR . 'inc/customizer.php' );
include( THREEFORTY_THEME_BOOST_PLUGIN_DIR . 'inc/functions.php' );
include( THREEFORTY_THEME_BOOST_PLUGIN_DIR . 'inc/meta-boxes.php' );


?>