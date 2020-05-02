<?php
/**
 * Welcome Page
 */
require_once get_template_directory() . '/welcome-page/class.welcomepage.php';

/**
 * Welcome page config
 */
$config = array(
	'menu_label'       => esc_html__( 'Gutenblog Theme', 'gutenblog-theme' ),
	'page_title'       => esc_html__( 'Gutenblog Theme', 'gutenblog-theme' ),
	/* Translators: Theme name */
	'welcome_title'   => sprintf( esc_html__( 'Welcome to %s, version ', 'gutenblog-theme' ), 'GutenBlog Theme' ),
	// 'welcome_content' => '',
	/**
	 * Tabs
	 */
	'tabs' => array(
		'getting_started' => esc_html__( 'Getting Started', 'gutenblog-theme' ),
		'recommended'     => esc_html__( 'Recommended Plugins', 'gutenblog-theme' ),
        'support'         => esc_html__( 'Support', 'gutenblog-theme' ),
	),
	/**
	 * Getting started tab
	 */
	'getting_started' => array(
		'cards' => array(
			'one' => array(
				'title'       => esc_html__( 'Required Install', 'gutenblog-theme' ),
				'description' => esc_html__( 'To make your website settings more flexible, you need to install several plugins. One of the most important plugins is Kirki.', 'gutenblog-theme' ),
				'btn_label'   => esc_html__( 'Install Plugins', 'gutenblog-theme' ),
				'btn_url'     => esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ),
				'new_tab'     => false,
			),
			'two' => array(
				'title'       => esc_html__( 'Documentation', 'gutenblog-theme' ),
				'description' => esc_html__( 'If you have any questions of theme customization, check our online documentation.', 'gutenblog-theme' ),
				'btn_label'   => esc_html__( 'Documentation', 'gutenblog-theme' ),
				'btn_url'     => esc_url( 'https://ThemesMonsters.com/gutenblog/docs' ),
				'new_tab'     => true,
			),
			'three' => array(
				'title'       => esc_html__( 'Start Customization ', 'gutenblog-theme' ),
				'description' => esc_html__( 'Gutenblog theme is easy to customization! To customize the theme you can use the built-in WordPress Customizer.', 'gutenblog-theme' ),
				'btn_label'   => esc_html__( 'Customize Now', 'gutenblog-theme' ),
				'btn_url'     => esc_url( admin_url( 'customize.php' ) ),
				'new_tab'     => false,
			),
		),
	),


    /**
     * Recommended Plugins tab
     */
    'recommended' => array(
        'cards' => array(
            'one' => array(
                'title'       => esc_html__( 'Kirki plugin', 'gutenblog-theme' ),
                'description' => esc_html__( "Kirki helps us create rich experiences for the WordPress Customizer. Be sure to install and activate the Kirki plugin. It is required to make full use of the customization features of this theme.", "gutenblog-theme" ),
                'btn_label'   => esc_html__( 'Install Kirki', 'gutenblog-theme' ),
                'btn_url'     => esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ),
                'new_tab'     => false,
            ),
            'two' => array(
                'title'       => esc_html__( 'AMP for WordPress', 'gutenblog-theme' ),
                'description' => esc_html__( 'he Official AMP Plugin for WordPress supports fully integrated AMP publishing for WordPress sites, with robust capabilities and granular publisher controls.', 'gutenblog-theme' ),
                'btn_label'   => esc_html__( 'Install Now', 'gutenblog-theme' ),
                'btn_url'     => esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ),
                'new_tab'     => false,
            ),
        ),
    ),


    /**
	 * Support tab
	 */
	'support' => array(
		'cards' => array(
			'one' => array(
				'title'       => esc_html__( 'Theme Support', 'gutenblog-theme' ),
				'description' => esc_html__( 'Support for the free version of the theme only on the forum or the official WordPress page.', 'gutenblog-theme' ),
				'btn_label'   => esc_html__( 'Forum', 'gutenblog-theme' ),
				'btn_url'     => esc_url( 'https://www.ThemesMonsters.com/forum/' ),
				'new_tab'     => true,
			),


		),
	),


);
/**
 * Initialize Welcome page
 */
gutenblog_Welcome_Page::init( apply_filters( 'gutenblog_welcome_page_config', $config ) );
