<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xolo
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-items'); ?>>
		<div class="blog-wrapfull">
			<div class="blog-img">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php     
				if ( is_single() ) :
				
				the_title('<h5 class="post-title">', '</h5>' );
				
				else:
				
				the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
				
				endif; 
			?> 
			<div class="blog-meta">
				<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i><?php esc_html_e('By','xolo'); ?> <?php esc_html(the_author()); ?></a>
				<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><i class="fa fa-calendar"></i><?php echo esc_html(get_the_date('j M Y')); ?></a>
			</div>
			<?php 
				the_content( 
					sprintf( 
						__( 'Read More', 'xolo' ), 
						'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
					) 
				);
			?>
		</div>
	</article>