<?php
/**
 * Template for displaying search forms
 *
 * @package WordPress
 * @subpackage Carrino
 * @since 1.0
 * @version 1.1
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'carrino' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_html__( 'Search and press Enter', 'carrino' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><i class="icon-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'carrino' ); ?></span></button>
</form>
