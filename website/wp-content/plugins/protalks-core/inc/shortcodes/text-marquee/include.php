<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/text-marquee/class-protalkscore-text-marquee-shortcode.php';

foreach ( glob( PROTALKS_CORE_INC_PATH . '/shortcodes/text-marquee/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
