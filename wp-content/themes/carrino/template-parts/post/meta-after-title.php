<?php
/**
 * Template part for displaying post meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

?>
<?php
// Check if the entry meta is active
if ( carrino_toggle_entry_meta( 'after_title_meta' ) ):

$has_avatar = ( is_home() && get_theme_mod( 'carrino_homepage_entry_meta_author_avatar', false ) || ( is_archive() || is_search() ) && get_theme_mod( 'carrino_archive_entry_meta_author_avatar', false ) || is_single() && get_theme_mod( 'carrino_single_entry_meta_author_avatar', false )  ? ' has-avatar' : '' );

?>

<div class="entry-meta after-title<?php echo esc_attr( $has_avatar ); ?>">

	<ul>

		<?php if ( carrino_toggle_entry_meta( 'author_avatar' ) ) : ?>

			<li class="entry-author-avatar">

				<?php echo get_avatar( get_the_author_meta('ID'), 30 ); ?>

			</li>

		<?php endif; ?>

		<?php if ( carrino_toggle_entry_meta( 'author' ) ): ?>

			<li class="entry-author-meta">

				<span class="screen-reader-text"><?php echo esc_html__( 'Posted', 'carrino' ); ?></span><i><?php echo esc_html__( 'by', 'carrino' ) ?></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"><?php echo get_the_author() ?></a>

			</li>

			<?php endif; ?>

		<?php if ( carrino_toggle_entry_meta( 'date' ) ): ?>

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

	<?php if ( function_exists( 'threeforty_read_time' ) && carrino_toggle_entry_meta( 'read_time' ) ) : ?>

		<li class="entry-read-time">

			<?php echo threeforty_read_time(); ?>

		</li>

	<?php endif; ?>

	<?php if ( carrino_toggle_entry_meta( 'comment_count' ) ): ?>


		<li class="entry-comment-count">

			<?php if ( is_single( ) ) : ?>

				<a href="#comments">

			<?php endif;  ?>

			<?php comments_number( __('0 Comments', 'carrino'), __('1 Comment', 'carrino'), __('% Comments', 'carrino') ) ?>

			<?php if ( is_single( ) ) : ?>

				</a>

			<?php endif;  ?>

		</li>

	<?php endif; ?>

	</ul>
	
</div>

<?php  endif; ?>