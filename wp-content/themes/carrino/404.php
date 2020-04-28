<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<main id="main" class="site-main">

		<div id="primary" class="content-area flex-grid">

			<header class="page-header">
			<h1 class="page-title"><?php echo esc_html__( 'Not Found', 'carrino' ); ?></h1>
		</header>

			<div class="flex-box has-post-thumbnail">

				<h2 class="message-404"><?php echo esc_html__( 'Oh No, this page does not exist.', 'carrino' ); ?> <a class="toggle-search"><?php echo esc_html__( 'Maybe try a search?', 'carrino' ); ?></a></h2>

			</div>

		</div><!-- #primary -->
	</main><!-- #main -->

<?php get_footer();
