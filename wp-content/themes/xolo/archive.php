<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xolo
 */

get_header();
$xolo_archive_pg_layout = get_theme_mod('archive_pg_layout', 'xolo_rsb'); 
$xolo_bread_enable_archive		= get_theme_mod('breadcrumb_enable_archive','1');
?>
<?php if($xolo_bread_enable_archive == '1'){ if ( function_exists( 'xolo_breadcrumbs_style' ) ) : xolo_breadcrumbs_style(); endif; } ?>
	<div class="main-content-part">
	   <section class="blog-section py-5">
			<div class="xl-container">
				<!-- Blog Content -->
				<?php if($xolo_archive_pg_layout == 'xolo_lsb'): get_sidebar(); endif; ?>	
				<?php if($xolo_archive_pg_layout == 'xolo_fullwidth'): ?>
					<div class="xl-column-12 mb-5 mb-xl-0">
				<?php else: ?>	
				   <div id="primary-content" class="xl-column-8 mb-5 mb-xl-0">
				<?php endif; ?>   
						<?php if( have_posts() ): ?>
							<div class="xl-columns-area">
								<?php while( have_posts() ): the_post(); ?>
								
									<?php get_template_part('template-parts/content/content','page'); ?>
							
								<?php endwhile; ?>
							</div>
							
						<?php else: ?>
							
							<?php get_template_part('template-parts/content/content','none'); ?>
							
						<?php endif; ?>
					</div>
					<?php if($xolo_archive_pg_layout == 'xolo_rsb'): get_sidebar(); endif; ?>
		  </div>
		</section>
	</div>	
    <!-- Blog End -->
  </main>
<?php get_footer(); ?>
