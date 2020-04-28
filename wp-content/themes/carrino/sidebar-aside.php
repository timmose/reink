<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.3
 * @version 1.0
 */

if ( ( is_single( ) && get_theme_mod( 'carrino_single_sidebar', false ) === false || is_home() && get_theme_mod( 'carrino_homepage_sidebar', true ) === false || ( is_archive() || is_search() ) && get_theme_mod( 'carrino_archive_sidebar', true ) === false || is_page() && get_theme_mod( 'carrino_page_sidebar', true ) === false ) || ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside class="aside-sidebar sidebar" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'carrino' ); ?>">
	<?php if ( get_theme_mod( 'carrino_static_sidebar_sticky', true )): ?>
	<div class="aside-sticky-container">
	<?php endif; ?>
		<?php

		// Widgets
		if (is_active_sidebar( 'sidebar-2' )) {
			dynamic_sidebar( 'sidebar-2');
		}

		?>
	<?php if ( get_theme_mod( 'carrino_static_sidebar_sticky', true )): ?>
	</div>
	<?php endif; ?>

</aside>
