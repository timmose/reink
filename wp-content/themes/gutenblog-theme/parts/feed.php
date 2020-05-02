<?php
/**
 * The loop / blog feed
 *
 *
 */
?>

<?php
$gutenblog_blog_feed_post_format = gutenblog_get_option('gutenblog_blog_feed_post_format');
$gutenblog_section_frontpage_layout_select = gutenblog_get_option('gutenblog_section_frontpage_layout_select');
$gutenblog_blog_feed_sorting_show = gutenblog_get_option('gutenblog_blog_feed_sorting_show');


$gutenblog_loadmore_arrows = false;
$gutenblog_loadmore_numbers = false;
$gutenblog_loadmore_button = false;
$gutenblog_loadmore_infinite = false;

$gutenblog_blog_feed_pagination_select = gutenblog_get_option('gutenblog_blog_feed_pagination_select');

if($gutenblog_blog_feed_pagination_select == "Arrows"){
    $gutenblog_loadmore_arrows = true;
} else if($gutenblog_blog_feed_pagination_select == "Numbers") {
    $gutenblog_loadmore_numbers = true;
} else if($gutenblog_blog_feed_pagination_select == "Load-more") {
    $gutenblog_loadmore_button = true;
} else if($gutenblog_blog_feed_pagination_select == "Infinite-scroll") {
    $gutenblog_loadmore_infinite = true;
} else {
    $gutenblog_loadmore_arrows = true;
}

$gutenblog_blog_feed_design_select = gutenblog_get_option('gutenblog_blog_feed_design_select');
$post_align = "posts-align-left";
if(!isset($gutenblog_blog_feed_design_select) || empty($gutenblog_blog_feed_design_select)){
    $gutenblog_blog_feed_design_select = "post-design-1";
}
if($gutenblog_blog_feed_design_select == "post-design-2"){
    $post_align = "posts-align-center";
}


$gutenblog_blog_feed_columns = gutenblog_get_option('gutenblog_blog_feed_columns');
if(!isset($gutenblog_blog_feed_columns) || empty($gutenblog_blog_feed_columns)){
    $gutenblog_blog_feed_columns = "columns-2";
}
$feed_columns = 6;

if($gutenblog_blog_feed_columns == "columns-2"){
    $feed_columns = 6;
} else if($gutenblog_blog_feed_columns == "columns-3"){
    $feed_columns = 4;
} else if($gutenblog_blog_feed_columns == "columns-4"){
    $feed_columns = 3;
}

?>

<!-- Main Column -->
<?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
    <div class="<?php if($gutenblog_section_frontpage_layout_select == 'Without-sidebar') { echo 'col-md-12 '; } else { echo 'col-xl-9 col-lg-8 col-md-12 col-sm-12'; } ?>">
<?php } else {?>
    <div class="main-column <?php if($gutenblog_section_frontpage_layout_select == 'Without-sidebar') { echo 'col-md-12 '; } else { echo 'col-xl-12 col-lg-12 col-md-12 col-sm-12 '; } ?>">
<?php } ?>

    <!-- Blog Feed -->
    <div class="blog-feed">

        <!-- Title-sort -->
        <div class="d-flex justify-content-between title-sort">

            <div class="align-self-center bd-highlight"><h5><?php echo get_the_archive_title(); ?></h5></div>

            <?php 

            $args = array();
            $cat_id = "";
            $tag_id = "";
            $queried = get_queried_object();
            if(is_home()){
                $enable_cat = gutenblog_get_option('gutenblog_blog_feed_category_enable');
                $cat = gutenblog_get_option('gutenblog_blog_feed_category');
                if($enable_cat == 1){
                    if(isset($cat) && !empty($cat)){
                        $cat_id = $cat;
                    }
                }
            } else if(isset($queried) && !empty($queried)){
                if(isset($queried->taxonomy) && !empty($queried->taxonomy) && $queried->taxonomy == "category"){ 
                    if(isset($queried->cat_ID) && !empty($queried->cat_ID)){
                        $cat_id = $queried->cat_ID;
                    }
                } else if(isset($queried->taxonomy) && !empty($queried->taxonomy) && $queried->taxonomy == "post_tag"){
                    if(isset($queried->term_id) && !empty($queried->term_id)){
                        $tag_id = $queried->term_id;
                    }
                }
            } 

            $search = "";
            if(isset($_GET['s']) && !empty($_GET['s'])){
                $search = $_GET['s'];
            }

            $args['post_status'] = array('publish', 'private');
            $args['post_type'] = "post";

            if($cat_id != ""){
                $args['cat'] = $cat_id;
            }
            if($tag_id != ""){
                $args['tag_id'] = $tag_id;
            }

            if($search != ""){
                $args['s'] = $search;
            }

            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args['paged'] = $paged;

            $order_new = "";
            $order_old = "";
            $order_likes = "";
            $order_views = "";
            if(isset($_GET['order']) && !empty($_GET['order'])){
                $order_get = $_GET['order'];
                
                $order = "DESC";
                $orderby = "date";

                if($order_get == "new"){
                    $order_new = "active";
                    $order = "DESC";
                    $orderby = "date";
                } else if($order_get == "old"){
                    $order_old = "active";
                    $order = "ASC";
                    $orderby = "date";
                } else if($order_get == "likes"){
                    $order_likes = "active";
                    $order = "DESC";
                    $orderby = 'meta_value_num date';
                    $args['meta_query'] = array(
                        'relation' => 'OR', 
                        array(
                            'key' => '_post_like_count',
                            'compare' => 'NOT EXISTS',
                        ),
                        array(
                            'key' => '_post_like_count',
                            'compare' => 'EXISTS',
                        ),
                    );
                } else if($order_get == "views"){
                    $order_views = "active";
                    $order = "DESC";
                    $orderby = 'meta_value_num date';
                    $args['meta_query'] = array(
                        'relation' => 'OR', 
                        array(
                            'key' => 'post_views_count',
                            'compare' => 'NOT EXISTS',
                        ),
                        array(
                            'key' => 'post_views_count',
                            'compare' => 'EXISTS',
                        ),
                    );

                }
                $args['order'] = $order;
                $args['orderby'] = $orderby;
                
                
            } else {
                $order_new = "active";
            }

            query_posts( $args );

            $not_found = 0;
            if ( !$wp_query->have_posts() ) { 
                $not_found = 1;
            } 


            ?>
            <?php if($not_found == 0){ ?>

            <?php if($gutenblog_blog_feed_sorting_show == 1) { ?>
                <div class="sort-wrapper align-self-center bd-highlight">
                    <ul class="nav nav-feed-sort lavalamp-wrap">
                        <?php 
                        if($gutenblog_loadmore_numbers == true || $gutenblog_loadmore_arrows == true){ ?>

                            <?php
                            if(isset($_GET['order']) && !empty($_GET['order']) && $_GET['order'] == "new"){ ?>
                                <li class="blog-feed-sort-option-link <?php echo esc_attr($order_new); ?>">
                                    <span><?php _e('Recents', 'gutenblog-theme'); ?></span>
                                </li>
                            <?php } else { ?>
                                <li class="blog-feed-sort-option-link <?php echo esc_attr($order_new); ?>">
                                    <a href="<?php echo gutenblog_new_order_get('new'); ?>">
                                        <span><?php _e('Recents', 'gutenblog-theme'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php
                            if(isset($_GET['order']) && !empty($_GET['order']) && $_GET['order'] == "old"){ ?>
                                <li class="blog-feed-sort-option-link <?php echo esc_attr($order_old); ?>">
                                    <span><?php _e('Latest', 'gutenblog-theme'); ?></span>
                                </li>
                            <?php } else { ?>
                                <li class="blog-feed-sort-option-link <?php echo esc_attr($order_old); ?>">
                                    <a href="<?php echo gutenblog_new_order_get('old'); ?>">
                                        <span><?php _e('Latest', 'gutenblog-theme'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php
                            if(isset($_GET['order']) && !empty($_GET['order']) && $_GET['order'] == "likes"){ ?>
                                <li class="blog-feed-sort-option-link <?php echo esc_attr($order_likes); ?>">
                                    <span><?php _e('Popular', 'gutenblog-theme'); ?></span>
                                </li>
                            <?php } else { ?>
                                <li class="blog-feed-sort-option-link <?php echo esc_attr($order_likes); ?>">
                                    <a href="<?php echo gutenblog_new_order_get('likes'); ?>">
                                        <span><?php _e('Popular', 'gutenblog-theme'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php
                            if(isset($_GET['order']) && !empty($_GET['order']) && $_GET['order'] == "views"){ ?>
                                <li class="blog-feed-sort-option-link <?php echo esc_attr($order_views); ?>">
                                    <span><?php _e('Trends', 'gutenblog-theme'); ?></span>
                                </li>
                            <?php } else { ?>
                                <li class="blog-feed-sort-option-link <?php echo esc_attr($order_views); ?>">
                                    <a href="<?php echo gutenblog_new_order_get('views'); ?>">
                                        <span><?php _e('Trends', 'gutenblog-theme'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>

                        <?php } else { ?>
                            <li class="blog-feed-sort-option <?php echo esc_attr($order_new); ?>" data-sort="new">
                                <span><?php _e('Recents', 'gutenblog-theme'); ?></span>
                            </li>
                            <li class="blog-feed-sort-option <?php echo esc_attr($order_old); ?>" data-sort="old">
                                <span><?php _e('Latest', 'gutenblog-theme'); ?></span>
                            </li>
                            <li class="blog-feed-sort-option <?php echo esc_attr($order_likes); ?>" data-sort="likes">
                                <span><?php _e('Popular', 'gutenblog-theme'); ?></span>
                            </li>
                            <li class="blog-feed-sort-option <?php echo esc_attr($order_views); ?>" data-sort="views">
                                <span><?php _e('Trends', 'gutenblog-theme'); ?></span>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
                <?php } ?>

            <?php } ?>
        </div>
        <!-- /Title-sort -->

        <div class="blog-feed-sort-preloader-wrap-all">

            <div class="blog-feed-sort-preloader"></div>

            <div class="blog-feed-posts <?php if($gutenblog_blog_feed_post_format != 'Puzzle'){echo 'row';} ?> no-gutters <?php echo esc_attr($post_align); ?>" data-format="<?php echo esc_attr($gutenblog_blog_feed_post_format); ?>">
                
                <?php
                $excerpt = gutenblog_get_option('gutenblog_blog_feed_description_show');
                $excerpt_lenght = gutenblog_get_option('gutenblog_blog_feed_formats_show_lenght');
                $gutenblog_entry = gutenblog_get_option('gutenblog_blog_feed_thumbs_size'); 

                $gutenblog_blog_feed_thumbs_size = gutenblog_get_option('gutenblog_blog_feed_thumbs_size');
                if($gutenblog_blog_feed_thumbs_size == 'gutenblog-default'){
                    $gutenblog_entry = 'post-thumbnail';
                }

                $gutenblog_i = 1; 

                if ( $wp_query->have_posts() ) { 
                    while ( $wp_query->have_posts() ) : the_post(); 
                        
                        /*** Mixed:  2 Small Posts, Followed by 1 Full ***/
                        if($gutenblog_blog_feed_post_format == 'Mixed') {
                            if ($gutenblog_i == 2) { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-6 left-column grid-item">
                                    <?php 
                                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);  
                                    $gutenblog_i = 3; 
                                    ?>
                                </div>
                            <?php } else if ($gutenblog_i == 3) { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-6 right-column grid-item">
                                    <?php 
                                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);  
                                    $gutenblog_i = 1; 
                                    ?>
                                </div>
                            <?php } else if ($gutenblog_i == 1) { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-full col-md-12 grid-item">
                                    <?php 
                                    $gutenblog_entry_custom = "gutenblog-horizontal-big";
                                    if($gutenblog_blog_feed_thumbs_size == true){
                                        $gutenblog_entry_custom = 'post-thumbnail';
                                    }
                                    gutenblog_get_template_part_content($gutenblog_entry_custom, $excerpt, 55);  
                                    $gutenblog_i=2;
                                    ?>
                                </div>
                            <?php } ?>
                        <?php 
                        /*** Small: Small Image and Excerpt, 2 in a Row ***/
                        } else if($gutenblog_blog_feed_post_format == 'Small') { ?>
                            <?php //var_dump($excerpt); ?>
                            <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item">
                                <?php 
                                gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);  
                                $gutenblog_i++; ?>  
                            </div>

                        <?php 
                        /*** Full-one ***/
                        } else if($gutenblog_blog_feed_post_format == 'Full-one') { ?>
                            <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-full col-md-12 grid-item">
                                <?php 
                                $gutenblog_entry_custom = "gutenblog-horizontal-big";
                                if($gutenblog_blog_feed_thumbs_size == true){
                                    $gutenblog_entry_custom = 'post-thumbnail';
                                }
                                gutenblog_get_template_part_content($gutenblog_entry_custom, $excerpt, $excerpt_lenght);  
                                ?>
                            </div>
                        <?php 
                        /*** Mixed-Full-List ***/
                        } else if($gutenblog_blog_feed_post_format == 'Mixed-Full-List') { ?>
                            <?php if ($gutenblog_i == 1) { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-full col-md-12 grid-item">
                                    <?php 
                                    $gutenblog_entry_custom = "gutenblog-horizontal-big";
                                    if($gutenblog_blog_feed_thumbs_size == true){
                                        $gutenblog_entry_custom = 'post-thumbnail';
                                    }
                                    gutenblog_get_template_part_content($gutenblog_entry_custom, $excerpt, $excerpt_lenght);  
                                    $gutenblog_i=2; 
                                    ?>
                                </div>
                            <?php } else { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item">
                                    <?php 
                                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght, 'List');  
                                    ?>
                                </div>
                            <?php } ?>
                        <?php 
                        /*** Mixed-Full-Grid ***/
                        } else if($gutenblog_blog_feed_post_format == 'Mixed-Full-Grid') { ?>
                            <?php if ($gutenblog_i == 1) { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-full col-md-12 grid-item">
                                    <?php 
                                    $gutenblog_entry_custom = "gutenblog-horizontal-big";
                                    if($gutenblog_blog_feed_thumbs_size == true){
                                        $gutenblog_entry_custom = 'post-thumbnail';
                                    }
                                    gutenblog_get_template_part_content($gutenblog_entry_custom, $excerpt, $excerpt_lenght);  
                                    $gutenblog_i=2; 
                                    ?>
                                </div>
                            <?php } else { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item">
                                    <?php 
                                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);  
                                    ?>
                                </div>
                            <?php } ?>
                        <?php 
                        /*** Masonry ***/
                        } else if($gutenblog_blog_feed_post_format == 'Masonry') { ?>  
                            <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item">
                                <?php 
                                gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);  
                                $gutenblog_i++; ?>  
                            </div>
                        <?php 
                        /*** List ***/
                        } else if($gutenblog_blog_feed_post_format == 'List') { ?>
                            <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-small col-md-<?php echo esc_attr($feed_columns); ?> grid-item">
                                <?php 
                                gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght, "List");  
                                ?>
                            </div>
                        <?php } 
                        /*** Puzzle ***/
                        else if($gutenblog_blog_feed_post_format == 'Puzzle') {
                            if ($gutenblog_i == 2 || $gutenblog_i == 3 || $gutenblog_i == 4) { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-puzzle col-md-6 puzzle-column grid-item">
                                    <?php 
                                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);  
                                    $gutenblog_i++; 
                                    if($gutenblog_i == 5){
                                        $gutenblog_i = 1;
                                    }
                                    ?>
                                </div>
                            <?php } else if ($gutenblog_i == 1) { ?>
                                <div class="gutenblog-blog-feed-post gutenblog-blog-feed-post-full-puzzle col-md-6 grid-item">
                                    <?php 
                                    gutenblog_get_template_part_content($gutenblog_entry, $excerpt, $excerpt_lenght);  
                                    $gutenblog_i=2; 
                                    ?>
                                </div>
                            <?php } ?>
                        <?php }

                    endwhile;
                    
                } else { ?>

                    <div class="blog-feed-empty"><p><?php esc_html_e('No posts found.', 'gutenblog-theme'); ?></p></div>

                <?php } ?>
            </div>
            <!-- blog-feed-posts -->


            
            <?php

            if($gutenblog_loadmore_numbers == true){
                if ( $not_found == 0 ) { 
                    gutenblog_paginator( get_pagenum_link() );
                }
            } 

            if($gutenblog_loadmore_button == true){ 
                if ( $not_found == 0 ) { 
                    if (  $wp_query->max_num_pages > 1 ){ 
                        if(get_next_posts_link()) { ?>
                            <div class="gutenblog_loadmore">
                                <div class="gutenblog-loadmore-text"><?php _e('Load more','gutenblog-theme');?></div>
                            </div> 
                    <?php }
                    }
                } 
            }?>

            <?php 
            if($gutenblog_loadmore_infinite == true){ 
                if ( $not_found == 0 ) { ?>
                    <div class="gutenblog_loadmore_infinite">
                        <div class="gutenblog-loadmore-text"><?php _e('Loading more','gutenblog-theme');?></div>
                    </div> 
            <?php }
            } ?>

            <?php
            if($gutenblog_loadmore_arrows == true){ 
                if ( $not_found == 0 ) { ?>
                    <?php if(get_next_posts_link() || get_previous_posts_link()) { ?>
                        <div class="pagination-blog-feed">
                            <?php if( get_next_posts_link() ) { ?>
                                <div class="next_posts">
                                    <?php next_posts_link( esc_html__('Next Posts', 'gutenblog-theme') ); ?>
                                </div>
                            <?php } ?>
                            <?php if( get_previous_posts_link() ) { ?>
                                <div class="previous_posts">
                                    <?php previous_posts_link( esc_html__('Previous Posts', 'gutenblog-theme') ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

            <?php wp_reset_query(); ?>

        </div><!-- Preloader Wrap All -->

    </div>
    <!-- /Blog Feed -->

</div>
<!-- /Main Column -->