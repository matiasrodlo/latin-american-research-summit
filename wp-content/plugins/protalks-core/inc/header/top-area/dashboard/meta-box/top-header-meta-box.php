<?php
if ( ! function_exists( 'protalks_core_add_top_area_meta_options' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function protalks_core_add_top_area_meta_options( $page ) {
		$top_area_section = $page->add_section_element(
			array(
				'name'       => 'qodef_top_area_section',
				'title'      => esc_html__( 'Top Area', 'protalks-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => protalks_core_dependency_for_top_area_options(),
							'default_value' => '',
						),
					),
				),
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header',
				'title'       => esc_html__( 'Top Area', 'protalks-core' ),
				'description' => esc_html__( 'Enable top area', 'protalks-core' ),
				'options'     => protalks_core_get_select_type_options_pool( 'yes_no' ),
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'protalks-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'protalks-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no',
						),
					),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_top_area_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'protalks-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'protalks-core' ),
				'options'       => protalks_core_get_select_type_options_pool( 'no_yes' ),
				'default_value' => '',
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'protalks-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'protalks-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'protalks-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'protalks-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'protalks-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_set_top_area_header_content_alignment',
				'title'       => esc_html__( 'Content Alignment', 'protalks-core' ),
				'description' => esc_html__( 'Set widgets content alignment inside top header area', 'protalks-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'protalks-core' ),
					'center' => esc_html__( 'Center', 'protalks-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'protalks-core' ),
				'description' => esc_html__( 'Choose top area background color', 'protalks-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_border_color',
				'title'       => esc_html__( 'Top Area Border Color', 'protalks-core' ),
				'description' => esc_html__( 'Enter top area border color', 'protalks-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_border_width',
				'title'       => esc_html__( 'Top Area Border Width', 'protalks-core' ),
				'description' => esc_html__( 'Enter top area border width size', 'protalks-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'protalks-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header_border_style',
				'title'       => esc_html__( 'Top Area Border Style', 'protalks-core' ),
				'description' => esc_html__( 'Choose top area border style', 'protalks-core' ),
				'options'     => protalks_core_get_select_type_options_pool( 'border_style' ),
			)
		);

		$custom_sidebars = protalks_core_get_custom_sidebars();
		if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
			$top_area_options_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_top_area_header_custom_widget_area_left',
					'title'       => esc_html__( 'Choose Custom Left Widget Area for Top Area Header', 'protalks-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in top area header inside left widget area', 'protalks-core' ),
					'options'     => $custom_sidebars,
				)
			);

			$top_area_options_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_top_area_header_custom_widget_area_right',
					'title'       => esc_html__( 'Choose Custom Right Widget Area for Top Area Header', 'protalks-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in top area header inside right widget area', 'protalks-core' ),
					'options'     => $custom_sidebars,
				)
			);
		}
	}

	add_action( 'protalks_core_action_after_page_header_meta_map', 'protalks_core_add_top_area_meta_options', 20 );
}
