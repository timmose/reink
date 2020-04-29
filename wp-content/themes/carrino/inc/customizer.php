<?php
/**
 * Carrino: Customizer
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.2.2
 */

// Custom control
require_once 'custom_controls.php';


function carrino_customize_register( $wp_customize ) {


	// Group everything into a theme settings panel
	$wp_customize->add_panel( 'carrino_theme_settings', array(
	  'title' => esc_html__( 'Carrino: Theme Settings', 'carrino' ),
	  'description' => esc_html__( 'Customize theme settings', 'carrino'),
	  'priority' => 140,
	  ) );

	// ========================================================
	// General Theme Settings
	// ========================================================

	$wp_customize->add_section( 'carrino_general_settings', array(
		'title'    => esc_html__( 'General Settings', 'carrino' ),
		'priority' => 130,
		'panel' => 'carrino_theme_settings',
	) );

	// Toggle primary menu in sidebar (desktop)
	$wp_customize->add_setting( 'carrino_sidebar_primary_nav', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_sidebar_primary_nav', array(
		'label'       => esc_html__( 'Show Primary Nav in Slide Out Sidebar on Desktop', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'checkbox',
	) );

	// Toggle Logo
	$wp_customize->add_setting( 'carrino_sidebar_logo', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_sidebar_logo', array(
		'label'       => esc_html__( 'Show Logo in Slide Out Sidebar', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting('carrino_sidebar_logo_upload', array(
		'default'           => '',
		'sanitize_callback' => 'carrino_sanitize_image',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'carrino_sidebar_logo_upload', array(
               'label'      => esc_html__( 'Sidebar Logo', 'carrino' ),
               'description' => esc_html__( 'You can upload an alternative sidebar logo which will replace the default logo', 'carrino' ),
               'section'    => 'carrino_general_settings',
           )
       )
   );

	// Static sisebar sticky
	$wp_customize->add_setting( 'carrino_static_sidebar_sticky', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_static_sidebar_sticky', array(
		'label'       => esc_html__( 'Make Static Sidebar Sticky', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'checkbox',
	) );

	//  Excerpt length

	$wp_customize->add_setting( 'carrino_excerpt_length', array(
		'default'           => '30',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'carrino_excerpt_length', array(
		'label'       => esc_html__( 'Excerpt Length', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		    ),
	) );

	// Toggle post format icons
	$wp_customize->add_setting( 'carrino_post_format_icons', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_post_format_icons', array(
		'label'       => esc_html__( 'Show Post Format Icons', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'checkbox',
	) );

	// Toggle Gto Top
	$wp_customize->add_setting( 'carrino_goto_top', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_goto_top', array(
		'label'       => esc_html__( 'Show Back To Top On Scroll', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'checkbox',
	) );

	// Pagination show Numbers
	$wp_customize->add_setting( 'carrino_pagination_numbers', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_pagination_numbers', array(
		'label'       => esc_html__( 'Show Archive Pagination Numbers', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'checkbox',
	) );

	// Pagination show Numbers
	$wp_customize->add_setting( 'carrino_pagination_arrows', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_pagination_arrows', array(
		'label'       => esc_html__( 'Show Pagination Arrows Instead of Text', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'checkbox',
	) );

	// Pagination Next Text
	$wp_customize->add_setting( 'carrino_pagination_next_text', array(
		'default'           => esc_html__( 'Next', 'carrino' ),
		'sanitize_callback' => 'carrino_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_pagination_next_text', array(
		'label'       => esc_html__( 'Pagination: Next Text', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'text',
	) );

	// Pagination Prev Text
	$wp_customize->add_setting( 'carrino_pagination_prev_text', array(
		'default'           => esc_html__( 'Previous', 'carrino' ),
		'sanitize_callback' => 'carrino_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_pagination_prev_text', array(
		'label'       => esc_html__( 'Pagination: Previous Text', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'text',
	) );

	// Footer text
	$wp_customize->add_setting( 'carrino_footer_text', array(
		'default'           => '',
		'sanitize_callback' => 'carrino_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_footer_text', array(
		'label'       => esc_html__( 'Footer Text', 'carrino' ),
		'section'     => 'carrino_general_settings',
		'type'        => 'text',
	) );

	// ========================================================
	// Homepage Settings
	// ========================================================

	$wp_customize->add_section( 'carrino_homepage_settings', array(
		'title'    => esc_html__( 'Homepage Settings', 'carrino' ),
		'priority' => 130,
		'panel' => 'carrino_theme_settings',
	) );

	// Sidebar
	$wp_customize->add_setting( 'carrino_homepage_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// Add Setting
		$wp_customize->add_setting( 'carrino_homepage_loop_title', array(
			'default'           => esc_html__( 'Latest Posts', 'carrino' ),
			'sanitize_callback' => 'carrino_sanitize_text',
		) );

		// Control Options
		$wp_customize->add_control( 'carrino_homepage_loop_title', array(
			'label'       => esc_html__( 'Title', 'carrino' ),
			'section'     => 'carrino_homepage_settings',
			'type'        => 'text',
		) );

		// ========================================================
		// Standard Loop Settings
		// ========================================================

		// Post layout
		$wp_customize->add_setting( 'carrino_homepage_layout', array(
			'default'           => 'masonry',
			'sanitize_callback' => 'carrino_sanitize_layout',
		) );

		$wp_customize->add_control( 'carrino_homepage_layout', array(
			'label'       => esc_html__( 'Post Layout', 'carrino' ),
			'section'     => 'carrino_homepage_settings',
			'type'        => 'select',
			'choices'     => array(
				'masonry' => esc_html__( 'Masonry', 'carrino' ),
				'grid' => esc_html__( 'Grid', 'carrino' ),
			),
		) );

		$wp_customize->add_setting( 'carrino_homepage_loop_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'carrino_sanitize_loop_style',
		) );

		$wp_customize->add_control( 'carrino_homepage_loop_style', array(
			'label'       => esc_html__( 'Post Style', 'carrino' ),
			'section'     => 'carrino_homepage_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'carrino' ),
				'cover' => esc_html__( 'Cover', 'carrino' ),
			),
		) );

		// Number of columns
		$wp_customize->add_setting( 'carrino_homepage_loop_cols', array(
			'default'           => '3',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'carrino_homepage_loop_cols', array(
			'label'       => esc_html__( 'Number of Columns', 'carrino' ),
			'section'     => 'carrino_homepage_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => 3,
		    ),
		) );

		// Number of columns
		$wp_customize->add_setting( 'carrino_homepage_loop_offset', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'carrino_homepage_loop_offset', array(
			'label'       => esc_html__( 'Loop Offset', 'carrino' ),
			'section'     => 'carrino_homepage_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 0,
		    ),
		) );

	//========POST META ---------------//

	// Show date meta
	$wp_customize->add_setting( 'carrino_homepage_post_excerpt', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_post_excerpt', array(
		'label'       => esc_html__( 'Excerpt', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// Show entry title
	$wp_customize->add_setting( 'carrino_homepage_entry_title', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_entry_title', array(
		'label'       => esc_html__( 'Entry Title', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// Show post thumbnail
	$wp_customize->add_setting( 'carrino_homepage_post_thumbnail', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_post_thumbnail', array(
		'label'       => esc_html__( 'Thumbnail', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// Homepage Standard Loop Image aspect ratio
	$wp_customize->add_setting( 'carrino_homepage_thumbnail_aspect_ratio', array(
		'default'           => 'uncropped',
		'sanitize_callback' => 'carrino_sanitize_aspect_ratio',
	) );

	$wp_customize->add_control( 'carrino_homepage_thumbnail_aspect_ratio', array(
		'label'       => esc_html__( 'Thumbnail Aspect Ratio', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'select',
		'choices'     => array(
			'landscape' => esc_html__( 'Landscape', 'carrino' ),
			'portrait' => esc_html__( 'Portrait', 'carrino' ),
			'square' => esc_html__( 'Square', 'carrino' ),
			'uncropped' => esc_html__( 'Uncropped', 'carrino' ),
		),
	) );

	// Show author meta
	$wp_customize->add_setting( 'carrino_homepage_entry_meta_author', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_entry_meta_author', array(
		'label'       => esc_html__( 'Author', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// Show author meta
	$wp_customize->add_setting( 'carrino_homepage_entry_meta_author_avatar', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_entry_meta_author_avatar', array(
		'label'       => esc_html__( 'Avatar', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// Show category meta
	$wp_customize->add_setting( 'carrino_homepage_entry_meta_category', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_entry_meta_category', array(
		'label'       => esc_html__( 'Category', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// Show read time
	if ( function_exists( 'threeforty_read_time') ) {
		$wp_customize->add_setting( 'carrino_homepage_entry_meta_read_time', array(
			'default'           => true,
			'sanitize_callback' => 'carrino_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'carrino_homepage_entry_meta_read_time', array(
			'label'       => esc_html__( 'Read Time', 'carrino' ),
			'section'     => 'carrino_homepage_settings',
			'type'        => 'checkbox',
		) );
	}

	// Show date meta
	$wp_customize->add_setting( 'carrino_homepage_entry_meta_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_entry_meta_comment_count', array(
		'label'       => esc_html__( 'Comment Count', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// Show date meta
	$wp_customize->add_setting( 'carrino_homepage_entry_meta_date', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_homepage_entry_meta_date', array(
		'label'       => esc_html__( 'Date', 'carrino' ),
		'section'     => 'carrino_homepage_settings',
		'type'        => 'checkbox',
	) );

	// ========================================================
	// Archive/Category Page Settings
	// ========================================================

	$wp_customize->add_section( 'carrino_archive_settings', array(
		'title'    => esc_html__( 'Archive/Category Settings', 'carrino' ),
		'priority' => 130,
		'panel' => 'carrino_theme_settings',
	) );

	// Sidebar
	$wp_customize->add_setting( 'carrino_archive_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Post Layout
		$wp_customize->add_setting( 'carrino_archive_layout', array(
			'default'           => 'masonry',
			'sanitize_callback' => 'carrino_sanitize_layout',
		) );

		$wp_customize->add_control( 'carrino_archive_layout', array(
			'label'       => esc_html__( 'Post Layout', 'carrino' ),
			'section'     => 'carrino_archive_settings',
			'type'        => 'select',
			'choices'     => array(
				'masonry' => esc_html__( 'Masonry', 'carrino' ),
				'grid' => esc_html__( 'Grid', 'carrino' ),
			),
		) );

		$wp_customize->add_setting( 'carrino_archive_loop_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'carrino_sanitize_loop_style',
		) );

		$wp_customize->add_control( 'carrino_archive_loop_style', array(
			'label'       => esc_html__( 'Post Style', 'carrino' ),
			'section'     => 'carrino_archive_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'carrino' ),
				'cover' => esc_html__( 'Cover', 'carrino' ),
			),
		) );


		// Number of columns
		$wp_customize->add_setting( 'carrino_archive_loop_cols', array(
			'default'           => '3',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'carrino_archive_loop_cols', array(
			'label'       => esc_html__( 'Number of Columns', 'carrino' ),
			'section'     => 'carrino_archive_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => 3,
		    ),
		) );

	//========POST META ---------------//

	// Show date meta
	$wp_customize->add_setting( 'carrino_archive_post_excerpt', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_post_excerpt', array(
		'label'       => esc_html__( 'Excerpt', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show entry title
	$wp_customize->add_setting( 'carrino_archive_entry_title', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_entry_title', array(
		'label'       => esc_html__( 'Entry Title', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show post thumbnail
	$wp_customize->add_setting( 'carrino_archive_post_thumbnail', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_post_thumbnail', array(
		'label'       => esc_html__( 'Thumbnail', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Homepage Standard Loop Image aspect ratio
	$wp_customize->add_setting( 'carrino_archive_thumbnail_aspect_ratio', array(
		'default'           => 'uncropped',
		'sanitize_callback' => 'carrino_sanitize_aspect_ratio',
	) );

	$wp_customize->add_control( 'carrino_archive_thumbnail_aspect_ratio', array(
		'label'       => esc_html__( 'Thumbnail Aspect Ratio', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'select',
		'choices'     => array(
			'landscape' => esc_html__( 'Landscape', 'carrino' ),
			'portrait' => esc_html__( 'Portrait', 'carrino' ),
			'square' => esc_html__( 'Square', 'carrino' ),
			'uncropped' => esc_html__( 'Uncropped', 'carrino' ),
		),
	) );

	// Show author meta
	$wp_customize->add_setting( 'carrino_archive_entry_meta_author', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_entry_meta_author', array(
		'label'       => esc_html__( 'Author', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show author meta avatar
	$wp_customize->add_setting( 'carrino_archive_entry_meta_author_avatar', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_entry_meta_author_avatar', array(
		'label'       => esc_html__( 'Avatar', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show category meta
	$wp_customize->add_setting( 'carrino_archive_entry_meta_category', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_entry_meta_category', array(
		'label'       => esc_html__( 'Category', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show rread time
	if ( function_exists( 'threeforty_read_time') ) {
		$wp_customize->add_setting( 'carrino_archive_entry_meta_read_time', array(
			'default'           => true,
			'sanitize_callback' => 'carrino_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'carrino_archive_entry_meta_read_time', array(
			'label'       => esc_html__( 'Read Time', 'carrino' ),
			'section'     => 'carrino_archive_settings',
			'type'        => 'checkbox',
		) );
	}

	// Show date meta
	$wp_customize->add_setting( 'carrino_archive_entry_meta_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_entry_meta_comment_count', array(
		'label'       => esc_html__( 'Comment Count', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show date meta
	$wp_customize->add_setting( 'carrino_archive_entry_meta_date', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_entry_meta_date', array(
		'label'       => esc_html__( 'Date', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	/**
	Separator
	**/
	$wp_customize->add_setting('carrino_archive_customize_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Carrino_Separator_Custom_Control($wp_customize, 'carrino_archive_customize_separator', array(
		'settings'		=> 'carrino_archive_customize_separator',
		'section'  		=> 'carrino_archive_settings',
	)));

	/**
    Info Header
    **/
    $wp_customize->add_setting('carrino_archive_title_header', array(
        'default'           => '',
        'sanitize_callback' => 'carrino_sanitize_text',
     
    ));
    $wp_customize->add_control(new Carrino_Info_Custom_Control($wp_customize, 'carrino_archive_title_header', array(
        'label'         => esc_html__('Archive Header', 'carrino'),
        'settings'      => 'carrino_archive_title_header',
        'section'       => 'carrino_archive_settings',
    )));

	// Show post count
	$wp_customize->add_setting( 'carrino_archive_title', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_title', array(
		'label'       => esc_html__( 'Show Archive Title', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Archive Header Style
	$wp_customize->add_setting( 'carrino_archive_title_position', array(
		'default'           => 'header',
		'sanitize_callback' => 'carrino_sanitize_archive_title_position',
	) );

	$wp_customize->add_control( 'carrino_archive_title_position', array(
		'label'       => esc_html__( 'Archive Title Position', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'select',
		'choices'     => array(
			'loop' => esc_html__( 'In Loop', 'carrino' ),
			'header' => esc_html__( 'Header (Before Content)', 'carrino' ),
		),
	) );

	// Show post count
	$wp_customize->add_setting( 'carrino_archive_post_count', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_post_count', array(
		'label'       => esc_html__( 'Post Count', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show Description
	$wp_customize->add_setting( 'carrino_archive_description', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_description', array(
		'label'       => esc_html__( 'Description', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show author Avatar
	$wp_customize->add_setting( 'carrino_archive_author_avatar', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_author_avatar', array(
		'label'       => esc_html__( 'Author Avatar (loop view only)', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show Author Bio
	$wp_customize->add_setting( 'carrino_archive_author_bio', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_author_bio', array(
		'label'       => esc_html__( 'Author Bio', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show Author Social Media Channels
	$wp_customize->add_setting( 'carrino_archive_author_social_media', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_archive_author_social_media', array(
		'label'       => esc_html__( 'Author Social Media Channels', 'carrino' ),
		'section'     => 'carrino_archive_settings',
		'type'        => 'checkbox',
	) );

	// ========================================================
	// Single Post Settings
	// ========================================================

	$wp_customize->add_section( 'carrino_single_settings', array(
		'title'    => esc_html__( 'Single Posts Settings', 'carrino' ),
		'priority' => 130,
		'panel' => 'carrino_theme_settings',
	) );

	// Sidebar
	$wp_customize->add_setting( 'carrino_single_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_single_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'checkbox',
	) );

	// Post style
	$wp_customize->add_setting( 'carrino_single_post_style', array(
		'default'           => 'default',
		'sanitize_callback' => 'carrino_sanitize_loop_style',
	) );

	$wp_customize->add_control( 'carrino_single_post_style', array(
		'label'       => esc_html__( 'Post Layout Style', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'select',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'carrino' ),
			'cover' => esc_html__( 'Cover', 'carrino' ),
			'hero' => esc_html__( 'Hero', 'carrino' ),
		),
	) );

	// Image aspect ratio
	$wp_customize->add_setting( 'carrino_single_thumbnail_aspect_ratio', array(
		'default'           => 'uncropped',
		'sanitize_callback' => 'carrino_sanitize_aspect_ratio',
	) );

	$wp_customize->add_control( 'carrino_single_thumbnail_aspect_ratio', array(
		'label'       => esc_html__( 'Thumbnail Aspect Ratio', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'select',
		'choices'     => array(
			'landscape' => esc_html__( 'Landscape', 'carrino' ),
			'portrait' => esc_html__( 'Portrait', 'carrino' ),
			'square' => esc_html__( 'Square', 'carrino' ),
			'hero' => esc_html__( 'Hero', 'carrino' ),
			'uncropped' => esc_html__( 'Uncropped', 'carrino' ),
		),
	) );

	// Excerpt
	$wp_customize->add_setting( 'carrino_single_custom_excerpt', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'carrino_single_custom_excerpt', array(
		'label'       => esc_html__( 'Display Custom excerpt', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'carrino_single_entry_meta_author', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'carrino_single_entry_meta_author', array(
		'label'       => esc_html__( 'Author', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'carrino_single_entry_meta_author_avatar', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'carrino_single_entry_meta_author_avatar', array(
		'label'       => esc_html__( 'Avatar', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'carrino_single_entry_meta_date', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'carrino_single_entry_meta_date', array(
		'label'       => esc_html__( 'Date', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'checkbox',
	) );

	if ( function_exists( 'threeforty_read_time') ) {

		$wp_customize->add_setting( 'carrino_single_entry_meta_read_time', array(
			'default'           => false,
			'sanitize_callback' => 'carrino_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'carrino_single_entry_meta_read_time', array(
			'label'       => esc_html__( 'Read Time', 'carrino' ),
			'section'     => 'carrino_single_settings',
			'type'        => 'checkbox',
		) );

	}

	$wp_customize->add_setting( 'carrino_single_entry_meta_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'carrino_single_entry_meta_comment_count', array(
		'label'       => esc_html__( 'Comment Count', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'checkbox',
	) );

	// Excerpt
	$wp_customize->add_setting( 'carrino_single_post_navigation', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'carrino_single_post_navigation', array(
		'label'       => esc_html__( 'Display Previous/Next Post', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'checkbox',
	) );

	// Show Author Bio
	$wp_customize->add_setting( 'carrino_single_author_bio', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_single_author_bio', array(
		'label'       => esc_html__( 'Display Author Bio', 'carrino' ),
		'section'     => 'carrino_single_settings',
		'type'        => 'checkbox',
	) );

	if ( function_exists( 'threeforty_author_social_meta') ) {

		// Show Author Social
		$wp_customize->add_setting( 'carrino_single_author_social', array(
			'default'           => true,
			'sanitize_callback' => 'carrino_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'carrino_single_author_social', array(
			'label'       => esc_html__( 'Display Author Social Icons', 'carrino' ),
			'section'     => 'carrino_single_settings',
			'type'        => 'checkbox',
		) );

	}

	if ( function_exists( 'threeforty_share_content') ) {

		// Post Share Icons
	    $wp_customize->add_setting( 'carrino_single_share_post', array(
	        'default'           => true,
	        'sanitize_callback' => 'carrino_sanitize_checkbox',
	    ) );

	    $wp_customize->add_control( 'carrino_single_share_post', array(
	        'label'       => esc_html__( 'Display Post Share', 'carrino' ),
	        'section'     => 'carrino_single_settings',
	        'type'        => 'checkbox',
	        'priority' => 20,
	    ) );

	    // Post Share Position
	    $wp_customize->add_setting( 'carrino_single_share_post_position', array(
	        'default'           => 'side-bottom',
	        'sanitize_callback' => 'carrino_sanitize_share_post_position',
	    ) );

	    $wp_customize->add_control( 'carrino_single_share_post_position', array(
	        'label'       => esc_html__( 'Post Share Position', 'carrino' ),
	        'section'     => 'carrino_single_settings',
	        'type'        => 'select',
	        'priority' => 20,
	        'choices'     => array(
	            'side-bottom' => esc_html__( 'Side and Bottom', 'carrino' ),
	            'side' => esc_html__( 'Side', 'carrino' ),
	            'bottom' => esc_html__( 'Bottom', 'carrino' ),
	        ),
	    ) );

	}

	// ========================================================
	// Page Settings
	// ========================================================

	$wp_customize->add_section( 'carrino_page_settings', array(
		'title'    => esc_html__( 'Page Settings', 'carrino' ),
		'priority' => 130,
		'panel' => 'carrino_theme_settings',
	) );

	// Sidebar
	$wp_customize->add_setting( 'carrino_page_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_page_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar', 'carrino' ),
		'section'     => 'carrino_page_settings',
		'type'        => 'checkbox',
	) );

	// Layout style
	$wp_customize->add_setting( 'carrino_page_style', array(
		'default'           => 'default',
		'sanitize_callback' => 'carrino_sanitize_loop_style',
	) );

	$wp_customize->add_control( 'carrino_page_style', array(
		'label'       => esc_html__( 'Page Layout Style', 'carrino' ),
		'section'     => 'carrino_page_settings',
		'type'        => 'select',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'carrino' ),
			'cover' => esc_html__( 'Cover', 'carrino' ),
			'hero' => esc_html__( 'Hero', 'carrino' ),
		),
	) );

	// Image aspect ratio
	$wp_customize->add_setting( 'carrino_page_thumbnail_aspect_ratio', array(
		'default'           => 'uncropped',
		'sanitize_callback' => 'carrino_sanitize_aspect_ratio',
	) );

	$wp_customize->add_control( 'carrino_page_thumbnail_aspect_ratio', array(
		'label'       => esc_html__( 'Thumbnail Aspect Ratio', 'carrino' ),
		'section'     => 'carrino_page_settings',
		'type'        => 'select',
		'choices'     => array(
			'landscape' => esc_html__( 'Landscape', 'carrino' ),
			'portrait' => esc_html__( 'Portrait', 'carrino' ),
			'square' => esc_html__( 'Square', 'carrino' ),
			'hero' => esc_html__( 'Hero', 'carrino' ),
			'uncropped' => esc_html__( 'Uncropped', 'carrino' ),
		),
	) );

	// ========================================================
	// Header Settings
	// ========================================================

	$wp_customize->add_section( 'carrino_header_settings', array(
		'title'    => esc_html__( 'Header Settings', 'carrino' ),
		'priority' => 130,
		'panel' => 'carrino_theme_settings',
	) );

	// Layout style
	$wp_customize->add_setting( 'carrino_header_layout', array(
		'default'           => 'default',
		'sanitize_callback' => 'carrino_sanitize_header_layout',
	) );

	$wp_customize->add_control( 'carrino_header_layout', array(
		'label'       => esc_html__( 'Header Layout', 'carrino' ),
		'section'     => 'carrino_header_settings',
		'type'        => 'select',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'carrino' ),
			'logo-split-menu' => esc_html__( 'Logo Center Split Menu', 'carrino' ),
		),
	) );

	// Enable toggle menu
	$wp_customize->add_setting( 'carrino_toggle_menu', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_toggle_menu', array(
		'label'       => esc_html__( 'Show Toggle Menu on Desktop', 'carrino' ),
		'section'     => 'carrino_header_settings',
		'type'        => 'checkbox',
	) );

	// Enable toggle search
	$wp_customize->add_setting( 'carrino_toggle_search', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_toggle_search', array(
		'label'       => esc_html__( 'Show Search Toggle on Desktop', 'carrino' ),
		'section'     => 'carrino_header_settings',
		'type'        => 'checkbox',
	) );

	// Enable toggle search
	$wp_customize->add_setting( 'carrino_sticky_nav', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_sticky_nav', array(
		'label'       => esc_html__( 'Make Header Nav Sticky', 'carrino' ),
		'section'     => 'carrino_header_settings',
		'type'        => 'checkbox',
	) );

}

add_action( 'customize_register', 'carrino_customize_register' );

// ========================================================
// Sanitize Checkbox
// ========================================================
/**
* @param $input
* @return bool
*/
function carrino_sanitize_checkbox( $input ) {

		return ( $input === true ) ? true : false;

}

// ========================================================
// Santitize text field
// ========================================================
function carrino_sanitize_text( $text ) {
    return sanitize_text_field( $text );
}

// ========================================================
// Santitize share post position
// ========================================================
function carrino_sanitize_share_post_position( $input ) {

    $valid = array(
        'side-bottom' => esc_html__( 'Side and Bottom', 'carrino' ),
        'side' => esc_html__( 'Side', 'carrino' ),
        'bottom' => esc_html__( 'Bottom', 'carrino' ),
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    }

    return '';
}

// ========================================================
// Sanitize post layout
// ========================================================
function carrino_sanitize_layout( $input ) {
	$valid = array(
		'masonry' => esc_html__( 'Masonry', 'carrino' ),
		'grid' => esc_html__( 'Grid', 'carrino' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize post loop style
// ========================================================
function carrino_sanitize_loop_style( $input ) {
	$valid = array(
		'default' => esc_html__( 'Default', 'carrino' ),
		'cover' => esc_html__( 'Cover', 'carrino' ),
		'hero' => esc_html__( 'Hero', 'carrino' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize archive header/title position
// ========================================================
function carrino_sanitize_archive_title_position( $input ) {
	$valid = array(
		'loop' => esc_html__( 'In Loop', 'carrino' ),
		'header' => esc_html__( 'Header (Before Content)', 'carrino' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize thumbnail aspect ratio
// ========================================================
function carrino_sanitize_aspect_ratio( $input ) {
	$valid = array(
		'landscape' => esc_html__( 'Landscape', 'carrino' ),
		'portrait' => esc_html__( 'Portrait', 'carrino' ),
		'square' => esc_html__( 'Square', 'carrino' ),
		'hero' => esc_html__( 'Hero', 'carrino' ),
		'uncropped' => esc_html__( 'Uncropped', 'carrino' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize post type
// ========================================================
function carrino_sanitize_post_type( $input ) {
	$valid = array(
		'recent' => esc_html__( 'Recent Posts', 'carrino' ),
		'popular' => esc_html__( 'Popular Posts', 'carrino' ),
		'post_ids' => esc_html__( 'Specific Posts (Enter post IDs below)', 'carrino' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize header layout
// ========================================================
function carrino_sanitize_header_layout( $input ) {
	$valid = array(
		'default' => esc_html__( 'Default', 'carrino' ),
		'logo-center-icons' => esc_html__( 'Logo Center with Icons', 'carrino' ),
		'logo-left-menu-right' => esc_html__( 'Logo Left Menu Right', 'carrino' ),
		'logo-split-menu' => esc_html__( 'Logo Center Split Menu', 'carrino' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize image upload
// ========================================================

function carrino_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}

// ========================================================
// Create an Array of categories
// ========================================================
function carrino_get_blog_categories() {

	$categories = get_categories('type=post');

	$cats = array('' => '');

	foreach( $categories as $category ) {
	    $cats[$category->term_id] = $category->name;
	}

	return $cats;
}