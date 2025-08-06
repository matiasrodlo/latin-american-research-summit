<?php

if ( ! function_exists( 'protalks_core_add_team_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_team_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		$has_single     = protalks_core_team_has_single();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'team' ),
				'type'  => 'meta',
				'slug'  => 'team',
				'title' => esc_html__( 'Team Single', 'protalks-core' ),
			)
		);

		if ( $page ) {
			$section = $page->add_section_element(
				array(
					'name'        => 'qodef_team_general_section',
					'title'       => esc_html__( 'General Settings', 'protalks-core' ),
					'description' => esc_html__( 'General information about team member.', 'protalks-core' ),
				)
			);

			if ( $has_single ) {
				$section->add_field_element(
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

				$section->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_team_single_content_in_grid',
						'title'         => esc_html__( 'Content in Grid', 'protalks-core' ),
						'description'   => esc_html__( 'Set content to be in grid', 'protalks-core' ),
						'default_value' => '',
						'options'       => protalks_core_get_select_type_options_pool( 'no_yes' ),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_single_content_padding',
						'title'       => esc_html__( 'Main Content Padding', 'protalks-core' ),
						'description' => esc_html__( 'Set padding that will be applied for team single content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_single_content_padding_mobile',
						'title'       => esc_html__( 'Main Content Padding Mobile', 'protalks-core' ),
						'description' => esc_html__( 'Set padding that will be applied for team single content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					)
				);
			}

			$section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_team_list_image',
					'title'       => esc_html__( 'Team List Image', 'protalks-core' ),
					'description' => esc_html__( 'Upload image to be displayed on team list instead of featured image', 'protalks-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_role',
					'title'       => esc_html__( 'Role', 'protalks-core' ),
					'description' => esc_html__( 'Enter team member role', 'protalks-core' ),
				)
			);

			$social_icons_repeater = $section->add_repeater_element(
				array(
					'name'        => 'qodef_team_member_social_icons',
					'title'       => esc_html__( 'Social Networks', 'protalks-core' ),
					'description' => esc_html__( 'Populate team member social networks info', 'protalks-core' ),
					'button_text' => esc_html__( 'Add New Network', 'protalks-core' ),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_member_icon_source',
					'title'         => esc_html__( 'Team Member Icon Source', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'icon_source', false, array( 'predefined' ) ),
					'default_value' => 'svg_path',
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'iconpack',
					'name'       => 'qodef_team_member_icon',
					'title'      => esc_html__( 'Icon', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_team_member_icon_source' => array(
								'values'        => 'icon_pack',
								'default_value' => 'svg_path',
							),
						),
					),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_team_member_svg_path',
					'title'       => esc_html__( 'Team Member Icon SVG Path', 'protalks-core' ),
					'description' => esc_html__( 'Enter your search open icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_team_member_icon_source' => array(
								'values'        => 'svg_path',
								'default_value' => 'svg_path',
							),
						),
					),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_team_member_icon_link',
					'title'      => esc_html__( 'Icon Link', 'protalks-core' ),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_team_member_icon_target',
					'title'      => esc_html__( 'Icon Target', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'link_target' ),
				)
			);

			if ( $has_single ) {
				$section->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_member_phone_number',
						'title'       => esc_html__( 'Phone Number', 'protalks-core' ),
						'description' => esc_html__( 'Enter team member phone number', 'protalks-core' ),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_member_email',
						'title'       => esc_html__( 'E-mail', 'protalks-core' ),
						'description' => esc_html__( 'Enter team member e-mail address', 'protalks-core' ),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_member_address',
						'title'       => esc_html__( 'Address', 'protalks-core' ),
						'description' => esc_html__( 'Enter team member address', 'protalks-core' ),
					)
				);
			}

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_team_meta_box_map', $page, $has_single );
		}
	}

	add_action( 'protalks_core_action_default_meta_boxes_init', 'protalks_core_add_team_single_meta_box' );
}
