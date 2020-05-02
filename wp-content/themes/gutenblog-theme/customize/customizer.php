<?php
/**
 * Customizer functionality
 *
 *
**/

/*------------------------------
 Panels and Sections
 ------------------------------*/

function gutenblog_customizer_panels_sections( $wp_customize ) {

    # Panel -- Woocommerce
        $wp_customize->add_section( 'woocommerce_sidebar', array(
            'title'       => esc_html__( 'Shop Sidebar', 'gutenblog-theme' ),
            'priority'    => 20,
            'panel'       => 'woocommerce',
        ) );
    # Panel -- /Woocommerce

    $wp_customize->add_section( 'gutenblog_section_general_settings', array(
        'title'       => esc_html__( 'General Settings', 'gutenblog-theme' ),
        'priority'    => 1
    ) );

    $wp_customize->add_panel( 'gutenblog_panel_frontpage', array(
        'priority'    => 2,
        'title'       => esc_html__( 'Front Page', 'gutenblog-theme' ),
    ) );
    # Panel -- Front Page
        $wp_customize->add_section( 'gutenblog_section_sortable_frontpage', array(
            'title'       => esc_html__( 'All Main Elements Order', 'gutenblog-theme' ),
            'priority'    => 20,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        $wp_customize->add_section( 'gutenblog_section_frontpage_layout', array(
            'title'       => esc_html__( 'Posts Feed Sidebar', 'gutenblog-theme' ),
            'priority'    => 21,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        $wp_customize->add_section( 'gutenblog_section_frontpage_banner', array(
            'title'       => esc_html__( 'Banner section', 'gutenblog-theme' ),
            'priority'    => 22,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        $wp_customize->add_section( 'gutenblog_section_frontpage_posts_slider', array(
            'title'       => esc_html__( 'Posts Slider section', 'gutenblog-theme' ),
            'priority'    => 22,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        $wp_customize->add_section( 'gutenblog_section_frontpage_blog_feed', array(
            'title'       => esc_html__( 'Blog feed section', 'gutenblog-theme' ),
            'priority'    => 22,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        if(defined('THEMES_MONSTERS_CORE')){
            $wp_customize->add_section( 'gutenblog_section_frontpage_featured_categories', array(
                'title'       => esc_html__( 'Featured Categories section', 'gutenblog-theme' ),
                'priority'    => 23,
                'panel'       => 'gutenblog_panel_frontpage',
            ) );
        }

        $wp_customize->add_section( 'gutenblog_section_frontpage_featured_posts', array(
            'title'       => esc_html__( 'Featured Posts section', 'gutenblog-theme' ),
            'priority'    => 23,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        $wp_customize->add_section( 'gutenblog_section_frontpage_large_post', array(
            'title'       => esc_html__( 'Large / Highlight Post section', 'gutenblog-theme' ),
            'priority'    => 24,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        $wp_customize->add_section( 'gutenblog_section_frontpage_footer_posts_slider', array(
            'title'       => esc_html__( 'Footer Posts Slider section', 'gutenblog-theme' ),
            'priority'    => 25,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        $wp_customize->add_section( 'gutenblog_section_frontpage_promotion_banner', array(
            'title'       => esc_html__( 'Promotion Banner (Custom HTML) section', 'gutenblog-theme' ),
            'priority'    => 26,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );

        $wp_customize->add_section( 'gutenblog_section_frontpage_subscribe_form', array(
            'title'       => esc_html__( 'Subscribe Form (Custom HTML) section', 'gutenblog-theme' ),
            'priority'    => 26,
            'panel'       => 'gutenblog_panel_frontpage',
        ) );


    # Panel -- /Front Page
    
    $wp_customize->add_panel( 'gutenblog_panel_footer', array(
        'title'       => esc_html__( 'Footer', 'gutenblog-theme' ),
        'priority'    => 4,
    ) );
    # Panel -- Footer
        $wp_customize->add_section( 'gutenblog_section_footer_design', array(
            'title'       => esc_html__( 'Footer Design', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_footer',
            'priority'    => 1,
        ) );
        $wp_customize->add_section( 'gutenblog_section_footer', array(
            'title'       => esc_html__( 'Footer Content', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_footer',
            'priority'    => 1,
        ) );
        $wp_customize->add_section( 'gutenblog_section_footer_colors', array(
            'title'       => esc_html__( 'Footer Colors', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_footer',
            'priority'    => 2,
        ) );
        $wp_customize->add_section( 'gutenblog_section_footer_logo', array(
            'title'       => esc_html__( 'Footer Logo', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_footer',
            'priority'    => 3,
        ) );
    # Panel -- /Footer

    $wp_customize->add_panel( 'gutenblog_panel_typography', array(
        'title'       => esc_html__( 'Typography', 'gutenblog-theme' ),
        'priority'    => 5,
    ) );
    #Panel -- Typography
        $wp_customize->add_section( 'gutenblog_section_typography_menu', array(
            'title'       => esc_html__( 'Typography for Menu', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_post_title', array(
            'title'       => esc_html__( 'Typography for Post Title', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_post_categories_title', array(
            'title'       => esc_html__( 'Typography for Categories Title', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_body', array(
            'title'       => esc_html__( 'Typography for Body Text', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );

        $wp_customize->add_section( 'gutenblog_section_typography_pre_code', array(
            'title'       => esc_html__( 'Typography for Pre (Code Element)', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );

        $wp_customize->add_section( 'gutenblog_section_typography_h1', array(
            'title'       => esc_html__( 'Typography H1', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_h2', array(
            'title'       => esc_html__( 'Typography H2', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_h3', array(
            'title'       => esc_html__( 'Typography H3', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_h4', array(
            'title'       => esc_html__( 'Typography H4', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_h5', array(
            'title'       => esc_html__( 'Typography H5', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_h6', array(
            'title'       => esc_html__( 'Typography H6', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_h7', array(
            'title'       => esc_html__( 'Typography H7', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_custom_fonts', array(
            'title'       => esc_html__( 'Upload Custom Font', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_panel_typography',
        ) );
    #Panel -- /Typography

    $wp_customize->add_panel( 'gutenblog_section_header', array(
        'title'       => esc_html__( 'Header', 'gutenblog-theme' ),
        'priority'    => 6,
    ) );
    #Panel -- Header
        $wp_customize->add_section( 'gutenblog_section_header_settings', array(
            'title'       => esc_html__( 'Header Settings', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_section_header',
        ) );
        $wp_customize->add_section( 'gutenblog_section_header_design', array(
            'title'       => esc_html__( 'Header Design', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_section_header',
        ) );

        // Skins
        $wp_customize->add_section( 'gutenblog_section_header_colors', array(
            'title'       => esc_html__( 'Header Colors', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_section_header',
        ) );

        $wp_customize->add_section( 'gutenblog_section_menu_design', array(
            'title'       => esc_html__( 'Menu Design', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_section_header',
        ) );
        $wp_customize->add_section( 'gutenblog_section_header_button_design', array(
            'title'       => esc_html__( 'Buttons Design', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_section_header',
        ) );

        $wp_customize->add_section( 'gutenblog_section_mobile_menu_design', array(
            'title'       => esc_html__( 'Mobile Menu Design', 'gutenblog-theme' ),
            'panel'       => 'gutenblog_section_header',
        ) );
    #Panel -- /Header

    $wp_customize->add_panel( 'gutenblog_section_blog_feed', array(
        'title'       => esc_html__( 'Blog Feed', 'gutenblog-theme' ),
        'priority'    => 7
    ) );
    #Panel -- Blog Feed
        $wp_customize->add_section( 'gutenblog_section_blog_layouts', array(
            'title'       => esc_html__( 'Layouts', 'gutenblog-theme' ),
            'priority'    => 101,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );
        /*$wp_customize->add_section( 'gutenblog_section_blog_columns', array(
            'title'       => esc_html__( 'Layout Columns', 'gutenblog-theme' ),
            'priority'    => 102,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );*/
        $wp_customize->add_section( 'gutenblog_section_blog_design', array(
            'title'       => esc_html__( 'Design', 'gutenblog-theme' ),
            'priority'    => 103,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );
        $wp_customize->add_section( 'gutenblog_section_blog_pagination', array(
            'title'       => esc_html__( 'Pagination', 'gutenblog-theme' ),
            'priority'    => 104,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );
        $wp_customize->add_section( 'gutenblog_section_blog_meta', array(
            'title'       => esc_html__( 'Posts Meta', 'gutenblog-theme' ),
            'priority'    => 105,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );
        $wp_customize->add_section( 'gutenblog_section_blog_readmore', array(
            'title'       => esc_html__( 'Read more Design', 'gutenblog-theme' ),
            'priority'    => 106,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );
        $wp_customize->add_section( 'gutenblog_section_blog_feed_effects', array(
            'title'       => esc_html__( 'Thumb Hover Effects', 'gutenblog-theme' ),
            'priority'    => 107,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );

        $wp_customize->add_section( 'gutenblog_section_blog_category_design', array(
            'title'       => esc_html__( 'Category Design', 'gutenblog-theme' ),
            'priority'    => 107,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );

        $wp_customize->add_section( 'gutenblog_section_blog_feed_border_radius', array(
            'title'       => esc_html__( 'Border Radius Style', 'gutenblog-theme' ),
            'priority'    => 108,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );

        $wp_customize->add_section( 'gutenblog_section_blog_feed_custom_colors', array(
            'title'       => esc_html__( 'Colors', 'gutenblog-theme' ),
            'priority'    => 108,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );

        $wp_customize->add_section( 'gutenblog_section_blog_feed_typography', array(
            'title'       => esc_html__( 'Typography', 'gutenblog-theme' ),
            'priority'    => 108,
            'panel'       => 'gutenblog_section_blog_feed',
        ) );

    #Panel -- /Blog Feed

    $wp_customize->add_panel( 'gutenblog_section_blog_skins', array(
        'title'       => esc_html__( 'Common Elements Colors', 'gutenblog-theme' ),
        'priority'    => 8
    ) );
    #Panel -- Skins
        $wp_customize->add_section( 'gutenblog_section_blog_main_color', array(
            'title'       => esc_html__( 'Main Color Background', 'gutenblog-theme' ),
            'priority'    => 1,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );

        $wp_customize->add_section( 'gutenblog_section_header_colors', array(
            'title'       => esc_html__( 'Header Colors', 'gutenblog-theme' ),
            'priority'    => 2,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );
        $wp_customize->add_section( 'gutenblog_section_menu_color', array(
            'title'       => esc_html__( 'Menu colors', 'gutenblog-theme' ),
            'priority'    => 3,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );
        $wp_customize->add_section( 'gutenblog_section_mobile_menu_color', array(
            'title'       => esc_html__( 'Mobile Menu colors', 'gutenblog-theme' ),
            'priority'    => 4,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );
        $wp_customize->add_section( 'gutenblog_section_primary_colors', array(
            'title'       => esc_html__( 'Primary Colors', 'gutenblog-theme' ),
            'priority'    => 5,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );
        $wp_customize->add_section( 'gutenblog_section_overlay_colors', array(
            'title'       => esc_html__( 'Overlay Colors', 'gutenblog-theme' ),
            'priority'    => 6,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );
        $wp_customize->add_section( 'gutenblog_section_typography_colors', array(
            'title'       => esc_html__( 'Typography Colors', 'gutenblog-theme' ),
            'priority'    => 7,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );
        $wp_customize->add_section( 'gutenblog_section_sorting_colors', array(
            'title'       => esc_html__( 'Sorting Colors', 'gutenblog-theme' ),
            'priority'    => 7,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );
        $wp_customize->add_section( 'gutenblog_section_blog_feed_colors', array(
            'title'       => esc_html__( 'Blog Feed Colors', 'gutenblog-theme' ),
            'priority'    => 8,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );
        $wp_customize->add_section( 'gutenblog_section_subscribe_form_colors', array(
            'title'       => esc_html__( 'Subscribe Form Colors', 'gutenblog-theme' ),
            'priority'    => 8,
            'panel'       => 'gutenblog_section_blog_skins',
        ) );

    #Panel -- /Skins

    $wp_customize->add_panel( 'gutenblog_panel_sidebar', array(
        'title'       => esc_html__( 'Sidebar', 'gutenblog-theme' ),
        'priority'    => 9
    ) );
    #Panel -- Sidebar
        $wp_customize->add_section( 'gutenblog_section_sidebar_design', array(
            'title'       => esc_html__( 'Sidebar Design', 'gutenblog-theme' ),
            'priority'    => 1,
            'panel'       => 'gutenblog_panel_sidebar',
        ) );
        $wp_customize->add_section( 'gutenblog_section_sidebar_title_design', array(
            'title'       => esc_html__( 'Sidebar Title Design', 'gutenblog-theme' ),
            'priority'    => 1,
            'panel'       => 'gutenblog_panel_sidebar',
        ) );
        $wp_customize->add_section( 'gutenblog_section_sidebar_color', array(
            'title'       => esc_html__( 'Sidebar Color Settings', 'gutenblog-theme' ),
            'priority'    => 1,
            'panel'       => 'gutenblog_panel_sidebar',
        ) );
    #Panel -- /Sidebar

    $wp_customize->add_panel( 'gutenblog_section_socials', array(
        'title'       => esc_html__( 'Socials', 'gutenblog-theme' ),
        'priority'    => 10
    ) );
    #Panel -- Socials
        $wp_customize->add_section( 'gutenblog_section_socials_links', array(
            'title'       => esc_html__( 'Socials Links', 'gutenblog-theme' ),
            'priority'    => 99,
            'panel'       => 'gutenblog_section_socials',
        ) );
        $wp_customize->add_section( 'gutenblog_section_socials_order', array(
            'title'       => esc_html__( 'Socials Links Order', 'gutenblog-theme' ),
            'priority'    => 99,
            'panel'       => 'gutenblog_section_socials',
        ) );
    #Panel -- /Socials

    $wp_customize->add_panel( 'gutenblog_section_single_post', array(
        'title'       => esc_html__( 'Single Post', 'gutenblog-theme' ),
        'priority'    => 11,
    ) );
    # Panel -- Single Post
        $wp_customize->add_section( 'gutenblog_section_single_post_layout', array(
            'title'       => esc_html__( 'Layouts', 'gutenblog-theme' ),
            'priority'    => 61,
            'panel'       => 'gutenblog_section_single_post',
        ) );
        $wp_customize->add_section( 'gutenblog_section_single_post_meta', array(
            'title'       => esc_html__( 'Meta', 'gutenblog-theme' ),
            'priority'    => 61,
            'panel'       => 'gutenblog_section_single_post',
        ) );
        $wp_customize->add_section( 'gutenblog_section_single_post_design', array(
            'title'       => esc_html__( 'Design', 'gutenblog-theme' ),
            'priority'    => 61,
            'panel'       => 'gutenblog_section_single_post',
        ) );
        $wp_customize->add_section( 'gutenblog_section_single_sidebar', array(
            'title'       => esc_html__( 'Sidebar', 'gutenblog-theme' ),
            'priority'    => 61,
            'panel'       => 'gutenblog_section_single_post',
        ) );
    # Panel -- /Single Post


    $wp_customize->add_panel( 'gutenblog_section_404_page', array(
        'title'       => esc_html__( '404 page', 'gutenblog-theme' ),
        'priority'    => 12,
    ) );
    # Panel -- 404 Page
        $wp_customize->add_section( 'gutenblog_section_404_page_colors', array(
            'title'       => esc_html__( 'Colors', 'gutenblog-theme' ),
            'priority'    => 2,
            'panel'       => 'gutenblog_section_404_page',
        ) );


    $wp_customize->add_section( 'gutenblog_section_pages', array(
        'title'       => esc_html__( 'Pages', 'gutenblog-theme' ),
        'priority'    => 12,
    ) );
    
    $wp_customize->add_section( 'gutenblog_section_advanced', array(
        'title'       => esc_html__( 'Advanced', 'gutenblog-theme' ),
        'priority'    => 13,
    ) );
    
    $wp_customize->add_section( 'gutenblog_section_menu', array(
        'title'       => esc_html__( 'Menu Settings', 'gutenblog-theme' ),
        'priority'    => 14,
        'panel'       => 'nav_menus',
    ) );

    
}

add_action( 'customize_register', 'gutenblog_customizer_panels_sections' );


/*------------------------------
 Fields
 ------------------------------*/
 
function gutenblog_customizer_fields( $fields ) {
    
    global $gutenblog_defaults;

#Section -- Woocommerce
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'gutenblog_section_shop_sidebar_design',
        'label'       => esc_html__( 'Shop Sidebar Design', 'gutenblog-theme' ),
        'section'     => 'woocommerce_sidebar',
        'default'     => $gutenblog_defaults['gutenblog_section_shop_sidebar_design'],
        'priority'    => 10,
        'choices'     => [
            'default' => esc_html__( 'Default Design', 'gutenblog-theme' ),
            'sticky'  => esc_html__( 'Sticky Sidebar', 'gutenblog-theme' ),
        ],
    );
#Section -- /Woocommerce
    
#Section -- Upgrade to Pro
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'gutenblog_theme_info',
        'label'       => esc_html__( 'gutenblog-theme', 'gutenblog-theme' ),
        'description' => 
            '<h1>' . esc_html__('GutenBlog Pro', 'gutenblog-theme') . '</h1>' .
            '<p><a class="button" href="https://www.ThemesMonsters.com/gutenblog-pro/" target="_blank">Upgrade to Pro Version</a></p>' .
            '<p>' . esc_html__('Update theme for many amazing features and expert support included in the professional version', 'gutenblog-theme') . '</p>' .
            '<h2>What you Get in PRO version?</h2>' .
            '<p><a href="#" target="_blank"><img src="' . esc_url( get_parent_theme_file_uri( 'customize/images/gutenblog-pro-1.jpg' ) ) . '" /></a><br />' .
            '<p><a href="#" target="_blank"><img src="' . esc_url( get_parent_theme_file_uri( 'customize/images/gutenblog-pro-2.jpg' ) ) . '" /></a><br />' .
            '<p><a href="#" target="_blank"><img src="' . esc_url( get_parent_theme_file_uri( 'customize/images/gutenblog-pro-3.jpg' ) ) . '" /></a><br />' .
            '<p><a href="#" target="_blank"><img src="' . esc_url( get_parent_theme_file_uri( 'customize/images/gutenblog-pro-4.jpg' ) ) . '" /></a><br />' .
            '<hr />' . 
            '<h1>' . esc_html__('Current Theme: GutenBlog', 'gutenblog-theme') . '</h1>' .
            '<h3>' . esc_html__('Demo Site', 'gutenblog-theme') . '</h3>' .
            '<p>' . esc_html__('Text', 'gutenblog-theme') . '</p>' .
            '<p><a class="button" href="http://gutenblog.ThemesMonsters.com/" target="_blank">GutenBlog demo</a></p>' .
            '<h3>Documentation</h3>' . 
            '<p>' . esc_html__('Read how to customize the theme, set up widgets, and learn of all the possible options available to you.', 'gutenblog-theme') . '</p>' .
            '<p><a class="button" href="https://ThemesMonsters.com/docs" target="_blank">Documentation</a></p>' .
            '<h3>' . esc_html__('Sample Data', 'gutenblog-theme') . '</h3>' .
            '<p>' . esc_html__('You can install the content and settings shown on our demo site by importing this sample data.', 'gutenblog-theme') . '</p>' .
            '<p><a class="button" href="https://www.ThemesMonsters.com/sample-data/gutenblog-sample-data.zip" target="_blank">Sample Data</a></p>' .
            '<h3>' . esc_html__('Feedback and Support', 'gutenblog-theme') . '</h3>' .
            '<p>' . esc_html__('For feedback and support, please contact us and we would be happy to assist!', 'gutenblog-theme') . '</p>' .
            '<p><a class="button" href="https://www.ThemesMonsters.com/support" target="_blank">Support</a></p>'
            ,
        'section'     => 'gutenblog_section_theme_info',
        'priority'    => 1,

    );
#Section -- /Upgrade to Pro

#Section -- General Settings
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_example_content',
        'label'       => esc_html__( 'Show Example Content?', 'gutenblog-theme' ),
        'description' => esc_html__( 'Turning this off will disable all default/sample images for posts. It will also hide all default widgets in the Default Sidebar.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_example_content']
    );

    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_nice_scroll_enable',
        'label'       => esc_html__( 'Enable "NiceScroll" Scrolling?', 'gutenblog-theme' ),
        'description' => esc_html__( 'Turned off on mobile devices.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_nice_scroll_enable']
    );


    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_fadeout_effect_enable',
        'label'       => esc_html__( 'Enable "Fade In/Fade Out" effect on changing page?', 'gutenblog-theme' ),
        'description' => esc_html__( 'Turned off on mobile devices.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_fadeout_effect_enable']
    );

    
    

    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'gutenblog_cursor_effect',
        'label'       => esc_html__( 'Enable Cursor effect?', 'gutenblog-theme' ),
        'description' => esc_html__( 'Turned off on mobile devices.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_cursor_effect'],
        'multiple'    => 1,
        'choices'     => [
            'cursor_disable' => esc_html__( 'Disable', 'gutenblog-theme' ),
            'cursor_circle' => esc_html__( 'Cursor Circle', 'gutenblog-theme' ),
            // 'cursor_thumb' => esc_html__( 'Cursor Thumbnail', 'gutenblog-theme' ),
        ],
    );

    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'gutenblog_cursor_circle_effect',
        'label'       => esc_html__( 'Select "Cursor Circle" style', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_cursor_circle_effect'],
        'multiple'    => 1,
        'choices'     => [
            'inversion' => esc_html__( 'Color Inversion', 'gutenblog-theme' ),
            'color' => esc_html__( 'One color', 'gutenblog-theme' ),
        ],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_cursor_effect', 
                'operator' => '==', 
                'value'    => 'cursor_circle' 
            ) 
        ),
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_cursor_circle_effect_color',
        'label'       => esc_html__( 'Select "Cursor Circle" color', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_cursor_circle_effect_color'],
        'choices'     => [
            'alpha' => true,
        ],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_cursor_effect', 
                'operator' => '==', 
                'value'    => 'cursor_circle' 
            ),
            array( 
                'setting'  => 'gutenblog_cursor_circle_effect', 
                'operator' => '==', 
                'value'    => 'color' 
            ),
        ),
    );

    if ( class_exists( 'WooCommerce' ) ) {
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_side_cart_enable',
            'label'       => esc_html__( 'Enable "Side Cart" by clicking on the "Cart" button?', 'gutenblog-theme' ),
            'description' => '',
            'section'     => 'gutenblog_section_general_settings',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_side_cart_enable']
        );
    }

    // Preloader
    $fields[] = array(
        'type'        => 'radio',
        'settings'    => 'gutenblog_enable_preloader',
        'label'       => esc_html__( 'Enable "Preloader"?', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_enable_preloader'],
        'choices'     => array(
            'disable' => esc_html__( 'Disable', 'gutenblog-theme' ),
            'default' => esc_html__( 'Default', 'gutenblog-theme' ),
            // 'fadeout' => esc_html__( 'Fade Out', 'gutenblog-theme' ),
        ),
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'preloader_default_color_main',
        'label'       => esc_html__( 'Select Main Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['preloader_default_color_main'],
        'sanitize_callback' => 'sanitize_hex_color',
        'active_callback' => function() {
            $preloader = gutenblog_get_option( 'gutenblog_enable_preloader');

            if ( 'default' == $preloader) {
                return true;
            }
            return false;
        },
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'preloader_default_color_second',
        'label'       => esc_html__( 'Select Second Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['preloader_default_color_second'],
        'sanitize_callback' => 'sanitize_hex_color',
        'active_callback' => function() {
            $preloader = gutenblog_get_option( 'gutenblog_enable_preloader');

            if ( 'default' == $preloader) {
                return true;
            }
            return false;
        },
    );

    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_enable_preloader_mob',
        'label'       => esc_html__( 'Enable "Preloader" on mobile?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_enable_preloader_mob'],
    );

    $fields[] = array(
        'type'        => 'image',
        'settings'    => 'gutenblog_preloader_img',
        'label'       => esc_html__( 'Preloader Image', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_general_settings',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_preloader_img'],
        'active_callback' => function() {
            $preloader = gutenblog_get_option( 'gutenblog_enable_preloader');

            if ( 'default' == $preloader) {
                return true;
            }
            return false;
        },
    );


#Section -- /General Settings

#Panel -- Front Page

    #Section -- Front Page Layout
        $fields[] = array(
            'type'        => 'radio-image',
            'settings'    => 'gutenblog_section_frontpage_layout_select',
            'label'       => esc_html__( 'Select Front Page Layout', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_layout',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_layout_select'],
            'priority'    => 10,
            'choices'     => [
                'Without-sidebar'   => get_template_directory_uri() . '/customize/images/without-sidebar.jpg',
                'Left-sidebar' => get_template_directory_uri() . '/customize/images/left-sidebar.jpg',
                'Right-sidebar' => get_template_directory_uri() . '/customize/images/right-sidebar.jpg',
            ],
        );

        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_section_frontpage_sidebar_design',
            'label'       => esc_html__( 'Front Page Sidebar Design', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_layout',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_sidebar_design'],
            'priority'    => 10,
            'choices'     => [
                'default' => esc_html__( 'Default Design', 'gutenblog-theme' ),
                'sticky'  => esc_html__( 'Sticky Sidebar', 'gutenblog-theme' ),
            ],
        );
    #Section -- /Front Page Layout

    #Section -- Front Page Elements Order
        $gutenblog_sortable_frontpage = array();
        if(defined('THEMES_MONSTERS_CORE')){
            $gutenblog_sortable_frontpage = array(
                'banner'          => esc_html__( 'Banner', 'gutenblog-theme' ),
                'posts_slider'    => esc_html__( 'Posts Slider', 'gutenblog-theme' ),
                'featured_categories'    => esc_html__( 'Featured Categories', 'gutenblog-theme' ),
                'featured_posts'  => esc_html__( 'Featured Posts', 'gutenblog-theme' ),
                'feed'            => esc_html__( 'Posts Feed', 'gutenblog-theme' ),
                'large_post'      => esc_html__( 'Large (Highlighted) Post', 'gutenblog-theme' ),
                'footer_posts'    => esc_html__( 'Footer Posts Slider', 'gutenblog-theme' ),
                'promotion_banner'    => esc_html__( 'Promotion Banner', 'gutenblog-theme' ),
                'subscribe_form'    => esc_html__( 'Subscribe Form', 'gutenblog-theme' ),
            );
        } else {
            $gutenblog_sortable_frontpage = array(
                'banner'          => esc_html__( 'Banner', 'gutenblog-theme' ),
                'posts_slider'    => esc_html__( 'Posts Slider', 'gutenblog-theme' ),
                'featured_categories'    => esc_html__( 'Featured Categories (Disabled)', 'gutenblog-theme' ),
                'featured_posts'  => esc_html__( 'Featured Posts', 'gutenblog-theme' ),
                'feed'            => esc_html__( 'Posts Feed', 'gutenblog-theme' ),
                'large_post'      => esc_html__( 'Large (Highlighted) Post', 'gutenblog-theme' ),
                'footer_posts'    => esc_html__( 'Footer Posts Slider', 'gutenblog-theme' ),
                'promotion_banner'    => esc_html__( 'Promotion Banner', 'gutenblog-theme' ),
                'subscribe_form'    => esc_html__( 'Subscribe Form', 'gutenblog-theme' ),
            );
        }


        $fields[] = array(
            'type'     => 'sortable',
            'settings' => 'gutenblog_sortable_frontpage',
            'label'    => esc_html__( 'Ordering of Elements on Front Page', 'gutenblog-theme' ),
            'section'  => 'gutenblog_section_sortable_frontpage',
            'default'     => $gutenblog_defaults['gutenblog_sortable_frontpage'],
            'choices'     => $gutenblog_sortable_frontpage,
            'priority' => 1,
        );


        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_sortable_frontpage_desc',
            'label'       => wp_kses_post(__( '<hr />', 'gutenblog-theme' )),
            'description' => esc_html__( 'Order Elements on Front Page', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_sortable_frontpage',
            'priority'    => 2
        );  
    #Section -- /Front Page Elements Order

    #Section -- Banner

        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_hr_1',
            'label'       => '',
            'description' => wp_kses_post(__( '<hr />Setup Image for Banner from "Header Image" tab', 'gutenblog-theme' )),
            'section'     => 'gutenblog_section_frontpage_banner',
            'priority'    => 5,
        );
        
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_banner_overlay_show',
            'label'       => esc_html__('Show Color Overlay/Filter?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_banner',
            'priority'    => 7,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_banner_overlay_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_banner_link_images', 'operator' => '==', 'value'    => '0', ),)
        );
        
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_banner_overlay_color',
            'label'       => esc_html__( 'Select Color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_banner',
            'priority'    => 8,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_banner_overlay_color'],
            'sanitize_callback' => 'sanitize_hex_color',
            'active_callback'  => array( 
                array( 
                    'setting'  => 'gutenblog_frontpage_banner_overlay_show', 
                    'operator' => '==', 
                    'value'    => '1', ),
                array( 
                    'setting'  => 'gutenblog_frontpage_banner_link_images', 
                    'operator' => '==', 
                    'value'    => '0', 
                ),
            )
        );
        $fields[] = array(
            'type'        => 'radio-image',
            'settings'    => 'gutenblog_section_frontpage_banner_design_select',
            'label'       => esc_html__( 'Slider Design', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_banner',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_banner_design_select'],
            'priority'    => 10,
            'choices'     => [
                'frontpage-banner-design-1'   => get_template_directory_uri() . '/customize/images/frontpage-banner-design-1.jpg',
                'frontpage-banner-design-2' => get_template_directory_uri() . '/customize/images/frontpage-banner-design-2.jpg',
            ],
        );
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'gutenblog_section_frontpage_banner_custom_color',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_banner_custom_color'],
            'label'       => esc_html__( 'Custom Color for section', 'gutenblog-theme' ),
            'description'       => esc_html__( 'By default, colors are used from Common Elements', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_banner',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_attr__( 'Custom', 'gutenblog-theme' ),
                'off' => esc_attr__( 'Common', 'gutenblog-theme' )
            ),
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_frontpage_banner_custom_color_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_banner',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_banner_custom_color_bgcolor'],
            'priority'    => 11,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_banner_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
    #Section -- /Banner

    #Section -- Posts Slider
        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_frontpage_posts_slider_desc',
            'label'       => wp_kses_post(__( 'Posts Slider', 'gutenblog-theme' )),
            'description' => esc_html__( 'Select a category to show posts from in the slider. Also enter the number of posts to show from that category.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'priority'    => 1,
        );    
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_posts_slider_category',
            'label'       => esc_html__( 'Posts Slider - Category', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'priority'    => 2,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_category'],
            'choices'     => Kirki_Helper::get_terms( 'category' ),
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_posts_slider_number',
            'label'       => esc_html__( 'Posts Slider - Number of Slides/Posts', 'gutenblog-theme' ),
            'description' => esc_html__( 'There should be at least three posts in the chosen category for the slider to show up.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'priority'    => 3,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_number'],
            'choices'     => array('3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),
        );

        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_posts_only_img',
            'label'       => esc_html__( 'Show only slides with Thumbnails', 'gutenblog-theme' ),
            'description' => '',
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_only_img'],
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_posts_slider_overlay_show',
            'label'       => esc_html__('Show Overlay Color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'priority'    => 5,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_overlay_show'],
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_posts_slider_custom_overlay_show',
            'label'       => esc_html__('Custom Overlay color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_posts_slider_overlay_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_posts_slider_custom_overlay_color_first',
            'label'       => esc_html__( 'First Overlay color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_color_first'],
            'priority'    => 7,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_posts_slider_custom_overlay_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_posts_slider_custom_overlay_color_second',
            'label'       => esc_html__( 'Second Overlay color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_color_second'],
            'priority'    => 8,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_posts_slider_custom_overlay_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_posts_slider_overlay_hover_show',
            'label'       => esc_html__('Show Overlay on Hover Color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'priority'    => 9,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_overlay_hover_show'],
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_posts_slider_custom_overlay_hover_show',
            'label'       => esc_html__('Custom Overlay color on Hover?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'priority'    => 10,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_hover_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_posts_slider_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_posts_slider_custom_overlay_hover_color_first',
            'label'       => esc_html__( 'First Overlay color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_color_first'],
            'priority'    => 11,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_posts_slider_custom_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_posts_slider_custom_overlay_hover_color_second',
            'label'       => esc_html__( 'Second Overlay color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_custom_overlay_hover_color_second'],
            'priority'    => 12,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_posts_slider_custom_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
        );


        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_frontpage_posts_slider_typography_title',
            'label'       => esc_attr__( 'Title typography', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_typography_title'],
            'priority'    => 13,
            'output'      => array(
                array(
                    'element' => '.frontpage-posts-slider-post .entry-title a',
                ),
            ),
        );
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_frontpage_posts_slider_typography_description',
            'label'       => esc_attr__( 'Description typography', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_posts_slider_typography_description'],
            'priority'    => 14,
            'output'      => array(
                array(
                    'element' => '.frontpage-posts-slider-post .entry-summary',
                ),
            ),
        );
    #Section -- /Posts Slider

    #Section -- Featured Categories
    if(defined('THEMES_MONSTERS_CORE')){
        $fields[] = array(
            'type'        => 'text',
            'settings'    => 'gutenblog_section_featured_categories_heading',
            'label'       => esc_html__( 'Heading', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_categories',
            'priority'    => 2,
            'default'     => $gutenblog_defaults['gutenblog_section_featured_categories_heading'],
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_section_featured_categories_select',
            'label'       => esc_html__( 'Select Featured Categories', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_categories',
            'priority'    => 3,
            'multiple'    => 20,
            'default'     => $gutenblog_defaults['gutenblog_section_featured_categories_select'],
            'choices'     => Kirki_Helper::get_terms( 'category' ),
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_section_featured_categories_cols',
            'label'       => esc_html__( 'Featured Categories Columns', 'gutenblog-theme' ),
            'description' => '',
            'section'     => 'gutenblog_section_frontpage_featured_categories',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_section_featured_categories_cols'],
            'choices'     => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','6'=>'6'),
        );
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_section_featured_categories_typography_title',
            'label'       => esc_attr__( 'Title typography', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_categories',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_categories_typography_title'],
            'priority'    => 5,
            'output'      => array(
                array(
                    'element' => '.themesmonsters-title-cat',
                ),
            ),
        );
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_section_featured_categories_typography_description',
            'label'       => esc_attr__( 'Description typography', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_categories',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_categories_typography_description'],
            'priority'    => 5,
            'output'      => array(
                array(
                    'element' => '.themesmonsters-cat-desc',
                ),
            ),
        );
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'gutenblog_section_featured_categories_custom_color',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_categories_custom_color'],
            'label'       => esc_html__( 'Custom Color for section', 'gutenblog-theme' ),
            'description'       => esc_html__( 'By default, colors are used from Common Elements', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_categories',
            'priority'    => 9,
            'choices'     => array(
                'on'  => esc_attr__( 'Custom', 'gutenblog-theme' ),
                'off' => esc_attr__( 'Common', 'gutenblog-theme' )
            ),
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_categories_custom_color_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_categories',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_categories_custom_color_bgcolor'],
            'priority'    => 10,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_featured_categories_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_categories_heading_custom_color_color',
            'label'       => esc_html__( 'Heading color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_categories',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_categories_heading_custom_color_color'],
            'priority'    => 11,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_featured_categories_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
    }
    #Section -- /Featured Categories

    #Section -- Featured Posts
        

        $fields[] = array(
            'type'        => 'text',
            'settings'    => 'gutenblog_frontpage_featured_posts_heading',
            'label'       => esc_html__( 'Heading', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 1,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_heading'],
        );
        $fields[] = array(
            'type'        => 'radio-image',
            'settings'    => 'gutenblog_frontpage_featured_posts_design',
            'label'       => esc_html__( 'Featured Posts Design', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_design'],
            'priority'    => 2,
            'choices'     => [
                'featured-posts-design-1'   => get_template_directory_uri() . '/customize/images/featured-posts-design-1.jpg',
                'featured-posts-design-2'   => get_template_directory_uri() . '/customize/images/featured-posts-design-2.jpg',
                'featured-posts-design-3'   => get_template_directory_uri() . '/customize/images/featured-posts-design-3.jpg',
                'featured-posts-design-4'   => get_template_directory_uri() . '/customize/images/featured-posts-design-4.jpg',
                'featured-posts-design-5'   => get_template_directory_uri() . '/customize/images/featured-posts-design-5.jpg',
                'featured-posts-design-6'   => get_template_directory_uri() . '/customize/images/featured-posts-design-6.jpg',
                'featured-posts-design-7'   => get_template_directory_uri() . '/customize/images/featured-posts-design-7.jpg',
                'featured-posts-design-8'   => get_template_directory_uri() . '/customize/images/featured-posts-design-8.jpg',
                'featured-posts-design-9'   => get_template_directory_uri() . '/customize/images/featured-posts-design-9.jpg',
                'featured-posts-design-10'   => get_template_directory_uri() . '/customize/images/featured-posts-design-10.jpg',
                'featured-posts-design-11'   => get_template_directory_uri() . '/customize/images/featured-posts-design-11.jpg',
                'featured-posts-design-12'   => get_template_directory_uri() . '/customize/images/featured-posts-design-12.jpg',
                'featured-posts-design-13'   => get_template_directory_uri() . '/customize/images/featured-posts-design-13.jpg',
                'featured-posts-design-14'   => get_template_directory_uri() . '/customize/images/featured-posts-design-14.jpg',
            ],
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_featured_posts_post_1',
            'label'       => esc_html__( 'Post 1', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 3,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_post_1'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),

        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_featured_posts_post_2',
            'label'       => esc_html__( 'Post 2', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_post_2'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_featured_posts_post_3',
            'label'       => esc_html__( 'Post 3', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 5,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_post_3'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
            'active_callback'  => function() {
                $design = gutenblog_get_option('gutenblog_frontpage_featured_posts_design');
                if($design == "featured-posts-design-8"){ // dont show
                    return false;
                } 
                return true;
            },
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_featured_posts_post_4',
            'label'       => esc_html__( 'Post 4', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_post_4'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
            'active_callback'  => function() {
                $design = gutenblog_get_option('gutenblog_frontpage_featured_posts_design');
                if($design == "featured-posts-design-8" 
                || $design == "featured-posts-design-4"
                || $design == "featured-posts-design-7"
                || $design == "featured-posts-design-9"){ // dont show
                    return false;
                } 
                return true;
            },
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_featured_posts_post_5',
            'label'       => esc_html__( 'Post 5', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 7,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_post_5'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
            'active_callback'  => function() {
                $design = gutenblog_get_option('gutenblog_frontpage_featured_posts_design');
                if($design == "featured-posts-design-8" // 2

                ||$design ==  "featured-posts-design-4" // 3
                ||$design ==  "featured-posts-design-7" // 3
                ||$design ==  "featured-posts-design-9" // 3

                ||$design ==  "featured-posts-design-5" // 4
                ||$design ==  "featured-posts-design-6" // 4
                ||$design ==  "featured-posts-design-10"// 4
                           ){ // dont show
                    return false;
                } 
                return true;
            },
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_featured_posts_post_6',
            'label'       => esc_html__( 'Post 6', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 8,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_post_6'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
            'active_callback'  => function() {
                $design = gutenblog_get_option('gutenblog_frontpage_featured_posts_design');
                if($design == "featured-posts-design-8" // 2

                ||$design ==  "featured-posts-design-4" // 3
                ||$design ==  "featured-posts-design-7" // 3
                ||$design ==  "featured-posts-design-9" // 3

                ||$design ==  "featured-posts-design-5" // 4
                ||$design ==  "featured-posts-design-6" // 4
                ||$design ==  "featured-posts-design-10"// 4

                ||$design ==  "featured-posts-design-1" // 5
                ||$design ==  "featured-posts-design-2" // 5
                ||$design ==  "featured-posts-design-3"// 5
                           ){ // dont show
                    return false;
                } 
                return true;
            },
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_featured_posts_post_7',
            'label'       => esc_html__( 'Post 7', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 9,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_post_7'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
            'active_callback'  => function() {
                $design = gutenblog_get_option('gutenblog_frontpage_featured_posts_design');
                if($design == "featured-posts-design-8" // 2

                ||$design ==  "featured-posts-design-4" // 3
                ||$design ==  "featured-posts-design-7" // 3
                ||$design ==  "featured-posts-design-9" // 3

                ||$design ==  "featured-posts-design-5" // 4
                ||$design ==  "featured-posts-design-6" // 4
                ||$design ==  "featured-posts-design-10"// 4

                ||$design ==  "featured-posts-design-1" // 5
                ||$design ==  "featured-posts-design-2" // 5
                ||$design ==  "featured-posts-design-3"// 5

                ||$design ==  "featured-posts-design-12" // 6
                ||$design ==  "featured-posts-design-14"// 6
                           ){ // dont show
                    return false;
                } 
                return true;
            },
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_featured_posts_post_8',
            'label'       => esc_html__( 'Post 8', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 10,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_featured_posts_post_8'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
            'active_callback'  => function() {
                $design = gutenblog_get_option('gutenblog_frontpage_featured_posts_design');
                if($design == "featured-posts-design-8" // 2

                ||$design ==  "featured-posts-design-4" // 3
                ||$design ==  "featured-posts-design-7" // 3
                ||$design ==  "featured-posts-design-9" // 3

                ||$design ==  "featured-posts-design-5" // 4
                ||$design ==  "featured-posts-design-6" // 4
                ||$design ==  "featured-posts-design-10"// 4

                ||$design ==  "featured-posts-design-1" // 5
                ||$design ==  "featured-posts-design-2" // 5
                ||$design ==  "featured-posts-design-3"// 5

                ||$design ==  "featured-posts-design-12" // 6
                ||$design ==  "featured-posts-design-14"// 6

                ||$design ==  "featured-posts-design-13"// 7
                           ){ // dont show
                    return false;
                } 
                return true;
            },
        );
        

        $fields[] = array(
             'type'        => 'number',
             'settings'    => 'gutenblog_section_featured_posts_padding',
             'label'       => esc_html__( 'Paddings for each post', 'gutenblog-theme' ),
             'description' => esc_html__( 'Type the size of padding in PX which will apply on each post in the section', 'gutenblog-theme' ),
             'section'     => 'gutenblog_section_frontpage_featured_posts',
             'priority'    => 11,
             'choices'     => [
                'min'  => 1,
                'max'  => 100,
                'step' => 1,
              ],
             'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_padding'],
        );

        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_section_featured_posts_slider_overlay_show',
            'label'       => esc_html__('Show Overlay Color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 12,
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_slider_overlay_show'],
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_section_featured_posts_custom_overlay_show',
            'label'       => esc_html__('Custom Overlay color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 13,
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_featured_posts_slider_overlay_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_custom_overlay_color_first',
            'label'       => esc_html__( 'First Overlay color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_color_first'],
            'priority'    => 14,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_featured_posts_custom_overlay_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_custom_overlay_color_second',
            'label'       => esc_html__( 'Second Overlay color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_color_second'],
            'priority'    => 15,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_featured_posts_custom_overlay_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_section_featured_posts_slider_overlay_hover_show',
            'label'       => esc_html__('Show Overlay on Hover Color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 16,
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_slider_overlay_hover_show'],
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_section_featured_posts_custom_overlay_hover_show',
            'label'       => esc_html__('Custom Overlay color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'priority'    => 17,
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_hover_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_featured_posts_slider_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_custom_overlay_hover_color_first',
            'label'       => esc_html__( 'First Overlay color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_hover_color_first'],
            'priority'    => 18,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_featured_posts_custom_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_custom_overlay_hover_color_second',
            'label'       => esc_html__( 'Second Overlay color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_custom_overlay_hover_color_second'],
            'priority'    => 19,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_featured_posts_custom_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
        );

        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_custom_color_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_custom_color_bgcolor'],
            'priority'    => 20,
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_heading_custom_color_color',
            'label'       => esc_html__( 'Heading color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_heading_custom_color_color'],
            'priority'    => 21,
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_post_title_custom_color_color',
            'label'       => esc_html__( 'Post Title color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_post_title_custom_color_color'],
            'priority'    => 22,
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_post_title_hover_custom_color_color',
            'label'       => esc_html__( 'Post Title Hover color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_post_title_hover_custom_color_color'],
            'priority'    => 23,
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_post_category_custom_color_color',
            'label'       => esc_html__( 'Category Text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_post_category_custom_color_color'],
            'priority'    => 24,
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_featured_posts_post_description_custom_color_color',
            'label'       => esc_html__( 'Post Description color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_post_description_custom_color_color'],
            'priority'    => 25,
        );
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_section_featured_posts_title_typography',
            'label'       => esc_attr__( 'Typography', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_featured_posts',
            'default'     => $gutenblog_defaults['gutenblog_section_featured_posts_title_typography'],
            'priority'    => 26,
            'output'      => array(
                array(
                    'element' => '.frontpage-featured-posts .entry-title',
                ),
            ),
        );

    #Section -- /Featured Posts



    #Section -- Blog Feed Posts

    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_custom_color',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_custom_color'],
        'label'       => esc_html__( 'Custom Color for section', 'gutenblog-theme' ),
        'description'       => esc_html__( 'By default, colors are used from Common Elements', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_frontpage_blog_feed',
        'priority'    => 1,
        'choices'     => array(
            'on'  => esc_attr__( 'Custom', 'gutenblog-theme' ),
            'off' => esc_attr__( 'Common', 'gutenblog-theme' )
        ),
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_custom_color_bgcolor',
        'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_frontpage_blog_feed',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_custom_color_bgcolor'],
        'priority'    => 2,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_blog_feed_custom_color', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_heading_custom_color_color',
        'label'       => esc_html__( 'Heading color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_frontpage_blog_feed',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_heading_custom_color_color'],
        'priority'    => 3,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_blog_feed_custom_color', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_title_custom_color_color',
        'label'       => esc_html__( 'Post Title color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_frontpage_blog_feed',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_title_custom_color_color'],
        'priority'    => 4,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_blog_feed_custom_color', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_title_hover_custom_color_color',
        'label'       => esc_html__( 'Post Title Hover color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_frontpage_blog_feed',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_title_hover_custom_color_color'],
        'priority'    => 5,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_blog_feed_custom_color', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_description_custom_color_color',
        'label'       => esc_html__( 'Post Description color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_frontpage_blog_feed',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_description_custom_color_color'],
        'priority'    => 6,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_blog_feed_custom_color', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_entry_meta_custom_color_color',
        'label'       => esc_html__( 'Entry Meta color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_frontpage_blog_feed',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_entry_meta_custom_color_color'],
        'priority'    => 7,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_blog_feed_custom_color', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_custom_color_hr_1',
        'label'       => '<hr />',
        'section'     => 'gutenblog_section_frontpage_blog_feed',
        'priority'    => 8,
    );

    #Section -- /Blog Feed Posts

    #Section -- Large (Highlighted) Post
       
        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_frontpage_large_post_sep1',
            'label'       => '<hr />', 
            'section'     => 'gutenblog_section_frontpage_large_post',
            'priority'    => 2,
        );
        $fields[] = array(
            'type'        => 'text',
            'settings'    => 'gutenblog_frontpage_large_post_heading',
            'label'       => esc_html__( 'Select Heading for Large (Highlighted) Post', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'priority'    => 3,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_heading'],
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_large_post',
            'label'       => esc_html__( 'Select Large (Highlighted) Post', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post'],
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
        );

        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'gutenblog_frontpage_large_post_custom_color',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_custom_color'],
            'label'       => esc_html__( 'Custom Color for section', 'gutenblog-theme' ),
            'description'       => esc_html__( 'By default, colors are used from Common Elements', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'priority'    => 5,
            'choices'     => array(
                'on'  => esc_attr__( 'Custom', 'gutenblog-theme' ),
                'off' => esc_attr__( 'Common', 'gutenblog-theme' )
            ),
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_large_post_custom_color_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_custom_color_bgcolor'],
            'priority'    => 6,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_large_post_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_large_post_label_custom_color_bgcolor',
            'label'       => esc_html__( 'Label Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_label_custom_color_bgcolor'],
            'priority'    => 7,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_large_post_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_large_post_label_custom_color_color',
            'label'       => esc_html__( 'Label Text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_label_custom_color_color'],
            'priority'    => 8,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_large_post_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_large_post_container_custom_color_bgcolor',
            'label'       => esc_html__( 'Post Container Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_container_custom_color_bgcolor'],
            'priority'    => 9,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_large_post_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_large_post_post_title_custom_color_color',
            'label'       => esc_html__( 'Post Title color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_post_title_custom_color_color'],
            'priority'    => 10,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_large_post_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_large_post_post_category_custom_color_color',
            'label'       => esc_html__( 'Post Category color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_post_category_custom_color_color'],
            'priority'    => 11,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_large_post_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_large_post_post_description_custom_color_color',
            'label'       => esc_html__( 'Description text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_post_description_custom_color_color'],
            'priority'    => 12,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_large_post_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_frontpage_large_post_post_entry_meta_custom_color_color',
            'label'       => esc_html__( 'Entry Meta color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_post_entry_meta_custom_color_color'],
            'priority'    => 13,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_frontpage_large_post_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_frontpage_large_post_title_typography',
            'label'       => esc_attr__( 'Typography', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_large_post',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_large_post_title_typography'],
            'priority'    => 14,
            'output'      => array(
                array(
                    'element' => '.frontpage-large-post-wrap .entry-title',
                ),
            ),
        );


    #Section -- /Large (Highlighted) Post

    #Section -- Footer Posts Slider

        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_frontpage_footer_posts_slider_desc',
            'label'       => wp_kses_post(__( '<hr />Posts Slider', 'gutenblog-theme' )),
            'description' => esc_html__( 'Select a category to show posts from in the slider. Also enter the number of posts to show from that category.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 2,
        );    
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_footer_posts_slider_category',
            'label'       => esc_html__( 'Posts Slider - Category', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 3,
            'multiple'    => 10,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_category'],
            'choices'     => Kirki_Helper::get_terms( 'category' ),
        );
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_footer_posts_slider_number',
            'label'       => esc_html__( 'Posts Slider - Number of Slides/Posts', 'gutenblog-theme' ),
            'description' => esc_html__( 'There should be at least three posts in the chosen category for the slider to show up.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_number'],
            'choices'     => array('3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),
        );

        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_footer_posts_only_img',
            'label'       => esc_html__( 'Show only slides with Thumbnails', 'gutenblog-theme' ),
            'description' => '',
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_footer_posts_only_img'],
        );


        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_frontpage_footer_posts_slider_columns',
            'label'       => esc_html__( 'Posts Slider - Number of Columns', 'gutenblog-theme' ),
            'description' => '',
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_columns'],
            'choices'     => array('2'=>'2','3'=>'3','4'=>'4'),
            
        );

        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_footer_posts_slider_overlay_show',
            'label'       => esc_html__('Show Overlay Color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 7,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_overlay_show'],
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_frontpage_footer_posts_slider_overlay_hover_show',
            'label'       => esc_html__('Show Overlay on Hover Color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 8,
            'default'     => $gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_overlay_hover_show'],
        );
        

        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_hr_2',
            'label'       => '',
            'description' => wp_kses_post('<hr />'),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 9,
        );

        $fields[] = array(
            'type'        => 'radio-image',
            'settings'    => 'gutenblog_frontpage_footer_posts_slider_design_select',
            'label'       => esc_html__( 'Slider Design', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_frontpage_footer_posts_slider_design_select'],
            'priority'    => 10,
            'choices'     => [
                'footer-slider-design-1'   => get_template_directory_uri() . '/customize/images/footer-slider-design-1.jpg',
                'footer-slider-design-2' => get_template_directory_uri() . '/customize/images/footer-slider-design-2.jpg',
            ],
        );
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'gutenblog_section_frontpage_footer_posts_slider_custom_color',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_footer_posts_slider_custom_color'],
            'label'       => esc_html__( 'Custom Color for section', 'gutenblog-theme' ),
            'description'       => esc_html__( 'By default, colors are used from Common Elements', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_attr__( 'Custom', 'gutenblog-theme' ),
                'off' => esc_attr__( 'Common', 'gutenblog-theme' )
            ),
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_frontpage_footer_posts_slider_custom_color_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_footer_posts_slider_custom_color_bgcolor'],
            'priority'    => 11,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_footer_posts_slider_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_section_frontpage_footer_posts_slider_typography',
            'label'       => esc_attr__( 'Typography', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_footer_posts_slider',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_footer_posts_slider_typography'],
            'priority'    => 10,
            'output'      => array(
                array(
                    'element' => '.frontpage-posts-slider.footer-slider .entry-title a',
                ),
            ),
        );
    #Section -- /Footer Posts Slider

    #Section -- Promotion Banner
        $fields[] = array(
            'type'        => 'code',
            'settings'    => 'gutenblog_section_frontpage_promotion_banner_textarea',
            'label'       => esc_html__( 'Promotion Banner HTML', 'gutenblog-theme' ),
            'description' => esc_html__( 'Fill in textarea with HTML of custom Promotion Banner', 'gutenblog-theme' ),
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_promotion_banner_textarea'],
            'section'     => 'gutenblog_section_frontpage_promotion_banner',
            'priority'    => 1,
            'choices'     => [
                'language' => 'html',
            ],
        );
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'gutenblog_section_frontpage_promotion_banner_custom_color',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_promotion_banner_custom_color'],
            'label'       => esc_html__( 'Custom Color for section', 'gutenblog-theme' ),
            'description'       => esc_html__( 'By default, colors are used from Common Elements', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_promotion_banner',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_attr__( 'Custom', 'gutenblog-theme' ),
                'off' => esc_attr__( 'Common', 'gutenblog-theme' )
            ),
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_frontpage_promotion_banner_custom_color_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_promotion_banner',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_promotion_banner_custom_color_bgcolor'],
            'priority'    => 11,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_promotion_banner_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
    #Section -- /Promotion Banner

    #Section -- Subscribe Form
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'gutenblog_section_frontpage_subscribe_form_choice',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_choice'],
            'label'       => esc_html__( 'Choose whatever to output Form as Shortcode or HTML', 'gutenblog-theme' ),
            'description' => '',
            'section'     => 'gutenblog_section_frontpage_subscribe_form',
            'priority'    => 1,
            'choices'     => array( 
                'on'  => esc_attr__( 'Shortcode', 'gutenblog-theme' ), 
                'off' => esc_attr__( 'HTML', 'gutenblog-theme' ) 
            ),
        );

        $fields[] = array(
            'type'        => 'code',
            'settings'    => 'gutenblog_section_frontpage_subscribe_form_textarea',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_textarea'],
            'label'       => esc_html__( 'Subscribe Form HTML', 'gutenblog-theme' ),
            'description' => esc_html__( 'Fill in textarea with HTML of custom Subscribe Form. For example, you can use Mailchimp Plugin to generate the need form HTML', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_subscribe_form',
            'priority'    => 2,
            'choices'     => [
                'language' => 'html',
            ],
            'active_callback'  => array( 
                array( 
                    'setting'  => 'gutenblog_section_frontpage_subscribe_form_choice', 
                    'operator' => '==', 
                    'value'    => false 
                ) 
            ),
        );

        $fields[] = array(
            'type'        => 'text',
            'settings'    => 'gutenblog_section_frontpage_subscribe_form_shortcode',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_shortcode'],
            'label'       => esc_html__( 'Subscribe Form Shortcode', 'gutenblog-theme' ),
            'description' => esc_html__( 'Fill in input with Shortcode of custom Subscribe Form. For example, you can use Mailchimp Plugin to generate the need shortcode. Example: [mc4wp_form id="3451"]', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_subscribe_form',
            'priority'    => 2,
            'active_callback'  => array( 
                array( 
                    'setting'  => 'gutenblog_section_frontpage_subscribe_form_choice', 
                    'operator' => '==', 
                    'value'    => true 
                ) 
            ),
        );
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'gutenblog_section_frontpage_subscribe_form_custom_color',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_custom_color'],
            'label'       => esc_html__( 'Custom Color for section', 'gutenblog-theme' ),
            'description'       => esc_html__( 'By default, colors are used from Common Elements', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_subscribe_form',
            'priority'    => 3,
            'choices'     => array(
                'on'  => esc_attr__( 'Custom', 'gutenblog-theme' ),
                'off' => esc_attr__( 'Common', 'gutenblog-theme' )
            ),
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_frontpage_subscribe_form_custom_color_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_subscribe_form',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_custom_color_bgcolor'],
            'priority'    => 4,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_subscribe_form_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_frontpage_subscribe_form_form_custom_color_bgcolor',
            'label'       => esc_html__( 'Form Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_subscribe_form',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_form_custom_color_bgcolor'],
            'priority'    => 4,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_subscribe_form_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_frontpage_subscribe_form_heading_custom_color_color',
            'label'       => esc_html__( 'Form Text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_subscribe_form',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_heading_custom_color_color'],
            'priority'    => 4,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_subscribe_form_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_frontpage_subscribe_form_text_custom_color_color',
            'label'       => esc_html__( 'Form Text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_frontpage_subscribe_form',
            'default'     => $gutenblog_defaults['gutenblog_section_frontpage_subscribe_form_text_custom_color_color'],
            'priority'    => 4,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_section_frontpage_subscribe_form_custom_color', 'operator' => '==', 'value'    => '1', ),)
        );
    #Section -- /Subscribe Form

#Panel -- /Front Page

#Panel -- Footer

    #Section -- Footer Design
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_footer_design',
            'label'       => esc_html__( 'Footer Design', 'gutenblog-theme' ),
            'description' => '',
            'section'     => 'gutenblog_section_footer_design',
            'priority'    => 1,
            'multiple'    => 1,
            'default'     => $gutenblog_defaults['gutenblog_footer_design'],
            'choices'     => array(
                'default' => esc_html__( 'Default', 'gutenblog-theme' ),
                'parallax' => esc_html__( 'Parallax', 'gutenblog-theme' ),
            ),
        );
    #Section -- /Footer Design

    #Section -- Footer Content
        $fields[] = array(
            'type'        => 'textarea',
            'settings'    => 'gutenblog_footer_copyright',
            'label'       => esc_html__( 'Copyright Text', 'gutenblog-theme' ),
            'description' => esc_html__( 'Accepts HTML.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_footer',
            'priority'    => 2,
            'default'     => $gutenblog_defaults['gutenblog_footer_copyright'],
            'sanitize_callback' => 'force_balance_tags',
        );
        $fields[] = array(
            'type'        => 'textarea',
            'settings'    => 'gutenblog_footer_credit',
            'label'       => esc_html__( 'Credit', 'gutenblog-theme' ),
            'description' => esc_html__( 'Accepts HTML.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_footer',
            'priority'    => 2,
            'default'     => $gutenblog_defaults['gutenblog_footer_credit'],
            'sanitize_callback' => 'force_balance_tags',
        );
    #Section -- /Footer Content

    #Section -- Footer Colors
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_setting_footer_bgcolor',
            'label'       => esc_html__( 'Footer Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_footer_colors',
            'default'     => $gutenblog_defaults['gutenblog_setting_footer_bgcolor'],
            'choices'     => [
                'alpha' => true,
            ],
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_setting_footer_text_color',
            'label'       => esc_html__( 'Footer text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_footer_colors',
            'default'     => $gutenblog_defaults['gutenblog_setting_footer_text_color'],
            'choices'     => [
                'alpha' => true,
            ],
        );
    #Section -- /Footer Colors

    #Section -- Footer Logo  
        $fields[] = array(
            'type'        => 'image',
            'settings'    => 'gutenblog_footer_logo',
            'label'       => esc_html__( 'Footer logo', 'gutenblog-theme' ),
            'description' => esc_html__( 'Only in footer', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_footer_logo',
            'default'     => $gutenblog_defaults['gutenblog_footer_logo'],
        );
    #Section -- /Footer Logo
#Panel -- /Footer



#Section -- Site Identity (default)
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'gutenblog_image_logo_show',
        'label'       => esc_html__( 'Show Image Logo?', 'gutenblog-theme' ),
        'description' => esc_html__( 'Choose whether to display the image logo.', 'gutenblog-theme' ),
        'section'     => 'title_tagline',
        'priority'    => 1,
        'default'     => $gutenblog_defaults['gutenblog_image_logo_show'],
        'choices'     => array( 'on'  => esc_attr__( 'SHOW', 'gutenblog-theme' ), 'off' => esc_attr__( 'HIDE', 'gutenblog-theme' ) ),
    );
    
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'gutenblog_text_logo_sep1',
        'label'       => '<hr />', 
        'section'     => 'title_tagline',
        'priority'    => 3
    );

    $fields[] = array(
        'type'        => 'number',
        'settings'    => 'gutenblog_logo_width',
        'label'       => esc_html__( 'Logo Max Width', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'title_tagline',
        'priority'    => 8,
        'default'     => $gutenblog_defaults['gutenblog_logo_width'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_image_logo_show', 
                'operator' => '==', 
                'value'    => true 
            ) 
        ),
        'choices'     => [
            'min'  => 1,
            'max'  => 1500,
            'step' => 10,
        ],
        'sanitize_callback'=> '',
    );
    $fields[] = array(
        'type'        => 'number',
        'settings'    => 'gutenblog_logo_height',
        'label'       => esc_html__( 'Logo Max Height', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'title_tagline',
        'priority'    => 8,
        'default'     => $gutenblog_defaults['gutenblog_logo_height'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_image_logo_show', 
                'operator' => '==', 
                'value'    => true 
            ) 
        ),
        'choices'     => [
            'min'  => 1,
            'max'  => 1500,
            'step' => 10,
        ],
        'sanitize_callback'=> '',
    );
#Section -- /Site Identity (default)

#Section -- Header Image (default)

    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'gutenblog_banner_heading',
        'label'       => esc_html__( 'Caption Heading', 'gutenblog-theme' ),
        'section'     => 'header_image',
        'priority'    => 10,
        'default'     => $gutenblog_defaults['gutenblog_banner_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'gutenblog_banner_description',
        'label'       => esc_html__( 'Caption Description', 'gutenblog-theme' ),
        'section'     => 'header_image',
        'priority'    => 11,
        'default'     => $gutenblog_defaults['gutenblog_banner_description'],
        'sanitize_callback' => 'force_balance_tags'
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'gutenblog_banner_url',
        'label'       => esc_html__( 'Caption URL', 'gutenblog-theme' ),
        'section'     => 'header_image',
        'priority'    => 12,
        'default'     => $gutenblog_defaults['gutenblog_banner_url'],
        'sanitize_callback' => 'sanitize_text_field',
    );
#Section -- /Header Image (default)

#Panel -- Sidebar

    #Section -- Sidebar Design
        $fields[] = array(
            'type'        => 'radio-image',
            'settings'    => 'gutenblog_setting_sidebar_design',
            'label'       => esc_html__( 'Sidebar Design', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_sidebar_design',
            'default'     => $gutenblog_defaults['gutenblog_setting_sidebar_design'],
            'priority'    => 1,
            'choices'     => [
                'sidebar-design-1'   => get_template_directory_uri() . '/customize/images/sidebar-design-1.jpg',
                'sidebar-design-2' => get_template_directory_uri() . '/customize/images/sidebar-design-2.jpg',
            ],
        );
    #Section -- /Sidebar Design

    #Section -- Sidebar Title Design
        $fields[] = array(
            'type'        => 'radio-image',
            'settings'    => 'gutenblog_setting_sidebar_title_design',
            'label'       => esc_html__( 'Sidebar Title Design', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_sidebar_title_design',
            'default'     => $gutenblog_defaults['gutenblog_setting_sidebar_title_design'],
            'priority'    => 2,
            'choices'     => [
                'sidebar-title-design-1'   => get_template_directory_uri() . '/customize/images/sidebar-title-design-1.jpg',
                'sidebar-title-design-2' => get_template_directory_uri() . '/customize/images/sidebar-title-design-2.jpg',
                'sidebar-title-design-3' => get_template_directory_uri() . '/customize/images/sidebar-title-design-3.jpg',
            ],
        );
    #Section -- /Sidebar Title Design

    #Section -- Sidebar Color Settings
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_section_sidebar_title_color',
            'label'       => esc_html__( 'Title Color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_sidebar_color',
            'default'     => $gutenblog_defaults['gutenblog_section_sidebar_color'],
            'priority'    => 3,
        );
    #Section -- /Sidebar Color Settings
#Panel -- /Sidebar

#Panel -- Single Post

    #Section -- Single Post Layouts
        $fields[] = array(
            'type'        => 'radio-image',
            'settings'    => 'gutenblog_section_single_post_layout_select',
            'label'       => esc_html__( 'Select Single post Layout', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_layout',
            'default'     => $gutenblog_defaults['gutenblog_section_single_post_layout_select'],
            'priority'    => 10,
            'choices'     => [
                'Without-sidebar'   => get_template_directory_uri() . '/customize/images/without-sidebar.jpg',
                'Left-sidebar' => get_template_directory_uri() . '/customize/images/left-sidebar.jpg',
                'Right-sidebar' => get_template_directory_uri() . '/customize/images/right-sidebar.jpg',
            ],
        );
    #Section -- /Single Post Layouts

    #Section -- Single Post Meta

        $fields[] = array(
            'type'        => 'text',
            'settings'    => 'gutenblog_single_post_related_title',
            'label'       => esc_html__( '"Related Posts" - Title Text', 'gutenblog-theme' ),
            'description' => esc_html__( 'Leave empty to hide', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 1,
            'default'     => $gutenblog_defaults['gutenblog_single_post_related_title'],
        );

        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'gutenblog_single_post_meta_show',
            'label'       => esc_html__( 'Show Meta?', 'gutenblog-theme' ),
            'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts on the post page.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 1,
            'default'     => $gutenblog_defaults['gutenblog_single_post_meta_show'],
            'choices' => array( 'on'  => esc_attr__( 'SHOW', 'gutenblog-theme' ), 'off' => esc_attr__( 'HIDE', 'gutenblog-theme' ), )
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_single_post_date_show',
            'label'       => esc_html__( 'Show Date?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 2,
            'default'     => $gutenblog_defaults['gutenblog_single_post_date_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_single_post_category_show',
            'label'       => esc_html__( 'Show Category?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 3,
            'default'     => $gutenblog_defaults['gutenblog_single_post_category_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_single_post_author_show',
            'label'       => esc_html__( 'Show Author?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 4,
            'default'     => $gutenblog_defaults['gutenblog_single_post_author_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_single_post_tags_show',
            'label'       => esc_html__( 'Show Tags?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 5,
            'default'     => $gutenblog_defaults['gutenblog_single_post_tags_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
        );

        // if core plugin instaled
        if(defined('THEMES_MONSTERS_CORE')){
            $fields[] = array(
                'type'        => 'toggle',
                'settings'    => 'gutenblog_single_post_likes_show',
                'label'       => esc_html__( 'Show Likes?', 'gutenblog-theme' ),
                'section'     => 'gutenblog_section_single_post_meta',
                'priority'    => 5,
                'default'     => $gutenblog_defaults['gutenblog_single_post_likes_show'],
                'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
            );

        }

        // if core plugin instaled
        if(defined('THEMES_MONSTERS_CORE')){
            $fields[] = array(
                'type'        => 'radio',
                'settings'    => 'gutenblog_blog_feed_likes_or_rating_comment',
                'label'       => esc_html__( 'Show Likes or Rating on Comments?', 'gutenblog-theme' ),
                'section'     => 'gutenblog_section_single_post_meta',
                'priority'    => 6,
                'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_comment'],
                'choices'     => [
                    'likes'   => esc_html__( 'Likes', 'gutenblog-theme' ),
                    'rating' => esc_html__( 'Rating', 'gutenblog-theme' ),
                    'none' => esc_html__( 'Nothing', 'gutenblog-theme' ),
                ],
                'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
            );
            $fields[] = array(
                'type'        => 'toggle',
                'settings'    => 'gutenblog_blog_feed_likes_or_rating_comment_loggedin',
                'label'       => esc_html__( 'Allow setting Rating for Comments only for Logged In Users?', 'gutenblog-theme' ),
                'section'     => 'gutenblog_section_single_post_meta',
                'priority'    => 6,
                'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_comment_loggedin'],
                'active_callback'  => array( 
                    array( 
                        'setting'  => 'gutenblog_blog_feed_likes_or_rating_comment', 
                        'operator' => '==', 
                        'value'    => 'rating', 
                    ),
                )
            );
        }

        // if core plugin instaled
        if(defined('THEMES_MONSTERS_CORE')){
            $fields[] = array(
                'type'        => 'toggle',
                'settings'    => 'gutenblog_single_post_views_show',
                'label'       => esc_html__( 'Show Views?', 'gutenblog-theme' ),
                'section'     => 'gutenblog_section_single_post_meta',
                'priority'    => 5,
                'default'     => $gutenblog_defaults['gutenblog_single_post_views_show'],
                'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
            );
        }
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_single_post_meta_typography',
            'label'       => esc_attr__( 'Typography Post Meta', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_single_post_meta_typography'],
            'priority'    => 14,
            'output'      => array(
                array(
                    'element' => ' ',
                ),
            ),
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_posts_nav_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_single_post_sep2',
            'label'       => '<hr />',
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 5
        );
        
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_single_post_about_author_show',
            'label'       => esc_html__( 'Show About Author?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 5,
            'default'     => $gutenblog_defaults['gutenblog_single_post_about_author_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_single_post_share_show',
            'label'       => esc_html__( 'Show Share?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 5,
            'default'     => $gutenblog_defaults['gutenblog_single_post_share_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_single_post_likes_or_rating',
            'label'       => esc_html__( 'Show Rating?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 5,
            'default'     => $gutenblog_defaults['gutenblog_single_post_likes_or_rating'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_single_post_meta_show', 'operator' => '==', 'value'    => true, ), )
        );
        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_single_post_sep1',
            'label'       => '<hr />', 
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 6
        );


        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_posts_featured_image_show',
            'label'       => esc_html__( 'Show Featured Image ?', 'gutenblog-theme' ),
            'description' => esc_html__( 'Whether to show featured image at the beginning of the post.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 8,
            'default'     => $gutenblog_defaults['gutenblog_posts_featured_image_show']
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_section_single_post_overlay_show',
            'label'       => esc_html__('Show Overlay Color?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 9,
            'default'     => $gutenblog_defaults['gutenblog_section_single_post_overlay_show'],
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_posts_posts_nav_show',
            'label'       => esc_html__( 'Show Prev/Next Posts?', 'gutenblog-theme' ),
            'description' => esc_html__( 'Whether to show the previous and next post links after the post content.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 10,
            'default'     => $gutenblog_defaults['gutenblog_posts_posts_nav_show']
        );

        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_posts_posts_nav_show_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_posts_nav_show_bgcolor'],
            'priority'    => 11,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_posts_nav_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_posts_posts_nav_show_link_color',
            'label'       => esc_html__( 'Link color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_posts_nav_show_link_color'],
            'priority'    => 12,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_posts_nav_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_posts_posts_nav_show_arrow_color',
            'label'       => esc_html__( 'Arrow color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_posts_nav_show_arrow_color'],
            'priority'    => 13,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_posts_nav_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_posts_posts_nav_show_typography',
            'label'       => esc_attr__( 'Typography Prev/Next Posts', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_posts_nav_show_typography'],
            'priority'    => 14,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_posts_nav_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_single_post_sep1',
            'label'       => '<hr />',
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 15
        );



        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_posts_single_post_breadcrumbs_show',
            'label'       => esc_html__( 'Show Breadcrumbs in Single post?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 17,
            'default'     => $gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_show']
        );
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_posts_single_post_breadcrumbs_bar_show',
            'label'       => esc_html__( 'Show Breadcrumbs in Top Bar?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 17,
            'default'     => $gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_bar_show']
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_posts_single_post_breadcrumbs_bgcolor',
            'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_bgcolor'],
            'priority'    => 18,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_single_post_breadcrumbs_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_posts_single_post_breadcrumbs_link_color',
            'label'       => esc_html__( 'Link color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_link_color'],
            'priority'    => 19,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_single_post_breadcrumbs_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_posts_single_post_breadcrumbs_text_color',
            'label'       => esc_html__( 'Text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_text_color'],
            'priority'    => 20,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_single_post_breadcrumbs_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_posts_single_post_breadcrumbs_icon_color',
            'label'       => esc_html__( 'Icon color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_icon_color'],
            'priority'    => 21,
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_single_post_breadcrumbs_show', 'operator' => '==', 'value'    => '1', ),)
        );
        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_posts_single_post_breadcrumbs_typography',
            'label'       => esc_attr__( 'Typography Breadcrumbs', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'default'     => $gutenblog_defaults['gutenblog_posts_single_post_breadcrumbs_typography'],
            'priority'    => 22,
            'output'      => array(
                array(
                    'element' => '.single-post-breadcrumbs',
                ),
            ),
            'active_callback'  => array( array( 'setting'  => 'gutenblog_posts_single_post_breadcrumbs_show', 'operator' => '==', 'value'    => '1', ),)
        );

        $fields[] = array(
            'type'        => 'custom',
            'settings'    => 'gutenblog_single_post_sep3',
            'label'       => '<hr />',
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 23
        );


        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_single_related_posts',
            'label'       => esc_html__( 'Show Related Posts?', 'gutenblog-theme' ),
            'description' => esc_html__( 'Whether to show "Related Posts" after the post content.', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 24,
            'default'     => $gutenblog_defaults['gutenblog_single_related_posts']
        );

        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_single_related_posts_number',
            'label'       => esc_html__( 'Number of "Related Posts" to show', 'gutenblog-theme' ),
            'description' => '',
            'section'     => 'gutenblog_section_single_post_meta',
            'priority'    => 25,
            'multiple'    => 1,
            'choices'     => [
                '2' => '2',
                '3' => '3',
                '4' => '4',
            ],
            'default'     => $gutenblog_defaults['gutenblog_single_related_posts_number'],
            'active_callback'  => array( 
                array( 
                    'setting'  => 'gutenblog_single_related_posts', 
                    'operator' => '==', 
                    'value'    => 1 
                ) 
            ),

        );
    #Section -- /Single Post Meta

    #Section -- Single Post Design
        $fields[] = array(
            'type'        => 'radio-image',
            'settings'    => 'gutenblog_section_single_post_design_select',
            'label'       => esc_html__( 'Select Single post Design', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_post_design',
            'default'     => $gutenblog_defaults['gutenblog_section_single_post_design_select'],
            'priority'    => 10,
            'choices'     => [
                'single-post-1'   => get_template_directory_uri() . '/customize/images/single-post-deisng-1.jpg',
                'single-post-2' => get_template_directory_uri() . '/customize/images/single-post-deisng-2.jpg',
                'single-post-3' => get_template_directory_uri() . '/customize/images/single-post-deisng-3.jpg',
            ],
        );
    #Section -- /Single Post Design

    #Section -- Single Sidebar
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'gutenblog_section_single_post_sidebar_design',
            'label'       => esc_html__( 'Single Sidebar Design', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_single_sidebar',
            'default'     => $gutenblog_defaults['gutenblog_section_single_post_sidebar_design'],
            'priority'    => 10,
            'choices'     => [
                'default' => esc_html__( 'Default Design', 'gutenblog-theme' ),
                'sticky'  => esc_html__( 'Sticky Sidebar', 'gutenblog-theme' ),
            ],
        );
    #Section -- /Single Sidebar

#Panel -- /Single Post



#Panel -- 404 Page

        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_setting_404_page_bgcolor',
            'label'       => esc_html__( 'Background Color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_404_page_colors',
            'default'     => $gutenblog_defaults['gutenblog_setting_404_page_bgcolor'],
            'priority'    => 1,
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_setting_404_page_text_color',
            'label'       => esc_html__( 'Text Color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_404_page_colors',
            'default'     => $gutenblog_defaults['gutenblog_setting_404_page_text_color'],
            'priority'    => 2,
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_setting_404_page_link_color',
            'label'       => esc_html__( 'Link Color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_404_page_colors',
            'default'     => $gutenblog_defaults['gutenblog_setting_404_page_link_color'],
            'priority'    => 2,
        );
#Panel -- /404 Page

    
    



    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_mobile_wrap_bgcolor',
        'label'       => esc_html__( 'Mobile Header Background Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_mobile_menu_color',
        'default'     => $gutenblog_defaults['gutenblog_mobile_wrap_bgcolor'],
        'priority'    => 3,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_mobile_menu_icon_color',
        'label'       => esc_html__( 'Mobile Menu Icon Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_mobile_menu_color',
        'default'     => $gutenblog_defaults['gutenblog_mobile_menu_icon_color'],
        'priority'    => 3,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_mobile_first_level_menu_link_color',
        'label'       => esc_html__( 'Mobile First Level Menu Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_mobile_menu_color',
        'default'     => $gutenblog_defaults['gutenblog_mobile_first_level_menu_link_color'],
        'priority'    => 3,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_mobile_first_level_menu_link_bg_color',
        'label'       => esc_html__( 'Mobile First Level Menu HOVER Background Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_mobile_menu_color',
        'default'     => $gutenblog_defaults['gutenblog_mobile_first_level_menu_link_bg_color'],
        'priority'    => 5,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_mobile_second_level_menu_link_color',
        'label'       => esc_html__( 'Mobile Second Level Menu Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_mobile_menu_color',
        'default'     => $gutenblog_defaults['gutenblog_mobile_second_level_menu_link_color'],
        'priority'    => 3,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_mobile_second_level_menu_link_bg_color',
        'label'       => esc_html__( 'Mobile Second Level Menu Background Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_mobile_menu_color',
        'default'     => $gutenblog_defaults['gutenblog_mobile_second_level_menu_link_bg_color'],
        'priority'    => 5,
    );


    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_heading_color',
        'label'       => esc_html__( 'Heading color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_feed_colors',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_heading_color'],
        'priority'    => 3,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_title_color',
        'label'       => esc_html__( 'Post Title color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_feed_colors',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_title_color'],
        'priority'    => 4,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_title_hover_color',
        'label'       => esc_html__( 'Post Title Hover color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_feed_colors',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_title_hover_color'],
        'priority'    => 5,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_description_color',
        'label'       => esc_html__( 'Post Description color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_feed_colors',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_description_color'],
        'priority'    => 6,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_frontpage_blog_feed_entry_meta_color',
        'label'       => esc_html__( 'Entry Meta color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_feed_colors',
        'default'     => $gutenblog_defaults['gutenblog_section_frontpage_blog_feed_entry_meta_color'],
        'priority'    => 7,
    );


    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_subscribe_form_bg_colors',
        'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_subscribe_form_colors',
        'default'     => $gutenblog_defaults['gutenblog_section_subscribe_form_colors'],
        'priority'    => 1,
    );
    $fields[] = array(
        'type'        => 'image',
        'settings'    => 'gutenblog_section_subscribe_form_background_image_colors',
        'label'       => esc_html__( 'Background image', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_subscribe_form_colors',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_section_subscribe_form_background_image_colors'],
    );






    $fields[] = array(
        'type'     => 'text',
        'settings' => 'gutenblog_section_socials_facebook',
        'label'    => esc_html__( 'Facebook Url', 'gutenblog-theme' ),
        'section'  => 'gutenblog_section_socials_links',
        'default'  => $gutenblog_defaults['gutenblog_section_socials_facebook'],
        'priority' => 10,
     );
    $fields[] = array(
        'type'     => 'text',
        'settings' => 'gutenblog_section_socials_google',
        'label'    => esc_html__( 'Google + Url', 'gutenblog-theme' ),
        'section'  => 'gutenblog_section_socials_links',
        'default'  => $gutenblog_defaults['gutenblog_section_socials_google'],
        'priority' => 10,
     );
    $fields[] = array(
        'type'     => 'text',
        'settings' => 'gutenblog_section_socials_instagram',
        'label'    => esc_html__( 'Instagram Url', 'gutenblog-theme' ),
        'section'  => 'gutenblog_section_socials_links',
        'default'  => $gutenblog_defaults['gutenblog_section_socials_instagram'],
        'priority' => 10,
     );
    $fields[] = array(
        'type'     => 'text',
        'settings' => 'gutenblog_section_socials_twitter',
        'label'    => esc_html__( 'Twitter Url', 'gutenblog-theme' ),
        'section'  => 'gutenblog_section_socials_links',
        'default'  => $gutenblog_defaults['gutenblog_section_socials_twitter'],
        'priority' => 10,
     );
    $fields[] = array(
        'type'     => 'text',
        'settings' => 'gutenblog_section_socials_behance',
        'label'    => esc_html__( 'Behance Url', 'gutenblog-theme' ),
        'section'  => 'gutenblog_section_socials_links',
        'default'  => $gutenblog_defaults['gutenblog_section_socials_behance'],
        'priority' => 10,
     );


    
    $fields[] = array(
        'type'     => 'sortable',
        'settings' => 'gutenblog_section_socials_order_links',
        'label'    => esc_html__( 'Social Links Order', 'gutenblog-theme' ),
        'section'  => 'gutenblog_section_socials_order',
        'default'     => $gutenblog_defaults['gutenblog_section_socials_order_links'],
        'choices'     => array(
            'facebook'          => esc_html__( 'Facebook', 'gutenblog-theme' ),
            'twitter'          => esc_html__( 'Twitter', 'gutenblog-theme' ),
            'google'          => esc_html__( 'Google', 'gutenblog-theme' ),
            'instagram'          => esc_html__( 'Instagram', 'gutenblog-theme' ),
            'behance'          => esc_html__( 'Behance', 'gutenblog-theme' ),
        ),
        'priority' => 10,
    );

    /* Main Color BG */
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'gutenblog_container_layout',
        'label'       => esc_html__( 'Site Conteiner Layout', 'gutenblog-theme' ),
        'description' => esc_html__( 'Choose "Boxed" or "Full Width" Layout', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_main_color',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_container_layout'],
        'choices' => array( 
            'on'  => esc_attr__( 'Boxed', 'gutenblog-theme' ), 
            'off' => esc_attr__( 'Full Width', 'gutenblog-theme' ), 
        )
    );

    $fields[] = array(
        'type'     => 'link',
        'settings' => 'gutenblog_section_blog_main_background_img_link',
        'label'    => esc_html__( 'Background Image Link', 'gutenblog-theme' ),
        'section'  => 'gutenblog_section_blog_main_color',
        'default'  => $gutenblog_defaults['gutenblog_section_blog_main_background_img_link'],
        'priority' => 2,
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_container_layout', 
                'operator' => '==', 
                'value'    => true, 
            ),
        ),
        
    );
    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'gutenblog_section_blog_main_background_img_setting',
        'label'       => esc_html__( 'Background Image Position', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_blog_main_color',
        'default'     => $gutenblog_defaults['gutenblog_section_blog_main_background_img_setting'],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body, .body-background-inner-before-footer',
            ],
        ],
    );
    






    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_primary_colors_main_color',
        'label'       => esc_html__( 'Main color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Color of basic design elements (corporate color).', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_primary_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_primary_colors_main_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_primary_colors_inverse_color',
        'label'       => esc_html__( 'Inverse color', 'gutenblog-theme' ),
        'description' => esc_html__( 'INVERSE Color of basic design elements (corporate color).', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_primary_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_primary_colors_inverse_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );



    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_first_overlay_color',
        'label'       => esc_html__( 'First Overlay Color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Main Overlay Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_overlay_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_first_overlay_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_second_overlay_color',
        'label'       => esc_html__( 'Second Overlay Color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Second Overlay Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_overlay_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_second_overlay_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_first_overlay_hover_color',
        'label'       => esc_html__( 'First Overlay HOVER Color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Only on Hover', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_overlay_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_first_overlay_hover_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_second_overlay_hover_color',
        'label'       => esc_html__( 'Second Overlay HOVER Color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Only on Hover', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_overlay_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_second_overlay_hover_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );









    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_sorting_bg_colors',
        'label'       => esc_html__( '"flying" Background color on sorting links', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_sorting_colors',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_setting_sorting_bg_colors'],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_sorting_link_color',
        'label'       => esc_html__( 'Sorting and tabs Link Color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Link Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_sorting_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_sorting_link_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_sorting_active_color',
        'label'       => esc_html__( 'Active Sorting and tabs Link Color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Active Link color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_sorting_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_sorting_active_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_sorting_icon_color',
        'label'       => esc_html__( 'Sorting Icon Color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Icon Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_sorting_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_sorting_icon_color'],
        'choices'     => [
            'alpha' => true,
        ],
    );
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_setting_sorting_typography',
        'label'       => esc_attr__( 'Sorting typography', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_sorting_colors',
        'default'     => $gutenblog_defaults['gutenblog_setting_sorting_typography'],
        'priority'    => 5,
        'output'      => array(
            array(
                'element' => '.blog-feed-sort-option,
                               .blog-feed-sort-option-link,
                               .themesmonsters-tab a',
            ),
        ),
    );




    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_typography_text_color',
        'label'       => esc_html__( 'Text color', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_typography_colors',
        'priority'    => 1,
        'default'     => $gutenblog_defaults['gutenblog_setting_typography_text_color'],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_typography_h1_color',
        'label'       => esc_html__( 'Heading H1 color', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_typography_colors',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_setting_typography_h1_color'],
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_typography_h2_color',
        'label'       => esc_html__( 'Heading H2 color', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_typography_colors',
        'priority'    => 3,
        'default'     => $gutenblog_defaults['gutenblog_setting_typography_h2_color'],
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_typography_h3_color',
        'label'       => esc_html__( 'Heading H3 color', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_typography_colors',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_setting_typography_h3_color'],
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_typography_h4_color',
        'label'       => esc_html__( 'Heading H4 color', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_typography_colors',
        'priority'    => 5,
        'default'     => $gutenblog_defaults['gutenblog_setting_typography_h4_color'],
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_typography_h5_color',
        'label'       => esc_html__( 'Heading H5 color', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_typography_colors',
        'priority'    => 6,
        'default'     => $gutenblog_defaults['gutenblog_setting_typography_h5_color'],
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_setting_typography_h6_color',
        'label'       => esc_html__( 'Heading H6 color', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_typography_colors',
        'priority'    => 7,
        'default'     => $gutenblog_defaults['gutenblog_setting_typography_h6_color'],
    );








    










    





    /* gutenblog_section_blog_feed */
    #-----------------------------------------

    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'gutenblog_blog_feed_label',
        'label'       => esc_html__( 'Heading for Blog Feed', 'gutenblog-theme' ),
        'description' => esc_html__( 'The `Recent Posts` label for the blog feed.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 1,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_label'],
        'sanitize_callback'=> 'sanitize_text_field'
    );

    $fields[] = array(
         'type'        => 'switch',
         'settings'    => 'gutenblog_blog_feed_category_enable',
         'label'       => esc_html__( 'Enable Selecting of Post Feed Category?', 'gutenblog-theme' ),
         'description' => '',
         'section'     => 'gutenblog_section_blog_meta',
         'priority'    => 1,
         'default'     => $gutenblog_defaults['gutenblog_blog_feed_category_enable'],
         'choices' => array( 
            'on'  => esc_attr__( 'Enable', 'gutenblog-theme' ), 
            'off' => esc_attr__( 'Disable', 'gutenblog-theme' ), 
         ),

    );

    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'gutenblog_blog_feed_category',
        'label'       => esc_html__( 'Posts Feed - Category', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 1,
        'multiple'    => 10,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_category'],
        'choices'     => Kirki_Helper::get_terms( 'category' ),
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_blog_feed_category_enable', 
                'operator' => '==', 
                'value'    => 1, 
            ),
         )
    );



    $fields[] = array(
        'type'        => 'radio',
        'settings'    => 'gutenblog_blog_feed_thumbs_size',
        'label'       => esc_html__( 'Thumbnail Size', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 1,
        'multiple'    => 10,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_thumbs_size'],
        'choices'     => array(
            'gutenblog-default' => esc_attr__( 'Default Thumbnail Size', 'gutenblog-theme' ), 
            'gutenblog-square'  => esc_attr__( 'Square (1:1)', 'gutenblog-theme' ), 
            'gutenblog-horizontal' => esc_attr__( 'Horizontal (2:1)', 'gutenblog-theme' ), 
            'gutenblog-vertical' => esc_attr__( 'Vertical (1:2)', 'gutenblog-theme' ), 
        )
    );



    

    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'gutenblog_blog_feed_meta_show',
        'label'       => esc_html__( 'Show Meta?', 'gutenblog-theme' ),
        'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts in the blog feed. This applies to all blog feeds on all pages, including the front page.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_meta_show'],
        'choices' => array( 'on'  => esc_attr__( 'SHOW', 'gutenblog-theme' ), 'off' => esc_attr__( 'HIDE', 'gutenblog-theme' ), )
    );

    $fields[] = array(
         'type'        => 'radio',
         'settings'    => 'gutenblog_blog_feed_description_show',
         'label'       => esc_html__( 'Show Posts Content?', 'gutenblog-theme' ),
         'description' => esc_html__( 'hide or show posts content in feed as?', 'gutenblog-theme' ),
         'section'     => 'gutenblog_section_blog_meta',
         'priority'    => 2,
         'default'     => $gutenblog_defaults['gutenblog_blog_feed_description_show'],
         'choices' => array( 
            'hide' => esc_attr__( 'Hide', 'gutenblog-theme' ), 
            'content'  => esc_attr__( 'Content', 'gutenblog-theme' ), 
            'excerpt' => esc_attr__( 'Excerpt', 'gutenblog-theme' ), 
        )
    );

    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_gallery_content_slider',
        'label'       => esc_html__( 'Show Content(Slider) instead of Thumbnail for Gallery Post Format?', 'gutenblog-theme' ),
        'description' => esc_html__( 'For proper work, you need to add "Gallery" element in Guttenberg at the start of the page and straight after that add a "More" element to separate next content of the page.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_gallery_content_slider'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_blog_feed_description_show', 
                'operator' => '==', 
                'value'    => 'content', 
            ),
        )
    );

    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_video_content',
        'label'       => esc_html__( 'Show Content(Video Player) instead of Thumbnail for Video Post Format?', 'gutenblog-theme' ),
        'description' => esc_html__( 'For proper work, you need to add "Video" element in Guttenberg at the start of the page and straight after that add a "More" element to separate next content of the page.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_video_content'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_blog_feed_description_show', 
                'operator' => '==', 
                'value'    => 'content', 
            ),
        )
    );

    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_audio_content',
        'label'       => esc_html__( 'Show Content(Audio Player) instead of Thumbnail for Audio Post Format?', 'gutenblog-theme' ),
        'description' => esc_html__( 'For proper work, you need to add iframe element with audio content in Guttenberg at the start of the page and straight after that add a "More" element to separate next content of the page.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_audio_content'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_blog_feed_description_show', 
                'operator' => '==', 
                'value'    => 'content', 
            ),
        )
    );


    $fields[] = array(
         'type'        => 'number',
         'settings'    => 'gutenblog_blog_feed_formats_show_lenght',
         'label'       => esc_html__( 'Lenght of Excerpt', 'gutenblog-theme' ),
         'description' => esc_html__( 'Type the lenght number from 10 to 200 words', 'gutenblog-theme' ),
         'section'     => 'gutenblog_section_blog_meta',
         'priority'    => 2,
         'choices'     => [
            'min'  => 10,
            'max'  => 200,
            'step' => 1,
          ],
         'default'     => $gutenblog_defaults['gutenblog_blog_feed_formats_show_lenght'],
         'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_blog_feed_description_show', 
                'operator' => '==', 
                'value'    => 'excerpt', 
            ),
         )
     );


    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_date_show',
        'label'       => esc_html__( 'Show Date on Meta?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 3,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_date_show'],
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_thumbnail_date_show',
        'label'       => esc_html__( 'Show Date on Thumbnail?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 3,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_thumbnail_date_show'],
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );

    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_category_show',
        'label'       => esc_html__( 'Show Category?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 6,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_category_show'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_blog_feed_meta_show', 
                'operator' => '==', 
                'value'    => true, 
            ),
        )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_author_show',
        'label'       => esc_html__( 'Show Author?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 7,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_author_show'],
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_comments_show',
        'label'       => esc_html__( 'Show Comments?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 8,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_comments_show'],
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_share_show',
        'label'       => esc_html__( 'Show Share?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 9,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_share_show'],
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_overlay_show',
        'label'       => esc_html__('Show Overlay Color?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 10,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_overlay_show'],
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_custom_overlay_show',
        'label'       => esc_html__('Custom Overlay color?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 11,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_custom_overlay_show'],
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_overlay_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_custom_overlay_color_first',
        'label'       => esc_html__( 'First Overlay color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_custom_overlay_color_first'],
        'priority'    => 12,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_custom_overlay_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_custom_overlay_color_second',
        'label'       => esc_html__( 'Second Overlay color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_custom_overlay_color_second'],
        'priority'    => 13,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_custom_overlay_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_overlay_hover_show',
        'label'       => esc_html__('Show Overlay on Hover Color?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 14,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_overlay_hover_show'],
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_custom_overlay_hover_show',
        'label'       => esc_html__('Custom Overlay color?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 15,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_custom_overlay_hover_show'],
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_custom_overlay_hover_color_first',
        'label'       => esc_html__( 'First Overlay color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_custom_overlay_hover_color_first'],
        'priority'    => 16,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_custom_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_custom_overlay_hover_color_second',
        'label'       => esc_html__( 'Second Overlay color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_custom_overlay_hover_color_second'],
        'priority'    => 17,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_custom_overlay_hover_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_blog_feed_sorting_show',
        'label'       => esc_html__('Show Sorting?', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'priority'    => 18,
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_sorting_show'],
    );


    // Sortable Shares
    $fields[] = array(
        'type'        => 'sortable',
        'settings'    => 'gutenblog_social_networks_order',
        'label'       => esc_html__( 'Social Media Order', 'gutenblog-theme' ),
        'description' => esc_html__( 'Choose which social media icons you want to display on your website and which order', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_meta',
        'default'     => array(
            'facebook',
            'twitter',
            'pocket'
        ),
        'choices'     => array(
            'facebook'          => esc_html__( 'Facebook', 'gutenblog-theme' ),
            'twitter'           => esc_html__( 'Twitter', 'gutenblog-theme' ),
            'pocket' => esc_html__( 'Pocket', 'gutenblog-theme' ),
            'pinterest'        => esc_html__( 'Pinterest', 'gutenblog-theme' ),
            'vk'        => esc_html__( 'VK', 'gutenblog-theme' ),
        ),
        'active_callback' => [
            [
                'setting'  => 'gutenblog_blog_feed_share_show',
                'operator' => '==',
                'value'    => true,
            ]
        ],
        'priority'    => 10,
    );


    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_blog_feed_readmore_design',
        'label'       => esc_html__( 'Read More Design', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_readmore_design'],
        'priority'    => 1,
        'choices'     => [
            'readmore-design-1'   => get_template_directory_uri() . '/customize/images/readmore-design-1.jpg',
            'readmore-design-2' => get_template_directory_uri() . '/customize/images/readmore-design-2.jpg',
        ],
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'gutenblog_button_color_hr_1',
        'label'       => '<hr />',
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 2
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_button_color_gradient_1',
        'label'       => esc_html__( 'Gradient Color 1 for "Read More" buttons', 'gutenblog-theme' ),
        'description' => esc_html__( 'If the button design contains this color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 3,
        'default'     => $gutenblog_defaults['gutenblog_button_color_gradient_1'],
        'active_callback'  => [
            [
                'setting'  => 'gutenblog_blog_feed_readmore_design',
                'operator' => '==',
                'value'    => 'readmore-design-1',
            ],
        ]
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_button_color_gradient_2',
        'label'       => esc_html__( 'Gradient Color 2 for "Read More" buttons', 'gutenblog-theme' ),
        'description' => esc_html__( 'If the button design contains this color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_button_color_gradient_2'],
        'active_callback'  => [
            [
                'setting'  => 'gutenblog_blog_feed_readmore_design',
                'operator' => '==',
                'value'    => 'readmore-design-1',
            ],
        ]
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_button_readmore_text_color',
        'label'       => esc_html__( 'Text Color for "Read More" buttons', 'gutenblog-theme' ),
        'description' => esc_html__( 'If the button design contains this color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_button_readmore_text_color'],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_button_readmore_icon_color',
        'label'       => esc_html__( 'Icon Color for "Read More" buttons', 'gutenblog-theme' ),
        'description' => esc_html__( 'If the button design contains this color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_button_readmore_icon_color'],
        'active_callback'  => [
            [
                'setting'  => 'gutenblog_blog_feed_readmore_design',
                'operator' => '==',
                'value'    => 'readmore-design-2',
            ],
        ]
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'gutenblog_button_color_hr_2',
        'label'       => '<hr />',
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 5
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_button_color_gradient_hover_1',
        'label'       => esc_html__( 'Gradient Color 1 for "Read More" buttons on Hover', 'gutenblog-theme' ),
        'description' => esc_html__( 'If the button design contains this color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 6,
        'default'     => $gutenblog_defaults['gutenblog_button_color_gradient_hover_1'],
        'active_callback'  => [
            [
                'setting'  => 'gutenblog_blog_feed_readmore_design',
                'operator' => '==',
                'value'    => 'readmore-design-1',
            ],
        ]
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_button_color_gradient_hover_2',
        'label'       => esc_html__( 'Gradient Color 2 for "Read More" buttons on Hover', 'gutenblog-theme' ),
        'description' => esc_html__( 'If the button design contains this color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 7,
        'default'     => $gutenblog_defaults['gutenblog_button_color_gradient_hover_2'],
        'active_callback'  => [
            [
                'setting'  => 'gutenblog_blog_feed_readmore_design',
                'operator' => '==',
                'value'    => 'readmore-design-1',
            ],
        ]
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_button_readmore_icon_hover_color',
        'label'       => esc_html__( 'Icon HOVER Color for "Read More" buttons', 'gutenblog-theme' ),
        'description' => esc_html__( 'If the button design contains this color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_button_readmore_icon_hover_color'],
        'active_callback'  => [
            [
                'setting'  => 'gutenblog_blog_feed_readmore_design',
                'operator' => '==',
                'value'    => 'readmore-design-2',
            ],
        ]
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_button_readmore_text_hover_color',
        'label'       => esc_html__( 'Text HOVER Color for "Read More" buttons', 'gutenblog-theme' ),
        'description' => esc_html__( 'If the button design contains this color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_readmore',
        'priority'    => 4,
        'default'     => $gutenblog_defaults['gutenblog_button_readmore_text_hover_color'],
    );

    // if core plugin instaled
    if(defined('THEMES_MONSTERS_CORE')){

        
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_blog_feed_views_show',
            'label'       => esc_html__( 'Show Views?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_views_show'],
            'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
        );


        $fields[] = array(
            'type'        => 'typography',
            'settings'    => 'gutenblog_blog_feed_views_typography',
            'label'       => esc_attr__( 'Typography', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_views_typography'],
            'priority'    => 7,
            'output'      => array(
                array(
                    'element' => '.views-label,
                                  .rating-label,
                                  .likes-label,
                                  .comments-numbers',
                ),
            ),
            'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_views_show', 'operator' => '==', 'value'    => '1', ),)
        );


        $fields[] = array(
            'type'        => 'radio',
            'settings'    => 'gutenblog_blog_feed_likes_or_rating',
            'label'       => esc_html__( 'Show Likes or Rating?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating'],
            'choices'     => [
                'likes'   => esc_html__( 'Likes', 'gutenblog-theme' ),
                'rating' => esc_html__( 'Rating', 'gutenblog-theme' ),
                'none' => esc_html__( 'Nothing', 'gutenblog-theme' ),
            ],
            'active_callback'  => array( 
                array( 
                    'setting'  => 'gutenblog_blog_feed_meta_show', 
                    'operator' => '==', 
                    'value'    => true, 
                ),
            )
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_blog_feed_likes_or_rating_counter_bgcolor',
            'label'       => esc_html__( 'Counter Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_counter_bgcolor'],
            'active_callback'  => array(
                array(
                    'setting'  => 'gutenblog_blog_feed_likes_or_rating',
                    'operator' => '==',
                    'value'    => 'rating',
                ),
            )
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_blog_feed_likes_or_rating_counter_color',
            'label'       => esc_html__( 'Counter Text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_counter_color'],
            'active_callback'  => array(
                array(
                    'setting'  => 'gutenblog_blog_feed_likes_or_rating',
                    'operator' => '==',
                    'value'    => 'rating',
                ),
            )
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_blog_feed_likes_or_rating_buttons_bgcolor',
            'label'       => esc_html__( 'Buttons Background color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_buttons_bgcolor'],
            'active_callback'  => array(
                array(
                    'setting'  => 'gutenblog_blog_feed_likes_or_rating',
                    'operator' => '==',
                    'value'    => 'rating',
                ),
            )
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_blog_feed_likes_or_rating_buttons_color',
            'label'       => esc_html__( 'Buttons Text color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_buttons_color'],
            'active_callback'  => array(
                array(
                    'setting'  => 'gutenblog_blog_feed_likes_or_rating',
                    'operator' => '==',
                    'value'    => 'rating',
                ),
            )
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_blog_feed_likes_or_rating_buttons_hover_bgcolor',
            'label'       => esc_html__( 'Buttons Background HOVER color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_buttons_hover_bgcolor'],
            'active_callback'  => array(
                array(
                    'setting'  => 'gutenblog_blog_feed_likes_or_rating',
                    'operator' => '==',
                    'value'    => 'rating',
                ),
            )
        );
        $fields[] = array(
            'type'        => 'color',
            'settings'    => 'gutenblog_blog_feed_likes_or_rating_buttons_hover_color',
            'label'       => esc_html__( 'Buttons Text HOVER color', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_buttons_hover_color'],
            'active_callback'  => array(
                array(
                    'setting'  => 'gutenblog_blog_feed_likes_or_rating',
                    'operator' => '==',
                    'value'    => 'rating',
                ),
            )
        );

        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_blog_feed_likes_or_rating_loggedin',
            'label'       => esc_html__( 'Allow setting Rating only for Logged In Users?', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_blog_meta',
            'priority'    => 6,
            'default'     => $gutenblog_defaults['gutenblog_blog_feed_likes_or_rating_loggedin'],
            'active_callback'  => array( 
                array( 
                    'setting'  => 'gutenblog_blog_feed_likes_or_rating', 
                    'operator' => '==', 
                    'value'    => 'rating', 
                ),
            )
        );
    }



    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_blog_feed_post_format',
        'label'       => esc_html__( 'Post Display Layouts (With Sidebar)', 'gutenblog-theme' ),
        'description' => esc_html__( 'For "One Full Column and Two below" and "One Full column" setting choices "Layout Columns" setting which shown below is disabled', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_layouts',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_post_format'],
        'priority'    => 10,
        'choices'     => array(
            'Mixed'   => get_template_directory_uri() . '/customize/images/layout-mixed.jpg',
            'Small' => get_template_directory_uri() . '/customize/images/layout-small.jpg',
            'Full-one'  => get_template_directory_uri() . '/customize/images/layout-full-one.jpg',
            'Mixed-Full-List'  => get_template_directory_uri() . '/customize/images/layout-mixed-full-list.jpg',
            'Mixed-Full-Grid'  => get_template_directory_uri() . '/customize/images/layout-mixed-full-grid.jpg',
            'Masonry'  => get_template_directory_uri() . '/customize/images/layout-masonry.jpg',
            'List'  => get_template_directory_uri() . '/customize/images/layout-list.jpg',
            // 'Puzzle'  => get_template_directory_uri() . '/customize/images/layout-list.jpg',
        ),
    );
    
    $fields[] = array(
        'type'        => 'radio',
        'settings'    => 'gutenblog_blog_feed_columns',
        'label'       => esc_html__( 'Layout Columns', 'gutenblog-theme'),
        'section'     => 'gutenblog_section_blog_layouts',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_columns'],
        'priority'    => 10,
        'choices'     => array(
            'columns-2'   => array(
                esc_attr__( '2 Columns', 'gutenblog-theme' ),
            ),
            'columns-3'   => array(
                esc_attr__( '3 Columns', 'gutenblog-theme' ),
            ),
            'columns-4'   => array(
                esc_attr__( '4 Columns', 'gutenblog-theme' ),
            ),
        ),
        'active_callback'  => array( 
            array( 
                array( 
                    'setting'  => 'gutenblog_blog_feed_post_format', 
                    'operator' => '==', 
                    'value'    => 'Small', 
                ),
                array( 
                    'setting'  => 'gutenblog_blog_feed_post_format', 
                    'operator' => '==', 
                    'value'    => 'Mixed-Full-List', 
                ),
                array( 
                    'setting'  => 'gutenblog_blog_feed_post_format', 
                    'operator' => '==', 
                    'value'    => 'Mixed-Full-Grid ', 
                ),
                array( 
                    'setting'  => 'gutenblog_blog_feed_post_format', 
                    'operator' => '==', 
                    'value'    => 'Masonry', 
                ),
                array( 
                    'setting'  => 'gutenblog_blog_feed_post_format', 
                    'operator' => '==', 
                    'value'    => 'List', 
                ),
                array( 
                    'setting'  => 'gutenblog_blog_feed_post_format', 
                    'operator' => '==', 
                    'value'    => 'Puzzle', 
                ), 
            )
        )
    );

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_blog_feed_pagination_select',
        'label'       => esc_html__( 'Pagination Layout', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_select'],
        'priority'    => 10,
        'choices'     => [
            'Arrows'   => get_template_directory_uri() . '/customize/images/pagination-arrows.jpg',
            'Numbers' => get_template_directory_uri() . '/customize/images/pagination-numbers.jpg',
            'Load-more'  => get_template_directory_uri() . '/customize/images/pagination-loadmore.jpg',
            'Infinite-scroll'  => get_template_directory_uri() . '/customize/images/pagination-infinite-scroll.jpg',
        ],
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_arrows_text_color',
        'label'       => esc_html__( 'Text color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_arrows_text_color'],
        'priority'    => 11,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Arrows', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_arrows_icon_color',
        'label'       => esc_html__( 'Icon color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_arrows_icon_color'],
        'priority'    => 11,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Arrows', ),)
    );
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_blog_feed_pagination_arrows_typography',
        'label'       => esc_attr__( 'Title typography', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_arrows_typography'],
        'priority'    => 12,
        'output'      => array(
            array(
                'element' => '.pagination-blog-feed a',
            ),
        ),
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Arrows', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_numbers_text_color',
        'label'       => esc_html__( 'Text color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_text_color'],
        'priority'    => 13,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Numbers', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_numbers_bgcolor',
        'label'       => esc_html__( 'Background color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_bgcolor'],
        'priority'    => 14,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Numbers', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_numbers_current_text_color',
        'label'       => esc_html__( 'Current Text color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_current_text_color'],
        'priority'    => 15,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Numbers', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_numbers_current_bgcolor',
        'label'       => esc_html__( 'Current Background color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_current_bgcolor'],
        'priority'    => 15,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Numbers', ),)
    );
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_blog_feed_pagination_numbers_typography',
        'label'       => esc_attr__( 'Load more Typography', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_numbers_typography'],
        'priority'    => 16,
        'output'      => array(
            array(
                'element' => '.gutenblog-nav-links',
            ),
        ),
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Numbers', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_load_more_bgcolor',
        'label'       => esc_html__( 'Load more Background color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_load_more_bgcolor'],
        'priority'    => 11,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Load-more', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_load_more_color',
        'label'       => esc_html__( 'Load more Text color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_load_more_color'],
        'priority'    => 11,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Load-more', ),)
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_blog_feed_pagination_load_more_icon_color',
        'label'       => esc_html__( 'Load more Icon color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_load_more_icon_color'],
        'priority'    => 11,
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Load-more', ),)
    );
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_blog_feed_pagination_load_more_typography',
        'label'       => esc_attr__( 'Load more Typography', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_pagination',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_pagination_load_more_typography'],
        'priority'    => 16,
        'output'      => array(
            array(
                'element' => '.gutenblog-loadmore-text',
            ),
        ),
        'active_callback'  => array( array( 'setting'  => 'gutenblog_blog_feed_pagination_select', 'operator' => '==', 'value'    => 'Load-more', ),)
    );


    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_blog_feed_design_select',
        'label'       => esc_html__( 'Posts Design', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_design',
        'default'     => $gutenblog_defaults['gutenblog_blog_feed_design_select'],
        'priority'    => 10,
        'choices'     => [
            'post-design-1'   => get_template_directory_uri() . '/customize/images/post-design-1.jpg',
            'post-design-2' => get_template_directory_uri() . '/customize/images/post-design-2.jpg',
            'post-design-3' => get_template_directory_uri() . '/customize/images/post-design-3.jpg',
        ],
    );

#Section -- Category Design

    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'gutenblog_setting_blog_category_design_desc',
        'label'       => wp_kses_post(__( '<hr />', 'gutenblog-theme' )),
        'description' => esc_html__( 'At each Category Settings Page, you can set up such custom parameters as Category Text Color, Category Background Color, Category Icon, Category Background Image.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_category_design',
        'priority'    => 1
    );  

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_setting_blog_category_design',
        'label'       => esc_html__( 'Category Design', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_category_design',
        'default'     => $gutenblog_defaults['gutenblog_setting_blog_category_design'],
        'priority'    => 2,
        'choices'     => [
            'category-design-1'   => get_template_directory_uri() . '/customize/images/category-design-1.jpg',
            'category-design-2' => get_template_directory_uri() . '/customize/images/category-design-2.jpg',
            'category-design-3' => get_template_directory_uri() . '/customize/images/category-design-3.jpg',
        ],
    );

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_setting_blog_category_design_2_background',
        'label'       => esc_html__( 'Background Type for Category', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_category_design',
        'default'     => $gutenblog_defaults['gutenblog_setting_blog_category_design_2_background'],
        'priority'    => 3,
        'choices'     => [
            'background-1'   => get_template_directory_uri() . '/customize/images/background-1-category.jpg',
            'background-2' => get_template_directory_uri() . '/customize/images/background-2-category.jpg',
        ],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_setting_blog_category_design', 
                'operator' => '==', 
                'value'    => 'category-design-2', 
            ), 
        )
    );

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_setting_blog_category_design_2_icon',
        'label'       => esc_html__( 'Icon Type for Category', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_category_design',
        'default'     => $gutenblog_defaults['gutenblog_setting_blog_category_design_2_icon'],
        'priority'    => 4,
        'choices'     => [
            'icon-1'   => get_template_directory_uri() . '/customize/images/icon-1-category.jpg',
            'icon-2' => get_template_directory_uri() . '/customize/images/icon-2-category.jpg',
        ],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_setting_blog_category_design', 
                'operator' => '==', 
                'value'    => 'category-design-2', 
            ), 
        )
    );



#Section -- /Category Design

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_section_blog_feed_effects_select',
        'label'       => esc_html__( 'Posts Hover Effects', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_feed_effects',
        'default'     => $gutenblog_defaults['gutenblog_section_blog_feed_effects_select'],
        'priority'    => 10,
        'choices'     => [
            'post-hover-effect-1' => get_template_directory_uri() . '/customize/images/thumb-hover-1.jpg',
            'post-hover-effect-2' => get_template_directory_uri() . '/customize/images/thumb-hover-2.jpg',
            'post-hover-effect-3' => get_template_directory_uri() . '/customize/images/thumb-hover-3.jpg',
        ],
    );

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_section_appearance_border_radius_select',
        'label'       => esc_html__( 'Border Radius Style', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_feed_border_radius',
        'default'     => $gutenblog_defaults['gutenblog_section_appearance_border_radius_select'],
        'priority'    => 10,
        'choices'     => [
            'rounded'   => get_template_directory_uri() . '/customize/images/border-rounded.jpg',
            'square' => get_template_directory_uri() . '/customize/images/border-square.jpg',
        ],
    );

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_section_header_select',
        'label'       => esc_html__( 'Select Header', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_header_design',
        'default'     => $gutenblog_defaults['gutenblog_section_header_select'],
        'priority'    => 1,
        'choices'     => [
            'header-1'   => get_template_directory_uri() . '/customize/images/header-design-1.jpg',
            'header-2' => get_template_directory_uri() . '/customize/images/header-design-2.jpg',
            'header-3' => get_template_directory_uri() . '/customize/images/header-design-3.jpg',
            'header-4' => get_template_directory_uri() . '/customize/images/header-design-4.jpg',
        ],
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_header_wrap_bgcolor',
        'label'       => esc_html__( 'Header Wrap Background Color', 'gutenblog-theme' ),
        'description' => esc_html__( 'Choose Background color for Headers', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_header_design',
        'default'     => $gutenblog_defaults['gutenblog_section_header_wrap_bgcolor'],
        'priority'    => 2,
    );


    // Colors for second header
    
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_header_wave_color_blend',
        'label'       => esc_html__( 'Blend Colors of Wave Effect?', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_header_design',
        'priority'    => 11,
        'default'     => $gutenblog_defaults['gutenblog_header_wave_color_blend'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_section_header_select', 
                'operator' => '==', 
                'value'    => 'header-2', 
            ), 
        )
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_header_wave_color_1',
        'label'       => esc_html__( 'Wave Effect Mixing Color - 1', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_header_design',
        'priority'    => 11,
        'default'     => $gutenblog_defaults['gutenblog_header_wave_color_1'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_section_header_select', 
                'operator' => '==', 
                'value'    => 'header-2', 
            ), 
        )
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_header_wave_color_2',
        'label'       => esc_html__( 'Wave Effect Mixing Color - 2', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_header_design',
        'priority'    => 11,
        'default'     => $gutenblog_defaults['gutenblog_header_wave_color_2'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_section_header_select', 
                'operator' => '==', 
                'value'    => 'header-2', 
            ), 
        )
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_header_wave_color_3',
        'label'       => esc_html__( 'Wave Effect Mixing Color - 3', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_header_design',
        'priority'    => 11,
        'default'     => $gutenblog_defaults['gutenblog_header_wave_color_3'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_section_header_select', 
                'operator' => '==', 
                'value'    => 'header-2', 
            ), 
        )
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_header_wave_color_back',
        'label'       => esc_html__( 'Wave Effect Mixing Color - Background Desktop', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_header_design',
        'priority'    => 11,
        'default'     => $gutenblog_defaults['gutenblog_header_wave_color_back'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_section_header_select', 
                'operator' => '==', 
                'value'    => 'header-2', 
            ), 
        )
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_header_wave_color_back_mob',
        'label'       => esc_html__( 'Wave Effect Mixing Color - Background Mobile', 'gutenblog-theme' ),
        'description' => '',
        'section'     => 'gutenblog_section_header_design',
        'priority'    => 11,
        'default'     => $gutenblog_defaults['gutenblog_header_wave_color_back_mob'],
        'active_callback'  => array( 
            array( 
                'setting'  => 'gutenblog_section_header_select', 
                'operator' => '==', 
                'value'    => 'header-2', 
            ), 
        )
    );



    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_header_settings_signin_btn',
        'label'       => esc_html__( 'Enable Sign in and Avatar in Header', 'gutenblog-theme' ),
        'description' => esc_html__( 'Sign in | Avatar Button', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_header_settings',
        'priority'    => 10,
        'default'     => $gutenblog_defaults['gutenblog_header_settings_signin_btn']
    );
    if (class_exists('WooCommerce')) {
        $fields[] = array(
            'type'        => 'toggle',
            'settings'    => 'gutenblog_header_settings_cart_btn',
            'label'       => esc_html__( 'Enable Cart Button in Header', 'gutenblog-theme' ),
            'description' => esc_html__( 'Cart Button', 'gutenblog-theme' ),
            'section'     => 'gutenblog_section_header_settings',
            'priority'    => 10,
            'default'     => $gutenblog_defaults['gutenblog_header_settings_cart_btn']
        );
    }
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_header_settings_hidden_sidebar_btn',
        'label'       => esc_html__( 'Enable Hidden Sidebar Button in Header', 'gutenblog-theme' ),
        'description' => esc_html__( 'Hidden Sidebar Button', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_header_settings',
        'priority'    => 10,
        'default'     => $gutenblog_defaults['gutenblog_header_settings_hidden_sidebar_btn']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_header_settings_search_btn',
        'label'       => esc_html__( 'Enable Search Button in Header', 'gutenblog-theme' ),
        'description' => esc_html__( 'Search Button', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_header_settings',
        'priority'    => 10,
        'default'     => $gutenblog_defaults['gutenblog_header_settings_search_btn']
    );





    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'gutenblog_section_menu_align_select',
        'label'       => esc_html__( 'Menu Position', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_menu_align_select'],
        'priority'    => 1,
        'multiple'    => 1,
        'choices'     => [
            'justify-content-start' => esc_html__( 'Left', 'gutenblog-theme' ),
            'justify-content-center' => esc_html__( 'Center', 'gutenblog-theme' ),
            'justify-content-end' => esc_html__( 'Right', 'gutenblog-theme' ),
        ],
    );

    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_expanded_menu_enable',
        'label'       => esc_html__( 'Enable "Expanded Menu" if there are too many menu items?', 'gutenblog-theme' ),
        'description' => esc_html__( 'Turned off on mobile devices.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_expanded_menu_enable']
    );

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_section_menu_design_select',
        'label'       => esc_html__( 'Select Menu Design', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_menu_design_select'],
        'priority'    => 3,
        'choices'     => [
            'menu-design-1' => get_template_directory_uri() . '/customize/images/menu-design-1.jpg',
            'menu-design-2' => get_template_directory_uri() . '/customize/images/menu-design-2.jpg',
            'menu-design-3' => get_template_directory_uri() . '/customize/images/menu-design-3.jpg',
        ],
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_first_level_menu_link_color',
        'label'       => esc_html__( 'First Level Menu Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_first_level_menu_link_color'],
        'priority'    => 4,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_first_level_menu_link_hover_color',
        'label'       => esc_html__( 'First Level Menu HOVER Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_first_level_menu_link_hover_color'],
        'priority'    => 5,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_first_level_menu_link_hover_bg_color',
        'label'       => esc_html__( 'First Level Menu HOVER Background Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_first_level_menu_link_hover_bg_color'],
        'priority'    => 6,
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'gutenblog_section_menu_hr_2',
        'label'       => '<hr />',
        'section'     => 'gutenblog_section_menu_design',
        'priority'    => 7,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_submenu_link_color',
        'label'       => esc_html__( 'Submenu Link Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_submenu_link_color'],
        'priority'    => 8,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_submenu_link_hover_color',
        'label'       => esc_html__( 'Submenu Link HOVER Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_submenu_link_hover_color'],
        'priority'    => 9,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_submenu_link_bg_color',
        'label'       => esc_html__( 'Submenu Background Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_submenu_link_bg_color'],
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_submenu_link_hover_bg_color',
        'label'       => esc_html__( 'Submenu HOVER Background Color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_submenu_link_hover_bg_color'],
        'priority'    => 11,
    );


    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_section_header_button_design_select',
        'label'       => esc_html__( 'Select Buttons Design', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_header_button_design',
        'default'     => $gutenblog_defaults['gutenblog_section_header_button_design_select'],
        'priority'    => 1,
        'choices'     => [
            'header-button-design-1' => get_template_directory_uri() . '/customize/images/header-button-design-1.jpg',
            'header-button-design-2' => get_template_directory_uri() . '/customize/images/header-button-design-2.jpg',
        ],
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'gutenblog_section_header_hr_1',
        'label'       => '<hr />',
        'section'     => 'gutenblog_section_header_button_design',
        'priority'    => 2,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_header_icon_color',
        'label'       => esc_html__( 'Icons color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_header_button_design',
        'default'     => $gutenblog_defaults['gutenblog_section_header_icon_color'],
        'priority'    => 3,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'gutenblog_section_header_label_color',
        'label'       => esc_html__( 'Label color', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_header_button_design',
        'default'     => $gutenblog_defaults['gutenblog_section_header_label_color'],
        'priority'    => 3,
    );



    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_section_mobile_menu_design_select',
        'label'       => esc_html__( 'Select Menu Design', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_mobile_menu_design',
        'default'     => $gutenblog_defaults['gutenblog_section_mobile_menu_design_select'],
        'priority'    => 10,
        'choices'     => [
            'mobile_menu-design-1'   => get_template_directory_uri() . '/customize/images/post-design-1.jpg',
            'mobile_menu-design-2' => get_template_directory_uri() . '/customize/images/post-design-2.jpg',
        ],
    );



#Section -- Single Page Layouts

    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'gutenblog_section_page_layout_select',
        'label'       => esc_html__( 'Select Page Layout', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_pages',
        'default'     => $gutenblog_defaults['gutenblog_section_page_layout_select'],
        'priority'    => 10,
        'choices'     => [
            'Without-sidebar'   => get_template_directory_uri() . '/customize/images/without-sidebar.jpg',
            'Left-sidebar' => get_template_directory_uri() . '/customize/images/left-sidebar.jpg',
            'Right-sidebar' => get_template_directory_uri() . '/customize/images/right-sidebar.jpg',
        ],
    );

#Section -- Single Page Layouts
    


    
    /* gutenblog_section_menu */
    #-----------------------------------------
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_nav_search_icon',
        'label'       => esc_html__( 'Search Icon in Main Nav?', 'gutenblog-theme' ),
        'description' => esc_html__( 'Add the search icon in the main top navigation.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu',
        'priority'    => 1,
        'default'     => $gutenblog_defaults['gutenblog_nav_search_icon']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_dropdown_node_enable',
        'label'       => esc_html__( 'Enable Dropdown Menu Parent Nodes', 'gutenblog-theme' ),
        'description' => esc_html__( 'The menu item that is clicked to drop down sub menus is not assigned a URL by default (it is set to #). If you would like to enable links for the parent nodes, you can do so here.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu',
        'priority'    => 2,
        'default'     => $gutenblog_defaults['gutenblog_dropdown_node_enable']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'gutenblog_dropdown_submenu_on_hover',
        'label'       => esc_html__( 'Show Submenus on Hover', 'gutenblog-theme' ),
        'description' => esc_html__( 'If you choose enable Submenu will work on the hover, if not,  on click.', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_menu',
        'priority'    => 3,
        'default'     => $gutenblog_defaults['gutenblog_dropdown_submenu_on_hover']
    );


    



    $fields[] = array(
        'type'        => 'upload',
        'settings'     => 'gutenblog_settings_custom_font_1',
        'label'       => esc_html__( 'Upload Custom Font Family 1', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_custom_fonts',
        'default'     => '',
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'upload',
        'settings'     => 'gutenblog_settings_custom_font_2',
        'label'       => esc_html__( 'Upload Custom Font Family 2', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_custom_fonts',
        'default'     => '',
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'upload',
        'settings'     => 'gutenblog_settings_custom_font_3',
        'label'       => esc_html__( 'Upload Custom Font Family 3', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_custom_fonts',
        'default'     => '',
        'priority'    => 10,
    );

    //-----------------------
    // Typography BODY
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_body_font',
        'label'       => esc_attr__( 'Body Typography', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_body',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_body_font'],
        'priority'    => 10,
    );

    //-----------------------
    // Pre (Code Element) Typography
    //-----------------------
    
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_pre_code',
        'label'       => esc_attr__( 'Pre (Code Element) Typography', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_pre_code',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_pre_code'],
        'priority'    => 10,
     );

    //-----------------------
    // Typography Menu
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_menu',
        'label'       => esc_attr__( 'Menu', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_menu',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_menu'],
        'priority'    => 10,
     );

    //-----------------------
    // Typography Post Title
    //-----------------------
    
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_post_title',
        'label'       => esc_attr__( 'Post Title', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_post_title',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_post_title'],
        'priority'    => 10,
     );

    //-----------------------
    // Typography Categories
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_section_blog_feed_typography_categories_title',
        'label'       => esc_attr__( 'Categories Title', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_blog_feed_typography',
        'default'     => $gutenblog_defaults['gutenblog_section_blog_feed_typography_categories_title'],
        'priority'    => 10,
     );


    //-----------------------
    // Typography H1
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_h1',
        'label'       => esc_attr__( 'Typography H1', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_h1',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_h1'],
        'priority'    => 10,
    );

    //-----------------------
    // Typography H2
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_h2',
        'label'       => esc_attr__( 'Typography H2', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_h2',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_h2'],
        'priority'    => 10,
    );

    //-----------------------
    // Typography H3
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_h3',
        'label'       => esc_attr__( 'Typography H3', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_h3',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_h3'],
        'priority'    => 10,
    );

    //-----------------------
    // Typography H4
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_h4',
        'label'       => esc_attr__( 'Typography H4', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_h4',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_h4'],
        'priority'    => 10,
    );

    //-----------------------
    // Typography H5
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_h5',
        'label'       => esc_attr__( 'Typography H5', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_h5',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_h5'],
        'priority'    => 10,
    );

    //-----------------------
    // Typography H6
    //-----------------------

    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'gutenblog_settings_typography_h6',
        'label'       => esc_attr__( 'Typography H6', 'gutenblog-theme' ),
        'section'     => 'gutenblog_section_typography_h6',
        'default'     => $gutenblog_defaults['gutenblog_settings_typography_h6'],
        'priority'    => 10,
    );



    return $fields;
}

add_filter( 'kirki/fields', 'gutenblog_customizer_fields' );
