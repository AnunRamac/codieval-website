<?php 
/**
Template Name: Homepage
*/

get_header();
$xolo_breadcrumb_enable_home	= get_theme_mod('breadcrumb_enable_home');	
?>
<?php if($xolo_breadcrumb_enable_home == '1'){ if ( function_exists( 'xolo_breadcrumbs_style' ) ) : xolo_breadcrumbs_style(); endif; } ?>
	<section id="site-content" class="py-5">
		<?php the_post(); the_content(); ?>
	</section>
<?php get_footer(); ?>