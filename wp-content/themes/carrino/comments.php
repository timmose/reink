<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="section-header">
<h2 class="page-title toggle-comments"><span>
	<?php
		comments_number( __('Leave a Comment', 'carrino'), __('1 Comment', 'carrino'), __('% Comments', 'carrino') );
	?>
</span></h2>
</div>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 50,
					'style'       => 'ul',
					'short_ping'  => true,
					'reply_text'  =>  esc_html__( 'Reply', 'carrino' ),
				) );
			?>
		</ul>

		<?php the_comments_pagination( array(
			'prev_text' => esc_html__( 'Previous', 'carrino' ),
			'next_text' => esc_html__( 'Next', 'carrino' ),
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php echo esc_html__( 'Comments are closed.', 'carrino' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
