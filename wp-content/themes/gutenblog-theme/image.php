<?php
/**
 * The template for displaying posts
 *
 *
 */
?>
<?php get_header(); ?>

<?php
$gutenblog_post_meta_show = gutenblog_get_option('gutenblog_posts_meta_show');
$gutenblog_posts_date_show = gutenblog_get_option('gutenblog_posts_date_show');
$gutenblog_posts_category_show = gutenblog_get_option('gutenblog_posts_category_show');
$gutenblog_posts_author_show = gutenblog_get_option('gutenblog_posts_author_show');
$gutenblog_posts_tags_show = gutenblog_get_option('gutenblog_posts_tags_show');
$gutenblog_posts_sidebar = gutenblog_get_option('gutenblog_posts_sidebar');
$gutenblog_header_selector = gutenblog_get_option('gutenblog_header_selector');
$gutenblog_posts_featured_image_show = gutenblog_get_option('gutenblog_posts_featured_image_show');
?>
<?php while ( have_posts() ) : the_post(); ?>
<!-- Two Columns -->
<div class="row two-columns">


    <!-- Main Column -->
    <?php if($gutenblog_posts_sidebar == 1) { ?>
    <div class="main-column col-md-8">
    <?php } else { ?>
    <div class="main-column col-md-12">
    <?php } ?>
    
        <!-- Post Content -->
        <div id="attachment-<?php the_ID(); ?>" <?php post_class('entry entry-attachment'); ?>>
            
            
            <?php $title = get_the_title(); ?>
            <?php if($title == '') { ?>
            <h1 class="entry-title"><?php esc_html_e('Attachment ID: ', 'gutenblog-theme'); the_ID(); ?></h1>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>
            
            <div class="attachment-image"><?php echo wp_get_attachment_image( get_the_ID(), 'full' ); ?></div>
            
            <?php $attachment_meta = gutenblog_get_attachment( get_the_ID() ); if ($attachment_meta['caption'] != '') { ?>
            <div class="attachment-caption"><?php echo esc_html($attachment_meta['caption']); ?></div>
            <?php } ?>
            
            <?php if(get_the_content() != '') { ?>
            <div class="attachment-content"><?php the_content(); wp_link_pages(); ?></div>
            <?php } ?>
        
        </div>
        <!-- /Post Content -->
        
        <hr />
        
        <div class="pagination-post">
            <div class="previous_post"><?php previous_image_link( false, esc_html__( 'Previous Image', 'gutenblog-theme' ) ); ?></div>
            <div class="next_post"><?php next_image_link( false, esc_html__( 'Next Image', 'gutenblog-theme' ) ); ?></div>
        </div>
        
        <!-- Post Comments -->
        <?php if ( comments_open() ) : ?>
        <hr />
        <?php comments_template(); ?>
        <?php endif; ?>  
        <!-- /Post Comments -->
        
    </div>
    <!-- /Main Column -->
    
    
    <?php if($gutenblog_posts_sidebar == 1)  get_sidebar();  ?>
    
</div>
<!-- /Two Columns -->
        
<?php endwhile; ?>
<hr />

<?php get_footer(); ?>