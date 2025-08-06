<?php

if ( ! function_exists( 'protalks_core_add_icon_with_text_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_icon_with_text_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Icon_With_Text_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_icon_with_text_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Icon_With_Text_Shortcode extends ProTalksCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'protalks_core_filter_icon_with_text_layouts', array() ) );

			$options_map   = protalks_core_get_variations_options_map( $this->get_layouts() );
			$default_value = $options_map['default_value'];

			$this->set_extra_options( apply_filters( 'protalks_core_filter_icon_with_text_extra_options', array(), $default_value ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/icon-with-text' );
			$this->set_base( 'protalks_core_icon_with_text' );
			$this->set_name( esc_html__( 'Icon With Text', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds icon with text element', 'protalks-core' ) );
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
					'name'          => 'layout',
					'title'         => esc_html__( 'Layout', 'protalks-core' ),
					'options'       => $this->get_layouts(),
					'default_value' => $options_map['default_value'],
					'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'link',
					'title'         => esc_html__( 'Link', 'protalks-core' ),
					'default_value' => '',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'target',
					'title'         => esc_html__( 'Link Target', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'icon_type',
					'title'         => esc_html__( 'Icon Type', 'protalks-core' ),
					'options'       => array(
						'icon-pack'   => esc_html__( 'Icon Pack', 'protalks-core' ),
						'custom-icon' => esc_html__( 'Custom Icon', 'protalks-core' ),
					),
					'default_value' => 'icon-pack',
					'group'         => esc_html__( 'Icon', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'custom_icon',
					'title'      => esc_html__( 'Custom Icon', 'protalks-core' ),
					'group'      => esc_html__( 'Icon', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'icon_type' => array(
								'values'        => 'custom-icon',
								'default_value' => 'icon-pack',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'retina_scaling',
					'title'         => esc_html__( 'Enable Retina Scaling', 'protalks-core' ),
					'description'   => esc_html__( 'Image uploaded should be two times the height.', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Icon', 'protalks-core' ),
					'dependency'    => array(
						'show' => array(
							'icon_type' => array(
								'values'        => 'custom-icon',
								'default_value' => 'icon-pack',
							),
						),
					),
				)
			);
			$this->import_shortcode_options(
				array(
					'shortcode_base'    => 'protalks_core_icon',
					'exclude'           => array( 'custom_class', 'link', 'target', 'vertical_offset' ),
					'additional_params' => array(
						'nested_group' => esc_html__( 'Icon', 'protalks-core' ),
						'dependency'   => array(
							'show' => array(
								'icon_type' => array(
									'values'        => 'icon-pack',
									'default_value' => 'icon-pack',
								),
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_icon_margin',
					'title'      => esc_html__( 'Custom Icon Margin', 'protalks-core' ),
					'group'      => esc_html__( 'Icon Style', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'icon_type' => array(
								'values'        => 'custom-icon',
								'default_value' => 'icon-pack',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'title',
					'title'         => esc_html__( 'Title', 'protalks-core' ),
					'default_value' => esc_html__( 'Title Text', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h4',
					'group'         => esc_html__( 'Title Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'protalks-core' ),
					'group'      => esc_html__( 'Title Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_margin_top',
					'title'      => esc_html__( 'Title Margin Top', 'protalks-core' ),
					'group'      => esc_html__( 'Title Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'textarea',
					'name'          => 'text',
					'title'         => esc_html__( 'Text', 'protalks-core' ),
					'default_value' => esc_html__( 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'protalks-core' ),
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
					'field_type' => 'text',
					'name'       => 'text_margin_top',
					'title'      => esc_html__( 'Text Margin Top', 'protalks-core' ),
					'group'      => esc_html__( 'Text Style', 'protalks-core' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'button_text',
					'title'      => esc_html__( 'Button Text', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'button_layout',
					'title'      => esc_html__( 'Button Layout', 'protalks-core' ),
					'options'    => apply_filters( 'protalks_core_filter_button_layouts', array() ),
					'group'      => esc_html__( 'Button Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'button_margin',
					'title'      => esc_html__( 'Button Margin', 'protalks-core' ),
					'group'      => esc_html__( 'Button Style', 'protalks-core' ),
				)
			);

			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['image_styles']   = $this->get_image_styles( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			$atts['icon_params']    = $this->generate_icon_params( $atts );
			$atts['button_params']  = $this->generate_button_params( $atts );

			return protalks_core_get_template_part( 'shortcodes/icon-with-text', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-icon-with-text';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['icon_type'] ) ? 'qodef--' . $atts['icon_type'] : '';
			$holder_classes[] = ( 'yes' === $atts['retina_scaling'] ) ? 'qodef--retina' : '';

			$holder_classes = apply_filters( 'protalks_core_filter_icon_with_text_variation_classes', $holder_classes, $atts );

			return implode( ' ', $holder_classes );
		}

		private function get_image_styles( $atts ) {
			$styles = array();

			if ( 'yes' === $atts['retina_scaling'] && ! empty( $atts['custom_icon'] ) ) {
				$image_meta = wp_get_attachment_metadata( $atts['custom_icon'] );

				if ( ! empty( $image_meta['width'] ) ) {
					$styles[] = 'width: ' . round( $image_meta['width'] / 2 ) . 'px';
				}
			}

			if ( ! empty( $atts['custom_icon_margin'] ) ) {
				$styles[] = 'margin:' . $atts['custom_icon_margin'];
			}

			return $styles;
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['title_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			return $styles;
		}

		private function get_text_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['text_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['text_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['text_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}

			return $styles;
		}

		private function generate_icon_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts(
				array(
					'shortcode_base' => 'protalks_core_icon',
					'exclude'        => array( 'custom_class', 'link', 'target', 'vertical_offset' ),
					'atts'           => $atts,
				)
			);

			return $params;
		}

		private function generate_button_params( $atts ) {
			$button_params = array();

			$button_params['text']          = isset( $atts['button_text'] ) ? $atts['button_text'] : esc_html__( 'Read more', 'protalks-core' );
			$button_params['button_layout'] = isset( $atts['button_layout'] ) ? $atts['button_layout'] : 'filled';
			$button_params['margin']        = isset( $atts['button_margin'] ) ? $atts['button_margin'] : '';
			$button_params['link']          = isset( $atts['link'] ) ? $atts['link'] : '';
			$button_params['target']        = isset( $atts['target'] ) ? $atts['target'] : '';

			return $button_params;
		}
	}
}
