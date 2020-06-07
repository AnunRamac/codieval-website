<?php
/**
 * Override parent functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moto_News
 */

/**
 * Return fonts URL.
 *
 * @since 0.1
 * @return string Font URL.
 */
function magazine_plus_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato: font: on or off', 'moto-news' ) ) {
		$fonts[] = 'Lato:300,300i,400,400i,700,700i';
	}

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'moto-news' ) ) {
		$fonts[] = 'Roboto:300,300i,400,400i,500,500i,700,700i';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Custom content width.
 *
 * @since 1.0.0
 */
function magazine_plus_custom_content_width() {

	global $post, $wp_query, $content_width;

	$global_layout = magazine_plus_get_option( 'global_layout' );
	$global_layout = apply_filters( 'magazine_plus_filter_theme_global_layout', $global_layout );

	switch ( $global_layout ) {

		case 'no-sidebar':
			$content_width = 1310;
			break;

		case 'three-columns':
			$content_width = 610;
			break;

		case 'left-sidebar':
		case 'right-sidebar':
			$content_width = 960;
			break;

		default:
			break;
	}

}

/**
 * Add default message in front widget area.
 *
 * @since 1.0.0
 */
function magazine_plus_add_default_message_front_widgets() {

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	// Default message.
	$args = array(
		'title' => esc_html__( 'Welcome to Moto News', 'moto-news' ),
		'text'  => esc_html__( 'You are seeing this because there is no any widget in Front Page Widget Area. To add widgets, go to Appearance->Widgets in admin panel. This message will disappear when you add widgets.', 'moto-news' ),
	);
	$widget_args = array(
		'before_widget' => '<aside id="moto-news-default-home-text" class="widget moto-news-default-text">',
		'after_widget'  => '</aside>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title'  => '</span></h2>',
	);
	the_widget( 'WP_Widget_Text', $args, $widget_args );

}


/**
 * Change Custom background default color
 * @param  array $params parent theme Custom Background parameters
 * @return array Modified child theme Custom Background Parameters
 */
function moto_news_background_parameters( $params ) {
	$params['default-color'] = '#f1f1f1';
	return $params;
}
add_filter( 'magazine_plus_custom_background_args', 'moto_news_background_parameters' );
