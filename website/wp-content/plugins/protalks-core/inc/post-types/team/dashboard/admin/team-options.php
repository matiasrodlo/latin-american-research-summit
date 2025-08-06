<?php

if ( ! function_exists( 'protalks_core_add_team_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_team_options() {
		$qode_framework = qode_framework_get_framework_root();
		$has_single     = protalks_core_team_has_single();

		if ( $has_single ) {

			$page = $qode_framework->add_options_page(
				array(
					'scope'       => PROTALKS_CORE_OPTIONS_NAME,
					'type'        => 'admin',
					'slug'        => 'team',
					'layout'      => 'tabbed',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Team', 'protalks-core' ),
					'description' => esc_html__( 'Global Team Options', 'protalks-core' ),
				)
			);

			if ( $page ) {
				$archive_tab = $page->add_tab_element(
					array(
						'name'        => 'tab-archive',
						'icon'        => 'fa fa-cog',
						'title'       => esc_html__( 'Archive Settings', 'protalks-core' ),
						'description' => esc_html__( 'Settings related to team archive pages', 'protalks-core' ),
					)
				);

				do_action( 'protalks_core_action_after_team_options_archive', $archive_tab );

				$single_tab = $page->add_tab_element(
					array(
						'name'        => 'tab-single',
						'icon'        => 'fa fa-cog',
						'title'       => esc_html__( 'Single Settings', 'protalks-core' ),
						'description' => esc_html__( 'Settings related to team single pages', 'protalks-core' ),
					)
				);

				$single_tab->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_team_single_layout',
						'title'       => esc_html__( 'Single Layout', 'protalks-core' ),
						'description' => esc_html__( 'Choose default layout for team single', 'protalks-core' ),
						'options'     => array(
							'' => esc_html__( 'Default', 'protalks-core' ),
						),
					)
				);

				$single_tab->add_field_element(
					array(
						'field_type'    => 'yesno',
						'name'          => 'qodef_team_single_content_in_grid',
						'title'         => esc_html__( 'Content in Grid', 'protalks-core' ),
						'description'   => esc_html__( 'Set content to be in grid', 'protalks-core' ),
						'default_value' => 'no',
					)
				);

				$single_tab->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_single_content_padding',
						'title'       => esc_html__( 'Main Content Padding', 'protalks-core' ),
						'description' => esc_html__( 'Set padding that will be applied for team single content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					)
				);

				$single_tab->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_single_content_padding_mobile',
						'title'       => esc_html__( 'Main Content Padding Mobile', 'protalks-core' ),
						'description' => esc_html__( 'Set padding that will be applied for team single content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					)
				);

				do_action( 'protalks_core_action_after_team_options_single', $single_tab );

				// Hook to include additional options after module options.
				do_action( 'protalks_core_action_after_team_options_map', $page );
			}
		}
	}

	add_action( 'protalks_core_action_default_options_init', 'protalks_core_add_team_options', protalks_core_get_admin_options_map_position( 'team' ) );
}
