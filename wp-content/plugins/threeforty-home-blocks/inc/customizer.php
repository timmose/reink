<?php

/**
 * 340: Home Blocks Settings
 *
 * @package WordPress
 * @subpackage ThreeForty Media
 * @since 1.0
 * @version 1.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register customizer settings

function threeforty_home_blocks_customize_register( $wp_customize ) {

	// ========================================================
	// Home Blocks
	// ========================================================

	// Group everything into Blocks Panel
	$wp_customize->add_panel( 'threeforty_home_blocks', array(
	  'title' => esc_html__( '340 Media: Homepage Post Blocks', 'threeforty-home-blocks' ),
	  'description' => esc_html__( 'Customize theme settings', 'threeforty-home-blocks'),
	  'priority' => 150,
	  ) );

	$home_blocks = threeforty_get_home_blocks( );

	foreach( $home_blocks as $home_block ) {

		$block_num = substr($home_block, 22); // Extract the number from the array string

		$wp_customize->add_section( 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '', array(
			'title'    => esc_html__( 'Posts Block ' . $block_num, 'threeforty-home-blocks' ),
			'panel' => 'threeforty_home_blocks',
			'priority' => 130,
		) );

		// Add Setting
		$wp_customize->add_setting( $home_block, array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( $home_block, array(
			'label'       => esc_html__( 'Enable Block ' . $block_num, 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_title', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( '' . $home_block . '_title', array(
			'label'       => esc_html__( 'Title', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'text',
		) );

		// Added in v1.1

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_subtitle', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( '' . $home_block . '_subtitle', array(
			'label'       => esc_html__( 'Subtitle', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'text',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_post_type', array(
			'default'           => 'recent',
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_post_type',
		) );

		// Control Options
		$wp_customize->add_control( '' . $home_block . '_post_type', array(
			'label'       => esc_html__( 'Post Type', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'radio',
			'choices'     => array(
				'recent' => esc_html__( 'Recent Posts', 'threeforty-home-blocks' ),
				'popular' => esc_html__( 'Popular Posts', 'threeforty-home-blocks' ),
				'post_ids' => esc_html__( 'Specific Posts (Enter post IDs below)', 'threeforty-home-blocks' ),
				'recent_products' => esc_html__( 'Recent Products', 'threeforty-home-blocks' ),
				'product_ids' => esc_html__( 'Specific Products (Enter product IDs below)', 'threeforty-home-blocks' ),
			),
		) );

		// Post Ids
		$wp_customize->add_setting( '' . $home_block . '_post_ids', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_text',
		) );

		// Post IDs
		$wp_customize->add_control( '' . $home_block . '_post_ids', array(
			'label'       => esc_html__( 'Post/Product IDs', 'threeforty-home-blocks' ),
			'description' => esc_html__( 'Enter a comma separated List of post/product IDs', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'text',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_post_cat', array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		) );

		// Control Options
		$wp_customize->add_control( '' . $home_block . '_post_cat', array(
			'label'       => esc_html__( 'Category', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'description' => esc_html__( 'Can be used in combination with post type', 'threeforty-home-blocks' ),
			'type'        => 'select',
			'choices'     => threeforty_home_blocks_get_blog_categories(),
		) );

		// Number of Posts
		$wp_customize->add_setting( '' . $home_block . '_post_num', array(
			'default'           => '3',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( '' . $home_block . '_post_num', array(
			'label'       => esc_html__( 'Number of posts to display', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		    ),
		) );

		// Number of columns
		$wp_customize->add_setting( '' . $home_block . '_cols', array(
			'default'           => '3',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( '' . $home_block . '_cols', array(
			'label'       => esc_html__( 'Number of Columns', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => 3,
		    ),
		) );

		// Offset
		$wp_customize->add_setting( '' . $home_block . '_post_offset', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( '' . $home_block . '_post_offset', array(
			'label'       => esc_html__( 'Offset (number of posts to skip)', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 0,
		    ),
		) );

		// Exclude Post Ids
		$wp_customize->add_setting( '' . $home_block . '_exclude_post_ids', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_text',
		) );

		// Post IDs
		$wp_customize->add_control( '' . $home_block . '_exclude_post_ids', array(
			'label'       => esc_html__( 'Exclude Post/Product IDs', 'threeforty-home-blocks' ),
			'description' => esc_html__( 'Enter a comma separated List of post/product IDs to Exclude', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'text',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_link_more', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_link_more', array(
			'label'       => esc_html__( 'Link to more posts', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'description' => esc_html__( 'Link to more posts in selected category', 'threeforty-home-blocks' ),
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_link_more_text', array(
			'default'           => '',
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( '' . $home_block . '_link_more_text', array(
			'label'       => esc_html__( 'Link more text (optional)', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'description' => esc_html__( 'If you leave this blank the title will be hyperlinked', 'threeforty-home-blocks' ),
			'type'        => 'text',
		) );

		// Layout style
		$wp_customize->add_setting( '' . $home_block . '_post_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_loop_style',
		) );

		$wp_customize->add_control('' . $home_block . '_post_style', array(
			'label'       => esc_html__( 'Post Style', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'threeforty-home-blocks' ),
				'cover' => esc_html__( 'Cover', 'threeeforty-home-blocks' ), // Remove this with a filter if not required for a theme
			),
		) );

		// Thumbnail aspect ratio
		$wp_customize->add_setting( '' . $home_block . '_image_size', array(
			'default'           => 'landscape',
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_aspect_ratio',
		) );

		$wp_customize->add_control( '' . $home_block . '_image_size', array(
			'label'       => esc_html__( 'Thumbnail Size', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'select',
			'choices'     => array(
				'landscape' => esc_html__( 'Landscape', 'threeforty-home-blocks' ),
				'portrait' => esc_html__( 'Portrait', 'threeforty-home-blocks' ),
				'square' => esc_html__( 'Square', 'threeforty-home-blocks' ),
				'uncropped' => esc_html__( 'Uncropped', 'threeforty-home-blocks' ),
			),
		) );

		// Toggle entry meta

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_excerpt', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_excerpt', array(
			'label'       => esc_html__( 'Excerpt', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_read_more', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_read_more', array(
			'label'       => esc_html__( 'Read More', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_entry_title', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_entry_title', array(
			'label'       => esc_html__( 'Entry Title', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_entry_meta_by', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_entry_meta_by', array(
			'label'       => esc_html__( '"by"', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_entry_meta_author', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_entry_meta_author', array(
			'label'       => esc_html__( 'Author', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_entry_meta_author_avatar', array(
			'default'           => false,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_entry_meta_author_avatar', array(
			'label'       => esc_html__( 'Author Avatar', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_entry_meta_category', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_entry_meta_category', array(
			'label'       => esc_html__( 'Category', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_entry_meta_date', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_entry_meta_date', array(
			'label'       => esc_html__( 'Date', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_entry_meta_read_time', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_entry_meta_read_time', array(
			'label'       => esc_html__( 'Read Time', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_entry_meta_comment_count', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_entry_meta_comment_count', array(
			'label'       => esc_html__( 'Comment Count', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Add Setting
		$wp_customize->add_setting( '' . $home_block . '_post_format_icons', array(
			'default'           => true,
			'sanitize_callback' => 'threeforty_home_blocks_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control('' . $home_block . '_post_format_icons', array(
			'label'       => esc_html__( 'Show Post Format Icons', 'threeforty-home-blocks' ),
			'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
			'type'        => 'checkbox',
		) );

		// Added in v1.0.5 (colors)
		$wp_customize->add_setting( '' . $home_block . '_background', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '' . $home_block . '_background', array(
	      'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
	      'label'   => esc_html__( 'Background Color', 'threeforty-home-blocks' ),
	    ) ) );

	    $wp_customize->add_setting( '' . $home_block . '_title_color', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '' . $home_block . '_title_color', array(
	      'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
	      'label'   => esc_html__( 'Title Color', 'threeforty-home-blocks' ),
	    ) ) );

	     $wp_customize->add_setting( '' . $home_block . '_subtitle_color', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '' . $home_block . '_subtitle_color', array(
	      'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
	      'label'   => esc_html__( 'SubTitle Color', 'threeforty-home-blocks' ),
	    ) ) );

	    $wp_customize->add_setting( '' . $home_block . '_link_more_color', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '' . $home_block . '_link_more_color', array(
	      'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
	      'label'   => esc_html__( 'More Link Color', 'threeforty-home-blocks' ),
	    ) ) );

	    $wp_customize->add_setting( '' . $home_block . '_entry_link_color', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '' . $home_block . '_entry_link_color', array(
	      'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
	      'label'   => esc_html__( 'Entry Link Color', 'threeforty-home-blocks' ),
	    ) ) );

	    $wp_customize->add_setting( '' . $home_block . '_entry_meta_color', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '' . $home_block . '_entry_meta_color', array(
	      'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
	      'label'   => esc_html__( 'Entry Meta Color', 'threeforty-home-blocks' ),
	    ) ) );

	    $wp_customize->add_setting( '' . $home_block . '_entry_content_color', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '' . $home_block . '_entry_content_color', array(
	      'section'     => 'threeforty_home_custom_blocks' . esc_attr( $home_block ) . '',
	      'label'   => esc_html__( 'Excerpt Color', 'threeforty-home-blocks' ),
	    ) ) );

	}


}

add_action( 'customize_register', 'threeforty_home_blocks_customize_register' );


// ========================================================
// Sanitize checkbox
// ========================================================

if ( ! function_exists( 'threeforty_home_blocks_sanitize_checkbox' ) ) {

	function threeforty_home_blocks_sanitize_checkbox( $input ) {

			return ( $input === true ) ? true : false;

	}

}

// ========================================================
// Sanitize text field
// ========================================================

if ( ! function_exists( 'threeforty_home_blocks_sanitize_text' ) ) {

	function threeforty_home_blocks_sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}


// ========================================================
// Sanitize Post Type
// ========================================================

if ( ! function_exists( 'threeforty_home_blocks_sanitize_post_type' ) ) {

	function threeforty_home_blocks_sanitize_post_type( $input ) {
		$valid = array(
			'recent' => esc_html__( 'Recent Posts', 'threeforty-home-blocks' ),
			'popular' => esc_html__( 'Popular Posts', 'threeforty-home-blocks' ),
			'post_ids' => esc_html__( 'Specific Posts (Enter post IDs below)', 'threeforty-home-blocks' ),
			'recent_products' => esc_html__( 'Recent Products', 'threeforty-home-blocks' ),
			'product_ids' => esc_html__( 'Specific Products (Enter product IDs below)', 'threeforty-home-blocks' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

}

// ========================================================
// Sanitize default WP post loop type
// ========================================================

if ( ! function_exists( 'threeforty_home_blocks_sanitize_loop_type' ) ) {

function threeforty_home_blocks_sanitize_loop_type( $input ) {
	$valid = array(
		'default' => esc_html__( 'Default', 'threeforty-home-blocks' ),
		'custom' => esc_html__( 'Custom Post Blocks', 'threeforty-home-blocks' ),
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
if ( ! function_exists( 'threeforty_home_blocks_sanitize_loop_style' ) ) {

function threeforty_home_blocks_sanitize_loop_style( $input ) {
	$valid = array(
		'default' => esc_html__( 'Default', 'threeforty-home-blocks' ),
		'cover' => esc_html__( 'Cover', 'threeforty-home-blocks' ),
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
if ( ! function_exists( 'threeforty_home_blocks_sanitize_aspect_ratio' ) ) {

function threeforty_home_blocks_sanitize_aspect_ratio( $input ) {
	$valid = array(
		'landscape' => esc_html__( 'Landscape', 'threeforty-home-blocks' ),
		'portrait' => esc_html__( 'Portrait', 'threeforty-home-blocks' ),
		'square' => esc_html__( 'Square', 'threeforty-home-blocks' ),
		'uncropped' => esc_html__( 'Uncropped', 'threeforty-home-blocks' ),
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

if ( ! function_exists( 'threeforty_home_blocks_get_blog_categories' ) ) {

	function threeforty_home_blocks_get_blog_categories() {

		$categories = get_categories('type=post');
		$product_categories = get_categories( array( 'taxonomy' => 'product_cat') );

		$cats = array('' => '');
		$prod_cats = array('' => '');

		foreach( $categories as $category ) {
		    $cats[$category->term_id] = $category->name;
		}
		foreach( $product_categories as $product_cat ) {
		    $prod_cats[$product_cat->term_id] = $product_cat->name;
		}

		return array_replace_recursive($cats, $prod_cats);
	}

}

// ========================================================
// Create an Array of HOME Blocks
// ========================================================

if ( ! function_exists( 'threeforty_get_home_blocks' ) ) {

function threeforty_get_home_blocks() {
     $home_blocks = array(
     	 'threeforty_home_block_1',
     	 'threeforty_home_block_2',
         'threeforty_home_block_3',
         'threeforty_home_block_4',
         'threeforty_home_block_5',
         'threeforty_home_block_6'
     );
 return $home_blocks;
}

}

?>