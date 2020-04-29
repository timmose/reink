<?php

/**
 * 340 Media: Custom Meta Boxes
 *
 * @since 1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'THREEFORTY_META_BOXES__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


// ========================================================
// Add single post meta box settings
// ========================================================

if ( ! function_exists( 'threeforty_custom_meta_box' ) ) {

	function threeforty_custom_meta_box() {

		add_meta_box(
			'threeforty_single_options',
			esc_html__( 'Single Post Options', 'threeforty-theme-boost' ),
			'threeforty_meta_box_callback',
			'post',
			'side',
			'low'
			);

	}
}

add_action( 'add_meta_boxes', 'threeforty_custom_meta_box' );

if ( ! function_exists( 'threeforty_meta_box_callback' ) ) {

	function threeforty_meta_box_callback( $post ) {

		wp_nonce_field(basename( __FILE__ ), 'threeforty_post_meta_nonce' );

		// Select override global post style
		echo '<p><label for="threeforty_single_post_style"><b>' . esc_html__( 'Post style', 'threeforty-theme-boost' ) . '</b></label></p>';
		echo '<p><select name="threeforty_single_post_style">';

		$values = array(
			'global' => 'Use Global Setting',
			'default' => 'Default',
			'cover' => 'Cover',
			'hero' => 'Hero',
		);

		foreach ($values as $key => $value ) {
			
			if ( $key == get_post_meta($post->ID, 'threeforty_single_post_style', true ) ) {
				echo '<option selected value="' . esc_attr( $key ) . '">' . esc_html__( '' . $value, 'threeforty-theme-boost' ) . '</option>';
			} else {
				echo '<option value="' . esc_attr( $key ) . '">' . esc_html__( '' . $value, 'threeforty-theme-boost' ) . '</option>';
			}
		}

		echo '</select></p>';

		// Checkbox disable featured image or media
		$value = get_post_meta( $post->ID, 'threeforty_disable_featured_media', true );

		echo '<label for="threeforty_disable_featured_media">';
		if ($value == '') {
			echo ' <input id="threeforty_disable_featured_media" name="threeforty_disable_featured_media" type="checkbox" class="checkbox">';
		} else {
			echo ' <input id="threeforty_disable_featured_media" name="threeforty_disable_featured_media" type="checkbox" class="checkbox" checked="checked">';
		}
		echo esc_html__( 'Disable Featured Image/Media', 'threeforty-theme-boost' );
		echo '</label>';

	}

}

if ( ! function_exists( 'threeforty_save_meta_post_data' ) ) {

	function threeforty_save_meta_post_data( $post_id ) {

		// Return if meta-box doesnt exist
		if ( ! isset( $_POST['threeforty_post_meta_nonce'] ) ) {
			return;
		}
		// Return if nonce is not valid
		if ( ! wp_verify_nonce( $_POST['threeforty_post_meta_nonce'], basename( __FILE__ ))) {
			return;
		}
		// Return if doing and autosave
		if ( defined( 'DOING_AUTOAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Return if user does not have permisson
		if ( ! current_user_can( 'edit_post', $post_id )) {
			return;
		}

		// Featured media checkbox

		$featured_media_checkbox = false;

		if (isset($_POST['threeforty_disable_featured_media']))
	    {
	        $featured_media_checkbox = true;
	    } 

		update_post_meta( $post_id, 'threeforty_disable_featured_media', $featured_media_checkbox );

		// Post style 

		$single_post_style = '';

		if (isset($_POST['threeforty_single_post_style']))
	    {
	        $single_post_style = $_POST['threeforty_single_post_style'];
	    } 

		update_post_meta( $post_id, 'threeforty_single_post_style', $single_post_style );
	}
}

add_action( 'save_post', 'threeforty_save_meta_post_data' );


?>