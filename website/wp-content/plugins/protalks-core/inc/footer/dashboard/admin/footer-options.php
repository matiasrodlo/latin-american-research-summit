<?php

if ( ! function_exists( 'protalks_core_add_page_footer_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_page_footer_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => PROTALKS_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'footer',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Footer', 'protalks-core' ),
				'description' => esc_html__( 'Global Footer Options', 'protalks-core' ),
			)
		);

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_footer',
					'title'         => esc_html__( 'Enable Page Footer', 'protalks-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page footer', 'protalks-core' ),
					'default_value' => 'yes',
				)
			);

			$page_footer_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_footer_section',
					'title'      => esc_html__( 'Footer Area', 'protalks-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_footer' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			// General Footer Area Options.
			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_footer_predefined_style',
					'title'         => esc_html__( 'Enable Predefined Footer Style', 'protalks-core' ),
					'default_value' => 'yes',
				)
			);

			$page_footer_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$page_footer_section->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_footer_area_background_image',
					'title'      => esc_html__( 'Background Image', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_uncovering_footer',
					'title'         => esc_html__( 'Enable Uncovering Footer', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'protalks-core' ),
					'default_value' => 'no',
				)
			);

			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_footer_predefined_layout',
					'title'         => esc_html__( 'Enable Footer Predefined Layout', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will set footer in predefined layout', 'protalks-core' ),
					'default_value' => 'no',
				)
			);

			// Top Footer Area Section.

			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_top_footer_area',
					'title'         => esc_html__( 'Enable Top Footer Area', 'protalks-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable top footer area', 'protalks-core' ),
					'default_value' => 'yes',
				)
			);

			$top_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_top_footer_area_section',
					'title'      => esc_html__( 'Top Footer Area', 'protalks-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_top_footer_area' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_footer_top_area_in_grid',
					'title'         => esc_html__( 'Top Footer Area In Grid', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will set page top footer area to be in grid', 'protalks-core' ),
					'default_value' => 'yes',
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_top_area_columns',
					'title'         => esc_html__( 'Top Footer Area Columns', 'protalks-core' ),
					'description'   => esc_html__( 'Choose number of columns for top footer area', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'columns_number', true, array( '5', '6' ) ),
					'default_value' => '4',
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_top_area_grid_gutter',
					'title'       => esc_html__( 'Top Footer Area Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between columns for top footer area', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$footer_top_area_grid_gutter_row = $top_footer_area_section->add_row_element(
				array(
					'name'       => 'qodef_set_footer_top_area_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_set_footer_top_area_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$footer_top_area_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_set_footer_top_area_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$footer_top_area_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_set_footer_top_area_grid_gutter_custom_1512',
					'title'       => esc_html__( 'Custom Grid Gutter - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$footer_top_area_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_set_footer_top_area_grid_gutter_custom_1200',
					'title'       => esc_html__( 'Custom Grid Gutter - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$footer_top_area_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_set_footer_top_area_grid_gutter_custom_880',
					'title'       => esc_html__( 'Custom Grid Gutter - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_top_area_content_alignment',
					'title'       => esc_html__( 'Content Alignment', 'protalks-core' ),
					'description' => esc_html__( 'Set widgets content alignment inside top footer area', 'protalks-core' ),
					'options'     => array(
						''       => esc_html__( 'Default', 'protalks-core' ),
						'left'   => esc_html__( 'Left', 'protalks-core' ),
						'center' => esc_html__( 'Center', 'protalks-core' ),
						'right'  => esc_html__( 'Right', 'protalks-core' ),
					),
				)
			);

			$top_footer_area_styles_section = $top_footer_area_section->add_section_element(
				array(
					'name'  => 'qodef_top_footer_area_styles_section',
					'title' => esc_html__( 'Top Footer Area Styles', 'protalks-core' ),
				)
			);

			$top_footer_area_styles_row = $top_footer_area_styles_section->add_row_element(
				array(
					'name'  => 'qodef_top_footer_area_styles_row',
					'title' => '',
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_padding_top',
					'title'      => esc_html__( 'Padding Top', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_padding_bottom',
					'title'      => esc_html__( 'Padding Bottom', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_side_padding',
					'title'      => esc_html__( 'Side Padding', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_top_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_top_footer_area_background_image',
					'title'      => esc_html__( 'Background Image', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_top_footer_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_top_border_width',
					'title'      => esc_html__( 'Top Border Width', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => esc_html__( 'px', 'protalks-core' ),
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_top_footer_area_top_border_style',
					'title'      => esc_html__( 'Top Border Style', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'border_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row_2 = $top_footer_area_styles_section->add_row_element(
				array(
					'name'  => 'qodef_top_footer_area_styles_row_2',
					'title' => '',
				)
			);

			$top_footer_area_styles_row_2->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_top_footer_area_widgets_margin_bottom',
					'title'       => esc_html__( 'Widgets Margin Bottom', 'protalks-core' ),
					'description' => esc_html__( 'Set space value between widgets', 'protalks-core' ),
					'args'        => array(
						'col_width' => 4,
					),
				)
			);

			$top_footer_area_styles_row_2->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_top_footer_area_widgets_title_margin_bottom',
					'title'       => esc_html__( 'Widgets Title Margin Bottom', 'protalks-core' ),
					'description' => esc_html__( 'Set space value between widget title and widget content', 'protalks-core' ),
					'args'        => array(
						'col_width' => 4,
					),
				)
			);

			// Bottom Footer Area Section.

			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_bottom_footer_area',
					'title'         => esc_html__( 'Enable Bottom Footer Area', 'protalks-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable bottom footer area', 'protalks-core' ),
					'default_value' => 'yes',
				)
			);

			$bottom_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_bottom_footer_area_section',
					'title'      => esc_html__( 'Bottom Footer Area', 'protalks-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_bottom_footer_area' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_footer_bottom_area_in_grid',
					'title'         => esc_html__( 'Bottom Footer Area In Grid', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will set page bottom footer area to be in grid', 'protalks-core' ),
					'default_value' => 'yes',
				)
			);

			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_bottom_area_columns',
					'title'         => esc_html__( 'Bottom Footer Area Columns', 'protalks-core' ),
					'description'   => esc_html__( 'Choose number of columns for bottom footer area', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'columns_number', true, array( '3', '4', '5', '6' ) ),
					'default_value' => '2',
				)
			);

			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_bottom_area_grid_gutter',
					'title'       => esc_html__( 'Bottom Footer Area Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between columns for bottom footer area', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$footer_bottom_area_grid_gutter_row = $bottom_footer_area_section->add_row_element(
				array(
					'name'       => 'qodef_set_footer_bottom_area_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_set_footer_bottom_area_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$footer_bottom_area_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_set_footer_bottom_area_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$footer_bottom_area_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_set_footer_bottom_area_grid_gutter_custom_1512',
					'title'       => esc_html__( 'Custom Grid Gutter - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$footer_bottom_area_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_set_footer_bottom_area_grid_gutter_custom_1200',
					'title'       => esc_html__( 'Custom Grid Gutter - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$footer_bottom_area_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_set_footer_bottom_area_grid_gutter_custom_880',
					'title'       => esc_html__( 'Custom Grid Gutter - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_bottom_area_content_alignment',
					'title'       => esc_html__( 'Content Alignment', 'protalks-core' ),
					'description' => esc_html__( 'Set widgets content alignment inside bottom footer area', 'protalks-core' ),
					'options'     => array(
						''              => esc_html__( 'Default', 'protalks-core' ),
						'left'          => esc_html__( 'Left', 'protalks-core' ),
						'center'        => esc_html__( 'Center', 'protalks-core' ),
						'right'         => esc_html__( 'Right', 'protalks-core' ),
						'space-between' => esc_html__( 'Space Between', 'protalks-core' ),
					),
				)
			);

			$bottom_footer_area_styles_section = $bottom_footer_area_section->add_section_element(
				array(
					'name'  => 'qodef_bottom_footer_area_styles_section',
					'title' => esc_html__( 'Bottom Footer Area Styles', 'protalks-core' ),
				)
			);

			$bottom_footer_area_styles_row = $bottom_footer_area_styles_section->add_row_element(
				array(
					'name'  => 'qodef_bottom_footer_area_styles_row',
					'title' => '',
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_padding_top',
					'title'      => esc_html__( 'Padding Top', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_padding_bottom',
					'title'      => esc_html__( 'Padding Bottom', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_side_padding',
					'title'      => esc_html__( 'Side Padding', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_bottom_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_bottom_footer_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_top_border_width',
					'title'      => esc_html__( 'Top Border Width', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => esc_html__( 'px', 'protalks-core' ),
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_bottom_footer_area_top_border_style',
					'title'      => esc_html__( 'Top Border Style', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'border_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_page_footer_options_map', $page );
		}
	}

	add_action( 'protalks_core_action_default_options_init', 'protalks_core_add_page_footer_options', protalks_core_get_admin_options_map_position( 'footer' ) );
}
