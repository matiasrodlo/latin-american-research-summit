<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/background-svg/class-protalkscore-background-svg-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/background-svg/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
