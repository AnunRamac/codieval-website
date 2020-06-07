<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Xolo
 */

if ( ! function_exists( 'xolo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function xolo_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'xolo' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'xolo' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'xolo_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function xolo_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'xolo' ) );
		if ( $categories_list && xolo_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'xolo' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'xolo' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'xolo' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'xolo' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'xolo' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function xolo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'xolo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'xolo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so xolo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so xolo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in xolo_categorized_blog.
 */
function xolo_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'xolo_categories' );
}
add_action( 'edit_category', 'xolo_category_transient_flusher' );
add_action( 'save_post',     'xolo_category_transient_flusher' );

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('xolo_sticky_menu')):
    function xolo_sticky_menu()
    {
        $is_sticky = get_theme_mod('sticky_enable','1');

        if ($is_sticky == '1'):
            return 'sticky-nav ';
        else:
            return 'not-sticky';
        endif;
    }
endif;


/**
 * Register Google fonts for xolo.
 */
function xolo_google_font() {
	
    $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function xolo_scripts_styles() {
    wp_enqueue_style( 'xolo-fonts', xolo_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'xolo_scripts_styles' );


/**
 * Register Breadcrumb for Multiple Variation
 */
function xolo_breadcrumbs_style() {
	get_template_part('./template-parts/breadcrumb/xolo','breadcrumb');			
}

// Custom excerpt length
function xolo_custom_excerpt_length( $length ) {
	 $xolo_post_excerpt = get_theme_mod('xolo_post_excerpt','55');
    if( $xolo_post_excerpt == 1000 ) {
        return 9999;
    }
    return esc_html( $xolo_post_excerpt );
}


/**
 * Xolo Header Widget Area First
 */
function xolo_header_widget_area_first() {
	$xolo_header_widget_first = 'xolo-header-widget-left';
	if ( is_active_sidebar( $xolo_header_widget_first ) ){ 
		dynamic_sidebar( 'xolo-header-widget-left' );
	} elseif ( current_user_can( 'edit_theme_options' ) ) {

			$xolo_sidebar_name = xolo_get_sidebar_name_by_id( $xolo_header_widget_first );
			?>
			<div class='widget widget_none'>
				<h4 class='widget_title'><?php echo esc_html( $xolo_sidebar_name ); ?></h4>
				<p>
					<?php if ( is_customize_preview() ) { ?>
						<a href="#" class="" data-sidebar-id="<?php echo esc_attr( $xolo_header_widget_first ); ?>">
					<?php } else { ?>
						<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
					<?php } ?>
						<?php esc_html_e( 'Please assign a widget here.', 'xolo' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
}


/**
 * Xolo Header Widget Area Second
 */
function xolo_header_widget_area_second() {
	$xolo_header_widget_first = 'xolo-header-widget-right';
	if ( is_active_sidebar( $xolo_header_widget_first ) ){ 
		dynamic_sidebar( 'xolo-header-widget-right' );
} elseif ( current_user_can( 'edit_theme_options' ) ) {

		$xolo_sidebar_name = xolo_get_sidebar_name_by_id( $xolo_header_widget_first );
		?>
		<div class='widget widget_none'>
			<h4 class='widget_title'><?php echo esc_html( $xolo_sidebar_name ); ?></h4>
			<p>
				<?php if ( is_customize_preview() ) { ?>
					<a href="#" class="" data-sidebar-id="<?php echo esc_attr( $xolo_header_widget_first ); ?>">
				<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
				<?php } ?>
					<?php esc_html_e( 'Please assign a widget here.', 'xolo' ); ?>
				</a>
			</p>
		</div>
		<?php
	}
}
?>