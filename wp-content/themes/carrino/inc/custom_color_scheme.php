<?php 

/**
 * Customizer Colour Options
 *
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.2
 */

/**
 * Generate and output inline (in header) CSS for Colour Customizer
 */

function carrino_custom_color_scheme() {


		$theme_color_one = ( get_theme_mod( 'theme_color_one', '#6c5b7b' ) !== '#6c5b7b' ? '--theme-color-1:' . get_theme_mod( 'theme_color_one', '#6c5b7b' ) . ';' : '' );
		$theme_color_two = ( get_theme_mod( 'theme_color_two', '#f67280' ) !== '#f67280' ? '--theme-color-2:' . get_theme_mod( 'theme_color_two', '#f67280' ) . ';' : '' ); 
		$very_dark_grey = ( get_theme_mod( 'very_dark_grey', '#2e2f33' ) !== '#2e2f33' ? '--very-dark-grey:' . get_theme_mod( 'very_dark_grey', '#2e2f33' ) . ';' : '' ); 
		$dark_grey = ( get_theme_mod( 'dark_grey', '#45464b' ) !== '#45464b' ? '--dark-grey:' . get_theme_mod( 'dark_grey', '#45464b' ) . ';' : '' ); 
		$medium_grey = ( get_theme_mod( 'medium_grey', '#94979e' ) !== '#94979e' ? '--medium-grey:' . get_theme_mod( 'medium_grey', '#94979e' ) . ';' : '' );
		$light_grey = ( get_theme_mod( 'light_grey', '#D3D3D3' ) !== '#D3D3D3' ? '--light-grey:' . get_theme_mod( 'light_grey', '#D3D3D3' ) . ';' : '' );
		$link_color = ( get_theme_mod( 'link_color', '#6c5b7b' ) !== '#6c5b7b' ? '--link-color:' . get_theme_mod( 'link_color', '#6c5b7b' ) . ';' : '' );
		$link_hover_color = ( get_theme_mod( 'link_hover_color', '#f67280' ) !== '#f67280' ? '--link-hover-color:' . get_theme_mod( 'link_hover_color', '#f67280' ) . ';' : '' );
		$primary_nav_link_color = ( get_theme_mod( 'primary_nav_link_color', '#6c6f76' ) !== '#6c6f76' ? '--primary-nav-link-color:' . get_theme_mod( 'primary_nav_link_color', '#6c6f76' ) . ';' : '' );
		$primary_nav_link_hover_color = ( get_theme_mod( 'primary_nav_link_hover_color', '#f67280' ) !== '#f67280' ? '--primary-nav-link-hover-color:' . get_theme_mod( 'primary_nav_link_hover_color', '#f67280' ) . ';' : '' );

		$primary_nav_submenu_link_color = ( get_theme_mod( 'primary_nav_submenu_link_color', '#6c6f76' ) !== '#6c6f76' ? '--primary-nav-submenu-link-color:' . get_theme_mod( 'primary_nav_submenu_link_color', '#6c6f76' ) . ';' : '' );
		$primary_nav_submenu_link_hover_color = ( get_theme_mod( 'primary_nav_submenu_link_hover_color', '#f67280' ) !== '#f67280' ? '--primary-nav-submenu-link-hover-color:' . get_theme_mod( 'primary_nav_submenu_link_hover_color', '#f67280' ) . ';' : '' );
		$primary_nav_sidebar_link_color = ( get_theme_mod( 'primary_nav_sidebar_link_color', '#6c6f76' ) !== '#6c6f76' ? '--primary-nav-sidebar-link-color:' . get_theme_mod( 'primary_nav_sidebar_link_color', '#6c6f76' ) . ';' : '' );
		$entry_font_color = ( get_theme_mod( 'entry_font_color', '#45464b' ) !== '#45464b' ? '--single-entry-font-color:' . get_theme_mod( 'entry_font_color', '#45464b' ) . ';' : '' );
		$light_border_color = ( get_theme_mod( 'light_border_color', '#f1f1f1' ) !== '#f1f1f1' ? '--light-border-color:' . get_theme_mod( 'light_border_color', '#f1f1f1' ) . ';' : '' );
		$medium_border_color = ( get_theme_mod( 'medium_border_color', '#e5e5e5' ) !== '#e5e5e5' ? '--light-border-color:' . get_theme_mod( 'medium_border_color', '#e5e5e5' ) . ';' : '' );
		$very_light_background_color = ( get_theme_mod( 'very_light_background_color', '#f9f9f9' ) !== '#f9f9f9' ? '--very-light-background-color:' . get_theme_mod( 'very_light_background_color', '#f9f9f9' ) . ';' : '' );
		// Custom header
		$header_background_color = ( '' !== get_theme_mod( 'header_background_color', '' ) ? '--custom-header-background:' . get_theme_mod( 'header_background_color', '' ) . ';' : '' );
		$header_toggle_background_color = ( '' !== get_theme_mod( 'header_toggle_background_color', '' ) ? '--toggle-background-color:' . get_theme_mod( 'header_toggle_background_color', '' ) . ';' : '' );
		$header_toggle_hover_background_color = ( '' !== get_theme_mod( 'header_toggle_hover_background_color', '' ) ? '--toggle-hover-background-color:' . get_theme_mod( 'header_toggle_hover_background_color', '' ) . ';' : '' );
		$header_toggle_icon_color = ( '' !== get_theme_mod( 'header_toggle_icon_color', '' ) ? '--toggle-icon-color:' . get_theme_mod( 'header_toggle_icon_color', '' ) . ';' : '' );
		$header_logo_color = ( '' !== get_theme_mod( 'header_logo_color', '' ) ? '--logo-color:' . get_theme_mod( 'header_logo_color', '' ) . ';' : '' );
		$hero_title_background_color = ( '' !== get_theme_mod( 'hero_title_background_color', '' ) ? '--hero-title-background-color:' . get_theme_mod( 'hero_title_background_color', '' ) . ';' : '' );
		$hero_title_color = ( '' !== get_theme_mod( 'hero_title_color', '' ) ? '--hero-title-color:' . get_theme_mod( 'hero_title_color', '' ) . ';' : '' );
		$custom_colors = array(
			$theme_color_one,
			$theme_color_two,
			$very_dark_grey,
			$dark_grey,
			$medium_grey,
			$light_grey,
			$link_color,
			$link_hover_color,
			$primary_nav_link_color,
			$primary_nav_link_hover_color,
			$primary_nav_submenu_link_color,
			$primary_nav_submenu_link_hover_color,
			$primary_nav_sidebar_link_color,
			$entry_font_color,
			$light_border_color,
			$medium_border_color,
			$very_light_background_color,
			$header_background_color,
			$header_toggle_background_color,
			$header_toggle_hover_background_color,
			$header_toggle_icon_color,
			$header_logo_color,
			$hero_title_background_color,
			$hero_title_color,
		);

		$color_vars = array_filter($custom_colors);

		if ( count($color_vars) !== 0 ) : ?>


<style>
:root {
 <?php echo wp_strip_all_tags( $theme_color_one ); ?>
 <?php echo wp_strip_all_tags( $theme_color_two ); ?>
 <?php echo wp_strip_all_tags( $very_dark_grey ); ?>
 <?php echo wp_strip_all_tags( $dark_grey ); ?>
 <?php echo wp_strip_all_tags( $medium_grey ); ?>
 <?php echo wp_strip_all_tags( $light_grey ); ?>
 <?php echo wp_strip_all_tags( $link_color ); ?>
 <?php echo wp_strip_all_tags( $link_hover_color ); ?>
 <?php echo wp_strip_all_tags( $primary_nav_link_color ); ?>
 <?php echo wp_strip_all_tags( $primary_nav_link_hover_color ); ?>
 <?php echo wp_strip_all_tags( $primary_nav_submenu_link_color ); ?>
 <?php echo wp_strip_all_tags( $primary_nav_submenu_link_hover_color ); ?>
 <?php echo wp_strip_all_tags( $primary_nav_sidebar_link_color ); ?>
 <?php echo wp_strip_all_tags( $entry_font_color ); ?>
 <?php echo wp_strip_all_tags( $light_border_color ); ?>
 <?php echo wp_strip_all_tags( $medium_border_color ); ?>
 <?php echo wp_strip_all_tags( $very_light_background_color ); ?>
 <?php echo wp_strip_all_tags( $header_background_color ); ?>
 <?php echo wp_strip_all_tags( $header_toggle_background_color ); ?>
 <?php echo wp_strip_all_tags( $header_toggle_hover_background_color ); ?>
 <?php echo wp_strip_all_tags( $header_toggle_icon_color ); ?>
 <?php echo wp_strip_all_tags( $header_logo_color ); ?>
 <?php echo wp_strip_all_tags( $hero_title_background_color ); ?>
 <?php echo wp_strip_all_tags( $hero_title_color ); ?>

}
</style>

<?php endif;


}

add_action( 'wp_head', 'carrino_custom_color_scheme' ); // Enqueue the CSS Inline Style after the main stylesheet

 ?>