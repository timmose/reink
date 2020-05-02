<?php


/********************
 *
 * Setup & Supports
 *
 ********************/


function gutenblog_setup() {

    global $gutenblog_defaults;

    load_theme_textdomain( 'gutenblog-theme', get_template_directory() . '/languages' );

    register_nav_menus( array('header' => esc_html__( 'Main Menu', 'gutenblog-theme' )) );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array('height' => 150, 'width' => 300,'flex-height' => true,'flex-width'  => true ) );
    add_theme_support( 'custom-background');
    add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    $args = array(
        'flex-width'    => true,
        'width'         => 1200,
        'flex-height'    => true,
        'height'        => 550,
        'default-image' => $gutenblog_defaults['gutenblog_custom_header'],
    );
    add_theme_support( 'custom-header', $args );

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 750, 570, true );

    add_image_size( 'gutenblog-horizontal', 750, 525, true );
    add_image_size( 'gutenblog-horizontal-big', 1200, 840, true );
    add_image_size( 'gutenblog-vertical', 520, 650, true );
    add_image_size( 'gutenblog-square', 750, 750, true);
    add_image_size( 'gutenblog-square-small', 300, 300, true );





    

    add_post_type_support('page', 'excerpt');

//    if ( function_exists( 'wp_update_custom_css_post' ) ) {
//        $css = gutenblog_get_option('gutenblog_advanced_css');
//        if ( $css ) {
//            $core_css = wp_get_custom_css();
//            $return = wp_update_custom_css_post( $core_css . $css );
//            if ( ! is_wp_error( $return ) ) {
//                remove_theme_mod( 'gutenblog_advanced_css' );
//            }
//        }
//    }

    // WooCommerce
    if ( class_exists( 'WooCommerce' ) ) {
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        add_theme_support( 'woocommerce' );
    }

}
add_action( 'after_setup_theme', 'gutenblog_setup' );

class ImageRatio {

  private $ratio;

  function __construct($ratioW = 1, $ratioH = 1) {
    $this->ratio = array($ratioW, $ratioH);
  }

  function getLargestSize($imgW, $imgH) {
    $inverse = false;
    // let's try to keep width and calculate new height  
    $newSize = round(($this->ratio[1] * $imgW) / $this->ratio[0]);
    if ($newSize > $imgH) {
       $inverse = true;
       // if the calculated height is bigger than actual size
       // let's keep current height and calculate new width
       $newSize = round(($this->ratio[0] * $imgH) / $this->ratio[1]);
    }

    return $inverse ? array( $newSize, $imgH ) : array( $imgW, $newSize );
  }

}

$sizes = array();
$ratio_square = new ImageRatio( 1.3, 1 );
list($width_square, $height_square) = $ratio_square->getLargestSize( 
    800,
    600
);
$sizes['gutenblog-square'] = array(
    'width'  => $width_square,
    'height' => $height_square,
    'crop'   => true
);
// var_dump($sizes);

add_filter( 'intermediate_image_sizes_advanced', function( $sizes, $metadata ) {
    if (! empty( $metadata['width'] ) && ! empty( $metadata['height'] ) ) {
      // calculate the max width and height for the ratio

        $filetype = wp_check_filetype($metadata['file']);
        if($filetype['ext'] !== "gif"){

            // Square
            $ratio_square = new ImageRatio( 1, 1 );
            list($width_square, $height_square) = $ratio_square->getLargestSize( 
                $metadata['width'],
                $metadata['height']
            );
            $sizes['gutenblog-square'] = array(
                'width'  => $width_square,
                'height' => $height_square,
                'crop'   => true
            );

            // Horizontal
            $ratio_horizontal = new ImageRatio( 1.3, 1);
            list($width_horizontal, $height_horizontal) = $ratio_horizontal->getLargestSize( 
                $metadata['width'],
                $metadata['height']
            );
            $sizes['gutenblog-horizontal'] = array(
                'width'  => $width_horizontal,
                'height' => $height_horizontal,
                'crop'   => true
            );

            // Horizontal Big
            $ratio_horizontal_big = new ImageRatio( 1.3, 1 );
            list($width_horizontal_big, $height_horizontal_big) = $ratio_horizontal_big->getLargestSize( 
                $metadata['width'],
                $metadata['height']
            );
            $sizes['gutenblog-horizontal-big'] = array(
                'width'  => $width_horizontal_big,
                'height' => $height_horizontal_big,
                'crop'   => true
            );

            // Vertical
            $ratio_vertical = new ImageRatio( 1, 1.2 );
            list($width_vertical, $height_vertical) = $ratio_vertical->getLargestSize( 
                $metadata['width'],
                $metadata['height']
            );
            $sizes['gutenblog-vertical'] = array(
                'width'  => $width_vertical,
                'height' => $height_vertical,
                'crop'   => true
            );
        }
   }

   return $sizes;

}, 10, 2 );


// Attachments ALT

if ( ! function_exists( 'gutenblog_get_attachment' ) ) :
    function gutenblog_get_attachment( $attachment_id ) {
        $attachment = get_post( $attachment_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    }
endif;
