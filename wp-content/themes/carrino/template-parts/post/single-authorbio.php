<?php
/**
 * The template for displaying the author bio in single post
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

?>

<div class="author-bio">
	<?php echo get_avatar(get_the_author_meta('ID'),90); ?>
	<h2 class="page-title"><?php the_author(); ?></h2>
	<p><?php echo the_author_meta('description'); ?></p>
	<?php

	// Fetch the author social meta from our plugin
	if ( function_exists( 'threeforty_author_social_meta' ) && get_theme_mod( 'carrino_single_author_social', true ) ) :

		threeforty_author_social_meta( 'text-icon', 'brand' );

	endif;

	?>
</div>