<?php

/**
 * 340 Media: Homepage Blocks
 *
 * @since 1.0
 * @version 1.4
 */

?>

<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! is_front_page() || is_paged() ) {
	return; // Return if not home
}

// ========================================================
// Check if we're running the custom post loop
// ========================================================

// Create array of custom blocks
$array = array( 'threeforty_home_block_1' => get_theme_mod( 'threeforty_home_block_1', false ),
				'threeforty_home_block_2' => get_theme_mod( 'threeforty_home_block_2', false ),
				'threeforty_home_block_3' => get_theme_mod( 'threeforty_home_block_3', false ),
				'threeforty_home_block_4' => get_theme_mod( 'threeforty_home_block_4', false ),
				'threeforty_home_block_5' => get_theme_mod( 'threeforty_home_block_5', false ),
				'threeforty_home_block_6' => get_theme_mod( 'threeforty_home_block_6', false ) );

// Just true values
$blocks = array_filter($array);
$prev_has_background = null;

if ( count($blocks) !== 0 ) {

	global $post;

	// We have some results lets run the block loop

	foreach ( $blocks as $block => $value ) {

	// Set our default variables
	$post_num = get_theme_mod( '' . $block . '_post_num', 3 );
	$post_cols = get_theme_mod( '' . $block . '_cols', 3 );
	$thumbnail = get_theme_mod( '' . $block . '_image_size', 'landscape' );
	$has_avatar = '';
	if ( get_theme_mod( '' . $block . '_entry_meta_author_avatar', true ) ) {
		$has_avatar = ' has-avatar';
	}
	$has_block_title = ( get_theme_mod( '' . $block . '_title', '' ) ? ' has-block-title' : '' );

	//  Override post_cols is we have active sidebar
	if ( in_array('has-sidebar', get_body_class()) && $post_cols > 2 ) {
		$post_cols = 2;
	}

	// Query vars
	$post_offset = get_theme_mod( '' . $block . '_post_offset', 0 );
	$post_type = get_theme_mod( '' . $block . '_post_type', 'recent' );
	$post_cat = get_theme_mod( '' . $block . '_post_cat', '' );
	$post_in = ( ($post_type === 'post_ids' || $post_type === 'product_ids' ) && '' !== get_theme_mod( '' . $block . '_post_ids' ) ? get_theme_mod( '' . $block . '_post_ids', '' ) : '' );
	$post_not_in = ( ($post_type !== 'post_ids' || $post_type !== 'product_ids' ) && '' !== get_theme_mod( '' . $block . '_exclude_post_ids', '' ) ? get_theme_mod( '' . $block . '_exclude_post_ids', '' ) : '' );
	if ( '' !== $post_not_in ) {
		$post_not_in = explode(',', $post_not_in );
	}
	$order_by = ( $post_type === 'popular' ? 'comment_count' : '' ); // Popular posts

	// Inline CSS
	$block_background = ( '' !== get_theme_mod( '' . $block . '_background', '' ) ? 'background:' . get_theme_mod( '' . $block . '_background', '' ) : '' );
	$block_title_color = ( '' !== get_theme_mod( '' . $block . '_title_color', '' ) ? 'color:' . get_theme_mod( '' . $block . '_title_color', '' ) : '' );
	$block_sub_title_color = ( '' !== get_theme_mod( '' . $block . '_subtitle_color', '' ) ? 'color:' . get_theme_mod( '' . $block . '_subtitle_color', '' ) : '' );
	$block_link_more_color = ( '' !== get_theme_mod( '' . $block . '_link_more_color', '' ) ? 'color:' . get_theme_mod( '' . $block . '_link_more_color', '' ) : '' );
	$block_entry_content_color = ( '' !== get_theme_mod( '' . $block . '_entry_content_color', '' ) ? 'color:' . get_theme_mod( '' . $block . '_entry_content_color', '' ) : '' );
	$block_entry_meta_color = ( '' !== get_theme_mod( '' . $block . '_entry_meta_color', '' ) ? 'color:' . get_theme_mod( '' . $block . '_entry_meta_color', '' ) : '' );
	$block_entry_link_color = ( '' !== get_theme_mod( '' . $block . '_entry_link_color', '' ) ? 'color:' . get_theme_mod( '' . $block . '_entry_link_color', '' ) : '' );


?>
	
<?php 

// Theme slug/textDomain
$theme = wp_get_theme();
$theme_slug =  $theme->get( 'TextDomain' );

/**
 * Define some query arg variables
 */


if ( $post_type !== 'recent_products' && $post_type !== 'product_ids' ) :
// Posts

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
			    'post__not_in' => $post_not_in,
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

    <div class="threeforty-post-block-wrapper<?php echo esc_attr( $has_block_title . $prev_has_background ); ?>" style="<?php echo esc_attr( $block_background ); ?>">

	<div class="content-area flex-grid custom-post-block <?php echo esc_attr( $block ); ?> cols-<?php echo esc_attr( $post_cols . ' ' . $thumbnail); ?>">

		<?php 

			if ( get_theme_mod( '' . $block . '_title' ) )  {

				echo '<div class="section-header">';
				if ( get_theme_mod( '' . $block . '_title', '' ) ) {
						echo '<h2 class="page-title" style="' . esc_attr( $block_title_color ) . '">';
						if ( get_theme_mod( '' . $block . '_link_more', false ) && $post_cat && '' === get_theme_mod( '' . $block . '_link_more_text', '' ) ) {
							echo '<a href="' . get_category_link( $post_cat ) . '" style="' . esc_attr( $block_title_color ) . '">' . esc_attr( get_theme_mod( '' . $block . '_title', '' ) ) . '</a>';
						} else {
							echo esc_attr( get_theme_mod( '' . $block . '_title', '' ) );
						}
						echo '</h2>';
						}
				// subtitle
				if ( get_theme_mod( '' . $block . '_subtitle', '' ) ) {
						echo '<p class="page-subtitle" style="' . esc_attr( $block_sub_title_color ) . '">' . esc_attr( get_theme_mod( '' . $block . '_subtitle', '' ) );
						if ( get_theme_mod( '' . $block . '_link_more', false ) && get_theme_mod( '' . $block . '_link_more_text', '' ) && $post_cat  ) {
							echo '<a href="' . get_category_link( $post_cat ) . '" style="' . esc_attr( $block_link_more_color ) . '">' . get_theme_mod( '' . $block . '_link_more_text', '' ) . '</a>';
						}
						echo '</p>';
				}
				// More posts string (no subtitle)
				if ( get_theme_mod( '' . $block . '_link_more', false ) && get_theme_mod( '' . $block . '_link_more_text', '' ) && $post_cat && ''=== get_theme_mod( '' . $block . '_subtitle', '' ) ) {
					echo '<span class="more"><a href="' . get_category_link( $post_cat ) . '" style="' . esc_attr( $block_link_more_color ) . '">' . get_theme_mod( '' . $block . '_link_more_text', '' ) . '</a></span>';
				}
				echo '</div>';

			} 

		?>

 
    <?php 

    /* Start the Loop */

    	while ( $posts_query->have_posts( ) ) : $posts_query->the_post();  ?>

    	<?php

    	$count++;

    	// Some in loop classes
    	$even_odd_class = ( $count % 2 == 0 ? ' even' : ' odd' );
    	$count_class = ' post-' . $count;
    	$thumbnail_class = ( '' !== get_the_post_thumbnail() ? 'has-post-thumbnail' : '' );
    	$has_avatar = ( get_theme_mod( '' . $block . '_entry_meta_author_avatar', false ) ? ' has-avatar' : '' );
    	$has_excerpt = ( get_theme_mod( '' . $block . '_excerpt', false ) ? ' has-excerpt' : '' );
    	$has_before_title_meta = ( get_theme_mod( '' . $block . '_entry_meta_category', true ) ? ' has-category-meta has-meta-before-title' : '' );
    	$has_after_title_meta = ( get_theme_mod( '' . $block . '_entry_meta_author', true ) || get_theme_mod( '' . $block . '_entry_meta_author_avatar', false ) || get_theme_mod( '' . $block . '_entry_meta_date', true ) || get_theme_mod( '' . $block . '_entry_meta_read_time', true ) || get_theme_mod( '' . $block . '_entry_meta_comment_count', true ) ? ' has-meta-after-title' : '' );
    	$post_class = $thumbnail_class . $has_avatar . $has_excerpt . $has_before_title_meta . $has_after_title_meta . $even_odd_class . $count_class;
    	 ?>

    	<article class="flex-box <?php echo esc_attr( $post_class ) . ' ' . esc_attr( get_theme_mod( '' . $block . '_post_style', 'default' ) ); ?>">

    		<?php if ( '' !== get_the_post_thumbnail() ) : ?>

				<div class="post-thumbnail">

					<?php
					// Formats key
					if ( get_theme_mod( '' . $block . '_post_format_icons', true ) && ( has_post_format( 'video' ) || has_post_format( 'gallery' ) || has_post_format( 'audio' ) ) ) : ?>

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

				<?php if ( get_theme_mod( '' . $block . '_entry_meta_category', true ) ) : ?>

				<div class="entry-meta before-title">

				<ul class="author-category-meta">

					<li class="category-prepend">

						<span class="screen-reader-text">Posted</span>
						<i><?php echo esc_html__( 'in', 'threeforty-home-blocks' ); ?></i>
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

		<?php if ( get_theme_mod( '' . $block . '_entry_title', true ) ) : ?>

			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" style="' . esc_attr( $block_entry_link_color ) . '">', '</a></h3>' ); ?>

		<?php endif; ?>

		<?php if ( get_theme_mod( '' . $block . '_entry_meta_author', true ) || get_theme_mod( '' . $block . '_entry_meta_author_avatar', false ) || get_theme_mod( '' . $block . '_entry_meta_date', true ) || get_theme_mod( '' . $block . '_entry_meta_comment_count', true ) || get_theme_mod( '' . $block . '_entry_meta_read_time', false )) : ?>

			<div class="entry-meta after-title<?php echo esc_attr( $has_avatar ); ?>" style="<?php echo esc_attr( $block_entry_meta_color); ?>">

				<ul>

					<?php if ( get_theme_mod( '' . $block . '_entry_meta_author_avatar', false ) ) : ?>

						<li class="entry-author-avatar">

								<?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?>

						</li>

						<?php endif; ?>

						<?php if ( get_theme_mod( '' . $block . '_entry_meta_author', true ) ) : ?>

						<li class="entry-author-meta">

							<span class="screen-reader-text"><?php echo esc_html__( 'Posted by', 'threeforty-home-blocks' ); ?></span><?php if ( get_theme_mod( '' . $block . '_entry_meta_by', true ) ): ?><i><?php echo esc_html__( 'by', 'threeforty-home-blocks' ) ?></i><?php endif; ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>" style="<?php echo esc_attr( $block_entry_link_color ); ?>"><?php echo get_the_author() ?></a>

						</li>

					<?php endif; ?>

					<?php if ( get_theme_mod( '' . $block . '_entry_meta_date', true ) ): ?>
				
					<li class="entry-date">

						<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><?php echo get_the_date( ) ?></time>

					</li>

					<?php endif; ?>

					<?php if ( function_exists('threeforty_read_time') && get_theme_mod( '' . $block . '_entry_meta_read_time', false ) ): ?>
				
					<li class="entry-read-time">

						<?php echo threeforty_read_time( ) ?>

					</li>

					<?php endif; ?>

					<?php if ( function_exists('threeforty_comment_count') && get_theme_mod( '' . $block . '_entry_meta_comment_count', true ) ): ?>

					<li class="entry-comment-count">

						<?php echo threeforty_comment_count(); ?>

					</li>

					<?php endif; ?>

				</ul>

			</div>

		<?php endif; ?>

			</div><!-- .entry-header -->

			<?php if ( get_theme_mod( '' . $block . '_excerpt', false ) && get_theme_mod( '' . $block . '_post_style', 'default' ) !== 'cover' ): ?>

				<div class="entry-content" style="<?php echo esc_attr( $block_entry_content_color ); ?>">

				<?php the_excerpt( ); ?>

				</div>

			<?php endif; ?>

			<?php

			// Read more

			if ( get_theme_mod( '' . $block . '_read_more', false ) && get_theme_mod( '' . $block . '_post_style', 'default' ) !== 'cover' )  {

				echo '<div class="entry-read-more"><a href="' . esc_url( get_permalink() ) . '" class="button read-more">' . esc_html__( 'Read More', 'threeforty-home-blocks') . '</a></div>';
			} ?>

	    </article>

    <?php 

	endwhile;

	echo '</div>'; // Close container
	echo '</div>'; // Close wrapper

    endif; // Endif have posts

else: // Endif not products ?>

<div class="threeforty-post-block-wrapper" style="<?php echo esc_attr( $block_background ); ?>">

<div class="content-area custom-post-block woocommerce">
	<?php 

			if ( get_theme_mod( '' . $block . '_title' ) )  {

				echo '<div class="section-header">';
				if ( get_theme_mod( '' . $block . '_title', '' ) ) {
						echo '<h2 class="page-title" style="' . esc_attr( $block_title_color ) . '">';
						if ( get_theme_mod( '' . $block . '_link_more', false ) && $post_cat && '' === get_theme_mod( '' . $block . '_link_more_text', '' ) ) {
							echo '<a href="' . get_category_link( $post_cat ) . '" style="' . esc_attr( $block_title_color ) . '">' . esc_attr( get_theme_mod( '' . $block . '_title', '' ) ) . '</a>';
						} else {
							echo esc_attr( get_theme_mod( '' . $block . '_title', '' ) );
						}
						echo '</h2>';
						}
				// subtitle
				if ( get_theme_mod( '' . $block . '_subtitle', '' ) ) {
						echo '<p class="page-subtitle" style="' . esc_attr( $block_sub_title_color ) . '">' . esc_attr( get_theme_mod( '' . $block . '_subtitle', '' ) );
						if ( get_theme_mod( '' . $block . '_link_more', false ) && get_theme_mod( '' . $block . '_link_more_text', '' ) && $post_cat  ) {
							echo '<a href="' . get_category_link( $post_cat ) . '" style="' . esc_attr( $block_link_more_color ) . '">' . get_theme_mod( '' . $block . '_link_more_text', '' ) . '</a>';
						}
						echo '</p>';
				}
				// More posts string (no subtitle)
				if ( get_theme_mod( '' . $block . '_link_more', false ) && get_theme_mod( '' . $block . '_link_more_text', '' ) && $post_cat && ''=== get_theme_mod( '' . $block . '_subtitle', '' ) ) {
					echo '<span class="more"><a href="' . get_category_link( $post_cat ) . '" style="' . esc_attr( $block_link_more_color ) . '">' . get_theme_mod( '' . $block . '_link_more_text', '' ) . '</a></span>';
				}
				echo '</div>';

			} 

		?>

<ul class="products columns-3">
	<?php
	if ( '' !== $post_in ) {

		$post_in = explode(',', $post_in );

		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => $post_num,
			'post__in' => $post_in,
			'orderby' => 'post__in',
			);
	} else {
		if ( 0 !== $post_cat ) {
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => $post_num,
			'offset' => $post_offset, // Offset
			'post__not_in' => $post_not_in,
			'tax_query' => array(
		        array(
		            'taxonomy'  => 'product_cat',
		            'field'     => 'term_id',
		            'terms'     => $post_cat,
		            'operator'  => 'IN',
		        )
		   )
			);
	} else {
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => $post_num,
			'offset' => $post_offset, // Offset
			'post__not_in' => $post_not_in,
			);
	}
	}
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		// wp_reset_postdata();
	?>
</ul><!--/.products-->

</div><!-- flex grid -->
</div><!-- wrapper -->

<?php endif;

	// Apply class to blocks with no background, previous block does have
	if( $prev_has_background ) {
		    $prev_has_background = $prev_has_background;
		  }
	$prev_has_background = ( '' !== get_theme_mod( '' . $block . '_background', '' ) ? ' prev-has-background' : '' );

    wp_reset_postdata(); // Always reset

} // End foreach block
} // End if blocks

 	?>

<?php //endif; ?>