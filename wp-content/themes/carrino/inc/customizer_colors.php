<?php
/**
 * Carrino: Customizer Colour Scheme Settings
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.2
 */

function carrino_color_scheme_customize_register( $wp_customize ) {

	// ========================================================
	// General Theme Settings
	// ========================================================

	$wp_customize->add_section( 'carrino_color_settings', array(
		'title'    => esc_html__( 'Carrino: Color Settings', 'carrino' ),
		'priority' => 130,
	) );

	 // Add Setting
	$wp_customize->add_setting( 'theme_color_one', array(
		'default'           => '#6c5b7b',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color_one', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Primary Theme Color One', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'theme_color_two', array(
		'default'           => '#f67280',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color_two', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Primary Theme Color Two', 'carrino' ),
    ) ) );

	// Add Setting
	$wp_customize->add_setting( 'very_dark_grey', array(
		'default'           => '#2e2f33',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'very_dark_grey', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Very Dark Grey', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'dark_grey', array(
		'default'           => '#45464b',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_grey', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Dark Grey', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'medium_grey', array(
		'default'           => '#94979e',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medium_grey', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Medium Grey', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'light_grey', array(
		'default'           => '#D3D3D3',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'light_grey', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Light Grey', 'carrino' ),
    ) ) );

    /**
	Separator
	**/
	$wp_customize->add_setting('carrino_link_color_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Carrino_Separator_Custom_Control($wp_customize, 'carrino_link_color_separator', array(
		'settings'		=> 'carrino_link_color_separator',
		'section'  		=> 'carrino_color_settings',
	)));

     // Add Setting
	$wp_customize->add_setting( 'link_color', array(
		'default'           => '#6c5b7b',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Link Color', 'carrino' ),
    ) ) );

    $wp_customize->add_setting( 'link_hover_color', array(
		'default'           => '#f67280',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Link Hover Color', 'carrino' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'primary_nav_link_color', array(
		'default'           => '#6c6f76',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_nav_link_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Primary Nav Link Color', 'carrino' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'primary_nav_link_hover_color', array(
		'default'           => '#f67280',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_nav_link_hover_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Primary Nav Link Hover Color', 'carrino' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'primary_nav_submenu_link_color', array(
		'default'           => '#6c6f76',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_nav_submenu_link_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Primary Nav Sub-Menu Link Color', 'carrino' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'primary_nav_submenu_link_hover_color', array(
		'default'           => '#f67280',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_nav_submenu_link_hover_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Primary Nav Sub-Menu Link Hover Color', 'carrino' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'primary_nav_sidebar_link_color', array(
		'default'           => '#6c6f76',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_nav_sidebar_link_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Primary Nav (Sidebar) Link Color', 'carrino' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'entry_font_color', array(
		'default'           => '#45464b',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'entry_font_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Entry Font Color', 'carrino' ),
    ) ) );

    /**
	Separator
	**/
	$wp_customize->add_setting('carrino_color_customize_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Carrino_Separator_Custom_Control($wp_customize, 'carrino_color_customize_separator', array(
		'settings'		=> 'carrino_color_customize_separator',
		'section'  		=> 'carrino_color_settings',
	)));

    // Add Setting
	$wp_customize->add_setting( 'light_border_color', array(
		'default'           => '#f1f1f1',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'light_border_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Light Border Color', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'medium_border_color', array(
		'default'           => '#e5e5e5',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medium_border_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Medium Border Color', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'light_border_color', array(
		'default'           => '#f1f1f1',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'light_border_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Light Border colour', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'very_light_background_color', array(
		'default'           => '#f9f9f9',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'very_light_background_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Very Light Background Color', 'carrino' ),
    ) ) );

    /**
	Separator
	**/
	$wp_customize->add_setting('carrino_header_color_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Carrino_Separator_Custom_Control($wp_customize, 'carrino_header_color_separator', array(
		'settings'		=> 'carrino_header_color_separator',
		'section'  		=> 'carrino_color_settings',
	)));

	// Add Setting
	$wp_customize->add_setting( 'header_background_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Header Background Color', 'carrino' ),
    ) ) );

      // Add Setting
	$wp_customize->add_setting( 'header_logo_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_logo_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Header Logo Color', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'header_toggle_background_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_toggle_background_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Header Toggle Icon Background Color', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'header_toggle_hover_background_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_toggle_hover_background_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Header Toggle Icon Hover Background Color', 'carrino' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'header_toggle_icon_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_toggle_icon_color', array(
      'section' => 'carrino_color_settings',
      'label'   => esc_html__( 'Header Toggle Icon Color', 'carrino' ),
    ) ) );

    if ( function_exists( 'threeforty_hero') ) {

	     /**
		Separator
		**/
		$wp_customize->add_setting('carrino_hero_color_separator', array(
			'default'           => '',
			'sanitize_callback' => 'esc_html',
		));
		$wp_customize->add_control(new Carrino_Separator_Custom_Control($wp_customize, 'carrino_hero_color_separator', array(
			'settings'		=> 'carrino_hero_color_separator',
			'section'  		=> 'carrino_color_settings',
		)));

		// Add Setting
		$wp_customize->add_setting( 'hero_title_background_color', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_title_background_color', array(
	      'section' => 'carrino_color_settings',
	      'label'   => esc_html__( 'Hero Title Background Color', 'carrino' ),
	    ) ) );

	      // Add Setting
		$wp_customize->add_setting( 'hero_title_color', array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		// Control Options
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_title_color', array(
	      'section' => 'carrino_color_settings',
	      'label'   => esc_html__( 'Hero Title Color', 'carrino' ),
	    ) ) );

	}



}

add_action( 'customize_register', 'carrino_color_scheme_customize_register' );