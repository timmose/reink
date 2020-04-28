<?php

/**
 * 340 Media: Theme Boost Functions
 *
 * @since 1.0
 * @version 1.3
 */

// ========================================================
// Calculate reading time for each post
// ========================================================

if ( ! function_exists( 'threeforty_read_time' ) ) {

	function threeforty_read_time() {
	    $post_content = get_post_field( 'post_content' );
	    $word_count = str_word_count( strip_tags( $post_content ) );
	    $readingtime = ceil( $word_count / 300);

	    $readtime = $readingtime . '<span> ' . esc_html__( 'minute read', 'threeforty-theme-boost' ) . '</span>';

	    return $readtime;
	}

}

// ========================================================
// Output the related category links in post meta
// ========================================================
/**
 * This function only exists to handle Many category EDGE case
 * We use it for archive (not single) loops
 */

if ( ! function_exists( 'threeforty_get_category' ) ) {

	function threeforty_get_category() {

		global $post;

		$category = get_the_category($post->id);

		$count = 0;

		$output =  '<ul class="post-categories">';

		foreach($category as $the_category) {

			$count++;

			$output .= '<li class="cat-slug-' . esc_attr( $the_category->slug ) . ' cat-id-' . esc_attr( $the_category->cat_ID ) . '"><a href="' . get_category_link( $the_category->cat_ID ) . '" class="cat-link-' . esc_attr( $the_category->cat_ID ) . '">' . esc_attr( $the_category->cat_name ) . '</a></li>';

			if ( $count === 2 ) {

				break; // Simply break after the second loop

			}

		}

		$output .= '</ul>';

		return $output;

	}

}

// ========================================================
// Output comment count
// ========================================================
/**
 * This funciton is here so that we have just one
 * instance to translate for all theme plugins
 */

function threeforty_comment_count() {

	$comment_count = comments_number( __('0 <span>Comments</span>', 'threeforty-theme-boost'), __('1 <span>Comment</span>', 'threeforty-theme-boost'), __('% <span>Comments</span>', 'threeforty-theme-boost') );

		return $comment_count;

}

// ========================================================
// Filter image compression/quality
// ========================================================
// Added in v1.1

function threeforty_set_image_quality() {

	return get_theme_mod( 'threeforty_image_quality', 82 );

}

add_filter( 'jpeg_quality', 'threeforty_set_image_quality');

// ========================================================
// Add class to body tag
// ========================================================

function threeforty_theme_boost_class( $classes ) {

	if ( function_exists('sb_instagram_feed_init') && get_theme_mod( 'threeforty_sbi_theme_style', false ) ) {
		$classes[] = 'sbi-theme-style';
	}
	return $classes;
}
add_filter( 'body_class', 'threeforty_theme_boost_class' );




?>