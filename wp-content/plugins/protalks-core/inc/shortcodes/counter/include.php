<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/counter/class-protalkscore-counter-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/counter/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
