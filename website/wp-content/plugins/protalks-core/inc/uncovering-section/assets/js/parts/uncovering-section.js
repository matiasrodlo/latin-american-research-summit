(function ( $ ) {
	'use strict';
	$( window ).on(
		'load',
		function () {
			qodefUncoveringSection.init();
		}
	);

	$( window ).resize(
		function () {
			qodefUncoveringSection.init();
		}
	);

	var qodefUncoveringSection = {
		init: function () {
			var $uncoveringSection = $( '.qodef-uncovering-section' );

			if ( $uncoveringSection.length ) {
				var $sectionHolder = $uncoveringSection.find( '.qodef-page-content-section > .elementor' ),
					$lastSection   = $( '.qodef-page-content-section > .elementor > .elementor-element:last-child' ),
					$beforeLastSection = $( '.qodef-page-content-section > .elementor > .elementor-element:nth-last-child(2)' );


				if ( $sectionHolder.length && $lastSection.length ) {
					var lastSectionHeight = $lastSection.outerHeight();

					$sectionHolder.css( { 'margin-bottom': lastSectionHeight + 'px' } );

					let $controlledRev = $lastSection.find( 'sr7-module' );

					let revEvent = new CustomEvent('qodef-uncovering-section-rev-load');

					if ( $controlledRev.length ) {

						const tl = gsap.timeline( {
							scrollTrigger: {
								trigger: $beforeLastSection,
								scrub: 2.5,
								start: () => {
									return 'bottom center+=42%';
								},
								end: 'max',
								onEnter: ()=>{
									document.dispatchEvent(revEvent);
								},
								onEnterBack: ()=>{
									document.dispatchEvent(revEvent);
								},
								// markers: true,
							}
						} );

						tl
						.to(
							$sectionHolder,
							{
								duration: .5,
							}
						)
					}
				}
			}
		},
	};

	qodefCore.qodefUncoveringSection = qodefUncoveringSection;

})( jQuery );
