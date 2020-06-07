<?php
function xolo_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 4,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'xolo'),
		) 
	);
	// Footer Widget // 
	$wp_customize->add_section(
        'footer_widget',
        array(
            'title' 		=> __('Footer Widget Area','xolo'),
			'panel'  		=> 'footer_section',
			'priority'      => 1,
		)
    );
	
	// Widget Layout
	$wp_customize->add_setting(
		'footer_widget_display'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_widget_display',
		array(
			'type' => 'hidden',
			'label' => __('Widget Layout','xolo'),
			'section' => 'footer_widget',
			'priority'  => 1,
		)
	);
	
	if ( class_exists( 'Xolo_Customize_Control_Radio_Image' ) ) {

		$wp_customize->add_setting(
			'footer_widget_layout', array(
				'sanitize_callback' => 'xolo_sanitize_select',
				'default' => '4',
			)
		);

		$wp_customize->add_control(
			new Xolo_Customize_Control_Radio_Image(
				$wp_customize, 'footer_widget_layout', array(
					'label'     => esc_html__( 'Layout', 'xolo' ),
					'section'   => 'footer_widget',
					'priority'  => 2,
					'choices'   => array(
						'disable' => array(
							'url' => apply_filters( 'xolo-disable', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/none.svg' )),
						),
						'4' => array(
							'url' => apply_filters( 'xolo-4', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-4.svg' )),
						),
					),
				)
			)
		);
	}	
	
	
	// Container 
	$wp_customize->add_setting(
		'footer_container_style' , 
			array(
			'default' => 'xl-container',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select'
		)
	);
	
	$wp_customize->add_control(
		'footer_container_style' , 
		array(
			'label'			=> __('Container Style', 'xolo'),
			'section'		=> 'footer_widget',
			'priority'      => 5,
			'type'			=> 'radio',
			'choices'		=> 
			array(
				'xl-container' => __('Container', 'xolo'),
				'xl-container-fluid' => __('Container Full', 'xolo')
			)
		)
	);
	
	// Container Style // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'footer_container_width',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'footer_container_width', 
			array(
				'label'      => __( 'Width', 'xolo' ),
				'section'  => 'footer_widget',
				'priority'      => 6,
				'media_query'   => false,
				'input_attr'    => array(
					'desktop' => array(
					   'min'           => 768,
						'max'           => 2000,
						'step'          => 1,
						'default_value' => 1140,
					),
				)
			) ) 
		);
	}
	
	//Device Visibility // 
	$wp_customize->add_setting( 
		'foo_wid_visibility', 
			array(
			'default' => 'all',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'foo_wid_visibility' , 
		array(
			'label'          => __( 'Device Visibility', 'xolo' ),
			'section'        => 'footer_widget',
			'priority'      => 7,
			'type'           => 'select',
			'choices'        => 
			array(
				'all' => __( 'Show on All Devices', 'xolo' ),
				'hide-mobile' => __( 'Hide on Mobile', 'xolo' ),
				'hide-tablet' => __( 'Hide on Tablet', 'xolo' ),
				'hide-mobile-tablet' => __( 'Hide on Mobile and Tablet', 'xolo' ),
			) 
		) 
	);
	
	// Widget Styling
	$wp_customize->add_setting(
		'footer_widget_style'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_widget_style',
		array(
			'type' => 'hidden',
			'label' => __('Styles','xolo'),
			'section' => 'footer_widget',
			'priority'      => 8,
		)
	);
	
	// Border Width // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'footer_widget_top_border_width',
			array(
				'default' 			=> '1',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'footer_widget_top_border_width', 
			array(
				'label'      => __( 'Top Border Width', 'xolo' ),
				'section'  => 'footer_widget',
				'settings' => 'footer_widget_top_border_width',
				'priority'      => 9,
				'media_query'   => false,
				'input_attr'    => array(
					'desktop' => array(
					   'min'           => 0,
						'max'           => 500,
						'step'          => 1,
						'default_value' => 1,
					),
				)
			) ) 
		);
		
		$wp_customize->add_setting(
			'footer_widget_bottom_border_width',
			array(
				'default' 			=> '1',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'footer_widget_bottom_border_width', 
			array(
				'label'      => __( 'Bottom Border Width', 'xolo' ),
				'section'  => 'footer_widget',
				'settings' => 'footer_widget_bottom_border_width',
				'priority'      => 10,
				'media_query'   => false,
				'input_attr'    => array(
					'desktop' => array(
					   'min'           => 0,
						'max'           => 500,
						'step'          => 1,
						'default_value' => 1,
					),
				)
			) ) 
		);

	}
	
	// top  Border Style // 
	$wp_customize->add_setting( 
		'footer_wid_top_border_style' , 
			array(
			'default' => __('solid', 'xolo' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
			'transport'         => 'postMessage'
		) 
	);

	$wp_customize->add_control(
	'footer_wid_top_border_style' , 
		array(
			'label'          => __( 'Top Border Style', 'xolo' ),
			'section'        => 'footer_widget',
			'priority'      => 11,
			'type'           => 'select',
			'choices'        => 
			array(
				'dashed'       => __( 'Dashed', 'xolo' ),
				'dotted' => __( 'Dotted', 'xolo' ),
				'double' => __( 'Double', 'xolo' ),
				'groove' => __( 'Groove', 'xolo' ),
				'hidden' => __( 'Hidden', 'xolo' ),
				'outset' => __( 'Outset', 'xolo' ),
				'solid' => __( 'Solid', 'xolo' ),
				'ridge' => __( 'Ridge', 'xolo' ),
			) 
		) 
	);
	
	// Bottom  Border Style // 
	$wp_customize->add_setting( 
		'footer_wid_btm_border_style' , 
			array(
			'default' => __('solid', 'xolo' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
			'transport'         => 'postMessage'
		) 
	);

	$wp_customize->add_control(
	'footer_wid_btm_border_style' , 
		array(
			'label'          => __( 'Bottom Border Style', 'xolo' ),
			'section'        => 'footer_widget',
			'priority'      => 12,
			'type'           => 'select',
			'choices'        => 
			array(
				'dashed'       => __( 'Dashed', 'xolo' ),
				'dotted' => __( 'Dotted', 'xolo' ),
				'double' => __( 'Double', 'xolo' ),
				'groove' => __( 'Groove', 'xolo' ),
				'hidden' => __( 'Hidden', 'xolo' ),
				'outset' => __( 'Outset', 'xolo' ),
				'solid' => __( 'Solid', 'xolo' ),
				'ridge' => __( 'Ridge', 'xolo' ),
			) 
		) 
	);
	
	// Border Color
	$wp_customize->add_setting(
	'footer_widget_top_brdr_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_widget_top_brdr_clr', 
			array(
				'label'      => __( 'Top Border Color', 'xolo' ),
				'section'    => 'footer_widget',
				'priority'      => 13,
				'settings'   => 'footer_widget_top_brdr_clr',
			) 
		) 
	);
	
	$wp_customize->add_setting(
	'footer_widget_btm_border_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_widget_btm_border_clr', 
			array(
				'label'      => __( 'Bottom Border Color', 'xolo' ),
				'section'    => 'footer_widget',
				'settings'   => 'footer_widget_btm_border_clr',
				'priority'      => 14,
			) 
		) 
	);
	// Widget color
	$wp_customize->add_setting(
	'footer_wid_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_wid_clr', 
			array(
				'label'      => __( 'Text Color', 'xolo' ),
				'section'    => 'footer_widget',
				'settings'   => 'footer_wid_clr',
				'priority'      => 15,
			) 
		) 
	);
	
	// Widget Title color
	$wp_customize->add_setting(
	'footer_widget_ttl_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_widget_ttl_clr', 
			array(
				'label'      => __( 'Widget Title Color', 'xolo' ),
				'section'    => 'footer_widget',
				'settings'   => 'footer_widget_ttl_clr',
				'priority'      => 17,
			) 
		) 
	);
	
	// Widget Title bottom color
	$wp_customize->add_setting(
	'footer_widget_ttl_btm_clr', 
	array(
		'default' => '#FF8F00',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_widget_ttl_btm_clr', 
			array(
				'label'      => __( 'Widget Title Bottom Line Color', 'xolo' ),
				'section'    => 'footer_widget',
				'settings'   => 'footer_widget_ttl_btm_clr',
				'priority'      => 17,
			) 
		) 
	);
	
	// Widget Link color
	$wp_customize->add_setting(
	'foot_wid_link_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'foot_wid_link_clr', 
			array(
				'label'      => __( 'Widget Link Color', 'xolo' ),
				'section'    => 'footer_widget',
				'priority'      => 18,
			) 
		) 
	);
	
	// Widget Link Hover color
	$wp_customize->add_setting(
	'foot_wid_link_hov_clr', 
	array(
		'default' => '#FA5600',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'foot_wid_link_hov_clr', 
			array(
				'label'      => __( 'Widget Link Hover Color', 'xolo' ),
				'section'    => 'footer_widget',
				'priority'      => 19,
			) 
		) 
	);
	
	// bg color // 
	$wp_customize->add_setting( 
		'footer_widget_bg' , 
			array(
			'default' => 'bg_color',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_widget_bg' , 
		array(
			'label'          => __( 'Background', 'xolo' ),
			'section'        => 'footer_widget',
			'priority'      => 20,
			'type'           => 'select',
			'choices'        => 
			array(
				'bg_color' => __( 'Bakground Color', 'xolo' ),
				'bg_image'   => __( 'Background Image', 'xolo' ),
			) 
		) 
	);
	
	$wp_customize->add_setting(
	'footer_wid_bg_color', 
	array(
		'default' => '#383E41',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_wid_bg_color', 
			array(
				'label'      => __( 'Background Color', 'xolo' ),
				'section'    => 'footer_widget',
				'priority'      => 21,
			) 
		) 
	);

	// Background Image // 
    $wp_customize->add_setting( 
    	'footer_bg_img' , 
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_image',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'xolo' ),
			'section'        => 'footer_widget',
			'priority'      => 29,
		) 
	));
	
	// Image Opacity // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'footer_bg_img_opacity',
    	array(
			'default'     	=> '0.4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value'
		)
	);
	$wp_customize->add_control( 
	new Xolo_Customizer_Range_Control( $wp_customize, 'footer_bg_img_opacity', 
		array(
			'label'      => __( 'Opacity', 'xolo' ),
			'section'  => 'footer_widget',
			'settings' => 'footer_bg_img_opacity',
			'priority'      => 30,
			'media_query'   => false,
			'input_attr'    => array(
				'desktop' => array(
				   'min'           => 0,
					'max'           => 0.9,
					'step'          => 0.1,
					'default_value' => 0.4,
				),
			)
		) ) 
	);
	}
	
	// Background Reapeat // 
	$wp_customize->add_setting( 
		'footer_back_repeat' , 
			array(
			'default' => 'no-repeat',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_back_repeat' , 
		array(
			'label'          => __( 'Background Repeat', 'xolo' ),
			'section'        => 'footer_widget',
			'settings'   	 => 'footer_back_repeat',
			'priority'      => 31,
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
		'footer_back_position' , 
			array(
			'default' => 'center',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_back_position' , 
		array(
			'label'          => __( 'Background Position', 'xolo' ),
			'section'        => 'footer_widget',
			'priority'      => 32,
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
		'footer_back_size' , 
			array(
			'default' => 'cover',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_back_size' , 
		array(
			'label'          => __( 'Background Size', 'xolo' ),
			'section'        => 'footer_widget',
			'priority'      => 33,
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
		'footer_back_attach' , 
			array(
			'default' => 'fixed',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'xolo' ),
			'section'        => 'footer_widget',
			'type'           => 'select',
			'priority'      => 34,
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'xolo' ),
				'scroll' => __( 'Scroll', 'xolo' ),
				'fixed'   => __( 'Fixed', 'xolo' )
			) 
		) 
	);
	
	// Background overlay // 
	$wp_customize->add_setting(
	'foot_wid_img_ovelay', 
	array(
		'default'        => '#000000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'foot_wid_img_ovelay', 
			array(
				'label'      => __( 'Overlay Color', 'xolo' ),
				'section'    => 'footer_widget',
				'priority'      => 35
			) 
		) 
	);
	
	// Widget Typography
	$wp_customize->add_setting(
		'foot_wid_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'foot_wid_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','xolo'),
			'section' => 'footer_widget',
			'priority'      => 36
		)
	);
	
	// Widget Title // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'foot_wid_ttl_size',
			array(
				'default'			=> '20',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'foot_wid_ttl_size', 
			array(
				'label'      => __( 'Widget Title Font Size', 'xolo' ),
				'section'  => 'footer_widget',
				'priority'      => 37,
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
	
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','xolo'),
			'panel'  		=> 'footer_section',
			'priority'      => 2,
		)
    );

	if ( class_exists( 'Xolo_Customize_Control_Radio_Image' ) ) {

		$wp_customize->add_setting(
			'footer_bottom_layout', array(
				'sanitize_callback' => 'xolo_sanitize_select',
				'default' => 'layout-2',
			)
		);

		$wp_customize->add_control(
			new Xolo_Customize_Control_Radio_Image(
				$wp_customize, 'footer_bottom_layout', array(
					'label'     => esc_html__( 'Layout', 'xolo' ),
					'section'   => 'footer_copy_Section',
					'priority'  => 2,
					'choices'   => array(
						'disable' => array(
							'url' => apply_filters( 'xolo-disable', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/none.svg' )),
						),
						'layout-1' => array(
							'url' => apply_filters( 'xolo-layout-1', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/layout-center.svg' )),
						),
						'layout-2' => array(
							'url' => apply_filters( 'xolo-layout-2', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
					),
				)
			)
		);
	}	
	
	$wp_customize->add_setting( 
		'footer_bottom_1' , 
			array(
			'default' => __('custom', 'xolo' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'footer_bottom_1' , 
		array(
			'label'          => __( 'Section 1', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'settings'   	 => 'footer_bottom_1',
			'priority'      => 3,
			'type'           => 'select',
			'choices'        => 
			array(
				'none'       => __( 'None', 'xolo' ),
				'custom' => __( 'Text / Html', 'xolo' ),
				'widget' => __( 'Widget', 'xolo' ),
				'menu'   => __( 'Footer Menu', 'xolo' )
			) 
		) 
	);
	
	
	// footer first text // 
	$xolo_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'xolo' );
	$wp_customize->add_setting(
    	'footer_first_custom',
    	array(
			'default' => $xolo_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		)
	);	

	$wp_customize->add_control( 
		'footer_first_custom',
		array(
		    'label'   		=> __('Section 1 Custom Text','xolo'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 4,
			'transport'         => $selective_refresh,
		)  
	);	
	
	$wp_customize->add_setting( 
		'footer_bottom_2' , 
			array(
			'default' => __('none', 'xolo' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'footer_bottom_2' , 
		array(
			'label'          => __( 'Section 2', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'settings'   	 => 'footer_bottom_2',
			'priority'      => 5,
			'type'           => 'select',
			'choices'        => 
			array(
				'none'       => __( 'None', 'xolo' ),
				'custom' => __( 'Text / Html', 'xolo' ),
				'widget' => __( 'Widget', 'xolo' ),
				'menu'   => __( 'Footer Menu', 'xolo' )
			) 
		) 
	);
	
	// footer second text // 
	$wp_customize->add_setting(
    	'footer_second_custom',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'footer_second_custom',
		array(
		    'label'   		=> __('Section 2 Custom Text','xolo'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 6,
		)  
	);	
	
	//Device Visibility // 
	$wp_customize->add_setting( 
		'foo_copy_visibility', 
			array(
			'default' => 'all',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'foo_copy_visibility' , 
		array(
			'label'          => __( 'Device Visibility', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'type'           => 'select',
			'priority'      => 7,
			'choices'        => 
			array(
				'all' => __( 'Show on All Devices', 'xolo' ),
				'hide-mobile' => __( 'Hide on Mobile', 'xolo' ),
				'hide-tablet' => __( 'Hide on Tablet', 'xolo' ),
				'hide-mobile-tablet' => __( 'Hide on Mobile and Tablet', 'xolo' ),
			) 
		) 
	);
	
	// Copyright Bg // 
	$wp_customize->add_setting(
		'foot_copy_design'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'foot_copy_design',
		array(
			'type' => 'hidden',
			'label' => __('Design Options','xolo'),
			'section' => 'footer_copy_Section',
			'priority'      => 8,
		)
	);
	
	// Widget color
	$wp_customize->add_setting(
	'footer_copy_txt_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_copy_txt_clr', 
			array(
				'label'      => __( 'Text Color', 'xolo' ),
				'section'    => 'footer_copy_Section',
				'settings'   => 'footer_copy_txt_clr',
				'priority'      => 9,
			) 
		) 
	);
	
	// Widget Link color
	$wp_customize->add_setting(
	'foot_copy_wid_link_clr', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'foot_copy_wid_link_clr', 
			array(
				'label'      => __( 'Link Color', 'xolo' ),
				'section'    => 'footer_copy_Section',
				'priority'      => 9,
			) 
		) 
	);
	
	// Widget Link Hover color
	$wp_customize->add_setting(
	'foot_copy_wid_link_hov_clr', 
	array(
		'default' => '#FA5600',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'foot_copy_wid_link_hov_clr', 
			array(
				'label'      => __( 'Link Hover Color', 'xolo' ),
				'section'    => 'footer_copy_Section',
				'priority'      => 9,
			) 
		) 
	);
	
	$wp_customize->add_setting( 
		'footer_copy_bg' , 
			array(
			'default' => 'bg_color',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_copy_bg' , 
		array(
			'label'          => __( 'Background', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'type'           => 'select',
			'priority'      => 9,
			'choices'        => 
			array(
				'bg_color' => __( 'Bakground Color', 'xolo' ),
				'bg_image'   => __( 'Background Image', 'xolo' )
			) 
		) 
	);
	
	$wp_customize->add_setting(
	'footer_copy_bg_color', 
	array(
		'default' => '#111111',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_copy_bg_color', 
			array(
				'label'      => __( 'Background Color', 'xolo' ),
				'section'    => 'footer_copy_Section',
				'priority'      => 10,
			) 
		) 
	);

	// Background Image // 
    $wp_customize->add_setting( 
    	'footer_copy_bg_img' , 
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_image',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_copy_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'priority'      => 18,
		) 
	));
	
	// Image Opacity // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'footer_copy_bg_img_opacity',
    	array(
			'default'     	=> '0.4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_range_value'
		)
	);
	$wp_customize->add_control( 
	new Xolo_Customizer_Range_Control( $wp_customize, 'footer_copy_bg_img_opacity', 
		array(
			'label'      => __( 'Opacity', 'xolo' ),
			'section'  => 'footer_copy_Section',
			'settings' => 'footer_copy_bg_img_opacity',
			'priority'      => 19,
			'media_query'   => false,
			'input_attr'    => array(
				'desktop' => array(
				   'min'           => 0,
					'max'           => 0.9,
					'step'          => 0.1,
					'default_value' => 0.4,
				),
			)
		) ) 
	);
	}
	
	// Background Reapeat // 
	$wp_customize->add_setting( 
		'footer_copy_back_repeat' , 
			array(
			'default' => 'no-repeat',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_copy_back_repeat' , 
		array(
			'label'          => __( 'Background Repeat', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'settings'   	 => 'footer_copy_back_repeat',
			'priority'      => 20,
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
		'footer_copy_back_position' , 
			array(
			'default' => 'center',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_copy_back_position' , 
		array(
			'label'          => __( 'Background Position', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'priority'      => 21,
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
		'footer_copy_back_size' , 
			array(
			'default' => 'cover',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_copy_back_size' , 
		array(
			'label'          => __( 'Background Size', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'priority'      => 22,
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
		'footer_copy_bg_back_attach' , 
			array(
			'default' => 'fixed',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
	'footer_copy_bg_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'xolo' ),
			'section'        => 'footer_copy_Section',
			'type'           => 'select',
			'priority'      => 23,
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'xolo' ),
				'scroll' => __( 'Scroll', 'xolo' ),
				'fixed'   => __( 'Fixed', 'xolo' )
			) 
		) 
	);
	
	// Background overlay // 
	$wp_customize->add_setting(
	'foot_copy_bg_img_ovelay', 
	array(
		'default'        => '#000000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'foot_copy_bg_img_ovelay', 
			array(
				'label'      => __( 'Overlay Color', 'xolo' ),
				'section'    => 'footer_copy_Section',
				'priority'      => 24
			) 
		) 
	);

}
add_action( 'customize_register', 'xolo_footer' );