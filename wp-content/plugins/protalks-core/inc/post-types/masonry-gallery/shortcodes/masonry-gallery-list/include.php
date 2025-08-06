<?php

include_once PROTALKS_CORE_CPT_PATH . '/masonry-gallery/shortcodes/masonry-gallery-list/class-protalkscore-masonry-gallery-list-shortcode.php';

foreach ( glob( PROTALKS_CORE_CPT_PATH . '/masonry-gallery/shortcodes/masonry-gallery-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
