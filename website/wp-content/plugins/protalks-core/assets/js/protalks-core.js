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

(function ($) {
	"use strict";

	$( window ).on(
		'load',
		function () {
			qodefBackgroundText.init();
		}
	);

	$( window ).resize(
		function () {
			qodefBackgroundText.init();
		}
	);

	var qodefBackgroundText = {
		init                    : function () {
			var $holder = $( '.qodef-background-text' );

			if ($holder.length) {
				$holder.each(
					function () {
						qodefBackgroundText.responsiveOutputHandler( $( this ) );
					}
				);
			}
		},
		responsiveOutputHandler : function ($holder) {
			var breakpoints = {
				3840: 1513,
				1512: 1369,
				1368: 1201,
				1200: 1
			};

			$.each(
				breakpoints,
				function (max, min) {
					if (qodef.windowWidth <= max && qodef.windowWidth >= min) {
						qodefBackgroundText.generateResponsiveOutput( $holder, max );
					}
				}
			);
		},
		generateResponsiveOutput: function ($holder, width) {
			var $textHolder = $holder.find( '.qodef-m-background-text' );

			if ($textHolder.length) {
				$textHolder.css(
					{
						'font-size': $textHolder.data( 'size-' + width ) + 'px',
						'top'      : $textHolder.data( 'vertical-offset-' + width ) + 'px',
					}
				);
			}
		},
	};

	window.qodefBackgroundText = qodefBackgroundText;
})( jQuery );

(function ( $ ) {
	'use strict';

	$( window ).on(
		'load',
		function () {
			qodefUncoverFooter.init();
		}
	);

	var qodefUncoverFooter = {
		holder: '',
		init: function () {
			this.holder = $( '#qodef-page-footer.qodef--uncover' );

			if ( this.holder.length && ! qodefCore.html.hasClass( 'touchevents' ) ) {
				qodefUncoverFooter.addClass();
				qodefUncoverFooter.setHeight( this.holder );

				$( window ).resize(
					function () {
						qodefUncoverFooter.setHeight( qodefUncoverFooter.holder );
					}
				);
			}
		},
		setHeight: function ( $holder ) {
			$holder.css( 'height', 'auto' );

			var footerHeight = $holder.outerHeight();

			if ( footerHeight > 0 ) {
				$( '#qodef-page-outer' ).css(
					{
						'margin-bottom': footerHeight,
						'background-color': qodefCore.body.css( 'backgroundColor' )
					}
				);

				$holder.css( 'height', footerHeight );
			}
		},
		addClass: function () {
			qodefCore.body.addClass( 'qodef-page-footer--uncover' );
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefHeaderScrollAppearance.init();
		}
	);

	var qodefHeaderScrollAppearance = {
		appearanceType: function () {
			return qodefCore.body.attr( 'class' ).indexOf( 'qodef-header-appearance--' ) !== -1 ? qodefCore.body.attr( 'class' ).match( /qodef-header-appearance--([\w]+)/ )[1] : '';
		},
		init: function () {
			var appearanceType = this.appearanceType();

			if ( appearanceType !== '' && appearanceType !== 'none' ) {
				qodefCore[appearanceType + 'HeaderAppearance']();
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
	    function () {
            qodefMobileHeaderAppearance.init();
        }
	);

	/*
	 **	Init mobile header functionality
	 */
	var qodefMobileHeaderAppearance = {
		init: function () {
			if ( qodefCore.body.hasClass( 'qodef-mobile-header-appearance--sticky' ) ) {

				var docYScroll1   = qodefCore.scroll,
					displayAmount = qodefGlobal.vars.mobileHeaderHeight + qodefGlobal.vars.adminBarHeight,
					$pageOuter    = $( '#qodef-page-outer' );

				qodefMobileHeaderAppearance.showHideMobileHeader( docYScroll1, displayAmount, $pageOuter );

				$( window ).scroll(
				    function () {
                        qodefMobileHeaderAppearance.showHideMobileHeader( docYScroll1, displayAmount, $pageOuter );
                        docYScroll1 = qodefCore.scroll;
                    }
				);

				$( window ).resize(
				    function () {
                        $pageOuter.css( 'padding-top', 0 );
                        qodefMobileHeaderAppearance.showHideMobileHeader( docYScroll1, displayAmount, $pageOuter );
                    }
				);
			}
		},
		showHideMobileHeader: function ( docYScroll1, displayAmount, $pageOuter ) {
			if ( qodefCore.windowWidth <= 1200 ) {
				if ( qodefCore.scroll > displayAmount * 2 ) {
					//set header to be fixed
					qodefCore.body.addClass( 'qodef-mobile-header--sticky' );

					//add transition to it
					setTimeout(
						function () {
							qodefCore.body.addClass( 'qodef-mobile-header--sticky-animation' );
						},
						300
					); //300 is duration of sticky header animation

					//add padding to content so there is no 'jumping'
					$pageOuter.css( 'padding-top', qodefGlobal.vars.mobileHeaderHeight );
				} else {
					//unset fixed header
					qodefCore.body.removeClass( 'qodef-mobile-header--sticky' );

					//remove transition
					setTimeout(
						function () {
							qodefCore.body.removeClass( 'qodef-mobile-header--sticky-animation' );
						},
						300
					); //300 is duration of sticky header animation

					//remove padding from content since header is not fixed anymore
					$pageOuter.css( 'padding-top', 0 );
				}

				if ( (qodefCore.scroll > docYScroll1 && qodefCore.scroll > displayAmount) || (qodefCore.scroll < displayAmount * 3) ) {
					//show sticky header
					qodefCore.body.removeClass( 'qodef-mobile-header--sticky-display' );
				} else {
					//hide sticky header
					qodefCore.body.addClass( 'qodef-mobile-header--sticky-display' );
				}
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefNavMenu.init();
		}
	);

	var qodefNavMenu = {
		init: function () {
			qodefNavMenu.wideDropdownPosition();
			qodefNavMenu.dropdownBehavior();
			qodefNavMenu.dropdownPosition();
		},
		dropdownBehavior: function () {
			var $menuItems = $( '.qodef-header-navigation > ul > li' );

			$menuItems.each(
				function () {
					var $thisItem = $( this );

					if ( $thisItem.find( '.qodef-drop-down-second' ).length ) {
						qodef.qodefWaitForImages.check(
							$thisItem,
							function () {
								var $dropdownHolder      = $thisItem.find( '.qodef-drop-down-second' ),
									$dropdownMenuItem    = $dropdownHolder.find( '.qodef-drop-down-second-inner ul' ),
									dropDownHolderHeight = $dropdownMenuItem.outerHeight();

								if ( navigator.userAgent.match( /(iPod|iPhone|iPad)/ ) ) {
									$thisItem.on(
										'touchstart mouseenter',
										function () {
											$dropdownHolder.css(
												{
													'height': dropDownHolderHeight,
													'overflow': 'visible',
													'visibility': 'visible',
													'opacity': '1',
												}
											);
										}
									).on(
										'mouseleave',
										function () {
											$dropdownHolder.css(
												{
													'height': '0px',
													'overflow': 'hidden',
													'visibility': 'hidden',
													'opacity': '0',
												}
											);
										}
									);
								} else {
									if ( qodefCore.body.hasClass( 'qodef-drop-down-second--animate-height' ) ) {
										var animateConfig = {
											interval: 0,
											over: function () {
												setTimeout(
													function () {
														$dropdownHolder.addClass( 'qodef-drop-down--start' ).css(
															{
																'visibility': 'visible',
																'height': '0',
																'opacity': '1',
															}
														);
														$dropdownHolder.stop().animate(
															{
																'height': dropDownHolderHeight,
															},
															400,
															'linear',
															function () {
																$dropdownHolder.css( 'overflow', 'visible' );
															}
														);
													},
													100
												);
											},
											timeout: 100,
											out: function () {
												$dropdownHolder.stop().animate(
													{
														'height': '0',
														'opacity': 0,
													},
													100,
													function () {
														$dropdownHolder.css(
															{
																'overflow': 'hidden',
																'visibility': 'hidden',
															}
														);
													}
												);

												$dropdownHolder.removeClass( 'qodef-drop-down--start' );
											}
										};

										$thisItem.hoverIntent( animateConfig );
									} else {
										var config = {
											interval: 0,
											over: function () {
												setTimeout(
													function () {
														$dropdownHolder.addClass( 'qodef-drop-down--start' ).stop().css( { 'height': dropDownHolderHeight } );
													},
													150
												);
											},
											timeout: 150,
											out: function () {
												$dropdownHolder.stop().css( { 'height': '0' } ).removeClass( 'qodef-drop-down--start' );
											}
										};

										$thisItem.hoverIntent( config );
									}
								}
							}
						);
					}
				}
			);
		},
		wideDropdownPosition: function () {
			var $menuItems = $( '.qodef-header-navigation > ul > li.qodef-menu-item--wide' );

			if ( $menuItems.length ) {
				$menuItems.each(
					function () {
						var $menuItem        = $( this );
						var $menuItemSubMenu = $menuItem.find( '.qodef-drop-down-second' );

						if ( $menuItemSubMenu.length ) {
							$menuItemSubMenu.css( 'left', 0 );

							var leftPosition  = $menuItemSubMenu.offset().left,
								menuFullWidth = qodefCore.body.hasClass( 'qodef-drop-down-second--full-width' ),
								menuIndented  = menuFullWidth && qodefCore.body.hasClass( 'qodef-drop-down-second-indentation--enabled' ),
								menuOffset    = menuIndented ? 40 : 0; // in px

							if ( qodefCore.body.hasClass( 'qodef--boxed' ) ) {
								//boxed layout case
								var boxedWidth = $( '.qodef--boxed #qodef-page-wrapper' ).outerWidth();
								leftPosition   = leftPosition - (qodefCore.windowWidth - boxedWidth) / 2;

								// wide dropdown full width and indented case
								if ( menuFullWidth ) {
									$menuItemSubMenu.css( {
										'left': -leftPosition + menuOffset,
										'width': boxedWidth - 2 * menuOffset
									} );
								} else {
									$menuItemSubMenu.css( {
										'left': -leftPosition,
										'width': boxedWidth
									} );
								}

							} else if ( menuFullWidth ) {
								//wide dropdown full width case
								$menuItemSubMenu.css( {
									'left': -leftPosition + menuOffset,
									'width': qodefCore.windowWidth - 2 * menuOffset
								} );
							} else {
								//wide dropdown in grid case
								$menuItemSubMenu.css( {
									'left': -leftPosition + (qodefCore.windowWidth - $menuItemSubMenu.width()) / 2
								} );
							}
						}
					}
				);
			}
		},
		dropdownPosition: function () {
			var $menuItems = $( '.qodef-header-navigation > ul > li.qodef-menu-item--narrow.menu-item-has-children' );

			if ( $menuItems.length ) {
				$menuItems.each(
					function () {
						var $thisItem         = $( this ),
							menuItemPosition  = $thisItem.offset().left,
							$dropdownHolder   = $thisItem.find( '.qodef-drop-down-second' ),
							$dropdownMenuItem = $dropdownHolder.find( '.qodef-drop-down-second-inner ul' ),
							dropdownMenuWidth = $dropdownMenuItem.outerWidth(),
							menuItemFromLeft  = $( window ).width() - menuItemPosition;

						if ( qodef.body.hasClass( 'qodef--boxed' ) ) {
							//boxed layout case
							var boxedWidth   = $( '.qodef--boxed #qodef-page-wrapper' ).outerWidth();
							menuItemFromLeft = boxedWidth - menuItemPosition;
						}

						var dropDownMenuFromLeft;

						if ( $thisItem.find( 'li.menu-item-has-children' ).length > 0 ) {
							dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
						}

						$dropdownHolder.removeClass( 'qodef-drop-down--right' );
						$dropdownMenuItem.removeClass( 'qodef-drop-down--right' );
						if ( menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth ) {
							$dropdownHolder.addClass( 'qodef-drop-down--right' );
							$dropdownMenuItem.addClass( 'qodef-drop-down--right' );
						}
					}
				);
			}
		}
	};

})( jQuery );

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

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefReview.init();
		}
	);

	var qodefReview = {
		init: function () {
			var ratingHolder = $( '#qodef-page-comments-form .qodef-rating-inner' );

			var addActive = function ( stars, ratingValue ) {
				for ( var i = 0; i < stars.length; i++ ) {
					var star = stars[i];

					if ( i < ratingValue ) {
						$( star ).addClass( 'active' );
					} else {
						$( star ).removeClass( 'active' );
					}
				}
			};

			ratingHolder.each(
				function () {
					var thisHolder  = $( this ),
						ratingInput = thisHolder.find( '.qodef-rating' ),
						ratingValue = ratingInput.val(),
						stars       = thisHolder.find( '.qodef-star-rating' );

					addActive( stars, ratingValue );

					stars.on(
						'click',
						function () {
							ratingInput.val( $( this ).data( 'value' ) ).trigger( 'change' );
						}
					);

					ratingInput.change(
						function () {
							ratingValue = ratingInput.val();

							addActive( stars, ratingValue );
						}
					);
				}
			);
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSideArea.init();
		}
	);

	var qodefSideArea = {
		init: function () {
			var $sideAreaOpener = $( 'a.qodef-side-area-opener' ),
				$sideAreaClose  = $( '#qodef-side-area-close' ),
				$sideArea       = $( '#qodef-side-area' );

			qodefSideArea.openerHoverColor( $sideAreaOpener );

			// Open Side Area
			$sideAreaOpener.on(
				'click',
				function ( e ) {
					e.preventDefault();

					if ( ! qodefCore.body.hasClass( 'qodef-side-area--opened' ) ) {
						qodefSideArea.openSideArea();

						$( document ).keyup(
							function ( e ) {
								if ( e.keyCode === 27 ) {
									qodefSideArea.closeSideArea();
								}
							}
						);
					} else {
						qodefSideArea.closeSideArea();
					}
				}
			);

			$sideAreaClose.on(
				'click',
				function ( e ) {
					e.preventDefault();
					qodefSideArea.closeSideArea();
				}
			);

			if ( $sideArea.length && typeof qodefCore.qodefPerfectScrollbar === 'object' ) {
				qodefCore.qodefPerfectScrollbar.init( $sideArea );
			}
		},
		openSideArea: function () {
			var $wrapper      = $( '#qodef-page-wrapper' );
			var currentScroll = $( window ).scrollTop();

			$( '.qodef-side-area-cover' ).remove();
			$wrapper.prepend( '<div class="qodef-side-area-cover"/>' );
			qodefCore.body.removeClass( 'qodef-side-area-animate--out' ).addClass( 'qodef-side-area--opened qodef-side-area-animate--in' );

			$( '.qodef-side-area-cover' ).on(
				'click',
				function ( e ) {
					e.preventDefault();
					qodefSideArea.closeSideArea();
				}
			);

			$( window ).scroll(
				function () {
					if ( Math.abs( qodefCore.scroll - currentScroll ) > 400 ) {
						qodefSideArea.closeSideArea();
					}
				}
			);
		},
		closeSideArea: function () {
			qodefCore.body.removeClass( 'qodef-side-area--opened qodef-side-area-animate--in' ).addClass( 'qodef-side-area-animate--out' );
		},
		openerHoverColor: function ( $opener ) {
			if ( typeof $opener.data( 'hover-color' ) !== 'undefined' ) {
				var hoverColor    = $opener.data( 'hover-color' );
				var originalColor = $opener.css( 'color' );

				$opener.on(
					'mouseenter',
					function () {
						$opener.css( 'color', hoverColor );
					}
				).on(
					'mouseleave',
					function () {
						$opener.css( 'color', originalColor );
					}
				);
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function() {
			qodefSpinner.init();
		}
	);

	$( window ).on(
		'load',
		function () {
			qodefSpinner.windowLoaded = true;

			if (document.visibilityState === 'visible') {
				qodefSpinner.fadeOutLoader();
			} else {
				document.addEventListener("visibilitychange", function() {
					if (document.visibilityState === 'visible') {
						qodefSpinner.fadeOutLoader();
					}
				});
			}
		}
	);

	$( window ).on(
		'elementor/frontend/init',
		function () {
			var isEditMode = Boolean( elementorFrontend.isEditMode() );

			if ( isEditMode ) {
				qodefSpinner.init( isEditMode );
			}
		}
	);

	var qodefSpinner = {
		holder: '',
		windowLoaded: false,
		init: function ( isEditMode ) {
			this.holder = $( '#qodef-page-spinner:not(.qodef--custom-spinner):not(.qodef-layout--textual)' );

			if ( this.holder.length ) {
				qodefSpinner.animateSpinner( isEditMode );
				qodefSpinner.fadeOutAnimation();
			}
		},
		animateSpinner: function ( isEditMode ) {

			if ( isEditMode ) {
				qodefSpinner.fadeOutLoader();
			}
		},
		fadeOutLoader: function ( speed, delay, easing ) {
			var $holder = qodefSpinner.holder.length ? qodefSpinner.holder : $( '#qodef-page-spinner:not(.qodef--custom-spinner):not(.qodef-layout--textual)' );

			speed  = speed ? speed : 600;
			delay  = delay ? delay : 0;
			easing = easing ? easing : 'swing';

			$holder.delay( delay ).fadeOut( speed, easing );

			$( window ).on(
				'bind',
				'pageshow',
				function ( event ) {
					if ( event.originalEvent.persisted ) {
						$holder.fadeOut( speed, easing );
					}
				}
			);
		},
		fadeOutAnimation: function () {

			// Check for fade out animation
			if ( qodefCore.body.hasClass( 'qodef-spinner--fade-out' ) ) {
				var $pageHolder = $( '#qodef-page-wrapper' ),
					$linkItems  = $( 'a' );

				// If back button is pressed, then show content to avoid state where content is on display:none
				window.addEventListener(
					'pageshow',
					function ( event ) {
						var historyPath = event.persisted || (typeof window.performance !== 'undefined' && window.performance.navigation.type === 2);
						if ( historyPath && ! $pageHolder.is( ':visible' ) ) {
							$pageHolder.show();
						}
					}
				);

				$linkItems.on(
					'click',
					function ( e ) {
						var $clickedLink = $( this );

						if (
							e.which === 1 && // check if the left mouse button has been pressed
							$clickedLink.attr( 'href' ).indexOf( window.location.host ) >= 0 && // check if the link is to the same domain
							! $clickedLink.hasClass( 'remove' ) && // check is WooCommerce remove link
							$clickedLink.parent( '.product-remove' ).length <= 0 && // check is WooCommerce remove link
							$clickedLink.parents( '.woocommerce-product-gallery__image' ).length <= 0 && // check is product gallery link
							typeof $clickedLink.data( 'rel' ) === 'undefined' && // check pretty photo link
							typeof $clickedLink.attr( 'rel' ) === 'undefined' && // check VC pretty photo link
							! $clickedLink.hasClass( 'lightbox-active' ) && // check is lightbox plugin active
							(typeof $clickedLink.attr( 'target' ) === 'undefined' || $clickedLink.attr( 'target' ) === '_self') && // check if the link opens in the same window
							$clickedLink.attr( 'href' ).split( '#' )[0] !== window.location.href.split( '#' )[0] // check if it is an anchor aiming for a different page
						) {
							e.preventDefault();

							$pageHolder.fadeOut(
								600,
								'swing',
								function () {
									window.location = $clickedLink.attr( 'href' );
								}
							);
						}
					}
				);
			}
		}
	};

	qodefCore.qodefSpinner = qodefSpinner;

})( jQuery );

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

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_accordion = {};

	$( document ).ready(
		function () {
			qodefAccordion.init();
		}
	);

	var qodefAccordion = {
		init: function () {
			var $holder = $( '.qodef-accordion' );

			if ( $holder.length ) {
				$holder.each(
					function () {
						qodefAccordion.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			if ( $currentItem.hasClass( 'qodef-behavior--accordion' ) ) {
				qodefAccordion.initAccordion( $currentItem );
			}

			if ( $currentItem.hasClass( 'qodef-behavior--toggle' ) ) {
				qodefAccordion.initToggle( $currentItem );
			}

			$currentItem.addClass( 'qodef--init' );
		},
		initAccordion: function ( $accordion ) {
			$accordion.accordion(
				{
					animate: 'swing',
					collapsible: true,
					active: 0,
					icons: '',
					heightStyle: 'auto',
				}
			);
		},
		initToggle: function ( $toggle ) {
			var $toggleAccordionTitle = $toggle.find( '.qodef-accordion-title' );

			$toggleAccordionTitle.off().on(
				'mouseenter',
				function () {
					$( this ).addClass( 'ui-state-hover' );
				}
			).on(
				'mouseleave',
				function () {
					$( this ).removeClass( 'ui-state-hover' );
				}
			).on(
				'click',
				function ( e ) {
					e.preventDefault();
					e.stopImmediatePropagation();

					var $thisTitle = $( this );

					if ( $thisTitle.hasClass( 'ui-state-active' ) ) {
						$thisTitle.removeClass( 'ui-state-active' );
						$thisTitle.next().removeClass( 'ui-accordion-content-active' ).slideUp( 300 );
					} else {
						$thisTitle.addClass( 'ui-state-active' );
						$thisTitle.next().addClass( 'ui-accordion-content-active' ).slideDown( 400 );
					}
				}
			);
		}
	};

	qodefCore.shortcodes.protalks_core_accordion.qodefAccordion = qodefAccordion;

})( jQuery );

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

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_countdown = {};

	$( document ).ready(
		function () {
			qodefCountdown.init();
		}
	);

	var qodefCountdown = {
		init: function () {
			this.countdowns = $( '.qodef-countdown' );

			if ( this.countdowns.length ) {
				this.countdowns.each(
					function () {
						qodefCountdown.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			var $countdownElement = $currentItem.find( '.qodef-m-date' ),
				options           = qodefCountdown.generateOptions( $currentItem );

			qodefCountdown.initCountdown(
				$countdownElement,
				options
			);
		},
		generateOptions: function ( $countdown ) {
			var options  = {};
			options.date = typeof $countdown.data( 'date' ) !== 'undefined' ? $countdown.data( 'date' ) : null;
			options.hide = typeof $countdown.data( 'hide' ) !== 'undefined' ? $countdown.data( 'hide' ) : null;

			options.weekLabel         = typeof $countdown.data( 'week-label' ) !== 'undefined' ? $countdown.data( 'week-label' ) : 'Week';
			options.weekLabelPlural   = typeof $countdown.data( 'week-label-plural' ) !== 'undefined' ? $countdown.data( 'week-label-plural' ) : 'Weeks';
			options.dayLabel          = typeof $countdown.data( 'day-label' ) !== 'undefined' ? $countdown.data( 'day-label' ) : 'Day';
			options.dayLabelPlural    = typeof $countdown.data( 'day-label-plural' ) !== 'undefined' ? $countdown.data( 'day-label-plural' ) : 'Days';
			options.hourLabel         = typeof $countdown.data( 'hour-label' ) !== 'undefined' ? $countdown.data( 'hour-label' ) : 'Hour';
			options.hourLabelPlural   = typeof $countdown.data( 'hour-label-plural' ) !== 'undefined' ? $countdown.data( 'hour-label-plural' ) : 'Hours';
			options.minuteLabel       = typeof $countdown.data( 'minute-label' ) !== 'undefined' ? $countdown.data( 'minute-label' ) : 'Minute';
			options.minuteLabelPlural = typeof $countdown.data( 'minute-label-plural' ) !== 'undefined' ? $countdown.data( 'minute-label-plural' ) : 'Minutes';
			options.secondLabel       = typeof $countdown.data( 'second-label' ) !== 'undefined' ? $countdown.data( 'second-label' ) : 'Second';
			options.secondLabelPlural = typeof $countdown.data( 'second-label-plural' ) !== 'undefined' ? $countdown.data( 'second-label-plural' ) : 'Seconds';

			return options;
		},
		initCountdown: function ( $countdownElement, options ) {
			var countDownDate = new Date( options.date ).getTime();

			// Update the count down every 1 second.
			var x = setInterval(
				function () {

					// Get today's date and time.
					var now = new Date().getTime();

					// Find the distance between now and the count-down date.
					var distance = countDownDate - now;

					// Time calculations for days, hours, minutes and seconds.
					var weeks   = Math.floor( distance / (1000 * 60 * 60 * 24 * 7) );
					var days    = Math.floor( (distance % (1000 * 60 * 60 * 24 * 7)) / (1000 * 60 * 60 * 24) );
					var hours   = Math.floor( (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60) );
					var minutes = Math.floor( (distance % (1000 * 60 * 60)) / (1000 * 60) );
					var seconds = Math.floor( (distance % (1000 * 60)) / 1000 );

					if ( 'weeks' === options.hide ) {
						days = Math.floor( distance / (1000 * 60 * 60 * 24) );
					}

					var $weeksHolder  = $countdownElement.find( '.qodef-weeks' );
					var $daysHolder    = $countdownElement.find( '.qodef-days' );
					var $hoursHolder   = $countdownElement.find( '.qodef-hours' );
					var $minutesHolder = $countdownElement.find( '.qodef-minutes' );
					var $secondsHolder = $countdownElement.find( '.qodef-seconds' );

					$weeksHolder.find( '.qodef-label' ).html( ( 1 === weeks ) ? options.weekLabel : options.weekLabelPlural );
					$daysHolder.find( '.qodef-label' ).html( ( 1 === days ) ? options.dayLabel : options.dayLabelPlural );
					$hoursHolder.find( '.qodef-label' ).html( ( 1 === hours ) ? options.hourLabel : options.hourLabelPlural );
					$minutesHolder.find( '.qodef-label' ).html( ( 1 === minutes ) ? options.minuteLabel : options.minuteLabelPlural );
					$secondsHolder.find( '.qodef-label' ).html( ( 1 === seconds ) ? options.secondLabel : options.secondLabelPlural );

					weeks   = (weeks < 10) ? '0' + weeks : weeks;
					days    = (days < 10) ? '0' + days : days;
					hours   = (hours < 10) ? '0' + hours : hours;
					minutes = (minutes < 10) ? '0' + minutes : minutes;
					seconds = (seconds < 10) ? '0' + seconds : seconds;

					$weeksHolder.find( '.qodef-digit' ).html( weeks );
					$daysHolder.find( '.qodef-digit' ).html( days );
					$hoursHolder.find( '.qodef-digit' ).html( hours );
					$minutesHolder.find( '.qodef-digit' ).html( minutes );
					$secondsHolder.find( '.qodef-digit' ).html( seconds );

					// If the count down is finished, write some text.
					if ( distance < 0 ) {
						clearInterval( x );
						$weeksHolder.find( '.qodef-label' ).html( options.weekLabelPlural );
						$daysHolder.find( '.qodef-label' ).html( options.dayLabelPlural );
						$hoursHolder.find( '.qodef-label' ).html( options.hourLabelPlural );
						$minutesHolder.find( '.qodef-label' ).html( options.minuteLabelPlural );
						$secondsHolder.find( '.qodef-label' ).html( options.secondLabelPlural );

						$weeksHolder.find( '.qodef-digit' ).html( '00' );
						$daysHolder.find( '.qodef-digit' ).html( '00' );
						$hoursHolder.find( '.qodef-digit' ).html( '00' );
						$minutesHolder.find( '.qodef-digit' ).html( '00' );
						$secondsHolder.find( '.qodef-digit' ).html( '00' );
					}
				},
				1000
			);
		}
	};

	qodefCore.shortcodes.protalks_core_countdown.qodefCountdown = qodefCountdown;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_counter = {};

	$( document ).ready(
		function () {
			qodefCounter.init();
		}
	);

	var qodefCounter = {
		init: function () {
			this.counters = $( '.qodef-counter' );

			if ( this.counters.length ) {
				this.counters.each(
					function () {
						qodefCounter.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			var $counterElement = $currentItem.find( '.qodef-m-digit' ),
				options         = qodefCounter.generateOptions( $currentItem );

			qodefCore.qodefIsInViewport.check(
				$currentItem,
				function () {
					qodefCounter.counterScript( $counterElement, options );
				},
			);
		},
		generateOptions: function ( $counter ) {
			var options   = {};
			options.start = typeof $counter.data( 'start-digit' ) !== 'undefined' && $counter.data( 'start-digit' ) !== '' ? $counter.data( 'start-digit' ) : 0;
			options.end   = typeof $counter.data( 'end-digit' ) !== 'undefined' && $counter.data( 'end-digit' ) !== '' ? $counter.data( 'end-digit' ) : null;
			options.step  = typeof $counter.data( 'step-digit' ) !== 'undefined' && $counter.data( 'step-digit' ) !== '' ? $counter.data( 'step-digit' ) : 1;
			options.delay = typeof $counter.data( 'step-delay' ) !== 'undefined' && $counter.data( 'step-delay' ) !== '' ? parseInt( $counter.data( 'step-delay' ), 10 ) : 100;
			options.txt   = typeof $counter.data( 'digit-label' ) !== 'undefined' && $counter.data( 'digit-label' ) !== '' ? $counter.data( 'digit-label' ) : '';

			return options;
		},
		counterScript: function ( $counterElement, options ) {
			var defaults = {
				start: 0,
				end: null,
				step: 1,
				delay: 50,
				txt: '',
			};

			var settings = $.extend( defaults, options || {} );
			var nb_start = settings.start;
			var nb_end   = settings.end;

			$counterElement.text( nb_start + settings.txt );

			// Timer
			// Launches every "settings.delay"
			var counterInterval = setInterval(
				function () {
					// Definition of conditions of arrest
					if ( nb_end !== null && nb_start >= nb_end ) {
						return;
					}

					// incrementation
					nb_start = nb_start + settings.step;

					// Check is ended
					if ( nb_start >= nb_end ) {
						nb_start = nb_end;

						clearInterval( counterInterval );
					}

					// display
					$counterElement.text( nb_start + settings.txt );
				},
				settings.delay
			);
		}
	};

	qodefCore.shortcodes.protalks_core_counter.qodefCounter = qodefCounter;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_custom_font = {};

	qodefCore.shortcodes.protalks_core_custom_font.qodefAppear = qodefCore.qodefAppear;

})( jQuery );

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

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_icon = {};

	$( document ).ready(
		function () {
			qodefIcon.init();
		}
	);

	var qodefIcon = {
		init: function () {
			this.icons = $( '.qodef-icon-holder' );

			if ( this.icons.length ) {
				this.icons.each(
					function () {
						qodefIcon.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			qodefIcon.iconHoverColor( $currentItem );
			qodefIcon.iconHoverBgColor( $currentItem );
			qodefIcon.iconHoverBorderColor( $currentItem );
		},
		iconHoverColor: function ( $iconHolder ) {
			if ( typeof $iconHolder.data( 'hover-color' ) !== 'undefined' ) {
				var spanHolder    = $iconHolder.find( 'span' ).length ? $iconHolder.find( 'span' ) : $iconHolder;
				var originalColor = spanHolder.css( 'color' );
				var hoverColor    = $iconHolder.data( 'hover-color' );

				$iconHolder.on(
					'mouseenter',
					function () {
						qodefIcon.changeColor(
							spanHolder,
							'color',
							hoverColor
						);
					}
				);
				$iconHolder.on(
					'mouseleave',
					function () {
						qodefIcon.changeColor(
							spanHolder,
							'color',
							originalColor
						);
					}
				);
			}
		},
		iconHoverBgColor: function ( $iconHolder ) {
			if ( typeof $iconHolder.data( 'hover-background-color' ) !== 'undefined' ) {
				var hoverBackgroundColor    = $iconHolder.data( 'hover-background-color' );
				var originalBackgroundColor = $iconHolder.css( 'background-color' );

				$iconHolder.on(
					'mouseenter',
					function () {
						qodefIcon.changeColor(
							$iconHolder,
							'background-color',
							hoverBackgroundColor
						);
					}
				);
				$iconHolder.on(
					'mouseleave',
					function () {
						qodefIcon.changeColor(
							$iconHolder,
							'background-color',
							originalBackgroundColor
						);
					}
				);
			}
		},
		iconHoverBorderColor: function ( $iconHolder ) {
			if ( typeof $iconHolder.data( 'hover-border-color' ) !== 'undefined' ) {
				var hoverBorderColor    = $iconHolder.data( 'hover-border-color' );
				var originalBorderColor = $iconHolder.css( 'borderTopColor' );

				$iconHolder.on(
					'mouseenter',
					function () {
						qodefIcon.changeColor(
							$iconHolder,
							'border-color',
							hoverBorderColor
						);
					}
				);
				$iconHolder.on(
					'mouseleave',
					function () {
						qodefIcon.changeColor(
							$iconHolder,
							'border-color',
							originalBorderColor
						);
					}
				);
			}
		},
		changeColor: function ( iconElement, cssProperty, color ) {
			iconElement.css(
				cssProperty,
				color
			);
		}
	};

	qodefCore.shortcodes.protalks_core_icon.qodefIcon = qodefIcon;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_image_gallery                    = {};
	qodefCore.shortcodes.protalks_core_image_gallery.qodefSwiper        = qodef.qodefSwiper;
	qodefCore.shortcodes.protalks_core_image_gallery.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.protalks_core_image_gallery.qodefMagnificPopup = qodef.qodefMagnificPopup;
	qodefCore.shortcodes.protalks_core_image_gallery.qodefCustomCursor  = qodefCore.qodefCustomCursor;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_image_with_text                    = {};
	qodefCore.shortcodes.protalks_core_image_with_text.qodefMagnificPopup = qodef.qodefMagnificPopup;
	qodefCore.shortcodes.protalks_core_image_with_text.qodefAppear        = qodefCore.qodefAppear;
})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_progress_bar = {};

	$( document ).ready(
		function () {
			qodefProgressBar.init();
		}
	);

	/**
	 * Init progress bar shortcode functionality
	 */
	var qodefProgressBar = {
		init: function () {
			this.holder = $( '.qodef-progress-bar' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {
						qodefProgressBar.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			var layout = $currentItem.data( 'layout' );

			qodefCore.qodefIsInViewport.check(
				$currentItem,
				function () {
					$currentItem.addClass( 'qodef--init' );

					var $container = $currentItem.find( '.qodef-m-canvas' ),
						data       = qodefProgressBar.generateBarData( $currentItem, layout ),
						number     = $currentItem.data( 'number' ) / 100;

					switch (layout) {
						case 'circle':
							qodefProgressBar.initCircleBar( $container, data, number );
							break;
						case 'semi-circle':
							qodefProgressBar.initSemiCircleBar( $container, data, number );
							break;
						case 'line':
							data = qodefProgressBar.generateLineData( $currentItem, number );
							qodefProgressBar.initLineBar( $container, data );
							break;
						case 'custom':
							qodefProgressBar.initCustomBar( $container, data, number );
							break;
					}
				},
			);
		},
		generateBarData: function ( thisBar, layout ) {
			var activeWidth   = thisBar.data( 'active-line-width' );
			var activeColor   = thisBar.data( 'active-line-color' );
			var inactiveWidth = thisBar.data( 'inactive-line-width' );
			var inactiveColor = thisBar.data( 'inactive-line-color' );
			var easing        = 'linear';
			var duration      = typeof thisBar.data( 'duration' ) !== 'undefined' && thisBar.data( 'duration' ) !== '' ? parseInt( thisBar.data( 'duration' ), 10 ) : 1600;
			var textColor     = thisBar.data( 'text-color' );

			return {
				strokeWidth: activeWidth,
				color: activeColor,
				trailWidth: inactiveWidth,
				trailColor: inactiveColor,
				easing: easing,
				duration: duration,
				svgStyle: {
					width: '100%',
					height: '100%'
				},
				text: {
					style: {
						color: textColor
					},
					autoStyleContainer: false
				},
				from: {
					color: inactiveColor
				},
				to: {
					color: activeColor
				},
				step: function ( state, bar ) {
					if ( layout !== 'custom' ) {
						bar.setText( Math.round( bar.value() * 100 ) + '%' );
					}
				},
			};
		},
		generateLineData: function ( thisBar, number ) {
			var height         = thisBar.data( 'active-line-width' );
			var activeColor    = thisBar.data( 'active-line-color' );
			var inactiveHeight = thisBar.data( 'inactive-line-width' );
			var inactiveColor  = thisBar.data( 'inactive-line-color' );
			var duration       = typeof thisBar.data( 'duration' ) !== 'undefined' && thisBar.data( 'duration' ) !== '' ? parseInt( thisBar.data( 'duration' ), 10 ) : 1600;
			var textColor      = thisBar.data( 'text-color' );

			return {
				percentage: number * 100,
				duration: duration,
				fillBackgroundColor: activeColor,
				backgroundColor: inactiveColor,
				height: height,
				inactiveHeight: inactiveHeight,
				followText: thisBar.hasClass( 'qodef-percentage--floating' ),
				textColor: textColor,
			};
		},
		initCircleBar: function ( $container, data, number ) {
			if ( qodefProgressBar.checkBar( $container ) ) {
				var $bar = new ProgressBar.Circle( $container[0], data );

				$bar.animate( number );
			}
		},
		initSemiCircleBar: function ( $container, data, number ) {
			if ( qodefProgressBar.checkBar( $container ) ) {
				var $bar = new ProgressBar.SemiCircle( $container[0], data );

				$bar.animate( number );
			}
		},
		initCustomBar: function ( $container, data, number ) {
			if ( qodefProgressBar.checkBar( $container ) ) {
				var $bar = new ProgressBar.Path( $container[0], data );

				$bar.set( 0 );
				$bar.animate( number );
			}
		},
		initLineBar: function ( $container, data ) {
			$container.LineProgressbar( data );
		},
		checkBar: function ( $container ) {
			// check if svg is already in container, elementor fix
			return ! $container.find( 'svg' ).length;
		}
	};

	qodefCore.shortcodes.protalks_core_progress_bar.qodefProgressBar = qodefProgressBar;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.carsten_core_single_image = {};

	qodefCore.shortcodes.carsten_core_single_image.qodefAppear      = qodefCore.qodefAppear;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_stacked_images = {};

	qodefCore.shortcodes.protalks_core_stacked_images.qodefAppear = qodefCore.qodefAppear;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_tabs = {};

	$( document ).ready(
		function () {
			qodefTabs.init();
		}
	);

	var qodefTabs = {
		init: function () {
			this.holder = $( '.qodef-tabs' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {
						qodefTabs.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			$currentItem.children( '.qodef-tabs-content' ).each(
				function ( index ) {
					index = index + 1;

					var $that    = $( this ),
						link     = $that.attr( 'id' ),
						$navItem = $that.parent().find( '.qodef-tabs-navigation li:nth-child(' + index + ') a' ),
						navLink  = $navItem.attr( 'href' );

					link = '#' + link;

					if ( link.indexOf( navLink ) > -1 ) {
						$navItem.attr(
							'href',
							link
						);
					}
				}
			);

			$currentItem.addClass( 'qodef--init' ).tabs();
		},
		setHeight ( $holder ) {
			var $navigation      = $holder.find( '.qodef-tabs-navigation' ),
				$content         = $holder.find( '.qodef-tabs-content' ),
				navHeight,
				contentHeight,
				maxContentHeight = 0;

			if ( $navigation.length ) {
				navHeight = $navigation.outerHeight( true );
			}

			if ( $content.length ) {
				$content.each(
					function () {
						contentHeight = $( this ).outerHeight( true );
						maxContentHeight = contentHeight > maxContentHeight ? contentHeight : maxContentHeight;
					}
				)
			}

			$holder.height(navHeight + maxContentHeight);
		}
	};

	qodefCore.shortcodes.protalks_core_tabs.qodefTabs = qodefTabs;

})( jQuery );

(function ($) {
	'use strict';

	qodefCore.shortcodes.protalks_core_text_marquee = {};

	$(document).ready(
		function () {
			qodefTextMarquee.init();
		}
	);

	$(window).resize(
		function () {
			qodefTextMarquee.init();
		}
	);

	var qodefTextMarquee = {
		init               : function () {
			this.holder = $('.qodef-text-marquee');

			if (this.holder.length) {
				this.holder.each(
					function () {
						qodefTextMarquee.prepareContent($(this));
						qodefTextMarquee.calculateWidthRatio($(this));
					}
				);
			}
		},
		prepareContent     : function ($currentItem) {
			var $contentInnerCopy = $currentItem.find('.qodef--copy');

			// remove holder init class
			$currentItem.removeClass('qodef--init');

			// remove duplicated content
			if ($contentInnerCopy.length) {
				$contentInnerCopy.remove();
			}
		},
		calculateWidthRatio: function ($currentItem) {
			var $content = $currentItem.find('.qodef-m-content'),
				$contentInner = $content.find('.qodef-m-content-inner'),
				multiplyCoef = $contentInner.outerWidth() > 0 ? Math.ceil($content.outerWidth() / $contentInner.outerWidth()) : 1,
				i;

			if ($contentInner.html().length) {
				// duplicate content at least once
				for (i = 0; i < multiplyCoef; i++) {
					qodefTextMarquee.duplicateContent($content, $contentInner);
				}
			}

			// add holder init class
			$currentItem.addClass('qodef--init');
		},
		duplicateContent   : function ($content, $contentInner) {
			$contentInner.clone().appendTo($content).addClass('qodef--copy');
		},
	};

	qodefCore.shortcodes.protalks_core_text_marquee.qodefTextMarquee = qodefTextMarquee;

})(jQuery);

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_textual_projects_showcase = {};
	qodefCore.shortcodes.protalks_core_textual_projects_showcase.qodefAppear = qodefCore.qodefAppear;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_video_button                    = {};
	qodefCore.shortcodes.protalks_core_video_button.qodefMagnificPopup = qodef.qodefMagnificPopup;

})( jQuery );

(function ( $ ) {
	'use strict';

	var shortcode = 'protalks_core_blog_list';

	qodefCore.shortcodes[shortcode] = {};

	if ( typeof qodefCore.listShortcodesScripts === 'object' ) {
		$.each(
			qodefCore.listShortcodesScripts,
			function ( key, value ) {
				qodefCore.shortcodes[shortcode][key] = value;
			}
		);
	}

	qodefCore.shortcodes[shortcode].qodefResizeIframes = qodef.qodefResizeIframes;

})( jQuery );

(function ( $ ) {
	'use strict';

	var fixedHeaderAppearance = {
		showHideHeader: function ( $pageOuter, $header ) {
			if ( qodefCore.windowWidth > 1200 ) {
				if ( qodefCore.scroll <= 0 ) {
					qodefCore.body.removeClass( 'qodef-header--fixed-display' );
					$pageOuter.css( 'padding-top', '0' );
					$header.css( 'margin-top', '0' );
				} else {
					qodefCore.body.addClass( 'qodef-header--fixed-display' );
					$pageOuter.css( 'padding-top', parseInt( qodefGlobal.vars.headerHeight + qodefGlobal.vars.topAreaHeight ) + 'px' );
					$header.css( 'margin-top', parseInt( qodefGlobal.vars.topAreaHeight ) + 'px' );
				}
			}
		},
		init: function () {

			if ( ! qodefCore.body.hasClass( 'qodef-header--vertical' ) ) {
				var $pageOuter = $( '#qodef-page-outer' ),
					$header    = $( '#qodef-page-header' );

				fixedHeaderAppearance.showHideHeader( $pageOuter, $header );

				$( window ).scroll(
					function () {
						fixedHeaderAppearance.showHideHeader( $pageOuter, $header );
					}
				);

				$( window ).resize(
					function () {
						$pageOuter.css( 'padding-top', '0' );
						fixedHeaderAppearance.showHideHeader( $pageOuter, $header );
					}
				);
			}
		}
	};

	qodefCore.fixedHeaderAppearance = fixedHeaderAppearance.init;

})( jQuery );

(function ( $ ) {
	'use strict';

	var stickyHeaderAppearance = {
		header: '',
		docYScroll: 0,
		init: function () {
			var displayAmount = stickyHeaderAppearance.displayAmount();

			// Set variables
			stickyHeaderAppearance.header 	  = $( '.qodef-header-sticky' );
			stickyHeaderAppearance.docYScroll = $( document ).scrollTop();

			// Set sticky visibility
			stickyHeaderAppearance.setVisibility( displayAmount );

			$( window ).scroll(
				function () {
					stickyHeaderAppearance.setVisibility( displayAmount );
				}
			);
		},
		displayAmount: function () {
			if ( qodefGlobal.vars.qodefStickyHeaderScrollAmount !== 0 ) {
				return parseInt( qodefGlobal.vars.qodefStickyHeaderScrollAmount, 10 );
			} else {
				return parseInt( qodefGlobal.vars.headerHeight + qodefGlobal.vars.adminBarHeight, 10 );
			}
		},
		setVisibility: function ( displayAmount ) {
			var isStickyHidden = qodefCore.scroll < displayAmount;

			if ( stickyHeaderAppearance.header.hasClass( 'qodef-appearance--up' ) ) {
				var currentDocYScroll = $( document ).scrollTop();

				isStickyHidden = (currentDocYScroll > stickyHeaderAppearance.docYScroll && currentDocYScroll > displayAmount) || (currentDocYScroll < displayAmount);

				stickyHeaderAppearance.docYScroll = $( document ).scrollTop();
			}

			stickyHeaderAppearance.showHideHeader( isStickyHidden );
		},
		showHideHeader: function ( isStickyHidden ) {
			if ( isStickyHidden ) {
				qodefCore.body.removeClass( 'qodef-header--sticky-display' );
			} else {
				qodefCore.body.addClass( 'qodef-header--sticky-display' );
			}
		},
	};

	qodefCore.stickyHeaderAppearance = stickyHeaderAppearance.init;

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSideAreaMobileHeader.init();
		}
	);

	var qodefSideAreaMobileHeader = {
		init: function () {
			var $holder = $( '#qodef-side-area-mobile-header' );

			if ( $holder.length && qodefCore.body.hasClass( 'qodef-mobile-header--side-area' ) ) {
				var $navigation = $holder.find( '.qodef-m-navigation' );

				qodefSideAreaMobileHeader.initOpenerTrigger( $holder, $navigation );
				qodefSideAreaMobileHeader.initNavigationClickToggle( $navigation );

				if ( typeof qodefCore.qodefPerfectScrollbar === 'object' ) {
					qodefCore.qodefPerfectScrollbar.init( $holder );
				}
			}
		},
		initOpenerTrigger: function ( $holder, $navigation ) {
			var $openerIcon = $( '.qodef-side-area-mobile-header-opener' ),
				$closeIcon  = $holder.children( '.qodef-m-close' );

			if ( $openerIcon.length && $navigation.length ) {
				$openerIcon.on(
					'tap click',
					function ( e ) {
						e.stopPropagation();
						e.preventDefault();

						if ( $holder.hasClass( 'qodef--opened' ) ) {
							$holder.removeClass( 'qodef--opened' );
						} else {
							$holder.addClass( 'qodef--opened' );
						}
					}
				);
			}

			$closeIcon.on(
				'tap click',
				function ( e ) {
					e.stopPropagation();
					e.preventDefault();

					if ( $holder.hasClass( 'qodef--opened' ) ) {
						$holder.removeClass( 'qodef--opened' );
					}
				}
			);
		},
		initNavigationClickToggle: function ( $navigation ) {
			var $menuItems = $navigation.find( 'ul li.menu-item-has-children' );

			$menuItems.each(
				function () {
					var $thisItem        = $( this ),
						$elementToExpand = $thisItem.find( ' > .qodef-drop-down-second, > ul' ),
						$dropdownOpener  = $thisItem.find( '> .qodef-menu-item-arrow' ),
						slideUpSpeed     = 'fast',
						slideDownSpeed   = 'slow';

					$dropdownOpener.on(
						'click tap',
						function ( e ) {
							e.preventDefault();
							e.stopPropagation();

							if ( $elementToExpand.is( ':visible' ) ) {
								$thisItem.removeClass( 'qodef-menu-item--open' );
								$elementToExpand.slideUp( slideUpSpeed );
							} else if ( $dropdownOpener.parent().parent().children().hasClass( 'qodef-menu-item--open' ) && $dropdownOpener.parent().parent().parent().hasClass( 'qodef-vertical-menu' ) ) {
								$thisItem.parent().parent().children().removeClass( 'qodef-menu-item--open' );
								$thisItem.parent().parent().children().find( ' > .qodef-drop-down-second' ).slideUp( slideUpSpeed );

								$thisItem.addClass( 'qodef-menu-item--open' );
								$elementToExpand.slideDown( slideDownSpeed );
							} else {

								if ( ! $thisItem.parents( 'li' ).hasClass( 'qodef-menu-item--open' ) ) {
									$menuItems.removeClass( 'qodef-menu-item--open' );
									$menuItems.find( ' > .qodef-drop-down-second, > ul' ).slideUp( slideUpSpeed );
								}

								if ( $thisItem.parent().parent().children().hasClass( 'qodef-menu-item--open' ) ) {
									$thisItem.parent().parent().children().removeClass( 'qodef-menu-item--open' );
									$thisItem.parent().parent().children().find( ' > .qodef-drop-down-second, > ul' ).slideUp( slideUpSpeed );
								}

								$thisItem.addClass( 'qodef-menu-item--open' );
								$elementToExpand.slideDown( slideDownSpeed );
							}
						}
					);
				}
			);
		},
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSearchCoversHeader.init();
		}
	);

	var qodefSearchCoversHeader = {
		init: function () {
			var $searchOpener = $( 'a.qodef-search-opener' ),
				$searchForm   = $( '.qodef-search-cover-form' ),
				$searchClose  = $searchForm.find( '.qodef-m-close' );

			if ( $searchOpener.length && $searchForm.length ) {
				$searchOpener.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefSearchCoversHeader.openCoversHeader( $searchForm );
					}
				);
				$searchClose.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefSearchCoversHeader.closeCoversHeader( $searchForm );
					}
				);
			}
		},
		openCoversHeader: function ( $searchForm ) {
			qodefCore.body.addClass( 'qodef-covers-search--opened qodef-covers-search--fadein' );
			qodefCore.body.removeClass( 'qodef-covers-search--fadeout' );

			setTimeout(
				function () {
					$searchForm.find( '.qodef-m-form-field' ).focus();
				},
				600
			);
		},
		closeCoversHeader: function ( $searchForm ) {
			qodefCore.body.removeClass( 'qodef-covers-search--opened qodef-covers-search--fadein' );
			qodefCore.body.addClass( 'qodef-covers-search--fadeout' );

			setTimeout(
				function () {
					$searchForm.find( '.qodef-m-form-field' ).val( '' );
					$searchForm.find( '.qodef-m-form-field' ).blur();
					qodefCore.body.removeClass( 'qodef-covers-search--fadeout' );
				},
				300
			);
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSearchFullscreen.init();
		}
	);

	var qodefSearchFullscreen = {
		init: function () {
			var $searchOpener = $( 'a.qodef-search-opener' ),
				$searchHolder = $( '.qodef-fullscreen-search-holder' ),
				$searchClose  = $searchHolder.find( '.qodef-m-close' );

			if ( $searchOpener.length && $searchHolder.length ) {
				$searchOpener.on(
					'click',
					function ( e ) {
						e.preventDefault();
						if ( qodefCore.body.hasClass( 'qodef-fullscreen-search--opened' ) ) {
							qodefSearchFullscreen.closeFullscreen( $searchHolder );
						} else {
							qodefSearchFullscreen.openFullscreen( $searchHolder );
						}
					}
				);
				$searchClose.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefSearchFullscreen.closeFullscreen( $searchHolder );
					}
				);

				//Close on escape
				$( document ).keyup(
					function ( e ) {
						if ( e.keyCode === 27 && qodefCore.body.hasClass( 'qodef-fullscreen-search--opened' ) ) { //KeyCode for ESC button is 27
							qodefSearchFullscreen.closeFullscreen( $searchHolder );
						}
					}
				);
			}
		},
		openFullscreen: function ( $searchHolder ) {
			qodefCore.body.removeClass( 'qodef-fullscreen-search--fadeout' );
			qodefCore.body.addClass( 'qodef-fullscreen-search--opened qodef-fullscreen-search--fadein' );

			setTimeout(
				function () {
					$searchHolder.find( '.qodef-m-form-field' ).focus();
				},
				900
			);

			qodefCore.qodefScroll.disable();
		},
		closeFullscreen: function ( $searchHolder ) {
			qodefCore.body.removeClass( 'qodef-fullscreen-search--opened qodef-fullscreen-search--fadein' );
			qodefCore.body.addClass( 'qodef-fullscreen-search--fadeout' );

			setTimeout(
				function () {
					$searchHolder.find( '.qodef-m-form-field' ).val( '' );
					$searchHolder.find( '.qodef-m-form-field' ).blur();
					qodefCore.body.removeClass( 'qodef-fullscreen-search--fadeout' );
				},
				300
			);

			qodefCore.qodefScroll.enable();
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSearch.init();
		}
	);

	var qodefSearch = {
		init: function () {
			this.search = $( 'a.qodef-search-opener' );

			if ( this.search.length ) {
				this.search.each(
					function () {
						var $thisSearch = $( this );

						qodefSearch.searchHoverColor( $thisSearch );
					}
				);
			}
		},
		searchHoverColor: function ( $searchHolder ) {
			if ( typeof $searchHolder.data( 'hover-color' ) !== 'undefined' ) {
				var hoverColor    = $searchHolder.data( 'hover-color' ),
					originalColor = $searchHolder.css( 'color' );

				$searchHolder.on(
					'mouseenter',
					function () {
						$searchHolder.css( 'color', hoverColor );
					}
				).on(
					'mouseleave',
					function () {
						$searchHolder.css( 'color', originalColor );
					}
				);
			}
		}
	};

})( jQuery );

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

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function() {
			qodefProgressBarSpinner.init();
		}
	);

	$( window ).on(
		'load',
		function () {
			qodefProgressBarSpinner.windowLoaded = true;
			qodefProgressBarSpinner.completeAnimation();
		}
	);

	$( window ).on(
		'elementor/frontend/init',
		function () {
			var isEditMode = Boolean( elementorFrontend.isEditMode() );

			if ( isEditMode ) {
				qodefProgressBarSpinner.init( isEditMode );
			}
		}
	);

	var qodefProgressBarSpinner = {
		holder: '',
		windowLoaded: false,
		percentNumber: 0,
		init: function ( isEditMode ) {
			this.holder = $( '#qodef-page-spinner.qodef-layout--progress-bar' );

			if ( this.holder.length ) {
				qodefProgressBarSpinner.animateSpinner( this.holder, isEditMode );
			}
		},
		animateSpinner: function ( $holder, isEditMode ) {
			var $numberHolder = $holder.find( '.qodef-m-spinner-number-label' ),
				$spinnerLine  = $holder.find( '.qodef-m-spinner-line-front' );

			$spinnerLine.animate(
				{ 'width': '100%' },
				10000,
				'linear'
			);

			var numberInterval = setInterval(
				function () {
					qodefProgressBarSpinner.animatePercent( $numberHolder, qodefProgressBarSpinner.percentNumber );

					if ( qodefProgressBarSpinner.windowLoaded ) {
						clearInterval( numberInterval );
					}
				},
				100
			);

			if ( isEditMode ) {
				qodefProgressBarSpinner.fadeOutLoader( $holder );
			}
		},
		completeAnimation: function () {
			var $holder = qodefProgressBarSpinner.holder.length ? qodefProgressBarSpinner.holder : $( '#qodef-page-spinner.qodef-layout--progress-bar' );

			var numberIntervalFastest = setInterval(
				function () {

					if ( qodefProgressBarSpinner.percentNumber >= 100 ) {
						clearInterval( numberIntervalFastest );

						$holder.find( '.qodef-m-spinner-line-front' ).stop().animate(
							{ 'width': '100%' },
							500
						);

						$holder.addClass( 'qodef--finished' );

						setTimeout(
							function () {
								qodefProgressBarSpinner.fadeOutLoader( $holder );
							},
							600
						);
					} else {
						qodefProgressBarSpinner.animatePercent(
							$holder.find( '.qodef-m-spinner-number-label' ),
							qodefProgressBarSpinner.percentNumber
						);
					}
				},
				6
			);
		},
		animatePercent: function ( $numberHolder, percentNumber ) {
			if ( percentNumber < 100 ) {
				percentNumber += 5;
				$numberHolder.text( percentNumber );

				qodefProgressBarSpinner.percentNumber = percentNumber;
			}
		},
		fadeOutLoader: function ( $holder, speed, delay, easing ) {
			speed  = speed ? speed : 600;
			delay  = delay ? delay : 0;
			easing = easing ? easing : 'swing';

			$holder.delay( delay ).fadeOut( speed, easing );

			$( window ).on(
				'bind',
				'pageshow',
				function ( event ) {
					if ( event.originalEvent.persisted ) {
						$holder.fadeOut( speed, easing );
					}
				}
			);
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefTextualSpinner.init();
		}
	);

	$( window ).on(
		'load',
		function () {
			qodefTextualSpinner.windowLoaded = true;
		}
	);

	$( window ).on(
		'elementor/frontend/init',
		function () {
			var isEditMode = Boolean( elementorFrontend.isEditMode() );

			if ( isEditMode ) {
				qodefTextualSpinner.init( isEditMode );
			}
		}
	);

	var qodefTextualSpinner = {
		init ( isEditMode ) {
			var $holder = $( '#qodef-page-spinner.qodef-layout--textual' );

			if ( $holder.length ) {
				if ( isEditMode ) {
					qodefTextualSpinner.fadeOutLoader( $holder );
				} else {
					qodefTextualSpinner.splitText( $holder );
				}
			}
		},
		splitText ( $holder ) {
			var $textHolder = $holder.find( '.qodef-m-text' );

			if ( $textHolder.length ) {
				var text     = $textHolder.text().trim(),
					chars    = text.split( '' ),
					cssClass = '';

				$textHolder.empty();

				chars.forEach(
					( element ) => {
						cssClass = (element === ' ' ? 'qodef-m-empty-char' : ' ');
						$textHolder.append( '<span class="qodef-m-char ' + cssClass + '">' + element + '</span>' );
					}
				);

				setTimeout(
					() => {
						qodefTextualSpinner.animateSpinner( $holder );
					}, 100
				);
			}
		},
		animateSpinner ( $holder ) {
			$holder.addClass( 'qodef--init' );

			function animationLoop ( animationProps ) {
				var $chars      = $holder.find( '.qodef-m-char' ),
					charsLength = $chars.length - 1;

				if ( $chars.length ) {
					$chars.each(
						( index, element ) => {
							var $thisChar = $( element );

							setTimeout(
								() => {
									$thisChar.animate(
									    animationProps.type,
										animationProps.duration,
										animationProps.easing,
										() => {
											if ( index === charsLength ) {
												if ( 1 === animationProps.repeat ) {
													animationLoop(
													    {
                                                            type: { opacity: 0 },
                                                            duration: 1200,
                                                            easing: 'swing',
                                                            delay: 0,
                                                            repeat: 0,
                                                        }
													);
												} else {
													if ( ! qodefTextualSpinner.windowLoaded ) {
														animationLoop(
														    {
                                                                type: { opacity: 1 },
                                                                duration: 1800,
                                                                easing: 'swing',
                                                                delay: 160,
                                                                repeat: 1,
                                                            }
														);
													} else {
														qodefTextualSpinner.fadeOutLoader(
															$holder,
															600,
															0,
															'swing'
														);

														setTimeout(
															() => {
																var $revSlider = $( '.qodef-after-spinner-rev rs-module' );

																if ( $revSlider.length ) {
																	$revSlider.revstart();
																}
															}, 600
														);
													}
												}
											}
										}
									);
								}, index * animationProps.delay
							);
						}
					);
				}
			}

			animationLoop (
			    {
                    type: { opacity: 1 },
                    duration: 1800,
                    easing: 'swing',
                    delay: 160,
                    repeat: 1,
                }
			);
		},
		fadeOutLoader( $holder, speed, delay, easing ) {
			speed  = speed ? speed : 500;
			delay  = delay ? delay : 0;
			easing = easing ? easing : 'swing';

			if ( $holder.length ) {
				$holder.delay( delay ).fadeOut( speed, easing );

				$( window ).on(
					'bind',
					'pageshow',
					function( event ) {

						if ( event.originalEvent.persisted ) {
							$holder.fadeOut( speed, easing );
						}
					}
				);
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_instagram_list = {};

	$( document ).ready(
		function () {
			qodefInstagram.init();
		}
	);

	var qodefInstagram = {
		init: function () {
			this.holder = $( '.qodef-instagram-list #sb_instagram' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {

						if ( $( this ).parent().hasClass( 'qodef-instagram-columns' ) ) {
							var $imagesHolder  = $( this ).find( '#sbi_images' ),
								$images        = $imagesHolder.find( '.sbi_item.sbi_type_image, .sbi_item.sbi_type_carousel' ),
								initialPadding = $imagesHolder.css( 'padding' );

							// remove some unnecessary paddings
							$imagesHolder.css('padding', '0');
							$imagesHolder.css('margin', '-' + initialPadding);
							$imagesHolder.css('width', 'calc(100% + ' + ( initialPadding) + ' + ' + ( initialPadding) + ')');

							$images.attr('style', 'padding: ' + initialPadding + '!important');
						} else if ( $( this ).parent().hasClass( 'qodef-instagram-slider' ) ) {
							qodefInstagram.initSlider( $( this ) );
						}
					}
				);
			}
		},
		initSlider: function ( $currentItem, $initAllItems ) {

			var $imagesHolder  = $currentItem.find( '#sbi_images' ),
				$images        = $currentItem.find( '.sbi_item.sbi_type_image' ),
				initialPadding = $imagesHolder.css( 'padding' );

			// remove some unnecessary paddings
			$imagesHolder.css('padding', '0');
			$images.css('padding', '0');

			// items will inherit this margin
			$imagesHolder.attr('style', 'margin-right: ' + (parseInt( initialPadding ) * 2) + 'px !important');

			var sliderOptions = {};

			sliderOptions.spaceBetween      = parseInt( initialPadding ) * 2;
			sliderOptions.customStages      = true;
			sliderOptions.slidesPerView     = $currentItem.data( 'cols' ) !== undefined && $currentItem.data( 'cols' ) !== '' ? $currentItem.data( 'cols' ) : 3;
			sliderOptions.slidesPerView1200 = $currentItem.data( 'cols' ) !== undefined && $currentItem.data( 'cols' ) !== '' ? $currentItem.data( 'cols' ) : 3;
			sliderOptions.slidesPerView880  = $currentItem.data( 'colstablet' ) !== undefined && $currentItem.data( 'colstablet' ) !== '' ? $currentItem.data( 'colstablet' ) : 2;
			sliderOptions.slidesPerView680  = $currentItem.data( 'colsmobile' ) !== undefined && $currentItem.data( 'colsmobile' ) !== '' ? $currentItem.data( 'colsmobile' ) : 1;

			$currentItem.attr( 'data-options', JSON.stringify(sliderOptions) );

			$imagesHolder.parent( '#sb_instagram' ).addClass( 'qodef-swiper-container' );
			$imagesHolder.addClass( 'swiper-wrapper' );

			if ( $images.length ) {
				$images.each(
					function () {
						$( this ).addClass( 'qodef-e qodef-image-wrapper swiper-slide' );
					}
				);
			}

			if ( typeof qodef.qodefSwiper === 'object' ) {

				if ( false === $initAllItems ) {
					qodef.qodefSwiper.initSlider( $currentItem );
				} else {
					qodef.qodefSwiper.init( $currentItem );
				}
			}
		},
	};

	qodefCore.shortcodes.protalks_core_instagram_list.qodefInstagram = qodefInstagram;
	qodefCore.shortcodes.protalks_core_instagram_list.qodefSwiper    = qodef.qodefSwiper;

})( jQuery );

(function ( $ ) {
	'use strict';

	/*
	 **	Re-init scripts on gallery loaded
	 */
	$( document ).on(
		'yith_wccl_product_gallery_loaded',
		function () {

			if ( typeof qodefCore.qodefWooMagnificPopup === 'function' ) {
				qodefCore.qodefWooMagnificPopup.init();
			}
		}
	);

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_product_category_list                    = {};
	qodefCore.shortcodes.protalks_core_product_category_list.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.protalks_core_product_category_list.qodefSwiper        = qodef.qodefSwiper;

})( jQuery );

(function ( $ ) {
	'use strict';

	var shortcode = 'protalks_core_product_list';

	qodefCore.shortcodes[shortcode] = {};

	if ( typeof qodefCore.listShortcodesScripts === 'object' ) {
		$.each(
			qodefCore.listShortcodesScripts,
			function ( key, value ) {
				qodefCore.shortcodes[shortcode][key] = value;
			}
		);
	}

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefDropDownCart.init();
		}
	);

	var qodefDropDownCart = {
		init: function () {
			var $holder = $( '.qodef-widget-dropdown-cart-content' );

			if ( $holder.length ) {
				$holder.off().each(
					function () {
						var $thisHolder = $( this );

						qodefDropDownCart.trigger( $thisHolder );

						qodefCore.body.on(
							'added_to_cart removed_from_cart',
							function () {
								qodefDropDownCart.init();
							}
						);
					}
				);
			}
		},
		trigger: function ( $holder ) {
			var $items = $holder.find( '.qodef-woo-mini-cart' );
			if ( $items.length && typeof qodefCore.qodefPerfectScrollbar === 'object' ) {
				qodefCore.qodefPerfectScrollbar.init( $items );
			}
		},
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_clients_list             = {};
	qodefCore.shortcodes.protalks_core_clients_list.qodefSwiper = qodef.qodefSwiper;

})( jQuery );

(function ( $ ) {
	'use strict';

	var shortcode = 'protalks_core_events_list';

	qodefCore.shortcodes[shortcode] = {};

	if ( typeof qodefCore.listShortcodesScripts === 'object' ) {
		$.each(
			qodefCore.listShortcodesScripts,
			function ( key, value ) {
				qodefCore.shortcodes[shortcode][key] = value;
			}
		);
	}

})( jQuery );

(function ( $ ) {
	'use strict';

	var shortcode = 'protalks_core_events_list';

	qodefCore.shortcodes[shortcode] = {};

	if ( typeof qodefCore.listShortcodesScripts === 'object' ) {
		$.each(
			qodefCore.listShortcodesScripts,
			function ( key, value ) {
				qodefCore.shortcodes[shortcode][key] = value;
			}
		);
	}

})( jQuery );

(function ( $ ) {
	'use strict';

	var shortcode = 'onegoal_core_masonry_gallery_list';

	qodefCore.shortcodes[shortcode]                    = {};
	qodefCore.shortcodes[shortcode].qodefMasonryLayout = qodef.qodefMasonryLayout;

})( jQuery );

(function ( $ ) {
	'use strict';

	var shortcode = 'protalks_core_team_list';

	qodefCore.shortcodes[shortcode] = {};

	if ( typeof qodefCore.listShortcodesScripts === 'object' ) {
		$.each(
			qodefCore.listShortcodesScripts,
			function ( key, value ) {
				qodefCore.shortcodes[shortcode][key] = value;
			}
		);
	}

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.protalks_core_testimonials_list             = {};
	qodefCore.shortcodes.protalks_core_testimonials_list.qodefSwiper = qodef.qodefSwiper;

})( jQuery );
