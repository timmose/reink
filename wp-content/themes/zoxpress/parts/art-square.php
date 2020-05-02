<article class="zox-art-wrap zoxrel">
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
		<div class="zox-art-img zoxrel zox100 zoxlh0">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php the_post_thumbnail('zox-square-thumb', array( 'class' => 'zox-reg-img lazy-load' )); ?>
			<?php the_post_thumbnail('zox-mid-thumb', array( 'class' => 'zox-mob-img lazy-load' )); ?>
			</a>
		</div><!--zox-art-img-->
	<?php } ?>
	<?php get_template_part( 'parts/art', 'text2' ); ?>
</article><!--zox-art-wrap-->