<?php
/**
 * Theme defaults
 *
 *
 */
?>
<?php 

global $gutenblog_defaults;

$gutenblog_defaults['gutenblog_custom_header'] = esc_url( get_template_directory_uri() ) . '/sample/images/header.jpg';
$gutenblog_defaults['gutenblog_footer_design'] = 'default';
$gutenblog_defaults['gutenblog_footer_copyright'] = esc_html__('Copyright &copy; ', 'gutenblog-theme'). date('Y') .' <a href="'.esc_url('http://themesmonsters.com/gutenblog/').'">Gutenblog</a>';
$gutenblog_defaults['gutenblog_footer_credit'] = esc_html__('Theme by ', 'gutenblog-theme') .' <a href="'.esc_url('https://www.ThemesMonsters.com').'">ThemesMonsters.com</a>';
$gutenblog_defaults['gutenblog_footer_logo'] = "";

$gutenblog_defaults['gutenblog_nav_search_icon'] = 1;
$gutenblog_defaults['gutenblog_example_content'] = 0;
$gutenblog_defaults['gutenblog_dropdown_node_enable'] = 0;
$gutenblog_defaults['gutenblog_dropdown_submenu_on_hover'] = 1;

$gutenblog_defaults['gutenblog_social_networks_order'] = array();

$gutenblog_defaults['gutenblog_image_logo_show']                  = true;
$gutenblog_defaults['gutenblog_site_title_show']                  = false;

$gutenblog_defaults['gutenblog_image_logo_width']                  = '500';
$gutenblog_defaults['gutenblog_image_logo_height']                  = '200';

$gutenblog_defaults['gutenblog_logo_width']                  = '500';
$gutenblog_defaults['gutenblog_logo_height']                  = '300';
$gutenblog_defaults['gutenblog_nice_scroll_enable']				= false;
$gutenblog_defaults['gutenblog_fadeout_effect_enable']             = false;
$gutenblog_defaults['gutenblog_default_posts_thumbnail_enable'] = false;

$gutenblog_defaults['gutenblog_expanded_menu_enable']				= true;
$gutenblog_defaults['gutenblog_stripe_menu'] 						= false; 
$gutenblog_defaults['gutenblog_image_logo_in_menu']					= false;
$gutenblog_defaults['gutenblog_section_menu_design_select'] = 'menu-design-1';
$gutenblog_defaults['gutenblog_section_header_button_design_select'] = 'header-button-design-1';
$gutenblog_defaults['gutenblog_section_mobile_menu_design_select'] = 'mobile_menu-design-1';

$gutenblog_defaults['gutenblog_blog_feed_readmore_design'] = "readmore-design-1";
$gutenblog_defaults['gutenblog_button_color_gradient_1'] = "#6547ff";
$gutenblog_defaults['gutenblog_button_color_gradient_2'] = "#6547ff";
$gutenblog_defaults['gutenblog_button_readmore_text_color'] = "#ffffff";
$gutenblog_defaults['gutenblog_button_readmore_text_hover_color'] = "#ffffff";
$gutenblog_defaults['gutenblog_button_readmore_icon_color'] = "#6547ff";
$gutenblog_defaults['gutenblog_button_readmore_icon_hover_color'] = "#ff9900";
$gutenblog_defaults['gutenblog_button_color_gradient_hover_1'] = "#221c24";
$gutenblog_defaults['gutenblog_button_color_gradient_hover_2'] = "#6547ff";

$gutenblog_defaults['gutenblog_setting_sorting_bg_colors'] = "#6547ff";
$gutenblog_defaults['gutenblog_setting_sorting_active_color'] = "#ffffff";
$gutenblog_defaults['gutenblog_setting_sorting_link_color'] = "#999999";
$gutenblog_defaults['gutenblog_setting_sorting_icon_color'] = "#cccccc";
$gutenblog_defaults['gutenblog_setting_sorting_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '14px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);

$gutenblog_defaults['gutenblog_setting_typography_text_color'] = "#555555";
$gutenblog_defaults['gutenblog_setting_typography_h1_color'] = "#000000";
$gutenblog_defaults['gutenblog_setting_typography_h2_color'] = "#000000";
$gutenblog_defaults['gutenblog_setting_typography_h3_color'] = "#000000";
$gutenblog_defaults['gutenblog_setting_typography_h4_color'] = "#000000";
$gutenblog_defaults['gutenblog_setting_typography_h5_color'] = "#000000";
$gutenblog_defaults['gutenblog_setting_typography_h6_color'] = "#000000";




$gutenblog_defaults['gutenblog_setting_sidebar_design'] = "sidebar-design-1";
$gutenblog_defaults['gutenblog_setting_sidebar_title_design'] = "sidebar-title-design-2";
$gutenblog_defaults['gutenblog_section_sidebar_color'] = "#221c24";

$gutenblog_defaults['gutenblog_section_blog_feed_effects_select'] = 'post-hover-effect-2';

$gutenblog_defaults['gutenblog_blog_feed_excerpt_show'] = false;
$gutenblog_defaults['gutenblog_blog_feed_formats_show'] = 'on';

$gutenblog_defaults['gutenblog_section_frontpage_layout_select'] = 'Right-sidebar';
$gutenblog_defaults['gutenblog_section_frontpage_sidebar_design'] = 'default';

$gutenblog_defaults['gutenblog_section_shop_sidebar_design'] = 'default';

$gutenblog_defaults['gutenblog_section_single_post_layout_select'] = 'Right-sidebar';
$gutenblog_defaults['gutenblog_section_single_post_design_select'] = 'single-post-1';

$gutenblog_defaults['gutenblog_section_single_post_sidebar_design'] = 'default';

$gutenblog_defaults['gutenblog_section_frontpage_promotion_banner_textarea'] = "";
$gutenblog_defaults['gutenblog_section_frontpage_promotion_banner_custom_color'] = 2;
$gutenblog_defaults['gutenblog_section_frontpage_promotion_banner_custom_color_bgcolor'] = '#ffffff';

$gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_choice'] = "off";
$gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_textarea'] = "";
$gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_shortcode'] = "";
$gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_custom_color'] = 2;
$gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_custom_color_bgcolor'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_form_custom_color_bgcolor'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_heading_custom_color_color'] = '#000000';
$gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_text_custom_color_color'] = '#999999';


$gutenblog_defaults['gutenblog_side_cart_enable']				= true;
$gutenblog_defaults['gutenblog_cursor_circle_enable']				= false;
$gutenblog_defaults['gutenblog_cursor_thumb_enable'] = false;

$gutenblog_defaults['gutenblog_cursor_effect'] = 'cursor_disable';
$gutenblog_defaults['gutenblog_cursor_circle_effect_color'] = "#3d3d3d";

$gutenblog_defaults['gutenblog_section_appearance_border_radius_select'] = "rounded";

$gutenblog_defaults['gutenblog_section_socials_order_links'] = array();

$gutenblog_defaults['gutenblog_section_socials_facebook'] = esc_html__( '#', 'gutenblog-theme' );
$gutenblog_defaults['gutenblog_section_socials_google'] = esc_html__( '#', 'gutenblog-theme' );
$gutenblog_defaults['gutenblog_section_socials_instagram'] = esc_html__( '#', 'gutenblog-theme' );
$gutenblog_defaults['gutenblog_section_socials_twitter'] = esc_html__( '#', 'gutenblog-theme' );
$gutenblog_defaults['gutenblog_section_socials_behance'] = esc_html__( '#', 'gutenblog-theme' );

$gutenblog_defaults['gutenblog_cursor_circle_effect'] = "inversion";

$gutenblog_defaults['gutenblog_text_logo']                        = get_bloginfo('name');


$gutenblog_defaults['gutenblog_sortable_frontpage'] = array(
    'feed',
);

$gutenblog_defaults['gutenblog_banner_heading']                   = get_bloginfo('name');
$gutenblog_defaults['gutenblog_banner_description']               = get_bloginfo('description');
$gutenblog_defaults['gutenblog_banner_url']                       = '#';

$gutenblog_defaults['gutenblog_frontpage_banner']                 = 'Banner';
$gutenblog_defaults['gutenblog_frontpage_banner_overlay_show']	= 1;
$gutenblog_defaults['gutenblog_frontpage_banner_overlay_color']   = '#f0d742';
$gutenblog_defaults['gutenblog_section_frontpage_banner_design_select']   = 'frontpage-banner-design-1';
$gutenblog_defaults['gutenblog_section_frontpage_banner_custom_color']   = 2;
$gutenblog_defaults['gutenblog_section_frontpage_banner_custom_color_bgcolor']   = '#ffffff';


$gutenblog_defaults['gutenblog_blog_slider_design_select'] = 'slider-design-1';
$gutenblog_defaults['gutenblog_frontpage_banner_link_images']	    = 0;

$gutenblog_defaults['gutenblog_frontpage_posts_slider_category']  = 1; //Uncategorized
$gutenblog_defaults['gutenblog_frontpage_posts_slider_number']    = '3';
$gutenblog_defaults['gutenblog_frontpage_posts_only_img'] = true;
$gutenblog_defaults['gutenblog_frontpage_posts_slider_overlay_show'] = 1;
$gutenblog_defaults['gutenblog_frontpage_posts_slider_overlay_hover_show'] = 0;
$gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_show'] = 0;
$gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_color_first'] = '#000000';
$gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_color_second'] = '#555555';
$gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_hover_show'] = '0';
$gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_hover_color_first'] = '#555555';
$gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_hover_color_second'] = '#555555';
$gutenblog_defaults['gutenblog_frontpage_posts_slider_typography_title'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '700',
    'font-size'      => '35px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'center'
);
$gutenblog_defaults['gutenblog_frontpage_posts_slider_typography_description'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '300',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'center'
);


$gutenblog_defaults['gutenblog_section_featured_categories_heading'] = esc_html__('Featured Categories', 'gutenblog-theme');
$gutenblog_defaults['gutenblog_section_featured_categories_select'] = 1;
$gutenblog_defaults['gutenblog_section_featured_categories_cols'] = '3';
$gutenblog_defaults['gutenblog_section_featured_categories_custom_color'] = 2;
$gutenblog_defaults['gutenblog_section_featured_categories_typography_title'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_section_featured_categories_typography_description'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '300',
    'font-size'      => '12px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_section_featured_categories_custom_color_bgcolor'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_featured_categories_heading_custom_color_color'] = '#000000';

$gutenblog_defaults['gutenblog_section_subscribe_form_colors'] = '#f0f0f0';
$gutenblog_defaults['gutenblog_section_subscribe_form_background_image_colors'] = '';


$gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_show'] = 0;
$gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_category'] = 1;
$gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_number'] = '3';
$gutenblog_defaults['gutenblog_frontpage_footer_posts_only_img'] = true;
$gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_columns'] = '3';
$gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_overlay_show'] = 1;
$gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_overlay_hover_show'] = 1;
$gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_design_select'] = 'footer-slider-design-1';
$gutenblog_defaults['gutenblog_section_frontpage_footer_posts_slider_custom_color'] = 2;
$gutenblog_defaults['gutenblog_section_frontpage_footer_posts_slider_custom_color_bgcolor'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_frontpage_footer_posts_slider_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '23px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);


$gutenblog_defaults['gutenblog_frontpage_featured_posts_show']    = false;
$gutenblog_defaults['gutenblog_frontpage_featured_posts_heading'] = esc_html__('Featured Posts', 'gutenblog-theme');
$gutenblog_defaults['gutenblog_frontpage_featured_posts_design']  = 'featured-posts-design-1';

$gutenblog_defaults['gutenblog_frontpage_featured_posts_post_1']  = 1;
$gutenblog_defaults['gutenblog_frontpage_featured_posts_post_2']  = 1;
$gutenblog_defaults['gutenblog_frontpage_featured_posts_post_3']  = 1;
$gutenblog_defaults['gutenblog_frontpage_featured_posts_post_4']  = 1;
$gutenblog_defaults['gutenblog_frontpage_featured_posts_post_5']  = 1;
$gutenblog_defaults['gutenblog_frontpage_featured_posts_post_6']  = 1;
$gutenblog_defaults['gutenblog_frontpage_featured_posts_post_7']  = 1;
$gutenblog_defaults['gutenblog_frontpage_featured_posts_post_8']  = 1;

$gutenblog_defaults['gutenblog_featured_posts_description_show']  = 'excerpt';
$gutenblog_defaults['gutenblog_featured_posts_description_show_lenght'] = 55;
$gutenblog_defaults['gutenblog_section_featured_posts_padding'] = 0;
$gutenblog_defaults['gutenblog_section_featured_posts_slider_overlay_show'] = 1;
$gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_show'] = 0;
$gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_color_first'] = '#000000';
$gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_color_second'] = '#555555';
$gutenblog_defaults['gutenblog_section_featured_posts_slider_overlay_hover_show'] = 0;
$gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_hover_show'] = 0;
$gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_hover_color_first'] = '#555555';
$gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_hover_color_second'] = '#000000';
$gutenblog_defaults['gutenblog_section_featured_posts_custom_color_bgcolor'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_featured_posts_heading_custom_color_color'] = '#000000';
$gutenblog_defaults['gutenblog_section_featured_posts_post_title_custom_color_color'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_featured_posts_post_title_hover_custom_color_color'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_featured_posts_post_category_custom_color_color'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_featured_posts_post_description_custom_color_color'] = '#999999';
$gutenblog_defaults['gutenblog_section_featured_posts_title_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '20px',
    'line-height'    => '1.2',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);

$gutenblog_defaults['gutenblog_frontpage_large_post']        = 'My Diary';
$gutenblog_defaults['gutenblog_frontpage_large_post_show']        = false;
$gutenblog_defaults['gutenblog_frontpage_large_post_heading']     = esc_html__('My Diary', 'gutenblog-theme');
$gutenblog_defaults['gutenblog_frontpage_large_post_custom_color']             = 2;
$gutenblog_defaults['gutenblog_frontpage_large_post_custom_color_bgcolor']             = '#ffffff';
$gutenblog_defaults['gutenblog_frontpage_large_post_label_custom_color_bgcolor']             = '#6547ff';
$gutenblog_defaults['gutenblog_frontpage_large_post_label_custom_color_color']             = '#ffffff';
$gutenblog_defaults['gutenblog_frontpage_large_post_container_custom_color_bgcolor']             = '#221c24';
$gutenblog_defaults['gutenblog_frontpage_large_post_post_title_custom_color_color']             = '#ffffff';
$gutenblog_defaults['gutenblog_frontpage_large_post_post_category_custom_color_color']             = '#ffffff';
$gutenblog_defaults['gutenblog_frontpage_large_post_post_description_custom_color_color']             = '#999999';
$gutenblog_defaults['gutenblog_frontpage_large_post_post_entry_meta_custom_color_color']             = '#999999';
$gutenblog_defaults['gutenblog_frontpage_large_post_title_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '600',
    'font-size'      => '70px',
    'line-height'    => '1.2',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'center'
);

$gutenblog_defaults['gutenblog_blog_feed_meta_show']              = true;
$gutenblog_defaults['gutenblog_blog_feed_formats_show']              = false;
$gutenblog_defaults['gutenblog_blog_feed_thumbs_size']              = 'gutenblog-default';
$gutenblog_defaults['gutenblog_blog_feed_description_show'] = 'content';

$gutenblog_defaults['gutenblog_blog_feed_gallery_content_slider'] = false;
$gutenblog_defaults['gutenblog_blog_feed_video_content'] = false;
$gutenblog_defaults['gutenblog_blog_feed_audio_content'] = false;

$gutenblog_defaults['gutenblog_blog_feed_formats_show_lenght']      = 55;
$gutenblog_defaults['gutenblog_blog_feed_date_show']              = 1;
$gutenblog_defaults['gutenblog_blog_feed_date_number_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '400',
    'font-size'      => '25px',
    'line-height'    => '1',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_blog_feed_date_month_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '400',
    'font-size'      => '13px',
    'line-height'    => '1',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_blog_feed_thumbnail_date_show']              = 0;
$gutenblog_defaults['gutenblog_blog_feed_category_show']          = 1;
$gutenblog_defaults['gutenblog_blog_feed_author_show']            = 1;
$gutenblog_defaults['gutenblog_blog_feed_comments_show']          = 1;
$gutenblog_defaults['gutenblog_blog_feed_share_show']          = 1;
$gutenblog_defaults['gutenblog_blog_feed_overlay_show']          = 0;
$gutenblog_defaults['gutenblog_blog_feed_custom_overlay_show']          = '0';
$gutenblog_defaults['gutenblog_blog_feed_custom_overlay_color_first']          = '#000000';
$gutenblog_defaults['gutenblog_blog_feed_custom_overlay_color_second']          = '#555555';
$gutenblog_defaults['gutenblog_blog_feed_overlay_hover_show']          = 1;
$gutenblog_defaults['gutenblog_blog_feed_custom_overlay_hover_show']          = '0';
$gutenblog_defaults['gutenblog_blog_feed_custom_overlay_hover_color_first']          = '#000000';
$gutenblog_defaults['gutenblog_blog_feed_custom_overlay_hover_color_second']          = '#555555';


$gutenblog_defaults['gutenblog_blog_feed_likes_show']          = 1;
$gutenblog_defaults['gutenblog_blog_feed_sorting_show']          = 0;

$gutenblog_defaults['gutenblog_section_blog_feed_typography_categories_title'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '400',
    'font-size'      => '13px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);

$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating'] = "none";
$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_counter_bgcolor'] = "#f5f5f5";
$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_counter_color'] = "#999999";
$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_buttons_bgcolor'] = "#f0f0f0";
$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_buttons_color'] = "#999999";
$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_buttons_hover_bgcolor'] = "#89fad6";
$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_buttons_hover_color'] = "#000000";
$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_loggedin'] = 0;

$gutenblog_defaults['gutenblog_blog_feed_views_show']          = 1;
$gutenblog_defaults['gutenblog_blog_feed_views_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '400',
    'font-size'      => '12px',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
);
$gutenblog_defaults['gutenblog_blog_feed_post_format']            = 'Full-one';
$gutenblog_defaults['gutenblog_blog_feed_label']                  = esc_html__('Recent Posts', 'gutenblog-theme');
$gutenblog_defaults['gutenblog_blog_feed_category_enable']       = 0;
$gutenblog_defaults['gutenblog_blog_feed_category']             = 1;// Uncategoryzed

$gutenblog_defaults['gutenblog_blog_feed_columns'] = 'columns-2';
$gutenblog_defaults['gutenblog_blog_feed_pagination_select'] = 'Arrows';
$gutenblog_defaults['gutenblog_blog_feed_design_select'] = 'post-design-2';
$gutenblog_defaults['gutenblog_blog_feed_pagination_arrows_text_color'] = '#000000';
$gutenblog_defaults['gutenblog_blog_feed_pagination_arrows_icon_color'] = '#999999';
$gutenblog_defaults['gutenblog_blog_feed_pagination_arrows_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_text_color'] = '#999999';
$gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_bgcolor'] = '#f5f5f5';
$gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_current_text_color'] = '#000000';
$gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_current_bgcolor'] = '#ffffff';
$gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'center'
);
$gutenblog_defaults['gutenblog_blog_feed_pagination_load_more_bgcolor'] = '#f5f5f5';
$gutenblog_defaults['gutenblog_blog_feed_pagination_load_more_color'] = '#999999';
$gutenblog_defaults['gutenblog_blog_feed_pagination_load_more_icon_color'] = '#cccccc';
$gutenblog_defaults['gutenblog_blog_feed_pagination_load_more_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'center'
);


$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_heading_color'] = '#000000';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_title_color'] = '#000000';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_title_hover_color'] = '#000000';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_description_color'] = '#999999';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_entry_meta_color'] = '#999999';


$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_custom_color'] = 2;
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_custom_color_bgcolor'] = '#ffffff';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_heading_custom_color_color'] = '#000000';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_title_custom_color_color'] = '#000000';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_title_hover_custom_color_color'] = '#000000';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_description_custom_color_color'] = '#999999';
$gutenblog_defaults['gutenblog_section_frontpage_blog_feed_entry_meta_custom_color_color'] = '#999999';

$gutenblog_defaults['gutenblog_setting_blog_category_design'] = 'category-design-1';
$gutenblog_defaults['gutenblog_setting_blog_category_design_2_background'] = 'background-1';
$gutenblog_defaults['gutenblog_setting_blog_category_design_2_icon'] = 'icon-1';

$gutenblog_defaults['gutenblog_single_post_meta_show']                  = true;
$gutenblog_defaults['gutenblog_single_post_date_show']                  = 1;
$gutenblog_defaults['gutenblog_single_post_category_show']              = 1;
$gutenblog_defaults['gutenblog_single_post_author_show']                = 1;
$gutenblog_defaults['gutenblog_single_post_tags_show']                  = 1;
$gutenblog_defaults['gutenblog_single_post_likes_or_rating']                 = 1;
$gutenblog_defaults['gutenblog_single_post_likes_show']                 = 0;
$gutenblog_defaults['gutenblog_single_post_meta_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '13px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);

$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_comment']      = 'none';
$gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_comment_loggedin'] = 0;

$gutenblog_defaults['gutenblog_single_post_views_show']                  = 1;
$gutenblog_defaults['gutenblog_single_post_about_author_show']                  = 0;
$gutenblog_defaults['gutenblog_single_post_share_show']                  = 1;
$gutenblog_defaults['gutenblog_single_related_posts']                  = 0;
$gutenblog_defaults['gutenblog_single_related_posts_number']                  = '3';

$gutenblog_defaults['gutenblog_single_post_related_title'] = esc_html__('Related Posts', 'gutenblog-theme');



$gutenblog_defaults['gutenblog_posts_sidebar']                    = 'Right-sidebar';
$gutenblog_defaults['gutenblog_header_selector']                  = '1';
$gutenblog_defaults['gutenblog_header_settings_signin_btn']                  = '0';
$gutenblog_defaults['gutenblog_header_settings_cart_btn']                  = '1';
$gutenblog_defaults['gutenblog_header_settings_hidden_sidebar_btn']                  = '1';
$gutenblog_defaults['gutenblog_header_settings_search_btn']                  = '1';
$gutenblog_defaults['gutenblog_posts_featured_image_show']        = 1;
$gutenblog_defaults['gutenblog_posts_posts_nav_show']             = 1;
$gutenblog_defaults['gutenblog_section_single_post_overlay_show']             = true;
$gutenblog_defaults['gutenblog_posts_posts_nav_show_bgcolor']             = '#f5f5f5';
$gutenblog_defaults['gutenblog_posts_posts_nav_show_link_color']             = '#000000';
$gutenblog_defaults['gutenblog_posts_posts_nav_show_arrow_color']             = '#000000';
$gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_show']             = 0;
$gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_bar_show']             = 1;
$gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_bgcolor']             = '#ffffff';
$gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_link_color']             = '#000000';
$gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_text_color']             = '#999999';
$gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_icon_color']             = '#cccccc';

$gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '12px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);

$gutenblog_defaults['gutenblog_posts_posts_nav_show_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '14px',
    'line-height'    => '1.3',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
);
$gutenblog_defaults['gutenblog_single_post_meta_typography'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '400',
    'font-size'      => '13px',
    'line-height'    => '1',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
);

$gutenblog_defaults['gutenblog_setting_404_page_bgcolor']                    = '#221c24';
$gutenblog_defaults['gutenblog_setting_404_page_text_color']                    = '#ffffff';
$gutenblog_defaults['gutenblog_setting_404_page_link_color']                    = '#ffffff';


$gutenblog_defaults['gutenblog_section_page_layout_select']                    = 'Without-sidebar';


$gutenblog_defaults['gutenblog_section_blog_main_bg_color']   = '#ff9900';

$gutenblog_defaults['gutenblog_main_background_color'] = "#ffffff";

$gutenblog_defaults['gutenblog_container_layout'] = "on";

$gutenblog_defaults['gutenblog_section_first_level_menu_link_color']   = '#000000';
$gutenblog_defaults['gutenblog_section_first_level_menu_link_hover_color']   = '#333333';
$gutenblog_defaults['gutenblog_section_first_level_menu_link_hover_bg_color']   = '#000000';
$gutenblog_defaults['gutenblog_section_submenu_link_color']   = '#333333';
$gutenblog_defaults['gutenblog_section_submenu_link_hover_color']   = '#000000';
$gutenblog_defaults['gutenblog_section_submenu_link_bg_color']   = '#f5f5f5';
$gutenblog_defaults['gutenblog_section_submenu_link_hover_bg_color']   = '#f0f0f0';


$gutenblog_defaults['gutenblog_section_menu_navbar_bg_color']   = '#ffffff';
$gutenblog_defaults['gutenblog_section_header_wrap_bgcolor']   = '#ffffff';

$gutenblog_defaults['gutenblog_section_header_icon_color']   = '#999999';
$gutenblog_defaults['gutenblog_section_header_label_color']   = '#000000';

$gutenblog_defaults['gutenblog_section_blog_main_background_img_link'] = "";
$gutenblog_defaults['gutenblog_section_blog_main_background_img_setting'] = array(
        'background-color'      => 'rgba(255,255,255,1)',
        'background-image'      => '',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
    );

$gutenblog_defaults['gutenblog_mobile_wrap_bgcolor']   = '#ffffff';
$gutenblog_defaults['gutenblog_mobile_menu_icon_color']   = '#000000';
$gutenblog_defaults['gutenblog_mobile_first_level_menu_link_color']   = '#000000';
$gutenblog_defaults['gutenblog_mobile_first_level_menu_link_bg_color']   = '#ffffff';
$gutenblog_defaults['gutenblog_mobile_second_level_menu_link_color']   = '#999999';
$gutenblog_defaults['gutenblog_mobile_second_level_menu_link_bg_color']   = '#f5f5f5';

$gutenblog_defaults['gutenblog_section_header_select'] = 'header-4';
$gutenblog_defaults['gutenblog_header_wave_color_blend'] = false;
$gutenblog_defaults['gutenblog_header_wave_color_1'] = '#999999';
$gutenblog_defaults['gutenblog_header_wave_color_2'] = '#3d3d3d';
$gutenblog_defaults['gutenblog_header_wave_color_3'] = '#ffffff';
$gutenblog_defaults['gutenblog_header_wave_color_back'] = '#ffffff';
$gutenblog_defaults['gutenblog_header_wave_color_back_mob'] = '#ffffff';



$gutenblog_defaults['gutenblog_enable_preloader'] = 'disable';

$gutenblog_defaults['preloader_default_color_main'] = '#6725b8';
$gutenblog_defaults['preloader_default_color_second'] = '#93fed3';

$gutenblog_defaults['gutenblog_enable_preloader_mob'] = false;
$gutenblog_defaults['gutenblog_preloader_img'] = '';

$gutenblog_defaults['gutenblog_section_menu_design_select']            = 'menu-design-1';

$gutenblog_defaults['gutenblog_section_menu_align_select']            = 'justify-content-center';

$gutenblog_defaults['gutenblog_setting_primary_colors_main_color']            = '#6547ff';
$gutenblog_defaults['gutenblog_setting_primary_colors_inverse_color']            = '#ffffff';

$gutenblog_defaults['gutenblog_setting_first_overlay_color']            = '#000000';
$gutenblog_defaults['gutenblog_setting_second_overlay_color']            = '#6725b8';
$gutenblog_defaults['gutenblog_setting_first_overlay_hover_color']            = '#6725b8';
$gutenblog_defaults['gutenblog_setting_second_overlay_hover_color']            = '#ff9900';

$gutenblog_defaults['gutenblog_setting_footer_bgcolor']            = '#221c24';
$gutenblog_defaults['gutenblog_setting_footer_text_color']            = '#999999';



$gutenblog_defaults['gutenblog_horizontal_sample'] = esc_url( get_template_directory_uri() ) . '/sample/images/horizontal.jpg';
$gutenblog_defaults['gutenblog_horizontal_big_sample'] = esc_url( get_template_directory_uri() ) . '/sample/images/horizontal-big.jpg';
$gutenblog_defaults['gutenblog_vertical_sample'] = esc_url( get_template_directory_uri() ) . '/sample/images/vertical.jpg';
$gutenblog_defaults['gutenblog_square_sample'] = esc_url( get_template_directory_uri() ) . '/sample/images/square.jpg';
$gutenblog_defaults['gutenblog_square_small_sample'] = esc_url( get_template_directory_uri() ) . '/sample/images/square-small.jpg';

$gutenblog_defaults['gutenblog_slide_sample'][]                   = esc_url( get_template_directory_uri() ) . '/sample/images/slide1.jpg';

$gutenblog_defaults['gutenblog_thumbnail_sample'][]               = esc_url( get_template_directory_uri() ) . '/sample/images/thumb1.jpg';

$gutenblog_defaults['gutenblog_full_sample'][]                    = esc_url( get_template_directory_uri() ) . '/sample/images/full1.jpg';

$gutenblog_defaults['gutenblog_settings_typography_menu'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '0px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_post_title'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '17px',
    'line-height'    => '1.5',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_body_font'] = array(
    'font-family'    => 'Open Sans',
    'variant'        => 'regular',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '0px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_pre_code'] = array(
    'font-family'    => 'Monospace,Menlo,Consolas,monaco,monospace',
    'variant'        => 'regular',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '0px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_h1'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '600',
    'font-size'      => '40px',
    'line-height'    => '1.2',
    'letter-spacing' => '-2px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_h2'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '600',
    'font-size'      => '35px',
    'line-height'    => '1.5',
    'letter-spacing' => '0px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_h3'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '600',
    'font-size'      => '28px',
    'line-height'    => '1.5',
    'letter-spacing' => '1px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_h4'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '600',
    'font-size'      => '23px',
    'line-height'    => '1.5',
    'letter-spacing' => '-1px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_h5'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '600',
    'font-size'      => '20px',
    'line-height'    => '1.5',
    'letter-spacing' => '-1px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);
$gutenblog_defaults['gutenblog_settings_typography_h6'] = array(
    'font-family'    => 'Poppins',
    'variant'        => '500',
    'font-size'      => '15px',
    'line-height'    => '1.5',
    'letter-spacing' => '-.5px',
    'subsets'        => array( 'latin-ext' ),
    'text-transform' => 'none',
    'text-align'     => 'left'
);

?>