<?php

include_once PROTALKS_CORE_CPT_PATH . '/events/shortcodes/events-calendar/class-protalkscore-events-calendar-shortcode.php';

foreach ( glob( PROTALKS_CORE_CPT_PATH . '/events/shortcodes/events-calendar/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
