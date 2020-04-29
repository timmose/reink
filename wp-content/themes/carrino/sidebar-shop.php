<?php
/**
 * The sidebar containing the woocommerce widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.4
 * @version 1.0
 */

if ( ! is_active_sidebar( 'woocommerce-sidebar' ) || is_shop() && get_theme_mod( 'carrino_shop_sidebar', true ) === false || ( is_cart() || is_checkout() ) && get_theme_mod( 'carrino_shop_checkout_sidebar', false ) === false || is_product_category() && get_theme_mod( 'carrino_shop_category_sidebar', true ) === false || is_product() && get_theme_mod( 'carrino_shop_product_sidebar', true ) === false || is_account_page() && get_theme_mod( 'carrino_shop_account_sidebar', false ) === false ) {
	return;
}
?>

<aside class="aside-sidebar sidebar shop-sidebar" aria-label="<?php esc_attr_e( 'Shop Sidebar', 'carrino' ); ?>">
	<?php if ( get_theme_mod( 'carrino_static_sidebar_sticky', true )): ?>
	<div class="aside-sticky-container">
	<?php endif; ?>
		<?php

		// Widgets
		if (is_active_sidebar( 'woocommerce-sidebar' )) {
			dynamic_sidebar( 'woocommerce-sidebar');
		}

		?>
	<?php if ( get_theme_mod( 'carrino_static_sidebar_sticky', true )): ?>
	</div>
	<?php endif; ?>

</aside>
