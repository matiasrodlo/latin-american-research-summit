<?php

include_once PROTALKS_CORE_INC_PATH . '/search/class-protalkscore-search.php';
include_once PROTALKS_CORE_INC_PATH . '/search/helper.php';
include_once PROTALKS_CORE_INC_PATH . '/search/dashboard/admin/search-options.php';

foreach ( glob( PROTALKS_CORE_INC_PATH . '/search/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}
