<?php

if ( ! function_exists( 'protalks_core_add_general_page_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function protalks_core_add_general_page_meta_box( $page ) {

		$general_tab = $page->add_tab_element(
			array(
				'name'        => 'tab-page',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Page Settings', 'protalks-core' ),
				'description' => esc_html__( 'General page layout settings', 'protalks-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_page_background_color',
				'title'       => esc_html__( 'Page Background Color', 'protalks-core' ),
				'description' => esc_html__( 'Set background color', 'protalks-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_page_background_image',
				'title'       => esc_html__( 'Page Background Image', 'protalks-core' ),
				'description' => esc_html__( 'Set background image', 'protalks-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_repeat',
				'title'       => esc_html__( 'Page Background Image Repeat', 'protalks-core' ),
				'description' => esc_html__( 'Set background image repeat', 'protalks-core' ),
				'options'     => array(
					''          => esc_html__( 'Default', 'protalks-core' ),
					'no-repeat' => esc_html__( 'No Repeat', 'protalks-core' ),
					'repeat'    => esc_html__( 'Repeat', 'protalks-core' ),
					'repeat-x'  => esc_html__( 'Repeat-x', 'protalks-core' ),
					'repeat-y'  => esc_html__( 'Repeat-y', 'protalks-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_size',
				'title'       => esc_html__( 'Page Background Image Size', 'protalks-core' ),
				'description' => esc_html__( 'Set background image size', 'protalks-core' ),
				'options'     => array(
					''        => esc_html__( 'Default', 'protalks-core' ),
					'contain' => esc_html__( 'Contain', 'protalks-core' ),
					'cover'   => esc_html__( 'Cover', 'protalks-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_attachment',
				'title'       => esc_html__( 'Page Background Image Attachment', 'protalks-core' ),
				'description' => esc_html__( 'Set background image attachment', 'protalks-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'protalks-core' ),
					'fixed'  => esc_html__( 'Fixed', 'protalks-core' ),
					'scroll' => esc_html__( 'Scroll', 'protalks-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding',
				'title'       => esc_html__( 'Page Content Padding', 'protalks-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding_mobile',
				'title'       => esc_html__( 'Page Content Padding Mobile', 'protalks-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1200px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_boxed',
				'title'         => esc_html__( 'Boxed Layout', 'protalks-core' ),
				'description'   => esc_html__( 'Set boxed layout', 'protalks-core' ),
				'default_value' => '',
				'options'       => protalks_core_get_select_type_options_pool( 'yes_no' ),
			)
		);

		$boxed_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_boxed_section',
				'title'      => esc_html__( 'Boxed Layout Section', 'protalks-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_boxed' => array(
							'values'        => 'no',
							'default_value' => '',
						),
					),
				),
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_boxed_background_color',
				'title'       => esc_html__( 'Boxed Background Color', 'protalks-core' ),
				'description' => esc_html__( 'Set boxed background color', 'protalks-core' ),
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_boxed_background_pattern',
				'title'       => esc_html__( 'Boxed Background Pattern', 'protalks-core' ),
				'description' => esc_html__( 'Set boxed background pattern', 'protalks-core' ),
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_boxed_background_pattern_behavior',
				'title'       => esc_html__( 'Boxed Background Pattern Behavior', 'protalks-core' ),
				'description' => esc_html__( 'Set boxed background pattern behavior', 'protalks-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'protalks-core' ),
					'fixed'  => esc_html__( 'Fixed', 'protalks-core' ),
					'scroll' => esc_html__( 'Scroll', 'protalks-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_passepartout',
				'title'         => esc_html__( 'Passepartout', 'protalks-core' ),
				'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'protalks-core' ),
				'default_value' => '',
				'options'       => protalks_core_get_select_type_options_pool( 'yes_no' ),
			)
		);

		$passepartout_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_passepartout_section',
				'dependency' => array(
					'hide' => array(
						'qodef_passepartout' => array(
							'values'        => 'no',
							'default_value' => '',
						),
					),
				),
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_passepartout_color',
				'title'       => esc_html__( 'Passepartout Color', 'protalks-core' ),
				'description' => esc_html__( 'Choose background color for passepartout', 'protalks-core' ),
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_passepartout_image',
				'title'       => esc_html__( 'Passepartout Background Image', 'protalks-core' ),
				'description' => esc_html__( 'Set background image for passepartout', 'protalks-core' ),
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size',
				'title'       => esc_html__( 'Passepartout Size', 'protalks-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'protalks-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'protalks-core' ),
				),
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size_responsive',
				'title'       => esc_html__( 'Passepartout Responsive Size', 'protalks-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1200px and below)', 'protalks-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'protalks-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_content_width',
				'title'       => esc_html__( 'Initial Width of Content', 'protalks-core' ),
				'description' => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'protalks-core' ),
				'options'     => protalks_core_get_select_type_options_pool( 'content_width' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'yesno',
				'default_value' => 'no',
				'name'          => 'qodef_content_behind_header',
				'title'         => esc_html__( 'Always put content behind header', 'protalks-core' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'protalks-core' ),
			)
		);

		// Hook to include additional options after module options.
		do_action( 'protalks_core_action_after_general_page_meta_box_map', $general_tab );
	}

	add_action( 'protalks_core_action_after_general_meta_box_map', 'protalks_core_add_general_page_meta_box', 9 );
}

if ( ! function_exists( 'protalks_core_add_general_page_meta_box_callback' ) ) {
	/**
	 * Function that set current meta box callback as general callback functions
	 *
	 * @param array $callbacks
	 *
	 * @return array
	 */
	function protalks_core_add_general_page_meta_box_callback( $callbacks ) {
		$callbacks['page'] = 'protalks_core_add_general_page_meta_box';

		return $callbacks;
	}

	add_filter( 'protalks_core_filter_general_meta_box_callbacks', 'protalks_core_add_general_page_meta_box_callback' );
}
