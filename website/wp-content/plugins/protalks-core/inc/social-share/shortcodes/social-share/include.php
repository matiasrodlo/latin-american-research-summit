<?php

include_once PROTALKS_CORE_INC_PATH . '/social-share/shortcodes/social-share/class-protalkscore-social-share-shortcode.php';

foreach ( glob( PROTALKS_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
