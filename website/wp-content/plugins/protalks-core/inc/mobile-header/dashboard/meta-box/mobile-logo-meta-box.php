<?php

if ( ! function_exists( 'protalks_core_add_page_mobile_logo_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_page_mobile_logo_meta_box( $logo_tab ) {

		if ( $logo_tab ) {

			$mobile_header_logo_section = $logo_tab->add_section_element(
				array(
					'name'  => 'qodef_mobile_header_logo_section',
					'title' => esc_html__( 'Mobile Header Logo Options', 'protalks-core' ),
				)
			);

			$mobile_header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_height',
					'title'       => esc_html__( 'Mobile Logo Height', 'protalks-core' ),
					'description' => esc_html__( 'Enter mobile logo height', 'protalks-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'protalks-core' ),
					),
				)
			);

			$mobile_header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_padding',
					'title'       => esc_html__( 'Mobile Logo Padding', 'protalks-core' ),
					'description' => esc_html__( 'Enter mobile logo padding value (top right bottom left)', 'protalks-core' ),
				)
			);

			$mobile_header_logo_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_mobile_logo_source',
					'title'         => esc_html__( 'Mobile Logo Source', 'protalks-core' ),
					'options'       => array(
						''         => esc_html__( 'Default', 'protalks-core' ),
						'image'    => esc_html__( 'Image', 'protalks-core' ),
						'svg-path' => esc_html__( 'SVG Path', 'protalks-core' ),
						'textual'  => esc_html__( 'Textual', 'protalks-core' ),
					),
					'default_value' => '',
				)
			);

			$logo_image_section = $mobile_header_logo_section->add_section_element(
				array(
					'title'      => esc_html__( 'Image settings', 'protalks-core' ),
					'name'       => 'qodef_mobile_logo_image_section',
					'dependency' => array(
						'show' => array(
							'qodef_mobile_logo_source' => array(
								'values'        => 'image',
								'default_value' => '',
							),
						),
					),
				)
			);

			$logo_image_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_mobile_logo_main',
					'title'       => esc_html__( 'Mobile Logo - Main', 'protalks-core' ),
					'description' => esc_html__( 'Choose main mobile logo image', 'protalks-core' ),
					'multiple'    => 'no',
				)
			);

			// Hook to include additional options after section part.
			do_action( 'protalks_core_action_after_mobile_logo_image_section_meta_map', $logo_tab, $mobile_header_logo_section, $logo_image_section );

			$logo_svg_path_section = $mobile_header_logo_section->add_section_element(
				array(
					'title'      => esc_html__( 'SVG settings', 'protalks-core' ),
					'name'       => 'qodef_mobile_logo_svg_path_section',
					'dependency' => array(
						'show' => array(
							'qodef_mobile_logo_source' => array(
								'values'        => 'svg-path',
								'default_value' => '',
							),
						),
					),
				)
			);

			$logo_svg_path_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_mobile_logo_svg_path',
					'title'       => esc_html__( 'Logo SVG Path', 'protalks-core' ),
					'description' => esc_html__( 'Enter your logo icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'protalks-core' ),
				)
			);

			$logo_svg_path_section_row = $logo_svg_path_section->add_row_element(
				array(
					'name'  => 'qodef_mobile_logo_svg_path_section_row',
					'title' => esc_html__( 'SVG Styles', 'protalks-core' ),
				)
			);

			$logo_svg_path_section_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_logo_svg_path_color',
					'title'      => esc_html__( 'Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_svg_path_section_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_logo_svg_path_hover_color',
					'title'      => esc_html__( 'Hover Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_svg_path_section_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_logo_svg_path_size',
					'title'      => esc_html__( 'SVG Icon Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after section part.
			do_action( 'protalks_core_action_after_mobile_logo_svg_path_section_meta_map', $logo_tab, $mobile_header_logo_section, $logo_svg_path_section );

			$logo_textual_section = $mobile_header_logo_section->add_section_element(
				array(
					'title'      => esc_html__( 'Textual settings', 'protalks-core' ),
					'name'       => 'qodef_mobile_logo_textual_section',
					'dependency' => array(
						'show' => array(
							'qodef_mobile_logo_source' => array(
								'values'        => 'textual',
								'default_value' => '',
							),
						),
					),
				)
			);

			$logo_textual_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_text',
					'title'       => esc_html__( 'Logo Text', 'protalks-core' ),
					'description' => esc_html__( 'Fill your text to be as Logo image', 'protalks-core' ),
				)
			);

			$logo_textual_section_row = $logo_textual_section->add_row_element(
				array(
					'name'  => 'qodef_mobile_logo_textual_section_row',
					'title' => esc_html__( 'Typography Styles', 'protalks-core' ),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_logo_text_color',
					'title'      => esc_html__( 'Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_logo_text_hover_color',
					'title'      => esc_html__( 'Hover Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_mobile_logo_text_font_family',
					'title'      => esc_html__( 'Font Family', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_logo_text_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_logo_text_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_logo_text_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_font_weight',
					'title'      => esc_html__( 'Font Weight', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_text_transform',
					'title'      => esc_html__( 'Text Transform', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_font_style',
					'title'      => esc_html__( 'Font Style', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_hover_text_decoration',
					'title'      => esc_html__( 'Hover Text Decoration', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after section part.
			do_action( 'protalks_core_action_after_mobile_logo_textual_section_meta_map', $logo_tab, $mobile_header_logo_section, $logo_textual_section );

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_page_mobile_logo_meta_map', $mobile_header_logo_section );
		}
	}

	add_action( 'protalks_core_action_after_page_mobile_header_meta_map', 'protalks_core_add_page_mobile_logo_meta_box' );
}
