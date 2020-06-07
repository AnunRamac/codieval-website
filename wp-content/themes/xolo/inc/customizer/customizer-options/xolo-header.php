<?php
function xolo_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'xolo'),
		) 
	);
	
	/*=========================================
	Xolo Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','xolo'),
			'panel'  		=> 'header_section',
		)
    );
	
	$wp_customize->add_setting( 
		'mobile_logo_on' , 
			array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'mobile_logo_on', 
		array(
			'label'	      => esc_html__( 'Different Logo For Mobile Devices ?', 'xolo' ),
			'section'     => 'title_tagline',
			'type'        => 'checkbox'
		) 
	);
	
	// Mobile Logo // 
    $wp_customize->add_setting( 
    	'mobile_logo' , 
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_image',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'mobile_logo' ,
		array(
			'section'        => 'title_tagline',
			'settings'   	 => 'mobile_logo',
		) 
	));
	
	// Logo Width // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'xolo' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
					),
			) ) 
		);
	}
	
	// Typography
	$wp_customize->add_setting(
		'logo_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'logo_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','xolo'),
			'section' => 'title_tagline',
			'priority' => 100,
		)
	);
	
	// Site Title Font Size// 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'site_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'site_ttl_size', 
			array(
				'label'      => __( 'Site Title Font Size', 'xolo' ),
				'section'  => 'title_tagline',
				'priority' => 101,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                ),
			) ) 
		);

	// Site Description Font Size// 	
		$wp_customize->add_setting(
			'site_desc_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'site_desc_size', 
			array(
				'label'      => __( 'Site Description Font Size', 'xolo' ),
				'section'  => 'title_tagline',
				'priority' => 102,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                ),
			) ) 
		);
	}
	/*=========================================
	Xolo Header Type
	=========================================*/
	$wp_customize->add_section(
        'xolo_header_type',
        array(
        	'priority'      => 1,
            'title' 		=> __('Header Layouts','xolo'),
			'panel'  		=> 'header_section',
		)
    );
	
	// All Header // 
	$wp_customize->add_setting( 
		'header_type' , 
			array(
			'default' 			=> 'header-default',  
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select'
		) 
	);

	$wp_customize->add_control(new Xolo_Header_Customize_Control($wp_customize,
	'header_type' , 
		array(
			'section'        => 'xolo_header_type',
			'type'           => 'radio',			
			'choices'        => 
			array(
				'header-default'	=>	'1.png',
				'header-two'		=>	'2.png',
				'header-three'		=>	'3.png',
				'header-four'		=>	'4.png',
				'header-five'		=>	'5.png',
			))  
	) );
	
	
	/*=========================================
	Xolo Primary Header
	=========================================*/
	$wp_customize->add_section(
        'primary_header',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Container','xolo'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Container Width // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_hdr_cntnr_width',
			array(
				'default'			=> '1170',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_hdr_cntnr_width', 
			array(
				'label'		=> __( 'Container Width', 'xolo' ),
				'section'	=> 'primary_header',
				'priority'      	=> 1,
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
	}
	
	// Navigation bar padding // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_menu_bar_padding',
			array(
				'default'			=> '18',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_menu_bar_padding', 
			array(
				'label'      => __( 'Navbar Height', 'xolo' ),
				'section'  => 'primary_header',
				'priority'      => 2,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 200,
                        'step'          => 1,
                        'default_value' => 18,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 300,
                        'step'          => 1,
                        'default_value' => 18,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 500,
                        'step'          => 1,
                        'default_value' => 18,
                    ),
                ),
			) ) 
		);
	}
	
	/*=========================================
	Xolo Header Content
	=========================================*/
	$wp_customize->add_section(
        'primary_menu_section',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Content','xolo'),
			'panel'  		=> 'header_section',
		)
    );

    // Menu Active Label
	$wp_customize->add_setting(
		'xolo_menu_active_label'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'xolo_menu_active_label',
		array(
			'type' 			=> 'hidden',
			'label' 		=> __('Desktop Menu','xolo'),
			'section' 		=> 'primary_menu_section',
			'priority'      => 4,
		)
	);

    // Menu Active // 
	$wp_customize->add_setting(
		'xolo_menu_active' , 
			array(
			'default' 			=> __('active-default', 'xolo' ),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
			'transport'         => 'postMessage'
		) 
	);

	$wp_customize->add_control(
	'xolo_menu_active' , 
		array(
			'label'          => __( 'Menu Active Style', 'xolo' ),
			'section'        => 'primary_menu_section',
			'type'           => 'select',
			'priority'       => 5,
			'choices'        => 
			array(
				'active-default'    => __( 'Style Default', 'xolo' ),
				'active-one'    	=> __( 'Style 1', 'xolo' ),
				'active-two' 		=> __( 'Style 2', 'xolo' ),
				'active-three' 		=> __( 'Style 3', 'xolo' ),
				'active-four' 		=> __( 'Style 4', 'xolo' ),
				'active-five' 		=> __( 'Style 5', 'xolo' ),
				'active-six' 		=> __( 'Style 6', 'xolo' ),
			) 
		) 
	);
	
	// Menu Link Color // 
	$wp_customize->add_setting(
	'xolo_menu_link_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_menu_link_color', 
			array(
				'label'      => __( 'Link Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'       => 5,
			) 
		) 
	);
	
	// Link  Hover Color // 
	$wp_customize->add_setting(
	'xolo_menu_link_hov_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_menu_link_hov_color', 
			array(
				'label'      => __( 'Link Hover Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'       => 5,
			) 
		) 
	);
	
	// Menu dropdown Link Color // 
	$wp_customize->add_setting(
	'xolo_menu_drp_link_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_menu_drp_link_color', 
			array(
				'label'      => __( 'Dropdown Link Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'       => 5,
			) 
		) 
	);
	
	// Link  Hover Color // 
	$wp_customize->add_setting(
	'xolo_menu_drp_link_hov_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_menu_drp_link_hov_color', 
			array(
				'label'      => __( 'Dropdown Link Hover Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'       => 5,
			) 
		) 
	);
	
	// Dropdown Bg Color // 
	$wp_customize->add_setting(
	'xolo_menu_drp_bg_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_menu_drp_bg_color', 
			array(
				'label'      => __( 'Dropdown Background Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'       => 5,
			) 
		) 
	);
	
	// Dropdown Border Color // 
	$wp_customize->add_setting(
	'xolo_menu_drp_brder_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_menu_drp_brder_color', 
			array(
				'label'      => __( 'Dropdown Border Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'       => 5,
			) 
		) 
	);
	
	// Dropdown Border Color // 
	$wp_customize->add_setting(
	'xolo_header_bg_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_header_bg_color', 
			array(
				'label'      => __( 'Header Background Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'       => 5,
			) 
		) 
	);
	
	// Search data
	$wp_customize->add_setting(
		'search_data'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'search_data',
		array(
			'type' => 'hidden',
			'label' => __('Search','xolo'),
			'section' => 'primary_menu_section',
			'priority'      => 6,
		)
	);
	
	// Search enable
	$wp_customize->add_setting(
		'hdr_search_enable'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'hdr_search_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Search','xolo'),
			'section' => 'primary_menu_section',
			'priority'      => 7,
		)
	);
	
	// search color
	$wp_customize->add_setting(
	'hdr_search_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'hdr_search_color', 
			array(
				'label'      => __( 'Icon Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'      => 8,
			) 
		) 
	);
	
	// search bg color
	$wp_customize->add_setting(
	'hdr_search_bg_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'hdr_search_bg_color', 
			array(
				'label'      => __( 'Background Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'      => 9,
			) 
		) 
	);
	
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'hdr_search_bdr_radius',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control( 
	new Xolo_Customizer_Range_Control( $wp_customize, 'hdr_search_bdr_radius', 
		array(
			'label'      => __( 'Border Radius', 'xolo' ),
			'section'  => 'primary_menu_section',
			'priority'      => 10,
			 'media_query'   => false,
				'input_attr'    => array(
					'desktop' => array(
						'min'           => 0,
						'max'           => 50,
						'step'          => 1,
					),
				),
		) ) 
	);
	}
	
	// Button data
	$wp_customize->add_setting(
		'btn_data'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'btn_data',
		array(
			'type' => 'hidden',
			'label' => __('Button','xolo'),
			'section' => 'primary_menu_section',
			'priority'      => 11,
		)
	);
	
	// Booknow enable
	$wp_customize->add_setting(
		'hdr_btn_enable'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'hdr_btn_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Button','xolo'),
			'section' => 'primary_menu_section',
			'priority'      => 12,
		)
	);
	
	
	// Header button label Setting // 
	$wp_customize->add_setting(
    	'hdr_btn_lbl',
    	array(
			'priority'      => 11,
			'sanitize_callback' => 'xolo_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'hdr_btn_lbl',
		array(
		    'label'   => esc_html__('Button Label','xolo'),
		    'section' => 'primary_menu_section',
			'settings'=> 'hdr_btn_lbl',
			'type' => 'text',
			'priority'      => 13,
		)  
	);
	
	// button link 
	$wp_customize->add_setting(
    	'hdr_btn_link',
    	array(
			'priority'      => 12,
			'sanitize_callback' => 'xolo_sanitize_url',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'hdr_btn_link',
		array(
		    'label'   => esc_html__('Button Link','xolo'),
		    'section' => 'primary_menu_section',
			'type' => 'text',
			'priority'      => 14,
		)  
	);
	
	// btn text color
	$wp_customize->add_setting(
	'hdr_btn_color', 
	array(
		'priority'      => 13,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'hdr_btn_color', 
			array(
				'label'      => __( 'Text Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'      => 15,
			) 
		) 
	);
	
	// btn bg color
	$wp_customize->add_setting(
	'hdr_btn_bg_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'hdr_btn_bg_color', 
			array(
				'label'      => __( 'Background Color', 'xolo' ),
				'section'    => 'primary_menu_section',
				'priority'      => 16,
			) 
		) 
	);
	
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'hdr_btn_radius',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control( 
	new Xolo_Customizer_Range_Control( $wp_customize, 'hdr_btn_radius', 
		array(
			'label'      => __( 'Border Radius', 'xolo' ),
			'section'  => 'primary_menu_section',
			'priority'      => 17,
			 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 50,
                        'step'          => 1,
                    ),
                ),
		) ) 
	);
	}
	
	/*=========================================
	Xolo Header Mobile
	=========================================*/
	$wp_customize->add_section(
        'mobile_menu_section',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Mobile','xolo'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Mobile Menu
	$wp_customize->add_setting(
		'mobile_menu'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'mobile_menu',
		array(
			'type' => 'hidden',
			'label' => __('Mobile Menu','xolo'),
			'section' => 'mobile_menu_section',
			'priority'      => 18,
		)
	);
	
	// Mobile  Color
	$wp_customize->add_setting(
	'mobile_top_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'mobile_top_clr', 
			array(
				'label'      => __( 'Header Color', 'xolo' ),
				'section'    => 'mobile_menu_section',
				'priority'      => 19,
			) 
		) 
	);
	
	// Menu Breakpoint Setting // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'header_menu_break',
    	array(
	        'default'			=> '992',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value'
		)
	);
	$wp_customize->add_control( 
	new Xolo_Customizer_Range_Control( $wp_customize, 'header_menu_break', 
		array(
			'label'      => __( 'Menu Breakpoint', 'xolo' ),
			'section'  => 'mobile_menu_section',
			'settings' => 'header_menu_break',
			'priority'      => 20,
			 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 5000,
                        'step'          => 1,
                        'default_value' => 992,
                    ),
                ),
		) ) 
	);
	}
	
	// Menu label Setting // 
	$wp_customize->add_setting(
    	'mobile_menu_lbl',
    	array(
			'sanitize_callback' => 'xolo_sanitize_text',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'mobile_menu_lbl',
		array(
		    'label'   => esc_html__('Menu Label','xolo'),
		    'section' => 'mobile_menu_section',
			'settings'=> 'mobile_menu_lbl',
			'type' => 'text',
			'priority'      => 24,
		)  
	);
	
	// Toggle Button  Color
	$wp_customize->add_setting(
	'tgl_btn_clr', 
	array(
		'capability' => 'edit_theme_options',
		'default' => '#383E41',
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'tgl_btn_clr', 
			array(
				'label'      => __( 'Toggle Color', 'xolo' ),
				'section'    => 'mobile_menu_section',
				'priority'      => 26,
			) 
		) 
	);
	
	// Mobile menu color
	$wp_customize->add_setting(
	'mbl_menu_color', 
	array(
		'capability' => 'edit_theme_options',
		'default' => '#383E41',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'mbl_menu_color', 
			array(
				'label'      => __( 'Menu Color', 'xolo' ),
				'section'    => 'mobile_menu_section',
				'priority'      => 33,
			) 
		) 
	);
	
	// Mobile menu hover color
	$wp_customize->add_setting(
	'mbl_menu_hover_color', 
	array(
		'capability' => 'edit_theme_options',
		'default' => '#FF8F00',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'mbl_menu_hover_color', 
			array(
				'label'      => __( 'Menu Hover Color', 'xolo' ),
				'section'    => 'mobile_menu_section',
				'priority'      => 34,
			) 
		) 
	);
	
	// Mobile menu bg color
	$wp_customize->add_setting(
	'mbl_menu_bg_color', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'mbl_menu_bg_color', 
			array(
				'label'      => __( 'Background Color', 'xolo' ),
				'section'    => 'mobile_menu_section',
				'priority'      => 35,
			) 
		) 
	);
	
	/*=========================================
	Xolo Sticky Header
	=========================================*/
	$wp_customize->add_section(
        'xolo_sticky_header',
        array(
        	'priority'      => 5,
            'title' 		=> __('Sticky Header','xolo'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Sticky
	$wp_customize->add_setting(
		'sticky_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'sticky_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Sticky Enable','xolo'),
			'section' => 'xolo_sticky_header',
			'priority'      => 1,
		)
	);
	
	// Sticky Logo // 
    $wp_customize->add_setting( 
    	'sticky_logo' , 
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_image',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'sticky_logo' ,
		array(
			'label'      => __( 'Sticky Logo', 'xolo' ),
			'section'        => 'xolo_sticky_header',
			'settings'   	 => 'sticky_logo',
			'priority'      => 2,
		) 
	));
	
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
    	'sticky_logo_width',
    	array(
	        'default'			=> '140',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value',
			'transport'         => 'postMessage'
		)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'sticky_logo_width', 
			array(
				'label'      => __( 'Sticky Logo Width', 'xolo' ),
				'section'  => 'xolo_sticky_header',
				'priority'      => 3,
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 500,
                        'step'          => 1,
                        'default_value' => 140,
                    ),
                ),
			) ) 
		);
	}	
	
	 // Menu Active Label
	$wp_customize->add_setting(
		'xolo_sticky_menu_active_label'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'xolo_sticky_menu_active_label',
		array(
			'type' 			=> 'hidden',
			'label' 		=> __('Design Options','xolo'),
			'section' 		=> 'xolo_sticky_header',
			'priority'      => 4,
		)
	);
	
	// Menu Link Color // 
	$wp_customize->add_setting(
	'xolo_sticky_menu_bg_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_sticky_menu_bg_color', 
			array(
				'label'      => __( 'Background Color', 'xolo' ),
				'section'    => 'xolo_sticky_header',
				'priority'       => 4,
			) 
		) 
	);
	
	// Menu Link Color // 
	$wp_customize->add_setting(
	'xolo_sticky_menu_link_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_sticky_menu_link_color', 
			array(
				'label'      => __( 'Link Color', 'xolo' ),
				'section'    => 'xolo_sticky_header',
				'priority'       => 4,
			) 
		) 
	);
	
	// Link  Hover Color // 
	$wp_customize->add_setting(
	'xolo_sticky_menu_link_hov_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'xolo_sticky_menu_link_hov_color', 
			array(
				'label'      => __( 'Link Hover Color', 'xolo' ),
				'section'    => 'xolo_sticky_header',
				'priority'       => 5,
			) 
		) 
	);
	/*=========================================
	Xolo Header Image
	=========================================*/
	
	//  Title 
	$wp_customize->add_setting(
    	'hdr_img_title',
    	array(
			'sanitize_callback' => 'xolo_sanitize_html',
			'capability' => 'edit_theme_options',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'hdr_img_title',
		array(
		    'label'   => esc_html__('Title','xolo'),
		    'section' => 'header_image',
			'settings'=> 'hdr_img_title',
			'type' => 'text',
		)  
	);
	
	//  Description 
	$wp_customize->add_setting(
    	'hdr_img_desc',
    	array(
			'sanitize_callback' => 'xolo_sanitize_html',
			'capability' => 'edit_theme_options',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'hdr_img_desc',
		array(
		    'label'   => esc_html__('Description','xolo'),
		    'section' => 'header_image',
			'settings'=> 'hdr_img_desc',
			'type' => 'textarea',
		)  
	);
	
	//  button label  
	$wp_customize->add_setting(
    	'hdr_img_btn_lbl',
    	array(
			'sanitize_callback' => 'xolo_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority'      => 7,
		)
	);	

	$wp_customize->add_control( 
		'hdr_img_btn_lbl',
		array(
		    'label'   => esc_html__('Button Label','xolo'),
		    'section' => 'header_image',
			'settings'=> 'hdr_img_btn_lbl',
			'type' => 'text',
		)  
	);
	
	// button link 
	$wp_customize->add_setting(
    	'hdr_img_btn_link',
    	array(
			'sanitize_callback' => 'xolo_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority'      => 8,
		)
	);	

	$wp_customize->add_control( 
		'hdr_img_btn_link',
		array(
		    'label'   => esc_html__('Button Link','xolo'),
		    'section' => 'header_image',
			'type' => 'text',
		)  
	);
	
	// Hdr Img Overlay color
	$wp_customize->add_setting(
	'hdr_img_overlay_clr', 
	array(
		'default' => '#000000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'      => 9,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'hdr_img_overlay_clr', 
			array(
				'label'      => __( 'Overlay Color', 'xolo' ),
				'section'    => 'header_image',
			) 
		) 
	);
	
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
    	'hdr_img_opacity',
    	array(
	        'default'			=> '0.5',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value',
			'priority'      => 10,
		)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'hdr_img_opacity', 
			array(
				'label'      => __( 'Opacity', 'xolo' ),
				'section'  => 'header_image',
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 1,
                        'step'          => 0.1,
                        'default_value' => 0.5,
                    ),
                ),
			) ) 
		);
	}	
}
add_action( 'customize_register', 'xolo_header_settings' );