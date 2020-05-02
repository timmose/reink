<?php

global $epcl_theme;

// Only enabled when redux options is active, W3 total cache is installed and enable optimization is "on"

add_action ( 'wp_head', 'epcl_generate_header_styles' );
function epcl_generate_header_styles(){
    
    if( epcl_is_amp() ) return;

    global $epcl_theme;
    if( empty($epcl_theme) ) return;
    if( $epcl_theme['enable_optimization'] || defined('W3TC') ):
?>
        <style id="epcl-theme-critical-css"><?php get_template_part('partials/critical-css'); ?></style>
<?php
    endif;
    if( $epcl_theme['enable_optimization'] || defined('W3TC') ){
        $custom_css = epcl_generate_custom_styles();
        echo '<style id="epcl-theme-header-css">'.$custom_css.'</style>';
    }
}

function epcl_style_loader_tag($tag){

    global $epcl_theme;

    if( empty($epcl_theme) || is_admin() ||  ( !$epcl_theme['enable_optimization'] && !defined('W3TC') ) ) return $tag;

    if( epcl_is_amp() ) return $tag;

    if( $epcl_theme['enable_optimization'] || defined('W3TC') ){

        // // $onload = "this.rel=`stylesheet`";
        // // $onload = 'onload="this.rel=\'stylesheet\'"';
        $onload = 'onload="this.rel=`stylesheet`"';

        $tag = preg_replace("/rel='stylesheet' id='epcl-google-fonts-css'/", "rel='preload' id='epcl-google-fonts-css' as='style' $onload ", $tag);

        $tag = preg_replace("/rel='stylesheet' id='epcl-theme-css'/", "rel='preload' id='epcl-theme-css' as='style' $onload ", $tag);

        $tag = preg_replace("/rel='stylesheet' id='epcl-plugins-css'/", "rel='preload' id='epcl-plugins-css' as='style' $onload ", $tag);

        //$tag = preg_replace("/rel='stylesheet' id='epcl-shortcodes-css'/", "rel='preload' id='epcl-shortcodes-css' as='style' $onload ", $tag);

        $tag = preg_replace("/rel='stylesheet' id='wp-block-library-css'/", "rel='preload' id='wp-block-library-css' as='style' $onload ", $tag);

        $tag = preg_replace("/rel='stylesheet' id='epcl-theme-options-google-fonts-css'/", "rel='preload' id='epcl-theme-options-google-fonts-css' as='style' $onload ", $tag);

        return $tag;
    }
}

function wps_deregister_styles() {
    global $epcl_theme;
    if( !empty($epcl_theme) && isset($epcl_theme['remove_gutenberg_styles']) && $epcl_theme['remove_gutenberg_styles'] === '1' ){
        wp_dequeue_style( 'wp-block-library' );
    }

}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

// Only enabled when redux options is active

add_action ( 'wp_head', 'epcl_generate_header_codes', 1 );
function epcl_generate_header_codes(){
    global $epcl_theme;
    if( empty($epcl_theme) ) return;

    // echo '<link rel="preload" href="'.EPCL_THEMEPATH.'/assets/dist/style.min.css" as="style" type="text/css">';
    // echo '<link rel="preload" href="'.EPCL_THEMEPATH.'/assets/fonts/fontawesome-webfont.woff2?v=4.7.0" as="font" type="font/woff2" crossorigin>';
    // echo '<link rel="preload" href="'.EPCL_THEMEPATH.'/assets/fonts/remixicon.woff2?v=4.7.0" as="font" type="font/woff2" crossorigin>';
    // echo '<link rel="preload" href="'.EPCL_THEMEPATH.'/assets/dist/plugins.min.css" as="style" type="text/css">';

    if( isset( $epcl_theme['custom_scripts'] ) && $epcl_theme['custom_scripts'] ){
        echo $epcl_theme['custom_scripts'];
    }
}

add_action ( 'wp_footer', 'epcl_generate_footer_codes', 100 );
function epcl_generate_footer_codes(){
    global $epcl_theme;
    if( empty($epcl_theme) ) return;

    if( isset( $epcl_theme['custom_scripts_footer'] ) && $epcl_theme['custom_scripts_footer'] ){
        echo $epcl_theme['custom_scripts_footer'];
    }
}

?>