<?php

/**
Plugin Name: 340 Media: Related Posts
Plugin URI:  http://www.3forty.media
Description: Configurable related post displays
Version:     1.1.3
Author:      3FortyMedia
Author URI:  http://www.3forty.media
Text Domain: threeforty-related-posts
Domain Path: /languages/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function threeforty_related_posts_init() {
	// load language files.
	load_plugin_textdomain( 'threeforty-related-posts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'threeforty_related_posts_init' );

define( 'THREEFORTY_RELATED_POSTS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

global $post_ids;

// Include customizer settings
include( THREEFORTY_RELATED_POSTS__PLUGIN_DIR . 'inc/customizer.php' );

// Related Posts
function threeforty_related_posts( ) {

		if ( locate_template( 'template-parts/threeforty-plugin-parts/related-posts/related-posts.php', false ) ) {
			locate_template( 'template-parts/threeforty-plugin-parts/related-posts/related-posts.php', true);
		} else {
			include( THREEFORTY_RELATED_POSTS__PLUGIN_DIR . 'plugin-parts/related-posts.php' );
		}

}
add_action( apply_filters( 'threeforty_related_posts_location', 'threeforty_before_comments' ), 'threeforty_related_posts' );
// ========================================================
// Add class to body tag
// ========================================================

function threeforty_related_posts_class( $classes ) {

	if ( is_single() && get_theme_mod( 'threeforty_related_posts', true ) ) {
		$classes[] = 'has-related-posts';
	}
	return $classes;
}
add_filter( 'body_class', 'threeforty_related_posts_class' );



?>