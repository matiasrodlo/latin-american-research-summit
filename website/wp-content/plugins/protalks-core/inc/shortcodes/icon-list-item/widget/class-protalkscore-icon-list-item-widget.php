<?php

if ( ! function_exists( 'protalks_core_add_icon_list_item_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function protalks_core_add_icon_list_item_widget( $widgets ) {
		$widgets[] = 'ProTalksCore_Icon_List_Item_Widget';

		return $widgets;
	}

	add_filter( 'protalks_core_filter_register_widgets', 'protalks_core_add_icon_list_item_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ProTalksCore_Icon_List_Item_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'protalks_core_icon_list_item',
					'exclude'        => array( 'icon_type', 'custom_icon' ),
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'protalks_core_icon_list_item' );
				$this->set_name( esc_html__( 'ProTalks Icon List Item', 'protalks-core' ) );
				$this->set_description( esc_html__( 'Add a icon list item element into widget areas', 'protalks-core' ) );
			}
		}

		public function render( $atts ) {
			echo ProTalksCore_Icon_List_Item_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
