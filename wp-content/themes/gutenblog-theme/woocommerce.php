<?php
/**
 * The template for displaying WooCommerce pages
 *
 *
 */
?>
<?php get_header(); ?>

<?php 
$gutenblog_pages_sidebar = gutenblog_get_option('gutenblog_pages_sidebar');

$sidebar_design = gutenblog_get_option('gutenblog_section_shop_sidebar_design');
$sidebar_design_class = "gutenblog-sidebar-default";
if($sidebar_design == "sticky"){
    $sidebar_design_class = "gutenblog-sidebar-sticky";
}
?>

<div class="main-wrapper">
    <div class="row">
        <!-- Main Column -->

        <div class="main-column col-xl-9 col-lg-8 col-md-12 col-sm-12">

            <!-- Page Content -->
            <div id="page-woocommerce" <?php post_class('entry entry-page'); ?>>

                <?php woocommerce_content(); ?>

            </div>
            <!-- /Page Content -->



        </div>
        <!-- /Main Column -->
            <?php if ( is_active_sidebar( 'sidebar-default' ) ) { ?>
                <div class="<?php echo esc_attr($sidebar_design_class); ?> col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <?php get_sidebar();  ?>
                </div>
            <?php } else {}?>
    </div>
</div>


<?php get_footer(); ?>