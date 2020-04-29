<?php
/**
 * Carrino: WooCommerce Customizer Options
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.4
 * @version 1.0.0
 */


function carrino_woocommerce_customize_register( $wp_customize ) {


	// Group everything into a theme settings panel
	$wp_customize->add_section( 'carrino_woocommerce_settings', array(
		'title'    => esc_html__( 'Carrino: Shop Settings', 'carrino' ),
		'priority' => 140,
	) );

	// ========================================================
	// General Theme Settings
	// ========================================================

	// Toggle sidebar
	$wp_customize->add_setting( 'carrino_shop_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_shop_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar on Main Shop Page', 'carrino' ),
		'section'     => 'carrino_woocommerce_settings',
		'type'        => 'checkbox',
	) );

	// Toggle sidebar
	$wp_customize->add_setting( 'carrino_shop_category_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_shop_category_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar on Shop Category Page', 'carrino' ),
		'section'     => 'carrino_woocommerce_settings',
		'type'        => 'checkbox',
	) );

	// Toggle sidebar
	$wp_customize->add_setting( 'carrino_shop_product_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_shop_product_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar on Product Page', 'carrino' ),
		'section'     => 'carrino_woocommerce_settings',
		'type'        => 'checkbox',
	) );

	// Toggle sidebar
	$wp_customize->add_setting( 'carrino_shop_checkout_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_shop_checkout_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar on Checkout/Cart Page', 'carrino' ),
		'section'     => 'carrino_woocommerce_settings',
		'type'        => 'checkbox',
	) );

	// Toggle sidebar
	$wp_customize->add_setting( 'carrino_shop_breadcrumbs', array(
		'default'           => false,
		'sanitize_callback' => 'carrino_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'carrino_shop_breadcrumbs', array(
		'label'       => esc_html__( 'Display Breadcrumbs', 'carrino' ),
		'section'     => 'carrino_woocommerce_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'carrino_shop_related_products_cols', array(
		'default'           => '3',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'carrino_shop_related_products_cols', array(
		'label'       => esc_html__( 'Related Products Columns', 'carrino' ),
		'section'     => 'carrino_woocommerce_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 2,
		        'max' => 4,
		    ),
	) );

}

add_action( 'customize_register', 'carrino_woocommerce_customize_register' );