<?php
/**
 * Getting Started Page. 
 *
 * @package NewYork City
 */

require get_stylesheet_directory() . '/inc/admin/class-getting-start-plugin-helper.php';


// Adding Getting Started Page in admin menu

if( ! function_exists( 'newyork_city_getting_started_menu' ) ) :
function newyork_city_getting_started_menu() {	
		$plugin_count = null;
		if ( !is_plugin_active( 'arile-extra/arile-extra.php' ) ):	
			$plugin_count =	'<span class="awaiting-mod action-count">1</span>';
		endif;
	    /* translators: %1$s %2$s: about */		
		$title = sprintf(esc_html__('About %1$s %2$s', 'newyork-city'), esc_html( ARILEWP_THEME_NAME ), $plugin_count);
		/* translators: %1$s: welcome page */	
		add_theme_page(sprintf(esc_html__('Welcome to %1$s', 'newyork-city'), esc_html( ARILEWP_THEME_NAME ), esc_html(ARILEWP_THEME_VERSION)), $title, 'edit_theme_options', 'newyork-city-getting-started', 'newyork_city_getting_started_page');
}
endif;
add_action( 'admin_menu', 'newyork_city_getting_started_menu' );

// Load Getting Started styles in the admin
if( ! function_exists( 'newyork_city_getting_started_admin_scripts' ) ) :
function newyork_city_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_newyork-city-getting-started' != $hook ) return;

    wp_enqueue_style( 'newyork-city-getting-started', get_stylesheet_directory_uri() . '/inc/admin/css/getting-started.css', false, ARILEWP_THEME_VERSION );
    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'newyork-city-getting-started', get_stylesheet_directory_uri() . '/inc/admin/js/getting-started.js', array( 'jquery' ), ARILEWP_THEME_VERSION, true );
    wp_enqueue_script( 'newyork-city-recommended-plugin-install', get_stylesheet_directory_uri() . '/inc/admin/js/recommended-plugin-install.js', array( 'jquery' ), ARILEWP_THEME_VERSION, true );    
    wp_localize_script( 'newyork-city-recommended-plugin-install', 'newyork_city_start_page', array( 'activating' => __( 'Activating ', 'newyork-city' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'newyork_city_getting_started_admin_scripts' );


// Plugin API
if( ! function_exists( 'newyork_city_call_plugin_api' ) ) :
function newyork_city_call_plugin_api( $slug ) {
	require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		$call_api = get_transient( 'newyork_city_about_plugin_info_' . $slug );

		if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information', array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
						),
					)
				);
				set_transient( 'newyork_city_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}
endif;

// Callback function for admin page.
if( ! function_exists( 'newyork_city_getting_started_page' ) ) :
function newyork_city_getting_started_page() { ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3>
				<?php 
				/* translators: %1$s %2$s: welcome message */	
				printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'newyork-city' ), esc_html( ARILEWP_THEME_NAME ), esc_html( ARILEWP_THEME_VERSION ) ); ?></h3>
				<p><?php esc_html_e( 'NewYork City is a creative and professional multipurpose WordPress theme that is suited for business, consultant, finance, digital agency, industries, online shop and many other various site types.', 'newyork-city' ); ?></p>
			</div>
			<div class="intro right">
				<a target="_blank" href="https://themearile.com/"><img src="<?php echo get_stylesheet_directory_uri();  ?>/inc/admin/images/logo.png"></a>
			</div>
		</div>
		<div class="panels">
			<ul class="inline-list">
			    <li class="current">
					<a id="getting-started-panel" href="#">
						<?php esc_html_e( 'Getting Started', 'newyork-city' ); ?>
					</a>
				</li>
				<li class="recommended-plugins-active">
					<a id="plugins" href="#">
						<?php esc_html_e( 'Recommended Actions', 'newyork-city' ); 
						if ( !is_plugin_active( 'arile-extra/arile-extra.php' ) ):  ?>
							<span class="plugin-not-active">1</span>
						<?php endif; ?>
					</a>
				</li>
				<li>
                	<a id="useful-plugin-panel" href="#">
						<?php esc_html_e( 'Useful Plugins', 'newyork-city' ); ?>
					</a>
				</li>
				<li>
					<a id="free-pro-panel" href="#">
						<?php esc_html_e( 'Free Vs Pro', 'newyork-city' ); ?>
					</a>
				</li>
				<li>
					<a id="support-and-review" href="#">
						<?php esc_html_e( 'Support', 'newyork-city' ); ?>
					</a>
				</li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_stylesheet_directory() . '/inc/admin/tabs/getting-started-panel.php'; ?>
				<?php require get_stylesheet_directory() . '/inc/admin/tabs/recommended-plugins-panel.php'; ?>
				<?php require get_stylesheet_directory() . '/inc/admin/tabs/useful-plugin-panel.php'; ?>
				<?php require get_stylesheet_directory() . '/inc/admin/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_stylesheet_directory() . '/inc/admin/tabs/support-and-review.php'; ?>
			</div>
		<div class="panel">
				<div class="panel-aside bg-white panel-column w-50">
					<h4><?php esc_html_e( 'Links to Customizer Options', 'newyork-city' ); ?></h4>
					<li class="customize-options"><i class="dashicons dashicons-format-image"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>" target="_blank"><?php esc_html_e('Site Logo','newyork-city'); ?></a></li>
					<li class="customize-options"><i class="dashicons dashicons-align-left"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=arilewp_theme_menu_bar' ) ); ?>" target="_blank"><?php esc_html_e('Menus Options','newyork-city'); ?></a></li>
					<li class="customize-options"><i class="dashicons dashicons-schedule"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_image' ) ); ?>" target="_blank"><?php esc_html_e('Page Header Options','newyork-city'); ?></a></li>
					<li class="customize-options"><i class="dashicons dashicons-admin-customizer"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=colors' ) ); ?>" target="_blank"><?php esc_html_e('Colors Options','newyork-city'); ?></a></li>
					<li class="customize-options"><i class="dashicons dashicons-editor-textcolor"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=arilewp_base_typography' ) ); ?>" target="_blank"><?php esc_html_e('Typography Options','newyork-city'); ?></a></li>
					<?php // check for plugin using plugin name
                    if ( is_plugin_active( 'arile-extra/arile-extra.php' ) ) { ?>
					<li class="customize-options"><i class="dashicons dashicons-align-center"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=arilewp_main_theme_slider' ) ); ?>" target="_blank"><?php esc_html_e('Slider Options','newyork-city'); ?></a></li>
					<li class="customize-options"><i class="dashicons dashicons-admin-generic"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=arilewp_theme_service' ) ); ?>" target="_blank"><?php esc_html_e('Service Options','newyork-city'); ?></a></li>
					<li class="customize-options"><i class="dashicons dashicons-images-alt2"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=arilewp_theme_project' ) ); ?>" target="_blank"><?php esc_html_e('Project Options','newyork-city'); ?></a></li>
			       <li class="customize-options"><i class="dashicons dashicons-slides"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=arilewp_theme_testimonial' ) ); ?>" target="_blank"><?php esc_html_e('Testimonial Options','newyork-city'); ?></a></li><?php } ?>					
		           <li class="customize-options"><i class="dashicons dashicons-list-view"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=arilewp_blog_general' ) ); ?>" target="_blank"><?php esc_html_e('Blog Options','newyork-city'); ?></a></li>	
					<li class="customize-options"><i class="dashicons dashicons-editor-kitchensink"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=arilewp_theme_footer' ) ); ?>" target="_blank"><?php esc_html_e('Footer Options','newyork-city'); ?></a></li>
					<li class="customize-options"><i class="dashicons dashicons-welcome-write-blog"></i><a class="newyork-city-links-settings" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=custom_css' ) ); ?>" target="_blank"><?php esc_html_e('Additional Css Box','newyork-city'); ?></a></li>
				</div>
			   <div class="panel-aside bg-white panel-column w-50">
					<h4><?php esc_html_e( 'ArileWP Pro Theme Features', 'newyork-city' ); ?></h4>
					<li class="customize-options"><i class="dashicons dashicons-welcome-widgets-menus"></i><?php esc_html_e( 'Sticky Header', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-admin-generic"></i><?php esc_html_e( 'Live Customizer', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-admin-site-alt"></i><?php esc_html_e( 'Multilingual Ready', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-thumbs-up"></i><?php esc_html_e( '1 Year Free Updates', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-buddicons-topics"></i><?php esc_html_e( 'Dark & Light Layout Styles', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-editor-textcolor"></i><?php esc_html_e( 'Google Font Support', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-admin-customizer"></i><?php esc_html_e( 'Unlimited Color Schemes', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-translation"></i><?php esc_html_e( 'RTL Support', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-feedback"></i><?php esc_html_e( 'Wide & Boxed Layouts', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-editor-ltr"></i><?php esc_html_e( 'Advanced Typography', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-editor-insertmore"></i><?php esc_html_e( '4 Unique Header Layouts', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-feedback"></i><?php esc_html_e( 'Unlimited Business Sections', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-list-view"></i><?php esc_html_e( 'Advanced Blog Layouts', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-format-video"></i><?php esc_html_e( 'Video Tutorial', 'newyork-city' ); ?></li>
					<li class="customize-options"><i class="dashicons dashicons-businesswoman"></i><?php esc_html_e( 'Priority Support', 'newyork-city' ); ?></li>
				</div>
			</div>
		</div>
	</div>
	<?php
}
endif;


/**
 * Admin notice 
 */
class newyork_city_screen {
 	public function __construct() {
		/* notice  Lines*/
		add_action( 'load-themes.php', array( $this, 'newyork_city_activation_admin_notice' ) );
	}
	public function newyork_city_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'newyork_city_admin_notice' ), 99 );
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function newyork_city_admin_notice() {
		?>			
		<div class="updated notice is-dismissible newyork-city-notice">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Congratulations, Welcome to %1$s Theme', 'newyork-city'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Thank you for choosing NewYork City theme. To take full advantage of the complete features of the theme, you have to go to our %1\$s welcome page %2\$s.", "newyork-city"), '<a href="' . esc_url( admin_url( 'themes.php?page=newyork-city-getting-started' ) ) . '">', '</a>' ); ?></p>
			
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=newyork-city-getting-started' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with NewYork City','newyork-city'); ?></a></p>
		</div>
		<?php
	}
	
}
$GLOBALS['newyork_city_screen'] = new newyork_city_screen();