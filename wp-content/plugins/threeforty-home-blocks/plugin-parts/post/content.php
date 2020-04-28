<?php
/**
 * Template part for displaying posts whtin Home Blocks
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Dinova
 * @since 1.0
 * @version 1.0
 */

?>

<?php 

$date_class = ( get_theme_mod( '' . $block . '_meta_date_style' ) === 'custom' ? ' has-time-custom' : '' );
$even_odd_class = ( $count % 2 == 0 ? ' even' : ' odd' );
$last = ( $count == $post_num + $plus_one ? ' last' : '' );
$last_item = ( $last_in_grid ? ' last-in-grid' : '' );
$has_thumbnail = ( get_theme_mod( '' . $block . '_thumbnail', true ) ? '' : ' disabled-post-thumbnail' );
$post_class = ( '' !== get_the_post_thumbnail() && get_theme_mod( '' . $block . '_thumbnail', true ) ? get_theme_mod( '' . $block . '_post_style', 'default' ) : 'alt2' );
if ( get_theme_mod( '' . $block . '_post_format_styling', false ) && has_post_format( 'image' ) ) {
	$post_class = 'alt2';
}

 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex-box' . $has_thumbnail . $date_class . $even_odd_class . $last . $last_item . ' ' . $post_class . '' ); ?>>

	<?php

	if ( get_theme_mod( '' . $block . '_meta_date', true ) && get_theme_mod( '' . $block . '_meta_date_style' ) === 'custom' || get_post_format( ) ) {

		echo '<div class="formats-key">';

		// Custom date
		if ( get_theme_mod( '' . $block . '_meta_date', true ) && get_theme_mod( '' . $block . '_meta_date_style' ) === 'custom' ) { ?>
			<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>" class="time-custom"><span class="date-month"><?php echo get_the_time( 'M' ) ?></span><span class="date-day"><?php echo get_the_time( 'd' ) ?></span><span class="date-year"><?php echo get_the_time( 'Y' ) ?></span></time>
		<?php }

		if ( has_post_format( 'gallery' ) && get_theme_mod( 'dinova_post_format_icons', true ) ) {
			echo '<span class="format-image"><i class="icon-picture"></i></span>';
		}
		if ( has_post_format( 'video' ) && get_theme_mod( 'dinova_post_format_icons', true ) ) {
			echo '<span class="format-video"><i class="icon-videocam-1"></i></span>';
		}
		if ( has_post_format( 'audio' ) && get_theme_mod( 'dinova_post_format_icons', true ) ) {
			echo '<span class="format-gallery"><i class="icon-headphones"></i></span>';
		}

		echo '</div>';

	} ?>
	
	<?php if ( '' !== get_the_post_thumbnail() && get_theme_mod( '' . $block . '_thumbnail', true ) ) : ?>
		<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'dinova-' . get_theme_mod( '' . $block . '_thumbnail_aspect_ratio', 'landscape' ) . '-image' ); ?>
				</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {

			include( DINOVA_POST_BLOCKS__PLUGIN_DIR . 'plugin-parts/post/meta-before-title.php' );

		};

			if ( get_theme_mod( '' . $block . '_entry_title', true ) ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}

			include( DINOVA_POST_BLOCKS__PLUGIN_DIR . 'plugin-parts/post/meta-after-title.php' );


		?>
	</header><!-- .entry-header -->

	<?php

		/**
		 * Show excerpt
		 * Not image post format
		 * Not alt2 post style
		 * Is alt2 post style does NOT have thumbnail
	     */

		if ( get_theme_mod( '' . $block . '_excerpt', true ) && 
			 ( ! has_post_format( 'image' ) || has_post_format( 'image' ) && ! get_theme_mod( '' . $block . '_thumbnail', true ) ) && 
			 ( get_theme_mod( '' . $block . '_post_style' ) !== 'alt2' || 
			 ( get_theme_mod( '' . $block . '_post_style' ) === 'alt2' && ( ! get_theme_mod( '' . $block . '_thumbnail', true ) || '' === get_the_post_thumbnail( ) ) ) ) ) {

			echo '<div class="entry-content">';

			the_excerpt( );

			echo '</div>';

		}

		?>
</article><!-- #post-## -->
