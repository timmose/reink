<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * test
 *
 */
?>
<?php get_header(); ?>

<!-- Two Columns -->
<div class="row two-columns">
    <!-- Main Column -->
    <div class="main-column col-md-12">


        <!-- Page Content -->
        <div class="error-404">
            <div class="error404-inner">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12 col-sm-12 error404-left">
                        <h1 class="entry-title text-center"><?php esc_html_e('404', 'gutenblog-theme'); ?></h1>
                        <h4 class="text-center"><?php esc_html_e('Page Not Found', 'gutenblog-theme'); ?></h4>

                        <span><p><?php esc_html_e('Why not start from', 'gutenblog-theme'); ?></p> <a href="<?php echo get_home_url(); ?>"><?php esc_html_e('Scratch', 'gutenblog-theme'); ?></a></span>

                        <div class="error404-search-wrap">
                            <h5><?php esc_html_e('Try searching for something else.', 'gutenblog-theme'); ?></h5>

                            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <label>
                                    <input type="search" class="search-field"
                                           placeholder="<?php echo esc_attr_e( 'Search', 'gutenblog-theme' ) ?> &#46;&#46;&#46;"
                                           value="<?php echo get_search_query() ?>" name="s"
                                           title="<?php echo esc_attr_e( 'Search for', 'gutenblog-theme' ) ?> &#58;" />
                                </label>
                                <input type="submit" class="search-submit"
                                       value="<?php echo esc_html_e( 'Search', 'gutenblog-theme' ); ?>" />
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
    </div>
    <!-- /Main Column -->


</div>
<!-- /Two Columns -->

<?php get_footer(); ?>