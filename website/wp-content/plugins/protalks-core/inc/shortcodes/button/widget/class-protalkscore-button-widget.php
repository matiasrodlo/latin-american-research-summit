<?php

if ( ! function_exists( 'protalks_core_add_button_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function protalks_core_add_button_widget( $widgets ) {
		$widgets[] = 'ProTalksCore_Button_Widget';

		return $widgets;
	}

	add_filter( 'protalks_core_filter_register_widgets', 'protalks_core_add_button_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ProTalksCore_Button_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'protalks_core_button',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'protalks_core_button' );
				$this->set_name( esc_html__( 'ProTalks Button', 'protalks-core' ) );
				$this->set_description( esc_html__( 'Add a button element into widget areas', 'protalks-core' ) );
			}
		}

		public function render( $atts ) {
			echo ProTalksCore_Button_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
