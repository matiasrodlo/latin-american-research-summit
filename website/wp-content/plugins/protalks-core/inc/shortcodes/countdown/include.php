<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/countdown/class-protalkscore-countdown-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
