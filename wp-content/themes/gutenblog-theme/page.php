<?php
/**
 * The template for displaying pages
 *
 *
 */
?>
<?php get_header(); ?>

<?php 
$gutenblog_pages_sidebar = gutenblog_get_option('gutenblog_pages_sidebar');
$gutenblog_section_page_layout_select = gutenblog_get_option('gutenblog_section_page_layout_select');

$gutenblog_pages_featured_image_show = 'Default';
$gutenblog_page_meta = get_post_meta(get_the_ID(),'_page_options_meta',TRUE);
if($gutenblog_page_meta) {
    $gutenblog_pages_featured_image_show = $gutenblog_page_meta['featured_image'];
    if($gutenblog_pages_featured_image_show == '' || empty($gutenblog_pages_featured_image_show)) $gutenblog_pages_featured_image_show = 'Default';
} 
?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="main-wrapper">
    <?php 
    if($gutenblog_pages_featured_image_show == 'Banner' && has_post_thumbnail()) {
        ?>
        <!-- Featured Image (Banner) -->
        <div class="internal-banner">
            <?php 
            $src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'gutenblog-slider' ) ;
    		if ($src)$featured_image = $src[0]
            ?>
            <img src="<?php echo esc_url($featured_image) ?>" alt="<?php the_title_attribute(); ?>" />
            
            <div class="caption">
            
                <?php $title = get_the_title(); ?>
                <?php if($title == '') { ?>
                <h1 class="entry-title"><?php _e('Page ID: ', 'gutenblog-theme'); the_ID(); ?></h1>
                <?php } else { ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php } ?>
                
            </div>
        </div>
        <!-- /Featured Image (Banner) -->
    <?php } ?>

    <!-- Two Columns -->
    <div class="row two-columns">
        <!-- Main Column -->
        <?php  if($gutenblog_section_page_layout_select == 'Without-sidebar') { ?>

            <div class="main-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <!-- Page Content -->
                <div id="page-<?php the_ID(); ?>" <?php post_class('entry entry-page'); ?>>
                
                    <?php if($gutenblog_pages_featured_image_show == 'Default' && has_post_thumbnail()) { ?>
                        <div class="entry-thumb"><?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></div>
                    <?php } ?>
                    
                    
                    <?php if($gutenblog_pages_featured_image_show != 'Banner') { ?>
                    <?php $title = get_the_title(); ?>
                    <?php if($title == '') { ?>
                    <h1 class="entry-title"><?php esc_html_e('Page ID: ', 'gutenblog-theme'); the_ID(); ?></h1>
                    <?php } else { ?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php } ?>
                    <?php } ?>
                    
                    <div class="page-content"><?php the_content(); ?></div>
                    
                </div>
                <!-- /Page Content -->
                
                <!-- Page Comments -->
                <?php if ( comments_open() ) : ?>
                <?php comments_template(); ?>
                <?php endif; ?>  
                <!-- /Page Comments -->
                <div class="gutenblog-page-links-wrap">
                    <?php
                    wp_link_pages(
                        array(
                            'before' => '<div class="gutenblog-page-links">' . esc_html__( 'Pages:', 'gutenblog-theme' ),
                            'after'  => '</div>',
                        )
                    ); ?>
                </div>
            </div>
        <!-- /Main Column -->
        <?php } ?>

        <?php if($gutenblog_section_page_layout_select == 'Right-sidebar') { ?>

        <?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
            <div class="main-column col-xl-9 col-lg-8 col-md-12 col-sm-12 sidebar-position-right">
        <?php } else {?>
            <div class="main-column col-xl-12 col-lg-12 col-md-12 col-sm-12 sidebar-position-right">
        <?php } ?>


                <!-- Page Content -->
                <div id="page-<?php the_ID(); ?>" <?php post_class('entry entry-page'); ?>>

                    <?php if($gutenblog_pages_featured_image_show == 'Default' && has_post_thumbnail()) { ?>
                        <div class="entry-thumb"><?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></div>
                    <?php } ?>


                    <?php if($gutenblog_pages_featured_image_show != 'Banner') { ?>
                        <?php $title = get_the_title(); ?>
                        <?php if($title == '') { ?>
                            <h1 class="entry-title"><?php esc_html_e('Page ID: ', 'gutenblog-theme'); the_ID(); ?></h1>
                        <?php } else { ?>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php } ?>
                    <?php } ?>

                    <div class="page-content"><?php the_content(); ?></div>

                </div>
                <!-- /Page Content -->

                <!-- Page Comments -->
                <?php if ( comments_open() ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
                <!-- /Page Comments -->
                <div class="gutenblog-page-links-wrap">
                    <?php
                    wp_link_pages(
                        array(
                            'before' => '<div class="gutenblog-page-links">' . esc_html__( 'Pages:', 'gutenblog-theme' ),
                            'after'  => '</div>',
                        )
                    ); ?>
                </div>
            </div>
            <!-- /Main Column -->

                <?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                        <?php get_sidebar();  ?>
                    </div>
                <?php } else {}?>


        <?php } ?>


        <?php if($gutenblog_section_page_layout_select == 'Left-sidebar') { ?>

            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                <?php get_sidebar();  ?>
            </div>
            <div class="main-column col-xl-9 col-lg-8 col-md-12 col-sm-12 sidebar-position-left">

                <!-- Page Content -->
                <div id="page-<?php the_ID(); ?>" <?php post_class('entry entry-page'); ?>>

                    <?php if($gutenblog_pages_featured_image_show == 'Default' && has_post_thumbnail()) { ?>
                        <div class="entry-thumb"><?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></div>
                    <?php } ?>


                    <?php if($gutenblog_pages_featured_image_show != 'Banner') { ?>
                        <?php $title = get_the_title(); ?>
                        <?php if($title == '') { ?>
                            <h1 class="entry-title"><?php esc_html_e('Page ID: ', 'gutenblog-theme'); the_ID(); ?></h1>
                        <?php } else { ?>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php } ?>
                    <?php } ?>

                    <div class="page-content"><?php the_content(); ?></div>

                </div>
                <!-- /Page Content -->

                <!-- Page Comments -->
                <?php if ( comments_open() ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
                <!-- /Page Comments -->
                <div class="gutenblog-page-links-wrap">
                    <?php
                    wp_link_pages(
                        array(
                            'before' => '<div class="gutenblog-page-links">' . esc_html__( 'Pages:', 'gutenblog-theme' ),
                            'after'  => '</div>',
                        )
                    ); ?>
                </div>
            </div>
            <!-- /Main Column -->
        <?php } ?>

    </div>


    <!-- /Two Columns -->
</div>
<?php endwhile; ?>


<?php get_footer(); ?>