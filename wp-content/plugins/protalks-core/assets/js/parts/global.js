(function ( $ ) {
	'use strict';

	// This case is important when theme is not active
	if ( typeof qodef !== 'object' ) {
		window.qodef = {};
	}

	window.qodefCore                = {};
	qodefCore.shortcodes            = {};
	qodefCore.listShortcodesScripts = {
		qodefSwiper: qodef.qodefSwiper,
		qodefPagination: qodef.qodefPagination,
		qodefFilter: qodef.qodefFilter,
		qodefMasonryLayout: qodef.qodefMasonryLayout,
		qodefJustifiedGallery: qodef.qodefJustifiedGallery,
		qodefCustomCursor: qodefCore.qodefCustomCursor,
	};

	qodefCore.body         = $( 'body' );
	qodefCore.html         = $( 'html' );
	qodefCore.windowWidth  = $( window ).width();
	qodefCore.windowHeight = $( window ).height();
	qodefCore.scroll       = 0;

	$( document ).ready(
		function () {
			qodefCore.scroll = $( window ).scrollTop();
			qodefInlinePageStyle.init();
			qodefStickyColumn.init();
			qodefAppear.init();
		}
	);

	$( window ).resize(
		function () {
			qodefCore.windowWidth  = $( window ).width();
			qodefCore.windowHeight = $( window ).height();
			qodefStickyColumn.init();
		}
	);

	$( window ).scroll(
		function () {
			qodefCore.scroll = $( window ).scrollTop();
		}
	);

	$( window ).load(
		function () {
			qodefScrollItem.init();
			qodefCursorItem.init();
		}
	);

	/**
	 * Check element to be in the viewport
	 */
	var qodefIsInViewport = {
		check: function ( $element, callback, onlyOnce, callbackOnExit ) {
			if ( $element.length ) {
				var offset = typeof $element.data( 'viewport-offset' ) !== 'undefined' ? $element.data( 'viewport-offset' ) : 0.15; // When item is 15% in the viewport

				var observer = new IntersectionObserver(
					function ( entries ) {
						// isIntersecting is true when element and viewport are overlapping
						// isIntersecting is false when element and viewport don't overlap
						if ( entries[0].isIntersecting === true ) {
							callback.call( $element );

							// Stop watching the element when it's initialize
							if ( onlyOnce !== false ) {
								observer.disconnect();
							}
						} else if ( callbackOnExit && onlyOnce === false ) {
							callbackOnExit.call( $element );
						}
					},
					{ threshold: [offset] }
				);

				observer.observe( $element[0] );
			}
		},
	};

	qodefCore.qodefIsInViewport = qodefIsInViewport;

	var qodefScroll = {
		disable: function () {
			if ( window.addEventListener ) {
				window.addEventListener(
					'wheel',
					qodefScroll.preventDefaultValue,
					{ passive: false }
				);
			}

			// window.onmousewheel = document.onmousewheel = qodefScroll.preventDefaultValue;
			document.onkeydown = qodefScroll.keyDown;
		},
		enable: function () {
			if ( window.removeEventListener ) {
				window.removeEventListener(
					'wheel',
					qodefScroll.preventDefaultValue,
					{ passive: false }
				);
			}
			window.onmousewheel = document.onmousewheel = document.onkeydown = null;
		},
		preventDefaultValue: function ( e ) {
			e = e || window.event;
			if ( e.preventDefault ) {
				e.preventDefault();
			}
			e.returnValue = false;
		},
		keyDown: function ( e ) {
			var keys = [37, 38, 39, 40];
			for ( var i = keys.length; i--; ) {
				if ( e.keyCode === keys[i] ) {
					qodefScroll.preventDefaultValue( e );
					return;
				}
			}
		}
	};

	qodefCore.qodefScroll = qodefScroll;

	var qodefPerfectScrollbar = {
		init: function ( $holder ) {
			if ( $holder.length ) {
				qodefPerfectScrollbar.qodefInitScroll( $holder );
			}
		},
		qodefInitScroll: function ( $holder ) {
			var $defaultParams = {
				wheelSpeed: 0.6,
				suppressScrollX: true
			};

			var $ps = new PerfectScrollbar(
				$holder[0],
				$defaultParams
			);

			$( window ).resize(
				function () {
					$ps.update();
				}
			);
		}
	};

	qodefCore.qodefPerfectScrollbar = qodefPerfectScrollbar;

	var qodefInlinePageStyle = {
		init: function () {
			this.holder = $( '#protalks-core-page-inline-style' );

			if ( this.holder.length ) {
				var style = this.holder.data( 'style' );

				if ( style.length ) {
					$( 'head' ).append( '<style type="text/css">' + style + '</style>' );
				}
			}
		}
	};

	var qodefStickyColumn = {
		init: function () {
			var stickyColumnHolder = $( '.qodef-sticky-column--enable' );

			if ( stickyColumnHolder.length ) {
				stickyColumnHolder.each(
					function () {
						var height = $( this ).height();

						if ( $( this ).hasClass( 'qodef-sticky-column-snap-to--top' ) ) {
							$( this ).css(
								'top',
								'calc(0% + ' + qodefGlobal.vars.adminBarHeight + 'px)'
							);
						} else if ( $( this ).hasClass( 'qodef-sticky-column-snap-to--bottom' ) ) {
							$( this ).css(
								'top',
								'calc(100% - ' +  height + 'px)'
							);
						} else {
							$( this ).css(
								'top',
								'calc(50% - ' + ( height - qodefGlobal.vars.adminBarHeight ) / 2 + 'px)'
							);
						}
					}
				);
			}
		}
	};

	qodefCore.qodefStickyColumn = qodefStickyColumn;

	/**
	 * Init scroll item
	 */
	var qodefScrollItem = {
		init: function () {
			var $items = $( '.qodef-scroll-item' );

			if ( $items.length ) {
				$items.each(
					function () {
						var $currentItem       = $( this ),
							$defaultMin        = -35,
							$defaultMax        = -50,
							$defaultSmoothness = 30;

						var $min        = parseInt( $( this ).attr( 'data-parallax-min' ) ? $( this ).attr( 'data-parallax-min' ) : $defaultMin ),
							$max        = parseInt( $( this ).attr( 'data-parallax-max' ) ? $( this ).attr( 'data-parallax-max' ) : $defaultMax ),
							$y          = Math.floor( Math.random() * ($max - $min) + $min ),
							$smoothness = parseInt( $( this ).attr( 'data-parallax-smoothness' ) ? $( this ).attr( 'data-parallax-smoothness' ) : $defaultSmoothness );

						if ( $currentItem.hasClass( 'qodef-grid-item' ) ) {
							$currentItem.children( '.qodef-e-inner' ).attr(
								'data-parallax',
								'{"y": ' + $y + ', "smoothness": ' + $smoothness + '}'
							);
						} else {
							$currentItem.attr(
								'data-parallax',
								'{"y": ' + $y + ', "smoothness": ' + $smoothness + '}'
							);
						}
					}
				);
			}

			qodefScrollItem.initScroll();
		},
		initScroll: function () {
			var parallaxInstances = $( '[data-parallax]' );

			if ( parallaxInstances.length && ! qodefCore.html.hasClass( 'touchevents' ) && typeof ParallaxScroll === 'object' ) {
				ParallaxScroll.init(); //initialization removed from plugin js file to have it run only on non-touch devices
			}
		},
	};

	qodefCore.qodefScrollItem = qodefScrollItem;

	/**
	 * Init cursor item
	 */
	var qodefCursorItem = {
		init: function () {
			var $items = $( '.qodef-cursor-item' );

			if ( $items.length ) {
				$items.each(
					function () {
						var $currentItem = $( this );

						qodefCursorItem.initCursor( $currentItem );
					}
				);

				window.addEventListener(
					'mousemove',
					function( e ) {
						qodefCore.mousePos = {
							x: e.clientX,
							y: e.clientY,
						};
					}
				);
			}
		},
		initCursor: function ( $currentItem ) {
			var $defaultXMin       = 10,
				$defaultXMax       = 30,
				$defaultYMin       = 10,
				$defaultYMax       = 20,
				$defaultSmoothness = 0.02;

			qodefCore.mousePos = {
				x: qodefCore.windowWidth / 2,
				y: qodefCore.windowHeight / 2
			};

			// Map number x from range [a, b] to [c, d]
			var map = ( x, a, b, c, d ) => (x - a) * (d - c) / (b - a) + c;

			// Linear interpolation
			var lerp = ( a, b, n ) => (1 - n) * a + n * b;

			var translationVals = { tX: 0, tY: 0 },
				xStart          = gsap.utils.random(
					$defaultXMin,
					$defaultXMax,
					10
				),
				yStart          = gsap.utils.random(
					$defaultYMin,
					$defaultYMax,
					10
				);

			var moveAnimation;

			// infinite loop
			var render = function() {
				// Calculate the amount to move.
				// Using linear interpolation to smooth things out.
				// Translation values will be in the range of [-start, start] for a cursor movement from 0 to the window's width/height
				translationVals.tX = lerp(
					translationVals.tX,
					map(
						qodefCore.mousePos.x,
						0,
						qodefCore.windowWidth,
						-xStart,
						xStart
					),
					$defaultSmoothness
				);
				translationVals.tY = lerp(
					translationVals.tY,
					map(
						qodefCore.mousePos.y,
						0,
						qodefCore.windowHeight,
						-yStart,
						yStart
					),
					$defaultSmoothness
				);

				gsap.set(
					$currentItem,
					{
						x: translationVals.tX,
						y: translationVals.tY
					}
				);

				moveAnimation = requestAnimationFrame( render );
			};

			moveAnimation = requestAnimationFrame( render );

			qodefCore.qodefIsInViewport.check(
				$currentItem,
				function () {
					moveAnimation = requestAnimationFrame( render );
				},
				false,
				function() {
					cancelAnimationFrame( moveAnimation );
				}
			);
		}
	};

	qodefCore.qodefCursorItem = qodefCursorItem;

	/**
	 * Init animation on appear
	 */
	var qodefAppear = {
		init: function () {
			this.holder = $('.qodef--has-appear:not(.qodef--appeared):not(.qodef--prevent-appear), .qodef--custom-appear:not(.qodef--appeared):not(.qodef--prevent-appear)');

			if (this.holder.length) {
				this.holder.each(
					function () {
						var holder = $(this),
							appearDelay = $(this).attr('data-appear-delay');

						qodefCore.qodefIsInViewport.check(
							holder,
							() => {
								qodef.qodefWaitForImages.check(
									holder,
									function () {
										if ( appearDelay ) {
											setTimeout(
												()=>{
													holder.addClass( 'qodef--appeared' );
												},
												appearDelay
											)

										} else {
											holder.addClass( 'qodef--appeared' );
										}
									}
								)
							},
						);
					}
				);
			}
		},
	};

	qodefCore.qodefAppear = qodefAppear;

})( jQuery );
