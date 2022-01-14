<?php
/*======
*
* Font URLs
*
======*/
	function cloux_fonts_url() {
		$custom_font_list = array();

		/*====== Customize Variables ======*/
		$latin_extended = get_theme_mod( 'cloux_typography_latin_extended' );
		$cyrillic_extended = get_theme_mod( 'cloux_typography_cyrillic_extended' );
		$greek_extended = get_theme_mod( 'cloux_typography_greek_extended' );
		$font_weights = get_theme_mod( 'cloux_font_weights' );

		/*====== Weights ======*/
		if( !empty( $font_weights ) ) {
			$weights = ':' . $font_weights;
		} else {
			$weights = ":100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic";			
		}

		/*====== Theme Fonts ======*/
		$main_font = get_theme_mod( 'cloux_typography_main_font' );
		$alternative_font = get_theme_mod( 'cloux_typography_alternative_font' );

		if( !empty( $main_font ) ) {
			$custom_font_list[] = $main_font;
		} else {
			$custom_font_list[] = "Poppins";
		}

		if( !empty( $alternative_font ) ) {
			$custom_font_list[] = $alternative_font;
		} else {
			$custom_font_list[] = "Titillium Web";
		}

		if( !empty( $custom_font_list ) ) {
			$custom_font_list = array_unique( $custom_font_list );
			$prefixed_array = preg_filter( '/$/', $weights, $custom_font_list );
			if( !empty( $prefixed_array ) ) {
				$prefixed_imp = implode( '|', $prefixed_array );
				$font_names = rtrim( $prefixed_imp, '|' );				
			}
		}

		/*====== Subsets ======*/
		$subsets = array( "latin" );
		if( !empty( $latin_extended ) or $latin_extended == "1" ) {
			$subsets[] = "latin-ext";
		}

		if( !empty( $cyrillic_extended ) or $cyrillic_extended == "1" ) {
			$subsets[] = "cyrillic";
			$subsets[] = "cyrillic-ext";
		}

		if( !empty( $greek_extended ) or $greek_extended == "1" ) {
			$subsets[] = "greek";
			$subsets[] = "greek-ext";
		}

		if( !empty( $subsets ) ) {
			$subset_list = rtrim( implode( ',', $subsets ), ',' );
		}

		/*====== Font URL ======*/
		$font_url = '';
		$font_url = add_query_arg( 'family', urlencode( $font_names . '&subset=' . $subset_list . '' ), "//fonts.googleapis.com/css" );

		return $font_url;
	}

	function cloux_fonts_scripts() {
		wp_enqueue_style( 'cloux-fonts', cloux_fonts_url(), array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'cloux_fonts_scripts' );



/*======
*
* Typography Selector
*
======*/
	function cloux_font_selector( $class = "", $family = "", $default = "" ) {
		if( !empty( $class ) and !empty( $family ) or  !empty( $default ) ) {
			if( !empty( $family ) and !empty( get_theme_mod( $family ) ) ) {
				$setting = get_theme_mod( $family );
			} else {
				$setting = $default;
			}

			if( $setting ) {
				$custom_style = $class . "{ font-family: '" . $setting . "'; }";
				return $custom_style;
			}
		}
	}

	function cloux_custom_fonts() {
		wp_enqueue_style( 'cloux-custom', get_template_directory_uri() . '/include/assets/css/custom.css', array(), '1.0.0' );
		wp_add_inline_style( 'cloux-custom', cloux_font_selector( 'body, .cloux-title.style-3, .cloux-theme.wpb-js-composer .vc_tta.vc_general .vc_tta-panel-title', 'cloux_typography_main_font', 'Poppins' ) );	
		wp_add_inline_style( 'cloux-custom', cloux_font_selector( 'h1, h2, h3, h4, h5, h6, .logo .site-logo-texted, .cloux-title, .post-style-1 .title, .post-style-2 .title, .post-style-3 .title, .cloux-comments .comment-list ol li .comment-content .comment-author, .post-review ul.main-review > li > .content > .text > .title, .game-review > ul > li .wrap .title, .game-price-item .title, .cloux-game-slider .title, .game-style-1 .content .title, .banner-box .main-title, .game-style-2 .content .title, .game-style-3 .content .title, .cloux-mailchimp.style-1 .title, .cloux-mailchimp.style-2 .title, .cloux-content-box .title, .cloux-game-search.style-1 .title, .cloux-game-search.style-2 .title, .cloux-game-search.style-3 .title, .product-style-1 .title, .product-style-2 .title, .cloux-game-carousel .wrap .title, .cloux-content-slider .title, .cloux-character-box .characters > .item > .image .name, .cloux-character-box .characters > .item .cloux-modal .name, .cloux-achievement-list.style-1 .number, .cloux-achievement-list.style-2 .number, .cloux-achievement-list.style-1 .content .title, .cloux-achievement-list.style-2 .content .title, .cloux-achievement-list.style-3 .content .title, .cloux-achievement-list.style-4, .cloux-esport-players .player-list > .item > .image .username-wrapper, .cloux-esport-players .player-list > .item .cloux-modal .username, .fixture.fixture-style-1  > .wrap > .left > .games ul, .fixture.fixture-style-1  > .wrap > .left > .title, .fixture.fixture-style-1  > .wrap > .left > .links, .fixture.fixture-style-1  > .wrap > .right > .score-date > .score, .fixture.fixture-style-1  > .wrap > .right > .team, .esport-player-single-username, .woocommerce div.product .comment-reply-title, .cloux-service-box .title', 'cloux_typography_alternative_font', 'Titillium Web' ) );	
	}
	add_action( 'wp_enqueue_scripts', 'cloux_custom_fonts' );



/*======
*
* Custom Selector
*
======*/
	function cloux_custom_selector( $class = "", $property = "", $setting = "", $measurement = '' ) {
		if( !empty( $class ) and !empty( $setting ) ) {
			if( get_theme_mod( $setting ) ) {
				$custom_style = $class . '{ ' . $property . ': ' . get_theme_mod( $setting ) . $measurement . '; }';
				return $custom_style;
			}
		}
	}

	function cloux_custom_selectors() {
		wp_enqueue_style( 'cloux-custom', get_template_directory_uri() . '/include/assets/css/custom.css', array(), '1.0.0' );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.post-style-1.sticky-post:after, .post-style-2.sticky-post:after, .post-style-3.sticky-post:after, .post-style-4.sticky-post:after, .cloux-mobile-header > .mobile-sidebar > .content-wrapper .elements .user-box, .cloux-social-links.style-3 ul li a, .cloux-social-links.style-3 ul li a:visited, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > a:hover, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > a:focus, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > span > a:hover, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > span > a:focus, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li.current a, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li.current a:visited, .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a:visited, .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce .woocommerce-MyAccount-navigation ul li a:focus, .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:focus, .woocommerce span.onsale, .bbp-pagination-links > span.current, .bbp-pagination-links > a:hover, .bbp-pagination-links > a:focus, #bbpress-forums > #subscription-toggle a:focus, #bbpress-forums > #subscription-toggle a:hover, #bbpress-forums li.bbp-header, .cloux-content-slider.style-2 .slick-dots li.slick-active button, .cloux-content-slider.style-2 .slick-dots li button:hover, .cloux-content-slider.style-2 .slick-dots li button:focus, .cloux-video-carousel .slick-dots li.slick-active button, .cloux-video-carousel .slick-dots li button:hover, .cloux-video-carousel .slick-dots li button:focus, .cloux-esport-players .player-list > .item > .image .username, .cloux-character-box .characters > .item > .image .name, .cloux-game-search.style-1:before, .cloux-app-box.style-1 ul li a:hover, .cloux-app-box.style-1 ul li a:focus, .cloux-app-box.style-2 ul li a:hover, .cloux-app-box.style-2 ul li a:focus, .cloux-content-box .popup.style-1 .wrap, .cloux-content-box.style-3:before, .cloux-mailchimp.style-1:before, .game-style-2 .wrap .poster:before, .cloux-button.style-3 a:before, .cloux-button.style-3 a:visited:before, .game-media .media-tabs li a:focus, .game-media .media-tabs li a:hover, .game-media .media-tabs li a.active, .game-media .media-tabs li a.active:visited, .cloux-tabs > li > a:focus, .cloux-tabs > li > a:hover, .cloux-tabs > li > a.active, .cloux-tabs > li > a.active:visited, .post-review > ul.review > li > ul.items > li > .cloux-progress-bar .cloux-progress, .post-review > ul.review > li > .content > .score:hover, .post-review > ul.review > li > .content > .score:focus, .single-content-wrapper .post-navigation ul li.previous, .single-content-wrapper .social-share .social-share-links li:hover, .single-content-wrapper .social-share .social-share-links li:focus, .single-content-wrapper .single-content .post-pages > a:hover > span, .single-content-wrapper .single-content .post-pages > a:focus > span, .single-content-wrapper .single-content .post-tags > ul > li a:hover, .single-content-wrapper .single-content .post-tags > ul > li a:focus, .cloux-game-carousel .slick-dots li.slick-active button, .cloux-game-carousel .slick-dots li button:hover, .cloux-game-carousel .slick-dots li button:focus, .featured-gallery .slick-dots li.slick-active button, .featured-gallery .slick-dots li button:hover, .featured-gallery .slick-dots li button:focus, .widget_tag_cloud a:hover, .widget_tag_cloud a:focus, .navigation.comment-navigation div a:focus, .navigation.comment-navigation div a:hover, .post-pagination.style-1 ul li > a:focus, .post-pagination.style-1 ul li > a:hover, .cloux-button.style-1 a:hover, .cloux-button.style-1 a:focus, .hover-color-b, .modal-color-b, .custom-file-control::before, button, input[type="submit"], .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .cloux-close:focus, .cloux-close:hover, .cloux-header .elements .user-box, .loader-style-4 .sk-fading-circle .sk-circle:before, .loader-style-3 .spinner, .loader-style-2 .spinner > div, .loader-style-1 .double-bounce1, .loader-style-1 .double-bounce2', 'background-color', 'cloux_theme_main_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.error404 .error404-content i, .cloux-mobile-header > .mobile-sidebar > .content-wrapper .elements .social-links li a:focus, .cloux-mobile-header > .mobile-sidebar > .content-wrapper .elements .social-links li a:hover, .cloux-icon-list > ul > li > i, .cloux-contact-box > .contact-row > a:focus, .cloux-contact-box > .contact-row > a:hover, .cloux-contact-box > .contact-row > i, .cloux-service-box .title, .cloux-service-box i, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > a, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > a:visited, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > span > a, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > span > a:visited, .woocommerce .woocommerce-MyAccount-navigation ul li a, .woocommerce .woocommerce-MyAccount-navigation ul li a:visited, .select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[data-selected], .select2-container--default .select2-results__option[aria-selected=true], .select2-container--default .select2-results__option[data-selected=true], .woocommerce-error::before, .woocommerce-info::before, .woocommerce-message::before, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li a:visited, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:visited, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price, .esport-player-single-social-links ul li a:focus, .esport-player-single-social-links ul li a:hover, .bbp-pagination-links > a, .bbp-pagination-links > a:visited, span.bbp-admin-links a:focus, span.bbp-admin-links a:hover, #bbpress-forums > #subscription-toggle a, #bbpress-forums > #subscription-toggle a:visited, .cloux-page-banner .cloux-breadcrumb > ul > li.current-item, .cloux-page-banner .cloux-breadcrumb > ul > li.current-item a, .cloux-page-banner .cloux-breadcrumb > ul > li.current-item a:visited, .cloux-page-banner .cloux-breadcrumb > ul > li a:focus, .cloux-page-banner .cloux-breadcrumb > ul > li a:hover, .fixture-style-1 > .wrap > .right > .team, .fixture-style-1 > .wrap > .left > .links > a:hover, .fixture-style-1 > .wrap > .left > .links > a:focus, .fixture-style-1 > .wrap > .left > .games ul, .fixture-style-1 > .wrap > .left > .games ul a, .fixture-style-1 > .wrap > .left > .games ul a:visited, .fixture-style-2 > .wrap > .right > .team, .fixture-style-2 > .wrap > .left > .links > a:hover, .fixture-style-2 > .wrap > .left > .links > a:focus, .fixture-style-2 > .wrap > .left > .games ul, .fixture-style-2 > .wrap > .left > .games ul a, .fixture-style-2 > .wrap > .left > .games ul a:visited, .cloux-esport-players .player-list > .item .cloux-modal .social-links ul li a:hover, .cloux-esport-players .player-list > .item .cloux-modal .social-links ul li a:focus, .cloux-esport-players .player-list > .item .cloux-modal .username span, .cloux-achievement-list.style-1 .number, .cloux-achievement-list.style-2 .number, .cloux-achievement-list.style-3 .number, .cloux-achievement-list.style-4 .number, .cloux-achievement-list.style-1 .content .title, .cloux-achievement-list.style-2 .content .title, .cloux-achievement-list.style-3 .content .title, .cloux-achievement-list.style-4 .content .title, .cloux-content-slider .title span, .product-style-2 .woo-product-price, .product-style-1 .woo-product-price, .cloux-game-search.style-1 .items button, .cs-select ul li:hover, .cs-select ul li:focus, .cs-select > span::after, .cloux-social-links.style-1 ul li a:hover span, .cloux-social-links.style-1 ul li a:focus span, .cloux-footer .copyright .copyright-menu li a:hover, .cloux-footer .copyright .copyright-menu li a:focus, .cloux-footer .copyright .copyright-menu li.current-menu-item a, .cloux-footer .copyright .copyright-menu li.current-menu-item a:visited, .cloux-footer.style-1 .post-details.style-1 ul a:focus, .cloux-footer.style-1 .post-details.style-1 ul a:hover, .cloux-footer.style-1 a:focus, .cloux-footer.style-1 a:hover, .cloux-social-links.style-1 ul li i, .cloux-content-box .title > span, .cloux-mailchimp.style-1 .cloux-newsletter > .button > button, .cloux-mailchimp.style-1 .cloux-newsletter > .button > input, .cloux-mailchimp.style-2 .cloux-newsletter > .button > button, .cloux-mailchimp.style-2 .cloux-newsletter > .button > input, .game-style-2 .game-details.style-1 a:focus, .game-style-2 .game-details.style-1 a:hover, .cloux-button.style-3 a, .cloux-button.style-3 a:visited, .banner-box .top-title, .post-review .cloux-star-review .cloux-star-review-skill, .related-games .related-games-slider .slick-arrow:hover, .related-games .related-games-slider .slick-arrow:focus, .game-style-1 .poster .genre i, .game-details.style-1 a:focus, .game-details.style-1 a:hover, .game-details.style-1 > li > i, .game-review > ul > li .wrap .point, .game-language ul > li a:focus, .game-language ul > li a:hover, .game-language ul > li.status i, .game-language ul > li.title, .game-details-box a:focus, .game-details-box a:hover, .game-details-box > ul > li > .title i, .game-media .media-tabs li a, .game-media .media-tabs li a:visited, .system-requirements .tab-content .list-name, .cloux-tabs > li > a, .cloux-tabs > li > a:visited, .post-analysis > ul > li > ul > li > ul > li > i, .post-review > ul.review > li > .content > .score, blockquote:before, .cloux-comments .comment-list > ol li .comment-info > .item a:focus, .cloux-comments .comment-list > ol li .comment-info > .item a:hover, .cloux-comments .comment-list > ol li .comment-info > .item i, .cloux-comments .comment-list > ol li .comment-content .comment-author, .single-content-wrapper .post-navigation ul li.next a, .single-content-wrapper .post-navigation ul li.next a:visited, .single-content-wrapper .post-author .content .author-site:focus, .single-content-wrapper .post-author .content .author-site:hover, .single-content-wrapper .post-author .user-social-links ul li a:focus, .single-content-wrapper .post-author .user-social-links ul li a:hover, .widget_tag_cloud a, .widget_tag_cloud a:visited, .navigation.comment-navigation div a, .navigation.comment-navigation div a:visited, .post-pagination.style-1 ul li > a, .post-pagination.style-1 ul li > a:visited, .post-pagination.style-1 ul li > span, .post-details.style-1 ul a:focus, .post-details.style-1 ul a:hover, .cloux-button.style-1 a, .cloux-button.style-1 a:visited, .cloux-button.style-2 a:hover, .cloux-button.style-2 a:focus, .post-details.style-1 ul li i, .cloux-header .cloux-navbar.style-1 .navbar-menu .dropdown-menu .nav-link:hover, .cloux-header .cloux-navbar.style-1 .navbar-menu .dropdown-menu .nav-link:focus, .cloux-header .cloux-navbar.style-1 .navbar-menu .dropdown-menu li.active .nav-link:hover, .cloux-header .cloux-navbar.style-1 .navbar-menu .dropdown-menu li.active .nav-link:focus, .cloux-header.style-1 .elements .social-links li a:focus, .cloux-header.style-1 .elements .social-links li a:hover, .cloux-header.style-2 .elements .social-links li a:focus, .cloux-header.style-2 .elements .social-links li a:hover, .cloux-header.style-3 .elements .social-links li a:focus, .cloux-header.style-3 .elements .social-links li a:hover, .cloux-header.style-4 .elements .social-links li a:focus, .cloux-header.style-4 .elements .social-links li a:hover, .cloux-header.style-5 .elements .social-links li a:focus, .cloux-header.style-5 .elements .social-links li a:hover, .cloux-header.style-1 .elements .search > i:focus, .cloux-header.style-1 .elements .search > i:hover, .cloux-header.style-2 .elements .search > i:focus, .cloux-header.style-2 .elements .search > i:hover, .cloux-header.style-3 .elements .search > i:focus, .cloux-header.style-3 .elements .search > i:hover, .cloux-header.style-4 .elements .search > i:focus, .cloux-header.style-4 .elements .search > i:hover, .cloux-header.style-5 .elements .search > i:focus, .cloux-header.style-5 .elements .search > i:hover, .cloux-header.style-1 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:focus, .cloux-header.style-1 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:hover, .cloux-header.style-1 .cloux-navbar.style-1 .navbar-menu li:hover > .nav-link, .cloux-header.style-1 .cloux-navbar.style-1 .navbar-menu li:focus > .nav-link:visited, .cloux-header.style-1 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link, .cloux-header.style-1 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link:visited, .cloux-header.style-2 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:focus, .cloux-header.style-2 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:hover, .cloux-header.style-2 .cloux-navbar.style-1 .navbar-menu li:hover > .nav-link, .cloux-header.style-2 .cloux-navbar.style-1 .navbar-menu li:focus > .nav-link:visited, .cloux-header.style-2 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link, .cloux-header.style-2 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link:visited, .cloux-header.style-3 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:focus, .cloux-header.style-3 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:hover, .cloux-header.style-3 .cloux-navbar.style-1 .navbar-menu li:hover > .nav-link, .cloux-header.style-3 .cloux-navbar.style-1 .navbar-menu li:focus > .nav-link:visited, .cloux-header.style-3 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link, .cloux-header.style-3 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link:visited, .cloux-header.style-4 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:focus, .cloux-header.style-4 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:hover, .cloux-header.style-4 .cloux-navbar.style-1 .navbar-menu li:hover > .nav-link, .cloux-header.style-4 .cloux-navbar.style-1 .navbar-menu li:focus > .nav-link:visited, .cloux-header.style-4 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link, .cloux-header.style-4 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link:visited, .cloux-header.style-5 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:focus, .cloux-header.style-5 .cloux-navbar.style-1 .navbar-menu > li > .nav-link:hover, .cloux-header.style-5 .cloux-navbar.style-1 .navbar-menu li:hover > .nav-link, .cloux-header.style-5 .cloux-navbar.style-1 .navbar-menu li:focus > .nav-link:visited, .cloux-header.style-5 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link, .cloux-header.style-5 .cloux-navbar.style-1 .navbar-menu li.active > .nav-link:visited, .cloux-header.style-1 .elements .search > i:focus, .cloux-header.style-1 .elements .search > i:hover, .cloux-header.style-1 .elements .social-links li a:focus, .cloux-header.style-1 .elements .social-links li a:hover, .cloux-header.style-2 .elements .search > i:focus, .cloux-header.style-2 .elements .search > i:hover, .cloux-header.style-2 .elements .social-links li a:focus, .cloux-header.style-2 .elements .social-links li a:hover, .cloux-header.style-3 .elements .search > i:focus, .cloux-header.style-3 .elements .search > i:hover, .cloux-header.style-3 .elements .social-links li a:focus, .cloux-header.style-3 .elements .social-links li a:hover, .cloux-header.style-4 .elements .search > i:focus, .cloux-header.style-4 .elements .search > i:hover, .cloux-header.style-4 .elements .social-links li a:focus, .cloux-header.style-4 .elements .social-links li a:hover, .cloux-header.style-5 .elements .search > i:focus, .cloux-header.style-5 .elements .search > i:hover, .cloux-header.style-5 .elements .social-links li a:focus, .cloux-header.style-5 .elements .social-links li a:hover, .logo .site-logo-texted:focus, .logo .site-logo-texted:hover, .cloux-header.position-2 .logo .site-logo-texted:focus, .cloux-header.position-2 .logo .site-logo-texted:hover, a:focus, a:hover, .cloux-title span, .cloux-title i, .cloux-title b, .loader-style-4 .sk-fading-circle .sk-circle:before', 'color', 'cloux_theme_main_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.cloux-service-box i, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > a, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > a:visited, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > span > a, #bbpress-forums #bbp-single-user-details #bbp-user-navigation > ul > li > span > a:visited, .woocommerce .woocommerce-MyAccount-navigation ul li a, .woocommerce .woocommerce-MyAccount-navigation ul li a:visited, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li a:visited, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:focus, .woocommerce div.product .woocommerce-tabs ul.tabs li, .bbp-pagination-links > span.current, .bbp-pagination-links > a, .bbp-pagination-links > a:visited, .bbp-pagination-links > a:hover, .bbp-pagination-links > a:focus, #bbpress-forums > #subscription-toggle a, #bbpress-forums > #subscription-toggle a:visited, .cloux-achievement-list.style-1 .number, .cloux-achievement-list.style-2 .number, .cloux-achievement-list.style-3 .number, .cloux-achievement-list.style-4 .number, .cloux-content-slider.style-2 .slick-dots li.slick-active button, .cloux-content-slider.style-2 .slick-dots li button:hover, .cloux-content-slider.style-2 .slick-dots li button:focus, .cloux-video-carousel .slick-dots li.slick-active button, .cloux-video-carousel .slick-dots li button:hover, .cloux-video-carousel .slick-dots li button:focus, .cloux-app-box.style-1 ul li a:hover, .cloux-app-box.style-1 ul li a:focus, .cloux-app-box.style-2 ul li a:hover, .cloux-app-box.style-2 ul li a:focus, .game-media .media-tabs li a, .game-media .media-tabs li a:visited, .cloux-tabs > li > a, .cloux-tabs > li > a:visited, .post-review > ul.review > li > .content > .score:hover, .post-review > ul.review > li > .content > .score:focus, .single-content-wrapper .single-content .post-pages > a:hover > span, .single-content-wrapper .single-content .post-pages > a:focus > span, .single-content-wrapper .single-content .post-tags > ul > li a:hover, .single-content-wrapper .single-content .post-tags > ul > li a:focus, .featured-gallery .slick-dots li.slick-active button, .featured-gallery .slick-dots li button:hover, .featured-gallery .slick-dots li button:focus, .widget_tag_cloud a, .widget_tag_cloud a:visited, .navigation.comment-navigation div a, .navigation.comment-navigation div a:visited, .post-pagination.style-1 ul li > a, .post-pagination.style-1 ul li > a:visited, .post-pagination.style-1 ul li > span, .cloux-button.style-1 a, .cloux-button.style-1 a:visited, .cloux-button.style-2 a:hover, .cloux-button.style-2 a:focus', 'border-color', 'cloux_theme_main_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.woocommerce-error, .woocommerce-info, .woocommerce-message, .cloux-header .cloux-navbar.style-1 .navbar-menu li .dropdown-menu', 'border-top-color', 'cloux_theme_main_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.cloux-footer-menu ul li a:before, .game-media .media-tabs li a.active:after, .game-media .media-tabs li a.active:visited:after', 'border-left-color', 'cloux_theme_main_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.cloux-page-banner .cloux-breadcrumb > ul > li.current-item, .cloux-button.style-3 a, .cloux-button.style-3 a:visited', 'border-bottom-color', 'cloux_theme_main_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'h1, h2, h3, h4, h5, h6', 'color', 'cloux_theme_heading_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.cloux-footer.style-1', 'background-color', 'cloux_theme_footer_background' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.cloux-footer .copyright', 'background-color', 'cloux_theme_copyright_background' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.upload-input, .select2-dropdown, .select2-search--dropdown .select2-search__field, .select2-container--default .select2-search--dropdown .select2-search__field, .select2-container--default .select2-selection--single, #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text, #bbpress-forums #bbp-your-profile fieldset input, #bbpress-forums #bbp-your-profile fieldset textarea, .custom-file-control, input[type="email"], input[type="number"], input[type="password"], input[type="tel"], input[type="url"], input[type="text"], input[type="time"], input[type="week"], input[type="search"], input[type="month"], input[type="datetime"], input[type="date"], textarea, textarea.form-control, select, .woocommerce form .form-row .select2-container .select2-choice, .form-control, div.cs-select, .cs-select', 'background-color', 'cloux_theme_input_background' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.upload-input, .select2-dropdown, .select2-search--dropdown .select2-search__field, .select2-container--default .select2-search--dropdown .select2-search__field, .select2-container--default .select2-selection--single, #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text, #bbpress-forums #bbp-your-profile fieldset input, #bbpress-forums #bbp-your-profile fieldset textarea, .custom-file-control, input[type="email"], input[type="number"], input[type="password"], input[type="tel"], input[type="url"], input[type="text"], input[type="time"], input[type="week"], input[type="search"], input[type="month"], input[type="datetime"], input[type="date"], textarea, textarea.form-control, select, .woocommerce form .form-row .select2-container .select2-choice, .form-control, div.cs-select, .cs-select, .form-control:focus, .cs-select .cs-options', 'border-color', 'cloux_theme_input_border_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.upload-input, .select2-dropdown, .select2-search--dropdown .select2-search__field, .select2-container--default .select2-search--dropdown .select2-search__field, .select2-container--default .select2-selection--single, #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text, #bbpress-forums #bbp-your-profile fieldset input, #bbpress-forums #bbp-your-profile fieldset textarea, .custom-file-control, input[type="email"], input[type="number"], input[type="password"], input[type="tel"], input[type="url"], input[type="text"], input[type="time"], input[type="week"], input[type="search"], input[type="month"], input[type="datetime"], input[type="date"], textarea, textarea.form-control, select, .woocommerce form .form-row .select2-container .select2-choice, .form-control, div.cs-select, .cs-select', 'color', 'cloux_theme_input_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'input::-webkit-input-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'input::-moz-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'input:-ms-input-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'input:-moz-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'textarea::-webkit-input-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'textarea::-moz-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'textarea:-ms-input-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'textarea:-moz-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'select::-webkit-input-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'select::-moz-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'select:-ms-input-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'select:-moz-placeholder', 'color', 'cloux_theme_placeholder_color' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'html', 'font-size', 'cloux_typography_html_font_size', 'px' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'body', 'font-size', 'cloux_typography_body_font_size', 'rem' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'h1', 'font-size', 'cloux_typography_h1_font_size', 'rem' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'h2', 'font-size', 'cloux_typography_h2_font_size', 'rem' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'h3', 'font-size', 'cloux_typography_h3_font_size', 'rem' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'h4', 'font-size', 'cloux_typography_h4_font_size', 'rem' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'h5', 'font-size', 'cloux_typography_h5_font_size', 'rem' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( 'h6', 'font-size', 'cloux_typography_h6_font_size', 'rem' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.upload-input, .select2-dropdown, .select2-search--dropdown .select2-search__field, .select2-container--default .select2-search--dropdown .select2-search__field, .select2-container--default .select2-selection--single, #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text, #bbpress-forums #bbp-your-profile fieldset input, #bbpress-forums #bbp-your-profile fieldset textarea, .custom-file-control, input[type="email"], input[type="number"], input[type="password"], input[type="tel"], input[type="url"], input[type="text"], input[type="time"], input[type="week"], input[type="search"], input[type="month"], input[type="datetime"], input[type="date"], textarea, textarea.form-control, select, .woocommerce form .form-row .select2-container .select2-choice, .form-control, div.cs-select, .cs-select', 'font-size', 'cloux_typography_input_font_size', 'rem' ) );

		wp_add_inline_style( 'cloux-custom', cloux_custom_selector( '.custom-file-control::before, button, input[type="submit"], .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button', 'font-size', 'cloux_typography_button_font_size', 'rem' ) );
	}
	add_action( 'wp_enqueue_scripts', 'cloux_custom_selectors' );