<?php
/**
* Frontpage - Featured Posts
*
*
*/
?>
<?php 

// global $post;
$gutenblog_frontpage_featured_posts_heading = gutenblog_get_option('gutenblog_frontpage_featured_posts_heading');
$gutenblog_frontpage_featured_posts_post_1 = gutenblog_get_option('gutenblog_frontpage_featured_posts_post_1');
$gutenblog_frontpage_featured_posts_post_2 = gutenblog_get_option('gutenblog_frontpage_featured_posts_post_2');
$gutenblog_frontpage_featured_posts_post_3 = gutenblog_get_option('gutenblog_frontpage_featured_posts_post_3');
$gutenblog_frontpage_featured_posts_post_4 = gutenblog_get_option('gutenblog_frontpage_featured_posts_post_4');
$gutenblog_frontpage_featured_posts_post_5 = gutenblog_get_option('gutenblog_frontpage_featured_posts_post_5');
$gutenblog_frontpage_featured_posts_post_6 = gutenblog_get_option('gutenblog_frontpage_featured_posts_post_6');
$gutenblog_frontpage_featured_posts_post_7 = gutenblog_get_option('gutenblog_frontpage_featured_posts_post_7');
$gutenblog_frontpage_featured_posts_post_8 = gutenblog_get_option('gutenblog_frontpage_featured_posts_post_8');

$design = gutenblog_get_option('gutenblog_frontpage_featured_posts_design');

$post_1 = get_post($gutenblog_frontpage_featured_posts_post_1);
$post_2 = get_post($gutenblog_frontpage_featured_posts_post_2);
$post_3 = get_post($gutenblog_frontpage_featured_posts_post_3);
$post_4 = get_post($gutenblog_frontpage_featured_posts_post_4);
$post_5 = get_post($gutenblog_frontpage_featured_posts_post_5);
$post_6 = get_post($gutenblog_frontpage_featured_posts_post_6);
$post_7 = get_post($gutenblog_frontpage_featured_posts_post_7);
$post_8 = get_post($gutenblog_frontpage_featured_posts_post_8);



$excerpt = gutenblog_get_option('gutenblog_featured_posts_description_show');
$excerpt_lenght = gutenblog_get_option('gutenblog_featured_posts_description_show_lenght');
$gutenblog_entry = gutenblog_get_option('gutenblog_blog_feed_thumbs_size');

?>
<!-- Frontpage Featured Posts -->
<div class="frontpage-featured-posts">
    <div class="main-wrapper">

        <?php if(!empty($gutenblog_frontpage_featured_posts_heading)){ ?>
            <h5 class="block-title">
                <span><?php echo esc_html($gutenblog_frontpage_featured_posts_heading); ?></span>
            </h5>
        <?php } ?>

        <div class="row frontpage-featured-posts-inner">

            <?php if($design == "featured-posts-design-1"){ ?>

                <div data-design="1" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_5) && !empty($post_5)) { ?>
                            <div data-el="5" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_5;
                                setup_postdata($post);  

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-2"){ ?>

                <div data-design="2" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-25">

                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-25">

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_5) && !empty($post_5)) { ?>
                            <div data-el="5" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_5;
                                setup_postdata($post);  

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-3"){ ?>

                <div data-design="3" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-50">

                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_5) && !empty($post_5)) { ?>
                            <div data-el="5" class="frontpage-featured-post">
                                <?php
                                $post = $post_5;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-4"){ ?>

                <div data-design="4" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-5"){ ?>

                <div data-design="5" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-6"){ ?>

                <div data-design="6" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-7"){ ?>

                <div data-design="7" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-8"){ ?>

                <div data-design="8" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-9"){ ?>

                <div data-design="9" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-33">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-33">
                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-33">
                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-10"){ ?>

                <div data-design="10" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-100">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-11"){ ?>

                <div data-design="11" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-100">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_5) && !empty($post_5)) { ?>
                            <div data-el="5" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_5;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_6) && !empty($post_6)) { ?>
                            <div data-el="6" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_6;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>


                        <?php if(isset($post_7) && !empty($post_7)) { ?>
                            <div data-el="7" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_7;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_8) && !empty($post_8)) { ?>
                            <div data-el="8" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_8;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-12"){ ?>

                <div data-design="12" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-33">

                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>
                    </div
                    ><div class="ffp-inner-wrap ffp-w-33">

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div
                    ><div class="ffp-inner-wrap ffp-w-33">

                        <?php if(isset($post_5) && !empty($post_5)) { ?>
                            <div data-el="5" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_5;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_6) && !empty($post_6)) { ?>
                            <div data-el="6" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_6;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-13"){ ?>

                <div data-design="13" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-h-50 ffp-w-100">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div
                    ><div class="ffp-inner-wrap ffp-h-50 ffp-w-100 ">

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_5) && !empty($post_5)) { ?>
                            <div data-el="5" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_5;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_6) && !empty($post_6)) { ?>
                            <div data-el="6" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_6;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_7) && !empty($post_7)) { ?>
                            <div data-el="7" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_7;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } else if($design == "featured-posts-design-14"){ ?>

                <div data-design="14" class="frontpage-featured-posts-design">

                    <div class="ffp-inner-wrap ffp-w-50">
                        <?php if(isset($post_1) && !empty($post_1)) { ?>
                            <div data-el="1" class="frontpage-featured-post ">
                                <?php
                                $post = $post_1;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_2) && !empty($post_2)) { ?>
                            <div data-el="2" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_2;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_3) && !empty($post_3)) { ?>
                            <div data-el="3" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_3;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div
                    ><div class="ffp-inner-wrap ffp-w-50">

                        <?php if(isset($post_4) && !empty($post_4)) { ?>
                            <div data-el="4" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_4;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_5) && !empty($post_5)) { ?>
                            <div data-el="5" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_5;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($post_6) && !empty($post_6)) { ?>
                            <div data-el="6" class="frontpage-featured-post  ">
                                <?php
                                $post = $post_6;
                                setup_postdata($post); 

                                get_template_part('parts/entry-featured-post');
                                
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php } ?>

        </div><!-- /frontpage-featured-posts-inner -->
    </div>
</div>
<!-- /Frontpage Featured Posts -->
