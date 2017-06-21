(function($) {
	var stickyHeader = $( '.stick' );
	var adminBar = gatewayadminbar; //localized in functions.php
	var stickyHeaderOffset;

	if ( adminBar > 0 ) {
		stickyHeaderOffset = stickyHeader.offset().top - 32;
	} else {
		stickyHeaderOffset = stickyHeader.offset().top;
	}

	$(window).scroll( function() {
		// check if there's enough height to make the masthead sticky - if the page is too short, it'll get herky-jerky
		var $tallEnough = true,
			$masthead = $('#masthead'),
			$content = $('#content'),
			$footer = $('.footer-wrap');

			// get total height of non-header elements --  content height plus margins, plus footer height
			var contentHeight = ( ( $content.innerHeight() + parseInt( $content.css('margin-top'), 10)  + parseInt( $content.css('margin-bottom'), 10) ) + $footer.innerHeight() );

			// tweak if adminBar present
			if( adminBar ) {
				contentHeight += 32;
			}

			// change $tallEnough value if window height will cause issues
			if ( contentHeight < $(window).height() && ( contentHeight + $masthead.innerHeight() ) >= $(window).height() ) {
				$tallEnough = false;
			}

		if( $(window).scrollTop() > stickyHeaderOffset && true == $tallEnough ) {

			stickyHeader.addClass( 'sticking' ) ;

		} else {

			stickyHeader.removeClass( 'sticking' );

		}
	} );
})(jQuery);