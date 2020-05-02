<?php
/**
 * Main template for displaying a post within a feed
 *
 *
 */
?>
<div <?php post_class('entry blog-feed-type-list '); ?>>

    <div class="entry-content">

        <div class="entry-thumb list-content-left">

            <?php gutenblog_rollovers_start_content(); ?>

            <!-- Shares -->
            <?php gutenblog_shares_content(); ?>
            <!-- /Shares -->

            <!-- Content Slider -->
            <div class="entry-summary gallery-content-slider">
                <?php the_content(); ?>
                <?php // wp_link_pages(); ?>
            </div>
            <!-- /Content Slider -->

            <?php gutenblog_rollovers_end_content(); ?>

        </div
        ><div class="content-entry-wrap list-content-right">

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