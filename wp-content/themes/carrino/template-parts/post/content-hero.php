<?php
/**
 * Template part for displaying posts
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

$disabled_thumbnail = ( strpos(carrino_post_class(), 'disabled-post-thumbnail') ? true : false );

 ?>

<?php if ( has_post_format( 'video' ) || has_post_format( 'audio' ) ) : ?>

<div class="container hero-container">

	<div class="media-wrapper">

		<?php 

		if ( has_post_format( 'audio' ) ) {
			echo carrino_featured_audio();
		} else {
			echo carrino_featured_video();
		} ?>

	</div>

</div>

<?php else: ?>

<div class="hero single-hero flex-grid cols-1">

	<?php if ( ( get_theme_mod( 'carrino_single_post_parallax', false ) || function_exists( 'threeforty_custom_meta_box' ) && get_post_meta( get_the_ID(), 'carrino_single_enable_parallax', true ) ) && ( '' !== get_the_post_thumbnail( ) || has_post_thumbnail( ) && ! $disabled_thumbnail ) ) : ?>

        	<div class="flex-box hero-entry parallax-window" data-parallax="scroll" data-image-src="<?php echo get_the_post_thumbnail_url( '', 'carrino-hero-wide-image' ); ?>" data-speed="0.4">

        		<?php else: ?>

	<div class="flex-box hero-entry has-post-thumbnail<?php if ( '' === get_the_post_thumbnail() ) { echo ' no-thumbnail'; } ?>">

	<?php endif; ?>

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
				<?php //the_post_thumbnail( 'carrino-hero-image' ); ?>
				<?php if ( get_theme_mod( 'carrino_single_thumbnail_aspect_ratio', 'uncropped' ) === 'hero' ) {
					the_post_thumbnail( 'carrino-hero-image' );
					} else {
						the_post_thumbnail( 'carrino-single-' . get_theme_mod( 'carrino_single_thumbnail_aspect_ratio', 'uncropped' ) . '-image' );
					} ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {

			get_template_part( 'template-parts/post/meta', 'before-title' ); 

		};

			the_title( '<h1 class="entry-title"><span>', '</span></h1>' );


		?>
	</header><!-- .entry-header -->

</div>

</div>

<?php endif; ?>
