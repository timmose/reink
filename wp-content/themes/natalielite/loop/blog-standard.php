<div class="az-blog-standard">
<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            get_template_part('template-parts/content');
        }
    } else {
        get_template_part('template-parts/content', 'none');
    }
?>
</div>
<?php natalielite_pagination(); ?>
