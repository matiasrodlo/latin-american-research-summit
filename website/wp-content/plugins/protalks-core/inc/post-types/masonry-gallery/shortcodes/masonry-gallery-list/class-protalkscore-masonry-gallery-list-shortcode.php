<?php

if ( ! function_exists( 'protalks_core_add_masonry_gallery_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_masonry_gallery_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Masonry_Gallery_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_masonry_gallery_list_shortcode' );
}

if ( class_exists( 'ProTalksCore_List_Shortcode' ) ) {
	class ProTalksCore_Masonry_Gallery_List_Shortcode extends ProTalksCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'masonry-gallery' );
			$this->set_post_type_additional_taxonomies( array( 'masonry-gallery-category' ) );
			$this->set_extra_options( apply_filters( 'protalks_core_filter_masonry_gallery_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_CPT_URL_PATH . '/masonry-gallery/shortcodes/masonry-gallery-list' );
			$this->set_base( 'protalks_core_masonry_gallery_list' );
			$this->set_name( esc_html__( 'Masonry Gallery List', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of masonry gallery', 'protalks-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'retina_scaling',
					'title'         => esc_html__( 'Enable Retina Scaling for Images', 'protalks-core' ),
					'default_value' => '',
					'options'       => protalks_core_get_select_type_options_pool( 'no_yes' ),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior' => array( 'slider', 'justified-gallery' ),
					'exclude_option'   => array( 'images_proportion' ),
				)
			);
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['masonry_images_proportion'] = 'fixed';

			$atts['post_type'] = $this->get_post_type();

			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['query_result']   = new WP_Query( protalks_core_get_query_params( $atts ) );

			$atts['this_shortcode'] = $this;

			return protalks_core_get_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-masonry-gallery-list';
			$holder_classes[] = ! empty( $atts['retina_scaling'] ) && 'yes' === $atts['retina_scaling'] ? 'qodef-retina--enabled' : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();

			$list_item_classes = $this->get_list_item_classes( $atts );

			if ( isset( $atts['layout'] ) && ! empty( $atts['layout'] ) ) {
				$list_item_classes[] = 'qodef-item-layout--' . $atts['layout'];
			}

			if ( 'yes' === get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_expand_image', true ) ) {
				$list_item_classes[] = 'qodef-expanded-image--enabled';
			}

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}

		public function get_item_layout( $atts ) {
			$item_layout = protalks_core_get_option_value( 'meta-box', 'qodef_masonry_gallery_item_layout', '', get_the_ID() );

			return $item_layout;
		}

		public function get_item_image_dimension( $atts ) {

			if ( ! empty( $atts['behavior'] ) && 'masonry' === $atts['behavior'] && ! empty( $atts['masonry_images_proportion'] ) && 'fixed' === $atts['masonry_images_proportion'] ) {
				$image_dimension = protalks_core_get_custom_image_size_meta( 'meta-box', 'qodef_masonry_gallery_item_dimension', get_the_ID() );
			} else {
				$image_dimension = array(
					'size'  => 'full',
					'class' => 'qodef-item--full',
				);
			}

			return $image_dimension;
		}
	}
}
