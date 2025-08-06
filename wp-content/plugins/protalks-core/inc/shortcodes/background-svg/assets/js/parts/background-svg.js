(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_background_svg = {};

	$( window ).load(
		function () {
			qodefBackgroundSvg.init();
			qodefBackgroundSvgAppear.init();
		}
	);

	var qodefBackgroundSvg = {
		init: function () {
			var $holder = $( '.qodef-background-svg.qodef--predefined' );

			if ( $holder.length ) {
				$holder.each(
					function () {
						qodefBackgroundSvg.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			var isAnimated = $currentItem.hasClass( 'qodef--animated' );
			if ( isAnimated ) {
				var $parentContainers = $currentItem.parents( '.elementor-element' );
				var $parentContainer  = $parentContainers[$parentContainers.length - 1];

				$( $parentContainer ).css(
					'--overflow',
					'hidden'
				);
			}
		},
	};

	var qodefBackgroundSvgAppear = {
		init: function () {
			var $holder = $( '.qodef-background-svg.qodef--svg-has-appear');

			if ( $holder.length ) {
				$holder.each(
					function (index) {
						qodefBackgroundSvgAppear.initItem( $( this ), index );
					}
				);
			}
		},
		initItem: function ( $currentItem, index ) {
			var delay = 50 + (index % 2) * 120;

			qodefCore.qodefIsInViewport.check(
				$currentItem.find('svg'),
				function () {
					setTimeout(
						()=>{
							$currentItem.addClass('qodef--appeared');
						}
					, delay )
				},
				false,
				function () {
					$currentItem.removeClass('qodef--appeared');
				}
			);
		},
	};
	qodefCore.shortcodes.protalks_core_background_svg.qodefBackgroundSvg = qodefBackgroundSvg;
	qodefCore.shortcodes.protalks_core_background_svg.qodefBackgroundSvgAppear = qodefBackgroundSvgAppear;

})( jQuery );
