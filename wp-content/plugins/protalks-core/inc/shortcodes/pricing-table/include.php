<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/pricing-table/class-protalkscore-pricing-table-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
