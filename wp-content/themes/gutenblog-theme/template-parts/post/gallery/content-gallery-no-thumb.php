<?php
/**
 * Main template for displaying a post within a feed
 * Thumbnail/Placeholder NOT Exists
 * Not Layout List
 */

$gutenblog_blog_feed_thumbnail_date_show = gutenblog_get_option('gutenblog_blog_feed_thumbnail_date_show');
$gutenblog_blog_feed_author_show = gutenblog_get_option('gutenblog_blog_feed_author_show');
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
            if($gutenblog_blog_feed_design_select == 'post-design-2') {
                gutenblog_meta_content(true);
            } ?>
            <!-- /Meta -->

            <?php gutenblog_rollovers_end_content(); ?>

        </div>
        <div class="content-entry-wrap">

            <!-- Categoty List -->
            <?php gutenblog_categoty_list_content(); ?>
            <!-- /Categoty List -->



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
            if($gutenblog_blog_feed_design_select == 'post-design-3') {
                gutenblog_meta_content(true);
            } ?>
            <!-- /Meta -->

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

            <!-- Meta -->
            <?php gutenblog_meta_content_visible(true); ?>

            <!-- /Meta -->
        </div>
        <!-- /Content -->

    </div>
    <!-- /entry-content -->
</div>