<?php
/**
 * The home template file
 *
 * Puts together the home page custom and standard WP loops
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.1
 * @version 1.2
 */

get_header(); ?>

<?php 

$page_post_count =  $wp_query->posts;
$post_cols = ( count( $page_post_count ) < get_theme_mod( 'carrino_homepage_loop_cols', '3' ) ? count( $page_post_count ) : get_theme_mod( 'carrino_homepage_loop_cols', '3' ) );
//  Override post_cols is we have active sidebar
if ( get_theme_mod( 'carrino_homepage_sidebar', true ) && is_active_sidebar( 'sidebar-2' ) && get_theme_mod( 'carrino_homepage_loop_cols', 3 ) === 3 ) {
	$post_cols = 2;
}
$show_pagination_numbers = ( get_theme_mod( 'carrino_pagination_numbers', true ) ? '' : ' no-page-numbers' );
$show_pagination_arrows = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? ' pagination-arrows' : '' );
$prev_text = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? '<i class="icon-left-open"></i>' : get_theme_mod( 'carrino_pagination_prev_text', 'Previous' ) );
$next_text = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? '<i class="icon-right-open"></i>' : get_theme_mod( 'carrino_pagination_next_text', 'Next' ) );
$allowed_html = array( 'i' => array('class' => array(),),);
?>

		

	<div class="wrap">

		<?php

			if ( is_home( ) && ! is_paged() && have_posts( ) && '' !== get_theme_mod( 'carrino_homepage_loop_title' ) && get_theme_mod( 'threeforty_homepage_loop_type', 'default' ) !== 'custom' )  {
				
				echo '<div class="section-header"><h2 class="page-title">' . esc_attr( get_theme_mod( 'carrino_homepage_loop_title', 'Latest Posts' ) ) . '</h2></div>';

			} ?>

		<main id="main" class="site-main<?php echo esc_attr( $show_pagination_numbers . $show_pagination_arrows ); ?>">
		<?php threeforty_before_loop(); ?>

		<?php 

		// ========================================================
		// Check if we're running the custom home blocks plugin
		// ========================================================

		if ( function_exists( 'threeforty_home_blocks') && get_theme_mod( 'threeforty_homepage_loop_type', 'default') === 'custom' ) {

		threeforty_home_blocks();

		} else {

		// ========================================================
		// No custom blocks, run the standard WP loop
		// ========================================================

		 ?>

		<div id="primary" class="content-area flex-grid <?php echo esc_attr( get_theme_mod( 'carrino_homepage_layout', 'masonry' ) ) . ' ' . esc_attr( 'cols-' . $post_cols ) . ' ' . esc_attr( get_theme_mod( 'carrino_homepage_thumbnail_aspect_ratio', 'uncropped' ) ) . '-aspect-ratio'; ?>">

			<?php 
			// Standard loop open masonry container
			if ( get_theme_mod( 'carrino_homepage_layout', 'masonry' ) !== 'grid' ) {
				echo '<div id="masonry-container" class="masonry-container">';
			}

			 ?>

			<?php
			if ( have_posts() ) :

				$count = 0;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					$count++; /* Lets start counting */

					if ( get_theme_mod( 'carrino_homepage_layout', 'masonry' ) === 'grid' ) {

						if ( carrino_reset_flex_grid() && $count == carrino_reset_flex_grid( 'flex_wrapper' )) {
							echo '</div>'; // Close the current flex-grid
							echo '<div class="content-area flex-grid cols-' . carrino_reset_flex_grid( 'cols_class' ) . ' ' . get_theme_mod( 'carrino_homepage_thumbnail_aspect_ratio', 'landscape' ) . '-aspect-ratio">'; // Open the new flex grid
						}
					}

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

				// Close masonry container
				if ( get_theme_mod( 'carrino_homepage_layout', 'masonry' ) !== 'grid' ) {
					echo '</div>';
				}
			
				the_posts_pagination( array(
					'type' => 'list',
				    'mid_size' => 2,
				    'prev_text' => wp_kses($prev_text, $allowed_html),
				    'next_text' => wp_kses($next_text, $allowed_html),
				) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</div><!-- #primary -->

		<?php } // End if custom ?>
		<?php threeforty_after_loop(); ?>
	</main><!-- #main -->
	<?php 
		get_sidebar( 'aside' );
	?>
</div>

<?php get_footer();
