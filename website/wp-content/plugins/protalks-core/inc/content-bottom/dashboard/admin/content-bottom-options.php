<?php

if ( ! function_exists( 'protalks_core_add_page_content_bottom_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_page_content_bottom_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => PROTALKS_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'content-bottom',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Content Bottom', 'protalks-core' ),
				'description' => esc_html__( 'Global Content Bottom Options', 'protalks-core' ),
			)
		);

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_content_bottom',
					'title'         => esc_html__( 'Enable Page Content Bottom', 'protalks-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page content bottom', 'protalks-core' ),
					'default_value' => 'no',
				)
			);

			$content_bottom_area_section = $page->add_section_element(
				array(
					'name'       => 'qodef_content_bottom_area_section',
					'title'      => '',
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_content_bottom' => array(
								'values'        => 'no',
								'default_value' => 'no',
							),
						),
					),
				)
			);

			$content_bottom_area_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_content_bottom_area_in_grid',
					'title'         => esc_html__( 'Content Bottom Area In Grid', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will set page content bottom area to be in grid', 'protalks-core' ),
					'default_value' => 'yes',
				)
			);

			$content_bottom_styles_section = $content_bottom_area_section->add_section_element(
				array(
					'name'  => 'qodef_content_bottom_styles_section',
					'title' => esc_html__( 'Content Bottom Area Styles', 'protalks-core' ),
				)
			);

			$content_bottom_styles_row = $content_bottom_styles_section->add_row_element(
				array(
					'name'  => 'qodef_content_bottom_styles_row',
					'title' => '',
				)
			);

			$content_bottom_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_content_bottom_area_padding_top',
					'title'      => esc_html__( 'Padding Top', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_content_bottom_area_padding_bottom',
					'title'      => esc_html__( 'Padding Bottom', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_content_bottom_area_side_padding',
					'title'      => esc_html__( 'Side Padding', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_content_bottom_area_background_color',
					'title'      => esc_html__( 'Background Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_styles_row->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_content_bottom_area_background_image',
					'title'      => esc_html__( 'Background Image', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_content_bottom_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$content_bottom_styles_row->add_field_element(
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

			$content_bottom_styles_row->add_field_element(
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
			do_action( 'protalks_core_action_after_page_content_bottom_options_map', $page );
		}
	}

	add_action( 'protalks_core_action_default_options_init', 'protalks_core_add_page_content_bottom_options', protalks_core_get_admin_options_map_position( 'content-bottom' ) );
}
