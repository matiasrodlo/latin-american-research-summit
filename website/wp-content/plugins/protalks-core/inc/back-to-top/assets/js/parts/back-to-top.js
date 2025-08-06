(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefBackToTop.init();
		}
	);

	var qodefBackToTop = {
		init: function () {
			this.holder = $( '#qodef-back-to-top' );

			if ( this.holder.length ) {
				// Scroll To Top
				this.holder.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefBackToTop.animateScrollToTop();
					}
				);

				qodefBackToTop.showHideBackToTop();
			}
		},
		animateScrollToTop: function () {
			window.scrollTo( { top: 0, behavior: 'smooth' } );
		},
		showHideBackToTop: function () {
			$( window ).scroll(
				function () {
					var $thisItem = $( this ),
						b         = $thisItem.scrollTop(),
						c         = $thisItem.height(),
						d;

					if ( b > 0 ) {
						d = b + c / 2;
					} else {
						d = 1;
					}

					if ( d < 1e3 ) {
						qodefBackToTop.addClass( 'off' );
					} else {
						qodefBackToTop.addClass( 'on' );
					}
				}
			);
		},
		addClass: function ( a ) {
			this.holder.removeClass( 'qodef--off qodef--on' );

			if ( a === 'on' ) {
				this.holder.addClass( 'qodef--on' );
			} else {
				this.holder.addClass( 'qodef--off' );
			}
		}
	};

})( jQuery );
