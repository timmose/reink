<?php
/**
 * Template part for displaying post share icons
 * @since 1.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php
	// Replace spaces in the title with + symbol so we can pass it in the share link
	$strip_title = strip_tags( get_the_title() );
	$text = str_replace(' ', '%20', $strip_title );
	$text_plus = str_replace(' ', '+', $strip_title );
	// If isset add via handle to twitter
	$twitter_handle = str_replace('https://twitter.com/', '', get_theme_mod( 'threeforty_social_site_twitter') );
	// In case user enters a trailing slash
	$twitter_handle = str_replace('/', '', $twitter_handle );
	$via = ( '' !== get_theme_mod( 'threeforty_social_site_twitter') ? '&amp;via=' . $twitter_handle . '' : '' );
?>

<!-- share -->
<div class="share <?php echo get_theme_mod( 'threeforty_single_share_post_position', 'bottom' ); ?>">
	<ul class="social-icons <?php echo get_theme_mod( 'threeforty_share_post_icon_style', 'icon-background' ); ?> <?php echo get_theme_mod( 'threeforty_share_post_icon_color_scheme', 'theme' ); ?>">
		<li class="share-text"><?php echo esc_html__( 'share', 'threeforty-social-plugin' ) ?></li>
		<?php if ( get_theme_mod( 'threeforty_share_post_twitter', true ) ): ?>
		<li class="social-icon twitter"><a rel="nofollow" href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo esc_attr( $text ); ?><?php echo esc_attr( $via ); ?>" target="_blank"><i class="icon-twitter"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_facebook', true ) ): ?>
		<li class="social-icon facebook"><a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="icon-facebook"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_pinterest', true ) ): ?>
		<li class="social-icon pinterest"><a rel="nofollow" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo get_the_post_thumbnail_url(); ?>&amp;description=<?php echo esc_attr( $text_plus ); ?>" target="_blank"><i class="icon-pinterest"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_linkedin', true ) ): ?>
		<li class="social-icon linkedin"><a rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr( $text_plus ); ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_tumblr', true ) ): ?>
		<li class="social-icon tumblr"><a rel="nofollow" href="https://www.tumblr.com/share/link?url=<?php the_permalink(); ?>" target="_blank"><i class="icon-tumblr"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_reddit', true ) ): ?>
		<li class="social-icon reddit"><a rel="nofollow" href="https://reddit.com/submit?url=<?php the_permalink(); ?>" target="_blank"><i class="icon-reddit-alien"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_pocket', true ) ): ?>
		<li class="social-icon pocket"><a rel="nofollow" href="https://getpocket.com/save?url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr( $text ); ?>" target="_blank"><i class="icon-get-pocket"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_vk', true ) ): ?>
		<li class="social-icon vkontakte"><a rel="nofollow" href="https://vk.com/share.php?url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr( $text ); ?>" target="_blank"><i class="icon-vkontakte"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_odnoklassniki', true ) ): ?>
		<li class="social-icon odnoklassniki"><a rel="nofollow" href="https://connect.ok.ru/dk?cmd=WidgetSharePreview&amp;st.cmd=WidgetSharePreview&amp;st.shareUrl=<?php the_permalink(); ?>" target="_blank"><i class="icon-odnoklassniki"></i></a></li>
		<?php endif; ?>
		<!-- mobile only apps -->
		<?php if ( get_theme_mod( 'threeforty_share_post_whatsapp', true ) ): ?>
		<li class="social-icon whatsapp mobile-only"><a rel="nofollow" href="whatsapp://send?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share" target="_blank"><i class="icon-whatsapp"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'threeforty_share_post_telegram', true ) ): ?>
		<li class="social-icon telegram mobile-only"><a rel="nofollow" href="'https://telegram.me/share/url?url=<?php the_permalink(); ?>&amp;text=<?php echo esc_attr( $text ); ?>" target="_blank"><i class="icon-telegram"></i></a></li>
		<?php endif; ?>
	</ul>
</div>