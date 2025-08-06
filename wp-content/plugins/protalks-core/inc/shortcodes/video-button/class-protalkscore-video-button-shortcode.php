<?php

if ( ! function_exists( 'protalks_core_add_video_button_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_video_button_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Video_Button_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_video_button_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Video_Button_Shortcode extends ProTalksCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/video-button' );
			$this->set_base( 'protalks_core_video_button' );
			$this->set_name( esc_html__( 'Video Button', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds video button element', 'protalks-core' ) );
			$this->set_scripts(
				array(
					'jquery-magnific-popup' => array(
						'registered' => true,
					),
				)
			);
			$this->set_necessary_styles(
				array(
					'magnific-popup' => array(
						'registered' => true,
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
					'field_type' => 'text',
					'name'       => 'video_link',
					'title'      => esc_html__( 'Video Link', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'image',
					'name'        => 'video_image',
					'title'       => esc_html__( 'Image', 'protalks-core' ),
					'description' => esc_html__( 'Select image from media library', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'play_button_color',
					'title'      => esc_html__( 'Play Button Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'play_button_background_color',
					'title'      => esc_html__( 'Play Button Background Color', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'play_button_size',
					'title'      => esc_html__( 'Play Button Size (px)', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'play_button_indentation',
					'title'      => esc_html__( 'Play Button Indentation (px)', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'protalks_core_video_button', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function load_assets() {
			wp_enqueue_style( 'magnific-popup' );
			wp_enqueue_script( 'jquery-magnific-popup' );
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']     = $this->get_holder_classes( $atts );
			$atts['play_button_styles'] = $this->get_play_button_styles( $atts );

			return protalks_core_get_template_part( 'shortcodes/video-button', 'templates/video-button', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-video-button';
			$holder_classes[] = ! empty( $atts['video_image'] ) ? 'qodef--has-img' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_play_button_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['play_button_color'] ) ) {
				$styles[] = 'color: ' . $atts['play_button_color'];
			}

			if ( ! empty( $atts['play_button_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['play_button_background_color'];
			}

			if ( ! empty( $atts['play_button_size'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['play_button_size'] ) ) {
					$styles[] = 'width: ' . $atts['play_button_size'];
					$styles[] = 'height: ' . $atts['play_button_size'];
				} else {
					$styles[] = 'width: ' . intval( $atts['play_button_size'] ) . 'px';
					$styles[] = 'height: ' . intval( $atts['play_button_size'] ) . 'px';
				}
			}

			if ( ! empty( $atts['play_button_indentation'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['play_button_indentation'] ) ) {
					$styles[] = 'padding: ' . $atts['play_button_indentation'];
				} else {
					$styles[] = 'padding: ' . intval( $atts['play_button_indentation'] ) . 'px';
				}
			}

			return implode( ';', $styles );
		}
	}
}
