<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.0
 */

?>

<?php 

$hero = ( is_page() && strpos(carrino_post_class(), 'hero' ) ? true : false );
$cover_wrapper = ( is_page() && strpos(carrino_post_class(), 'cover') ? true : false );

 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( carrino_post_class() ); ?>>

	<?php if ( ! $hero ): ?>

	<?php if ( $cover_wrapper ) : ?>

	<div class="cover-wrapper">

	<?php endif; ?>

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>

		<div class="post-thumbnail">

			<?php

				// Single post thumbnail
				if ( get_theme_mod( 'carrino_page_thumbnail_aspect_ratio', 'uncropped' ) === 'hero' ) {
					the_post_thumbnail( 'carrino-hero-image' );
				} else {
					the_post_thumbnail( 'carrino-single-' . get_theme_mod( 'carrino_page_thumbnail_aspect_ratio', 'uncropped' ) . '-image' );
				} ?>

		</div>

	<?php endif; ?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php if ( $cover_wrapper ) : ?>

	</div>

	<?php endif; ?>

	<?php endif ?>

	<div class="entry-content">
		<?php

		the_content();

		wp_link_pages( array(
			'before'      => '<div class="nav-links">' . esc_html__( 'Pages:', 'carrino' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->