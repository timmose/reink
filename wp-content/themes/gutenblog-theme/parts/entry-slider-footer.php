<?php
/**
 * Main template for displaying a post within a feed
 *
 *
 */

$gutenblog_blog_feed_thumbnail_date_show = gutenblog_get_option('gutenblog_blog_feed_thumbnail_date_show');
$gutenblog_blog_feed_author_show = gutenblog_get_option('gutenblog_blog_feed_author_show');
$gutenblog_blog_feed_likes_or_rating = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating');
$rating_loggedin = gutenblog_get_option('rating_loggedin');
$gutenblog_blog_feed_views_show = gutenblog_get_option('gutenblog_blog_feed_views_show');

?>
<div <?php post_class('entry entry-class '); ?>>
    <div class="entry-content">
        <!-- Meta -->
        <?php $gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
        if($gutenblog_blog_feed_design_select == 'post-design-2') {
            gutenblog_meta_content(true);
        } ?>
        <!-- /Meta -->
        <div class="entry-thumb">

            <!-- Thumb Img -->
            <?php gutenblog_thumbnail_content($gutenblog_entry); ?>
            <!-- /Thumb Img -->
            
        </div>

    </div>
</div>