<?php

include_once PROTALKS_CORE_CPT_PATH . '/events/shortcodes/events-list/class-protalkscore-events-list-shortcode.php';

foreach ( glob( PROTALKS_CORE_CPT_PATH . '/events/shortcodes/events-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
