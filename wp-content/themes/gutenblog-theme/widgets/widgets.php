<?php
/**
 * Widgets
 *
 *
 */
?>
<?php

function gutenblog_widgets_init() {

    /* Sidebar Widgets */

    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default', 'gutenblog-theme' ),
		'id'            => 'sidebar-default',
		'before_widget' => '<div id="%1$s" class="default-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title"><span>',
		'after_title'   => '</span></h5>',
	) );


    /* Header Widgets */

	register_sidebar( array(
		'name'          => esc_html__( 'Hidden widgets', 'gutenblog-theme' ),
		'id'            => 'hidden-widgets',
		'description'   => esc_html__( 'Add widgets here to appear in the hidden menu.', 'gutenblog-theme' ),
		'before_widget' => '<div id="%1$s" class="hidden-widgets widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="screen-reader-text">',
		'after_title'   => '</h5>',
	) );

    /* Footer Widgets */

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar - Col 1', 'gutenblog-theme' ),
		'id'            => 'footer-sidebar-col-1',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar - Col 2', 'gutenblog-theme' ),
		'id'            => 'footer-sidebar-col-2',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar - Col 3', 'gutenblog-theme' ),
		'id'            => 'footer-sidebar-col-3',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar - Col 4', 'gutenblog-theme' ),
		'id'            => 'footer-sidebar-col-4',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );


}

add_action( 'widgets_init', 'gutenblog_widgets_init' );

?>