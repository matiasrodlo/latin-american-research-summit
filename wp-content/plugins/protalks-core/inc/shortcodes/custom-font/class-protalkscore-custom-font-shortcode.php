<?php

if ( ! function_exists( 'protalks_core_add_custom_font_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_custom_font_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Custom_Font_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_custom_font_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Custom_Font_Shortcode extends ProTalksCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'protalks_core_filter_custom_font_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/custom-font' );
			$this->set_base( 'protalks_core_custom_font' );
			$this->set_name( esc_html__( 'Custom Font', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays custom font with provided parameters', 'protalks-core' ) );

			$options_map = protalks_core_get_variations_options_map( $this->get_layouts() );

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'layout',
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
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'textarea',
					'name'          => 'title',
					'title'         => esc_html__( 'Title Text', 'protalks-core' ),
					'default_value' => esc_html__( 'Custom Title Text', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_break_positions',
					'title'       => esc_html__( 'Positions of Line Break', 'protalks-core' ),
					'description' => esc_html__( 'Enter the positions of the words after which you would like to create a line break. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a line break, you would enter "1,3,4")', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'disable_break_words',
					'title'         => esc_html__( 'Disable Line Break', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will disable line breaks for screen size 1200 and lower', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'p',
					'group'         => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'color',
					'title'      => esc_html__( 'Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'font_family',
					'title'      => esc_html__( 'Font Family', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'font_size',
					'title'      => esc_html__( 'Font Size', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'line_height',
					'title'      => esc_html__( 'Line Height', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'font_weight',
					'title'      => esc_html__( 'Font Weight', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_weight' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'font_style',
					'title'      => esc_html__( 'Font Style', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'font_style' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'text_transform',
					'title'      => esc_html__( 'Text Transform', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'text_transform' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'text_alignment',
					'title'      => esc_html__( 'Text Alignment', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'horizontal_alignment' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'margin',
					'title'      => esc_html__( 'Margin', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'font_size_1512',
					'title'       => esc_html__( 'Font Size', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1512', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1512 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_height_1512',
					'title'       => esc_html__( 'Line Height', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1512', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1512 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'letter_spacing_1512',
					'title'       => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1512', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1512 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'font_size_1368',
					'title'       => esc_html__( 'Font Size', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1368', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1368 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_height_1368',
					'title'       => esc_html__( 'Line Height', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1368', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1368 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'letter_spacing_1368',
					'title'       => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1368', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1368 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'font_size_1200',
					'title'       => esc_html__( 'Font Size', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1200', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1200 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_height_1200',
					'title'       => esc_html__( 'Line Height', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1200', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1200 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'letter_spacing_1200',
					'title'       => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1200', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1200 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'font_size_1024',
					'title'       => esc_html__( 'Font Size', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1024', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1024 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_height_1024',
					'title'       => esc_html__( 'Line Height', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1024', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1024 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'letter_spacing_1024',
					'title'       => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1024', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 1024 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'font_size_880',
					'title'       => esc_html__( 'Font Size', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 880', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 880 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_height_880',
					'title'       => esc_html__( 'Line Height', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 880', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 880 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'letter_spacing_880',
					'title'       => esc_html__( 'Letter Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 880', 'protalks-core' ),
					'group'       => esc_html__( 'Screen Size 880 Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'name'       => 'appear_animation',
					'field_type' => 'select',
					'title'      => esc_html__('Appear Animation', 'protalks-core'),
					'options'    => protalks_core_get_select_type_options_pool('no_yes', false),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'protalks_core_custom_font', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['unique_class']   = 'qodef-custom-font-' . rand( 0, 1000 );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['title']          = $this->get_modified_title( $atts );
			$this->set_responsive_styles( $atts );

			return protalks_core_get_template_part( 'shortcodes/custom-font', 'variations/' . $atts['layout'] . '/templates/custom-font', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-custom-font';
			$holder_classes[] = $atts['unique_class'];
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['disable_break_words'] ? 'qodef-break--disabled' : '';
			$holder_classes[] = 'yes' === $atts['appear_animation'] ? 'qodef--has-appear' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_modified_title( $atts ) {
			$title = $atts['title'];

			if ( ! empty( $title ) ) {
				$split_title = explode( ' ', $title );

				if ( ! empty( $atts['line_break_positions'] ) ) {
					$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );

					foreach ( $line_break_positions as $position ) {
						$position = intval( $position );
						if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
							$split_title[ $position - 1 ] = $split_title[ $position - 1 ] . '<br />';
						}
					}
				}

				$title = implode( ' ', $split_title );
			}

			return $title;
		}

		private function get_holder_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['color'] ) ) {
				$styles[] = 'color: ' . $atts['color'];
			}

			if ( ! empty( $atts['font_family'] ) ) {
				$styles[] = 'font-family: ' . $atts['font_family'];
			}

			$font_size = $atts['font_size'];
			if ( ! empty( $font_size ) ) {
				if ( qode_framework_string_ends_with_typography_units( $font_size ) ) {
					$styles[] = 'font-size: ' . $font_size;
				} else {
					$styles[] = 'font-size: ' . intval( $font_size ) . 'px';
				}
			}

			$line_height = $atts['line_height'];
			if ( ! empty( $line_height ) ) {
				if ( qode_framework_string_ends_with_typography_units( $line_height ) ) {
					$styles[] = 'line-height: ' . $line_height;
				} else {
					$styles[] = 'line-height: ' . intval( $line_height ) . 'px';
				}
			}

			$letter_spacing = $atts['letter_spacing'];
			if ( '' !== $letter_spacing ) {
				if ( qode_framework_string_ends_with_typography_units( $letter_spacing ) ) {
					$styles[] = 'letter-spacing: ' . $letter_spacing;
				} else {
					$styles[] = 'letter-spacing: ' . intval( $letter_spacing ) . 'px';
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
			if ( ! empty( $atts['text_alignment'] ) ) {
				$styles[] = 'text-align: ' . $atts['text_alignment'];
			}

			if ( '' !== $atts['margin'] ) {
				$styles[] = 'margin: ' . $atts['margin'];
			}

			return $styles;
		}

		private function set_responsive_styles( $atts ) {
			$unique_class = '.' . $atts['unique_class'];
			$screen_sizes = array( '1512', '1368', '1200', '1024', '880' );
			$option_keys  = array( 'font_size', 'line_height', 'letter_spacing' );

			foreach ( $screen_sizes as $screen_size ) {
				$styles = array();

				foreach ( $option_keys as $option_key ) {
					$option_value = $atts[ $option_key . '_' . $screen_size ];
					$style_key    = str_replace( '_', '-', $option_key );

					if ( '' !== $option_value ) {
						if ( qode_framework_string_ends_with_typography_units( $option_value ) ) {
							$styles[ $style_key ] = $option_value . '!important';
						} else {
							$styles[ $style_key ] = intval( $option_value ) . 'px !important';
						}
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
	}
}
