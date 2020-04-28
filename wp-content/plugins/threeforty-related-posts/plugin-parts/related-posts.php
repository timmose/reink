<?php

/**
 * ThreeForty Related Posts Plugin
 *
 * @since 1.0
 * @version 1.2
 */

?>

<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! is_single() ) {
	return; // Return of not single
}

global $post;

// Set our default variables
$post_num = get_theme_mod( 'threeforty_related_posts_num', 3 );
$post_cols = get_theme_mod( 'threeforty_related_posts_cols', 3 );
$has_avatar = ( get_theme_mod( 'threeforty_related_posts_entry_meta_author_avatar', false ) ? ' has-avatar' : '' );
$thumbnail = get_theme_mod( 'threeforty_related_posts_image_size', 'landscape' );
$relate_method = get_theme_mod( 'threeforty_related_posts_method', 'tags' );
$has_title = ( get_theme_mod( 'threeforty_related_posts_title' ) ? ' has-title' : '' );

?>

<?php if ( is_single() && get_theme_mod( 'threeforty_related_posts', true ) ) : ?>
	
<?php 

// Theme slug/textDomain
$theme = wp_get_theme();
$theme_slug =  $theme->get( 'TextDomain' );

/**
 * Define some query arg variables
 */

// Category relationship method
	if ( $relate_method === 'category' ) {

		$category = get_the_category($post->ID);
		$cat_ids = array();
		foreach($category as $post_cat) {
			$cat_ids[] = $post_cat->cat_ID;
		}

		$query_args = array(
			'post__not_in' => array($post->ID),
		    'post_type'      => 'post',
		    'posts_per_page' => $post_num,
		    'cat' => $cat_ids,
		    'post_status' => array(      
					'publish',          // A published post or page.
					),
		    'orderby' => 'rand',
			);

	} else {

		// Tags relationship method
		$tags = wp_get_post_tags($post->ID);
		$tag_ids = array();
		foreach( $tags as $post_tag ) { 
			$tag_ids[] = $post_tag->term_id;
		}

		$query_args = array(
		'post__not_in' => array($post->ID),
	    'post_type'      => 'post',
	    'posts_per_page' => $post_num,
	    'tag__in' => $tag_ids,
	    'post_status' => array(      
					'publish',          // A published post or page.
					),
	    'orderby' => 'rand',
		);

	}

	$posts_query = new WP_Query( $query_args );

    if( $posts_query->have_posts( ) ):

    $count = 0;

     ?>

    <?php echo apply_filters( 'threeforty_related_posts_wrapper', '' ); ?>

	<div class="content-area flex-grid threeforty-related-posts cols-<?php echo esc_attr( $post_cols . $has_title ); ?>" data-posts="<?php echo esc_attr( $post_num ); ?>">

		<?php 

			if ( get_theme_mod( 'threeforty_related_posts_title' ) )  {

				echo '<div class="section-header">';
				if ( get_theme_mod( 'threeforty_related_posts_title' ) ) {
						echo '<h2 class="page-title">' . esc_attr( get_theme_mod( 'threeforty_related_posts_title', '' ) ) . '</h2>';
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
    	$has_category_meta = ( get_theme_mod( 'threeforty_related_posts_entry_meta_category', true ) ? ' has-category-meta' : '' );
    	$post_class = $thumbnail_class . $even_odd_class . $count_class . $has_category_meta;
    	 ?>

    	<article class="flex-box <?php echo esc_attr( $post_class ) . ' ' . esc_attr( get_theme_mod( 'threeforty_related_posts_style', 'default' ) ); ?>">

    		<?php if ( '' !== get_the_post_thumbnail() ) : ?>

				<div class="post-thumbnail">

						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( $theme_slug . '-' . $thumbnail . '-image' ); ?>
						</a>

				</div>

			<?php endif; ?>

	    	<div class="entry-header">

				<?php if ( get_theme_mod( 'threeforty_related_posts_entry_meta_category', true ) ) : ?>

				<div class="entry-meta before-title">

				<ul class="author-category-meta">

					<li class="category-prepend">

						<span class="screen-reader-text">Posted</span>
						<i><?php echo esc_html__( 'in', 'threeforty-related-posts' ); ?></i>
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

		<?php if ( get_theme_mod( 'threeforty_related_posts_entry_title', true ) ) : ?>

			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

		<?php endif; ?>

		<?php if ( get_theme_mod( 'threeforty_related_posts_entry_meta_author', true ) || get_theme_mod( 'threeforty_related_posts_entry_meta_author_avatar', false ) || get_theme_mod( 'threeforty_related_posts_entry_meta_date', true ) || get_theme_mod( 'threeforty_related_posts_entry_meta_comment_count', true ) || get_theme_mod( 'threeforty_related_posts_entry_meta_read_time', true )) : ?>

			<div class="entry-meta after-title<?php echo esc_attr( $has_avatar ); ?>">

				<ul>

					<?php if ( get_theme_mod( 'threeforty_related_posts_entry_meta_author_avatar', false ) ) : ?>

						<li class="entry-author-avatar">

								<?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?>

						</li>

						<?php endif; ?>

						<?php if ( get_theme_mod( 'threeforty_related_posts_entry_meta_author', true ) ) : ?>

						<li class="entry-author-meta">

							<span class="screen-reader-text"><?php echo esc_html__( 'Posted by', 'threeforty-related-posts' ); ?></span><?php if ( get_theme_mod( 'threeforty_related_posts_entry_meta_by', true ) ): ?><i><?php echo esc_html__( 'by', 'threeforty-featured-posts' ) ?></i><?php endif; ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"><?php echo get_the_author() ?></a>

						</li>

					<?php endif; ?>

					<?php if ( get_theme_mod( 'threeforty_related_posts_entry_meta_date', true ) ): ?>
				
					<li class="entry-date">

						<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><?php echo get_the_date( ) ?></time>

					</li>

					<?php endif; ?>

					<?php if ( function_exists( 'threeforty_read_time' ) && get_theme_mod( 'threeforty_related_posts_entry_meta_read_time', true ) ): ?>
				
					<li class="entry-read-time">

						<?php echo threeforty_read_time( ) ?>

					</li>

					<?php endif; ?>

					<?php if ( function_exists('threeforty_comment_count') && get_theme_mod( 'threeforty_related_posts_entry_meta_comment_count', true ) ): ?>

					<li class="entry-comment-count">

						<?php echo threeforty_comment_count(); ?>

					</li>

					<?php endif; ?>

				</ul>

			</div>

		<?php endif; ?>

			</div><!-- .entry-header -->

			<?php if ( get_theme_mod( 'threeforty_related_posts_excerpt', false ) ): ?>

				<div class="entry-content">

				<?php the_excerpt( ); ?>

				</div>

			<?php endif; ?>

	    </article>

    <?php 

	endwhile;

	echo '</div>'; // Close container

	if ( apply_filters( 'threeforty_related_posts_wrapper', '' ) ) {
		echo '</div><!-- .related-posts-wrapper -->';
	}

    endif;

    wp_reset_postdata(); // Always reset

 	?>


<?php endif; ?>