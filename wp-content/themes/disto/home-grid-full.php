<?php
/*
  Template Name: Home grid full
*/
?>
<?php get_header();
$pagination_options= get_post_custom_values('pagination_grid_layout_options', get_the_ID());
if($pagination_options[0]=='loadmore'){$pagination = "loadmore";}else{$pagination = "number";}
?>
<div class="jl_grid_fullwidth">
    <div class="container" id="wrapper_masonry">
        <div class="row">
            <div class="col-md-12 grid-fullwidth_verlay">
                <div class="jl_wrapper_cat">
                    <div id="content_masonry">
                        <?php 
                 if ( get_query_var('paged') ) {
                            $paged = get_query_var('paged');
                        } else if ( get_query_var('page') ) {
                            $paged = get_query_var('page');
                        } else {
                            $paged = 1;
                        }
                $disto_query = new WP_Query( array('paged' => $paged, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 12));
                if ( $disto_query->have_posts() ) {
                $post_count = 0;
                while ( $disto_query->have_posts() ){  $disto_query->the_post();
                    $post_count ++;                    
                    ?>
                <?php if(!get_theme_mod('disable_css_animation')==1){$animation_appear=" appear_animation";}else{$animation_appear="";}?>
<div <?php post_class('box jl_post_overlay_center blog_grid_post_style jl_large_box'.$animation_appear); ?>>
  <div class="post_grid_content_wrapper">
<?php $slider_large_thumb_id = get_post_thumbnail_id();
$slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_slider_grid_large', true ); ?>
<?php if($slider_large_thumb_id){?>
<span class="image_grid_header_absolute jl_bg_scroll" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
<?php }else{?>
<span class="image_grid_header_absolute jl_bg_scroll" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
<?php }?>
<a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>
<div class="post-entry-content">
<div class="post-entry-content-wrapper">
<div class="post_grid_more_meta_wrapper <?php if ( !has_post_thumbnail()) {echo "no_feature_img_class";}?>">
<?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
?>
</div>
<h3 class="image-post-title"><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
<?php echo disto_post_meta(get_the_ID()); ?> 

</div>
</div>
</div>
</div>
                    <?php }}else{                               
                        if (is_search()) {  esc_html_e('No result found', 'disto');}                                         
                    } ?>
                    </div>
                </div>

                <?php if($pagination == "loadmore"){?>
                <div class="pagination-more">
                    <div class="more-previous">
                        <?php next_posts_link(esc_html__('Load More', 'disto'), $disto_query->max_num_pages); ?>
                    </div>
                </div>
                <?php
}else{ disto_pagination($disto_query); }
wp_reset_postdata();
?>
            </div>
        </div>

    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>