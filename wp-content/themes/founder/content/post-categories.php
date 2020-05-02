<?php

$categories = get_the_category( $post->ID );
$separator  = ' ';
$output     = '';

if ( $categories ) {
	echo '<p class="post-categories">';
		// translators: Published in post category
		echo '<span>' . esc_html__( "Published in", "founder" ) . ' </span>';
		foreach ( $categories as $category ) {
			// translators: View all posts in post category
			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'founder' ), $category->name ) ) . '">' . esc_html( $category->cat_name ) . '</a>' . $separator;
		}
		echo trim( $output, $separator );
	echo "</p>";
}