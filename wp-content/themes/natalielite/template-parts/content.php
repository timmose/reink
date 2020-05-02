<?php $natalielite_post_class = is_single() ? 'az-single-post-content' : null; ?>
<article <?php post_class( $natalielite_post_class ); ?>>
    <div class="post-wrapper">
        <!-- Begin : Post format -->
        <?php if ( wp_get_attachment_url( get_post_thumbnail_id() ) ) { ?>
        <div class="post-format post-standard">
            <?php if ( ! is_single() ) { ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large'); ?>
                </a>
            <?php } else { ?>
                <?php the_post_thumbnail('large'); ?>
            <?php } ?>
        </div>
        <?php } ?>
        <!-- End : Post format -->

        <!-- Begin : Post content -->
        <div class="post-content">
            <div class="post-cats">
                <?php the_category(', '); ?>
                <a class="post-date" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
            </div>

            <?php if ( ! is_single() ) { ?>
                <?php the_title( '<h2 class="post-title"><a href="'. get_the_permalink() .'">', '</a></h2>' ); ?>
            <?php } else { ?>
                <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
            <?php } ?>

            <?php if ( ! is_single() ) { ?>
                <div class="post-except">
                    <?php
                        the_excerpt();
                        if ( function_exists( 'natalielite_core_share' )  ) {
                            natalielite_core_share();
                        }
                    ?>
                </div>
            <?php } else { ?>
                <div class="single-post-content">
                    <?php
                        the_content();                        
                        wp_link_pages();
                    ?> 
                </div>
                <?php if ( get_the_tags() ) : ?>
                <div class="az-post-tags">
                    <?php the_tags('',' '); ?>
                </div>
                <?php endif; ?>
                <?php
                    if ( function_exists( 'natalielite_core_share' )  ) {
                        natalielite_core_share();
                    }
                    get_template_part( 'template-parts/single-post', 'related' );
                    comments_template( '', true ); ?>
            <?php } ?>
        </div>
        <!-- End : Post content -->
    </div>
</article>
