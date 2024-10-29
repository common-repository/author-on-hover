(function( $ ) {
	'use strict';

	 $(window).on('load', function () {

		var theAuth = '';
		if ( $( ".entry-header .entry-meta .author a" )[0] ) {

			var theAuth = $( ".entry-header .entry-meta .author a" )[0];
		} else {

			var theAuth = $( "a[rel=author]" );
		}

		$(theAuth).after( $( "#frhd--auth-wrap" ) );

		var theAuthFitting = $('#frhd--auth-wrap').data('fitting');

		var timeout;

		function hide() {
			timeout = setTimeout(function () {
				$('#frhd--auth-wrap').fadeOut(200);
			}, 200);
		};

		$(theAuth).mouseover(function () {
			clearTimeout(timeout);
			$(this).siblings('#frhd--auth-wrap').fadeIn(200);

			if ( 1 == theAuthFitting ) {

				$('#frhd--auth-wrap').css({'display': 'inline-block', 'margin-top': '22px', 'transform': 'translateX(-50px)'});
			}
		}).mouseout(hide);

		$('#frhd--auth-wrap').mouseover(function () {
			clearTimeout(timeout);
		}).mouseout(hide);

	});

})( jQuery );