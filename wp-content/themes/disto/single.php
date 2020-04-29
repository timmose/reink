<?php get_header();?>
<?php
if (have_posts()) { while (have_posts()) { the_post();
$categories = get_the_category();
$tags = get_the_tags();
$post_id = get_the_ID();
$post_layout_display = get_post_meta( $post_id, 'single_post_layout', true );
$single_post_layout_options = get_theme_mod('single_post_layout_options');
if($post_layout_display == "full_width_image_with_caption_overlay_center" || $post_layout_display == "full_width_image_with_caption_overlay_bottom" || $post_layout_display == "full_width_image_with_caption_above" 
  || $single_post_layout_options == "single_post_layout_7" || $single_post_layout_options == "single_post_layout_8" || $single_post_layout_options == "single_post_layout_9"){
}else{
?>
<?php }?>
<!-- begin content -->
<?php
if(get_theme_mod('single_post_layout_options') == 'single_post_layout_2'){
$class_full_width_option = "single_full_width_custom_options options_admin_single_style1 ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_3'){
$class_full_width_option = "single_full_width_custom_options options_admin_single_style1 ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_4'){
$class_full_width_option = "single_full_width_custom_options options_admin_single_style1 ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_5'){
$class_full_width_option = "single_full_width_custom_options options_admin_single_style1 ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_6'){
$class_full_width_option = "single_full_width_custom_options options_admin_single_style1 ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_7'){
get_template_part('single-header-6');
$class_full_width_option = "single_full_width_custom_options ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_8'){
get_template_part('single-header-7');
$class_full_width_option = "single_full_width_custom_options ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_9'){
get_template_part('single-header-8');
$class_full_width_option = "single_full_width_custom_options ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_10'){
get_template_part('single-header-9');
$class_full_width_option = "single_full_width_custom_options ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_11'){
get_template_part('single-header-11');
$class_full_width_option = "single_full_width_custom_options ";
}elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_12'){
$class_full_width_option = "single_full_width_custom_options options_admin_single_style1 ";
}else{
if($post_layout_display == "full_width_image_with_caption_overlay_center"){
get_template_part('single-header-6');
$class_full_width_option = "single_full_width_custom_options ";
}
elseif($post_layout_display == "full_width_image_with_caption_overlay_bottom"){
get_template_part('single-header-7');
$class_full_width_option = "single_full_width_custom_options ";
}
elseif($post_layout_display == "full_width_image_with_caption_above"){
get_template_part('single-header-8');
$class_full_width_option = "single_full_width_custom_options ";
}
elseif($post_layout_display == "full_width_caption_without_image"){
get_template_part('single-header-9');
$class_full_width_option = "single_full_width_custom_options ";
}
elseif($post_layout_display == "full_width_caption_with_post_format"){
get_template_part('single-header-11');
$class_full_width_option = "single_full_width_custom_options ";
}
elseif($post_layout_display == "title_below_align_left"){
$class_full_width_option = "single_bellow_left_align ";  
}
else{
$class_full_width_option = "single_box_width_custom_options ";  
}
}
if (is_active_sidebar('jl_ads_above_title')) : echo '<div class="jl_ads_section">'; dynamic_sidebar('jl_ads_above_title');echo '</div>'; endif;
?>
<section id="content_main" class="clearfix jl_spost">
    <div class="container">
        <div class="row main_content">
            <div class="<?php $full= get_post_custom_values('single_post_full_single_post_full', get_the_ID()); if($full[0]==true){echo " col-md-12 enable_single_post_full ";}else{echo "col-md-8 ";}?> loop-large-post" id="content">
                <div class="widget_container content_page">
                    <!-- start post -->
                    <div <?php post_class(); ?> id="post-<?php the_ID();?>">
                        <div class="single_section_content box blog_large_post_style">
                            <?php                                
                                if(get_theme_mod('single_post_layout_options') == 'single_post_layout_4'){
                                  get_template_part('single-header-3');
                                }elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_5'){
                                  get_template_part('single-header-4');
                                }elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_7'){
                                }elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_8'){
                                }elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_9'){
                                }elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_10' || $post_layout_display == "full_width_caption_without_image"){
                                if ( has_post_thumbnail()) {?>
                                <div class="single_content_header jl_single_feature_above">
                                    <div class="image-post-thumb jlsingle-title-above">
                                        <?php if ( has_post_thumbnail()) {the_post_thumbnail('disto_slider_grid_large');}?>
                                    </div>
                                </div>
                                <?php }
                                }elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_11'){
                                }elseif(get_theme_mod('single_post_layout_options') == 'single_post_layout_12'){
                                get_template_part('single-header-10');
                                }else{
                                if($post_layout_display == "title_below_align_left"){
                                get_template_part('single-header-3');
                                }
                                elseif($post_layout_display == "title_above_align_left"){
                                get_template_part('single-header-4');
                                }
                                elseif($post_layout_display == "caption_without_image"){
                                get_template_part('single-header-10');
                                }
                                else{
                                if($post_layout_display == "full_width_image_with_caption_overlay_center" || $post_layout_display == "full_width_image_with_caption_overlay_bottom" || $post_layout_display == "full_width_image_with_caption_above" || $post_layout_display == "full_width_caption_without_image" || $post_layout_display == "full_width_caption_with_post_format"){                                
                                }else{
                                get_template_part('single-header-3');
                                }
                              }
                            }             
                            
                                ?>
                            <div class="post_content" itemprop="articleBody">

                                <?php 
                                if (is_active_sidebar('jl_ads_before_content')) : echo '<div class="jl_ads_section">'; dynamic_sidebar('jl_ads_before_content');echo '</div>'; endif;
                                the_content();
                                if (is_active_sidebar('jl_ads_after_content')) : echo '<div class="jl_ads_section">'; dynamic_sidebar('jl_ads_after_content');echo '</div>'; endif;
                                ?>
                            </div>
                            <?php wp_link_pages( array( 'before' => '<ul class="page-links">', 'after' => '</ul>', 'link_before' => '<li class="page-link">', 'link_after' => '</li>' ) ); ?>
                            <div class="clearfix"></div>
                            <div class="single_tag_share">
                                <?php  if(get_theme_mod('disable_post_tag') !=1){?>
                                <div class="tag-cat">
                                    <?php if (!empty($tags)){ ?>
                                    <?php the_tags('<ul class="single_post_tag_layout"><li>', '</li><li>', '</li></ul>'); ?>
                                    <?php } ?>
                                </div>
                                <?php }?>

                                <?php if(get_theme_mod('disable_post_share') !=1){
                            if(function_exists('disto_single_share_link')){?>
                                <div class="single_post_share_icons">
                                    <?php esc_html_e('Share', 'disto'); ?><i class="fa fa-share-alt"></i></div>
                                <?php }}?>
                            </div>
                            <?php if(get_theme_mod('disable_post_share') !=1){ if(function_exists('disto_single_share_link')){echo disto_single_share_link(get_the_ID());}}?>                            


                            <?php
                                $prev_post = get_previous_post();
                                if (!empty($prev_post)){
                                ?>
                            <div class="postnav_left">
                                <div class="single_post_arrow_content">                                    
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" id="prepost">
                                        <?php echo esc_attr($prev_post->post_title); ?>
                                        <span class="jl_post_nav_left">
                                            <?php esc_html_e('Previous post', 'disto'); ?></span></a>
                                </div>
                            </div>
                            <?php } ?>


                            <?php
                                $next_post = get_next_post();
                                if (!empty($next_post)){
                                ?>
                            <div class="postnav_right">
                                <div class="single_post_arrow_content">                                    
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" id="nextpost">
                                        <?php echo esc_attr($next_post->post_title); ?>
                                        <span class="jl_post_nav_left">
                                            <?php esc_html_e('Next post', 'disto'); ?></span></a>
                                </div>
                            </div>
                            <?php } ?>


                            <?php  if(get_theme_mod('disable_post_author') !=1){
                              if(get_the_author_meta('description')){?>
                            <div class="auth">
                                <div class="author-info">
                                    <div class="author-avatar">
                                        <?php echo get_avatar(get_the_author_meta('user_email'), 165); ?>
                                    </div>
                                    <div class="author-description">
                                        <h5><a itemprop="author" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ))); ?>">
                                                <?php the_author_meta( 'display_name' ); ?></a></h5>
                                        <p itemprop="description">
                                            <?php echo get_the_author_meta('description'); ?>
                                        </p>
                                        <?php if(function_exists('disto_author_contact')){echo disto_author_contact(get_the_ID());}?>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>

                            <?php } ?>

                            <?php } // end of the loop.   ?>

                            <?php if(get_theme_mod('disable_post_related') !=1){?>
                            <div class="related-posts">
                              <?php if (is_active_sidebar('jl_ads_before_related')) : echo '<div class="jl_ads_section">'; dynamic_sidebar('jl_ads_before_related');echo '</div>'; endif;?>  
                                <h4>
                                    <?php esc_html_e('Related Articles', 'disto'); ?>
                                </h4>

                                <div class="single_related_post">

                                    <?php
                        $arg_tag = array('category__in' => wp_get_post_categories($post_id), 'showposts' => 4, 'post__not_in' => array($post_id));
                        $post_query = null;
                        $post_query = new WP_Query($arg_tag);
                        $post_count = 0;
                     
                        while ($post_query->have_posts()) {
                            $post_query->the_post();
                            $post_id = get_the_ID();
                            $categories = get_the_category(get_the_ID());
                            $post_count ++;
                            ?>

                                    <div class="jl_related_feature_items">
                                        <div class="jl_related_feature_items_in">
                                            <?php if ( has_post_thumbnail()) {?>
                                            <div class="image-post-thumb">
                                                <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                                                    <?php the_post_thumbnail('disto_large_feature_image');?>
                                                    <div class="background_over_image"></div>
                                                </a>
                                            </div>
                                            <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              $title_reactions = get_term_meta($tag->term_id, "disto_cat_reactions", true);
             if($title_reactions){}else{echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';}
            }
            echo "</span>";
            }
            }
            echo disto_post_type();
        ?>

                                            <?php }else{}?>
                                            <div class="post-entry-content">        
                                                <h3 class="jl-post-title"><a href="<?php the_permalink(); ?>">
                                                        <?php the_title()?></a></h3>
                                                <?php echo disto_post_meta(get_the_ID()); ?>
                                            </div>

                                        </div>
                                    </div>


                                    <?php if($post_count%2==0){echo '<div class="clear_2col_related"></div>';}elseif($post_count%3==0){echo '<div class="clear_3col_related"></div>';}?>
                                    <?php } wp_reset_postdata(); ?>
                                </div>

                            </div>
                            <?php } ?>
                            <!-- comment -->                            
                            <?php 
                            if (is_active_sidebar('jl_ads_before_comment')) : echo '<div class="jl_ads_section jl_before_comment">'; dynamic_sidebar('jl_ads_before_comment');echo '</div>'; endif;
                            comments_template('', true);
                            ?>
                        </div>
                    </div>
                    <!-- end post -->
                    <div class="brack_space"></div>
                </div>
            </div>

            <?php $full= get_post_custom_values('single_post_full_single_post_full', get_the_ID()); if($full[0]==true){}else{?>
            <div class="col-md-4" id="sidebar">
                <?php echo disto_post_sidebar();?>
                <div class="brack_space"></div>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<!-- end content -->
<?php get_footer(); ?>