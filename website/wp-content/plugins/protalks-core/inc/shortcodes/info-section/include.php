<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/info-section/class-protalkscore-info-section-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/info-section/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
