<?php

if ( ! function_exists( 'protalks_core_add_single_image_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function protalks_core_add_single_image_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Single_Image_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_single_image_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Single_Image_Shortcode extends ProTalksCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'protalks_core_filter_single_image_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'protalks_core_filter_single_image_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/single-image' );
			$this->set_base( 'protalks_core_single_image' );
			$this->set_name( esc_html__( 'Single Image', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds image element', 'protalks-core' ) );
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
					'field_type'    => 'select',
					'name'          => 'retina_scaling',
					'title'         => esc_html__( 'Enable Retina Scaling', 'protalks-core' ),
					'description'   => esc_html__( 'Image uploaded should be two times the height.', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'yes_no' ),
					'default_value' => '',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'images_proportion',
					'default_value' => 'full',
					'title'         => esc_html__( 'Image Proportions', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'list_image_dimension', false ),
					'dependency'    => array(
						'hide' => array(
							'retina_scaling' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'custom_image_width',
					'title'       => esc_html__( 'Custom Image Width', 'protalks-core' ),
					'description' => esc_html__( 'Enter image width in px', 'protalks-core' ),
					'dependency'  => array(
						'show' => array(
							'images_proportion' => array(
								'values'        => 'custom',
								'default_value' => 'full',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'custom_image_height',
					'title'       => esc_html__( 'Custom Image Height', 'protalks-core' ),
					'description' => esc_html__( 'Enter image height in px', 'protalks-core' ),
					'dependency'  => array(
						'show' => array(
							'images_proportion' => array(
								'values'        => 'custom',
								'default_value' => 'full',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'image_action',
					'title'      => esc_html__( 'Image Action', 'protalks-core' ),
					'options'    => array(
						''            => esc_html__( 'No Action', 'protalks-core' ),
						'open-popup'  => esc_html__( 'Open Popup', 'protalks-core' ),
						'custom-link' => esc_html__( 'Custom Link', 'protalks-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link',
					'title'      => esc_html__( 'Custom Link', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'image_action' => array(
								'values'        => array( 'custom-link' ),
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'target',
					'title'         => esc_html__( 'Custom Link Target', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
					'dependency'    => array(
						'show' => array(
							'image_action' => array(
								'values'        => 'custom-link',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'select',
					'name'        => 'fit_height',
					'title'       => esc_html__( 'Fit to Available Height', 'protalks-core' ),
					'description' => esc_html__( 'Enable to make the image take up the full height of the screen, with the header height, admin bar height, top bar height and the optional Custom Height Offset taken into account', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'no_yes' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'fit_height_offset',
					'title'       => esc_html__( 'Custom Height Offset', 'protalks-core' ),
					'description' => esc_html__( 'Input a value for the custom offset to be subtracted from the Available Height. Applies only if ‘Fit to Available Height’ option is set to ‘Yes’', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'no_yes' ),
					'dependency'    => array(
						'show' => array(
							'fit_height' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'offset_movement',
					'title'         => esc_html__( 'Enable Offset Movement', 'protalks-core' ),
					'options' => array(
						''       => esc_html__( 'No', 'protalks-core' ),
						'scroll' => esc_html__( 'Scroll', 'protalks-core' ),
						'cursor' => esc_html__( 'Cursor', 'protalks-core' ),
					),
					'default_value' => '',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'appear_animation',
					'title'      => esc_html__( 'Appear Animation', 'protalks-core' ),
					'options'    => array(
						''        => esc_html__( 'None', 'protalks-core' ),
						'move'    => esc_html__( 'Move', 'protalks-core' ),
						'opacity' => esc_html__( 'Opacity', 'protalks-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'appear_delay',
					'title'      => esc_html__( 'Appear Delay in Ms', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'appear_animation' => array(
								'values'        => array('move', 'opacity'),
								'default_value' => '',
							),
						),
					),
				)
			);

			$this->map_extra_options();
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'protalks_core_single_image', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function load_assets() {

			if ( isset( $atts['image_action'] ) && 'open-popup' === $atts['image_action'] ) {
				wp_enqueue_style( 'magnific-popup' );
				wp_enqueue_script( 'jquery-magnific-popup' );
			}
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['data_attrs']     = $this->get_data_attrs( $atts );

			return protalks_core_get_template_part( 'shortcodes/single-image', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-single-image';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['offset_movement'] ) ? 'qodef-' . $atts['offset_movement'] . '-item' : '';
			$holder_classes[] = ( 'yes' === $atts['retina_scaling'] ) ? 'qodef--retina' : '';
			$holder_classes[] = ( 'yes' === $atts['fit_height'] ) ? 'qodef-fit-img-height' : '';
			$holder_classes[] = ! empty( $atts['appear_animation'] ) ? 'qodef--has-appear qodef-appear--' . $atts['appear_animation'] : '';

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['fit_height_offset'] ) ) {
				$styles[] = '--qode-height-custom-offset: ' . intval( $atts['fit_height_offset'] ) . 'px';
			}

			return $styles;
		}

		private function get_data_attrs($atts)
		{
			$data = array();

			if (( '' === $atts['appear_delay'] ) && 'yes' === $atts['appear_animation']) {
				$data['data-appear-delay'] = mt_rand(0, 500);
			} elseif ('yes' === $atts['appear_animation']) {
				$appear_delay = intval($atts['appear_delay']);

				$data['data-appear-delay'] = $appear_delay;
			}

			return $data;
		}
	}
}
