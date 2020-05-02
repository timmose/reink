<?php

add_action('wp_enqueue_scripts', 'epcl_enqueue_scripts_plugin', 11);

function epcl_enqueue_scripts_plugin() {
    $epcl_theme = epcl_get_theme_options();

    $prefix = EPCL_THEMEPREFIX.'-';

    /* CSS */

    $fonts = array(
        $epcl_theme['primary_titles_font'], $epcl_theme['body_font'],
        $epcl_theme['sidebar_titles_font'], $epcl_theme['sidebar_font'],
        $epcl_theme['footer_titles_font'], $epcl_theme['footer_font'],
    );

    wp_register_style( $prefix . 'theme-options-google-fonts' , epcl_theme_options_google_fonts( $fonts ), NULL, NULL );
    wp_enqueue_style( $prefix . 'theme-options-google-fonts' );

}

function epcl_theme_options_google_fonts( $google_fonts ) {
    $link = $fonts_url = "";
    $subsets = array();
    $fonts = array();

    foreach ( $google_fonts as $font ) {        
        $link = '';
        if(  isset($font['type']) && $font['type'] == 'google' ){
            
            $link .= $font['font-family'];
            if( !empty($font['font-family']) && !empty($font['font-weight']) ){
                $link .= ':'.$font['font-weight'] ;
            }

            if( $link ){
                $fonts[] = $link;   
            }            
    
            if ( ! empty( $font['subsets'] ) ) {
                if ( ! in_array( $font['subsets'], $subsets ) ) {
                    array_push( $subsets, $font['subsets'] );
                }
            }
        }           
        
    }

    if ( !empty($fonts) ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( implode( ',', $subsets ) ),
            'display' => 'swap',
        ), '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}

?>