<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/button/class-protalkscore-button-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
