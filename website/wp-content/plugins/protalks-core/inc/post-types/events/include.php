<?php

include_once PROTALKS_CORE_CPT_PATH . '/events/helper.php';

foreach ( glob( PROTALKS_CORE_CPT_PATH . '/events/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}
