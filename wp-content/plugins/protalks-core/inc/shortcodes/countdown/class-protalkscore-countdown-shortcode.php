<?php

if ( ! function_exists( 'protalks_core_add_countdown_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_countdown_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Countdown_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_countdown_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Countdown_Shortcode extends ProTalksCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'protalks_core_filter_countdown_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/countdown' );
			$this->set_base( 'protalks_core_countdown' );
			$this->set_name( esc_html__( 'Countdown', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays countdown with provided parameters', 'protalks-core' ) );

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
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'date',
					'name'        => 'date',
					'title'       => esc_html__( 'Date', 'protalks-core' ),
					'description' => esc_html__( 'Enter date in format Y/m/d H:i:s', 'protalks-core' ), //because of the wpbackery
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'size',
					'title'      => esc_html__( 'Size', 'protalks-core' ),
					'options'    => array(
						''        => esc_html__( 'Bigger', 'protalks-core' ),
						'smaller' => esc_html__( 'Smaller', 'protalks-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'format',
					'title'      => esc_html__( 'Format', 'protalks-core' ),
					'options'    => array(
						''      => esc_html__( 'Show All', 'protalks-core' ),
						'weeks' => esc_html__( 'Hide Weeks', 'protalks-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'week_label',
					'title'      => esc_html__( 'Week Label', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'week_label_plural',
					'title'      => esc_html__( 'Week Label Plural', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'day_label',
					'title'      => esc_html__( 'Day Label', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'day_label_plural',
					'title'      => esc_html__( 'Day Label Plural', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'hour_label',
					'title'      => esc_html__( 'Hour Label', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'hour_label_plural',
					'title'      => esc_html__( 'Hour Label Plural', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'minute_label',
					'title'      => esc_html__( 'Minute Label', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'minute_label_plural',
					'title'      => esc_html__( 'Minute Label Plural', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'second_label',
					'title'      => esc_html__( 'Second Label', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'second_label_plural',
					'title'      => esc_html__( 'Second Label Plural', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'skin',
					'title'      => esc_html__( 'Skin', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'shortcode_skin' ),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['data_attrs']     = $this->get_data_attrs( $atts );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );

			return protalks_core_get_template_part( 'shortcodes/countdown', 'variations/' . $atts['layout'] . '/templates/countdown', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-countdown';
			$holder_classes[] =  empty( $atts['format'] ) || 'weeks' !== $atts['format'] ? 'qodef-show--5' : 'qodef-show--4';

			$holder_classes[] = ! empty( $atts['skin'] ) ? 'qodef-countdown--' . $atts['skin'] : '';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['size'] ) ? 'qodef-size--' . $atts['size'] : '';
			$holder_classes[] = ! empty( $atts['format'] ) ? 'qodef-hide--' . $atts['format'] : '';

			return implode( ' ', $holder_classes );
		}

		private function get_data_attrs( $atts ) {
			$data = array();

			if ( ! empty( $atts['date'] ) ) {
				$date              = $atts['date'];
				$date_formatted    = gmdate( 'Y/m/d H:i:s', strtotime( $date ) );
				$data['data-date'] = $date_formatted;
			}

			$data['data-hide'] = $atts['format'];

			$date_formats = array(
				'week'   => array(
					'default' => esc_html__( 'Week', 'protalks-core' ),
					'plural'  => esc_html__( 'Weeks', 'protalks-core' ),
				),
				'day'    => array(
					'default' => esc_html__( 'Day', 'protalks-core' ),
					'plural'  => esc_html__( 'Days', 'protalks-core' ),
				),
				'hour'   => array(
					'default' => esc_html__( 'Hour', 'protalks-core' ),
					'plural'  => esc_html__( 'Hours', 'protalks-core' ),
				),
				'minute' => array(
					'default' => esc_html__( 'Minute', 'protalks-core' ),
					'plural'  => esc_html__( 'Minutes', 'protalks-core' ),
				),
				'second' => array(
					'default' => esc_html__( 'Second', 'protalks-core' ),
					'plural'  => esc_html__( 'Seconds', 'protalks-core' ),
				),
			);

			foreach ( $date_formats as $key => $value ) {
				if ( ! empty( $atts[$key . '_label'] ) ) {
					$data['data-' . $key . '-label'] = $atts[$key . '_label'];
				} else {
					$data['data-' . $key . '-label'] = $value['default'];
				}

				if ( ! empty( $atts[$key . '_label_plural'] ) ) {
					$data['data-' . $key . '-label-plural'] = $atts[$key . '_label_plural'];
				} else {
					$data['data-' . $key . '-label-plural'] = $value['plural'];
				}
			}

			return $data;
		}
	}
}
