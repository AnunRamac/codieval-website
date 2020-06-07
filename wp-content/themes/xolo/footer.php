<?php 
	$xolo_foot_wid_lay	    		= get_theme_mod('footer_widget_layout','4');
	$xolo_foot_btm_lay 				= get_theme_mod('footer_bottom_layout','layout-2');	
	$xolo_foot_container_style      = get_theme_mod('footer_container_style', 'xl-container');
	$xolo_foo_wid_visibility		= get_theme_mod('foo_wid_visibility','all');
	$xolo_foo_copy_visibility		= get_theme_mod('foo_copy_visibility','all');
?>	
</div>
 <!-- Footer -->
  <footer id="footer" class="footer">
		<?php if ( is_active_sidebar( 'xolo-footer-widget-area' ) || function_exists( 'xolo_widget_extend' ) || current_user_can( 'edit_theme_options' ) ) { ?>
			<?php if($xolo_foot_wid_lay !== 'disable') { ?>	
				<div class="footer-wrapper <?php echo esc_attr($xolo_foo_wid_visibility); ?>">
					<div class="<?php echo esc_attr($xolo_foot_container_style); ?>">
							<?php
							$xolo_footer_widget_area = 'xolo-footer-widget-area';
							if ( function_exists( 'xolo_widget_extend' ) ) {
								xolo_widget_extend();
							} elseif(is_active_sidebar( $xolo_footer_widget_area )) {
							?>
								<div class="xl-columns-area">
									<?php dynamic_sidebar( 'xolo-footer-widget-area' );  ?> 
								</div>
							<?php 
							} elseif ( current_user_can( 'edit_theme_options' ) ) {

								$xolo_sidebar_name = xolo_get_sidebar_name_by_id( $xolo_footer_widget_area );
								?>
								<div class="widget widget_none">
									<h4 class='widget_title'><?php echo esc_html( $xolo_sidebar_name ); ?></h4>
									<p>
										<?php if ( is_customize_preview() ) { ?>
											<a href="#" class="" data-sidebar-id="<?php echo esc_attr( $xolo_footer_widget_area ); ?>">
										<?php } else { ?>
											<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
										<?php } ?>
											<?php esc_html_e( 'Please assign a widget here.', 'xolo' ); ?>
										</a>
									</p>
								</div>
					<?php } ?>
					</div><!-- container -->
				</div>
		<?php } } ?>
		<?php if($xolo_foot_btm_lay !== 'disable') { ?>		
			<div class="footer-copyright <?php echo esc_attr($xolo_foo_copy_visibility); ?>">
				<div class="<?php echo esc_attr($xolo_foot_container_style); ?>">
					  <div class="xl-columns-area">
						<?php if($xolo_foot_btm_lay == 'layout-1'): ?>
							<div class="xl-column-6">
								<div class="footer-copy text-xl-left text-center widget-left">
									<?php if ( function_exists( 'xolo_footer_group_first' ) ) : xolo_footer_group_first(); endif; ?>
								</div>	
							</div>
							<div class="xl-column-6">
								<div class="footer-copy text-xl-right text-center widget-right">
									<?php if ( function_exists( 'xolo_footer_group_second' ) ) : xolo_footer_group_second(); endif; ?>
								</div>
							</div>
						<?php endif; ?>	
						<?php if($xolo_foot_btm_lay == 'layout-2'): ?>
							<div class="xl-column-12">
								<div class="footer-copy widget-center">
									<?php if ( function_exists( 'xolo_footer_group_first' ) ) : xolo_footer_group_first(); endif; ?>
									<?php if ( function_exists( 'xolo_footer_group_second' ) ) : xolo_footer_group_second(); endif; ?>
								</div>
							</div>
						<?php endif; ?>	
					  </div> <!-- row -->
				</div><!-- container -->
			</div>
		<?php } ?>
  </footer>
  <!-- / -->  
</div>
<?php 
wp_footer(); ?>
</body>
</html>
