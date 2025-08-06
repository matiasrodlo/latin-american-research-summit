<?php

include_once PROTALKS_CORE_CPT_PATH . '/team/shortcodes/team-list/class-protalkscore-team-list-shortcode.php';

foreach ( glob( PROTALKS_CORE_CPT_PATH . '/team/shortcodes/team-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
