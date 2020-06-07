<?php
/**
 * Theme functions and definitions
 *
 * @package NewYork City
 */

/**
 * After setup theme hook
 */
function newyork_city_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'newyork-city', get_stylesheet_directory() . '/languages' );	
	require get_stylesheet_directory() . '/inc/customizer/newyork-city-customizer-options.php';	
	if ( is_admin() ) {
        require get_stylesheet_directory() . '/inc/admin/getting-started.php';
	}
}
add_action( 'after_setup_theme', 'newyork_city_theme_setup' );

/**
 * Load assets.
 */

function newyork_city_theme_css() {
	wp_enqueue_style( 'newyork-city-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('newyork-city-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('newyork-city-default-css', get_stylesheet_directory_uri() . "/assets/css/theme-default.css" );
    wp_enqueue_style('newyork-city-bootstrap-smartmenus-css', get_stylesheet_directory_uri() . "/assets/css/bootstrap-smartmenus.css" ); 	
}
add_action( 'wp_enqueue_scripts', 'newyork_city_theme_css', 99);

/**
 * Import Options From Parent Theme
 *
 */
function newyork_city_parent_theme_options() {
	$arilewp_mods = get_option( 'theme_mods_arilewp' );
	if ( ! empty( $arilewp_mods ) ) {
		foreach ( $arilewp_mods as $arilewp_mod_k => $arilewp_mod_v ) {
			set_theme_mod( $arilewp_mod_k, $arilewp_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'newyork_city_parent_theme_options' );

/**
 * Fresh site activate
 *
 */
$fresh_site_activate = get_option( 'fresh_newyork_city_site_activate' );
if ( (bool) $fresh_site_activate === false ) {
	set_theme_mod( 'arilewp_page_header_background_color', 'rgba(0,0,0,0.6)' );
	set_theme_mod( 'arilewp_testomonial_background_image', get_stylesheet_directory_uri().'/assets/img/theme-bg.jpg' );
	update_option( 'fresh_newyork_city_site_activate', true );
}

/**
 * Custom Theme Script
*/
function newyork_city_custom_theme_css() {
	$newyork_city_testomonial_background_image = get_theme_mod('arilewp_testomonial_background_image');
	?>
    <style type="text/css">
		<?php if($newyork_city_testomonial_background_image != null) : ?>
		.theme-testimonial { 
		        background-image: url(<?php echo esc_url( $newyork_city_testomonial_background_image ); ?>); 
                background-size: cover;
				background-position: center center;
		}
        <?php endif; ?>
    </style>
 
<?php }
add_action('wp_footer','newyork_city_custom_theme_css');

/**
 * Page header
 *
 */
function newyork_city_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'newyork_city_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri().'/assets/img/newyork-city-header-image.jpg',
		'default-text-color' => '000000',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'newyork_city_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'newyork_city_custom_header_setup' );

if ( ! function_exists( 'newyork_city_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see newyork_city_custom_header_setup().
	 */
	function newyork_city_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;