<?php
function natalielite_sanitize_checkbox( $checked ) {	
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function natalielite_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function natalielite_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/** Natalie - Customizer - Add Settings */
function natalielite_register_theme_customizer( $wp_customize )
{
    /** Add Sections -----------------------------------------------------------------------------------------------------------*/
    $wp_customize->add_section( 'natalielite_new_section_blog_layout', array(
        'title'       => __( 'Blog Layout', 'natalielite' )
    ) );
    $wp_customize->add_section( 'natalielite_new_section_social_media', array(
        'title'       => __( 'Social Networks', 'natalielite' ),
        'description' => __( 'Enter your social media URL', 'natalielite' ),
    ) );

    $wp_customize->add_section( 'natalielite_new_section_footer', array(
        'title' => __( 'Copyright Text', 'natalielite' )
    ) );

    /**
     * Site Identity
     */
    $wp_customize->add_setting( 'natalielite_site_branding_padding_top', array( 'default' => 50, 'sanitize_callback' => 'natalielite_sanitize_number_absint' ) );
    $wp_customize->add_setting( 'natalielite_site_branding_padding_bottom', array( 'default' => 50, 'sanitize_callback' => 'natalielite_sanitize_number_absint' ) );

    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_site_branding_padding_top',
			array(
				'label'      => __( 'Header: Padding Top', 'natalielite' ),
				'section'    => 'title_tagline',
				'type'		 => 'number',
                'input_attrs' => array(
                    'min' => 0,
                    'step' => 1
                )
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_site_branding_padding_bottom',
			array(
				'label'      => __( 'Header: Padding Bottom', 'natalielite' ),
				'section'    => 'title_tagline',
				'type'		 => 'number',
                'input_attrs' => array(
                    'min' => 0,
                    'step' => 1
                )
			)
		)
	);

    /**
     * Blog layout
     */
    $wp_customize->add_setting(
        'natalielite_blog_layout',
        array(
            'default' => 'standard',
            'sanitize_callback' => 'natalielite_sanitize_select'
        )
    );

    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_blog_layout',
			array(
				'label' => __( 'Blog Layout', 'natalielite' ),
				'section' => 'natalielite_new_section_blog_layout',
                'type' => 'radio',
                'choices' => array(
                    'standard' => __( 'Blog Standard', 'natalielite' ),
                    '2cols-grid' => __( 'Blog 2 Cols Grid', 'natalielite' )
                )
			)
		)
	);

    /** Accent Color */
    $wp_customize->add_setting( 'natalielite_accent_color', array( 'default' => '#f37e7e', 'sanitize_callback' => 'sanitize_hex_color' ) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'natalielite_accent_color',
			array(
				'label'      => __( 'Accent Color', 'natalielite' ),
				'section'    => 'colors'
			)
		)
	);

    /**
     * Social Media settings
     */
    $wp_customize->add_setting( 'natalielite_facebook', array( 'default'=> '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_twitter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_instagram', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_pinterest', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_tumblr', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_bloglovin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_youtube', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_dribbble', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_soundcloud', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_vimeo', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'natalielite_linkedin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_facebook',
			array(
				'label'      => __( 'Facebook', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_twitter',
			array(
				'label'      => __( 'Twitter', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_instagram',
			array(
				'label'      => __( 'Instagram', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_pinterest',
			array(
				'label'      => __( 'Pinterest', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_bloglovin',
			array(
				'label'      => __( 'Bloglovin', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_tumblr',
			array(
				'label'      => __( 'Tumblr', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_youtube',
			array(
				'label'      => __( 'Youtube', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_dribbble',
			array(
				'label'      => __( 'Dribbble', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'settings'   => 'natalielite_dribbble',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_soundcloud',
			array(
				'label'      => __( 'Soundcloud', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_vimeo',
			array(
				'label'      => __( 'Vimeo', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_linkedin',
			array(
				'label'      => __( 'Linkedin (Use full URL to your Linkedin profile)', 'natalielite' ),
				'section'    => 'natalielite_new_section_social_media',
				'type'		 => 'url'
			)
		)
	);
    
    /**
     * Footer Settings
     */
    $wp_customize->add_setting( 'natalielite_footer_copyright', array(
        'default' => __( 'Your Blog Name and Copyright Text Here.', 'natalielite' ),
        'sanitize_callback' => 'sanitize_textarea_field'
    ) );
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'natalielite_footer_copyright',
			array(
				'label'      => __( 'Copyright Text', 'natalielite' ),
				'section'    => 'natalielite_new_section_footer',
				'type'		 => 'textarea'
			)
		)
	);
}
add_action( 'customize_register', 'natalielite_register_theme_customizer' );
