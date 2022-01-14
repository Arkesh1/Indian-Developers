jQuery(document).ready(function($) {
	'use strict';

/*======
*
* JS for Customize Extra Types
*
======*/
	/*====== Range Value ======*/
	(function($) {
		wp.customize.bind('ready', function() {
			rangeSlider();
		});

		var rangeSlider = function() {
			var slider = $('.range-slider'),
			range = $('.range-slider__range'),
			value = $('.range-slider__value');
			slider.each(function() {
				value.each(function() {
					var value = $(this).prev().attr('value');
					var suffix = ($(this).prev().attr('suffix')) ? $(this).prev().attr('suffix') : '';
					$(this).html(value + suffix);
				});

				range.on('input', function() {
					var suffix = ($(this).attr('suffix')) ? $(this).attr('suffix') : '';
					$(this).next(value).html(this.value + suffix );
				});
			});
		};
	})(jQuery);



	/*====== Toggle ======*/
	(function($) {
		wp.customize.bind( 'ready', function() {
			var customize = this;
			var toggleControls = [
				'#CONTROLNAME01#',
				'#CONTROLNAME02#'
			];

			$.each( toggleControls, function( index, control_name ) {
				customize( control_name, function( value ) {
					var controlTitle = customize.control( control_name ).container.find( '.customize-control-title' );
					controlTitle.toggleClass('disabled-control-title', !value.get() );
					value.bind( function( to ) {
						controlTitle.toggleClass( 'disabled-control-title', !value.get() );
					} );
				} );
			} );
		} );
	} )( jQuery );



	/*====== Radio Image ======*/
	jQuery( document ).ready( function() {
		jQuery( '.customize-control-radio-image .buttonset' ).buttonset();
		jQuery( '.customize-control-radio-image input:radio' ).change(
			function() {
				var setting = jQuery( this ).attr( 'data-customize-setting-link' );
				var image = jQuery( this ).val();
				wp.customize( setting, function( obj ) {
					obj.set( image );
				} );
			}
		);
	} );


});


