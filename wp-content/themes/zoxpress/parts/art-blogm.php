<article class="zox-art-wrap zoxrel zox-art-main infinite-post">
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
		<div class="zox-art-grid">
			<div class="zox-art-img zoxrel zox100 zoxlh0">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail('zox-mid-thumb'); ?>
				</a>
			</div><!--zox-art-img-->
			<?php get_template_part( 'parts/art', 'text2' ); ?>
		</div><!--zox-art-grid-->
	<?php } else { ?>
		<?php get_template_part( 'parts/art', 'text2b' ); ?>
	<?php } ?>
</article><!--zox-art-wrap-->