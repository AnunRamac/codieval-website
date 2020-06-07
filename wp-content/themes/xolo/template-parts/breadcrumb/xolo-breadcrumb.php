<?php 
	$xolo_breadcrumb_align				= get_theme_mod('breadcrumb_align','left');
	$xolo_breadcrumb_title_enable		= get_theme_mod('breadcrumb_title_enable','1');
	$xolo_breadcrumb_path_enable		= get_theme_mod('breadcrumb_path_enable','1');
?>
    <!-- Page Header -->
    <section id="breadcrumb-area" class="breadcrumb-area breadcrumb-<?php echo esc_attr($xolo_breadcrumb_align); ?>">
		<div class="xl-container">
			<div class="xl-columns-area">
				<div class="xl-column-12">
					<div class="breadcrumb-content">
						<div class="breadcrumb-heading">
							<?php if($xolo_breadcrumb_title_enable == '1'): ?>
								<h2>
									<?php 
										if ( is_day() ) : 
										
											printf( __( 'Daily Archives: %s', 'xolo' ), get_the_date() );
										
										elseif ( is_month() ) :
										
											printf( __( 'Monthly Archives: %s', 'xolo' ), (get_the_date( 'F Y' ) ));
											
										elseif ( is_year() ) :
										
											printf( __( 'Yearly Archives: %s', 'xolo' ), (get_the_date( 'Y' ) ) );
											
										elseif ( is_category() ) :
										
											printf( __( 'Category Archives: %s', 'xolo' ), (single_cat_title( '', false ) ));

										elseif ( is_tag() ) :
										
											printf( __( 'Tag Archives: %s', 'xolo' ), (single_tag_title( '', false ) ));
											
										elseif ( is_404() ) :

											printf( __( 'Error 404', 'xolo' ));
											
										elseif ( is_author() ) :
										
											printf( __( 'Author: %s', 'xolo' ), (get_the_author( '', false ) ));
										
										elseif ( is_home() ) :
											single_post_title();
											
										else :
												the_title();
												
										endif;
										
									?>
								</h2>
							<?php endif; ?>
						</div>
						<?php if($xolo_breadcrumb_path_enable == '1'): ?>	
							<ol class="breadcrumb-list">
								<?php if (function_exists('xolo_breadcrumbs')) xolo_breadcrumbs(); ?>
							</ol>	
						<?php endif; ?>	
					</div>
				</div>
			</div>
		</div> <!-- container -->
    </section>
    <!-- / -->
