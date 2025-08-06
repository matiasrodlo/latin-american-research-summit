<?php

if ( ! function_exists( 'protalks_core_add_textual_projects_showcase_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_textual_projects_showcase_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Textual_Projects_Showcase_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_textual_projects_showcase_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Textual_Projects_Showcase_Shortcode extends ProTalksCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/textual-projects-showcase' );
			$this->set_base( 'protalks_core_textual_projects_showcase' );
			$this->set_name( esc_html__( 'Textual Project Showcase', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays textual projects showcase', 'protalks-core' ) );

			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'content_alignment',
					'title'      => esc_html__( 'Content Alignment', 'protalks-core' ),
					'options'    => array(
						''       => esc_html__( 'Default', 'protalks-core' ),
						'left'   => esc_html__( 'Left', 'protalks-core' ),
						'center' => esc_html__( 'Center', 'protalks-core' ),
						'right'  => esc_html__( 'Right', 'protalks-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Link Items', 'protalks-core' ),
					'items'      => array_merge(
						array(
							array(
								'field_type'    => 'select',
								'name'          => 'item_type',
								'title'         => esc_html__( 'Type', 'protalks-core' ),
								'options'       => array(
									'image' => esc_html__( 'Image', 'protalks-core' ),
									'video' => esc_html__( 'Video', 'protalks-core' ),
									'text'  => esc_html__( 'Text', 'protalks-core' ),
								),
								'default_value' => 'image',
							),
							array(
								'field_type' => 'image',
								'name'       => 'item_image',
								'title'      => esc_html__( 'Image', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'image',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type' => 'image',
								'name'       => 'item_hover_image',
								'title'      => esc_html__( 'Hover Image', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'image',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type' => 'text',
								'name'       => 'item_image_width',
								'title'      => esc_html__( 'Image Width', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'image',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type' => 'text',
								'name'       => 'item_image_width_1440',
								'title'      => esc_html__( 'Image Width on Lap Top Devices (1440px)', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'image',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type' => 'text',
								'name'       => 'item_image_width_680',
								'title'      => esc_html__( 'Image Width on Mobile (680px)', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'image',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type'  => 'text',
								'name'        => 'item_video_src',
								'title'       => esc_html__( 'Video Source', 'protalks-core' ),
								'description' => esc_html__( 'Enter a link to self hosted video file', 'protalks-core' ),
								'dependency'  => array(
									'show' => array(
										'item_type' => array(
											'values' => 'video',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type' => 'text',
								'name'       => 'item_video_width',
								'title'      => esc_html__( 'Video Custom Width', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'video',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type' => 'text',
								'name'       => 'item_video_height',
								'title'      => esc_html__( 'Video Custom Height', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'video',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type' => 'text',
								'name'       => 'item_text',
								'title'      => esc_html__( 'Text', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'text',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type'    => 'select',
								'name'          => 'highlight',
								'title'         => esc_html__( 'Highlight Text', 'protalks-core' ),
								'options'       => protalks_core_get_select_type_options_pool( 'no_yes', false ),
								'default_value' => 'no',
								'dependency'    => array(
									'show' => array(
										'item_type' => array(
											'values' => 'text',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type' => 'text',
								'name'       => 'item_link',
								'title'      => esc_html__( 'Link', 'protalks-core' ),
								'dependency' => array(
									'show' => array(
										'item_type' => array(
											'values' => 'image',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type'    => 'select',
								'name'          => 'item_link_target',
								'title'         => esc_html__( 'Target', 'protalks-core' ),
								'options'       => protalks_core_get_select_type_options_pool( 'link_target', false ),
								'default_value' => '_self',
								'dependency'    => array(
									'show' => array(
										'item_type' => array(
											'values' => 'image',
											'default_value' => 'image',
										),
									),
								),
							),
							array(
								'field_type'    => 'select',
								'name'          => 'item_hide_on_mobile',
								'title'         => esc_html__( 'Hide This Item On Mobile', 'protalks-core' ),
								'options'       => protalks_core_get_select_type_options_pool( 'no_yes' ),
								'default_value' => '',
							),
						)
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_font_size',
					'title'      => esc_html__( 'Text Font Size', 'protalks-core' ),
					'group'      => esc_html__( 'Text Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_line_height',
					'title'      => esc_html__( 'Text Line Height', 'protalks-core' ),
					'group'      => esc_html__( 'Text Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_letter_spacing',
					'title'      => esc_html__( 'Text Letter Spacing', 'protalks-core' ),
					'group'      => esc_html__( 'Text Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'protalks-core' ),
					'group'      => esc_html__( 'Text Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'text_font_size_1700',
					'title'       => esc_html__( 'Font Size 1700', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1700', 'protalks-core' ),
					'group'       => esc_html__( 'Text Responsive Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'text_font_size_1512',
					'title'       => esc_html__( 'Font Size 1512', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1512', 'protalks-core' ),
					'group'       => esc_html__( 'Text Responsive Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'text_font_size_1200',
					'title'       => esc_html__( 'Font Size 1200', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1200', 'protalks-core' ),
					'group'       => esc_html__( 'Text Responsive Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'text_font_size_880',
					'title'       => esc_html__( 'Font Size 880', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 880', 'protalks-core' ),
					'group'       => esc_html__( 'Text Responsive Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'text_font_size_680',
					'title'       => esc_html__( 'Font Size 680', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 680', 'protalks-core' ),
					'group'       => esc_html__( 'Text Responsive Style', 'protalks-core' ),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['unique_class']   = 'qodef-textual-projects-showcase-' . rand( 0, 1000 );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			$atts['this_shortcode'] = $this;
			$this->set_text_responsive_styles( $atts );

			return protalks_core_get_template_part( 'shortcodes/textual-projects-showcase', 'templates/content', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-textual-projects-showcase qodef--has-appear';
			$holder_classes[] = $atts['unique_class'];
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['content_alignment'] ) ? 'qodef-alignment--' . $atts['content_alignment'] : 'qodef-alignment--left';

			return implode( ' ', $holder_classes );
		}

		private function get_text_styles( $atts ) {
			$styles = array();

			$font_size = $atts['text_font_size'];
			if ( ! empty( $font_size ) ) {
				if ( qode_framework_string_ends_with_typography_units( $font_size ) ) {
					$styles[] = 'font-size: ' . $font_size;
				} else {
					$styles[] = 'font-size: ' . intval( $font_size ) . 'px';
				}
			}

			$line_height = $atts['text_line_height'];
			if ( ! empty( $line_height ) ) {
				if ( qode_framework_string_ends_with_typography_units( $line_height ) ) {
					$styles[] = 'line-height: ' . $line_height;
				} else {
					$styles[] = 'line-height: ' . intval( $line_height ) . 'px';
				}
			}

			$letter_spacing = $atts['text_letter_spacing'];
			if ( ! empty( $letter_spacing ) ) {
				if ( qode_framework_string_ends_with_typography_units( $letter_spacing ) ) {
					$styles[] = 'letter-spacing: ' . $letter_spacing;
				} else {
					$styles[] = 'letter-spacing: ' . intval( $letter_spacing ) . 'px';
				}
			}

			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}

			return $styles;
		}

		private function set_text_responsive_styles( $atts ) {
			$unique_class = '.' . $atts['unique_class'] . ' .qodef-e-holder-inner';
			$screen_sizes = array( '1700', '1512', '1200', '880', '680' );

			foreach ( $screen_sizes as $screen_size ) {
				$styles = array();

				$font_size = $atts[ 'text_font_size_' . $screen_size ];

				if ( ! empty( $font_size ) ) {
					if ( qode_framework_string_ends_with_typography_units( $font_size ) ) {
						$styles['font-size'] = $font_size . '!important';
					} else {
						$styles['font-size'] = intval( $font_size ) . 'px !important';
					}
				}

				if ( ! empty( $styles ) ) {
					add_filter(
						'protalks_core_filter_add_responsive_' . $screen_size . '_inline_style_in_footer',
						function ( $style ) use ( $unique_class, $styles ) {
							$style .= qode_framework_dynamic_style( $unique_class, $styles );

							return $style;
						}
					);
				}
			}
		}

		public function get_item_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['item_image_width'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['item_image_width'] ) ) {
					$styles[] = '--image-width: ' . $atts['item_image_width'];
				} else {
					$styles[] = '--image-width: ' . intval( $atts['item_image_width'] ) . 'px';
				}
			}

			if ( '' !== $atts['item_image_width_1440'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['item_image_width_1440'] ) ) {
					$styles[] = '--image-width1440: ' . $atts['item_image_width_1440'];
				} else {
					$styles[] = '--image-width1440: ' . intval( $atts['item_image_width_1440'] ) . 'px';
				}
			}
			
			if ( '' !== $atts['item_image_width_680'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['item_image_width_680'] ) ) {
					$styles[] = '--image-width680: ' . $atts['item_image_width_680'];
				} else {
					$styles[] = '--image-width680: ' . intval( $atts['item_image_width_680'] ) . 'px';
				}
			}

			return $styles;
		}
	}
}
