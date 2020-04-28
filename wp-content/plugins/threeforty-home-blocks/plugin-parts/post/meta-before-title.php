<?php
/**
 * Template part for displaying post meta
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

global $post;

$meta_class = ( '' === $post->post_title ? ' no-entry-title' : '' );
// $custom_loop = ( is_home() && get_theme_mod( 'dinova_homepage_loop_type' ) == 'custom' ? true : false );
// $block =  ( false !== $custom_loop ? $block : '' );

?>

<?php

// Check if meta data is active
if ( dinova_toggle_entry_meta( 'before_title_meta', $block ) ): ?>

<div class="entry-meta before-title<?php echo esc_attr( $meta_class ); ?>">

	<ul class="author-category-meta">

		<?php if ( dinova_toggle_entry_meta( 'author', $block ) ): ?>

			<li class="entry-author-meta">

				<span class="screen-reader-text"><?php echo esc_html__( 'Posted', 'dinova' ); ?></span><?php echo esc_html__( 'by', 'dinova' ) ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"><?php echo get_the_author() ?></a>

			</li>

			<?php endif; ?>

			<?php if ( dinova_toggle_entry_meta( 'category', $block ) ): ?>

				<li class="entry-post-category">

					<span class="screen-reader-text"><?php echo esc_html__( 'Posted', 'dinova' ); ?></span>
					<?php echo esc_html__( 'in', 'dinova' ); ?> 
						<?php if ( ! is_single() ) {
							dinova_get_category();
						} else {
							the_category(' / ', 'multiple');
						}
						?>

				</li>

			<?php  endif; ?>

	</ul>
	
</div>

<?php endif; ?>