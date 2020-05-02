<?php
/**
 * Main template for displaying a post within a feed
 *
 *
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('entry entry-class '); ?>>
    <div class="entry-content">

        <div class="entry-thumb">

            <?php gutenblog_rollovers_start_content(); ?>

            <!-- Shares -->
            <?php gutenblog_shares_content(); ?>
            <!-- /Shares -->

            <!-- Thumb Img -->
            <?php gutenblog_thumbnail_content($gutenblog_entry); ?>
            <!-- /Thumb Img -->

            <?php gutenblog_rollovers_end_content(); ?>

        </div
        ><div class="content-entry-wrap">
                
            <!-- Categoty List -->
            <?php gutenblog_categoty_list_content(); ?>
            <!-- /Categoty List -->

            <h6 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h6>

            
            <div class="entry-summary">
                <?php gutenblog_excerpt(35); ?>
                <?php wp_link_pages(); ?>
            </div>
            


        </div>

    </div>
</div>