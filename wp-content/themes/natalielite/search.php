<?php get_header(); ?>
<div class="archive-box">
    <h4><span><?php esc_html_e( 'Search results for', 'natalielite' ); ?>:&nbsp;</span><?php echo get_search_query(); ?></h4>
</div>
<div class="row">
    <div class="col-lg-8 col-xl-9">
        <?php
            $blog_layout = get_theme_mod( 'natalielite_blog_layout', 'standard' );
            get_template_part( 'loop/blog', $blog_layout );
        ?>
    </div>
    <div class="col-lg-4 col-xl-3 sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>