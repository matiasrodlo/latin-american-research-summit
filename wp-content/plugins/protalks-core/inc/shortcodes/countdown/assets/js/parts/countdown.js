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
