<?php

if ( ! function_exists( 'protalks_core_add_background_grid_lines_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_background_grid_lines_meta_box( $general_tab ) {

		if ( $general_tab ) {
			$general_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_enable_background_grid_lines',
					'options'       => protalks_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => '',
					'title'         => esc_html__( 'Enable Background Grid Lines', 'protalks-core' ),
				)
			);

			$back_to_top_section = $general_tab->add_section_element(
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
						''  => esc_html__( 'Default', 'protalks-core' ),
						'2' => esc_html__( 'Two', 'protalks-core' ),
						'3' => esc_html__( 'Three', 'protalks-core' ),
						'4' => esc_html__( 'Four', 'protalks-core' ),
						'5' => esc_html__( 'Five', 'protalks-core' ),
						'6' => esc_html__( 'Six', 'protalks-core' ),
					),
					'default_value' => '',
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

	add_action( 'protalks_core_action_after_general_page_meta_box_map', 'protalks_core_add_background_grid_lines_meta_box' );
}
