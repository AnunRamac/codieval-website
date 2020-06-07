<?php
get_template_part( 'inc/customizer/control-function/functions-style' );
get_template_part( 'inc/customizer/control-function/typography-functions' );
if( ! function_exists( 'xolo_dynamic_style' ) ):
    function xolo_dynamic_style() {

		/**
		 * Colors 
		 */
        $xolo_link_color		= get_theme_mod('xolo_link_color','#FF8F00');
		$xolo_link_hov_color	= get_theme_mod('xolo_link_hov_color','#FA5600');
		$xolo_text_color		= get_theme_mod('xolo_text_color','#383E41');
		$xolo_theme_color 		= get_theme_mod('theme_color','#FF8F00');
		
		$output_css = '';
		if($xolo_link_color) { 
			$output_css .="	a { 
				color: " .esc_attr($xolo_link_color). ";
			}\n";
        }
		
		if($xolo_link_hov_color) { 
			$output_css .="	a:hover, a:focus { 
				color: " .esc_attr($xolo_link_hov_color). ";
			}\n";
        }
		
		if($xolo_text_color) { 
			$output_css .="	.widget_none .widget_title, p { 
				color: " .esc_attr($xolo_text_color). ";
			}\n";
		 }
		
   		if($xolo_theme_color) { 
			$output_css .="
			::selection,.sidebar .calendar_wrap table th, .sidebar input[type='submit'],
			.footer .calendar_wrap table th, .footer .widget input[type='submit'],
			input[type=radio]:checked:before {
			    background-color:" .esc_attr($xolo_theme_color). ";
			}
			input[type='text']:focus, input[type='email']:focus, input[type='url']:focus, input[type='password']:focus, input[type='search']:focus, input[type='number']:focus, input[type='tel']:focus, input[type='range']:focus, input[type='date']:focus, input[type='month']:focus, input[type='week']:focus, input[type='time']:focus, input[type='datetime']:focus, input[type='datetime-local']:focus, input[type='color']:focus, textarea:focus, select:focus {
				background-image: linear-gradient(" .esc_attr($xolo_theme_color). ", " .esc_attr($xolo_theme_color). "), linear-gradient(#e9e9ea, #e9e9ea);
			}
			div.wpforms-container-full .wpforms-form button[type='submit']:hover,
			div.wpforms-container-full .wpforms-form button[type='submit']:focus,
			button:hover, button:focus, input[type='button']:hover,
			input[type='button']:focus, input[type='reset']:hover,
			input[type='reset']:focus, input[type='submit']:hover,
			input[type='submit']:focus, .bt-primary:hover, .bt-primary:focus,
			.prealoader, input[type='button'],
			button, input[type='reset'], input[type='submit'],
			.bt-primary, .badge.badge-primary, .header-three .menubar .badge.badge-primary, table th {
				background: " .esc_attr($xolo_theme_color). ";
			}
			.badge.badge-primary:before, .header-three .menubar .badge.badge-primary:before {
				border-right-color: " .esc_attr($xolo_theme_color). ";
			}
			input[type=checkbox], input[type=radio],
			form[id*=give-form] #give-gateway-radio-list>li input[type=radio],
			form[id*=give-form] #give-gateway-radio-list>li input[type=checkbox],
			div.wpforms-container-full .wpforms-form input[type=radio],
			div.wpforms-container-full .wpforms-form input[type=checkbox],
			div.wpforms-container-full .wpforms-form button[type='submit']:hover,
			div.wpforms-container-full .wpforms-form button[type='submit']:focus,
			button:hover, button:focus, input[type='button']:hover,
			input[type='button']:focus, input[type='reset']:hover,
			input[type='reset']:focus, input[type='submit']:hover,
			input[type='submit']:focus, .bt-primary:hover, .bt-primary:focus,
			div.wpforms-container-full .wpforms-form button[type=submit],
			button, input[type='button'], input[type='reset'], input[type='submit'],
			.bt-primary,.sidebar .calendar_wrap table th, .sidebar input[type='submit'],
			.sidebar .calendar_wrap table caption, .footer .calendar_wrap table th,
			.footer .widget input[type='submit'], .footer .calendar_wrap table caption {
				border-color: " .esc_attr($xolo_theme_color). ";
			}
			input[type=checkbox]:checked:before,
			em, cite, q, form.xl-search-form:not(.xl-search-normal) .xl-search-submit:hover, form.xl-search-form:not(.xl-search-normal) .xl-search-submit:focus, .calendar_wrap table tbody #today, .calendar_wrap table caption, .calendar_wrap table td a, .calendar_wrap .wp-calendar-nav a {
			    color: " .esc_attr($xolo_theme_color). ";
			}
			blockquote, .footer div.tagcloud a {
				border-left-color: " .esc_attr($xolo_theme_color). ";
			}\n";
   		}
		
		/**
		 * Header Image 
		 */
        $hdr_img_overlay_clr = get_theme_mod('hdr_img_overlay_clr','#000000');
		$hdr_img_opacity	 = get_theme_mod('hdr_img_opacity','0.5');
		$output_css .=".header-content:after {
					background: " .esc_attr($hdr_img_overlay_clr). ";
					opacity: " .esc_attr($hdr_img_opacity). ";
				}\n";
				
				
		
		/**
		 * Search 
		 */
		$xolo_hdr_search_color		= get_theme_mod('hdr_search_color');
		$xolo_hdr_search_bg_color	= get_theme_mod('hdr_search_bg_color');
		$xolo_hdr_search_bdr_radius	= get_theme_mod('hdr_search_bdr_radius');
		
		/**
		 * Header Button 
		 */
		$xolo_hdr_btn_color			= get_theme_mod('hdr_btn_color');
		$xolo_hdr_btn_bg_color		= get_theme_mod('hdr_btn_bg_color');
		$xolo_hdr_btn_radius		= get_theme_mod('hdr_btn_radius');
		
		
		if($xolo_hdr_btn_color !== '' || $xolo_hdr_btn_bg_color !== '' || $xolo_hdr_btn_radius !== '') { 
			$output_css .=".header_btn .bt-primary, .header_btn .bt-primary:hover, .header_btn .bt-primary:focus { 
				color: " .esc_attr($xolo_hdr_btn_color). ";
				background-color: " .esc_attr($xolo_hdr_btn_bg_color). ";
				border-radius: " .esc_attr($xolo_hdr_btn_radius). "px;
				border-color: " .esc_attr($xolo_hdr_btn_color). ";
			}\n";
        }
		
		if($xolo_hdr_search_color !== '') { 
			$output_css .="[class*='header-'] .header .search-button .header-search-toggle i { 
				color: " .esc_attr($xolo_hdr_search_color). ";
			}\n";
        }
		
		if($xolo_hdr_search_bg_color !== '' || $xolo_hdr_search_bdr_radius !== '') { 
			$output_css .="	.search-button #view-search-btn { 
				background-color: " .esc_attr($xolo_hdr_search_bg_color). ";
				border-radius: " .esc_attr($xolo_hdr_search_bdr_radius). "px;
				border-color: " .esc_attr($xolo_hdr_search_bg_color). ";
			}\n";
        }
		
		/**
		 * Logo Width 
		 */
		
		$output_css   .= xolo_customizer_value( 'logo_width', '.logo img, .mobile-logo img', array( 'max-width' ), array( 140, 140, 140 ), 'px !important' );
		$output_css   .= xolo_customizer_value( 'site_ttl_size', '.site-title', array( 'font-size' ), array( 30, 30, 30 ), 'px !important' );
		$output_css   .= xolo_customizer_value( 'site_desc_size', '.site-description', array( 'font-size' ), array( 16, 16, 16 ), 'px !important' );
		
		/**
		 * Toggle Style
		 */
		$xolo_mobile_top_clr 				 = get_theme_mod('mobile_top_clr','#ffffff'); 
		$xolo_header_menu_break 			 = get_theme_mod('header_menu_break','991');
		$xolo_tgl_btn_clr 				 	 = get_theme_mod('tgl_btn_clr');
		
		if($xolo_header_menu_break !== '') { 
			$output_css .="	@media (max-width: " .esc_attr($xolo_header_menu_break). "px) {
			div.theme-mobile-nav {
				display: block;
			}
			div.navigation:not(.pagination) { 
				display: none;
			}.header .theme-mobile-menu, .header .mobile-logo {
					    display: flex!important;
						-webkit-flex-wrap: wrap;
						flex-wrap: wrap;
						-webkit-flex-direction: row;
						flex-direction: row;
						-webkit-align-items: center;
						align-items: center;
				}.header .mobile-logo {
						-webkit-flex-direction: column;
						flex-direction: column;
					}.header-widget-info{
						display: none!important;
					}.header .theme-mobile-nav {
						background: " .esc_attr($xolo_mobile_top_clr). ";
					}.mobile-menu li > span{
						display: block!important;
					}}\n";
        }
		
		if($xolo_tgl_btn_clr !== '') {  
			$output_css .=".menu-toggle-wrap .hamburger-menu div {
				background: " .esc_attr($xolo_tgl_btn_clr). ";
			}\n";
			
			$output_css .="span.tgl-lbl {
					color: " .esc_attr($xolo_tgl_btn_clr). ";
				}.mobile-menu{
					background: " .esc_attr($xolo_tgl_btn_clr). ";
				}\n";
        }
		
		/**
		 *  Mobile Menu Color
		 */
		$xolo_mbl_menu_color			= get_theme_mod('mbl_menu_color','#383E41');
		$xolo_mbl_menu_hover_color		= get_theme_mod('mbl_menu_hover_color','#FF8F00');
		$xolo_mbl_menu_bg_color	   		= get_theme_mod('mbl_menu_bg_color','#ffffff');
		
		if($xolo_mbl_menu_color !== '') { 
			$output_css .=".theme-mobile-menu div.mobile-menu li > a {
					color: " .esc_attr($xolo_mbl_menu_color). ";
				}span.close-menu:before, span.close-menu:after{
					background-color: " .esc_attr($xolo_mbl_menu_color). ";
				}\n";
        }
		
		if($xolo_mbl_menu_hover_color !== '') { 
			$output_css .=".theme-mobile-menu div.mobile-menu .dropdown.current > a, .theme-mobile-menu div.mobile-menu a:hover, .theme-mobile-menu div.mobile-menu a:focus, .theme-mobile-menu div.mobile-menu li > span a {
					color: " .esc_attr($xolo_mbl_menu_hover_color). ";
				}\n";
        }
		
		if($xolo_mbl_menu_bg_color !== '') { 
			$output_css .=".theme-mobile-menu div.mobile-menu {
					background-color: " .esc_attr($xolo_mbl_menu_bg_color). ";
				}\n";
        }
		
		/**
		 *  Header Global Color
		 */
		 $xolo_menu_link_color	    	= get_theme_mod('xolo_menu_link_color');
		 $xolo_menu_link_hov_color	    = get_theme_mod('xolo_menu_link_hov_color');
		 $xolo_menu_drp_link_color	    = get_theme_mod('xolo_menu_drp_link_color');
		 $xolo_menu_drp_link_hov_color	= get_theme_mod('xolo_menu_drp_link_hov_color');
		 $xolo_menu_drp_bg_color	    = get_theme_mod('xolo_menu_drp_bg_color');
		 $xolo_menu_drp_brder_color	    = get_theme_mod('xolo_menu_drp_brder_color');
		 $xolo_header_bg_color	    	= get_theme_mod('xolo_header_bg_color');
		 
		 $xolo_header_color	    	 	= get_theme_mod('header_color','#FF8F00');

		 if($xolo_header_bg_color !== '') { 
			$output_css .="body .header, .header-four .header {
				background: " .esc_attr($xolo_header_bg_color). ";
			}\n";
        }
		
		if($xolo_menu_link_color !== '') {
			$output_css .="
			body .header .menubar ul.menu-wrap > li.menu-item > a {
				color: " .esc_attr($xolo_menu_link_color). ";
			}\n";
        }

        if($xolo_menu_link_hov_color !== '') { 
			$output_css .="
			[class*='header-']:matches(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li:matches(:hover, :focus, .focus, .active) > a {
			    color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-moz-any(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li:-moz-any(:hover, :focus, .focus, .active) > a {
			    color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-webkit-any(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li:-webkit-any(:hover, :focus, .focus, .active) > a {
			    color: ".esc_attr($xolo_menu_link_hov_color).";
			}

			[class*='header-']:matches(.active-one, .active-five):not(.header-three) .menubar .menu-wrap > li:matches(:hover, :focus, .focus, .active) > a {
			    background-color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-moz-any(.active-one, .active-five):not(.header-three) .menubar .menu-wrap > li:-moz-any(:hover, :focus, .focus, .active) > a {
			    background-color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-webkit-any(.active-one, .active-five):not(.header-three) .menubar .menu-wrap > li:-webkit-any(:hover, :focus, .focus, .active) > a {
			    background-color: ".esc_attr($xolo_menu_link_hov_color).";
			}

			[class*='header-']:matches(.active-one, .active-two, .active-three, .active-four, .active-five) .menubar .menu-wrap > li:matches(li,.dropdown) > a:after {
			    border-bottom-color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-moz-any(.active-one, .active-two, .active-three, .active-four, .active-five) .menubar .menu-wrap > li:-moz-any(li,.dropdown) > a:after {
			    border-bottom-color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-webkit-any(.active-one, .active-two, .active-three, .active-four, .active-five) .menubar .menu-wrap > li:-webkit-any(li,.dropdown) > a:after {
			    border-bottom-color: ".esc_attr($xolo_menu_link_hov_color).";
			}

			[class*='header-']:matches(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .menubar .menu-wrap > li:matches(:hover, :focus, .focus, .active) > a {
			    color: #ffffff;
			}
			[class*='header-']:-moz-any(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .menubar .menu-wrap > li:-moz-any(:hover, :focus, .focus, .active) > a {
			    color: #ffffff;
			}
			[class*='header-']:-webkit-any(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .menubar .menu-wrap > li:-webkit-any(:hover, :focus, .focus, .active) > a {
			    color: #ffffff;
			}
						
			[class*='header-']:matches(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li:matches(.btn-home.current) > a.nav-link {
			    color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-moz-any(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li:-moz-any(.btn-home.current) > a.nav-link {
			    color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-webkit-any(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li:-webkit-any(.btn-home.current) > a.nav-link {
			    color: ".esc_attr($xolo_menu_link_hov_color).";
			}

			[class*='header-']:matches(.active-one, .active-five):not(.header-three) .menubar .menu-wrap > li:matches(.btn-home.current) > a {
			    background-color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-moz-any(.active-one, .active-five):not(.header-three) .menubar .menu-wrap > li:-moz-any(.btn-home.current) > a {
			    background-color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-webkit-any(.active-one, .active-five):not(.header-three) .menubar .menu-wrap > li:-webkit-any(.btn-home.current) > a {
			    background-color: ".esc_attr($xolo_menu_link_hov_color).";
			}

			[class*='header-']:matches(.active-one, .active-two, .active-three, .active-four, .active-five) .menubar .menu-wrap > li:matches(.btn-home.current) > a.nav-link:after {
			    border-bottom-color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-moz-any(.active-one, .active-two, .active-three, .active-four, .active-five) .menubar .menu-wrap > li:-moz-any(.btn-home.current) > a.nav-link:after {
			    border-bottom-color: ".esc_attr($xolo_menu_link_hov_color).";
			}
			[class*='header-']:-webkit-any(.active-one, .active-two, .active-three, .active-four, .active-five) .menubar .menu-wrap > li:-webkit-any(.btn-home.current) > a.nav-link:after {
			    border-bottom-color: ".esc_attr($xolo_menu_link_hov_color).";
			}

			[class*='header-']:matches(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .menubar .menu-wrap > li.menu-item:matches(.btn-home.current) > a {
			    color: #ffffff;
			}
			[class*='header-']:-moz-any(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .menubar .menu-wrap > li.menu-item:-moz-any(.btn-home.current) > a {
			    color: #ffffff;
			}
			[class*='header-']:-webkit-any(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .menubar .menu-wrap > li.menu-item:-webkit-any(.btn-home.current) > a {
			    color: #ffffff;
			}
			[class*='header-']:matches(.header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li.menu-item:matches(.btn-home.current) > a {
			    background-color: #ffffff;
			}
			[class*='header-']:-moz-any(.header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li.menu-item:-moz-any(.btn-home.current) > a {
			    background-color: #ffffff;
			}
			[class*='header-']:-webkit-any(.header-three.active-one, .header-three.active-five) .menubar .menu-wrap > li.menu-item:-webkit-any(.btn-home.current) > a {
			    background-color: #ffffff;
			}
			\n";
        }

        if($xolo_menu_drp_link_color !== '') {
			$output_css .="
			.footer ul.menu-wrap ul.dropdown-menu li a,
			.footer-copyright .widget_nav_menu ul.sub-menu li a,
			.header .widget_nav_menu ul.sub-menu li a,
			div.navigation .menubar ul.dropdown-menu li a.dropdown-item {
				color: " .esc_attr($xolo_menu_drp_link_color). ";
			}
			\n";
        }

        if($xolo_menu_drp_link_hov_color !== '') { 
			$output_css .="
			.footer ul.menu-wrap ul.dropdown-menu li:hover > a,
			.footer ul.menu-wrap ul.dropdown-menu li.focus > a,
			.footer-copyright .widget_nav_menu ul.sub-menu li:hover > a,
			.footer-copyright .widget_nav_menu ul.sub-menu li.focus > a,
			.header .widget_nav_menu ul.sub-menu li:hover > a,
			.header .widget_nav_menu ul.sub-menu li.focus > a,
			div.navigation .menubar ul.dropdown-menu li:hover > a,
			div.navigation .menubar ul.dropdown-menu li.focus > a {
					background-color : " .esc_attr($xolo_menu_drp_link_hov_color). ";
				}\n";
        }

        if($xolo_menu_drp_bg_color !== '') { 
			$output_css .="
			.header .widget_nav_menu ul.sub-menu, .navigation .menubar ul.dropdown-menu {
				background-color: " .esc_attr($xolo_menu_drp_bg_color). ";
			}\n";
        }

        if($xolo_menu_drp_brder_color !== '') { 
			$output_css .="
			.header .widget_nav_menu ul.sub-menu, .header .navigation .menubar .dropdown-menu {
				border-color: " .esc_attr($xolo_menu_drp_brder_color). ";
			}\n";
        }
		
		if($xolo_header_color !== '') { 
			$output_css .="			
			.header .calendar_wrap table caption,
			.header .calendar_wrap table th,
			.header-widget:not(.wrap-right) .emergency-call:before {
			    border-color: ".esc_attr($xolo_header_color).";
			}
			
			.header-five .header, .header.header-five,
			.header .calendar_wrap table th,
			.wrap-right .emergency-call, .header-widget:not(.wrap-right) .emergency-call:before,
			.header-sidebar-toggle.active span, .header-sidebar-toggle.active span:before, .header-sidebar-toggle.active span:after, .hamburger-menu > a:hover div, .hamburger-menu > a:focus div, .header-three .navigation:not(.pagination) {
			    background-color: ".esc_attr($xolo_header_color).";
			}
			.header input[type='search']:focus {
			    background-image: linear-gradient(".esc_attr($xolo_header_color).", ".esc_attr($xolo_header_color)."), linear-gradient(#e9e9ea, #e9e9ea);
			}
			
			.header .calendar_wrap table tbody a,
			[class^='header-']:not(.header-four) .widget_nav_menu .menu > li:hover > a,
			[class^='header-']:not(.header-four) .widget_nav_menu .menu > li.focus > a,
			.mobile-menu li > span, .mobile-menu .dropdown.current > a,
			.mobile-menu a:hover, .mobile-menu ul > li.active > a,
			.mobi-head-top .header-widget .widget_social_widget li a:hover i,
			.view-search form, .p-menu, .header-info .contact-icon i,
			[class^='header-']:not(.header-four) .header-widget .widget:not(.widget_social_widget) i,
			.mobi-head-top .header-widget .widget:not(.widget_social_widget) i,
			.header .widget a:focus,
			.header .widget a:hover,
			.header .widget a:active,
			.header .widget_social_widget li a:hover i, .widget_social_widget li a:focus i,
			.header [class*='widget_']:not(.widget_info):not(.widget_social_widget) li a:before {
				color: " .esc_attr($xolo_header_color). ";
			}			
			.view-search form .form-control {
				border-bottom-color: " .esc_attr($xolo_header_color). ";
			}
			.cart-wrapper .shopping-cart {
				border-top-color: " .esc_attr($xolo_header_color). ";
			}
			.header div.tagcloud a {
			    border-left-color: " .esc_attr($xolo_header_color). ";
			}
			\n";
		}
			
			$xolo_hdr_cntnr_width 			 = get_theme_mod('xolo_hdr_cntnr_width','1170');
			if($xolo_hdr_cntnr_width >=768 && $xolo_hdr_cntnr_width <=2000){
				$output_css .=".header .xl-container {
						max-width: " .esc_attr($xolo_hdr_cntnr_width). "px;
					}\n";
			}
			
			/**
			 *  Sticky Header Color
			 */
			$xolo_sticky_menu_bg_color	    			= get_theme_mod('xolo_sticky_menu_bg_color');
			$xolo_sticky_menu_link_color	    		= get_theme_mod('xolo_sticky_menu_link_color');
			$xolo_sticky_menu_link_hov_color	    	= get_theme_mod('xolo_sticky_menu_link_hov_color');
			
			if($xolo_sticky_menu_bg_color !== '') { 
				$output_css .=".navigation:not(.pagination).sticky-menu  {
						background-color: " .esc_attr($xolo_sticky_menu_bg_color). ";
					}\n";
	        }
			
			if($xolo_sticky_menu_link_color !== '') { 
				$output_css .="
				body .header .sticky-menu .menubar ul.menu-wrap > li > a {
					color: " .esc_attr($xolo_sticky_menu_link_color). ";
				}
				\n";
	        }

	        if($xolo_sticky_menu_link_hov_color !== '') { 
				$output_css .="
				.header .sticky-menu .site-title {
					color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:matches(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:matches(:hover, :focus, .focus, .active) > a {
				    color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-moz-any(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:-moz-any(:hover, :focus, .focus, .active) > a {
				    color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-webkit-any(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:-webkit-any(:hover, :focus, .focus, .active) > a {
				    color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}

				[class*='header-']:matches(.active-one, .active-five):not(.header-three) .sticky-menu .menubar .menu-wrap > li:matches(:hover, :focus, .focus, .active) > a {
				    background-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-moz-any(.active-one, .active-five):not(.header-three) .sticky-menu .menubar .menu-wrap > li:-moz-any(:hover, :focus, .focus, .active) > a {
				    background-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-webkit-any(.active-one, .active-five):not(.header-three) .sticky-menu .menubar .menu-wrap > li:-webkit-any(:hover, :focus, .focus, .active) > a {
				    background-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}

				[class*='header-']:matches(.active-one, .active-two, .active-three, .active-four, .active-five) .sticky-menu .menubar .menu-wrap > li:matches(li,.dropdown) > a:after {
				    border-bottom-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-moz-any(.active-one, .active-two, .active-three, .active-four, .active-five) .sticky-menu .menubar .menu-wrap > li:-moz-any(li,.dropdown) > a:after {
				    border-bottom-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-webkit-any(.active-one, .active-two, .active-three, .active-four, .active-five) .sticky-menu .menubar .menu-wrap > li:-webkit-any(li,.dropdown) > a:after {
				    border-bottom-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}

				[class*='header-']:matches(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .sticky-menu .menubar .menu-wrap > li:matches(:hover, :focus, .focus, .active) > a {
				    color: #ffffff;
				}
				[class*='header-']:-moz-any(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .sticky-menu .menubar .menu-wrap > li:-moz-any(:hover, :focus, .focus, .active) > a {
				    color: #ffffff;
				}
				[class*='header-']:-webkit-any(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .sticky-menu .menubar .menu-wrap > li:-webkit-any(:hover, :focus, .focus, .active) > a {
				    color: #ffffff;
				}
				[class*='header-']:matches(.header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:matches(:hover, :focus, .focus, .active) > a {
				    background-color: #ffffff;
				}
				[class*='header-']:-moz-any(.header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:-moz-any(:hover, :focus, .focus, .active) > a {
				    background-color: #ffffff;
				}
				[class*='header-']:-webkit-any(.header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:-webkit-any(:hover, :focus, .focus, .active) > a {
				    background-color: #ffffff;
				}
				
				[class*='header-']:matches(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:matches(.btn-home.current) > a {
				    color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-moz-any(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:-moz-any(.btn-home.current) > a {
				    color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-webkit-any(.active-default, .active-two, .active-three, .active-four, .active-six, .header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li:-webkit-any(.btn-home.current) > a {
				    color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}

				[class*='header-']:matches(.active-one, .active-five):not(.header-three) .sticky-menu .menubar .menu-wrap > li:matches(.btn-home.current) > a {
				    background-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-moz-any(.active-one, .active-five):not(.header-three) .sticky-menu .menubar .menu-wrap > li:-moz-any(.btn-home.current) > a {
				    background-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-webkit-any(.active-one, .active-five):not(.header-three) .sticky-menu .menubar .menu-wrap > li:-webkit-any(.btn-home.current) > a {
				    background-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}

				[class*='header-']:matches(.active-one, .active-two, .active-three, .active-four, .active-five) .sticky-menu .menubar .menu-wrap > li:matches(.btn-home.current) > a:after {
				    border-bottom-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-moz-any(.active-one, .active-two, .active-three, .active-four, .active-five) .sticky-menu .menubar .menu-wrap > li:-moz-any(.btn-home.current) > a:after {
				    border-bottom-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}
				[class*='header-']:-webkit-any(.active-one, .active-two, .active-three, .active-four, .active-five) .sticky-menu .menubar .menu-wrap > li:-webkit-any(.btn-home.current) > a:after {
				    border-bottom-color: ".esc_attr($xolo_sticky_menu_link_hov_color).";
				}

				[class*='header-']:matches(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .sticky-menu .menubar .menu-wrap > li.menu-item:matches(.btn-home.current) > a {
				    color: #ffffff;
				}
				[class*='header-']:-moz-any(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .sticky-menu .menubar .menu-wrap > li.menu-item:-moz-any(.btn-home.current) > a {
				    color: #ffffff;
				}
				[class*='header-']:-webkit-any(.header-default.active-one, .header-default.active-five, .header-two.active-one, .header-two.active-five, .header-four.active-one, .header-four.active-five, .header-five.active-one, .header-five.active-five) .sticky-menu .menubar .menu-wrap > li.menu-item:-webkit-any(.btn-home.current) > a {
				    color: #ffffff;
				}
				[class*='header-']:matches(.header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li.menu-item:matches(.btn-home.current) > a {
				    background-color: #ffffff;
				}
				[class*='header-']:-moz-any(.header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li.menu-item:-moz-any(.btn-home.current) > a {
				    background-color: #ffffff;
				}
				[class*='header-']:-webkit-any(.header-three.active-one, .header-three.active-five) .sticky-menu .menubar .menu-wrap > li.menu-item:-webkit-any(.btn-home.current) > a {
				    background-color: #ffffff;
				}
				\n";
	        }

			/**
			 *  Sticky Header
			 */
			$xolo_sticky_enable 	= get_theme_mod('sticky_enable','1');
			$xolo_sticky_logo_width = get_theme_mod('sticky_logo_width','140');
			$xolo_sticky_logo 	  	= get_theme_mod('sticky_logo','');
			$mobile_logo_on    		= get_theme_mod('mobile_logo_on');
		
			if($xolo_sticky_logo !== '' && has_custom_logo() ) { 
				$output_css .=".sticky-menu .custom-logo-link, .logo a.sticky-navbar-brand {
					display: none;
				}.sticky-menu .logo a.sticky-navbar-brand {
					display: block;
				}\n";
			}
			
			if($xolo_sticky_logo !== '' && $mobile_logo_on !== 'true'  ) { 
				$output_css .=".mobile-logo a.sticky-navbar-brand,.sticky-menu .mobile-logo a.navbar-brand {
					display: none;
				}.sticky-menu .mobile-logo a.sticky-navbar-brand {
					display: block;
				}\n";
			}
			
			if($xolo_sticky_enable == '1' || $xolo_sticky_logo_width !== '') { 
			$output_css .=".sticky-menu .sticky-navbar-brand img {
					width: 100%;
					max-width: " .esc_attr($xolo_sticky_logo_width). "px;
				}\n";
			}
			
			/**
			 *  Nav Bar Padding
			 */			
			 $output_css   .= xolo_customizer_value( 'xolo_menu_bar_padding', '#header-section .navigation:not(.pagination), #header-section .theme-mobile-nav', array( 'padding-top', 'padding-bottom' ), array( 18, 18, 18 ), 'px' );
			 
			/**
			 *  Footer Style
			 */
			  $xolo_footer_container_style = get_theme_mod('footer_container_style','18');
			  $xolo_footer_container_width = get_theme_mod('footer_container_width','18');

				if($xolo_footer_container_width >=768 && $xolo_footer_container_width <=2000  && $xolo_footer_container_style == 'container'){
					$output_css .=".footer .xl-container {
							max-width: " .esc_attr($xolo_footer_container_width). "px;
						}\n";
				}
			
			$xolo_footer_widget_layout	   			 = get_theme_mod('footer_widget_layout','4');
			$xolo_footer_widget_top_border_width 	 = get_theme_mod('footer_widget_top_border_width','1');
			$xolo_footer_widget_bottom_border_width	 = get_theme_mod('footer_widget_bottom_border_width','1');
			$xolo_footer_widget_top_brdr_clr 		 = get_theme_mod('footer_widget_top_brdr_clr','#ffffff');
			$xolo_footer_widget_btm_border_clr		 = get_theme_mod('footer_widget_btm_border_clr','#ffffff');
			$xolo_footer_wid_top_border_style	   	 = get_theme_mod('footer_wid_top_border_style','solid');
			$xolo_footer_wid_btm_border_style	   	 = get_theme_mod('footer_wid_btm_border_style','solid');
			if($xolo_footer_widget_layout !== 'disable') { 
				if($xolo_footer_wid_top_border_style !== 'hidden') { 
					$output_css .=".footer-wrapper { 
						border-top: ".esc_attr($xolo_footer_widget_top_border_width)."px ".esc_attr($xolo_footer_wid_top_border_style)."  ".esc_attr($xolo_footer_widget_top_brdr_clr).";
					}\n";
				}
				if($xolo_footer_wid_btm_border_style !== 'hidden') { 
					$output_css .="	.footer-wrapper { 
						border-bottom: ".esc_attr($xolo_footer_widget_bottom_border_width)."px ".esc_attr($xolo_footer_wid_btm_border_style)." ".esc_attr($xolo_footer_widget_btm_border_clr).";
					}\n";
				}
				/**
				 *  Footer Widget Style
				 */
				 $xolo_footer_widget_ttl_clr		 = get_theme_mod('footer_widget_ttl_clr','#ffffff');
				 $footer_widget_ttl_btm_clr			 = get_theme_mod('footer_widget_ttl_btm_clr','#FF8F00');
				 $xolo_foot_wid_link_clr			 = get_theme_mod('foot_wid_link_clr','#ffffff');
				 $xolo_foot_wid_link_hov_clr		 = get_theme_mod('foot_wid_link_hov_clr','#FA5600');
				 $xolo_foot_wid_ttl_size			 = get_theme_mod('foot_wid_ttl_size','20');
				 
				 $output_css   .= xolo_customizer_value( 'foot_wid_ttl_size', '#footer .widget .widget_title', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
				$output_css .="	.footer .widget_title{ 
					color: " .esc_attr($xolo_footer_widget_ttl_clr). ";
				}\n";
				
				$output_css .="	.footer .widget_title:not([class^='widget_title_']):after{ 
					background-color: " .esc_attr($footer_widget_ttl_btm_clr). ";
				}\n";
				
				$output_css .=".footer-wrapper div.tagcloud a:hover, 
							.footer-wrapper div.tagcloud a:focus, 
							.footer-wrapper div.tagcloud a:active {
					border-left-color: " .esc_attr($xolo_foot_wid_link_hov_clr). ";
				}
				\n";
				
				/**
				 *  Footer Widget Background
				 */
				$xolo_footer_wid_clr 				 = get_theme_mod('footer_wid_clr','#ffffff'); 
				$xolo_footer_widget_bg 				 = get_theme_mod('footer_widget_bg','bg_color');
				$xolo_footer_wid_bg_color 			 = get_theme_mod('footer_wid_bg_color','#383E41');
				
				$xolo_footer_bg_img 			 	 = get_theme_mod('footer_bg_img');
				$xolo_footer_bg_img_opacity			 = get_theme_mod('footer_bg_img_opacity','0.4');
				$xolo_footer_back_repeat 			 = get_theme_mod('footer_back_repeat');
				$xolo_footer_back_position 			 = get_theme_mod('footer_back_position');
				$xolo_footer_back_size 			 	 = get_theme_mod('footer_back_size');
				$xolo_footer_back_attach 			 = get_theme_mod('footer_back_attach');
				$xolo_foot_wid_img_ovelay 			 = get_theme_mod('foot_wid_img_ovelay','#000000');
				$xolo_footer_copy_txt_clr 			 = get_theme_mod('footer_copy_txt_clr','#ffffff'); 
				
				
				if($xolo_footer_widget_bg == 'bg_color' || $xolo_footer_wid_clr !== '' || $xolo_footer_copy_txt_clr !== '') { 
					$output_css .=".footer-wrapper {
							background: " .esc_attr($xolo_footer_wid_bg_color). ";							
						}.footer-wrapper,.footer-wrapper p {
							color :" .esc_attr($xolo_footer_wid_clr). ";
						}.footer-copyright, .footer-copyright p, .footer-copy ul.menu-wrap a, .footer-copyright p.no-widget-text a {
							color :" .esc_attr($xolo_footer_copy_txt_clr). ";
						}\n";
				}
				
				if($xolo_footer_widget_bg == 'bg_image') { 
					$output_css .=".footer-wrapper {
							background-image: url(" .esc_url($xolo_footer_bg_img). ");
							background-repeat: " .esc_attr($xolo_footer_back_repeat). ";
							background-attachment: " .esc_attr($xolo_footer_back_attach). ";
							background-position: " .esc_attr($xolo_footer_back_position). ";
							background-size: " .esc_attr($xolo_footer_back_size). ";
						}\n";
				}
				
				if($xolo_footer_widget_bg == 'bg_image') { 
					$output_css .=".footer-wrapper:before {
							background-color: " .esc_attr($xolo_foot_wid_img_ovelay). ";							
							opacity: " .esc_attr($xolo_footer_bg_img_opacity). ";
						}\n";
				}
			}
			
			/**
			 *  Footer Widget Style
			 */
			 $xolo_foot_wid_link_clr			 = get_theme_mod('foot_wid_link_clr','#ffffff');
			 $xolo_foot_wid_link_hov_clr		 = get_theme_mod('foot_wid_link_hov_clr','#FA5600');
				 
			$output_css .="	.footer-wrapper .widget li a, .footer-wrapper .widget:not(.widget_calendar)  a { 
					color: " .esc_attr($xolo_foot_wid_link_clr). ";
				}
				.footer-wrapper .widget a:focus, .footer-wrapper .widget a:hover {
					color: " .esc_attr($xolo_foot_wid_link_hov_clr). ";
				}\n";
				
			$xolo_foot_copy_wid_link_clr			 = get_theme_mod('foot_copy_wid_link_clr','#ffffff');
			$xolo_foot_copy_wid_link_hov_clr		 = get_theme_mod('foot_copy_wid_link_hov_clr','#FA5600');
			
			$output_css .="	.footer-copyright .widget li a, .footer-copyright .widget:not(.widget_calendar)  a,.footer-copyright a { 
					color: " .esc_attr($xolo_foot_copy_wid_link_clr). ";
				}
				.footer-copyright .widget a:focus, .footer-copyright .widget a:hover,.footer-copyright a:hover {
					color: " .esc_attr($xolo_foot_copy_wid_link_hov_clr). ";
				}
				.footer-copyright div.tagcloud a:hover, 
				.footer-copyright div.tagcloud a:focus, 
				.footer-copyright div.tagcloud a:active {
					border-left-color: " .esc_attr($xolo_foot_copy_wid_link_hov_clr). ";
				}\n";
				
				 
			/**
			 *  Footer Bottom Background
			 */
			$xolo_footer_bottom_layout 			 = get_theme_mod('footer_bottom_layout');
			$xolo_footer_copy_bg 				 = get_theme_mod('footer_copy_bg','bg_color');
			$xolo_footer_copy_bg_color 			 = get_theme_mod('footer_copy_bg_color','#111111');
			
			$xolo_footer_copy_bg_img 			 = get_theme_mod('footer_copy_bg_img');
			$xolo_footer_copy_bg_img_opacity	 = get_theme_mod('footer_copy_bg_img_opacity','0.4');
			$xolo_footer_copy_back_repeat 		 = get_theme_mod('footer_copy_back_repeat');
			$xolo_footer_copy_back_position		 = get_theme_mod('footer_copy_back_position');
			$xolo_footer_copy_back_size		 	 = get_theme_mod('footer_copy_back_size');
			$xolo_footer_copy_bg_back_attach 	 = get_theme_mod('footer_copy_bg_back_attach');
			$xolo_foot_copy_bg_img_ovelay 		 = get_theme_mod('foot_copy_bg_img_ovelay','#000000');
			
			if($xolo_footer_bottom_layout !== 'disable') { 
				if($xolo_footer_copy_bg == 'bg_color') { 
					$output_css .=".footer-copyright {
							background: " .esc_attr($xolo_footer_copy_bg_color). ";
						}\n";
				}
				
				if($xolo_footer_copy_bg == 'bg_image') { 
					$output_css .=".footer-copyright {
							background-image: url(" .esc_url($xolo_footer_copy_bg_img). ");
							background-repeat: " .esc_attr($xolo_footer_copy_back_repeat). ";
							background-attachment: " .esc_attr($xolo_footer_copy_bg_back_attach). ";
							background-position: " .esc_attr($xolo_footer_copy_back_position). ";
							background-size: " .esc_attr($xolo_footer_copy_back_size). ";
						}\n";
				}
				
				if($xolo_footer_copy_bg == 'bg_image') { 
					$output_css .=".footer-copyright:before {
							background-color: " .esc_attr($xolo_foot_copy_bg_img_ovelay). ";							
							opacity: " .esc_attr($xolo_footer_copy_bg_img_opacity). ";
						}\n";
				}
			}
		/**
		 *  Breadcrumb Style
		 */
		$output_css   .= xolo_customizer_value( 'breadcrumb_min_height', '.breadcrumb-area div.breadcrumb-content', array( 'min-height' ), array( 75, 75, 75 ), 'px' );
		
		/**
		 *  Breadcrumb Colors
		 */
		$xolo_breadcrumb_top_brdr_width 		 = get_theme_mod('breadcrumb_top_brdr_width','2'); 
		$xolo_breadcrumb_btm_brdr_width 		 = get_theme_mod('breadcrumb_btm_brdr_width','2'); 
		$xolo_breadcrumb_text_clr 				 = get_theme_mod('breadcrumb_text_clr','#383E41');
		$xolo_breadcrumb_link_clr 				 = get_theme_mod('breadcrumb_link_clr','#FF8F00');
		$xolo_breadcrumb_link_hov_clr 			 = get_theme_mod('breadcrumb_link_hov_clr','#FA5600');
		$xolo_breadcrumb_top_brdr_clr 			 = get_theme_mod('breadcrumb_top_brdr_clr','#f5f5f5');
		$xolo_breadcrumb_btm_brdr_clr 			 = get_theme_mod('breadcrumb_btm_brdr_clr','#f5f5f5');
		
		$output_css .=".breadcrumb-area h2, .breadcrumb-list li {
							color: " .esc_attr($xolo_breadcrumb_text_clr). ";
						}\n";
		
		$output_css .=".breadcrumb-list li a {
							color: " .esc_attr($xolo_breadcrumb_link_clr). ";
						}.breadcrumb-list li a:hover  {
							color: " .esc_attr($xolo_breadcrumb_link_hov_clr). ";
						}\n";	
		
		if($xolo_breadcrumb_top_brdr_width !== '0') {		
			$output_css .=".breadcrumb-area {
								border-top-style: solid;
								border-top-color: " .esc_attr($xolo_breadcrumb_top_brdr_clr). ";
								border-top-width: " .esc_attr($xolo_breadcrumb_top_brdr_width). "px;
							}\n";	
		}	
		
		if($xolo_breadcrumb_btm_brdr_width !== '0') {	
			$output_css .=".breadcrumb-area {
							border-bottom-style: solid;
							border-bottom-color: " .esc_attr($xolo_breadcrumb_btm_brdr_clr). ";
							border-bottom-width: " .esc_attr($xolo_breadcrumb_btm_brdr_width). "px;
						}\n";
		}			
		/**
		 *  Sidebar Width
		 */
		$xolo_secondary_width = get_theme_mod('xolo_sidebar_width',35);
		if($xolo_secondary_width !== '') { 
			$xolo_primary_width   = absint( 100 - $xolo_secondary_width );
				$output_css .="	@media (min-width: 992px) {#primary-content {
					max-width:" .esc_attr($xolo_primary_width). "%;
					flex-basis:" .esc_attr($xolo_primary_width). "%;
				}\n";
				$output_css .="#secondary-content {
					max-width:" .esc_attr($xolo_secondary_width). "%;
					flex-basis:" .esc_attr($xolo_secondary_width). "%;
				}}\n";
        }
		
		/**
		 *  Sidebar Color
		 */
		 $xolo_sidebar_bg_clr			 = get_theme_mod('sidebar_bg_clr','#ffffff');
		 $xolo_sidebar_widget_ttl_clr	 = get_theme_mod('sidebar_widget_ttl_clr','#383E41');
		 $xolo_sidebar_wid_link_clr		 = get_theme_mod('sidebar_wid_link_clr','#FF8F00');
		 $xolo_sidebar_wid_link_hov_clr	 = get_theme_mod('sidebar_wid_link_hov_clr','#FA5600');
		 
		 $output_css   .= xolo_customizer_value( 'sidebar_wid_ttl_size', '.sidebar .widget .widget_title', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
		 $output_css   .= xolo_customizer_value( 'sidebar_wid_padding', 'div.sidebar .widget_social_widget ul li, div.sidebar [class*="widget_"]:not(.widget_social_widget):not(.widget_info):not(.widget_social_widget):not(.widget_menu_top):not(.widget_calender):not(.widget_tag) ul:not(.days) li a', array( 'padding-top' ), array( 0, 0, 0 ), 'px' );
		 $output_css   .= xolo_customizer_value( 'sidebar_wid_padding', 'div.sidebar [class*="widget_"]:not(.widget_social_widget):not(.widget_info):not(.widget_social_widget):not(.widget_menu_top):not(.widget_calender):not(.widget_tag) ul:not(.days) li a', array( 'padding-bottom' ), array( 15, 15, 15 ), 'px' );
		 $output_css .=" .sidebar .widget .widget_title{ 
					color: " .esc_attr($xolo_sidebar_widget_ttl_clr). ";
				}\n";
				
		$output_css .="	.sidebar .widget li a { 
			color: " .esc_attr($xolo_sidebar_wid_link_clr). ";
		}.sidebar .widget a:focus, .sidebar .widget a:hover, .sidebar .widget a:active {
			color: " .esc_attr($xolo_sidebar_wid_link_hov_clr). ";
		}.sidebar div.tagcloud a {
			border-left-color: " .esc_attr($xolo_sidebar_wid_link_clr). ";
		}.sidebar div.tagcloud a:hover, .sidebar div.tagcloud a:focus, .sidebar div.tagcloud a:active {
		    border-left-color: " .esc_attr($xolo_sidebar_wid_link_hov_clr). ";
		}\n";
		
		$output_css .=".sidebar-3 .sidebar, .sidebar-2 .sidebar .widget, .sidebar { 
			background-color: " .esc_attr($xolo_sidebar_bg_clr). ";
		}\n";
		
		/**
		 *  Container
		 */
		$xolo_site_layout 				 = get_theme_mod('xolo_site_layout','contained');
		$xolo_site_cntnr_width 			 = get_theme_mod('xolo_site_cntnr_width','1170');
		$xolo_cntnr_mtop 				 = get_theme_mod('xolo_cntnr_mtop','120');
		$xolo_cntnr_mbtm 			 	 = get_theme_mod('xolo_cntnr_mbtm','120');
			if($xolo_site_layout !=='stretched' && $xolo_site_cntnr_width >=768 && $xolo_site_cntnr_width <=2000){
				$output_css .=".xl-layout-boxed #page .sticky-menu, .xl-layout-boxed #page, .xl-layout-contained .xl-container, .xl-layout-boxed .xl-container {
						max-width: " .esc_attr($xolo_site_cntnr_width). "px;
					}\n";
			} else {
				$output_css .=".xl-layout-stretched .xl-container {
						max-width: 100%;
					}\n";
			}
		
		$output_css .=" .main-content-part { 
			margin-top: " .esc_attr($xolo_cntnr_mtop). "px;
		}\n";
		
		 $output_css .=" .xolo-content{ 
			margin-bottom: " .esc_attr($xolo_cntnr_mbtm). "px;
		}\n";	
			
		/**
		 *  Typography Body
		 */
		 $xolo_body_font_family		 = get_theme_mod('xolo_body_font_family','');
		 $xolo_body_font_weight	 	 = get_theme_mod('xolo_body_font_weight','inherit');
		 $xolo_body_text_transform	 = get_theme_mod('xolo_body_text_transform','inherit');
		 $xolo_body_font_style	 	 = get_theme_mod('xolo_body_font_style','inherit');
		 $xolo_body_txt_decoration	 = get_theme_mod('xolo_body_txt_decoration','none');
		
		 $output_css   .= xolo_customizer_value( 'xolo_body_font_size', 'body', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		 $output_css   .= xolo_customizer_value( 'xolo_body_line_height', 'body', array( 'line-height' ), array( 1.6, 1.6, 1.6 ) );
		 $output_css   .= xolo_customizer_value( 'xolo_body_ltr_space', 'body', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		 if($xolo_body_font_family !== '') { 
			if ( $xolo_body_font_family && ( strpos( $xolo_body_font_family, ',' ) != true ) ) {
				xolo_enqueue_google_font($xolo_body_font_family);
			}	
			 $output_css .=" body{ font-family: " .esc_attr($xolo_body_font_family). ";	}\n";
		 }
		 $output_css .=" body{ 
			font-weight: " .esc_attr($xolo_body_font_weight). ";
			text-transform: " .esc_attr($xolo_body_text_transform). ";
			font-style: " .esc_attr($xolo_body_font_style). ";
			text-decoration: " .esc_attr($xolo_body_txt_decoration). ";
		} a {text-decoration: " .esc_attr($xolo_body_txt_decoration). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {
			 $xolo_heading_font_family	    = get_theme_mod('xolo_h' . $i . '_font_family','');	
			 $xolo_heading_font_weight	 	= get_theme_mod('xolo_h' . $i . '_font_weight','700');
			 $xolo_heading_text_transform 	= get_theme_mod('xolo_h' . $i . '_text_transform','inherit');
			 $xolo_heading_font_style	 	= get_theme_mod('xolo_h' . $i . '_font_style','inherit');
			 $xolo_heading_txt_decoration	= get_theme_mod('xolo_h' . $i . '_text_decoration','inherit');
			 
			 $output_css   .= xolo_customizer_value( 'xolo_h' . $i . '_font_size', 'h' . $i .'', array( 'font-size' ), array( 36, 36, 36 ), 'px' );
			 $output_css   .= xolo_customizer_value( 'xolo_h' . $i . '_line_height', 'h' . $i . '', array( 'line-height' ), array( 1.2, 1.2, 1.2 ) );
			 $output_css   .= xolo_customizer_value( 'xolo_h' . $i . '_ltr_spacing', 'h' . $i . '', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
			  if($xolo_heading_font_family !== '') {
				  if ( $xolo_heading_font_family && ( strpos( $xolo_heading_font_family, ',' ) != true ) ) {
					xolo_enqueue_google_font($xolo_heading_font_family);
				  }
			  }	
			 $output_css .=" h" . $i . "{ 
				font-family: " .esc_attr($xolo_heading_font_family). ";
				font-weight: " .esc_attr($xolo_heading_font_weight). ";
				text-transform: " .esc_attr($xolo_heading_text_transform). ";
				font-style: " .esc_attr($xolo_heading_font_style). ";
				text-decoration: " .esc_attr($xolo_heading_txt_decoration). ";
			}\n";
		 }
		
		/**
		 * Blogs
		 */
		  $output_css   .=  xolo_customizer_value( 'single_post_ttl_size', '.blog-single-title', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
		 $output_css   .= xolo_customizer_value( 'achive_post_ttl_size', '.blog-multi-title', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
		
		/**
		 *  Breadcrumb Background
		 */
		$xolo_breadcrumb_bg 				 = get_theme_mod('breadcrumb_bg','bg_color');
		$xolo_breadcrumb_bg_color 		 	 = get_theme_mod('breadcrumb_bg_color','#f5f5f5');
		$xolo_breadcrumb_bg_img 			 = get_theme_mod('breadcrumb_bg_img');
		$xolo_breadcrumb_bg_img_opacity	 	 = get_theme_mod('breadcrumb_bg_img_opacity','0.6');
		$xolo_breadcrumb_back_repeat 	 	 = get_theme_mod('breadcrumb_back_repeat','no-repeat');
		$xolo_breadcrumb_back_position 	 	 = get_theme_mod('breadcrumb_back_position','center');
		$xolo_breadcrumb_back_size 			 = get_theme_mod('breadcrumb_back_size','cover');
		$xolo_breadcrumb_back_attach 	 	 = get_theme_mod('breadcrumb_back_attach','fixed');
		$xolo_breadcrumb_overlay_color 		 = get_theme_mod('breadcrumb_overlay_color','#383E41');
		
		
		if($xolo_breadcrumb_bg == 'bg_color') { 
			$output_css .=".breadcrumb-area {
					background: " .esc_attr($xolo_breadcrumb_bg_color). ";
				}\n";
		}
	
		if($xolo_breadcrumb_bg == 'bg_image') { 
			$output_css .=".breadcrumb-area {
					background-image: url(" .esc_url($xolo_breadcrumb_bg_img). ");
					background-repeat: " .esc_attr($xolo_breadcrumb_back_repeat). ";
					background-attachment: " .esc_attr($xolo_breadcrumb_back_attach). ";
					background-position: " .esc_attr($xolo_breadcrumb_back_position). ";
					background-size: " .esc_attr($xolo_breadcrumb_back_size). ";
				}\n";
		}
		
		if($xolo_breadcrumb_bg == 'bg_image') { 
			$output_css .=".breadcrumb-area:before {
					content: '';
					position: absolute;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					background-color: " .esc_attr($xolo_breadcrumb_overlay_color). ";
					z-index: 0;
					opacity: " .esc_attr($xolo_breadcrumb_bg_img_opacity). ";
				}\n";
		}
		
		/**
		 *  Breadcrumb Typography
		 */
		 
		  $output_css   .=  xolo_customizer_value( 'breadcrumb_title_size', '.breadcrumb-area h2', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
		  $output_css   .=  xolo_customizer_value( 'breadcrumb_content_size', '.breadcrumb-area li', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		
		/**
		 * Archive post
		 */
		$xolo_archive_post_txt_clr			= get_theme_mod('archive_post_txt_clr','#383E41'); 
        $xolo_archive_post_link_clr			= get_theme_mod('archive_post_link_clr','#383E41');
		$xolo_archive_post_link_hov_clr		= get_theme_mod('archive_post_link_hov_clr','#FA5600');
		$xolo_archive_post_icon_clr			= get_theme_mod('archive_post_icon_clr','#FF8F00');
		$xolo_archive_post_bg_clr			= get_theme_mod('archive_post_bg_clr','#ffffff');
		$xolo_archive_post_meta_clr			= get_theme_mod('archive_post_meta_clr','#383E41');
		$archive_post_overlay_clr			= get_theme_mod('archive_post_overlay_clr','#ffffff');
		
		 $output_css .=".blog-items .blog-img .blog-meta:before  {
				background: " .esc_attr($archive_post_overlay_clr). ";
			}\n";
			
		 $output_css .=".blog-items, .blog-items p, .blog-items .blog-meta {
				color: " .esc_attr($xolo_archive_post_txt_clr). ";
			}.blog-items {
				background-color: " .esc_attr($xolo_archive_post_bg_clr). ";
			}\n";
		 $output_css .=".blog-items .post-title a {
				color: " .esc_attr($xolo_archive_post_link_clr). ";
			}
			.blog-items .post-title a:hover, .blog-items .post-title a:focus {
				color: " .esc_attr($xolo_archive_post_link_hov_clr). ";
			}\n";
			
		$output_css .=".blog-items .blog-meta i  {
			color: " .esc_attr($xolo_archive_post_icon_clr). ";
		}\n";
		
		$output_css .=".blog-items .blog-meta a,.blog-items .blog-img .blog-meta  {
			color: " .esc_attr($xolo_archive_post_meta_clr). ";
		}\n";

		/**
		 * Pagination
		 */
		$xolo_pagination_clr				= get_theme_mod('xolo_pagination_clr','#FF8F00');
		 
		$output_css .="body:not(.pagination-minimal):not(.pagination-outline):not(.pagination-fill) .pagination .nav-links .page-numbers.current,body:not(.pagination-minimal):not(.pagination-outline):not(.pagination-fill) .pagination .nav-links .next.page-numbers,body:not(.pagination-minimal):not(.pagination-outline):not(.pagination-fill) .pagination .nav-links .prev.page-numbers {
			border-color: " .esc_attr($xolo_pagination_clr). ";
		}.pagination .nav-links .page-numbers.current {
			color: " .esc_attr($xolo_pagination_clr). ";
		}body:not(.pagination-minimal):not(.pagination-outline):not(.pagination-fill) .pagination .nav-links .next:hover,
		body:not(.pagination-minimal):not(.pagination-outline):not(.pagination-fill) .pagination .nav-links .next:focus,
		body:not(.pagination-minimal):not(.pagination-outline):not(.pagination-fill) .pagination .nav-links .prev:hover,
		body:not(.pagination-minimal):not(.pagination-outline):not(.pagination-fill) .pagination .nav-links .prev:focus {
			color: #ffffff;
			background-color: " .esc_attr($xolo_pagination_clr). ";
		}\n";
		
        wp_add_inline_style( 'xolo-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'xolo_dynamic_style' );
?>