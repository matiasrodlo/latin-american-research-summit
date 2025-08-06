<?php

include_once PROTALKS_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/class-protalkscore-testimonials-list-shortcode.php';

foreach ( glob( PROTALKS_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
