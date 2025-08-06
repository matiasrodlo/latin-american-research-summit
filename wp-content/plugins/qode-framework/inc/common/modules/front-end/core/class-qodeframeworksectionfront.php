<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkSectionFront extends QodeFrameworkSection {

	public function add_row_element( $params ) {

		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type'] = 'front-end';
			$field          = new QodeFrameworkRowFront( $params );
			$this->add_child( $field );

			return $field;
		}

		return false;
	}

	public function add_section_element( $params ) {

		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type'] = 'front-end';
			$field          = new QodeFrameworkSectionFront( $params );
			$this->add_child( $field );

			return $field;
		}

		return false;
	}

	public function add_repeater_element( $params ) {
		$params['type'] = 'front-end';

		return parent::add_repeater_element( $params );
	}

	public function add_field_element( $params ) {
		$params['type'] = 'front-end';

		parent::add_field_element( $params );
	}
}
