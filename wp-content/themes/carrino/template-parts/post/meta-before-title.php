<?php
/**
 * Template part for displaying post meta
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

$meta_class = ( '' === $post->post_title ? ' no-entry-title' : '' );

?>

<?php
// Check if meta data is active
if ( carrino_toggle_entry_meta( 'before_title_meta' ) ): ?>

<div class="entry-meta before-title<?php echo esc_attr( $meta_class ); ?>">

	<ul class="author-category-meta">

			<?php if ( carrino_toggle_entry_meta( 'category' ) ): ?>

				<li class="category-prepend">

					<span class="screen-reader-text"><?php echo esc_html__( 'Posted', 'carrino' ); ?></span>
					<i><?php echo esc_html__( 'in', 'carrino' ); ?></i> 

				</li>

				<li class="category-list">
						<?php if ( ! is_single() ) {
							carrino_get_category();
						} else {
							the_category('', '');
						}
						?>

				</li>

			<?php  endif; ?>

	</ul>
	
</div>

<?php endif; ?>