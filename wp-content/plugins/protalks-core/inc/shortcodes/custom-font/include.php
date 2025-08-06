<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/custom-font/class-protalkscore-custom-font-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
