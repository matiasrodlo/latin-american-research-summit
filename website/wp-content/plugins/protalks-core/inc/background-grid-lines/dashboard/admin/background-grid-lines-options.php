<?php

if ( ! function_exists( 'protalks_core_add_background_grid_lines_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_background_grid_lines_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_background_grid_lines',
					'title'         => esc_html__( 'Enable Background Grid Lines', 'protalks-core' ),
					'default_value' => 'no',
				)
			);

			$back_to_top_section = $page->add_section_element(
				array(
					'name'       => 'qodef_background_grid_lines_section',
					'title'      => esc_html__( 'Background Grid Lines', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_background_grid_lines' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);

			$back_to_top_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_background_grid_lines_number',
					'title'         => esc_html__( 'Number of Lines', 'protalks-core' ),
					'options'       => array(
						'2' => esc_html__( 'Two', 'protalks-core' ),
						'3' => esc_html__( 'Three', 'protalks-core' ),
						'4' => esc_html__( 'Four', 'protalks-core' ),
						'5' => esc_html__( 'Five', 'protalks-core' ),
						'6' => esc_html__( 'Six', 'protalks-core' ),
					),
					'default_value' => '3',
				)
			);

			$back_to_top_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_background_grid_lines_color',
					'title'      => esc_html__( 'Line Color', 'protalks-core' ),
				)
			);

			$back_to_top_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_background_grid_lines_decoration_color',
					'title'      => esc_html__( 'Line Decoration Color', 'protalks-core' ),
				)
			);
		}
	}

	add_action( 'protalks_core_action_after_general_options_map', 'protalks_core_add_background_grid_lines_options', 5 );
}
