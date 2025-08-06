<?php

include_once PROTALKS_CORE_SHORTCODES_PATH . '/textual-projects-showcase/class-protalkscore-textual-projects-showcase-shortcode.php';

foreach ( glob( PROTALKS_CORE_SHORTCODES_PATH . '/textual-projects-showcase/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
