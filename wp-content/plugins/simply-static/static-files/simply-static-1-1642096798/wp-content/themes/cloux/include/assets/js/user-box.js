jQuery(function($){
	"use strict";

/*======
*
* Login
*
======*/
	$('#cloux_login_form').on('submit', function(e){
		e.preventDefault();

		var button = $(this).find('button');
			button.button('loading');

		$.post(clouxuserajax.ajaxurl, $('#cloux_login_form').serialize(), function(data){

			var obj = $.parseJSON(data);

			$('.login-modal .cloux-errors').html(obj.message);
			
			if(obj.error == false){
				$('.login-modal').addClass('loading');
				window.location.reload(true);
				button.hide();
			}

			button.button('reset');
		});

	});



/*======
*
* Sign Up
*
======*/
	$('#cloux_registration_form').on('submit', function(e){

		e.preventDefault();

		var button = $(this).find('button');
			button.button('loading');

		$.post(clouxuserajax.ajaxurl, $('#cloux_registration_form').serialize(), function(data){
			
			var obj = $.parseJSON(data);

			$('.signup-modal .cloux-errors').html(obj.message);
			
			if(obj.error == false){
				$('.signup-modal').addClass('registration-complete');
				button.hide();
			}

			button.button('reset');
			
		});

	});	

});