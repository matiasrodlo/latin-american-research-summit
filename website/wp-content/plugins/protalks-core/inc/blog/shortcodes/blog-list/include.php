<?php

include_once PROTALKS_CORE_INC_PATH . '/blog/shortcodes/blog-list/class-protalkscore-blog-list-shortcode.php';

foreach ( glob( PROTALKS_CORE_INC_PATH . '/blog/shortcodes/blog-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
