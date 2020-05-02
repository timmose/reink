<?php
/**
 * The template for displaying woocommerce
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.4
 * @version 1.0
 */

get_header(); ?>

	<div class="wrap">

		<main id="main" class="site-main" role="main">
		<div id="primary" class="content-area woocommerce-shop">

			<?php 

			if ( get_theme_mod( 'carrino_shop_breadcrumbs', false ) ) {
				woocommerce_breadcrumb();
			} ?>

			<?php


				woocommerce_content();

			?>

		</div><!-- #primary -->
	</main><!-- #main -->
	<?php 
		get_sidebar( 'shop' );
	?>
</div>

<?php get_footer();
