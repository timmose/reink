<?php
/**
 * Frontpage - Large/Highlight Post
 *
 *
 */
?>



<?php 
$gutenblog_frontpage_large_post_show = gutenblog_get_option('gutenblog_frontpage_large_post_show');

if($gutenblog_frontpage_large_post_show == 1) {

    global $post;

    $gutenblog_frontpage_large_post_heading = gutenblog_get_option('gutenblog_frontpage_large_post_heading');
    $gutenblog_frontpage_large_post = gutenblog_get_option('gutenblog_frontpage_large_post');
    $post = get_post($gutenblog_frontpage_large_post);
    setup_postdata($post); 

    ?>
    <!-- Frontpage Large Post  -->
    <div class="frontpage-large-post-wrap">
        <div class="main-wrapper">
            <div class="frontpage-large-post">
                <div class="post-label"><?php echo esc_html($gutenblog_frontpage_large_post_heading); ?></div>
                <?php
                $gutenblog_entry = 'gutenblog-horizontal-big'; 
                set_query_var( 'gutenblog_entry', $gutenblog_entry );
                get_template_part('parts/entry-large');
                ?>
            </div>
        </div>
    </div>
    <!-- /Frontpage Large Post -->
    <?php 
    wp_reset_postdata();  
} ?>

