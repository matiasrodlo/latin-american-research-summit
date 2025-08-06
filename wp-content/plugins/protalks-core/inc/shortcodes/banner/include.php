<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/banner/class-protalkscore-banner-shortcode.php';

foreach ( glob( PROTALKS_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
