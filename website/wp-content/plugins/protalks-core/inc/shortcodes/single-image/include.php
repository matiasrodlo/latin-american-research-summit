<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/single-image/class-protalkscore-single-image-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/single-image/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
