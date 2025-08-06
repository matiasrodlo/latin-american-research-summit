<?php

if ( ! function_exists( 'protalks_core_add_social_share_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_social_share_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Social_Share_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_social_share_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Social_Share_Shortcode extends ProTalksCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'protalks_core_filter_social_share_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'protalks_core_filter_social_share_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_INC_URL_PATH . '/social-share/shortcodes/social-share' );
			$this->set_base( 'protalks_core_social_share' );
			$this->set_name( esc_html__( 'Social Share', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays social share networks', 'protalks-core' ) );
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
					'visibility'    => array(
						'map_for_page_builder' => $options_map['visibility'],
						'map_for_widget'       => $options_map['visibility'],
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'predefined_svg_icons',
					'title'         => esc_html__( 'Predefined SVG Icons', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'yes_no', false ),
					'default_value' => 'yes',
					'dependency'    => array(
						'show' => array(
							'layout' => array(
								'values'        => array( 'list' ),
								'default_value' => 'list',
							),
						),
					),
				)
			);
			$icons_object     = qode_framework_icons();
			$icon_collections = $icons_object->get_icon_packs( array( 'linea-icons', 'dripicons', 'fontkiko', 'linear-icons', 'material-icons' ) );
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'icon_font',
					'title'         => esc_html__( 'Icons Font', 'protalks-core' ),
					'options'       => $icon_collections,
					'dependency'    => array(
						'show' => array(
							'predefined_svg_icons' => array(
								'values'        => 'no',
								'default_value' => 'yes',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title',
					'title'      => esc_html__( 'Social Share Title', 'protalks-core' ),
				)
			);
			$this->map_extra_options();
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'protalks_core_social_share', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['social_networks'] = $this->get_social_network_items( $atts );

			return protalks_core_get_template_part( 'social-share/shortcodes/social-share', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-social-share';
			$holder_classes[] = 'clear';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['predefined_svg_icons'] ) && 'yes' === $atts['predefined_svg_icons'] ? 'qodef-predefined-icons' : '';
			
			return implode( ' ', $holder_classes );
		}

		/**
		 * Get Social Networks data to display
		 * @return array
		 */
		public function get_social_network_items( $atts ) {
			$networks             = array();
			$social_networks_list = protalks_core_enabled_social_networks_list();

			if ( ! empty( $social_networks_list ) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

				foreach ( $social_networks_list as $network => $labels ) {
					$params['predefined_svg_icons'] = $atts['predefined_svg_icons'];

					$params['layout'] = $atts['layout'];
					$params['name']   = $network;
					$params['text']   = $labels['shorten'];
					$params['link']   = protalks_core_get_social_network_share_link( $network, $image );

					$icon_params = array(
						'icon_attributes' => array(
							'class' => 'qodef-social-network-icon',
						),
					);

					// Override icon pack for VK social network because those packages doesn't have icon for it.
					if ( 'vk' === $network && in_array( $atts['icon_font'], array( 'elegant-icons', 'simple-line-icons' ), true ) ) {
						$atts['icon_font'] = 'font-awesome';
					}

					// Get icons for not text layouts.
					if ( 'no' !== $params['predefined_svg_icons'] ) {
						$params['icon'] = protalks_core_get_svg_icon( $network, 'qodef-' . $network . '-share' );
					} elseif ( 'text' !== $params['layout'] ) {
						$params['icon'] = qode_framework_icons()->get_specific_icon_from_pack( $network, $atts['icon_font'], $icon_params );
					}

					$net = protalks_core_get_template_part( 'social-share/shortcodes/social-share', 'templates/parts/network', '', $params );

					$networks[] = $net;
				}
			}

			return $networks;
		}
	}
}
