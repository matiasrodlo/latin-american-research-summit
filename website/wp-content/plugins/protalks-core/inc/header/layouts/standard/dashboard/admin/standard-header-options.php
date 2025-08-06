<?php

if ( ! function_exists( 'protalks_core_add_standard_header_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_header_tab
	 */
	function protalks_core_add_standard_header_options( $page, $general_header_tab ) {

		$section = $general_header_tab->add_section_element(
			array(
				'name'        => 'qodef_standard_header_section',
				'title'       => esc_html__( 'Standard Header', 'protalks-core' ),
				'description' => esc_html__( 'Standard header settings', 'protalks-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values'        => 'standard',
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_standard_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'protalks-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'protalks-core' ),
				'default_value' => 'no',
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_height',
				'title'       => esc_html__( 'Header Height', 'protalks-core' ),
				'description' => esc_html__( 'Enter header height', 'protalks-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'protalks-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'protalks-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'protalks-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'protalks-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'protalks-core' ),
				'description' => esc_html__( 'Enter header background color', 'protalks-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_header_border_color',
				'title'       => esc_html__( 'Header Border Color', 'protalks-core' ),
				'description' => esc_html__( 'Enter header border color', 'protalks-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_border_width',
				'title'       => esc_html__( 'Header Border Width', 'protalks-core' ),
				'description' => esc_html__( 'Enter header border width size', 'protalks-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'protalks-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_standard_header_border_style',
				'title'       => esc_html__( 'Header Border Style', 'protalks-core' ),
				'description' => esc_html__( 'Choose header border style', 'protalks-core' ),
				'options'     => protalks_core_get_select_type_options_pool( 'border_style' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_menu_position',
				'title'         => esc_html__( 'Menu position', 'protalks-core' ),
				'default_value' => 'right',
				'options'       => array(
					'left'   => esc_html__( 'Left', 'protalks-core' ),
					'center' => esc_html__( 'Center', 'protalks-core' ),
					'right'  => esc_html__( 'Right', 'protalks-core' ),
				),
			)
		);
	}

	add_action( 'protalks_core_action_after_header_options_map', 'protalks_core_add_standard_header_options', 10, 2 );
}
