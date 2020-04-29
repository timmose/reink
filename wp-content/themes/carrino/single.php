<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

get_header(); ?>

 <?php 

$hero = ( is_single() && strpos(carrino_post_class(), 'hero') && '' !== get_the_post_thumbnail() ? true : false );

// Hero post layout display the hero before the content
if ( $hero ) {

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/post/content', 'hero' );

	endwhile;

} ?>

	<div class="wrap">

		<main id="main" class="site-main">
		<div id="primary" class="content-area flex-grid the-post <?php echo esc_attr( get_theme_mod( 'carrino_single_thumbnail_aspect_ratio', 'landscape' ) ) . '-aspect-ratio' ?>">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				// Get post tags and share template
				get_template_part( 'template-parts/post/single', 'tags');

				// After Content Hook
				threeforty_after_content();

				// Get the authour bio template if enabled

				if ( get_theme_mod( 'carrino_single_author_bio', true ) && '' !== get_the_author_meta( 'description' ) ) {
					get_template_part( 'template-parts/post/single', 'authorbio');
				}

				// Post pagination
				if ( get_theme_mod( 'carrino_single_post_navigation', true ) ) :
					get_template_part( 'template-parts/post/single', 'post-navigation');
				endif;

				// After Comments Hook
				threeforty_before_comments();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :

					comments_template();
				endif;

				// After Comments Hook
				threeforty_after_comments();

			endwhile; // End of the loop.
			?>

		</div><!-- #primary -->
	</main><!-- #main -->
	<?php 
		get_sidebar( 'aside' );
	?>
</div>

<?php get_footer();
