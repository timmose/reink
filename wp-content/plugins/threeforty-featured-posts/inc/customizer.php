<?php

/**
 * ThreeForty Media: Featured Post Settings
 *
 * @package WordPress
 * @subpackage ThreeForty Media
 * @since 1.0
 * @version 1.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register customizer settings

function threeforty_featured_posts_customize_register( $wp_customize ) {

		// ========================================================
		// Category Featured
		// ========================================================

		$wp_customize->add_panel( 'threeforty_featured_posts', array(
		  'title' => esc_html__( '340 Media: Featured Posts', 'threeforty-featured-posts' ),
		  'description' => esc_html__( 'Configure Featured Posts', 'threeforty-featured-posts'),
		  'priority' => 150,
		  ) );

		$wp_customize->add_section( 'threeforty_category_featured_settings', array(
			'title'    => esc_html__( 'Category Featured Posts ', 'threeforty-featured-posts' ),
			'panel'    => 'threeforty_featured_posts',
			'priority' => 160,
		) );

		/**
		 * Display Posts
		 */
		$wp_customize->add_setting( 'threeforty_category_featured', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured', array(
			'label'       => esc_html__( 'Display Featured Posts', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( 'threeforty_category_featured_title', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_category_featured_title', array(
			'label'       => esc_html__( 'Title', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'text',
		) );

		/**
		 * Number of Posts
		 */
		$wp_customize->add_setting( 'threeforty_category_featured_num', array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_num', array(
			'label'       => esc_html__( 'Number of posts', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_featured_posts_max_posts', 999 ),
		    ),
		) );

		/**
		 * Number of Columns
		 */
		$wp_customize->add_setting( 'threeforty_category_featured_cols', array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_cols', array(
			'label'       => esc_html__( 'Number of columns', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_featured_posts_max_cols', 3 ),
		    ),
		) );


		/**
		 * Loop style
		 */
		$wp_customize->add_setting( 'threeforty_category_featured_loop_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'threeforty_sanitize_loop_style',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_loop_style', array(
			'label'       => esc_html__( 'Post Style', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'threeforty-featured-posts' ),
				'cover' => esc_html__( 'Cover', 'threeeforty' ), // Remove this with a filter if not required for a theme
			),
		) );

		$wp_customize->add_setting( 'threeforty_category_featured_image_size', array(
			'default'           => 'landscape',
			'sanitize_callback' => 'threeforty_sanitize_aspect_ratio',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_image_size', array(
			'label'       => esc_html__( 'Thumbnail Size', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'select',
			'choices'     => array(
				'landscape' => esc_html__( 'Landscape', 'threeforty-featured-posts' ),
				'portrait' => esc_html__( 'Portrait', 'threeforty-featured-posts' ),
				'square' => esc_html__( 'Square', 'threeforty-featured-posts' ),
			),
		) );

		/**
		 * Entry title/meta
		 */

		$wp_customize->add_setting( 'threeforty_category_featured_excerpt', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_excerpt', array(
			'label'       => esc_html__( 'Excerpt', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		$wp_customize->add_setting( 'threeforty_category_featured_read_more', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_read_more', array(
			'label'       => esc_html__( 'Read More', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Entry Title
		$wp_customize->add_setting( 'threeforty_category_featured_entry_title', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_entry_title', array(
			'label'       => esc_html__( 'Entry Title', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Author Meta
		$wp_customize->add_setting( 'threeforty_category_featured_entry_meta_by', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_entry_meta_by', array(
			'label'       => esc_html__( '"by"', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Author Meta
		$wp_customize->add_setting( 'threeforty_category_featured_entry_meta_author', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_entry_meta_author', array(
			'label'       => esc_html__( 'Author', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Author Avatar
		$wp_customize->add_setting( 'threeforty_category_featured_entry_meta_author_avatar', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_entry_meta_author_avatar', array(
			'label'       => esc_html__( 'Author Avatar', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Category Meta
		$wp_customize->add_setting( 'threeforty_category_featured_entry_meta_category', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_entry_meta_category', array(
			'label'       => esc_html__( 'Category', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		$wp_customize->add_setting( 'threeforty_category_featured_entry_meta_date', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_entry_meta_date', array(
			'label'       => esc_html__( 'Date', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		if ( function_exists( 'threeforty_read_time' ) ) :
			$wp_customize->add_setting( 'threeforty_category_featured_entry_meta_read_time', array(
				'default'           => false,
				'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
			) );

			$wp_customize->add_control( 'threeforty_category_featured_entry_meta_read_time', array(
				'label'       => esc_html__( 'Read Time', 'threeforty-featured-posts' ),
				'section'     => 'threeforty_category_featured_settings',
				'type'        => 'checkbox',
			) );
		endif;

		// Comments Meta
		$wp_customize->add_setting( 'threeforty_category_featured_entry_meta_comment_count', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_category_featured_entry_meta_comment_count', array(
			'label'       => esc_html__( 'Comment Count', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Post format icons
		$wp_customize->add_setting( 'threeforty_category_featured_post_format_icons', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_category_featured_post_format_icons', array(
			'label'       => esc_html__( 'Show Post Format Icons', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Option to exclude from pages
		$wp_customize->add_setting( 'threeforty_category_featured_exclude_duplicate', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_category_featured_exclude_duplicate', array(
			'label'       => esc_html__( 'Exclude Featured Posts From Loop', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_category_featured_settings',
			'type'        => 'checkbox',
		) );

		// Added in version 1.4

		if ( apply_filters( 'threeforty_category_featured_background', false ) ) :

			$wp_customize->add_setting( 'threeforty_category_featured_background', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_category_featured_background', array(
		      'section' => 'threeforty_category_featured_settings',
		      'label'   => esc_html__( 'Background Color', 'threeforty-featured-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_category_featured_title_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_category_featured_title_color', array(
		      'section' => 'threeforty_category_featured_settings',
		      'label'   => esc_html__( 'Title Color', 'threeforty-featured-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_category_featured_link_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_category_featured_link_color', array(
		      'section' => 'threeforty_category_featured_settings',
		      'label'   => esc_html__( 'Link Color', 'threeforty-featured-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_category_featured_entry_meta_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_category_featured_entry_meta_color', array(
		      'section' => 'threeforty_category_featured_settings',
		      'label'   => esc_html__( 'Entry Meta Color', 'threeforty-featured-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_category_featured_entry_content_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_category_featured_entry_content_color', array(
		      'section' => 'threeforty_category_featured_settings',
		      'label'   => esc_html__( 'Excerpt Color', 'threeforty-featured-posts' ),
		    ) ) );

		endif;

		// ========================================================
		// Home Featured
		// ========================================================

		$wp_customize->add_section( 'threeforty_home_featured_settings', array(
			'title'    => esc_html__( 'Home Featured Posts ', 'threeforty-featured-posts' ),
			'panel'    => 'threeforty_featured_posts',
			'priority' => 160,
		) );

		/**
		 * Display Related Posts
		 */
		$wp_customize->add_setting( 'threeforty_home_featured', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured', array(
			'label'       => esc_html__( 'Display Featured Posts', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( 'threeforty_home_featured_title', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_home_featured_title', array(
			'label'       => esc_html__( 'Title', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'text',
		) );

		// Add Setting
		$wp_customize->add_setting( 'threeforty_home_featured_type', array(
			'default'           => 'recent',
			'sanitize_callback' => 'threeforty_sanitize_post_type',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_home_featured_type', array(
			'label'       => esc_html__( 'Post Type', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'radio',
			'choices'     => array(
				'recent' => esc_html__( 'Recent Posts', 'threeforty-featured-posts' ),
				'popular' => esc_html__( 'Popular Posts', 'threeforty-featured-posts' ),
				'post_ids' => esc_html__( 'Specific Posts (Enter post IDs below)', 'threeforty-featured-posts' ),
			),
		) );

		// Post Ids
		$wp_customize->add_setting( 'threeforty_home_featured_post_ids', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_text',
		) );

		// Post IDs
		$wp_customize->add_control( 'threeforty_home_featured_post_ids', array(
			'label'       => esc_html__( 'Post IDs', 'threeforty-featured-posts' ),
			'description' => esc_html__( 'Enter a comma separated List of post IDs', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'text',
		) );

		// Add Setting
		$wp_customize->add_setting( 'threeforty_home_featured_post_cat', array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_home_featured_post_cat', array(
			'label'       => esc_html__( 'Category', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'description' => esc_html__( 'Can be used in combination with post type', 'threeforty-featured-posts' ),
			'type'        => 'select',
			'choices'     => threeforty_get_blog_categories(),
		) );

		/**
		 * Number of Posts
		 */
		$wp_customize->add_setting( 'threeforty_home_featured_num', array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_num', array(
			'label'       => esc_html__( 'Number of posts', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_featured_posts_max_posts', 999 ),
		    ),
		) );

		/**
		 * Number of Columns
		 */
		$wp_customize->add_setting( 'threeforty_home_featured_cols', array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_cols', array(
			'label'       => esc_html__( 'Number of columns', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_featured_posts_max_cols', 3 ),
		    ),
		) );

		/**
		 * Offset
		 */
		$wp_customize->add_setting( 'threeforty_home_featured_offset', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_offset', array(
			'label'       => esc_html__( 'Offset (Number of posts to skip)', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 0,
		    ),
		) );

		// Exclude Post Ids
		$wp_customize->add_setting( 'threeforty_home_featured_exclude_post_ids', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_text',
		) );

		// Post IDs
		$wp_customize->add_control( 'threeforty_home_featured_exclude_post_ids', array(
			'label'       => esc_html__( 'Exclude Post IDs', 'threeforty-featured-posts' ),
			'description' => esc_html__( 'Enter a comma separated List of post IDs to Exclude', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'text',
		) );

		/**
		 * Loop style
		 */
		$wp_customize->add_setting( 'threeforty_home_featured_loop_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'threeforty_sanitize_loop_style',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_loop_style', array(
			'label'       => esc_html__( 'Post Style', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'threeforty-featured-posts' ),
				'cover' => esc_html__( 'Cover', 'threeeforty' ), // Remove this with a filter if not required for a theme
			),
		) );

		$wp_customize->add_setting( 'threeforty_home_featured_image_size', array(
			'default'           => 'landscape',
			'sanitize_callback' => 'threeforty_sanitize_aspect_ratio',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_image_size', array(
			'label'       => esc_html__( 'Thumbnail Size', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'select',
			'choices'     => array(
				'landscape' => esc_html__( 'Landscape', 'threeforty-featured-posts' ),
				'portrait' => esc_html__( 'Portrait', 'threeforty-featured-posts' ),
				'square' => esc_html__( 'Square', 'threeforty-featured-posts' ),
		),
		) );

		/**
		 * Entry title/meta
		 */

		$wp_customize->add_setting( 'threeforty_home_featured_excerpt', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_excerpt', array(
			'label'       => esc_html__( 'Excerpt', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		$wp_customize->add_setting( 'threeforty_home_featured_read_more', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_read_more', array(
			'label'       => esc_html__( 'Read More', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Entry Title
		$wp_customize->add_setting( 'threeforty_home_featured_entry_title', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_entry_title', array(
			'label'       => esc_html__( 'Entry Title', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Author Meta
		$wp_customize->add_setting( 'threeforty_home_featured_entry_meta_by', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_entry_meta_by', array(
			'label'       => esc_html__( '"by"', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Author Meta
		$wp_customize->add_setting( 'threeforty_home_featured_entry_meta_author', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_entry_meta_author', array(
			'label'       => esc_html__( 'Author', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Author Avatar
		$wp_customize->add_setting( 'threeforty_home_featured_entry_meta_author_avatar', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_entry_meta_author_avatar', array(
			'label'       => esc_html__( 'Author Avatar', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Category Meta
		$wp_customize->add_setting( 'threeforty_home_featured_entry_meta_category', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_entry_meta_category', array(
			'label'       => esc_html__( 'Category', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		$wp_customize->add_setting( 'threeforty_home_featured_entry_meta_date', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_entry_meta_date', array(
			'label'       => esc_html__( 'Date', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		if ( function_exists( 'threeforty_read_time' ) ) :
			$wp_customize->add_setting( 'threeforty_home_featured_entry_meta_read_time', array(
				'default'           => false,
				'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
			) );

			$wp_customize->add_control( 'threeforty_home_featured_entry_meta_read_time', array(
				'label'       => esc_html__( 'Read Time', 'threeforty-featured-posts' ),
				'section'     => 'threeforty_home_featured_settings',
				'type'        => 'checkbox',
			) );
		endif;

		// Comments Meta
		$wp_customize->add_setting( 'threeforty_home_featured_entry_meta_comment_count', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_home_featured_entry_meta_comment_count', array(
			'label'       => esc_html__( 'Comment Count', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Post format icons
		$wp_customize->add_setting( 'threeforty_home_featured_post_format_icons', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_home_featured_post_format_icons', array(
			'label'       => esc_html__( 'Show Post Format Icons', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_home_featured_settings',
			'type'        => 'checkbox',
		) );

		// Added in version 1.4

		if ( apply_filters( 'threeforty_home_featured_background', false ) ) :

			$wp_customize->add_setting( 'threeforty_home_featured_background', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_home_featured_background', array(
		      'section' => 'threeforty_home_featured_settings',
		      'label'   => esc_html__( 'Background Color', 'threeforty-featured-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_home_featured_title_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_home_featured_title_color', array(
		      'section' => 'threeforty_home_featured_settings',
		      'label'   => esc_html__( 'Title Color', 'threeforty-featured-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_home_featured_link_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_home_featured_link_color', array(
		      'section' => 'threeforty_home_featured_settings',
		      'label'   => esc_html__( 'Link Color', 'threeforty-featured-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_home_featured_entry_meta_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_home_featured_entry_meta_color', array(
		      'section' => 'threeforty_home_featured_settings',
		      'label'   => esc_html__( 'Entry Meta Color', 'threeforty-featured-posts' ),
		    ) ) );

		    $wp_customize->add_setting( 'threeforty_home_featured_entry_content_color', array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			// Control Options
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'threeforty_home_featured_entry_content_color', array(
		      'section' => 'threeforty_home_featured_settings',
		      'label'   => esc_html__( 'Excerpt Color', 'threeforty-featured-posts' ),
		    ) ) );

		endif;

		// ========================================================
		// Custom posts
		// ========================================================

		/**
		 * This is a custom posts loop, that requires activation
		 * within each theme as required.
		 * To activate: ONLY add_action is required add_filter is optional
		 =================
		   function filter_threeforty_custom_posts_hook() {
				return 'user_defined_hook';
			}
			add_filter( 'threeforty_custom_posts_hook', 'filter_threeforty_custom_posts_hook' );
			add_action( apply_filters( 'threeforty_custom_posts_hook', 'threeforty_before_footer' ), 'threeforty_custom_posts' );
		 =================
		 */

		if ( apply_filters( 'threeforty_custom_posts', false ) ) {

			$wp_customize->add_section( 'threeforty_custom_posts_settings', array(
			'title'    => apply_filters( 'threeforty_custom_posts_section_name', 'Custom Posts' ),
			'panel'    => 'threeforty_featured_posts',
			'priority' => 160,
		) );

		/**
		 * Display Related Posts
		 */
		$wp_customize->add_setting( 'threeforty_custom_posts', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts', array(
			'label'       => esc_html__( 'Display Custom Posts', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( 'threeforty_custom_posts_title', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_custom_posts_title', array(
			'label'       => esc_html__( 'Title', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'text',
		) );

		// Add Setting
		$wp_customize->add_setting( 'threeforty_custom_posts_type', array(
			'default'           => 'recent',
			'sanitize_callback' => 'threeforty_sanitize_post_type',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_custom_posts_type', array(
			'label'       => esc_html__( 'Post Type', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'radio',
			'choices'     => array(
				'recent' => esc_html__( 'Recent Posts', 'threeforty-featured-posts' ),
				'popular' => esc_html__( 'Popular Posts', 'threeforty-featured-posts' ),
				'post_ids' => esc_html__( 'Specific Posts (Enter post IDs below)', 'threeforty-featured-posts' ),
			),
		) );

		// Post Ids
		$wp_customize->add_setting( 'threeforty_custom_posts_post_ids', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_text',
		) );

		// Post IDs
		$wp_customize->add_control( 'threeforty_custom_posts_post_ids', array(
			'label'       => esc_html__( 'Post IDs', 'threeforty-featured-posts' ),
			'description' => esc_html__( 'Enter a comma separated List of post IDs', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'text',
		) );

		// Add Setting
		$wp_customize->add_setting( 'threeforty_custom_posts_post_cat', array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_custom_posts_post_cat', array(
			'label'       => esc_html__( 'Category', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'description' => esc_html__( 'Can be used in combination with post type', 'threeforty-featured-posts' ),
			'type'        => 'select',
			'choices'     => threeforty_get_blog_categories(),
		) );

		/**
		 * Number of Posts
		 */
		$wp_customize->add_setting( 'threeforty_custom_posts_num', array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_num', array(
			'label'       => esc_html__( 'Number of posts', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_featured_posts_max_posts', 999 ),
		    ),
		) );

		/**
		 * Number of Columns
		 */
		$wp_customize->add_setting( 'threeforty_custom_posts_cols', array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_cols', array(
			'label'       => esc_html__( 'Number of columns', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'threeforty_featured_posts_max_cols', 3 ),
		    ),
		) );

		/**
		 * Offset
		 */
		$wp_customize->add_setting( 'threeforty_custom_posts_offset', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_offset', array(
			'label'       => esc_html__( 'Offset (Number of posts to skip)', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 0,
		    ),
		) );

		/**
		 * Loop style
		 */
		$wp_customize->add_setting( 'threeforty_custom_posts_loop_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'threeforty_sanitize_loop_style',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_loop_style', array(
			'label'       => esc_html__( 'Post Style', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'threeforty-featured-posts' ),
				'cover' => esc_html__( 'Cover', 'threeeforty' ), // Remove this with a filter if not required for a theme
			),
		) );

		$wp_customize->add_setting( 'threeforty_custom_posts_image_size', array(
			'default'           => 'landscape',
			'sanitize_callback' => 'threeforty_sanitize_aspect_ratio',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_image_size', array(
			'label'       => esc_html__( 'Thumbnail Size', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'select',
			'choices'     => array(
				'landscape' => esc_html__( 'Landscape', 'threeforty-featured-posts' ),
				'portrait' => esc_html__( 'Portrait', 'threeforty-featured-posts' ),
				'square' => esc_html__( 'Square', 'threeforty-featured-posts' ),
		),
		) );

		/**
		 * Entry title/meta
		 */

		$wp_customize->add_setting( 'threeforty_custom_posts_excerpt', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_excerpt', array(
			'label'       => esc_html__( 'Excerpt', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		// Entry Title
		$wp_customize->add_setting( 'threeforty_custom_posts_entry_title', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_entry_title', array(
			'label'       => esc_html__( 'Entry Title', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		// Author Meta
		$wp_customize->add_setting( 'threeforty_custom_posts_entry_meta_author', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_entry_meta_author', array(
			'label'       => esc_html__( 'Author', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		// Author Avatar
		$wp_customize->add_setting( 'threeforty_custom_posts_entry_meta_author_avatar', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_entry_meta_author_avatar', array(
			'label'       => esc_html__( 'Author Avatar', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		// Category Meta
		$wp_customize->add_setting( 'threeforty_custom_posts_entry_meta_category', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_entry_meta_category', array(
			'label'       => esc_html__( 'Category', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		$wp_customize->add_setting( 'threeforty_custom_posts_entry_meta_date', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_entry_meta_date', array(
			'label'       => esc_html__( 'Date', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		// Date Meta
		if ( function_exists( 'threeforty_read_time' ) ) :
			$wp_customize->add_setting( 'threeforty_custom_posts_entry_meta_read_time', array(
				'default'           => false,
				'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
			) );

			$wp_customize->add_control( 'threeforty_custom_posts_entry_meta_read_time', array(
				'label'       => esc_html__( 'Read Time', 'threeforty-featured-posts' ),
				'section'     => 'threeforty_custom_posts_settings',
				'type'        => 'checkbox',
			) );
		endif;

		// Comments Meta
		$wp_customize->add_setting( 'threeforty_custom_posts_entry_meta_comment_count', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'threeforty_custom_posts_entry_meta_comment_count', array(
			'label'       => esc_html__( 'Comment Count', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		// Post format icons
		$wp_customize->add_setting( 'threeforty_custom_posts_post_format_icons', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_featured_posts_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'threeforty_custom_posts_post_format_icons', array(
			'label'       => esc_html__( 'Show Post Format Icons', 'threeforty-featured-posts' ),
			'section'     => 'threeforty_custom_posts_settings',
			'type'        => 'checkbox',
		) );

		} // End if custom posts

}

add_action( 'customize_register', 'threeforty_featured_posts_customize_register', 100 );

// ========================================================
// Sanitize checkbox
// ========================================================

if ( ! function_exists( 'threeforty_featured_posts_sanitize_checkbox' ) ) {

	function threeforty_featured_posts_sanitize_checkbox( $input ) {

			return ( $input === true ) ? true : false;

	}

}

// ========================================================
// Sanitize text field
// ========================================================

if ( ! function_exists( 'threeforty_featured_posts_sanitize_text' ) ) {

	function threeforty_featured_posts_sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}

// ========================================================
// Sanitize Post Type
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_post_type' ) ) {

	function threeforty_sanitize_post_type( $input ) {
		$valid = array(
			'recent' => esc_html__( 'Recent Posts', 'threeforty-featured-posts' ),
			'popular' => esc_html__( 'Popular Posts', 'threforty' ),
			'post_ids' => esc_html__( 'Specific Posts (Enter post IDs below)', 'threeforty-featured-posts' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

}

// ========================================================
// Sanitize Post Loop
// ========================================================
if ( ! function_exists( 'threeforty_sanitize_loop_style' ) ) {

function threeforty_sanitize_loop_style( $input ) {
	$valid = array(
		'default' => esc_html__( 'Default', 'threeforty-featured-posts' ),
		'cover' => esc_html__( 'Cover', 'threeforty-featured-posts' ),
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
		'landscape' => esc_html__( 'Landscape', 'threeforty-featured-posts' ),
		'portrait' => esc_html__( 'Portrait', 'threeforty-featured-posts' ),
		'square' => esc_html__( 'Square', 'threeforty-featured-posts' ),
		'uncropped' => esc_html__( 'Uncropped', 'threeforty-featured-posts' ),
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


// ========================================================
// Create an Array of Image Sizes (Names)
// ========================================================

if ( ! function_exists( 'threeforty_get_registered_image_sizes' ) ) {

	function threeforty_get_registered_image_sizes() {

		global $_wp_additional_image_sizes;

		// Core WP image sizes
		$id = array(
			'thumbnail' => esc_html__( 'Thumbnail', 'threeforty-featured-posts' ),
			'medium' => esc_html__( 'Medium', 'threeforty-featured-posts' ),
			'medium_large' => esc_html__( 'Medium Large', 'threeforty-featured-posts' ),
			'large' => esc_html__( 'Large', 'threeforty-featured-posts' ));

		foreach ($_wp_additional_image_sizes as $key => $value) {

			$name = ucwords(str_replace('-', ' ', $key));
			$id[$key] = $name;

			}

		return $id;

	}

}


?>