<?php

/**
 * Carrino WooCommerce Functions
 *
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.4
 * @version 1.0
 */

function carrino_woocommerce_setup() {
	add_theme_support( 'wc-product-gallery-lightbox' );
}
add_action( 'after_setup_theme', 'carrino_woocommerce_setup' );

// ========================================================
// Register Widget areas
// ========================================================

function carrino_woocommerce_widgets_init() {
	// Shop sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'carrino' ),
		'id'            => 'woocommerce-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your shop sidebar', 'carrino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'carrino_woocommerce_widgets_init' );

// ========================================================
// Enqueue scripts and styles
// ========================================================

if ( ! function_exists( 'carrino_woocommerce_scripts' ) ) {

	function carrino_woocommerce_scripts() {
		
		// CSS
		wp_enqueue_style('carrino-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css', array(), '1.0.0', 'all');
		wp_style_add_data( 'carrino-woocommerce-style', 'rtl', 'replace' );

	}
}
add_action( 'wp_enqueue_scripts', 'carrino_woocommerce_scripts' );

// ========================================================
// Filter pagination args
// ========================================================

if ( ! function_exists( 'carrino_woocommerce_pagination_args' ) ) {

	function carrino_woocommerce_pagination_args( $args ) {
		$args['prev_text'] = '<i class="icon-left-open"></i>';
		$args['next_text'] = '<i class="icon-right-open"></i>';
		return $args;
	}

}
add_filter( 'woocommerce_pagination_args', 'carrino_woocommerce_pagination_args' );

// ========================================================
// Set related products per row
// ========================================================

if ( ! function_exists( 'carrino_woocommerce_related_products_args' ) ) {

	function carrino_woocommerce_related_products_args( $args ) {
		$classes = get_body_class();
		$args['columns'] = ( in_array( 'has-sidebar', $classes ) && get_theme_mod( 'carrino_shop_related_products_cols', 3 ) === 4 ? 3 : get_theme_mod( 'carrino_shop_related_products_cols', 3 ) );
		return $args;
	}
}
add_filter( 'woocommerce_output_related_products_args', 'carrino_woocommerce_related_products_args', 20 );
add_filter( 'woocommerce_upsell_display_args', 'carrino_woocommerce_related_products_args', 20 );

// ========================================================
// Breadcrumb delimiter
// ========================================================

function carrino_woocommerce_breadcrumb_delimiter( $defaults ) {
  $defaults['delimiter'] = ' > ';
  return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'carrino_woocommerce_breadcrumb_delimiter' );

