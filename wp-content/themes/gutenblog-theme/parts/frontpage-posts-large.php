<?php
/**
 * Frontpage - Large Post Slider Top
 *
 *
 */
?>
<?php 
    $only_img = gutenblog_get_option('gutenblog_frontpage_posts_only_img');

    $gutenblog_frontpage_posts_slider_category = gutenblog_get_option('gutenblog_frontpage_posts_slider_category');
    $gutenblog_frontpage_posts_slider_number = gutenblog_get_option('gutenblog_frontpage_posts_slider_number');
    $gutenblog_blog_slider_design_select = gutenblog_get_option('gutenblog_blog_slider_design_select');
    $args = array(
        'posts_per_page' => $gutenblog_frontpage_posts_slider_number, 
        'cat' => $gutenblog_frontpage_posts_slider_category,
        'order' => 'DESC',
        'orderby' => 'date',
    );
    query_posts($args);

    $n = 0;
    if(isset($wp_query->posts) && !empty($wp_query->posts)){
        $n = $wp_query->post_count;
    }
    ?>


    <div class="frontpage-slider-large frontpage-posts-slider-large">
        <div class="owl-loading-placeholder"></div>
        <div class="frontpage-large-owl-carousel owl-carousel">
            <?php 
            if ( have_posts() ) { 
                while ( have_posts() ) : the_post(); ?>
                    <?php $thumb = true;
                    if($only_img == true){
                        if(!has_post_thumbnail()){
                            $thumb = false;
                        }
                    } ?>

                    <?php if($thumb == true){ ?>
                        <div class="frontpage-posts-slider-post">
                            <?php 
                            $gutenblog_entry = 'gutenblog-horizontal-big'; 
                            set_query_var( 'gutenblog_entry', $gutenblog_entry );
                            get_template_part('parts/entry-slider-top');
                            ?>  
                        </div>
                    <?php } ?>

                <?php endwhile;
            } ?>

            <?php wp_reset_query(); ?>

        </div>
    </div>


