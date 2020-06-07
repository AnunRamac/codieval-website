	<header id="header-section" class="header">
	<!-- Mobile Toggle -->
		<?php if ( function_exists( 'xolo_mobile_menu' ) ) : xolo_mobile_menu(); endif; ?>
    <!-- / -->

	<!-- Top Menu -->
    <div class="navigation d-none d-xl-block <?php echo esc_attr(xolo_sticky_menu()); ?>">
        <div class="xl-container">
            <div class="xl-columns-area">
                <div class="xl-column-3 my-auto">
                    <div class="logo">
                        <?php if ( function_exists( 'xolo_logo_title_desc' ) ) : xolo_logo_title_desc(); endif; ?>
                    </div>
                </div>
                <div class="xl-column-9 my-auto">
                    <div class="theme-menu">
                        <nav class="menubar">
                             <?php if ( function_exists( 'xolo_nav' ) ) : xolo_nav(); endif; ?>                         
                        </nav>
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
    <!-- / -->
	
</header>
