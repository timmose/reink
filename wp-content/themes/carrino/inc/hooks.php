<?php

/**
 * Carrino Hooks
 *
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.0
 */

// ========================================================
// Custom Hooks
// ========================================================
function threeforty_before_header() {
    do_action('threeforty_before_header');
}
function threeforty_after_header() {
    do_action('threeforty_after_header');
}
function threeforty_after_content() {
    do_action('threeforty_after_content'); // Single
}
function threeforty_before_footer() {
    do_action('threeforty_before_footer');
}
function threeforty_after_footer() {
    do_action('threeforty_after_footer');
}
function threeforty_before_loop() {
    do_action('threeforty_before_loop'); // Archive loop
}
function threeforty_after_loop() {
    do_action('threeforty_after_loop'); // Archive loop
}
function threeforty_before_comments() {
    do_action('threeforty_before_comments'); // Single
}
function threeforty_after_comments() {
    do_action('threeforty_after_comments'); // Single
}

?>