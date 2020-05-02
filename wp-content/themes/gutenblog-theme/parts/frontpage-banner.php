<?php
/**
 * Frontpage Banner, Slider
 *
 *
 */
?>

<?php 
$gutenblog_example_content = gutenblog_get_option('gutenblog_example_content');
$gutenblog_frontpage_banner_link_images = gutenblog_get_option('gutenblog_frontpage_banner_link_images');
$gutenblog_blog_feed_share_show = gutenblog_get_option('gutenblog_blog_feed_share_show');
$gutenblog_blog_feed_likes_show = gutenblog_get_option('gutenblog_blog_feed_likes_show');
$gutenblog_blog_feed_views_show = gutenblog_get_option('gutenblog_blog_feed_views_show');
$gutenblog_blog_feed_comments_show = gutenblog_get_option('gutenblog_blog_feed_comments_show');
$gutenblog_section_blog_feed_effects_select = gutenblog_get_option('gutenblog_section_blog_feed_effects_select');
$gutenblog_blog_feed_category_show = gutenblog_get_option('gutenblog_blog_feed_category_show');
$gutenblog_blog_feed_meta_show = gutenblog_get_option('gutenblog_blog_feed_meta_show');
$gutenblog_blog_feed_author_show = gutenblog_get_option('gutenblog_blog_feed_author_show');
$gutenblog_blog_feed_date_show = gutenblog_get_option('gutenblog_blog_feed_date_show');

$gutenblog_example_content = gutenblog_get_option('gutenblog_example_content');

if(!isset($gutenblog_entry) || empty($gutenblog_entry)){
    $gutenblog_entry = 'small';
}

if($gutenblog_entry == 'small')    {
    $gutenblog_post_class = 'entry-small';
    $gutenblog_image_size = 'gutenblog-thumbnail';
} else if($gutenblog_entry == 'full')    {
    $gutenblog_post_class = 'entry-full';
    $gutenblog_image_size = 'full';
} else {

}

?>

<?php 

$force_banner = false;


    $header_image = get_header_image(); 
    $gutenblog_banner_heading = gutenblog_get_option('gutenblog_banner_heading');
    $gutenblog_banner_description = gutenblog_get_option('gutenblog_banner_description');
    $gutenblog_banner_url = gutenblog_get_option('gutenblog_banner_url');
    $gutenblog_section_frontpage_banner_design_select = gutenblog_get_option('gutenblog_section_frontpage_banner_design_select');

    if($header_image != '') { 
    ?>
    <div class="frontpage-banner">
            <?php if($gutenblog_section_frontpage_banner_design_select == 'frontpage-banner-design-1') { ?>
                <div class="main-wrapper">
            <?php } else {} ?>
            <div class="frontpage-banner-overlay">
                <?php if($gutenblog_frontpage_banner_link_images == 0) { ?>
                    <img src="<?php echo get_header_image(); ?>" alt="<?php echo esc_attr($gutenblog_banner_heading); ?>" />
                    <div class="caption">
                        <?php if($gutenblog_banner_url != '' && $gutenblog_banner_heading != '') { ?>
                        <h2><a href="<?php echo esc_url($gutenblog_banner_url); ?>"><?php echo esc_html($gutenblog_banner_heading); ?></a></h2>
                        <?php } ?>
                        <?php if($gutenblog_banner_url == '' && $gutenblog_banner_heading != '') { ?>
                        <h2><?php echo esc_html($gutenblog_banner_heading); ?></h2>
                        <?php } ?>
                        <?php if($gutenblog_banner_description != '') { ?>
                        <p class="read-more"><?php echo esc_html($gutenblog_banner_description); ?></p>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <?php if($gutenblog_banner_url != '') { ?><a href="<?php echo esc_url($gutenblog_banner_url); ?>"><?php } ?>
                    <img src="<?php echo get_header_image(); ?>" alt="<?php echo esc_attr($gutenblog_banner_heading); ?>" />
                    <?php if($gutenblog_banner_url != '') { ?></a><?php } ?>
                <?php } ?>
                <div class="mouse_scroll">

                    <div class="mouse">
                        <div class="wheel"></div>
                    </div>
                    <div>
                        <span class="m_scroll_arrows unu"></span>
                        <span class="m_scroll_arrows doi"></span>
                        <span class="m_scroll_arrows trei"></span>
                    </div>
                </div>
            </div>
            <?php if($gutenblog_section_frontpage_banner_design_select == 'frontpage-banner-design-1') { ?>
            </div>
            <?php } else {} ?>
    </div>
    <?php }

?>
