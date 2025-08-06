<?php

if ( ! function_exists( 'protalks_core_add_image_with_text_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function protalks_core_add_image_with_text_widget( $widgets ) {
		$widgets[] = 'ProTalksCore_Image_With_Text_Widget';

		return $widgets;
	}

	add_filter( 'protalks_core_filter_register_widgets', 'protalks_core_add_image_with_text_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ProTalksCore_Image_With_Text_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'protalks_core_image_with_text',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'protalks_core_image_with_text' );
				$this->set_name( esc_html__( 'ProTalks Image With Text', 'protalks-core' ) );
				$this->set_description( esc_html__( 'Add an image with text element into widget areas', 'protalks-core' ) );
			}
		}

		public function render( $atts ) {
			echo ProTalksCore_Image_With_text_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
