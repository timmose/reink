<?php
/**
 * Main template for displaying a post within a feed
 * Thumbnail/Placeholder Exists
 * Layout List | No Slider
 */
?>

<div <?php post_class('entry '); ?>>

    <div class="entry-content">

        <!-- Thumbnail -->
        <div class="entry-thumb">

            <?php gutenblog_rollovers_start_content(); ?>

            <!-- Shares -->
            <?php gutenblog_shares_content(); ?>
            <!-- /Shares -->

            <div class="entry-summary player-video-content">
                <?php the_content(); ?>
                <?php // wp_link_pages(); ?>
            </div>

            <?php gutenblog_rollovers_end_content(); ?>

        </div
        ><div class="content-entry-wrap">

            <!-- Categoty List -->
            <?php gutenblog_categoty_list_content(); ?>
            <!-- /Categoty List -->

            <?php $gutenblog_blog_feed_date_show = gutenblog_get_option('gutenblog_blog_feed_date_show'); ?>
            <?php if($gutenblog_blog_feed_date_show == 1) { ?>
                <div class="entry-date date updated"><span><?php echo get_the_date('d'); ?></span><span><?php echo get_the_date('F'); ?></span></div>
            <?php } ?>

            <h6 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h6>
            
            <!-- Meta -->
            <?php gutenblog_meta_content(true); ?>
            <!-- /Meta -->

        </div>
    </div>
</div>