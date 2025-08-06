<?php

include_once PROTALKS_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/class-protalkscore-product-list-shortcode.php';

foreach ( glob( PROTALKS_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
