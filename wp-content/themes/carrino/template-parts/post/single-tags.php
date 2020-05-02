<?php
/**
 * The template for displaying tags and share links in the single post footer
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.0
 */

?>

<footer class="hentry-footer">
	<?php

	$post_tags = get_the_tags();

	if ( $post_tags ) :

		echo '<div class="entry-meta post-tags">';

		echo '<ul>';

		foreach( $post_tags as $tag ) { ?>
	    	<li><a href="<?php echo get_tag_link($tag->term_id); ?>" aria-label="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_attr( $tag->name ); ?></a></li> 
	    <?php }

	    echo '</ul>';

	    echo '</div>';

	    endif; ?>

	    <?php 

	    // Carrino Social plugin

	     if ( function_exists( 'threeforty_share_content' ) && get_theme_mod( 'carrino_single_share_post', true ) && get_theme_mod( 'carrino_single_share_post_position', 'side-bottom' ) !== 'side' ) :

			threeforty_share_content();

		endif; 


	    ?>
</footer>