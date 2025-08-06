<?php

if ( ! function_exists( 'protalks_core_add_order_tracking_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_order_tracking_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Order_Tracking_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_order_tracking_shortcode', 8 );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Order_Tracking_Shortcode extends ProTalksCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/order-tracking' );
			$this->set_base( 'protalks_core_order_tracking' );
			$this->set_name( esc_html__( 'Order Tracking', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that shows the order tracking form', 'protalks-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'protalks_core_order_tracking', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );

			return protalks_core_get_template_part( 'plugins/woocommerce/shortcodes/order-tracking', 'templates/order-tracking', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-order-tracking';

			return implode( ' ', $holder_classes );
		}
	}
}
