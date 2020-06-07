<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package xolo
 */

get_header(); 
$xolo_blog_pg_layout 			= get_theme_mod('blog_page_layout', 'xolo_rsb'); 
$xolo_bread_enable_blog_post	= get_theme_mod('breadcrumb_enable_blog_post','1');
?>
<?php if($xolo_bread_enable_blog_post == '1'){ if ( function_exists( 'xolo_breadcrumbs_style' ) ) : xolo_breadcrumbs_style(); endif; } ?>
 <!-- Blog Start -->
 <div class="main-content-part">
    <section class="blog-section py-5">
      <div class="xl-container">
                <!-- Blog Content -->
				<?php if($xolo_blog_pg_layout == 'xolo_lsb'):  get_sidebar(); endif; ?>
                <?php if($xolo_blog_pg_layout == 'xolo_fullwidth'): ?>
					<div class="xl-column-12 mb-5 mb-xl-0">
				<?php else: ?>	
				   <div id="primary-content" class="xl-column-8 mb-5 mb-xl-0">
				<?php endif; ?>   
                    <div class="xl-columns-area">
						<?php 
							$xolo_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							$args = array( 'post_type' => 'post','paged'=>$xolo_paged );	
						?>
						<?php if( have_posts() ): ?>
							<?php while( have_posts() ) : the_post(); 
									get_template_part('template-parts/content/content','page'); 
							endwhile; ?>			
                    
							<!-- Pagination -->
								<?php								
								// Previous/next page navigation.
								the_posts_pagination( array(
								'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
								'next_text'          => '<i class="fa fa-angle-double-right"></i>',
								) ); ?>
						<!-- Pagination -->	
						
						<?php else: ?>
							<?php get_template_part('template-parts/content/content','none'); ?>
						<?php endif; ?>
					</div>
					</div>
				<?php if($xolo_blog_pg_layout == 'xolo_rsb'): get_sidebar(); endif; ?>
      </div>
    </section>
    <!-- Blog End -->
</div>
  </main>
<?php get_footer(); ?>
