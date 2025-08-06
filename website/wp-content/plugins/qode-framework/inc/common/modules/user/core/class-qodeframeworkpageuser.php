<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkPageUser extends QodeFrameworkPage {

	public function add_tab_element( $params ) {
		throw new BadMethodCallException();
	}

	public function add_section_element( $params ) {
		throw new BadMethodCallException();
	}

	public function add_row_element( $params ) {
		throw new BadMethodCallException();
	}

	public function add_repeater_element( $params ) {
		throw new BadMethodCallException();
	}

	public function add_field_element( $params ) {
		$params['type']          = 'user';
		$params['default_value'] = isset( $params['default_value'] ) ? $params['default_value'] : '';
		qode_framework_get_framework_root()->get_user_options()->set_option( $params['name'], $params['default_value'], $params['field_type'] );
		parent::add_field_element( $params );
	}
}
