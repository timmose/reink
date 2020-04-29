<?php

/**
 * ThreeForty: HERO Customizer Settings
 *
 * @package WordPress
 * @subpackage threeforty
 * @since 1.0
 * @version 1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register customizer settings

function threeforty_hero_customize_register( $wp_customize ) {

		$wp_customize->add_section( 'threeforty_hero_settings', array(
			'title'    => esc_html__( '340 Media: Hero Settings', 'threeforty-hero' ),
			'priority' => 160,
			) );

		/**
		 * Display Hero
		 */
		$wp_customize->add_setting( 'threeforty_hero', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero', array(
			'label'       => esc_html__( 'Display Hero', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

		if ( apply_filters( 'threeforty_hero_full_width_support', false ) ) :

			$wp_customize->add_setting( 'threeforty_hero_full_width', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_full_width', array(
			'label'       => esc_html__( 'Full Width', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );


		endif;

		/**
		 * Layout (this can be filtered on a per theme basis)
		 */
		$wp_customize->add_setting( 'threeforty_hero_layout', array(
			'default'           => 'grid',
			'sanitize_callback' => 'threeforty_sanitize_hero_layout',
		) );

		$wp_customize->add_control( 'threeforty_hero_layout', array(
			'label'       => esc_html__( 'Layout', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'select',
			'choices'     => array(
				'slider' => esc_html__( 'Slider', 'threeforty-hero' ),
				'grid' => esc_html__( 'Grid', 'threeforty-hero' ),
			),
		) );

		/**
		 * Style (this can be filtered on a per theme basis)
		 */
		$wp_customize->add_setting( 'threeforty_hero_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'threeforty_sanitize_hero_style',
		) );

		$wp_customize->add_control( 'threeforty_hero_style', array(
			'label'       => esc_html__( 'Style', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Hero', 'threeforty-hero' ),
				'cover' => esc_html__( 'Cover', 'threeforty-hero' ),
			),
		) );

		/**
		 * Post Type
		 */
		$wp_customize->add_setting( 'threeforty_hero_post_type', array(
			'default'           => 'recent',
			'sanitize_callback' => 'threeforty_sanitize_post_type',
		) );

		$wp_customize->add_control( 'threeforty_hero_post_type', array(
			'label'       => esc_html__( 'Post Type', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'radio',
			'choices'     => array(
				'recent' => esc_html__( 'Recent Posts', 'threeforty-hero' ),
				'popular' => esc_html__( 'Popular Posts', 'threeforty-hero' ),
				'post_ids' => esc_html__( 'Specific Posts (Enter post IDs below)', 'threeforty-hero' ),
			),
		) );

		/**
		 * Post ID's
		 */
		$wp_customize->add_setting( 'threeforty_hero_post_ids', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_hero_post_ids', array(
			'label'       => esc_html__( 'Post IDs', 'threeforty-hero' ),
			'description' => esc_html__( 'Enter a comma separated List of post IDs', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'text',
		) );

		/**
		 * Post Category
		 */
		$wp_customize->add_setting( 'threeforty_hero_post_cat', array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_hero_post_cat', array(
			'label'       => esc_html__( 'Category', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'description' => esc_html__( 'Can be used in combination with post type', 'threeforty-hero' ),
			'type'        => 'select',
			'choices'     => threeforty_get_blog_categories(),
		) );

		/**
		 * Number of Posts
		 */
		$wp_customize->add_setting( 'threeforty_hero_post_num', array(
			'default'           => '1',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_hero_post_num', array(
			'label'       => esc_html__( 'Number of posts', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_hero_max_post_num', 99 ),
		    ),
		) );

		/**
		 * Number of Slides to Show ( Carousel)
		 */
		$wp_customize->add_setting( 'threeforty_hero_slidestoshow', array(
			'default'           => '3',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_hero_slidestoshow', array(
			'label'       => esc_html__( 'Number of Slides To Show (Slider)', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_hero_max_slidestoshow', 4 ),
		    ),
		) );

		/**
		 * Offset
		 */
		$wp_customize->add_setting( 'threeforty_hero_post_offset', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_hero_post_offset', array(
			'label'       => esc_html__( 'Offset (Number of posts to skip)', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 0,
		    ),
		) );

		/**
		 * Post ID's
		 */
		$wp_customize->add_setting( 'threeforty_hero_exclude_post_ids', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_hero_exclude_post_ids', array(
			'label'       => esc_html__( 'Exclude Post IDs', 'threeforty-hero' ),
			'description' => esc_html__( 'Enter a comma separated List of post IDs to Exclude', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'text',
		) );

		/**
		 * Entry title/meta
		 */


		// Entry Title
		$wp_customize->add_setting( 'threeforty_hero_entry_title', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_entry_title', array(
			'label'       => esc_html__( 'Entry Title', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

		// Entry Title
		$wp_customize->add_setting( 'threeforty_hero_excerpt', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_excerpt', array(
			'label'       => esc_html__( 'Excerpt', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

		// By
		$wp_customize->add_setting( 'threeforty_hero_entry_meta_by', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_entry_meta_by', array(
			'label'       => esc_html__( '"by"', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

		// Author Meta
		$wp_customize->add_setting( 'threeforty_hero_entry_meta_author', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_entry_meta_author', array(
			'label'       => esc_html__( 'Author', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

		// Author Avatar
		$wp_customize->add_setting( 'threeforty_hero_entry_meta_author_avatar', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_entry_meta_author_avatar', array(
			'label'       => esc_html__( 'Author Avatar', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

		// Category Meta
		$wp_customize->add_setting( 'threeforty_hero_entry_meta_category', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_entry_meta_category', array(
			'label'       => esc_html__( 'Category', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		$wp_customize->add_setting( 'threeforty_hero_entry_meta_date', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_entry_meta_date', array(
			'label'       => esc_html__( 'Date', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		if ( function_exists( 'threeforty_read_time' ) ) :
			$wp_customize->add_setting( 'threeforty_hero_entry_meta_read_time', array(
				'default'           => false,
				'sanitize_callback' => 'threeforty_sanitize_checkbox',
			) );

			$wp_customize->add_control( 'threeforty_hero_entry_meta_read_time', array(
				'label'       => esc_html__( 'Read Time', 'threeforty-hero' ),
				'section'     => 'threeforty_hero_settings',
				'type'        => 'checkbox',
			) );
		endif;

		// Comments Meta
		$wp_customize->add_setting( 'threeforty_hero_entry_meta_comment_count', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_hero_entry_meta_comment_count', array(
			'label'       => esc_html__( 'Comment Count', 'threeforty-hero' ),
			'section'     => 'threeforty_hero_settings',
			'type'        => 'checkbox',
		) );

}

add_action( 'customize_register', 'threeforty_hero_customize_register' );

// ========================================================
// Sanitize Checkbox
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_checkbox' ) ) {

	function threeforty_sanitize_checkbox( $input ) {

			return ( $input === true ) ? true : false;

	}

}

// ========================================================
// Sanitize post type
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_post_type' ) ) {

	function threeforty_sanitize_post_type( $input ) {
		$valid = array(
			'recent' => esc_html__( 'Recent Posts', 'threeforty-hero' ),
			'popular' => esc_html__( 'Popular Posts', 'threeforty-hero' ),
			'post_ids' => esc_html__( 'Specific Posts (Enter post IDs below)', 'threeforty-hero' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

}

// ========================================================
// Sanitize layout
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_hero_layout' ) ) {

	function threeforty_sanitize_hero_layout( $input ) {
		$valid = array(
			'slider' => esc_html__( 'Slider', 'threeforty-hero' ),
			'grid' => esc_html__( 'Grid', 'threeforty-hero' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

}

// ========================================================
// Sanitize layout
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_hero_style' ) ) {

	function threeforty_sanitize_hero_style( $input ) {
		$valid = array(
			'default' => esc_html__( 'Hero', 'threeforty-hero' ),
			'cover' => esc_html__( 'Cover', 'threeforty-hero' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

}

// ========================================================
// Create an Array of categories
// ========================================================

if ( ! function_exists( 'threeforty_get_blog_categories' ) ) {

	function threeforty_get_blog_categories() {

		$categories = get_categories('type=post');

		$cats = array('' => '');

		foreach( $categories as $category ) {
		    $cats[$category->term_id] = $category->name;
		}

		return $cats;
	}

}


?>