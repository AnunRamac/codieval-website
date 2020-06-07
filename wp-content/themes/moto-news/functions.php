<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moto_News
 */

if ( ! function_exists( 'moto_news_setup' ) ) :
	/**
	 * Loads the child theme textdomain and update notifier.
	 */
	function moto_news_setup() {
	    load_child_theme_textdomain( 'moto-news', get_stylesheet_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'moto_news_setup' );

if ( ! function_exists( 'moto_news_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function moto_news_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );
		$parent_theme_version = wp_get_theme(get_template())->get( 'Version' );

		/* If using a child theme, auto-load the parent theme style. */
		if ( is_child_theme() ) {
			wp_enqueue_style( 'magazine-plus-style', get_template_directory_uri() . '/style.css', array(), $parent_theme_version );
		}

		/* Always load active theme's style.css. */
		wp_enqueue_style( 'moto-news-style', get_stylesheet_uri(), array(), $theme_version );
	}
endif;
add_action( 'wp_enqueue_scripts', 'moto_news_scripts' );

/**
 * Parent theme override functions
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/override-parent.php';


/**
 * Add functions for header media.
 */
require trailingslashit( get_stylesheet_directory() ) .'inc/custom-header.php';
