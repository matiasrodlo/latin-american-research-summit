<?php

include_once PROTALKS_CORE_CPT_PATH . '/clients/helper.php';

foreach ( glob( PROTALKS_CORE_CPT_PATH . '/clients/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}
