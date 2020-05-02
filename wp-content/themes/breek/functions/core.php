<?php
/*
* Common functionalities for all EP themes (static functions).
* These functions add or extends Wordpress functiontionalities.
*
*/

if ( ! class_exists( 'epcl_static_functions' ) ) {

	class epcl_static_functions {

		public function __construct() {

            /* Body Classes */
            
            add_filter( 'body_class', array( $this, 'custom_body_classes'), 5 );

			/* Front-End: Custom Excerpt */

			add_filter('excerpt_more', array( $this, 'new_excerpt_more'));
			add_filter('excerpt_length', array( $this, 'custom_excerpt_length'), 999);

        }
        
        public function custom_body_classes( $classes ) {
            $epcl_theme = epcl_get_theme_options();
            
            if( empty($epcl_theme) ) return $classes;

            if($epcl_theme['background_type'] == 1 && $epcl_theme['bg_body_pattern']['url']) $classes[] = ' pattern bg-image';
            if($epcl_theme['background_type'] == 3 && $epcl_theme['bg_body_full']['url']) $classes[] = ' cover bg-image';
            
            // Lazy Load for adsense
            if( isset($epcl_theme['enable_lazyload_adsense']) && $epcl_theme['enable_lazyload_adsense'] === '1' ) $classes[] = ' enable-lazy-adsense';
              
            return $classes;
        }

		/* Replace [...] excerpt with a new one */

		public function new_excerpt_more($more){
			return '...';
		}

		/* Change excerpt length */

		public function custom_excerpt_length($length){
			return 25;
		}

	}

	new epcl_static_functions();
}

?>
