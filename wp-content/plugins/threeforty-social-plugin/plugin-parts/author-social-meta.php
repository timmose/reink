<?php
/**
 * The template for displaying the author social media meta
 *
 */

?>
<?php
// Set some variables for icon and text style
$style = ( '' !== $style ? $style : 'icon-background' );
$color_scheme  = ( '' !== $color_scheme ? $color_scheme : 'theme' );

 ?>

<?php if ( $style === 'text' ) : ?>
<div class="entry-meta author-social-media">
<?php endif; ?>
	<ul class="author-social social-icons <?php echo esc_attr( $style . ' ' . $color_scheme ); ?>">
		<?php if ( '' === $style || $style === 'text' ) : ?>
			<li class="social-icon"><?php echo esc_html__( 'follow me', 'threeforty-social-plugin' ); ?></li>
		<?php endif; ?>

		<?php if (get_the_author_meta('threeforty_author_meta_twitter')) : ?>
			<li class="social-icon twitter"><a href="<?php echo esc_attr( the_author_meta('threeforty_author_meta_twitter') ); ?>" class="twitter" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-twitter"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'twitter', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_facebook')) : ?>
			<li class="social-icon facebook"><a href="<?php echo esc_attr( the_author_meta('threeforty_author_meta_facebook') ); ?>" class="facebook" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-facebook"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'facebook', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_instagram')) : ?>
			<li class="social-icon instagram"><a href="<?php echo esc_attr( the_author_meta('threeforty_author_meta_instagram') ); ?>" class="instagram" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-instagram"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'instagram', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_youtube')) : ?>
			<li class="social-icon youtube"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_youtube') ); ?>" class="youtube" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-youtube"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'youtube', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_tumblr')) : ?>
			<li class="social-icon tumblr"><a href="<?php echo esc_attr( the_author_meta('threeforty_author_meta_tumblr') ); ?>" class="tumblr" target="_blank"><?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-tumblr"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'tumblr', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_pinterest')) : ?>
			<li class="social-icon pinterest"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_pinterest') ); ?>" class="pinterest" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-pinterest"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'pinterest', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_dribbble')) : ?>
			<li class="social-icon dribbble"><a href="<?php echo esc_attr( the_author_meta('threeforty_author_meta_dribbble') ); ?>" class="dribbble" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-dribbble"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'dribbble', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_linkedin')) : ?>
			<li class="social-icon linkedin"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_linkedin') ); ?>" class="linkedin" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-linkedin"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'linkedin', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_soundcloud')) : ?>
			<li class="social-icon soundcloud"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_soundcloud') ); ?>" class="soundcloud" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-soundcloud"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'soundcloud', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_spotify')) : ?>
			<li class="social-icon spotify"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_spotify') ); ?>" class="spotify" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-spotify"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'spotify', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_medium')) : ?>
			<li class="social-icon medium"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_medium') ); ?>" class="medium" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-medium"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'medium', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_500px')) : ?>
			<li class="social-icon px500"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_500px') ); ?>" class="px500" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-500px"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( '500px', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_vimeo')) : ?>
			<li class="social-icon vimeo"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_vimeo') ); ?>" class="vimeo" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-vimeo"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'vimeo', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_vkontakte')) : ?>
			<li class="social-icon vkontakte"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_vk') ); ?>" class="vk" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-vkontakte"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'vk', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_mixcloud')) : ?>
			<li class="social-icon mixcloud"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_mixcloud') ); ?>" class="mixcloud" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-mixcloud"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'mixcloud', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_gab')) : ?>
			<li class="social-icon gab"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_gab') ); ?>" class="gab" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-gab"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'gab', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_minds')) : ?>
			<li class="social-icon minds"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_minds') ); ?>" class="minds" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-minds"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'minds', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_bitchute')) : ?>
			<li class="social-icon bitchute"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_bitchute') ); ?>" class="bitchute" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-minds"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'bitchute', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_steemit')) : ?>
			<li class="social-icon steemit"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_steemit') ); ?>" class="steemit" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-steemit"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'steemit', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_tiktok')) : ?>
			<li class="social-icon tiktok"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_tiktok') ); ?>" class="tiktok" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-tiktok"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'TikTok', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('threeforty_author_meta_odnoklassniki')) : ?>
			<li class="social-icon odnoklassniki"><a href="<?php echo esc_url( the_author_meta('threeforty_author_meta_odnoklassniki') ); ?>" class="odnoklassniki" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-odnoklassniki"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'Odnoklassniki', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
		<?php if (get_the_author_meta('url')) : ?>
			<li class="social-icon"><a href="<?php echo esc_url( the_author_meta('url') ); ?>" class="website" target="_blank">
				<?php if ( $style === 'icon' || $style === 'icon-background' || $style === 'text-icon' ) {
					echo '<span><i class="icon-globe"></i></span>';
				}
				if ( $style === 'text-icon' || $style === 'text' ) {
					echo esc_html__( 'website', 'threeforty-social-plugin' );
				} ?></a></li>
		<?php endif ?>
	</ul>
	<?php if ( $style === 'text' ) : ?>
</div>
<?php endif; ?>