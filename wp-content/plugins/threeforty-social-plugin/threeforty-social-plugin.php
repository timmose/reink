<?php

/**
Plugin Name: 340 Media: Social Plugin
Plugin URI:  http://www.3forty.media
Description: Display links and icons to your social media channels in widgets and theme files and share content to social media channels.
Version:     1.1.4
Author:      3FortyMedia
Author URI:  http://www.3forty.media
Text Domain: threeforty-social-plugin
Domain Path: /languages/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function threeforty_social_plugin_init() {
	// load language files.
	load_plugin_textdomain( 'threeforty-social-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'threeforty_social_plugin_init' );

define( 'THREEFORTY_SOCIAL_WIDGET__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include customizer settings
include( THREEFORTY_SOCIAL_WIDGET__PLUGIN_DIR . 'inc/customizer.php' );

// Include the widget
include( THREEFORTY_SOCIAL_WIDGET__PLUGIN_DIR . 'inc/widget.php' );

/**
 * This function requires either add_action() in theme functions
 * OR copy this function name wherever you want it displayed
 */
function threeforty_share_content( ) {

		include( THREEFORTY_SOCIAL_WIDGET__PLUGIN_DIR . 'plugin-parts/share.php' );

}

// ========================================================
// Add social media channel author contact methods
// ========================================================

function threeforty_social_contact_methods( $method ) {

	// Add new fields
	$method['threeforty_author_meta_twitter'] = esc_html__( 'Twitter Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_facebook'] = esc_html__( 'Facebook Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_instagram'] = esc_html__( 'Instagram Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_youtube'] = esc_html__( 'YouTube Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_tumblr'] = esc_html__( 'Tumblr Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_pinterest'] = esc_html__( 'Pinterest Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_dribbble'] = esc_html__( 'Dribbble Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_linkedin'] = esc_html__( 'Linkedin Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_soundcloud'] = esc_html__( 'Soundcloud Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_spotify'] = esc_html__( 'Spotify Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_medium'] = esc_html__( 'Medium Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_500px'] = esc_html__( '500px Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_vimeo'] = esc_html__( 'Vimeo Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_vkontakte'] = esc_html__( 'VK Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_mixcloud'] = esc_html__( 'Mixcloud Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_gab'] = esc_html__( 'Gab Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_minds'] = esc_html__( 'Minds Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_bitchute'] = esc_html__( 'Bitchute Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_steemit'] = esc_html__( 'Steemit Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_tiktok'] = esc_html__( 'TikTok Full URL', 'threeforty-social-plugin' );
	$method['threeforty_author_meta_odnoklassniki'] = esc_html__( 'Odnoklassniki Full URL', 'threeforty-social-plugin' );


	return $method;
}

add_filter('user_contactmethods', 'threeforty_social_contact_methods');

// ========================================================
// Display Author Social Meta
// ========================================================

/**
 * add function name wherever it is required
 * add 'icons' to the funciton variable withhin the theme to use icons rather than text
 * threeforty_author_social_meta( 'icons' );
 */
function threeforty_author_social_meta( $style = '', $color_scheme = '' ) {

	include( THREEFORTY_SOCIAL_WIDGET__PLUGIN_DIR . 'plugin-parts/author-social-meta.php' );

}

// ========================================================
// Generate the owner social media links and icons
// See threeforty_get_social_sites in customizer.php
// ========================================================

if ( ! function_exists( 'threeforty_social_media_icons' ) ) {

	function threeforty_social_media_icons( $show_text = false, $color_scheme = '' ) {

		  $social_sites = threeforty_get_social_sites( ); // See inc/customizer.php

	     // Any inputs that aren't empty are stored in $active_sites array
	     foreach( $social_sites as $social_site ) {
	         if ( strlen( get_theme_mod( $social_site ) ) > 0 )  {

	             $active_sites[] = $social_site;
	         }
	     }
	     // For each active social site create the link and icon
	     if ( ! empty( $active_sites ) ) {

	         	$link_class = ( true === $show_text ? ' text-icon' : ' icon-background' );

	     	echo '<ul class="social-icons' . esc_attr( $link_class . ' ' . $color_scheme ) . '">';

	         foreach ( $active_sites as $active_site ) {

	         	// Remove threeforty_social_site_ from string
	         	$site_name = str_replace('threeforty_social_site_', '', $active_site );

	         	$text = ( true === $show_text ? $site_name : '' );

	         	// TikTok
	         	if ( $text === 'tiktok' ) {
	         		$text = 'TikTok';
	         	}

	         	$class = ( $site_name === '500px' ? 'px500' : $site_name );

	         	$icon = $site_name;

	         	// Rename icons to match fontello css

	         	if ( $icon === 'google-plus' ) {
	         		$icon = 'gplus';
	         	}
	         	if ( $icon === 'github') {
	         		$icon = 'git';
	         	}
	         	if ( $icon === 'reddit' ) {
	         		$icon = 'reddit-alien';
	         	}
	         	if ( $icon === 'email' ) {
	         		$icon = 'mail-alt';
	         	}

	             echo '<li class="social-icon ' . strtolower( esc_attr( $class ) ) . '"><a href="' . esc_url( get_theme_mod( $active_site ) ) . '" class="' . strtolower( esc_attr( $class ) ) . '" target="_blank">';
	             echo '<span><i class="icon-' . esc_attr( $icon ) . '"></i></span>' . esc_attr( $text ) . '';
	             echo '</a></li>';
	             }

	             echo '</ul>';

	     }

	}

}

?>