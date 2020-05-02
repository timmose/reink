<?php
/**
* The main template file.
* 
*
*/
?>
<?php get_header(); ?>

<?php
$gutenblog_section_frontpage_layout_select = gutenblog_get_option('gutenblog_section_frontpage_layout_select');

$sidebar_design = gutenblog_get_option('gutenblog_section_frontpage_sidebar_design');
$sidebar_design_class = "gutenblog-sidebar-default";
if($sidebar_design == "sticky"){
    $sidebar_design_class = "gutenblog-sidebar-sticky";
}
?>

<div class="blog-feed gutenblog-blog-feed">
    <div class="main-wrapper">
    <?php if($gutenblog_section_frontpage_layout_select == 'Without-sidebar') { ?>
        <!-- Without Sidebar -->
            <div class="row two-columns grid archive-without-sidebar">
                <?php get_template_part('parts/feed'); ?>
            </div>
        <!-- /Without Sidebar -->

    <?php } ?>

    <?php if($gutenblog_section_frontpage_layout_select == 'Right-sidebar') { ?>
        <!-- Right Sidebar -->
            <div class="row two-columns grid archive-right-sidebar">
                <?php get_template_part('parts/feed'); ?>
                <?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
                    <div class="<?php echo esc_attr($sidebar_design_class); ?> col-xl-3 col-lg-4 col-md-12 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } else {}?>


            </div>
        <!-- /Right Sidebar -->
    <?php } ?>

    <?php if($gutenblog_section_frontpage_layout_select == 'Left-sidebar') { ?>
        <!-- Left Sidebar -->
            <div class="row two-columns grid archive-left-sidebar">
                <?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
                    <div class="<?php echo esc_attr($sidebar_design_class); ?> col-xl-3 col-lg-4 col-md-12 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } else {}?>
                <?php get_template_part('parts/feed'); ?>
            </div>
        <!-- /Left Sidebar -->
    <?php } ?>
    </div>
</div>

<?php get_footer(); ?>