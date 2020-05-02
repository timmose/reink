<div class="az-blog-2cols-grid">
<?php
    if ( have_posts() ) {
    ?>
    <div class="row">
        <?php
        while ( have_posts() ) {
            the_post();
            ?>
            <div class="col-md-6">
                <?php get_template_part('template-parts/content'); ?>
            </div>
            <?php
        }
        ?>
    </div>
    <?php natalielite_pagination(); ?>
    <?php
    } else {
        get_template_part('template-parts/content', 'none');
    }
?>
</div>
