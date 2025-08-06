<?php

if ( ! function_exists( 'protalks_core_add_general_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_general_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_main_color',
					'title'       => esc_html__( 'Main Color', 'protalks-core' ),
					'description' => esc_html__( 'Choose the most dominant theme color', 'protalks-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_second_main_color',
					'title'       => esc_html__( 'Second Main Color', 'protalks-core' ),
					'description' => esc_html__( 'Choose the second most dominant theme color', 'protalks-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_background_color',
					'title'       => esc_html__( 'Page Background Color', 'protalks-core' ),
					'description' => esc_html__( 'Set background color', 'protalks-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_background_image',
					'title'       => esc_html__( 'Page Background Image', 'protalks-core' ),
					'description' => esc_html__( 'Set background image', 'protalks-core' ),
				)
			);

			$page->add_field_element(
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

			$page->add_field_element(
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

			$page->add_field_element(
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

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding',
					'title'       => esc_html__( 'Page Content Padding', 'protalks-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding_mobile',
					'title'       => esc_html__( 'Page Content Padding Mobile', 'protalks-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1200px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_boxed',
					'title'         => esc_html__( 'Boxed Layout', 'protalks-core' ),
					'description'   => esc_html__( 'Set boxed layout', 'protalks-core' ),
					'default_value' => 'no',
				)
			);

			$boxed_section = $page->add_section_element(
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
						'fixed'  => esc_html__( 'Fixed', 'protalks-core' ),
						'scroll' => esc_html__( 'Scroll', 'protalks-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_passepartout',
					'title'         => esc_html__( 'Passepartout', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'protalks-core' ),
					'default_value' => 'no',
				)
			);

			$passepartout_section = $page->add_section_element(
				array(
					'name'       => 'qodef_passepartout_section',
					'title'      => esc_html__( 'Passepartout Section', 'protalks-core' ),
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

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_content_width',
					'title'         => esc_html__( 'Initial Width of Content', 'protalks-core' ),
					'description'   => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'content_width', false ),
					'default_value' => '1300',
				)
			);

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_general_options_map', $page );

			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_custom_js',
					'title'       => esc_html__( 'Custom JS', 'protalks-core' ),
					'description' => esc_html__( 'Enter your custom JavaScript here', 'protalks-core' ),
				)
			);
		}
	}

	add_action( 'protalks_core_action_default_options_init', 'protalks_core_add_general_options', protalks_core_get_admin_options_map_position( 'general' ) );
}
