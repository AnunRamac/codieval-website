<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xolo
 */

?>
<?php
	 $xolo_archive_post_layout 		= get_theme_mod( 'archive_post_layout', array( 'feature-image', 'title', 'meta', 'description' )); 
	 $xolo_achive_post_meta_layout  = get_theme_mod( 'achive_post_meta_layout', array( 'author', 'date' )); 
	 $xolo_enable_meta_image 		= get_theme_mod( 'enable_meta_image'); 
	 $xolo_enable_post_excerpt 		= get_theme_mod( 'enable_post_excerpt'); 
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('mb-4 blog-column'); ?>>
	<article class="blog-items">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="blog-wrapup">
		<?php else: ?>	
			<div class="blog-wrapfull">
		<?php endif; ?>	
		<?php foreach ( $xolo_archive_post_layout as $data_order ) : ?>
			<?php if ( 'feature-image' === $data_order ) : ?>
				<?php if ( function_exists( 'xolo_sticky_post' ) ) : xolo_sticky_post(); endif; ?>
				<?php if ( has_post_thumbnail() || $xolo_enable_meta_image == 'true' ) : ?>
					<div class="blog-img">
						<?php if ( $xolo_enable_meta_image == 'true' ) : ?>
							<div class="blog-meta">
								<div class="blog-in-meta"> 
									<?php foreach ( $xolo_achive_post_meta_layout as $meta_order ) : ?>
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
							</div>
						<?php endif; ?>	
						<?php the_post_thumbnail(); ?>
					</div>
				<?php endif; ?>	
			<?php elseif ( 'title' === $data_order ) : ?>
				  <?php     
						if ( is_single() ) :
						
						the_title('<h5 class="post-title blog-multi-title">', '</h5>' );
						
						else:
						
						the_title( sprintf( '<h5 class="post-title blog-multi-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
						
						endif; 
					?> 
					<?php elseif ( 'meta' === $data_order ) : ?>
						<?php if ( $xolo_enable_meta_image == '' ) : ?>
							  <div class="blog-meta">
									<?php foreach ( $xolo_achive_post_meta_layout as $meta_order ) : ?>
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
						<?php endif; ?>	  
					<?php elseif ( 'description' === $data_order ) : ?>
					<div class="site-unit">
						  <?php 
						  if($xolo_enable_post_excerpt == 'true'):
							the_excerpt();
							if ( function_exists( 'xolo_execerpt_link' ) ) : xolo_execerpt_link(); endif; 
							else:
							the_content( 
									sprintf( 
										__( 'Read More', 'xolo' ), 
										'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
									) 
								);
							endif;	
						  ?>
					</div>
		<?php  endif; endforeach; ?>
		</div>  
	</article>
</div>