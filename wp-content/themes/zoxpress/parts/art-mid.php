<section class="zox-art-wrap zoxrel zox-art-mid">
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
		<div class="zox-art-grid">
			<div class="zox-art-img zoxrel zox100 zoxlh0">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail('zox-mid-thumb', array( 'class' => 'zox-reg-img lazy-load' )); ?>
				<?php the_post_thumbnail('zox-small-thumb', array( 'class' => 'zox-mob-img lazy-load' )); ?>
				</a>
				<div class="zox-post-type">
					<?php if ( has_post_format( 'video' )) { ?>
						<span class="fas fa-play"></span>
					<?php } else if ( has_post_format( 'gallery' )) { ?>
						<span class="far fa-images"></span>
					<?php } else if ( has_post_format( 'audio' )) { ?>
						<span class="fas fa-volume-up"></span>
					<?php } else { ?>
						<span class="far fa-file-alt"></span>
					<?php } ?>
				</div><!--zox-post-type-->
			</div><!--zox-art-img-->
			<?php get_template_part( 'parts/art', 'text2' ); ?>
		</div><!--zox-art-grid-->
	<?php } else { ?>
		<?php get_template_part( 'parts/art', 'text2b' ); ?>
	<?php } ?>
</section><!--zox-art-wrap-->