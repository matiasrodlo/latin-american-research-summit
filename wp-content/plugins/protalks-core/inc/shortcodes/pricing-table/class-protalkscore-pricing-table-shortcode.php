<?php

if ( ! function_exists( 'protalks_core_add_pricing_table_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_pricing_table_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Pricing_Table_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_pricing_table_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Pricing_Table_Shortcode extends ProTalksCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'protalks_core_filter_pricing_table_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'protalks_core_filter_pricing_table_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/pricing-table' );
			$this->set_base( 'protalks_core_pricing_table' );
			$this->set_name( esc_html__( 'Pricing Table', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds pricing table element', 'protalks-core' ) );
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
					'field_type'    => 'select',
					'name'          => 'featured_table',
					'title'         => esc_html__( 'Featured Table', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => 'no',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'table_background_color',
					'title'      => esc_html__( 'Background Color', 'protalks-core' ),
					'group'      => esc_html__( 'General Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'table_border_color',
					'title'      => esc_html__( 'Border Color', 'protalks-core' ),
					'group'      => esc_html__( 'General Style', 'protalks-core' ),
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
					'field_type'  => 'text',
					'name'        => 'title_margin',
					'title'       => esc_html__( 'Title Margin', 'protalks-core' ),
					'description' => esc_html__( 'Set margin that will be applied for title in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					'group'       => esc_html__( 'Title Style', 'protalks-core' ),
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
					'field_type'    => 'text',
					'name'          => 'price',
					'title'         => esc_html__( 'Price', 'protalks-core' ),
					'default_value' => esc_html__( '99', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'price_margin',
					'title'       => esc_html__( 'Price Margin', 'protalks-core' ),
					'description' => esc_html__( 'Set margin that will be applied for price in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					'group'       => esc_html__( 'Price Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'price_color',
					'title'      => esc_html__( 'Price Color', 'protalks-core' ),
					'group'      => esc_html__( 'Price Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'price_label',
					'title'         => esc_html__( 'Price Label', 'protalks-core' ),
					'default_value' => esc_html__( '', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'price_label_color',
					'title'      => esc_html__( 'Price Label Color', 'protalks-core' ),
					'group'      => esc_html__( 'Price Label Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'currency',
					'title'         => esc_html__( 'Currency', 'protalks-core' ),
					'default_value' => esc_html__( '$', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'currency_placement',
					'title'         => esc_html__( 'Currency Placement', 'protalks-core' ),
					'options'       => array(
						'before-price' => esc_html__( 'Before Price', 'protalks-core' ),
						'after-price'  => esc_html__( 'After Price', 'protalks-core' ),
					),
					'default_value' => 'before-price',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'currency_color',
					'title'      => esc_html__( 'Currency Color', 'protalks-core' ),
					'group'      => esc_html__( 'Currency Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'html',
					'name'          => 'content',
					'title'         => esc_html__( 'Content', 'protalks-core' ),
					'default_value' => esc_html__( 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'content_margin',
					'title'       => esc_html__( 'Content Margin', 'protalks-core' ),
					'description' => esc_html__( 'Set margin that will be applied for content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'protalks-core' ),
					'group'       => esc_html__( 'Content Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'content_color',
					'title'      => esc_html__( 'Content Color', 'protalks-core' ),
					'group'      => esc_html__( 'Content Style', 'protalks-core' ),
				)
			);
			$this->import_shortcode_options(
				array(
					'shortcode_base'    => 'protalks_core_button',
					'exclude'           => array( 'custom_class' ),
					'additional_params' => array(
						'nested_group' => esc_html__( 'Button', 'protalks-core' ),
					),
				)
			);
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']       = $this->get_holder_classes( $atts );
			$atts['holder_styles']        = $this->get_holder_styles( $atts );
			$atts['title_styles']         = $this->get_title_styles( $atts );
			$atts['content_styles']       = $this->get_content_styles( $atts );
			$atts['price_general_styles'] = $this->get_price_general_styles( $atts );
			$atts['price_styles']         = $this->get_price_styles( $atts );
			$atts['price_label_styles']   = $this->get_price_label_styles( $atts );
			$atts['currency_styles']      = $this->get_currency_styles( $atts );
			$atts['button_params']        = $this->generate_button_params( $atts );
			$atts['content']              = $this->get_editor_content( $content, $options );

			return protalks_core_get_template_part( 'shortcodes/pricing-table', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-pricing-table';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['featured_table'] ) && 'yes' === $atts['featured_table'] ? 'qodef-status--featured' : 'qodef-status--regular';

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['table_background_color'] ) ) {
				$styles[] = '--qode-general-background-color: ' . $atts['table_background_color'];
			}

			if ( ! empty( $atts['table_border_color'] ) ) {
				$styles[] = '--qode-general-border-color: ' . $atts['table_border_color'];
			}

			return $styles;
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['title_margin'] ) {
				$styles[] = 'margin: ' . $atts['title_margin'];
			}

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = '--qode-title-color: ' . $atts['title_color'];
			}

			return $styles;
		}

		private function get_content_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['content_margin'] ) {
				$styles[] = 'margin: ' . $atts['content_margin'];
			}

			if ( ! empty( $atts['content_color'] ) ) {
				$styles[] = '--qode-content-color: ' . $atts['content_color'];
			}

			return $styles;
		}

		private function get_price_general_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['price_margin'] ) {
				$styles[] = 'margin: ' . $atts['price_margin'];
			}

			return $styles;
		}

		private function get_price_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['price_color'] ) ) {
				$styles[] = '--qode-price-color: ' . $atts['price_color'];
			}

			return $styles;
		}

		private function get_price_label_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['price_label_color'] ) ) {
				$styles[] = '--qode-price-label-color: ' . $atts['price_label_color'];
			}

			return $styles;
		}

		private function get_currency_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['currency_color'] ) ) {
				$styles[] = '--qode-currency-color: ' . $atts['currency_color'];
			}

			return $styles;
		}

		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts(
				array(
					'shortcode_base' => 'protalks_core_button',
					'exclude'        => array( 'custom_class' ),
					'atts'           => $atts,
				)
			);

			return $params;
		}
	}
}
