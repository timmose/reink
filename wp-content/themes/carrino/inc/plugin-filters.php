<?php

/**
 * Carrino Plugin Filters and actions
 *
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.4
 */

/**
 * Each 340 Media theme uses 340 Media Plugins differently
 *
 * These actions and filters are specific to this theme.
 * Removing these filters and actions will not break the theme
 * but will result in unstyled elements.
 */

// Remove hero customizer controls
function carrino_hero_filters( $wp_customize ) {
    $wp_customize->remove_control('threeforty_hero_excerpt');
}
add_action( 'customize_register', 'carrino_hero_filters', 100 );

// Change the hero max posts limit
function carrino_hero_posts_max() {
    return 3;
}
add_filter( 'threeforty_hero_max_post_num', 'carrino_hero_posts_max' );

// Increase related posts max posts
function carrino_related_posts_max() {
    return 6;
}
add_filter( 'threeforty_related_posts_max_posts', 'carrino_related_posts_max' );
