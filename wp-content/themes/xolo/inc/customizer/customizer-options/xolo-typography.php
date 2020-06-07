<?php
function xolo_typography( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	$wp_customize->add_panel(
		'xolo_typography', array(
			'priority' => 5,
			'title' => esc_html__( 'Typography', 'xolo' ),
		)
	);	
	
	/*=========================================
	Xolo Typography
	=========================================*/
	$wp_customize->add_section(
        'xolo_typography',
        array(
        	'priority'      => 1,
            'title' 		=> __('Body Typography','xolo'),
			'panel'  		=> 'xolo_typography',
		)
    );
	
	 /**
     * Font Family
     */

    $wp_customize->add_setting(
        'xolo_body_font_family', array(
            'capability'        => 'edit_theme_options',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'xolo_sanitize_typography_fonts',
        )
    );

    $wp_customize->add_control(
        new Xolo_Font_Selector(
            $wp_customize, 'xolo_body_font_family', array(
                'label'             => esc_html__( 'Font Family', 'xolo' ),
                'section'           => 'xolo_typography',
                'priority'          => 1,
                'type'              => 'select',
            )
        )
    );
	
	// Body Font Size // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_body_font_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_body_font_size', 
			array(
				'label'      => __( 'Size', 'xolo' ),
				'section'  => 'xolo_typography',
				'priority'      => 2,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 1,
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
	
	// Body Font Size // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_body_line_height',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_body_line_height', 
			array(
				'label'      => __( 'Line Height', 'xolo' ),
				'section'  => 'xolo_typography',
				'priority'      => 3,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
                    'desktop' => array(
                       'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
				)	
			) ) 
		);
	}
	
	// Body Font Size // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_body_ltr_space',
			array(
                'default'           => '0.1',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_body_ltr_space', 
			array(
				'label'      => __( 'Letter Spacing', 'xolo' ),
				'section'  => 'xolo_typography',
				'priority'      => 4,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'tablet'  => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'desktop' => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
				)	
			) ) 
		);
	}
	
	// Body Font weight // 
	 $wp_customize->add_setting( 'xolo_body_font_weight', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'xolo_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'xolo_body_font_weight', array(
            'label'       => __( 'Weight', 'xolo' ),
            'section'     => 'xolo_typography',
            'type'        =>  'select',
            'priority'    => 5,
            'choices'     =>  array(
                'inherit'   =>  __( 'Default', 'xolo' ),
                '100'       =>  __( 'Thin: 100', 'xolo' ),
                '200'       =>  __( 'Light: 200', 'xolo' ),
                '300'       =>  __( 'Book: 300', 'xolo' ),
                '400'       =>  __( 'Normal: 400', 'xolo' ),
                '500'       =>  __( 'Medium: 500', 'xolo' ),
                '600'       =>  __( 'Semibold: 600', 'xolo' ),
                '700'       =>  __( 'Bold: 700', 'xolo' ),
                '800'       =>  __( 'Extra Bold: 800', 'xolo' ),
                '900'       =>  __( 'Black: 900', 'xolo' ),
                ),
            )
        )
    );
	
	// Body Font style // 
	 $wp_customize->add_setting( 'xolo_body_font_style', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'xolo_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'xolo_body_font_style', array(
            'label'       => __( 'Font Style', 'xolo' ),
            'section'     => 'xolo_typography',
            'type'        =>  'select',
            'priority'    => 6,
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'xolo' ),
                'normal'       =>  __( 'Normal', 'xolo' ),
                'italic'       =>  __( 'Italic', 'xolo' ),
                'oblique'       =>  __( 'oblique', 'xolo' ),
                ),
            )
        )
    );
	// Body Text Transform // 
	 $wp_customize->add_setting( 'xolo_body_text_transform', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'xolo_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'xolo_body_text_transform', array(
                'label'       => __( 'Transform', 'xolo' ),
                'section'     => 'xolo_typography',
                'type'        => 'select',
                'priority'    => 7,
                'choices'     => array(
                    'inherit'       =>  __( 'Default', 'xolo' ),
                    'uppercase'     =>  __( 'Uppercase', 'xolo' ),
                    'lowercase'     =>  __( 'Lowercase', 'xolo' ),
                    'capitalize'    =>  __( 'Capitalize', 'xolo' ),
                ),
            )
        )
    );
	
	// Body Text Decoration // 
	 $wp_customize->add_setting( 'xolo_body_txt_decoration', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'xolo_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'xolo_body_txt_decoration', array(
                'label'       => __( 'Text Decoration', 'xolo' ),
                'section'     => 'xolo_typography',
                'type'        => 'select',
                'priority'    => 8,
                'choices'     => array(
                    'inherit'       =>  __( 'Inherit', 'xolo' ),
                    'underline'     =>  __( 'Underline', 'xolo' ),
                    'overline'     =>  __( 'Overline', 'xolo' ),
                    'line-through'    =>  __( 'Line Through', 'xolo' ),
					'none'    =>  __( 'None', 'xolo' ),
                ),
            )
        )
    );
	/*=========================================
	 Xolo Typography Headings
	=========================================*/
	$wp_customize->add_section(
        'xolo_headings_typography',
        array(
        	'priority'      => 8,
            'title' 		=> __('Headings','xolo'),
			'panel'  		=> 'xolo_typography',
		)
    );
	
	/*=========================================
	 Xolo Typography H1
	=========================================*/
	for ( $i = 1; $i <= 6; $i++ ) {
	if($i  == '1'){$j=36;}elseif($i  == '2'){$j=32;}elseif($i  == '3'){$j=28;}elseif($i  == '4'){$j=24;}elseif($i  == '5'){$j=20;}else{$j=16;}
	$wp_customize->add_setting(
		'h' . $i . '_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'xolo_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'h' . $i . '_typography',
		array(
			'type' => 'hidden',
			'label' => esc_html('H' . $i .'','xolo'),
			'section' => 'xolo_headings_typography',
		)
	);
	
    $wp_customize->add_setting(
        'xolo_h' . $i . '_font_family', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'xolo_sanitize_typography_fonts',
        )
    );

    $wp_customize->add_control(
        new Xolo_Font_Selector(
            $wp_customize, 'xolo_h' . $i . '_font_family', array(
                'label'             => esc_html__( 'Font Family', 'xolo' ),
                'section'           => 'xolo_headings_typography',
                'type'              => 'select',
            )
        )
    );

	// Heading Font Size // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_h' . $i . '_font_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_h' . $i . '_font_size', 
			array(
				'label'      => __( 'Font Size', 'xolo' ),
				'section'  => 'xolo_headings_typography',
				'media_query'   => true,
				'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => $j,
                    ),
                    'tablet'  => array(
                        'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => $j,
                    ),
                    'desktop' => array(
                       'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
					    'default_value' => $j,
                    ),
				)	
			) ) 
		);
	}
	
	// Heading Font Size // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_h' . $i . '_line_height',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_h' . $i . '_line_height', 
			array(
				'label'      => __( 'Line Height', 'xolo' ),
				'section'  => 'xolo_headings_typography',
				'media_query'   => true,
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 5,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
				 'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
                    'desktop' => array(
                       'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
				)	
			) ) 
		);
		}
	// Heading Letter Spacing // 
	if ( class_exists( 'Xolo_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'xolo_h' . $i . '_ltr_spacing',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'xolo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Xolo_Customizer_Range_Control( $wp_customize, 'xolo_h' . $i . '_ltr_spacing', 
			array(
				'label'      => __( 'Letter Spacing', 'xolo' ),
				'section'  => 'xolo_headings_typography',
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
                    'tablet'  => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
                    'desktop' => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
				)	
			) ) 
		);
	}
	
	// Heading Font weight // 
	 $wp_customize->add_setting( 'xolo_h' . $i . '_font_weight', array(
		  'capability'        => 'edit_theme_options',
		  'default'           => '700',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'xolo_sanitize_select',
		) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'xolo_h' . $i . '_font_weight', array(
            'label'       => __( 'Font Weight', 'xolo' ),
            'section'     => 'xolo_headings_typography',
            'type'        =>  'select',
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'xolo' ),
                '100'       =>  __( 'Thin: 100', 'xolo' ),
                '200'       =>  __( 'Light: 200', 'xolo' ),
                '300'       =>  __( 'Book: 300', 'xolo' ),
                '400'       =>  __( 'Normal: 400', 'xolo' ),
                '500'       =>  __( 'Medium: 500', 'xolo' ),
                '600'       =>  __( 'Semibold: 600', 'xolo' ),
                '700'       =>  __( 'Bold: 700', 'xolo' ),
                '800'       =>  __( 'Extra Bold: 800', 'xolo' ),
                '900'       =>  __( 'Black: 900', 'xolo' ),
                ),
            )
        )
    );
	
	// Heading Font style // 
	 $wp_customize->add_setting( 'xolo_h' . $i . '_font_style', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'xolo_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'xolo_h' . $i . '_font_style', array(
            'label'       => __( 'Font Style', 'xolo' ),
            'section'     => 'xolo_headings_typography',
            'type'        =>  'select',
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'xolo' ),
                'normal'       =>  __( 'Normal', 'xolo' ),
                'italic'       =>  __( 'Italic', 'xolo' ),
                'oblique'       =>  __( 'oblique', 'xolo' ),
                ),
            )
        )
    );
	
	// Heading Text Transform // 
	 $wp_customize->add_setting( 'xolo_h' . $i . '_text_transform', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'xolo_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'xolo_h' . $i . '_text_transform', array(
                'label'       => __( 'Text Transform', 'xolo' ),
                'section'     => 'xolo_headings_typography',
                'type'        => 'select',
                'choices'     => array(
                    'inherit'       =>  __( 'Default', 'xolo' ),
                    'uppercase'     =>  __( 'Uppercase', 'xolo' ),
                    'lowercase'     =>  __( 'Lowercase', 'xolo' ),
                    'capitalize'    =>  __( 'Capitalize', 'xolo' ),
                ),
            )
        )
    );
	
	// Heading Text Decoration // 
	 $wp_customize->add_setting( 'xolo_h' . $i . '_text_decoration', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'xolo_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'xolo_h' . $i . '_text_decoration', array(
                'label'       => __( 'Text Decoration', 'xolo' ),
                'section'     => 'xolo_headings_typography',
                'type'        => 'select',
                'choices'     => array(
                    'inherit'       =>  __( 'Inherit', 'xolo' ),
                    'underline'     =>  __( 'Underline', 'xolo' ),
                    'overline'     =>  __( 'Overline', 'xolo' ),
                    'line-through'    =>  __( 'Line Through', 'xolo' ),
					'none'    =>  __( 'None', 'xolo' ),
                ),
            )
        )
    );
}
}
add_action( 'customize_register', 'xolo_typography' );