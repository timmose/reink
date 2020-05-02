<?php
get_header();
if(have_posts()) :
    while(have_posts()) : the_post(); ?>
    <div class="row">
        <div class="col-md-12">
            <article <?php post_class('post single-page-content'); ?>>
                <div class="post-content">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="az-page-thumbnail"><?php the_post_thumbnail('large'); ?></div>
                    <?php endif; ?>
                    <div class="az-page-inner">
                        <h1 class="post-title page-title"><?php the_title(); ?></h1>
                        <div class="post-excerpt">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                        </div>
                        <?php comments_template( '', true );  ?>
                    </div>
                </div>
            </article>
        </div>
    </div><?php
    endwhile;
endif;
get_footer();
