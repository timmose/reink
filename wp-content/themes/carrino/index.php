<?php
/**
 * The main template file
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
 * @version 1.1
 */

get_header(); ?>

<?php 

	$post_cols = ( is_home() ? get_theme_mod( 'carrino_homepage_loop_cols', '3' ) : get_theme_mod( 'carrino_archive_loop_cols', '3' ) );
	//  Override post_cols is we have active sidebar
	if ( ( is_home() && get_theme_mod( 'carrino_home_sidebar', true ) || is_archive() && get_theme_mod( 'carrino_archive_sidebar', true ) ) && is_active_sidebar( 'sidebar-2' ) && $post_cols === 3 ) {
		$post_cols = 2;
	}
	$thumbnail_aspect_ratio = ( is_home() ? get_theme_mod( 'carrino_homepage_thumbnail_aspect_ratio', 'uncropped' ) : get_theme_mod( 'carrino_archive_thumbnail_aspect_ratio', 'uncropped' ) );
	$post_layout = ( is_home() ? get_theme_mod( 'carrino_homepage_layout', 'masonry' ) : get_theme_mod( 'carrino_archive_layout', 'masonry' ) );
	$show_pagination_numbers = ( get_theme_mod( 'carrino_pagination_numbers', true ) ? '' : ' no-page-numbers' );

?>

	<div class="wrap">

		<?php

		if ( is_home( ) ) {
			
			echo '<div class="section-header"><h2 class="page-title">' . esc_html__( 'Latest Posts', 'carrino' ) . '</h2></div>';

		} else {

			echo '<div class="section-header"><h2 class="page-title">' . esc_html__( 'Posts', 'carrino' ) . '</h2></div>';

		} ?>

		<main id="main" class="site-main<?php echo esc_attr( $show_pagination_numbers ); ?>">
		<?php threeforty_before_loop(); ?>

		<div id="primary" class="content-area flex-grid <?php echo esc_attr( $post_layout ) . ' cols-' . esc_attr( $post_cols ) . ' ' . esc_attr( $thumbnail_aspect_ratio ) . '-aspect-ratio' ?>">

		<?php 
			// Standard loop open masonry container
			if ( is_home() && get_theme_mod( 'carrino_homepage_layout', 'masonry' ) !== 'grid' || ! is_home() && get_theme_mod( 'carrino_archive_layout', 'masonry' ) !== 'grid' ) {
				echo '<div id="masonry-container" class="masonry-container">';
			}

			 ?>

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

				// Standard loop open masonry container
				if ( is_home() && get_theme_mod( 'carrino_homepage_layout', 'masonry' ) !== 'grid' || ! is_home() && get_theme_mod( 'carrino_archive_layout', 'masonry' ) !== 'grid' ) {
					echo '</div>';
				}


				the_posts_pagination( array(
				    'mid_size' => 2,
				    'prev_text' => get_theme_mod( 'carrino_pagination_prev_text', 'Previous' ),
				    'next_text' => get_theme_mod( 'carrino_pagination_next_text', 'Next' ),
				) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</div><!-- #primary -->
		<?php threeforty_after_loop(); ?>
	</main><!-- #main -->
	<?php 
		get_sidebar( 'aside' );
	?>
</div>

<?php get_footer();
