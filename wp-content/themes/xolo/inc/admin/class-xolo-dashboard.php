<?php
/**
 * Xolo About page class.
 *
 * @package     Xolo
 * @author      Xolo Software
 * @since       1.0.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Xolo_Options' ) ) :
	/**
	 * Xolo Dashboard page class.
	 */
	final class Xolo_Options {

		/**
		 * Singleton instance of the class.
		 *
		 * @since 1.0.0
		 * @var object
		 */
		private static $instance;

		/**
		 * Main Xolo Dashboard Instance.
		 *
		 * @since 1.0.0
		 * @return Xolo_Options
		 */
		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Xolo_Options ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Primary class constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			/**
			 * Register admin menu item under Appearance menu item.
			 */
			add_action( 'admin_menu', array( $this, 'add_to_menu' ), 10 );
			add_filter( 'submenu_file', array( $this, 'highlight_submenu' ) );

			/**
			 * Ajax activate & deactivate plugins.
			 */
			add_action( 'wp_ajax_xolo-plugin-activate', array( $this, 'activate_plugin' ) );
			add_action( 'wp_ajax_xolo-plugin-deactivate', array( $this, 'deactivate_plugin' ) );
		}

		/**
		 * Register our custom admin menu item.
		 *
		 * @since 1.0.0
		 */
		public function add_to_menu() {

			/**
			 * Dashboard page.
			 */
			add_theme_page(
				esc_html__( 'Xolo Options', 'xolo' ),
				'Xolo Options',
				apply_filters( 'xolo_manage_cap', 'edit_theme_options' ),
				'xolo-dashboard',
				array( $this, 'render_dashboard' )
			);

			/**
			 * Plugins page.
			 */
			add_theme_page(
				esc_html__( 'Plugins', 'xolo' ),
				'Plugins',
				apply_filters( 'xolo_manage_cap', 'edit_theme_options' ),
				'xolo-plugins',
				array( $this, 'render_plugins' )
			);

			// Hide from admin navigation.
			remove_submenu_page( 'themes.php', 'xolo-plugins' );

			/**
			 * Changelog page.
			 */
			add_theme_page(
				esc_html__( 'Changelog', 'xolo' ),
				'Changelog',
				apply_filters( 'xolo_manage_cap', 'edit_theme_options' ),
				'xolo-changelog',
				array( $this, 'render_changelog' )
			);

			// Hide from admin navigation.
			remove_submenu_page( 'themes.php', 'xolo-changelog' );
		}

		/**
		 * Render dashboard page.
		 *
		 * @since 1.0.0
		 */
		public function render_dashboard() {

			// Render dashboard navigation.
			$this->render_navigation();

			?>
			<div class="xl-websites">
				<div class="xl-page-content">
					<div class="xl-sites-panel">
						<div class="xl-container">
							<div class="xl-column-12">
								<div class="xl-section-title">
									<h2><?php esc_html_e( 'Getting Started', 'xolo' ); ?></h2>
								</div>
							</div>
						</div>
						<div class="xl-container-no-area">
							<div class="xl-column-12">
								<div class="xl-columns-area">
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-admin-plugins"></i><?php esc_html_e( 'Install Plugins', 'xolo' ); ?></h4>                            
												<a href="<?php echo esc_url( menu_page_url( 'xolo-plugins', false ) ); ?>" class="xl-btn xl-btn-outline"><?php esc_html_e( 'Install Plugins', 'xolo' ); ?></a>
											</div>
											<p><?php esc_html_e( 'Install the recommended plugins by Xolo. These plugins provides you complete theme features.', 'xolo' ); ?></p>
										</div>
									</div>
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-layout"></i><?php esc_html_e( 'Import Xolo Websites', 'xolo' ); ?></h4>
												<div class="xolo-buttons plugins">
													<?php
													if ( file_exists( WP_PLUGIN_DIR . '/xolo-websites/xolo-websites.php' ) && is_plugin_inactive( 'xolo-websites/xolo-websites.php' ) ) {
														$class       = 'xl-btn xl-btn-outline xolo-btn secondary';
														$button_text = __( 'Activate Xolo Websites', 'xolo' );
														$link        = '#';
														$data        = ' data-plugin="xolo-websites" data-action="activate" data-redirect="' . esc_url( admin_url( 'admin.php?page=xolo-websites' ) ) . '"';
													} elseif ( ! file_exists( WP_PLUGIN_DIR . '/xolo-websites/xolo-websites.php' ) ) {
														$class       = 'xl-btn xl-btn-outline xolo-btn secondary';
														$button_text = __( 'Install Xolo Websites', 'xolo' );
														$link        = '#';
														$data        = ' data-plugin="xolo-websites" data-action="install" data-redirect="' . esc_url( admin_url( 'admin.php?page=xolo-websites' ) ) . '"';
													} else {
														$class       = 'xl-btn xl-btn-fill xl-btn-dark xolo-btn secondary active';
														$button_text = __( 'Browse Demos', 'xolo' );
														$link        = admin_url( 'admin.php?page=xolo-websites' );
														$data        = '';
													}

													printf(
														'<a class="%1$s" %2$s %3$s role="button"> %4$s </a>',
														esc_attr( $class ),
														isset( $link ) ? 'href="' . esc_url( $link ) . '"' : '',
														$data, // phpcs:ignore
														esc_html( $button_text )
													);
													?>
												</div>	
											</div>
											<p><?php esc_html_e( 'Want to save your time while building website? Import our Xolo Websites with single click installation.', 'xolo' ); ?></p>
										</div>
									</div>
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-palmtree"></i><?php esc_html_e( 'Upload Logo', 'xolo' ); ?></h4>                            
												<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>" target="_blank" class="xl-btn xl-btn-outline"><?php esc_html_e( 'Upload Logo', 'xolo' ); ?></a>
											</div>
											<p><?php esc_html_e( 'Upload your brand logo to your website. It will improve your website impression.', 'xolo' ); ?></p>
										</div>
									</div>
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-art"></i><?php esc_html_e( 'Change Colors', 'xolo' ); ?></h4>                            
												<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=colors' ) ); ?>" target="_blank" class="xl-btn xl-btn-outline"><?php esc_html_e( 'Change Colors', 'xolo' ); ?></a>
											</div>
											<p><?php esc_html_e( 'Change the default theme colors and make your website color scheme with your brand color.', 'xolo' ); ?></p>
										</div>
									</div>
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-align-center"></i><?php esc_html_e( 'Header Layouts', 'xolo' ); ?></h4>                            
												<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=xolo_header_type' ) ); ?>" target="_blank" class="xl-btn xl-btn-outline"><?php esc_html_e( 'Header Layouts', 'xolo' ); ?></a>
											</div>
											<p><?php esc_html_e( "Didn't like the default theme header. No matter, you can change it. 5 header variety ready to choose.", "xolo" ); ?></p>
										</div>
									</div>
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-editor-textcolor"></i><?php esc_html_e( 'Customize Fonts', 'xolo' ); ?></h4>                            
												<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=xolo_typography' ) ); ?>" target="_blank" class="xl-btn xl-btn-outline"><?php esc_html_e( 'Customize Fonts', 'xolo' ); ?></a>
											</div>
											<p><?php esc_html_e( 'Customize the default theme fonts. Change websites fonts as per your needs.', 'xolo' ); ?></p>
										</div>
									</div>
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-layout"></i><?php esc_html_e( 'Website Layout', 'xolo' ); ?></h4>                            
												<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=xolo_container' ) ); ?>" target="_blank" class="xl-btn xl-btn-outline"><?php esc_html_e( 'Website Layout', 'xolo' ); ?></a>
											</div>
											<p><?php esc_html_e( 'Change the default theme layout. There are 3 website containers layout ready to change.', 'xolo' ); ?></p>
										</div>
									</div>
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-admin-generic"></i><?php esc_html_e( 'Change Menus', 'xolo' ); ?></h4>                            
												<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" target="_blank" class="xl-btn xl-btn-outline"><?php esc_html_e( 'Go to Menus', 'xolo' ); ?></a>
											</div>
											<p><?php esc_html_e( 'Customize menu links and choose what&rsquo;s displayed in available theme menu locations.', 'xolo' ); ?></p>
										</div>
									</div>
									<div class="xl-column-4">
										<div class="xl-post">
											<div class="xl-post-head">
												<h4><i class="dashicons dashicons-art"></i><?php esc_html_e( 'Need Support?', 'xolo' ); ?></h4>                            
												<a href="<?php echo esc_url('https://wordpress.org/support/theme/xolo/'); ?>" target="_blank" class="xl-btn xl-btn-outline"><?php esc_html_e( 'Need Support', 'xolo' ); ?></a>
											</div>
											<p><?php esc_html_e( "If you've a technical question, the fastest way to get support from our developers is by submitting a ticket.", 'xolo' ); ?></p>
										</div>
									</div>
								</div>
							</div>                     
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		/**
		 * Render the recommended plugins page.
		 *
		 * @since 1.0.0
		 */
		public function render_plugins() {

			// Render dashboard navigation.
			$this->render_navigation();

			$plugins = xolo_plugin_utilities()->get_recommended_plugins();
			?>
			<div class="xl-websites">
				<div class="xl-page-content">
					<div class="xl-sites-panel">
						<div class="xl-container">
							<div class="xl-column-12">
								<div class="xl-section-title">
									<h2><?php esc_html_e( 'Recommended Plugins', 'xolo' ); ?></h2>
								</div>
							</div>
						</div>
						<div class="xl-container-no-area">
							<div class="xl-column-12">
								<div class="xl-columns-area">
									<?php if ( is_array( $plugins ) && ! empty( $plugins ) ) { ?>
									<?php foreach ( $plugins as $plugin ) { ?>

										<?php
										// Check plugin status.
										if ( xolo_plugin_utilities()->is_activated( $plugin['slug'] ) ) {
											$btn_class = 'xl-btn xl-btn-outline xolo-btn secondary';
											$btn_text  = esc_html__( 'Deactivate', 'xolo' );
											$action    = 'deactivate';
											$notice    = '<span class="xolo-active-plugin"><span class="dashicons dashicons-yes"></span>' . esc_html__( 'Plugin activated', 'xolo' ) . '</span>';
										} elseif ( xolo_plugin_utilities()->is_installed( $plugin['slug'] ) ) {
											$btn_class = 'xl-btn xl-btn-fill xolo-btn primary';
											$btn_text  = esc_html__( 'Activate', 'xolo' );
											$action    = 'activate';
											$notice    = '';
										} else {
											$btn_class = 'xl-btn xl-btn-fill xolo-btn primary';
											$btn_text  = esc_html__( 'Install & Activate', 'xolo' );
											$action    = 'install';
											$notice    = '';
										}
										?>

										<div class="xl-column-4 plugins">
											<div class="xl-post">
												<div class="plugin-info">
													<h4><i class="dashicons dashicons-admin-plugins"></i><?php echo esc_html( $plugin['name'] ); ?></h4>
													<div class="xolo-buttons">
														<?php echo ( wp_kses_post( $notice ) ); ?>
														<a href="#" class="<?php echo esc_attr( $btn_class ); ?>" data-plugin="<?php echo esc_attr( $plugin['slug'] ); ?>" data-action="<?php echo esc_attr( $action ); ?>"><?php echo esc_html( $btn_text ); ?></a>
														
														<?php 
															if ( xolo_plugin_utilities()->is_activated( $plugin['slug'] ) ) {
																echo wp_kses_post( $plugin['html'] );
															}
															?>
													</div>
												</div>
												<p><?php echo esc_html( $plugin['desc'] ); ?></p>
											</div>
										</div>
										
									<?php } ?>
								<?php } ?>
								</div>
							</div>                      
						</div>
					</div>
				</div>	
			</div>

			<?php
		}

		/**
		 * Render the changelog page.
		 *
		 * @since 1.0.0
		 */
		public function render_changelog() {

			// Render dashboard navigation.
			$this->render_navigation();

			$changelog = XOLO_PARENT_DIR . '/changelog.txt';

			if ( ! file_exists( $changelog ) ) {
				$changelog = esc_html__( 'Changelog file not found.', 'xolo' );
			} elseif ( ! is_readable( $changelog ) ) {
				$changelog = esc_html__( 'Changelog file not readable.', 'xolo' );
			} else {
				global $wp_filesystem;

				// Check if the the global filesystem isn't setup yet.
				if ( is_null( $wp_filesystem ) ) {
					WP_Filesystem();
				}

				$changelog = $wp_filesystem->get_contents( $changelog );
			}

			?>
			<div class="xl-websites">
				<div class="xl-page-content">
					<div class="xl-sites-panel">
						<div class="xl-container">
							<div class="xl-column-12">
								<div class="xolo-section-title">
									<h2>
										<span><?php esc_html_e( 'Xolo Theme Changelog', 'xolo' ); ?></span>
										<span class="changelog-version"><?php echo esc_html( sprintf( 'v%1$s', XOLO_THEME_VERSION ) ); ?></span>
									</h2>
								</div>
							</div><!-- END .xolo-section-title -->
						</div><!-- END .xl-container -->
						<div class="xl-container-no-area">
							<div class="xl-column-12">
								<div class="xolo-box xolo-changelog">
									<pre><?php echo esc_html( $changelog ); ?></pre>
								</div>
							</div>
						</div><!-- END .xolo-columns -->

						<?php do_action( 'xolo_after_changelog' ); ?>
					</div>
				</div>
			</div>
			<?php
		}

		/**
		 * Render admin page navigation tabs.
		 *
		 * @since 1.0.0
		 */
		public function render_navigation() {

			// Get navigation items.
			$menu_items = $this->get_navigation_items();

			?>
			<div class="xl-page-wrapper">
				<div class="xl-tab-panel">
					<div class="xl-theme-body">
		                <div class="xl-tabs xl-tabs-normal">
		                	<ul>
								<?php
								// Determine current tab.
								$base = $this->get_current_page();

								// Display menu items.
								foreach ( $menu_items as $item ) {

									// Check if we're on a current item.
									$current = false !== strpos( $base, $item['id'] ) ? 'current-item' : '';
									?>
									<li class="<?php echo esc_attr( $current ); ?>">
										<a href="<?php echo esc_url( $item['url'] ); ?>" class="xl-tabs-link">
											<?php echo esc_html( $item['name'] ); ?>

											<?php
											if ( isset( $item['icon'] ) && $item['icon'] ) {
												xolo_print_admin_icon( $item['icon'] );
											}
											?>
										</a>
									</li>
								<?php } ?>
			                </ul>
		                </div>
		            </div>
				</div>

			</div><!-- END .xl-container -->
			<?php
		}

		/**
		 * Return the current Xolo Dashboard page.
		 *
		 * @since 1.0.0
		 * @return string $page Current dashboard page slug.
		 */
		public function get_current_page() {

			$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : 'dashboard'; // phpcs:ignore
			$page = str_replace( 'xolo-', '', $page );
			$page = apply_filters( 'xolo_dashboard_current_page', $page );

			return esc_html( $page );
		}

		/**
		 * Print admin page navigation items.
		 *
		 * @since 1.0.0
		 * @return array $items Array of navigation items.
		 */
		public function get_navigation_items() {

			$items = array(
				'dashboard' => array(
					'id'   => 'dashboard',
					'name' => esc_html__( 'Getting Started', 'xolo' ),
					'icon' => '',
					'url'  => menu_page_url( 'xolo-dashboard', false ),
				),
				'plugins'   => array(
					'id'   => 'plugins',
					'name' => esc_html__( 'Recommended Plugins', 'xolo' ),
					'icon' => '',
					'url'  => menu_page_url( 'xolo-plugins', false ),
				),
				'changelog' => array(
					'id'   => 'changelog',
					'name' => esc_html__( 'Changelog', 'xolo' ),
					'icon' => '',
					'url'  => menu_page_url( 'xolo-changelog', false ),
				),
			);

			return apply_filters( 'xolo_dashboard_navigation_items', $items );
		}

		/**
		 * Activate plugin.
		 *
		 * @since 1.0.0
		 */
		public function activate_plugin() {

			// Security check.
			check_ajax_referer( 'xolo_nonce' );

			// Plugin data.
			$plugin = isset( $_POST['plugin'] ) ? sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) : '';

			if ( empty( $plugin ) ) {
				wp_send_json_error( esc_html__( 'Missing plugin data', 'xolo' ) );
			}

			if ( $plugin ) {

				$response = xolo_plugin_utilities()->activate_plugin( $plugin );

				if ( is_wp_error( $response ) ) {
					wp_send_json_error( $response->get_error_message(), $response->get_error_code() );
				}

				wp_send_json_success();
			}

			wp_send_json_error( esc_html__( 'Failed to activate plugin. Missing plugin data.', 'xolo' ) );
		}

		/**
		 * Deactivate plugin.
		 *
		 * @since 1.0.0
		 */
		public function deactivate_plugin() {

			// Security check.
			check_ajax_referer( 'xolo_nonce' );

			// Plugin data.
			$plugin = isset( $_POST['plugin'] ) ? sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) : '';

			if ( empty( $plugin ) ) {
				wp_send_json_error( esc_html__( 'Missing plugin data', 'xolo' ) );
			}

			if ( $plugin ) {
				$response = xolo_plugin_utilities()->deactivate_plugin( $plugin );

				if ( is_wp_error( $response ) ) {
					wp_send_json_error( $response->get_error_message(), $response->get_error_code() );
				}

				wp_send_json_success();
			}

			wp_send_json_error( esc_html__( 'Failed to deactivate plugin. Missing plugin data.', 'xolo' ) );
		}

		/**
		 * Highlight dashboard page for plugins page.
		 *
		 * @since 1.0.0
		 * @param string $submenu_file The submenu file.
		 */
		public function highlight_submenu( $submenu_file ) {

			global $pagenow;

			// Check if we're on xolo plugins or changelog page.
			if ( 'themes.php' === $pagenow ) {
				if ( isset( $_GET['page'] ) ) { // phpcs:ignore
					if ( 'xolo-plugins' === $_GET['page'] || 'xolo-changelog' === $_GET['page'] ) { // phpcs:ignore
						$submenu_file = 'xolo-dashboard';
					}
				}
			}

			return $submenu_file;
		}
	}
endif;

/**
 * The function which returns the one Xolo_Options instance.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $xolo_options = xolo_options(); ?>
 *
 * @since 1.0.0
 * @return object
 */
function xolo_options() {
	return Xolo_Options::instance();
}

xolo_options();
