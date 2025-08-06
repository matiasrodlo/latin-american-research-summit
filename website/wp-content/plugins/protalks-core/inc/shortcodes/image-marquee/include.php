<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/image-marquee/class-protalkscore-image-marquee-shortcode.php';

foreach ( glob( PROTALKS_CORE_INC_PATH . '/shortcodes/image-marquee/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
