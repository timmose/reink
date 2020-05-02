<?php
/**
 * Main template for displaying a post in Featured Post section
 *
 *
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('featured-post '); ?>>
    <div class="featured-post-inner">

        <?php $gutenblog_example_content = gutenblog_get_option('gutenblog_example_content');
        $no_thumb = ""; 
        if(!has_post_thumbnail() && $gutenblog_example_content == 0) { 
            $no_thumb = "ffp-no-thumb"; 
        } ?>

        <div class="featured-post-thumb-wrap entry-thumb ">

            <a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="post-link"></a>
            <!-- Thumb Img -->
            <?php gutenblog_thumbnail_featured_posts(''); ?>
            <!-- /Thumb Img -->
        </div>
        <div class="featured-post-content-wrap content-entry-wrap <?php echo esc_attr($no_thumb); ?>">
                
            <!-- Categoty List -->
            <?php gutenblog_categoty_list_content(); ?>
            <!-- /Categoty List -->

            <h6 class="featured-post-content-title entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h6>

        </div>

    </div>
</div>