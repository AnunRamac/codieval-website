<?php
/**
 * The template for displaying search form.
 *
 * @package     Xolo
 * @since       1.0.0
 */
?>

<form role="search" method="get" class="xl-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'xolo' ); ?></span>
		<input type="search" class="xl-search-field" placeholder="<?php esc_attr_e( 'Search', 'xolo' ); ?>" name="s" id="s" />
		<button role="button" type="submit" class="xl-search-submit" aria-label="<?php esc_attr_e( 'Search', 'xolo' ); ?>">
			<i class="fa fa-search" aria-hidden="true"></i>
		</button>
	</div>
</form>