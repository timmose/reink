<?php

/**
 * 340 Media: Social Media Customizer Settings
 *
 * @package WordPress
 * @subpackage threeforty
 * @since 1.0
 * @version 1.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register customizer settings

function threeforty_social_media_customize_register( $wp_customize ) {

    // Custom control
    require_once 'custom_controls.php';

	$wp_customize->add_section( 'threeforty_social_media', array(
		'title'    => esc_html__( '340 Media: Social Media Settings', 'threeforty-social-plugin' ),
		'description'    => esc_html__( 'Enter the full URLs of your social media channels', 'threeforty-social-plugin' ),
		'priority' => 160,
	) );

	 $social_sites = threeforty_get_social_sites( );

	 foreach( $social_sites as $social_site ) {

	 	 // Add Setting
	     $wp_customize->add_setting( $social_site, array(
	         'type' => 'theme_mod',
	         'capability' => 'edit_theme_options',
	         'sanitize_callback' => 'esc_url_raw',
	     ));

	     // Control Options
	     $wp_customize->add_control( $social_site, array(
	         'label' => ucwords( str_replace('threeforty_social_site_', '', $social_site ) ),
	         'section' => 'threeforty_social_media',
	         'type' => 'text',
	     ));
	 }

    /**
    Separator
    **/
    $wp_customize->add_setting('threeforty_social_settings_customize_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_html',
    ));
    $wp_customize->add_control(new Threeforty_Separator_Custom_Control($wp_customize, 'threeforty_social_settings_customize_separator', array(
        'settings'      => 'threeforty_social_settings_customize_separator',
        'section'       => 'threeforty_social_media',
    )));

    // ========================================================
    // Post share settings
    // ========================================================

    /**
    Info Header
    **/
    $wp_customize->add_setting('threeforty_share_post_header', array(
        'default'           => '',
        'sanitize_callback' => 'threeforty_sanitize_text',
     
    ));
    $wp_customize->add_control(new Threeforty_Info_Custom_Control($wp_customize, 'threeforty_share_post_header', array(
        'label'         => esc_html__('Post Share Settings', 'threeforty-social-plugin'),
        'description'   => esc_html__('Select the channels you would like to enable in the share post display', 'threeforty-social-plugin' ),
        'settings'      => 'threeforty_share_post_header',
        'section'       => 'threeforty_social_media',
    )));

     /**
      * Toggle channels
      * Styling Settings
      * Colour Settings
      */

     $share_sites = threeforty_get_share_sites();

     foreach( $share_sites as $share_site ) {

         // Add Setting
         $wp_customize->add_setting( 'threeforty_share_post_' . $share_site, array(
             'default' => true,
             'sanitize_callback' => 'threeforty_sanitize_checkbox',
             'desciption' => 'description here'
         ));

         // Control Options
         $wp_customize->add_control( 'threeforty_share_post_' . $share_site, array(
             'label' => ucwords( $share_site ),
             'section' => 'threeforty_social_media',
             'type' => 'checkbox',
             'priority' => 20,
         ));
     }

     // Post Share Icon Style
    $wp_customize->add_setting( 'threeforty_share_post_icon_style', array(
        'default'           => 'icon-background',
        'sanitize_callback' => 'threeforty_sanitize_share_post_icon_style',
    ) );

    $wp_customize->add_control( 'threeforty_share_post_icon_style', array(
        'label'       => esc_html__( 'Icon Style', 'threeforty-social-plugin' ),
        'section'     => 'threeforty_social_media',
        'type'        => 'radio',
        'priority' => 20,
        'choices'     => array(
            'icon-background' => esc_html__( 'With Background', 'threeforty-social-plugin' ),
            'icon' => esc_html__( 'No Background', 'threeforty-social-plugin' ),
        ),
    ) );

     // Post Share Icon Branding
    $wp_customize->add_setting( 'threeforty_share_post_icon_color_scheme', array(
        'default'           => 'theme',
        'sanitize_callback' => 'threeforty_sanitize_share_post_icon_color_scheme',
    ) );

    $wp_customize->add_control( 'threeforty_share_post_icon_color_scheme', array(
        'label'       => esc_html__( 'Icon Colour Scheme', 'threeforty-social-plugin' ),
        'section'     => 'threeforty_social_media',
        'type'        => 'radio',
        'priority' => 20,
        'choices'     => array(
            'theme' => esc_html__( 'Theme Colour Scheme', 'threeforty-social-plugin' ),
            'brand' => esc_html__( 'Brand Colour Scheme', 'threeforty-social-plugin' ),
        ),
    ) );

    // ========================================================
    // Add post share settings to single post settings section
    // ========================================================

     // Post Share Icons
    $wp_customize->add_setting( 'threeforty_single_share_post', array(
        'default'           => true,
        'sanitize_callback' => 'threeforty_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'threeforty_single_share_post', array(
        'label'       => esc_html__( 'Display Post Share', 'threeforty-social-plugin' ),
        'section'     => 'threeforty_single_settings',
        'type'        => 'checkbox',
        'priority' => 20,
    ) );

    // Post Share Position
    $wp_customize->add_setting( 'threeforty_single_share_post_position', array(
        'default'           => 'bottom',
        'sanitize_callback' => 'threeforty_sanitize_share_post_position',
    ) );

    $wp_customize->add_control( 'threeforty_single_share_post_position', array(
        'label'       => esc_html__( 'Post Share Position', 'threeforty-social-plugin' ),
        'section'     => 'threeforty_single_settings',
        'type'        => 'select',
        'priority' => 20,
        'choices'     => array(
            'side-bottom' => esc_html__( 'Side and Bottom', 'threeforty-social-plugin' ),
            'side' => esc_html__( 'Side', 'threeforty-social-plugin' ),
            'bottom' => esc_html__( 'Bottom', 'threeforty-social-plugin' ),
        ),
    ) );

}

add_action( 'customize_register', 'threeforty_social_media_customize_register' );


// ========================================================
// Array of social media sites
// ========================================================

if ( ! function_exists( 'threeforty_get_social_sites') ) {

    function threeforty_get_social_sites() {

         $social_sites = array(
         	 'threeforty_social_site_twitter',
         	 'threeforty_social_site_facebook',
             'threeforty_social_site_pinterest',
             'threeforty_social_site_youtube',
             'threeforty_social_site_instagram',
             'threeforty_social_site_flickr',
             'threeforty_social_site_vimeo',
             'threeforty_social_site_vkontakte',
             'threeforty_social_site_tumblr',
             'threeforty_social_site_dribbble',
             'threeforty_social_site_rss',
    		 'threeforty_social_site_email',
             'threeforty_social_site_linkedin',
             'threeforty_social_site_500px',
             'threeforty_social_site_soundcloud',
             'threeforty_social_site_spotify',
             'threeforty_social_site_mixcloud',
             'threeforty_social_site_medium',
             'threeforty_social_site_github',
             'threeforty_social_site_behance',
             'threeforty_social_site_reddit',
             'threeforty_social_site_gab',
             'threeforty_social_site_minds',
             'threeforty_social_site_bitchute',
             'threeforty_social_site_steemit',
             'threeforty_social_site_tiktok',
             'threeforty_social_site_odnoklassniki',
             
         );

     return $social_sites;

    }

}

// ========================================================
// Array of share post social media sites
// ========================================================

if ( ! function_exists( 'threeforty_get_share_sites') ) {

    function threeforty_get_share_sites() {

        $share_sites = array(
            'twitter',
            'facebook',
            'pinterest',
            'linkedin',
            'tumblr',
            'reddit',
            'pocket',
            'whatsapp',
            'vk',
            'odnoklassniki',
            'telegram',

        );

        return $share_sites;

    }

}

// ========================================================
// Sanitize Share Position
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_share_post_position') ) {

    function threeforty_sanitize_share_post_position( $input ) {

        $valid = array(
            'side-bottom' => esc_html__( 'Side and Bottom', 'threeforty-social-plugin' ),
            'side' => esc_html__( 'Side', 'threeforty-social-plugin' ),
            'bottom' => esc_html__( 'Bottom', 'threeforty-social-plugin' ),
        );

        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        }

        return '';
    }

}

// ========================================================
// Sanitize Icon Style
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_share_post_icon_style') ) {

    function threeforty_sanitize_share_post_icon_style( $input ) {

        $valid = array(
            'icon-background' => esc_html__( 'With Background', 'threeforty-social-plugin' ),
            'icon' => esc_html__( 'No Background', 'threeforty-social-plugin' ),
        );

        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        }

        return '';
    }

}

// ========================================================
// Sanitize Colour Scheme
// ========================================================

if ( ! function_exists( 'threeforty_sanitize_share_post_icon_color_scheme') ) {

    function threeforty_sanitize_share_post_icon_color_scheme( $input ) {

        $valid = array(
            'theme' => esc_html__( 'Theme Colour Scheme', 'threeforty-social-plugin' ),
            'brand' => esc_html__( 'Brand Colour Scheme', 'threeforty-social-plugin' ),
        );

        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        }

        return '';
    }

}


?>