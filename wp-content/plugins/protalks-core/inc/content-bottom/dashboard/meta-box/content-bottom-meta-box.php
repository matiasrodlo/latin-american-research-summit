<?php

if ( ! function_exists( 'protalks_core_add_page_content_bottom_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function protalks_core_add_page_content_bottom_meta_box( $page ) {

		if ( $page ) {
			$content_bottom_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-content-bottom',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Content Bottom Settings', 'protalks-core' ),
					'description' => esc_html__( 'Content bottom layout settings', 'protalks-core' ),
				)
			);

			$content_bottom_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_page_content_bottom',
					'title'       => esc_html__( 'Enable Page Content Bottom', 'protalks-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page content bottom', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'no_yes' ),
				)
			);

			$page_content_bottom_section = $content_bottom_tab->add_section_element(
				array(
					'name'       => 'qodef_page_content_bottom_section',
					'title'      => '',
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_content_bottom' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_content_bottom_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_content_bottom_area_in_grid',
					'title'       => esc_html__( 'Content Bottom Area In Grid', 'protalks-core' ),
					'description' => esc_html__( 'Enabling this option will set page content bottom area to be in grid', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'no_yes' ),
				)
			);

			$content_bottom_area_styles_section = $page_content_bottom_section->add_section_element(
				array(
					'name'  => 'qodef_content_bottom_area_styles_section',
					'title' => esc_html__( 'Content Bottom Area Styles', 'protalks-core' ),
				)
			);

			$content_bottom_area_styles_row = $content_bottom_area_styles_section->add_row_element(
				array(
					'name'  => 'qodef_content_bottom_area_styles_row',
					'title' => '',
				)
			);

			$content_bottom_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_content_bottom_area_padding_top',
					'title'      => esc_html__( 'Padding Top', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_content_bottom_area_padding_bottom',
					'title'      => esc_html__( 'Padding Bottom', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_content_bottom_area_side_padding',
					'title'      => esc_html__( 'Side Padding', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_content_bottom_area_background_color',
					'title'      => esc_html__( 'Background Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_area_styles_row->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_content_bottom_area_background_image',
					'title'      => esc_html__( 'Background Image', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_content_bottom_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_content_bottom_area_top_border_width',
					'title'      => esc_html__( 'Top Border Width', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => esc_html__( 'px', 'protalks-core' ),
					),
				)
			);

			$content_bottom_area_styles_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_content_bottom_area_top_border_style',
					'title'      => esc_html__( 'Top Border Style', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'border_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_page_content_bottom_meta_box_map', $content_bottom_tab );
		}
	}

	add_action( 'protalks_core_action_after_general_meta_box_map', 'protalks_core_add_page_content_bottom_meta_box' );
}
