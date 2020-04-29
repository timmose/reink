<?php
/**
 * Child-Theme functions and definitions
 */

function yolox_child_scripts() {
    wp_enqueue_style( 'yolox-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'yolox_child_scripts' );
 
?>