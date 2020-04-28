<?php

/**
Plugin Name: 340 Media: Featured Posts
Plugin URI:  http://www.3forty.media
Description: Promote your favourite posts with this configurable featured posts display plugin
Version:     1.1.6
Author:      3FortyMedia
Author URI:  http://www.3forty.media
Text Domain: threeforty-featured-posts
Domain Path: /languages/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function threeforty_featured_posts_init() {
	// load language files.
	load_plugin_textdomain( 'threeforty-featured-posts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'threeforty_featured_posts_init' );

define( 'THREEFORTY_FEATURED_POSTS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

global $post_ids;

// Include customizer settings
include( THREEFORTY_FEATURED_POSTS__PLUGIN_DIR . 'inc/customizer.php' );

// Category after header
function threeforty_category_featured( ) {

		if ( locate_template( 'template-parts/threeforty-plugin-parts/featured-posts/category-featured.php', false ) ) {
			locate_template( 'template-parts/threeforty-plugin-parts/featured-posts/category-featured.php', true);
		} else {
			include( THREEFORTY_FEATURED_POSTS__PLUGIN_DIR . 'plugin-parts/category-featured.php' );
		}

}
add_action('threeforty_after_header', 'threeforty_category_featured', 10 );

// Home after header (after hero)
function threeforty_home_featured( ) {

		if ( locate_template( 'template-parts/threeforty-plugin-parts/featured-posts/home-featured.php', false ) ) {
			locate_template( 'template-parts/threeforty-plugin-parts/featured-posts/home-featured.php', true);
		} else {
			include( THREEFORTY_FEATURED_POSTS__PLUGIN_DIR . 'plugin-parts/home-featured.php' );
		}

}
add_action('threeforty_after_header', 'threeforty_home_featured', 30 );

/**
* Custom Posts
* This function requires activation within the theme
*/
function threeforty_custom_posts() {

	if ( locate_template( 'template-parts/threeforty-plugin-parts/featured-posts/custom-posts.php', false ) ) {
			locate_template( 'template-parts/threeforty-plugin-parts/featured-posts/custom-posts.php', true);
		} else {
			include( THREEFORTY_FEATURED_POSTS__PLUGIN_DIR . 'plugin-parts/custom-posts.php' );
		}

}

// ========================================================
// Add class to body tag
// ========================================================

function threeforty_featured_posts_class( $classes ) {

	$category = get_queried_object();

	if ( is_home() && get_theme_mod( 'threeforty_home_featured', true ) ) {
		$classes[] = 'has-featured-posts';
	}
	if ( is_home() && get_theme_mod( 'threeforty_home_featured', true ) && '' !== get_theme_mod( 'threeforty_home_featured_background', '' ) ) {
		$classes[] = 'has-featured-posts-background';
	}
	if ( is_category() && get_theme_mod( 'threeforty_category_featured', true ) && get_transient( 'threeforty_category_' . $category->term_id . '_featured' ) ) {
		$classes[] = 'has-category-featured';
	}
	if ( is_category() && get_theme_mod( 'threeforty_category_featured', true ) && '' !== get_theme_mod( 'threeforty_category_featured_background', '' ) && get_transient( 'threeforty_category_' . $category->term_id . '_featured' ) ) {
		$classes[] = 'has-category-featured-background';
	}
	if ( get_theme_mod( 'threeforty_custom_posts', false ) ) {
		$classes[] = 'has-custom-posts';
	}
	return $classes;
}
add_filter( 'body_class', 'threeforty_featured_posts_class' );

// ========================================================
// Admin function Add Featured Post META Box
// ========================================================

function threeforty_featured_post_meta() {

	add_meta_box(
		'threeforty_featured_post_meta_box',
		esc_html__( '340: Featured Post', 'threeforty-featured-posts' ),
		'threeforty_featured_post_callback',
		'post',
		'side',
		'low'
		);

}

add_action( 'add_meta_boxes', 'threeforty_featured_post_meta' );

// Callback
function threeforty_featured_post_callback( $post ) {

	wp_nonce_field(basename( __FILE__ ), 'threeforty_featured_post_meta_nonce' );

		$value = get_post_meta( $post->ID, 'threeforty_featured_post', true );

		echo '<p class="howto">Featured posts are used in archive (category) custom post displays</p>';

		echo '<label for="threeforty_featured_post">';
		if ($value == '') {
			echo ' <input id="threeforty_featured_post" name="threeforty_featured_post" type="checkbox" class="checkbox">';
		} else {
			echo ' <input id="threeforty_featured_post" name="threeforty_featured_post" type="checkbox" class="checkbox" checked="checked">';
		}
		echo esc_html__( 'Featured Post', 'threeforty-featured-posts' );
		echo '</label>';

}

// Save
function threeforty_save_featured_post_data( $post_id ) {

	// Return if meta-box doesnt exist
	if ( ! isset( $_POST['threeforty_featured_post_meta_nonce'] ) ) {
		return;
	}
	// Return if nonce is not valid
	if ( ! wp_verify_nonce( $_POST['threeforty_featured_post_meta_nonce'], basename( __FILE__ ))) {
		return;
	}
	// Return if doing and autosave
	if ( defined( 'DOING_AUTOAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Return if user does not have permisson
	if ( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	$featured_checkbox = '';

	if (isset($_POST['threeforty_featured_post']))
    {
        $featured_checkbox = 1;
    } 

	update_post_meta( $post_id, 'threeforty_featured_post', $featured_checkbox );
}

add_action( 'save_post', 'threeforty_save_featured_post_data' );

// ========================================================
// Set category featured transient (add_action hooks)
// ========================================================

function threeforty_category_featured_set_transient( ) {

	if ( get_theme_mod( 'threeforty_category_featured', true ) ) {

		$categories = get_categories('type=post');

		foreach( $categories as $category ) {
		    
		    // Run the query

		    $query_args = array(
			    'post_type'      => 'post',
			    'posts_per_page' => get_theme_mod( 'threeforty_category_featured_num', 3 ),
			    'cat' => $category->term_id,
			    'meta_key' => 'threeforty_featured_post', // Featured Posts
				'meta_value' => 1,
				// Only show posts with a featured image
    			'meta_query' => array(array('key' => '_thumbnail_id')),

			);

			$posts_query = new WP_Query( $query_args );

			if( $posts_query->have_posts( ) )  {
				$post_ids = wp_list_pluck( $posts_query->posts, 'ID' );
				// Save the results in a transient for 24 hours (always set NEW transient after post or customizer update)
				set_transient( 'threeforty_category_' . $category->term_id . '_featured', $posts_query, 24 * HOUR_IN_SECONDS );
				if ( get_theme_mod( 'threeforty_category_featured_exclude_duplicate', false ) ) {
					set_transient( 'threeforty_category_' . $category->term_id . '_featured_exclude_ids', $post_ids, 24 * HOUR_IN_SECONDS );
				}

			} else {
				delete_transient( 'threeforty_category_' . $category->term_id . '_featured' );
			}

		}

	}

}

add_action( 'save_post', 'threeforty_category_featured_set_transient', 20 );
add_action( 'customize_save_after', 'threeforty_category_featured_set_transient', 20 );

// ========================================================
// Exclude Posts from category/archive loop
// ========================================================

function threeforty_exclude_category_featured_posts( $query ) {

	if ( is_category() ) {

		$category = get_queried_object();

		$exclude_ids = get_transient( 'threeforty_category_' . $category->term_id . '_featured_exclude_ids' );

	}

	/**
	 * Is archive
	 * Is Main Query
	 * Is TRUE remove posts
	 */

    if ( $query->is_category() && $query->is_main_query() && get_theme_mod( 'threeforty_category_featured', true ) && get_theme_mod( 'threeforty_category_featured_exclude_duplicate', false ) ) {
        $query->set( 'post__not_in', $exclude_ids );
    }
}

add_action( 'pre_get_posts', 'threeforty_exclude_category_featured_posts' );



?>