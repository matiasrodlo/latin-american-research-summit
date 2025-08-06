(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_google_map = {};

	$( document ).on(
		'qodefGoogleMapsCallbackEvent',
		function () {
			qodefGoogleMap.init();
		}
	);

	var qodefGoogleMap = {
		init: function () {
			this.holder = $( '.qodef-google-map' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {
						qodefGoogleMap.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			if ( typeof window.qodefGoogleMap !== 'undefined' ) {
				window.qodefGoogleMap.init( $currentItem.find( '.qodef-m-map' ) );
			}
		},
	};

	qodefCore.shortcodes.protalks_core_google_map.qodefGoogleMap = qodefGoogleMap;

})( jQuery );
