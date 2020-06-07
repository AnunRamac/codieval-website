<?php
/**
 * Contains various functions that may be potentially used throughout
 * the theme.
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

/**
 * Check if we're on a Xolo admin page.
 *
 * @since 1.0.0
 * @param boolean|string $base current screen base.
 * @param string         $slug page slug.
 * @return boolean
 */
function xolo_admin_page( $base = false, $slug = 'xolo' ) {

	if ( false === $base ) {
		$base = get_current_screen()->base;
	}

	return false !== strpos( $base, $slug );
}

/**
 * Print admin notice.
 *
 * @since 1.0.0
 * @param array $args array of options.
 * @return boolean|void
 */
function xolo_print_notice( $args ) {

	$defaults = array(
		'type'           => 'success',
		'message'        => '',
		'is_dismissible' => true,
		'message_id'     => '',
		'expires'        => 0,
		'display_on'     => array(),
		'action_link'    => '',
		'action_text'    => '',
		'dismiss_text'   => esc_html__( 'Dismiss', 'xolo' ),
	);

	$args = wp_parse_args( $args, $defaults );

	if ( xolo_is_notice_dismissed( $args['message_id'] ) ) {
		return false;
	}

	if ( ! empty( $args['display_on'] ) ) {

		$base    = get_current_screen()->base;
		$display = false;

		foreach ( $args['display_on'] as $page ) {
			if ( false !== strpos( $base, $page ) ) {
				$display = true;
			}
		}

		if ( ! $display ) {
			return false;
		}
	}

	$xolo_is_dismissible = $args['is_dismissible'] ? ' is-dismissible' : ''; ?>

	<div id="<?php echo esc_attr( $args['message_id'] ); ?>" class="notice xolo-notice notice-<?php echo esc_attr( $args['type'] ); ?><?php echo esc_attr( $xolo_is_dismissible ); ?>">
		<p><?php echo ( wp_kses( $args['message'], xolo_get_allowed_html_tags() ) ); ?></p>

		<?php
		if ( $args['action_link'] && $args['action_text'] ) {
			?>
			<p class="xolo-notice-action">
				<a href="<?php echo esc_url( $args['action_link'] ); ?>" class="xl-btn xl-btn-fill xolo-btn primary button button-primary" role="button"><?php echo esc_html( $args['action_text'] ); ?></a>

				<?php
				if ( $args['dismiss_text'] ) {
					?>
					<a href="#" class="xl-btn xl-btn-outline xolo-btn secondary button button-secondary xolo-notice-dismiss" role="button"><?php echo esc_html( $args['dismiss_text'] ); ?></a>
					<?php
				}
				?>
			</p><!-- END .xolo-notice-action -->
			<?php
		}
		?>
	</div>

	<script type="text/javascript">
		jQuery( document ).ready( function ( $ ) {

			var msgid = "<?php echo esc_attr( $args['message_id'] ); ?>";
			var $el   = $( '#' + msgid );

			$el.on( 'click', '.notice-dismiss, .xolo-notice-dismiss', function ( event ) {

				var expires = "<?php echo esc_attr( $args['expires'] ); ?>";
				var nonce = "<?php echo esc_attr( wp_create_nonce( 'xolo_dismiss_notice' ) ); ?>";

				$.post( ajaxurl, {
					action: 		'xolo_dismiss_notice',
					msgid: 			msgid,
					expires: 		expires,
					_ajax_nonce: 	nonce,
				} );

				$el.fadeTo( 100, 0, function() {
					$el.slideUp( 100, function() {
						$el.remove();
					});
				});
			} );
		} );
	</script>
	<?php
}

/**
 * Check if admin notice is dismissed.
 *
 * @since 1.0.0
 * @param array $id Notice ID.
 * @return boolean
 */
function xolo_is_notice_dismissed( $id ) {

	if ( false !== get_transient( 'xolo_notice_' . $id ) ) {
		return true;
	}

	return false;
}

/**
 * Ajax handler to dismiss admin notice.
 *
 * @since 1.0.0
 * @return void
 */
function xolo_dismiss_notice() {

	check_ajax_referer( 'xolo_dismiss_notice' );

	if ( ! isset( $_POST['msgid'] ) ) {
		die;
	}

	$message_id = sanitize_text_field( wp_unslash( $_POST['msgid'] ) );
	$expires    = isset( $post['expires'] ) ? intval( $post['expires'] ) : 0;

	$message              = (array) get_transient( 'xolo_notice_' . $message_id );
	$message['time']      = time();
	$message['dismissed'] = true;

	set_transient( 'xolo_notice_' . $message_id, $message, $expires );
	die;
}
add_action( 'wp_ajax_xolo_dismiss_notice', 'xolo_dismiss_notice' );