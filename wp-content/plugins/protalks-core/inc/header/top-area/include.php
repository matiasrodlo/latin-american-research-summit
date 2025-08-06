<?php

include_once PROTALKS_CORE_INC_PATH . '/header/top-area/class-protalkscore-top-area.php';
include_once PROTALKS_CORE_INC_PATH . '/header/top-area/helper.php';

foreach ( glob( PROTALKS_CORE_INC_PATH . '/header/top-area/dashboard/*/*.php' ) as $dashboard ) {
	include_once $dashboard;
}
