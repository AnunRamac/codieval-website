<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xolo
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function xolo_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Header Widget Area 1', 'xolo' ),
		'id' => 'xolo-header-widget-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget_title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Header Widget Area 2', 'xolo' ),
		'id' => 'xolo-header-widget-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget_title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'xolo' ),
		'id' => 'xolo-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'xolo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget_title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'xolo' ),
		'id' => 'xolo-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'xolo' ),
		'before_widget' => '<div class="xl-column-3"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget_title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Layout Section 1', 'xolo' ),
		'id' => 'xolo-footer-layout-first',
		'description' => __( 'The Footer Layout Left', 'xolo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget_title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Layout Section 2', 'xolo' ),
		'id' => 'xolo-footer-layout-second',
		'description' => __( 'The Footer Layout Second', 'xolo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget_title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'xolo_widgets_init' );
?>