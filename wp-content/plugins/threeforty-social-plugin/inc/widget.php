<?php

/**
 * threeforty Social Media Widget
 *
 *
 * @package WordPress
 * @subpackage threeforty
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register our widget
function register_threeforty_social_widget() {
	register_widget( 'Threeforty_Social_Widget' );
}
add_action( 'widgets_init', 'register_threeforty_social_widget' );

class Threeforty_Social_Widget extends WP_Widget {

	// Setup our widget

	public function __construct() {

		$widget_ops = array(
			'classname' => 'threeforty_social_widget',
			'description' => esc_html__('Displays Links and Icons to your social media channels', 'threeforty-social-plugin'),
		);

	parent::__construct( 'threeforty_social_widget', esc_html__('340 Media: Social Media Widget', 'threeforty-social-plugin'), $widget_ops );

	}

	// Backend Display

	public function form($instance) {

		/* Default variables */

		$title = (!empty($instance['title']) ? $instance['title'] : '');
		$show_text = ( isset($instance['show_text']) ? (bool) $instance['show_text'] : false );
		$color_scheme = ( !empty($instance['color_scheme']) ? $instance['color_scheme'] : '' );

		// Widget admin form

		// Title
		$output = '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('title') ) . '">' . esc_html__('Title:', 'threeforty-social-plugin') . '</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr($this->get_field_id('title')) . '" name="' . esc_attr($this->get_field_name('title')) . '" value="' . esc_attr($title) . '">';
		$output .= '</p>';

		// Show social media text
		$output .= '<p>';
		$output .= '<input type="checkbox" class="checkbox" ' . checked( $show_text, 1, false ) . ' id="' . esc_attr($this->get_field_id('show_text')) . '" name="' . esc_attr($this->get_field_name('show_text')) . '">';
		$output .= '<label for="' . esc_attr($this->get_field_id('show_text') ) . '">' . esc_html__('Show Social Media Name:', 'threeforty-social-plugin') . '</label>';
		$output .= '</p>';

		// Colour scheme
		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('color_scheme') ) . '">' . esc_html__('Colour Scheme:', 'threeforty-social-plugin') . '</label>';
		$output .= '<select class="widefat" id="' . esc_attr($this->get_field_id('color_scheme')) . '" name="' . esc_attr($this->get_field_name('color_scheme')) . '">';
		$output .= '<option ' . selected( $color_scheme, 'theme', false ) . ' value="theme">' . esc_html__('Theme Colour Scheme', 'threeforty-social-plugin') . '</option>';
		$output .= '<option ' . selected( $color_scheme, 'brand', false ) . ' value="brand">' . esc_html__('Brand Color Scheme', 'threeforty-social-plugin') . '</option>';
		$output .= '</select>';
		$output .= '</p>';

		// Let the user know that they can't change the social options here but they can edit them in the settings panel

		$output .= '<p>' . esc_html__('You can update the social media channels displayed in this widget in the Social Media Settings of the Customizer', 'threeforty-social-plugin') . '</a>';


		// Escape the output
		$allowed_html = array(
			'p' => array(),
			'label' => array(
				'for' => array(),
			),
			'input' => array(
				'type' => array(),
				'class' => array(),
				'id' => array(),
				'name' => array(),
				'value' => array(),
				'checked' => array(),
			),
			'textarea' => array(
				'class' => array(),
				'id' => array(),
				'name' => array(),
			),
			'button' => array(
				'class' => array(),
				'id' => array(),
				'name' => array(),
			),
			'select' => array(
				'class' => array(),
				'id' => array(),
				'name' => array(),
			),
			'option' => array(
				'value' => array(),
				'selected' => array(),
			),
		);

		echo wp_kses( $output, $allowed_html );

	}

	// Update Widget

	public function update($new_instance, $old_instance) {

		$instance = array();
		$instance['title'] = (!empty($new_instance['title']) ? strip_tags($new_instance['title']) : '');
		$instance['show_text'] = (isset( $new_instance['show_text'] ) ? (bool) $new_instance['show_text'] : false);
		$instance['color_scheme'] = (!empty($new_instance['color_scheme']) ? strip_tags($new_instance['color_scheme']) : '');

		return $instance;

	}

	// Front End Display

	public function widget($args, $instance) {

		$show_text = ( $instance['show_text'] ? true : false );

		// Escape the output
		$allowed_html = array(
			'section' => array(
				'class' => array(),
				'id'  => array(),
			),
			'h3' => array(
				'class' => array(),
			),
			'h2' => array(
				'class' => array(),
			),
		);


		echo wp_kses( $args['before_widget'], $allowed_html );

		// Title
		if (!empty( $instance[ 'title' ])) :
			echo wp_kses( $args['before_title'], $allowed_html ) . apply_filters('widget_title', $instance['title']) . wp_kses( $args['after_title'], $allowed_html );
		endif;

		threeforty_social_media_icons( $show_text, $instance[ 'color_scheme' ] );

		echo wp_kses( $args['after_widget'], $allowed_html );

	}


} // End Class