<?php

if ( ! function_exists( 'protalks_core_add_instagram_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_instagram_list_shortcode( $shortcodes ) {
		if ( qode_framework_is_installed( 'instagram' ) ) {
			$shortcodes[] = 'ProTalksCore_Instagram_List_Shortcode';
		}

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_instagram_list_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Instagram_List_Shortcode extends ProTalksCore_Shortcode {
		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_PLUGINS_URL_PATH . '/instagram/shortcodes/instagram-list' );
			$this->set_base( 'protalks_core_instagram_list' );
			$this->set_name( esc_html__( 'Instagram List', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays instagram list', 'protalks-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);

			if ( ! class_exists( 'SB_Instagram_Feed_Pro' ) ) {
				$this->set_option(
					array(
						'field_type' => 'select',
						'name' => 'behavior',
						'title' => esc_html__( 'List Appearance', 'protalks-core' ),
						'options' => protalks_core_get_select_type_options_pool( 'list_behavior', false, array( 'masonry', 'justified-gallery' ) ),
						'default_value' => 'columns',
					)
				);
			}

			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'instagram_feed_id',
					'title'      => esc_html__( 'Feed', 'protalks-core' ),
					'options'    => protalks_core_get_instagram_feed_list(),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'protalks_core_instagram_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['instagram_feed_shortcode'] = $this->get_instagram_feed_shortcode( $atts );
			$atts['behavior']                 = isset( $atts['behavior'] ) ? $atts['behavior'] : '';
			$atts['holder_classes']           = $this->get_holder_classes( $atts );

			return protalks_core_get_template_part( 'plugins/instagram/shortcodes/instagram-list', 'templates/instagram-list', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-instagram-list';
			$holder_classes[] = isset( $atts['behavior'] ) ? 'qodef-instagram-' . $atts['behavior'] : '';

			$holder_classes = array_merge( $holder_classes );

			return implode( ' ', $holder_classes );
		}

		private function get_instagram_feed_shortcode( $atts ) {
			$instagram_feed_shortcode = '';

			if ( ! empty( $atts['instagram_feed_id'] ) ) {
				$instagram_feed_shortcode = '[instagram-feed feed=' . $atts['instagram_feed_id'] . ']';
			}

			return $instagram_feed_shortcode;
		}
	}
}
