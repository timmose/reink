<section class="zox-art-wrap zoxrel zox-art-small">
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
		<div class="zox-art-grid">
			<div class="zox-art-img zoxrel zox100 zoxlh0">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail('zox-small-thumb', array( 'class' => 'lazy-load' )); ?>
				</a>
				<?php if ( has_post_format( 'video' ) || has_post_format( 'gallery' ) || has_post_format( 'audio' ) ) { ?>
					<div class="zox-post-type">
						<?php if ( has_post_format( 'video' )) { ?>
							<span class="fas fa-play"></span>
						<?php } else if ( has_post_format( 'gallery' )) { ?>
							<span class="far fa-images"></span>
						<?php } else if ( has_post_format( 'audio' )) { ?>
							<span class="fas fa-volume-up"></span>
						<?php } ?>
					</div><!--zox-post-type-->
				<?php } ?>
			</div><!--zox-art-img-->
			<?php get_template_part( 'parts/art', 'text3' ); ?>
		</div><!--zox-art-grid-->
	<?php } else { ?>
		<?php get_template_part( 'parts/art', 'text3' ); ?>
	<?php } ?>
</section><!--zox-art-wrap-->