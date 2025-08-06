<?php

if ( ! function_exists( 'protalks_core_add_h6_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function protalks_core_add_h6_typography_options( $page ) {

		if ( $page ) {
			$h6_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-h6',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'H6 Typography', 'protalks-core' ),
					'description' => esc_html__( 'Set values for Heading 6 HTML element', 'protalks-core' ),
				)
			);

			$h6_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_h6_typography_section',
					'title' => esc_html__( 'General Typography', 'protalks-core' ),
				)
			);

			$h6_typography_row = $h6_typography_section->add_row_element(
				array(
					'name' => 'qodef_h6_typography_row',
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_h6_color',
					'title'      => esc_html__( 'Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_h6_font_family',
					'title'      => esc_html__( 'Font Family', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_font_weight',
					'title'      => esc_html__( 'Font Weight', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_text_transform',
					'title'      => esc_html__( 'Text Transform', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_font_style',
					'title'      => esc_html__( 'Font Style', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_h6_link_hover_color',
					'title'      => esc_html__( 'Link Hover Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_link_hover_text_decoration',
					'title'      => esc_html__( 'Link Hover Text Decoration', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_margin_top',
					'title'      => esc_html__( 'Margin Top', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			/* 1512 styles */
			$h6_1512_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1512_typography_h6',
					'title' => esc_html__( 'Responsive 1512 Typography', 'protalks-core' ),
				)
			);

			$responsive_1512_typography_h6_row = $h6_1512_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1512_h6_typography_row',
				)
			);

			$responsive_1512_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1512_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1512_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1512_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1512_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1512_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1368 styles */
			$h6_1368_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1368_typography_h6',
					'title' => esc_html__( 'Responsive 1368 Typography', 'protalks-core' ),
				)
			);

			$responsive_1368_typography_h6_row = $h6_1368_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1368_h6_typography_row',
				)
			);

			$responsive_1368_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1368_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1368_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1368_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1368_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1368_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1200 styles */
			$h6_1200_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1200_typography_h6',
					'title' => esc_html__( 'Responsive 1200 Typography', 'protalks-core' ),
				)
			);

			$responsive_1200_typography_h6_row = $h6_1200_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1200_h6_typography_row',
				)
			);

			$responsive_1200_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1200_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1200_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1200_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1200_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1200_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1024 styles */
			$h6_1024_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1024_typography_h6',
					'title' => esc_html__( 'Responsive 1024 Typography', 'protalks-core' ),
				)
			);

			$responsive_1024_typography_h6_row = $h6_1024_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1024_h6_typography_row',
				)
			);

			$responsive_1024_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1024_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1024_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1024_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 880 styles */
			$h6_880_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_880_typography_h6',
					'title' => esc_html__( 'Responsive 880 Typography', 'protalks-core' ),
				)
			);

			$responsive_880_typography_h6_row = $h6_880_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_880_h6_typography_row',
				)
			);

			$responsive_880_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_880_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_880_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_880_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_880_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_880_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 680 styles */
			$h6_680_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_680_typography_h6',
					'title' => esc_html__( 'Responsive 680 Typography', 'protalks-core' ),
				)
			);

			$responsive_680_typography_h6_row = $h6_680_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_680_h6_typography_row',
				)
			);

			$responsive_680_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_680_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_680_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_680_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);
		}
	}

	add_action( 'protalks_core_action_after_typography_options_map', 'protalks_core_add_h6_typography_options' );
}
