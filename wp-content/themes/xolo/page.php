<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package xolo
 */

get_header();
$xolo_default_pg_layout 		= get_theme_mod('xolo_default_pg_layout', 'xolo_rsb'); 
$xolo_bread_enable_default_pg	= get_theme_mod('breadcrumb_enable_default_pg','1');
?>
<?php if($xolo_bread_enable_default_pg == '1'){ if ( function_exists( 'xolo_breadcrumbs_style' ) ) : xolo_breadcrumbs_style(); endif; } ?>
	<div class="main-content-part">
		<section id="site-content" class="py-5">
		   <div class="xl-container">
			  <div class="xl-columns-area">	
					<?php if($xolo_default_pg_layout == 'xolo_lsb'): get_sidebar(); endif; ?>
					<?php if($xolo_default_pg_layout == 'xolo_fullwidth'): ?>
						<div class="xl-column-12 mb-5 mb-xl-0">
					<?php else: ?>	
					   <div id="primary-content" class="xl-column-8 mb-5 mb-xl-0">
					<?php endif; ?> 
						<div class="site-content">
							<?php 
								
								if( have_posts()) :  the_post();
								
								the_content(); 
								endif;
								
								if( $post->comment_status == 'open' ) { 
									 comments_template( '', true ); // show comments 
								}
							?>
						</div><!-- /.posts -->		
					</div><!-- /.column -->
					  <?php if($xolo_default_pg_layout == 'xolo_rsb'):  get_sidebar(); endif; ?>
				</div><!-- /.columns-area -->
				
			</div><!-- /.xl-container -->
		</section>
	</div>
<?php get_footer(); ?>