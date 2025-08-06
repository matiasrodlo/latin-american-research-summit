<?php

if ( ! function_exists( 'protalks_core_add_team_archive_sidebar_options' ) ) {
	/**
	 * Function that add sidebar options for team archive module
	 */
	function protalks_core_add_team_archive_sidebar_options( $tab ) {

		if ( $tab ) {
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_archive_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'protalks-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for team archives', 'protalks-core' ),
					'default_value' => 'no-sidebar',
					'options'       => protalks_core_get_select_type_options_pool( 'sidebar_layouts', false ),
				)
			);

			$custom_sidebars = protalks_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$tab->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_team_archive_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'protalks-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on team archives', 'protalks-core' ),
						'options'     => $custom_sidebars,
					)
				);
			}

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_archive_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$team_archive_sidebar_grid_gutter_row = $tab->add_row_element(
				array(
					'name'       => 'qodef_team_archive_sidebar_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_team_archive_sidebar_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$team_archive_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_sidebar_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_sidebar_grid_gutter_custom_1512',
					'title'       => esc_html__( 'Custom Grid Gutter - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_sidebar_grid_gutter_custom_1200',
					'title'       => esc_html__( 'Custom Grid Gutter - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_archive_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_archive_sidebar_grid_gutter_custom_880',
					'title'       => esc_html__( 'Custom Grid Gutter - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);
		}
	}

	add_action( 'protalks_core_action_after_team_options_archive', 'protalks_core_add_team_archive_sidebar_options' );
}

if ( ! function_exists( 'protalks_core_add_team_single_sidebar_options' ) ) {
	/**
	 * Function that add sidebar options for team single module
	 */
	function protalks_core_add_team_single_sidebar_options( $tab ) {

		if ( $tab ) {
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_single_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'protalks-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for team singles', 'protalks-core' ),
					'default_value' => 'no-sidebar',
					'options'       => protalks_core_get_select_type_options_pool( 'sidebar_layouts', false ),
				)
			);

			$custom_sidebars = protalks_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$tab->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_team_single_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'protalks-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on team singles', 'protalks-core' ),
						'options'     => $custom_sidebars,
					)
				);
			}

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_single_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$team_single_sidebar_grid_gutter_row = $tab->add_row_element(
				array(
					'name'       => 'qodef_team_single_sidebar_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_team_single_sidebar_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$team_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_single_sidebar_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_single_sidebar_grid_gutter_custom_1512',
					'title'       => esc_html__( 'Custom Grid Gutter - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_single_sidebar_grid_gutter_custom_1200',
					'title'       => esc_html__( 'Custom Grid Gutter - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_single_sidebar_grid_gutter_custom_880',
					'title'       => esc_html__( 'Custom Grid Gutter - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);
		}
	}

	add_action( 'protalks_core_action_after_team_options_single', 'protalks_core_add_team_single_sidebar_options' );
}
