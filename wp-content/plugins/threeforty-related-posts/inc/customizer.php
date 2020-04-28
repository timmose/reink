<?php

/**
 * ThreeForty Media: Related Post Settings
 *
 * @package WordPress
 * @subpackage ThreeForty Media
 * @since 1.0
 * @version 1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register customizer settings

function threeforty_related_posts_customize_register( $wp_customize ) {

		// ========================================================
		// Related Posts
		// ========================================================

		$wp_customize->add_section( 'threeforty_related_posts_settings', array(
			'title'    => esc_html__( '340: Media: Related Posts', 'threeforty-related-posts' ),
			'priority' => 160,
		) );

		/**
		 * Display Posts
		 */
		$wp_customize->add_setting( 'threeforty_related_posts', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts', array(
			'label'       => esc_html__( 'Display Related Posts', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( 'threeforty_related_posts_title', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_related_posts_title', array(
			'label'       => esc_html__( 'Title', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'text',
		) );

		$wp_customize->add_setting( 'threeforty_related_posts_method', array(
			'default'           => 'tags',
			'sanitize_callback' => 'threeforty_sanitize_relate_method',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_method', array(
			'label'       => esc_html__( 'Relationship Method', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'select',
			'choices'     => array(
				'tags' => esc_html__( 'Tags', 'threeforty-related-posts' ),
				'category' => esc_html__( 'Category', 'threeforty-related-posts' ),
			),
		) );

		/**
		 * Number of Posts
		 */
		$wp_customize->add_setting( 'threeforty_related_posts_num', array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_num', array(
			'label'       => esc_html__( 'Number of posts', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_related_posts_max_posts', 3 ),
		    ),
		) );

		/**
		 * Number of columns
		 */
		$wp_customize->add_setting( 'threeforty_related_posts_cols', array(
			'default'           => apply_filters( 'threeforty_related_posts_max_cols', 3 ),
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_cols', array(
			'label'       => esc_html__( 'Number of columns', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_related_posts_max_cols', 3 ),
		    ),
		) );

		/**
		 * Loop style
		 */
		$wp_customize->add_setting( 'threeforty_related_posts_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'threeforty_sanitize_loop_style',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_style', array(
			'label'       => esc_html__( 'Post Style', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'threeforty-related-posts' ),
				'cover' => esc_html__( 'Cover', 'threeeforty' ), // Remove this with a filter if not required for a theme
			),
		) );

		$wp_customize->add_setting( 'threeforty_related_posts_image_size', array(
			'default'           => 'landscape',
			'sanitize_callback' => 'threeforty_sanitize_aspect_ratio',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_image_size', array(
			'label'       => esc_html__( 'Thumbnail Size', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'select',
			'choices'     => array(
				'landscape' => esc_html__( 'Landscape', 'threeforty-related-posts' ),
				'portrait' => esc_html__( 'Portrait', 'threeforty-related-posts' ),
				'square' => esc_html__( 'Square', 'threeforty-related-posts' ),
			),
		) );

		/**
		 * Entry title/meta
		 */

		$wp_customize->add_setting( 'threeforty_related_posts_excerpt', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_excerpt', array(
			'label'       => esc_html__( 'Excerpt', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Entry Title
		$wp_customize->add_setting( 'threeforty_related_posts_entry_title', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_entry_title', array(
			'label'       => esc_html__( 'Entry Title', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Author Meta
		$wp_customize->add_setting( 'threeforty_related_posts_entry_meta_by', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_entry_meta_by', array(
			'label'       => esc_html__( '"by"', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Author Meta
		$wp_customize->add_setting( 'threeforty_related_posts_entry_meta_author', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_entry_meta_author', array(
			'label'       => esc_html__( 'Author', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Author Avatar
		$wp_customize->add_setting( 'threeforty_related_posts_entry_meta_author_avatar', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_entry_meta_author_avatar', array(
			'label'       => esc_html__( 'Author Avatar', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Category Meta
		$wp_customize->add_setting( 'threeforty_related_posts_entry_meta_category', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_entry_meta_category', array(
			'label'       => esc_html__( 'Category', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		$wp_customize->add_setting( 'threeforty_related_posts_entry_meta_date', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_entry_meta_date', array(
			'label'       => esc_html__( 'Date', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		if ( function_exists( 'threeforty_read_time' ) ) :
			$wp_customize->add_setting( 'threeforty_related_posts_entry_meta_read_time', array(
				'default'           => true,
				'sanitize_callback' => 'threeforty_sanitize_checkbox',
			) );

			$wp_customize->add_control( 'threeforty_related_posts_entry_meta_read_time', array(
				'label'       => esc_html__( 'Read Time', 'threeforty-related-posts' ),
				'section'     => 'threeforty_related_posts_settings',
				'type'        => 'checkbox',
			) );
		endif;

		// Comments Meta
		$wp_customize->add_setting( 'threeforty_related_posts_entry_meta_comment_count', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_related_posts_entry_meta_comment_count', array(
			'label'       => esc_html__( 'Comment Count', 'threeforty-related-posts' ),
			'section'     => 'threeforty_related_posts_settings',
			'type'        => 'checkbox',
		) );

		// Added in version 1.1.2

		if ( apply_filters( 'threeforty_related_posts_background', false ) ) :

			$wp_customize->add_setting( 'threeforty_related_posts_background', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_related_posts_background', array(
		      'section' => 'threeforty_related_posts_settings',
		      'label'   => esc_html__( 'Background Color', 'threeforty-related-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_related_posts_title_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_related_posts_title_color', array(
		      'section' => 'threeforty_related_posts_settings',
		      'label'   => esc_html__( 'Title Color', 'threeforty-related-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_related_posts_link_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_related_posts_link_color', array(
		      'section' => 'threeforty_related_posts_settings',
		      'label'   => esc_html__( 'Link Color', 'threeforty-related-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_related_posts_entry_meta_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_related_posts_entry_meta_color', array(
		      'section' => 'threeforty_related_posts_settings',
		      'label'   => esc_html__( 'Entry Meta Color', 'threeforty-related-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_related_posts_entry_content_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_related_posts_entry_content_color', array(
		      'section' => 'threeforty_related_posts_settings',
		      'label'   => esc_html__( 'Excerpt Color', 'threeforty-related-posts' ),
		    ) ) );

		endif;

}

add_action( 'customize_register', 'threeforty_related_posts_customize_register', 100 );

// ========================================================
// Sanitize checkbox
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_checkbox' ) ) {

	function threeforty_sanitize_checkbox( $input ) {

			return ( $input === true ) ? true : false;

	}

}

// ========================================================
// Sanitize text field
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_text' ) ) {

	function threeforty_sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}

// ========================================================
// Sanitize relationship method
// ========================================================
if ( ! function_exists( 'threeforty_sanitize_relate_method' ) ) {

	function threeforty_sanitize_relate_method( $input ) {
		$valid = array(
			'tags' => esc_html__( 'Tags', 'threeforty-related-posts' ),
			'category' => esc_html__( 'Category', 'threeforty-related-posts' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

}

// ========================================================
// Sanitize Post Type
// ========================================================
if ( ! function_exists( 'threeforty_sanitize_loop_style' ) ) {

function threeforty_sanitize_loop_style( $input ) {
	$valid = array(
		'default' => esc_html__( 'Default', 'threeforty-related-posts' ),
		'cover' => esc_html__( 'Cover', 'threeforty-related-posts' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

}

// ========================================================
// Sanitize thumbnail aspect ratio
// ========================================================
if ( ! function_exists( 'threeforty_sanitize_aspect_ratio' ) ) {

function threeforty_sanitize_aspect_ratio( $input ) {
	$valid = array(
		'landscape' => esc_html__( 'Landscape', 'threeforty-related-posts' ),
		'portrait' => esc_html__( 'Portrait', 'threeforty-related-posts' ),
		'square' => esc_html__( 'Square', 'threeforty-related-posts' ),
		'uncropped' => esc_html__( 'Uncropped', 'threeforty-related-posts' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

}

// ========================================================
// Create an Array of Image Sizes (Names)
// ========================================================

if ( ! function_exists( 'threeforty_get_registered_image_sizes' ) ) {

	function threeforty_get_registered_image_sizes() {

		global $_wp_additional_image_sizes;

		// Core WP image sizes
		$id = array(
			'thumbnail' => esc_html__( 'Thumbnail', 'threeforty-related-posts' ),
			'medium' => esc_html__( 'Medium', 'threeforty-related-posts' ),
			'medium_large' => esc_html__( 'Medium Large', 'threeforty-related-posts' ),
			'large' => esc_html__( 'Large', 'threeforty-related-posts' ));

		foreach ($_wp_additional_image_sizes as $key => $value) {

			$name = ucwords(str_replace('-', ' ', $key));
			$id[$key] = $name;

			}

		return $id;

	}

}


?>