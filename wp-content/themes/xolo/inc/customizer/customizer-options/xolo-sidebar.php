<?php
function xolo_sidebar_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	/*=========================================
	Xolo Sidebar
	=========================================*/
	$wp_customize->add_section(
        'xolo_blog_settings',
        array(
        	'priority'      => 3,
            'title' 		=> __('Sidebar','xolo'),
		)
    );
	
	if ( class_exists( 'Xolo_Customize_Control_Radio_Image' ) ) {
		// Default pages
		$wp_customize->add_setting(
			'xolo_default_pg_layout', array(
				'sanitize_callback' => 'xolo_sanitize_select',
				'default' => 'xolo_rsb',
			)
		);

		$wp_customize->add_control(
			new Xolo_Customize_Control_Radio_Image(
				$wp_customize, 'xolo_default_pg_layout', array(
					'label'     => esc_html__( 'Default Page Layout', 'xolo' ),
					'section'   => 'xolo_blog_settings',
					'priority'  => 1,
					'choices'   => array(
						'xolo_lsb' => array(
							'url' => apply_filters( 'xolo_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'xolo_fullwidth' => array(
							'url' => apply_filters( 'xolo_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'xolo_rsb' => array(
							'url' => apply_filters( 'xolo_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		// Archive pages
		$wp_customize->add_setting(
			'archive_pg_layout', array(
				'sanitize_callback' => 'xolo_sanitize_select',
				'default' => 'xolo_rsb',
			)
		);

		$wp_customize->add_control(
			new Xolo_Customize_Control_Radio_Image(
				$wp_customize, 'archive_pg_layout', array(
					'label'     => esc_html__( 'Archive Page Layout', 'xolo' ),
					'section'   => 'xolo_blog_settings',
					'priority'  => 2,
					'choices'   => array(
						'xolo_lsb' => array(
							'url' => apply_filters( 'xolo_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'xolo_fullwidth' => array(
							'url' => apply_filters( 'xolo_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'xolo_rsb' => array(
							'url' => apply_filters( 'xolo_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Single page
		$wp_customize->add_setting(
			'blog_single_layout', array(
				'sanitize_callback' => 'xolo_sanitize_select',
				'default' => 'xolo_rsb',
			)
		);

		$wp_customize->add_control(
			new Xolo_Customize_Control_Radio_Image(
				$wp_customize, 'blog_single_layout', array(
					'label'     => esc_html__( 'Single Page Layout', 'xolo' ),
					'section'   => 'xolo_blog_settings',
					'priority'  => 3,
					'choices'   => array(
						'xolo_lsb' => array(
							'url' => apply_filters( 'xolo_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'xolo_fullwidth' => array(
							'url' => apply_filters( 'xolo_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'xolo_rsb' => array(
							'url' => apply_filters( 'xolo_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Blog page
		$wp_customize->add_setting(
			'blog_page_layout', array(
				'sanitize_callback' => 'xolo_sanitize_select',
				'default' => 'xolo_rsb',
			)
		);

		$wp_customize->add_control(
			new Xolo_Customize_Control_Radio_Image(
				$wp_customize, 'blog_page_layout', array(
					'label'     => esc_html__( 'Blog Page Layout', 'xolo' ),
					'section'   => 'xolo_blog_settings',
					'priority'  => 4,
					'choices'   => array(
						'xolo_lsb' => array(
							'url' => apply_filters( 'xolo_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'xolo_fullwidth' => array(
							'url' => apply_filters( 'xolo_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'xolo_rsb' => array(
							'url' => apply_filters( 'xolo_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Search page
		$wp_customize->add_setting(
			'search_pg_layout', array(
				'sanitize_callback' => 'xolo_sanitize_select',
				'default' => 'xolo_rsb',
			)
		);

		$wp_customize->add_control(
			new Xolo_Customize_Control_Radio_Image(
				$wp_customize, 'search_pg_layout', array(
					'label'     => esc_html__( 'Search Page Layout', 'xolo' ),
					'section'   => 'xolo_blog_settings',
					'priority'  => 5,
					'choices'   => array(
						'xolo_lsb' => array(
							'url' => apply_filters( 'xolo_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'xolo_fullwidth' => array(
							'url' => apply_filters( 'xolo_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'xolo_rsb' => array(
							'url' => apply_filters( 'xolo_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
	}
	
	// Widget options
	$wp_customize->add_setting(
		'sidebar_options'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sidebar_options',
		array(
			'type' => 'hidden',
			'label' => __('Options','xolo'),
			'section' => 'xolo_blog_settings',
			'priority'  => 6
		)
	);
	// Sidebar Width 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_sidebar_width',
			array(
				'default'	      => esc_html__( '35', 'xolo' ),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_sidebar_width', 
			array(
				'label'      => __( 'Sidebar Width', 'xolo' ),
				'section'  => 'xolo_blog_settings',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 30,
							'max'           => 50,
							'step'          => 1,
							'default_value' => 35,
						),
					),
				'priority'  => 7
			) ) 
		);
	}
	
	// Widget Styling
	$wp_customize->add_setting(
		'sidebar_style'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sidebar_style',
		array(
			'type' => 'hidden',
			'label' => __('Styles','xolo'),
			'section' => 'xolo_blog_settings',
			'priority'  => 14,
		)
	);
	
	// Widget bg color
	$wp_customize->add_setting(
	'sidebar_bg_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'sidebar_bg_clr', 
			array(
				'label'      => __( 'Background Color', 'xolo' ),
				'section'    => 'xolo_blog_settings',
				'priority'  => 16,
			) 
		) 
	);
	
	// Widget Title color
	$wp_customize->add_setting(
	'sidebar_widget_ttl_clr', 
	array(
		'default' => '#383E41',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'sidebar_widget_ttl_clr', 
			array(
				'label'      => __( 'Widget Title Color', 'xolo' ),
				'section'    => 'xolo_blog_settings',
				'priority'  => 18,
			) 
		) 
	);
	
	// Widget Link color
	$wp_customize->add_setting(
	'sidebar_wid_link_clr', 
	array(
		'default' => '#FF8F00',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'sidebar_wid_link_clr', 
			array(
				'label'      => __( 'Widget Link Color', 'xolo' ),
				'section'    => 'xolo_blog_settings',
				'priority'  => 19,
			) 
		) 
	);
	
	// Widget Link Hover color
	$wp_customize->add_setting(
	'sidebar_wid_link_hov_clr', 
	array(
		'default' => '#FA5600',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'sidebar_wid_link_hov_clr', 
			array(
				'label'      => __( 'Widget Link Hover Color', 'xolo' ),
				'section'    => 'xolo_blog_settings',
				'priority'  => 20,
			) 
		) 
	);
	
	// Widget Typography
	$wp_customize->add_setting(
		'sidebar_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sidebar_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','xolo'),
			'section' => 'xolo_blog_settings',
			'priority'  => 21,
		)
	);
	
	// Widget Title // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'sidebar_wid_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'sidebar_wid_ttl_size', 
			array(
				'label'      => __( 'Widget Title Font Size', 'xolo' ),
				'section'  => 'xolo_blog_settings',
				'priority'  => 22,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'tablet'  => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'desktop' => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                ),
			) ) 
		);
	}
}
add_action( 'customize_register', 'xolo_sidebar_settings' );