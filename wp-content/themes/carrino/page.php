<?php
/**
 * The template for displaying all pages
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.2
 */

get_header(); ?>

 <?php 

$hero = ( is_page() && strpos(carrino_post_class(), 'hero') && '' !== get_the_post_thumbnail() ? true : false );

// Hero post layout display the hero before the content
if ( $hero ) {

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/page/content', 'hero' );

	endwhile;

} ?>

	<div class="wrap">

		<main id="main" class="site-main" role="main">
		<div id="primary" class="content-area flex-grid the-post <?php echo esc_attr( get_theme_mod( 'carrino_page_thumbnail_aspect_ratio', 'landscape' ) ) . '-aspect-ratio' ?>">

			<?php

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;

			?>

		</div><!-- #primary -->
	</main><!-- #main -->
	<?php 
	if ( class_exists('WooCommerce')) {
	if ( is_page( 'cart' ) || is_page( 'checkout') || is_account_page() ) {
		get_sidebar( 'shop' );
	} else {
		get_sidebar( 'aside' );
	}
	} else {
		get_sidebar( 'aside' );
	}
	?>
</div>

<?php get_footer();
