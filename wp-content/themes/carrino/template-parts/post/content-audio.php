<?php
/**
 * Template part for displaying audio post format posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

?>

<?php 

$content = get_the_content();
$hero = ( is_single() && strpos(carrino_post_class(), 'hero') ? true : false );
$disabled_thumbnail = ( strpos(carrino_post_class(), 'disabled-post-thumbnail') ? true : false );
$sticky_share =  ( function_exists( 'threeforty_share_content' ) && get_theme_mod( 'carrino_single_share_post', true ) && get_theme_mod( 'carrino_single_share_post_position' ) !=='bottom' && ! empty( $content) ? true : false );

?>

<?php if ( is_single() && $hero ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex-box single-post default' ); ?>>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( carrino_post_class() ); ?>>
<?php endif; ?>

	<?php if ( is_single() && ! $hero ): ?>

		<div class="media-wrapper">

		<?php echo carrino_featured_audio() ?>

		</div>

	<?php endif; ?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && ! $disabled_thumbnail ) : ?>

		<div class="post-thumbnail">

			<?php
			// Formats key
			if ( is_home() && ! is_paged() && is_sticky() || ! is_single() && get_theme_mod( 'carrino_post_format_icons', true ) ) : ?>

				<div class="formats-key">

					<?php if ( is_sticky() && is_home() ) {
								echo '<span class="format-sticky"><i class="icon-star"></i></span>';
					} ?>

					<?php if ( ! is_single() && get_theme_mod( 'carrino_post_format_icons', true ) ): ?>

						<span class="class-format"><i class="icon-headphones"></i></span>

					<?php endif; ?>

				</div>

			<?php endif; ?>

				<a href="<?php the_permalink(); ?>">
					<?php

					if ( is_home() ) {
						if ( get_theme_mod( 'carrino_homepage_thumbnail_aspect_ratio', 'uncropped' ) !== 'uncropped' ) {
							the_post_thumbnail( 'carrino-' . get_theme_mod( 'carrino_homepage_thumbnail_aspect_ratio', 'landscape' ) . '-image' );
						} else {
							the_post_thumbnail( 'medium_large' );
						}
					} else {
						if ( get_theme_mod( 'carrino_archive_thumbnail_aspect_ratio', 'uncropped' ) !== 'uncropped' ) {
							the_post_thumbnail( 'carrino-' . get_theme_mod( 'carrino_archive_thumbnail_aspect_ratio', 'landscape' ) . '-image' );
					} else {
						the_post_thumbnail( 'medium_large' );
					}
					} ?>
				</a>

		</div><!-- .post-thumbnail -->

	<?php endif; ?>

	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {

			get_template_part( 'template-parts/post/meta', 'before-title' ); 

		};

		if ( is_single() ) {
			the_title( '<h1 class="entry-title"><span>', '</span></h1>' );
		} elseif ( is_home() ) {
			if ( get_theme_mod( 'carrino_homepage_entry_title', true ) ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}
		} else {
			// Archive
			if ( get_theme_mod( 'carrino_archive_entry_title', true ) ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}
		}

		get_template_part( 'template-parts/post/meta', 'after-title' ); 


		?>
	</header><!-- .entry-header -->

	<?php

		if ( ! is_single(  ) ) {

			// Archive

			if ( is_home() && ( ( get_theme_mod( 'carrino_homepage_post_excerpt', true ) && get_theme_mod( 'carrino_homepage_loop_style', 'default' ) === 'default' ) || ( get_theme_mod( 'carrino_homepage_post_excerpt', true ) && get_theme_mod( 'carrino_homepage_loop_style', 'default' ) === 'cover' && ! get_theme_mod( 'carrino_homepage_post_thumbnail', true ) ) ) ||
		         ( is_archive() || is_search() ) && ( ( get_theme_mod( 'carrino_archive_post_excerpt', true ) && get_theme_mod( 'carrino_archive_loop_style', 'default' ) === 'default' ) || ( get_theme_mod( 'carrino_archive_post_excerpt', true ) && get_theme_mod( 'carrino_archive_loop_style', 'default' ) === 'cover' && ! get_theme_mod( 'carrino_archive_post_thumbnail', true ) ) ) ) {

				echo '<div class="entry-content">';

				the_excerpt( );

				echo '</div>';

			}


		} else {

			// Single

			if ( 'post' === get_post_type() && has_excerpt( ) && is_single( ) && get_theme_mod( 'carrino_single_custom_excerpt', true ) ) {

					echo '<div class="entry-content custom-excerpt">';

					the_excerpt( );

					echo '</div>';

				} ?>

				<?php if ( $sticky_share ) : ?>

					<div class="single-content-wrapper">

					<div class="sticky-container">
						<div class="sticky-element">
							<?php threeforty_share_content(); ?>
						</div>
					</div>
				<?php endif ?>

			<?php 

			echo '<div class="entry-content">';

			the_content( );

			wp_link_pages( array(
				'before'      => '<div class="nav-links page-pagination">',
				'after'       => '</div>',
				'link_before' => '<span class="page-numbers">',
				'link_after'  => '</span>',
				'nextpagelink' => esc_html__( 'Next page', 'carrino'),
				'previouspagelink' => esc_html__( 'Previous page', 'carrino'),
				'next_or_number'   => 'next',
			) );

			echo '</div><!-- .entry-content -->';

			if ( $sticky_share ) :

				echo '</div>';

			endif;

		}

		?>

</article><!-- #post-## -->
