(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefPredefinedSpinner.init();
		}
	);

	$( window ).on(
		'elementor/frontend/init',
		function () {
			const isEditMode = Boolean( elementorFrontend.isEditMode() );

			if ( isEditMode ) {
				qodefPredefinedSpinner.init( isEditMode );
			}
		}
	);

	const qodefPredefinedSpinner = {
		init( isEditMode ) {
			const $holder = $( '#qodef-page-spinner.qodef-layout--predefined' );

			if ( $holder.length ) {
				if ( isEditMode ) {
				} else {
					qodefPredefinedSpinner.animateSpinner( $holder );
				}
			}
		},
		animateSpinner( $holder ) {
			var tl = gsap.timeline(
				{
					paused: true,
					onStart: () => {
						$holder.addClass( 'qodef--init' );
					},
				}
			);

			var tlOut = gsap.timeline(
				{
					paused: true,
					onStart: () => {
						let appeared = $( '.qodef--appeared' );

						appeared.removeClass( 'qodef--appeared' );
					},
					onComplete: () => {
						$holder.addClass( 'qodef--finished' );
					},
				}
			);

			tlOut
			.to(
				$holder,
				{
					duration: 1.1,
					onComplete: () => {
						qodefCore.qodefAppear.init();
					},
				},
			)
			.to(
				$holder,
				{
					'--qode-clip': 100,
					duration: 2,
					ease: 'power2.inOut'
				},
				'<'
			);

			tl
			.from(
				$holder,
				{
					duration: 3,
				},
			)
			.to(
				$holder,
				{
					duration: .1,
					repeat: -1,
					onRepeat: () => {
						if ( qodefCore.qodefSpinner.windowLoaded ) {
							tlOut.play();
						} else {
							tl.restart();
						}
					},
				},
			);

			tl.play();
		},
	};

})( jQuery );
