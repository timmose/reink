<?php

/**
 * ThreeForty Featured Posts Plugin (Custom Posts)
 *
 * @since 1.0
 * @version 1.0
 */

?>

<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! is_front_page() || is_paged() ) {
	return; // Return if not home
}

// Set our default variables
$post_num = get_theme_mod( 'threeforty_custom_posts_num', 3 );
$post_cols = get_theme_mod( 'threeforty_custom_posts_cols', 3 );
$post_offset = get_theme_mod( 'threeforty_custom_posts_offset', 0 );
$post_type = get_theme_mod( 'threeforty_custom_posts_type', 'recent' );
$post_cat = get_theme_mod( 'threeforty_custom_posts_post_cat', '' );
$post_in = ( $post_type === 'post_ids' && '' !== get_theme_mod( 'threeforty_custom_posts_post_ids' ) ? get_theme_mod( 'threeforty_custom_posts_post_ids', '' ) : '' );
// Popular posts
$order_by = ( $post_type === 'popular' ? 'comment_count' : '' );
$has_avatar = ( get_theme_mod( 'threeforty_custom_posts_entry_meta_author_avatar', false ) ? ' has-avatar' : '' );
$thumbnail = get_theme_mod( 'threeforty_custom_posts_image_size', 'landscape' );
$has_category_meta = ( get_theme_mod( 'threeforty_custom_posts_entry_meta_category', true ) ? ' has-category-meta' : '' );
// Check for after title meta
$has_after_title_meta = '';
if ( get_theme_mod( 'threeforty_custom_posts_featured_entry_meta_author', true ) || get_theme_mod( 'threeforty_custom_posts_featured_entry_meta_author_avatar', false ) || get_theme_mod( 'threeforty_custom_posts_featured_entry_meta_date', true ) || get_theme_mod( 'threeforty_custom_posts_featured_entry_meta_comment_count', true ) || get_theme_mod( 'threeforty_custom_posts_featured_entry_meta_read_time', false )) {
	$has_after_title_meta = ' has-meta-after-title';
}

global $post;


?>

<?php if ( is_front_page() && get_theme_mod( 'threeforty_custom_posts', false ) )  : ?>
	
<?php 

// Theme slug/textDomain
$theme = wp_get_theme();
$theme_slug =  $theme->get( 'TextDomain' );

/**
 * Define some query arg variables
 */

if ( '' !== $post_in ) {

			// Specific posts create an array
			$post_in = explode(',', $post_in );

			$query_args = array(
			    'posts_per_page' => $post_num,
			    'post__in' => $post_in,
			    'ignore_sticky_posts' => 1,
			    'orderby' => 'post__in',
			    // Only show posts with a featured image
    			'meta_query' => array(array('key' => '_thumbnail_id')),
			);

		} else {

			$query_args = array(
			    'posts_per_page' => $post_num,
			    'offset' => $post_offset, // Offset
				'cat' => $post_cat, // If we are diplaying posts from a category
			    'ignore_sticky_posts' => 1,
			    'orderby' => $order_by, // If we are displaying popular posts
			    // Only show posts with a featured image
    			'meta_query' => array(array('key' => '_thumbnail_id')),
    			'post_status' => array(      
					'publish',          // A published post or page.
					),
			);

		}

	$posts_query = new WP_Query( $query_args );

    if( $posts_query->have_posts( ) ) :

    $count = 0;

     ?>

     <?php echo apply_filters( 'threeforty_custom_posts_posts_wrapper', '' ); ?>


	<div class="content-area flex-grid threeforty-home-featured threeforty-custom-posts cols-<?php echo esc_attr( $post_cols); ?>">

		<?php 

			if ( get_theme_mod( 'threeforty_custom_posts_title' ) )  {

				echo '<div class="section-header">';
				if ( get_theme_mod( 'threeforty_custom_posts_title' ) ) {
						echo '<h2 class="page-title">' . esc_attr( get_theme_mod( 'threeforty_custom_posts_title', '' ) ) . '</h2>';
				}
				echo '</div>';

			} 

		?>

 
    <?php 

    /* Start the Loop */

    while ( $posts_query->have_posts( ) ) : $posts_query->the_post(); ?>

    	<?php

    	$count++;

    	// Some in loop classes
    	$thumbnail_class = ( '' !== get_the_post_thumbnail() ? 'has-post-thumbnail' : '' );
    	$even_odd_class = ( $count % 2 == 0 ? ' even' : ' odd' );
    	$count_class = ' post-' . $count;
    	$post_class = $thumbnail_class . $even_odd_class . $count_class . $has_category_meta . $has_after_title_meta;
    	 ?>

    	<article class="flex-box <?php echo esc_attr( $post_class ) . ' ' . esc_attr( get_theme_mod( 'threeforty_custom_posts_loop_style', 'default' ) ); ?>">

    		<?php if ( '' !== get_the_post_thumbnail() ) : ?>

				<div class="post-thumbnail">

					<?php
					// Formats key
					if ( get_theme_mod( 'threeforty_custom_posts_post_format_icons', true ) && ( has_post_format( 'video' ) || has_post_format( 'gallery' ) || has_post_format( 'audio' ) ) ) : ?>

						<div class="formats-key">

							<?php if ( has_post_format( 'video' ) ): ?>

								<span class="class-format"><i class="icon-videocam-1"></i></span>

							<?php endif; ?>

							<?php if ( has_post_format( 'audio' ) ): ?>

								<span class="class-format"><i class="icon-headphones"></i></span>

							<?php endif; ?>

							<?php if ( has_post_format( 'gallery' ) ): ?>

								<span class="class-format"><i class="icon-picture"></i></span>

							<?php endif; ?>

						</div>

					<?php endif; ?>

						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( $theme_slug . '-' . $thumbnail . '-image' ); ?>
						</a>

				</div>

			<?php endif; ?>

	    	<div class="entry-header">

				<?php if ( get_theme_mod( 'threeforty_custom_posts_entry_meta_category', true ) ) : ?>

				<div class="entry-meta before-title">

				<ul class="author-category-meta">

					<li class="category-prepend">

						<span class="screen-reader-text">Posted</span>
						<i><?php echo esc_html__( 'in', 'threeforty-featured-posts' ); ?></i>
					</li>
					<li class="category-list">
						<?php 
						if (function_exists( 'threeforty_get_category' ) ) {
							echo threeforty_get_category();
						} else {
							the_category( apply_filters( 'threeforty_category_separator', '' ), '');
						}
						?>

					</li>

				</ul>

			</div><!-- .entry-meta -->

		<?php endif; ?>

		<?php if ( get_theme_mod( 'threeforty_custom_posts_entry_title', true ) ) : ?>

			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

		<?php endif; ?>

		<?php if ( get_theme_mod( 'threeforty_custom_posts_entry_meta_author', true ) || get_theme_mod( 'threeforty_custom_posts_entry_meta_author_avatar', false ) || get_theme_mod( 'threeforty_custom_posts_entry_meta_date', true ) || ( function_exists('threeforty_comment_count') && get_theme_mod( 'threeforty_custom_posts_entry_meta_comment_count', true ) ) || get_theme_mod( 'threeforty_custom_posts_entry_meta_read_time', false )) : ?>

			<div class="entry-meta after-title<?php echo esc_attr( $has_avatar ); ?>">

				<ul>

					<?php if ( get_theme_mod( 'threeforty_custom_posts_entry_meta_author_avatar', false ) ) : ?>

						<li class="entry-author-avatar">

								<?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?>

						</li>

						<?php endif; ?>

						<?php if ( get_theme_mod( 'threeforty_custom_posts_entry_meta_author', true ) ) : ?>

						<li class="entry-author-meta">

							<span class="screen-reader-text">Posted</span><i><?php echo esc_html__( 'by', 'threeforty-featured-posts' ) ?></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"><?php echo get_the_author() ?></a>

						</li>

					<?php endif; ?>

					<?php if ( get_theme_mod( 'threeforty_custom_posts_entry_meta_date', true ) ): ?>
				
					<li class="entry-date">

						<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><?php echo get_the_date( ) ?></time>

					</li>

					<?php endif; ?>

					<?php if ( function_exists('threeforty_read_time') && get_theme_mod( 'threeforty_custom_posts_entry_meta_read_time', false ) ): ?>
				
					<li class="entry-read-time">

						<?php echo threeforty_read_time( ) ?>

					</li>

					<?php endif; ?>

					<?php if ( function_exists('threeforty_comment_count') && get_theme_mod( 'threeforty_custom_posts_entry_meta_comment_count', true ) ): ?>

					<li class="entry-comment-count">

						<?php echo threeforty_comment_count(); ?>

					</li>

					<?php endif; ?>

				</ul>

			</div>

		<?php endif; ?>

			</div><!-- .entry-header -->

			<?php if ( get_theme_mod( 'threeforty_custom_posts_excerpt', false ) && get_theme_mod( 'threeforty_custom_posts_loop_style', 'default' ) !== 'cover' ): ?>

				<div class="entry-content">

				<?php the_excerpt( ); ?>

				</div>

			<?php endif; ?>

	    </article>

    <?php 

	endwhile;

	echo '</div>'; // Close container

	if ( apply_filters( 'threeforty_custom_posts_posts_wrapper', '' ) ) {
		echo '</div>';
	}

    endif;

    wp_reset_postdata(); // Always reset

 	?>


<?php endif; ?>