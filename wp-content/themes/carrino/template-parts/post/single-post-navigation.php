<?php
/**
 * Template part for displaying prev/next post navigation
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

// Allow basic entry title HTML
$allowed_html = array(
	'strong' => array(
		'class' => array(),
	),
	'i' => array(
		'class' => array(),
	),
	'b' => array(
		'class' => array(),
	),
	'em' => array(
		'class' => array(),
	),
	'span' => array(
		'class' => array(),
	),
);

$prev_post = get_previous_post();
$next_post = get_next_post();
$prev_thumbnail_class = ( ! empty( $prev_post ) ? get_theme_mod( 'carrino_single_post_navigation_style', ' cover' ) : '' );
if ( ! empty( $prev_post ) && '' !== get_the_post_thumbnail( $prev_post->ID ) ) {
	$prev_thumbnail_class = ' has-post-thumbnail ' . $prev_thumbnail_class;
}
$next_thumbnail_class = ( ! empty( $next_post ) ? get_theme_mod( 'carrino_single_post_navigation_style', ' cover' ) : '' );
if ( ! empty( $next_post ) && '' !== get_the_post_thumbnail( $next_post->ID ) ) {
	$next_thumbnail_class = ' has-post-thumbnail ' . $next_thumbnail_class;
}
$cols_class = ( ! empty($prev_post) && ! empty($next_post) ? 'cols-2' : 'cols-1' );

if (! empty($prev_post) || ! empty($next_post)) : ?>

<div class="content-area post-navigation flex-grid <?php echo esc_attr( $cols_class ); ?> landscape-aspect-ratio">
	<h2 class="screen-reader-text">Post navigation</h2>

<?php if ( !empty( $prev_post ) ): ?>
	<article class="flex-box previous-article<?php echo esc_attr( $prev_thumbnail_class ); ?>">
		<div class="post-thumbnail">
	  			<?php 

	  			if ('' !== get_the_post_thumbnail( $prev_post->ID ) ) {

	  				echo '<a href="' . esc_url( get_permalink( $prev_post->ID ) ) . '">';

	  				echo get_the_post_thumbnail( $prev_post->ID, 'carrino-landscape-image' );

	  				echo '</a>';

	  			}

	  			?>
	  	</div>
  		<header class="entry-header">
  			<div class="entry-meta before-title">
  				<?php 

  					if ( strlen($prev_post->post_title) == 0 ) {
  						echo '<a href="' . esc_url( get_permalink( $prev_post->ID ) ) . '">';
  					}

  					echo '<span>' . esc_html__( 'previous post', 'carrino' ) . '</span>';

  					if ( strlen($prev_post->post_title) == 0 ) {
  						echo '</a>';
  					}

  						 ?>
  				</div>
  			<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"><?php echo wp_kses( $prev_post->post_title, $allowed_html ); ?></a></h3>
  		</header>
  	</article>
<?php endif; ?>

<?php if ( !empty( $next_post ) ): ?>
	<article class="flex-box next-article<?php echo esc_attr( $next_thumbnail_class ); ?>">
		<div class="post-thumbnail">
	  			<?php 

	  			if ('' !== get_the_post_thumbnail( $next_post->ID ) ) {

	  				echo '<a href="' . esc_url( get_permalink( $next_post->ID ) ) . '">';

	  				echo get_the_post_thumbnail( $next_post->ID, 'carrino-landscape-image' );

	  				echo '</a>';

	  			}

	  			?>
	  	</div>
  		<header class="entry-header">
  			<div class="entry-meta before-title">
  				<?php 

  					if ( strlen($next_post->post_title) == 0 ) {
  						echo '<a href="' . esc_url( get_permalink( $next_post->ID ) ) . '">';
  					}

  					echo '<span>' . esc_html__( 'next post', 'carrino' ) . '</span>';

  					if ( strlen($next_post->post_title) == 0 ) {
  						echo '</a>';
  					}

  						 ?>
  						 	
  						 </div>
  			<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo wp_kses( $next_post->post_title, $allowed_html ); ?></a></h3>
  		</header>
  	</article>
<?php endif; ?>
</div>

<?php endif; ?>