<?php
$gutenblog_single_post_meta_show = gutenblog_get_option('gutenblog_single_post_meta_show');
$gutenblog_single_post_date_show = gutenblog_get_option('gutenblog_single_post_date_show');
$gutenblog_single_post_category_show = gutenblog_get_option('gutenblog_single_post_category_show');
$gutenblog_single_post_author_show = gutenblog_get_option('gutenblog_single_post_author_show');
$gutenblog_single_post_tags_show = gutenblog_get_option('gutenblog_single_post_tags_show');
$gutenblog_single_post_likes_show = gutenblog_get_option('gutenblog_single_post_likes_show');
$gutenblog_single_post_views_show = gutenblog_get_option('gutenblog_single_post_views_show');
$gutenblog_single_post_share_show = gutenblog_get_option('gutenblog_single_post_share_show');
$gutenblog_section_single_post_design_select = gutenblog_get_option('gutenblog_section_single_post_design_select');
$gutenblog_posts_sidebar = gutenblog_get_option('gutenblog_posts_sidebar');
$gutenblog_header_selector = gutenblog_get_option('gutenblog_header_selector');
$gutenblog_posts_featured_image_show = gutenblog_get_option('gutenblog_posts_featured_image_show');
$gutenblog_posts_posts_nav_show = gutenblog_get_option('gutenblog_posts_posts_nav_show');
$gutenblog_section_single_post_layout_select = gutenblog_get_option('gutenblog_section_single_post_layout_select');
$gutenblog_blog_feed_author_show = gutenblog_get_option('gutenblog_blog_feed_author_show');
$gutenblog_blog_feed_meta_show = gutenblog_get_option('gutenblog_blog_feed_meta_show');
$gutenblog_single_post_date_show = gutenblog_get_option('gutenblog_single_post_date_show');
$gutenblog_blog_feed_likes_show = gutenblog_get_option('gutenblog_blog_feed_likes_show');
$gutenblog_blog_feed_views_show = gutenblog_get_option('gutenblog_blog_feed_views_show');
$gutenblog_blog_feed_category_show = gutenblog_get_option('gutenblog_blog_feed_category_show');
$gutenblog_posts_single_post_breadcrumbs_show = gutenblog_get_option('gutenblog_posts_single_post_breadcrumbs_show');
$gutenblog_posts_single_post_breadcrumbs_bar_show = gutenblog_get_option('gutenblog_posts_single_post_breadcrumbs_bar_show');
$gutenblog_blog_feed_likes_or_rating = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating');
$rating_loggedin = gutenblog_get_option('gutenblog_blog_feed_likes_or_rating_loggedin');
$gutenblog_blog_feed_thumbnail_date_show = gutenblog_get_option('gutenblog_blog_feed_thumbnail_date_show');

$gutenblog_single_related_posts = gutenblog_get_option('gutenblog_single_related_posts');

$sidebar_design = gutenblog_get_option('gutenblog_section_single_post_sidebar_design');
$sidebar_design_class = "gutenblog-sidebar-default";
if($sidebar_design == "sticky"){
    $sidebar_design_class = "gutenblog-sidebar-sticky";
}

$gutenblog_image_size = 'gutenblog-horizontal-big';

?>


<?php while ( have_posts() ) : the_post(); ?>

    <?php if(defined('THEMES_MONSTERS_CORE')){
        set_post_views( get_the_ID() );
    } ?>

    <div class="single-post-bar">
        <div class="d-flex justify-content-between">
            <?php if($gutenblog_posts_single_post_breadcrumbs_bar_show == 1) { ?>
                <div class="single-post-breadcrumbs breadcrumb-full-width">
                    <?php gutenblog_breadcrumbs(); ?>
                </div>
            <?php } ?>
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
                    <?php if($gutenblog_single_post_share_show == 1) { ?>
                        <?php if(defined('THEMES_MONSTERS_CORE')){ ?>
                            <?php wcr_share_buttons(); ?>
                        <?php } ?>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="progress-bar">
        </div>
    </div>

    <div id="body-container">
        <div class="progress-bar-container">

        </div>

    </div>
    
    <!-- single-page-main-row -->
    <div class="single-page-main-row <?php if(has_post_thumbnail()){ echo "single-post-has-thumbnail"; } ?>">

    <?php  if($gutenblog_section_single_post_layout_select == 'Without-sidebar') { ?>
        <!-- Main Column -->
        <div class="row main-wrapper">
            <div class="main-column col-xl-12 col-lg-12 col-md-12 col-sm-12 single-right-sidebar">

                <!-- Post Content -->
                <div id="post-<?php the_ID(); ?>" <?php post_class('entry entry-post gutenblog-single-post-content'); ?>>

                    <?php
                    if($gutenblog_posts_featured_image_show == 1) {
                        if(has_post_thumbnail()) { ?>
                            <div class="entry-thumb">

                                <?php the_post_thumbnail( $gutenblog_image_size, array( 'alt' => get_the_title(), 'class'=>'img-responsive '.$gutenblog_image_size.'' ) ); ?>

                                <div class="overlay-thumb"></div>
                                <div class="single-meta-wrap d-flex justify-content-between align-items-center">
                                    <div class="single-meta-author-date">
                                        <div class="d-flex justify-content-start align-items-center">

                                            <?php if($gutenblog_blog_feed_thumbnail_date_show == 1) { ?>
                                                <div class="thumbnail-date date updated">
                                                    <span><?php echo get_the_date('d'); ?></span>
                                                    <span><?php echo get_the_date('M'); ?></span>
                                                </div>
                                            <?php } ?>

                                            <div class="single-entry-meta-author-wrap align-items-center">

                                                <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                                                    <div class="entry-meta-author-thumb">
                                                        <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                                                    </div>
                                                <?php }?>
                                                <div class="entry-meta-author-content">
                                                    <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                                                        <div class="entry-meta-author-name">
                                                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="single-meta-buttons d-flex justify-content-end align-items-center">
                                        <div>
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
                                        <div class="comments-wrap">
                                            <div class="comments-icon icon-message-circle"></div>
                                            <div class="comments-numbers">
                                                <?php comments_number('0', '1', '%'); ?></div>
                                        </div>
                                        <div>
                                            <?php if($gutenblog_blog_feed_views_show == 1) { ?>
                                                <?php if(defined('THEMES_MONSTERS_CORE')){
                                                    echo get_post_views( get_the_ID() );
                                                } ?>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                    <?php if($gutenblog_posts_single_post_breadcrumbs_show == 1) { ?>
                        <div class="single-post-breadcrumbs breadcrumb-full-width">
                            <div class="main-wrapper">
                                <?php gutenblog_breadcrumbs(); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="d-flex single-post-wrap bd-highlight <?php if($gutenblog_single_post_share_show == 0) { ?>share-disable<?php }?>">
                        <?php if($gutenblog_single_post_share_show == 1) { ?>
                            <div class="vertical-content-bar flex-shrink-1 bd-highlight">
                                <?php if(defined('THEMES_MONSTERS_CORE')){ ?>
                                    <?php wcr_share_buttons(); ?>
                                <?php } ?>
                            </div>
                        <?php }?>

                        <div class="single-content-wrap w-100 bd-highlight">

                            <?php if($gutenblog_single_post_category_show == 1) { ?>
                                <div class="entry-category"><?php gutenblog_categoty_list_content(); ?></div>
                            <?php }?>
                            <?php $title = get_the_title(); ?>
                            <?php if($title == '') { ?>
                                <h1 class="entry-title"><?php esc_html_e('Post ID: ', 'gutenblog-theme'); the_ID(); ?></h1>
                            <?php } else { ?>
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            <?php } ?>

                            <?php if(has_post_thumbnail()) {} else { ?>
                                <div class="entry-meta-on-content-single">
                                    <?php if($gutenblog_single_post_meta_show == 1) { ?>
                                        <div class="entry-meta align-self-center mr-auto">
                                            <div class="entry-meta-left">
                                                <?php if($gutenblog_single_post_author_show == 1) { ?>
                                                    <div class="entry-meta-author-thumb">
                                                        <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                                                    </div>
                                                <?php }?>
                                                <div class="entry-meta-author-content">
                                                    <?php if($gutenblog_single_post_author_show == 1) { ?>
                                                        <div class="entry-meta-author-name">
                                                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                                                        </div>
                                                    <?php }?>
                                                    <?php if($gutenblog_single_post_date_show == 1) { ?>
                                                        <div class="entry-date date updated"><?php echo get_the_date('j M'); ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if($gutenblog_single_post_likes_show == 1) { ?>
                                        <?php if(defined('THEMES_MONSTERS_CORE')){
                                            echo get_simple_likes_button( get_the_ID() );
                                        } ?>
                                    <?php }?>
                                    <?php if($gutenblog_single_post_views_show == 1) { ?>
                                        <?php if(defined('THEMES_MONSTERS_CORE')){
                                            echo get_post_views( get_the_ID() );
                                        } ?>
                                    <?php }?>
                                </div>
                            <?php } ?>

                            <div class="single-content"><?php the_content(); wp_link_pages(); ?></div>




                            <?php if(  ( $gutenblog_single_post_meta_show == 1 && ($gutenblog_single_post_category_show == 1 || $gutenblog_single_post_tags_show == 1 || $gutenblog_single_post_author_show == 1) )  ) { ?>
                                <div class="entry-footer">
                                    <div class="entry-meta">
                                        <?php if($gutenblog_single_post_tags_show == 1 && has_tag()) { ?><div class="entry-tags"><?php the_tags('',', '); ?></div><?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($gutenblog_posts_posts_nav_show == 1) { ?>
                                <div class="pagination-post justify-content-between">
                                    <?php
                                    $thumb_prev_data = "";
                                    $thumb_next_data = "";
                                    $prev_thumb = true;
                                    $next_thumb = true;
                                    if(!empty(get_previous_post())){
                                        $prev_post = get_previous_post();
                                        $prev_post_id = "";
                                        if(isset($next_post->ID) && !empty($next_post->ID)){
                                            $prev_post_id = $prev_post->ID;
                                            $prev_thumb = get_the_post_thumbnail_url($prev_post_id, 'gutenblog-square');
                                            if($prev_thumb !== false){
                                                $thumb_prev_data = $prev_thumb;
                                            }
                                        }
                                    }
                                    if(!empty(get_next_post())){
                                        $next_post = get_next_post();
                                        $next_post_id = "";
                                        if(isset($next_post->ID) && !empty($next_post->ID)){
                                            $next_post_id = $next_post->ID;
                                            $next_thumb = get_the_post_thumbnail_url($next_post_id, 'gutenblog-square');
                                            if($next_thumb !== false){
                                                $thumb_next_data = $next_thumb;
                                            }
                                        }
                                    }
                                    ?>
                                    <?php
                                    $prevPost = get_previous_post();
                                    if(isset($prevPost) && !empty($prevPost)){ ?>
                                        <div data-thumb="<?php if($thumb_prev_data != ""){echo esc_attr($thumb_prev_data);} ?>" class="previous_post <?php if($prev_thumb !== false){echo "has_thumb";} ?>">

                                            <?php
                                            $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Previous article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';

                                            $prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'gutenblog-square');
                                            if(isset($prevThumbnail) && !empty($prevThumbnail)){
                                                $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Previous article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div><div class="pagination-post-wrap-thumb">'.$prevThumbnail.'</div></div>';
                                            }

                                            previous_post_link('%link',$title_html,true); ?>

                                        </div>
                                    <?php } ?>

                                    <?php
                                    $nextPost = get_next_post();
                                    if(isset($nextPost) && !empty($nextPost)){ ?>
                                        <div data-thumb="<?php if($thumb_next_data != ""){echo esc_attr($thumb_next_data);} ?>" class="next_post <?php if($next_thumb !== false){echo "has_thumb";} ?>">

                                            <?php
                                            $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Next article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';

                                            $nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'gutenblog-square');
                                            if(isset($nextThumbnail) && !empty($nextThumbnail)){
                                                $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><div class="pagination-post-wrap-thumb">'.$nextThumbnail.'</div><span class="pagination-post-label">'.esc_html__('Next article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';
                                            }

                                            next_post_link('%link', $title_html,true); ?>

                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <!-- /Post Content -->

                <!-- Post Comments -->
                <?php if ( comments_open() ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
                <!-- /Post Comments -->

                <!-- Related Posts -->
                <?php if($gutenblog_single_related_posts == true){
                    gutenblog_related_posts($post);
                } ?>
                <!-- Related Posts -->

            </div>


        </div>
        <!-- /Main Column -->
    <?php } ?>


    <?php  if($gutenblog_section_single_post_layout_select == 'Right-sidebar') { ?>
        <!-- Main Column -->

<?php if($gutenblog_posts_single_post_breadcrumbs_show == 1) { ?>
    <div class="single-post-breadcrumbs breadcrumb-full-width">
        <div class="main-wrapper">
            <?php gutenblog_breadcrumbs(); ?>
        </div>
    </div>
<?php } ?>

<div class="row main-wrapper">
        <?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
            <div class="main-column col-xl-9 col-lg-8 col-md-12 col-sm-12 single-right-sidebar">
        <?php } else {?>
            <div class="main-column col-xl-12 col-lg-12 col-md-12 col-sm-12 single-right-sidebar">
        <?php } ?>

            <!-- Post Content -->
            <div id="post-<?php the_ID(); ?>" <?php post_class('entry entry-post gutenblog-single-post-content'); ?>>

                <?php
                if($gutenblog_posts_featured_image_show == 1) {
                    if(has_post_thumbnail()) { ?>
                        <div class="entry-thumb">
                            <?php the_post_thumbnail( $gutenblog_image_size, array( 'alt' => get_the_title(), 'class'=>'img-responsive '.$gutenblog_image_size.'' ) ); ?>

                            <div class="overlay-thumb"></div>
                            <div class="entry-meta-on-thumb-single">
                                <div class="meta-on-thumb-single-wrap">
                                    <div class="single-meta-wrap">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <?php if($gutenblog_single_post_share_show == 1) { ?>
                                                        <?php if(defined('THEMES_MONSTERS_CORE')){ ?>
                                                            <?php wcr_share_buttons(); ?>
                                                        <?php } ?>
                                                <?php }?>
                                            </div>
                                            <div class="ml-auto">
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
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>

                <div class="d-flex single-post-wrap bd-highlight <?php if($gutenblog_single_post_share_show == 0) { ?>share-disable<?php }?>">


                    <div class="single-content-wrap w-100 bd-highlight">


                        <?php $title = get_the_title(); ?>
                        <?php if($title == '') { ?>
                            <h1 class="entry-title"><?php esc_html_e('Post ID: ', 'gutenblog-theme'); the_ID(); ?></h1>
                        <?php } else { ?>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php } ?>

                        <div class="d-md-flex align-items-start gutenblog-single-meta-wrap">
                                <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                                    <div class="entry-meta-author-thumb">
                                        <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                                    </div>
                                <?php }?>

                                <div class="entry-meta-wrapper">
                                    <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                                        <div class="entry-meta-author-name">
                                            <?php echo esc_html_e( 'by', 'gutenblog-theme' ) ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                                            <?php echo esc_html_e( 'posted on', 'gutenblog-theme' ) ?>
                                        </div>
                                    <?php }?>

                                    <?php if($gutenblog_single_post_category_show == 1) { ?>
                                        <div class="entry-category"><?php gutenblog_categoty_list_content(); ?></div>
                                    <?php }?>
                                    <?php if($gutenblog_single_post_date_show == 1) { ?>
                                        <div class="thumbnail-date date updated">
                                            <span><?php echo get_the_date('F j, Y'); ?></span>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="single-meta-buttons d-flex justify-content-md-end justify-content-sm-start  ml-auto align-items-center">
                                    <div class="comments-wrap">
                                        <div class="comments-icon icon-message-circle"></div>
                                        <div class="comments-numbers">
                                            <?php comments_number('0', '1', '%'); ?></div>
                                    </div>
                                        <?php if($gutenblog_blog_feed_views_show == 1) { ?>
                                            <?php if(defined('THEMES_MONSTERS_CORE')){
                                                echo get_post_views( get_the_ID() );
                                            } ?>
                                        <?php }?>
                                </div>
                        </div>

                        <?php if(has_post_thumbnail()) {} else { ?>

                            <div class="single-meta-wrap-without-thumb d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <?php if($gutenblog_single_post_share_show == 1) { ?>
                                            <?php if(defined('THEMES_MONSTERS_CORE')){ ?>
                                                <?php wcr_share_buttons(); ?>
                                            <?php } ?>
                                        <?php }?>
                                    </div>
                                    <div class="ml-auto">
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
                                </div>
                            </div>
                        <?php } ?>

                        <div class="single-content"><?php the_content(); wp_link_pages(); ?></div>




                        <?php if(  ( $gutenblog_single_post_meta_show == 1 && ($gutenblog_single_post_category_show == 1 || $gutenblog_single_post_tags_show == 1 || $gutenblog_single_post_author_show == 1) )  ) { ?>
                            <div class="entry-footer">
                                <div class="entry-meta">
                                    <?php if($gutenblog_single_post_tags_show == 1 && has_tag()) { ?><div class="entry-tags"><?php the_tags('',', '); ?></div><?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if($gutenblog_posts_posts_nav_show == 1) { ?>
                            <div class="pagination-post justify-content-between">
                                <?php
                                $thumb_prev_data = "";
                                $thumb_next_data = "";
                                $prev_thumb = true;
                                $next_thumb = true;
                                if(!empty(get_previous_post())){
                                    $prev_post = get_previous_post();
                                    $prev_post_id = "";
                                    if(isset($next_post->ID) && !empty($next_post->ID)){
                                        $prev_post_id = $prev_post->ID;
                                        $prev_thumb = get_the_post_thumbnail_url($prev_post_id, 'gutenblog-square');
                                        if($prev_thumb !== false){
                                            $thumb_prev_data = $prev_thumb;
                                        }
                                    }
                                }
                                if(!empty(get_next_post())){
                                    $next_post = get_next_post();
                                    $next_post_id = "";
                                    if(isset($next_post->ID) && !empty($next_post->ID)){
                                        $next_post_id = $next_post->ID;
                                        $next_thumb = get_the_post_thumbnail_url($next_post_id, 'gutenblog-square');
                                        if($next_thumb !== false){
                                            $thumb_next_data = $next_thumb;
                                        }
                                    }
                                }
                                ?>
                                <?php
                                $prevPost = get_previous_post();
                                if(isset($prevPost) && !empty($prevPost)){ ?>
                                    <div data-thumb="<?php if($thumb_prev_data != ""){echo esc_attr($thumb_prev_data);} ?>" class="previous_post <?php if($prev_thumb !== false){echo "has_thumb";} ?>">

                                        <?php
                                        $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Previous article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';

                                        $prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'gutenblog-square');
                                        if(isset($prevThumbnail) && !empty($prevThumbnail)){
                                            $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Previous article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div><div class="pagination-post-wrap-thumb">'.$prevThumbnail.'</div></div>';
                                        }

                                        previous_post_link('%link',$title_html,true); ?>

                                    </div>
                                <?php } ?>

                                <?php
                                $nextPost = get_next_post();
                                if(isset($nextPost) && !empty($nextPost)){ ?>
                                    <div data-thumb="<?php if($thumb_next_data != ""){echo esc_attr($thumb_next_data);} ?>" class="next_post <?php if($next_thumb !== false){echo "has_thumb";} ?>">

                                        <?php
                                        $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Next article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';

                                        $nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'gutenblog-square');
                                        if(isset($nextThumbnail) && !empty($nextThumbnail)){
                                            $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><div class="pagination-post-wrap-thumb">'.$nextThumbnail.'</div><span class="pagination-post-label">'.esc_html__('Next article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';
                                        }

                                        next_post_link('%link', $title_html,true); ?>

                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <!-- /Post Content -->

            <!-- Post Comments -->
            <?php if ( comments_open() ) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
            <!-- /Post Comments -->



        </div>
        <?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
            <div class="<?php echo esc_attr($sidebar_design_class); ?> col-xl-3 col-lg-4 col-md-12 col-sm-12">
                <?php get_sidebar();  ?>
            </div>
        <?php } else {}?>

    </div>
        <!-- /Main Column -->
    <?php } ?>


    <?php  if($gutenblog_section_single_post_layout_select == 'Left-sidebar') { ?>
        <!-- Main Column -->
        <div class="row main-wrapper">
        <div class="<?php echo esc_attr($sidebar_design_class); ?> col-xl-3 col-lg-4 col-md-12 col-sm-12">
            <?php get_sidebar();  ?>
        </div>
        <?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
            <div class="main-column col-xl-9 col-lg-8 col-md-12 col-sm-12 single-left-sidebar">
        <?php } else {?>
            <div class="main-column col-xl-12 col-lg-12 col-md-12 col-sm-12 single-left-sidebar">
        <?php } ?>
        <!-- Post Content -->
        <div id="post-<?php the_ID(); ?>" <?php post_class('entry entry-post gutenblog-single-post-content'); ?>>

        <?php
        if($gutenblog_posts_featured_image_show == 1) {
            if(has_post_thumbnail()) { ?>
                <div class="entry-thumb">
                    <?php the_post_thumbnail( $gutenblog_image_size, array( 'alt' => get_the_title(), 'class'=>'img-responsive '.$gutenblog_image_size.'' ) ); ?>

                    <div class="overlay-thumb"></div>
                    <div class="entry-meta-on-thumb-single">
                        <div class="meta-on-thumb-single-wrap">
                            <div class="single-meta-wrap d-flex justify-content-between align-items-center">
                                <div class="single-meta-author-date">
                                    <div class="d-flex justify-content-start align-items-center">

                                        <?php if($gutenblog_blog_feed_thumbnail_date_show == 1) { ?>
                                            <div class="thumbnail-date date updated">
                                                <span><?php echo get_the_date('d'); ?></span>
                                                <span><?php echo get_the_date('M'); ?></span>
                                            </div>
                                        <?php } ?>

                                        <div class="single-entry-meta-author-wrap align-items-center">

                                            <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                                                <div class="entry-meta-author-thumb">
                                                    <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                                                </div>
                                            <?php }?>
                                            <div class="entry-meta-author-content">
                                                <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                                                    <div class="entry-meta-author-name">
                                                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="single-meta-buttons d-flex justify-content-end align-items-center">
                                    <div>
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
                                    <div class="comments-wrap">
                                        <div class="comments-icon icon-message-circle"></div>
                                        <div class="comments-numbers">
                                            <?php comments_number('0', '1', '%'); ?></div>
                                    </div>
                                    <div>
                                        <?php if($gutenblog_blog_feed_views_show == 1) { ?>
                                            <?php if(defined('THEMES_MONSTERS_CORE')){
                                                echo get_post_views( get_the_ID() );
                                            } ?>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
        <?php if($gutenblog_posts_single_post_breadcrumbs_show == 1) { ?>
            <div class="single-post-breadcrumbs breadcrumb-full-width">
                <div class="main-wrapper">
                    <?php gutenblog_breadcrumbs(); ?>
                </div>
            </div>
        <?php } ?>
        <div class="d-flex single-post-wrap bd-highlight <?php if($gutenblog_single_post_share_show == 0) { ?>share-disable<?php }?>">
            <?php if($gutenblog_single_post_share_show == 1) { ?>
                <div class="vertical-content-bar flex-shrink-1 bd-highlight">
                    <?php if(defined('THEMES_MONSTERS_CORE')){ ?>
                        <?php wcr_share_buttons(); ?>
                    <?php } ?>
                </div>
            <?php }?>

            <div class="single-content-wrap w-100 bd-highlight">

                <?php if($gutenblog_single_post_category_show == 1) { ?>
                    <div class="entry-category"><?php gutenblog_categoty_list_content(); ?></div>
                <?php }?>
                <?php $title = get_the_title(); ?>
                <?php if($title == '') { ?>
                    <h1 class="entry-title"><?php esc_html_e('Post ID: ', 'gutenblog-theme'); the_ID(); ?></h1>
                <?php } else { ?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php } ?>

                <?php if(has_post_thumbnail()) {} else { ?>
                    <div class="single-meta-wrap-without-thumb d-flex justify-content-between align-items-center">
                        <div class="single-meta-author-date">
                            <div class="d-flex justify-content-start align-items-center">

                                <?php if($gutenblog_blog_feed_thumbnail_date_show == 1) { ?>
                                    <div class="thumbnail-date date updated">
                                        <span><?php echo get_the_date('d'); ?></span>
                                        <span><?php echo get_the_date('M'); ?></span>
                                    </div>
                                <?php } ?>

                                <div class="single-entry-meta-author-wrap align-items-center">

                                    <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                                        <div class="entry-meta-author-thumb">
                                            <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                                        </div>
                                    <?php }?>
                                    <div class="entry-meta-author-content">
                                        <?php if($gutenblog_blog_feed_author_show == 1) { ?>
                                            <div class="entry-meta-author-name">
                                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="single-meta-buttons d-flex justify-content-end align-items-center">
                            <div>
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
                            <div class="comments-wrap">
                                <div class="comments-icon icon-message-circle"></div>
                                <div class="comments-numbers">
                                    <?php comments_number('0', '1', '%'); ?></div>
                            </div>
                            <div>
                                <?php if($gutenblog_blog_feed_views_show == 1) { ?>
                                    <?php if(defined('THEMES_MONSTERS_CORE')){
                                        echo get_post_views( get_the_ID() );
                                    } ?>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="single-content"><?php the_content(); wp_link_pages(); ?></div>




                <?php if(  ( $gutenblog_single_post_meta_show == 1 && ($gutenblog_single_post_category_show == 1 || $gutenblog_single_post_tags_show == 1 || $gutenblog_single_post_author_show == 1) )  ) { ?>
                    <div class="entry-footer">
                        <div class="entry-meta">
                            <?php if($gutenblog_single_post_tags_show == 1 && has_tag()) { ?><div class="entry-tags"><?php the_tags('',', '); ?></div><?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if($gutenblog_posts_posts_nav_show == 1) { ?>
                    <div class="pagination-post justify-content-between">
                        <?php
                        $thumb_prev_data = "";
                        $thumb_next_data = "";
                        $prev_thumb = true;
                        $next_thumb = true;
                        if(!empty(get_previous_post())){
                            $prev_post = get_previous_post();
                            $prev_post_id = "";
                            if(isset($next_post->ID) && !empty($next_post->ID)){
                                $prev_post_id = $prev_post->ID;
                                $prev_thumb = get_the_post_thumbnail_url($prev_post_id, 'gutenblog-square');
                                if($prev_thumb !== false){
                                    $thumb_prev_data = $prev_thumb;
                                }
                            }
                        }
                        if(!empty(get_next_post())){
                            $next_post = get_next_post();
                            $next_post_id = "";
                            if(isset($next_post->ID) && !empty($next_post->ID)){
                                $next_post_id = $next_post->ID;
                                $next_thumb = get_the_post_thumbnail_url($next_post_id, 'gutenblog-square');
                                if($next_thumb !== false){
                                    $thumb_next_data = $next_thumb;
                                }
                            }
                        }
                        ?>
                        <?php
                        $prevPost = get_previous_post();
                        if(isset($prevPost) && !empty($prevPost)){ ?>
                            <div data-thumb="<?php if($thumb_prev_data != ""){echo esc_attr($thumb_prev_data);} ?>" class="previous_post <?php if($prev_thumb !== false){echo "has_thumb";} ?>">

                                <?php
                                $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Previous article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';

                                $prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'gutenblog-square');
                                if(isset($prevThumbnail) && !empty($prevThumbnail)){
                                    $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Previous article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div><div class="pagination-post-wrap-thumb">'.$prevThumbnail.'</div></div>';
                                }

                                previous_post_link('%link',$title_html,true); ?>

                            </div>
                        <?php } ?>

                        <?php
                        $nextPost = get_next_post();
                        if(isset($nextPost) && !empty($nextPost)){ ?>
                            <div data-thumb="<?php if($thumb_next_data != ""){echo esc_attr($thumb_next_data);} ?>" class="next_post <?php if($next_thumb !== false){echo "has_thumb";} ?>">

                                <?php
                                $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><span class="pagination-post-label">'.esc_html__('Next article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';

                                $nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'gutenblog-square');
                                if(isset($nextThumbnail) && !empty($nextThumbnail)){
                                    $title_html = '<div class="pagination-post-wrap d-flex align-items-center"><div class="pagination-post-wrap-text"><div class="pagination-post-wrap-thumb">'.$nextThumbnail.'</div><span class="pagination-post-label">'.esc_html__('Next article','gutenblog-theme').'</span><span class="pagination-post-title">%title</span></div></div>';
                                }

                                next_post_link('%link', $title_html,true); ?>

                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        </div>
        <!-- /Post Content -->

        <!-- Post Comments -->
        <?php if ( comments_open() ) : ?>
            <?php comments_template(); ?>
        <?php endif; ?>
        <!-- /Post Comments -->

        <!-- Related Posts -->
        <?php if($gutenblog_single_related_posts == true){
            gutenblog_related_posts($post);
        } ?>
        <!-- Related Posts -->

        </div>


        </div>
        <!-- /Main Column -->
    <?php } ?>

    </div>
    <!-- /single-page-main-row -->

    <!-- Related Posts -->
    <div class="main-wrapper">
        <?php if($gutenblog_single_related_posts == true){
            gutenblog_related_posts($post);
        } ?>
    </div>
    <!-- Related Posts -->


<?php endwhile; ?>