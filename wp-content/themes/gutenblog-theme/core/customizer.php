<?php

/********************
 *
 * Customizer Functions
 *
 ********************/


if ( ! class_exists( 'Kirki' ) ) {
	get_template_part('inc/gutenblog-kirki');
	get_template_part('inc/gutenblog-kirki-installer');
    // include_once( dirname( __FILE__ ) . '../../inc/gutenblog-kirki.php' ); // fallback
    // include_once( dirname( __FILE__ ) . '../../inc/gutenblog-kirki-installer.php' ); // installer
}

require get_template_directory() . '/customize/theme-defaults.php' ;
require get_template_directory() . '/customize/customizer.php' ;

function gutenblog_customize_register( $wp_customize ) {
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->get_section('colors')->title = esc_html__( 'Custom Colors', 'gutenblog-theme' );
    $wp_customize->get_section('colors')->priority = 75;
}
add_action( 'customize_register', 'gutenblog_customize_register' );

if(is_admin())  add_action( 'customize_controls_enqueue_scripts', 'gutenblog_custom_customize_enqueue' );
function gutenblog_custom_customize_enqueue() {
    wp_enqueue_style( 'gutenblog-customizer', get_template_directory_uri() . '/customize/style.css' );
}