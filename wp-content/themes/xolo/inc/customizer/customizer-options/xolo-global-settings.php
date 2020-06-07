<?php
function xolo_global_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	$wp_customize->add_panel(
		'xolo_theme_options', array(
			'priority' => 1,
			'title' => esc_html__( 'Global', 'xolo' ),
		)
	);	
	
	/*=========================================
	Xolo Container
	=========================================*/
	$wp_customize->add_section(
        'colors',
        array(
        	'priority'      => 1,
            'title' 		=> __('Colors','xolo'),
			'panel'  		=> 'xolo_theme_options',
		)
    );
	// Colors
	$wp_customize->add_setting(
		'xolo_colors'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'xolo_colors',
		array(
			'type' => 'hidden',
			'label' => __('Colors','xolo'),
			'section' => 'colors',
			'priority'      => 1,
		)
	);
	
	// Theme Color // 
	$wp_customize->add_setting(
	'theme_color', 
	array(
		'default' => '#FF8F00',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'theme_color', 
			array(
				'label'      => __( 'Primary Color', 'xolo' ),
				'section'    => 'colors'
			) 
		) 
	);
	
	// Text Color // 
	$wp_customize->add_setting(
	'xolo_text_color', 
	array(
		'default' => '#383E41',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_text_color', 
			array(
				'label'      => __( 'Secondary Color', 'xolo' ),
				'section'    => 'colors'
			) 
		) 
	);
	
	// Link Color // 
	$wp_customize->add_setting(
	'xolo_link_color', 
	array(
		'default' => '#FF8F00',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_link_color', 
			array(
				'label'      => __( 'Link Color', 'xolo' ),
				'section'    => 'colors'
			) 
		) 
	);
	
	// Link  Hover Color // 
	$wp_customize->add_setting(
	'xolo_link_hov_color', 
	array(
		'default' => '#FA5600',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_link_hov_color', 
			array(
				'label'      => __( 'Link Hover Color', 'xolo' ),
				'section'    => 'colors'
			) 
		) 
	);
	
	// Header Color // 
	$wp_customize->add_setting(
	'header_color', 
	array(
		'default' => '#FF8F00',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'header_color', 
			array(
				'label'      => __( 'Header Global Color', 'xolo' ),
				'section'    => 'colors'
			) 
		) 
	);

	/*=========================================
	Xolo Container
	=========================================*/
	$wp_customize->add_section(
        'xolo_container',
        array(
        	'priority'      => 2,
            'title' 		=> __('Container','xolo'),
			'panel'  		=> 'xolo_theme_options',
		)
    );
	
	// Site Layout // 
	$wp_customize->add_setting( 
		'xolo_site_layout' , 
			array(
			'default' => __('contained', 'xolo' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
			'transport'         => 'postMessage'
		) 
	);

	$wp_customize->add_control(
	'xolo_site_layout' , 
		array(
			'label'          => __( 'Website Layout', 'xolo' ),
			'section'        => 'xolo_container',
			'type'           => 'select',
			'choices'        => 
			array(
				'contained'       => __( 'Full Width: Contained', 'xolo' ),
				'stretched' => __( 'Full Width: Stretched', 'xolo' ),
				'boxed' => __( 'Boxed', 'xolo' ),
			) 
		) 
	);	
	
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		//container width
		$wp_customize->add_setting(
			'xolo_site_cntnr_width',
			array(
				'default'			=> '1170',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 1,
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_site_cntnr_width', 
			array(
				'label'      => __( 'Container Width', 'xolo' ),
				'section'  => 'xolo_container',
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 768,
                        'max'           => 2000,
                        'step'          => 1,
                        'default_value' => 1170,
                    ),
                ),
			) ) 
		);
		
		//Margin Top
		$wp_customize->add_setting(
			'xolo_cntnr_mtop',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 3,
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_cntnr_mtop', 
			array(
				'label'      => __( 'Margin Top', 'xolo' ),
				'section'  => 'xolo_container',
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 200,
                        'step'          => 1,
                        'default_value' => 120,
                    ),
                ),
			) ) 
		);
		
		//Margin Bottom
		$wp_customize->add_setting(
			'xolo_cntnr_mbtm',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 4,
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_cntnr_mbtm', 
			array(
				'label'      => __( 'Margin Bottom', 'xolo' ),
				'section'  => 'xolo_container',
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 200,
                        'step'          => 1,
                        'default_value' => 120,
                    ),
                ),
			) ) 
		);
	}
	
	/*=========================================
	Xolo Breadcrumb
	=========================================*/
	$wp_customize->add_section(
        'xolo_breadcrumb',
        array(
        	'priority'      => 1,
            'title' 		=> __('Breadcrumb','xolo'),
			'panel'  		=> 'xolo_theme_options',
		)
    );
	
	// enable on homepage
	$wp_customize->add_setting(
		'breadcrumb_enable_home'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_enable_home',
		array(
			'type' => 'checkbox',
			'label' => __('Enable on Home Page?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 1,
		)
	);
	
	// enable on Search
	$wp_customize->add_setting(
		'breadcrumb_enable_search'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_enable_search',
		array(
			'type' => 'checkbox',
			'label' => __('Enable on Search Page?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 2,
		)
	);
	
	// enable on Blog Post
	$wp_customize->add_setting(
		'breadcrumb_enable_blog_post'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_enable_blog_post',
		array(
			'type' => 'checkbox',
			'label' => __('Enable on Blog / Posts Page?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 3
		)
	);
	
	// enable on Single
	$wp_customize->add_setting(
		'breadcrumb_enable_single_pg'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_enable_single_pg',
		array(
			'type' => 'checkbox',
			'label' => __('Enable on Single Page?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 4
		)
	);
	
	// enable on Page
	$wp_customize->add_setting(
		'breadcrumb_enable_default_pg'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_enable_default_pg',
		array(
			'type' => 'checkbox',
			'label' => __('Enable on Default Page?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 5
		)
	);
	
	// enable on Archive
	$wp_customize->add_setting(
		'breadcrumb_enable_archive'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_enable_archive',
		array(
			'type' => 'checkbox',
			'label' => __('Enable on Archive Page?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 6
		)
	);
	
	// enable on 404
	$wp_customize->add_setting(
		'breadcrumb_enable_404'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_enable_404',
		array(
			'type' => 'checkbox',
			'label' => __('Enable on 404 Page?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 7
		)
	);
	
	// enable on Page Title
	$wp_customize->add_setting(
		'breadcrumb_title_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_title_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Page Title on Breadcrumb?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 8
		)
	);
	
	// enable on Page Path
	$wp_customize->add_setting(
		'breadcrumb_path_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_path_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Page Path on Breadcrumb?','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 9
		)
	);
	
	// Breadcrumb Align // 
	$wp_customize->add_setting( 
		'breadcrumb_align' , 
			array(
			'default' => __('left', 'xolo' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select'
		) 
	);

	$wp_customize->add_control(
	'breadcrumb_align' , 
		array(
			'label'          => __( 'Alignment', 'xolo' ),
			'section'        => 'xolo_breadcrumb',
			'type'           => 'select',
			'priority'  	 => 10,
			'choices'        => 
			array(
				'left'       => __( 'Left', 'xolo' ),
				'center' => __( 'Center', 'xolo' ),
				'right' => __( 'Right', 'xolo' )
			) 
		) 
	);	
	
	// Seprator // 
	$wp_customize->add_setting(
    	'breadcrumb_seprator',
    	array(
			'default'      => __( '/', 'xolo' ),
			'sanitize_callback' => 'xolo_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);	

	$wp_customize->add_control( 
		'breadcrumb_seprator',
		array(
		    'label'   => esc_html__('Seprator','xolo'),
		    'section' => 'xolo_breadcrumb',
			'type' => 'text',
			'priority'  => 11
		)  
	);
	
	// Content size // 
	$wp_customize->add_setting(
    	'breadcrumb_min_height',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'breadcrumb_min_height', 
			array(
				'label'      => __( 'Min Height', 'xolo' ),
				'section'  => 'xolo_breadcrumb',
				'priority'  => 12,
				'media_query'   => true,
				'input_attr'    => array(
					'mobile'  => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 75,
					),
					'tablet'  => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 75,
					),
					'desktop' => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 75,
					),
				),
			) ) 
		);
		
	// Top Border Width // 
	$wp_customize->add_setting(
    	'breadcrumb_top_brdr_width',
    	array(
			'default'     	=> '2',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'breadcrumb_top_brdr_width', 
			array(
				'label'      => __( 'Top Border Width', 'xolo' ),
				'section'  => 'xolo_breadcrumb',
				'priority'  => 13,
				'media_query'   => false,
				'input_attr'    => array(
					'mobile'  => array(
						'min'           => 0,
						'max'           => 100,
						'step'          => 1,
						'default_value' => 2,
					),
				),
			) ) 
		);
		
	// Bottom Border Width // 
	$wp_customize->add_setting(
    	'breadcrumb_btm_brdr_width',
    	array(
			'default'     	=> '2',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'breadcrumb_btm_brdr_width', 
			array(
				'label'      => __( 'Bottom Border Width', 'xolo' ),
				'section'  => 'xolo_breadcrumb',
				'priority'  => 14,
				'media_query'   => false,
				'input_attr'    => array(
					'mobile'  => array(
						'min'           => 0,
						'max'           => 100,
						'step'          => 1,
						'default_value' => 2,
					),
				),
			) ) 
		);	
	// Colors
	$wp_customize->add_setting(
		'breadcrumb_clr_style'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_clr_style',
		array(
			'type' => 'hidden',
			'label' => __('Colors & Background','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 15
		)
	);
	
	// Breadcrumb text color
	$wp_customize->add_setting(
	'breadcrumb_text_clr', 
	array(
		'default' => '#383E41',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_text_clr', 
			array(
				'label'      => __( 'Text Color', 'xolo' ),
				'section'    => 'xolo_breadcrumb',
				'priority'  => 16
			) 
		) 
	);
	
	// Breadcrumb link color
	$wp_customize->add_setting(
	'breadcrumb_link_clr', 
	array(
		'default' => '#FF8F00',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_link_clr', 
			array(
				'label'      => __( 'Link Color', 'xolo' ),
				'section'    => 'xolo_breadcrumb',
				'priority'  => 17
			) 
		) 
	);
	
	// Breadcrumb seprator color
	$wp_customize->add_setting(
	'breadcrumb_link_hov_clr', 
	array(	
		'default' => '#FA5600',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_link_hov_clr', 
			array(
				'label'      => __( 'Link Hover Color', 'xolo' ),
				'section'    => 'xolo_breadcrumb',
				'priority'  => 18
			) 
		) 
	);
	
	// Top Border color
	$wp_customize->add_setting(
	'breadcrumb_top_brdr_clr', 
	array(
		'default' => '#f5f5f5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_top_brdr_clr', 
			array(
				'label'      => __( 'Top Border Color', 'xolo' ),
				'section'    => 'xolo_breadcrumb',
				'priority'  => 19,
			) 
		) 
	);
	
	// Bottom Border color
	$wp_customize->add_setting(
	'breadcrumb_btm_brdr_clr', 
	array(
		'default' => '#f5f5f5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_btm_brdr_clr', 
			array(
				'label'      => __( 'Bottom Border Color', 'xolo' ),
				'section'    => 'xolo_breadcrumb',
				'priority'  => 20
			) 
		) 
	);
	
	// background // 
	$wp_customize->add_setting( 
		'breadcrumb_bg' , 
			array(
			'default' => 'bg_color',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_bg' , 
		array(
			'label'          => __( 'Background', 'xolo' ),
			'section'        => 'xolo_breadcrumb',
			'priority'  => 21,
			'type'           => 'select',
			'choices'        => 
			array(
				'bg_color' => __( 'Bakground Color', 'xolo' ),
				'bg_image'   => __( 'Background Image', 'xolo' ),
			) 
		) 
	);
	
	$wp_customize->add_setting(
	'breadcrumb_bg_color', 
	array(
		'default' => '#f5f5f5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_bg_color', 
			array(
				'label'      => __( 'Background Color', 'xolo' ),
				'section'    => 'xolo_breadcrumb',
				'priority'  => 22
			) 
		) 
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_bg_img' , 
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_image',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'xolo' ),
			'section'        => 'xolo_breadcrumb',
			'priority'  => 28,
		) 
	));
	
	// Image Opacity // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'breadcrumb_bg_img_opacity',
    	array(
	        'default'			=> '0.6',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value'
		)
	);
	$wp_customize->add_control( 
	new Xolo_Customizer_Range_Control( $wp_customize, 'breadcrumb_bg_img_opacity', 
		array(
			'label'      => __( 'Opacity', 'xolo' ),
			'section'  => 'xolo_breadcrumb',
			'settings' => 'breadcrumb_bg_img_opacity',
			'priority'  => 29,
			 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 1,
                        'step'          => 0.1,
                        'default_value' => 0.6,
                    ),
                ),
		) ) 
	);
	}
	
	$wp_customize->add_setting(
	'breadcrumb_overlay_color', 
	array(
		'default' => '#383E41',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'xolo' ),
				'section'    => 'xolo_breadcrumb',
				'priority'  => 30
			) 
		) 
	);
	
	// Background Reapeat // 
	$wp_customize->add_setting( 
		'breadcrumb_back_repeat' , 
			array(
			'default' => 'no-repeat',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_back_repeat' , 
		array(
			'label'          => __( 'Background Repeat', 'xolo' ),
			'section'        => 'xolo_breadcrumb',
			'settings'   	 => 'breadcrumb_back_repeat',
			'priority'  => 31,
			'type'           => 'select',
			'choices'        => 
			array(
				'no-repeat' => __( 'No Repeat', 'xolo' ),
				'repeat' => __( 'Repeat', 'xolo' ),
				'repeat-x'   => __( 'Repeat Horizontally', 'xolo' ),
				'repeat-y'   => __( 'Repeat Vertically', 'xolo' ),
			) 
		) 
	);
	
	// Background Position // 
	$wp_customize->add_setting( 
		'breadcrumb_back_position' , 
			array(
			'default' => 'center',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_back_position' , 
		array(
			'label'          => __( 'Background Position', 'xolo' ),
			'section'        => 'xolo_breadcrumb',
			'priority'  => 32,
			'type'           => 'select',
			'choices'        => 
			array(
				'top' => __( 'Top', 'xolo' ),
				'center' => __( 'Center', 'xolo' ),
				'bottom'   => __( 'Bottom', 'xolo' ),
				'left'   => __( 'Left', 'xolo' ),
				'right'   => __( 'Right', 'xolo' ),
				'unset'   => __( 'Unset', 'xolo' ),
				'inherit'   => __( 'Inherit', 'xolo' ),
				'initial'   => __( 'Initial', 'xolo' ),
			) 
		) 
	);
	
	// Background Size // 
	$wp_customize->add_setting( 
		'breadcrumb_back_size' , 
			array(
			'default' => 'cover',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_back_size' , 
		array(
			'label'          => __( 'Background Size', 'xolo' ),
			'section'        => 'xolo_breadcrumb',
			'priority'  => 33,
			'type'           => 'select',
			'choices'        => 
			array(
				'cover' => __( 'Cover', 'xolo' ),
				'contain' => __( 'Contain', 'xolo' ),
				'auto'   => __( 'Auto', 'xolo' )
			) 
		) 
	);
	
	// Background Attachment // 
	$wp_customize->add_setting( 
		'breadcrumb_back_attach' , 
			array(
			'default' => 'fixed',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'xolo' ),
			'section'        => 'xolo_breadcrumb',
			'type'           => 'select',
			'priority'  => 34,
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'xolo' ),
				'scroll' => __( 'Scroll', 'xolo' ),
				'fixed'   => __( 'Fixed', 'xolo' )
			) 
		) 
	);
	
	// Typography
	$wp_customize->add_setting(
		'breadcrumb_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','xolo'),
			'section' => 'xolo_breadcrumb',
			'priority'  => 35,
		)
	);
	
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
	// Title size // 
	$wp_customize->add_setting(
    	'breadcrumb_title_size',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control( 
	new Xolo_Customizer_Range_Control( $wp_customize, 'breadcrumb_title_size', 
		array(
			'label'      => __( 'Title Size', 'xolo' ),
			'section'  => 'xolo_breadcrumb',
			'priority'  => 36,
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
	// Content size // 
	$wp_customize->add_setting(
    	'breadcrumb_content_size',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control( 
	new Xolo_Customizer_Range_Control( $wp_customize, 'breadcrumb_content_size', 
		array(
			'label'      => __( 'Content Size', 'xolo' ),
			'section'  => 'xolo_breadcrumb',
			'priority'  => 37,
			'media_query'   => true,
			'input_attr'    => array(
				'mobile'  => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 16,
				),
				'tablet'  => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 16,
				),
				'desktop' => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 16,
				),
			),
		) ) 
	);
	}
}
add_action( 'customize_register', 'xolo_global_settings' );