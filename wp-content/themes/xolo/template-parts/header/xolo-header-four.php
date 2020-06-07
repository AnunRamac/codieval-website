<header id="header-section" class="header">
    <!-- Mobile Toggle -->
    <?php if ( function_exists( 'xolo_mobile_menu' ) ) : xolo_mobile_menu(); endif; ?>
    <!-- / -->

    <!-- Header Widget Info -->
    <div class="header-widget-info d-none d-xl-block">
        <div class="xl-container">
            <div class="header-wrapper">                
                <div class="flex-fill">
                    <div class="header-info">
                        <div class="header-item widget-left header-widget">
                            <?php if ( function_exists( 'xolo_header_widget_area_first' ) ) : xolo_header_widget_area_first(); endif; ?>
                        </div>
                    </div>
                </div>
                <div class="flex-fill">
                    <div class="logo text-center">
                        <?php if ( function_exists( 'xolo_logo_title_desc' ) ) : xolo_logo_title_desc(); endif; ?>
                    </div>
                </div>
                <div class="flex-fill">
                    <div class="header-info">
                        <div class="header-item widget-right">
                            <div class="menu-right">
                                <ul class="wrap-right">
									<?php if ( function_exists( 'xolo_header_search' ) ) : xolo_header_search(); endif; ?>	
									<?php if ( function_exists( 'xolo_header_button' ) ) : xolo_header_button(); endif; ?>	
                                </ul>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / -->

    <!-- Top Menu -->
    <div class="navigation d-none d-xl-block <?php echo esc_attr(xolo_sticky_menu()); ?>">
        <div class="xl-container">
            <div class="xl-columns-area">
                <div class="xl-column-12">
                    <div class="theme-menu">
                        <nav class="menubar">
                           <?php if ( function_exists( 'xolo_nav' ) ) : xolo_nav(); endif; ?>                           
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / -->

</header>
