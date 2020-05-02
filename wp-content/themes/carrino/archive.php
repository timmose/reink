<?php
/**
 * The template for displaying archive pages
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

// Variables
$queried_object = get_queried_object();
$page_post_count =  $wp_query->posts;
$cat_post_count = ( is_category() && get_theme_mod( 'carrino_category_featured', true ) && false !== get_transient( 'carrino_category_' . $queried_object->term_id . '_featured_exclude_ids') ? count( get_transient( 'carrino_category_' . $queried_object->term_id . '_featured_exclude_ids') ) : 0 );
$post_count = $wp_query->found_posts;
$plus_archive_in_loop = ( is_archive() && get_theme_mod( 'carrino_archive_title_position', 'header' ) === 'loop' ? 1 : 0 );
$post_cols = ( count( $page_post_count ) + $plus_archive_in_loop < get_theme_mod( 'carrino_archive_loop_cols', '3' ) ? count( $page_post_count ) + $plus_archive_in_loop : get_theme_mod( 'carrino_archive_loop_cols', '3' ) );
//  Override post_cols is we have active sidebar
if ( get_theme_mod( 'carrino_archive_sidebar', true ) && is_active_sidebar( 'sidebar-2' ) && get_theme_mod( 'carrino_archive_loop_cols', 3 ) === 3 ) {
	$post_cols = 2;
}
$show_pagination_numbers = ( get_theme_mod( 'carrino_pagination_numbers', true ) ? '' : ' no-page-numbers' );
$show_pagination_arrows = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? ' pagination-arrows' : '' );
$prev_text = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? '<i class="icon-left-open"></i>' : get_theme_mod( 'carrino_pagination_prev_text', 'Previous' ) );
$next_text = ( get_theme_mod( 'carrino_pagination_arrows', false ) ? '<i class="icon-right-open"></i>' : get_theme_mod( 'carrino_pagination_next_text', 'Next' ) );
$allowed_html = array( 'i' => array('class' => array(),),);
 ?>

	<div class="wrap">

		<?php if ( get_theme_mod( 'carrino_archive_title_position', 'header' ) === 'header' ) : ?>

		<header class="container page-header">
					<?php

					if ( get_theme_mod( 'carrino_archive_post_count', true ) ) {

						echo '<div class="page-subtitle">';

						if ( is_category() ) {
							echo esc_attr( $post_count ) . ' ' . esc_html__( 'Posts In', 'carrino' );
						} elseif ( is_author() ) {
		    				echo count_user_posts($queried_object->ID) . ' ' . esc_html__( 'Posts by', 'carrino' );
						} elseif ( is_tag() ) {
		    				echo esc_attr( $queried_object->count ) . ' ' . esc_html__( 'Posts', 'carrino' );
						} else {
							if ( is_archive() ) {
								echo esc_html__( 'archive', 'carrino' );
							}
						}

						echo '</div>';

					}
					if ( get_theme_mod( 'carrino_archive_title', true ) ) {
						if ( is_category() ) {
							echo '<h1 class="page-title">';
							echo single_cat_title();
							echo '</h1>';
						} else {
							the_archive_title( '<h1 class="page-title">', '</h1>' );
						}
					}
					if ( ! is_author() && get_theme_mod( 'carrino_archive_description', true ) || is_author() && get_theme_mod( 'carrino_archive_author_bio', false ) ) {

						the_archive_description( '<div class="page-subtitle after-title">', '</div>' );

					}
					?>
		</header><!-- .page-header -->

	<?php endif; ?>

		<main id="main" class="site-main<?php echo esc_attr( $show_pagination_numbers . $show_pagination_arrows  ); ?>">
		<?php threeforty_before_loop(); ?>
		<?php if ( is_archive( ) || is_search( ) ) : ?>

		<?php if ( get_theme_mod( 'carrino_archive_title', true ) && get_theme_mod( 'carrino_archive_title_position', 'header' ) === 'header' ): ?>

	<?php endif; ?>

	<?php endif; ?>
		<div id="primary" class="content-area flex-grid <?php echo esc_attr( get_theme_mod( 'carrino_archive_layout', 'masonry' ) ) . ' cols-' . esc_attr( $post_cols ) . ' ' . esc_attr( get_theme_mod( 'carrino_archive_thumbnail_aspect_ratio', 'uncropped' ) ) . '-aspect-ratio'; ?>">

			<?php 
			// Standard loop open masonry container
			if ( get_theme_mod( 'carrino_archive_layout', 'masonry' ) !== 'grid' ) {
				echo '<div id="masonry-container" class="masonry-container">';
			}

			 ?>

			<?php
			if ( have_posts() ) :

				$count = 0;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					$count++;

					if ( get_theme_mod( 'carrino_archive_title', true ) && get_theme_mod( 'carrino_archive_title_position', 'header' ) !== 'header' ) {

						if ( $count == 1 ) {

							echo '<article class="flex-box cover archive-info">';

							echo '<div class="entry-header">';

							if ( get_theme_mod( 'carrino_archive_post_count', true ) ) {

								echo '<div class="entry-meta before-title">';

								if ( is_category() ) {
									$cat_count = get_category( get_queried_object() );
									echo esc_attr( $post_count ) . ' ' . esc_html__( 'Posts In', 'carrino' );
								} elseif ( is_author() ) {
				    				echo count_user_posts($queried_object->ID) . ' ' . esc_html__( 'Posts by', 'carrino' );
								} elseif ( is_tag() ) {
				    				echo esc_attr( $queried_object->count ) . ' ' . esc_html__( 'Posts', 'carrino' );
								} else {
									if ( is_archive() ) {
										echo esc_html__( 'archive', 'carrino' );
									}
								}

								echo '</div>';

							}
							// Author avatar
							if ( is_author() && get_theme_mod( 'carrino_archive_author_avatar', false ) ) {
								echo get_avatar(get_the_author_meta('ID'),90);
							}

							echo '<h3 class="entry-title">';
							if ( is_category() ) {
								single_cat_title();
							}
							elseif ( is_author() ) {
								echo esc_attr( $queried_object->display_name );
							} else {
								echo get_the_archive_title();
							}
							echo '</h3>';

							echo '</div>';

							if ( ! is_author() && get_theme_mod( 'carrino_archive_description', true ) || is_author() && get_theme_mod( 'carrino_archive_author_bio', false ) ) {

								the_archive_description( '<div class="entry-content">', '</div>' );

							}

								// Fetch the content from our plugin
								if ( function_exists( 'threeforty_author_social_meta' ) && is_author() && get_theme_mod( 'carrino_archive_author_social_media', false ) ) :

									threeforty_author_social_meta( 'icon-background', 'brand' );

								endif;

							echo '</article>';

						}

					}

					global $last;
					$last = 'not-last';
					if ( $count === 3 ) {
						$last = 'last';
					}

					if ( get_theme_mod( 'carrino_archive_layout', 'masonry' ) === 'grid' ) {

						if ( carrino_reset_flex_grid() && $count + $plus_archive_in_loop == carrino_reset_flex_grid( 'flex_wrapper' )) {
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
				if ( get_theme_mod( 'carrino_archive_layout', 'masonry' ) !== 'grid' ) {
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
		<?php threeforty_after_loop(); ?>
	</main><!-- #main -->
	<?php 
		get_sidebar( 'aside' );
	?>
</div>

<?php get_footer();
