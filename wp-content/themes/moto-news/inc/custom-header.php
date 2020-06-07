<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Moto_News
 */


/**
 * Set up the WordPress core custom header feature.
 *
 * @uses moto_news_style()
 */
function moto_news_custom_header_setup() {
	register_default_headers( array(
	    'default-image' => array(
	        'url'           => get_stylesheet_directory_uri() . '/images/custom-header.jpg',
	        'thumbnail_url' => get_stylesheet_directory_uri() . '/images/custom-header-thumbnail.jpg',
	        'description'   => esc_html__( 'Default Header Image', 'moto-news' )
	    ),
	) );

	$args = array(
		// Header text color default
		'default-text-color'     => 'd7d7d7', // Header Text color

		// Header image default
		'default-image'			=> trailingslashit( esc_url ( get_stylesheet_directory_uri() ) ) . 'images/custom-header.jpg',

		// Set height and width, with a maximum value for the width.
		'height'                 => 400,
		'width'                  => 1900,

		// Support flexible height and width.
		'flex-height'            => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header.
		'wp-head-callback'       => 'moto_news_style',
	);

	add_theme_support( 'custom-header', $args );
}
add_action('after_setup_theme', 'moto_news_custom_header_setup');

if (!function_exists('moto_news_style')) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see moto_news_custom_header_setup().
     */
    function moto_news_style() {
    	$header_image = get_header_image();
    	$text_color = get_header_textcolor();

    	$show_title = magazine_plus_get_option( 'show_title' );
    	$show_tagline = magazine_plus_get_option( 'show_tagline' );

    	if ( empty( $header_image ) && ( get_theme_support( 'custom-header', 'default-text-color' ) === $text_color ) ) {
    		return;
    	}
    	else {
    		echo '
<style type="text/css" id="motorsport-header-css">';
if ( ! empty( $header_image ) ) :
	echo '
	#masthead {
		background: url(' . $header_image . ') no-repeat 50% 50%;
		-webkit-background-size:	cover;
		-moz-background-size:   	cover;
		-o-background-size:     	cover;
		background-size:        	cover;
		border-bottom:				none;
	}';
endif;

if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $text_color && ( true === $show_title || true === $show_tagline ) ) :
	echo '
	.site-title a,
	.site-title a:visited,
	.site-description {
		color: #' . get_header_textcolor(). ';
	}';
endif;
echo '
</style>';
    	}
	}
endif; // moto_news_style
