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

// $custom_loop = ( is_home() && get_theme_mod( 'dinova_homepage_loop_type' ) === 'custom' ? true : false );
// $block = ( false !== $custom_loop ? $block : '' );

?>

<?php
// Check if the entry meta is active
if ( dinova_toggle_entry_meta( 'after_title_meta', $block ) ): ?>

<div class="entry-meta after-title">

	<ul>

		<?php if ( dinova_toggle_entry_meta( 'date', $block ) ): ?>

		<li class="entry-date">

			<?php 

			$title = get_the_title('','', false);

			if ( ! is_single( ) && strlen($title) == 0 ) {

			echo '<a href="' . get_the_permalink() . '">';

			} ?>

			<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><?php echo get_the_date( ) ?></time>

			<?php 

			if ( ! is_single( ) && strlen($title) == 0 ) {

			echo '</a>';

			} ?>

		</li>

	<?php endif; ?>

	<?php if ( dinova_toggle_entry_meta( 'read_time', $block ) ): ?>

		<li class="entry-read-time">

			<?php echo dinova_read_time(); ?>

		</li>

	<?php endif; ?>

	<?php if ( dinova_toggle_entry_meta( 'comment_count', $block ) ): ?>


		<li class="entry-comment-count">

			<?php if ( is_single( ) ) : ?>

				<a href="#comments">

			<?php endif;  ?>

			<?php comments_number( __('0 Comments', 'dinova'), __('1 Comment', 'dinova'), __('% Comments', 'dinova') ) ?>

			<?php if ( is_single( ) ) : ?>

				</a>

			<?php endif;  ?>

		</li>

	<?php endif; ?>

	</ul>
	
</div>

<?php  endif; ?>