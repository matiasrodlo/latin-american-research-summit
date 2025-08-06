<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkRowFront extends QodeFrameworkRow {

	public function add_repeater_element( $params ) {
		$params['type'] = 'front-end';

		return parent::add_repeater_element( $params );
	}

	public function add_field_element( $params ) {
		$params['type'] = 'front-end';

		parent::add_field_element( $params );
	}
}
