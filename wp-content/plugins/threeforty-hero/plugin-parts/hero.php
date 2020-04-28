<?php
/**
 * ThreeFortymedia Hero Plugin
 *
 * @since 1.0
 * @version 1.5
 */

?>

<?php 

if ( ! is_front_page() || is_paged() ) {
	return;
}

// Include vars
include( THREEFORTY_HERO__PLUGIN_DIR . 'inc/vars.php' );

global $post;

?>

<?php if ( get_theme_mod( 'threeforty_hero', true ) ): ?>

<div class="hero flex-grid <?php echo esc_attr( $layout . $full_width ) . ' ' . esc_attr( $style ); ?> slick" data-slides="<?php echo esc_attr( $post_num ); ?>" data-posts="<?php echo esc_attr( $post_num ); ?>" data-slidestoshow="<?php echo esc_attr( $slides_to_show ); ?>" data-thumbnail="<?php echo esc_attr( $thumbnail ); ?>" data-initial-status="<?php echo esc_attr( $active_status ); ?>">
	
<?php 

// Theme slug/textDomain
$theme = wp_get_theme();
$theme_slug =  $theme->get( 'TextDomain' );

/**
 * Define some query arg variables
 */

// Specific posts
$post_in = ( $post_type === 'post_ids' && '' !== get_theme_mod( 'threeforty_hero_post_ids' ) ? get_theme_mod( 'threeforty_hero_post_ids', '' ) : '' );
// Popular posts
$order_by = ( $post_type === 'popular' ? 'comment_count' : '' );
// Exclude Post ID's
$post_not_in = ( $post_type !== 'post_ids' && '' !== get_theme_mod( 'threeforty_hero_exclude_post_ids', '' ) ? get_theme_mod( 'threeforty_hero_exclude_post_ids', '' ) : '' );
if ( '' !== $post_not_in ) {
	$post_not_in = explode(',', $post_not_in );
}

// The query

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

if ( ! is_customize_preview() ) {
	// Get existing transient data
	if ( false === ( $posts_query = get_transient( 'threeforty_hero' ) ) ) {
		// NO transient data, run the query
		$posts_query = new WP_Query( $query_args );
		// Save the results in a transient for 24 hours
		set_transient( 'threeforty_hero', $posts_query, 24 * HOUR_IN_SECONDS );
	}

} else {

	$posts_query = new WP_Query( $query_args );

}

    if( $posts_query->have_posts( ) ):

    	$count = 0;

    /* Start the Loop */
    while ( $posts_query->have_posts( ) ) : $posts_query->the_post(); ?>

    	<?php $count++; ?>

    	<?php if ( get_theme_mod( 'threeforty_hero_parallax', false ) ): ?>

        	<div class="hero-entry parallax-window has-post-thumbnail" data-parallax="scroll" data-image-src="<?php echo get_the_post_thumbnail_url( '', '' . $theme_slug . '-hero-image' ); ?>" data-speed="0.4">

        <?php elseif ( $layout !== 'grid' ): ?>

        	<div class="flex-box hero-entry <?php echo esc_attr( $style ); ?> has-post-thumbnail" data-image-src="<?php echo get_the_post_thumbnail_url( '', '' . $theme_slug . '-' . $thumbnail . '-image' ); ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url( '', '' . $theme_slug . '-' . $thumbnail . '-image' ); ?>)">

        <?php else: ?>

        	<?php 

        	// If we have 3 posts and grid layout add a flex-box wrapper for the 2nd and 3rd post stacked in a column

        	if ( $layout === 'grid' && $post_num === 3 && $count === 2 ) :

        	$wrapper_open = true; ?>

        	<div class="flex-box aside-wrapper">

        	<?php endif; ?>


        	<div class="flex-box hero-entry has-post-thumbnail">

        <?php endif; ?>

        <?php if ( $layout === 'grid' ): ?>

        	<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php if ( $post_num > 1 ) {
						the_post_thumbnail( '' . $theme_slug . '-landscape-image' );
					} else {
						the_post_thumbnail( '' . $theme_slug . '-hero-image' ); 
					} ?>
				</a>
			</div>

		<?php endif; ?>

			<div class="entry-header">

				<?php if ( get_theme_mod( 'threeforty_hero_entry_meta_category', true ) ) : ?>

				<div class="entry-meta before-title">

				<ul class="author-category-meta">

					<li class="category-prepend">

						<span class="screen-reader-text">Posted</span>
						<i><?php echo esc_html__( 'in', 'threeforty-hero' ); ?></i>
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

		<?php if ( $entry_title ): ?>

			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

		<?php endif; ?>

		<?php if ( ( get_theme_mod( 'threeforty_hero_entry_meta_date', false ) || get_theme_mod( 'threeforty_hero_entry_meta_comment_count', false ) || get_theme_mod( 'threeforty_hero_entry_meta_author', false ) ) && get_theme_mod( 'threeforty_hero_style', 'default' ) === 'cover' ) : ?>

			<div class="entry-meta after-title<?php echo esc_attr( $has_avatar ); ?>">

				<ul>

					<?php if ( get_theme_mod( 'threeforty_hero_entry_meta_author_avatar', false ) ) : ?>

						<li class="entry-author-avatar">

								<?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?>

						</li>

						<?php endif; ?>

						<?php if ( get_theme_mod( 'threeforty_hero_entry_meta_author', false ) ) : ?>

						<li class="entry-author-meta">

							<span class="screen-reader-text"><?php echo esc_html__( 'Posted by', 'threeforty-hero' ); ?></span><?php if ( get_theme_mod( 'threeforty_hero_entry_meta_by', false ) ): ?><i><?php echo esc_html__( 'by', 'threeforty-hero' ) ?></i><?php endif; ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"><?php echo get_the_author() ?></a>

						</li>

					<?php endif; ?>

					<?php if ( get_theme_mod( 'threeforty_hero_entry_meta_date', false ) ): ?>
				
					<li class="entry-date">

						<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><?php echo get_the_date( ) ?></time>

					</li>

					<?php endif; ?>

					<?php if ( function_exists( 'threeforty_read_time' ) && get_theme_mod( 'threeforty_hero_entry_meta_read_time', false ) ): ?>
				
					<li class="entry-read-time">

						<?php echo threeforty_read_time( ) ?>

					</li>

					<?php endif; ?>

					<?php if ( function_exists('threeforty_comment_count') && get_theme_mod( 'threeforty_hero_entry_meta_comment_count', false ) ): ?>

					<li class="entry-comment-count">

						<?php echo threeforty_comment_count(); ?>

					</li>

					<?php endif; ?>

				</ul>

			</div>

		<?php endif; ?>

		<?php if ( get_theme_mod( 'threeforty_hero_excerpt', false ) && ( $layout === 'slider' || $layout === 'grid' && $post_num === apply_filters( 'threeforty_hero_posts_have_excerpt', $post_num ) || $layout==='grid' && $count === apply_filters( 'threeforty_hero_posts_have_excerpt', $post_num ) ) ): ?>
				<?php the_excerpt( ); ?>
		<?php endif; ?>

			</div><!-- .entry-header -->
			
		</div><!-- .hero-entry -->


    <?php 

	endwhile;

	// Close aside wrapper if open

	if ( $layout === 'grid' && $wrapper_open ) {
		echo '</div>';
	}

    endif;

    wp_reset_postdata(); // Always reset

 	?>

</div>

<?php endif; ?>