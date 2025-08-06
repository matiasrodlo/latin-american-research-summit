<?php

if ( ! function_exists( 'protalks_core_add_button_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_button_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Button_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_button_shortcode', 9 );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Button_Shortcode extends ProTalksCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'protalks_core_filter_button_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/button' );
			$this->set_base( 'protalks_core_button' );
			$this->set_name( esc_html__( 'Button', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays button with provided parameters', 'protalks-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);

			$options_map = protalks_core_get_variations_options_map( $this->get_layouts() );

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'button_layout',
					'title'         => esc_html__( 'Layout', 'protalks-core' ),
					'options'       => $this->get_layouts(),
					'default_value' => $options_map['default_value'],
					'visibility'    => array(
						'map_for_page_builder' => $options_map['visibility'],
						'map_for_widget'       => $options_map['visibility'],
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'size',
					'title'      => esc_html__( 'Size', 'protalks-core' ),
					'options'    => array(
						''      => esc_html__( 'Normal', 'protalks-core' ),
						'small' => esc_html__( 'Small', 'protalks-core' ),
						'large' => esc_html__( 'Large', 'protalks-core' ),
						'full'  => esc_html__( 'Normal Full Width', 'protalks-core' ),
					),
					'dependency' => array(
						'hide' => array(
							'button_layout' => array(
								'values'        => 'textual',
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'text',
					'title'         => esc_html__( 'Button Text', 'protalks-core' ),
					'default_value' => esc_html__( 'Button Text', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link',
					'title'      => esc_html__( 'Button Link', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'target',
					'title'         => esc_html__( 'Target', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'color',
					'title'      => esc_html__( 'Text Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'name'       => 'hover_color',
					'field_type' => 'color',
					'title'      => esc_html__( 'Text Hover Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'background_color',
					'title'      => esc_html__( 'Background Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled' ),
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'hover_background_color',
					'title'      => esc_html__( 'Background Hover Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'border_color',
					'title'      => esc_html__( 'Border Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'hover_border_color',
					'title'      => esc_html__( 'Border Hover Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'border_radius',
					'title'      => esc_html__( 'Border Radius', 'protalks-core' ),
					'description' => esc_html__( 'Insert border radius in format: top right bottom left', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'protalks-core' ),
					'description' => esc_html__( 'Set margin that will be applied for button in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					'group'       => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'padding',
					'title'       => esc_html__( 'Padding', 'protalks-core' ),
					'description' => esc_html__( 'Set padding that will be applied for button in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					'group'       => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'font_family',
					'title'      => esc_html__( 'Font Family', 'protalks-core' ),
					'group'      => esc_html__( 'Typography Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'group'      => esc_html__( 'Typography Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'group'      => esc_html__( 'Typography Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'font_weight',
					'title'      => esc_html__( 'Font Weight', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_weight' ),
					'group'      => esc_html__( 'Typography Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'font_style',
					'title'      => esc_html__( 'Font Style', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_style' ),
					'group'      => esc_html__( 'Typography Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'text_transform',
					'title'      => esc_html__( 'Text Transform', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_transform' ),
					'group'      => esc_html__( 'Typography Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'html_type',
					'title'         => esc_html__( 'HTML Type', 'protalks-core' ),
					'options'       => array(
						'default' => esc_html__( 'Default', 'protalks-core' ),
						'input'   => esc_html__( 'Input', 'protalks-core' ),
						'submit'  => esc_html__( 'Submit', 'protalks-core' ),
					),
					'default_value' => 'default',
					'visibility'    => array(
						'map_for_page_builder' => false,
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'input_name',
					'title'      => esc_html__( 'Input Name', 'protalks-core' ),
					'visibility' => array(
						'map_for_page_builder' => false,
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'array',
					'name'       => 'custom_attrs',
					'title'      => esc_html__( 'Custom Data Attributes', 'protalks-core' ),
					'visibility' => array(
						'map_for_page_builder' => false,
					),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'protalks_core_button', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['styles']         = $this->get_styles( $atts );

			return protalks_core_get_template_part( 'shortcodes/button', 'variations/' . $atts['button_layout'] . '/templates/' . $atts['html_type'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-button';
			$holder_classes[] = ! empty( $atts['button_layout'] ) ? 'qodef-layout--' . $atts['button_layout'] : '';
			$holder_classes[] = ! empty( $atts['size'] ) ? 'qodef-size--' . $atts['size'] : '';
			$holder_classes[] = 'default' === $atts['html_type'] ? 'qodef-html--link' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['color'] ) ) {
				$styles[] = '--qode-button-color: ' . $atts['color'];
			}

			if ( ! empty( $atts['hover_color'] ) ) {
				$styles[] = '--qode-button-hover-color: ' . $atts['hover_color'];
			}

			if ( ! empty( $atts['background_color'] ) ) {
				$styles[] = '--qode-button-bg-color: ' . $atts['background_color'];
			}

			if ( ! empty( $atts['hover_background_color'] ) ) {
				$styles[] = '--qode-button-bg-hover-color: ' . $atts['hover_background_color'];
			}

			if ( ! empty( $atts['border_color'] ) ) {
				$styles[] = '--qode-button-border-color: ' . $atts['border_color'];
			}

			if ( ! empty( $atts['hover_border_color'] ) ) {
				$styles[] = '--qode-button-border-hover-color: ' . $atts['hover_border_color'];
			}

			if ( isset( $atts['border_radius'] ) && '' !== $atts['border_radius'] ) {
				$styles[] = 'border-radius: ' . intval( $atts['border_radius'] ) . 'px';
			}


			if ( ! empty( $atts['font_family'] ) ) {
				$styles[] = 'font-family: ' . $atts['font_family'];
			}

			if ( ! empty( $atts['font_size'] ) ) {
				$styles[] = 'font-size: ' . $atts['font_size'];
			}

			$line_height = $atts['line_height'];
			if ( ! empty( $line_height ) ) {
				if ( qode_framework_string_ends_with_typography_units( $line_height ) ) {
					$styles[] = 'line-height: ' . $line_height;
				} else {
					$styles[] = 'line-height: ' . intval( $line_height ) . 'px';
				}
			}

			if ( ! empty( $atts['font_weight'] ) ) {
				$styles[] = 'font-weight: ' . $atts['font_weight'];
			}

			if ( ! empty( $atts['font_style'] ) ) {
				$styles[] = 'font-style: ' . $atts['font_style'];
			}

			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}

			if ( '' !== $atts['margin'] ) {
				$styles[] = 'margin: ' . $atts['margin'];
			}

			if ( '' !== $atts['padding'] ) {
				$styles[] = 'padding: ' . $atts['padding'];
			}

			return $styles;
		}
	}
}
