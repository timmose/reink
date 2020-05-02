<?php 
    $only_img = gutenblog_get_option('gutenblog_frontpage_footer_posts_only_img');

	$gutenblog_frontpage_posts_slider_category = gutenblog_get_option('gutenblog_frontpage_footer_posts_slider_category');
    $gutenblog_frontpage_posts_slider_number = gutenblog_get_option('gutenblog_frontpage_footer_posts_slider_number');
    $gutenblog_frontpage_posts_slider_columns = gutenblog_get_option('gutenblog_frontpage_footer_posts_slider_columns');
    $gutenblog_frontpage_footer_posts_slider_design_select = gutenblog_get_option('gutenblog_frontpage_footer_posts_slider_design_select');
    $args = array(
        'posts_per_page' => $gutenblog_frontpage_posts_slider_number, 
        'cat' => $gutenblog_frontpage_posts_slider_category,
        'order' => 'DESC',
        'orderby' => 'date',
    );
    if(isset($gutenblog_frontpage_posts_slider_category) && !empty($gutenblog_frontpage_posts_slider_category)){
        $args['cat'] = $gutenblog_frontpage_posts_slider_category;
    }
    
    query_posts($args);
    $n = 0;
    if(isset($wp_query->posts) && !empty($wp_query->posts)){
        $n = $wp_query->post_count;
    }
    ?>
        
    <div class="frontpage-slider frontpage-posts-slider footer-slider">

            <?php if($gutenblog_frontpage_footer_posts_slider_design_select == 'footer-slider-design-1') { ?>
                <div class="main-wrapper">
            <?php } else {} ?>

            <div class="owl-loading-placeholder"></div>
            <div class="owl-carousel" data-col="<?php echo esc_attr($gutenblog_frontpage_posts_slider_columns); ?>">

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
                                $gutenblog_entry = gutenblog_get_option('gutenblog_blog_feed_thumbs_size');
                                set_query_var( 'gutenblog_entry', $gutenblog_entry );
                                get_template_part('parts/entry-slider-footer');
                                ?>
                            </div>
                        <?php } ?>
                        
                    <?php endwhile;
                } ?>

                <?php wp_reset_query(); ?>

            </div>
        <?php if($gutenblog_frontpage_footer_posts_slider_design_select == 'footer-slider-design-1') { ?>
            </div>
        <?php } else {} ?>
    </div>

    <?php 