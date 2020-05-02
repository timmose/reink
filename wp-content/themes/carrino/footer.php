<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

?>

<?php

// Before Footer Hook
threeforty_before_footer();

?>

<?php 

	if ( is_active_sidebar( 'footer-top' ) ) {
		echo '<div class="footer-widget-area footer-top flex-grid cols-1 container">';
		dynamic_sidebar( 'footer-top' );
		echo '</div>';
	}
	
?>

		<footer id="colophon" class="site-footer">

			<div class="container">

			<?php get_template_part( 'template-parts/footer/footer', 'columns' ); ?>

					<?php 

						if ( is_active_sidebar( 'footer-bottom' ) ) {
							echo '<div class="footer-widget-area footer-bottom flex-grid cols-1">';
							// echo '<div class="flex-box">';
							dynamic_sidebar( 'footer-bottom' ); ?>

							<?php //echo '</div>';
							echo '</div>';
						}
						
					?>

				<ul class="footer-info">
					<li class="footer-copyright">
					<?php

					// Footer text
					echo esc_attr( get_theme_mod( 'carrino_footer_text', get_bloginfo('description') ) );

					?>

				</li>
		
				<li class="footer-links">

					<?php 

					// The footer menu
					if ( has_nav_menu( 'footer' ) ) :

					     wp_nav_menu( array( 'theme_location' => 'footer',
					     					 'container' => 'ul',
					     					 'depth' => 1,
					     					 'menu_class' => 'footer-nav',
					     					 'menu_id' => 'footer-nav'));

					endif;

		 			?>
				</li>
			</ul>
		</div><!-- .container -->
		</footer><!-- #colophon -->
		<?php if ( get_theme_mod( 'carrino_goto_top', true ) ): ?>
			<a href="" class="goto-top backtotop"><i class="icon-up-open"></i></a>
		<?php endif; ?>
		
		<?php

		// After Footer Hook
		threeforty_after_footer();

		?>

<?php 

	// Close site wrapper if we have a custom background

	if ( ! empty( get_background_image() ) || ! empty( get_background_color() ) ) {

		echo '</div>';

	}

	?>
<?php wp_footer(); ?>

</body>
</html>
