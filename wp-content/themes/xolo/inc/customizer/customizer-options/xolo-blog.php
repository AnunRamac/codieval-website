<?php
function xolo_blogs( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	$wp_customize->add_panel(
		'xolo_blogs', array(
			'priority' => 3,
			'title' => esc_html__( 'Blog', 'xolo' ),
		)
	);	

/*=========================================
	Xolo Single Blog
=========================================*/
	$wp_customize->add_section(
        'xolo_single_blog',
        array(
        	'priority'      => 1,
            'title' 		=> __('Single Post','xolo'),
			'panel'  		=> 'xolo_blogs',
		)
    );
	
	// Layout
	$wp_customize->add_setting(
		'single_post_lay'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'single_post_lay',
		array(
			'type' => 'hidden',
			'label' => __('Layout','xolo'),
			'section' => 'xolo_single_blog',
			'priority'      => 1,
		)
	);
	// Structure
	 $wp_customize->add_setting( 
		'single_post_layout' , 
			array(
			'default'   => array(
							'feature-image',
							'title',
							'meta',
							'description',
						),
		'sanitize_callback' => 'xolo_sanitize_sortable',
		) 
	);
	
	$wp_customize->add_control( 
	new Xolo_Control_Sortable( $wp_customize, 'single_post_layout', 
		array(
			'label'      => __( 'Structure', 'xolo' ),
			'section'     => 'xolo_single_blog',
			'priority'      => 2,
			'choices'     => array(
				'feature-image'   => __( 'Feature Image', 'xolo' ),
				'title'     => __( 'Title', 'xolo' ),
				'meta'     => __( 'Meta', 'xolo' ),
				'description'     => __( 'Description', 'xolo' ),
			),
		) ) 
	);	
	
	// Meta Layout
	 $wp_customize->add_setting( 
		'single_post_meta_layout' , 
			array(
			'default'   => array(
							'author',
							'category',
						),
		'sanitize_callback' => 'xolo_sanitize_sortable',
		) 
	);
	
	$wp_customize->add_control( 
	new Xolo_Control_Sortable( $wp_customize, 'single_post_meta_layout', 
		array(
			'label'      => __( 'Meta', 'xolo' ),
			'section'     => 'xolo_single_blog',
			'priority'      => 3,
			'choices'     => array(
				'comments'   => __( 'Comments', 'xolo' ),
				'category'     => __( 'Category', 'xolo' ),
				'author'     => __( 'Author', 'xolo' ),
				'date'     => __( 'Date', 'xolo' ),
				'tags'     => __( 'Tags', 'xolo' ),
			),
		) ) 
	);
	
	// Show Author Box
	$wp_customize->add_setting(
		'xolo_enable_author_box'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'xolo_enable_author_box',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Author Box','xolo'),
			'section' => 'xolo_single_blog',
			'priority'      => 3,
		)
	);
	
	// Typography
	$wp_customize->add_setting(
		'single_post_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'single_post_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','xolo'),
			'section' => 'xolo_single_blog',
			'priority'      => 5,
		)
	);
	
	// Post Title font size// 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'single_post_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'single_post_ttl_size', 
			array(
				'label'      => __( 'Title Font Size', 'xolo' ),
				'section'  => 'xolo_single_blog',
				'priority'      => 6,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                ),
			) ) 
		);
	}
	
	/*=========================================
	Xolo  Blog Archive
	=========================================*/
	$wp_customize->add_section(
        'xolo_blog_archive',
        array(
        	'priority'      => 2,
            'title' 		=> __('Blog Archive','xolo'),
			'panel'  		=> 'xolo_blogs',
		)
    );
	
	// Layout
	$wp_customize->add_setting(
		'archive_post_lay'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'archive_post_lay',
		array(
			'type' => 'hidden',
			'label' => __('Layout','xolo'),
			'section' => 'xolo_blog_archive',
			'priority'      => 1,
		)
	);
	
	// Structure
	 $wp_customize->add_setting( 
		'archive_post_layout' , 
			array(
			'default'   => array(
							'feature-image',
							'title',
							'meta',
							'description',
						),
		'sanitize_callback' => 'xolo_sanitize_sortable',
		) 
	);
	
	$wp_customize->add_control( 
	new Xolo_Control_Sortable( $wp_customize, 'archive_post_layout', 
		array(
			'label'      => __( 'Structure', 'xolo' ),
			'section'     => 'xolo_blog_archive',
			'priority'      => 3,
			'choices'     => array(
				'feature-image'   => __( 'Feature Image', 'xolo' ),
				'title'     => __( 'Title', 'xolo' ),
				'meta'     => __( 'Meta', 'xolo' ),
				'description'     => __( 'Description', 'xolo' ),
			),
		) ) 
	);	
	
	// Meta Layout
	 $wp_customize->add_setting( 
		'achive_post_meta_layout' , 
			array(
			'default'   => array(
							'author',
							'date',
						),
		'sanitize_callback' => 'xolo_sanitize_sortable',
		) 
	);
	
	$wp_customize->add_control( 
	new Xolo_Control_Sortable( $wp_customize, 'achive_post_meta_layout', 
		array(
			'label'      => __( 'Meta', 'xolo' ),
			'section'     => 'xolo_blog_archive',
			'priority'      => 4,
			'choices'     => array(
				'comments'   => __( 'Comments', 'xolo' ),
				'category'     => __( 'Category', 'xolo' ),
				'author'     => __( 'Author', 'xolo' ),
				'date'     => __( 'Date', 'xolo' ),
				'tags'     => __( 'Tags', 'xolo' ),
			),
		) ) 
	);
	
	// Show Meta On Image
	$wp_customize->add_setting(
		'enable_meta_image'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'enable_meta_image',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Meta on Thumbnail','xolo'),
			'section' => 'xolo_blog_archive',
			'priority'      => 5,
		)
	);
	
	// Enable Excerpt
	$wp_customize->add_setting(
		'enable_post_excerpt'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'enable_post_excerpt',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Excerpt','xolo'),
			'section' => 'xolo_blog_archive',
			'priority'      => 6,
		)
	);
	
	
	// post Exerpt // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_post_excerpt',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_post_excerpt', 
			array(
				'label'      => __( 'Excerpt Length', 'xolo' ),
				'section'  => 'xolo_blog_archive',
				'priority'      => 7,
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                       'min'           => 0,
                        'max'           => 1000,
                        'step'          => 1,
                        'default_value' => 5,
                    ),
				)	
			) ) 
		);
	}
	
	// Typography
	$wp_customize->add_setting(
		'archive_post_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'archive_post_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','xolo'),
			'section' => 'xolo_blog_archive',
			'priority'      => 11,
		)
	);
	
	// Post Title font size// 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'achive_post_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'achive_post_ttl_size', 
			array(
				'label'      => __( 'Title Font Size', 'xolo' ),
				'section'  => 'xolo_blog_archive',
				'priority'      => 12,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                ),
			) ) 
		);
	}	
	/*=========================================
		Xolo Colors & background
	=========================================*/
	$wp_customize->add_section(
        'xolo_post_design_options',
        array(
        	'priority'      => 4,
            'title' 		=> __('Post Styler','xolo'),
			'panel'  		=> 'xolo_blogs',
		)
    );		
	
	// Post text color
	$wp_customize->add_setting(
	'archive_post_txt_clr', 
	array(
		'default' => '#383E41',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'archive_post_txt_clr', 
			array(
				'label'      => __( 'Post Content Color', 'xolo' ),
				'section'    => 'xolo_post_design_options',
				'settings'   => 'archive_post_txt_clr'
			) 
		) 
	);
	
	// Post link color
	$wp_customize->add_setting(
	'archive_post_link_clr', 
	array(
		'default' => '#383E41',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'archive_post_link_clr', 
			array(
				'label'      => __( 'Post Title Color', 'xolo' ),
				'section'    => 'xolo_post_design_options',
				'settings'   => 'archive_post_link_clr'
			) 
		) 
	);
	
	// Post link hover color
	$wp_customize->add_setting(
	'archive_post_link_hov_clr', 
	array(
		'default' => '#FA5600',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'archive_post_link_hov_clr', 
			array(
				'label'      => __( 'Post Title Hover Color', 'xolo' ),
				'section'    => 'xolo_post_design_options',
				'settings'   => 'archive_post_link_hov_clr'
			) 
		) 
	);
	
	// Post link hover color
	$wp_customize->add_setting(
	'archive_post_icon_clr', 
	array(
		'default' => '#FF8F00',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'archive_post_icon_clr', 
			array(
				'label'      => __( 'Post Meta Icon Color', 'xolo' ),
				'section'    => 'xolo_post_design_options',
				'settings'   => 'archive_post_icon_clr'
			) 
		) 
	);
	
	// Post link hover color
	$wp_customize->add_setting(
	'archive_post_meta_clr', 
	array(
		'default' => '#383E41',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'archive_post_meta_clr', 
			array(
				'label'      => __( 'Post Meta Color', 'xolo' ),
				'section'    => 'xolo_post_design_options',
				'settings'   => 'archive_post_meta_clr'
			) 
		) 
	);
	
	// Post Image Overlay color
	$wp_customize->add_setting(
	'archive_post_overlay_clr', 
	array(
		'default' => '#ffffff',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'archive_post_overlay_clr', 
			array(
				'label'      => __( 'Post Image Overlay Color', 'xolo' ),
				'section'    => 'xolo_post_design_options',
				'settings'   => 'archive_post_overlay_clr'
			) 
		) 
	);
	
	// Post Bg color
	$wp_customize->add_setting(
	'archive_post_bg_clr', 
	array(
		'default' => '#ffffff',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'archive_post_bg_clr', 
			array(
				'label'      => __( 'Post Background Color', 'xolo' ),
				'section'    => 'xolo_post_design_options',
				'settings'   => 'archive_post_bg_clr'
			) 
		) 
	);
	
	
	/*=========================================
		Xolo Pagination
	=========================================*/
	$wp_customize->add_section(
        'xolo_pagination',
        array(
        	'priority'      => 5,
            'title' 		=> __('Post Pagination','xolo'),
			'panel'  		=> 'xolo_blogs',
		)
    );	
	
	// color
	$wp_customize->add_setting(
	'xolo_pagination_clr', 
	array(
		'default' => '#FF8F00',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_pagination_clr', 
			array(
				'label'      => __( 'Color', 'xolo' ),
				'section'    => 'xolo_pagination',
				'settings'   => 'xolo_pagination_clr',
				'priority'      => 3,
			) 
		) 
	);
}
add_action( 'customize_register', 'xolo_blogs' );