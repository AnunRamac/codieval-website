<?php 
$xolo_sidebar = xolo_get_sidebar();
if ( is_active_sidebar( $xolo_sidebar ) ) { ?>
	<div id="secondary-content" class="xl-column-4">
		<div class="sidebar">
			<?php dynamic_sidebar('xolo-sidebar-primary'); ?>                 
		</div>
	</div>
<?php
} elseif ( current_user_can( 'edit_theme_options' ) ) {

		$xolo_sidebar_name = xolo_get_sidebar_name_by_id( $xolo_sidebar );
		?>
		<div id="secondary-content" class="xl-column-4">
			<div class="sidebar">
				<div class="widget widget_none">
					<h4 class='widget_title'><?php echo esc_html( $xolo_sidebar_name ); ?></h4>
					<p>
						<?php if ( is_customize_preview() ) { ?>
							<a href="#" class="" data-sidebar-id="<?php echo esc_attr( $xolo_sidebar ); ?>">
						<?php } else { ?>
							<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
						<?php } ?>
							<?php esc_html_e( 'Please assign a widget here.', 'xolo' ); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
		<?php
	}
?>