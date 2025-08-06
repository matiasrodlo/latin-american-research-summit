(function ( $ ) {
	'use strict';

	$( window ).on(
		'load',
		function () {
			qodefParallaxBackground.init();
		}
	);

	/**
	 * Init global parallax background functionality
	 */
	var qodefParallaxBackground = {
		init: function ( settings ) {
			this.$sections = $( '.qodef-parallax' );

			// Allow overriding the default config
			$.extend(
				this.$sections,
				settings
			);

			if ( this.$sections.length) {
				this.$sections.each(
					function () {
						qodefParallaxBackground.ready($( this ));
						$( this ).addClass('qodef-parallax--init');
					}
				);
			}
		},
		ready: function ( $section ) {
			qodef.qodefWaitForImages.check(
				$section,
				function () {
					qodefParallaxBackground.animateParallax( $section );
				}
			);
		},
		animateParallax: function ( $section ) {

			var $parallaxHolder = $section.find('.qodef-parallax-img-holder'),
				maxY =  $parallaxHolder.outerHeight() - $section.outerHeight();

			gsap.to(
				$parallaxHolder,
				{
					opacity: 1,
				}
			)

			const tl = gsap.timeline({
				scrollTrigger: {
					trigger: $section,
					scrub: 1.4,//change between 1 and 2 to get more or less smooth effect
					start: () => {
						return "top bottom"
					},
					end: () => {
						return "bottom top";
					},
					// markers: true,//debugging
				}
			});

			tl.to(
				$parallaxHolder,
				{
					y: -maxY,
				}
			)
		}
	};

	qodefCore.qodefParallaxBackground = qodefParallaxBackground;

})( jQuery );
