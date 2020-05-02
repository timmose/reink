<?php
/**
 * Template part for Hero header in pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.0
 */

?>

<div class="hero single-hero flex-grid cols-1">

	<?php if ( get_theme_mod( 'carrino_page_parallax', false ) && ( '' !== get_the_post_thumbnail( )) ) : ?>

        	<div class="flex-box hero-entry parallax-window" data-parallax="scroll" data-image-src="<?php echo get_the_post_thumbnail_url( '', 'carrino-hero-wide-image' ); ?>" data-speed="0.4">

        		<?php else: ?>

	<div class="flex-box hero-entry<?php if ( '' === get_the_post_thumbnail() ) { echo ' no-thumbnail'; } ?>">

	<?php endif; ?>

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
				<?php //the_post_thumbnail( 'carrino-hero-image' ); ?>
				<?php if ( get_theme_mod( 'carrino_page_thumbnail_aspect_ratio', 'uncropped' ) === 'hero' ) {
					the_post_thumbnail( 'carrino-hero-image' );
					} else {
						the_post_thumbnail( 'carrino-single-' . get_theme_mod( 'carrino_page_thumbnail_aspect_ratio', 'uncropped' ) . '-image' );
					} ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php

			the_title( '<h1 class="entry-title"><span>', '</span></h1>' );

		?>
	</header><!-- .entry-header -->

</div>

</div>
