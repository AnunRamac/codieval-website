<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Xolo
 */

get_header();
$xolo_search_pg_layout 				= get_theme_mod('search_pg_layout', 'xolo_rsb');
$xolo_bread_enable_search		= get_theme_mod('breadcrumb_enable_search','1');
?>
<?php if($xolo_bread_enable_search == '1'){ if ( function_exists( 'xolo_breadcrumbs_style' ) ) : xolo_breadcrumbs_style(); endif; } ?>
<div class="main-content-part">
	<section id="site-content" class="py-5">
		<div class="xl-container">
			<div class="xl-columns-area">
				<?php if($xolo_search_pg_layout == 'xolo_lsb'):  get_sidebar(); endif; ?>
				 <?php if($xolo_search_pg_layout == 'xolo_fullwidth'): ?>
						<div class="xl-column-12 mb-5 mb-xl-0">
					<?php else: ?>	
					   <div id="primary-content" class="col-xl-8 mb-5 mb-xl-0">
					<?php endif; ?> 
					<?php
						if ( have_posts() ) :
						
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content/content', 'search' );

							endwhile;

							the_posts_navigation();

						else :
							get_template_part( 'template-parts/content/content', 'none' );
						endif; 
					?>
				</div>
				<?php if($xolo_search_pg_layout == 'xolo_rsb'):  get_sidebar(); endif; ?>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
