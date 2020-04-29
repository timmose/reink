<?php
/**
 * Displays footer widgets
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar( 'footer-column-1' ) ||
	 is_active_sidebar( 'footer-column-2' ) ||
	 is_active_sidebar( 'footer-column-3' ) ) :
?>

	<div class="footer-widget-area footer-columns flex-grid cols-3">
		<?php
		if ( is_active_sidebar( 'footer-column-1' ) ) { ?>
			<div class="flex-box footer-column-1">
				<?php dynamic_sidebar( 'footer-column-1' ); ?>
			</div>
		<?php }
		if ( is_active_sidebar( 'footer-column-2' ) ) { ?>
			<div class="flex-box footer-column-2">
				<?php dynamic_sidebar( 'footer-column-2' ); ?>
			</div>
		<?php }
		if ( is_active_sidebar( 'footer-column-3' ) ) { ?>
			<div class="flex-box footer-column-3">
				<?php dynamic_sidebar( 'footer-column-3' ); ?>
			</div>
		<?php } ?>
	</div><!-- .widget-area -->

<?php endif; ?>