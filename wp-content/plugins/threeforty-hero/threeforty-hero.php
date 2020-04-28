<?php

/**
Plugin Name: 340 Media: Hero
Plugin URI:  http://www.3forty.media
Description: Displays Hero content (posts) in a choice of styles and layouts
Version:     1.2.9
Author:      3FortyMedia
Author URI:  http://www.3forty.media
Text Domain: threeforty-hero
Domain Path: /languages/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function threeforty_hero_init() {
	// load language files.
	load_plugin_textdomain( 'threeforty-hero', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'threeforty_hero_init' );

define( 'THREEFORTY_HERO__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// ========================================================
// Hero after header hook
// ========================================================

function threeforty_hero( ) {

		include( THREEFORTY_HERO__PLUGIN_DIR . 'plugin-parts/hero.php' );

}
// After header hook
add_action('threeforty_after_header', 'threeforty_hero', 10 );

// ========================================================
// Enqueue assets
// ========================================================

function threeforty_hero_scripts() {

	// slider active var
	$slider_active = ( get_theme_mod( 'threeforty_hero_layout', 'grid' ) === 'slider' ? true : false );

	/**
	 * Check plugin filters for grid layout theme support
	 * If theme does not support grid layout, set slider default to true
	 * and activate the slider based on the number of posts below
	 */
	if ( false === apply_filters( 'threeforty_hero_theme_supports_grid', true ) ) {
		$slider_active = true;
	}

	// Enqueue parallax if active
	if ( is_front_page() && ! is_paged() && get_theme_mod( 'threeforty_hero_parallax', false ) ) {
		wp_enqueue_script( 'parallax-min', plugin_dir_url( __FILE__ ) . 'js/parallax.min.js', array( 'jquery' ), '1.0.0', false );
	}
	// Enqueue slick assets
	if ( is_front_page() && ! is_paged() && ! get_theme_mod( 'threeforty_hero_parallax', false ) && get_theme_mod( 'threeforty_hero_post_num', 1 ) > 1 && get_theme_mod( 'threeforty_hero', true ) && $slider_active ) {
		wp_enqueue_style('slick', plugin_dir_url( __FILE__ ) . 'slick/slick.css', array(), '1.0.0', 'all');
		wp_enqueue_script( 'slick', plugin_dir_url( __FILE__ ) . 'slick/slick.min.js', array( 'jquery' ), '1.0.0', true);
		if ( wp_script_is( 'slick-inline', 'enqueued' ) ) {
			// Theme inline JS is loaded
			return;
		} else {		
			wp_enqueue_script( 'hero', plugin_dir_url( __FILE__ ) . 'js/hero.js', array( 'jquery' ), '1.0.0', true);
		}
	}

}
add_action( 'wp_enqueue_scripts', 'threeforty_hero_scripts', 100 );

// ========================================================
// Add class to body tag
// ========================================================

function threeforty_hero_class( $classes ) {

	if ( is_front_page() && ! is_paged() && get_theme_mod( 'threeforty_hero', true ) ) {
		$classes[] = 'has-hero';
	}
	return $classes;
}
add_filter( 'body_class', 'threeforty_hero_class' );

// ========================================================
// Set Hero transient after update
// ========================================================

function threeforty_hero_set_transient( ) {

	if ( get_theme_mod( 'threeforty_hero', true ) ) {

	// Set our default variables
	//  Number of posts
	$post_num = get_theme_mod( 'threeforty_hero_post_num', 1 );
	// Post Offset
	$post_offset = get_theme_mod( 'threeforty_hero_post_offset', 0 );
	// Post type
	$post_type = get_theme_mod( 'threeforty_hero_post_type', 'recent' );
	// Post Category
	$post_cat = get_theme_mod( 'threeforty_hero_post_cat', '' );

	// Override some variables
	if ( get_theme_mod( 'threeforty_hero_parallax', false ) ) {
		$post_num = 1;
	}
	if ( get_theme_mod( 'threeforty_hero_layout', 'grid' ) === 'grid' && $post_num > 3 ) {
		$post_num = 3;
	}

	// Featured posts
	$meta_key = ( $post_type === 'featured' ? 'threeforty_featured_post' : '' );
	// Specific posts
	$post_in = ( $post_type === 'post_ids' && '' !== get_theme_mod( 'threeforty_hero_post_ids' ) ? get_theme_mod( 'threeforty_hero_post_ids', '' ) : '' );
	// Popular posts
	$order_by = ( $post_type === 'popular' ? 'comment_count' : '' );
	// Exclude Post ID's
	$post_not_in = ( $post_type !== 'post_ids' && '' !== get_theme_mod( 'threeforty_hero_exclude_post_ids', '' ) ? get_theme_mod( 'threeforty_hero_exclude_post_ids', '' ) : '' );
	if ( '' !== $post_not_in ) {
		$post_not_in = explode(',', $post_not_in );
	}

	// The query

	if ( '' !== $post_in ) {

			// Specific posts create an array
			$post_in = explode(',', $post_in );

			$query_args = array(
			    'posts_per_page' => $post_num,
			    'post__in' => $post_in,
			    'ignore_sticky_posts' => 1,
			    'orderby' => 'post__in',
			    // Only show posts with a featured image
    			'meta_query' => array(array('key' => '_thumbnail_id')),
			);

		} else {

			$query_args = array(
			    'posts_per_page' => $post_num,
			    'offset' => $post_offset, // Offset
				'cat' => $post_cat, // If we are diplaying posts from a category
			    'ignore_sticky_posts' => 1,
			    'orderby' => $order_by, // If we are displaying popular posts
			    'post__not_in' => $post_not_in,
			    // Only show posts with a featured image
    			'meta_query' => array(array('key' => '_thumbnail_id')),
				'post_status' => array(      
					'publish',          // A published post or page.
					),
			);

		}

	$posts_query = new WP_Query( $query_args );
	// Save the results in a transient for 24 hours (always set NEW transient after post or customizer update)
	set_transient( 'threeforty_hero', $posts_query, 24 * HOUR_IN_SECONDS );

		}

}

add_action( 'save_post', 'threeforty_hero_set_transient', 30 );
add_action( 'customize_save_after', 'threeforty_hero_set_transient', 30 );

// ========================================================
// Customizer settings
// ========================================================
include( THREEFORTY_HERO__PLUGIN_DIR . 'inc/customizer.php' );

?>