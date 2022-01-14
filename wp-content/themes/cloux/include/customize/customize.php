<?php
/*======
*
* Customize Santanize
*
======*/
	include ( get_template_directory() . '/include/customize/types.php' );
	
	function cloux_santanize( $input ) {
		return $input;
	}



/*======
*
* Customize for Cloux
*
======*/
	function cloux_customizer( $wp_customize ) {
		/*======
		*
		* General Variables
		*
		======*/
		$cloux_capability = "";
		$cloux_transport = "refresh";
		$cloux_santanize = "cloux_santanize"; /* Santanize name */
		$google_font_api_key = "AIzaSyCzqULQqj6OmiSEI5pQ0Y-oMbMbCYlgKBo"; /* Google font API key */
		$google_font_amount = "all"; /* Font count */
		$google_font_cache_time = "50"; /* Font cache time */
		$wp_customize->register_control_type( 'Cloux_Customize_Control_Radio_Image' ); /* General radio image control */



		/*======
		*
		* General
		*
		======*/
		$wp_customize->add_panel( 'cloux_general', array(
			'title' => esc_html__( 'General', 'cloux' ),
			'description' => esc_html__( 'General settings of Cloux.', 'cloux' ),
			'priority' => 1,
			'sanitize_callback' => $cloux_santanize,
		) );

			/*====== Sidebar Position ======*/
			$wp_customize->add_section( 'cloux_general_sidebar', 
				array(
					'title' => esc_html__( 'General Sidebar', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'General sidebar settings.', 'cloux' ),
					'panel' => 'cloux_general',
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_setting( 'cloux_general_sidebar_position',
				array(
					'default' => 'right-sidebar',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_general_sidebar_position',
	            array(
	                'label'    => esc_html__( 'Sidebar Position', 'cloux' ),
					'section' => 'cloux_general_sidebar',
					'settings' => 'cloux_general_sidebar_position',
	                'choices'  => array(
	                    'right-sidebar' => array(
	                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
	                    ),
	                    'left-sidebar' => array(
	                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
	                    ),
	                    'no-sidebar' => array(
	                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Fixed Sidebar ======*/
			$wp_customize->add_setting( 'cloux_fixed_sidebar',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_fixed_sidebar', 
				array(
					'label' => esc_html__( 'Fixed Sidebar', 'cloux' ),
					'section' => 'cloux_general_sidebar',
					'settings' => 'cloux_fixed_sidebar',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose fixed sidebar status.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Loader ======*/
			$wp_customize->add_section( 'cloux_loader', 
				array(
					'title' => esc_html__( 'Loader', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'Loader settings.', 'cloux' ),
					'panel' => 'cloux_general',
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_setting( 'cloux_loader_status',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_loader_status', 
				array(
					'label' => esc_html__( 'Loader', 'cloux' ),
					'section' => 'cloux_loader',
					'settings' => 'cloux_loader_status',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose loader status.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			$wp_customize->add_setting( 'cloux_loader_style',
				array(
					'default' => 'style-1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_loader_style', 
				array(
					'label' => esc_html__( 'Loader Style', 'cloux' ),
					'section' => 'cloux_loader',
					'settings' => 'cloux_loader_style',
					'type' => 'radio',
					'description' => esc_html__( 'You can choose loader style.', 'cloux' ),
					'choices' => array(
						'style-1' => esc_html__( 'Style 1', 'cloux' ),
						'style-2' => esc_html__( 'Style 2', 'cloux' ),
						'style-3' => esc_html__( 'Style 2', 'cloux' ),
						'style-4' => esc_html__( 'Style 3', 'cloux' ),
					),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Other Settings ======*/
			$wp_customize->add_section( 'cloux_other_settings', 
				array(
					'title' => esc_html__( 'Other Settings', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'Loader settings.', 'cloux' ),
					'panel' => 'cloux_general',
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Breadcrumb Default Background ======*/
			$wp_customize->add_setting( 'cloux_default_page_banner_bg',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cloux_default_page_banner_bg', 
				array(
					'label' => esc_html__( 'Page Banner Default Background', 'cloux' ),
					'section' => 'cloux_other_settings',
					'settings' => 'cloux_default_page_banner_bg',
					'mime_type' => 'image',
					'description' => esc_html__( 'You can upload a background for the page banner.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );



		/*======
		*
		* Header
		*
		======*/
		$wp_customize->add_section( 'cloux_header', 
			array(
				'title' => esc_html__( 'Header', 'cloux' ),
				'priority' => 2,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'Header settings for Cloux.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== Hide Header ======*/
			$wp_customize->add_setting( 'cloux_header_status',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_header_status', 
				array(
					'label' => esc_html__( 'Header', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_status',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide the header from all site.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== General Header Style ======*/
			$wp_customize->add_setting( 'cloux_header_general_style',
				array(
					'default' => 'style-1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_header_general_style',
	            array(
	                'label'    => esc_html__( 'General Header Style', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_general_style',
					'description' => esc_html__( 'You can choose header style for all site.', 'cloux' ),
	                'choices'  => array(
	                    'style-1' => array(
	                        'label' => esc_html__( 'Style 1', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/header-style/style-1.svg',
	                    ),
	                    'style-2' => array(
	                        'label' => esc_html__( 'Style 2', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/header-style/style-2.svg',
	                    ),
	                    'style-3' => array(
	                        'label' => esc_html__( 'Style 3', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/header-style/style-3.svg',
	                    ),
	                    'style-4' => array(
	                        'label' => esc_html__( 'Style 4', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/header-style/style-4.svg',
	                    ),
	                    'style-5' => array(
	                        'label' => esc_html__( 'Style 5', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/header-style/style-5.svg',
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== General Header Style ======*/
			$wp_customize->add_setting( 'cloux_header_general_position',
				array(
					'default' => 'position-2',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_header_general_position',
	            array(
	                'label'    => esc_html__( 'General Header Position', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_general_position',
					'description' => esc_html__( 'You can change position of the header for all site.', 'cloux' ),
	                'choices'  => array(
	                    'position-1' => array(
	                        'label' => esc_html__( 'Position 1', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/header-position/position-1.svg',
	                    ),
	                    'position-2' => array(
	                        'label' => esc_html__( 'Position 2', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/header-position/position-2.svg',
	                    ),
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Header Logo ======*/
			$wp_customize->add_setting( 'cloux_header_logo',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cloux_header_logo', 
				array(
					'label' => esc_html__( 'Header Logo', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_logo',
					'mime_type' => 'image',
					'description' => esc_html__( 'You can upload site logo for header.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Header Alternative Logo ======*/
			$wp_customize->add_setting( 'cloux_header_alternative_logo',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cloux_header_alternative_logo', 
				array(
					'label' => esc_html__( 'Header Alternative Logo', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_alternative_logo',
					'mime_type' => 'image',
					'description' => esc_html__( 'This logo is white version of the logo.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Header Logo Height ======*/
			$wp_customize->add_setting( 'cloux_header_logo_height',
				array(
					'default' => '24',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_header_logo_height', 
				array(
					'label' => esc_html__( 'Header Logo Height', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_logo_height',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter height for header logo.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '650',
						'step'   => '1',
						'suffix' => 'px',
					),
				)
			) );

			/*====== Header Logo Width ======*/
			$wp_customize->add_setting( 'cloux_header_logo_width',
				array(
					'default' => '161',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_header_logo_width', 
				array(
					'label' => esc_html__( 'Header Logo Width', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_logo_width',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter width for header logo.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '650',
						'step'   => '1',
						'suffix' => 'px',
					),
				)
			) );

			/*====== Fixed Header ======*/
			$wp_customize->add_setting( 'cloux_header_fixed',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_header_fixed', 
				array(
					'label' => esc_html__( 'Fixed Header', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_fixed',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose fixed status of header.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Social Media ======*/
			$wp_customize->add_setting( 'cloux_header_social_media',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_header_social_media', 
				array(
					'label' => esc_html__( 'Social Media', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_social_media',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide social media from header.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Search ======*/
			$wp_customize->add_setting( 'cloux_header_search',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_header_search', 
				array(
					'label' => esc_html__( 'Search', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_search',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide search from header.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Search ======*/
			$wp_customize->add_setting( 'cloux_header_user_panel',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_header_user_panel', 
				array(
					'label' => esc_html__( 'User Panel', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_header_user_panel',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide user panel from header.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Sign Up Form Text ======*/
			$wp_customize->add_setting( 'cloux_signup_text',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_signup_text', 
				array(
					'label' => esc_html__( 'Text for Sign Up Form', 'cloux' ),
					'section' => 'cloux_header',
					'settings' => 'cloux_signup_text',
					'type' => 'textarea',
					'description' => esc_html__( 'You can enter text for sign up form.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);



		/*======
		*
		* Footer
		*
		======*/
		$wp_customize->add_section( 'cloux_footer', 
			array(
				'title' => esc_html__( 'Footer', 'cloux' ),
				'priority' => 3,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'Footer settings for Cloux.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== Footer Status ======*/
			$wp_customize->add_setting( 'footer_status',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'footer_status', 
				array(
					'label' => esc_html__( 'Footer', 'cloux' ),
					'section' => 'cloux_footer',
					'settings' => 'footer_status',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide the footer from all site.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== General Footer Style ======*/
			$wp_customize->add_setting( 'cloux_footer_general_style',
				array(
					'default' => 'style-1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_footer_general_style',
	            array(
	                'label'    => esc_html__( 'General Footer Style', 'cloux' ),
					'section' => 'cloux_footer',
					'settings' => 'cloux_footer_general_style',
	                'choices'  => array(
	                    'style-1' => array(
	                        'label' => esc_html__( 'Style 1', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/footer-style/style-1.svg',
	                    ),
	                    'style-2' => array(
	                        'label' => esc_html__( 'Style 2', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/footer-style/style-2.svg',
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Page of Footer Content for Style 1 ======*/
			$wp_customize->add_setting( 'cloux_footer_page_1',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_footer_page_1', 
				array(
					'label' => esc_html__( 'Footer Style 1 Page', 'cloux' ),
					'section' => 'cloux_footer',
					'settings' => 'cloux_footer_page_1',
					'type' => 'dropdown-pages',
					'description' => esc_html__( 'You can choose page of footer content for footer style 1. You can edit footer from this page.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Page of Footer Content for Style 2 ======*/
			$wp_customize->add_setting( 'cloux_footer_page_2',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_footer_page_2', 
				array(
					'label' => esc_html__( 'Footer Style 2 Page', 'cloux' ),
					'section' => 'cloux_footer',
					'settings' => 'cloux_footer_page_2',
					'type' => 'dropdown-pages',
					'description' => esc_html__( 'You can choose page of footer content for footer style 2. You can edit footer from this page.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Copyright Status ======*/
			$wp_customize->add_setting( 'cloux_hide_copyright',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_hide_copyright', 
				array(
					'label' => esc_html__( 'Copyright', 'cloux' ),
					'section' => 'cloux_footer',
					'settings' => 'cloux_hide_copyright',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide the copyright from all site.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Copyright Menu ======*/
			$wp_customize->add_setting( 'cloux_hide_copyright_menu',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_hide_copyright_menu', 
				array(
					'label' => esc_html__( 'Copyright Menu', 'cloux' ),
					'section' => 'cloux_footer',
					'settings' => 'cloux_hide_copyright_menu',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide the copyright menu from all site.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Copyright Logo ======*/
			$wp_customize->add_setting( 'cloux_copyright_logo',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cloux_copyright_logo', 
				array(
					'label' => esc_html__( 'Copyright Logo', 'cloux' ),
					'section' => 'cloux_footer',
					'settings' => 'cloux_copyright_logo',
					'mime_type' => 'image',
					'description' => esc_html__( 'You can upload site logo for copyright.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Copyright Text ======*/
			$wp_customize->add_setting( 'cloux_copyright_text',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_copyright_text', 
				array(
					'label' => esc_html__( 'Copyright Text', 'cloux' ),
					'section' => 'cloux_footer',
					'settings' => 'cloux_copyright_text',
					'type' => 'textarea',
					'description' => esc_html__( 'You can enter text for copyright.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);



		/*======
		*
		* Colors
		*
		======*/
		$wp_customize->add_section( 'colors', 
			array(
				'title' => esc_html__( 'Colors', 'cloux' ),
				'priority' => 4,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'Color settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== Main Color ======*/
			$wp_customize->add_setting( 'cloux_theme_main_color',
				array(
					'default' => '#ffc311',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cloux_theme_main_color', 
				array(
					'label' => esc_html__( 'Main Color', 'cloux' ),
					'section' => 'colors',
					'settings' => 'cloux_theme_main_color',
					'description' => esc_html__( 'You can choose main color of the theme.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Heading Color ======*/
			$wp_customize->add_setting( 'cloux_theme_heading_color',
				array(
					'default' => '#282828',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cloux_theme_heading_color', 
				array(
					'label' => esc_html__( 'Heading', 'cloux' ),
					'section' => 'colors',
					'settings' => 'cloux_theme_heading_color',
					'description' => esc_html__( 'You can choose color of H1, H2, H3, H4, H5 and H6 tags.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Footer Background ======*/
			$wp_customize->add_setting( 'cloux_theme_footer_background',
				array(
					'default' => '#111111',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cloux_theme_footer_background', 
				array(
					'label' => esc_html__( 'Footer Background', 'cloux' ),
					'section' => 'colors',
					'settings' => 'cloux_theme_footer_background',
					'description' => esc_html__( 'You can choose background of the footer', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Copyright Background ======*/
			$wp_customize->add_setting( 'cloux_theme_copyright_background',
				array(
					'default' => '#070707',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cloux_theme_copyright_background', 
				array(
					'label' => esc_html__( 'Copyright Background', 'cloux' ),
					'section' => 'colors',
					'settings' => 'cloux_theme_copyright_background',
					'description' => esc_html__( 'You can choose background of the copyright', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Inputs Background ======*/
			$wp_customize->add_setting( 'cloux_theme_input_background',
				array(
					'default' => '#ffffff',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cloux_theme_input_background', 
				array(
					'label' => esc_html__( 'Inputs Background', 'cloux' ),
					'section' => 'colors',
					'settings' => 'cloux_theme_input_background',
					'description' => esc_html__( 'You can choose background of the inputs.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Inputs Border Color ======*/
			$wp_customize->add_setting( 'cloux_theme_input_border_color',
				array(
					'default' => '#eeeeee',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cloux_theme_input_border_color', 
				array(
					'label' => esc_html__( 'Inputs Border Color', 'cloux' ),
					'section' => 'colors',
					'settings' => 'cloux_theme_input_border_color',
					'description' => esc_html__( 'You can choose border color of the inputs.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Inputs Color ======*/
			$wp_customize->add_setting( 'cloux_theme_input_color',
				array(
					'default' => '#777777',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cloux_theme_input_color', 
				array(
					'label' => esc_html__( 'Inputs Color', 'cloux' ),
					'section' => 'colors',
					'settings' => 'cloux_theme_input_color',
					'description' => esc_html__( 'You can choose text color of the inputs.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Placeholder Color ======*/
			$wp_customize->add_setting( 'cloux_theme_placeholder_color',
				array(
					'default' => '#b1b1b1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cloux_theme_placeholder_color', 
				array(
					'label' => esc_html__( 'Placeholders Color', 'cloux' ),
					'section' => 'colors',
					'settings' => 'cloux_theme_placeholder_color',
					'description' => esc_html__( 'You can choose text color of the placeholders.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );



		/*======
		*
		* Typography
		*
		======*/
		$wp_customize->add_section( 'cloux_typography', 
			array(
				'title' => esc_html__( 'Typography', 'cloux' ),
				'priority' => 5,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'Typography settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== Latin Extended ======*/
			$wp_customize->add_setting( 'cloux_typography_latin_extended',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_typography_latin_extended', 
				array(
					'label' => esc_html__( 'Latin Extended', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_latin_extended',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose character status of Latin Extended.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Cyrillic Extended ======*/
			$wp_customize->add_setting( 'cloux_typography_cyrillic_extended',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_typography_cyrillic_extended', 
				array(
					'label' => esc_html__( 'Cyrillic & Cyrillic Extended', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_cyrillic_extended',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose character status of Cyrillic Extended.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Greek Extended ======*/
			$wp_customize->add_setting( 'cloux_typography_greek_extended',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_typography_greek_extended', 
				array(
					'label' => esc_html__( 'Greek & Greek Extended', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_greek_extended',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose character status of Greek Extended.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Font Weights ======*/
			$wp_customize->add_setting( 'cloux_font_weights',
				array(
					'default' => '100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_font_weights', 
				array(
					'label' => esc_html__( 'Font Weights', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_font_weights',
					'description' => esc_html__( 'You can enter custom font weights.', 'cloux' ),
					'type' => 'text',
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Typography Main Font ======*/
			$wp_customize->add_setting( 'cloux_typography_main_font',
				array(
					'default' => 'Poppins',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customize_Google_Fonts_Control( $wp_customize, 'cloux_typography_main_font', 
				array(
					'label' => esc_html__( 'Main Font', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_main_font',
					'description' => esc_html__( 'You can change main font of the theme.', 'cloux' ),
					'api_key' => $google_font_api_key,
					'amount' => $google_font_amount,
					'cache_time'  => $google_font_cache_time,
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Typography Alternative Font ======*/
			$wp_customize->add_setting( 'cloux_typography_alternative_font',
				array(
					'default' => 'Titillium Web',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customize_Google_Fonts_Control( $wp_customize, 'cloux_typography_alternative_font', 
				array(
					'label' => esc_html__( 'Alternative Font', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_alternative_font',
					'description' => esc_html__( 'You can change alternative font of the theme.', 'cloux' ),
					'api_key' => $google_font_api_key,
					'amount' => $google_font_amount,
					'cache_time'  => $google_font_cache_time,
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== HTML Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_html_font_size',
				array(
					'default' => '13',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_html_font_size', 
				array(
					'label' => esc_html__( 'HTML Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_html_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for HTML tag.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '1',
						'suffix' => 'px',
					),
				)
			) );

			/*====== Body Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_body_font_size',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_body_font_size', 
				array(
					'label' => esc_html__( 'Body Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_body_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for body.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );

			/*====== H1 Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_h1_font_size',
				array(
					'default' => '3.231',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_h1_font_size', 
				array(
					'label' => esc_html__( 'H1 Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_h1_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for H1.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );

			/*====== H2 Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_h2_font_size',
				array(
					'default' => '2.462',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_h2_font_size', 
				array(
					'label' => esc_html__( 'H2 Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_h2_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for H2.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );

			/*====== H3 Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_h3_font_size',
				array(
					'default' => '1.846',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_h3_font_size', 
				array(
					'label' => esc_html__( 'H3 Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_h3_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for H3.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );

			/*====== H4 Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_h4_font_size',
				array(
					'default' => '1.615',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_h4_font_size', 
				array(
					'label' => esc_html__( 'H4 Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_h4_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for H4.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );

			/*====== H5 Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_h5_font_size',
				array(
					'default' => '1.385',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_h5_font_size', 
				array(
					'label' => esc_html__( 'H5 Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_h5_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for H5.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );

			/*====== H6 Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_h6_font_size',
				array(
					'default' => '1.154',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_h6_font_size', 
				array(
					'label' => esc_html__( 'H6 Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_h6_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for H6.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );

			/*====== Inputs Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_input_font_size',
				array(
					'default' => '0.9231',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_input_font_size', 
				array(
					'label' => esc_html__( 'Input Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_input_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for inputs.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );

			/*====== Buttons Font Size ======*/
			$wp_customize->add_setting( 'cloux_typography_button_font_size',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_typography_button_font_size', 
				array(
					'label' => esc_html__( 'Button Font Size', 'cloux' ),
					'section' => 'cloux_typography',
					'settings' => 'cloux_typography_button_font_size',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter custom font size for buttons.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '150',
						'step'   => '0.1',
						'suffix' => 'rem',
					),
				)
			) );



		/*======
		*
		* Posts
		*
		======*/
		$wp_customize->add_section( 'cloux_posts', 
			array(
				'title' => esc_html__( 'Posts', 'cloux' ),
				'priority' => 9,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'Post settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

		/*====== Post Sidebar Position ======*/
			$wp_customize->add_setting( 'cloux_posts_sidebar_position',
				array(
					'default' => 'right-sidebar',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_posts_sidebar_position',
	            array(
	                'label'    => esc_html__( 'Post Sidebar Position', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_sidebar_position',
					'description' => esc_html__( 'You can choose default sidebar position for posts.', 'cloux' ),
	                'choices'  => array(
	                    'right-sidebar' => array(
	                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
	                    ),
	                    'left-sidebar' => array(
	                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
	                    ),
	                    'no-sidebar' => array(
	                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Post Sidebar ======*/
			$wp_customize->add_setting( 'cloux_posts_sidebar',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_posts_sidebar',
	            array(
	                'label'    => esc_html__( 'Post Sidebar', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_sidebar',
					'description' => esc_html__( 'You can choose default sidebar for posts.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Post Image ======*/
			$wp_customize->add_setting( 'cloux_posts_image',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_posts_image', 
				array(
					'label' => esc_html__( 'Post Image', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_image',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide image from post single.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Post Tags ======*/
			$wp_customize->add_setting( 'cloux_posts_tags',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_posts_tags', 
				array(
					'label' => esc_html__( 'Post Tags', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_tags',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide tag status from post single.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Post Share ======*/
			$wp_customize->add_setting( 'cloux_posts_share',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_posts_share', 
				array(
					'label' => esc_html__( 'Post Share', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_share',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose share buttons status of posts.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Post Biography ======*/
			$wp_customize->add_setting( 'cloux_posts_author_biography',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_posts_author_biography', 
				array(
					'label' => esc_html__( 'Author Biography', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_author_biography',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose author biography status of posts.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Post Related ======*/
			$wp_customize->add_setting( 'cloux_posts_pagination',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_posts_pagination', 
				array(
					'label' => esc_html__( 'Post Pagination', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_pagination',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide post pagination from posts.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Post Related ======*/
			$wp_customize->add_setting( 'cloux_posts_related',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_posts_related', 
				array(
					'label' => esc_html__( 'Related Posts', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_related',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose related post field status of posts.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Post Related Count ======*/
			$wp_customize->add_setting( 'cloux_posts_related_count',
				array(
					'default' => '2',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_posts_related_count', 
				array(
					'label' => esc_html__( 'Related Post Count', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_related_count',
					'type' => 'range-value',
					'description' => esc_html__( 'You can enter post count for related post field.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '6',
						'step'   => '1',
						'suffix' => '',
					),
				)
			) );

			/*====== Post Navigation ======*/
			$wp_customize->add_setting( 'cloux_posts_navigation',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_posts_navigation', 
				array(
					'label' => esc_html__( 'Post Navigation', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_navigation',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide navigation status from post single.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Post Comment ======*/
			$wp_customize->add_setting( 'cloux_posts_comment',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_posts_comment', 
				array(
					'label' => esc_html__( 'Post Comment', 'cloux' ),
					'section' => 'cloux_posts',
					'settings' => 'cloux_posts_comment',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide comment field status from posts.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );



		/*======
		*
		* Games
		*
		======*/
		$wp_customize->add_section( 'cloux_games', 
			array(
				'title' => esc_html__( 'Games', 'cloux' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'Game single settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== Result Page for Game Search ======*/
			$wp_customize->add_setting( 'cloux_games_game_search_results_page',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_games_game_search_results_page', 
				array(
					'label' => esc_html__( 'Game Search Results Page', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_game_search_results_page',
					'type' => 'dropdown-pages',
					'description' => esc_html__( 'You can choose a search results page for game search.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Game Archive Sidebar Position ======*/
			$wp_customize->add_setting( 'cloux_games_archive_sidebar_position',
				array(
					'default' => 'right-sidebar',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_games_archive_sidebar_position',
	            array(
	                'label'    => esc_html__( 'Game Archive Position', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_archive_sidebar_position',
					'description' => esc_html__( 'You can choose default sidebar position for game archive.', 'cloux' ),
	                'choices'  => array(
	                    'right-sidebar' => array(
	                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
	                    ),
	                    'left-sidebar' => array(
	                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
	                    ),
	                    'no-sidebar' => array(
	                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Game Archive Sidebar ======*/
			$wp_customize->add_setting( 'cloux_games_archive_sidebar',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_games_archive_sidebar',
	            array(
	                'label'    => esc_html__( 'Game Archive Sidebar', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_archive_sidebar',
					'description' => esc_html__( 'You can choose default sidebar for game archive.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Game Archive Listing Style ======*/
			$wp_customize->add_setting( 'cloux_games_archive_listing_style',
				array(
					'default' => 'style-1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_games_archive_listing_style',
	            array(
	                'label'    => esc_html__( 'Listing Style', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_archive_listing_style',
					'description' => esc_html__( 'You can choose listing style for game archive.', 'cloux' ),
	                'choices'  => array(
	                    'style-1' => array(
	                        'label' => esc_html__( 'Style 1', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/game-style/style-1.svg',
	                    ),
	                    'style-2' => array(
	                        'label' => esc_html__( 'Style 2', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/game-style/style-2.svg',
	                    ),
	                    'style-3' => array(
	                        'label' => esc_html__( 'Style 3', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/game-style/style-3.svg',
	                    ),
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Game Archive Listing Column ======*/
			$wp_customize->add_setting( 'cloux_games_archive_listing_column',
				array(
					'default' => '2',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Range_Value_Control( $wp_customize, 'cloux_games_archive_listing_column', 
				array(
					'label' => esc_html__( 'Listing Column', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_archive_listing_column',
					'type' => 'range-value',
					'description' => esc_html__( 'You can choose listing column for game archive.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
					'input_attrs' => array(
						'min'    => '1',
						'max'    => '4',
						'step'   => '1',
						'suffix' => '',
					),
				)
			) );

			/*====== Media Tab ======*/
			$wp_customize->add_setting( 'cloux_games_media_tab',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_media_tab', 
				array(
					'label' => esc_html__( 'Media Tab', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_media_tab',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide media tab from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== System Requirements ======*/
			$wp_customize->add_setting( 'cloux_games_system_requirements',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_system_requirements', 
				array(
					'label' => esc_html__( 'System Requirements', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_system_requirements',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide game system requirements from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Content Boxes ======*/
			$wp_customize->add_setting( 'cloux_games_content_boxes',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_content_boxes', 
				array(
					'label' => esc_html__( 'Content Boxes', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_content_boxes',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide extra game content boxes from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Price List ======*/
			$wp_customize->add_setting( 'cloux_games_price_list',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_price_list', 
				array(
					'label' => esc_html__( 'Price List', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_price_list',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide price list from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Contact Form Shortcode for Game Sales ======*/
			$wp_customize->add_setting( 'cloux_games_sales_contact_form',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_games_sales_contact_form', 
				array(
					'label' => esc_html__( 'Contact Form for Game Sales', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_sales_contact_form',
					'type' => 'text',
					'description' => esc_html__( 'You can enter a contact form shortcode for game sales.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Game Details ======*/
			$wp_customize->add_setting( 'cloux_games_game_details',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_game_details', 
				array(
					'label' => esc_html__( 'Game Details', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_game_details',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide game details from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Game Poster ======*/
			$wp_customize->add_setting( 'cloux_games_game_poster',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_game_poster', 
				array(
					'label' => esc_html__( 'Poster', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_game_poster',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide game poster from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Game Languages ======*/
			$wp_customize->add_setting( 'cloux_games_game_languages',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_game_languages', 
				array(
					'label' => esc_html__( 'Languages', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_game_languages',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide game languages table from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Game Image Information ======*/
			$wp_customize->add_setting( 'cloux_games_image_information',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_image_information', 
				array(
					'label' => esc_html__( 'Image Information', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_image_information',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide image information list from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Game Reviews ======*/
			$wp_customize->add_setting( 'cloux_games_game_reviews',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_game_reviews', 
				array(
					'label' => esc_html__( 'Reviews', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_game_reviews',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide game reviews table from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Extra Sidebar Boxes ======*/
			$wp_customize->add_setting( 'cloux_games_archive_sidebar_boxes',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_archive_sidebar_boxes', 
				array(
					'label' => esc_html__( 'Extra Sidebar Boxes', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_archive_sidebar_boxes',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide extra sidebar boxes from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Related News ======*/
			$wp_customize->add_setting( 'cloux_games_related_news',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_related_news', 
				array(
					'label' => esc_html__( 'Related News', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_related_news',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide related news from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Related News Count ======*/
			$wp_customize->add_setting( 'cloux_games_related_news_count',
				array(
					'default' => '3',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_games_related_news_count', 
				array(
					'label' => esc_html__( 'Related News Post Count', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_related_news_count',
					'type' => 'number',
					'description' => esc_html__( 'You can enter post count for related news.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Social Share ======*/
			$wp_customize->add_setting( 'cloux_games_share',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_share', 
				array(
					'label' => esc_html__( 'Social Share', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_share',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide social share from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Contact Box ======*/
			$wp_customize->add_setting( 'cloux_games_contact_box',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_contact_box', 
				array(
					'label' => esc_html__( 'Contact Box', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_contact_box',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide contact box from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== General Copyright Text ======*/
			$wp_customize->add_setting( 'cloux_games_general_copyright',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_games_general_copyright', 
				array(
					'label' => esc_html__( 'General Copyright Text', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_general_copyright',
					'type' => 'text',
					'description' => esc_html__( 'You can enter copyright text for sidebar of game single.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Contact Page for Sidebar Button ======*/
			$wp_customize->add_setting( 'cloux_games_contact_page',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_games_contact_page', 
				array(
					'label' => esc_html__( 'Contact Page', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_contact_page',
					'type' => 'dropdown-pages',
					'description' => esc_html__( 'You can choose a contact page for game sidebar.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Report Page for Sidebar Button ======*/
			$wp_customize->add_setting( 'cloux_games_report_page',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_games_report_page', 
				array(
					'label' => esc_html__( 'Report Page', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_report_page',
					'type' => 'dropdown-pages',
					'description' => esc_html__( 'You can choose a report page for game sidebar.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Related Games ======*/
			$wp_customize->add_setting( 'cloux_games_related_games',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_related_games', 
				array(
					'label' => esc_html__( 'Related Games', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_related_games',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide related games from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Related Games Count ======*/
			$wp_customize->add_setting( 'cloux_games_related_games_count',
				array(
					'default' => '3',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( 'cloux_games_related_games_count', 
				array(
					'label' => esc_html__( 'Related Games Game Count', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_related_games_count',
					'type' => 'number',
					'description' => esc_html__( 'You can enter game count for related games.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Comments ======*/
			$wp_customize->add_setting( 'cloux_games_comment',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_games_comment', 
				array(
					'label' => esc_html__( 'Comments', 'cloux' ),
					'section' => 'cloux_games',
					'settings' => 'cloux_games_comment',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide comment field status from game singles.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );



		/*======
		*
		* eSport Players
		*
		======*/
		$wp_customize->add_section( 'cloux_esport_players', 
			array(
				'title' => esc_html__( 'eSport Players', 'cloux' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'eSport players single settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== eSport Player Sidebar Position ======*/
			$wp_customize->add_setting( 'cloux_esport_players_sidebar_position',
				array(
					'default' => 'no-sidebar',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_esport_players_sidebar_position',
	            array(
	                'label'    => esc_html__( 'eSport Player Sidebar Position', 'cloux' ),
					'section' => 'cloux_esport_players',
					'settings' => 'cloux_esport_players_sidebar_position',
					'description' => esc_html__( 'You can choose default sidebar position.', 'cloux' ),
	                'choices'  => array(
	                    'right-sidebar' => array(
	                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
	                    ),
	                    'left-sidebar' => array(
	                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
	                    ),
	                    'no-sidebar' => array(
	                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== eSport Player Sidebar ======*/
			$wp_customize->add_setting( 'cloux_esport_players_sidebar',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_esport_players_sidebar',
	            array(
	                'label'    => esc_html__( 'eSport Player Sidebar', 'cloux' ),
					'section' => 'cloux_esport_players',
					'settings' => 'cloux_esport_players_sidebar',
					'description' => esc_html__( 'You can choose default sidebar.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== eSport Player Image ======*/
			$wp_customize->add_setting( 'cloux_esport_players_image',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_esport_players_image', 
				array(
					'label' => esc_html__( 'eSport Player Image', 'cloux' ),
					'section' => 'cloux_esport_players',
					'settings' => 'cloux_esport_players_image',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose image status.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== eSport Player Share ======*/
			$wp_customize->add_setting( 'cloux_esport_players_share',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_esport_players_share', 
				array(
					'label' => esc_html__( 'Social Share', 'cloux' ),
					'section' => 'cloux_esport_players',
					'settings' => 'cloux_esport_players_share',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose social share status.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== eSport Player Comment ======*/
			$wp_customize->add_setting( 'cloux_esport_players_comment',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_esport_players_comment', 
				array(
					'label' => esc_html__( 'Comments', 'cloux' ),
					'section' => 'cloux_esport_players',
					'settings' => 'cloux_esport_players_comment',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose comment list status.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );



		/*======
		*
		* eSport Fixture
		*
		======*/
		$wp_customize->add_section( 'cloux_esport_fixture', 
			array(
				'title' => esc_html__( 'eSport Fixture', 'cloux' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'eSport fixture single settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== eSport Fixture Sidebar Position ======*/
			$wp_customize->add_setting( 'cloux_esport_fixture_sidebar_position',
				array(
					'default' => 'no-sidebar',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_esport_fixture_sidebar_position',
	            array(
	                'label'    => esc_html__( 'eSport Fixture Sidebar Position', 'cloux' ),
					'section' => 'cloux_esport_fixture',
					'settings' => 'cloux_esport_fixture_sidebar_position',
					'description' => esc_html__( 'You can choose default sidebar position.', 'cloux' ),
	                'choices'  => array(
	                    'right-sidebar' => array(
	                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
	                    ),
	                    'left-sidebar' => array(
	                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
	                    ),
	                    'no-sidebar' => array(
	                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== eSport Fixture Sidebar ======*/
			$wp_customize->add_setting( 'cloux_esport_fixture_sidebar',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_esport_fixture_sidebar',
	            array(
	                'label'    => esc_html__( 'eSport Fixture Sidebar', 'cloux' ),
					'section' => 'cloux_esport_fixture',
					'settings' => 'cloux_esport_fixture_sidebar',
					'description' => esc_html__( 'You can choose default sidebar.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== eSport Fixture Image ======*/
			$wp_customize->add_setting( 'cloux_esport_fixture_image',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_esport_fixture_image', 
				array(
					'label' => esc_html__( 'eSport Fixture Image', 'cloux' ),
					'section' => 'cloux_esport_fixture',
					'settings' => 'cloux_esport_fixture_image',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose image status.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== eSport Fixture Share ======*/
			$wp_customize->add_setting( 'cloux_esport_fixture_share',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_esport_fixture_share', 
				array(
					'label' => esc_html__( 'Social Share', 'cloux' ),
					'section' => 'cloux_esport_fixture',
					'settings' => 'cloux_esport_fixture_share',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose social share status.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== eSport Fixture Comment ======*/
			$wp_customize->add_setting( 'cloux_esport_fixture_comment',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_esport_fixture_comment', 
				array(
					'label' => esc_html__( 'Comments', 'cloux' ),
					'section' => 'cloux_esport_fixture',
					'settings' => 'cloux_esport_fixture_comment',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose comment list status.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );



		/*======
		*
		* Pages
		*
		======*/
		$wp_customize->add_section( 'cloux_pages', 
			array(
				'title' => esc_html__( 'Pages', 'cloux' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'Page settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== Page Sidebar Position ======*/
			$wp_customize->add_setting( 'cloux_pages_sidebar_position',
				array(
					'default' => 'no-sidebar',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_pages_sidebar_position',
	            array(
	                'label'    => esc_html__( 'Page Sidebar Position', 'cloux' ),
					'section' => 'cloux_pages',
					'settings' => 'cloux_pages_sidebar_position',
					'description' => esc_html__( 'You can choose default sidebar position for pages.', 'cloux' ),
	                'choices'  => array(
	                    'right-sidebar' => array(
	                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
	                    ),
	                    'left-sidebar' => array(
	                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
	                    ),
	                    'no-sidebar' => array(
	                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Page Sidebar ======*/
			$wp_customize->add_setting( 'cloux_pages_sidebar',
				array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_pages_sidebar',
	            array(
	                'label'    => esc_html__( 'Page Sidebar', 'cloux' ),
					'section' => 'cloux_pages',
					'settings' => 'cloux_pages_sidebar',
					'description' => esc_html__( 'You can choose default sidebar for pages.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );

			/*====== Page Image ======*/
			$wp_customize->add_setting( 'cloux_pages_image',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_pages_image', 
				array(
					'label' => esc_html__( 'Page Image', 'cloux' ),
					'section' => 'cloux_pages',
					'settings' => 'cloux_pages_image',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose image status of pages.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Page Title ======*/
			$wp_customize->add_setting( 'cloux_pages_title',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_pages_title', 
				array(
					'label' => esc_html__( 'Page Title', 'cloux' ),
					'section' => 'cloux_pages',
					'settings' => 'cloux_pages_title',
					'type' => 'toggle',
					'description' => esc_html__( 'You can hide title from pages.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Page Share ======*/
			$wp_customize->add_setting( 'cloux_pages_share',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_pages_share', 
				array(
					'label' => esc_html__( 'Social Share', 'cloux' ),
					'section' => 'cloux_pages',
					'settings' => 'cloux_pages_share',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose social share status for pages.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );

			/*====== Page Comment ======*/
			$wp_customize->add_setting( 'cloux_pages_comment',
				array(
					'default' => '1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);

			$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_pages_comment', 
				array(
					'label' => esc_html__( 'Comments', 'cloux' ),
					'section' => 'cloux_pages',
					'settings' => 'cloux_pages_comment',
					'type' => 'toggle',
					'description' => esc_html__( 'You can choose comment list status for pages.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				)
			) );



		/*======
		*
		* Archives
		*
		======*/
		$wp_customize->add_panel( 'cloux_archives', array(
			'title' => esc_html__( 'Archives & Categories', 'cloux' ),
			'description' => esc_html__( 'Archive and category settings.', 'cloux' ),
			'priority' => 11,
			'sanitize_callback' => $cloux_santanize,
		) );

			/*====== Category ======*/
			$wp_customize->add_section( 'cloux_archives_categories', 
				array(
					'title' => esc_html__( 'Categories', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'General category archive settings.', 'cloux' ),
					'panel' => 'cloux_archives',
					'sanitize_callback' => $cloux_santanize,
				)
			);

				/*====== Category Sidebar Position ======*/
				$wp_customize->add_setting( 'cloux_archives_categories_sidebar_position',
					array(
						'default' => 'right-sidebar',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_categories_sidebar_position',
		            array(
		                'label'    => esc_html__( 'Sidebar Position', 'cloux' ),
						'section' => 'cloux_archives_categories',
						'settings' => 'cloux_archives_categories_sidebar_position',
						'description' => esc_html__( 'You can choose sidebar position for categories.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
		                    )
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Category Sidebar ======*/
				$wp_customize->add_setting( 'cloux_archives_categories_sidebar',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_archives_categories_sidebar',
		            array(
		                'label'    => esc_html__( 'Sidebar', 'cloux' ),
						'section' => 'cloux_archives_categories',
						'settings' => 'cloux_archives_categories_sidebar',
						'description' => esc_html__( 'You can choose sidebar for categories.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Category Post Style ======*/
				$wp_customize->add_setting( 'cloux_archives_categories_post_style',
					array(
						'default' => 'style-1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_categories_post_style',
		            array(
		                'label'    => esc_html__( 'Post Style', 'cloux' ),
						'section' => 'cloux_archives_categories',
						'settings' => 'cloux_archives_categories_post_style',
						'description' => esc_html__( 'You can choose post style for categories.', 'cloux' ),
		                'choices'  => array(
		                    'style-1' => array(
		                        'label' => esc_html__( 'Style 1', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/post-style/style-1.svg'
		                    ),
		                    'style-2' => array(
		                        'label' => esc_html__( 'Style 2', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/post-style/style-2.svg'
		                    ),
		                    'style-3' => array(
		                        'label' => esc_html__( 'Style 3', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/post-style/style-3.svg'
		                    ),
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Category Title ======*/
				$wp_customize->add_setting( 'cloux_archives_categories_title',
					array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_archives_categories_title', 
					array(
						'label' => esc_html__( 'Category Title', 'cloux' ),
						'section' => 'cloux_archives_categories',
						'settings' => 'cloux_archives_categories_title',
						'type' => 'toggle',
						'description' => esc_html__( 'You can hide title from categories.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
					)
				) );

			/*====== Tag ======*/
			$wp_customize->add_section( 'cloux_archives_tags', 
				array(
					'title' => esc_html__( 'Tags', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'General tag archive settings.', 'cloux' ),
					'panel' => 'cloux_archives',
					'sanitize_callback' => $cloux_santanize,
				)
			);

				/*====== Tag Sidebar Position ======*/
				$wp_customize->add_setting( 'cloux_archives_tags_sidebar_position',
					array(
						'default' => 'right-sidebar',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_tags_sidebar_position',
		            array(
		                'label'    => esc_html__( 'Sidebar Position', 'cloux' ),
						'section' => 'cloux_archives_tags',
						'settings' => 'cloux_archives_tags_sidebar_position',
						'description' => esc_html__( 'You can choose sidebar position for tags.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg',
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg',
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg',
		                    ),
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Tag Sidebar ======*/
				$wp_customize->add_setting( 'cloux_archives_tags_sidebar',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_archives_tags_sidebar',
		            array(
		                'label'    => esc_html__( 'Sidebar', 'cloux' ),
						'section' => 'cloux_archives_tags',
						'settings' => 'cloux_archives_tags_sidebar',
						'description' => esc_html__( 'You can choose sidebar for tags.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Tag Post Style ======*/
				$wp_customize->add_setting( 'cloux_archives_tags_post_style',
					array(
						'default' => 'style-1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_tags_post_style',
		            array(
		                'label'    => esc_html__( 'Post Style', 'cloux' ),
						'section' => 'cloux_archives_tags',
						'settings' => 'cloux_archives_tags_post_style',
						'description' => esc_html__( 'You can choose post style for tags.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg',
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg',
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg',
		                    ),
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Tag Title ======*/
				$wp_customize->add_setting( 'cloux_archives_tags_title',
					array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_archives_tags_title', 
					array(
						'label' => esc_html__( 'Tag Title', 'cloux' ),
						'section' => 'cloux_archives_tags',
						'settings' => 'cloux_archives_tags_title',
						'type' => 'toggle',
						'description' => esc_html__( 'You can hide title from tags.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
					)
				) );

			/*====== Searches ======*/
			$wp_customize->add_section( 'cloux_archives_searches', 
				array(
					'title' => esc_html__( 'Searches', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'General search archive settings.', 'cloux' ),
					'panel' => 'cloux_archives',
					'sanitize_callback' => $cloux_santanize,
				)
			);

				/*====== Search Sidebar Position ======*/
				$wp_customize->add_setting( 'cloux_archives_searches_sidebar_position',
					array(
						'default' => 'right-sidebar',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_searches_sidebar_position',
		            array(
		                'label'    => esc_html__( 'Sidebar Position', 'cloux' ),
						'section' => 'cloux_archives_searches',
						'settings' => 'cloux_archives_searches_sidebar_position',
						'description' => esc_html__( 'You can choose sidebar position for searches.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
		                    )
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Search Sidebar ======*/
				$wp_customize->add_setting( 'cloux_archives_searches_sidebar',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_archives_searches_sidebar',
		            array(
		                'label'    => esc_html__( 'Sidebar', 'cloux' ),
						'section' => 'cloux_archives_searches',
						'settings' => 'cloux_archives_searches_sidebar',
						'description' => esc_html__( 'You can choose sidebar for searches.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Search Post Style ======*/
				$wp_customize->add_setting( 'cloux_archives_searches_post_style',
					array(
						'default' => 'style-1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_searches_post_style',
		            array(
		                'label'    => esc_html__( 'Post Style', 'cloux' ),
						'section' => 'cloux_archives_searches',
						'settings' => 'cloux_archives_searches_post_style',
						'description' => esc_html__( 'You can choose post style for searches.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg',
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg',
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg',
		                    ),
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Search Title ======*/
				$wp_customize->add_setting( 'cloux_archives_searches_title',
					array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_archives_searches_title', 
					array(
						'label' => esc_html__( 'Search Title', 'cloux' ),
						'section' => 'cloux_archives_searches',
						'settings' => 'cloux_archives_searches_title',
						'type' => 'toggle',
						'description' => esc_html__( 'You can hide title from searches.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
					)
				) );

			/*====== Authors ======*/
			$wp_customize->add_section( 'cloux_archives_authors', 
				array(
					'title' => esc_html__( 'Authors', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'General author archive settings.', 'cloux' ),
					'panel' => 'cloux_archives',
					'sanitize_callback' => $cloux_santanize,
				)
			);

				/*====== Author Sidebar Position ======*/
				$wp_customize->add_setting( 'cloux_archives_authors_sidebar_position',
					array(
						'default' => 'right-sidebar',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_authors_sidebar_position',
		            array(
		                'label'    => esc_html__( 'Sidebar Position', 'cloux' ),
						'section' => 'cloux_archives_authors',
						'settings' => 'cloux_archives_authors_sidebar_position',
						'description' => esc_html__( 'You can choose sidebar position for authors.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
		                    )
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Author Sidebar ======*/
				$wp_customize->add_setting( 'cloux_archives_authors_sidebar',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_archives_authors_sidebar',
		            array(
		                'label'    => esc_html__( 'Sidebar', 'cloux' ),
						'section' => 'cloux_archives_authors',
						'settings' => 'cloux_archives_authors_sidebar',
						'description' => esc_html__( 'You can choose sidebar for authors.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Author Post Style ======*/
				$wp_customize->add_setting( 'cloux_archives_authors_post_style',
					array(
						'default' => 'style-1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_authors_post_style',
		            array(
		                'label'    => esc_html__( 'Post Style', 'cloux' ),
						'section' => 'cloux_archives_authors',
						'settings' => 'cloux_archives_authors_post_style',
						'description' => esc_html__( 'You can choose post style for authors.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg',
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg',
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg',
		                    ),
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Author Title ======*/
				$wp_customize->add_setting( 'cloux_archives_authors_title',
					array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_archives_authors_title', 
					array(
						'label' => esc_html__( 'Author Title', 'cloux' ),
						'section' => 'cloux_archives_authors',
						'settings' => 'cloux_archives_authors_title',
						'type' => 'toggle',
						'description' => esc_html__( 'You can hide title from authors.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
					)
				) );

			/*====== Archives ======*/
			$wp_customize->add_section( 'cloux_archives_archives', 
				array(
					'title' => esc_html__( 'Archives', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'General archive settings.', 'cloux' ),
					'panel' => 'cloux_archives',
					'sanitize_callback' => $cloux_santanize,
				)
			);

				/*====== Archives Sidebar Position ======*/
				$wp_customize->add_setting( 'cloux_archives_archives_sidebar_position',
					array(
						'default' => 'right-sidebar',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_archives_sidebar_position',
		            array(
		                'label'    => esc_html__( 'Sidebar Position', 'cloux' ),
						'section' => 'cloux_archives_archives',
						'settings' => 'cloux_archives_archives_sidebar_position',
						'description' => esc_html__( 'You can choose sidebar position for archives.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
		                    )
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Archives Sidebar ======*/
				$wp_customize->add_setting( 'cloux_archives_archives_sidebar',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_archives_archives_sidebar',
		            array(
		                'label'    => esc_html__( 'Sidebar', 'cloux' ),
						'section' => 'cloux_archives_archives',
						'settings' => 'cloux_archives_archives_sidebar',
						'description' => esc_html__( 'You can choose sidebar for archives.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Archives Post Style ======*/
				$wp_customize->add_setting( 'cloux_archives_archives_post_style',
					array(
						'default' => 'style-1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_archives_post_style',
		            array(
		                'label'    => esc_html__( 'Post Style', 'cloux' ),
						'section' => 'cloux_archives_archives',
						'settings' => 'cloux_archives_archives_post_style',
						'description' => esc_html__( 'You can choose post style for archives.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg',
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg',
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg',
		                    ),
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Archives Title ======*/
				$wp_customize->add_setting( 'cloux_archives_archives_title',
					array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_archives_archives_title', 
					array(
						'label' => esc_html__( 'Archives Title', 'cloux' ),
						'section' => 'cloux_archives_archives',
						'settings' => 'cloux_archives_archives_title',
						'type' => 'toggle',
						'description' => esc_html__( 'You can hide title from archives.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
					)
				) );

			/*====== Attachments ======*/
			$wp_customize->add_section( 'cloux_archives_attachments', 
				array(
					'title' => esc_html__( 'Attachments', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'General attachment archive settings.', 'cloux' ),
					'panel' => 'cloux_archives',
					'sanitize_callback' => $cloux_santanize,
				)
			);

				/*====== Attachments Sidebar Position ======*/
				$wp_customize->add_setting( 'cloux_archives_attachments_sidebar_position',
					array(
						'default' => 'no-sidebar',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_archives_attachments_sidebar_position',
		            array(
		                'label'    => esc_html__( 'Sidebar Position', 'cloux' ),
						'section' => 'cloux_archives_attachments',
						'settings' => 'cloux_archives_attachments_sidebar_position',
						'description' => esc_html__( 'You can choose sidebar position for attachments.', 'cloux' ),
		                'choices'  => array(
		                    'right-sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
		                    ),
		                    'left-sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
		                    ),
		                    'no-sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
		                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
		                    )
		                ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Attachments Sidebar ======*/
				$wp_customize->add_setting( 'cloux_archives_attachments_sidebar',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);
				
			    $wp_customize->add_control( new Cloux_Sidebar_Dropdown_Custom_Control(  $wp_customize, 'cloux_archives_attachments_sidebar',
		            array(
		                'label'    => esc_html__( 'Sidebar', 'cloux' ),
						'section' => 'cloux_archives_attachments',
						'settings' => 'cloux_archives_attachments_sidebar',
						'description' => esc_html__( 'You can choose sidebar for attachments.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
		            )
		        ) );

				/*====== Attachments Title ======*/
				$wp_customize->add_setting( 'cloux_archives_attachments_title',
					array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_archives_attachments_title', 
					array(
						'label' => esc_html__( 'Attachments Title', 'cloux' ),
						'section' => 'cloux_archives_attachments',
						'settings' => 'cloux_archives_attachments_title',
						'type' => 'toggle',
						'description' => esc_html__( 'You can hide title from attachments.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
					)
				) );

				/*====== Attachments Share ======*/
				$wp_customize->add_setting( 'cloux_archives_attachments_share',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_archives_attachments_share', 
					array(
						'label' => esc_html__( 'Attachments Share', 'cloux' ),
						'section' => 'cloux_archives_attachments',
						'settings' => 'cloux_archives_attachments_share',
						'type' => 'toggle',
						'description' => esc_html__( 'You can hide share buttons from attachments.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
					)
				) );

				/*====== Attachments Share ======*/
				$wp_customize->add_setting( 'cloux_archives_attachments_comment',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => $cloux_transport,
						'sanitize_callback' => $cloux_santanize,
					)
				);

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, 'cloux_archives_attachments_comment', 
					array(
						'label' => esc_html__( 'Attachments Comment', 'cloux' ),
						'section' => 'cloux_archives_attachments',
						'settings' => 'cloux_archives_attachments_comment',
						'type' => 'toggle',
						'description' => esc_html__( 'You can hide comment field status from attachments.', 'cloux' ),
						'sanitize_callback' => $cloux_santanize,
					)
				) );



		/*======
		*
		* WooCommerce
		*
		======*/
		$wp_customize->add_panel( 'woocommerce', 
			array(
				'title' => esc_html__( 'WooCommerce', 'cloux' ),
				'priority' => 10,
				'description' => esc_html__( 'WooCommerce settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== Page WooCommerce Sidebar ======*/
			$wp_customize->add_section( 'cloux_woocommerce_sidebar', 
				array(
					'title' => esc_html__( 'WooCommerce Sidebar', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'WooCommerce sidebar settings.', 'cloux' ),
					'panel' => 'woocommerce',
					'sanitize_callback' => $cloux_santanize,
				)
			);

			/*====== Page Sidebar Position ======*/
			$wp_customize->add_setting( 'cloux_woo_sidebar_position',
				array(
					'default' => 'no-sidebar',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_woo_sidebar_position',
	            array(
					'section' => 'cloux_woocommerce_sidebar',
	                'label'    => esc_html__( 'WooCommerce Sidebar Position', 'cloux' ),
					'settings' => 'cloux_woo_sidebar_position',
					'description' => esc_html__( 'You can choose sidebar position for WooCommerce.', 'cloux' ),
	                'choices'  => array(
	                    'right-sidebar' => array(
	                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
	                    ),
	                    'left-sidebar' => array(
	                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
	                    ),
	                    'no-sidebar' => array(
	                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );



		/*======
		*
		* bbPress
		*
		======*/
		$wp_customize->add_section( 'cloux_bbpress', 
			array(
				'title' => esc_html__( 'bbPress', 'cloux' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'description' => esc_html__( 'bbPress settings.', 'cloux' ),
				'sanitize_callback' => $cloux_santanize,
			)
		);

			/*====== Page Sidebar Position ======*/
			$wp_customize->add_setting( 'cloux_bbpress_sidebar_position',
				array(
					'default' => 'no-sidebar',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				)
			);
			
		    $wp_customize->add_control( new Cloux_Customize_Control_Radio_Image(  $wp_customize, 'cloux_bbpress_sidebar_position',
	            array(
	                'label'    => esc_html__( 'bbPress Sidebar Position', 'cloux' ),
					'section' => 'cloux_bbpress',
					'settings' => 'cloux_bbpress_sidebar_position',
					'description' => esc_html__( 'You can choose sidebar position for bbPress.', 'cloux' ),
	                'choices'  => array(
	                    'right-sidebar' => array(
	                        'label' => esc_html__( 'Right Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/right-sidebar.svg'
	                    ),
	                    'left-sidebar' => array(
	                        'label' => esc_html__( 'Left Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/left-sidebar.svg'
	                    ),
	                    'no-sidebar' => array(
	                        'label' => esc_html__( 'No Sidebar', 'cloux' ),
	                        'url'   => '%s/include/customize/assets/img/sidebar/no-sidebar.svg'
	                    )
	                ),
					'sanitize_callback' => $cloux_santanize,
	            )
	        ) );



		/*======
		*
		* Social Media
		*
		======*/
		$wp_customize->add_panel( 'cloux_social_media', array(
			'title' => esc_html__( 'Social Media', 'cloux' ),
			'description' => esc_html__( 'Social media settings.', 'cloux' ),
			'priority' => 12,
			'sanitize_callback' => $cloux_santanize,
		) );

			/*====== Social Links ======*/
			$social_sites = cloux_social_media_array_filter();
			$wp_customize->add_section( 'cloux_social_media_links', 
				array(
					'title' => esc_html__( 'Social Links', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'Social link settings.', 'cloux' ),
					'panel' => 'cloux_social_media',
					'sanitize_callback' => $cloux_santanize,
				)
			);

			foreach ( $social_sites as $social_site => $value ) {
				$label = ucfirst( $social_site );
				if ( $social_site == 'twitter' ) {
					$label = esc_html__( 'Twitter', 'cloux' );
				} elseif ( $social_site == 'facebook' ) {
					$label = esc_html__( 'Facebook', 'cloux' );
				} elseif ( $social_site == 'google-plus' ) {
					$label = esc_html__( 'Google Plus', 'cloux' );
				} elseif ( $social_site == 'pinterest' ) {
					$label = esc_html__( 'Pinterest', 'cloux' );
				} elseif ( $social_site == 'youtube' ) {
					$label = esc_html__( 'YouTube', 'cloux' );
				} elseif ( $social_site == 'vimeo' ) {
					$label = esc_html__( 'Vimeo', 'cloux' );
				} elseif ( $social_site == 'tumblr' ) {
					$label = esc_html__( 'Tumblr', 'cloux' );
				} elseif ( $social_site == 'instagram' ) {
					$label = esc_html__( 'Instagram', 'cloux' );
				} elseif ( $social_site == 'flickr' ) {
					$label = esc_html__( 'Flickr', 'cloux' );
				} elseif ( $social_site == 'dribbble' ) {
					$label = esc_html__( 'Dribbble', 'cloux' );
				} elseif ( $social_site == 'reddit' ) {
					$label = esc_html__( 'Reddit', 'cloux' );
				} elseif ( $social_site == 'soundcloud' ) {
					$label = esc_html__( 'SoundCloud', 'cloux' );
				} elseif ( $social_site == 'spotify' ) {
					$label = esc_html__( 'Spotify', 'cloux' );
				} elseif ( $social_site == 'yahoo' ) {
					$label = esc_html__( 'Yahoo', 'cloux' );
				} elseif ( $social_site == 'behance' ) {
					$label = esc_html__( 'Behance', 'cloux' );
				} elseif ( $social_site == 'delicious' ) {
					$label = esc_html__( 'Delicious', 'cloux' );
				} elseif ( $social_site == 'stumbleupon' ) {
					$label = esc_html__( 'Stumbleupon', 'cloux' );
				} elseif ( $social_site == 'deviantart' ) {
					$label = esc_html__( 'DeviantArt', 'cloux' );
				} elseif ( $social_site == 'digg' ) {
					$label = esc_html__( 'Digg', 'cloux' );
				} elseif ( $social_site == 'github' ) {
					$label = esc_html__( 'GitHub', 'cloux' );
				} elseif ( $social_site == 'medium' ) {
					$label = esc_html__( 'Medium', 'cloux' );
				} elseif ( $social_site == 'steam' ) {
					$label = esc_html__( 'Steam', 'cloux' );
				} elseif ( $social_site == 'vk' ) {
					$label = esc_html__( 'VK', 'cloux' );
				} elseif ( $social_site == '500px' ) {
					$label = esc_html__( '500px', 'cloux' );
				} elseif ( $social_site == 'foursquare' ) {
					$label = esc_html__( 'Foursquare', 'cloux' );
				} elseif ( $social_site == 'slack' ) {
					$label = esc_html__( 'Slack', 'cloux' );
				} elseif ( $social_site == 'whatsapp' ) {
					$label = esc_html__( 'WhatsApp', 'cloux' );
				} elseif ( $social_site == 'twitch' ) {
					$label = esc_html__( 'Twitch', 'cloux' );
				} elseif ( $social_site == 'paypal' ) {
					$label = esc_html__( 'PayPal', 'cloux' );
				} elseif ( $social_site == 'rss' ) {
					$label = esc_html__( 'RSS', 'cloux' );
				} elseif ( $social_site == 'codepen' ) {
					$label = esc_html__( 'CodePen', 'cloux' );
				} elseif ( $social_site == 'custom-url' ) {
					$label = esc_html__( 'Custom URL', 'cloux' );
				}

				$wp_customize->add_setting( $social_site, array(
					'sanitize_callback' => 'esc_url_raw',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				) );

				$wp_customize->add_control( $social_site, array(
					'type' => 'url',
					'label' => $label,
					'section' => 'cloux_social_media_links',
					'settings' => $social_site,
					'description' => esc_html__( 'You can enter URL.', 'cloux' ),
					'sanitize_callback' => $cloux_santanize,
				) );

				$wp_customize->add_setting( $social_site . '-target', array(
					'sanitize_callback' => 'esc_url_raw',
					'type' => 'theme_mod',
					'default' => '',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				) );

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, $social_site . '-target', 
					array(
						'label' => esc_html__( 'Open with New Tab', 'cloux' ),
						'section' => 'cloux_social_media_links',
						'settings' => $social_site . '-target',
						'type' => 'toggle',
						'sanitize_callback' => $cloux_santanize,
					)
				) );
			}

			/*====== Social Links ======*/
			$social_shares = cloux_social_share_array_filter();
			$wp_customize->add_section( 'cloux_social_share', 
				array(
					'title' => esc_html__( 'Social Share', 'cloux' ),
					'priority' => 1,
					'capability' => 'edit_theme_options',
					'description' => esc_html__( 'Social share settings.', 'cloux' ),
					'panel' => 'cloux_social_media',
					'sanitize_callback' => $cloux_santanize,
				)
			);

			foreach ( $social_shares as $social_share => $value ) {
				$label = ucfirst( $social_share );
				if ( $social_share == 'twitter' ) {
					$label = esc_html__( 'Twitter', 'cloux' );
				} elseif ( $social_share == 'facebook' ) {
					$label = esc_html__( 'Facebook', 'cloux' );
				} elseif ( $social_share == 'google-plus' ) {
					$label = esc_html__( 'Google Plus', 'cloux' );
				} elseif ( $social_share == 'pinterest' ) {
					$label = esc_html__( 'Pinterest', 'cloux' );
				} elseif ( $social_share == 'youtube' ) {
					$label = esc_html__( 'YouTube', 'cloux' );
				} elseif ( $social_share == 'vimeo' ) {
					$label = esc_html__( 'Vimeo', 'cloux' );
				} elseif ( $social_share == 'tumblr' ) {
					$label = esc_html__( 'Tumblr', 'cloux' );
				} elseif ( $social_share == 'instagram' ) {
					$label = esc_html__( 'Instagram', 'cloux' );
				} elseif ( $social_share == 'flickr' ) {
					$label = esc_html__( 'Flickr', 'cloux' );
				} elseif ( $social_share == 'dribbble' ) {
					$label = esc_html__( 'Dribbble', 'cloux' );
				} elseif ( $social_share == 'reddit' ) {
					$label = esc_html__( 'Reddit', 'cloux' );
				} elseif ( $social_share == 'soundcloud' ) {
					$label = esc_html__( 'SoundCloud', 'cloux' );
				} elseif ( $social_share == 'spotify' ) {
					$label = esc_html__( 'Spotify', 'cloux' );
				} elseif ( $social_share == 'yahoo' ) {
					$label = esc_html__( 'Yahoo', 'cloux' );
				} elseif ( $social_share == 'behance' ) {
					$label = esc_html__( 'Behance', 'cloux' );
				} elseif ( $social_share == 'delicious' ) {
					$label = esc_html__( 'Delicious', 'cloux' );
				} elseif ( $social_share == 'stumbleupon' ) {
					$label = esc_html__( 'Stumbleupon', 'cloux' );
				} elseif ( $social_share == 'deviantart' ) {
					$label = esc_html__( 'DeviantArt', 'cloux' );
				} elseif ( $social_share == 'digg' ) {
					$label = esc_html__( 'Digg', 'cloux' );
				} elseif ( $social_share == 'github' ) {
					$label = esc_html__( 'GitHub', 'cloux' );
				} elseif ( $social_share == 'medium' ) {
					$label = esc_html__( 'Medium', 'cloux' );
				} elseif ( $social_share == 'steam' ) {
					$label = esc_html__( 'Steam', 'cloux' );
				} elseif ( $social_share == 'vk' ) {
					$label = esc_html__( 'VK', 'cloux' );
				} elseif ( $social_share == '500px' ) {
					$label = esc_html__( '500px', 'cloux' );
				} elseif ( $social_share == 'foursquare' ) {
					$label = esc_html__( 'Foursquare', 'cloux' );
				} elseif ( $social_share == 'slack' ) {
					$label = esc_html__( 'Slack', 'cloux' );
				} elseif ( $social_share == 'whatsapp' ) {
					$label = esc_html__( 'WhatsApp', 'cloux' );
				} elseif ( $social_share == 'twitch' ) {
					$label = esc_html__( 'Twitch', 'cloux' );
				} elseif ( $social_share == 'paypal' ) {
					$label = esc_html__( 'PayPal', 'cloux' );
				} elseif ( $social_share == 'rss' ) {
					$label = esc_html__( 'RSS', 'cloux' );
				} elseif ( $social_share == 'codepen' ) {
					$label = esc_html__( 'CodePen', 'cloux' );
				}

				$wp_customize->add_setting( $social_share . '_share', array(
					'sanitize_callback' => 'esc_url_raw',
					'type' => 'theme_mod',
					'default' => '',
					'capability' => 'edit_theme_options',
					'transport' => $cloux_transport,
					'sanitize_callback' => $cloux_santanize,
				) );

				$wp_customize->add_control( new Cloux_Customizer_Toggle_Control( $wp_customize, $social_share . '_share', 
					array(
						'label' => $label . ' ' . esc_html__( 'Share', 'cloux' ),
						'section' => 'cloux_social_share',
						'settings' => $social_share . '_share',
						'type' => 'toggle',
						'sanitize_callback' => $cloux_santanize,
					)
				) );
			}
	}
	add_action( 'customize_register', 'cloux_customizer' );