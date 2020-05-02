<?php
/**
* The category template file.
* 
*
*/
?>
<?php get_header(); ?>

<?php
$gutenblog_section_frontpage_layout_select = gutenblog_get_option('gutenblog_section_frontpage_layout_select');

$sidebar_design = gutenblog_get_option('gutenblog_section_category_sidebar_design');
$sidebar_design_class = "gutenblog-sidebar-default";
if($sidebar_design == "sticky"){
    $sidebar_design_class = "gutenblog-sidebar-sticky";
}
?>

<div class="blog-feed gutenblog-blog-feed">
    <div class="main-wrapper">
    <?php if($gutenblog_section_frontpage_layout_select == 'Without-sidebar') { ?>
        <!-- Without Sidebar -->
            <div class="row two-columns grid">
                <?php get_template_part('parts/feed'); ?>
            </div>
        <!-- /Without Sidebar -->

    <?php } ?>

    <?php if($gutenblog_section_frontpage_layout_select == 'Right-sidebar') { ?>
        <!-- Right Sidebar -->
            <div class="row two-columns grid">
                <?php get_template_part('parts/feed'); ?>
                <div class="<?php echo esc_attr($sidebar_design_class); ?> col-md-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <!-- /Right Sidebar -->
    <?php } ?>

    <?php if($gutenblog_section_frontpage_layout_select == 'Left-sidebar') { ?>
        <!-- Left Sidebar -->
            <div class="row two-columns grid">
                <div class="<?php echo esc_attr($sidebar_design_class); ?> col-md-3">
                    <?php get_sidebar(); ?>
                </div>
                <?php get_template_part('parts/feed'); ?>
            </div>
        <!-- /Left Sidebar -->
    <?php } ?>
    </div>
</div>

<?php get_footer(); ?>