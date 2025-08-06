<?php

include_once PROTALKS_CORE_CPT_PATH . '/clients/shortcodes/clients-list/class-protalkscore-clients-list-shortcode.php';

foreach ( glob( PROTALKS_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
