<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

get_header(); ?>

<?php 

	$post_count = $wp_query->found_posts;
	$post_cols = get_theme_mod( 'carrino_archive_loop_cols', '3' );
	//  Override post_cols is we have active sidebar
	if ( get_theme_mod( 'carrino_archive_sidebar', true ) && is_active_sidebar( 'sidebar-2' ) && get_theme_mod( 'carrino_archive_loop_cols', 3 ) === 3 ) {
		$post_cols = 2;
	}
	$post_layout = ( have_posts() ? get_theme_mod( 'carrino_archive_layout', 'masonry' ) : '' );
	$show_pagination_numbers = ( get_theme_mod( 'carrino_pagination_numbers', true ) ? '' : ' no-page-numbers' );
	$show_pagination_arrows = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? ' pagination-arrows' : '' );
	$prev_text = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? '<i class="icon-left-open"></i>' : get_theme_mod( 'carrino_pagination_prev_text', 'Previous' ) );
	$next_text = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? '<i class="icon-right-open"></i>' : get_theme_mod( 'carrino_pagination_next_text', 'Next' ) );
	$allowed_html = array( 'i' => array('class' => array(),),);
?>

	<div class="wrap">

		<main id="main" class="site-main<?php echo esc_attr( $show_pagination_numbers . $show_pagination_arrows  ); ?>">

		<header class="container page-header">

				<div class="page-subtitle"><?php echo esc_attr( $post_count ) . ' ' . esc_html__( 'Posts Matching', 'carrino' ); ?> </div>

				<h1 class="page-title"><?php echo get_search_query(); ?></h1>

			</header>

		<div id="primary" class="content-area flex-grid <?php echo esc_attr( $post_layout ) . ' cols-' . esc_attr( $post_cols ) . ' ' . esc_attr( get_theme_mod( 'carrino_archive_thumbnail_aspect_ratio', 'uncropped' ) ) . '-aspect-ratio'; ?>">

			<?php 
			// Standard loop open masonry container
			if ( get_theme_mod( 'carrino_archive_layout', 'masonry' ) !== 'grid' && have_posts() ) {
				echo '<div id="masonry-container" class="masonry-container">';
			}

			 ?>

			<?php
			if ( have_posts() ) :

				$count =0;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					$count++;

					if ( get_theme_mod( 'carrino_archive_layout', 'masonry' ) === 'grid' ) {

						if ( carrino_reset_flex_grid() && $count == carrino_reset_flex_grid( 'flex_wrapper' )) {
							echo '</div>'; // Close the current flex-grid
							echo '<div class="content-area flex-grid cols-' . carrino_reset_flex_grid( 'cols_class' ) . ' ' . esc_attr( get_theme_mod( 'carrino_archive_thumbnail_aspect_ratio', 'landscape' ) ) . '-aspect-ratio">'; // Open the new flex grid
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
				if ( get_theme_mod( 'carrino_archive_layout', 'masonry' ) !== 'grid' && have_posts() ) {
					echo '</div>';
				}

				the_posts_pagination( array(
					'type' => 'list',
				    'mid_size' => 2,
				    'prev_text' => wp_kses($prev_text, $allowed_html),
				    'next_text' => wp_kses($next_text, $allowed_html),
				) );

			else :

				echo '<div class="flex-box has-post-thumbnail">';

				echo '<h2 class="aligncenter">' . esc_html__( 'Sorry, nothing matched your search terms. Please try again with some different keywords', 'carrino' ) . '</h2>';

				echo '</div>';

			endif;
			?>

		</div><!-- #primary -->
	</main><!-- #main -->
	<?php 
		get_sidebar( 'aside' );
	?>
</div>

<?php get_footer();
