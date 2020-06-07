<?php
/**
 * Getting Started Panel.
 *
 * @package NewYork Citys
 */
?>
<div id="getting-started-panel" class="panel-left visible">
    <div class="panel-aside panel-column">
        <h4><?php esc_html_e( 'Recommended actions', 'newyork-city' ); ?></h4>
        <p><?php esc_html_e( 'We have compiled a list of steps for you, to take make sure the experience you will have using one of our products is very easy to follow. So kindly activate the plugin Arile Extra.', 'newyork-city' ); ?></p>
		<a class="recommended-actions hyperlink" href="#actions"><?php esc_html_e( 'Check recommended actions', 'newyork-city' ); ?></a>
    </div> 
    <div class="panel-aside panel-column">
        <h4><?php esc_html_e( 'Extensive Documentation', 'newyork-city' ); ?></h4>
        <p><?php esc_html_e( 'Read detailed documentation of the theme. The documentation has all the necessary information to set up the theme. Which will help you set up the theme.', 'newyork-city' ); ?></p>
        <a href="//helpdoc.themearile.com/" class="hyperlink" title="<?php esc_attr_e( 'Visit the Support', 'newyork-city' ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'newyork-city' ); ?></a>
    </div>
   <div class="panel-aside panel-column">
        <h4><?php esc_html_e( 'Go to the Customizer', 'newyork-city' ); ?></h4>
        <p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every single aspect of the theme.', 'newyork-city' ); ?></p>
        <a class="button button-primary" target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'newyork-city' ); ?>"><?php esc_html_e( 'Go to the Customizer', 'newyork-city' ); ?></a>
    </div>
</div>