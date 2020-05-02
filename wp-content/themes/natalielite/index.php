<?php
    get_header();
?>
    <div class="row">
        <div class="col-lg-8 col-xl-9">
            <?php
                $blog_layout = get_theme_mod( 'natalielite_blog_layout', 'standard' );
                if ( isset( $_GET['layout'] ) ) {
                    $blog_layout = $_GET['layout'];
                }
                get_template_part( 'loop/blog', $blog_layout );
            ?>
        </div>
        <div class="col-lg-4 col-xl-3 sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>
