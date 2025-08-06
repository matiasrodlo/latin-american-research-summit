<?php

if ( ! function_exists( 'protalks_core_add_textual_list_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_textual_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Textual_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_textual_list_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Textual_List_Shortcode extends ProTalksCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/textual-list' );
			$this->set_base( 'protalks_core_textual_list' );
			$this->set_name( esc_html__( 'Textual List', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds textual list', 'protalks-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Items', 'protalks-core' ),
					'items'      => array(
						array(
							'field_type'    => 'text',
							'name'          => 'title',
							'title'         => esc_html__( 'Title', 'protalks-core' ),
							'default_value' => '',
						),
						array(
							'field_type'    => 'text',
							'name'          => 'link',
							'title'         => esc_html__( 'Link', 'protalks-core' ),
							'default_value' => '',
						),
						array(
							'field_type'    => 'select',
							'name'          => 'target',
							'title'         => esc_html__( 'Target', 'protalks-core' ),
							'options'       => protalks_core_get_select_type_options_pool( 'link_target' ),
							'default_value' => '_self'
						),
					),
				)
			);
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes();
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );

			return protalks_core_get_template_part( 'shortcodes/textual-list', 'templates/textual-list', '', $atts );
		}

		private function get_holder_classes() {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-textual-list';

			return implode( ' ', $holder_classes );
		}
	}
}
