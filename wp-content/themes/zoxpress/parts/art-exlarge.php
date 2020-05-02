<article class="zox-art-wrap zoxrel">
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
		<div class="zox-art-grid">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			<div class="zox-art-img zoxrel zox100 zoxlh0">
				<?php the_post_thumbnail('', array( 'class' => 'zox-reg-img lazy-load' )); ?>
				<?php the_post_thumbnail('zox-square-thumb', array( 'class' => 'zox-mob-img lazy-load' )); ?>
			</div><!--zox-art-img-->
			</a>
			<?php get_template_part( 'parts/art', 'text1b' ); ?>
		</div><!--zox-art-grid-->
	<?php } else { ?>
		<?php get_template_part( 'parts/art', 'text1b' ); ?>
	<?php } ?>
</article><!--zox-art-wrap-->