<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

if ( ! is_active_sidebar( 'sidebar-1' ) && ! has_nav_menu( 'slide-menu-primary') && ! has_nav_menu( 'primary') ) {
	return;
}
?>

<aside class="mobile-navigation slide-menu sidebar" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'carrino' ); ?>">
		<span class="close-menu"><i class="icon-cancel"></i></span>
		<?php 

		// Check if we have anything to display here
		if ( get_theme_mod( 'carrino_sidebar_logo', true ) ) :

			if ( '' !== get_theme_mod( 'carrino_sidebar_logo_upload', '' ) ) {
				echo '<div class="logo-wrapper"><a class="custom-logo-link" href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="' . get_theme_mod( 'carrino_sidebar_logo_upload', '' ) . '" alt="' . get_bloginfo( 'name' ) . '" class="custom-logo" /></a></div>';
			} else {

			if ( has_custom_logo( ) ) { 
						the_custom_logo( );
						} else {
							echo '<h1 class="logo-wrapper">' . get_custom_logo( ) . '</h1>';
					}

				}

		endif;  ?>

		<?php 

		$mobile_only = ( get_theme_mod( 'carrino_sidebar_primary_nav', false ) ? '' : ' mobile-only' );

		// The primary sidebar nav
		if ( has_nav_menu( 'slide-menu-primary' ) ) {

			echo '<nav class="primary-nav-sidebar-wrapper' . esc_attr( $mobile_only ) . '">';

		    wp_nav_menu( array( 'theme_location' => 'slide-menu-primary',
		     					 'container' => 'ul',
		     					 'menu_class' => 'primary-nav-sidebar',
		     					 'menu_id' => 'primary-nav-sidebar',
		     					 'after'=>'<span class="expand"></span>'));

			echo '</nav>';

		} elseif ( has_nav_menu( 'primary' )) {

			echo '<nav class="primary-nav-sidebar-wrapper' . esc_attr( $mobile_only ) . '">';

		    wp_nav_menu( array( 'theme_location' => 'primary',
		     					 'container' => 'ul',
		     					 'menu_class' => 'primary-nav-sidebar',
		     					 'menu_id' => 'primary-nav-sidebar',
		     					 'after'=>'<span class="expand"></span>'));

			echo '</nav>';

		}
		// Widgets
		if (is_active_sidebar( 'sidebar-1' )) {
			dynamic_sidebar( 'sidebar-1');
		}

		?>
		
	</aside>
