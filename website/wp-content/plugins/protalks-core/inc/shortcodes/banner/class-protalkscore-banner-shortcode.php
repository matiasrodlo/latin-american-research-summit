<?php

if ( ! function_exists( 'protalks_core_add_banner_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_banner_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Banner_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_banner_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Banner_Shortcode extends ProTalksCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'protalks_core_filter_banner_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'protalks_core_filter_banner_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/banner' );
			$this->set_base( 'protalks_core_banner' );
			$this->set_name( esc_html__( 'Banner', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds banner element', 'protalks-core' ) );
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
					'field_type' => 'image',
					'name'       => 'image',
					'title'      => esc_html__( 'Image', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link_url',
					'title'      => esc_html__( 'Link', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
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
					'default_value' => 'h1',
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
					'field_type' => 'textarea',
					'name'       => 'text_field',
					'title'      => esc_html__( 'Text', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'text_tag',
					'title'         => esc_html__( 'Text Tag', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'p',
					'group'         => esc_html__( 'Text Style', 'protalks-core' ),
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
					'name'       => 'banner_padding',
					'title'      => esc_html__( 'Banner Padding', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'banner_min_height',
					'title'      => esc_html__( 'Banner Minimum Height', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'banner_padding_1512',
					'title'      => esc_html__( 'Banner Padding under 1512px', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'banner_padding_880',
					'title'      => esc_html__( 'Banner Padding under 880px', 'protalks-core' ),
					'group'      => esc_html__( 'Style', 'protalks-core' ),
				)
			);
			$this->import_shortcode_options(
				array(
					'shortcode_base'    => 'protalks_core_button',
					'exclude'           => array( 'custom_class', 'link', 'target' ),
					'additional_params' => array(
						'nested_group' => esc_html__( 'Button', 'protalks-core' ),

					),
					'dependency'   => array(
						'show' => array(
							'layout' => array(
								'values'        => 'link-button',
								'default_value' => '',
							),
						),
					),
				)
			);

			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['holder_styles']   = $this->get_styles( $atts );
			$atts['title_styles']    = $this->get_title_styles( $atts );
			$atts['text_styles']     = $this->get_text_styles( $atts );
			$atts['button_params']   = $this->generate_button_params( $atts );

			return protalks_core_get_template_part( 'shortcodes/banner', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-banner';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';

			return implode( ' ', $holder_classes );
		}

		private function get_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['banner_min_height'] ) {
				$styles[] = '--banner-min-height: ' . $atts['banner_min_height'];
			}

			if ( '' !== $atts['banner_padding'] ) {
				$styles[] = '--banner-padding: ' . $atts['banner_padding'];
			}

			if ( ! empty( $atts['banner_padding_1512'] ) ) {
				$styles[] = '--banner-padding-1512: ' . $atts['banner_padding_1512'];
			}

			if ( ! empty( $atts['banner_padding_880'] ) ) {
				$styles[] = '--banner-padding-880: ' . $atts['banner_padding_880'];
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

		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts(
				array(
					'shortcode_base' => 'protalks_core_button',
					'exclude'        => array( 'custom_class', 'link', 'target' ),
					'atts'           => $atts,
				)
			);

			$params['link']   = ! empty( $atts['link_url'] ) ? $atts['link_url'] : '';
			$params['target'] = ! empty( $atts['link_target'] ) ? $atts['link_target'] : '';

			return $params;
		}
	}
}
