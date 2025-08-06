<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/icon-with-text/class-protalkscore-icon-with-text-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/icon-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
