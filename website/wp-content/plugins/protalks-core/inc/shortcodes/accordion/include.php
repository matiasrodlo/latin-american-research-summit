<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/accordion/class-protalkscore-accordion-shortcode.php';
include_once PROTALKS_CORE_SHORTCODES_PATH . '/accordion/class-protalkscore-accordion-child-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/accordion/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
