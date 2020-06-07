<?php
/**
Template Name: Fullwidth Page
**/

get_header();
xolo_breadcrumbs_style();
?>
<div class="">
	<section id="site-content" class="py-5">
		<div class="xl-container">
			<div class="xl-columns">	
				<div class="xl-column-12">
					<div class="site-content">
						<?php the_post(); the_content(); ?>
					</div>
					
					<?php 
						if( $post->comment_status == 'open' ) { 
							comments_template( '', true ); // show comments 
						}
					?>	
				</div>					
			</div>		
		</div>
	</section>
</div>
<?php get_footer(); ?>

