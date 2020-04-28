<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<?php $sticky_nav = ( get_theme_mod( 'carrino_sticky_nav', false ) ? ' sticky-nav' : '' ); ?>

<body <?php body_class(); ?>>

	<!-- fade the body when slide menu is active -->
	<div class="body-fade"></div>

	<?php 

	// Add the site wrapper if we have a custom background

	if ( ! empty( get_background_image() ) || ! empty( get_background_color() ) ) {

		echo '<div class="site-wrapper">';

	}

	?>

	<?php

	// Before header hook
	threeforty_before_header();

	?>

	<header id="site-header" class="site-header <?php echo esc_attr( get_theme_mod( 'carrino_header_layout', 'default' ) ) . esc_attr( $sticky_nav ); ?>">

		<div class="container header-layout-wrapper">

			<?php 

			// Output the mobile toggle icons
			// These replace the primary in small resolutions

			$show_toggle_menu = '';
			if ( ! get_theme_mod( 'carrino_toggle_menu', true ) || get_theme_mod( 'carrino_header_layout' ) !== 'logo-center-icons' || 
				 ( get_theme_mod( 'carrino_toggle_menu', true ) && ( ! is_active_sidebar( 'sidebar-1' ) && has_nav_menu( 'slide-menu-primary') && ! get_theme_mod( 'carrino_sidebar_primary_nav', false ) ) || ( ! is_active_sidebar( 'sidebar-1' ) && has_nav_menu( 'primary') && ! get_theme_mod( 'carrino_sidebar_primary_nav', false ) ) ) ) {
				$show_toggle_menu = ' mobile-only';
			}
			$show_toggle_search = '';
			if ( ! get_theme_mod( 'carrino_toggle_search', true ) || get_theme_mod( 'carrino_header_layout' ) !== 'logo-center-icons' ) {
				$show_toggle_search = ' mobile-only';
			}
			$show_mobile_logo = ( get_theme_mod( 'carrino_header_layout', 'default' ) === 'logo-split-menu' ? ' mobile-only' : '' );

			?>

			<span class="toggle toggle-menu<?php echo esc_attr( $show_toggle_menu ); ?>">
				<span><i class="icon-menu-1"></i></span><span class="screen-reader-text"><?php echo esc_html__( 'Menu', 'carrino' ); ?></span>
			</span>


	
				<?php

					if ( has_custom_logo( ) ) { 
						the_custom_logo( );
						} else {
							echo '<h1 class="logo-wrapper' . esc_attr( $show_mobile_logo ) . '">' . get_custom_logo( ) . '</h1>';
					}
					
				?>


					<span class="toggle toggle-search<?php echo esc_attr( $show_toggle_search ); ?>"><span><i class="icon-search"></i></span><span class="screen-reader-text"><?php echo esc_html__( 'Search', 'carrino' ); ?></span></span>


					<?php

					// The primary nav
					if ( has_nav_menu( 'primary' ) && get_theme_mod( 'carrino_header_layout', 'default' ) === 'logo-left-menu-right' ) {

					    wp_nav_menu( array( 'theme_location' => 'primary',
					     					'container' => 'nav',
					     					'container_class' => 'menu-primary-navigation-container',
					     					'menu_class' => 'primary-nav',
					     					'menu_id' => 'primary-nav'));

					}

					?>

		</div>
			
		<?php

		// Split Menu Header layout

		if ( get_theme_mod( 'carrino_header_layout', 'default' ) !== 'logo-left-menu-right' ) {

			if ( get_theme_mod( 'carrino_header_layout', 'default' ) === 'logo-split-menu' ) { ?>

				<nav class="menu-primary-navigation-container">
					<ul class="primary-nav" id="primary-nav">
						<?php if ( get_theme_mod( 'carrino_toggle_menu', true ) && ( ! is_active_sidebar( 'sidebar-1' ) && has_nav_menu( 'slide-menu-primary') &&  get_theme_mod( 'carrino_sidebar_primary_nav', false ) ) || ( ! is_active_sidebar( 'sidebar-1' ) && has_nav_menu( 'primary') && get_theme_mod( 'carrino_sidebar_primary_nav', false ) ) || get_theme_mod( 'carrino_toggle_menu', true ) && is_active_sidebar( 'sidebar-1' ) ) : ?>
							<li class="toggle toggle-menu alignleft"><span><i class="icon-menu-1"></i></span></li>
						<?php endif; ?>
						<li class="menu-item split-menu">

						<?php 

						wp_nav_menu( array( 'theme_location' => 'split-menu-left',
				     					'container' => 'div',
				     					'menu_class' => 'split-menu-left',
				     					'menu_id' => 'split-menu-left'));

				     	?>

				 		</li>
				 		<li class="menu-item logo-in-menu">
						 <?php

						 if ( has_custom_logo( ) ) { 
								the_custom_logo( );
								} else {
									echo '<h1 class="logo-wrapper">' . get_custom_logo( ) . '</h1>';
							}

						?>

						</li>
						<li class="menu-item split-menu">

						<?php wp_nav_menu( array( 'theme_location' => 'split-menu-right',
				     					'container' => 'div',
				     					'menu_class' => 'split-menu-right',
				     					'menu_id' => 'split-menu-right'));

				     					?>

				 		</li>
				 		<?php if ( get_theme_mod( 'carrino_toggle_search', true ) ): ?>
					 		<li class="toggle toggle-search alignright"><span><i class="icon-search"></i></span></li>
					 	<?php endif; ?>
				 	</ul>
				 </nav>


			<?php } else {

				// Default Header Layout

				if ( has_nav_menu( 'primary' ) ) {

				    wp_nav_menu( array( 'theme_location' => 'primary',
				     					'container' => 'nav',
				     					'container_class' => 'menu-primary-navigation-container',
				     					'menu_class' => 'primary-nav',
				     					'menu_id' => 'primary-nav'));

				}

			}

		}

		?>

	</header><!-- .site-header -->

	<!-- site search -->
	<div class="site-search">
		<i class="icon-cancel toggle-search"></i>
		<?php 

			// Diplay the search form
			get_search_form( );

			?>
	</div>

	<?php 
		get_sidebar();
	?>

	<?php

	// After header hook
	threeforty_after_header();

	?>

