<?php
/**
 * @package        GutenBlog Theme
 * @author         Gutenblog Themes
 * @copyright      2019
 * @version        Release: v1.0
 */

/********************
 *
 * Core
 *
 ********************/
require_once get_template_directory() . '/widgets/widgets.php';
require_once get_template_directory() . '/core/customizer.php';
require_once get_template_directory() . '/core/helpers.php';

/********************
 *
 * Themes Welcome page
 *
 ********************/


require get_parent_theme_file_path( '/welcome-page/welcome-page.php' );


if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}


/**
 * GutenBlog Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * gutenblog Theme supports.
 *
 * @since gutenblog-theme 1.0
 */

if ( ! function_exists( 'gutenblog_get_option' ) ) :
function gutenblog_get_option($key){
    global $gutenblog_defaults;
    
    if (is_array($gutenblog_defaults) && array_key_exists($key, $gutenblog_defaults)){
        $value = get_theme_mod($key, $gutenblog_defaults[$key]);
    } else {
        $value = get_theme_mod($key);
    }

    return $value;
}
endif;

function gutenblog_theme_setup() {
    if (function_exists('vc_set_as_theme')) {
        vc_set_as_theme(true);
    }

    load_theme_textdomain( 'gutenblog-theme', get_template_directory() . '/languages' );

    add_editor_style();



    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'gutenblog-theme' ),
    ) );


    add_theme_support( 'wp-block-styles' );
    add_theme_support('editor-styles');
    add_theme_support( 'align-wide' );

    add_editor_style( 'assets/css/gutenblog-editor-style.css' );


    add_theme_support( 'disable-custom-colors' );
    add_theme_support( 'disable-custom-font-sizes' );

    $main_color = gutenblog_get_option('gutenblog_setting_primary_colors_main_color');
    $inverse_main_color = gutenblog_get_option('gutenblog_setting_primary_colors_inverse_color');

    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'Theme Main Color', 'gutenblog-theme' ),
            'slug' => 'main-color',
            'color' => $main_color,
        ),
        array(
            'name' => esc_html__( 'Inverse Main Color', 'gutenblog-theme' ),
            'slug' => 'inverse-main-color',
            'color' => $inverse_main_color,
        ),
    ) );




    add_theme_support('title-tag');
    add_theme_support('custom-header');

    remove_theme_support('custom-background');

    add_theme_support( 'post-thumbnails' );
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list',
    ));
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-formats', array('promotion','aside', 'audio', 'video',  'image', 'link', 'quote', 'status', 'gallery' ) );
}
add_action( 'after_setup_theme', 'gutenblog_theme_setup' );


/**
 * gutenblog_move_comment_field_to_bottom
 *
 * move comment field to the bottom of the comments form
 * 
 * @since gutenblog-theme 1.0
 */
function gutenblog_move_comment_field_to_bottom( $fields ) {
    if ( get_post_type() == 'post' ) :
        $comment_field = $fields['comment'];
        $cookies       = $fields['cookies'];
        unset( $fields['comment'] );
        unset( $fields['cookies'] );
        $fields['comment'] = $comment_field;
        $fields['cookies'] = $cookies;
    endif;
    return $fields;
}
add_filter( 'comment_form_fields', 'gutenblog_move_comment_field_to_bottom' );



function gutenblog_wp_page_menu_class( $class ) {
    return preg_replace( '/<ul>/', '<ul class="nav navbar-nav">', $class, 1 );
}
add_filter( 'wp_page_menu', 'gutenblog_wp_page_menu_class' );


/********************
 *
 * Styles and Scripts
 *
 ********************/


function gutenblog_scripts() {

    wp_enqueue_style('allstyles', get_template_directory_uri() . '/assets/css/allstyles.min.css' );

    wp_enqueue_style('gutenblog-style', get_template_directory_uri().'/style.css' );


    if (is_rtl()) {
        wp_enqueue_style( 'gutenblog-style-rtl', get_template_directory_uri() . '/style-rtl.css' );
    }


	wp_script_add_data( 'gutenblog-html5shiv', 'conditional', 'lt IE 9' );
	wp_script_add_data( 'gutenblog-respond', 'conditional', 'lt IE 9' );

    wp_enqueue_script('alljs', get_template_directory_uri().'/assets/js/alljs.min.js', array('jquery'), '', true , true);

    wp_enqueue_script('gutenblog', get_template_directory_uri() . '/assets/js/gutenblog.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'jquery-masonry','', array('jquery'), '', true);
    
    wp_enqueue_script( 'imagesloaded','', '', '', true );

    wp_enqueue_script( 'jquery-ui-core' );


    
    wp_enqueue_style( 'gutenblog-default-font-poppins', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', false ); 
    wp_enqueue_style( 'gutenblog-default-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700', false ); 
    



    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }



    global $wp_query;

    $args = array(
        'post_type'      => 'post',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'posts_per_page' => $wp_query->query_vars['posts_per_page']
    );

    $cat_id = "";
    $tag_id = "";
    $queried = get_queried_object();

    $args['post_status'] = array('publish', 'private');

    if(is_home()){
        $enable_cat = gutenblog_get_option('gutenblog_blog_feed_category_enable');
        $cat = gutenblog_get_option('gutenblog_blog_feed_category');
        if($enable_cat == 1){
            if(isset($cat) && !empty($cat)){
                if(is_array($cat)){
                    $cat_string = "";
                    foreach ($cat as $key => $value) {
                        if($key+1 == count($cat)){
                            $cat_string .= $value."";
                        } else {
                            $cat_string .= $value.", ";
                        }
                    }
                    $args['cat'] = $cat_string;
                } else {
                    $args['cat'] = $cat;
                }
            }
        }
    } else if(isset($queried) && !empty($queried)){
        if(isset($queried->taxonomy) && !empty($queried->taxonomy) && $queried->taxonomy == "category"){
            if(isset($queried->cat_ID) && !empty($queried->cat_ID)){
                $cat_id = $queried->cat_ID;
                $args['cat'] = $cat_id;
            }
        } else if(isset($queried->taxonomy) && !empty($queried->taxonomy) && $queried->taxonomy == "post_tag"){
            if(isset($queried->term_id) && !empty($queried->term_id)){
                $tag_id = $queried->term_id;
                $args['tag_id'] = $tag_id;
            }
        }
    }

    $search = "";
    if(isset($_GET['s']) && !empty($_GET['s'])){
        $search = $_GET['s'];
    }
    if($search != ""){
        $args['s'] = $search;
    }

    $query = new WP_Query($args);
    $used_query = $query;


    wp_register_script( 'gutenblog-myloadmore', get_stylesheet_directory_uri() . '/assets/js/myloadmore.js', array('jquery') );


    $localize_array = array(
        'ajaxurl' => home_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $used_query->query ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $used_query->max_num_pages,
        'first_page' => get_pagenum_link(1),
    );

    if(is_home()){
        if($enable_cat == 1){
            if(isset($cat) && !empty($cat)){
                $localize_array['cat'] = $cat;
            }
        }
    } else if($cat_id != ""){
        $localize_array['cat'] = $cat_id;
    } else if($tag_id != ""){
        $localize_array['tag_id'] = $tag_id;
    }
    
    if(isset($search) && !empty($search)){
        $localize_array['s'] = $search;
    }


    wp_localize_script( 'gutenblog-myloadmore', 'gutenblog_loadmore_params', $localize_array );

    wp_enqueue_script( 'gutenblog-myloadmore' );

}
add_action( 'wp_enqueue_scripts', 'gutenblog_scripts' );




function gutenblog_import_files() {
    return array(
        array(
            'import_file_name'           => 'Creative demo',
            'categories'                 => array( 'Creative' ),
            'import_file_url'            => 'http://themesmonsters.com/gutenblog-demo/gutenblog-creative.xml',
            'import_customizer_file_url' => 'http://themesmonsters.com/gutenblog-demo/gutenblog-creative.dat',
            'import_preview_image_url'   => 'http://themesmonsters.com/gutenblog-demo/gutenblog-creative-preview.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'gutenblog-theme' ),
            'preview_url'                => 'https://gutenblog-creative.themesmonsters.com/',
        ),
        array(
            'import_file_name'           => 'Food demo',
            'categories'                 => array( 'Food', 'Creative' ),
            'import_file_url'            => 'http://themesmonsters.com/gutenblog-demo/gutenblog-food.xml',
            'import_customizer_file_url' => 'http://themesmonsters.com/gutenblog-demo/gutenblog-food.dat',
            'import_preview_image_url'   => 'http://themesmonsters.com/gutenblog-demo/gutenblog-food-preview.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'gutenblog-theme' ),
            'preview_url'                => 'https://food-gutenblog.themesmonsters.com/',
        ),
        array(
            'import_file_name'           => 'Modern demo',
            'categories'                 => array( 'Modern', 'Creative' ),
            'import_file_url'            => 'http://themesmonsters.com/gutenblog-demo/gutenblog-modern.xml',
            'import_customizer_file_url' => 'http://themesmonsters.com/gutenblog-demo/gutenblog-modern.dat',
            'import_preview_image_url'   => 'http://themesmonsters.com/gutenblog-demo/gutenblog-modern-preview.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'gutenblog-theme' ),
            'preview_url'                => 'https://modern-gutenblog.themesmonsters.com/',
        ),

    );
}
add_filter( 'pt-ocdi/import_files', 'gutenblog_import_files' );


add_action( 'admin_enqueue_scripts', function(){

    wp_enqueue_style( 'gutenblog-default-font-poppins', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', false ); 
    wp_enqueue_style( 'gutenblog-default-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700', false ); 

    wp_enqueue_style('gutenblog-font', get_template_directory_uri().'/assets/css/gutenblog-font.css' );

    wp_enqueue_style('gutenblog-admin', get_template_directory_uri().'/assets/css/gutenblog-admin-css.css' );

}, 99 );


/**
 * gutenblog_pingback_header
 *
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 * 
 * @since gutenblog-theme 1.0
 */
function gutenblog_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="'. esc_url( get_bloginfo( 'pingback_url' ) ). '">';
    }
}
add_action( 'wp_head', 'gutenblog_pingback_header' );

/********************
 *
 * TGM Plugin Activation
 *
 ********************/


require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'gutenblog_register' );

function gutenblog_register() {

	$plugins = array(
        array(
			'name'      => 'Kirki',
			'slug'      => 'kirki',
			'required'  => false,
		),
        array(
			'name'      => 'Instagram Feed',
			'slug'      => 'instagram-feed',
			'required'  => false,
		),
        array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => true,
		),
        array(
			'name'      => 'Social Count Plus',
			'slug'      => 'social-count-plus',
			'required'  => false,
		),
        array(
            'name' => esc_html__('ThemesMonster Core', 'gutenblog-theme'),
            'slug' => 'themesmonsters-core',
            'source' => get_template_directory() . '/inc/plugins/themesmonsters-core.zip',
            'required' => false,
        ),
	);

	$config = array(
		'id'           => 'gutenblog-theme',       
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                      
		'is_automatic' => false,                   
		'message'      => '',                      
	);
	tgmpa( $plugins, $config );
}



/********************
 *
 * Helper
 *
 ********************/

add_filter( 'get_custom_logo', 'gutenblog_my_custom_logo' );

function gutenblog_my_custom_logo() {
    global $gutenblog_defaults;
    $w = gutenblog_get_option('gutenblog_logo_width');
    if($w == "" || empty($w) || $w == "1"){
        $w = $gutenblog_defaults['gutenblog_logo_width'];
    }
    $h = gutenblog_get_option('gutenblog_logo_height');
    if($h == "" || empty($h) || $h == "1"){
        $h = $gutenblog_defaults['gutenblog_logo_height'];
    }
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image(
                $custom_logo_id,
                array($w,$h),
                false,
                array(
                    'class'    => 'custom-logo',
                )
            )
        );
    return $html;
}



function hex_rgb($color){
    $color = ltrim($color, '#');
    $split = str_split($color, 2);
    $r = hexdec($split[0]);
    $g = hexdec($split[1]);
    $b = hexdec($split[2]);
    $rgb = "rgb(" . $r . ", " . $g . ", " . $b . ")";

    return $rgb;
}



function gutenblog_read_more() {
    $gutenblog_blog_feed_readmore_design = gutenblog_get_option('gutenblog_blog_feed_readmore_design');
    if($gutenblog_blog_feed_readmore_design == 'readmore-design-1'){
        return sprintf(
            '<span> ...</span><span class="read-more-wrap-span"><a href="%1$s" class="read-more-wrap">%2$s</a></span>',
            esc_url( get_permalink( get_the_ID() ) ),
            sprintf( '%s', '<span class="btns btn-read-more"><span>' . esc_html__( 'Read More', 'gutenblog-theme' ) . '</span></span>' )
        );
    } else if($gutenblog_blog_feed_readmore_design == 'readmore-design-2'){
        return sprintf( '<span> ...</span><span class="read-more-wrap-span"><a class="link link--arrowed" href="%1$s">%2$s</a></span>',
            esc_url( get_permalink( get_the_ID() ) ),
            sprintf( '%s', '<span>' . esc_html__( 'Read More', 'gutenblog-theme' ) . '</span> <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <g fill="none" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                    <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                    <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                </g>
            </svg>' )
        );
    }
}

function gutenblog_the_content_read_more() {
    $gutenblog_blog_feed_readmore_design = gutenblog_get_option('gutenblog_blog_feed_readmore_design');
    if($gutenblog_blog_feed_readmore_design == 'readmore-design-1'){
        return sprintf( '<span class="read-more-wrap-span"><a href="%1$s" class="read-more-wrap">%2$s</a></span>',
            esc_url( get_permalink( get_the_ID() ) ),
            sprintf( '%s', '<span class="btns btn-read-more"><span>' . esc_html__( 'Read More', 'gutenblog-theme' ) . '</span></span>' )
        );
    } else if($gutenblog_blog_feed_readmore_design == 'readmore-design-2'){
        return sprintf( '<a class="link link--arrowed" href="%1$s">%2$s</a>',
            esc_url( get_permalink( get_the_ID() ) ),
            sprintf( '%s', '<span>' . esc_html__( 'Read More', 'gutenblog-theme' ) . '</span> <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <g fill="none" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                    <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                    <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                </g>
            </svg>' )
        );
    }
}
add_filter( 'the_content_more_link', 'gutenblog_the_content_read_more' );



function gutenblog_excerpt($limit) {
    echo wp_trim_words(get_the_excerpt(), $limit, gutenblog_read_more());
}


function gutenblog_custom_excerpt_length( $length ) {
    return 200;
}
add_filter( 'excerpt_length', 'gutenblog_custom_excerpt_length', 999 );



if ( ! function_exists( 'gutenblog_thumbnails' ) ) :
function gutenblog_thumbnails($what){
    global $gutenblog_defaults;
    switch($what){
        case 'gutenblog-horizontal':
            $image = $gutenblog_defaults['gutenblog_horizontal_sample'];
            return $image;
        case 'gutenblog-horizontal-big':
            $image = $gutenblog_defaults['gutenblog_horizontal_big_sample'];
            return $image;
        case 'gutenblog-vertical':
            $image = $gutenblog_defaults['gutenblog_vertical_sample'];
            return $image;
        case 'gutenblog-square':
            $image = $gutenblog_defaults['gutenblog_square_sample'];
            return $image;
        case 'gutenblog-square-small':
            $image = $gutenblog_defaults['gutenblog_square_small_sample'];
            return $image;


        case 'slide':
            $images = $gutenblog_defaults['gutenblog_slide_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
        case 'gutenblog-thumbnail':
            $images = $gutenblog_defaults['gutenblog_thumbnail_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
        case 'full':
            $images = $gutenblog_defaults['gutenblog_full_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
        case 'gutenblog-vertical':
            $images = $gutenblog_defaults['gutenblog_vertical_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
        case 'gutenblog-index':
            $images = $gutenblog_defaults['gutenblog_index_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
    }
}
endif;


add_filter( 'upload_mimes', 'gutenblog_fonts_myme_types', 1, 1 );
function gutenblog_fonts_myme_types( $mime_types ) {
  $mime_types['ttf'] = 'application/x-font-ttf';
  $mime_types['woff2'] = 'application/x-font-woff2';
  $mime_types['woff'] = 'application/x-font-woff';
  $mime_types['otf'] = 'application/x-font-otf';

  return $mime_types;

}


function gutenblog_add_my_custom_font( $standard_fonts ) {
    $media_fonts = gutenblog_get_all_files();
    $fonts = array();

    foreach ($media_fonts as $key => $value) {
        $fonts[$value['title']] = array(
            'label' => ''.$value['title'].'',
            'variant' => array(
                '300',
                '400',
                '500',
                '600',
                '700',
            ),
            'stack' => '"'.$value['title'].'"',
            'subsets'  => array(
                $value['title']     => $value['title'],
            ),

        );
    }

    return array_merge_recursive( $fonts, $standard_fonts );
}
add_filter( 'kirki/fonts/standard_fonts', 'gutenblog_add_my_custom_font' );

function gutenblog_reinit_kirki_fonts(){
    add_filter( 'kirki/fonts/standard_fonts', 'gutenblog_add_my_custom_font' );
}

function gutenblog_get_all_files(){
    $query_images_args = array(
        'post_type'      => 'attachment',
        'post_status'    => 'any',
        'posts_per_page' => - 1,
    );

    $query_fonts = new WP_Query( $query_images_args );

    $fonts = array();

    $ttf = '.ttf';
    $woff = '.woff';
    $woff2 = '.woff2';
    $otf = '.otf';


    foreach ( $query_fonts->posts as $key => $file ) {
        $title = wp_get_attachment_url( $file->ID );
        if(strpos($title, $ttf) !== false){
            $fonts[$key]['title'] = $file->post_title ;
            $fonts[$key]['url'] = wp_get_attachment_url( $file->ID );
            if(is_ssl() == false) {
                $fonts[$key]['url'] = str_replace("https://", "http://", $fonts[$key]['url']);
            }
        } else if(strpos($title, $woff) !== false){
            $fonts[$key]['title'] = $file->post_title ;
            $fonts[$key]['url'] = wp_get_attachment_url( $file->ID );
            if(is_ssl() == false) {
                $fonts[$key]['url'] = str_replace("https://", "http://", $fonts[$key]['url']);
            }
        } else if(strpos($title, $woff2) !== false){
            $fonts[$key]['title'] = $file->post_title ;
            $fonts[$key]['url'] = wp_get_attachment_url( $file->ID );
            if(is_ssl() == false) {
                $fonts[$key]['url'] = str_replace("https://", "http://", $fonts[$key]['url']);
            }
        } else if(strpos($title, $otf) !== false){
            $fonts[$key]['title'] = $file->post_title ;
            $fonts[$key]['url'] = wp_get_attachment_url( $file->ID );
            if(is_ssl() == false) {
                $fonts[$key]['url'] = str_replace("https://", "http://", $fonts[$key]['url']);
            }
        }

    }
    return $fonts;
}

add_action('wp_enqueue_scripts','gutenblog_output_all_custom_fonts', 99);


function gutenblog_output_all_custom_fonts($return = false){
    $all_fonts = array();
    $all_fields = array();
    $fields_names = array(
        'gutenblog_settings_typography_menu',
        'gutenblog_settings_typography_post_title',
        'gutenblog_settings_typography_body_font',
        'gutenblog_settings_typography_pre_code',
        'gutenblog_settings_typography_h1',
        'gutenblog_settings_typography_h2',
        'gutenblog_settings_typography_h3',
        'gutenblog_settings_typography_h4',
        'gutenblog_settings_typography_h5',
        'gutenblog_settings_typography_h6',
    );

    foreach ($fields_names as $key => $value) {
        $f = gutenblog_get_option($value);
        $all_fields[] = $f;
    }

    foreach ($all_fields as $key => $field) {
        if(is_array($field) && isset($field['font-family']) && !empty($field['font-family'])){
            $all_fonts[] = $field["font-family"];
        }
    }

    if($return != true){
        gutenblog_output_custom_font($all_fonts, false);
    } else if($return == true){
        return gutenblog_output_custom_font($all_fonts, false, true);
    }

}

function gutenblog_output_custom_font($current_font, $only_css = false , $return = false){
    $css ='';
    if($only_css == false){

        $media_fonts = gutenblog_get_all_files();

        if(is_array($current_font)){
            foreach ($media_fonts as $key => $value) {
                $new_title = '"'.$value['title'].'"';
                if(in_array($new_title, $current_font)){
                    $css .= '@font-face {
                        font-family: "'.$value['title'].'";
                        src: url("'.$value['url'].'");
                    }';
                }
            }
        } else {
            foreach ($media_fonts as $key => $value) {
                $new_title = '"'.$value['title'].'"';
                if($new_title == $current_font){
                    $css .= '@font-face {
                        font-family: "'.$value['title'].'";
                        src: url("'.$value['url'].'");
                    }';
                }
            }
        }
    } else if($only_css == true){

        $css .= "";

        if(is_array($current_font)){
            if(!empty($current_font)){
                foreach ($current_font as $key => $el_param) {

                    if(isset($el_param['element']) && !empty($el_param['element'])){
                        $element = $el_param['element'];
                        $css .= $element.'{';
                    }

                    if( isset($el_param['value']) && !empty($el_param['value'])){
                        $value = $el_param['value'];
                        $element = $el_param['element'];

                        if(is_array($value)){
                            foreach ($value as $key_data => $value_data) {
                                if(!is_array($value_data) && !is_array($key_data)){
                                    if(!empty($value_data)){
                                        if($key_data == "variant"){
                                            if($value_data == "regular"){
                                                $css .= 'font-weight'.':'.'normal'.';';
                                            } else {
                                                $css .= 'font-weight'.':'.$value_data.';';
                                            }
                                        } else {
                                            $css .= $key_data.':'.$value_data.';';
                                        }
                                    }
                                } 
                            }
                        } else if(isset($el_param['style']) && !empty($el_param['style'])){
                            $style = $el_param['style'];
                            if($style == "border-radius"){
                                if($value == "rounded"){
                                    $css .= $style.":15px;";
                                } else if($value == "square"){
                                    $css .= $style.":0px;";
                                }
                            }
                        } else { // not array - color
                            $css .= 'color:'.$value.';';
                        }
                    }
                    $css .= '}';
                }

                // fix for gutenberg support
                $css .= '
                    .wp-block{
                        max-width: 930px;
                    }
                    .wp-block[data-align="wide"] {
					   	max-width: 1030px;
					}
                    .wp-block[data-align="full"] {
                        max-width: none;
                    }

                    table,
                    th,
                    td {
                        border: 2px solid #f5f5f5;
                    }

                    td {
                        font-size: 14px;
                    }

                    a,
                    a:hover,
                    a:visited,
                    a:active,
                    a:focus {
                        color: inherit;
                        text-decoration: none;
                    }




                    blockquote {
                        margin: 2em !important;
                        padding: 15px 30px 5px 120px !important;
                        display: inline-block;
                        position: relative;
                        border: 0px solid !important;
                    }
                    blockquote:before {
                        content: "\e945";
                        font-family: gutenblog-font;
                        font-size: 16px;
                        background: beige;
                        width: 40px;
                        height: 40px;
                        position: absolute;
                        text-align: center;
                        line-height: 40px;
                        left: 40px;
                        top: 10px;
                    }
                    blockquote:after {
                        content: "";
                        background: beige;
                        width: 2px;
                        height: 100%;
                        position: absolute;
                        left: 80px;
                        top: 0px;
                    }
                    blockquote::before {
                        border-top-left-radius: 50px;
                        border-bottom-left-radius: 50px;
                    }

                    .wp-block-quote.is-large,
                    .wp-block-quote.is-style-large {
                        padding: 15px 60px 15px 120px!important;
                    }


                    .wp-block-pullquote.alignleft p,
                    .wp-block-pullquote.alignright p {
                        font-size: 20px;
                    }
                    .wp-block-pullquote p {
                        font-size: 28px;
                        line-height: 1.6;
                    }
                    .wp-block-pullquote {
                        padding: 1em 0;
                        border-top: 0px solid #555d66;
                        border-bottom: 0px solid #555d66;
                        color: #40464d;
                    }



                    ul li {
                        list-style: none;
                        position: relative;
                    }
                    ul li::before {
                        content: "\e909";
                        position: absolute;
                        left: -25px;
                        font-family: gutenblog-font;
                        font-size: 18px;
                        top: -2px;
                        opacity: .4;
                    }
                    ul.wp-block-gallery li::before{
                        content: "";
                    }

                    ul ul ul {
                        list-style-type: square;
                    }


                    .wp-block-latest-posts.is-grid{
                        padding-left: 1.5em;
                    }

                ';

            }
        }

    }

    if($css != '' && $only_css == false && $return == false){
        wp_add_inline_style('gutenblog-style', $css);
    } else if($css != '' && $only_css == false && $return == true){
        return $css;
    } else if($css != '' && $only_css == true){
        return $css;
    }
}



/********************
 *
 * Load more / Infinite / Pagination
 *
 ********************/

function gutenblog_get_svg( $args = array() ) {
    if ( empty( $args ) ) {
        return esc_html__( 'Please define default parameters in the form of an array.', 'gutenblog-theme' );
    }

    if ( false === array_key_exists( 'icon', $args ) ) {
        return esc_html__( 'Please define an SVG icon filename.', 'gutenblog-theme' );
    }

    $defaults = array(
        'icon'        => '',
        'title'       => '',
        'desc'        => '',
        'fallback'    => false,
    );

    $args = wp_parse_args( $args, $defaults );

    $aria_hidden = ' aria-hidden="true"';

    $aria_labelledby = '';

    
    if ( $args['title'] ) {
        $aria_hidden     = '';
        $unique_id       = uniqid();
        $aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

        if ( $args['desc'] ) {
            $aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
        }
    }

    $svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

    if ( $args['title'] ) {
        $svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

        if ( $args['desc'] ) {
            $svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
        }
    }

    
    $svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

    if ( $args['fallback'] ) {
        $svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
    }

    $svg .= '</svg>';

    return $svg;
}

function gutenblog_paginator( $first_page_url ){

    global $wp_query;

    $cat_id = "";
    $tag_id = "";
    $queried = get_queried_object();
    $args_cat = $wp_query->query;

    if(is_home()){
        $enable_cat = gutenblog_get_option('gutenblog_blog_feed_category_enable');
        $cat = gutenblog_get_option('gutenblog_blog_feed_category');
        if($enable_cat == 1){
            if(isset($cat) && !empty($cat)){
                $args_cat['cat'] = $cat;
            }
        }
    } else if(isset($queried) && !empty($queried)){
        if(isset($queried->taxonomy) && !empty($queried->taxonomy) && $queried->taxonomy == "category"){
            if(isset($queried->cat_ID) && !empty($queried->cat_ID)){
                $cat_id = $queried->cat_ID;
                $args_cat['cat'] = $cat_id;
            }
        } else if(isset($queried->taxonomy) && !empty($queried->taxonomy) && $queried->taxonomy == "post_tag"){
            if(isset($queried->term_id) && !empty($queried->term_id)){
                $tag_id = $queried->term_id;
                $args_cat['tag_id'] = $tag_id;
            }
        }
    }

    $search = "";
    if(isset($_GET['s']) && !empty($_GET['s'])){
        $search = $_GET['s'];
    }
    if($search != ""){
        $args_cat['s'] = $search;
    }

    query_posts( $args_cat );

    $first_page_url = untrailingslashit( $first_page_url );


    $first_page_url_exploded = array(); 
    $first_page_url_exploded = explode("/?", $first_page_url);
    
    $search_query = '';

    if( isset( $first_page_url_exploded[1] ) ) {
        $search_query = "/?" . $first_page_url_exploded[1];
        $first_page_url = $first_page_url_exploded[0];
    }

    $posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
    $current_page = (int) $wp_query->query_vars['paged'];
    $max_page = $wp_query->max_num_pages;

    if( $max_page <= 1 ) return;

    if( empty( $current_page ) || $current_page == 0) $current_page = 1;

    $links_in_the_middle = 4;
    $links_in_the_middle_minus_1 = $links_in_the_middle-1;

    $first_link_in_the_middle = $current_page - floor( $links_in_the_middle_minus_1/2 );
    $last_link_in_the_middle = $current_page + ceil( $links_in_the_middle_minus_1/2 );

    if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;
    if( ( $last_link_in_the_middle - $first_link_in_the_middle ) != $links_in_the_middle_minus_1 ) { $last_link_in_the_middle = $first_link_in_the_middle + $links_in_the_middle_minus_1; }
    if( $last_link_in_the_middle > $max_page ) { $first_link_in_the_middle = $max_page - $links_in_the_middle_minus_1; $last_link_in_the_middle = (int) $max_page; }
    if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;

    $pagination = '<nav id="gutenblog-blog-feed-pagination" class="navigation gutenblog-blog-feed-pagination" role="navigation"><div class="gutenblog-nav-links">';

    $order_query = '';
    if(isset($_GET['order']) && !empty($_GET['order'])){
        if($search_query == ''){
            $order_query = '/?order='.$_GET['order'];
        } else {
            $order_query = '&order='.$_GET['order'];
        }
    }

    $order_query = '';

    if ($first_link_in_the_middle >= 3 && $links_in_the_middle < $max_page) {
        $pagination.= '<a href="'. $first_page_url . $search_query . $order_query . '" class="gutenblog-page-numbers">1</a>';

        if( $first_link_in_the_middle != 2 )
            $pagination .= '<span class="gutenblog-page-numbers extend">...</span>';

    }

    for($i = $first_link_in_the_middle; $i <= $last_link_in_the_middle; $i++) {
        if($i == $current_page) {
            $pagination.= '<span class="gutenblog-page-numbers current">'.$i.'</span>';
        } else {
            $pagination .= '<a href="'. $first_page_url . '/page/' . $i . $search_query . $order_query .'" class="gutenblog-page-numbers">'.$i.'</a>';
        }
    }

    if ( $last_link_in_the_middle < $max_page ) {

        if( $last_link_in_the_middle != ($max_page-1) )
            $pagination .= '<span class="gutenblog-page-numbers extend">...</span>';

        $pagination .= '<a href="'. $first_page_url . '/page/' . $max_page . $search_query .'" class="gutenblog-page-numbers">'. $max_page .'</a>';
    }

    $pagination.= "</div></nav>\n";

    echo str_replace(array("/page/1?", "/page/1\""), array("?", "\""), $pagination);

    wp_reset_query();
}



function gutenblog_loadmore_ajax_handler(){
    if(gutenblog_get_option('gutenblog_blog_feed_post_format')){
        $gutenblog_blog_feed_post_format = gutenblog_get_option('gutenblog_blog_feed_post_format');
    } else {
        $gutenblog_blog_feed_post_format = 'Small';
    }
    $last = intval($_POST['last']);
    $gutenblog_i = 0;
    $real_action = "";

    if(isset($_POST['real_action'])
        && !empty($_POST['real_action'])
        && $_POST['real_action'] == "sort"){
        $last = 0;
        $real_action = "sort";
    }

    if($gutenblog_blog_feed_post_format != "Puzzle"){
        $gutenblog_i = intval($last - (floor($last/3)*3));
        $gutenblog_i_start = $gutenblog_i;

        if($gutenblog_i === 3){
            $gutenblog_i = 1;
        } else if($gutenblog_i === 2){
            $gutenblog_i = 3;
        } else if($gutenblog_i === 1){
            $gutenblog_i = 2;
        } else if($gutenblog_i === 0){
            $gutenblog_i = 1;
        }
        $gutenblog_i_after = $gutenblog_i;
    } else { 
        $gutenblog_i = intval($last - (floor($last/4)*4));

        if($gutenblog_i == 4){
            $gutenblog_i = 1;
        } else if($gutenblog_i == 3){
            $gutenblog_i = 4;
        } else if($gutenblog_i == 2){
            $gutenblog_i = 3;
        } else if($gutenblog_i == 1){
            $gutenblog_i = 2;
        } else if($gutenblog_i == 0){
            $gutenblog_i = 1;
        }
    }

    $gutenblog_blog_feed_columns = gutenblog_get_option('gutenblog_blog_feed_columns');
    if(!isset($gutenblog_blog_feed_columns) || empty($gutenblog_blog_feed_columns)){
        $gutenblog_blog_feed_columns = "columns-2";
    }
    $feed_columns = 6;

    if($gutenblog_blog_feed_columns == "columns-2"){
        $feed_columns = 6;
    } else if($gutenblog_blog_feed_columns == "columns-3"){
        $feed_columns = 4;
    } else if($gutenblog_blog_feed_columns == "columns-4"){
        $feed_columns = 3;
    }

    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $old_args = $args;
    $new_args = array();

    $order = "DESC";
    $orderby = "date";
    if(isset($_POST['order']) && !empty($_POST['order'])){
        if($_POST['order'] == "new"){
            $order = "DESC";
            $orderby = "date";
        } else if($_POST['order'] == "old"){
            $order = "ASC";
            $orderby = "date";
        } else if($_POST['order'] == "likes"){
            $order = "DESC";
            $orderby = 'meta_value_num date';
            $args['meta_query'] = array(
                'relation' => 'OR', 
                array(
                    'key' => '_post_like_count',
                    'compare' => 'NOT EXISTS',
                ),
                array(
                    'key' => '_post_like_count',
                    'compare' => 'EXISTS',
                ),
            );
        } else if($_POST['order'] == "views"){
            $order = "DESC";
            $orderby = 'meta_value_num date';
            $args['meta_query'] = array(
                'relation' => 'OR',
                array(
                    'key' => 'post_views_count',
                    'compare' => 'NOT EXISTS',
                ),
                array(
                    'key' => 'post_views_count',
                    'compare' => 'EXISTS',
                ),
            );
        }
    }
    $args['order'] = $order;
    $args['orderby'] = $orderby;

    $posts_per_page = $args['posts_per_page'];
    $args['paged'] = $_POST['page'] + 1;
    if(isset($_POST['real_action'])
        && !empty($_POST['real_action'])
        && $_POST['real_action'] == "sort"){

        unset($args['paged']);
        $args['posts_per_page'] = $_POST['page'] * $posts_per_page;
    }

    $args['post_status'] = array('publish', 'private');

    $cat_id = "";
    $tag_id = "";
    $queried = get_queried_object();

    if(is_home()){
        $enable_cat = gutenblog_get_option('gutenblog_blog_feed_category_enable');
        $cat = gutenblog_get_option('gutenblog_blog_feed_category');
        if($enable_cat == 1){
            if(isset($cat) && !empty($cat)){
                $args['cat'] = $cat;
            }
        }
    } else if(isset($queried) && !empty($queried)){
        if(isset($queried->taxonomy) && !empty($queried->taxonomy) && $queried->taxonomy == "category"){
            if(isset($queried->cat_ID) && !empty($queried->cat_ID)){
                $cat_id = $queried->cat_ID;
                $args['cat'] = $cat_id;
            }
        } else if(isset($queried->taxonomy) && !empty($queried->taxonomy) && $queried->taxonomy == "post_tag"){
            if(isset($queried->term_id) && !empty($queried->term_id)){
                $tag_id = $queried->term_id;
                $args['tag_id'] = $tag_id;
            }
        }
    }

    $search = "";
    if(isset($_POST['s']) && !empty($_POST['s'])){
        $search = $_POST['s'];
    }
    if($search != ""){
        $args['s'] = $search;
    }

    $new_posts = query_posts( $args );

    $excerpt = gutenblog_get_option('gutenblog_blog_feed_description_show');
    $excerpt_lenght = gutenblog_get_option('gutenblog_blog_feed_formats_show_lenght');
    $gutenblog_entry = gutenblog_get_option('gutenblog_blog_feed_thumbs_size');

    $test = 0;

    if($test == 0 && have_posts() ) :
        ?><?php while( have_posts() ): the_post(); ?><?php
            if($gutenblog_blog_feed_post_format == "Mixed"){
                ?><?php if ($gutenblog_i === 2) {
                    ?><div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-6 left-column grid-item new-grid-item">
                        <?php
                        $gutenblog_i = 3;
                        gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);
                        ?>
                    </div><?php
                } else if ($gutenblog_i === 3) {
                    ?><div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-6 right-column grid-item new-grid-item">
                        <?php
                        $gutenblog_i = 1;
                        gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);
                        ?>
                    </div><?php
                } else if ($gutenblog_i === 1) {
                    ?><div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-full col-md-12 grid-item new-grid-item">
                        <?php
                        $gutenblog_i = 2;
                        gutenblog_get_template_part_content('gutenblog-horizontal-big', $excerpt, 55);
                        ?>
                    </div><?php
                }
            ?><?php
            /*** Small ***/
            } else if($gutenblog_blog_feed_post_format == "Small"){ ?>
                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item new-grid-item" data-format="<?php echo get_post_format(); ?>">
                    <?php
                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);
                    ?>
                </div>
            <?php
            /*** Full-one ***/
            } else if($gutenblog_blog_feed_post_format == 'Full-one') { ?>
                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-full col-md-12 grid-item new-grid-item">
                    <?php
                    gutenblog_get_template_part_content('gutenblog-horizontal-big', $excerpt, $excerpt_lenght);
                    ?>
                </div>
            <?php
            /*** Mixed-Full-List ***/
            } else if($gutenblog_blog_feed_post_format == 'Mixed-Full-List') {?><?php
                if ($gutenblog_i === 1 && $real_action == "sort") { ?>
                    <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-12 grid-item new-grid-item">
                        <?php
                        gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);
                        $gutenblog_i = 2;
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item new-grid-item">
                        <?php
                        gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght, 'List');
                        ?>
                    </div>
                <?php } ?>
            <?php
            /*** Mixed-Full-Grid ***/
            } else if($gutenblog_blog_feed_post_format == 'Mixed-Full-Grid') {?><?php
                if ($gutenblog_i === 1 && $real_action == "sort") { ?>
                    <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-12 grid-item new-grid-item">
                        <?php
                        gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);
                        $gutenblog_i = 2;
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item new-grid-item">
                        <?php
                        gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);
                        ?>
                    </div>
                <?php } ?>
            <?php
            /*** Masonry ***/
            } else if($gutenblog_blog_feed_post_format == 'Masonry') { ?>
                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item new-grid-item">
                    <?php
                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);
                    $gutenblog_i++;
                    ?>
                </div>
            <?php
            /*** List ***/
            } else if($gutenblog_blog_feed_post_format == 'List') { ?>
                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item new-grid-item">
                    <?php
                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght, 'List');
                    ?>
                </div>
            <?php
            /*** Puzzle ***/
            } else if($gutenblog_blog_feed_post_format == 'Puzzle') {
                if ($gutenblog_i == 2 || $gutenblog_i == 3 || $gutenblog_i == 4) { ?>
                    <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-puzzle col-md-6 puzzle-column new-grid-item grid-item">
                        <?php
                        gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);

                        $gutenblog_i++;
                        if($gutenblog_i == 5){
                            $gutenblog_i = 1;
                        }
                        ?>
                    </div>
                <?php } else if ($gutenblog_i == 1) { ?>
                    <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-full-puzzle col-md-6 new-grid-item grid-item">
                        <?php
                        gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);
                        $gutenblog_i=2;
                        ?>
                    </div>
                <?php } ?>
            <?php }

        ?><?php endwhile;
    ?><?php
    endif;
    wp_reset_query();
    die;
}

function gutenblog_get_post_format_switch($excerpt = "excerpt", $layout_custom = null){
    $post_format_switch = "";
    $gutenblog_example_content = gutenblog_get_option('gutenblog_example_content');

    if(get_post_format() == 'gallery'){
        $gutenblog_blog_feed_gallery_content_slider = gutenblog_get_option('gutenblog_blog_feed_gallery_content_slider');
        if($excerpt == "content" && $gutenblog_blog_feed_gallery_content_slider == 1){
            if($layout_custom != null && $layout_custom == 'List') {

                $post_format_switch = get_post_format()."-slider-layout-list";

            } else {
                $post_format_switch = get_post_format()."-slider";
            }
        } else if($excerpt == "content" && $gutenblog_blog_feed_gallery_content_slider == 0 || $excerpt == "excerpt"){

            if(has_post_thumbnail() || $gutenblog_example_content == 1) {
                if($layout_custom != null && $layout_custom == 'List') {

                    $post_format_switch = get_post_format()."-layout-list";

                } else {
                    $post_format_switch = get_post_format();
                }
            } 
            else if(!has_post_thumbnail() && $gutenblog_example_content == 0) {

                $post_format_switch = get_post_format()."-no-thumb";

            }
        }
    } else if(get_post_format() == 'video'){
        $gutenblog_blog_feed_video_content = gutenblog_get_option('gutenblog_blog_feed_video_content');
        if($excerpt == "content" && $gutenblog_blog_feed_video_content == 1){
            if($layout_custom != null && $layout_custom == 'List') {

                $post_format_switch = get_post_format()."-player-layout-list";

            } else {
                $post_format_switch = get_post_format()."-player";
            }
        } else if($excerpt == "content" && $gutenblog_blog_feed_video_content == 0 || $excerpt == "excerpt"){

            if(has_post_thumbnail() || $gutenblog_example_content == 1) {
                if($layout_custom != null && $layout_custom == 'List') {

                    $post_format_switch = get_post_format()."-layout-list";

                } else {
                    $post_format_switch = get_post_format();
                }
            } 
            else if(!has_post_thumbnail() && $gutenblog_example_content == 0) {

                $post_format_switch = get_post_format()."-no-thumb";

            }
        }
    } else if(get_post_format() == 'audio'){
        $gutenblog_blog_feed_audio_content = gutenblog_get_option('gutenblog_blog_feed_audio_content');
        if($excerpt == "content" && $gutenblog_blog_feed_audio_content == 1){
            if($layout_custom != null && $layout_custom == 'List') {

                $post_format_switch = get_post_format()."-player-layout-list";

            } else {
                $post_format_switch = get_post_format()."-player";
            }
        } else if($excerpt == "content" && $gutenblog_blog_feed_audio_content == 0 || $excerpt == "excerpt"){

            if(has_post_thumbnail() || $gutenblog_example_content == 1) {
                if($layout_custom != null && $layout_custom == 'List') {

                    $post_format_switch = get_post_format()."-layout-list";

                } else {
                    $post_format_switch = get_post_format();
                }
            } 
            else if(!has_post_thumbnail() && $gutenblog_example_content == 0) {

                $post_format_switch = get_post_format()."-no-thumb";

            }
        }
    } else {
        if(has_post_thumbnail() || $gutenblog_example_content == 1) {
            if($layout_custom != null && $layout_custom == 'List') {
                if(get_post_format() == false){
                    $post_format_switch = "layout-list";
                } else {
                    $post_format_switch = get_post_format()."-layout-list";
                }
            } else {
                if(get_post_format() == false){
                    $post_format_switch = "";
                } else {
                    $post_format_switch = get_post_format();
                }
            }
        } 
        else if(!has_post_thumbnail() && $gutenblog_example_content == 0) {
            if(get_post_format() == false){
                $post_format_switch = "no-thumb";
            } else {
                $post_format_switch = get_post_format()."-no-thumb";
            }
        }
    }



    return $post_format_switch;
}

function gutenblog_get_template_part_content($gutenblog_entry = "gutenblog-square", $excerpt = "excerpt", $excerpt_lenght = 55, $layout_custom = null){

    if($layout_custom != null){
        $post_format_switch = gutenblog_get_post_format_switch($excerpt, $layout_custom);
    } else {
        $post_format_switch = gutenblog_get_post_format_switch($excerpt);
    }



    set_query_var( 'gutenblog_entry', $gutenblog_entry );
    set_query_var( 'excerpt', $excerpt );
    set_query_var( 'excerpt_lenght', $excerpt_lenght );

    if(get_post_format() == false){
        get_template_part( 'template-parts/post/content', $post_format_switch );
    } else {
        get_template_part( 'template-parts/post/'.get_post_format().'/content', $post_format_switch );
    }
}



function gutenblog_thumbnail_content($gutenblog_image_size = 'gutenblog-square'){
    $gutenblog_example_content = gutenblog_get_option('gutenblog_example_content');
    $gutenblog_blog_feed_thumbnail_date_show = gutenblog_get_option('gutenblog_blog_feed_thumbnail_date_show');

    ?>
    <?php if(has_post_thumbnail() || $gutenblog_example_content == 1) { ?>
        <div class="thumb-wrap">

            <?php if(has_post_thumbnail()) { ?>
                <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
                    <?php
                    $thumb_load = "";
                    if(get_the_post_thumbnail_url(get_the_ID(), 'gutenblog-square-small')){
                        $thumb_load = get_the_post_thumbnail_url(get_the_ID(), 'gutenblog-square-small');
                    }
                    the_post_thumbnail( $gutenblog_image_size, array('data-lowsrc'=>$thumb_load, 'alt' => get_the_title(), 'class'=>'img-responsive lazyload '.$gutenblog_image_size.'' ) ); ?>

                    <div class="overlay-thumb"></div>
                    <div class="overlay-thumb2"></div>
                </a>
            <?php } else if($gutenblog_example_content == 1) { ?>
                <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
                    <img src="<?php echo esc_url(gutenblog_thumbnails($gutenblog_image_size)) ?>" alt="<?php the_title_attribute() ?>" class="img-responsive lazyload <?php echo esc_attr($gutenblog_image_size); ?>" />

                    <div class="overlay-thumb"></div>
                    <div class="overlay-thumb2"></div>
                </a>
            <?php } ?>
        </div>
    <?php } ?>
    <?php
}


function gutenblog_thumbnail_featured_posts($gutenblog_image_size = 'gutenblog-square'){
    $gutenblog_example_content = gutenblog_get_option('gutenblog_example_content');
    $gutenblog_blog_feed_thumbnail_date_show = gutenblog_get_option('gutenblog_blog_feed_thumbnail_date_show');
    ?>
    <?php if(has_post_thumbnail() || $gutenblog_example_content == 1) { ?>
        <div class="ffp-thumb-wrap">

            <?php if(has_post_thumbnail()) { ?>

                <a class="ffp-post-link" href="<?php echo get_the_permalink(get_the_ID()); ?>">
                    <?php
                    $thumb_load = "";
                    if(get_the_post_thumbnail_url(get_the_ID(), 'gutenblog-square-small')){
                        $thumb_load = get_the_post_thumbnail_url(get_the_ID(), 'gutenblog-square-small');
                    }
                    the_post_thumbnail( $gutenblog_image_size, array('data-lowsrc'=>$thumb_load, 'alt' => get_the_title(), 'class'=>'ffp-thumb img-responsive lazyload '.$gutenblog_image_size.'' ) ); ?>

                   <div class="overlay-thumb"></div>
                   <div class="overlay-thumb2"></div>

                </a>

            <?php } else if($gutenblog_example_content == 1) { ?>

                <a class="ffp-post-link" href="<?php echo get_the_permalink(get_the_ID()); ?>">
                    <img src="<?php echo esc_url(gutenblog_thumbnails($gutenblog_image_size)) ?>" alt="<?php the_title_attribute() ?>" class="ffp-thumb ffp-thumb-placeholder img-responsive lazyload <?php echo esc_attr($gutenblog_image_size); ?>" />

                </a>

            <?php } else { ?>

            <?php } ?>
        </div>
    <?php } ?>
    <?php
}

/**
 * Custom comment walker
 *
 * @users Walker_Comment
 */
/*class WPSE_Walker_Comment extends Walker_Comment
{
    public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 )
    {
        if ( 'wpse' === $args['format'] ){
            $depth++;
            $GLOBALS['comment_depth'] = $depth;
            $GLOBALS['comment'] = $comment;

            ob_start();

            $this->html5_comment( $comment, $depth, $args );


            $rating_html = gutenblog_like_or_rating_comment($comment->comment_ID);

            $output = str_replace(
               [ '<footer class="comment-meta">', '</footer>' ],
               [ '<footer class="comment-meta">', '<div class="comment-rating-wrap">'.$rating_html.'</div></footer>' ],
               ob_get_clean()
            );

        } else {
           parent::start_el( $output, $comment, $depth, $args, $id );
        }
    }
}*/


/**
 * Custom function wich outputs a comment in the HTML5 format with rating.
 *
 * @since 3.6.0
 *
 * @see wp_list_comments()
 *
 * @param WP_Comment $comment Comment to display.
 * @param int        $depth   Depth of the current comment.
 * @param array      $args    An array of arguments.
 */
function html5_comment_custom( $comment, $depth, $args ) {
	$tag = ( 'div' === $depth['style'] ) ? 'div' : 'li';

	$commenter = wp_get_current_commenter();
	if ( $commenter['comment_author_email'] ) {
		$moderation_note = esc_html__( 'Your comment is awaiting moderation.', 'gutenblog-theme' );
	} else {
		$moderation_note = esc_html__( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.', 'gutenblog-theme' );
	}

	?>
	<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( ); ?>>

		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
                <div class="comment-meta-author">
                    <div class="comment-author vcard">
                        <?php
                        if ( 0 != $depth['avatar_size'] ) {
                            echo get_avatar( $comment, $depth['avatar_size'] );}
                        ?>
                        <?php
                            /* translators: %s: comment author link */
                            printf(
                                sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) )
                            );
                        ?>
                    </div><!-- .comment-author -->

                    <div class="comment-metadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment, $depth ) ); ?>">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php
                                    /* translators: 1: comment date, 2: comment time */
                                    printf( esc_html__( '%1$s at %2$s', 'gutenblog-theme' ), get_comment_date( '', $comment ), get_comment_time() );
                                ?>
                            </time>
                        </a>
                        <?php edit_comment_link( esc_html__( 'Edit', 'gutenblog-theme' ), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .comment-metadata -->
                </div>
                <div class="comment-meta-rating">
                    <?php $rating_html = gutenblog_like_or_rating_comment($comment->comment_ID); ?>
                    <div class="comment-rating-wrap"><?php echo esc_html( $rating_html ); ?></div>
                </div>

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em>
				<?php endif; ?>


            </footer>

			</footer><!-- .comment-meta123 -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php

			comment_reply_link(
				array_merge(
					$depth,
					array(
						'add_below' => 'div-comment',
						'depth'     => $args,
						'max_depth' => $depth['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
					)
				)
			);
			?>
		</article><!-- .comment-body -->
	<?php
}






function gutenblog_like_or_rating_comment($comment_id ){
    $gutenblog_blog_feed_likes_or_rating = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating_comment');
    $rating_loggedin = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating_comment_loggedin');
    $return = false;

    if($gutenblog_blog_feed_likes_or_rating != 'none') { ?>
        <?php if(defined('THEMES_MONSTERS_CORE')){
            if($gutenblog_blog_feed_likes_or_rating == "rating"){
                if(function_exists('get_simple_rating_button')){
                    $return = get_simple_rating_button( $comment_id, true, $rating_loggedin );
                }
            } else if($gutenblog_blog_feed_likes_or_rating == "likes"){
                if(function_exists('get_simple_likes_button')){
                    $return = get_simple_likes_button( $comment_id, true );
                }
            }
        } ?>
    <?php }  ?>

    <?php

    return $return;

}

function gutenblog_meta_content($visible = false, $on_single = false){
    $gutenblog_blog_feed_meta_show = gutenblog_get_option('gutenblog_blog_feed_meta_show');
    $gutenblog_blog_feed_date_show = gutenblog_get_option('gutenblog_blog_feed_date_show');
    $gutenblog_blog_feed_thumbnail_date_show = gutenblog_get_option('gutenblog_blog_feed_thumbnail_date_show');
    $gutenblog_blog_feed_author_show = gutenblog_get_option('gutenblog_blog_feed_author_show');

    $gutenblog_blog_feed_likes_show = gutenblog_get_option('gutenblog_blog_feed_likes_show');
    $gutenblog_blog_feed_likes_or_rating = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating');
    $rating_loggedin = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating_loggedin');

    $gutenblog_blog_feed_views_show = gutenblog_get_option('gutenblog_blog_feed_views_show');

    $is_visible = "";
    if($visible == true){
        $is_visible = "entry-meta-visible";
    }

    $is_single = "";
    if($on_single == true){
        $is_single = "entry-meta-on-content-single";
    }

    ?>


    <?php if($gutenblog_blog_feed_meta_show == 1) { ?>
        <div class="<?php if($is_single != ""){echo esc_attr($is_single);}else {echo 'entry-meta-on-thumb';} ?> <?php echo esc_attr($is_visible); ?>">

            <!-- Hover Content On Thumb -->
            <div class="entry-meta-on-thumb-content d-flex align-items-start flex-column">
                <div class="first-vertical-col w-100 mb-auto">
                    <div class=" d-flex">
                        <div class="mr-auto align-items-center">
                            <?php if($gutenblog_blog_feed_thumbnail_date_show == 1) { ?>
                                <div class="thumbnail-date date updated">
                                    <span><?php echo get_the_date('d'); ?></span>
                                    <span><?php echo get_the_date('M'); ?></span>
                                </div>
                            <?php } ?>
                        </div>


                    </div>
                </div>

                <div class="entry-title-center-on-thumb">
                    <h6 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h6>
                </div>

                <div class="third-vertical-col w-100 entry-meta">
                    <div class="bar-shares-rating d-flex ml-auto">
                        <div class="bar-rating">
                            <?php  if($gutenblog_blog_feed_likes_or_rating != 'none') { ?>
                                <?php if(defined('THEMES_MONSTERS_CORE')){
                                    if($gutenblog_blog_feed_likes_or_rating == "rating"){
                                        if(function_exists('get_simple_rating_button')){
                                            echo get_simple_rating_button( get_the_ID(), NULL, $rating_loggedin );
                                        }
                                    } else if($gutenblog_blog_feed_likes_or_rating == "likes"){
                                        if(function_exists('get_simple_likes_button')){
                                            echo get_simple_likes_button( get_the_ID() );
                                        }
                                    }
                                } ?>
                            <?php }  ?>
                        </div>
                        <div class="bar-shares">
                                <?php if(defined('THEMES_MONSTERS_CORE')){ ?>
                                    <?php wcr_share_buttons(); ?>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <a href="<?php the_permalink(); ?>" class="link-wrap"></a>
            </div>
            <!-- / Hover Content On Thumb -->

        </div>
    <?php } ?>

    <?php
}


function gutenblog_meta_content_visible($visible = false, $on_single = false){
    $gutenblog_blog_feed_meta_show = gutenblog_get_option('gutenblog_blog_feed_meta_show');
    $gutenblog_blog_feed_date_show = gutenblog_get_option('gutenblog_blog_feed_date_show');
    $gutenblog_blog_feed_thumbnail_date_show = gutenblog_get_option('gutenblog_blog_feed_thumbnail_date_show');
    $gutenblog_blog_feed_author_show = gutenblog_get_option('gutenblog_blog_feed_author_show');

    $gutenblog_blog_feed_likes_show = gutenblog_get_option('gutenblog_blog_feed_likes_show');
    $gutenblog_blog_feed_likes_or_rating = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating');
    $rating_loggedin = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating_loggedin');

    $gutenblog_blog_feed_views_show = gutenblog_get_option('gutenblog_blog_feed_views_show');

    $is_visible = "";
    if($visible == true){
        $is_visible = "entry-meta-visible";
    }

    $is_single = "";
    if($on_single == true){
        $is_single = "entry-meta-on-content-single";
    }

    ?>


    <?php if($gutenblog_blog_feed_meta_show == 1) { ?>
        <div class="<?php if($is_single != ""){echo esc_attr($is_single);}else {echo 'entry-meta-without-thumb';} ?> <?php echo esc_attr($is_visible); ?>">

            <!-- Hover Content On Thumb -->
            <div class="entry-meta-content align-items-start flex-column">
                <div class="d-flex d-flex align-items-center gutenblog-single-meta-wrap">

                    <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                        <div class="entry-meta-author-thumb">
                            <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                        </div>
                    <?php }?>


                    <div class="entry-meta-wrapper">
                        <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                            <div class="entry-meta-author-name">
                                <?php echo esc_html_e( 'by', 'gutenblog-theme' ) ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                            </div>
                        <?php }?>


                        <?php if($gutenblog_blog_feed_date_show == 1) { ?>
                            <div class="thumbnail-date date updated">
                                <span><?php echo get_the_date('F j, Y'); ?></span>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="single-meta-buttons d-flex justify-content-end align-items-center ml-auto">
                        <div class="comments-wrap">
                            <div class="comments-icon icon-message-circle"></div>
                            <div class="comments-numbers">
                                <?php comments_number('0', '1', '%'); ?></div>
                        </div>
                        <?php if($gutenblog_blog_feed_views_show == 1) { ?>
                            <?php if(defined('THEMES_MONSTERS_CORE')){
                                echo get_post_views( get_the_ID() );
                            } ?>
                        <?php }?>
                    </div>

                </div>
            </div>
            <!-- / Hover Content On Thumb -->

        </div>
    <?php } ?>

<?php
}



function gutenblog_shares_content(){
    $gutenblog_blog_feed_share_show = gutenblog_get_option('gutenblog_blog_feed_share_show');
    $gutenblog_example_content = gutenblog_get_option('gutenblog_example_content');
    $in_content = "";
    if(!has_post_thumbnail() && $gutenblog_example_content == 0){
        $in_content = "share-counter-wrap-in-content";
    }
    if($gutenblog_blog_feed_share_show == 1) { ?>
        <?php if(defined('THEMES_MONSTERS_CORE')){ ?>
            <div class="<?php echo esc_attr($in_content); ?>">
                <span class="share-counter-icon icon-more-vertical"></span>
                <div class="share-popup">
                    <?php wcr_share_buttons(); ?>
                </div>
            </div>
        <?php } ?>
    <?php }
}

function gutenblog_rollovers_start_content(){
    $gutenblog_section_blog_feed_effects_select = gutenblog_get_option('gutenblog_section_blog_feed_effects_select');
    if($gutenblog_section_blog_feed_effects_select == 'post-hover-effect-2' ) { ?>
        <div class="rollovers-wrap">
            <div class="rollovers-item">
    <?php }
}

function gutenblog_rollovers_end_content(){
    $gutenblog_section_blog_feed_effects_select = gutenblog_get_option('gutenblog_section_blog_feed_effects_select');
    if($gutenblog_section_blog_feed_effects_select == 'post-hover-effect-2' ) { ?>
            </div>
        </div>
    <?php }
}

function gutenblog_categoty_list_content(){
    $gutenblog_blog_feed_category_show = gutenblog_get_option('gutenblog_blog_feed_category_show');

    $gutenblog_setting_blog_category_design = gutenblog_get_option('gutenblog_setting_blog_category_design');
    $category_design_2_background = gutenblog_get_option('gutenblog_setting_blog_category_design_2_background');
    $category_design_2_icon = gutenblog_get_option('gutenblog_setting_blog_category_design_2_icon');

    $cat_wrap_class = " gutenblog-".$gutenblog_setting_blog_category_design." ";
    if($gutenblog_setting_blog_category_design == "category-design-2"){
        $cat_wrap_class .= " gutenblog-cat-2-".$category_design_2_background." ";
        $cat_wrap_class .= " gutenblog-cat-2-".$category_design_2_icon." ";
    } else if($gutenblog_setting_blog_category_design == "category-design-3"){

    }


    if($gutenblog_blog_feed_category_show == 1) { ?>

        <div class="entry-category <?php echo esc_attr($cat_wrap_class); ?>">
            <?php echo gutenblog_get_the_category_list(); ?>
        </div>

    <?php }
}


function gutenblog_related_posts($post){
    $number = gutenblog_get_option('gutenblog_single_related_posts_number');
    if($number == false || !$number){
        $number = 3;
    }

    $tags = wp_get_post_tags($post->ID);
    if ($tags) {

        $first_tag = $tags[0]->term_id;
        $args=array(
            'tag__in' => array($first_tag),
            'post__not_in' => array($post->ID),
            'posts_per_page'=>$number,
            'ignore_sticky_posts'=> 1,
        );
        $my_query = new WP_Query($args);

        if ($my_query->have_posts()) { ?>
            <div class="gutenblog-related-posts-wrap">

                <?php $related_title = gutenblog_get_option('gutenblog_single_post_related_title');
                if($related_title){ ?>
                    <h5><?php echo ''.$related_title; ?></h5>
                <?php } ?>

                <div class="blog-feed-posts blog-feed-related-posts gutenblog-related-posts-inner row">
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <div class="gutenblog-blog-feed-post gutenblog-blog-feed-related-post gutenblog-blog-feed-post-small col-md-4 grid-item">
                            <?php
                            set_query_var( 'no_content', true );

                            $gutenblog_entry = gutenblog_get_option('gutenblog_blog_feed_thumbs_size');
                            gutenblog_get_template_part_content($gutenblog_entry, 'excerpt', 55);
                            ?>
                        </div>

                    <?php endwhile; ?>

                </div>

            </div>
        <?php }
        wp_reset_query();
    }
}

function gutenblog_get_frontpage_order(){
    $gutenblog_sortable_frontpage = gutenblog_get_option('gutenblog_sortable_frontpage');

    $front_array = array();
    $before_feed_array = array();
    $after_feed_array = array();

    $after_feed = 0;
    if(isset($gutenblog_sortable_frontpage) && !empty($gutenblog_sortable_frontpage) && is_array($gutenblog_sortable_frontpage)){
        foreach ($gutenblog_sortable_frontpage as $key => $value) {
            if($value == "feed"){

                $after_feed = 1;
            } else {
                if($after_feed == 1){
                    $after_feed_array[] = $value;
                } else {
                    $before_feed_array[] = $value;
                }
            }
        }
        $front_array['before'] = $before_feed_array;
        $front_array['after'] = $after_feed_array;

        return $front_array;
    }
}

function gutenblog_output_frontpage_order($position = "before"){
    $frontpaged_order = gutenblog_get_frontpage_order();


    if(isset($frontpaged_order) && !empty($frontpaged_order)){
        if(isset($frontpaged_order[$position]) && !empty($frontpaged_order[$position])){

            $elements = $frontpaged_order[$position];
            foreach ($elements as $key => $el) {
                if($el == "banner") {
                    get_template_part('parts/frontpage', 'banner');
                } else if($el == "posts_slider"){
                    get_template_part('parts/frontpage', 'posts-large');
                } else if($el == "featured_categories"){
                    get_template_part('parts/frontpage', 'featured-categories');
                } else if($el == "featured_posts"){
                    get_template_part('parts/frontpage', 'featured');
                } else if($el == "feed"){

                } else if($el == "large_post"){
                    get_template_part('parts/frontpage', 'large');
                } else if($el == "footer_posts"){
                    get_template_part('parts/frontpage', 'posts-footer');
                } else if($el == "promotion_banner"){
                    echo ('<div class="frontpage-promo-banner"><div class="main-wrapper">');
                    $promotion_banner = gutenblog_get_option('gutenblog_section_frontpage_promotion_banner_textarea');
                    echo wp_kses( $promotion_banner,'post');
                    echo ('</div></div>');
                } else if($el == "subscribe_form"){
                    echo ('<div class="frontpage-subscribe-form"><div class="main-wrapper">');
                    $subscribe_form = gutenblog_get_option('gutenblog_section_frontpage_subscribe_form_textarea');
                    $subscribe_form_shortcode = gutenblog_get_option('gutenblog_section_frontpage_subscribe_form_shortcode');
                    $subscribe_form_switch = gutenblog_get_option('gutenblog_section_frontpage_subscribe_form_choice');

                    if($subscribe_form_switch == false){ 
                        echo wp_kses( $subscribe_form,'post');
                    } else if($subscribe_form_switch == true){ 
                        echo do_shortcode($subscribe_form_shortcode);
                    }
                    echo ('</div></div>');
                }
            }

        }
    }
}

function gutenblog_loadmore_img_src( $src=null ) {
    $src = get_template_directory_uri() . '/sample/images/loading.svg';
    return $src;
}

add_action('wp_ajax_loadmore', 'gutenblog_loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'gutenblog_loadmore_ajax_handler'); 

function gutenblog_get_post_content_template(){
    $path = locate_template('template-parts/post/');
    return $path;
}

function gutenblog_get_post_format($clear = false){
    $format = get_post_format();
    if($clear == false){
        if($format == false){
            $format = ".php";
        } else {
            $format = "-".$format.".php";
        }
    } else if($clear == true){
        $format = $format;
    }
    return $format;
}

function gutenblog_get_post_content_path(){
    $format = gutenblog_get_post_format();
    $post_content_template = gutenblog_get_post_content_template();
    $path = $post_content_template.'content'.$format;
    $path_content = $post_content_template.'content.php';
    if(file_exists($path)){
        return $path;
    } else {
        return $path_content;
    }

}


function gutenblog_query_orderby($query) {

    return $query;
}

add_filter('pre_get_posts','gutenblog_query_orderby');



function gutenblog_get_the_category_list( $separator = '', $parents = '', $post_id = false ) {
    global $wp_rewrite;

    if ( ! is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) ) {
        return apply_filters( 'the_category', '', $separator, $parents );
    }

    $categories = apply_filters( 'the_category_list', get_the_category( $post_id ), $post_id );

    if ( empty( $categories ) ) {
        return apply_filters( 'the_category', esc_html__( 'Uncategorized', 'gutenblog-theme' ), $separator, $parents );
    }

    $rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';

    $gutenblog_setting_blog_category_design = gutenblog_get_option('gutenblog_setting_blog_category_design');

    $thelist = '';
    if ( '' == $separator ) {
        $thelist .= '<ul class="post-categories gutenblog-custom-list">';
        foreach ( $categories as $category ) {

            $category_link = esc_url( get_category_link( $category->term_id ) );
            $category_icon = "";
            $category_icon_inner = "";
            $category_3 = "";

            $cat_img = '';
            $cat_radio_icon = '';
            $cat_icon_img = '';
            $cat_icon = '';
            $cat_color = '';
            $cat_text_color = '';

            if(defined('THEMES_MONSTERS_CORE')){

                $cat_ID = $category->cat_ID;
                $cat_meta = get_term_meta($cat_ID);


                if(isset($cat_meta['_catimg']) && !empty($cat_meta['_catimg'])){
                    $cat_img = $cat_meta['_catimg'][0];
                }

                if(isset($cat_meta['_catradioicon']) && !empty($cat_meta['_catradioicon'])){
                    $cat_radio_icon = $cat_meta['_catradioicon'][0];
                }
                if(isset($cat_meta['_caticonimg']) && !empty($cat_meta['_caticonimg'])){
                    $cat_icon_img = $cat_meta['_caticonimg'][0];
                }
                if(isset($cat_meta['_caticon']) && !empty($cat_meta['_caticon'])){
                    $cat_icon = $cat_meta['_caticon'][0];
                }

                if(isset($cat_meta['_catcolor']) && !empty($cat_meta['_catcolor'])){
                    $cat_color = $cat_meta['_catcolor'][0];
                }
                if(isset($cat_meta['_cattextcolor']) && !empty($cat_meta['_cattextcolor'])){
                    $cat_text_color = $cat_meta['_cattextcolor'][0];
                }

                if($gutenblog_setting_blog_category_design == 'category-design-1') {

                } else if($gutenblog_setting_blog_category_design == 'category-design-2') {
                    $category_design_2_background = gutenblog_get_option('gutenblog_setting_blog_category_design_2_background');
                    $category_design_2_icon = gutenblog_get_option('gutenblog_setting_blog_category_design_2_icon');

                    if($category_design_2_icon == "icon-1"){ 
                        $category_icon_inner = strtoupper(substr($category->name,0, 1));
                    } else if($category_design_2_icon == "icon-2"){
                        $category_icon_inner = $category->count;
                    }

                    if($category_design_2_background == 'background-1'){ 
                        $category_icon_background_color = "";

                        if($cat_color != "" && $cat_text_color == ""){ 
                            $category_icon_background_color = "style='background-color: ".$cat_color.";'";
                        } else if($cat_color == "" && $cat_text_color != ""){
                            $category_icon_background_color = "style='color: ".$cat_text_color.";'";
                        } else if($cat_color != "" && $cat_text_color != ""){
                            $category_icon_background_color = "style='background-color: ".$cat_color.";color: ".$cat_text_color.";'";
                        }

                        $category_icon = '<div class="themesmonsters-cat-icon" '.$category_icon_background_color.'><div class="themesmonsters-cat-icon-inner">'.$category_icon_inner.'</div></div>';
                    } else if($category_design_2_background == "background-2"){
                        $category_icon_background_img = "";

                        if($cat_img != ""){
                            $category_icon_background_img = 'style="background-image: url('. esc_url($cat_img) .');"';
                        }

                        if($cat_img != "" && $cat_text_color == ""){ 
                            $category_icon_background_img = 'style="background-image: url('. esc_url($cat_img) .');"';
                        } else if($cat_img == "" && $cat_text_color != ""){ 
                            $category_icon_background_img = "style='color: ".$cat_text_color.";'";
                        } else if($cat_img != "" && $cat_text_color != ""){ 
                            $category_icon_background_img = "style='background-image: url(". esc_url($cat_img) .");color: ".$cat_text_color.";'";
                        }

                        $category_icon = '<div class="themesmonsters-cat-icon" '.$category_icon_background_img.'><div class="themesmonsters-cat-icon-inner">'.$category_icon_inner.'</div></div>';
                    }

                } else if($gutenblog_setting_blog_category_design == 'category-design-3') {
                    if($cat_color != "" && $cat_text_color == ""){ 
                        $category_3 = "style='background-color: ".$cat_color.";'";
                    } else if($cat_color == "" && $cat_text_color != ""){
                        $category_3 = "style='color: ".$cat_text_color.";'";
                    } else if($cat_color != "" && $cat_text_color != ""){ 
                        $category_3 = "style='background-color: ".$cat_color.";color: ".$cat_text_color.";'";
                    }

                }

            }

            $thelist .= "\n\t<li>";
            switch ( strtolower( $parents ) ) {
                case 'multiple':
                    if ( $category->parent ) {
                        $thelist .= get_category_parents( $category->parent, true, $separator );
                    }

                    $thelist .= '<a '.$category_3.' href="' . $category_link . '" '.$rel.'>'. $category_icon .'<span class="themesmonsters-cat-span">'. $category->name .'</span></a></li>';
                    break;
                case 'single':
                    $thelist .= '<a '.$category_3.' href="' . $category_link . '"  ' . $rel . '>'. $category_icon .'<span class="themesmonsters-cat-span">';
                    if ( $category->parent ) {
                        $thelist .= get_category_parents( $category->parent, false, $separator );
                    }
                    $thelist .= $category->name . '</span></a></li>';
                    break;
                case '':
                default:
                    $thelist .= '<a '.$category_3.' href="'. $category_link .'" '.$rel.'>'. $category_icon .'<span class="themesmonsters-cat-span">'. $category->name . '</span></a></li>';
            }
        }
        $thelist .= '</ul>';
    } else {
        $i = 0;
        foreach ( $categories as $category ) {

            $category_link = esc_url( get_category_link( $category->term_id ) );
            $category_icon = "";
            $category_icon_inner = "";
            $category_3 = "";

            $cat_img = '';
            $cat_radio_icon = '';
            $cat_icon_img = '';
            $cat_icon = '';
            $cat_color = '';
            $cat_text_color = '';

            if(defined('THEMES_MONSTERS_CORE')){

                $cat_ID = $category->cat_ID;
                $cat_meta = get_term_meta($cat_ID);


                if(isset($cat_meta['_catimg']) && !empty($cat_meta['_catimg'])){
                    $cat_img = $cat_meta['_catimg'][0];
                }

                if(isset($cat_meta['_catradioicon']) && !empty($cat_meta['_catradioicon'])){
                    $cat_radio_icon = $cat_meta['_catradioicon'][0];
                }
                if(isset($cat_meta['_caticonimg']) && !empty($cat_meta['_caticonimg'])){
                    $cat_icon_img = $cat_meta['_caticonimg'][0];
                }
                if(isset($cat_meta['_caticon']) && !empty($cat_meta['_caticon'])){
                    $cat_icon = $cat_meta['_caticon'][0];
                }

                if(isset($cat_meta['_catcolor']) && !empty($cat_meta['_catcolor'])){
                    $cat_color = $cat_meta['_catcolor'][0];
                }
                if(isset($cat_meta['_cattextcolor']) && !empty($cat_meta['_cattextcolor'])){
                    $cat_text_color = $cat_meta['_cattextcolor'][0];
                }

                if($gutenblog_setting_blog_category_design == 'category-design-1') {

                } else if($gutenblog_setting_blog_category_design == 'category-design-2') {
                    $category_design_2_background = gutenblog_get_option('gutenblog_setting_blog_category_design_2_background');
                    $category_design_2_icon = gutenblog_get_option('gutenblog_setting_blog_category_design_2_icon');

                    if($category_design_2_icon == "icon-1"){ 
                        $category_icon_inner = strtoupper(substr($category->name,0, 1));
                    } else if($category_design_2_icon == "icon-2"){ 
                        $category_icon_inner = $category->count;
                    }

                    if($category_design_2_background == 'background-1'){ 
                        $category_icon_background_color = "";

                        if($cat_color != "" && $cat_text_color == ""){ 
                            $category_icon_background_color = "style='background-color: ".$cat_color.";'";
                        } else if($cat_color == "" && $cat_text_color != ""){ 
                            $category_icon_background_color = "style='color: ".$cat_text_color.";'";
                        } else if($cat_color != "" && $cat_text_color != ""){ 
                            $category_icon_background_color = "style='background-color: ".$cat_color.";color: ".$cat_text_color.";'";
                        }

                        $category_icon = '<div class="themesmonsters-cat-icon" '.$category_icon_background_color.'><div class="themesmonsters-cat-icon-inner">'.$category_icon_inner.'</div></div>';
                    } else if($category_design_2_background == "background-2"){
                        $category_icon_background_img = "";

                        if($cat_img != ""){
                            $category_icon_background_img = 'style="background-image: url('. esc_url($cat_img) .');"';
                        }

                        if($cat_img != "" && $cat_text_color == ""){ 
                            $category_icon_background_img = 'style="background-image: url('. esc_url($cat_img) .');"';
                        } else if($cat_img == "" && $cat_text_color != ""){ 
                            $category_icon_background_img = "style='color: ".$cat_text_color.";'";
                        } else if($cat_img != "" && $cat_text_color != ""){ 
                            $category_icon_background_img = "style='background-image: url(". esc_url($cat_img) .");color: ".$cat_text_color.";'";
                        }

                        $category_icon = '<div class="themesmonsters-cat-icon" '.$category_icon_background_img.'><div class="themesmonsters-cat-icon-inner">'.$category_icon_inner.'</div></div>';
                    }

                } else if($gutenblog_setting_blog_category_design == 'category-design-3') {
                    if($cat_color != "" && $cat_text_color == ""){ 
                        $category_3 = "style='background-color: ".$cat_color.";'";
                    } else if($cat_color == "" && $cat_text_color != ""){ 
                        $category_3 = "style='color: ".$cat_text_color.";'";
                    } else if($cat_color != "" && $cat_text_color != ""){ 
                        $category_3 = "style='background-color: ".$cat_color.";color: ".$cat_text_color.";'";
                    }

                }

            }

            if ( 0 < $i ) {
                $thelist .= $separator;
            }
            switch ( strtolower( $parents ) ) {
                case 'multiple':
                    if ( $category->parent ) {
                        $thelist .= get_category_parents( $category->parent, true, $separator );
                    }

                    $thelist .= '<a '.$category_3.' href="' . $category_link . '" ' . $rel . '>'. $category_icon .'<span class="themesmonsters-cat-span">'. $category->name . '</span></a>';
                    break;
                case 'single':
                    $thelist .= '<a '.$category_3.' href="' . $category_link . '" ' . $rel . '>'. $category_icon .'<span class="themesmonsters-cat-span">';
                    if ( $category->parent ) {
                        $thelist .= get_category_parents( $category->parent, false, $separator );
                    }
                    $thelist .= "$category->name</span></a>";
                    break;
                case '':
                default:
                    $thelist .= '<a '.$category_3.' href="' . $category_link . '" ' . $rel . '>'. $category_icon .'<span class="themesmonsters-cat-span">' . $category->name . '</span></a>';
            }
            ++$i;
        }
    }

    return apply_filters( 'the_category', $thelist, $separator, $parents );

}



add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <div class="counter gutenblog-counter-cart">
        <span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    </div>

    <?php $fragments['div.counter.gutenblog-counter-cart'] = ob_get_clean();

    return $fragments;

} );

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <div class="gutenblog-mini-cart">
        <?php woocommerce_mini_cart(); ?>
    </div>

    <?php $fragments['div.gutenblog-mini-cart'] = ob_get_clean();

    return $fragments;

} );

function gutenblog_header_logo_img(){
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = wp_get_attachment_image(
            $custom_logo_id, 'full', false, array(
                'class'    => 'gutenblog-custom-logo',
            )
        );

    return $html;
}


function gutenblog_add_logo_nav_menu_objects( $sorted_menu_items, $args ) {
    if(gutenblog_get_option('gutenblog_section_header_select') == 'header-3'){

        $menu_class = $args->menu_class;
        if($menu_class == "main-header-menu"){
            if ( 'primary' == $args->theme_location
                || 'header' == $args->theme_location) {

            } else {
                return $sorted_menu_items;
            }
        } else {
            return $sorted_menu_items;
        }

        $html_logo = '';

        if(gutenblog_get_option('gutenblog_image_logo_show') == true){
            if ( function_exists( 'get_custom_logo' ) ) {
                $html_logo .= get_custom_logo();
            }
        } else { 
            $gutenblog_text_logo = gutenblog_get_option('gutenblog_text_logo');
            if($gutenblog_text_logo == '') {
                $gutenblog_text_logo = get_bloginfo('name');
            }

            if ( is_front_page() ) {
                $html_logo .= '<h1 class="header-logo-text"><a class="header-logo-text-link" href="'.esc_url(home_url('/')).'">'. esc_html($gutenblog_text_logo) .'</a></h1>';
            } else {
                $html_logo .= '<div class="header-logo-text"><a class="header-logo-text-link" href="'.esc_url(home_url('/')).'">'. esc_html($gutenblog_text_logo) .'</a></div>';
            }
        }

        if( display_header_text() ) {
            $tagline = get_bloginfo('description');
            if($tagline != '') {
                $html_logo .= '<div class="tagline">'.$tagline.'</div>';
            }

        }

        $count_items = 0;
        foreach ($sorted_menu_items as $key => $item) {
            if ($item->menu_item_parent == 0 ) {
                $count_items++;
            }
        }

        $after_insert_logo = intdiv($count_items, 2);

        $new_count_items = 0;
        $new_after_insert_logo = 0;
        foreach ($sorted_menu_items as $key => $item) {
            if ($item->menu_item_parent == 0 ) {
                $new_count_items++;
                if ($after_insert_logo == $new_count_items) {
                    $new_after_insert_logo = $key;
                }
            }
        }

        $fake_li = new stdClass();
        foreach($sorted_menu_items[$new_after_insert_logo] as $key => $obj) {
            $fake_li->$key = $obj;
        }
        array_splice($sorted_menu_items, $new_after_insert_logo, 0, array($fake_li));

        $sorted_menu_items[$new_after_insert_logo]->ID = 999;
        $sorted_menu_items[$new_after_insert_logo]->title = $html_logo;
        $sorted_menu_items[$new_after_insert_logo]->classes[] = 'gutenblog-custom-logo-li';
    }
    return $sorted_menu_items;
}


add_filter( 'wp_nav_menu_objects', 'gutenblog_add_logo_nav_menu_objects', 10, 2 );


function gutenblog_custom_effects(){
    $effect = gutenblog_get_option('gutenblog_cursor_effect');
    if ($effect == 'cursor_circle'){
        wp_enqueue_style('gutenblog-cursor-circle-styles', get_template_directory_uri() . '/parts/CursorCircle/css/cursor-circle-styles.css', false, '1.0', 'all');
        wp_enqueue_script('anime', get_template_directory_uri() . '/parts/CursorCircle/js/anime.min.js', array('jquery'), '1.0');
        wp_enqueue_script('gutenblog-cursor-circle', get_template_directory_uri() . '/parts/CursorCircle/js/cursor-circle-scripts.js', array('jquery'), '1.0');

        get_template_part('/parts/CursorCircle/full-width-cursor-circle');
    } 
}


function gutenblog_echo_preloader(){
    $preloader = gutenblog_get_option('gutenblog_enable_preloader');

    if($preloader != "disable" || gutenblog_get_option('gutenblog_enable_preloader_mob') == true) {

        if($preloader == "default") {
            $preloader_default_color_main = gutenblog_get_option('preloader_default_color_main');
            $preloader_default_color_second = gutenblog_get_option('preloader_default_color_second');
            $preloader_default_colors = "
            <style type='text/css'>
                #intro.shown.loaded .circle{
                    box-shadow: 0px 0px 0px 10000px ".$preloader_default_color_main.";
                }
                #intro .circle{
                    box-shadow: 0px 0px 0px 0 ".$preloader_default_color_main.";
                }
                #intro .background.bg-main{
                    background: ".$preloader_default_color_main.";
                }
                #intro .background.bg-second{
                    background: ".$preloader_default_color_second.";
                }
            </style>";
            echo ''.$preloader_default_colors;
            ?>

            <div id="intro" class="shown">
                <div class="overlay"></div>
                <div class="background bg-second"></div>
                <div class="background bg-main">
                    <div class="logo">
                        <?php
                        $img_url = "";

                        if(gutenblog_get_option('gutenblog_preloader_img')) {
                            $img_url = gutenblog_get_option('gutenblog_preloader_img');
                            if($img_url == "" || $img_url == false){
                                $img_url = gutenblog_get_option('custom_logo');
                            }
                        }
                        if($img_url != "") { ?>
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr('Loading','gutenblog-theme'); ?>...">
                        <?php } else { 
                            $img_id = gutenblog_get_option('custom_logo');
                            $img_url = wp_get_attachment_url( $img_id ); ?>

                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr('Loading','gutenblog-theme'); ?>...">

                        <?php }
                        ?>
                    </div>
                </div>

                <div class="circle"></div>

            </div>

            <?php if(!gutenblog_get_option('gutenblog_enable_preloader_mob') ) { ?>
                <script type="text/javascript">
                    (function ($, root, undefined) {
                        if($(window).width() < 1024){
                            $('#intro').hide();
                        }
                    })(jQuery, this);
                </script>
            <?php } else if(!gutenblog_get_option('gutenblog_enable_preloader')) { ?>
                <script type="text/javascript">
                    (function ($, root, undefined) {
                        if($(window).width() >= 1024){
                            $('#intro').hide();
                        }
                    })(jQuery, this);
                </script>
            <?php }

        } 

    }
}

function gutenblog_menu_after_walker( $args ) {
    return array_merge( $args, array(
        'theme_location'  => 'header',
        'container'       => false,
        'fallback_cb'     => '__return_false',
        'items_wrap'      => '<ul id="%1$s" class="desktop-menu navbar-nav %2$s">%3$s</ul>',
        'depth'           => 10,
        'after'           => '<a href="javascript:void(0)" onclick="" class="submenu-btn"></a>',
    ) );
}
add_filter( 'wp_nav_menu_args', 'gutenblog_menu_after_walker' );

function gutenblog_archive_title( $title ) {
    if( is_home() && get_option('page_for_posts') ) {
        if(isset(get_page( get_option('page_for_posts') )->post_title) 
            && !empty(get_page( get_option('page_for_posts') )->post_title)){
            $title = get_page( get_option('page_for_posts') )->post_title;
        } else {
            $title = gutenblog_get_option('gutenblog_blog_feed_label');
            $title = esc_html($title);
        }
    }
    else if( is_home() ) {
        $title = gutenblog_get_option('gutenblog_blog_feed_label');
        $title = esc_html($title);
    }
    else if ( is_search() ) {
        $title = esc_html__('Search Results: ', 'gutenblog-theme') . get_search_query();
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'gutenblog_archive_title' );

function gutenblog_fadeout_effect(){
    $gutenblog_fadeout_effect_enable = gutenblog_get_option('gutenblog_fadeout_effect_enable');
    if($gutenblog_fadeout_effect_enable){ ?>
        <div class="fadeout-preloader"></div>
    <?php }
}

function gutenblog_get_body_classes($classes){
    $styles = $classes;

    $get_nicescroll = gutenblog_get_option('gutenblog_nice_scroll_enable');
    $gutenblog_dropdown_submenu_on_hover = gutenblog_get_option('gutenblog_dropdown_submenu_on_hover');
    $gutenblog_section_menu_design_select = gutenblog_get_option('gutenblog_section_menu_design_select');
    $gutenblog_section_appearance_border_radius_select = gutenblog_get_option('gutenblog_section_appearance_border_radius_select');
    $gutenblog_section_blog_feed_effects_select = gutenblog_get_option('gutenblog_section_blog_feed_effects_select');
    $gutenblog_container_layout = gutenblog_get_option('gutenblog_container_layout');
    $gutenblog_cursor_effect = gutenblog_get_option('gutenblog_cursor_effect');
    $gutenblog_blog_feed_description_show = gutenblog_get_option('gutenblog_blog_feed_description_show');
    $gutenblog_section_header_button_design_select = gutenblog_get_option('gutenblog_section_header_button_design_select');
    $gutenblog_blog_slider_design_select = gutenblog_get_option('gutenblog_blog_slider_design_select');
    $gutenblog_setting_sidebar_design = gutenblog_get_option('gutenblog_setting_sidebar_design');
    $gutenblog_setting_sidebar_title_design = gutenblog_get_option('gutenblog_setting_sidebar_title_design');
    $gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
    $gutenblog_setting_blog_category_design = gutenblog_get_option('gutenblog_setting_blog_category_design');
    $gutenblog_section_frontpage_blog_feed_custom_color = gutenblog_get_option('gutenblog_section_frontpage_blog_feed_custom_color');
    $gutenblog_section_featured_posts_custom_color = gutenblog_get_option('gutenblog_section_featured_posts_custom_color');
    $gutenblog_frontpage_large_post_custom_color = gutenblog_get_option('gutenblog_frontpage_large_post_custom_color');
    $gutenblog_section_featured_categories_custom_color = gutenblog_get_option( 'gutenblog_section_featured_categories_custom_color' );
    $gutenblog_section_frontpage_footer_posts_slider_custom_color = gutenblog_get_option( 'gutenblog_section_frontpage_footer_posts_slider_custom_color' );
    $gutenblog_frontpage_footer_posts_slider_design_select = gutenblog_get_option( 'gutenblog_frontpage_footer_posts_slider_design_select' );
    $gutenblog_section_frontpage_banner_custom_color = gutenblog_get_option( 'gutenblog_section_frontpage_banner_custom_color' );
    $gutenblog_section_frontpage_promotion_banner_custom_color = gutenblog_get_option( 'gutenblog_section_frontpage_promotion_banner_custom_color' );
    $gutenblog_section_frontpage_subscribe_form_custom_color = gutenblog_get_option( 'gutenblog_section_frontpage_subscribe_form_custom_color' );
    $gutenblog_posts_single_post_breadcrumbs_show = gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_show' );
    $gutenblog_section_single_post_design_select = gutenblog_get_option( 'gutenblog_section_single_post_design_select' );
    $gutenblog_frontpage_footer_posts_slider_overlay_hover_show = gutenblog_get_option( 'gutenblog_frontpage_footer_posts_slider_overlay_hover_show' );
    $gutenblog_frontpage_footer_posts_slider_overlay_show = gutenblog_get_option( 'gutenblog_frontpage_footer_posts_slider_overlay_show' );
    $gutenblog_section_featured_posts_slider_overlay_show = gutenblog_get_option( 'gutenblog_section_featured_posts_slider_overlay_show' );
    $gutenblog_section_featured_posts_slider_overlay_hover_show = gutenblog_get_option( 'gutenblog_section_featured_posts_slider_overlay_hover_show' );
    $gutenblog_blog_feed_overlay_show = gutenblog_get_option( 'gutenblog_blog_feed_overlay_show' );
    $gutenblog_blog_feed_overlay_hover_show = gutenblog_get_option( 'gutenblog_blog_feed_overlay_hover_show' );
    $gutenblog_section_single_post_overlay_show = gutenblog_get_option( 'gutenblog_section_single_post_overlay_show' );
    $gutenblog_frontpage_posts_slider_overlay_show = gutenblog_get_option( 'gutenblog_frontpage_posts_slider_overlay_show' );
    $gutenblog_frontpage_posts_slider_custom_overlay_show = gutenblog_get_option( 'gutenblog_frontpage_posts_slider_custom_overlay_show' );
    $gutenblog_frontpage_posts_slider_overlay_hover_show = gutenblog_get_option( 'gutenblog_frontpage_posts_slider_overlay_hover_show' );
    $gutenblog_frontpage_posts_slider_custom_overlay_hover_show = gutenblog_get_option( 'gutenblog_frontpage_posts_slider_custom_overlay_hover_show' );
    $gutenblog_section_featured_posts_custom_overlay_show = gutenblog_get_option( 'gutenblog_section_featured_posts_custom_overlay_show' );
    $gutenblog_section_featured_posts_custom_overlay_hover_show = gutenblog_get_option( 'gutenblog_section_featured_posts_custom_overlay_hover_show' );
    $gutenblog_blog_feed_custom_overlay_show = gutenblog_get_option( 'gutenblog_blog_feed_custom_overlay_hover_show' );
    $gutenblog_blog_feed_custom_overlay_hover_show = gutenblog_get_option( 'gutenblog_blog_feed_custom_overlay_hover_show' );


    if(class_exists('Kirki')){
        $styles[] = ' gutenblog-kirki-enabled ';
    } else {
        $styles[] = ' gutenblog-kirki-disabled ';
    }

    if(!isset($gutenblog_section_menu_design_select)
        || empty($gutenblog_section_menu_design_select)
        || !$gutenblog_section_menu_design_select){

        $styles[] = ' menu-design-1 ';
    } else if($gutenblog_section_menu_design_select == 'menu-design-1') {
        $styles[] = ' menu-design-1 ';
    } else if($gutenblog_section_menu_design_select == 'menu-design-2') {
        $styles[] = ' menu-design-2 ';
    } else if($gutenblog_section_menu_design_select == 'menu-design-3') {
        $styles[] = ' menu-design-3 ';
    } else if($gutenblog_section_menu_design_select == 'menu-design-4') {
        $styles[] = ' menu-design-4 ';
    }

    if($gutenblog_dropdown_submenu_on_hover == '1') {
        $styles[] = ' menu-action-hover ';
    }
    if($get_nicescroll == true){
        $styles[] = ' nicescroll ';
    }
    if($gutenblog_section_appearance_border_radius_select == 'rounded') {
        $styles[] = ' border-rounded ';
    } else {
        $styles[] = ' border-square ';
    }
    if($gutenblog_section_blog_feed_effects_select == 'post-hover-effect-3' ) {
        $styles[] = ' post-hover-effect-3 ';
    }
    if($gutenblog_container_layout == "on"){
        $styles[] = ' boxed-layout ';
    }
    if($gutenblog_cursor_effect == "cursor_circle"){
        $styles[] = ' cursor-circle ';
    }
    if($gutenblog_blog_feed_description_show == "hide"){
        $styles[] = ' post-content-hide ';
    }
    if($gutenblog_blog_feed_description_show == "content"){
        $styles[] = ' post-content-content ';
    }
    if($gutenblog_blog_feed_description_show == "excerpt"){
        $styles[] = ' post-content-excerpt ';
    }
    if($gutenblog_section_header_button_design_select == "header-button-design-1"){
        $styles[] = ' header-button-design-1 ';
    }
    if($gutenblog_section_header_button_design_select == "header-button-design-2"){
        $styles[] = ' header-button-design-2 ';
    }
    if($gutenblog_blog_slider_design_select == "slider-design-1"){
        $styles[] = ' slider-design-1 ';
    }
    if($gutenblog_blog_slider_design_select == "slider-design-2"){
        $styles[] = ' slider-design-2 ';
    }
    if($gutenblog_setting_sidebar_design == "sidebar-design-1"){
        $styles[] = ' sidebar-design-1 ';
    }
    if($gutenblog_setting_sidebar_design == "sidebar-design-2"){
        $styles[] = ' sidebar-design-2 ';
    }
    if($gutenblog_setting_sidebar_design == "sidebar-design-3"){
        $styles[] = ' sidebar-design-3 ';
    }
    if($gutenblog_setting_sidebar_title_design == "sidebar-title-design-1"){
        $styles[] = ' sidebar-title-design-1 ';
    }
    if($gutenblog_setting_sidebar_title_design == "sidebar-title-design-2"){
        $styles[] = ' sidebar-title-design-2 ';
    }
    if($gutenblog_setting_sidebar_title_design == "sidebar-title-design-3"){
        $styles[] = ' sidebar-title-design-3 ';
    }
    if($gutenblog_blog_feed_design_select == "post-design-1"){
        $styles[] = ' post-design-1 ';
    }
    if($gutenblog_blog_feed_design_select == "post-design-2"){
        $styles[] = ' post-design-2 ';
    }
    if($gutenblog_blog_feed_design_select == "post-design-3"){
        $styles[] = ' post-design-3 ';
    }
    if($gutenblog_setting_blog_category_design == "category-design-1"){
        $styles[] = ' category-design-1 ';
    }
    if($gutenblog_setting_blog_category_design == "category-design-2"){
        $styles[] = ' category-design-2 ';
    }
    if($gutenblog_setting_blog_category_design == "category-design-3"){
        $styles[] = ' category-design-3 ';
    }
    if($gutenblog_section_frontpage_blog_feed_custom_color == true ){
        $styles[] = ' blog-feed-custom-colors ';
    }
    if($gutenblog_section_featured_posts_custom_color == true ){
        $styles[] = ' featured-posts-custom-colors ';
    }
    if($gutenblog_frontpage_large_post_custom_color == true ){
        $styles[] = ' frontpage-large-post-custom-colors ';
    }
    if($gutenblog_section_featured_categories_custom_color == true ) {
        $styles[] = ' frontpage-categories-custom-colors ';
    }
    if($gutenblog_section_frontpage_footer_posts_slider_custom_color == true ) {
        $styles[] = ' frontpage-footer-posts-slider-custom-colors ';
    }
    if($gutenblog_frontpage_footer_posts_slider_design_select == "footer-slider-design-1" ) {
        $styles[] = ' footer-slider-design-1 ';
    }
    if($gutenblog_frontpage_footer_posts_slider_design_select == "footer-slider-design-2" ) {
        $styles[] = ' footer-slider-design-2 ';
    }
    if($gutenblog_section_frontpage_banner_custom_color == true ) {
        $styles[] = ' frontpage-banner-custom-color ';
    }
    if($gutenblog_section_frontpage_promotion_banner_custom_color == true ) {
        $styles[] = ' frontpage-promo-banner-custom-colors ';
    }
    if($gutenblog_section_frontpage_subscribe_form_custom_color == true ) {
        $styles[] = ' frontpage-subscribe-form-custom-colors ';
    }
    if($gutenblog_posts_single_post_breadcrumbs_show == true ) {
        $styles[] = ' gutenblog-posts-single-post-breadcrumbs-show ';
    }
    if($gutenblog_section_single_post_design_select == "single-post-1" ) {
        $styles[] = ' single-post-1 ';
    }
    if($gutenblog_section_single_post_design_select == "single-post-2" ) {
        $styles[] = ' single-post-2 ';
    }
    if($gutenblog_section_single_post_design_select == "single-post-3" ) {
        $styles[] = ' single-post-3 ';
    }
    if($gutenblog_frontpage_footer_posts_slider_overlay_show == true ) {
        $styles[] = ' footer_posts_slider_overlay_show ';
    }
    if($gutenblog_frontpage_footer_posts_slider_overlay_hover_show == true ) {
        $styles[] = ' footer_posts_slider_overlay_hover_show ';
    }
    if($gutenblog_section_featured_posts_slider_overlay_show == true ) {
        $styles[] = ' featured_posts_slider_overlay_show ';
    }
    if($gutenblog_section_featured_posts_slider_overlay_hover_show == true ) {
        $styles[] = ' featured_posts_slider_overlay_hover_show ';
    }
    if($gutenblog_blog_feed_overlay_show == true ) {
        $styles[] = ' blog_feed_overlay_show ';
    }
    if($gutenblog_blog_feed_overlay_hover_show == true ) {
        $styles[] = ' blog_feed_overlay_hover_show ';
    }
    if($gutenblog_section_single_post_overlay_show == true ) {
        $styles[] = ' single_post_overlay_show ';
    }
    if($gutenblog_frontpage_posts_slider_overlay_show == true ) {
        $styles[] = ' gutenblog_frontpage_posts_slider_overlay_show ';
    }
    if($gutenblog_frontpage_posts_slider_custom_overlay_show == true ) {
        $styles[] = ' gutenblog_frontpage_posts_slider_custom_overlay_show ';
    }
    if($gutenblog_frontpage_posts_slider_overlay_hover_show == true ) {
        $styles[] = ' gutenblog_frontpage_posts_slider_overlay_hover_show ';
    }
    if($gutenblog_frontpage_posts_slider_custom_overlay_hover_show == true ) {
        $styles[] = ' gutenblog_frontpage_posts_slider_custom_overlay_hover_show ';
    }
    if($gutenblog_section_featured_posts_custom_overlay_show == true ) {
        $styles[] = ' gutenblog_section_featured_posts_custom_overlay_show ';
    }
    if($gutenblog_section_featured_posts_custom_overlay_hover_show == true ) {
        $styles[] = ' gutenblog_section_featured_posts_custom_overlay_hover_show ';
    }
    if($gutenblog_blog_feed_custom_overlay_show == true ) {
        $styles[] = ' gutenblog_blog_feed_custom_overlay_show ';
    }
    if($gutenblog_blog_feed_custom_overlay_hover_show == true ) {
        $styles[] = ' gutenblog_blog_feed_custom_overlay_hover_show ';
    }


    return $styles;
}

add_filter( 'body_class','gutenblog_get_body_classes' );


function gutenblog_echo_head_styles_customizer(){ ?>

    <?php
    $gutenblog_button_color_gradient_1 = gutenblog_get_option( 'gutenblog_button_color_gradient_1' );
    $gutenblog_button_color_gradient_2 = gutenblog_get_option( 'gutenblog_button_color_gradient_2' );
    $gutenblog_button_readmore_text_color = gutenblog_get_option( 'gutenblog_button_readmore_text_color' );
    $gutenblog_button_color_gradient_hover_1 = gutenblog_get_option( 'gutenblog_button_color_gradient_hover_1' );
    $gutenblog_button_color_gradient_hover_2 = gutenblog_get_option( 'gutenblog_button_color_gradient_hover_2' );
    $gutenblog_button_readmore_text_hover_color = gutenblog_get_option( 'gutenblog_button_readmore_text_hover_color' );
    $gutenblog_button_readmore_icon_color = gutenblog_get_option( 'gutenblog_button_readmore_icon_color' );
    $gutenblog_button_readmore_icon_hover_color = gutenblog_get_option( 'gutenblog_button_readmore_icon_hover_color' );
    $gutenblog_setting_sorting_bg_colors = gutenblog_get_option( 'gutenblog_setting_sorting_bg_colors' );
    $gutenblog_setting_sorting_active_color = gutenblog_get_option( 'gutenblog_setting_sorting_active_color' );
    $gutenblog_setting_sorting_link_color = gutenblog_get_option( 'gutenblog_setting_sorting_link_color' );
    $gutenblog_setting_sorting_icon_color = gutenblog_get_option( 'gutenblog_setting_sorting_icon_color' );
    $gutenblog_section_featured_categories_custom_color_bgcolor = gutenblog_get_option('gutenblog_section_featured_categories_custom_color_bgcolor');
    $gutenblog_section_featured_categories_heading_custom_color_color = gutenblog_get_option('gutenblog_section_featured_categories_heading_custom_color_color');
    $gutenblog_section_frontpage_banner_custom_color_bgcolor = gutenblog_get_option('gutenblog_section_frontpage_banner_custom_color_bgcolor');
    $gutenblog_section_frontpage_promotion_banner_custom_color_bgcolor = gutenblog_get_option('gutenblog_section_frontpage_promotion_banner_custom_color_bgcolor');
    $gutenblog_section_frontpage_subscribe_form_custom_color_bgcolor = gutenblog_get_option('gutenblog_section_frontpage_subscribe_form_custom_color_bgcolor');
    $gutenblog_section_frontpage_subscribe_form_form_custom_color_bgcolor = gutenblog_get_option('gutenblog_section_frontpage_subscribe_form_form_custom_color_bgcolor');
    $gutenblog_section_frontpage_subscribe_form_heading_custom_color_color = gutenblog_get_option('gutenblog_section_frontpage_subscribe_form_heading_custom_color_color');
    $gutenblog_section_frontpage_subscribe_form_text_custom_color_color = gutenblog_get_option('gutenblog_section_frontpage_subscribe_form_text_custom_color_color');
    $gutenblog_posts_single_post_breadcrumbs_bgcolor = gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_bgcolor' );
    $gutenblog_posts_single_post_breadcrumbs_link_color = gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_link_color' );
    $gutenblog_posts_single_post_breadcrumbs_text_color = gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_text_color' );
    $gutenblog_posts_single_post_breadcrumbs_icon_color = gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_icon_color' );

    $gutenblog_section_blog_main_background_img_setting = gutenblog_get_option('gutenblog_section_blog_main_background_img_setting');

    // $gutenblog_main_background_color = gutenblog_get_option('gutenblog_main_background_color');
    $gutenblog_main_background_color = $gutenblog_section_blog_main_background_img_setting['background-color'];


    $main_color = gutenblog_get_option('gutenblog_setting_primary_colors_main_color');
    $inverse_main_color = gutenblog_get_option('gutenblog_setting_primary_colors_inverse_color');

    $gutenblog_section_featured_posts_padding = gutenblog_get_option('gutenblog_section_featured_posts_padding');


    $btn_read_more_style = "";

    if($gutenblog_button_color_gradient_1 == $gutenblog_button_color_gradient_2){ 
        $btn_read_more_style .= "background: ". esc_attr($gutenblog_button_color_gradient_1) .";";
    } else { 
        $btn_read_more_style .= "background: linear-gradient(to right, ". esc_attr($gutenblog_button_color_gradient_1) ." 30%, ". esc_attr($gutenblog_button_color_gradient_2) ." 100%);";
    } 

    if($gutenblog_button_color_gradient_1 == $gutenblog_button_color_gradient_2){ 
        $btn_read_more_style .= "box-shadow: 0px 18px 22px -20px ". esc_attr($gutenblog_button_color_gradient_1) ." !important;";
    } else {
        $btn_read_more_style .= "box-shadow: 0px 18px 22px -20px linear-gradient(to right, ". esc_attr($gutenblog_button_color_gradient_1) ." 30%, ". esc_attr($gutenblog_button_color_gradient_2) ." 100%) !important;";
    }

    $btn_read_more_before_style = "";

    if($gutenblog_button_color_gradient_hover_1 == $gutenblog_button_color_gradient_hover_2){ 
        $btn_read_more_before_style .= "background: ". esc_attr($gutenblog_button_color_gradient_hover_1) .";";
    } else { 
        $btn_read_more_before_style .= "background: linear-gradient(to right, ". esc_attr($gutenblog_button_color_gradient_hover_1) ." 30%, ". esc_attr($gutenblog_button_color_gradient_hover_2) ." 100%);";
    } 

    $typography_post_title = gutenblog_get_option( 'gutenblog_settings_typography_post_title' );
    $typography_categories_title = gutenblog_get_option('gutenblog_section_blog_feed_typography_categories_title');
    $typography_body_font = gutenblog_get_option('gutenblog_settings_typography_body_font');
    $typography_pre_code = gutenblog_get_option('gutenblog_settings_typography_pre_code');
    $typography_menu = gutenblog_get_option('gutenblog_settings_typography_menu');
    $typography_h1 = gutenblog_get_option('gutenblog_settings_typography_h1');
    $typography_h2 = gutenblog_get_option('gutenblog_settings_typography_h2');
    $typography_h3 = gutenblog_get_option('gutenblog_settings_typography_h3');
    $typography_h4 = gutenblog_get_option('gutenblog_settings_typography_h4');
    $typography_h5 = gutenblog_get_option('gutenblog_settings_typography_h5');
    $typography_h6 = gutenblog_get_option('gutenblog_settings_typography_h6');
    $gutenblog_posts_posts_nav_show_typography = gutenblog_get_option('gutenblog_posts_posts_nav_show_typography');
    $gutenblog_single_post_meta_typography = gutenblog_get_option('gutenblog_single_post_meta_typography');

    $style = '';

    $style .= "

        /* Colors form Gutenberg */
        .has-main-color-color{
            color: ". $main_color .";
        }
        .has-inverse-main-color-color{
            color: ". $inverse_main_color .";
        }

        .has-main-color-background-color{
            background-color: ". $main_color .";
        }
        .has-inverse-main-color-background-color{
            background-color: ". $inverse_main_color .";
        }



        .menu-item a,
        .header .menu-item a {
            color:". gutenblog_get_option( 'gutenblog_section_first_level_menu_link_color' ) ."
        }
        .menu-item a::after,
        .menu-item-has-children > a::before{
            background:". gutenblog_get_option( 'gutenblog_section_first_level_menu_link_color' ) ."
        }
        .menu-item a:hover{
            color:". gutenblog_get_option( 'gutenblog_section_first_level_menu_link_hover_color' ) ."
        }
        .menu-design-1 .navbar-nav > .menu-item a:after,
        .menu-design-3 .header .menu-item::before {
            background:". gutenblog_get_option( 'gutenblog_section_first_level_menu_link_hover_bg_color' ) ."
        }
        .menu-item .menu-item a,
        #on-hidden-menu li a{
            color:". gutenblog_get_option( 'gutenblog_section_submenu_link_color' ) ."
        }
        .menu-item .menu-item a::after,
        .menu-item .menu-item-has-children > a::before,
        .fake-li .menu-item a::after,
        .fake-li .menu-item-has-children > a::before,
        .desktop-menu .menu-item .menu-item a{
            color:". gutenblog_get_option( 'gutenblog_section_submenu_link_color' ) ."
        }
        .menu-item .menu-item a:hover{
            color:". gutenblog_get_option( 'gutenblog_section_submenu_link_hover_color' ) ."
        }
        .stripe-menu .menu-item .menu-item a::before,
        .menu-design-1 .menu-item .menu-item:hover,
        .stripe-menu .fake-li .menu-item a::before {
            background-color:". gutenblog_get_option( 'gutenblog_section_submenu_link_hover_bg_color' ) ."
        }
        .menu-item .menu-item,
        .menu-design-2 .sub-menu,
        #on-hidden-menu.open ul,
        .stripe-menu-bg{
            background-color:". gutenblog_get_option( 'gutenblog_section_submenu_link_bg_color' ) ."
        }
        .menu-design-2 ul.menu > li.menu-item-has-children:before{
            border-color: transparent transparent ". gutenblog_get_option( 'gutenblog_section_submenu_link_bg_color' ) ." transparent!important;
        }
        .stripe-menu-bg::before {
            border-color: transparent transparent ". gutenblog_get_option( 'gutenblog_section_submenu_link_bg_color' ) ." transparent;
        }
        .menu-design-2 .sub-menu:before,
        .fake-li .open ul::before {
            border-color: transparent transparent ". gutenblog_get_option( 'gutenblog_section_submenu_link_bg_color' ) ." transparent;
        }
        .menu-item .menu-item:hover,
        .stripe-menu .stripe-menu-bg-arrow {
            border-color: transparent transparent ". gutenblog_get_option( 'gutenblog_section_submenu_link_bg_color' ) ." transparent;
        }
        .header {
            background-color:". gutenblog_get_option( 'gutenblog_section_header_wrap_bgcolor' ) ."
        }
        .header .header-icon-color {
            color:". gutenblog_get_option( 'gutenblog_section_header_icon_color' ) ."
        }
        .header-button-design-2 .header-icons .header-button-label {
            color:". gutenblog_get_option( 'gutenblog_section_header_label_color' ) ."
        }
        .blog-feed-sort-preloader{
            background-color: ". $gutenblog_main_background_color ."
        }
        .body-background-inner-before-footer{
            background-color: ". $gutenblog_main_background_color ."
        }

        /* ----- Typography Colors ----- */
        ";

        $style .= "
            body, pre,
            a, a:hover, a:visited, a:active, a:focus,
            .wp-block-quote__citation, .wp-block-quote cite, .wp-block-quote footer,
            .wp-block-audio figcaption,
            .wp-block-pullquote,
            .wp-block-pullquote__citation, .wp-block-pullquote cite, .wp-block-pullquote footer,
            .wp-block-image figcaption,
            .wp-block-embed figcaption
            {
                color:". gutenblog_get_option( 'gutenblog_setting_typography_text_color' ) ."
            }
            

            h1, .h1, .wp-block-cover h1 {
                color:". gutenblog_get_option( 'gutenblog_setting_typography_h1_color' ) ."
            }
            h2, .h2, .wp-block-cover h2 {
                color:". gutenblog_get_option( 'gutenblog_setting_typography_h2_color' ) ."
            }
            h3, .h3, .wp-block-cover h3 {
                color:". gutenblog_get_option( 'gutenblog_setting_typography_h3_color' ) ."
            }
            h4, .h4, .wp-block-cover h4 {
                color:". gutenblog_get_option( 'gutenblog_setting_typography_h4_color' ) ."
            }
            h5, .h5, .wp-block-cover h5 {
                color:". gutenblog_get_option( 'gutenblog_setting_typography_h5_color' ) ."
            }
            h6, .h6, .wp-block-cover h6 {
                color:". gutenblog_get_option( 'gutenblog_setting_typography_h6_color' ) ."
            }
            .gutenblog-blog-feed-post .entry-title,
            .widget .entry-title,
            .rpwwt-post-title,
            .widget_socialcountplus .social-count-plus .count,
            .widget .product-title {
                font-family:".$typography_post_title['font-family'].";
                font-weight:".$typography_post_title['variant'].";
                font-size:".$typography_post_title['font-size'].";
                line-height:".$typography_post_title['line-height'].";
                letter-spacing:".$typography_post_title['letter-spacing'].";
                text-transform:".$typography_post_title['text-transform'].";
                text-align: ".$typography_post_title['text-align'].";
            }
            body, code, kbd, pre, samp{
                font-family:".$typography_body_font['font-family'].";
                font-weight:".$typography_body_font['variant'].";
                font-size:".$typography_body_font['font-size'].";
                line-height:".$typography_body_font['line-height'].";
                letter-spacing:".$typography_body_font['letter-spacing'].";
                text-transform:".$typography_body_font['text-transform'].";
                text-align: ".$typography_body_font['text-align'].";
            }
            pre.wp-block-preformatted{
            	font-family:".$typography_pre_code['font-family'].";
                font-weight:".$typography_pre_code['variant'].";
                font-size:".$typography_pre_code['font-size'].";
                line-height:".$typography_pre_code['line-height'].";
                letter-spacing:".$typography_pre_code['letter-spacing'].";
                text-transform:".$typography_pre_code['text-transform'].";
                text-align: ".$typography_pre_code['text-align'].";
            	
            }
            .menu-item,  .header-icons .header-button-label{
                font-family:".$typography_menu['font-family'].";
                font-weight:".$typography_menu['variant'].";
                font-size:".$typography_menu['font-size'].";
                line-height:".$typography_menu['line-height'].";
                letter-spacing:".$typography_menu['letter-spacing'].";
                text-transform:".$typography_menu['text-transform'].";
                text-align: ".$typography_menu['text-align'].";
            }
            .themesmonsters-cat-span{
                font-family:".$typography_categories_title['font-family'].";
                font-weight:".$typography_categories_title['variant'].";
                font-size:".$typography_categories_title['font-size'].";
                line-height:".$typography_categories_title['line-height'].";
                letter-spacing:".$typography_categories_title['letter-spacing'].";
                text-transform:".$typography_categories_title['text-transform'].";
                text-align: ".$typography_categories_title['text-align'].";
            }

            h1,
            body.single .single-post-full-width-title-wrap h1.entry-title,
            body.single .single-content-wrap h1.entry-titledd{
                font-family:".$typography_h1['font-family'].";
                font-weight:".$typography_h1['variant'].";
                font-size:".$typography_h1['font-size'].";
                line-height:".$typography_h1['line-height'].";
                letter-spacing:".$typography_h1['letter-spacing'].";
                text-transform:".$typography_h1['text-transform'].";
                text-align: ".$typography_h1['text-align'].";
            }
            h2 {
                font-family:".$typography_h2['font-family'].";
                font-weight:".$typography_h2['variant'].";
                font-size:".$typography_h2['font-size'].";
                line-height:".$typography_h2['line-height'].";
                letter-spacing:".$typography_h2['letter-spacing'].";
                text-transform:".$typography_h2['text-transform'].";
                text-align: ".$typography_h2['text-align'].";
            }
            h3{
                font-family:".$typography_h3['font-family'].";
                font-weight:".$typography_h3['variant'].";
                font-size:".$typography_h3['font-size'].";
                line-height:".$typography_h3['line-height'].";
                letter-spacing:".$typography_h3['letter-spacing'].";
                text-transform:".$typography_h3['text-transform'].";
                text-align: ".$typography_h3['text-align'].";
            }
            h4{
                font-family:".$typography_h4['font-family'].";
                font-weight:".$typography_h4['variant'].";
                font-size:".$typography_h4['font-size'].";
                line-height:".$typography_h4['line-height'].";
                letter-spacing:".$typography_h4['letter-spacing'].";
                text-transform:".$typography_h4['text-transform'].";
                text-align: ".$typography_h4['text-align'].";
            }
            h5,
            .comments .comment-reply-title,
            .comment-title,
            .woocommerce .comment-reply-title,
            .woocommerce div.product .woocommerce-tabs .panel h2,
            .cart_totals h2,
            .woocommerce-billing-fields h3,
            #order_review_heading {
                font-family:".$typography_h5['font-family'].";
                font-weight:".$typography_h5['variant'].";
                font-size:".$typography_h5['font-size'].";
                line-height:".$typography_h5['line-height'].";
                letter-spacing:".$typography_h5['letter-spacing'].";
                text-transform:".$typography_h5['text-transform'].";
                text-align: ".$typography_h5['text-align'].";
            }
            h6,
            .related.products h2,
            .woocommerce ul.products li.product .woocommerce-loop-product__title,
             #wp-calendar caption {
                font-family:".$typography_h6['font-family'].";
                font-weight:".$typography_h6['variant'].";
                font-size:".$typography_h6['font-size'].";
                line-height:".$typography_h6['line-height'].";
                letter-spacing:".$typography_h6['letter-spacing'].";
                text-transform:".$typography_h6['text-transform'].";
                text-align: ".$typography_h6['text-align'].";
            }
            .pagination-post-title,
            .pagination-post-label {
                font-family:".$gutenblog_posts_posts_nav_show_typography['font-family'].";
                font-weight:".$gutenblog_posts_posts_nav_show_typography['variant'].";
                font-size:".$gutenblog_posts_posts_nav_show_typography['font-size'].";
                line-height:".$gutenblog_posts_posts_nav_show_typography['line-height'].";
                letter-spacing:".$gutenblog_posts_posts_nav_show_typography['letter-spacing'].";
                text-transform:".$gutenblog_posts_posts_nav_show_typography['text-transform'].";
            }
            .entry-meta-wrapper,
            .entry-meta-wrapper .entry-category .themesmonsters-cat-span,
            .entry-meta-wrapper .thumbnail-date span,
            .single-post-wrap .comments-numbers,
            .single-post-wrap .views-label {
                font-family:".$gutenblog_single_post_meta_typography['font-family'].";
                font-weight:".$gutenblog_single_post_meta_typography['variant'].";
                font-size:".$gutenblog_single_post_meta_typography['font-size'].";
                letter-spacing:".$gutenblog_single_post_meta_typography['letter-spacing'].";
                text-transform:".$gutenblog_single_post_meta_typography['text-transform'].";
            }



        ";

        $style .= "

        /* ----- Main Colors ----- */


        .post-categories li a::before,
        .user-wrap::before,
        .post-label,
        .header-button-design-2 .cart-wrap::before,
        .header-button-design-2 .header-menu-toggle-wrap::before,
        .header-button-design-2 .header-search-toggle-wrap::before,
        .themesmonsters-recent-posts-li::before,
        .entry-meta-author-content::before,
        .sidebar-title-design-3 .widget h5::after {
            background-color: ". gutenblog_get_option( 'gutenblog_setting_primary_colors_main_color' ) .";
        }

        .post-categories li a {
            color: ". gutenblog_get_option( 'gutenblog_setting_primary_colors_main_color' ) .";
        }

        .overlay-thumb {
            background: ". gutenblog_get_option( 'gutenblog_setting_first_overlay_color' ) .";
        }
        .overlay-thumb::after {
            background: linear-gradient(45deg, ". gutenblog_get_option( 'gutenblog_setting_second_overlay_color' ) ." 0%,rgba(0,0,0,0) 50%);
        }
        .overlay-thumb2 {
            background: ". gutenblog_get_option( 'gutenblog_setting_first_overlay_hover_color' ) .";
        }
        .overlay-thumb2::after {
            background: linear-gradient(45deg, ". gutenblog_get_option( 'gutenblog_setting_second_overlay_hover_color' ) ." 0%,rgba(0,0,0,0) 50%);
        }


        .error404 .body-background-inner-before-footer,
        .error404 .error404-left {
            background: ". gutenblog_get_option( 'gutenblog_setting_404_page_bgcolor' ) .";
        }
        .error404 .error404-left {
            color: ". gutenblog_get_option( 'gutenblog_setting_404_page_text_color' ) .";
        }

        .error404-left span a {
            color: ". gutenblog_get_option( 'gutenblog_setting_404_page_link_color' ) .";
        }


        .gutenblog_frontpage_posts_slider_custom_overlay_show .frontpage-posts-slider-large .overlay-thumb {
            background: ". gutenblog_get_option( 'gutenblog_frontpage_posts_slider_custom_overlay_color_first' ) .";
        }
        .gutenblog_frontpage_posts_slider_custom_overlay_show .frontpage-posts-slider-large .overlay-thumb::after {
            background: linear-gradient(45deg, ". gutenblog_get_option( 'gutenblog_frontpage_posts_slider_custom_overlay_color_second' ) ." 0%,rgba(0,0,0,0) 50%);
        }
        .gutenblog_frontpage_posts_slider_custom_overlay_hover_show .frontpage-posts-slider-large .overlay-thumb2 {
            background: ". gutenblog_get_option( 'gutenblog_frontpage_posts_slider_custom_overlay_hover_color_first' ) .";
        }
        .gutenblog_frontpage_posts_slider_custom_overlay_hover_show .frontpage-posts-slider-large .overlay-thumb2::after {
            background: linear-gradient(45deg, ". gutenblog_get_option( 'gutenblog_frontpage_posts_slider_custom_overlay_hover_color_second' ) ." 0%,rgba(0,0,0,0) 50%);
        }


        .gutenblog_section_featured_posts_custom_overlay_show .frontpage-featured-posts .overlay-thumb {
            background: ". gutenblog_get_option( 'gutenblog_section_featured_posts_custom_overlay_color_first' ) .";
        }
        .gutenblog_section_featured_posts_custom_overlay_show .frontpage-featured-posts .overlay-thumb::after {
            background: linear-gradient(45deg, ". gutenblog_get_option( 'gutenblog_section_featured_posts_custom_overlay_color_second' ) ." 0%,rgba(0,0,0,0) 50%);
        }
        .gutenblog_section_featured_posts_custom_overlay_hover_show .frontpage-featured-posts .overlay-thumb2 {
            background: ". gutenblog_get_option( 'gutenblog_section_featured_posts_custom_overlay_hover_color_first' ) .";
        }
        .gutenblog_section_featured_posts_custom_overlay_hover_show .frontpage-featured-posts .overlay-thumb2::after {
            background: linear-gradient(45deg, ". gutenblog_get_option( 'gutenblog_section_featured_posts_custom_overlay_hover_color_second' ) ." 0%,rgba(0,0,0,0) 50%);
        }


        .gutenblog_blog_feed_custom_overlay_show .gutenblog-blog-feed .overlay-thumb {
            background: ". gutenblog_get_option( 'gutenblog_blog_feed_custom_overlay_color_first' ) .";
        }
        .gutenblog_blog_feed_custom_overlay_show .gutenblog-blog-feed .overlay-thumb::after {
            background: linear-gradient(45deg, ". gutenblog_get_option( 'gutenblog_blog_feed_custom_overlay_color_second' ) ." 0%,rgba(0,0,0,0) 50%);
        }
        .gutenblog_blog_feed_custom_overlay_hover_show .gutenblog-blog-feed .overlay-thumb2 {
            background: ". gutenblog_get_option( 'gutenblog_blog_feed_custom_overlay_hover_color_first' ) .";
        }
        .gutenblog_blog_feed_custom_overlay_hover_show .gutenblog-blog-feed .overlay-thumb2::after {
            background: linear-gradient(45deg, ". gutenblog_get_option( 'gutenblog_blog_feed_custom_overlay_hover_color_second' ) ." 0%,rgba(0,0,0,0) 50%);
        }

        /* ----- Inverse Colors ----- */

        .user-wrap::before,
        .post-label,
        body:not(.cursor-circle) .frontpage-slider-large .owl-nav div::before,
        .themesmonsters-recent-posts-li::before {
            color: ". gutenblog_get_option( 'gutenblog_setting_primary_colors_inverse_color' ) .";
        }


        .post-label::before {
            border-color: ". gutenblog_get_option( 'gutenblog_setting_primary_colors_main_color' ) ." transparent transparent transparent;
        }

        /* ----- Featured posts ------ */


        .frontpage-featured-posts {
            background-color: ". gutenblog_get_option( 'gutenblog_section_featured_posts_custom_color_bgcolor' ) .";
        }
        .frontpage-featured-posts h5 span{
            color: ". gutenblog_get_option( 'gutenblog_section_featured_posts_heading_custom_color_color' ) .";
        }
        .frontpage-featured-posts .entry-title a{
            color: ". gutenblog_get_option( 'gutenblog_section_featured_posts_post_title_custom_color_color' ) .";
        }
        .frontpage-featured-posts .entry-title a:hover,
        .frontpage-featured-posts .featured-post-inner:hover .entry-title a{
            color: ". gutenblog_get_option( 'gutenblog_section_featured_posts_post_title_hover_custom_color_color' ) .";
        }
        .frontpage-featured-posts .entry-summary {
            color: ". gutenblog_get_option( 'gutenblog_section_featured_posts_post_description_custom_color_color' ) .";
        }
        .frontpage-featured-posts .themesmonsters-cat-span {
            color: ". gutenblog_get_option( 'gutenblog_section_featured_posts_post_category_custom_color_color' ) .";
        }


        /* ----- Subscribe Form ------ */


        .nf-form-cont,
        .mc4wp-form {
            background-color: ". gutenblog_get_option( 'gutenblog_section_subscribe_form_colors' ) .";
        }
        .nf-form-cont,
        .mc4wp-form {
          background-image: url(". gutenblog_get_option( 'gutenblog_section_subscribe_form_background_image_colors' ) .");
        }



        /* ----- Pagination ------ */

        .pagination-blog-feed a {
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_arrows_text_color' ) .";
        }
        .pagination-blog-feed a:after {
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_arrows_icon_color' ) .";
        }
        a.gutenblog-page-numbers {
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_numbers_text_color' ) .";
        }
        a.gutenblog-page-numbers {
            background-color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_numbers_bgcolor' ) .";
        }
        span.gutenblog-page-numbers {
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_numbers_current_text_color' ) .";
        }
        span.gutenblog-page-numbers {
            background-color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_numbers_current_bgcolor' ) .";
        }
        .gutenblog_loadmore {
            background-color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_load_more_bgcolor' ) .";
        }
        .gutenblog_loadmore {
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_load_more_color' ) .";
        }
        .gutenblog-loadmore-text::after {
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_pagination_load_more_icon_color' ) .";
        }


        /* ----- Blog feed ------ */

        .blog-feed.gutenblog-blog-feed h5,
        .frontpage-featured-posts h5 {
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_heading_color' ) .";
        }
        .blog-feed.gutenblog-blog-feed .entry-title a{
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_title_color' ) .";
        }
        .blog-feed.gutenblog-blog-feed .entry-title a:hover,
        .frontpage-featured-posts .entry-title a:hover{
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_title_hover_color' ) .";
        }
        .blog-feed.gutenblog-blog-feed .entry-summary,
        .frontpage-featured-posts .entry-summary {
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_description_color' ) .";
        }
        .blog-feed.gutenblog-blog-feed .entry-content .content-entry-wrap .entry-meta-on-thumb.entry-meta-visible,
        .frontpage-featured-posts .entry-content .content-entry-wrap .entry-meta-on-thumb.entry-meta-visible {
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_entry_meta_color' ) .";
        }

        .blog-feed-custom-colors .blog-feed.gutenblog-blog-feed {
            background-color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_custom_color_bgcolor' ) .";
        }
        .blog-feed-custom-colors .blog-feed.gutenblog-blog-feed h5 {
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_heading_custom_color_color' ) .";
        }
        .blog-feed-custom-colors .blog-feed.gutenblog-blog-feed .entry-title a{
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_title_custom_color_color' ) .";
        }
        .blog-feed-custom-colors .blog-feed.gutenblog-blog-feed .entry-title a:hover{
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_title_hover_custom_color_color' ) .";
        }
        .blog-feed-custom-colors .blog-feed.gutenblog-blog-feed .entry-summary {
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_description_custom_color_color' ) .";
        }
        .blog-feed-custom-colors .entry-content .content-entry-wrap .entry-meta-on-thumb.entry-meta-visible {
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_blog_feed_entry_meta_custom_color_color' ) .";
        }


        /* ----- Large Post Colors ------ */

        .frontpage-large-post-custom-colors .frontpage-large-post-wrap {
            background-color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_custom_color_bgcolor' ) .";
        }
        .frontpage-large-post-custom-colors .post-label {
            background-color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_label_custom_color_bgcolor' ) .";
        }
        .frontpage-large-post-custom-colors .post-label {
            color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_label_custom_color_color' ) .";
        }
        .frontpage-large-post-custom-colors .post-label::before {
            border-color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_label_custom_color_bgcolor' ) ." transparent transparent transparent;
        }
        .frontpage-large-post-custom-colors .frontpage-large-post {
            background-color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_container_custom_color_bgcolor' ) .";
        }
        .frontpage-large-post-custom-colors .frontpage-large-post .overlay-thumb::before {
            background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, ". gutenblog_get_option( 'gutenblog_frontpage_large_post_container_custom_color_bgcolor' ) ." 90%);
        }
        .frontpage-large-post-custom-colors .frontpage-large-post-wrap .entry-title a {
            color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_post_title_custom_color_color' ) .";
        }
        .frontpage-large-post-custom-colors .frontpage-large-post .themesmonsters-cat-span {
            color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_post_category_custom_color_color' ) .";
        }
        .frontpage-large-post-custom-colors .frontpage-large-post .entry-summary {
            color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_post_description_custom_color_color' ) .";
        }
        .frontpage-large-post-custom-colors .frontpage-large-post-wrap .entry-meta-on-content-single {
            color: ". gutenblog_get_option( 'gutenblog_frontpage_large_post_post_entry_meta_custom_color_color' ) .";
        }

        /* ----- Single post Colors ------ */

        .pagination-post .previous_post a .pagination-post-wrap,
        .pagination-post .next_post a .pagination-post-wrap {
            background-color: ". gutenblog_get_option( 'gutenblog_posts_posts_nav_show_bgcolor' ) .";
        }
        .next_post .pagination-post-wrap::before {
            border-color: transparent transparent transparent ". gutenblog_get_option( 'gutenblog_posts_posts_nav_show_bgcolor' ) .";
        }
        .previous_post .pagination-post-wrap::before {
            border-color: transparent ". gutenblog_get_option( 'gutenblog_posts_posts_nav_show_bgcolor' ) ." transparent transparent;

        }
        .pagination-post-title,
        .pagination-post-label {
            color: ". gutenblog_get_option( 'gutenblog_posts_posts_nav_show_link_color' ) .";
        }
        .pagination-post .previous_post a::before,
        .pagination-post .next_post a::after {
            color: ". gutenblog_get_option( 'gutenblog_posts_posts_nav_show_arrow_color' ) .";
        }
        .single-post .single-post-breadcrumbs {
            background-color: ". gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_bgcolor' ) .";
            color: ". gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_text_color' ) .";
        }
        .single-post .single-post-breadcrumbs .gutenblog_breadcrumbs a{
            color: ". gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_link_color' ) .";
        }
        .single-post .single-post-breadcrumbs .gutenblog_breadcrumbs > span:first-child::before,
        .single-post .single-post-breadcrumbs .breadcumbs-sep  {
            color: ". gutenblog_get_option( 'gutenblog_posts_single_post_breadcrumbs_icon_color' ) .";
        }

        /* ----- Categories Colors ------ */

        .frontpage-categories-custom-colors .frontpage-featured-categories {
            background-color: ". gutenblog_get_option( 'gutenblog_section_featured_categories_custom_color_bgcolor' ) .";
        }
        .frontpage-categories-custom-colors .frontpage-featured-categories h5 {
            color: ". gutenblog_get_option( 'gutenblog_section_featured_categories_heading_custom_color_color' ) .";
        }

        /* ----- Footer Post Slider ------ */

        .frontpage-footer-posts-slider-custom-colors .frontpage-slider {
            background-color: ". gutenblog_get_option( 'gutenblog_section_frontpage_footer_posts_slider_custom_color_bgcolor' ) .";
        }

        /* ----- Promotion Banner ------ */

        .frontpage-promo-banner-custom-colors .frontpage-promo-banner {
            background-color: ". gutenblog_get_option( 'gutenblog_section_frontpage_promotion_banner_custom_color_bgcolor' ) .";
        }

        /* ----- Subscribe Form ------ */

        .frontpage-subscribe-form-custom-colors .frontpage-subscribe-form {
            background-color: ". gutenblog_get_option( 'gutenblog_section_frontpage_subscribe_form_custom_color_bgcolor' ) .";
        }
        .frontpage-subscribe-form-custom-colors .frontpage-subscribe-form #mc_embed_signup {
            background-color: ". gutenblog_get_option( 'gutenblog_section_frontpage_subscribe_form_form_custom_color_bgcolor' ) .";
        }
        .frontpage-subscribe-form-custom-colors .frontpage-subscribe-form #mc_embed_signup_scroll label {
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_subscribe_form_heading_custom_color_color' ) .";
        }
        .frontpage-subscribe-form-custom-colors .frontpage-subscribe-form #mc_embed_signup {
            color: ". gutenblog_get_option( 'gutenblog_section_frontpage_subscribe_form_text_custom_color_color' ) .";
        }

        /* ----- Rating Colors ------ */

        .rating-button-minus,
        .rating-button-plus{
            background-color: ". gutenblog_get_option( 'gutenblog_blog_feed_likes_or_rating_buttons_bgcolor' ) .";
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_likes_or_rating_buttons_color' ) .";
        }
        .rating-button-minus:hover,
        .rating-button-plus:hover,
        .rating-button-minus.rating-button-already-minus,
        .rating-button-plus.rating-button-already-plus {
            background-color: ". gutenblog_get_option( 'gutenblog_blog_feed_likes_or_rating_buttons_hover_bgcolor' ) .";
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_likes_or_rating_buttons_hover_color' ) .";
        }

        .rating-button-count {
            background-color: ". gutenblog_get_option( 'gutenblog_blog_feed_likes_or_rating_counter_bgcolor' ) .";
            color: ". gutenblog_get_option( 'gutenblog_blog_feed_likes_or_rating_counter_color' ) .";
        }


        /* ----- Footer Colors ------ */

        .footer {
            background-color: ". gutenblog_get_option( 'gutenblog_setting_footer_bgcolor' ) .";
        }
        .footer {
            color: ". gutenblog_get_option( 'gutenblog_setting_footer_text_color' ) .";
        }



        .btn-read-more span{
            color: ". gutenblog_get_option( 'gutenblog_button_readmore_text_color' ) .";
        }


        .btn-read-more{
            ".$btn_read_more_style."
        }

        .btn-read-more:before{
            ".$btn_read_more_before_style."
        }

        .link span {
            color: ". esc_attr($gutenblog_button_readmore_text_color) .";
        }
        .link:hover span {
            color: ". esc_attr($gutenblog_button_readmore_text_hover_color) .";
        }

        .link--arrowed .arrow-icon {
            stroke: ". esc_attr($gutenblog_button_readmore_icon_color) .";
        }
        .link--arrowed:hover .arrow-icon {
            stroke: ". esc_attr($gutenblog_button_readmore_icon_hover_color) .";
        }

        

        .lavalamp-object,
        .woocommerce div.product .woocommerce-tabs ul.tabs.lavalamp-wrap li.lavalamp-object {
            background: ". esc_attr($gutenblog_setting_sorting_bg_colors) .";
        }
        .blog-feed-sort-option.active span,
        .sort-wrapper li.blog-feed-sort-option.active::before,
        .themesmonsters-tab.active a,
        .themesmonsters-tab:hover a,
        .blog-feed-sort-option span:hover:active {
            color: ". esc_attr($gutenblog_setting_sorting_active_color) .";
        }

        .woocommerce div.product .woocommerce-tabs ul.tabs.lavalamp-wrap li.active a{
            color: ". esc_attr($gutenblog_setting_sorting_active_color) .";
        }

        .blog-feed-sort-option span,
        .blog-feed-sort-option.active-leave span,
        .lavalamp-wrap li.active.active-leave span,
        .lavalamp-wrap li.active.active-leave a,
        .sort-wrapper li.blog-feed-sort-option.active.active-leave:before,
        .sort-wrapper li.blog-feed-sort-option-link.active.active-leave:before{
            color: ". esc_attr($gutenblog_setting_sorting_link_color) .";
        }

        .woocommerce div.product .woocommerce-tabs ul.tabs.lavalamp-wrap li a,
        .woocommerce div.product .woocommerce-tabs ul.tabs.lavalamp-wrap li.active.active-leave a{
            color: ". esc_attr($gutenblog_setting_sorting_link_color) .";
        }

        .blog-feed-sort-option:nth-child(1)::before,
        .blog-feed-sort-option-link:nth-child(1)::before,
        .blog-feed-sort-option:nth-child(2)::before,
        .blog-feed-sort-option-link:nth-child(2)::before,
        .blog-feed-sort-option:nth-child(3)::before,
        .blog-feed-sort-option-link:nth-child(3)::before,
        .blog-feed-sort-option:nth-child(4)::before,
        .blog-feed-sort-option-link:nth-child(4)::before,
        .blog-feed-sort-option.active-leave:before,
        .lavalamp-wrap li.active.active-leave:before,
        .sort-wrapper li.blog-feed-sort-option.active.active-leave:before {
            color: ". esc_attr($gutenblog_setting_sorting_icon_color) .";
        }
        
        .frontpage-banner-custom-color .frontpage-banner{
            background-color: ". esc_attr($gutenblog_section_frontpage_banner_custom_color_bgcolor) .";
        }

        .frontpage-featured-posts-design .frontpage-featured-post{
            padding: ".esc_attr($gutenblog_section_featured_posts_padding)."px;
        }
        .frontpage-featured-posts .content-entry-wrap{
            height: calc(100% - ".esc_attr($gutenblog_section_featured_posts_padding)."px - ".esc_attr($gutenblog_section_featured_posts_padding)."px);
            width: calc(100% - ".esc_attr($gutenblog_section_featured_posts_padding)."px - ".esc_attr($gutenblog_section_featured_posts_padding)."px);
            top: ".esc_attr($gutenblog_section_featured_posts_padding)."px;
        }



        @media (max-width:767px) {
            .frontpage-featured-posts .content-entry-wrap.ffp-no-thumb{
                width: 100%;
                height: 100%;
            }
            
            .mobile-menu .menu-item a,
            .mobile-menu .menu-item a:hover{
                color:". gutenblog_get_option( 'gutenblog_mobile_first_level_menu_link_color' ) ."
            }
            .mobile-menu .menu-item a{
                background-color:". gutenblog_get_option( 'gutenblog_mobile_first_level_menu_link_bg_color' ) ."
            }
            .mobile-menu .menu-item .menu-item a{
                color:". gutenblog_get_option( 'gutenblog_mobile_second_level_menu_link_color' ) ."
            }
            .mobile-header-wrap{
                background-color:". gutenblog_get_option( 'gutenblog_mobile_wrap_bgcolor' ) ."
            }
            .mobile-header-wrap .navbar-toggler{
                color:". gutenblog_get_option( 'gutenblog_mobile_menu_icon_color' ) ."
            }
            .mobile-menu .menu-item .menu-item a{
                background-color:". gutenblog_get_option( 'gutenblog_mobile_second_level_menu_link_bg_color' ) ."
            }
        } ";


    wp_add_inline_style( 'gutenblog-style', $style );
    
}

add_action( 'wp_enqueue_scripts', 'gutenblog_echo_head_styles_customizer', 200 );

function gutenblog_new_order_get($name){
    $query = $_GET;

    $query['order'] = $name;
    $order_result = http_build_query($query);
    $order_result = '?'.$order_result;

    $new_link = wp_guess_url() . '/' .$order_result;

    return $new_link;
}

function loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'loop_columns', 999);

function gutenblog_background_img_link(){
    $gutenblog_section_blog_main_background_img_link = gutenblog_get_option('gutenblog_section_blog_main_background_img_link');
    $gutenblog_section_blog_main_background_img_setting = gutenblog_get_option('gutenblog_section_blog_main_background_img_setting');
    $gutenblog_container_layout = gutenblog_get_option('gutenblog_container_layout');

    if($gutenblog_section_blog_main_background_img_link != ""
        && $gutenblog_container_layout == true
        && !empty($gutenblog_section_blog_main_background_img_setting['background-image'])
        && isset($gutenblog_section_blog_main_background_img_setting['background-image'])){ ?>

        <a class="body-background-fake-link" href="<?php echo esc_url($gutenblog_section_blog_main_background_img_link); ?>" target="_blank">
            <div class="body-background-fake-block"></div>
        </a>
    <?php }
}

if ( ! function_exists( 'gutenblog_custom_css_banner_overlay' ) ) {
    function gutenblog_custom_css_banner_overlay(){
        global $gutenblog_defaults;
        $gutenblog_frontpage_banner_overlay_color = gutenblog_get_option('gutenblog_frontpage_banner_overlay_color');
        $gutenblog_frontpage_banner_overlay_show = gutenblog_get_option('gutenblog_frontpage_banner_overlay_show');
        $gutenblog_frontpage_banner_link_images = gutenblog_get_option('gutenblog_frontpage_banner_link_images');
        if($gutenblog_frontpage_banner_overlay_show == 0 || $gutenblog_frontpage_banner_link_images == 1){
            echo "<style>";
            echo ".frontpage-banner:before, .frontpage-slider-large .owl-carousel-item:before{content:none;}";
            echo "</style>";
        } else if($gutenblog_frontpage_banner_overlay_color != $gutenblog_defaults['gutenblog_frontpage_banner_overlay_color']) {
            echo "<style>";
            echo ".frontpage-banner:before, .frontpage-slider-large .slider-overlay, .frontpage-slider-large .owl-carousel-item:before{background-color:".esc_attr($gutenblog_frontpage_banner_overlay_color).";}";
            echo "</style>";
        }
    }
}
add_action('wp_head','gutenblog_custom_css_banner_overlay', 98);

if ( ! function_exists( 'gutenblog_custom_css_footer_posts_slider_overlay' ) ) {
    function gutenblog_custom_css_footer_posts_slider_overlay(){
        global $gutenblog_defaults;
        $gutenblog_frontpage_footer_posts_slider_overlay_color = gutenblog_get_option('gutenblog_frontpage_footer_posts_slider_overlay_color');
        $gutenblog_frontpage_footer_posts_slider_overlay_show = gutenblog_get_option('gutenblog_frontpage_footer_posts_slider_overlay_show');

        if($gutenblog_frontpage_footer_posts_slider_overlay_show == 0 ){
            echo "<style>";
            echo ".frontpage-slider .owl-carousel-item:before{content:none;}";
            echo "</style>";
        } else if($gutenblog_frontpage_footer_posts_slider_overlay_color) {
            echo "<style>";
            echo ".frontpage-slider .slider-overlay, .frontpage-slider .owl-carousel-item:before{background-color:".esc_attr($gutenblog_frontpage_footer_posts_slider_overlay_color).";}";
            echo "</style>";
        }
    }
}
add_action('wp_head','gutenblog_custom_css_footer_posts_slider_overlay', 98);





function gutenblog_author_info_box($content) {
    $gutenblog_single_post_about_author_show = gutenblog_get_option('gutenblog_single_post_about_author_show');
    if($gutenblog_single_post_about_author_show == true){

        global $post;

        if (is_single() && isset($post->post_author) && get_post_type() != "product") {

            $display_name = get_the_author_meta('display_name', $post->post_author);

            if (empty($display_name)){
                $display_name = get_the_author_meta('nickname', $post->post_author);
            }
            $user_description = get_the_author_meta('user_description', $post->post_author);

            $user_website = get_the_author_meta('url', $post->post_author);

            $user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));

            if (!empty($display_name)){
                $author_details = '<h5>About ' . $display_name . '</h5>';
            }

            if (!empty($user_description)){
                $author_details .= '<div class="author_details"><span class="author-avatar">' . get_avatar(get_the_author_meta('user_email'), 90) . '</span><span class="author-description">' . nl2br($user_description) . '</span></div>';
            }

            $author_details .= '<p class="author_links"><a href="' . $user_posts . '">View all posts by ' . $display_name . '</a>';
            if (!empty($user_website)) {
                $author_details .= ' <a href="' . $user_website . '" target="_blank" rel="nofollow">Website</a></p>';
            } else {
                $author_details .= '</p>';
            }

            $content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
        }

    }

    return $content;

}

add_action('the_content', 'gutenblog_author_info_box');




function gutenblog_breadcrumbs( $sep = '  ', $l10n = array(), $args = array() ){
    $kb = new gutenblog_Breadcrumbs;
    echo wp_kses( $kb->get_crumbs( $sep, $l10n, $args ) ,'default' );
}

class gutenblog_Breadcrumbs {
    public $arg;
    static $l10n = array(
        'home'       => 'Home',
        'paged'      => 'Page %d',
        '_404'       => 'Not found 404',
        'search'     => 'Searching results: <b>%s</b>',
        'author'     => 'Author archive: <b>%s</b>',
        'year'       => 'Archive <b>%d</b> year',
        'month'      => 'Archive: <b>%s</b>',
        'day'        => '',
        'attachment' => 'Media: %s',
        'tag'        => 'Tags: <b>%s</b>',
        'tax_tag'    => '%1$s from "%2$s" to tags: <b>%3$s</b>',
    );
    static $args = array(
        'on_front_page'   => false,
        'show_post_title' => true,
        'show_term_title' => true,
        'title_patt'      => '<span class="breadcumbs-title">%s</span>',
        'last_sep'        => true,
        'markup'          => 'schema.org',
        'priority_tax'    => array('category'),
        'priority_terms'  => array(),
        'nofollow' => false,

        'sep'             => '',
        'linkpatt'        => '',
        'pg_end'          => '',
    );
    function get_crumbs( $sep, $l10n, $args ){
        global $post, $wp_query, $wp_post_types;
        self::$args['sep'] = $sep;

        $loc = (object) array_merge( apply_filters('gutenblog_breadcrumbs_default_loc', self::$l10n ), $l10n );
        $arg = (object) array_merge( apply_filters('gutenblog_breadcrumbs_default_args', self::$args ), $args );
        $arg->sep = '<span class="breadcumbs-sep">'. $arg->sep .'</span>';

        $sep = & $arg->sep;
        $this->arg = & $arg;

        if(1){
            $mark = & $arg->markup;

            if( ! $mark ) $mark = array(
                'wrappatt'  => '<div class="gutenblog_breadcrumbs">%s</div>',
                'linkpatt'  => '<a href="%s">%s</a>',
                'sep_after' => '',
            );
            elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
                'wrappatt'   => '<div class="gutenblog_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
                'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
                'sep_after'  => '</span>',
            );
            elseif( $mark === 'schema.org' ) $mark = array(
                'wrappatt'   => '<div class="gutenblog_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
                'linkpatt'   => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
                'sep_after'  => '',
            );
            elseif( ! is_array($mark) )
                die( __CLASS__ .': "markup" parameter must be array...');
            $wrappatt  = $mark['wrappatt'];
            $arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
            $arg->sep      .= $mark['sep_after']."\n";
        }
        $linkpatt = $arg->linkpatt;
        $q_obj = get_queried_object();

        $ptype = null;
        if( empty($post) ){
            if( isset($q_obj->taxonomy) )
                $ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
        }
        else $ptype = & $wp_post_types[ $post->post_type ];

        $arg->pg_end = '';
        if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
            $arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );
        $pg_end = $arg->pg_end;

        $out = '';
        if( is_front_page() ){
            return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
        }
        elseif( is_home() ) {
            $out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
        }
        elseif( is_404() ){
            $out = $loc->_404;
        }
        elseif( is_search() ){
            $out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
        }
        elseif( is_author() ){
            $tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
            $out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
        }
        elseif( is_year() || is_month() || is_day() ){
            $y_url  = get_year_link( $year = get_the_time('Y') );
            if( is_year() ){
                $tit = sprintf( $loc->year, $year );
                $out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
            }
            else {
                $y_link = sprintf( $linkpatt, $y_url, $year);
                $m_url  = get_month_link( $year, get_the_time('m') );
                if( is_month() ){
                    $tit = sprintf( $loc->month, get_the_time('F') );
                    $out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
                }
                elseif( is_day() ){
                    $m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
                    $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
                }
            }
        }

        elseif( is_singular() && $ptype->hierarchical ){
            $out = $this->_add_title( $this->_page_crumbs($post), $post );
        }

        else {
            $term = $q_obj;

            if( is_singular() ){

                if( is_attachment() && $post->post_parent ){
                    $save_post = $post;
                    $post = get_post($post->post_parent);
                }

                $taxonomies = get_object_taxonomies( $post->post_type );

                $taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );
                if( $taxonomies ){
                    if( ! empty($arg->priority_tax) ){
                        usort( $taxonomies, function($a,$b)use($arg){
                            $a_index = array_search($a, $arg->priority_tax);
                            if( $a_index === false ) $a_index = 9999999;
                            $b_index = array_search($b, $arg->priority_tax);
                            if( $b_index === false ) $b_index = 9999999;
                            return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 );
                        } );
                    }

                    foreach( $taxonomies as $taxname ){
                        if( $terms = get_the_terms( $post->ID, $taxname ) ){
                            $prior_terms = & $arg->priority_terms[ $taxname ];
                            if( $prior_terms && count($terms) > 2 ){
                                foreach( (array) $prior_terms as $term_id ){
                                    $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                                    $_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );
                                    if( $_terms ){
                                        $term = array_shift( $_terms );
                                        break;
                                    }
                                }
                            }
                            else
                                $term = array_shift( $terms );
                            break;
                        }
                    }
                }
                if( isset($save_post) ) $post = $save_post;
            }
            if( $term && isset($term->term_id) ){
                $term = apply_filters('gutenblog_breadcrumbs_term', $term );

                if( is_attachment() ){
                    if( ! $post->post_parent )
                        $out = sprintf( $loc->attachment, esc_html($post->post_title) );
                    else {
                        if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
                            $_crumbs    = $this->_tax_crumbs( $term, 'self' );
                            $parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
                            $_out = implode( $sep, array($_crumbs, $parent_tit) );
                            $out = $this->_add_title( $_out, $post );
                        }
                    }
                }

                elseif( is_single() ){
                    if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
                        $_crumbs = $this->_tax_crumbs( $term, 'self' );
                        $out = $this->_add_title( $_crumbs, $post );
                    }
                }
                elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
                    if( is_tag() )
                        $out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
                    elseif( is_tax() ){
                        $post_label = $ptype->labels->name;
                        $tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
                        $out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
                    }
                }
                else {
                    if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
                        $_crumbs = $this->_tax_crumbs( $term, 'parent' );
                        $out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );
                    }
                }
            }
            elseif( is_attachment() ){
                $parent = get_post($post->post_parent);
                $parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
                $_out = $parent_link;
                if( is_post_type_hierarchical($parent->post_type) ){
                    $parent_crumbs = $this->_page_crumbs($parent);
                    $_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
                }
                $out = $this->_add_title( $_out, $post );
            }
            elseif( is_singular() ){
                $out = $this->_add_title( '', $post );
            }
        }
        $home_after = apply_filters('gutenblog_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );
        if( '' === $home_after ){
            if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
                && ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
            ){
                $pt_title = $ptype->labels->name;
                if( is_post_type_archive() && ! $paged_num )
                    $home_after = $pt_title;
                else{
                    $home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );
                    $home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep );
                }
            }
        }
        $before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );
        $out = apply_filters('gutenblog_breadcrumbs_pre_out', $out, $sep, $loc, $arg );
        $out = sprintf( $wrappatt, $before_out . $out );
        return apply_filters('gutenblog_breadcrumbs', $out, $sep, $loc, $arg );
    }
    function _page_crumbs( $post ){
        $parent = $post->post_parent;
        $crumbs = array();
        while( $parent ){
            $page = get_post( $parent );
            $crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
            $parent = $page->post_parent;
        }
        return implode( $this->arg->sep, array_reverse($crumbs) );
    }
    function _tax_crumbs( $term, $start_from = 'self' ){
        $termlinks = array();
        $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
        while( $term_id ){
            $term       = get_term( $term_id, $term->taxonomy );
            $termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
            $term_id    = $term->parent;
        }
        if( $termlinks )
            return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
        return '';
    }
    function _add_title( $add_to, $obj, $term_title = '' ){
        $arg = & $this->arg;
        $title = $term_title ? $term_title : esc_html($obj->post_title);
        $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;
        if( $arg->pg_end ){
            $link = $term_title ? get_term_link($obj) : get_permalink($obj);
            $add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
        }
        elseif( $add_to ){
            if( $show_title )
                $add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
            elseif( $arg->last_sep )
                $add_to .= $arg->sep;
        }
        elseif( $show_title )
            $add_to = sprintf( $arg->title_patt, $title );
        return $add_to;
    }
}


function gutenblog_loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'loop_columns', 999);


