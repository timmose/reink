<?php

/**
Plugin Name: 340 Media: Homepage Post Blocks
Plugin URI:  http://www.3forty.media
Description: Display up to six configurable post blocks on the homepage
Version:     1.0.6
Author:      3FortyMedia
Author URI:  http://www.3forty.media
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'THREEFORTY_POST_BLOCKS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include customizer settings
include( THREEFORTY_POST_BLOCKS__PLUGIN_DIR . 'inc/customizer.php' );

// Related Posts
function threeforty_home_blocks( ) {

		include( THREEFORTY_POST_BLOCKS__PLUGIN_DIR . 'plugin-parts/home-blocks.php' );

}

// Dequeue masonry if home bloacks is active
function threeforty_home_blocks_dequeue_masonry() {
	
	$theme = wp_get_theme();
	$theme_slug =  $theme->get( 'TextDomain' );

	if ( is_home() && get_theme_mod( 'threeforty_homepage_loop_type', 'default' ) === 'custom' ) {
		wp_dequeue_script( 'masonry' );
		wp_dequeue_script( '' . $theme_slug . '-masonry-init' );
	}
}
add_action( 'wp_print_scripts', 'threeforty_home_blocks_dequeue_masonry', 100 );

// ========================================================
// Add class to body tag
// ========================================================

function threeforty_home_blocks_class( $classes ) {

	if ( is_home() && get_theme_mod( 'threeforty_homepage_loop_type', 'default' ) === 'custom' ) {
		$classes[] = 'has-custom-post-blocks';
	}
	return $classes;
}
add_filter( 'body_class', 'threeforty_home_blocks_class' );


?>