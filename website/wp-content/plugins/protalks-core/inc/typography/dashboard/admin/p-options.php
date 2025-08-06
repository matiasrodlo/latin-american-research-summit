<?php

if ( ! function_exists( 'protalks_core_add_p_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function protalks_core_add_p_typography_options( $page ) {

		if ( $page ) {
			$paragraph_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-paragraph',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Paragraph Typography', 'protalks-core' ),
					'description' => esc_html__( 'Set values for paragraph', 'protalks-core' ),
				)
			);

			$p_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_general_typography_p',
					'title' => esc_html__( 'General Typography', 'protalks-core' ),
				)
			);

			$p_typography_row = $p_typography_section->add_row_element(
				array(
					'name' => 'qodef_p_typography_row',
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_p_color',
					'title'      => esc_html__( 'Color', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_p_font_family',
					'title'      => esc_html__( 'Font Family', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_p_font_weight',
					'title'      => esc_html__( 'Font Weight', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_p_text_transform',
					'title'      => esc_html__( 'Text Transform', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_p_font_style',
					'title'      => esc_html__( 'Font Style', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_margin_top',
					'title'      => esc_html__( 'Margin Top', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'protalks-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			/* 1512 styles */
			$p_1512_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1512_typography_p',
					'title' => esc_html__( 'Responsive 1512 Typography', 'protalks-core' ),
				)
			);

			$responsive_1512_typography_p_row = $p_1512_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1512_p_typography_row'
				)
			);

			$responsive_1512_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1512_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1512_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1512_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1512_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1512_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1368 styles */
			$p_1368_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1368_typography_p',
					'title' => esc_html__( 'Responsive 1368 Typography', 'protalks-core' ),
				)
			);

			$responsive_1368_typography_p_row = $p_1368_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1368_p_typography_row'
				)
			);

			$responsive_1368_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1368_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1368_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1368_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1368_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1368_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1200 styles */
			$p_1200_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1200_typography_p',
					'title' => esc_html__( 'Responsive 1200 Typography', 'protalks-core' ),
				)
			);

			$responsive_1200_typography_p_row = $p_1200_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1200_p_typography_row',
				)
			);

			$responsive_1200_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1200_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1200_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1200_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1200_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1200_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1024 styles */
			$p_1024_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1024_typography_p',
					'title' => esc_html__( 'Responsive 1024 Typography', 'protalks-core' ),
				)
			);

			$responsive_1024_typography_p_row = $p_1024_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1024_p_typography_row',
				)
			);

			$responsive_1024_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1024_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1024_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1024_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 880 styles */
			$p_880_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_880_typography_p',
					'title' => esc_html__( 'Responsive 880 Typography', 'protalks-core' ),
				)
			);

			$responsive_880_typography_p_row = $p_880_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_880_p_typography_row',
				)
			);

			$responsive_880_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_880_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_880_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_880_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_880_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_880_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 680 styles */
			$p_680_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_680_typography_p',
					'title' => esc_html__( 'Responsive 680 Typography', 'protalks-core' ),
				)
			);

			$responsive_680_typography_p_row = $p_680_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_680_p_typography_row',
				)
			);

			$responsive_680_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_680_font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_680_line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_680_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);
		}
	}

	add_action( 'protalks_core_action_after_typography_options_map', 'protalks_core_add_p_typography_options' );
}
