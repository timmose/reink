<?php get_header(); ?>

<?php
    $gutenblog_section_single_post_design_select = gutenblog_get_option('gutenblog_section_single_post_design_select');
?>

<?php
    if($gutenblog_section_single_post_design_select == 'single-post-1') {
        get_template_part( 'parts/single-default' );
    }
    if($gutenblog_section_single_post_design_select == 'single-post-2') {
        get_template_part( 'parts/single-full-thumb' );
    }
    if($gutenblog_section_single_post_design_select == 'single-post-3') {
        get_template_part( 'parts/single-full-thumb-2' );
    }
?>

<?php get_footer(); ?>