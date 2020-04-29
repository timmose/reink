<?php

/**
 * Carrino functions and definitions
 *
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.3.7
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function carrino_theme_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'carrino', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// ========================================================
	// Custom Image Sizes for this theme
	// ========================================================

	// Hero
	add_image_size( 'carrino-hero-image', 1600, 680, true );

	// Single Uncropped (the default single image)
	add_image_size( 'carrino-single-uncropped-image', 1250, 9999, false );

	// Single landscape
	add_image_size( 'carrino-single-landscape-image', 1250, 834, true );

	// Single portrait
	add_image_size( 'carrino-single-portrait-image', 1250, 1875, true );

	// Single square
	add_image_size( 'carrino-single-square-image', 1250, 1250, true );

	// Archive landscape
	add_image_size( 'carrino-landscape-image', 900, 600, true );

	// Archive portrait
	add_image_size( 'carrino-portrait-image', 600, 900, true );

	// Archive square
	add_image_size( 'carrino-square-image', 600, 600, true );

	// This theme uses wp_nav_menu() in two locations.
	// Primary is optionally duplicated in the slide out menu
	register_nav_menus( array(
		'primary'    => esc_html__( 'Primary Menu', 'carrino' ),
		'slide-menu-primary'    => esc_html__( 'Toggle Sidebar Primary Menu', 'carrino' ),
		'footer'     => esc_html__( 'Footer Menu', 'carrino'),
	) );
		register_nav_menus( array(
		'split-menu-left'    => esc_html__( 'Split Menu Left Items', 'carrino' ),
		'split-menu-right'    => esc_html__( 'Split Menu Right Items', 'carrino' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'search',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'video',
		'gallery',
		'audio',
		'image',
	) );

	// Add theme support for Custom Logo.
	add_theme_support('custom-logo');

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for custom background
	add_theme_support('custom-background');

	// Jetpack Infinite scroll
	add_theme_support( 'infinite-scroll', array(
	    'container' => 'primary',
	    'render' => 'carrino_infinite_scroll_render',
	    'wrapper' => false,
	    'type' => 'click',
	) );

	// GUTENBERG
	add_theme_support( 'align-wide' );

	// WooCommerce
	add_theme_support( 'woocommerce', array(
        'product_grid'          => array(
            'default_columns' => 3,
            'min_columns'     => 1,
            'max_columns'     => 3,
        ),
	) );

}

add_action( 'after_setup_theme', 'carrino_theme_setup' );

// Jetpack Infinite scroll render function
function carrino_infinite_scroll_render() {
    while (have_posts()) {
        the_post();
        get_template_part('template-parts/post/content', get_post_format());
    }
}

// ========================================================
// Set content width
// ========================================================

if ( ! isset( $content_width ) ) {
	$content_width = 1250; // container width minus padding
}

// ========================================================
// Register Widget areas
// ========================================================

function carrino_widgets_init() {
	// Slide Out Left Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Slide Out Sidebar', 'carrino' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your slide out sidebar on all pages', 'carrino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// Static sidebar 
	register_sidebar( array(
		'name'          => esc_html__( 'Static Sidebar', 'carrino' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your static sidebar on all pages', 'carrino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// Instagram Footer
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top', 'carrino' ),
		'id'            => 'footer-top',
		'description'   => esc_html__( 'Add your Instagram Widget here', 'carrino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// Footer Column 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'carrino' ),
		'id'            => 'footer-column-1',
		'description'   => esc_html__( 'Add widgets here to appear in your footer column on all pages', 'carrino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// Footer Column 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'carrino' ),
		'id'            => 'footer-column-2',
		'description'   => esc_html__( 'Add widgets here to appear in your footer column on all pages', 'carrino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// Footer Column 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'carrino' ),
		'id'            => 'footer-column-3',
		'description'   => esc_html__( 'Add widgets here to appear in your footer column on all pages', 'carrino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer Bottom Column
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom', 'carrino' ),
		'id'            => 'footer-bottom',
		'description'   => esc_html__( 'Add widgets here to appear in your footer bottom on all pages', 'carrino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'carrino_widgets_init' );

// ========================================================
// Enqueue Google Fonts
// ========================================================

if ( ! function_exists( 'carrino_fonts_url' ) ) {

	function carrino_fonts_url( $font ) {

		$fonts_url = '';
		 
		 /*
	    Translators: If there are characters in your language that are not supported
	    by chosen font(s), translate this to 'off'. Do not translate into your own language.
	     */
	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'carrino' ) ) {
	    	if ($font === 'poppins') {
		        $fonts_url = add_query_arg( 'family', 'Poppins:400,500,600,700,700i,800,800i', "https://fonts.googleapis.com/css" );
		    }
	    }
		 
		return esc_url_raw( $fonts_url );

	}

}

// ========================================================
// Enqueue scripts and styles
// ========================================================

if ( ! function_exists( 'carrino_scripts' ) ) {

	function carrino_scripts() {
		
		// CSS
		wp_enqueue_style('fontello', get_template_directory_uri() . '/css/fontello/css/fontello.css', array(), null );
		wp_enqueue_style( 'carrino-google-font-poppins', carrino_fonts_url('poppins'), array(), null );
		wp_enqueue_style('carrino-reset', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0', 'all');
		wp_enqueue_style('carrino-style', get_template_directory_uri() . '/style.css', array(), '1.4.3', 'all');
		wp_style_add_data( 'carrino-style', 'rtl', 'replace' );
		// Gutenberg
		if ( get_bloginfo( 'version' ) < 5 && function_exists( 'the_gutenberg_project' ) || get_bloginfo( 'version' ) >= 5 ) {
			wp_enqueue_style('carrino-gutenberg', get_template_directory_uri() . '/css/gutenberg.css', array(), '1.0.0', 'all');
		}
		// Load WP Masonry
		if ( is_home() && get_theme_mod( 'carrino_homepage_layout', 'masonry' ) === 'masonry' || ( ( is_archive() || is_search() ) && ! carrino_woocommerce_active( 'archive' ) && ! carrino_woocommerce_active( ) ) && have_posts() && get_theme_mod( 'archive_post_layout', 'masonry' ) === 'masonry' )  {
			wp_enqueue_script( 'masonry');
			wp_enqueue_script( 'carrino-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array(), null, true);
		}
		// Carrino Main JS
		wp_enqueue_script( 'carrino-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', false);

		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
}
add_action( 'wp_enqueue_scripts', 'carrino_scripts' );

// ========================================================
// Enqueue Gutenberg Editor scripts and styles
// ========================================================
function carrino_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	 wp_enqueue_style('fontello', get_template_directory_uri() . '/css/fontello/css/fontello.css', array(), null );
	 wp_enqueue_style( 'carrino-gutenberg-editor', get_template_directory_uri() . '/css/gutenberg-editor-style.css', false, '1.0.0', 'all' );
	 wp_enqueue_style( 'carrino-google-font-poppins', carrino_fonts_url('poppins'), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'carrino_gutenberg_styles' );

// ========================================================
// Custom classes added to body class array
// ========================================================

if ( ! function_exists( 'carrino_body_classes' ) ) {

	function carrino_body_classes( $classes ) {

		// Add class to the body if single hero post style
		if ( ( is_single( ) || is_page() ) && strpos(carrino_post_class(), 'hero' ) ) {
			$classes[] = 'has-hero';
		}
		if ( ( is_single( ) && ! carrino_woocommerce_active( 'product' ) && get_theme_mod( 'carrino_single_sidebar', false ) || is_home() && get_theme_mod( 'carrino_homepage_sidebar', true ) || ( is_archive() || is_search() ) && ! carrino_woocommerce_active( 'archive' ) && get_theme_mod( 'carrino_archive_sidebar', true ) || is_page() && ! carrino_woocommerce_active( 'page' ) && get_theme_mod( 'carrino_page_sidebar', true ) ) && is_active_sidebar( 'sidebar-2' ) || carrino_woocommerce_active() && get_theme_mod( 'carrino_shop_sidebar', true ) || carrino_woocommerce_active( 'page' ) && get_theme_mod( 'carrino_shop_checkout_sidebar', false ) || carrino_woocommerce_active( 'archive' ) && get_theme_mod( 'carrino_shop_category_sidebar', true ) || carrino_woocommerce_active( 'product' ) && get_theme_mod( 'carrino_shop_product_sidebar', true ) ) {
			$classes[] = 'has-sidebar';
		}
		if ( get_theme_mod( 'carrino_sticky_nav', false ) ) {
			$classes[] = 'has-sticky-nav';
		}
		if ( '' !== get_theme_mod( 'header_background_color', '' ) ) {
			$classes[] = 'has-custom-header';
		}
		return $classes;
	}

}
add_filter( 'body_class', 'carrino_body_classes' );

// ========================================================
// Generate the custom logo or title if none exists
// Additionally Filter the logo output for improved validation
// ========================================================

if ( ! function_exists( 'carrino_logo' ) ) {

	function carrino_logo( ) {

	    $custom_logo_id = get_theme_mod( 'custom_logo' );
	    $logo = '';
	    $mobile_only = ( get_theme_mod( 'carrino_header_layout', 'default' ) === 'logo-split-menu' ? ' mobile-only' : '' );

	    if ( get_theme_mod( 'custom_logo' ) ) { 

		    // We have a custom logo geneate our own output to strip the size attributes
		    $logo = '<img src="' . esc_url( wp_get_attachment_url( $custom_logo_id ) ) . '" alt="' . get_bloginfo( 'name' ) . '" class="custom-logo" />';

	    } else {

	    	// No logo lets output the blog name
	    	$logo = get_bloginfo( 'name' );

	    }

	    // The filtered output
	    $html = '';

	    // Image flex wrapper
	    if ( get_theme_mod( 'custom_logo' ) ) {
	    	$html = '<div class="logo-wrapper' . esc_attr( $mobile_only ) . '">';
	    } 

	    $html .= sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
	            esc_url( home_url( '/' ) ),
	            $logo
	        );

	    // Close image flex wrapper
	    if ( get_theme_mod( 'custom_logo' ) ) {
	    	$html .= '</div>';
	    }

	    return $html;   
	}

}

add_filter( 'get_custom_logo', 'carrino_logo' );

// ========================================================
// Prepend/Append primary nav with toggle icons
// ========================================================

if ( ! function_exists( 'carrino_primary_nav_icons' ) ) {

	function carrino_primary_nav_icons($items, $args) {
	 
		if ( $args->menu_id == 'primary-nav' ) {

	        $search_toggle = '';
	        $menu_toggle = '';

			// The mobile only slide menu toggle icon
			if ( get_theme_mod( 'carrino_toggle_menu', true ) && get_theme_mod( 'carrino_header_layout' ) !== 'logo-center-icons' &&
				 ( is_active_sidebar( 'sidebar-1' ) || ( has_nav_menu( 'slide-menu-primary') && get_theme_mod( 'carrino_sidebar_primary_nav', false ) ) ||
				 ( has_nav_menu( 'primary' ) && get_theme_mod( 'carrino_sidebar_primary_nav', false ) ) ) ) {
		        $menu_toggle = '<li class="toggle toggle-menu alignleft"><span><i class="icon-menu-1"></i></span><span class="screen-reader-text">' . esc_html__( 'Menu', 'carrino' ) . '</span></li>';
		    }
		    if ( get_theme_mod( 'carrino_toggle_search', true ) && get_theme_mod( 'carrino_header_layout' ) !== 'logo-center-icons' ) {
		        $search_toggle = '<li class="toggle toggle-search alignright"><span><i class="icon-search"></i></span><span class="screen-reader-text">' . esc_html__( 'Search', 'carrino' ) . '</span></li>';
		    }

		    $newmenu = $menu_toggle . $items . $search_toggle;

	   		return $newmenu;
	 
	    } else {
	 
	        // For all other menus
	        return $items;

	    }
	 
	}

}
 
add_filter('wp_nav_menu_items', 'carrino_primary_nav_icons', 10, 2);

// ========================================================
// Output the related category links in post meta
// ========================================================
/**
 * This function only exists to handle Many category EDGE case
 * We use it for archive (not single) loops
 */

if ( ! function_exists( 'carrino_get_category' ) ) {

	function carrino_get_category() {

		global $post;

		$category = get_the_category($post->id);

		$count = 0;

		echo '<ul class="post-categories">';

		foreach($category as $the_category) {

			$count++;

			echo '<li><a href="' . get_category_link( $the_category->cat_ID ) . '">' . $the_category->cat_name . '</a></li>';

			if ( $count === 2 ) {

				break; // Simply break after the second loop

			}

		}

		echo '</ul>';

	}

}

// ========================================================
// Additional custom post_class classes
// ========================================================

if ( ! function_exists( 'carrino_post_class' ) ) {

	function carrino_post_class() {

		global $post;
		global $_wp_additional_image_sizes;

		$post_class = 'flex-box'; // Always set the flex-box class
		if ( is_single() ) {
			$post_class = 'flex-box single-post';
		}
		if ( is_page() ) {
			$post_class = 'flex-box single-page';
		}

		// Post thumbnail class
		$thumbnail_class = '';
		if ( ( is_archive() || is_search() ) && ! get_theme_mod( 'carrino_archive_post_thumbnail', true ) ||
		is_home() && ! get_theme_mod( 'carrino_homepage_post_thumbnail', true ) ||
		is_single() && ! has_post_format( 'video ') && ! has_post_format( 'audio' ) && function_exists('threeforty_custom_meta_box') && get_post_meta( get_the_ID(), 'threeforty_disable_featured_media', true ) )  {
		$thumbnail_class = ' disabled-post-thumbnail';
		}

		// Post style
		$post_style = ( ( is_archive() || is_search() ) ? get_theme_mod( 'carrino_archive_loop_style', 'default' ) : get_theme_mod( 'carrino_homepage_loop_style', 'default' ) );

		// Override post style for single and page
		if ( is_single() ) {
			if ( function_exists('threeforty_custom_meta_box') && get_post_meta( get_the_ID(), 'threeforty_single_post_style', true ) && get_post_meta( get_the_ID(), 'threeforty_single_post_style', true ) !== 'global' ) {
				$post_style = get_post_meta( get_the_ID(), 'threeforty_single_post_style', true );
			} else {
				$post_style = get_theme_mod( 'carrino_single_post_style', 'default' );
			}
			if ( '' === get_the_post_thumbnail( ) && $post_style !== 'default' || 
				 '' !== $thumbnail_class || 
				 has_post_format( 'video' ) && $post_style === 'cover' || 
				 has_post_format( 'audio' ) && $post_style === 'cover' ) {
					$post_style = 'default';
				}

		}
		if ( is_page() ) {
			$post_style = get_theme_mod( 'carrino_page_style', 'default' );
			if ( '' === get_the_post_thumbnail( ) && $post_style !== 'default' ) {
					$post_style = 'default';
				}
		}

		// Image format archive
		if ( ! is_single() && has_post_format( 'image' ) ) {
			$post_style = 'cover';
		}

		return $post_class . $thumbnail_class . ' ' . $post_style;

	}

}

// ========================================================
// Modify excerpt length
// ========================================================

if ( ! function_exists( 'carrino_excerpt_length' ) ) {

	function carrino_excerpt_length( $length ) {

			return get_theme_mod( 'carrino_excerpt_length', 30 );

	}

}

add_filter( 'excerpt_length', 'carrino_excerpt_length' );

// ========================================================
// Modify Excerpt more
// ========================================================

if ( ! function_exists( 'carrino_excerpt_more' ) ) {

	function carrino_excerpt_more( $more ) {

	return '...';

	}

}

add_filter( 'excerpt_more', 'carrino_excerpt_more' );

// ========================================================
// Toggle entry-meta displays
// ========================================================

/**
 * This funciton handles meta data displays
 */

if ( ! function_exists( 'carrino_toggle_entry_meta' ) ) {

	function carrino_toggle_entry_meta( $meta_data = '' ) {

		$show_meta = true;

		// Before title meta
		if ( $meta_data == 'before_title_meta' ) {

			if ( ( is_home() &&
	               ! get_theme_mod( 'carrino_homepage_entry_meta_category', true ) ) ||
	               // Archive
	               ( ( is_archive() || is_search() ) &&
	               ! get_theme_mod( 'carrino_archive_entry_meta_category', true ) ) ||
	               is_single() && ! get_theme_mod( 'carrino_single_entry_meta_category', true ) ) {

				$show_meta = false;

			}

		}

		// Category
		if ( $meta_data == 'category' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'carrino_homepage_entry_meta_category', true ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'carrino_archive_entry_meta_category', true ) ) ||
				   is_single() && ! get_theme_mod( 'carrino_single_entry_meta_category', true ) ) {

				$show_meta = false;

			}

		}

		// After title meta
		if ( $meta_data == 'after_title_meta' ) {

			if ( ( is_home() && 
			       ! get_theme_mod( 'carrino_homepage_entry_meta_date', true ) &&
			       ( function_exists('threeforty_read_time') && ! get_theme_mod( 'carrino_homepage_entry_meta_read_time', false ) ) &&
 				   ! get_theme_mod( 'carrino_homepage_entry_meta_comment_count', true ) && 
 				   ! get_theme_mod( 'carrino_homepage_entry_meta_author_avatar', false ) &&
 				   ! get_theme_mod( 'carrino_homepage_entry_meta_author', true ) ) ||
 				   // Archive
 				   ( ( is_archive() || is_search() ) && 
			       ! get_theme_mod( 'carrino_archive_entry_meta_date', true ) && 
			       ( function_exists('threeforty_read_time') && ! get_theme_mod( 'carrino_archive_entry_meta_read_time', false ) ) &&
 				   ! get_theme_mod( 'carrino_archive_entry_meta_comment_count', true ) && 
 				   ! get_theme_mod( 'carrino_archive_entry_meta_author_avatar', false ) &&
 				   ! get_theme_mod( 'carrino_archive_entry_meta_author', true ) ) || 
 					// Single
 				   ( ( is_single() ) && 
			       ! get_theme_mod( 'carrino_single_entry_meta_date', true ) && 
			       ( function_exists('threeforty_read_time') && ! get_theme_mod( 'carrino_single_entry_meta_read_time', false ) ) &&
 				   ! get_theme_mod( 'carrino_single_entry_meta_comment_count', true ) && 
 				   ! get_theme_mod( 'carrino_single_entry_meta_author_avatar', false ) &&
 				   ! get_theme_mod( 'carrino_single_entry_meta_author', true ) ) ) {

				$show_meta = false;

			}

		}


		// Author
		if ( $meta_data == 'author' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'carrino_homepage_entry_meta_author', true ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'carrino_archive_entry_meta_author', true ) ) ||
				   ( is_single() && 
				   ! get_theme_mod( 'carrino_single_entry_meta_author', true ) ) ) {

				$show_meta = false;

			}

		}

		// Author avatar
		if ( $meta_data == 'author_avatar' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'carrino_homepage_entry_meta_author_avatar', false ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'carrino_archive_entry_meta_author_avatar', false ) ) ||
				   ( is_single() && 
				   ! get_theme_mod( 'carrino_single_entry_meta_author_avatar', false ) ) ) {

				$show_meta = false;

			}

		}

		// Date
		if ( $meta_data == 'date' ) {

			if ( ( is_home() && 
			       ! get_theme_mod( 'carrino_homepage_entry_meta_date', true ) ) ||
			       // Archive
			       ( ( is_archive() || is_search() ) && ! get_theme_mod( 'carrino_archive_entry_meta_date', true ) ) ||
			       // Single
			       ( is_single() && ! get_theme_mod( 'carrino_single_entry_meta_date', true ) ) ) {

				$show_meta = false;

			}

		}

		// Read time
		if ( $meta_data == 'read_time' ) {

			if ( ( is_home() && function_exists('threeforty_read_time') &&
				   ! get_theme_mod( 'carrino_homepage_entry_meta_read_time', false ) ) || 
				   ( ( is_archive() || is_search() ) && function_exists('threeforty_read_time') &&
				   ! get_theme_mod( 'carrino_archive_entry_meta_read_time', false ) ) || 
				   ( is_single()  && function_exists('threeforty_read_time') &&
				   ! get_theme_mod( 'carrino_single_entry_meta_read_time', false ) ) ) {

				$show_meta = false;

			}

		}

		// Comment Count
		if ( $meta_data == 'comment_count' ) {

			if ( ( is_home() && 
			       ! get_theme_mod( 'carrino_homepage_entry_meta_comment_count', true ) ) || 
			       ( ( is_archive() || is_search() ) && 
			       ! get_theme_mod( 'carrino_archive_entry_meta_comment_count', true ) ) ||
			       ( is_single() && 
			       ! get_theme_mod( 'carrino_single_entry_meta_comment_count', true ) ) ) {

				$show_meta = false;

			}

		}

		return $show_meta;

	}

}

// ========================================================
// Video post format
// ========================================================

if ( ! function_exists( 'carrino_featured_video' ) ) {

	function carrino_featured_video() {

		$content = apply_filters( 'the_content', get_the_content() );
		$video = false;

		// Only get video from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		}

		foreach ( $video as $video_html ) {
			return $video_html;
			break; // In case we have more than one video lets break after the first iteration
		}

	}

}

// ========================================================
// audio post format
// ========================================================

if ( ! function_exists( 'carrino_featured_audio' ) ) {

	function carrino_featured_audio() {

		$content = apply_filters( 'the_content', get_the_content() );
		$audio = false;

		// Only get audio from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$audio = get_media_embedded_in_content( $content, array( 'audio', 'object', 'embed', 'iframe' ) );
		}

		foreach ( $audio as $audio_html ) {
			return $audio_html;
			break; // In case we have more than one video lets break after the first iteration
		}

	}

}

// ========================================================
// Wrap video embeds with a generic class
// ========================================================

if ( ! function_exists( 'carrino_wrap_embed_media' ) ) {

	function carrino_wrap_embed_media( $html ) {

		// List of emebeds we want a responsive but auto height orientation

	     if (false !== strpos( $html, 'twitter' ) ||
	     	 false !== strpos( $html, 'facebook') ||
	     	 false !== strpos( $html, 'mixcloud') ) {
	        return '<div class="media-wrapper relaxed">' . $html . '</div>';
	    }
	    else {
	    	// Widescreen responsive format
	        return '<div class="media-wrapper">' . $html . '</div>';
		}
	}

}

add_filter( 'embed_oembed_html', 'carrino_wrap_embed_media' );

// ========================================================
// Close and start new posts flex-grid
// ========================================================

/**
 * A collection of integer variables and maths
 */

if ( ! function_exists( 'carrino_reset_flex_grid' ) ) {

	function carrino_reset_flex_grid( $var ='' ) {

		global $wp_query;

		$plus_archive_in_loop = ( is_archive() && get_theme_mod( 'carrino_archive_title_position', 'header' ) === 'loop' ? 1 : 0 );

		$page_post_count =  $wp_query->posts; // Get a count of the posts on the page

		// Defaut state is false
		$flex_break = false; 
	    $posts_per_page = ( count( $page_post_count ) + $plus_archive_in_loop ); // Actual number of posts on the page + 1 if archive header in loop
	    $post_cols = ( is_home() ? get_theme_mod( 'carrino_homepage_loop_cols', '3' ) : get_theme_mod( 'carrino_archive_loop_cols', 3 )); // Number of post columns
	    $breaknum = floor( $posts_per_page / $post_cols ); // Divide posts per page by number of columns and round down (I.e. 8 posts per page / 3 columns = 2 (2.66 rounded down))
		$breaknum = $breaknum * $post_cols; // Multiply $breaknum by the number of columns to get a value we can use to generate cols_class (I.e. 2 x 3 columns = 6 )
		$cols_class = $posts_per_page - $breaknum; // cols-x class for the new flex-grid
		$flex_wrapper = $posts_per_page - $cols_class + 1; // Get the post count after which we need to close and start a new flex-grid (I.e. if count = 6 start new wrapper from 7)

	    // Check if the number of posts divide evenly across all columns
	    if ( $posts_per_page % $post_cols !== 0 ) {
			$flex_break = true;
	    }

	    if ( $var === 'flex_wrapper' ) {
	    	return $flex_wrapper;
	    } elseif ( $var === 'cols_class' ) {
	    	return $cols_class;
	    } else {
	    	// If JetPack Infinite scroll is active don't run the funtion - return false
	    	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
	    		return false;
	    	} else {
			    return $flex_break;
			}
		}
	}

}

// ========================================================
// Check if is woocommerce page
// ========================================================

if ( ! function_exists( 'carrino_woocommerce_active' ) ) {

function carrino_woocommerce_active( $woo_page ='' ) {

	$is_woo = false;

	if ( class_exists('WooCommerce')) {

		// Shop
		if ( '' === $woo_page && is_shop() ) {
			$is_woo = true;
		}

		// Product page
		if ( $woo_page === 'product' && is_product() ) {
			$is_woo = true;
		}
		// Category/archive
		if ( $woo_page === 'archive' && is_product_category() ) {
			$is_woo = true;
		}
		// Cart/Checkout/Account
		if ( $woo_page === 'page' && ( is_cart() || is_checkout() || is_account_page() ) ) {
			$is_woo = true;
		}

	}

	return $is_woo;
}

}

// ========================================================
// Set offset for homepage loop
// ========================================================

add_action('pre_get_posts', 'carrino_query_offset', 1 );

if ( ! function_exists( 'carrino_query_offset' ) ) {

	function carrino_query_offset(&$query) {

	    //Before anything else, make sure this is the right query...
	    if ( ! $query->is_home() ) {
	        return;
	    }

	    //First, define your desired offset...
	    $offset = get_theme_mod( 'carrino_homepage_loop_offset', 0 );
	    
	    //Next, determine how many posts per page you want (we'll use WordPress's settings)
	    $ppp = get_option('posts_per_page');

	    //Next, detect and handle pagination...
	    if ( $query->is_main_query() ) {
		    if ( $query->is_paged ) {

		        //Manually determine page query offset (offset + current page (minus one) x posts per page)
		        $page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );

		        //Apply adjust page offset
		        $query->set('offset', $page_offset );

		    }
		    else {

		        //This is the first page. Just use the offset...
		        $query->set('offset',$offset);

		    }

		}
	}

}

// ========================================================
// Customizer and core functions
// ========================================================
require get_parent_theme_file_path( '/inc/hooks.php' );
require get_parent_theme_file_path( '/inc/plugin-filters.php' );
require get_parent_theme_file_path( '/inc/customizer.php' );
require get_parent_theme_file_path( '/inc/customizer_colors.php' );
require get_parent_theme_file_path( '/inc/custom_color_scheme.php' );
require get_parent_theme_file_path( '/inc/gutenberg_color_palette.php' );
// Woocommerce
if ( class_exists('WooCommerce')) {
	require get_parent_theme_file_path( '/inc/woocommerce_functions.php' );
	require get_parent_theme_file_path( '/inc/woocommerce_customizer.php' );
}

// ========================================================
// TGM Plugin Activation
// ========================================================
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function carrino_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'ThreeForty Social Plugin', // The plugin name.
			'slug'               => 'threeforty-social-plugin', // The plugin slug (typically the folder name).
			'source'             => 'http://3forty.media/plugins/threeforty-social-plugin.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'ThreeForty Posts Widget', // The plugin name.
			'slug'               => 'threeforty-posts-widget', // The plugin slug (typically the folder name).
			'source'             => 'http://3forty.media/plugins/threeforty-posts-widget.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'ThreeForty Related Posts', // The plugin name.
			'slug'               => 'threeforty-related-posts', // The plugin slug (typically the folder name).
			'source'             => 'http://3forty.media/plugins/threeforty-related-posts.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'ThreeForty Featured Posts', // The plugin name.
			'slug'               => 'threeforty-featured-posts', // The plugin slug (typically the folder name).
			'source'             => 'http://3forty.media/plugins/threeforty-featured-posts.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'ThreeForty Hero', // The plugin name.
			'slug'               => 'threeforty-hero', // The plugin slug (typically the folder name).
			'source'             => 'http://3forty.media/plugins/threeforty-hero.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.2.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'ThreeForty Homepage Post Blocks', // The plugin name.
			'slug'               => 'threeforty-home-blocks', // The plugin slug (typically the folder name).
			'source'             => 'http://3forty.media/plugins/threeforty-home-blocks.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'ThreeForty Theme Boost', // The plugin name.
			'slug'               => 'threeforty-theme-boost', // The plugin slug (typically the folder name).
			'source'             => 'http://3forty.media/plugins/threeforty-theme-boost.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'WP Instagram Widget', // The plugin name.
			'slug'               => 'wp-instagram-widget-master', // The plugin slug (typically the folder name).
			'source'             => 'https://github.com/scottsweb/wp-instagram-widget/archive/master.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '2.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => true,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'MailChimp for WordPress',
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'carrino',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'carrino_register_required_plugins' );



?>