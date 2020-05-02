<?php
/**
 * Main template for displaying a post within a feed
 * Thumbnail/Placeholder Exists
 * Not Layout List
**/

$gutenblog_blog_feed_thumbnail_date_show = gutenblog_get_option('gutenblog_blog_feed_thumbnail_date_show');
$gutenblog_blog_feed_author_show = gutenblog_get_option('gutenblog_blog_feed_author_show');
$gutenblog_blog_feed_category_show = gutenblog_get_option('gutenblog_blog_feed_category_show');
$gutenblog_blog_feed_likes_or_rating = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating');
$rating_loggedin = gutenblog_get_option('rating_loggedin');
$gutenblog_blog_feed_views_show = gutenblog_get_option('gutenblog_blog_feed_views_show');
?>
<div <?php post_class('entry '); ?>>

    <div class="entry-content">

        <!-- Thumbnail -->
        <div class="entry-thumb">


            <?php gutenblog_rollovers_start_content(); ?>



            <!-- Thumb Img -->
            <?php gutenblog_thumbnail_content($gutenblog_entry); // gutenblog_entry = thumb size ?>
            <!-- /Thumb Img -->

            <!-- Meta -->
            <?php $gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
            if($gutenblog_blog_feed_design_select == 'post-design-1') {
                gutenblog_meta_content(true);
            } ?>
            <?php $gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
            if($gutenblog_blog_feed_design_select == 'post-design-2') {
                gutenblog_meta_content(true);
            } ?>
            <?php $gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
            if($gutenblog_blog_feed_design_select == 'post-design-3') {
                gutenblog_meta_content(true);
            } ?>
            <!-- /Meta -->

            <?php gutenblog_rollovers_end_content(); ?>

        </div>
        <div class="content-entry-wrap">


            <?php if($gutenblog_blog_feed_category_show == 1) { ?>
                <div class="entry-category"><?php gutenblog_categoty_list_content(); ?></div>
            <?php }?>
            <h6 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h6>

            <?php if(isset($no_content) && $no_content == true){ } else {?>
                <?php if($excerpt == "excerpt" ) { ?>
                    <div class="entry-summary">
                        <?php if(isset($excerpt_lenght) && !empty($excerpt_lenght) ){
                            gutenblog_excerpt($excerpt_lenght);
                        } ?>
                        <?php wp_link_pages(); ?>
                    </div>
                <?php } else if($excerpt == "content" ) { ?>
                    <div class="entry-summary">
                        <?php the_content(); ?>
                        <?php wp_link_pages(); ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <!-- Meta -->
            <?php $gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
            if($gutenblog_blog_feed_design_select == 'post-design-1') {
                gutenblog_meta_content_visible(true);
                echo ('');
            } ?>
            <?php $gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
            if($gutenblog_blog_feed_design_select == 'post-design-2') {
                gutenblog_meta_content_visible(true);
                echo ('');
            } ?>
            <?php $gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
            if($gutenblog_blog_feed_design_select == 'post-design-3') {
                gutenblog_meta_content_visible(true);
                echo ('');
            } ?>
            <!-- /Meta -->

        </div>
        <!-- /Content -->

    </div>
    <!-- /entry-content -->
</div>