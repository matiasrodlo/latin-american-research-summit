<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/image-with-text/class-protalkscore-image-with-text-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/image-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
