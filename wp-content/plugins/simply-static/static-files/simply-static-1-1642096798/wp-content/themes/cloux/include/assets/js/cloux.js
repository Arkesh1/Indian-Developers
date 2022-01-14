/*======
*
* Cloux Scripts
*
======*/
(function($){
	'use strict';



	/*====== Loader ======*/
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 2000);



	/*====== Game Slider ======*/
	$(function () {
		$(window).resize(function() {
			var windowy = $(window).height();
			var windowx = $(window).width();
			$('.cloux-game-slider .wrap').css('width',windowx + 'px');
			$('.cloux-game-slider .wrap').css('min-height',windowy + 'px');
		}).resize();
	});



	/*====== Content Slider ======*/
	$(function () {
		$(window).resize(function() {
			var windowy = $(window).height();
			var windowx = $(window).width();
			$('.cloux-content-slider.full-height-true .wrap').css('width',windowx + 'px');
			$('.cloux-content-slider.full-height-true .wrap').css('min-height',windowy + 'px');

			$('.cloux-content-slider').each(function() {
				var titleWidth = $(this).find('.title').width();
				$(this).find('.text').css('max-width',titleWidth + 'px');
			});
		}).resize();
	});



	/*====== CS Select ======*/
	$(document).ready(function(){
		(function() {
			[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
				new SelectFx(el);
			} );
		})();
	});



	/*====== Progress Bar ======*/
	function clouxProgressBar() {
		$('.post-review  > ul.review > li > ul.items > li > .cloux-progress-bar .cloux-progress').each(function() {
			$(this).data('width', $(this)[0].style.width).css('width', 0);
		});
				
		$('.post-review > ul.review > li > ul.items > li > .cloux-progress-bar .cloux-progress').each(function() {
			var progress = $(this).data('progress');
			$(this).addClass('load').css('width', progress + '%');
		});
	}
	clouxProgressBar();



	/*====== Custom Slick ======*/
	function clouxSlider() {
		$('.cloux-slider').each( function() {
			var slick = $(this),
				autoplay = $(this).data('autoplay'),
				autospeed = $(this).data('autospeed'),
				arrows = $(this).data('arrows'),
				fade = $(this).data('fade'),
				centermode = $(this).data('centermode'),
				variablewidth = $(this).data('variablewidth'),
				centerpad = $(this).data('centerpad'),
				dots = $(this).data('dots'),
				item =  $(this).data('item'),
				slidetoitem = $(this).data('slidetoitem'),
				speed = $(this).data('speed'),
				asNavFor = $(this).data('asnavfor'),
				focusselect = $(this).data('focusselect'),
				rtl = $(this).data('rtl'),
				prevarrow = $(this).data('prevarrow'),
				nextarrow = $(this).data('nextarrow'),
				infinite = $(this).data('infinite'),
				lazy = $(this).data('lazy');

			slick.slick({
				autoplay: autoplay,
				autoplaySpeed: autospeed,
				arrows: arrows,
				dots: dots,
				fade: fade,
				centerMode: centermode,
				variableWidth: variablewidth,
				centerPadding: centerpad,
				slidesToShow: item,
				slidesToScroll: slidetoitem,
				speed: speed,
				asNavFor: asNavFor,
				focusOnSelect: focusselect,
				rtl: rtl,
				infinite: infinite,
				lazyLoad: lazy,
				prevArrow: prevarrow,
				nextArrow: nextarrow,
				responsive: [
			    {
					breakpoint: 1280,
			    	settings: {
			        slidesToShow: item < 5 ? item: 4,
			      }
			    },
			    {
					breakpoint: 1198,
			    	settings: {
			        slidesToShow: item < 4 ? item: 3,
			      }
			    },
			    {
					breakpoint: 991,
			    	settings: {
			        slidesToShow: item < 3 ? item: 2,
			      }
			    },
			    {
			    	breakpoint: 767,
			    	settings: {
			        slidesToShow: item < 2 ? item: 1,
			      }
			    }
			  ]
			});
		});
	}
	clouxSlider();
	


	/*====== Tooltip ======*/
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});



	/*====== Automatic Activate First Tab ======*/
	$(function () {
		$('.cloux-first-tab > .tab-pane:first-child').addClass('active show');
		$('.cloux-first-tab > li:first-child a').addClass('active');
	});



	/*======
	*
	* Game Sales in Game Single
	*
	======*/
	$(function () {
		$('.game-price-item .game-purchase-contact-form > a').each(function() {
			$('.game-price-item .game-purchase-contact-form > a').on("click", function() {
				$(this).parent().parent().parent().children().children('.contact-form').children('.wrap').addClass('active');
			});
		});
	});



	/*======
	*
	* Scrollbar.js Settings
	*
	======*/
	$(document).ready(function(){
		$('.scrollbar-outer').scrollbar();
	});



	/*======
	*
	* Mobile Header
	*
	======*/
	$(function () {
		$('.cloux-mobile-header > .mobile-sidebar > .content-wrapper .menu ul li.menu-item-has-children').append('<span class="caret"></span>');

		$(document).on('click', '.cloux-mobile-header > .mobile-sidebar > .content-wrapper .menu ul li.menu-item-has-children > span.caret', function(){
			$(this).parent().addClass('open');
		});
	
		$(document).on('click', '.cloux-mobile-header > .mobile-sidebar > .content-wrapper .menu ul li.menu-item-has-children.open > span.caret', function(){
			$(this).parent().removeClass('open');
		});
	});



	/*======
	*
	* TweenMax Effects
	*
	======*/
		/*====== Mobile Header ======*/
		function cloux_mobile_header() {
			var purchase_modal_body = new TimelineMax({
				paused: !0,
				reversed: !0
			});
			purchase_modal_body.to('.cloux-mobile-header > .mobile-sidebar > .overlay', .2, {
				x:0,
				ease: Expo.easeInOut
			}).to('.cloux-mobile-header > .main-wrap', .5, {
				y:'-100%',
				ease: Expo.easeInOut
			}).to('.cloux-mobile-header > .mobile-sidebar > .content-wrapper', .2, {
				x:0,
				ease: Expo.easeInOut
			}, "-=0")

			$('.cloux-mobile-header > .main-wrap > .menu-icon').on("click", function() {
	        	purchase_modal_body.play().timeScale(1)
			});
			$('.cloux-mobile-header > .mobile-sidebar > .content-wrapper .cloux-close, .cloux-mobile-header > .mobile-sidebar > .overlay').on("click", function() {
	        	purchase_modal_body.reverse().timeScale(1)
			});
		}
		cloux_mobile_header();



		/*====== Purchase Details on Game Single ======*/
		function cloux_modal_purchase_details() {
			$('.game-price-item').each( function() {
			var signup_modal_body = new TimelineMax({
				paused: !0,
				reversed: !0
			});
			signup_modal_body.to($(this).find('.cloux-modal'), .7, {
				y:0,
				ease: Expo.easeInOut
			}).to($(this).find('.cloux-modal .hover-color-a'), .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to($(this).find('.cloux-modal .modal-color-a'), .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to($(this).find('.cloux-modal .modal-color-b'), .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to($(this).find('.cloux-modal .cloux-modal-content'), .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to($(this).find('.cloux-modal .cloux-close'), .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=0")
				$(this).find('.purchase-modal > a').on("click", function() {
		        	signup_modal_body.play().timeScale(1)
				});

				$(this).find('.cloux-modal .cloux-close').on("click", function() {
		        	signup_modal_body.reverse().timeScale(1)
				});
			});
		}
		cloux_modal_purchase_details();



		/*====== Header Search ======*/
		function cloux_modal_search() {
			var modal_body = new TimelineMax({
				paused: !0,
				reversed: !0
			});
			modal_body.to('.modal-search', .7, {
				y:0,
				ease: Expo.easeInOut
			}).to('.modal-search .modal-color-a', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to('.modal-search .modal-color-b', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to('.modal-search .search-content', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").staggerTo('.modal-search .cloux-close', .2, {
				y:0,
				ease: Expo.easeInOut
			}, "-=0").staggerTo('.modal-search .container', .7, {
				y:0,
				ease: Power0.easeNone
			}, "-=0")

			$('.cloux-header .search .open-button').on("click", function() {
	        	modal_body.play().timeScale(1)
			});
			$('.modal-search .cloux-close').on("click", function() {
	        	modal_body.reverse().timeScale(1)
			});
		}
		cloux_modal_search();



		/*====== Header Login ======*/
		function cloux_modal_login() {
			var login_modal_body = new TimelineMax({
				paused: !0,
				reversed: !0
			});
			login_modal_body.to('.login-modal', .7, {
				y:0,
				ease: Expo.easeInOut
			}).to('.login-modal .modal-color-a', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to('.login-modal .modal-color-b', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to('.login-modal .cloux-modal-content', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").staggerTo('.login-modal .cloux-close', .2, {
				y:0,
				ease: Expo.easeInOut
			}, "-=0").staggerTo('.login-modal .cloux-modal-content', .7, {
				y:0,
				ease: Power0.easeNone
			}, "-=0")

			$('.cloux-header .user-box .login-popup, .cloux-mobile-header > .mobile-sidebar > .content-wrapper .elements .user-box .login-popup').on("click", function() {
	        	login_modal_body.play().timeScale(1)
			});

			$('.login-modal .cloux-close, .signup-modal .cloux-close').on("click", function() {
	        	login_modal_body.reverse().timeScale(1)
			});
		}
		cloux_modal_login();



		/*====== Register Login ======*/
		function cloux_modal_signup() {
			var signup_modal_body = new TimelineMax({
				paused: !0,
				reversed: !0
			});
			signup_modal_body.to('.signup-modal', .7, {
				y:0,
				ease: Expo.easeInOut
			}).to('.signup-modal .modal-color-a', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to('.signup-modal .modal-color-b', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").to('.signup-modal .cloux-modal-content', .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=.4").staggerTo('.signup-modal .cloux-close', .2, {
				y:0,
				ease: Expo.easeInOut
			}, "-=0").staggerTo('.signup-modal .cloux-modal-content', .7, {
				y:0,
				ease: Power0.easeNone
			}, "-=0")

			$('.cloux-header .user-box .signup-popup, .cloux-mobile-header > .mobile-sidebar > .content-wrapper .elements .user-box .signup-popup').on("click", function() {
	        	signup_modal_body.play().timeScale(1)
			});

			$('.signup-modal .cloux-close').on("click", function() {
	        	signup_modal_body.reverse().timeScale(1)
			});
		}
		cloux_modal_signup();



		/*====== Content Box ======*/
		function cloux_content_box() {
			$('.cloux-content-box').each( function() {
			var signup_modal_body = new TimelineMax({
				paused: !0,
				reversed: !0
			});
			signup_modal_body.to($(this).find('.popup'), .7, {
				x:0,
				ease: Expo.easeInOut
			}).to($(this).find('.popup .hover-color-a'), .7, {
				x:0,
				ease: Expo.easeInOut
			}, "-=.4").to($(this).find('.popup .hover-color-b'), .7, {
				x:0,
				ease: Expo.easeInOut
			}, "-=.4").to($(this).find('.popup .hover-color-c'), .7, {
				x:0,
				ease: Expo.easeInOut
			}, "-=.4").to($(this).find('.popup .wrap'), .7, {
				x:0,
				ease: Expo.easeInOut
			}, "-=.4").to($(this).find('.popup .cloux-close'), .7, {
				y:0,
				ease: Expo.easeInOut
			}, "-=0")
				$(this).find('.content-read-more').on("click", function() {
		        	signup_modal_body.play().timeScale(1)
				});

				$(this).find('.popup .cloux-close').on("click", function() {
		        	signup_modal_body.reverse().timeScale(1)
				});
			});
		}
		cloux_content_box();



		/*====== Character Box ======*/
		function cloux_character_box() {
			$('.cloux-character-box .item').each( function() {
				var signup_modal_body = new TimelineMax({
					paused: !0,
					reversed: !0
				});

				signup_modal_body.to($(this).find('.cloux-modal'), .7, {
					y:0,
					ease: Expo.easeInOut
				}).to($(this).find('.cloux-modal .modal-color-a'), .7, {
					y:0,
					ease: Expo.easeInOut
				}, "-=.4").to($(this).find('.cloux-modal .modal-color-b'), .7, {
					y:0,
					ease: Expo.easeInOut
				}, "-=.4").to($(this).find('.cloux-modal .cloux-modal-content'), .7, {
					y:0,
					ease: Expo.easeInOut
				}, "-=.4").to($(this).find('.cloux-modal .cloux-close'), .7, {
					y:0,
					ease: Expo.easeInOut
				}, "-=0")

			
				$(this).find('.image').on("click", function() {
		        	signup_modal_body.play().timeScale(1)
				});
			

				$(this).find('.cloux-modal .cloux-close').on("click", function() {
		        	signup_modal_body.reverse().timeScale(1)
				});
			});
		}
		cloux_character_box();



		/*====== eSport Players ======*/
		function cloux_esport_players() {
			$('.cloux-esport-players .item').each( function() {
				var signup_modal_body = new TimelineMax({
					paused: !0,
					reversed: !0
				});

				signup_modal_body.to($(this).find('.cloux-modal'), .7, {
					y:0,
					ease: Expo.easeInOut
				}).to($(this).find('.cloux-modal .modal-color-a'), .7, {
					y:0,
					ease: Expo.easeInOut
				}, "-=.4").to($(this).find('.cloux-modal .modal-color-b'), .7, {
					y:0,
					ease: Expo.easeInOut
				}, "-=.4").to($(this).find('.cloux-modal .cloux-modal-content'), .7, {
					y:0,
					ease: Expo.easeInOut
				}, "-=.4").to($(this).find('.cloux-modal .cloux-close'), .7, {
					y:0,
					ease: Expo.easeInOut
				}, "-=0")

			
				$(this).find('.image').on("click", function() {
		        	signup_modal_body.play().timeScale(1)
				});
			

				$(this).find('.cloux-modal .cloux-close').on("click", function() {
		        	signup_modal_body.reverse().timeScale(1)
				});
			});
		}
		cloux_esport_players();



} )( jQuery );