<?php

if ( ! function_exists( 'protalks_core_add_team_archive_list_options' ) ) {
	/**
	 * Function that add list options for team archive module
	 */
	function protalks_core_add_team_archive_list_options( $tab ) {
		$list_item_layouts = apply_filters( 'protalks_core_filter_team_list_layouts', array() );
		$options_map       = protalks_core_get_variations_options_map( $list_item_layouts );

		if ( $tab ) {

			if ( sizeof( $list_item_layouts ) > 1 ) {
				$tab->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_team_archive_item_layout',
						'title'         => esc_html__( 'Item Layout', 'protalks-core' ),
						'description'   => esc_html__( 'Choose layout for list item on archive page', 'protalks-core' ),
						'options'       => $list_item_layouts,
						'default_value' => $options_map['default_value'],
					)
				);
			}

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_behavior',
					'title'       => esc_html__( 'List Appearance', 'protalks-core' ),
					'description' => esc_html__( 'Choose an appearance style for archive list', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'list_behavior' ),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_columns',
					'title'       => esc_html__( 'Number of Columns', 'protalks-core' ),
					'description' => esc_html__( 'Choose number of columns for archive list', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'columns_number' ),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_space',
					'title'       => esc_html__( 'Items Horizontal Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Choose horizontal space between items for archive list', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$team_archive_space_row = $tab->add_row_element(
				array(
					'name'       => 'qodef_team_archive_space_row',
					'dependency' => array(
						'show' => array(
							'qodef_team_archive_space' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$team_archive_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_space_custom',
					'title'       => esc_html__( 'Custom Horizontal Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Enter horizontal space between items in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_space_custom_1512',
					'title'       => esc_html__( 'Custom Horizontal Spacing - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter horizontal space between items in pixels below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_space_custom_1200',
					'title'       => esc_html__( 'Custom Horizontal Spacing - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter horizontal space between items in pixels below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_space_custom_880',
					'title'       => esc_html__( 'Custom Horizontal Spacing - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter horizontal space between items in pixels below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_vertical_space',
					'title'       => esc_html__( 'Items Vertical Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Choose vertical space between items for archive lists', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$team_archive_vertical_space_row = $tab->add_row_element(
				array(
					'name'       => 'qodef_team_archive_vertical_space_row',
					'dependency' => array(
						'show' => array(
							'qodef_team_archive_vertical_space' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$team_archive_vertical_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_vertical_space_custom',
					'title'       => esc_html__( 'Custom Vertical Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_vertical_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_vertical_space_custom_1512',
					'title'       => esc_html__( 'Custom Vertical Spacing - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_vertical_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_vertical_space_custom_1200',
					'title'       => esc_html__( 'Custom Vertical Spacing - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_vertical_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_vertical_space_custom_880',
					'title'       => esc_html__( 'Custom Vertical Spacing - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_columns_responsive',
					'title'       => esc_html__( 'Columns Responsive', 'protalks-core' ),
					'description' => esc_html__( 'Choose whether you wish to use predefined column number responsive settings, or to set column numbers for each responsive stage individually', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'columns_responsive' ),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_columns_1512',
					'title'         => esc_html__( 'Number of Columns 1369px - 1512px', 'protalks-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 1369 and 1512 px for archive list', 'protalks-core' ),
					'default_value' => '3',
					'options'       => protalks_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_team_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_columns_1368',
					'title'         => esc_html__( 'Number of Columns 1201px - 1368px', 'protalks-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 1201 and 1368 px for archive list', 'protalks-core' ),
					'default_value' => '3',
					'options'       => protalks_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_team_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_columns_1200',
					'title'         => esc_html__( 'Number of Columns 1025px - 1200px', 'protalks-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 1025 and 1200 px for archive list', 'protalks-core' ),
					'default_value' => '3',
					'options'       => protalks_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_team_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_columns_1024',
					'title'         => esc_html__( 'Number of Columns 881px - 1024px', 'protalks-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 881 and 1024 px for archive list', 'protalks-core' ),
					'default_value' => '3',
					'options'       => protalks_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_team_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_columns_880',
					'title'         => esc_html__( 'Number of Columns 681px - 880px', 'protalks-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 681 and 880 px for archive list', 'protalks-core' ),
					'default_value' => '3',
					'options'       => protalks_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_team_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_columns_680',
					'title'         => esc_html__( 'Number of Columns 0 - 680px', 'protalks-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 0 and 680 px for archive list', 'protalks-core' ),
					'default_value' => '3',
					'options'       => protalks_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_team_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_slider_loop',
					'title'       => esc_html__( 'Enable Slider Loop', 'protalks-core' ),
					'description' => esc_html__( 'Enable loop for slider display of archive list', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'yes_no' ),
					'dependency'  => array(
						'show' => array(
							'qodef_team_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_slider_autoplay',
					'title'       => esc_html__( 'Enable Slider Autoplay', 'protalks-core' ),
					'description' => esc_html__( 'Enable autoplay for slider display of archive list', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'yes_no' ),
					'dependency'  => array(
						'show' => array(
							'qodef_team_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_slider_speed',
					'title'       => esc_html__( 'Slider Speed', 'protalks-core' ),
					'description' => esc_html__( 'Enter slider speed for slider display of archive list', 'protalks-core' ),
					'dependency'  => array(
						'show' => array(
							'qodef_team_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_slider_navigation',
					'title'         => esc_html__( 'Enable Slider Navigation', 'protalks-core' ),
					'description'   => esc_html__( 'Enable navigation for slider display of archive list', 'protalks-core' ),
					'default_value' => '3',
					'options'       => protalks_core_get_select_type_options_pool( 'yes_no' ),
					'dependency'    => array(
						'show' => array(
							'qodef_team_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_slider_pagination',
					'title'         => esc_html__( 'Enable Slider Pagination', 'protalks-core' ),
					'description'   => esc_html__( 'Enable pagination for slider display of archive list', 'protalks-core' ),
					'default_value' => '3',
					'options'       => protalks_core_get_select_type_options_pool( 'yes_no' ),
					'dependency'    => array(
						'show' => array(
							'qodef_team_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_pagination_type',
					'title'       => esc_html__( 'Pagination', 'protalks-core' ),
					'description' => esc_html__( 'Choose pagination type for archive list', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'pagination_type' ),
					'dependency'  => array(
						'hide' => array(
							'qodef_team_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);
		}
	}

	add_action( 'protalks_core_action_after_team_options_archive', 'protalks_core_add_team_archive_list_options' );
}
