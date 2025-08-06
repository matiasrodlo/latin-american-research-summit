<?php

if ( ! function_exists( 'protalks_core_add_events_list_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_events_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Events_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_events_list_shortcode' );
}

if ( class_exists( 'ProTalksCore_List_Shortcode' ) ) {
	class ProTalksCore_Events_List_Shortcode extends ProTalksCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'event-item' );
			$this->set_post_type_additional_taxonomies( array( 'event-types' ) );
			$this->set_layouts( apply_filters( 'protalks_core_filter_events_list_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_CPT_URL_PATH . '/events/shortcodes/events-list' );
			$this->set_base( 'protalks_core_events_list' );
			$this->set_name( esc_html__( 'Events List', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of events', 'protalks-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);
			$this->map_query_options(
				array(
					'post_type'        => $this->get_post_type(),
					'include_order_by' => array(
						'start-date' => esc_html__( 'Start Date', 'protalks-core' ),
						'upcoming'   => esc_html__( 'Current and Upcoming', 'protalks-core' ),
						'past'       => esc_html__( 'Past', 'protalks-core' ),
					),
				)
			);

			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'skin',
					'title'      => esc_html__( 'Skin', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'shortcode_skin' ),
					'group'      => esc_html__( 'Layout', 'protalks-core' ),
				)
			);
			$this->map_additional_options( array( 'exclude_filter' => true ) );
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'protalks_core_events_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type'] = $this->get_post_type();

			// Predefined shortcode options.
			$atts['behavior'] = 'columns';

			// Additional query args.
			$atts['additional_query_args'] = array_merge( $this->get_additional_query_args( $atts ), $this->get_additional_meta_query( $atts ) );

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['query_result']   = new WP_Query( protalks_core_get_query_params( $atts ) );
			$atts['data_attr']      = protalks_core_get_pagination_data( PROTALKS_CORE_REL_PATH, 'post-types/events/shortcodes', 'events-list', 'events', $atts );

			$atts['this_shortcode'] = $this;

			return protalks_core_get_template_part( 'post-types/events/shortcodes/events-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-events-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['skin'] ) ? 'qodef-skin--' . $atts['skin'] : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$holder_styles = array();

			$list_styles   = $this->get_list_styles( $atts );
			$holder_styles = array_merge( $holder_styles, $list_styles );

			return $holder_styles;
		}

		private function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();

			$list_item_classes = $this->get_list_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}

		private function get_additional_meta_query( $atts ) {
			$query_args = array();
			$meta_query = array();

			switch ( $atts['orderby'] ) {
				case 'start-date':
					$query_args['orderby']  = 'meta_value';
					$query_args['meta_key'] = 'qodef_event_single_start_date';
					break;
				case 'upcoming':
					$query_args['orderby'] = 'meta_value';

					$meta_query = array(
						'relation' => 'OR',
						array(
							'key'     => 'qodef_event_single_end_date',
							'value'   => gmdate( 'Y-m-d' ),
							'compare' => '>=',
						),
						array(
							'relation' => 'AND',
							array(
								'key'     => 'qodef_event_single_end_date',
								'compare' => 'NOT EXISTS',
							),
							array(
								'key'     => 'qodef_event_single_start_date',
								'value'   => gmdate( 'Y-m-d' ),
								'compare' => '>=',
							),
						),
					);
					break;
				case 'past':
					$query_args['orderby'] = 'meta_value';

					$meta_query = array(
						'relation' => 'OR',
						array(
							'key'     => 'qodef_event_single_end_date',
							'value'   => gmdate( 'Y-m-d' ),
							'compare' => '<',
						),
						array(
							'relation' => 'AND',
							array(
								'key'     => 'qodef_event_single_end_date',
								'compare' => 'NOT EXISTS',
							),
							array(
								'key'     => 'qodef_event_single_start_date',
								'value'   => gmdate( 'Y-m-d' ),
								'compare' => '<',
							),
						),
					);
					break;
			}

			if ( is_array( $meta_query ) && count( $meta_query ) ) {
				$query_args['meta_query'][] = $meta_query;
			}

			return $query_args;
		}

		public function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}

			return $styles;
		}
	}
}
