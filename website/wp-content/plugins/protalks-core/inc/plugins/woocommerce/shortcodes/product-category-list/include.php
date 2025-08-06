<?php

include_once PROTALKS_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/media-custom-fields.php';
include_once PROTALKS_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/class-protalkscore-product-category-list-shortcode.php';

foreach ( glob( PROTALKS_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
