<?php

/**
 * ThreeForty Media: Theme Boost Customizer Settings
 * This file was added in plugin version 1.1.0
 *
 * @package WordPress
 * @subpackage ThreeForty Media
 * @since 1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register customizer settings

function threeforty_theme_boost_customize_register( $wp_customize ) {

		// ========================================================
		// SEO
		// ========================================================

		$wp_customize->add_section( 'threeforty_performance_seo_settings', array(
			'title'    => esc_html__( '340 Media: SEO & Misc. Settings', 'threeforty-theme-boost' ),
			'priority' => 160,
			'description' => esc_html__( 'Use these settings to improve your site performace', 'threeforty-theme-boost' ),
		) );


		// Image quality
		$wp_customize->add_setting( 'threeforty_image_quality', array(
			'default'           => '82',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_image_quality', array(
			'label'       => esc_html__( 'Image Quality (%)', 'threeforty-theme-boost' ),
			'description' => esc_html__( 'Lower quality provides a smaller file size and faster loading pages. Remember to regenerate your thumbnails after changing this setting. WordPress default setting is "82"', 'threeforty-theme-boost' ),
			'section'     => 'threeforty_performance_seo_settings',
			'type'        => 'number',
			'input_attrs' => array(
			        'min'   => 0,
			        'max' => 100,
			        'step' => 1,
			    ),
		) );

		// ========================================================
		// Smash Balloon Instagram Settings
		// ========================================================

		/**
		 * Let theme handle styling for smash balloon plugin
		 * User must set padding to "0" and disable mobile layout in SBI settings
		 */

		if ( function_exists('sb_instagram_feed_init') ) :

			// Image quality
			$wp_customize->add_setting( 'threeforty_sbi_theme_style', array(
				'default'           => false,
				'sanitize_callback' => 'threeforty_sanitize_checkbox',
			) );

			$wp_customize->add_control( 'threeforty_sbi_theme_style', array(
				'label'       => esc_html__( 'SB-Instagram-Feed Match Theme Styling', 'threeforty-theme-boost' ),
				'description' => esc_html__( 'If enabled, set SB Instagram padding to "0" and disable mobile layout' ),
				'section'     => 'threeforty_performance_seo_settings',
				'type'        => 'checkbox',
			) );

		endif;

}

add_action( 'customize_register', 'threeforty_theme_boost_customize_register', 100 );


// ========================================================
// Sanitize Checkbox
// ========================================================
/**
* @param $input
* @return bool
*/

if ( ! function_exists( 'threeforty_sanitize_checkbox' ) ) {

	function threeforty_sanitize_checkbox( $input ) {

			return ( $input === true ) ? true : false;

	}

}


?>