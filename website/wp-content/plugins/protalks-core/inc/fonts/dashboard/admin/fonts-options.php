<?php

if ( ! function_exists( 'protalks_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function protalks_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => PROTALKS_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'protalks-core' ),
				'description' => esc_html__( 'Global Fonts Options', 'protalks-core' ),
				'icon'        => 'fa fa-cog',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'protalks-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts',
					),
				)
			);

			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts to Include', 'protalks-core' ),
					'description' => esc_html__( 'Choose Google Fonts which you want to use on your website', 'protalks-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'protalks-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type'  => 'googlefont',
					'name'        => 'qodef_choose_google_font',
					'title'       => esc_html__( 'Google Font', 'protalks-core' ),
					'description' => esc_html__( 'Choose Google Font', 'protalks-core' ),
					'args'        => array(
						'include' => 'google-fonts',
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Weight', 'protalks-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts weights for your website. Impact on page load time', 'protalks-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'protalks-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'protalks-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'protalks-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'protalks-core' ),
						'300'  => esc_html__( '300 Light', 'protalks-core' ),
						'300i' => esc_html__( '300 Light Italic', 'protalks-core' ),
						'400'  => esc_html__( '400 Regular', 'protalks-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'protalks-core' ),
						'500'  => esc_html__( '500 Medium', 'protalks-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'protalks-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'protalks-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'protalks-core' ),
						'700'  => esc_html__( '700 Bold', 'protalks-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'protalks-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'protalks-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'protalks-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'protalks-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'protalks-core' ),
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style', 'protalks-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts style for your website. Impact on page load time', 'protalks-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'protalks-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'protalks-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'protalks-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'protalks-core' ),
						'greek'        => esc_html__( 'Greek', 'protalks-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'protalks-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'protalks-core' ),
					),
				)
			);

			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'protalks-core' ),
					'description' => esc_html__( 'Add custom fonts', 'protalks-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'protalks-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_ttf',
					'title'      => esc_html__( 'Custom Font TTF', 'protalks-core' ),
					'args'       => array(
						'allowed_type' => 'font/ttf',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_otf',
					'title'      => esc_html__( 'Custom Font OTF', 'protalks-core' ),
					'args'       => array(
						'allowed_type' => 'font/otf',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff',
					'title'      => esc_html__( 'Custom Font WOFF', 'protalks-core' ),
					'args'       => array(
						'allowed_type' => 'font/woff',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff2',
					'title'      => esc_html__( 'Custom Font WOFF2', 'protalks-core' ),
					'args'       => array(
						'allowed_type' => 'font/woff2',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_custom_font_name',
					'title'      => esc_html__( 'Custom Font Name', 'protalks-core' ),
				)
			);

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_page_fonts_options_map', $page );
		}
	}

	add_action( 'protalks_core_action_default_options_init', 'protalks_core_add_fonts_options', protalks_core_get_admin_options_map_position( 'fonts' ) );
}
