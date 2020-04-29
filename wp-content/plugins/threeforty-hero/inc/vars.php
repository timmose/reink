<?php

/**
 * ThreeFortymedia Hero Plugin Vars
 *
 * @since 1.5
 * @version 1.0
 */

?>

<?php

// Set our default variables
$post_num = get_theme_mod( 'threeforty_hero_post_num', 1 );
if ( get_theme_mod( 'threeforty_hero_layout', 'grid' ) === 'grid' && $post_num > 3 ) {
	$post_num = 3;
}
$slide_num = get_theme_mod( 'threeforty_hero_slide_num', 1 ); // See theme customizer filters (this needs to be added to the theme functions)
$slides_to_show = get_theme_mod( 'threeforty_hero_slidestoshow', 3 );
if ( $slides_to_show  > 4 ) {
	$slides_to_show = 4;
}
if ( ! get_theme_mod( 'threeforty_hero_full_width', false ) && $slides_to_show > 3 ) {
	$slides_to_show = 3;
}
if ( $slides_to_show === 0 || '' === $slides_to_show ) {
	$slides_to_show = 1;
}
if ( $slides_to_show > $post_num ) {
	$slides_to_show = $post_num;
}
$active_status = ( $slides_to_show === $post_num ? 'inactive' : 'active' );
$post_offset = get_theme_mod( 'threeforty_hero_post_offset', 0 );
$post_type = get_theme_mod( 'threeforty_hero_post_type', 'recent' );
$post_cat = get_theme_mod( 'threeforty_hero_post_cat', '' );
$entry_title = get_theme_mod( 'threeforty_hero_entry_title', true );
$layout = get_theme_mod( 'threeforty_hero_layout', 'grid' );
if ( $slides_to_show > 1 && $layout === 'slider' ) {
	$layout = 'carousel';
}
$style = get_theme_mod( 'threeforty_hero_style', 'default' );
$has_avatar = ( get_theme_mod( 'threeforty_hero_entry_meta_author_avatar', false ) ? ' has-avatar' : '' );
$wrapper_open = false;
$full_width = ( apply_filters( 'threeforty_hero_full_width_support', false ) && get_theme_mod( 'threeforty_hero_full_width', false ) && $layout === 'carousel' ? ' full-width' : '' );
$thumbnail = ( $layout === 'grid' ? 'landscape' : 'hero' ); // Grid and single slider
if ( $layout === 'carousel' ) {
	$thumbnail = apply_filters( 'threeforty_carousel_thumbnail', 'square' );
	if ( $slides_to_show === 3 && $full_width || $slides_to_show === 2 ) {
		$thumbnail = 'single-square';
	}
	if ( $slides_to_show === 2 && $full_width ) {
		$thumbnail = 'single-landscape';
	}
}
// If Parallax
if ( get_theme_mod( 'threeforty_hero_parallax', false ) ) {
	$post_num = 1;
}

?>