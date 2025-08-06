<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkTabAdmin extends QodeFrameworkTab {

	public function add_section_element( $params ) {

		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type']  = 'admin';
			$params['scope'] = $this->get_scope();
			$field           = new QodeFrameworkSectionAdmin( $params );
			$this->add_child( $field );

			return $field;
		}

		return false;
	}

	public function add_row_element( $params ) {

		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type']  = 'admin';
			$params['scope'] = $this->get_scope();
			$field           = new QodeFrameworkRowAdmin( $params );
			$this->add_child( $field );

			return $field;
		}

		return false;
	}

	public function add_repeater_element( $params ) {
		$params['type']          = 'admin';
		$params['default_value'] = isset( $params['default_value'] ) ? $params['default_value'] : '';
		$params['scope']         = $this->get_scope();
		$admin_option            = qode_framework_get_framework_root()->get_admin_option( $this->get_scope() );
		$admin_option->set_option( $params['name'], $params['default_value'], 'repeater' );

		return parent::add_repeater_element( $params );
	}

	public function add_field_element( $params ) {
		$params['type']          = 'admin';
		$params['default_value'] = isset( $params['default_value'] ) ? $params['default_value'] : '';
		$params['scope']         = $this->get_scope();
		$admin_option            = qode_framework_get_framework_root()->get_admin_option( $this->get_scope() );
		$admin_option->set_option( $params['name'], $params['default_value'], $params['field_type'] );
		parent::add_field_element( $params );

		if ( 'iconpack' === $params['field_type'] ) {
			$icons_object = qode_framework_icons();
			$icon_packs   = $icons_object->get_icon_packs();

			if ( is_array( $icon_packs ) && ! empty( $icon_packs ) ) {
				foreach ( $icon_packs as $icon_pack_key => $icon_pack_name ) {
					$icon_name = $icons_object->get_formatted_icon_field_name( $params['name'], $icon_pack_key, '-' );

					$params_icon          = array(
						'type'       => 'admin',
						'name'       => $icon_name,
						'field_type' => 'icon',
						'title'      => $icon_pack_name,
						'options'    => $icons_object->get_icon_pack_icons( $icon_pack_key ),
						'dependency' => array(
							'show' => array(
								$params['name'] => array(
									'values'        => $icon_pack_key,
									'default_value' => $params['default_value'],
								),
							),
						),
					);
					$params_icon['scope'] = $this->get_scope();
					$admin_option->set_option( $icon_name, '', 'icon' );

					parent::add_field_element( $params_icon );
				}
			}
		}
	}
}
