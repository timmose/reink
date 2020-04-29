<?php

/**
Plugin Name: 340 Media: Posts Widget
Plugin URI:  http://www.3forty.media
Description: Customizable posts display widget.
Version:     1.0.3
Author:      3FortyMedia
Author URI:  http://www.3forty.media
Text Domain: threeforty-posts-widget
Domain Path: /languages/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function threeforty_posts_widget_init() {
	// load language files.
	load_plugin_textdomain( 'threeforty-posts-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'threeforty_posts_widget_init' );

define( 'THREEFORTY_POSTS_WIDGET__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Register our widget
function register_threeforty_posts_widget() {
	register_widget( 'Threeforty_Posts_Widget' );
}
add_action( 'widgets_init', 'register_threeforty_posts_widget' );

// ========================================================
// Posts Widget
// Displays posts filtered by category, type, recent etc.
// ========================================================

class Threeforty_Posts_Widget extends WP_Widget {

	// Setup our widget

	public function __construct() {

		$widget_ops = array(
			'classname' => 'threeforty_posts_widget',
			'description' => esc_html__('Customizable post display widget', 'threeforty-posts-widget'),
		);

	parent::__construct( 'threeforty_posts_widget', esc_html__('340 Media: Posts Widget', 'threeforty-posts-widget'), $widget_ops );

	}

	// ========================================================
	// BACKEND FORM
	// ========================================================

	public function form($instance) {

		/* Default variables */

		$title = (!empty($instance['title']) ? $instance['title'] : '');
		$number = (!empty($instance['number']) ? absint($instance['number'] ) : 4);
		$offset = (!empty($instance['offset']) ? absint($instance['offset'] ) : 0);
		$post_type = (!empty($instance['post_type']) ? $instance['post_type'] : 'recent');
		$post_ids = (!empty($instance['widget_post_ids']) ? $instance['widget_post_ids'] : '');
		$exclude_post_ids = (!empty($instance['widget_exclude_post_ids']) ? $instance['widget_exclude_post_ids'] : '');
		$post_cat = (!empty($instance['post_cat']) ? $instance['post_cat'] : '');
		$layout = (!empty($instance['layout']) ? $instance['layout'] : '');
		$thumbnail = (isset($instance['thumbnail']) ? (bool) $instance['thumbnail'] : false);
		$by = (isset($instance['by']) ? (bool) $instance['by'] : false);
		$avatar = (isset($instance['avatar']) ? (bool) $instance['avatar'] : false);
		$author_meta = (isset($instance['author_meta']) ? (bool) $instance['author_meta'] : false);
		$category_meta = (isset($instance['category_meta']) ? (bool) $instance['category_meta'] : false);
		$date_meta = (isset($instance['date_meta']) ? (bool) $instance['date_meta'] : false);
		$comment_count = (isset($instance['comment_count']) ? (bool) $instance['comment_count'] : false);

		// Title
		$output = '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('title') ) . '">' . esc_html__('Title:', 'threeforty-posts-widget') . '</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr($this->get_field_id('title')) . '" name="' . esc_attr($this->get_field_name('title')) . '" value="' . esc_attr($title) . '">';
		$output .= '</p>';

		// Number of Posts
		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('number') ) . '">' . esc_html__('Number of Posts:', 'threeforty-posts-widget') . '</label>';
		$output .= '<input type="number" min="1" class="widefat" id="' . esc_attr($this->get_field_id('number')) . '" name="' . esc_attr($this->get_field_name('number')) . '" value="' . esc_attr($number) . '">';
		$output .= '</p>';

		// Post Type
		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('post_type') ) . '">' . esc_html__('Post Type:', 'threeforty-posts-widget') . '</label>';
		$output .= '<select class="widefat" id="' . esc_attr($this->get_field_id('post_type')) . '" name="' . esc_attr($this->get_field_name('post_type')) . '">';
		$output .= '<option ' . selected( $post_type, 'recent', false ) . ' value="recent">' . esc_html__('Recent', 'threeforty-posts-widget') . '</option>';
		$output .= '<option ' . selected( $post_type, 'popular', false ) . ' value="popular">' . esc_html__('Popular', 'threeforty-posts-widget') . '</option>';
		$output .= '<option ' . selected( $post_type, 'post_ids', false ) . ' value="post_ids">' . esc_html__('Specific Posts (Enter post IDs below)', 'threeforty-posts-widget') . '</option>';
		$output .= '</select>';
		$output .= '</p>';

		// Specific post IDs
		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('widget_post_ids') ) . '">' . esc_html__('Post IDs: (Enter a comma separated List of post IDs)', 'threeforty-posts-widget') . '</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr($this->get_field_id('widget_post_ids')) . '" name="' . esc_attr($this->get_field_name('widget_post_ids')) . '" value="' . esc_attr($post_ids) . '">';
		$output .= '</p>';

		// Category ID
		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('post_cat') ) . '">' . esc_html__('Category: (Can be used with Post Type)', 'threeforty-posts-widget') . '</label>';
		$output .= '<select class="widefat" id="' . esc_attr($this->get_field_id('post_cat')) . '" name="' . esc_attr($this->get_field_name('post_cat')) . '">';
		$output .= '<option></option>'; // Set a blank option if selected we'll just display the latest posts

		// Category selection
		$categories = get_categories('type=post');
		foreach($categories as $category) {
			if ($category->term_id == $post_cat) {
			$output .= '<option selected="selected" value="' . $category->term_id . '">' . $category->cat_name . '</option>';
			} else {
				$output .= '<option value="' . $category->term_id . '">' . $category->cat_name . '</option>';
			}
		}
		$output .= '</select>';
		$output .= '</p>';

		// Offset
		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('offset') ) . '">' . esc_html__('Offset: (Number of posts to skip)', 'threeforty-posts-widget') . '</label>';
		$output .= '<input type="number" min="0" class="widefat" id="' . esc_attr($this->get_field_id('offset')) . '" name="' . esc_attr($this->get_field_name('offset')) . '" value="' . esc_attr($offset) . '">';
		$output .= '</p>';

		// Exclude post IDs
		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('widget_exclude_post_ids') ) . '">' . esc_html__('Exclude Post IDs: (Enter a comma separated List of post IDs to Exclude)', 'threeforty-posts-widget') . '</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr($this->get_field_id('widget_exclude_post_ids')) . '" name="' . esc_attr($this->get_field_name('widget_exclude_post_ids')) . '" value="' . esc_attr($exclude_post_ids) . '">';
		$output .= '</p>';

		// Layout
		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('layout') ) . '">' . esc_html__('Layout:', 'threeforty-posts-widget') . '</label>';
		$output .= '<select class="widefat" id="' . esc_attr($this->get_field_id('layout')) . '" name="' . esc_attr($this->get_field_name('layout')) . '">';
		$output .= '<option ' . selected( $layout, 'list', false ) . ' value="list">' . esc_html__('List', 'threeforty-posts-widget') . '</option>';
		$output .= '<option ' . selected( $layout, 'list-first-grid', false ) . ' value="list-first-grid">' . esc_html__('List First Grid', 'threeforty-posts-widget') . '</option>';
		$output .= '<option ' . selected( $layout, 'grid', false ) . ' value="grid">' . esc_html__('Grid', 'threeforty-posts-widget') . '</option>';
		$output .= '</select>';
		$output .= '</p>';

		// Show thumbnail
		$output .= '<p>';
		$output .= '<input type="checkbox" class="checkbox" ' . checked( $thumbnail, 1, false ) . ' id="' . esc_attr($this->get_field_id('thumbnail')) . '" name="' . esc_attr($this->get_field_name('thumbnail')) . '">';
		$output .= '<label for="' . esc_attr($this->get_field_id('thumbnail') ) . '">' . esc_html__('Thumbnail', 'threeforty-posts-widget') . '</label>';
		$output .= '</p>';

		// By
		$output .= '<p>';
		$output .= '<input type="checkbox" class="checkbox" ' . checked( $by, 1, false ) . ' id="' . esc_attr($this->get_field_id('by')) . '" name="' . esc_attr($this->get_field_name('by')) . '">';
		$output .= '<label for="' . esc_attr($this->get_field_id('by') ) . '">' . esc_html__('"by"', 'threeforty-posts-widget') . '</label>';
		$output .= '</p>';

		// Avatar
		$output .= '<p>';
		$output .= '<input type="checkbox" class="checkbox" ' . checked( $avatar, 1, false ) . ' id="' . esc_attr($this->get_field_id('avatar')) . '" name="' . esc_attr($this->get_field_name('avatar')) . '">';
		$output .= '<label for="' . esc_attr($this->get_field_id('avatar') ) . '">' . esc_html__('Avatar', 'threeforty-posts-widget') . '</label>';
		$output .= '</p>';

		// Show author meta
		$output .= '<p>';
		$output .= '<input type="checkbox" class="checkbox" ' . checked( $author_meta, 1, false ) . ' id="' . esc_attr($this->get_field_id('author_meta')) . '" name="' . esc_attr($this->get_field_name('author_meta')) . '">';
		$output .= '<label for="' . esc_attr($this->get_field_id('author_meta') ) . '">' . esc_html__('Author', 'threeforty-posts-widget') . '</label>';
		$output .= '</p>';

		// Show category meta
		$output .= '<p>';
		$output .= '<input type="checkbox" class="checkbox" ' . checked( $category_meta, 1, false ) . ' id="' . esc_attr($this->get_field_id('category_meta')) . '" name="' . esc_attr($this->get_field_name('category_meta')) . '">';
		$output .= '<label for="' . esc_attr($this->get_field_id('category_meta') ) . '">' . esc_html__('Category', 'threeforty-posts-widget') . '</label>';
		$output .= '</p>';

		// Show date meta
		$output .= '<p>';
		$output .= '<input type="checkbox" class="checkbox" ' . checked( $date_meta, 1, false ) . ' id="' . esc_attr($this->get_field_id('date_meta')) . '" name="' . esc_attr($this->get_field_name('date_meta')) . '">';
		$output .= '<label for="' . esc_attr($this->get_field_id('date_meta') ) . '">' . esc_html__('Date', 'threeforty-posts-widget') . '</label>';
		$output .= '</p>';

		// Show comment count
		$output .= '<p>';
		$output .= '<input type="checkbox" class="checkbox" ' . checked( $comment_count, 1, false ) . ' id="' . esc_attr($this->get_field_id('comment_count')) . '" name="' . esc_attr($this->get_field_name('comment_count')) . '">';
		$output .= '<label for="' . esc_attr($this->get_field_id('comment_count') ) . '">' . esc_html__('Comment Count', 'threeforty-posts-widget') . '</label>';
		$output .= '</p>';

		// If read time function is active add as a meta display option
		if ( function_exists( 'threeforty_read_time' ) ) :

			$read_time = (isset($instance['read_time']) ? (bool) $instance['read_time'] : false);

			$output .= '<p>';
			$output .= '<input type="checkbox" class="checkbox" ' . checked( $read_time, 1, false ) . ' id="' . esc_attr($this->get_field_id('read_time')) . '" name="' . esc_attr($this->get_field_name('read_time')) . '">';
			$output .= '<label for="' . esc_attr($this->get_field_id('read_time') ) . '">' . esc_html__('Read Time', 'threeforty-posts-widget') . '</label>';
			$output .= '</p>';

		endif;

		// Escape the output
		$allowed_html = array(
			'p' => array(),
			'label' => array(
				'for' => array(),
			),
			'input' => array(
				'type' => array(),
				'class' => array(),
				'id' => array(),
				'name' => array(),
				'value' => array(),
				'min' => array(),
				'checked' => array(),
			),
			'select' => array(
				'class' => array(),
				'id' => array(),
				'name' => array(),
			),
			'option' => array(
				'value' => array(),
				'selected' => array(),
			),
			'button' => array(
				'class' => array(),
				'id' => array(),
				'name' => array(),
			),
		);

		echo wp_kses( $output, $allowed_html );

	}

	// Update Widget

	public function update($new_instance, $old_instance) {

		$instance = array();
		$instance['title'] = (!empty($new_instance['title']) ? strip_tags($new_instance['title']) : '');
		$instance['number'] = (!empty($new_instance['number']) ? absint(strip_tags($new_instance['number'])) : 4);
		$instance['offset'] = (!empty($new_instance['offset']) ? absint(strip_tags($new_instance['offset'])) : 0);
		$instance['post_type'] = (!empty($new_instance['post_type']) ? strip_tags($new_instance['post_type']) : '');
		$instance['widget_post_ids'] = (!empty($new_instance['widget_post_ids']) ? strip_tags($new_instance['widget_post_ids']) : '');
		$instance['widget_exclude_post_ids'] = (!empty($new_instance['widget_exclude_post_ids']) ? strip_tags($new_instance['widget_exclude_post_ids']) : '');
		$instance['post_cat'] = (!empty($new_instance['post_cat']) ? strip_tags($new_instance['post_cat']) : '');
		$instance['layout'] = (!empty($new_instance['layout']) ? strip_tags($new_instance['layout']) : '');
		$instance['thumbnail'] = (isset( $new_instance['thumbnail'] ) ? (bool) $new_instance['thumbnail'] : false);
		$instance['by'] = (isset( $new_instance['by'] ) ? (bool) $new_instance['by'] : false);
		$instance['avatar'] = (isset( $new_instance['avatar'] ) ? (bool) $new_instance['avatar'] : false);
		$instance['author_meta'] = (isset( $new_instance['author_meta'] ) ? (bool) $new_instance['author_meta'] : false);
		$instance['category_meta'] = (isset( $new_instance['category_meta'] ) ? (bool) $new_instance['category_meta'] : false);
		$instance['date_meta'] = (isset( $new_instance['date_meta'] ) ? (bool) $new_instance['date_meta'] : false);
		$instance['comment_count'] = (isset( $new_instance['comment_count'] ) ? (bool) $new_instance['comment_count'] : false);
		$instance['read_time'] = (isset( $new_instance['read_time'] ) ? (bool) $new_instance['read_time'] : false);

		return $instance;

	}

	// ========================================================
	// FRONTEND OUTPUT
	// ========================================================

	public function widget($args, $instance) {

		// Database query arg variables

		$post_num = ( !empty($instance['number'] ) ? absint($instance['number']) : 4 );
		$post_offset = ( !empty($instance['offset'] ) ? absint($instance['offset']) : 0 );
		$order_by = ( $instance[ 'post_type' ] === 'popular' ? 'comment_count' : '');
		$post_cat = ( !empty($instance['post_cat']) ? $instance['post_cat'] : '' );
		$post_in = ( $instance[ 'post_type' ] === 'post_ids' && '' !== $instance['widget_post_ids'] ? $instance['widget_post_ids'] : '' );
		$post_not_in = ( $instance[ 'post_type' ] !== 'post_ids' && '' !== $instance['widget_exclude_post_ids'] ? $instance['widget_exclude_post_ids'] : '' );
		if ( '' !== $post_not_in ) {
			$post_not_in = explode(',', $post_not_in );
		}

		if ( '' !== $post_in ) {

			// Specific posts create an array
			$post_in = explode(',', $post_in );

			$query_args = array(
			    'posts_per_page' => $post_num,
			    'post__in' => $post_in,
			    'ignore_sticky_posts' => 1,
			    'orderby' => 'post__in',
			    // Only show posts with a featured image
    			// 'meta_query' => array(array('key' => '_thumbnail_id')),
			);

		} else {

			$query_args = array(
			    'posts_per_page' => $post_num,
			    'offset' => $post_offset, // Offset
				'cat' => $post_cat, // If we are diplaying posts from a category
			    'ignore_sticky_posts' => 1,
			    'orderby' => $order_by, // If we are displaying popular posts
			    'post__not_in' => $post_not_in,
			    'post_status' => array(      
					'publish',          // A published post or page.
					),
			    // Only show posts with a featured image
    			//'meta_query' => array(array('key' => '_thumbnail_id')),
			);

		}

		$posts_query = new WP_Query($query_args);

		// Loop variables

		$theme = wp_get_theme();
		$theme_slug =  $theme->get( 'TextDomain' );

		$thumbnails = ( $instance[ 'thumbnail' ] ? ' has-post-thumbnails' : '' );
		$thumb_type = ( $instance[ 'layout' ] === 'grid' ? $theme_slug . '-landscape-image' : 'thumbnail' );

		// Escape widget before and after output
		$allowed_html = array(
			'section' => array(
				'class' => array(),
				'id'  => array(),
			),
			'h3' => array(
				'class' => array(),
			),
			'h2' => array(
				'class' => array(),
			),
		);
		echo wp_kses( $args['before_widget'], $allowed_html );

		if ( !empty( $instance[ 'title' ]) ) :
			echo wp_kses( $args['before_title'], $allowed_html ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses( $args['after_title'], $allowed_html );
		endif;

		if ( $posts_query->have_posts()):

			$count = 0;

			echo '<ul class="list-style-' . esc_attr( $instance[ 'layout' ] ) . esc_attr( $thumbnails ) . ' ' . esc_attr( $instance[ 'post_type' ] ) . '-posts">';

			while ($posts_query->have_posts()) : $posts_query->the_post();

				$count++; ?>

				<?php

				$has_thumbnail = ( has_post_thumbnail() && $instance[ 'thumbnail' ] ? ' has-post-thumbnail' : '' );
				$first_grid = ( $instance[ 'layout'] === 'list-first-grid' && $count === 1 ? ' first-grid' : '' );
				$has_category_meta = ( $instance['category_meta'] ? ' has-category-meta' : '' );
				$has_avatar = ( $instance['avatar'] ? ' has-avatar' : '' ); ?>

				<li class="widget-entry<?php echo esc_attr( $has_thumbnail . $first_grid . $has_category_meta ); ?>">

					<?php if ( $instance[ 'thumbnail' ] && has_post_thumbnail() ) : ?>

						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php
								// Check for list first grid
								if ( $instance[ 'layout'] === 'list-first-grid' && $count === 1 ) {
									the_post_thumbnail( $theme_slug . '-landscape-image' );
								} else {
									the_post_thumbnail( $thumb_type );
								} ?>
							</a>
						</div>

					<?php endif ?>

						<div class="entry-header">

	    		<?php if ( $instance[ 'category_meta' ] ) : ?>

	    		<div class="entry-meta before-title">
					<ul class="author-category-meta">

						<?php if ( $instance[ 'category_meta' ] ): ?>
						 <li class="category-prepend"><span class="screen-reader-text">Posted</span><i><?php echo esc_html__('in', 'threeforty-posts-widget' ) ?></i></li>
						 <li class="category-list">
						  <?php the_category('', ''); ?>
						  </li>

						<?php endif; ?>
					</ul>

				</div>

			<?php endif; ?>

	    		<?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="entry-title-link">', '</a>' ); ?>

	    		<?php if ( $instance[ 'date_meta' ] || $instance[ 'read_time' ] || $instance[ 'comment_count' ] || $instance['author_meta'] || $instance['avatar'] ) : ?>

	    		<div class="entry-meta after-title<?php echo esc_attr( $has_avatar ); ?>">

	    			<ul>

	    				<?php if ( $instance[ 'avatar' ] ): ?>

							<li class="entry-author-avatar"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"><?php echo get_avatar( get_the_author_meta('ID'), 30 ); ?></a></li>

						<?php endif; ?>

	    				<?php if ( $instance[ 'author_meta' ] ): ?>

							<li class="entry-author-meta"><span class="screen-reader-text">Posted</span><?php if ( $instance[ 'by' ] ): ?><i><?php echo esc_html__('by', 'threeforty-posts-widget' ); ?></i><?php endif; ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"><?php echo get_the_author() ?></a></li>

						<?php endif; ?>

	    				<?php if ( $instance[ 'date_meta' ] ): ?>

							<li class="entry-date"><time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><?php echo get_the_date( ) ?></time></li>

						<?php endif; ?>

						<?php if ( function_exists( 'threeforty_read_time' ) && $instance[ 'read_time' ] ): ?>

							<li class="entry-read-time"><?php echo threeforty_read_time(); ?></li>

						<?php endif;  ?>

						<?php if ( function_exists('threeforty_comment_count') && $instance[ 'comment_count' ] ): ?>

							<li class="entry-comment-count"><?php echo threeforty_comment_count(); ?></li>

						<?php endif;  ?>
					</ul>
					
				</div>

			<?php endif; ?>

						</div>

	    	</li>

	        <?php endwhile;

        	echo '</ul>';

		endif;

		echo wp_kses( $args['after_widget'], $allowed_html );

		wp_reset_postdata(); // Always reset
	}

} // End Class


?>