<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Xolo
 */

get_header();
$xolo_bread_enable_404		= get_theme_mod('breadcrumb_enable_404','1');
?>
<?php if($xolo_bread_enable_404 == '1'){ if ( function_exists( 'xolo_breadcrumbs_style' ) ) : xolo_breadcrumbs_style(); endif; } ?>
	<div class="main-content-part">
        <section id="page-404" class="wraper_error py-5">
            <div class="xl-container">
                <!-- xl-columns-area -->
                <div class="xl-columns-area">
                    <div class="xl-column-12">
                        <div class="error-main">
                            <h1><?php esc_html_e('404','xolo'); ?></h1>
                            <h4><?php esc_html_e('Oops! Page is not available','xolo'); ?></h4>
                            <h4 class="error-quotes"><?php esc_html_e('We are not being able to find the page you are looking for','xolo'); ?></h4>
							<?php get_search_form(); ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bt-primary"><?php esc_html_e('Back to Home','xolo'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	</div>	
<?php get_footer(); ?>
