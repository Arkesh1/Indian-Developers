jQuery(document).ready(function($) {
	'use strict';

/*======
*
* JS for Meta Boxes
*
======*/
	/*====== Add Label for Checkboxes ======*/
	$(function () {
		$('.rwmb-checkbox').each(function() {
			$(this).addClass( 'tgl tgl-toggle' );
			$( '<label class="tgl-btn"></label>' ).insertAfter(this);
			var checkboxID = $(this).attr('id');
			$(this).next().attr("for", checkboxID)
		});
	});

});


