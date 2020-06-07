<?php
 /**
 * Enqueue scripts and styles.
 */
function xolo_scripts() {
	
	// Styles	
	
	wp_enqueue_style('xolo-theme-css',get_template_directory_uri().'/assets/css/theme.css');

	wp_enqueue_style('xolo-main', get_template_directory_uri() . '/assets/css/main.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('xolo-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');
	
	wp_enqueue_style('xolo-default', get_template_directory_uri() . '/assets/css/color/default.css');
	
	wp_enqueue_style( 'xolo-style', get_stylesheet_uri() );
	
	wp_enqueue_style('xolo-widgets',get_template_directory_uri().'/assets/css/widgets.css');
	
	wp_enqueue_style('xolo-menus', get_template_directory_uri() . '/assets/css/menus.css');
	
	wp_enqueue_style('xolo-media-query', get_template_directory_uri() . '/assets/css/media-query.css');
	
	
	
	// Scripts
	wp_enqueue_script('xolo-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
	wp_enqueue_script( 'xolo-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xolo_scripts' );

//Admin Enqueue for Admin
function xolo_admin_enqueue_scripts(){
	wp_enqueue_style('xolo-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'xolo_admin_enqueue_scripts' );
?>