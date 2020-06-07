<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xolo
 */

get_header();
$xolo_blog_single_layout 			= get_theme_mod('blog_single_layout', 'xolo_rsb'); 
$xolo_bread_enable_single_pg		= get_theme_mod('breadcrumb_enable_single_pg','1');
$xolo_single_post_layout 			= get_theme_mod( 'single_post_layout', array( 'feature-image', 'title', 'meta', 'description' )); 
$xolo_single_post_meta_layout	    = get_theme_mod( 'single_post_meta_layout', array( 'author', 'date' )); 
?>
<?php if($xolo_bread_enable_single_pg == '1'){ if ( function_exists( 'xolo_breadcrumbs_style' ) ) : xolo_breadcrumbs_style(); endif; } ?>
  <!-- Blog Start -->
	 <div class="main-content-part">
        <section class="blog-section py-5">
            <div class="xl-container">
                    <!-- Blog Content -->
					<?php if($xolo_blog_single_layout == 'xolo_lsb'): get_sidebar(); endif; ?>
					<?php if($xolo_blog_single_layout == 'xolo_fullwidth'): ?>
						<div class="xl-column-12 mb-5 mb-xl-0">
					<?php else: ?>	
					   <div id="primary-content" class="xl-column-8 mb-5 mb-xl-0">
					<?php endif; ?>   
						<?php if( have_posts() ): ?>
							<?php while( have_posts() ): the_post(); ?>
							<div class="xl-column-12">
								<article id="post-<?php the_ID(); ?>" <?php post_class('blog-items'); ?>>
									<div class="blog-wrapup">
									<?php foreach ( $xolo_single_post_layout as $data_order ) : ?>
										<?php if ( 'feature-image' === $data_order ) : ?>
											<?php if ( has_post_thumbnail() ) { ?>
												<div class="blog-img">
													<?php the_post_thumbnail(); ?>
												</div>
											<?php } ?>	
											<?php elseif ( 'title' === $data_order ) : ?>
												<?php     
													if ( is_single() ) :
													
													the_title('<h5 class="post-title blog-single-title">', '</h5>' );
													
													else:
													
													the_title( sprintf( '<h5 class="post-title blog-single-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
													
													endif; 
												?> 	
											<?php elseif ( 'meta' === $data_order ) : ?>	
												<div class="blog-meta">
													<?php foreach ( $xolo_single_post_meta_layout as $meta_order ) : ?>
														<?php if ( 'author' === $meta_order ) : ?>
														
															<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i> <?php esc_html(the_author()); ?></a>
															
														<?php elseif ( 'date' === $meta_order ) : ?>
														
															<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><i class="fa fa-calendar"></i><?php echo esc_html(get_the_date('j M Y')); ?></a>
															
														<?php elseif ( 'comments' === $meta_order ) : ?>	
														
															<a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?> <?php esc_html_e('Comments','xolo'); ?></a>
															
														<?php elseif ( 'category' === $meta_order ) : ?>
														
															<a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-folder-open "></i> <?php the_category(', '); ?></a>
															
														<?php elseif ( 'tags' === $meta_order && has_tag() ) : ?>
														
															<a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-tags"></i> <?php the_tags('', ', ', ''); ?></a>		
															
													<?php  endif; endforeach; ?>
												</div>
											<?php elseif ( 'description' === $data_order ) : ?>	
												<?php 
													the_content( 
														sprintf( 
															__( 'Read More', 'xolo' ), 
															'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
														) 
													);
												?>
										<?php  endif; endforeach; ?>
									</div>
								</article>
							</div>
							<?php endwhile; ?>
							<?php else: ?>
								<?php get_template_part('template-parts/content/content','none'); ?>
							<?php endif; ?>
							<?php 
								$xolo_enable_author_box		= get_theme_mod('xolo_enable_author_box','1');
								if($xolo_enable_author_box == '1'){
									get_template_part('template-parts/content/content-author','meta'); 
								}
							?>
                        <!-- Comments Area Start -->
							<?php comments_template( '', true ); // show comments  ?>
                        <!-- Comments Area End -->

                        <!-- Pagination -->
                        <?php						
							the_posts_pagination( 
								array(
									'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
									'next_text'          => '<i class="fa fa-angle-double-right"></i>',
								) 
							); 
						?>
                        <!-- Pagination -->
	                    </div>
	                    <!-- Sidebar -->
	                    <?php if($xolo_blog_single_layout == 'xolo_rsb'):  get_sidebar();  endif; ?>
            </div>
        </section>
	</div>	
        <!-- Blog End -->
    </main>
    <!-- Main End -->
<?php get_footer(); ?>
