<?php
/**
 * Main template for displaying a post within a feed
 * Thumbnail/Placeholder Exists
 * Layout List
**/
?>

<div <?php post_class('entry blog-feed-type-list '); ?>>

    <div class="entry-content">
        
        <!-- Thumbnail -->
        <div class="entry-thumb list-content-left">

            <?php gutenblog_rollovers_start_content(); ?>

            <!-- Shares -->
            <?php gutenblog_shares_content(); ?>
            <!-- /Shares -->

            <!-- Thumb Img -->
            <?php gutenblog_thumbnail_content($gutenblog_entry); ?>
            <!-- /Thumb Img -->

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

            <?php if(isset($no_content) && $no_content == true){ } else {?>
                <?php if($excerpt == "excerpt" ) { ?>
                    <div class="entry-summary">
                        <?php 
                        if(isset($excerpt_lenght) 
                            && !empty($excerpt_lenght) ){
                            gutenblog_excerpt($excerpt_lenght);
                        }
                        ?>
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
            <?php gutenblog_meta_content(true); ?>
            <!-- /Meta -->

        </div>
        <!-- /Content -->

    </div>
</div>