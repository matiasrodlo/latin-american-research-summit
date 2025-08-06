<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/tabs/class-protalkscore-tab-shortcode.php';
include_once PROTALKS_CORE_SHORTCODES_PATH . '/tabs/class-protalkscore-tab-child-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/tabs/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
