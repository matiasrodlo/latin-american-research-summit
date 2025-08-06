<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/stacked-images/class-protalkscore-stacked-images-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/stacked-images/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
