<?php

if ( ! function_exists( 'protalks_core_search_options' ) ) {
	/**
	 * Function that add global module options
	 */
	function protalks_core_search_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => PROTALKS_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'search',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Search', 'protalks-core' ),
				'description' => esc_html__( 'Global Search Options', 'protalks-core' ),
			)
		);

		if ( $page ) {
			$search_page_section = $page->add_section_element(
				array(
					'name'  => 'qodef_search_page_section',
					'title' => esc_html__( 'Search Page', 'protalks-core' ),
				)
			);

			$search_page_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_search_page_enable_page_title',
					'title'       => esc_html__( 'Enable Page Title', 'protalks-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page title on search page', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'no_yes' ),
				)
			);

			$search_page_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_search_page_sidebar_layout',
					'title'       => esc_html__( 'Sidebar Layout', 'protalks-core' ),
					'description' => esc_html__( 'Choose default sidebar layout for search page', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'sidebar_layouts' ),
				)
			);

			$custom_sidebars = protalks_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$search_page_section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_search_page_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'protalks-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on search page', 'protalks-core' ),
						'options'     => $custom_sidebars,
					)
				);
			}

			$search_page_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_search_page_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar for search page', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$search_page_sidebar_grid_gutter_row = $search_page_section->add_row_element(
				array(
					'name'       => 'qodef_search_page_sidebar_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_search_page_sidebar_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$search_page_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_search_page_sidebar_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$search_page_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_search_page_sidebar_grid_gutter_custom_1512',
					'title'       => esc_html__( 'Custom Grid Gutter - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$search_page_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_search_page_sidebar_grid_gutter_custom_1200',
					'title'       => esc_html__( 'Custom Grid Gutter - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$search_page_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_search_page_sidebar_grid_gutter_custom_880',
					'title'       => esc_html__( 'Custom Grid Gutter - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$search_page_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_search_page_excerpt_number_of_characters',
					'title'       => esc_html__( 'Number of Characters in Excerpt', 'protalks-core' ),
					'description' => esc_html__( 'Fill a number of characters in excerpt for post summary. Default value is 180', 'protalks-core' ),
				)
			);

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_search_page_options_map', $search_page_section );

			$search_opener_section = $page->add_section_element(
				array(
					'name'  => 'qodef_search_opener_section',
					'title' => esc_html__( 'Search Opener', 'protalks-core' ),
				)
			);

			$search_opener_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_search_icon_source',
					'title'         => esc_html__( 'Search Icon Source', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'icon_source', false ),
					'default_value' => 'predefined',
				)
			);

			$search_opener_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_search_icon_pack',
					'title'         => esc_html__( 'Icon Pack', 'protalks-core' ),
					'options'       => qode_framework_icons()->get_icon_packs( array( 'linea-icons', 'dripicons', 'simple-line-icons' ) ),
					'default_value' => 'font-awesome',
					'dependency'    => array(
						'show' => array(
							'qodef_search_icon_source' => array(
								'values'        => 'icon_pack',
								'default_value' => 'predefined',
							),
						),
					),
				)
			);

			$section_svg_path = $search_opener_section->add_section_element(
				array(
					'title'      => esc_html__( 'SVG Path', 'protalks-core' ),
					'name'       => 'qodef_search_svg_path_section',
					'dependency' => array(
						'show' => array(
							'qodef_search_icon_source' => array(
								'values'        => 'svg_path',
								'default_value' => 'predefined',
							),
						),
					),
				)
			);

			$section_svg_path->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_search_icon_svg_path',
					'title'       => esc_html__( 'Search Open Icon SVG Path', 'protalks-core' ),
					'description' => esc_html__( 'Enter your search open icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'protalks-core' ),
				)
			);

			$section_svg_path->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_search_close_icon_svg_path',
					'title'       => esc_html__( 'Search Close Icon SVG Path', 'protalks-core' ),
					'description' => esc_html__( 'Enter your search close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'protalks-core' ),
				)
			);

			$search_opener_section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_search_icon_size',
					'title'      => esc_html__( 'Search Icon Size', 'protalks-core' ),
					'args'       => array(
						'suffix' => esc_html__( 'px', 'protalks-core' ),
					),
				)
			);

			$color_row = $search_opener_section->add_row_element(
				array(
					'name'  => 'qodef_color_row',
					'title' => esc_html__( 'Search Icon', 'protalks-core' ),
				)
			);

			$color_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_search_icon_color',
					'title'      => esc_html__( 'Search Icon Color', 'protalks-core' ),
				)
			);

			$color_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_search_icon_hover_color',
					'title'      => esc_html__( 'Search Icon Hover Color', 'protalks-core' ),
				)
			);

			$search_opener_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_search_icon_label',
					'title'         => esc_html__( 'Search Icon Label', 'protalks-core' ),
					'default_value' => 'no',
					'options'       => protalks_core_get_select_type_options_pool( 'no_yes', false ),
				)
			);

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_search_options_map', $page );
		}
	}

	add_action( 'protalks_core_action_default_options_init', 'protalks_core_search_options', protalks_core_get_admin_options_map_position( 'search' ) );
}
