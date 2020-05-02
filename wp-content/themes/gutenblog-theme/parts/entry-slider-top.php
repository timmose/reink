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

            <!-- Thumb Img -->
            <?php gutenblog_thumbnail_content($gutenblog_entry); ?>
            <!-- /Thumb Img -->

        </div
        ><div class="content-entry-wrap">

            <!-- Categoty List -->
            <?php gutenblog_categoty_list_content(); ?>
            <!-- /Categoty List -->

            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <div class="entry-summary">
                <?php gutenblog_excerpt(55); ?>
                <?php wp_link_pages(); ?>
            </div>

        </div>
        
    </div>
</div>