<?php

if ( ! function_exists( 'protalks_core_add_custom_font_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function protalks_core_add_custom_font_widget( $widgets ) {
		$widgets[] = 'ProTalksCore_Custom_Font_Widget';

		return $widgets;
	}

	add_filter( 'protalks_core_filter_register_widgets', 'protalks_core_add_custom_font_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ProTalksCore_Custom_Font_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'protalks_core_custom_font',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'protalks_core_custom_font' );
				$this->set_name( esc_html__( 'ProTalks Custom Font', 'protalks-core' ) );
				$this->set_description( esc_html__( 'Add a custom font element into widget areas', 'protalks-core' ) );
			}
		}

		public function render( $atts ) {
			echo ProTalksCore_Custom_Font_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
